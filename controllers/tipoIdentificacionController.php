<?php
require_once  '../models/TipoIdentificacionModel.php';

$controller = new tipoIdentificacionController;

class tipoIdentificacionController{
    private $tipo_identificacion;

    public function __construct(){
        $this->tipo_identificacion = new TipoIdentificacionModel();

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
                // case 4: //Actualizar el registro 
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
        return $this->tipo_identificacion->getAll();
    }
    public function store()
    {
        $datos = [
            'tipo_identificacion'   => $_REQUEST['tipo_identificacion']
        ];

        $result = $this->tipo_identificacion->store($datos);

        if ($result) {
            header("Location: " . constant('URL') . "../Views/Main/index.php");
            exit();
        }

        return $result;
    }
}