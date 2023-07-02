<?php

require_once  '../models/personaNombreModel.php.php';

$controllersDispositivo = new personaNombreModel;

class personaNombreModel{
    private $id_persona;

    public function __construct(){
        $this->id_persona = new personaNombreModel();

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
        return $this->id_persona->getAll();
    }
    public function store()
    {
        $datos = [
            'nombre'   => $_REQUEST['nombre']
        ];

        $result = $this->id_persona->store($datos);

        if ($result) {
            //header("Location: ../Views/tipoDispositivoC/index.php");
            exit();
        }

        return $result;
    }
    public function show()
    {
        $id_id_persona = $_REQUEST['id_id_persona'];
        header("Location: ../Views/dispositivos/show.php?id_id_persona=" . $id_id_persona);
    }
    public function delete()
    {
        $this->id_persona->delete($_REQUEST['id_id_persona']);
        //header("Location: ../Views/tipoIdentificaion/index.php");
    }
    public function update()
    {
        $datos = [
            'id_id_persona' => $_REQUEST['id_id_persona'],
            'nombre' => $_REQUEST['nombre']
        ];
        $result = $this->id_persona->update($datos);

        if ($result) {
            echo json_encode(array('succes' => 1, 'nombre' => $datos['nombre']));
        }
    }
}