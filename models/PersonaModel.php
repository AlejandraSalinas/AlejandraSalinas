<?php
include_once dirname(__FILE__) . '../../Config/config.php';

require_once 'dataBaseModel.php';


class Persona
{
    private $id_persona;
    private $tipo_identificacion;
    private $numero_identificacion;
    private $primer_nombre;
    private $segundo_nombre;
    private $primer_apellido;
    private $segundo_apellido;
    private $email;
    private $telefono;
    private $direccion;
    private $id_sexo;
    private $id_rol;
    private $db;

    public function __construct()
    {
        $this->db = new DataBase();
    }

    public function getId()
    {
        return $this->id_persona;
    }

    public function getbyId($id_persona)
    {
        // operacion
        $datos_usuario = [];

        try {
            $sql = "SELECT * FROM personas WHERE id_persona = $id_persona";
            $query  = $this->db->conect()->query($sql);
            $query->execute([
                'id_persona' => $id_persona
            ]);

            while ($row = $query->fetch()) {
                $item                        = new Persona();
                $item->id_persona            = $row['id_persona'];
                $item->tipo_identificacion   = $row['tipo_identificacion'];
                $item->numero_identificacion = $row['numero_identificacion'];
                $item->primer_nombre         = $row['primer_nombre'];
                $item->segundo_nombre        = $row['segundo_nombre'];
                $item->primer_apellido       = $row['primer_apellido'];
                $item->segundo_apellido      = $row['segundo_apellido'];
                $item->email                 = $row['email'];
                $item->telefono              = $row['telefono'];
                $item->direccion             = $row['direccion'];
                $item->id_sexo               = $row['id_sexo'];
                $item->id_rol                = $row['id_rol'];

                array_push($datos_usuario, $item);
            }

            return $datos_usuario;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


    public function getAll()
    {
        $items = [];

        try {

            $sql = 'SELECT id_persona, tipo_identificacion.nombre AS tipo_identificacion, numero_identificacion, roles.nombre AS rol, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, email, sexo.nombre AS sexo
            FROM personas
            JOIN tipo_identificacion ON personas.id_tipo_identificacion = tipo_identificacion.id_tipo_identificacion
            JOIN roles ON personas.id_rol = roles.id_rol
            JOIN sexo ON personas.id_sexo = sexo.id_sexo';
            $query  = $this->db->conect()->query($sql);

            var_dump($query);

            while ($row = $query->fetch()) {
                $item                        = new Persona();
                $item->id_persona            = $row['id_persona'];
                $item->tipo_identificacion   = $row['tipo_identificacion'];
                $item->numero_identificacion = $row['numero_identificacion'];
                $item->primer_nombre         = $row['primer_nombre'];
                $item->segundo_nombre        = $row['segundo_nombre'];
                $item->primer_apellido       = $row['primer_apellido'];
                $item->segundo_apellido      = $row['segundo_apellido'];
                $item->email                 = $row['email'];
                $item->telefono              = $row['telefono'];
                $item->direccion             = $row['direccion'];
                $item->id_sexo               = $row['id_sexo'];
                $item->id_rol                = $row['id_rol'];

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
            $sql = 'INSERT INTO personas(id_tipo_identificacion, numero_identificacion, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, email, telefono, direccion, id_sexo, id_rol) VALUES(:tipo_identificacion, :numero_identificacion, :primer_nombre, :primer_apellido, :segundo_apellido, :segundo_nombre, :email, :telefono, :direccion, :id_sexo, :id_rol)';

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
                'id_sexo'                   => $datos['id_sexo'],
                'id_rol'                    => $datos['id_rol'],
            ]);

            if ($query) {
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    // GETTER Y SETTER
    public function getTipoIdentificacion()
    {
        return $this->tipo_identificacion;
    }
    public function setTipoIdentificacion($tipo_identificacion)
    {
        return $this->tipo_identificacion;
    }

    public function getNumeroIdentificacion()
    {
        return $this->numero_identificacion;
    }
    public function setNumeroIdentificacion($numero_identificacion)
    {
        return $this->numero_identificacion;
    }

    public function getPrimerNombre()
    {
        return $this->primer_nombre;
    }
    public function setPrimerNombre($primer_nombre)
    {
        return $this->primer_nombre;
    }

    public function getSegundoNombre()
    {
        return $this->segundo_nombre;
    }
    public function setSegundoNombre($segundo_nombre)
    {
        return $this->segundo_nombre;
    }

    public function getPrimerApellido()
    {
        return $this->primer_apellido;
    }
    public function setPrimerApellido($segundo_apellido)
    {
        return $this->primer_apellido;
    }

    public function getSegundoApellido()
    {
        return $this->segundo_apellido;
    }
    public function setSegundoApellido($segundo_apellido)
    {
        return $this->segundo_apellido;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        return $this->email;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }
    public function setTelefono($telefono)
    {
        return $this->telefono;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }
    public function setDireccion($direccion)
    {
        return $this->direccion;
    }

    public function getSexo()
    {
        return $this->id_sexo;
    }
    public function setSexo($id_sexo)
    {
        return $this->id_sexo;
    }

    public function getRol()
    {
        return $this->id_rol;
    }
    public function setRol($id_rol)
    {
        return $this->id_rol;
    }
}
