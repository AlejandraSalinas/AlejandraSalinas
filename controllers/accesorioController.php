<?php

require_once '../models/accesorioModel.php';

$controllerAccesorio = new AccesorioController;

class AccesorioController
{
    private $accesorio;

    public function __construct()
    {
        $this->accesorio = new AccesorioModel();

        if (isset($_REQUEST['c'])) {
            switch ($_REQUEST['c']) {
                case '1': //Almacenar en la base de datos
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
        return $this->accesorio->getAll();
    }

    public function store()
    {        
        $datos = [
            'id_persona'           => $_REQUEST['id_persona'],
            'nombre_accesorio'                => $_REQUEST['nombre_accesorio'],
            'serie'                => $_REQUEST['serie'],
            'descripcion'                 => $_REQUEST['descripcion'],
        ];

        $result = $this->accesorio->store($datos);
        if ($result) {
            header("Location: ../Views/accesorios/index.php");
            exit();
        }
        return $result;
        // var_dump($datos);
        // die();
    }

    public function show()
    {
        $id_accesorio = $_REQUEST['id_accesorio'];
        header("Location: ../Views/accesorios/show.php?id_accesorio=" . $id_accesorio);
    }

    public function delete()
    {
        $this->accesorio->delete($_REQUEST['id_accesorio']);
        header("Location: ../Views/accesorios/index.php");
    }
    public function update()
    {
        $datos = [
            'id_accesorio'             => $_REQUEST['id_accesorio'],
            'id_persona'           => $_REQUEST['id_persona'],
            'nombre_accesorio'                => $_REQUEST['nombre_accesorio'],
            'serie'                => $_REQUEST['serie'],
            'descripcion'                 => $_REQUEST['descripcion'],

        ];
        $result = $this->accesorio->update($datos);

        if ($result) {
            header("Location: ../Views/accesorios/index.php");
            exit();
        }
        return $result;
    }
}
