<?php
require_once  '../models/AdministradorModel.php';

$controller = new AdministradorController;

class AdministradorController
{
    private $administrador;

    public function __construct()
    {
        $this->administrador = new AdministradorModel();

        if (isset($_REQUEST['c'])) {
            switch ($_REQUEST['c']) {
                case 1: //Almacenar en la base de datos
                    self::store();
                    break;
                case 2: //Ver usuario
                    self::show();
                    break;
                case 3: //Actualizar el registro 
                    self::update();
                    break;
                case 4: //Eliminar el registro 
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
        return $this->administrador->getAll();
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
            'password'              => $_REQUEST['password'],
            'inicio_contrato'       => $_REQUEST['inicio_contrato'],
            'fin_contrato'          => $_REQUEST['fin_contrato'],
            'estado'                => $_REQUEST['estado'],
            'id_sexo'               => $_REQUEST['id_sexo'],
            'id_rol'                => $_REQUEST['id_rol'],
        ];

        $result = $this->administrador->store($datos);

        if ($result) {
            header("Location: ../Views/usuarios/index.php");
            exit();
        }

        return $result;
    }

    public function show()
    {
        $id_persona = $_REQUEST['id_persona'];
        header("location: ../Views/usuarios/update.php?id_persona=" . $id_persona);
    }

    public function delete()
    {
        $this->administrador->delete($_REQUEST['id_persona']);
        header("location: ../Views/usuarios/index.php");
    }

    public function update()
    {
        $datos = [
            'id_persona'             => $_REQUEST['id_persona'],
            'id_tipo_identificacion' => $_REQUEST['id_tipo_identificacion'],
            'numero_identificacion'  => $_REQUEST['numero_identificacion'],
            'primer_nombre'          => $_REQUEST['primer_nombre'],
            'segundo_nombre'         => $_REQUEST['segundo_nombre'],
            'primer_apellido'        => $_REQUEST['primer_apellido'],
            'segundo_apellido'       => $_REQUEST['segundo_apellido'],
            'email'                  => $_REQUEST['email'],
            'telefono'               => $_REQUEST['telefono'],
            'direccion'              => $_REQUEST['direccion'],
            'id_sexo'                => $_REQUEST['id_sexo'],
            'id_rol'                 => $_REQUEST['id_rol'],
        ];

        $result = $this->administrador->update($datos);

        if ($result) {
            header('location: ../Views/usuarios/index.php');
            exit();
        }

        return $result;
    }
}
