<?php
require_once dirname(__FILE__) . '../../../config/config.php';
require_once('../../Views/Main/partials/header.php');
require_once('../../models/PersonaModel.php');
include '../../Views/dispositivos/menuDispositivo.php'
?>
<?php
if (isset($_REQUEST['ingresar'])){
    $fecha $_POST['fecha'];
    $query  = $this->db->conect()->query($sql);
    $query->execute([
}
?>