<?php
require_once  '../models/tipoDispositivoModel.php';

$controllersDispositivo = new tipoDispositivoController;

class tipoDispositivoController{
    private $tipo_dispositivo;

    public function __construct(){
        $this->tipo_dispositivo = new TipoDispositivoModel();

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
        return $this->tipo_dispositivo->getAll();
    }
    public function store()
    {
        $datos = [
            'nombre'   => $_REQUEST['nombre']
        ];

        $result = $this->tipo_dispositivo->store($datos);

        if ($result) {
            //header("Location: ../Views/tipoDispositivoC/index.php");
            exit();
        }

        return $result;
    }
    public function show()
    {
        $id_tipo_dispositivo = $_REQUEST['id_tipo_dispositivo'];
        header("Location: ../Views/dispositivos/show.php?id_tipo_dispositivo=" . $id_tipo_dispositivo);
    }
    public function delete()
    {
        $this->tipo_dispositivo->delete($_REQUEST['id_tipo_dispositivo']);
        //header("Location: ../Views/tipoIdentificaion/index.php");
    }
    public function update()
    {
        $datos = [
            'id_tipo_dispositivo' => $_REQUEST['id_tipo_dispositivo'],
            'nombre' => $_REQUEST['nombre']
        ];
        $result = $this->tipo_dispositivo->update($datos);

        if ($result) {
            echo json_encode(array('succes' => 1, 'nombre' => $datos['nombre']));
        }
    }
}