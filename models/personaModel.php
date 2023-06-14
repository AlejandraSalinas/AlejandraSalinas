<?php
include_once dirname(__FILE__) . '../../Config/config.php';
require_once 'dataBaseModel.php';

class PersonaModel
{
    private $id_persona;
    private $nombre;
    private $db;

    public function __construct()
    {
        $this->db = new DataBase();
    }

    public function getId()
    {
        return $this->id_persona;
    }

    public function getById($id_persona)
    {
        $datos_tipo_dispositivo = [];

        try {
            $sql = "SELECT * FROM personas WHERE id_persona = :id_persona";
            $query  = $this->db->conect()->prepare($sql);
            $query->execute([
                'id_persona' => $id_persona
            ]);

            while ($row = $query->fetch()) {
                $item                          = new PersonaModel();
                $item->id_persona  = $row['id_persona'];
                $item->nombre                  = $row['nombre'];

                array_push($datos_tipo_dispositivo, $item);
            }

            return $datos_tipo_dispositivo;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAll()
    {
        $identificacion = [];

        try {
            $sql = 'SELECT * 
            FROM personas 
            ORDER BY id_persona ASC';
            $query  = $this->db->conect()->query($sql);

            while ($row = $query->fetch()) {
                $datos                         = new PersonaModel();
                $datos->id_persona = $row['id_persona'];
                $datos->nombre     = $row['nombre'];

                array_push($identificacion, $datos);
            }

            return $identificacion;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function store($datos)
    {
        try {

            $sql = 'INSERT INTO personas(nombre) VALUES(:nombre)';

            $prepare = $this->db->conect()->prepare($sql);
            $query = $prepare->execute([
                'nombre'    => $datos['nombre']
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
            $sql = 'UPDATE personas SET tipo_dispositivo= :tipo_dispositivo WHERE id_persona = :id_persona';
            $prepare = $this->db->conect()->prepare($sql);
            $query = $prepare->execute([
                'id_persona' => $datos['id_persona'],
                'nombre'     => $datos['nombre']
            ]);

            if ($query) {
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function delete($id_persona)
    {
        try {
            $sql = 'DELETE FROM personas WHERE id_persona = :id_persona';
            $prepare = $this->db->conect()->prepare($sql);
            $query = $prepare->execute([
                'id_persona' => $id_persona,
            ]);
            if ($query) {
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    function NombreCompleto()
    {
        $array = [];

        try {
            $sql = 'SELECT id_persona, CONCAT( primer_nombre, " ", segundo_nombre, " ", primer_apellido, " ", segundo_apellido) AS nombre_completo 
            FROM personas 
            ORDER BY id_persona ASC';
            $query  = $this->db->conect()->query($sql);

            while ($row = $query->fetch()) {
                $datos                         = new PersonaModel();
                $datos->id_persona = $row['id_persona'];
                $datos->nombre     = $row['nombre_completo'];

                array_push($array, $datos);
            }

            return $array;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    // GETTER Y SETTER

    public function getIdPersona()
    {
        return $this->id_persona;
    }

    public function setIdPersona($id_persona)
    {
        $this->id_persona = $id_persona;
    }

    
}
