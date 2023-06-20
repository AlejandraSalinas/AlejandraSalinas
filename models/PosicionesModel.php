<?php
include_once dirname(__FILE__) . '../../Config/config.php';
require_once 'DataBaseModel.php';

class PosicionesModel
{
    private $id_posicion;
    private $nombre;
    private $db;

    public function __construct()
    {
        $this->db = new DataBase;
    }

    public function getId()
    {
        return $this->id_posicion;
    }

    public function getById($id_posicion)
    {
        $datos_posicion = [];

        try {
            $sql = 'SELECT * FROM posiciones WHERE id_posicion = :id_posicion';
            $query = $this->db->conect()->prepare($sql);
            $query->execute([
                'id_posicion' => $id_posicion 
            ]);

            while ($row = $query->fetch()) {
                $item              = new PosicionesModel();
                $item->id_posicion = $row['id_posicion'];
                $item->nombre      = $row['nombre'];

                array_push($datos_posicion, $item);
            }
            return $datos_posicion;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAll()
    {
        $posicion = [];

        try {
           $sql = 'SELECT * FROM posiciones ORDER BY nombre ASC';
           $query = $this->db->conect()->query($sql);
           
            while ($row = $query->fetch()) {
                $datos      = new PosicionesModel();
                $datos->id_posicion = $row['id_posicion'];
                $datos->nombre  = $row['nombre'];

                array_push($posicion, $datos);
            }
            return $posicion;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function store($datos)
    {
        try {
            $sql = 'INSERT INTO posiciones(nombre) VALUES (:nombre)';
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
            $sql = 'UPDATE posiciones SET  nombre = :nombre WHERE id_posicion = :id_posicion';
            $prepare = $this->db->conect()->prepare($sql);
            $query = $prepare->execute([
                'id_posicion'  => $datos['id_posicion'],
                'nombre'       => $datos['nombre']
            ]);

            if ($query) {
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function delete($id_posicion)
    {
        try {
            $sql = 'DELETE  FROM posiciones WHERE id_posicion = :id_posicion';
            $prepare = $this->db->conect()->prepare($sql);
            $query = $prepare->execute([
                'id_posicion'  => $id_posicion
            ]);
            if ($query) {
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function getPosiciones()
    {
        return $this->nombre;
    }
    public function setPosiciones($nombre)
    {
        $this->nombre = $nombre;
    }
}