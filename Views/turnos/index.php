<?php
include_once(__DIR__ . "../../../Config/config.php");
include_once('../Main/partials/header.php');
require_once '../../models/TurnosModel.php';

$datos_turnos = new TurnosModel();
$turnos = $datos_turnos->getAll();

?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Configuración</h1>
    <div class="container text-center">
        <?php include_once('../Main/partials/lista.php'); ?>
        <br>
        <br>
        <div class="card card-body">
            <h3>Crear Turnos:</h3>
            <div class="mb-3">
                <form action="../../controllers/TurnosController.php?c=1" method="POST">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="mb-4 col-6">
                                <label for="fecha_inicial">Fecha Inicial:</label>
                                <input type="date" name="fecha_inicial" id="fecha_inicial" class="form-control" min="" max="" required />
                            </div>
                            <div class="mb-4 col-6">
                                <label for="hora_inicio">Hora Inicial:</label>
                                <input type="time" name="hora_inicial" id="hora_inicial" class="form-control" required />
                            </div>
                            <div class="mb-4 col-6">
                                <label for="fecha_final">Fecha Final:</label>
                                <input type="date" name="fecha_final" id="fecha_final" class="form-control" min="" max="" required />
                            </div>
                            <div class="mb-4 col-6">
                                <label for="hora_final">Hora Final:</label>
                                <input type="time" name="hora_final" id="hora_final" class="form-control" required />
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-4 mb-1">
                            <button type="submit" class="btn btn-outline-primary">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br>

        <br>
        <table class="table table-striped">

            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fecha Turnos</th>
                    <th scope="col">Hora De Inicio</th>
                    <th scope="col">Hora Final</th>
                    <th scope="col" colspan="2">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    if ($turnos) {
                        $pos = 1;
                        foreach ($turnos as $row) {
                    ?>
                <tr>
                    <td><?= $row->getFechaInicial() ?></td>
                    <td><?= $row->getHoraInicio() ?></td>
                    <td><?= $row->getFechaFinal() ?></td>
                    <td><?= $row->getHoraFinal() ?></td>
                    <td>

                        <a class="btn btn-sm btn-outline-warning" onclick="show(<?= $turno->getId()  ?>)">
                            <i class="bi bi-pencil-square" style="font-size: 1.4rem;"></i>
                        </a>
                        <a class="btn btn-sm btn-outline-danger" href="../../controllers/TurnosController.php?c=4&id_turno=<?= $turno->getId() ?>">
                            <i class="bi bi-trash3-fill" style="font-size: 1.4rem;"></i>
                        </a>

                    </td>
                    </td>
                </tr>
            <?php
                            $pos++;
                        }
                    } else {
            ?>
            <tr>
                <td colspan="5" class="text-center">No hay datos</td>
            </tr>
        <?php
                    }
        ?>
        </tr>
            </tbody>
        </table>
    </div>

</div>

<!-- /.container-fluid -->

<?php require_once("../Main/partials/footer.php"); ?>