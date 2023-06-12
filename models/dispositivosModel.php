<?php

include_once dirname(__FILE__) . '../../Config/config.php';
require_once 'dataBaseModel.php';


class DispositivoModel
{
    private $id_dispositivo;
    private $id_tipo_identificacion;
    private $numero_identificacion;
    private $id_persona;
    private $id_tipo_dispositivo;
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
        return $this->id_dispositivo;
    }

    public function getbyId($id_dispositivo)
    {
        $datos_dipositivo = [];

        try {
            
            $sql = "SELECT * FROM dispositivos WHERE id_dispositivo = $id_dispositivo";
            $query  = $this->db->conect()->query($sql);
            $query -> execute([
                'id_dispositivo'        => $id_dispositivo
            ]);


            while ($row = $query->fetch()) {
                $item                                   = new DispositivoModel();
                $item -> id_dispositivo                 = $row['id_dispositivo'];
                $item -> id_tipo_identificacion         = $row['id_tipo_identificacion'];
                $item -> numero_identificacion          = $row['numero_identificacion'];
                $item -> id_tipo_dispositivo            = $row['id_tipo_dispositivo'];
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
            $sql = 'SELECT * id_dispositivo, ti.nombre AS id_tipo_identificacion, numero_identificacion, td.nombre AS id_tipo_dispositivo, m.nombre AS id_marcas, c.nombre AS  id_color,
            a.nombre AS id_accesorios, serie
            FROM dispositivos AS d, 
            JOIN personas AS p ON p.id_persona = d.id_persona
            JOIN tipo_identificacion AS ti ON ti.tipo_identificacion = ti.id_tipo_identificacion
            JOIN tipo_dispositivos AS td ON td.id_tipo_dispositivo = td.id_tipo_dispositivo
            JOIN marcas AS m ON m.id_marca = m.id_marca
            JOIN color AS c ON c.id_color = c.id_color 
            JOIN accesorios AS a ON a.id_accesorios = a.id_accesorios';
            
     
            $query  = $this->db->conect()->query($sql);

            while ($row = $query->fetch()) {
                $item                                   = new DispositivoModel();
                $item -> id_dispositivo                 = $row['id_dispositivo'];
                $item -> id_tipo_identificacion         = $row['id_tipo_identificacion'];
                $item -> numero_identificacion          = $row['numero_identificacion'];
                $item -> id_persona                     = $row['nombre'];
                $item -> id_tipo_dispositivo            = $row['id_tipo_dispositivo'];
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
            $sql = 'INSERT INTO dispositivos(id_persona, id_tipo_identificacion, numero_identificacion, id_tipo_dispositivo, id_marca, id_color, id_accesorios, serie)
            VALUE(:id_tipo_identificacion, :numero_identificacion, :id_tipo_dispositivo, :id_marca, :id_color, :id_accesorios, :serie)';
            $prepare = $this->db->conect()->prepare($sql);
            $query = $prepare->execute([
                'id_dispositivo'                 => $datos['id_dispositivo'],
                'id_persona'                     => $datos['nombre'],
                'id_tipo_identificacion'         => $datos['id_tipo_identificacion'],
                'numero_identificacion '         => $datos['numero_identificacion'],
                'id_tipo_dispositivo'            => $datos['id_tipo_dispositivo'],
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
            $sql = 'UPDATE dispositivos SET 
            
            id_tipo_identificacion = :id_tipo_identificacion,
            numero_identificacion = :numero_identificacion,
            id_tipo_dispositivo = :id_tipo_dispositivo,
            id_marca = :id_marca,
            id_color = :id_color,
            id_accesorios = :id_accesorios,
            serie  = :serie             
            WHERE id_dispositivo = :id_dispositivo';

            $prepare = $this->db->conect()->query($sql);
            $query = $prepare->execute([
                'id_dispositivo'       => $datos['id_dispositivo'],
                'numero_identificacion '         => $datos['numero_identificacion'],
                'id_tipo_identificacion'         => $datos['id_tipo_identificacion'],
                'id_tipo_dispositivo'           => $datos['id_tipo_dispositivo'],
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
    public function delete($id_dispositivo)
    {
        try {
            $sql = 'DELETE FROM dispositivos WHERE id_dispositivo = :id_dispositivo';

        $prepare = $this->db->conect()->prepare($sql);
        $query = $prepare->execute([
            'id_dispositivo'        => $id_dispositivo
        ]);
        if ($query) {
            return true;
        }
    } catch (PDOException $e) {
        die($e->getMessage());
    }
    }

    public function getPersona($id_persona)
    {
        try {
            $sql = "SELECT id_persona, CONCAT( primer_nombre, ' ', segundo_nombre, ' ', primer_apellido, ' ', segundo_apellido) AS nombre
            FROM personas
            WHERE id_persona = $id_persona";
            $query =  $this->db->conect()->prepare($sql);
            return $query->fetchAll();
        } catch (PDOException $e) {
         die($e->getMessage());
        }
    }
    ///GET Y SET
    
    
    public function setPersona($id_persona)
    {
        $this->id_persona = $id_persona;
    }
  
    public function getTipoIdentificacion()
    {
        return $this->id_tipo_identificacion;
    }
    public function setTipoIdentificacion($id_tipo_identificacion)
    {
        return $this->id_tipo_identificacion = $id_tipo_identificacion;
    }

    public function getNumeroIdentificacion()
    {
        return $this->numero_identificacion;
    }
    public function setNumeroIdentificacion($numero_identificacion)
    {
        return $this->numero_identificacion = $numero_identificacion;
    }

    public function getTipoDispositivos()
    {
        return $this->id_tipo_dispositivo;
    }
    public function setTipoDispositivos($id_tipo_dispositivo)
    {
        return $this->id_tipo_dispositivo = $id_tipo_dispositivo;
    }

    public function getMarca()
    {
        return $this->id_marca;
    }
    public function setMarca($id_marca)
    {
        return $this->id_marca = $id_marca;
    }

    public function getColor()
    {
        return $this->id_color;
    }
    public function setColor($id_color)
    {
        return $this->id_color = $id_color;
    }

    public function getAccesorios()
    {
        return $this->id_accesorios;
    }
    public function setAccesorios($id_accesorios)
    {
        return $this->id_accesorios = $id_accesorios;
    }

    public function getSerie()
    {
        return $this->serie;
    }
    public function setSerie($serie)
    {
        return $this->serie = $serie;
    }

  
    
}
