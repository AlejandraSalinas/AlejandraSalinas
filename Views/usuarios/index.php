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
                            <a class="btn btn-sm btn-outline-warning" href="../usuarios/show.php">Ver</a>
                        </td>
                        <td>
                            <a class="btn btn-sm btn-outline-warning" href="update.php?c=3&id_persona=<?= $row->getId() ?>">Actualizar</a>
                            
                        </td>
                        <td>
                            <a class="btn btn-sm btn-outline-warning" href="../../controller/clienteController.php?c=4&id_persona=<?= $row->getId() ?>">Eliminar</a>
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
</div>
<!-- /.container-fluid -->

<?php require_once("../Main/partials/footer.php"); ?>