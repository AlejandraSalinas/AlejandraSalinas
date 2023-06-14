<?php
require_once  '../models/tipoIdentificacionModel.php.php';

$controllersDispositivo = new tipoDispositivoController;

class tipoDispositivoController{
    private $id_tipo_dispositivo;

    public function __construct(){
        $this->id_tipo_dispositivo = new TipoDispositivoModel();

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
        return $this->id_tipo_dispositivo->getAll();
    }
    public function store()
    {
        $datos = [
            'nombre'   => $_REQUEST['nombre']
        ];

        $result = $this->id_tipo_dispositivo->store($datos);

        if ($result) {
            //header("Location: ../Views/tipoIdentificacion/index.php");
            exit();
        }

        return $result;
    }
    public function show()
    {
        $id_id_tipo_dispositivo = $_REQUEST['id_id_tipo_dispositivo'];
        header("Location: ../Views/dispositivo/show.php?id_tipo_identificaion=" . $id_id_tipo_dispositivo);
    }
    public function delete()
    {
        $this->id_tipo_dispositivo->delete($_REQUEST['id_id_tipo_dispositivo']);
        //header("Location: ../Views/tipoIdentificaion/index.php");
    }
    public function update()
    {
        $datos = [
            'id_tipo_identificaion' => $_REQUEST['id_tipo_identificaion'],
            'nombre' => $_REQUEST['nombre']
        ];
        $result = $this->id_tipo_dispositivo->update($datos);

        if ($result) {
            echo json_encode(array('succes' => 1, 'nombre' => $datos['nombre']));
        }
    }
}