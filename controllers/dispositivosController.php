<?php

    require_once '../models/dispositivosModel.php';

    $dispositivo = new DispositivoController;

    class DispositivoController
    {
        private $registroDispositivo;

        public function __construct()
        {
            $this->dispositivore = new DispositivoModel();
        }

        public function index()
        {
            return $this->dispositivoRE->getAll();
        }

        public function show()
        {
            $id = $_REQUEST['id'];
            header("Location: " . constant('URL') . "Views/dispositivo/actualizar.php?id=" . $id);
        }



        public function delete()
        {
            $id = $_REQUEST['id'];
            $result = $this->dispositivoRE->delete($id);
            if ($result) {
                header("Location: " . constant('URL') . "Views/dispositivo/index.php");
                exit();
            }
        }
    }
?>