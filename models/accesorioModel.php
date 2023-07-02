<?php
include_once dirname(__FILE__) . '../../Config/config.php';
require_once 'dataBaseModel.php';
class AccesorioModel
{
    private $id_accesorio;
    private $id_persona;
    private $tipo_identificacion;
    private $numero_identificacion;
    private $primer_nombre;
    private $segundo_nombre;
    private $primer_apellido;
    private $segundo_apellido;
    private $id_tipo_accesorio;
    private $id_marca;
    private $id_color;
    private $serie;
    private $descripcion;

    private $db;

    public function __construct()
    {
        $this->db = new DataBase();
    }

    public function getId()
    {
        return $this->id_accesorio;
    }

    public function getById($id_accesorio)
    {
        $datos_accesorios = [];
        try {
            $sql = 'SELECT id_accesorio, ti.nombre AS id_tipo_identificacion, p.numero_identificacion,
            primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, ta.nombre AS id_tipo_accesorio, m.nombre AS id_marca, c.nombre AS id_color, a.serie, a.descripcion
            FROM accesorios AS a
            JOIN personas AS p ON p.id_persona = a.id_persona
            JOIN tipo_identificacion AS ti ON p.id_tipo_identificacion=ti.id_tipo_identificacion
            JOIN tipo_accesorios AS ta ON a.id_tipo_accesorio=ta.id_tipo_accesorio
            JOIN marcas AS m ON a.id_marca=m.id_marca
            JOIN colores AS c ON a.id_color=c.id_color';
            $query  = $this->db->conect()->query($sql);
            $query->execute([
                'id_accesorio' => $id_accesorio
            ]);
            while ($row = $query->fetch()) {
                $item                                   = new AccesorioModel();
                $item->tipo_identificacion   = $row['id_tipo_identificacion'];
                $item->numero_identificacion = $row['numero_identificacion'];
                $item->primer_nombre         = $row['primer_nombre'];
                $item->segundo_nombre        = $row['segundo_nombre'];
                $item->primer_apellido       = $row['primer_apellido'];
                $item->segundo_apellido      = $row['segundo_apellido'];
                $item->id_tipo_accesorio     = $row['id_tipo_accesorio'];
                $item->id_marca              = $row['id_marca'];
                $item->id_color              = $row['id_color'];
                $item->serie                 = $row['serie'];
                $item->descripcion           = $row['descripcion'];
                array_push($datos_accesorios, $item);
            }
            return $datos_accesorios;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAll()
    {
        $items = [];
        try {
            $sql = 'SELECT id_accesorio, ti.nombre AS id_tipo_identificacion, p.numero_identificacion,
            CONCAT(p.primer_nombre, " ", p.segundo_nombre, " ", p.primer_apellido, " ", p.segundo_apellido) AS nombre, ta.nombre AS id_tipo_accesorio, m.nombre AS id_marca, c.nombre AS id_color, a.serie, a.descripcion
            FROM accesorios AS a
            JOIN personas AS p ON p.id_persona = a.id_persona 
            JOIN tipo_identificacion AS ti ON p.id_tipo_identificacion=ti.id_tipo_identificacion
            JOIN tipo_accesorios AS ta ON a.id_tipo_accesorio=ta.id_tipo_accesorio
            JOIN marcas AS m ON a.id_marca=m.id_marca
            JOIN colores AS c ON a.id_color=c.id_color';
            $query  = $this->db->conect()->query($sql);
            while ($row = $query->fetch()) {
                $item                        = new AccesorioModel();
                $item->id_accesorio          = $row['id_accesorio'];
                $item->tipo_identificacion   = $row['id_tipo_identificacion'];
                $item->numero_identificacion = $row['numero_identificacion'];
                $item->id_persona            = $row['nombre'];
                $item->id_tipo_accesorio     = $row['id_tipo_accesorio'];
                $item->id_marca              = $row['id_marca'];
                $item->id_color              = $row['id_color'];
                $item->serie                 = $row['serie'];
                $item->descripcion           = $row['descripcion'];
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
            $sql = "INSERT INTO accesorios(id_persona, id_tipo_accesorio, id_marca, id_color, serie, descripcion)
            VALUES (:id_persona, :id_tipo_accesorio, :id_marca, :id_color, :serie, :descripcion)";
            $prepare = $this->db->conect()->prepare($sql);
            $query = $prepare->execute([
                'id_persona'           => $datos['id_persona'],
                'id_tipo_accesorio'  => $datos['id_tipo_accesorio'],
                'id_marca'             => $datos['id_marca'],
                'id_color'             => $datos['id_color'],
                'serie'                => $datos['serie'],
                'descripcion'                  => $datos['descripcion'],

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
            $sql = 'UPDATE accesorios SET 

            id_accesorio = :id_accesorio,
            id_tipo_accesorio = :id_tipo_accesorio,
            id_marca = :id_marca,
            id_color = :id_color,
            serie  = :serie             
            descripcion = :descripcion,
            WHERE id_accesorio = :id_accesorio';

            $prepare = $this->db->conect()->query($sql);
            $query = $prepare->execute([
                'id_accesorio'         => $datos['id_accesorio'],
                'id_persona'           => $datos['id_persona'],
                'id_tipo_accesorio'    => $datos['id_tipo_accesorio'],
                'id_marca'             => $datos['id_marca'],
                'id_color'             => $datos['id_color'],
                'serie'                => $datos['serie'],
                'descripcion'          => $datos['descripcion'],
            ]);
            if ($query) {
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function delete($id_accesorio)
    {
        try {
            $sql = 'DELETE FROM accesorios WHERE id_accesorio = :id_accesorio';

            $prepare = $this->db->conect()->prepare($sql);
            $query = $prepare->execute([
                'id_accesorio'        => $id_accesorio
            ]);
            if ($query) {
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    
    public function getTipoAccesorio()
    {
        return $this->id_tipo_accesorio;
    }
    public function setTipoAccrsorio($id_tipo_accesorio)
    {
        return $this->id_tipo_accesorio = $id_tipo_accesorio;
    }

    
    public function getPersonaNombre()
    {
        return $this->id_persona;
    }
    public function setIdPersona($id_persona)
    {
        return $this->id_persona = $id_persona;
    }
    // -------------------
    public function getTipoIdentificacion()
    {
        return $this->tipo_identificacion;
    }

    public function setTipoIdentificacion($tipo_identificacion)
    {
        $this->tipo_identificacion = $tipo_identificacion;
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
    // --------------------------
    
    public function getSerie()
    {
        return $this->serie;
    }
    public function setSerie($serie)
    {
        return $this->serie = $serie;
    }
    
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->$descripcion = $descripcion;
    }    
}
