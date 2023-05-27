<?php
require_once  '../models/tipoIdentificacionModel.php.php';

$controllersDispositivo = new tipoIdentificacionController;

class tipoIdentificacionController{
    private $tipo_identificacion;

    public function __construct(){
        $this->tipo_identificacion = new TipoIdentificacionModel();

        if (isset($_REQUEST['c'])) {
            switch ($_REQUEST['c']) {
                case 1: //Almacenar en la base de datos
                    self::store();
                    break;
                case '2': //ver usuario
                    self::show();
                    break;
                case '3': //Actualizar el registro
                    self::update();
                    break;
                case '4': //eliminar el registro
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
        return $this->tipo_identificacion->getAll();
    }
    public function store()
    {
        $datos = [
            'nombre'   => $_REQUEST['nombre']
        ];

        $result = $this->tipo_identificacion->store($datos);

        if ($result) {
            //header("Location: ../Views/tipoIdentificacion/index.php");
            exit();
        }

        return $result;
    }
    public function show()
    {
        $id_tipo_identificacion = $_REQUEST['id_tipo_identificacion'];
        header("Location: ../Views/dispositivo/show.php?id_tipo_identificaion=" . $id_tipo_identificacion);
    }
    public function delete()
    {
        $this->tipo_identificacion->delete($_REQUEST['id_tipo_identificacion']);
        //header("Location: ../Views/tipoIdentificaion/index.php");
    }
    public function update()
    {
        $datos = [
            'id_tipo_identificaion' => $_REQUEST['id_tipo_identificaion'],
            'nombre' => $_REQUEST['nombre']
        ];
        $result = $this->tipo_identificacion->update($datos);

        if ($result) {
            echo json_encode(array('succes' => 1, 'nombre' => $datos['nombre']));
        }
    }
}