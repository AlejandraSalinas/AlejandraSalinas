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
                case 1: //Almacenar en la base de datos
                    self::store();
                    break;
                case 2: //Ver Roles
                    self::show();
                    break;
                case 3: //Actualizar Roles 
                    self::update();
                    break;
                case 4: //Eliminar Roles 
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
            header("Location: ../Views/Main/index.php");
            exit();
        }

        return $result;
    }
    
    public function show()
    {
        $id_rol = $_REQUEST['id_rol'];
        header('location: ../Views/usuarios/show.php?id_persona=' . $id_rol);
    }

    public function delete()
    {
        $this->rol->delete($_REQUEST['id_rol']);
        header('location: ../Views/usuarios/index.php');
    }
    public function update()
    {

        $datos = [
            'id_rol'   => $_REQUEST['id_rol'],
            'nombre'   => $_REQUEST['nombre'],
        ];


        $result = $this->rol->update($datos);

        if ($result) {
            header("Location: ../Views/usuario/index.php");
            exit();
        }

        return $result;
    }
}
