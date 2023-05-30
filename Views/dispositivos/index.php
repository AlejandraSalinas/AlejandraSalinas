<?php
    require_once dirname(__FILE__) . '../../../config/config.php';
    include_once('../../Views/Main/partials/header.php');
    include_once('../../models/dispositivosModel.php');
    
    $data = new DispositivoModel();
    $registroDispositivo = $data->getAll();
?>
<div class=container-fluis>
    <h1>Registro de Dispositivo</h1>
    <hr>
    <h3>Base de datos de los dispositivos registrados</h3>
    <table class="table table-sm table-hover">
        <thead>
            <tr class="text-center">
                <th scope="col">Tipo de Identificación</th>
                <th scope="col">Número de Identificación</th>
                <th scope="col">Tipo de Dispositivo</th>
                <th scope="col">Marca de Dispositivo</th>
                <th scope="col">Color del Dispositivo</th>
                <th scope="col">Accesorios</th>
                <th scope="col">Serie del Dispositivo</th>
                
                <th scope="col" colspan="2">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if ($registroDispositivo) {
                    foreach ($registroDispositivo as $row) {
                 ?>
                    <tr class="text-center">
                        <td><?= $row->id_tipo_identificacion?></td>
                        <td><?= $row->id_numero_identificacion?></td>
                        <td><?= $row->id_tipo_dispositivos ?></td>
                        <td><?= $row->id_marca ?></td>
                        <td><?= $row->id_color ?></td>
                        <td><?= $row->id_accesorios ?></td>
                        <td><?= $row->serie ?></td>
                        <td>
                            <a class="btn btn-sm btn-outline-warning" href="../../controllers/dispositivosController.phpc=2&id=<?= $row->getId() ?>">Actualizar</a>
                        </td>
                        <td>
                            <a class="btn btn-sm btn-outline-warning" href="../../controllers/dispositivosController.phpc=4&id=<?= $row->getId() ?>">Eliminar</a>
                        </td>
                    </tr>
                    <?php
                        }
                } else {
                    ?>
                    <tr class=" text-center">
                        <td colspan="6">Sin datos</td>
                </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
            
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
<?php require_once('../main/partials/footer.php');?>