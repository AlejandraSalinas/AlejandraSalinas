<?php include_once('../../Views/Main/partials/header.php');?>
<?php
include_once '../../Config/config.php';
include_once '../../models/dispositivosModel.php';

$data = new DispositivoModel();
$registroDispositivo = $data->getbyId($_REQUEST['id']);

foreach ($registroDispositivo as $dispositivo) {
    $id        = $dispositivo->getId();
    $numero_identificacion   = $dispositivo->numero_identificacion;
    $tipo   = $dispositivo->tipo;
    $marca  = $dispositivo->marca;
    $Serie = $dispositivo->Serie;
    $color = $dispositivo->color;
    $accesorios = $dispositivo->accesorios;
    $fotografia = $dispositivo->fotografia;
}

?>
<!DOCTYPE html>
<html lang="es">

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
                <h1>Registro de Dispositivo</h1>
                <form action="<?= constant('URL') ?>controllers/dispositivoController.php method="POST">
                    <input type="hidden" name="c" value="3">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <div class="mb-3">
                        <label for="tipo_identificacion" >Tipo de Identificación</label>
                        <select class="form-select" id="tipo_identificacion" name="tipo_identificacion">
                            <option value="1">Tarjeta de Identificación</option>
                            <option value="2">Cédula de Cuidadanía</option>
                            <option value="3">Tarjeta de Extranjería</option>
                            <option value="4">Cédula de Extranjería</option>
                            <option value="5">Pasaporte</option>
                        </select>
                        </div>
                    <div class="mb-3">
                        <label for="numero_identificacion" >Número de Identificación</label>
                        <input type="number" class="form-control" id="numero_identificacion" name="numero_identificacion">
                    </div>
                    <div class="mb-3">
                        <label for="tipo" >Tipo de Dispositivo</label>
                        <select class="form-select" id="tipo" name="tipo">
                            <option value="1">Portátil</option>
                            <option value="2">Computador</option>
                            <option value="3">Tables</option>
                        </select>
                        </div>
                    <div class="mb-3">
                        <label for="marca">Marca</label>
                        <select class="form-select" id="marca" name="marca">
                            <option value="3">Acer</option>
                            <option value="6">Apple</option>
                            <option value="4">Asus</option>
                            <option value="1">Dell</option>
                            <option value="2">Hp</option>
                            <option value="5">Lenovo</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="Serie">Serie</label>
                        <input type="number" class="form-control" id="Serie" name="Serie">
                    <div class="mb-3">
                        <label for="color" >Color</label>
                        <select class="form-select" id="color" name="color">
                            <option value="3">Blanco</option>
                            <option value="2">Gris</option>
                            <option value="1">Negro</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="accesorios" >Accesorios</label>
                        <select class="form-select" id="accesorios" name="accesorios">
                            <option value="1">Cargador</option>
                            <option value="2">Mouse</option>
                            <option value="3">Teclado</option>

                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="fotografia" >Fotografia</label>
                        <input type="img" class="form-control" id="fotografia" name="fotografia">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary mb-3">Guardar</button>            
                    </div>
                </for>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
</body>

</html>

<?php require_once('../../views/main/partials/footer.php');?>