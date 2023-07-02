<?php
include_once dirname(__FILE__) . '../../../Config/config.php';
include_once("../Main/partials/header.php");
require_once '../../models/tipoIdentificacionModel.php';
require_once '../../models/RolesModel.php';
require_once '../../models/SexoModel.php';
require_once '../../models/PersonaModel.php';
require_once '../../models/VigilanteModel.php';

$datos = new TipoIdentificacionModel();
$identificacion = $datos->getAll();

$datos_rol  = new RolesModel();
$data  = $datos_rol->getAll();

$datos_sexo = new SexoModel();
$genero = $datos_sexo->getAll();

$datos = new PersonaModel();
$registro = $datos->getAll();

$datos_vigilante = new VigilanteModel();
$data = $datos_vigilante->getById($_REQUEST['id_vigilante']);

foreach ($data as $vigilante) {
    $id_vigilante          = $vigilante->getId();
    $tipo_identificacion   = $vigilante->getTipoIdentificacion();
    $numero_identificacion = $vigilante->getNumeroIdentificacion();
    $primer_nombre         = $vigilante->getPrimerNombre();
    $segundo_nombre        = $vigilante->getSegundoNombre();
    $primer_apellido       = $vigilante->getPrimerApellido();
    $segundo_apellido      = $vigilante->getSegundoApellido();
    $email                 = $vigilante->getEmail();
    $telefono              = $vigilante->getTelefono();
    $direccion             = $vigilante->getDireccion();
    $inicio_contrato       = $vigilante->getInicioContrato();
    $fin_contrato          = $vigilante->getFinContrato();
    $estado                = $vigilante->getEstado();
    $id_sexo               = $vigilante->getSexo();
    $id_rol                = $vigilante->getRoles();
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Actualización de Contrato</h1>
    <hr class="hr mb-5">
    <form action="../../controllers/VigilanteController.php?c=3&id_vigilante=<?= $id_vigilante ?> " method="post">
        <div class="container">
            <div class="row">              
                <div class="col-3 mb-4">
                    <label for="inicio_contrato" class="form-label">Inicio de Contrato:</label>
                    <input type="date" class="form-control" value="<?= $inicio_contrato?>" name="inicio_contrato" id="inicio_contrato" max="2050-01-01" min="2023-01-01">
                </div>
                <div class="col-3 mb-4">
                    <label for="fin_contrato" class="form-label">Fin de Contrato:</label>
                    <input type="date" class="form-control" value="<?= $fin_contrato?>" name="fin_contrato" id="fin_contrato" max="2050-01-01" min="2023-01-01">
                </div>
                <div class="col-6 mb-4">
                    <label for="estado" class="form-label">Estado:</label>
                    <select class="form-select" value="<?= $estado ?>" id="estado" name="estado">
                        <?php foreach ($data  as $estado) : 
                            
                            if($vigilante->getEstado() == 1){
                                $dato = "Activo";
                            } else {
                                $dato = "Inactivo";
                            }
                            ?>
                            
                            <option value="1" <?= $estado->getId() == $vigilante->getEstado() ? 'selected' : "" ?>> <?= $dato ?></option>;
                            <option value="0" <?= $estado->getId() == $vigilante->getEstado() ? 'selected' : "" ?>> <?= $dato ?></option>;
                            
                            
                        <?php endforeach ?> 
                    </select>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-3 mb-2">
                <button type="submit" href="index.php" class="btn btn-primary">Guardar</button>
                <a class="btn btn-success" href="index.php">Regresar</a>
            </div>
        </div>
    </form>
</div>
<!-- /.container-fluid -->


<?php require_once("../Main/partials/footer.php"); ?>