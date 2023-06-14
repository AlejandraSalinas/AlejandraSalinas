<?php
include_once dirname(__FILE__) . '../../Config/config.php';
require_once 'dataBaseModel.php';

class AccesoriosDispositivoModel
{
    private $id_accesorios;
    private $nombre;
    private $db;

    public function __construct()
    {
        $this->db = new DataBase();
    }

    public function getId()
    {
        return $this->id_accesorios;
    }

    public function getById($id_accesorios)
    {
        $datos_accesorios = [];

        try {
            $sql = "SELECT * FROM accesorios WHERE id_accesorios = :id_accesorios";
            $query  = $this->db->conect()->prepare($sql);
            $query->execute([
                'id_accesorios' => $id_accesorios
            ]);

            while ($row = $query->fetch()) {
                $item                          = new AccesoriosDispositivoModel();
                $item->id_accesorios  = $row['id_accesorios'];
                $item->nombre                  = $row['nombre'];

                array_push($datos_accesorios, $item);
            }

            return $datos_accesorios;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAll()
    {
        $array = [];

        try {
            $sql = 'SELECT id_accesorios, nombre
            FROM accesorios 
            ORDER BY id_accesorios ASC';
            $query  = $this->db->conect()->query($sql);

            while ($row = $query->fetch()) {
                $datos                         = new AccesoriosDispositivoModel();
                $datos->id_accesorios = $row['id_accesorios'];
                $datos->nombre                 = $row['nombre'];

                array_push($array, $datos);
            }

            return $array;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function store($datos)
    {
        try {

            $sql = 'INSERT INTO accesorios(nombre) VALUES(:nombre)';

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
            $sql = 'UPDATE accesorios SET accesorios= :accesorios WHERE id_accesorios = :id_accesorios';
            $prepare = $this->db->conect()->prepare($sql);
            $query = $prepare->execute([
                'id_accesorios' => $datos['id_accesorios'],
                'nombre'     => $datos['nombre']
            ]);

            if ($query) {
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function delete($id_accesorios)
    {
        try {
            $sql = 'DELETE FROM accesorios WHERE id_accesorios = :id_accesorios';
            $prepare = $this->db->conect()->prepare($sql);
            $query = $prepare->execute([
                'id_accesorios' => $id_accesorios,
            ]);
            if ($query) {
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


    // GETTER Y SETTER
    public function getAccesorios()
    {
        return $this->nombre;
    }
    public function setAccesorios($nombre)
    {
        return $this->nombre;
    }
}