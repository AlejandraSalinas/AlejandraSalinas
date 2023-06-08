<?php
include_once dirname(__FILE__) . '../../../Config/config.php';
include_once("../Main/partials/header.php");
require_once '../../models/tipoIdentificacionModel.php';
require_once '../../models/RolesModel.php';
require_once '../../models/SexoModel.php';
require_once '../../models/PersonaModel.php';
require_once '../../models/VigilanteModel.php';

$datos_identificacion = new TipoIdentificacionModel();
$registro_identificacion = $datos_identificacion->getAll();

$datos_rol  = new RolesModel();
$registro_rol  = $datos_rol->getAll();

$datos_sexo = new SexoModel();
$genero = $datos_sexo->getAll();

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
                        <?php foreach ($registro_identificacion as $identificacion) : ?>

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
                <div class="mb-4 col-6">
                    <label for="id_sexo" class="form-label">Sexo</label>
                    <select class="form-select" value="<?= $id_sexo ?>" id="id_sexo" name="id_sexo" disabled>
                        <?php foreach ($genero  as $sexo) : ?>

                            <option value="<?= $sexo->getId() ?>" <?= $sexo->getId() == $vigilante->getSexo() ? 'selected' : "" ?>> <?= $sexo->getSexo() ?></option>;

                        <?php endforeach ?>
                        
                    </select>
                </div>
                <div class="col-6 mb-2">
                    <label for="id_rol" class="form-label">Rol</label>
                    <select class="form-select" value="<?= $id_rol ?>" id="id_rol" name="id_rol" disabled>
                        <?php foreach ($registro_rol  as $rol) : ?>

                            <option value="<?= $rol->getId() ?>" <?= $rol->getId() == $vigilante->getRoles() ? 'selected' : "" ?>> <?= $rol->getRoles() ?></option>;

                        <?php endforeach ?>
                    </select>
                </div>
                <div class="row justify-content-center">
                    <div class="col-2">
                        <a class="btn btn-outline-success" href="index.php">Regresar a vista</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php require_once("../Main/partials/footer.php"); ?>