<?php

include_once dirname(__FILE__) . '../../Config/config.php';
require_once 'dataBaseModel.php';


class DispositivoModel extends stdClass
{

    private $id_registro_dispositivos;
    private $id_tipo_dispositivos;
    private $id_marca;
    private $id_color;
    private $id_accesorios;
    private $serie;
    private $db;

    public function __construct()
    {
        $this->db = new DataBase();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getbyId($id)
    {
        $dipositivo = [];

        try {
            $sql = "SELECT * FROM dispositivo WHERE id_registro_dispositivos = $id";
            $query  = $this->db->conect()->query($sql);


            while ($row = $query->fetch()) {
                $item                                   = new DispositivoModel();
                $item -> id_registro_dispositivos       = $row['id_registro_dispositivos'];
                $item -> id_tipo_dispositivos           = $row['id_tipo_dispositivos'];
                $item -> id_marca                       = $row['id_marca'];
                $item -> id_color                       = $row['id_color'];
                $item -> accesoid_accesoriosrios        = $row['id_accesorios'];
                $item -> serie                          = $row['serie'];
                array_push($dipositivo, $item);
            }

            return $dipositivo;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


    public function getAll()
    {
        $items = [];

        try {
            $sql = 'SELECT * FROM dispositivos';
     
            $query  = $this->db->conect()->query($sql);


            while ($row = $query->fetch()) {
                $item               = new DispositivoModel();
                $item->id_registro_dispositivos         = $row['id_registro_dispositivos'];
                $item->id_tipo_dispositivos             = $row['id_tipo_dispositivos'];
                $item->id_marca                         = $row['id_marca'];
                $item->id_color                         = $row['id_color'];
                $item->id_accesorios                    = $row['id_accesorios'];
                $item->serie                            = $row['serie'];
                array_push($items, $item);
            }

            return $items;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $sql = "DELETE FROM dispositivo WHERE id = :id";
            $prepare = $this->db->conect()->prepare($sql);
            $query = $prepare->execute([
                'id'   => $id,
            ]);

            if ($query) {
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    
}