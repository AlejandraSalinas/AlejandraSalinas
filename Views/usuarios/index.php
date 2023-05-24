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
                            <a class="btn btn-sm btn-outline-primary" href="../../controllers/PersonaController.php?c=2&id_persona=<?= $row->getId() ?>"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                            </svg></a>
                        </td>
                        <td>
                            <a class="btn btn-sm btn-outline-success" href="../../controllers/PersonaController.php?c=3&id_persona=<?= $row->getId() ?>"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg></a>   
                        </td>
                        <td>
                            <a class="btn btn-sm btn-outline-warning" href="../../controllers/PersonaController.php?c=4&id_persona=<?=$row->getId() ?>"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                            </svg></a>
                            
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