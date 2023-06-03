<?php

include_once dirname(__FILE__) . '../../Config/config.php';
require_once 'dataBaseModel.php';


class DispositivoModel
{
    private $id_registro_dispositivos;
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
        return $this->id_registro_dispositivos;
    }

    public function getbyId($id_registro_dispositivos)
    {
        $datos_dipositivo = [];

        try {
            
            $sql = "SELECT * FROM id_registro_dispositivos WHERE id_registro_dispositivos = $id_registro_dispositivos";
            $query  = $this->db->conect()->query($sql);
            $query -> execute([
                'id_registro_dispositivos'        => $id_registro_dispositivos
            ]);


            while ($row = $query->fetch()) {
                $item                                   = new DispositivoModel();
                $item -> id_registro_dispositivos                    = $row['id_registro_dispositivos'];
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
            $sql = 'SELECT id_registro_dispositivos, tipo_identificacion.nombre AS id_tipo_identificacion, numero_identificacion, tipo_dispositivos.nombre AS id_tipo_dispositivos, marcas.nombre AS id_marca, color.nombre AS id_color, accesorios.nombre AS id_accesorios, serie
            FROM dispositivos
            JOIN tipo_identificacion ON dispositivos.id_tipo_identificacion = tipo_identificacion.id_tipo_identificacion
            JOIN tipo_dispositivos ON dispositivos.id_tipo_dispositivos = tipo_dispositivos.id_tipo_dispositivos
            JOIN marcas ON dispositivos.id_marca = marcas.id_marca
            JOIN color ON dispositivos.id_color = color.id_color
            JOIN accesorios ON dispositivos.id_accesorios = accesorios.id_accesorios';
     
            $query  = $this->db->conect()->query($sql);

            while ($row = $query->fetch()) {
                $item                                   = new DispositivoModel();
                $item -> id_registro_dispositivos       = $row['id_registro_dispositivos'];
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
    public function store($datos)
    {
        try {
            $sql = 'INSERT INTO dispositivos(id_tipo_identificacion, numero_identificacion, id_tipo_dispositivos, id_marca, id_color, id_accesorios, serie)
            VALUE(:id_tipo_identificacion, :numero_identificacion, :id_tipo_dispositivos, :id_marca, :id_color, :id_accesorios, :serie)';
            $prepare = $this->db->conect()->prepare($sql);
            $query = $prepare->execute([
                'id_registro_dispositivos'       => $datos['id_registro_dispositivos'],
                'id_tipo_identificacion'         => $datos['id_tipo_identificacion'],
                'numero_identificacion '         => $datos['numero_identificacion'],
                'id_tipo_dispositivos'           => $datos['id_tipo_dispositivos'],
                'id_marca'                       => $datos['id_marca'],
                'id_color'                       => $datos['id_color'],
                'id_accesorios'                  => $datos['id_accesorios'],
                'serie'                          => $datos['serie'],
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
            $sql = 'UPDATE id_tipo_identificacion = :id_tipo_identificacion,  numero_identificacion = :numero_identificacion, id_tipo_dispositivos = :id_tipo_dispositivos, id_marca = :id_marca, id_color = :id_color, id_accesorios = :id_accesorios, serie  = :serie  
                WHERE id_registro_dispositivos = :id_registro_dispositivos';
            $prepare = $this->db->conect()->query($sql);
            $query = $prepare->execute([
                'id_registro_dispositivos'                    => $datos['id_registro_dispositivos'],
                'numero_identificacion '                      => $datos['numero_identificacion'],
                'id_tipo_identificacion'                      => $datos['id_tipo_identificacion'],
                'id_tipo_dispositivos'                        => $datos['id_tipo_dispositivos'],
                'id_marca'                                    => $datos['id_marca'],
                'id_color'                                    => $datos['id_color'],
                'id_accesorios'                               => $datos['id_accesorios'],
                'serie'                                       => $datos['serie'],
            ]); 
            if ($query) {
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function delete($id_registro_dispositivos)
    {
        try {
            $sql = 'DELETE FROM registro_dispositivos WHERE id_registro_dispositivos = :id_registro_dispositivos';

        $prepare = $this->db->conect()->prepare($sql);
        $query = $prepare->execute([
            'id_registro_dispositivos'        => $id_registro_dispositivos
        ]);
        if ($query) {
            return true;
        }
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}
    ///GET Y SET
    public function getTipoIdentificacion()
    {
        return $this->id_tipo_identificacion;
    }
    public function setTipoIdentificacion($id_tipo_identificacion)
    {
        return $this->id_tipo_identificacion;
    }

    public function getNumeroIdentificacion()
    {
        return $this->numero_identificacion;
    }
    public function setNumeroIdentificacion($numero_identificacion)
    {
        return $this->numero_identificacion;
    }

    public function getTipoDispositivos()
    {
        return $this->id_tipo_dispositivos;
    }
    public function setTipoDispositivos($id_tipo_dispositivos)
    {
        return $this->id_tipo_dispositivos;
    }

    public function getMarca()
    {
        return $this->id_marca;
    }
    public function setMarca($id_marca)
    {
        return $this->id_marca;
    }

    public function getColor()
    {
        return $this->id_color;
    }
    public function setColor($id_color)
    {
        return $this->id_color;
    }

    public function getAccesorios()
    {
        return $this->id_accesorios;
    }
    public function setAccesorios($id_accesorios)
    {
        return $this->id_accesorios;
    }
    public function getSerie()
    {
        return $this->serie;
    }
    public function setSerie($serie)
    {
        return $this->serie;
    }
        

        

    
}
