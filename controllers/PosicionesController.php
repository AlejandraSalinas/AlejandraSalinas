<?php
require_once  '../models/PosicionesModel.php';

$controller = new PosicionesController;

class PosicionesController
{
    private $posicion;

    public function __construct()
    {
        $this->posicion = new PosicionesModel();

        if (isset($_REQUEST['c'])) {
            switch ($_REQUEST['c']) {
                case '1': //Almacenar en la base de datos
                    self::store();
                    break;
                case '2': //Ver posiciones
                    self::show();
                    break;
                case '3': //Actualizar posiciones
                    self::update();
                    break;
                case '4': //eliminar posiciones
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
        return $this->posicion->getAll();
    }
    public function store()
    {
        $datos = [
            'nombre'   => $_REQUEST['nombre']
        ];

        $result = $this->posicion->store($datos);

        if ($result) {
            header("Location: ../Views/posiciones/index.php");
            exit();
        }

        return $result;
    }
    public function show()
    {
        $id_posicion = $_REQUEST['id_posicion'];
        header("Location: ../Views/posicones/index.php?id_posicion=" . $id_posicion);
    }
    public function delete()
    {
        $this->posicion->delete($_REQUEST['id_posicion']);
        header("Location: ../Views/posiciones/index.php");
    }
    public function update()
    {
        $datos = [
            'id_posicion' => $_REQUEST['id_posicion'],
            'nombre'      => $_REQUEST['nombre']
        ];

        $result = $this->posicion->update($datos);

        if ($result) {
            echo json_encode(array('succes' => 1, 'nombre' => $datos['nombre']));
        }
    }
}
