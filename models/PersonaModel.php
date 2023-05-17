<?php
include_once dirname(__FILE__) . '../../Config/config.php';

require_once 'dataBaseModel.php';


class PersonaModel extends stdClass
{
    private $id;
    private $tipo_identificacion;
    private $numero_identificacion;
    private $primer_nombre;
    private $segundo_nombre;
    private $primer_apellido;
    private $segundo_apellido;
    private $email;
    private $telefono;
    private $direccion;
    private $sexo;
    private $rol;
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
        $datos_usuario = [];

        try {
            $sql = "SELECT * FROM personas WHERE id = $id";
            $query  = $this->db->conect()->query($sql);

            while ($row = $query->fetch()) {
                $item                        = new PersonaModel();
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

            $sql = 'SELECT id_persona, tipo_identificacion.nombre AS tipo_identificacion, numero_identificacion, roles.nombre AS rol, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, sexo.nombre AS sexo
            FROM personas
            JOIN tipo_identificacion ON personas.id_tipo_identificacion = tipo_identificacion.id_tipo_identificacion
            JOIN roles ON personas.id_rol = roles.id_rol
            JOIN sexo ON personas.id_sexo = sexo.id_sexo';
            $query  = $this->db->conect()->query($sql);

            var_dump($query);

            while ($row = $query->fetch()) {
                $item                        = new PersonaModel();
                $item->id                    = $row['id_persona'];
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

    public function store($datos)
    {
        try {

            // $resultado = self::resultadoRegistro($datos);
            $sql = 'INSERT INTO personas(tipo_identificacion, numero_identificacion, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, email, telefono, direccion, sexo, rol) VALUES(:tipo_identificacion, :numero_identificacion, :primer_nombre, :primer_apellido, :segundo_apellido, :segundo_nombre, :email, :telefono, :direccion, :sexo, :rol)';

            $prepare = $this->db->conect()->prepare($sql);
            $query = $prepare->execute([
                'tipo_identificacion'    => $datos['tipo_identificacion'],
                'numero_identificacion'  => $datos['numero_identificacion'],
                'primer_nombre'          => $datos['primer_nombre'],
                'segundo_nombre'         => $datos['segundo_nombre'],
                'primer_apellido'        => $datos['primer_apellido'],
                'segundo_apellido'       => $datos['segundo_apellido'],
                'email'                  => $datos['email'],
                'telefono'               => $datos['telefono'],
                'direccion'              => $datos['direccion'],
                'sexo'                   => $datos['sexo'],
                'rol'                    => $datos['rol'],
            ]);

            if ($query) {
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
