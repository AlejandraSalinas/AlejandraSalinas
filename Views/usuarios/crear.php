<?php require_once dirname(__FILE__) . '../../../config/config.php'; ?>

<?php require_once("../Main/partials/header.php"); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Crear usuarios</h1>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <!-- <title>Crear Usuarios</title> -->
    </head>
    <body>
        <form action="<?= constant('URL') ?>" method="post">
            <div class="col-6 mb-2">
                <label for="tipo_identificacion" class="form-label">Tipo de Identificación</label>
                <select class="form-select" id="tipo_identificacion" name="tipo_identificacion">
                    <option value="1">Cédula de Ciudadania</option>
                    <option value="2">Targeta de Identidad</option>
                    <option value="3">Targeta de Extranjeria</option>
                    <option value="4">Cédula de Extranjeria</option>
                    <option value="5">Pasaporte</option>
                </select>
            </div>
            <div class="col-3 mb-2">
                <label for="numero_identificacion" class="form-label">Número de Identificación</label>
                <input type="number" class="form-control" id="numero_identificacion" name="numero_identificacion">
            </div>
            <div class="col-6 mb-2">
                <label for="primer_nombre" class="form-label">Primer Nombre:</label>
                <input type="text" name="primer_nombre" id="primer_nombre">
            </div>
            <div class="col-6 mb-2">
                <label for="Segundo_nombre" class="form-label">Segundo Nombre:</label>
                <input type="text" name="Segundo_nombre" id="Segundo_nombre">
            </div>
            <div class="col-6 mb-2">
                <label for="primer_apellido" class="form-label">Primer Apellido:</label>
                <input type="text" name="primer_apellido" id="primer_apellido">
            </div>
            <div class="col-6 mb-2">
                <label for="Segundo_apellido" class="form-label">Segundo Apellido:</label>
                <input type="text" name="Segundo_apellido" id="Segundo_apellido">
            </div>
            <div class="col-6 mb-2">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email">
            </div> 
            <div class="col-3 mb-2">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="number" class="form-control" id="telefono" name="telefono">
            </div>
            <div class="col-6 mb-2">
                <label for="direccion" class="form-label">Dirección:</label>
                <input type="text" class="form-control" id="direccion" name="direccion">
            </div> 
            <div class="col-3 mb-2">
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
            <div class="col-6 mb-2">
                <button type="submit" class="btn btn-primary mb-3" href="<?php constant('URL') ?>index.php">Guardar</button>
            </div>
        </form> 
        
    </body>
    </html>

</div>
<!-- /.container-fluid -->

<?php require_once("../Main/partials/footer.php"); ?>