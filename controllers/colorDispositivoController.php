<?php
require_once  '../models/colorDispositivoModel.php';

$controllersDispositivo = new colorDispositivoController;

class colorDispositivoController{
    private $color_dispositivo;

    public function __construct(){
        $this->color_dispositivo = new ColorDispositivoModel();

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
        return $this->color_dispositivo->getAll();
    }
    public function store()
    {
        $datos = [
            'nombre'   => $_REQUEST['nombre']
        ];

        $result = $this->color_dispositivo->store($datos);

        if ($result) {
            //header("Location: ../Views/tipoDispositivoC/index.php");
            exit();
        }

        return $result;
    }
    public function show()
    {
        $id_color = $_REQUEST['id_color'];
        header("Location: ../Views/dispositivos/show.php?id_color=" . $id_color);
    }
    public function delete()
    {
        $this->color_dispositivo->delete($_REQUEST['id_color']);
        //header("Location: ../Views/tipoIdentificaion/index.php");
    }
    public function update()
    {
        $datos = [
            'id_color' => $_REQUEST['id_color'],
            'nombre' => $_REQUEST['nombre']
        ];
        $result = $this->color_dispositivo->update($datos);

        if ($result) {
            echo json_encode(array('succes' => 1, 'nombre' => $datos['nombre']));
        }
    }
}