<?php
include_once(__DIR__ . "../../../Config/config.php");
include_once('../Main/partials/header.php');
require_once '../../models/VigilanteModel.php';
require_once '../../models/PersonaModel.php';

$datos = new PersonaModel();
$registro = $datos->getId();
 
$datos_vigilante = new VigilanteModel();
$data = $datos_vigilante->getById($_REQUEST['id_vigilante']);
 
foreach ($data as $vigilante) {
    $id_vigilante          = $vigilante->getId();
    $primer_nombre         = $vigilante->getPrimerNombre();
    $inicio_contrato       = $vigilante->getInicioContrato();
    $fin_contrato          = $vigilante->getFinContrato();
    $estado                = $vigilante->getEstado();
}

?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Contratos del vigilante</h1>
    <div class="container text-center">
        <?php include_once('../Main/partials/listado.php'); ?>
        <br><br>
        <form method="post">
            <input type="hidden" name="id" value="<?= $id_vigilante ?>">
            <div class="container">
                <div class="row">
                    <div class="mb-4 col-12">
                        <label for="id_persona" class="form-label">Nombre Completo</label>
                        <select class="form-select" aria-label="Default select example" id="id_persona" name="id_persona" disabled >
                            <?php
                            foreach ($registro_vigilante as $vigilantes) {
                                $selected = ($vigilantes->getId() == $primer_nombre) ? "selected" : "";
                                echo '<option value="' . $vigilantes->getId() . '" ' . $selected . '>' . $vigilantes->getPersona() . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <hr>
                    <div class="col-4 mb-4">
                        <label for="inicio_contrato" class="form-label">Inicio del contrato</label>
                        <input type="number" class="form-control" value="<?= $inicio_contrato ?>" id="inicio_contrato" name="inicio_contrato" disabled>
                    </div>
                    <div class="mb-4 col-4">
                        <label for="fin_estado" class="form-label">Fin del contrato</label>
                        <input type="text" class="form-control" value="<?= $fin_contrato ?>" name="fin_estado" id="fin_estado" disabled>
                    </div>
                    <div class="col-4 mb-4">
                        <label for="estado" class="form-label">Estado</label>
                        <input type="text" class="form-control" value="<?= $estado ?>" name="estado" id="estado" disabled>
                    </div>
                   
                    <div class="row justify-content-center">
                        <div class="col-1">
                            <a class="btn btn-success" href="index.php">Regresar</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>
<!-- /.container-fluid -->
<?php require_once("../Main/partials/footer.php"); ?>
