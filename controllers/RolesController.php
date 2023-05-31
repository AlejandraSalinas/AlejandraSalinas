<?php
require_once '../models/RolesModel.php';

$controller = new RolesController;
class RolesController
{
    private $rol;

    public function __construct()
    {
        $this->rol = new RolesModel();

        if (isset($_REQUEST['c'])) {
            switch ($_REQUEST['c']) {
                case '1': //Almacenar en la base de datos
                    self::store();
                    break;
                case '2': //Ver Roles
                    self::show();
                    break;
                case '3': //Actualizar Roles 
                    self::update();
                    break;
                case '4': //Eliminar Roles 
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
        return $this->rol->getAll();
    }

    public function store()
    {
        $datos = [
            'nombre' => $_REQUEST['nombre']
        ];

        $result = $this->rol->store($datos);

        if ($result) {
            header("Location: ../Views/roles/index.php");
            exit();
        }

        return $result;
    }
    
    public function show()
    {
        $id_rol = $_REQUEST['id_rol'];
        header('location: ../Views/roles/index.php?id_rol=' . $id_rol);
    }

    public function delete()
    {
        $this->rol->delete($_REQUEST['id_rol']);
        header("Location: ../Views/roles/index.php");
    }
    public function update()
    {
        $datos = [
            'id_rol'   => $_REQUEST['id_rol'],
            'nombre'   => $_REQUEST['nombre'],
        ];

        $result = $this->rol->update($datos);

        if ($result) {
            echo json_encode(array('succes' => 1, 'nombre' => $datos['nombre']));
        }
    }
}
