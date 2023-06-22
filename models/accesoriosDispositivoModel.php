<?php
include_once dirname(__FILE__) . '../../Config/config.php';
require_once 'dataBaseModel.php';

class AccesoriosDispositivoModel
{
    private $id_accesorio;
    private $nombre;
    private $db;

    public function __construct()
    {
        $this->db = new DataBase();
    }

    public function getId()
    {
        return $this->id_accesorio;
    }

    public function getById($id_accesorio)
    {
        $datos_accesorios = [];

        try {
            $sql = "SELECT * FROM accesorios WHERE id_accesorio = :id_accesorio";
            $query  = $this->db->conect()->prepare($sql);
            $query->execute([
                'id_accesorio' => $id_accesorio
            ]);

            while ($row = $query->fetch()) {
                $item                          = new AccesoriosDispositivoModel();
                $item->id_accesorio  = $row['id_accesorio'];
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
            $sql = 'SELECT id_accesorio, nombre
            FROM accesorios 
            ORDER BY id_accesorio ASC';
            $query  = $this->db->conect()->query($sql);

            while ($row = $query->fetch()) {
                $datos                         = new AccesoriosDispositivoModel();
                $datos->id_accesorio = $row['id_accesorio'];
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
            $sql = 'UPDATE accesorios SET accesorios= :accesorios WHERE id_accesorio = :id_accesorio';
            $prepare = $this->db->conect()->prepare($sql);
            $query = $prepare->execute([
                'id_accesorio' => $datos['id_accesorio'],
                'nombre'     => $datos['nombre']
            ]);

            if ($query) {
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function delete($id_accesorio)
    {
        try {
            $sql = 'DELETE FROM accesorios WHERE id_accesorio = :id_accesorio';
            $prepare = $this->db->conect()->prepare($sql);
            $query = $prepare->execute([
                'id_accesorio' => $id_accesorio,
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
        $this->nombre = $nombre ;
    }
}