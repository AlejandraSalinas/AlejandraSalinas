<?php
include_once dirname(__FILE__) . '../../Config/config.php';

require_once 'DataBaseModel.php';

class VigilanteModel
{
    private $id_vigilante;
    private $pass;
    private $inicio_contrato;
    private $fin_contrato;
    private $estado;
    private $db;

    public function __construct()
    {
        $this->db = new DataBase();
    }

    public function getId()
    {
        return $this->id_vigilante;
    }

    public function getById($id_vigilante)
    {
        $datos_usuario = [];

        try {
            $sql  = 'SELECT * FROM personas WHERE id_rol = 4';
            // $sql  = 'SELECT * FROM info_vigilantes WHERE id_vigilante = :id_vigilante';
            $query = $this->db->conect()->prepare($sql);
            $query->execute([
                'id_vigilante' => $id_vigilante
            ]);

            while ($row = $query->fetch()) {
                $item                        = new VigilanteModel();
                $item->id_vigilante          = $row['id_vigilante'];
                $item->pass                  = $row['pass'];
                $item->inicio_contrato       = $row['inicio_contrato'];
                $item->fin_contrato          = $row['fin_contrato'];
                $item->estado                = $row['estado'];

                array_push($datos_usuario, $item);
            }

            return $datos_usuario;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


    public function getAll()
    {
        $items = [];

        try {
           
            $sql= 'SELECT id_vigilante, pass, inicio_contrato, fin_contrato, estado
            FROM info_vigilantes  ORDER BY id_vigilante ASC ';
            $query  = $this->db->conect()->query($sql);

            while ($row = $query->fetch()) {
                $item                        = new VigilanteModel();
                $item->id_vigilante          = $row['id_vigilante'];
                $item->pass                  = $row['pass'];
                $item->inicio_contrato       = $row['inicio_contrato'];
                $item->fin_contrato          = $row['fin_contrato'];
                $item->estado                = $row['estado'];

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

            $sql = 'INSERT INTO info_vigilantes(pass, inicio_contrato, fin_contrato, estado) 
            VALUES(:id_persona, :pass, :inicio_contrato, :fin_contrato, :estado)';

            $prepare = $this->db->conect()->prepare($sql);
            $query = $prepare->execute([
                'pass'            => $datos['pass'],
                // 'id_persona'      => $datos['id_persona'],
                'inicio_contrato' => $datos['inicio_contrato'],
                'fin_contrato'    => $datos['fin_contrato'],
                'estado'          => $datos['estado'],
                
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

            $sql = 'UPDATE info_vigilantes SET 
            pass = :pass,
            id_persona = :id_persona,
            inicio_contrato = :inicio_contrato,
            fin_contrato = :fin_contrato,
            estado = :estado
            WHERE id_vigilante = :id_vigilante';

            $prepare = $this->db->conect()->prepare($sql);
            $query = $prepare->execute([
                'id_vigilante'       => $datos['id_vigilante'],
                'id_persona'         => $datos['id_persona'],
                'password'           => $datos['password'],
                'inicio_contrato'    => $datos['inicio_contrato'],
                'fin_contrato'       => $datos['fin_contrato'],
                'estado'             => $datos['estado']
            ]);

            if ($query) {
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function delete($id_vigilante)
    {
        try {
            $sql = 'DELETE FROM info_vigilantes WHERE id_vigilante = :id_vigilante';

            $prepare = $this->db->conect()->prepare($sql);
            $query = $prepare->execute([
                'id_vigilante'        => $id_vigilante
            ]);
            if ($query) {
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


    // GETTER Y SETTER
    public function getPassword(){
        return $this->pass;
    }
    public function setPassword($pass){
        return $this->pass;
    }

    public function getInicioContrato(){
        return $this->inicio_contrato;
    }
    public function setInicioContrato($inicio_contrato){
        return $this->inicio_contrato;
    }

    public function getFinContrato(){
        return $this->fin_contrato;
    }
    public function setFinContrato($fin_contrato){
        return $this->fin_contrato;
    }

    public function getEstado(){
        return $this->estado;
    }    
    public function setEstado($estado){
        return $this->estado;
    }
   
}
