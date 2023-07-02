<?php
include_once dirname(__FILE__) . '../../Config/config.php';
require_once 'DataBaseModel.php';

class SedesModel
{
    private $id_sede;
    private $nombre;
    private $db;

    public function __construct()
    {
        $this->db = new DataBase;
    }

    public function getId()
    {
        return $this->id_sede;
    }

    public function getById($id_sede)
    {
        $datos_sede = [];

        try {
            $sql = 'SELECT * FROM sedes WHERE id_sede = :id_sede';
            $query = $this->db->conect()->prepare($sql);
            $query->execute([
                'id_sede' => $id_sede 
            ]);

            while ($row = $query->fetch()) {
                $item          = new SedesModel();
                $item->id_sede = $row['id_sede'];
                $item->nombre  = $row['nombre'];

                array_push($datos_sede, $item);
            }
            return $datos_sede;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAll()
    {
        $sede = [];

        try {
           $sql = 'SELECT * FROM sedes ORDER BY nombre ASC ';
           $query = $this->db->conect()->query($sql);
           
            while ($row = $query->fetch()) {
                $datos      = new SedesModel();
                $datos->id_sede = $row['id_sede'];
                $datos->nombre  = $row['nombre'];

                array_push($sede, $datos);
            }
            return $sede;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function store($datos)
    {
        try {
            $sql = 'INSERT INTO sedes(nombre) VALUES (:nombre)';
            $prepare = $this->db->conect()->prepare($sql);
            $query = $prepare->execute([
                'nombre' => $datos['nombre'] 
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
            $sql = 'UPDATE sedes SET  nombre = :nombre WHERE id_sede = :id_sede';
            $prepare = $this->db->conect()->prepare($sql);
            $query = $prepare->execute([
                'id_sede'      => $datos['id_sede'],
                'nombre'       => $datos['nombre']
            ]);

            if ($query) {
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function delete($id_sede)
    {
        try {
            $sql = 'DELETE  FROM sedes WHERE id_sede = :id_sede';
            $prepare = $this->db->conect()->prepare($sql);
            $query = $prepare->execute([
                'id_sede'  => $id_sede
            ]);
            if ($query) {
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function getSedes()
    {
        return $this->nombre;
    }
    public function setSedes($nombre)
    {
        $this->nombre = $nombre;
    }
}