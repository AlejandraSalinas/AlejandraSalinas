<?php
require_once  '../models/SupervisorModel.php';

$controller = new SupervisorController;

class SupervisorController
{
    private $supervisor;

    public function __construct()
    {
        $this->supervisor = new SupervisorModel();

        if (isset($_REQUEST['c'])) {
            switch ($_REQUEST['c']) {
                case 1: //Almacenar en la base de datos
                    self::store();
                    break;
                case 2: //Ver supervisor
                    self::show();
                    break;
                case 3: //Actualizar supervisor 
                    self::update();
                    break;
                case 4: //Eliminar supervisor 
                    self::delete();
                    break;

                default:
                    self::index();
                    break;
            }
        }
    }
    public function index()
    {
        return $this->supervisor->getAll();
    }
    public function store()
    {
        $datos = [            
            'id_persona'      => $_REQUEST['id_persona'],
            'pass'            => $_REQUEST['pass'],
            'inicio_contrato' => $_REQUEST['inicio_contrato'],
            'fin_contrato'    => $_REQUEST['fin_contrato'],
            'estado'          => $_REQUEST['estado']
        ];

        $result = $this->supervisor->store($datos);

        if ($result) {
            header("Location: ../Views/supervisor/index.php");
            exit();
        }

        return $result;
    }

    public function show()
    {
        $id_supervisor = $_REQUEST['id_supervisor'];
        header("location: ../Views/supervisor/update.php?id_supervisor=" . $id_supervisor);
    }

    public function delete()
    {
        $this->supervisor->delete($_REQUEST['id_supervisor']);
        header("location: ../Views/supervisor/index.php");
    }

    public function update()
    {
        $datos = [
            'id_supervisor'       => $_REQUEST['id_supervisor'],
            'inicio_contrato'    => $_REQUEST['inicio_contrato'],
            'fin_contrato'       => $_REQUEST['fin_contrato'],
            'estado'             => $_REQUEST['estado']
        ];

        $result = $this->supervisor->update($datos);

        if ($result) {
            header('location: ../Views/supervisor/index.php');
            

            exit();
        }

        return $result;
    }
}
