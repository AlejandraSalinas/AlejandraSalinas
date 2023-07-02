<?php
include_once dirname(__FILE__) . '../../../Config/config.php';
include_once("../Main/partials/header.php");
require_once '../../models/tipoIdentificacionModel.php';
require_once '../../models/RolesModel.php';
require_once '../../models/SexoModel.php';
require_once '../../models/PersonaModel.php';

$datos = new PersonaModel();
$registro = $datos->getById($_REQUEST['id_persona']);

$datos_identificacion = new TipoIdentificacionModel();
$registro_identificacion = $datos_identificacion->getAll();

$datos_rol  = new RolesModel();
$data  = $datos_rol->getAll();

$datos_sexo = new SexoModel();
$genero = $datos_sexo->getAll();

foreach ($registro as $persona) {
    $id_persona            = $persona->getId();
    $tipo_identificacion   = $persona->getTipoIdentificacion();
    $numero_identificacion = $persona->getNumeroIdentificacion();
    $primer_nombre         = $persona->getPrimerNombre();
    $segundo_nombre        = $persona->getSegundoNombre();
    $primer_apellido       = $persona->getPrimerApellido();
    $segundo_apellido      = $persona->getSegundoApellido();
    $email                 = $persona->getEmail();
    $telefono              = $persona->getTelefono();
    $direccion             = $persona->getDireccion();
    $id_sexo               = $persona->getSexo();
    $id_rol                = $persona->getRoles();
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Actualizar Usuario</h1>
    <hr class="hr mb-5">
    <form action="../../controllers/PersonaController.php?c=3&id_persona=<?= $id_persona ?> " method="post">
        <div class="container">
            <div class="row">
                <div class="mb-4 col-6">
                    <label for="id_tipo_identificacion" class="form-label">Tipo de Identificación:</label>
                    <select class="form-select" id="id_tipo_identificacion" name="id_tipo_identificacion" required="required">
                        <?php foreach ($registro_identificacion as $identificacion) : ?>

                            <option value="<?= $identificacion->getId() ?>" <?= $identificacion->getId() == $persona->getTipoIdentificacion() ? 'selected' :  "" ?>><?= $identificacion->getTipoIdentificacion() ?></option>

                        <?php endforeach ?>
                    </select>
                </div>
                <div class="col-6 mb-4">
                    <label for="numero_identificacion" class="form-label">Número de Identificación:</label>
                    <input type="number" class="form-control" value="<?= $numero_identificacion ?>" id="numero_identificacion" name="numero_identificacion"  oninput="limitarDigitos(numero_identificacion)">
                </div>
                <div class="mb-4 col-6">
                    <label for="primer_nombre" class="form-label">Primer Nombre:</label>
                    <input type="text" class="form-control" value="<?= $primer_nombre ?>" name="primer_nombre" id="primer_nombre" >
                </div>
                <div class="col-6 mb-4">
                    <label for="segundo_nombre" class="form-label">Segundo Nombre:</label>
                    <input type="text" class="form-control"  value="<?= $segundo_nombre ?>" name="segundo_nombre" id="segundo_nombre">
                </div>
                <div class="mb-4 col-6">
                    <label for="primer_apellido" class="form-label">Primer Apellido:</label>
                    <input type="text" class="form-control" value="<?= $primer_apellido ?>" name="primer_apellido" id="primer_apellido" >
                </div>
                <div class="col-6 mb-4">
                    <label for="segundo_apellido" class="form-label">Segundo Apellido:</label>
                    <input type="text" class="form-control" value="<?= $segundo_apellido ?>" name="segundo_apellido" id="segundo_apellido">
                </div>
                <div class="mb-4 col-6">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" value="<?= $email ?>" name="email" id="email">
                </div>
                <div class="col-3 mb-4">
                    <label for="telefono" class="form-label">Teléfono:</label>
                    <input type="number" class="form-control" value="<?= $telefono ?>" id="telefono" name="telefono" oninput="limitarDigitos(telefono)">
                </div>
                <div class="col-3 mb-4">
                    <label for="direccion" class="form-label">Dirección:</label>
                    <input type="text" class="form-control" value="<?= $direccion ?>" id="direccion" name="direccion" >
                </div>
                <div class="mb-4 col-6">
                    <label for="id_sexo" class="form-label">Sexo:</label>
                    <select class="form-select" id="id_sexo" name="id_sexo" required="required">
                        <?php foreach ($genero as $sexo) : ?>
                            <option value="<?= $sexo->getId() ?>" <?= $sexo->getId() == $persona->getSexo() ? 'selected' :  "" ?>><?= $sexo->getSexo() ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="col-6 mb-2">
                    <label for="id_rol" class="form-label">Rol:</label>
                    <select class="form-select" id="id_rol" name="id_rol" required="required">
                        <?php foreach ($data as $datos) : ?>

                            <option value="<?= $datos->getId() ?>" <?= $datos->getId() == $persona->getRoles() ? 'selected' :  "" ?>><?= $datos->getRoles() ?></option>

                        <?php endforeach ?>
                    </select>
                </div>

            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-2 mb-4">
                <button type="submit" href="index.php" class="btn btn-outline-primary">Guardar</button>
                <a class="btn btn-outline-success" href="index.php">Regresar</a>
            </div>
        </div>
    </form>
</div>
<script>
    function limitarDigitos(numero_identificacion) {
        if (numero_identificacion.value.length > 10) {
            numero_identificacion.value = numero_identificacion.value.slice(0, 10); // Corta el valor a los primeros diez dígitos
        }
    }
    function limitarDigitos(telefono) {
        if (telefono.value.length > 10) {
            telefono.value = telefono.value.slice(0, 10); // Corta el valor a los primeros diez dígitos
        }
    }
</script>
<!-- /.container-fluid -->


<?php require_once("../Main/partials/footer.php"); ?>