<?php
require_once  '../models/PersonaModel.php';

$controller = new PersonaController;

class PersonaController
{
    private $persona;

    public function __construct()
    {
        $this->persona = new personaModel();

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
        return $this->persona->getAll();
    }
    public function store()
    {
        $datos = [
            'tipo_identificacion' => $_REQUEST['tipo_identificacion'],
            'numero_identificacion' => $_REQUEST['numero_identificacion'],
            'primer_nombre'         => $_REQUEST['primer_nombre'],
            'segundo_nombre'        => $_REQUEST['segundo_nombre'],
            'primer_apellido'       => $_REQUEST['primer_apellido'],
            'segundo_apellido'      => $_REQUEST['segundo_apellido'],
            'email'                 => $_REQUEST['email'],
            'telefono'              => $_REQUEST['telefono'],
            'direccion'             => $_REQUEST['direccion'],
            'id_sexo'               => $_REQUEST['id_sexo'],
            'id_rol'                => $_REQUEST['id_rol'],
        ];

        $result = $this->persona->store($datos);

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
        $this->persona->delete($_REQUEST['id_persona']);
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

        $result = $this->persona->update($datos);

        if ($result) {
            header('location: ../Views/usuarios/index.php');
            exit();
        }

        return $result;
    }
}
