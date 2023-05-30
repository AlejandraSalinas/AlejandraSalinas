<?php

include_once dirname(__FILE__) . '../../Config/config.php';
require_once 'dataBaseModel.php';


class DispositivoModel
{
    private $id_ingresar;
    private $id_tipo_identificacion;
    private $numero_identificacion;
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
        return $this->id_ingresar;
    }

    public function getbyId($id_ingresar)
    {
        $datos_dipositivo = [];

        try {
            $sql = "SELECT * FROM id_ingresar WHERE id_ingresar = $id_ingresar";
            $query  = $this->db->conect()->query($sql);
            $query -> execute([
                '$id_ingresar' => id_ingresar
            ]);


            while ($row = $query->fetch()) {
                $item                                   = new DispositivoModel();
                $item -> id_ingresar                    = $row['id_ingresar'];
                $item -> id_tipo_identificacion         = $row['id_tipo_identificacion'];
                $item -> numero_identificacion          = $row['numero_identificacion'];
                $item -> id_tipo_dispositivos           = $row['id_tipo_dispositivos'];
                $item -> id_marca                       = $row['id_marca'];
                $item -> id_color                       = $row['id_color'];
                $item -> id_accesorios                  = $row['id_accesorios'];
                $item -> serie                          = $row['serie'];
                array_push($datos_dipositivo, $item);
            }

            return $datos_dipositivo;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


    public function getAll()
    {
        $items = [];

        try {
            $sql = 'SELECT * FROM ingresar';
     
            $query  = $this->db->conect()->query($sql);


            while ($row = $query->fetch()) {
                $item                                   = new DispositivoModel();
                $item -> id_ingresar                    = $row['id_ingresar'];
                $item -> id_tipo_identificacion         = $row['id_tipo_identificacion'];
                $item -> numero_identificacion          = $row['numero_identificacion'];
                $item -> id_tipo_dispositivos           = $row['id_tipo_dispositivos'];
                $item -> id_marca                       = $row['id_marca'];
                $item -> id_color                       = $row['id_color'];
                $item -> id_accesorios                  = $row['id_accesorios'];
                $item -> serie                          = $row['serie'];
                array_push($items, $item);
            }

            return $items;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function update($datos)
    {
        $sql= 'UPDATE 
        id_tipo_identificacion = id_tipo_identificacion,
        numero_identificacion = numero_identificacion,
        id_tipo_dispositivo = id_tipo_dispositivo,
        id_marca = id_marca,
        id_color = id_color,
        id_accesorios = id_accesorios,
        serie = serie
        WHERE id_ingresar = :id_ingresar';
        $prepare = $this->db->conect()->query($sql);
        $query = $prepare->execute([
                'id_ingresar'                    = $datos['id_ingresar'],
                'id_tipo_identificacion'         = $datos['id_tipo_identificacion'],
                'numero_identificacion '         = $datos['numero_identificacion'],
                'id_tipo_dispositivos'           = $datos['id_tipo_dispositivos'],
                'id_marca'                       = $datos['id_marca'],
                'id_color'                       = $datos['id_color'],
                'id_accesorios'                  = $datos['id_accesorios'],
                'serie'                          = $datos['serie'],
        ]); 
        if ($query) {
            return true;
        }
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}
public function delete($id_persona)
{
    try {
        $sql = 'DELETE FROM ingresar WHERE id_ingresar = :id_ingresar';

        $prepare = $this->db->conect()->prepare($sql);
        $query = $prepare->execute([
            'id_ingresar'        => $id_persona
        ]);
        if ($query) {
            return true;
        }
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}
