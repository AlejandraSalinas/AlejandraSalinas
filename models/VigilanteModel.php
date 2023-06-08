<?php
include_once dirname(__FILE__) . '../../Config/config.php';
require_once 'DataBaseModel.php';

class VigilanteModel
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
    private $sexo;
    private $rol;
    private $inicio_contrato;
    private $fin_contrato;
    private $estado;
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
        $datos_vigilante = [];

        try { 
            $sql  = 'SELECT id_vigilante, ti.nombre AS t_identificacion, numero_identificacion, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, email, 
            telefono, direccion, s.nombre AS sex_sexo, r.nombre AS ro_rol, inicio_contrato, fin_contrato, estado
            FROM info_vigilantes AS iv
            JOIN personas AS p ON iv.id_persona = p.id_persona
            JOIN tipo_identificacion AS ti ON p.id_tipo_identificacion = ti.id_tipo_identificacion
            JOIN sexo AS s ON p.id_sexo = s.id_sexo
            JOIN roles AS r ON p.id_rol = r.id_rol
            WHERE id_vigilante = :id_vigilante';
            $query = $this->db->conect()->prepare($sql);
            $query->execute([
                'id_vigilante' => $id_vigilante
            ]);

            while ($row = $query->fetch()) {
                $item                        = new VigilanteModel();
                $item->id_vigilante          = $row['id_vigilante'];
                $item->tipo_identificacion   = $row['t_identificacion'];
                $item->numero_identificacion = $row['numero_identificacion'];
                $item->primer_nombre         = $row['primer_nombre'];
                $item->segundo_nombre        = $row['segundo_nombre'];
                $item->primer_apellido       = $row['primer_apellido'];
                $item->segundo_apellido      = $row['segundo_apellido'];
                $item->email                 = $row['email'];
                $item->telefono              = $row['telefono'];
                $item->direccion             = $row['direccion'];
                $item->sexo                  = $row['sex_sexo'];
                $item->rol                   = $row['ro_rol'];
                $item->inicio_contrato       = $row['inicio_contrato'];
                $item->fin_contrato          = $row['fin_contrato'];
                $item->estado                = $row['estado'];

                array_push($datos_vigilante, $item);
            }

            return $datos_vigilante;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


    public function getAll()
    {
        $items = [];

        try {

            $sql = 'SELECT id_vigilante, ti.nombre AS t_identificacion, numero_identificacion, CONCAT( primer_nombre, " ", segundo_nombre, " ", primer_apellido, " ", segundo_apellido) AS nombre, telefono, estado
            FROM info_vigilantes AS iv
            JOIN personas AS p ON iv.id_persona = p.id_persona
            JOIN tipo_identificacion AS ti ON p.id_tipo_identificacion = ti.id_tipo_identificacion
            JOIN roles AS r ON p.id_rol = r.id_rol
            ORDER BY id_vigilante DESC';
            $query  = $this->db->conect()->query($sql);

            while ($row = $query->fetch()) {
                $item                        = new VigilanteModel();
                $item->id_vigilante          = $row['id_vigilante'];
                $item->tipo_identificacion   = $row['t_identificacion'];
                $item->numero_identificacion = $row['numero_identificacion'];
                $item->id_persona            = $row['nombre'];
                $item->telefono              = $row['telefono'];
                $item->estado                = $row['estado'];

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

            $sql = 'INSERT INTO info_vigilantes(id_persona, inicio_contrato, fin_contrato, estado) 
            VALUES(:id_persona, :inicio_contrato, :fin_contrato, :estado)';

            $prepare = $this->db->conect()->prepare($sql);
            $query = $prepare->execute([
                'id_persona'      => $datos['id_persona'],
                'inicio_contrato' => $datos['inicio_contrato'],
                'fin_contrato'    => $datos['fin_contrato'],
                'estado'          => $datos['estado'],

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

            $sql = 'UPDATE info_vigilantes SET 
            id_persona = :id_persona,
            tipo_identificacion = t_identificacion,
            inicio_contrato = :inicio_contrato,
            fin_contrato = :fin_contrato,
            estado = :estado
            WHERE id_vigilante = :id_vigilante';

            $prepare = $this->db->conect()->prepare($sql);
            $query = $prepare->execute([
                'id_vigilante'                => $datos['id_vigilante'],
                'id_persona'                  => $datos['id_persona'],
                'item->tipo_identificacion'   => $datos['t_identificacion'],
                'item->numero_identificacion' => $datos['numero_identificacion'],
                'item->primer_nombre'         => $datos['primer_nombre'],
                'item->segundo_nombre'        => $datos['segundo_nombre'],
                'item->primer_apellido'       => $datos['primer_apellido'],
                'item->segundo_apellido'      => $datos['segundo_apellido'],
                'item->telefono'              => $datos['telefono'],
                'item->email'                 => $datos['email'],
                'item->direccion'             => $datos['direccion'],
                'item->sexo'                  => $datos['id_sexo'],
                'item->rol'                   => $datos['id_rol'],
                'inicio_contrato'             => $datos['inicio_contrato'],
                'fin_contrato'                => $datos['fin_contrato'],
                'estado'                      => $datos['estado'],
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
            $sql = 'DELETE FROM info_vigilantes WHERE id_vigilante = :id_vigilante';

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
    public function getPersona()
    {
        return $this->id_persona;
    }
    public function setPersona($id_persona)
    {
        $this->id_persona = $id_persona;
    }

    public function getTipoIdentificacion()
    {
        return $this->tipo_identificacion;
    }

    public function setTipoIdentificacion($tipo_identificacion)
    {
        $this->tipo_identificacion = $tipo_identificacion;
    }

    public function getNumeroIdentificacion()
    {
        return $this->numero_identificacion;
    }

    public function setNumeroIdentificacion($numero_identificacion)
    {
        $this->numero_identificacion = $numero_identificacion;
    }

    public function getPrimerNombre()
    {
        return $this->primer_nombre;
    }
    public function setPrimerNombre($primer_nombre)
    {
        $this->primer_nombre = $primer_nombre;
    }

    public function getSegundoNombre()
    {
        return $this->segundo_nombre;
    }
    public function setSegundoNombre($segundo_nombre)
    {
        $this->segundo_nombre = $segundo_nombre;
    }

    public function getPrimerApellido()
    {
        return $this->primer_apellido;
    }
    public function setPrimerApellido($primer_apellido)
    {
        $this->primer_apellido = $primer_apellido;
    }

    public function getSegundoApellido()
    {
        return $this->segundo_apellido;
    }
    public function setSegundoApellido($segundo_apellido)
    {
        $this->segundo_apellido = $segundo_apellido;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function getSexo()
    {
        return $this->sexo;
    }
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }

    public function getRoles()
    {
        return $this->rol;
    }
    public function setRoles($rol)
    {
        $this->rol = $rol;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    public function getInicioContrato()
    {
        return $this->inicio_contrato;
    }
    public function setInicioContrato($inicio_contrato)
    {
        $this->inicio_contrato = $inicio_contrato;
    }

    public function getFinContrato()
    {
        return $this->fin_contrato;
    }
    public function setFinContrato($fin_contrato)
    {
        $this->fin_contrato = $fin_contrato;
    }

    public function getEstado()
    {
        return $this->estado;
    }
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }
}
