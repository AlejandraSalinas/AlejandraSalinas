<?php
include_once dirname(__FILE__) . '../../Config/config.php';
require_once 'DataBaseModel.php';

class TurnosModel
{
    private $id_turno;
    private $fecha;
    private $hora_inicio;
    private $hora_fin;
    private $db;

    public function __construct()
    {
        $this->db = new DataBase;
    }

    public function getId()
    {
        return $this->id_turno;
    }

    public function getById($id_turno)
    {
        $datos_turno = [];

        try {
            $sql = 'SELECT * FROM turnos WHERE id_turno = :id_turno';
            
            $query = $this->db->conect()->prepare($sql);
            $query->execute([
                'id_turno' => $id_turno 
            ]);

            while ($row = $query->fetch()) {
                $item               = new TurnosModel();
                $item->id_turno     = $row['id_turno'];
                $item->fecha        = $row['fecha'];
                $item->hora_inicio  = $row['hora_inicio'];
                $item->hora_fin     = $row['hora_fin'];

                array_push($datos_turno, $item);
            }
            return $datos_turno;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAll()
    {
        $turnos    = [];

        try {
           $sql = 'SELECT * FROM turnos 
           ORDER BY fecha, hora_inicio, hora_fin ASC';

           $query = $this->db->conect()->query($sql);
        
            while ($row = $query->fetch()) {
                $datos               = new TurnosModel();
                $datos->id_turno     = $row['id_turno'];
                $datos->fecha        = $row['fecha'];
                $datos->hora_inicio  = $row['hora_inicio'];
                $datos->hora_fin     = $row['hora_fin'];

                array_push($turnos, $datos);
            }
            return $turnos;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function store($datos)
    {
        try {
            $sql = 'INSERT INTO turnos(id_turno, fecha, hora_inicio, hora_fin) 
            VALUES (:id_turno, :fecha, :hora_inicio, :hora_fin)';
            
            $prepare = $this->db->conect()->prepare($sql);
            $query = $prepare->execute([
                'id_turno' => $datos['id_turno'],
                'fecha' => $datos['fecha'], 
                'hora_inicio' => $datos['hora_inicio'], 
                'hora_fin' => $datos['hora_fin'] 
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
            $sql = 'UPDATE sexo SET  nombre = :nombre WHERE id_sexo = :id_sexo';
            $prepare = $this->db->conect()->prepare($sql);
            $query = $prepare->execute([
                'id_sexo'      => $datos['id_sexo'],
                'nombre'       => $datos['nombre']
            ]);

            if ($query) {
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function delete($id_sexo)
    {
        try {
            $sql = 'DELETE FROM sexo WHERE id_sexo = :id_sexo';
            $prepare = $this->db->conect()->prepare($sql);
            $query = $prepare->execute([
                'id_sexo'  => $id_sexo
            ]);
            if ($query) {
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    // public function getSexo()
    // {
    //     $this->nombre;
    // }
    // public function setSexo($nombre)
    // {
    //     $this->nombre = $nombre;
    // }
}