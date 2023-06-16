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
            $sql = 'INSERT INTO turnos( fecha, hora_inicio, hora_fin) 
            VALUES (:fecha, :hora_inicio, :hora_fin)';
            
            $prepare = $this->db->conect()->prepare($sql);
            $query = $prepare->execute([
                // 'id_turno'   => $datos['id_turno'],
                'fecha'      => $datos['fecha'], 
                'hora_inicio'=> $datos['hora_inicio'], 
                'hora_fin'   => $datos['hora_fin'] 
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
            $sql = 'UPDATE turnos SET  fecha = :fecha, hora_inicio = :hora_inicio, hora_fin = :hora_fin
            WHERE id_sexo = :id_sexo';

            $prepare = $this->db->conect()->prepare($sql);
            $query = $prepare->execute([
                'id_turno'      => $datos['id_turno'],
                'fecha'       => $datos['fecha'],
                'hora_inicio'       => $datos['hora_inicio'],
                'hora_fin'       => $datos['hora_fin']

            ]);

            if ($query) {
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function delete($id_turno)
    {
        try {
            $sql = 'DELETE FROM turnos WHERE id_turno = :id_turno';
            $prepare = $this->db->conect()->prepare($sql);
            $query = $prepare->execute([
                'id_turno'  => $id_turno
            ]);
            if ($query) {
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function getTurno()
    {
        $this->id_turno;
    }
    public function setTurno($id_turno)
    {
        $this->id_turno = $id_turno;
    }

    public function getFecha()
    {
        $this->fecha;
    }
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function getHoraInicio()
    {
        $this->hora_inicio;
    }
    public function setHoraInicio($hora_inicio)
    {
        $this->hora_inicio = $hora_inicio;
    }

    public function getHoraFin()
    {
        $this->hora_fin;
    }
    public function setHoraFin($hora_fin)
    {
        $this->hora_fin = $hora_fin;
    }
}