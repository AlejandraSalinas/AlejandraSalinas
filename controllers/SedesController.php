<?php
require_once  '../models/SedesModel.php';

$controller = new SedesController;

class SedesController
{
    private $sede;

    public function __construct()
    {
        $this->sede = new SedesModel();

        if (isset($_REQUEST['c'])) {
            switch ($_REQUEST['c']) {
                case '1': //Almacenar en la base de datos
                    self::store();
                    break;
                case '2': //Ver sede
                    self::show();
                    break;
                case '3': //Actualizar sede
                    self::update();
                    break;
                case '4': //eliminar sede
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
        return $this->sede->getAll();
    }
    public function store()
    {
        $datos = [
            'nombre'   => $_REQUEST['nombre']
        ];

        $result = $this->sede->store($datos);

        if ($result) {
            header("Location: ../Views/sedes/index.php");
            exit();
        }

        return $result;
    }
    public function show()
    {
        $id_sede = $_REQUEST['id_sede'];
        header("Location: ../Views/sedes/index.php?id_sede=" . $id_sede);
    }
    public function delete()
    {
        $this->sede->delete($_REQUEST['id_sede']);
        header("Location: ../Views/sedes/index.php");
    }
    public function update()
    {
        $datos = [
            'id_sede' => $_REQUEST['id_sede'],
            'nombre'  => $_REQUEST['nombre']
        ];

        $result = $this->sede->update($datos);

        if ($result) {
            echo json_encode(array('succes' => 1, 'nombre' => $datos['nombre']));
        }
    }
}
