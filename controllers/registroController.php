<?php
require_once  '../models/registroModels.php';
// calculadora
$registro = new RegistroController;

class RegistroController{
    private $registro;
    public function __construct(){
        $this->registro = new RegistroModel();

        if (isset($_REQUEST['c'])) {
            switch ($_REQUEST['c']) {
                case 1: //Almacenar en la base de datos
                    self::store();
                    break;
                // case 2: //Ver usuario
                //     self::show();
                //     break;
                // case 3: //Actualizar el registro 
                //     self::update();
                //     break;
                // case 4: //Actualizar el registro 
                //     self::delete();
                //     break;
                default:
                    self::index();
                    break;
            }
        }
    }
    public function index()
    {
        return $this->registro->getAll();
    }
    public function store()
    {
        $datos = [
            'tipo_identificacion'   => $_REQUEST['tipo_identificacion'],
            'numero_identificacion' => $_REQUEST['numero_identificacion'],
            'primer_nombre'         => $_REQUEST['primer_nombre'],
            'segundo_nombre'        => $_REQUEST['segundo_nombre'],
            'primer_apellido'       => $_REQUEST['primer_apellido'],
            'segundo_apellido'      => $_REQUEST['segundo_apellido'],
            'email'                 => $_REQUEST['email'],
            'telefono'              => $_REQUEST['telefono'],
            'direccion'             => $_REQUEST['direccion'],
            'sexo'                  => $_REQUEST['sexo'],
            'rol'                   => $_REQUEST['rol'],
        ];

        $result = $this->registro->store($datos);

        if ($result) {
            header("Location: " . constant('URL') . "../Views/Main/index.php");
            exit();
        }

        return $result;
    }
}