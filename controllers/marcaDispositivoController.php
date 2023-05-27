<?php
require_once  '../models/marcaDispositivoModel.php';

$controllersDispositivo = new marcaDispositivoController;

class marcaDispositivoController{
    private $marca_dispositivo;

    public function __construct(){
        $this->marca_dispositivo = new MarcaDispositivoModel();

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
        return $this->marca_dispositivo->getAll();
    }
    public function store()
    {
        $datos = [
            'nombre'   => $_REQUEST['nombre']
        ];

        $result = $this->marca_dispositivo->store($datos);

        if ($result) {
            //header("Location: ../Views/tipoDispositivoC/index.php");
            exit();
        }

        return $result;
    }
    public function show()
    {
        $id_marca = $_REQUEST['id_marca'];
        header("Location: ../Views/dispositivos/show.php?id_marca=" . $id_marca);
    }
    public function delete()
    {
        $this->marca_dispositivo->delete($_REQUEST['id_marca']);
        //header("Location: ../Views/tipoIdentificaion/index.php");
    }
    public function update()
    {
        $datos = [
            'id_marca' => $_REQUEST['id_marca'],
            'nombre' => $_REQUEST['nombre']
        ];
        $result = $this->marca_dispositivo->update($datos);

        if ($result) {
            echo json_encode(array('succes' => 1, 'nombre' => $datos['nombre']));
        }
    }
}