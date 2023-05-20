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
                // case 2: //Ver usuario
                //     self::show();
                //     break;
                // case 3: //Actualizar el registro 
                //     self::update();
                //     break;
                // case 4: //Eliminar el registro 
                //     self::delete();
                //     break;
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
            'rol' => $_REQUEST['rol']
        ];

        $result = $this->rol->store($datos);

        if ($result) {
            header("Location: " . constant('URL') . "../Views/Main/index.php");
            exit();
        }

        return $result;
    }
}
