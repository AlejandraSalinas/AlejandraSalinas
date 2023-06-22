.
<?php

include_once dirname(__FILE__) . '../../Config/config.php';
require_once 'dataBaseModel.php';


class DispositivoModel
{
    private $id_dispositivo;
    private $id_persona;
    private $tipo_identificacion;
    private $numero_identificacion;
    private $primer_nombre;
    private $segundo_nombre;
    private $primer_apellido;
    private $segundo_apellido;
    private $id_tipo_dispositivo;
    private $id_marca;
    private $id_color;
    private $id_accesorio;
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

    public function getById($id_dispositivo)
    {
        $datos_dipositivo = [];

        try {

            $sql = ' SELECT id_dispositivo, ti.nombre AS id_tipo_identificacion, p.numero_identificacion,  primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, td.nombre AS id_tipo_dispositivo, m.nombre AS id_marca, c.nombre AS id_color, d.serie 
            FROM dispositivos AS d
            JOIN personas AS p ON p.id_persona = d.id_persona
            JOIN tipo_identificacion AS ti ON p.id_tipo_identificacion = ti.id_tipo_identificacion
            JOIN tipo_dispositivos AS td ON d.id_tipo_dispositivo = td.id_tipo_dispositivo
            JOIN marcas AS m ON d.id_marca = m.id_marca
            JOIN colores AS c ON d.id_color = c.id_color';
            $query  = $this->db->conect()->query($sql);
            $query->execute([
                'id_dispositivo' => $id_dispositivo
            ]);
            while ($row = $query->fetch()) {
                $item                                   = new DispositivoModel();
                $item->tipo_identificacion   = $row['id_tipo_identificacion'];
                $item->numero_identificacion = $row['numero_identificacion'];
                $item->primer_nombre         = $row['primer_nombre'];
                $item->segundo_nombre        = $row['segundo_nombre'];
                $item->primer_apellido       = $row['primer_apellido'];
                $item->segundo_apellido      = $row['segundo_apellido'];
                $item->id_dispositivo        = $row['id_dispositivo'];
                $item->id_tipo_dispositivo   = $row['id_tipo_dispositivo'];
                $item->id_marca              = $row['id_marca'];
                $item->id_color              = $row['id_color'];
                $item->serie                 = $row['serie'];

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
            $sql = 'SELECT id_dispositivo, ti.nombre AS id_tipo_identificacion, p.numero_identificacion, CONCAT(p.primer_nombre, " ", p.segundo_nombre, " ", p.primer_apellido, " ", p.segundo_apellido) AS nombre,
            td.nombre AS id_tipo_dispositivo, m.nombre AS id_marca, c.nombre AS id_color, d.serie 
            FROM dispositivos AS d
            JOIN personas AS p ON p.id_persona = d.id_persona
            JOIN tipo_identificacion AS ti ON p.id_tipo_identificacion = ti.id_tipo_identificacion
            JOIN tipo_dispositivos AS td ON d.id_tipo_dispositivo = td.id_tipo_dispositivo
            JOIN marcas AS m ON d.id_marca = m.id_marca
            JOIN colores AS c ON d.id_color = c.id_color';


            $query  = $this->db->conect()->query($sql);

            while ($row = $query->fetch()) {
                $item                           = new DispositivoModel();
                $item->id_dispositivo           = $row['id_dispositivo'];
                $item->tipo_identificacion      = $row['id_tipo_identificacion'];
                $item->numero_identificacion    = $row['numero_identificacion'];
                $item->id_persona               = $row['nombre'];
                $item->id_tipo_dispositivo      = $row['id_tipo_dispositivo'];
                $item->id_marca                 = $row['id_marca'];
                $item->id_color                 = $row['id_color'];
                $item->serie                    = $row['serie'];

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
            $sql = "INSERT INTO dispositivos(id_persona, id_tipo_dispositivo, id_marca, id_color, serie)
            VALUES (:id_persona, :id_tipo_dispositivo, :id_marca, :id_color, :serie)";
            $prepare = $this->db->conect()->prepare($sql);
            $query = $prepare->execute([
                'id_persona'           => $datos['id_persona'],
                'id_tipo_dispositivo'  => $datos['id_tipo_dispositivo'],
                'id_marca'             => $datos['id_marca'],
                'id_color'             => $datos['id_color'],
                'serie'                => $datos['serie'],
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

            id_tipo_dispositivo = :id_tipo_dispositivo,
            id_marca = :id_marca,
            id_color = :id_color,
            id_accesorio = :id_accesorio,
            serie  = :serie             
            WHERE id_dispositivo = :id_dispositivo';

            $prepare = $this->db->conect()->query($sql);
            $query = $prepare->execute([
                'id_dispositivo'       => $datos['id_dispositivo'],

                'tipo_identificacion  '     => $datos['id_tipo_identificacion'],
                'numero_identificacion'     => $datos['numero_identificacion'],
                'id_persona'                => $datos['id_persona'],
                'id_tipo_dispositivo'       => $datos['id_tipo_dispositivo'],
                'id_marca'                  => $datos['id_marca'],
                'id_color'                  => $datos['id_color'],
                'id_accesorio'              => $datos['id_accesorio'],
                'serie'                     => $datos['serie'],

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
        return $this->id_accesorio;
    }
    public function setAccesorios($id_accesorio)
    {
        return $this->id_accesorio = $id_accesorio;
    }

    public function getSerie()
    {
        return $this->serie;
    }
    public function setSerie($serie)
    {
        return $this->serie = $serie;
    }
    
    public function getIdPersona()
    {
        return $this->id_persona;
    }
    public function setIdPersona($id_persona)
    {
        return $this->id_persona = $id_persona;
    }


}
