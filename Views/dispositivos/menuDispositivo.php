<?php
    require_once dirname(__FILE__) . '../../../config/config.php';
    include_once '../../Config/config.php';
    include_once('../../Views/Main/partials/header.php'); 
    include_once('../../controllers/entradaController.php');
    include_once('../../controllers/salidaController.php');
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
                    <h1>Bienvenidos </h1>
                    <p class="ndi">Ingrese su número de identificación</p>
                    <form action="<?= constant('URL') ?>../../../../controllers/dispositivosController.php" method="POST">
                        <div class="col-6 mb-3">
                            <input type="number" placeholder="Número de identificación" class="form-control" id="numero_identificacion" name="numero_identificacion">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary mb-3" name="fecha_entrada" id="fecha_entrada">Entrada</button>
                            <button type="submit" class="btn btn-primary mb-3" name="fecha_salida" id="fecha_salida">Salida</button>
                            <button type="submit" class="btn btn-primary mb-3">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            setInterval(() => {
                let fecha = new Date();
                let fechaHora = fecha.toLocaleString();
                Document.getElementById("fecha").textContent = fechaHora
            ), 1000};
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    </body>

    </html>
</div>

<?php require_once('../Main/partials/footer.php'); ?>