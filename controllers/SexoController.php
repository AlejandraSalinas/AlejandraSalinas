<?php
require_once '../models/SexoModel.php';

$controller = new SexoController;

class SexoController
{
    private $sexo;

    public function __construct()
    {
        $this->sexo = new SexoModel();

        if (isset($_REQUEST['c'])) {
            switch ($_REQUEST['c']) {
                case '1': //Almacenar en la base de datos
                    self::store();
                    break;
                case '2': //ver Sexo
                    self::show();
                    break;
                case '3': //Actualizar Sexo
                    self::update();
                    break;
                case '4': //eliminar Sexo
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
        return $this->sexo->getAll();
    }
    public function store()
    {
        $datos = [
            'id_sexo' => $_REQUEST['id_sexo']
        ];
        $result = $this->sexo->store($datos);

        if ($result) {
            header('Location: ../Views/usuarios/index.php');
            exit();
        } 
    }
    public function show()
    {
        $id_sexo = $_REQUEST['id_sexo'];
        header('Location: ../Views/usuarios/index.php='.$id_sexo);
    }
    public function delete()
    {
        $this->sexo->delete($_REQUEST['id_sexo']);
        header('Location: ../Views/usuarios/index.php');
    }
    public function update()
    {
         $datos = [
            'id_sexo' => $_REQUEST['id_sexo'],
            'nombre'  => $_REQUEST['nombre']

        ];
        $result = $this->sexo->update($datos);

        if ($result) {
            header('Location: ../Views/usuarios/index.php');
            exit();
        }
        return $result;
    }
    
}
