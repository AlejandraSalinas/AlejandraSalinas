<?php
require_once  '../models/tipoIdentificacionModel.php.php';

$controllersDispositivo = new EntradaController;

class EntradaController{
    private $fecha_entrada;

    public function __construct(){
        $this->fecha_entrada = new EntradaModel();

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
        return $this->fecha_entrada->getAll();
    }
    public function store()
    {
        $datos = [
            'nombre'   => $_REQUEST['nombre']
        ];

        $result = $this->fecha_entrada->store($datos);

        if ($result) {
            //header("Location: ../Views/tipoIdentificacion/index.php");
            exit();
        }

        return $result;
    }
    public function show()
    {
        $id_fecha_entrada = $_REQUEST['id_fecha_entrada'];
        header("Location: ../Views/dispositivo/show.php?id_tipo_identificaion=" . $id_fecha_entrada);
    }
    public function delete()
    {
        $this->fecha_entrada->delete($_REQUEST['id_fecha_entrada']);
        //header("Location: ../Views/tipoIdentificaion/index.php");
    }
    public function update()
    {
        $datos = [
            'id_tipo_identificaion' => $_REQUEST['id_tipo_identificaion'],
            'nombre' => $_REQUEST['nombre']
        ];
        $result = $this->fecha_entrada->update($datos);

        if ($result) {
            echo json_encode(array('succes' => 1, 'nombre' => $datos['nombre']));
        }
    }
}