<?php require_once dirname(__FILE__) . '../../../config/config.php'; ?>

<?php require_once("../Main/partials/header.php"); ?>
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
                    <option value="1">Mujer</option>
                    <option value="2">Hombre</option>
                </select>
            </div>
            <div class="col-6 mb-2">
                <label for="id_rol" class="form-label">Rol:</label>
                <select class="form-select" id="id_rol" name="id_rol">
                    <option value="1">Aprediz</option>
                    <option value="2">Instructor</option>
                    <option value="3">Visitante</option>
                    <option value="4">Vigilante</option>
                    <option value="5">Supervisor</option>
                    <option value="6">Administrador</option>
                </select>
            </div>
            <div class="mb-6 col-3">
                <button type="submit" class="btn btn-primary mb-3">Guardar</button>
            </div>
    </form>
</div>

</div>

<?php require_once("../Main/partials/footer.php"); ?>