<?php include_once('../../Views/Main/partials/header.php');?>
<?php include_once('../../models/dispositivosModel.php');
$data = new DispositivoModel();
$registroDispositivo = $data->getAll();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.min.css" rel="stylesheet">
    <title>Registro y Control</title>
</head>

<body class="my-3">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Registro de Dispositivo</h1>
                <hr>
                <h3>Base de datos de los dispositivos regitrados/h3>
                <table class="table table-sm table-hover">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Tipo de Identificciones</th>
                            <th scope="col">Número de Identificciones</th>
                            <th scope="col">Tipo de Dispositivo</th>
                            <th scope="col">Marca de Dispositivo</th>
                            <th scope="col">Serie del Dispositivo</th>
                            <th scope="col">Color del Dispositivo</th>
                            <th scope="col">Accesorios</th>
                            <th scope="col">Fotografia</th>
                            <th scope="col" colspan="2">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($registroDispositivo) {

                            foreach ($registroDispositivo as $row) {
                        ?>
                                <tr class="text-center">
                                    <td><?= $row->tipo_identificacion ?></td>
                                    <td><?= $row->numero_identificacion ?></td>
                                    <td><?= $row->tipo ?></td>
                                    <td><?= $row->marca ?></td>
                                    <td><?= $row->color ?></td>
                                    <td><?= $row->Serie ?></td>
                                    <td><?= $row->accesorios ?></td>
                                    <td><?= $row->fotografia ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-warning" href="../../Controllers/dispositivoController.php?c=2&id=<?= $row->getId() ?>">Actualizar</a>
                                    </td>
                                    <td>
                                        <a onclick="AlertDelete('<?= $row->getId() ?>')" class="btn btn-sm btn-outline-danger">Eliminar</a>
                                    </td>
                                </tr>
                            <?php
                            }
                        } else {
                            ?>
                            <tr class=" text-center">
                                <td colspan="6">Sin datos</td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
</body>

</html>
<?php require_once('../Main/partials/footer.php');?>