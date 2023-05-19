<?php

    require_once '../models/dispositivosModel.php';

    $dispositivo = new DispositivoController;

    class DispositivoController
    {
        private $registroDispositivo;

        public function __construct()
        {
            $this->registroDispositivo = new DispositivoController();
    
            if (isset($_REQUEST['c'])) {
                switch ($_REQUEST['c']) {
                    case '1': //Almacenar en la base de datos
                        self::store(); 
                        break;
                    case '2': //ver usuario
                        self::show();
                        break;
                    case '3': //Actualizar el registro
                        self::update();
                        break;
                    case '4': //eliminar el registro
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
            return $this->registroDispositivo->getAll();
        }
        public function store()
        {
            $datos = [
                'id_registro_dispositivos'   => $_REQUEST['id_registro_dispositivos',
                'id_tipo_dispositivos'       => $_REQUEST['id_tipo_dispositivos'],
                'id_marca'                   => $_REQUEST['id_marca'],
                'id_color'                   => $_REQUEST['id_color'],
                'id_accesorios'              => $_REQUEST['id_accesorios'],
                'serie'                      => $_REQUEST['serie'],
            ];
            $result = $this->registroDispositivo->store($datos);
            if ($result) {
                header("Location: ../Views/dispositivos/index.php");
                exit();
            } else {
                echo $error = "Error";
            }
        }
        public function show()
        {
            $id = $_REQUEST['id_tipo_dispositivos'];
            header("Location: ../Views/dispositivos/index.php?id_trpo_dispositivo=".$id);
        }
        public function delete()
        {
            $this->dispositivo->delete($_REQUEST['id_tipo_dispositivos']);
            header("Location: ../Views/dispositivos/index.php");
        }
        public function update()
        {
            $datos = [
                'id_tipo_dispositivos'       = $_REQUEST['id_tipo_dispositivos'],
                'id_marca'                   = $_REQUEST['id_marca'],
                'id_color'                   = $_REQUEST['id_color'],
                'id_accesorios'              = $_REQUEST['id_accesorios'],
                'serie'                      = $_REQUEST['serie']
            ];
            $result = $this->registroDispositivo->update($datos);
    
            if ($result) {
                header("Location: ../Views/dispositivos/actualizar.php");
                exit();
            }
            return $result;
        }}