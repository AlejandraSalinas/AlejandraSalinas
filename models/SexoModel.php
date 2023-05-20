<?php
include_once dirname(__FILE__) . '../../Config/config.php';
require_once 'DataBaseModel.php';

class SexoModel
{
    private $id_sexo;
    private $nombre;
    private $db;

    public function __construct()
    {
        $this->db = new DataBase;
    }
    public function getId()
    {
        return $this->id_sexo;
    }
    public function getById($id_sexo)
    {
        $datos_sexo = [];

        try {
            $sql = 'SELECT * FROM sexo WHERE id_sexo = :id_sexo';
            $query = $this->db->conect()->query($sql);
            $query->execute([
                'id_sexo' => $id_sexo 
            ]);

            while ($row = $query->fetch()) {
                $item          = new SexoModel();
                $item->id_sexo = $row['id_sexo'];
                $item->nombre  = $row['nombre'];

                array_push($datos_sexo, $item);
            }
            return $datos_sexo;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function getAll()
    {
        $sexo = [];

        try {
           $sql = 'SELECT * FROM sexo ORDER BY id_sexo ASC';
           $query = $this->db->conect()->query($sql);
            while ($row = $query->fetch()) {
                $datos      = new SexoModel();
                $datos->id_sexo = $row['id_sexo'];
                $datos->nombre  = $row['nombre'];

                array_push($sexo, $datos);
            }
            return $sexo;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function store($datos)
    {
        try {
            $sql = 'INSERT INTO sexo(id_sexo) VALUES (:id_sexo)';
            $prepare = $this->$this->db->conect()->query($sql);
            $query = $prepare->execute([
                'sexo' => $datos['sexo'] 
            ]);
            if ($query) {
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function getSexo()
    {
        return $this->nombre;
    }
    public function setSexo($nombre)
    {
        return $this->nombre;
    }
}