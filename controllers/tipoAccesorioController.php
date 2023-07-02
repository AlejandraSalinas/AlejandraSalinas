<?php
require_once '../models/tipoaccesorioModel.php';

$controller = new tipoaccesorioController;
class tipoaccesorioController
{
    private $accesorios;

    public function __construct()
    {
        $this->accesorios = new tipoAccesorioModel();
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
        return $this->accesorios->getAll();
    }

    public function store()
    {
        $datos = [
            'nombre' => $_REQUEST['nombre']
        ];

        $result = $this->accesorios->store($datos);

        if ($result) {
            header("Location: ../Views/configTipoaccesorio/index.php");
            exit();
        }

        return $result;
    }
    
    public function show()
    {
        $id_tipo_accesorio = $_REQUEST['id_tipo_accesorio'];
        header('location: ../Views/configTipoaccesorio/index.php?id_tipo_accesorio=' . $id_tipo_accesorio);
    }

    public function delete()
    {
        $this->accesorios->delete($_REQUEST['id_tipo_accesorio']);
        header("Location: ../Views/configTipoaccesorio/index.php");
    }
    public function update()
    {
        $datos = [
            'id_tipo_accesorio'   => $_REQUEST['id_tipo_accesorio'],
            'nombre'   => $_REQUEST['nombre'],
        ];

        $result = $this->accesorios->update($datos);

        if ($result) {
            echo json_encode(array('succes' => 1, 'nombre' => $datos['nombre']));
        }
    }
}