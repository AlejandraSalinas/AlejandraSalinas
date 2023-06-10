<?php
include_once dirname(__FILE__) . '../../../Config/config.php';
include_once("../Main/partials/header.php");
require_once '../../models/tipoIdentificacionModel.php';
require_once '../../models/RolesModel.php';
require_once '../../models/SexoModel.php';
require_once '../../models/PersonaModel.php';
require_once '../../models/VigilanteModel.php';

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
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Información Del Vigilante</h1>
    <hr class="hr mb-5">
    <form method="post">
        <input type="hidden" name="id" value="<?= $id_vigilante ?>">
        <div class="container">
            <div class="row">
                <div class="mb-4 col-6">
                    <label for="id_tipo_identificacion" class="form-label">Tipo de Identificación</label>
                    <select class="form-select" value="<?= $tipo_identificacion ?>" id="id_tipo_identificacion" name="id_tipo_identificacion" disabled>
                        <?php foreach ($data as $identificacion) : ?>

                            <option value="<?= $identificacion->getId() ?>" <?= $identificacion->getId() == $vigilante->getTipoIdentificacion() ? 'selected' : "" ?>> <?= $identificacion->getTipoIdentificacion() ?></option>;

                        <?php endforeach ?>
                    </select>
                </div>
                <div class="col-6 mb-4">
                    <label for="numero_identificacion" class="form-label">Número de Identificación</label>
                    <input type="number" class="form-control" value="<?= $numero_identificacion ?>" id="numero_identificacion" name="numero_identificacion" disabled>
                </div>
                <div class="mb-4 col-6">
                    <label for="primer_nombre" class="form-label">Primer Nombre</label>
                    <input type="text" class="form-control" value="<?= $primer_nombre ?>" name="primer_nombre" id="primer_nombre" disabled>
                </div>
                <div class="col-6 mb-4">
                    <label for="segundo_nombre" class="form-label">Segundo Nombre</label>
                    <input type="text" class="form-control" value="<?= $segundo_nombre ?>" name="segundo_nombre" id="segundo_nombre" disabled>
                </div>
                <div class="mb-4 col-6">
                    <label for="primer_apellido" class="form-label">Primer Apellido</label>
                    <input type="text" class="form-control" value="<?= $primer_apellido ?>" name="primer_apellido" id="primer_apellido" disabled>
                </div>
                <div class="col-6 mb-4">
                    <label for="segundo_apellido" class="form-label">Segundo Apellido</label>
                    <input type="text" class="form-control" value="<?= $segundo_apellido ?>" name="segundo_apellido" id="segundo_apellido" disabled>
                </div>
                <div class="mb-4 col-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" value="<?= $email ?>" name="email" id="email" disabled>
                </div>
                <div class="col-3 mb-4">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="number" class="form-control" value="<?= $telefono   ?>" id="telefono" name="telefono" disabled>
                </div>
                <div class="col-3 mb-4">
                    <label for="direccion" class="form-label">Dirección</label>
                    <input type="text" class="form-control" value="<?= $direccion ?>" id="direccion" name="direccion" disabled>
                </div>
                <div class="col-3 mb-4">
                    <label for="inicio_contrato" class="form-label">Inicio de Contrato:</label>
                    <input type="date" class="form-control" value="<?= $inicio_contrato?>" name="inicio_contrato" id="inicio_contrato" disabled>
                </div>
                <div class="col-3 mb-4">
                    <label for="fin_contrato" class="form-label">Fin de Contrato:</label>
                    <input type="date" class="form-control" value="<?= $fin_contrato?>" name="fin_contrato" id="fin_contrato" disabled>
                </div>
                <div class="col-6 mb-4">
                    <label for="estado" class="form-label">Estado:</label>
                    <select class="form-select" value="<?= $estado ?>" id="estado" name="estado" disabled>
                        <?php foreach ($data  as $estados) : 
                            
                            if($vigilante->getEstado() == 1){
                                $dato = "Activo";
                            } else {
                                $dato = "Inactivo";
                            }
                        ?>

                        <option value="1" <?= $estados->getId() == $vigilante->getEstado() ? 'selected' : "" ?>> <?= $dato ?></option>;
                        <option value="0" <?= $estados->getId() == $vigilante->getEstado() ? 'selected' : "" ?>> <?= $dato ?></option>;
                            
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="mb-4 col-6">
                    <label for="id_sexo" class="form-label">Sexo</label>
                    <select class="form-select" value="<?= $id_sexo ?>" id="id_sexo" name="id_sexo" disabled>
                        <?php foreach ($data  as $sexo) : ?>
                            
                            <option value="<?= $sexo->getId() ?>" <?= $sexo->getId() == $vigilante->getSexo() ? 'selected' : "" ?>> <?= $sexo->getSexo() ?></option>;                                
                        <?php endforeach ?>                       
                    </select>                            
                </div>
                <div class="col-6 mb-2">
                    <label for="id_rol" class="form-label">Rol</label>
                    <select class="form-select" value="<?= $id_rol ?>" id="id_rol" name="id_rol" disabled>
                    <?php foreach ($data as $datos) : ?>

                        <option value="<?= $datos->getId() ?>" <?= $datos->getId() == $vigilante->getRoles() ? 'selected' :  "" ?>><?= $datos->getRoles() ?></option>

                    <?php endforeach ?>
                    </select>
                </div>
                <div class="row justify-content-center">
                    <div class="col-1">
                        <a class="btn btn-outline-success" href="index.php">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php require_once("../Main/partials/footer.php"); ?>