<?php
include_once dirname(__FILE__) . '../../Config/config.php';
require_once 'dataBaseModel.php';

class MarcaDispositivoModel
{
    private $id_marca;
    private $nombre;
    private $db;

    public function __construct()
    {
        $this->db = new DataBase();
    }

    public function getId()
    {
        return $this->id_marca;
    }

    public function getById($id_marca)
    {
        $datos_marca = [];

        try {
            $sql = "SELECT * FROM marcas WHERE id_marca = :id_marca";
            $query  = $this->db->conect()->prepare($sql);
            $query->execute([
                'id_marca' => $id_marca
            ]);

            while ($row = $query->fetch()) {
                $item                          = new MarcaDispositivoModel();
                $item->id_marca  = $row['id_marca'];
                $item->nombre                  = $row['nombre'];

                array_push($datos_marca, $item);
            }

            return $datos_marca;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAll()
    {
        $identificacion = [];

        try {
            $sql = 'SELECT * FROM marcas ORDER BY id_marca ASC';
            $query  = $this->db->conect()->query($sql);

            while ($row = $query->fetch()) {
                $datos                         = new MarcaDispositivoModel();
                $datos->id_marca = $row['id_marca'];
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

            $sql = 'INSERT INTO marcas(nombre) VALUES(:nombre)';

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
            $sql = 'UPDATE marcas SET marca= :marca WHERE id_marca = :id_marca';
            $prepare = $this->db->conect()->prepare($sql);
            $query = $prepare->execute([
                'id_marca' => $datos['id_marca'],
                'nombre'     => $datos['nombre']
            ]);

            if ($query) {
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function delete($id_marca)
    {
        try {
            $sql = 'DELETE FROM marcas WHERE id_marca = :id_marca';
            $prepare = $this->db->conect()->prepare($sql);
            $query = $prepare->execute([
                'id_marca' => $id_marca,
            ]);
            if ($query) {
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


    // GETTER Y SETTER
    public function getMarca()
    {
        return $this->nombre;
    }
    public function setMarca($nombre)
    {
        return $this->nombre;
    }
}