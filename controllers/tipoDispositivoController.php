<?php
require_once '../models/tipoDispositivoModel.php';

$controller = new tipoDispositivoController;
class tipoDispositivoController
{
    private $dispositivos;

    public function __construct()
    {
        $this->dispositivos = new tipoDispositivoModel();

        if (isset($_REQUEST['c'])) {
            switch ($_REQUEST['c']) {
                case '1': //Almacenar en la base de datos
                    self::store();
                    break;
                case '2': //Ver 
                    self::show();
                    break;
                case '3': //Actualizar  
                    self::update();
                    break;
                case '4': //Eliminar  
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
        return $this->dispositivos->getAll();
    }

    public function store()
    {
        $datos = [
            'nombre' => $_REQUEST['nombre']
        ];

        $result = $this->dispositivos->store($datos);

        if ($result) {
            header("Location: ../Views/configTipoDispositivo/index.php");
            exit();
        }

        return $result;
    }
    
    public function show()
    {
        $id_tipo_dispositivo = $_REQUEST['id_tipo_dispositivo'];
        header('location: ../Views/configTipoDispositivo/index.php?id_tipo_dispositivo=' . $id_tipo_dispositivo);
    }

    public function delete()
    {
        $this->dispositivos->delete($_REQUEST['id_tipo_dispositivo']);
        header("Location: ../Views/configTipoDispositivo/index.php");
    }
    public function update()
    {
        $datos = [
            'id_tipo_dispositivo'   => $_REQUEST['id_tipo_dispositivo'],
            'nombre'   => $_REQUEST['nombre'],
        ];

        $result = $this->dispositivos->update($datos);

        if ($result) {
            echo json_encode(array('succes' => 1, 'nombre' => $datos['nombre']));
        }
    }
}