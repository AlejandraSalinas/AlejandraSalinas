<?php
include_once(__DIR__ . "../../../Config/config.php");
include_once('../Main/partials/header.php');
require_once '../../models/VigilanteModel.php';

$vigilantes = new VigilanteModel();
$data = $vigilantes->getAll();

?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Vigilante</h1>
    <div class="container text-center">
        <?php include_once('../Main/partials/listado.php'); ?>
        <br>
        <br>
        <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Tipo de Identificación</th>
                            <th scope="col">Número de Identificación</th>
                            <th scope="col">Nombre Completo</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Estado</th>
                            <th scope="col" colspan="3">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($vigilantes) {
                            $pos = 1;

                            foreach ($data as $row) {

                                if ($row->getEstado() == 1) {
                                    $estado = "Activo";
                                } else {
                                    $estado = "Inactivo";
                                }

                        ?>
                                <tr class="text-center">
                                    <td><?= $row->getTipoIdentificacion() ?></td>
                                    <td><?= $row->getNumeroIdentificacion() ?></td>
                                    <td><?= $row->getPersona() ?></td>
                                    <td><?= $row->getTelefono() ?></td>
                                    <td><?= $estado ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-primary" href="show.php?id_vigilante=<?= $row->getId() ?>">
                                            <i class="bi bi-eye-fill" style="font-size: 1.4rem;"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-warning" href="../../controllers/VigilanteController.php?c=2&id_vigilante=<?= $row->getId() ?>">
                                            <i class="bi bi-pencil-square" style="font-size: 1.4rem;"></i>
                                        </a>   
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-danger" href="../../controllers/VigilanteController.php?c=4&id_vigilante=<?=$row->getId() ?>">
                                            <i class="bi bi-trash3-fill" style="font-size: 1.4rem;"></i>
                                        </a>
                                        
                                    </td>
                                </tr>
                            <?php
                                $pos++;
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="9" class="text-center">No hay datos</td>
                            </tr>
                        <?php
                        }
                        ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?php require_once("../Main/partials/footer.php"); ?>