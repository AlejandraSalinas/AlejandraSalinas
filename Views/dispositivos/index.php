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
                <th scope="col">Entrada</th>
                <th scope="col">Salida</th>

                
                <th scope="col" colspan="3">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if ($registroDispositivo) {
                    foreach ($registroDispositivo as $row) {
                 ?>
                    <tr class="text-center">
                        <td><?= $row->getTipoIdentificacion()?></td>
                        <td><?= $row->getNumeroIdentificacion()?></td>
                        <td><?= $row->getTipoDispositivos() ?></td>
                        <td><?= $row->getMarca() ?></td>
                        <td><?= $row->getColor() ?></td>
                        <td><?= $row->getAccesorios() ?></td>
                        <td><?= $row->getSerie() ?></td>
                        <td><?= $row->fecha_entrada ?></td>
                        <td><?= $row->fecha_salida ?></td>
                        
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
                        <td colspan="10">Sin datos</td>
                </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
            
</div>
<?php require_once('../main/partials/footer.php');?>