<?php

    require_once '../models/dispositivosModel.php';

    $controllerDispositivo = new DispositivoController;

    class DispositivoController
    {
        private $dispositivo;

        public function __construct()
        {
            $this->dispositivo = new DispositivoModel();
    
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
            return $this->dispositivo->getAll();
        }

        public function store()
        {
            $datos = [
                'id_tipo_identificacion'   => $_REQUEST['id_tipo_identificacion'],
                'numero_identificacion' => $_REQUEST['numero_identificacion'],
                'id_tipo_dispositivos'       => $_REQUEST['id_tipo_dispositivos'],
                'id_marca'                   => $_REQUEST['id_marca'],
                'id_color'                   => $_REQUEST['id_color'],
                'id_accesorios'              => $_REQUEST['id_accesorios'],
                'serie'                      => $_REQUEST['serie'],
            ];
            $result = $this->dispositivo->store($datos);
            if ($result) {
                header("Location: ../Views/dispositivos/index.php");
                exit();
            }
            return $result;
        }

        public function show()
        {
            $id_registro_dispositivos = $_REQUEST['id_registro_dispositivos'];
            header("Location: ../Views/dispositivos/update.php?id_registro_dispositivos=" . $id_registro_dispositivos);
        }

        public function delete()
        {
            $this->dispositivo->delete($_REQUEST['id_registro_dispositivos']);
            header("Location: ../Views/dispositivos/index.php");
        }

        public function update()
        {
            $datos = [
                'id_tipo_identificacion'   => $_REQUEST['id_tipo_identificacion'],
                'numero_identificacion' => $_REQUEST['numero_identificacion'],
                'id_tipo_dispositivos'       => $_REQUEST['id_tipo_dispositivos'],
                'id_marca'                   => $_REQUEST['id_marca'],
                'id_color'                   => $_REQUEST['id_color'],
                'id_accesorios'              => $_REQUEST['id_accesorios'],
                'serie'                      => $_REQUEST['serie']
            ];
            $result = $this->dispositivo->update($datos);
    
            if ($result) {
                header("Location: ../Views/dispositivos/update.php");
                exit();
            }
            return $result;
        }}