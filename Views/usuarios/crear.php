<?php require_once dirname(__FILE__) . '../../../config/config.php'; ?>

<?php require_once("../Main/partials/header.php"); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Crear usuarios</h1>

    <form action="<?= constant('URL') ?>../../../../controllers/registroController.php" method="post">
        <div class="row">
            <div class="mb-3 col-6">
                <label for="tipo_identificacion" class="form-label">Tipo de Identificación:</label>
                <select class="form-select" id="tipo_identificacion" name="tipo_identificacion">
                    <option value="1">Cédula de Ciudadania</option>
                    <option value="2">Targeta de Identidad</option>
                    <option value="3">Targeta de Extranjeria</option>
                    <option value="4">Cédula de Extranjeria</option>
                    <option value="5">Pasaporte</option>
                </select>
            </div>
            <div class="col-6 mb-3">
                <label for="numero_identificacion" class="form-label">Número de Identificación:</label>
                <input type="number" class="form-control" id="numero_identificacion" name="numero_identificacion">
            </div>
            <input type="hidden" name="c" value="1">
            <div class="mb-2 col-6">
                <label for="primer_nombre" class="form-label">Primer Nombre:</label>
                <input type="text" class="form-control" name="primer_nombre" id="primer_nombre">
            </div>
            <div class="col-6 mb-2">
                <label for="Segundo_nombre" class="form-label">Segundo Nombre:</label>
                <input type="text" class="form-control" name="Segundo_nombre" id="Segundo_nombre">
            </div>
            <div class="mb-2 col-6">
                <label for="primer_apellido" class="form-label">Primer Apellido:</label>
                <input type="text" class="form-control" name="primer_apellido" id="primer_apellido">
            </div>
            <div class="col-6 mb-2">
                <label for="Segundo_apellido" class="form-label">Segundo Apellido:</label>
                <input type="text" class="form-control" name="Segundo_apellido" id="Segundo_apellido">
            </div>
            <div class="mb-2 col-6">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email">
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
                <label for="sexo" class="form-label">Sexo:</label>
                <select class="form-select" id="rol" name="rol">
                    <option value="0">Mujer</option>
                    <option value="1">Hombre</option>
                </select>
            </div>
            <div class="col-6 mb-2">
                <label for="rol" class="form-label">Rol:</label>
                <select class="form-select" id="rol" name="rol">
                    <option value="1">Aprediz</option>
                    <option value="2">Visitante</option>
                    <option value="3">Vigilante</option>
                    <option value="4">Supervisor</option>
                    <option value="5">Administrador</option>
                </select>
            </div>
            <div class="mb-5 col-6">
                <button type="submit" class="btn btn-primary mb-3" href="<?php constant('URL') ?>index.php">Guardar</button>
            </div>
    </form>
</div>

</div>
<!-- /.container-fluid -->

<?php require_once("../Main/partials/footer.php"); ?>