.
<?php

include_once dirname(__FILE__) . '../../Config/config.php';
require_once 'dataBaseModel.php';


class IngresarModel
{
    private $id_ingresar;
    private $id_persona;
    private $tipo_identificacion;
    private $numero_identificacion;
    private $primer_nombre;
    private $segundo_nombre;
    private $primer_apellido;
    private $segundo_apellido;
    private $id_tipo_dispositivo;
    private $id_tipo_accesorio;
    private $id_marca;
    private $id_color;
    private $serie;
    private $descripcion;
    private $nombre_accesorio;
    private $fecha_entrada;
    private $fecha_salida;


    private $db;

    public function __construct()
    {
        $this->db = new DataBase();
    }

    public function getId()
    {
        return $this->id_ingresar;
    }

    public function getById($id_ingresar)
    {
        $datos_ingreso = [];

        try {

            $sql = 'SELECT id_ingresar, ti.nombre AS id_tipo_identificacion, p.numero_identificacion, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido,
            td.nombre AS id_tipo_dispositivo,
             m.nombre AS id_marca, c.nombre AS id_color, d.serie, d.descripcion, ta.nombre AS id_tipo_accesorio, a.serie, a.descripcion, i.fecha_entrada, i.fecha_salida
                       FROM ingresar AS i
                       JOIN personas AS p ON p.id_persona = p.id_persona
                       JOIN dispositivos AS d ON d.id_dispositivo = d.id_dispositivo
                       JOIN  accesorios AS a ON a.id_accesorio = a.id_accesorio
                     
                       JOIN tipo_identificacion AS ti ON p.id_tipo_identificacion = ti.id_tipo_identificacion
                       JOIN tipo_dispositivos AS td ON d.id_tipo_dispositivo = td.id_tipo_dispositivo
                       JOIN tipo_accesorios AS ta ON a.id_tipo_accesorio = ta.id_tipo_accesorio
                       JOIN marcas AS m ON d.id_marca = m.id_marca
                       JOIN colores AS c ON d.id_color = c.id_color';
            $query  = $this->db->conect()->query($sql);
            $query->execute([
                'id_ingresar' => $id_ingresar
            ]);
            while ($row = $query->fetch()) {
                $item                                   = new IngresarModel();
                $item->tipo_identificacion   = $row['id_tipo_identificacion'];
                $item->numero_identificacion = $row['numero_identificacion'];
                $item->primer_nombre         = $row['primer_nombre'];
                $item->segundo_nombre        = $row['segundo_nombre'];
                $item->primer_apellido       = $row['primer_apellido'];
                $item->segundo_apellido      = $row['segundo_apellido'];
                $item->id_ingresar        = $row['id_ingresar'];
                $item->id_tipo_dispositivo   = $row['id_tipo_dispositivo'];
                $item->id_marca              = $row['id_marca'];
                $item->id_color              = $row['id_color'];
                $item->serie                 = $row['serie'];
                $item->descripcion                 = $row['descripcion'];
                $item->id_tipo_accesorio        = $row['id_tipo_accesorio'];
                $item->fecha_entrada        = $row['fecha_entrada'];
                $item->fecha_salida        = $row['fecha_salida'];





                array_push($datos_ingreso, $item);
            }

            return $datos_ingreso;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


    public function getAll()
    {
        $items = [];

        try {
            $sql = 'SELECT id_ingresar, ti.nombre AS id_tipo_identificacion, p.numero_identificacion, 
            CONCAT(p.primer_nombre, " ", p.segundo_nombre, " ", p.primer_apellido, " ", p.segundo_apellido) AS nombre, td.nombre AS id_tipo_dispositivo,
             m.nombre AS id_marca, c.nombre AS id_color, d.serie, d.descripcion, ta.nombre AS id_tipo_accesorio, a.serie, a.descripcion, i.fecha_entrada, i.fecha_salida
                       FROM ingresar AS i
                       JOIN personas AS p ON p.id_persona = p.id_persona
                       JOIN dispositivos AS d ON d.id_dispositivo = d.id_dispositivo
                       JOIN  accesorios AS a ON a.id_accesorio = a.id_accesorio
                     
                       JOIN tipo_identificacion AS ti ON p.id_tipo_identificacion = ti.id_tipo_identificacion
                       JOIN tipo_dispositivos AS td ON d.id_tipo_dispositivo = td.id_tipo_dispositivo
                       JOIN tipo_accesorios AS ta ON a.id_tipo_accesorio = ta.id_tipo_accesorio
                       JOIN marcas AS m ON d.id_marca = m.id_marca
                       JOIN colores AS c ON d.id_color = c.id_color';


            $query  = $this->db->conect()->query($sql);

            while ($row = $query->fetch()) {
                $item                           = new IngresarModel();
                $item->id_ingresar           = $row['id_ingresar'];
                $item->tipo_identificacion      = $row['id_tipo_identificacion'];
                $item->numero_identificacion    = $row['numero_identificacion'];
                $item->id_persona               = $row['nombre'];
                $item->id_tipo_dispositivo      = $row['id_tipo_dispositivo'];
                $item->id_marca                 = $row['id_marca'];
                $item->id_color                 = $row['id_color'];
                $item->serie                    = $row['serie'];
                $item->descripcion                 = $row['descripcion'];
                $item->id_tipo_accesorio        = $row['id_tipo_accesorio'];
                $item->fecha_entrada        = $row['fecha_entrada'];
                $item->fecha_salida        = $row['fecha_salida'];




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
            $sql = "INSERT INTO ingresar(id_persona, id_dispositivo id_accesorio, fecha_entrada, fecha_salida)
            VALUES (:id_persona, :id_dispositivo :id_accesorio, :fecha_entrada, :fecha_salida)";
            $prepare = $this->db->conect()->prepare($sql);
            $query = $prepare->execute([
                'id_persona'           => $datos['id_persona'],
                'id_dispositivo'  => $datos['id_dispositivo'],
                'id_accesorio'             => $datos['id_accesorio'],
                'fecha_entrada'             => $datos['fecha_entrada'],
                'fecha_salida'                => $datos['fecha_salida'],

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
            $sql = 'UPDATE ingresar SET 
            id_persona         = :id_persona,
            id_dispositivo     = :id_dispositivo,
            id_accesorio       = :id_accesorio,
            fecha_entrada      = :fecha_entrada,
            fecha_salida       = :fecha_salida,

            WHERE id_ingresar = :id_ingresar';

            $prepare = $this->db->conect()->query($sql);
            $query = $prepare->execute([
                'id_ingresar'       => $datos['id_ingresar'],
                'id_persona'        => $datos['id_persona'],
                'id_dispositivo'    => $datos['id_dispositivo'],
                'id_accesorio'      => $datos['id_accesorio'],
                'fecha_entrada'     => $datos['fecha_entrada'],
                'fecha_salida'      => $datos['fecha_salida'],


            ]);
            if ($query) {
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function delete($id_ingresar)
    {
        try {
            $sql = 'DELETE FROM ingresar WHERE id_ingresar = :id_ingresar';

            $prepare = $this->db->conect()->prepare($sql);
            $query = $prepare->execute([
                'id_ingresar'        => $id_ingresar
            ]);
            if ($query) {
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }



    public function getTipoIdentificacion()
    {
        return $this->tipo_identificacion;
    }

    public function setTipoIdentificacion($tipo_identificacion)
    {
        $this->tipo_identificacion = $tipo_identificacion;
    }

    public function getNumeroIdentificacion()
    {
        return $this->numero_identificacion;
    }

    public function setNumeroIdentificacion($numero_identificacion)
    {
        $this->numero_identificacion = $numero_identificacion;
    }
    
    public function getPersonaNombre()
    {
        return $this->id_persona;
    }
    public function setIdPersona($id_persona)
    {
        return $this->id_persona = $id_persona;
    }

    // _____________________

    public function getTipoDispositivos()
    {
        return $this->id_tipo_dispositivo;
    }
    public function setTipoDispositivos($id_tipo_dispositivo)
    {
        return $this->id_tipo_dispositivo = $id_tipo_dispositivo;
    }

    
    public function getTipoAccesorio()
    {
        return $this->id_tipo_accesorio;
    }
    public function setTipoAccesorio($id_tipo_accesorio)
    {
        return $this->id_tipo_accesorio = $id_tipo_accesorio;
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
    
    // ____________________________

    
    public function getFechaEntrada()
    {
        return $this->fecha_entrada;
    }
    
    public function setFechaEntrada($fecha_entrada)
    {
        $this->$fecha_entrada = $fecha_entrada;
    }
    

        
    public function getFechaSalida()
    {
        return $this->fecha_salida;
    }
    
    public function setFechaSalida($fecha_salida)
    {
        $this->$fecha_salida = $fecha_salida;
    }
    
    
    
    
    
    
    
    
    
}


