<?php
    require_once dirname(__FILE__) . '../../../config/config.php';
    include_once('../../Views/Main/partials/header.php');
    include_once('../../models/accesorioModel.php');
    
    $data = new AccesorioModel();
    $registroAccesorios = $data->getAll();
    // var_dump($registroAccesorios);
?>
<div style="padding:1px 16px;height:1000px;">


    <h3>Base de datos de los dispositivos registrados</h3>
    <table class="table table-striped">
        <thead>
            <tr class="text-center">
                <th scope="col" colspan="3">Informacion del Usuario</th>
                <th scope="col" colspan="3">Accesorios Registrado</th>
                <th scope="col" colspan="3">Opciones</th>              
            </tr>
            <tr class="text-center">
                <th scope="col">Tipo de Identificación</th>
                <th scope="col">Número de Identificación</th>
                <th scope="col">Nombre Completo</th>

                <th scope="col">Accesorios</th>

                <th scope="col">Serie</th>

                <th scope="col">Descripcion</th>


                <th scope="col">Ver</th>
                <th scope="col">Actualizar</th>
                <th scope="col">Eliminar</th>.
                
                
            </tr>
        </thead>
        <tbody>
            <?php

                        if ($registroAccesorios) {
                            $pos = 1;
            
                            foreach ($registroAccesorios as $row) {

                 ?>
                    <tr class="text-center">
                        <td><?= $row->getTipoIdentificacion() ?></td>
                        <td><?= $row->getNumeroIdentificacion() ?></td>
                        <td><?= $row->getIdPersona() ?></td>
                        <td><?= $row->getNombreAccesorio() ?></td>
                        <td><?= $row->getSerie() ?></td>
                        <td><?= $row->getDescripcion() ?></td>

                        

                        <td>
                            <a class="btn btn-sm btn-outline-primary" href="show.php?id_dispositivo=<?= $row->getId() ?>">
                                <i class="bi bi-eye-fill" style="font-size: 1.4rem;"></i>
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-sm btn-outline-warning" href="../../controllers/dispositivosController.php?c=2&id_dispositivo=<?= $row->getId() ?>">
                                <i class="bi bi-pencil-square" style="font-size: 1.4rem;"></i>
                            </a>   
                        </td>
                        <td>
                            <a class="btn btn-sm btn-outline-danger" href="../../controllers/dispositivosController.php?c=4&id_dispositivo=<?=$row->getId() ?>">
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