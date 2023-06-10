<?php
include_once dirname(__FILE__) . '../../Config/config.php';
require_once 'dataBaseModel.php';

class TipoDispositivoModel
{
    private $id_tipo_dispositivo;
    private $nombre;
    private $db;

    public function __construct()
    {
        $this->db = new DataBase();
    }

    public function getId()
    {
        return $this->id_tipo_dispositivo;
    }

    public function getById($id_tipo_dispositivo)
    {
        $datos_tipo_dispositivos = [];

        try {
            $sql = "SELECT * FROM tipo_dispositivos WHERE id_tipo_dispositivo = :id_tipo_dispositivo";
            $query  = $this->db->conect()->prepare($sql);
            $query->execute([
                'id_tipo_dispositivo' => $id_tipo_dispositivo
            ]);

            while ($row = $query->fetch()) {
                $item                          = new TipoDispositivoModel();
                $item->id_tipo_dispositivo  = $row['id_tipo_dispositivo'];
                $item->nombre                  = $row['nombre'];

                array_push($datos_tipo_dispositivos, $item);
            }

            return $datos_tipo_dispositivos;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAll()
    {
        $identificacion = [];

        try {
            $sql = 'SELECT * FROM tipo_dispositivos ORDER BY id_tipo_dispositivo ASC';
            $query  = $this->db->conect()->query($sql);

            while ($row = $query->fetch()) {
                $datos                         = new TipoDispositivoModel();
                $datos->id_tipo_dispositivo = $row['id_tipo_dispositivo'];
                $datos->nombre                 = $row['nombre'];

                array_push($dispositivo, $datos);
            }

            return $dispositivo;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function store($datos)
    {
        try {

            $sql = 'INSERT INTO tipo_dispositivos(nombre) VALUES(:nombre)';

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
            $sql = 'UPDATE tipo_dispositivos SET tipo_dispositivos= :tipo_dispositivos WHERE id_tipo_dispositivo = :id_tipo_dispositivo';
            $prepare = $this->db->conect()->prepare($sql);
            $query = $prepare->execute([
                'id_tipo_dispositivo' => $datos['id_tipo_dispositivo'],
                'nombre'     => $datos['nombre']
            ]);

            if ($query) {
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function delete($id_tipo_dispositivo)
    {
        try {
            $sql = 'DELETE FROM tipo_dispositivos WHERE id_tipo_dispositivo = :id_tipo_dispositivo';
            $prepare = $this->db->conect()->prepare($sql);
            $query = $prepare->execute([
                'id_tipo_dispositivo' => $id_tipo_dispositivo,
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
        return $this->nombre;
    }
    public function setTipoIdentificacion($nombre)
    {
        return $this->nombre;
    }
}