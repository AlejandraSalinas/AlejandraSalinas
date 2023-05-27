<?php
include_once dirname(__FILE__) . '../../Config/config.php';
require_once 'dataBaseModel.php';

class ColorDispositivoModel
{
    private $id_color;
    private $nombre;
    private $db;

    public function __construct()
    {
        $this->db = new DataBase();
    }

    public function getId()
    {
        return $this->id_color;
    }

    public function getById($id_color)
    {
        $datos_color = [];

        try {
            $sql = "SELECT * FROM color WHERE id_color = :id_color";
            $query  = $this->db->conect()->prepare($sql);
            $query->execute([
                'id_color' => $id_color
            ]);

            while ($row = $query->fetch()) {
                $item                          = new ColorDispositivoModel();
                $item->id_color  = $row['id_color'];
                $item->nombre                  = $row['nombre'];

                array_push($datos_color, $item);
            }

            return $datos_color;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAll()
    {
        $identificacion = [];

        try {
            $sql = 'SELECT * FROM color ORDER BY id_color ASC';
            $query  = $this->db->conect()->query($sql);

            while ($row = $query->fetch()) {
                $datos                         = new ColorDispositivoModel();
                $datos->id_color = $row['id_color'];
                $datos->nombre                 = $row['nombre'];

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

            $sql = 'INSERT INTO color(nombre) VALUES(:nombre)';

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
            $sql = 'UPDATE color SET color= :color WHERE id_color = :id_color';
            $prepare = $this->db->conect()->prepare($sql);
            $query = $prepare->execute([
                'id_color' => $datos['id_color'],
                'nombre'     => $datos['nombre']
            ]);

            if ($query) {
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function delete($id_color)
    {
        try {
            $sql = 'DELETE FROM color WHERE id_color = :id_color';
            $prepare = $this->db->conect()->prepare($sql);
            $query = $prepare->execute([
                'id_color' => $id_color,
            ]);
            if ($query) {
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


    // GETTER Y SETTER
    public function getColor()
    {
        return $this->nombre;
    }
    public function setColor($nombre)
    {
        return $this->nombre;
    }
}