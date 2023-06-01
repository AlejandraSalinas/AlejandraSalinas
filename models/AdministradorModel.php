<?php
include_once dirname(__FILE__) . '../../Config/config.php';

require_once 'DataBaseModel.php';


class AdministradorModel
{
    private $id_vigilante;
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
    private $password;
    private $inicio_contrato;
    private $fin_contrato;
    private $estado;
    private $sexo;
    private $rol;
    private $db;

    public function __construct()
    {
        $this->db = new DataBase();
    }

    public function getId()
    {
        return $this->id_vigilante;
    }

    public function getById($id_vigilante)
    {
        $datos_usuario = [];

        try {
            $sql  = 'SELECT * FROM vigilantes WHERE id_vigilante = :id_vigilante';
            $query = $this->db->conect()->prepare($sql);
            $query->execute([
                'id_vigilante' => $id_vigilante
            ]);

            while ($row = $query->fetch()) {
                $item                        = new AdministradorModel();
                $item->id_vigilante          = $row['id_vigilante'];
                $item->id_persona            = $row['id_persona'];
                $item->tipo_identificacion   = $row['id_tipo_identificacion'];
                $item->numero_identificacion = $row['numero_identificacion'];
                $item->primer_nombre         = $row['primer_nombre'];
                $item->segundo_nombre        = $row['segundo_nombre'];
                $item->primer_apellido       = $row['primer_apellido'];
                $item->segundo_apellido      = $row['segundo_apellido'];
                $item->email                 = $row['email'];
                $item->telefono              = $row['telefono'];
                $item->direccion             = $row['direccion'];
                $item->password              = $row['password'];
                $item->inicio_contrato       = $row['inicio_contrato'];
                $item->fin_contrato          = $row['fin_contrato'];
                $item->estado                = $row['estado'];
                $item->sexo                  = $row['id_sexo'];
                $item->rol                   = $row['id_rol'];

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

            $sql = 'SELECT id_vigilante, id_persona, tipo_identificacion.nombre AS tipo_identificacion, numero_identificacion, roles.nombre AS rol, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, email, telefono, 
            direccion, password, inicio_contrato, fin_contrato, estado, sexo.nombre AS sexo
            FROM vigilantes
            JOIN tipo_identificacion ON personas.id_tipo_identificacion = tipo_identificacion.id_tipo_identificacion
            JOIN roles ON personas.id_rol = roles.id_rol
            JOIN sexo ON personas.id_sexo = sexo.id_sexo';
            $query  = $this->db->conect()->query($sql);


            while ($row = $query->fetch()) {
                $item                        = new AdministradorModel();
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
                $item->password              = $row['password'];
                $item->inicio_contrato       = $row['inicio_contrato'];
                $item->fin_contrato          = $row['fin_contrato'];
                $item->estado                = $row['estado'];
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

            $sql = 'INSERT INTO vigilantes(id_persona, id_tipo_identificacion, numero_identificacion, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, email, telefono, direccion, password, inicio_contrato, fin_contrato, estado, id_sexo, id_rol) 
            VALUES(:tipo_identificacion, :numero_identificacion, :primer_nombre, :segundo_nombre, :primer_apellido, :segundo_apellido, :email, :telefono, :direccion, :password, :inicio_contrato, :fin_contrato, :estado, :id_sexo, :id_rol)';

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
                'password'               => $datos['password'],
                'inicio_contrato'        => $datos['inicio_contrato'],
                'fin_contrato'           => $datos['fin_contrato'],
                'estado'                 => $datos['estado'],
                'id_sexo'                => $datos['id_sexo'],
                'id_rol'                 => $datos['id_rol'],
            ]);

            if ($query) {
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function update($datos)
    {
        try {

            $sql = 'UPDATE vigilantes SET 
            id_persona  = id_persona,
            id_tipo_identificacion = :id_tipo_identificacion,
            numero_identificacion = :numero_identificacion,
            primer_nombre = :primer_nombre,
            segundo_nombre = :segundo_nombre, 
            primer_apellido = :primer_apellido, 
            segundo_apellido = :segundo_apellido,
            email = :email, 
            telefono = :telefono, 
            direccion = :direccion,
            password = :password,
            inicio_contrato = :inicio_contrato,
            fin_contrato = :fin_contrato],
            estado = :estado],
            id_sexo = :id_sexo,
            id_rol = :id_rol
            WHERE id_vigilante = :id_vigilante';

            $prepare = $this->db->conect()->prepare($sql);
            $query = $prepare->execute([
                'id_persona'             => $datos['id_persona'],
                'id_tipo_identificacion' => $datos['id_tipo_identificacion'],
                'numero_identificacion'  => $datos['numero_identificacion'],
                'primer_nombre'          => $datos['primer_nombre'],
                'segundo_nombre'         => $datos['segundo_nombre'],
                'primer_apellido'        => $datos['primer_apellido'],
                'segundo_apellido'       => $datos['segundo_apellido'],
                'email'                  => $datos['email'],
                'telefono'               => $datos['telefono'],
                'direccion'              => $datos['direccion'],
                'password'               => $datos['password'],
                'inicio_contrato'        => $datos['inicio_contrato'],
                'fin_contrato'           => $datos['fin_contrato'],
                'estado'                 => $datos['estado'],
                'id_sexo'                => $datos['id_sexo'],
                'id_rol'                 => $datos['id_rol'],
            ]);

            if ($query) {
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function delete($id_vigilante)
    {
        try {
            $sql = 'DELETE FROM vigilantes WHERE id_vigilante = :id_vigilante';

            $prepare = $this->db->conect()->prepare($sql);
            $query = $prepare->execute([
                'id_vigilante'        => $id_vigilante
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
        return $this->sexo;
    }
    public function setSexo($sexo)
    {
        return $this->sexo;
    }

    public function getRoles()
    {
        return $this->rol;
    }
    public function setRoles($rol)
    {
        return $this->rol;
    }
    public function getPassword(){
        return $this->password;
    }
    public function setPassword($password){
        return $this->password;
    }
    public function getInicioContrato(){
        return $this->inicio_contrato;
    }
    public function setInicionContrato($inicio_contrato){
        return $this->inicio_contrato;
    }
    public function getfinContrato(){
        return $this->fin_contrato;
    }
    public function setfinContrato($fin_contrato){
        return $this->fin_contrato;
    }
    public function getEstado(){
        return $this->estado;
    }    
    public function setEstado($estado){
        return $this->estado;
    }
   
}
