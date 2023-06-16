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
        <div class="row">
            <div class="col-12">
                <div class="card card-body">
                    <h3>Crear Turnos:</h3>
                    <div class="mb-3">
                        <form action="../../controllers/TurnosController.php?c=1" method="POST">
                            <div class="input-group mb-3">
                                <input type="date" name="fecha" id="fecha" class="form-control" required><br>
                                
                                <input type="time" name="hora_inicio" id="hora_inicio" class="form-control"  required>
                                
                                <input type="time" name="hora_fin" id="hora_fin" class="form-control" required>
                                
                                <button class="btn btn-primary" type="submit" id="btn_guardar">Guardar</button>
                                <a class="btn btn-warning" onclick="editar()" id="btn_editar">Editar</a>
                                <a class="btn btn-danger" onclick="borrar()">Cancelar</a>
                                <!-- </div> -->
                            </div>
                        </form>
                    </div>
                </div>
                <br>
                
                <!-- <label for="hora_inicio" class="form-label">Crear Hora de Inicio</label> -->
                <!-- <label for="hora_fin" class="form-label">crear fecha</label> -->
                <!-- <input type="datetime-local" id="birthdaytime" name="birthdaytime"> -->
                                <!-- <label for="fecha" class="form-label">Crear Fecha</label> -->
                <br>
                <table class="table table-striped">
                                    
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Fecha Turnos</th>
                            <th scope="col">Hora De Inicio</th>
                            <th scope="col">Fecha Turnos</th>
                            <th scope="col">Fecha Turnos</th>
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
                            <td><?= $pos ?></td>
                            <td>
                                <!-- <span id="turnos<?= $turno->getId() ?>"> <?= $turno->getTurno() ?> </span> -->
                                <?= $row->getFecha()?>
                            </td>
                            <td>
                            <td>
                                <a class="btn btn-sm btn-outline-warning" onclick="show(<?= $turno-> getId()  ?>)">
                                    <i class="bi bi-pencil-square" style="font-size: 1.4rem;"></i>
                                </a>
                                <a class="btn btn-sm btn-outline-danger" href="../../controllers/TurnosController.php?c=4&id_turno=<?= $turno-> getId() ?>">
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
    </div>
</div>
<!-- /.container-fluid -->

<?php require_once("../Main/partials/footer.php"); ?>