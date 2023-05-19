<?php
include_once dirname(__FILE__) . '../../Config/config.php';
require_once 'DataBaseModel.php';

class RolesModel
{
    private $id_rol;
    private $nombre;
    private $db;

    public function __construct()
    {
        $this->db = new DataBase();
    }

    public function getId()
    {
        return $this->id_rol;
    }

    public function getById($id_rol)
    {
        $datos_rol = [];

        try {
            $sql   =  "SELECT * FROM roles WHERE id_rol = :id_rol";
            $query = $this->db->conect()->query($sql);
            $query->execute([
                'id_rol' => $id_rol
            ]);

            while ($row = $query->fetch()){
                $item          = new  RolesModel();
                $item->id_rol  = $row['id_rol'];
                $item->nombre  = $row['nombre'];

                array_push($datos_rol, $item);
            }

            return $datos_rol;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function getAll()
    {
        $rol = [];

        try {
            $sql= 'SELECT * FROM roles ORDER BY id_rol ASC';
            $query = $this->db->conect()->query($sql);

            while ($row = $query->fetch()){
                $datos         = new RolesModel();
                $datos->id_rol = $row['id_rol'];
                $datos->nombre = $row['nombre'];

                array_push($rol, $datos);
            }
            return $rol;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function store($datos)
    {
        try {
            $sql = 'INSERT INTO roles(id_rol) VALUES (:roles)';
            $prepare = $this->db->conect()->query($sql);
            $query = $prepare->execute([
                'roles' => $datos['roles']
            ]);
            if ($query) {
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    // GETTER Y SETTER
    public function getRoles()
    {
        return $this->nombre;
    }
    public function setRoles($nombre)
    {
        return $this->nombre;
    }
}