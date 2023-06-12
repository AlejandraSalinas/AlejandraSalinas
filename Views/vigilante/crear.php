<?php
require_once dirname(__FILE__) . '../../../config/config.php';
require_once("../Main/partials/header.php");
require_once '../../models/PersonaModel.php';

$data = new PersonaModel();
$vigilantes = $data->getPersonasByRol(4);

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Crear Contrato Vigilante</h1>
    <hr class="hr mb-5">
    <?php include_once('../Main/partials/list.php'); ?>
    <br>
    <br>

    <form action="../../controllers/VigilanteController.php?c=1" method="post">
        <div class="container">
            <div class="row justify-content-center">
                <div class="mb-4 col-8">
                    <label for="id_persona" class="form-label text-center">Selecione un Vigilante:</label>
                    <select class="form-control persona" aria-label="Default select example" value="<?= $id_persona ?>" id="id_persona" name="id_persona">
                    <option value="">Seleccion un Vigilante</option>
                        <?php
                        foreach ($vigilantes  as $vigilante) {
                            echo '<option value="' . $vigilante["id_persona"] . '">' . $vigilante["nombre"] . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-4 mb-4">
                    <label for="inicio_contrato" class="form-label">Inicio de Contrato:</label>
                    <input type="date" class="form-control" name="inicio_contrato" id="inicio_contrato" max="2030-01-31" min="2023-01-01">
                </div>
                <div class="mb-4 col-4">
                    <label for="fin_contrato" class="form-label">Fin de Contrato:</label>
                    <input type="date" class="form-control" name="fin_contrato" id="fin_contrato" max="2030-01-01" min="2023-01-01">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-4 mb-4">
                    <label for="pass" class="form-label">Contraseña:</label>
                    <input type="password" class="form-control" name="pass" id="pass">
                </div>
                <div class="mb-3 col-4">
                    <label for="estado" class="form-label">Estado:</label>
                    <select class="form-select" name="estado" id="estado">

                        <option selected>Seleccionar</option>
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                    </select>
                </div>

                <div class="row justify-content-center">
                    <div class="col-4 mb-1">
                        <button type="submit" class="btn btn-outline-primary">Guardar</button>
                        <a class="btn btn-outline-success" href="../Main/index.php">Regresar a Inicio</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php require_once("../Main/partials/footer.php"); ?>
<script>

    $(".persona").select2({
     placeholder: "Seleccionar",
     allowClear: true
    });
    
</script>