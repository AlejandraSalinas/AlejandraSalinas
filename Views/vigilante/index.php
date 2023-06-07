<?php
include_once(__DIR__ . "../../../Config/config.php");
include_once('../Main/partials/header.php');
require_once '../../models/VigilanteModel.php';

$datos_vigilante = new VigilanteModel();
$registro_vigilante = $datos_vigilante->getAll();


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
                            <th scope="col">Teléfono:</th>                            
                            <th scope="col" colspan="3">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($registro_vigilante) {
                            $pos = 1;

                            foreach ($registro_vigilante as $row) {

                        ?>
                                <tr class="text-center">
                                    <td><?= $row->getPersona() ?></td>
                                    <td><?= $row->getNumeroIdentificacion() ?></td>
                                    <td><?= $row->getPrimerNombre() ?></td>                                    
                                    <td><?= $row->getTelefono() ?></td>

                                    <td hfer="show.php">Guardar</td>
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