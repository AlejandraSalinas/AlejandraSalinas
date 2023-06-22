<?php
include_once(__DIR__ . "../../../Config/config.php");
include_once('../Main/partials/header.php');
require_once '../../models/VigilanteModel.php';
// require_once '../../models/PersonaModel.php';

// $datos = new PersonaModel();
// $registro = $datos->getId();

// $data = new PersonaModel();
// $vigilantes = $data->getId();

// var_dump($data);
// die();

// $datos_vigilante = new PersonaModel();
// $data = $datos_vigilante->mostarContrato();
$vigilantes = new VigilanteModel();
$data = $vigilantes->getId();

// foreach($data as $datos){
//     $id_persona = $datos->getPersona(); 
// }

 
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Contratos del vigilante</h1>
    <div class="container text-center">
        <?php include_once('../Main/partials/listado.php'); ?>
        <br>
        <br>
        <select class="form-select" value="<?= $id_persona ?>" id="id_persona" name="id_persona" data-placeholder="Choose one thing" disabled>
            <!-- <option></option> -->
            <?php foreach ($data as $persona) : ?>

                <option value="<?= $persona->getId() ?>" <?= $persona->getId() == $datos->getPersona() ? 'selected' : "" ?>> <?= $persona->getPersona() ?></option>;

            <?php endforeach ?>
        </select>
        <div class="row">
            <div class="col">
                <table class="table table-striped table-bordered border-black">
                    <thead>
                        <tr>
                            <th scope="col">Inicio del Contrato</th>
                            <th scope="col">Fin del Contrato</th>
                            <th scope="col">Estado</th>
                            <th scope="col" colspan="4">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($vigilantes) {
                            $pos = 1;

                            foreach ($registro as $row) {

                                if ($row->getEstado() == 1) {
                                    $estado = "Activo";
                                } else {
                                    $estado = "Inactivo";
                                }

                        ?>
                                <tr class="text-center">
                                    <td><?= $row->getInicioContrato() ?></td>
                                    <td><?= $row->getFinContrato() ?></td>
                                    <td><?= $estado ?></td>


                                    <td>
                                        <a class="btn btn-sm btn btn-outline-primary" href="show.php?id_vigilante=<?= $row->getId() ?>">
                                            <i class="bi bi-eye-fill" style="font-size: 1.4rem;"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn btn-outline-dark" href="show.php?id_vigilante=<?= $row->getId() ?>">
                                            <i class="bi bi-file-earmark-person-fill" style="font-size: 1.4rem;"></i>                                            
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn btn-outline-warning" href="../../controllers/VigilanteController.php?c=2&id_vigilante=<?= $row->getId() ?>">
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
                <div class="row justify-content-center">
                    <div class="col-2">
                        <a class="btn btn-success"  href="crear.php">Regresar a Inicio</a>
                    </div>        
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<?php require_once("../Main/partials/footer.php"); ?>

<script>
$(document).ready(function() {
    $('#id_persona').select2({
        // ajax: {
        //     // url: 'buscar_persona.php',

        //     dataType: 'json',
        //     delay: 250,
        //     data: function(params) {
        //         return {
        //             id_persona: params.term
        //         };
        //     },
        //     processResults: function(data) {
        //         return {
        //             results: [{
        //                 id: data.id,
        //                 text: data.nombre
        //             }]
        //         };
        //     },
        //     cache: true
        // },
        minimumInputLength: 1
    });
});
</script>
