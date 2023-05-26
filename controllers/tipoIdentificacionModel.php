<?php
require_once  '../models/tipoIdentificacionModel.php';

$controllersDispositivo = new tipoIdentificacionController;

class tipoIdentificacionController{
    private $tipo_identificacion;

    public function __construct(){
        $this->tipo_identificacion = new tipoIdentificacionModel();

        if (isset($_REQUEST['c'])) {
            switch ($_REQUEST['c']) {
                case 1: //Almacenar en la base de datos
                    self::store();
                    break;
                case 2: //Ver documento
                    self::show();
                    break;
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
            'id_tipo_identificacion'   => $_REQUEST['id_tipo_identificacion']
        ];

        $result = $this->tipo_identificacion->store($datos);

        if ($result) {
            header("Location: ../Views/usaurios/index.php");
            exit();
        }

        return $result;
    }
    public function show()
    {
        $id_tipo_identificacion = $_REQUEST['id_tipo_identificacion'];
        header("Location: ../Views/dispositivo/show.php?id_tipo_identificacion=" .$id_tipo_identificacion);
    }
}