<?php
require_once  '../models/AdministradorModel.php';

$controller = new VigilanteController;

class VigilanteController
{
    private $vigilante;

    public function __construct()
    {
        $this->vigilante = new VigilanteModel();

        if (isset($_REQUEST['c'])) {
            switch ($_REQUEST['c']) {
                case 1: //Almacenar en la base de datos
                    self::store();
                    break;
                case 2: //Ver vigilante
                    self::show();
                    break;
                case 3: //Actualizar vigilante 
                    self::update();
                    break;
                case 4: //Eliminar vigilante 
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
        return $this->vigilante->getAll();
    }
    public function store()
    {
        $datos = [            
            'pass'              => $_REQUEST['pass'],
            'inicio_contrato'   => $_REQUEST['inicio_contrato'],
            'fin_contrato'      => $_REQUEST['fin_contrato'],
            'estado'            => $_REQUEST['estado']
        ];

        $result = $this->administrador->store($datos);

        if ($result) {
            header("Location: ../Views/vigilante/index.php");
            exit();
        }

        return $result;
    }

    public function show()
    {
        $id_persona = $_REQUEST['id_vigilante'];
        header("location: ../Views/vigilante/update.php?id_vigilante=" . $id_vigilante);
    }

    public function delete()
    {
        $this->administrador->delete($_REQUEST['id_vigilante']);
        header("location: ../Views/vigilante/index.php");
    }

    public function update()
    {
        $datos = [
            
            'pass'               => $_REQUEST['pass'],
            'inicio_contrato'    => $_REQUEST['inicio_contrato'],
            'fin_contrato'       => $_REQUEST['fin_contrato'],
            'estado'             => $_REQUEST['estado']
        ];

        $result = $this->administrador->update($datos);

        if ($result) {
            header('location: ../Views/vigilante/index.php');
            

            exit();
        }

        return $result;
    }
}
