<?php

require_once '../models/ingresoModel.php';

$controllerIngresar = new IngresarController;

class IngresarController
{
    private $ingresar;

    public function __construct()
    {
        $this->ingresar = new IngresarModel();

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
        return $this->ingresar->getAll();
    }

    public function store()
    {        
        $datos = [
            'id_ingresar'       => $_REQUEST['id_ingresar'],
            'id_persona'        => $_REQUEST['id_persona'],
            'id_dispositivo'    => $_REQUEST['id_dispositivo'],
            'id_accesorio'      => $_REQUEST['id_accesorio'],
            'fecha_entrada'     => $_REQUEST['fecha_entrada'],
            'fecha_salida'      => $_REQUEST['fecha_salida'],
        ];

        $result = $this->ingresar->store($datos);
        if ($result) {
            header("Location: ../Views/ingreso/index.php");
            exit();
        }
        return $result;
    }

    public function show()
    {
        $ingresar = $_REQUEST['id_ingresar'];
        header("location: ../Views/ingreso/update.php?ingresar=" . $ingresar);
    }
    public function delete()
    {
        $this->ingresar->delete($_REQUEST['id_ingresar']);
        header("Location: ../Views/ingreso/index.php");
    }

    public function update()
    {
        $datos = [
            'id_ingresar'       => $_REQUEST['id_ingresar'],
            'id_persona'        => $_REQUEST['id_persona'],
            'id_dispositivo'    => $_REQUEST['id_dispositivo'],
            'id_accesorio'      => $_REQUEST['id_accesorio'],
            'fecha_entrada'     => $_REQUEST['fecha_entrada'],
            'fecha_salida'      => $_REQUEST['fecha_salida'],


            // 'fecha_entrada'              => $_REQUEST['fecha_entrada'],
            // 'fecha_salida'              => $_REQUEST['fecha_salida'],

        ];
        $result = $this->ingresar->update($datos);

        if ($result) {
            header("Location: ../Views/ingreso/index.php");
            exit();
        }
        return $result;
    }
}
