<?php
require_once dirname(__FILE__) . '../../../config/config.php';
require_once("../Main/partials/header.php");

require_once '../../models/tipoIdentificacionModel.php';
require_once '../../models/RolesModel.php';
require_once '../../models/SexoModel.php';

$datos_identificacion = new TipoIdentificacionModel();
$registro = $datos_identificacion->getAll();

$datos_rol  = new RolesModel();
$data  = $datos_rol->getAll();

$datos_sexo = new SexoModel();
$genero = $datos_sexo->getAll();

?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Crear usuarios</h1>

    <form action="../../controllers/PersonaController.php" method="post">
        <input type="hidden" name="c" value="1">
        <div class="row">
            <div class="mb-3 col-6">
                <label for="tipo_identificacion" class="form-label">Tipo de Identificación:</label>
                <select class="form-select" id="tipo_identificacion" name="tipo_identificacion">
                    <option selected>Seleccionar</option>
                    <?php
                    foreach ($registro  as $datos) {
                        echo '<option value="' . $datos->getId() . '">' . $datos->getTipoIdentificacion() . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="col-6 mb-3">
                <label for="numero_identificacion" class="form-label">Número de Identificación:</label>
                <input type="number" class="form-control" id="numero_identificacion" name="numero_identificacion">
            </div>
            <div class="mb-2 col-6">
                <label for="primer_nombre" class="form-label">Primer Nombre:</label>
                <input type="text" class="form-control" name="primer_nombre" id="primer_nombre">
            </div>
            <div class="col-6 mb-2">
                <label for="segundo_nombre" class="form-label">Segundo Nombre:</label>
                <input type="text" class="form-control" name="segundo_nombre" id="segundo_nombre">
            </div>
            <div class="mb-2 col-6">
                <label for="primer_apellido" class="form-label">Primer Apellido:</label>
                <input type="text" class="form-control" name="primer_apellido" id="primer_apellido">
            </div>
            <div class="col-6 mb-2">
                <label for="segundo_apellido" class="form-label">Segundo Apellido:</label>
                <input type="text" class="form-control" name="segundo_apellido" id="segundo_apellido">
            </div>
            <div class="mb-2 col-6">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" name="email" id="email">
            </div>
            <div class="col-6 mb-2">
                <label for="telefono" class="form-label">Teléfono:</label>
                <input type="number" class="form-control" id="telefono" name="telefono">
            </div>
            <div class="col-6 mb-2">
                <label for="direccion" class="form-label">Dirección:</label>
                <input type="text" class="form-control" id="direccion" name="direccion">
            </div>
            <div class="mb-2 col-6">
                <label for="id_sexo" class="form-label">Sexo:</label>
                <select class="form-select" id="id_sexo" name="id_sexo">
                <option selected>Seleccionar</option>
                <?php
                foreach ($genero  as $datos) {
                    echo '<option value="' . $datos->getId() . '">' . $datos->getSexo() . '</option>';
                }
                ?>
                </select>
            </div>
            <div class="col-6 mb-2">
                <label for="id_rol" class="form-label">Rol:</label>
                <select class="form-select" id="id_rol" name="id_rol">
                <option selected>Seleccionar</option>
                <?php
                foreach ($data  as $datos) {
                    echo '<option value="' . $datos->getId() . '">' . $datos->getRoles() . '</option>';
                }
                ?>
                </select>
            </div>
            <div class="mb-6 col-3">
                <button type="submit" class="btn btn-primary mb-3">Guardar</button>
            </div>
    </form>
</div>

</div>

<?php require_once("../Main/partials/footer.php"); ?>