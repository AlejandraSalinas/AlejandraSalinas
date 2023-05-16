<?php
include_once dirname(__FILE__) . '../Config/config.php';
require_once 'dataBaseModel.php';


class RegistroModel extends stdClass {
    private $id;
    public $tipo_identificacion;
    public $numero_identificación;
    public $primer_nombre;
    public $segundo_nombre;
    public $primer_apellido;
    public $segundo_apellido;
    public $email;
    public $telefono;
    public $direccion;
    public $sexo;
    public $rol;
    private $db;

    public function __construct()
    {
        $this->db = new DataBase();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getbyId($id)
    {
        // operacion
        $relacion = [];

        try {
            $sql = "SELECT * FROM personas WHERE id = $id";
            $query  = $this->db->conect()->query($sql);


            while ($row = $query->fetch()) {
                $item                        = new RegistroModel();
                $item->id                    = $row['id'];
                $item->tipo_identificacion   = $row['tipo_identificacion'];
                $item->numero_identificacion = $row['numero_identificacion'];
                $item->primer_nombre         = $row['primer_nombre'];
                $item->segundo_nombre        = $row['segundo_nombre'];
                $item->primer_apellido       = $row['primer_apellido'];
                $item->segundo_apellido      = $row['segundo_apellido'];
                $item->email                 = $row['email'];
                $item->telefono              = $row['telefono'];
                $item->direccion             = $row['direccion'];
                $item->sexo                  = $row['sexo'];
                $item->rol                   = $row['rol'];

                array_push($relacion, $item);
            }

            return $relacion;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


    public function getAll()
    {
        $items = [];

        try {

            $sql = 'SELECT personas.id, personas.tipo_identificacion, personas.numero_identificacion, personas.primer_nombre, personas.segundo_nombre, personas.primer_apellido, personas.segundo_apellido, 
            personas.email, personas.telefono, personas.direccion, personas.sexo, personas.rol, OPERADORES.nombre AS operacion, operaciones.resultado FROM operaciones JOIN OPERADORES ON operaciones.operacion = OPERADORES.id';
            $query  = $this->db->conect()->query($sql);


            while ($row = $query->fetch()) {
                $item                        = new RegistroModel();
                $item->id                    = $row['id'];
                $item->tipo_identificacion   = $row['tipo_identificacion'];
                $item->numero_identificacion = $row['numero_identificacion'];
                $item->primer_nombre         = $row['primer_nombre'];
                $item->segundo_nombre        = $row['segundo_nombre'];
                $item->primer_apellido       = $row['primer_apellido'];
                $item->segundo_apellido      = $row['segundo_apellido'];
                $item->email                 = $row['email'];
                $item->telefono              = $row['telefono'];
                $item->direccion             = $row['direccion'];
                $item->sexo                  = $row['sexo'];
                $item->rol                   = $row['rol'];

                array_push($items, $item);
            }

            return $items;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    // public function store($datos)
    // {
    //     try {

    //         // $resultado = self::resultadoRegistro($datos);
    //         // $sql = 'INSERT INTO personas(tipo_identificacion, numero_identificacion, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, email, telefono, direccion, sexo, rol) VALUES(:tipo_identificacion, :numero_identificacion, :primer_nombre, :primer_apellido, :segundo_apellido, :segundo_nombre, :email, :telefono, :direccion, :sexo, :rol)';

    //         // $prepare = $this->db->conect()->prepare($sql);
    //         $query = $prepare->execute([
    //             'tipo_identificacion'    => $datos['tipo_identificacion'],
    //             'numero_identificacion'  => $datos['numero_identificacion'],
    //             'primer_nombre'          => $datos['primer_nombre'],
    //             'segundo_nombre'         => $datos['segundo_nombre'],
    //             'primer_apellido'        => $datos['primer_apellido'],
    //             'segundo_apellido'       => $datos['segundo_apellido'],
    //             'email'                  => $datos['email'],
    //             'telefono'               => $datos['telefono'],
    //             'direccion'              => $datos['direccion'],
    //             'sexo'                   => $datos['sexo'],
    //             'rol'                    => $datos['rol'],
    //         ]);

    //         if ($query) {
    //             return true;
    //         }
    //     } catch (PDOException $e) {
    //         die($e->getMessage());
    //     }
    // }
}
