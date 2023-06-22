<?php
require_once  '../models/accesoriosDispositivoModel.php';

$controllersDispositivo = new accesoriosDispositivoController;

class accesoriosDispositivoController{
    private $accesorios;

    public function __construct(){
        $this->accesorios = new AccesoriosDispositivoModel();

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
        return $this->accesorios->getAll();
    }

    public function store()
    {
        $datos = [
            'nombre' => $_REQUEST['nombre']
        ];

        $result = $this->accesorios->store($datos);

        if ($result) {
            header("Location: ../Views/configAccesorios/index.php");
            exit();
        }

        return $result;
    }
    
    public function show()
    {
        $id_accesorio = $_REQUEST['id_accesorio'];
        header('location: ../Views/configAccesorios/index.php?id_accesorio=' . $id_accesorio);
    }

    public function delete()
    {
        $this->accesorios->delete($_REQUEST['id_accesorio']);
        header("Location: ../Views/configAccesorios/index.php");
    }
    public function update()
    {
        $datos = [
            'id_accesorio'   => $_REQUEST['id_accesorio'],
            'nombre'   => $_REQUEST['nombre'],
        ];

        $result = $this->accesorios->update($datos);

        if ($result) {
            echo json_encode(array('succes' => 1, 'nombre' => $datos['nombre']));
        }
    }
}