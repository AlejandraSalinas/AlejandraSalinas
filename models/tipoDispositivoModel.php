<?php
include_once dirname(__FILE__) . '../../Config/config.php';
require_once 'DataBaseModel.php';

class TipoIdentificacionModel
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
        $datos_tipo_dispositivo = [];

        try {
            $sql = "SELECT * FROM id_tipodispositivon WHERE id_tipo_dispositivo = :id_tipo_dispositivo";
            $query  = $this->db->conect()->prepare($sql);
            $query->execute([
                'id_tipo_dispositivo' => $id_tipo_dispositivo
            ]);

            while ($row = $query->fetch()) {
                $item                          = new tipoIdentificacionModel();
                $item->id_tipo_dispositivo  = $row['id_tipo_dispositivo'];
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
            $sql = 'SELECT * FROM tipo_dispositivo ORDER BY id_tipo_dispositivo ASC';
            $query  = $this->db->conect()->query($sql);

            while ($row = $query->fetch()) {
                $datos                         = new tipoIdentificacionModel();
                $datos->id_tipo_dispositivo = $row['id_tipo_dispositivo'];
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

            $sql = 'INSERT INTO tipo_dispositivo(id_tipo_dispositivo) VALUES(:tipo_dispositivo)';

            $prepare = $this->db->conect()->prepare($sql);
            $query = $prepare->execute([
                'tipo_dispositivo'    => $datos['tipo_dispositivo']
            ]);

            if ($query) {
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    // GETTER Y SETTER
    public function getTipodispositivo()
    {
        return $this->nombre;
    }
    public function setTipodispositivo($nombre)
    {
        return $this->nombre;
    }
}