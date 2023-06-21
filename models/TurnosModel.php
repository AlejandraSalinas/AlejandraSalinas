<?php
include_once dirname(__FILE__) . '../../Config/config.php';
require_once 'DataBaseModel.php';

class TurnosModel
{
    private $id_turno;
    private $id_vigilante;
    private $id_supervisor;
    private $id_posicion;
    private $id_sede;
    private $tipo_identificacion;
    private $numero_identificacion;
    private $fecha_inicial;
    private $hora_inicial;
    private $fecha_final;
    private $hora_final;
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
                $item                 = new TurnosModel();
                $item->id_turno       = $row['id_turno'];
                $item->fecha_inicial  = $row['fecha_inicial'];
                $item->hora_inicial   = $row['hora_inicial'];
                $item->fecha_final    = $row['fecha_final'];
                $item->hora_final     = $row['hora_final'];

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
            ORDER BY fecha_inicial, hora_inicial, fecha_final, hora_final ASC';

            // -- JOIN tipo_identificacion ON personas.id_tipo_identificacion = tipo_identificacion.id_tipo_identificacion
            // -- JOIN roles ON personas.id_rol = roles.id_rol
            // -- JOIN sexo ON personas.id_sexo = sexo.id_sexo

            $query = $this->db->conect()->query($sql);

            while ($row = $query->fetch()) {
                $datos                 = new TurnosModel();
                $datos->id_turno       = $row['id_turno'];
                $datos->id_vigilante   = $row['id_persona'];
                $datos->fecha_inicial  = $row['fecha_inicial'];
                $datos->hora_inicial   = $row['hora_inicial'];
                $datos->fecha_final    = $row['fecha_final'];
                $datos->hora_final     = $row['hora_final'];

                array_push($turnos, $datos);
            }
            return $turnos;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function store($datos)
    {
        print_r($datos);
        die();
        
        try {
            $sql = 'INSERT INTO turnos(id_vigilante, fecha_inicial, hora_inicial, fecha_final, hora_final, id_sede, id_posicion, id_supervisor) 
            VALUES (:id_vigilante, :fecha_inicial, :hora_inicial, :fecha_final, :hora_final, :id_sede, :id_posicion, :id_supervisor)';

            $prepare = $this->db->conect()->prepare($sql);
            $query = $prepare->execute([
                'id_vigilante'   => $datos['id_vigilante'],
                'fecha_inicial'  => $datos['fecha_inicial'],
                'hora_inicial'   => $datos['hora_inicial'],
                'fecha_final'    => $datos['fecha_final'],
                'hora_final'     => $datos['hora_final'],
                'id_sede'        => $datos['id_sede'],
                'id_posicion'    => $datos['id_posicion'],
                'id_supervisor'  => $datos['id_supervisor']

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
            $sql = 'UPDATE turnos SET  fecha_inicial = :fecha_inicial, hora_inicial = :hora_inicial, fecha_final = :fecha_final, hora_final = :hora_final,
            -- id_vigilante = :id_vigilante
            WHERE id_turno = :id_turno';

            $prepare = $this->db->conect()->prepare($sql);
            $query = $prepare->execute([
                'id_turno'      => $datos['id_turno'],
                // 'id_vigilante'      => $datos['id_vigilante'],
                'fecha_inicial'  => $datos['fecha_inicial'],
                'hora_inicial'   => $datos['hora_inicial'],
                'fecha_final'    => $datos['fecha_final'],
                'hora_final'     => $datos['hora_final']

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
    public function getVigilante()
    {
        return $this->id_vigilante;
    }
    public function setVigilante($id_vigilante)
    {
        $this->id_vigilante = $id_vigilante;
    }

    public function getSupervisor()
    {
        return $this->id_supervisor;
    }
    public function setSupervisor($id_supervisor)
    {
        $this->id_supervisor = $id_supervisor;
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

    public function getFechaInicial()
    {
        $this->fecha_inicial;
    }
    public function setFechaInicial($fecha_inicial)
    {
        $this->fecha_inicial = $fecha_inicial;
    }

    public function getHoraInicial()
    {
        $this->hora_inicial;
    }
    public function setHoraInicial($hora_inicial)
    {
        $this->hora_inicial = $hora_inicial;
    }

    public function getFechaFinal()
    {
        $this->fecha_final;
    }
    public function setFechaFinal($fecha_final)
    {
        $this->fecha_final = $fecha_final;
    }

    public function getHoraFinal()
    {
        $this->hora_final;
    }
    public function setHoraFinal($hora_final)
    {
        $this->hora_final = $hora_final;
    }
    public function getPosiciones()
    {
        return $this->id_posicion;
    }
    public function setPosiciones($id_posicion)
    {
        $this->id_posicion = $id_posicion;
    }
    public function getSedes()
    {
        return $this->id_sede;
    }
    public function setSedes($id_sede)
    {
        $this->id_sede = $id_sede;
    }
}
