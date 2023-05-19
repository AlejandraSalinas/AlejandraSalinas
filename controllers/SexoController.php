<?php

use LDAP\Result;

require_once '../models/SexoModel.php';

$controller = new SexoController;

class SexoController
{
    private $sexo;

    public function __construct()
    {
        $this->sexo = new SexoModel();

        if (isset($_REQUEST['c'])){
            switch ($_REQUEST['c']) {
                case '1': //Almacenar en la base de datos
                    self::store();
                    break;
                
                default:
                    self::index();
                    break;
            }
        }
    }

    public function index()
    {
        return $this->sexo-> getAll();
    }
    public function store()
    {
        $datos = [
            'sexo' => $_REQUEST['sexo']
        ];

        $result = $this->sexo->store($datos);

        if ($result) {
            header("localtion: " . constant('URL') . "../Views/Main/index.php");
        }
        return $result;
    }
}
