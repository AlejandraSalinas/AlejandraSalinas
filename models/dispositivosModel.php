<?php

include_once dirname(__FILE__) . '../../Config/config.php';
require_once 'dataBaseModel.php';


class DispositivoModel extends stdClass
{
    private $id;
    public $numero_identificacion;
    public $tipo;
    public $marca;
    public $Serie;
    public $color;
    public $accesorios;
    public $fotografia;
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
            $sql = "SELECT * FROM dispositivo WHERE id = $id";
            $query  = $this->db->conect()->query($sql);


            while ($row = $query->fetch()) {
                $item            = new DispositivoModel();
                $item->id        = $row['id'];
                $item->numero_identificacion   = $row['numero_identificacion'];
                $item->tipo   = $row['tipo'];
                $item->marca = $row['marca'];
                $item->Serie = $row['Serie'];
                $item->color = $row['color'];
                $item->accesorios = $row['accesorios'];
                $item->fotografia = $row['fotografia'];
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

            ///$sql = 'SELECT operaciones.id, operaciones.num_uno, operaciones.num_dos, OPERADORES.nombre AS operacion,
            //operaciones.resultado FROM dispositivo 
            //JOIN DISPOSITIVO ON tipo.dispositivo = DISPOSITIVO.id 
            //JOIN DISPOSITIVO ON dispositivo.operacion = DISPOSITIVO.id 
            //JOIN DISPOSITIVO ON dispositivo.operacion = DISPOSITIVO.id
            //JOIN DISPOSITIVO ON dispositivo.operacion = DISPOSITIVO.id
          //  JOIN DISPOSITIVO ON dispositivo.operacion = DISPOSITIVO.id';
            $query  = $this->db->conect()->query($sql);


            while ($row = $query->fetch()) {
                $item            = new DispositivoModel();
                $item->id        = $row['id'];
                $item->numero_identificacion   = $row['numero_identificacion'];
                $item->tipo   = $row['tipo'];
                $item->marca = $row['marca'];
                $item->Serie = $row['Serie'];
                $item->color = $row['color'];
                $item->accesorios = $row['accesorios'];
                $item->fotografia = $row['fotografia'];

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