<?php
    require_once dirname(__FILE__) . '../../../config/config.php';
    include_once '../../Config/config.php';
    include_once('../../Views/Main/partials/header.php'); 
    ?>
<div class="container-fluid">
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
        <title>Registro y Control</title>
    </head>

    <body class="my-3">
        <div class="container">
            <div class="row">
                <div class="col">
                    <form action="<?= constant('URL') ?>../../../../controllers/dispositivosController.php" method="POST">
                        <h1>Bienv </h1>
                        <div class="mb-3">
                        <label for="tipo_identificacion" class="form-label">Tipo de Identificación:</label>
                <select class="form-select" id="tipo_identificacion" name="tipo_identificacion">
                    <option selected>Seleccionar</option>
                    <option value="1">Cédula de Cuidadanía</option>
                    <option value="2">Tarjeta de Identificación</option>
                    <option value="3">Tarjeta de Extranjería</option>
                    <option value="4">Cédula de Extranjería</option>
                    <option value="5">Pasaporte</option>
        
                </select>
            </div>
            <div class="col-6 mb-3">
                <label for="numero_identificacion" class="form-label">Número de Identificación:</label>
                <input type="number" class="form-control" id="numero_identificacion" name="numero_identificacion">
            </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary mb-3">Entrada</button>
                            <button type="submit" class="btn btn-primary mb-3">Salida</button>
                            <button type="submit" class="btn btn-primary mb-3">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    </body>

    </html>
</div>

<?php require_once('../Main/partials/footer.php'); ?>