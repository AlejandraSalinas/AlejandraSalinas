<?php
include_once dirname(__FILE__) . '../../Config/config.php';
require_once 'DataBaseModel.php';

class TipoIdentificacionModel
{
    private $id_tipo_identificacion;
    private $nombre;
    private $db;

    public function __construct()
    {
        $this->db = new DataBase();
    }

    public function getId()
    {
        return $this->id_tipo_identificacion;
    }

    public function getById($id_tipo_identificacion)
    {
        // operacion
        $datos_tipo_identificacion = [];

        try {
            $sql = "SELECT * FROM tipo_identificacion WHERE id_tipo_identificacion = :id_tipo_identificacion";
            $query  = $this->db->conect()->query($sql);
            $query->execute([
                'id_tipo_identificacion' => $id_tipo_identificacion
            ]);

            while ($row = $query->fetch()) {
                $item                          = new TipoIdentificacionModel();
                $item->id_tipo_identificacion  = $row['id_tipo_identificacion'];
                $item->nombre                  = $row['nombre'];

                array_push($datos_tipo_identificacion, $item);
            }

            return $datos_tipo_identificacion;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


    public function getAll()
    {
        $identificacion = [];

        try {
            $sql = 'SELECT * FROM tipo_identificacion ORDER BY id_tipo_identificacion ASC';
            $query  = $this->db->conect()->query($sql);

            while ($row = $query->fetch()) {
                $datos                         = new TipoIdentificacionModel();
                $datos->id_tipo_identificacion = $row['id_tipo_identificacion'];
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

            $sql = 'INSERT INTO tipo_identificacion(id_tipo_identificacion) VALUES(:tipo_identificacion)';

            $prepare = $this->db->conect()->prepare($sql);
            $query = $prepare->execute([
                'tipo_identificacion'    => $datos['tipo_identificacion']
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
