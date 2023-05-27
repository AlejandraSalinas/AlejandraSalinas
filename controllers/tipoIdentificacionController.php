<?php
require_once  '../models/TipoIdentificacionModel.php';

$controller = new tipoIdentificacionController;

class tipoIdentificacionController
{
    private $tipo_identificacion;

    public function __construct()
    {
        $this->tipo_identificacion = new TipoIdentificacionModel();

        if (isset($_REQUEST['c'])) {
            switch ($_REQUEST['c']) {
                case 1: //Almacenar en la base de datos
                    self::store();
                    break;
                case 2: //Ver identificacion
                    self::show();
                    break;
                case '3': //Actualizar identificacion
                    self::update();
                    break;
                case '4': //eliminar identificacion
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
            header("Location: ../Views/tipoIdentificacion/index.php");
            exit();
        }

        return $result;
    }
    public function show()
    {
        $id_tipo_identificacion = $_REQUEST['id_tipo_identificacion'];
        header("Location: ../Views/tipoIdentificacion/index.php?id_tipo_identificacion=" . $id_tipo_identificacion);
    }
    public function delete()
    {
        $this->tipo_identificacion->delete($_REQUEST['id_tipo_identificacion']);
        header("Location: ../Views/tipoIdentificacion/index.php");
    }
    public function update()
    {
        $datos = [
            'id_tipo_identificacion' => $_REQUEST['id_tipo_identificacion'],
            'nombre'                 => $_REQUEST['nombre']
        ];

        $result = $this->tipo_identificacion->update($datos);

        if ($result) {
            echo json_encode(array('succes' => 1, 'nombre' => $datos['nombre']));
        }
    }
}
