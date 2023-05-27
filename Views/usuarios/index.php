<?php

require_once dirname(__FILE__) . '../../../config/config.php';

require_once("../Main/partials/header.php");
require_once('../../Models/PersonaModel.php');

$data = new PersonaModel();
$registro = $data->getAll();

?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Vista de usuarios</h1>

    <table class="table table-sm table-hover">
        <thead>
            <tr class="text-center">          
                <th scope="col">Número de Identificación</th>
                <th scope="col">Primer Nombre</th>
                <th scope="col">Segundo Nombre</th>
                <th scope="col">Primer Apellido</th>
                <th scope="col">Segundo Apellido</th>
                <th scope="col">Email:</th>
                <th scope="col">Teléfono:</th>
                <th scope="col">Dirección:</th>
                <th scope="col">Sexo:</th>
                <th scope="col">Rol:</th>
                <th scope="col" colspan="3">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($registro) {
                $pos = 1;

                foreach ($registro as $row) {
            ?>
                    <tr class="text-center">
                        <td><?= $row->getNumeroIdentificacion()?></td>
                        <td><?= $row->getPrimerNombre()?></td>
                        <td><?= $row->getSegundoNombre()?></td>
                        <td><?= $row->getPrimerApellido()?></td>
                        <td><?= $row->getSegundoApellido()?></td>
                        <td><?= $row->getEmail()?></td>
                        <td><?= $row->getTelefono() ?></td>
                        <td><?= $row->getDireccion() ?></td>
                        <td><?= $row->getSexo() ?></td>
                        <td><?= $row->getRol()?></td>

                        <td>
                            <a class="btn btn-sm btn-outline-primary" href="show.php?id_persona=<?= $row->getId() ?>">
                                <i class="bi bi-eye-fill" style="font-size: 1.4rem;"></i>
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-sm btn-outline-warning" href="../../controllers/PersonaController.php?c=2&id_persona=<?= $row->getId() ?>">
                                <i class="bi bi-pencil-square" style="font-size: 1.4rem;"></i>
                            </a>   
                        </td>
                        <td>
                            <a class="btn btn-sm btn-outline-danger" href="../../controllers/PersonaController.php?c=4&id_persona=<?=$row->getId() ?>">
                                <i class="bi bi-trash3-fill" style="font-size: 1.4rem;"></i>
                            </a>
                            
                        </td>
                    </tr>
                    
                <?php
                    $pos++;
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
    <div class="row justify-content-center">
        <div class="col-2">
            <a class="btn btn-outline-success"  href="../Main/index.php">Regresar a Inicio</a>
        </div>        
    </div>
</div>
<!-- /.container-fluid -->

<?php require_once("../Main/partials/footer.php"); ?>