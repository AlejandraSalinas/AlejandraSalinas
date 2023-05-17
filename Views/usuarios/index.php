<?php

require_once dirname(__FILE__) . '../../../config/config.php';

require_once("../Main/partials/header.php");
require_once('../../Models/PersonaModel.php');

$data = new PersonaModel();
$registros = $data->getAll();

?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Vista de usuarios</h1>

    <h1>
        Tabla de registros ingresados
    </h1>
    <table class="table table-sm table-hover">
        <thead>
            <tr class="text-center">
                <th scope="col">Tipo de Identificación</th>
                <th scope="col">Número de Identificación</th>
                <th scope="col">Primer Nombre:</th>
                <th scope="col">Segundo Nombre:</th>
                <th scope="col">Primer Apellido:</th>
                <th scope="col">Segundo Apellido:</th>
                <th scope="col">Email:</th>
                <th scope="col">Teléfono:</th>
                <th scope="col">Dirección:</th>
                <th scope="col">Sexo:</th>
                <th scope="col">Rol:</th>
                <th scope="col" colspan="2">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($registros) {

                foreach ($registros as $row) {
            ?>
                    <tr class="text-center">
                        <td><?= $row->tipo_identificación ?></td>
                        <td><?= $row->numero_identificación ?></td>
                        <td><?= $row->primer_nombre ?></td>
                        <td><?= $row->segundo_nombre ?></td>
                        <td><?= $row->primer_apellido ?></td>
                        <td><?= $row->segundo_apellido ?></td>
                        <td><?= $row->email ?></td>
                        <td><?= $row->telefono ?></td>
                        <td><?= $row->direccion ?></td>
                        <td><?= $row->sexo ?></td>
                        <td><?= $row->rol ?></td>

                        <td>
                            <a class="btn btn-sm btn-outline-warning" href=" ?>">Ver</a>
                        </td>
                        <td>
                            <a class="btn btn-sm btn-outline-warning" href="">Actualizar</a>
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
<!-- /.container-fluid -->

<?php require_once("../Main/partials/footer.php"); ?>