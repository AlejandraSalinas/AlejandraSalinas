<?php
require_once  '../models/SexoModel.php';

$controller = new SexoController;

class SexoController
{
    private $sexo;

    public function __construct()
    {
        $this->sexo = new SexoModel();

        if (isset($_REQUEST['c'])) {
            switch ($_REQUEST['c']) {
                case '1': //Almacenar en la base de datos
                    self::store();
                    break;
                case '2': //Ver sexo
                    self::show();
                    break;
                case '3': //Actualizar sexo
                    self::update();
                    break;
                case '4': //eliminar sexo
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
        return $this->sexo->getAll();
    }
    public function store()
    {
        $datos = [
            'nombre'   => $_REQUEST['nombre']
        ];

        $result = $this->sexo->store($datos);

        if ($result) {
            header("Location: ../Views/sexo/index.php");
            exit();
        }

        return $result;
    }
    public function show()
    {
        $id_sexo = $_REQUEST['id_sexo'];
        header("Location: ../Views/sexo/index.php?id_sexo=" . $id_sexo);
    }
    public function delete()
    {
        $this->sexo->delete($_REQUEST['id_sexo']);
        header("Location: ../Views/sexo/index.php");
    }
    public function update()
    {
        $datos = [
            'id_sexo' => $_REQUEST['id_sexo'],
            'nombre'  => $_REQUEST['nombre']
        ];

        $result = $this->sexo->update($datos);

        if ($result) {
            echo json_encode(array('succes' => 1, 'nombre' => $datos['nombre']));
        }
    }
}
