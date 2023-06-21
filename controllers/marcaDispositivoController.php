<?php
require_once '../models/marcaDispositivoModel.php';

$controller = new marcaDispositivoController;
class marcaDispositivoController
{
    private $marca;

    public function __construct()
    {
        $this->marca = new MarcaDispositivoModel();

        if (isset($_REQUEST['c'])) {
            switch ($_REQUEST['c']) {
                case '1': //Almacenar en la base de datos
                    self::store();
                    break;
                case '2': //Ver 
                    self::show();
                    break;
                case '3': //Actualizar  
                    self::update();
                    break;
                case '4': //Eliminar  
                    self::delete();
                    break;
                default:
                    self::index();
                    break;
            }
        }
    }
    public function index()
    {
        return $this->marca->getAll();
    }

    public function store()
    {
        $datos = [
            'nombre' => $_REQUEST['nombre']
        ];

        $result = $this->marca->store($datos);

        if ($result) {
            header("Location: ../Views/configMarca/index.php");
            exit();
        }

        return $result;
    }
    
    public function show()
    {
        $id_marca = $_REQUEST['id_marca'];
        header('location: ../Views/configMarca/index.php?id_marca=' . $id_marca);
    }

    public function delete()
    {
        $this->marca->delete($_REQUEST['id_marca']);
        header("Location: ../Views/configMarca/index.php");
    }
    public function update()
    {
        $datos = [
            'id_marca'   => $_REQUEST['id_marca'],
            'nombre'   => $_REQUEST['nombre'],
        ];

        $result = $this->marca->update($datos);

        if ($result) {
            echo json_encode(array('succes' => 1, 'nombre' => $datos['nombre']));
        }
    }
}