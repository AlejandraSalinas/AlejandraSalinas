<?php
require_once '../models/TurnosModel.php';

$controller = new TurnosController;

class TurnosController
{
    private $turnos;

    public function __construct()
    {
        $this->turnos = new TurnosModel();

        if (isset($_REQUEST['c'])) {
            switch ($_REQUEST['c']) {
                case 1: //Almacenar en la base de datos
                    self::store();
                    break;
                case 2: //Ver turnos
                    self::show();
                    break;
                case 3: //Actualizar turnos 
                    self::update();
                    break;
                case 4: //Eliminar turnos 
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
        return $this->turnos->getAll();
    }
    public function store()
    {
        $datos = [            
            // 'id_turno'    => $_REQUEST['id_turno'],
            'fecha'       => $_REQUEST['fecha'],
            'hora_inicio' => $_REQUEST['hora_inicio'],
            'hora_fin'    => $_REQUEST['hora_fin']
        ];

        $result = $this->turnos->store($datos);

        if ($result) {
            header("Location: ../Views/turnos/index.php");
            exit();
        }

        return $result;
    }

    public function show()
    {
        $id_turno = $_REQUEST['id_turno'];
        header("location: ../Views/turnos/update.php?id_turno=" . $id_turno);
    }

    public function delete()
    {
        $this->turnos->delete($_REQUEST['id_turno']);
        header("location: ../Views/turnos/index.php");
    }

    public function update()
    {
        $datos = [
            'id_turno'     => $_REQUEST['id_turno'],
            'fecha'         => $_REQUEST['fecha'],
            'hora_inicio'   => $_REQUEST['hora_inicio'],
            'hora_fin'      => $_REQUEST['hora_fin']
        ];

        $result = $this->turnos->update($datos);

        if ($result) {

            header('location: ../Views/turnos/index.php');
            exit();
        }

        return $result;
    }
}
