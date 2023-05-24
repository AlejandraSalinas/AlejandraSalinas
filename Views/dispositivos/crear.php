<?php
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
                        <h1 class="mx-auto" style="width: 500px;">Registro de Dispositivo</h1>
                        <div class="mb-3 col-6">
                            <label for="id_tipo_dispositivos" class="form_label">Tipo de Dispositivo</label>
                            <select class="form-select" id="id_tipo_dispositivos" name="id_tipo_dispositivos">
                                <option value="1">Computador</option>
                                <option value="2">Portátil</option>
                                <option value="3">Tablets</option>
                                
                            </select>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="id_marca" class="form_label">Marca</label>
                            <select class="form-select" id="id_marca" name="id_marca">
                                <option value="1">Acer</option>
                                <option value="2">Apple</option>
                                <option value="3">Asus</option>
                                <option value="4">Dell</option>
                                <option value="5">Hp</option>
                                <option value="6">Lenovo</option>
                                
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="id_color" class="form_label">Color</label>
                            <select class="form-select" id="id_color" name="id_color">
                                <option value="1">Blanco</option>
                                <option value="2">Gris</option>
                                <option value="3">Negro</option>
                                <option value="4"></option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="id_accesorios" class="form_label">Accesorios</label>
                            <select class="form-select" id="id_accesorios" name="id_accesorios">
                                <option value="1">Cargador</option>
                                <option value="2">Mouse</option>
                                <option value="3">Teclado</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="serie" class="form_label">Serie</label>
                            <input type="number" class="form-control" id="serie" name="serie">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary mb-3">Guardar</button>
                            <button type="submit" href="../../Views/dispositivos/menuDispositivo.php" class="btn btn-primary mb-3">Menú Principal</button>
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