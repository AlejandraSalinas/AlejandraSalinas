<?php
    require_once dirname(__FILE__) . '../../../config/config.php';
    include_once('../../Views/Main/partials/header.php');
    include_once('../../models/dispositivosModel.php');

    
    $data = new DispositivoModel();
    $registroDispositivo = $data->getAll();

    // var_dump($registroDispositivo);
?>
<div style="padding:1px 16px;height:1000px;">


    <table class="table table-striped">
        <thead>
        <tr class="text-center">
                <th scope="col" colspan="10"><h3>Base de datos del registro de Ingreso/Egreso</h3></th>
            </tr>
            <tr class="text-center">
                <th scope="col" colspan="3">Informacion del Usuario</th>
                <th scope="col" colspan="1">Dispositivo Registrado</th>
                <th scope="col" colspan="1">Accesorio Registrado</th>
                <th scope="col" colspan="2">Ingreso</th>
                <th scope="col" colspan="3">Opciones</th>              
            </tr>
            <tr class="text-center">
                <th scope="col">Tipo de Identificación</th>
                <th scope="col">Número de Identificación</th>
                <th scope="col">Nombre Completo</th>

                <th scope="col">Datos del Dispositivo Registrado</th>
                
                <th scope="col">Datos del Accesorio Registrado</th>

                <th scope="col">Entrada</th>
                <th scope="col">Salida</th>



                
                <th scope="col">Ver</th>
                <th scope="col">Actualizar</th>
                <th scope="col">Eliminar</th>
                
                
            </tr>
        </thead>
        <tbody>
            <?php

                        if ($registroDispositivo) {
                            $pos = 1;
            
                            foreach ($registroDispositivo as $row) {
                        

                 ?>
                    <tr class="text-center">
                        <td><?= $row->getTipoIdentificacion() ?></td>
                        <td><?= $row->getNumeroIdentificacion() ?></td>
                        <td><?= $row->getPersonaNombre() ?></td>
                        
                        <td><strong>Dispositivo:</strong> "<?= $row->getTipoDispositivos()?>", <strong>Marca</strong> "<?=$row->getMarca()?>", <strong>Color</strong> "<?=$row->getColor()?>", <strong>Serie</strong> "<?= $row->getSerie()?>", <strong>Descripción</strong> "<?= $row->getDescripcion()?>"</td>
                        <td><strong>Accesorio:</strong> "<?= $row->getTipoDispositivos()?>", <strong>Marca</strong> "<?=$row->getMarca()?>", <strong>Color</strong> "<?=$row->getColor()?>", <strong>Serie</strong> "<?= $row->getSerie()?>", <strong>Descripción</strong> "<?= $row->getDescripcion()?>"</td>



                        <td></td><td></td>
                        <td>
                            <a class="btn btn-sm btn-outline-primary" href="show.php?id_ingresar=<?= $row->getId() ?>">
                                <i class="bi bi-eye-fill" style="font-size: 1.4rem;"></i>
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-sm btn-outline-warning" href="../../controllers/ingresarController.php?c=2&id_ingresar=<?= $row->getId() ?>">
                                <i class="bi bi-pencil-square" style="font-size: 1.4rem;"></i>
                            </a>   
                        </td>
                        <td>
                            <a class="btn btn-sm btn-outline-danger" href="../../controllers/ingresarController.php?c=4&id_ingresar=<?=$row->getId() ?>">
                                <i class="bi bi-trash3-fill" style="font-size: 1.4rem;"></i>
                            </a>
                            
                        </td>

                    </tr>
                    <?php
                        }
                } else {
                    ?>
                    <tr class=" text-center">
                        <td colspan="13">Sin datos</td>
                </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
            
</div>
<?php require_once('../main/partials/footer.php');?>