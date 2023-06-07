<?php
require_once dirname(__FILE__) . '../../../config/config.php';
require_once("../Main/partials/header.php");
require_once '../../models/tipoIdentificacionModel.php';
require_once '../../models/RolesModel.php';
require_once '../../models/SexoModel.php';
require_once '../../models/PersonaModel.php';
require_once '../../models/VigilanteModel.php';

$datos_vigilante = new VigilanteModel();
$registro_vigilante = $datos_vigilante->getId();

$datos_identificacion = new TipoIdentificacionModel();
$registro_identificacion = $datos_identificacion->getId();

$datos_rol  = new RolesModel();
$data  = $datos_rol->getId();

$datos_sexo = new SexoModel();
$genero = $datos_sexo->getId();

$data = new PersonaModel();
$registro = $data->getId();

// var_dump($persona);
// die();
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Vigilante</h1>
    <hr class="hr mb-5">
    <?php include_once('../Main/partials/list.php'); ?>
    <br>
    <br>

    <form action="../../controllers/VigilanteController.php?c=1" method="post">
        <!-- <input type="hidden" name="c" value="1"> -->
        <div class="container">
            <div class="row">
                <div class="mb-4 col-6">
                    <label for="tipo_identificacion" class="form-label">Tipo de Identificación:</label>
                    <select class="form-select" value="<?= $tipo_identificacion ?>" id="id_tipo_identificacion" name="id_tipo_identificacion" disabled>
                        <?php foreach ($registro_identificacion  as $identificacion) : ?>
                            
                            <option value="<?= $identificacion->getId() ?>" <?= $identificacion->getId() == $persona->getTipoIdentificacion() ? 'selected' : "" ?>> <?= $identificacion->getTipoIdentificacion() ?></option>;                                
                            
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="col-6 mb-4">
                    <label for="numero_identificacion" class="form-label">Número de Identificación:</label>
                    <input type="number" class="form-control" value="<?= $numero_identificacion ?>" id="numero_identificacion" name="numero_identificacion" required="required" disabled>
                </div>
                <div class="mb-4 col-3">
                    <label for="primer_nombre" class="form-label">Primer Nombre:</label>
                    <input type="text" class="form-control" value="<?= $primer_nombre ?>" name="primer_nombre" id="primer_nombre" required disabled>
                </div>
                <div class="col-3 mb-4">
                    <label for="segundo_nombre" class="form-label">Segundo Nombre:</label>
                    <input type="text" class="form-control" value="<?= $segundo_nombre ?>" name="segundo_nombre" id="segundo_nombre" disabled>
                </div>
                <div class="mb-4 col-3">
                    <label for="primer_apellido" class="form-label">Primer Apellido:</label>
                    <input type="text" class="form-control" value="<?= $primer_apellido ?>" name="primer_apellido" id="primer_apellido" disabled required>
                </div>
                <div class="col-3 mb-4">
                    <label for="segundo_apellido" class="form-label">Segundo Apellido:</label>
                    <input type="text" class="form-control" value="<?= $segundo_apellido ?>" name="segundo_apellido" id="segundo_apellido" disabled>
                </div>
                <div class="mb-4 col-6">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" value="<?= $email ?>" name="email" id="email" disabled>
                </div>
                <div class="col-3 mb-4">
                    <label for="telefono" class="form-label">Teléfono:</label>
                    <input type="number" class="form-control" value="<?= $telefono  ?>" id="telefono" name="telefono" disabled>
                </div>
                <div class="col-3 mb-4">
                    <label for="direccion" class="form-label">Dirección:</label>
                    <input type="text" class="form-control" value="<?= $direccion ?>" id="direccion" name="direccion" disabled>
                </div>
                <div class="col-3 mb-4">
                    <label for="pass" class="form-label">Contraseña:</label>
                    <input type="password" class="form-control" name="pass" id="pass">
                </div>
                <div class="col-3 mb-4">
                    <label for="inicio_contrato" class="form-label">Inicio de Contrato:</label>
                    <input type="date" class="form-control" name="inicio_contrato" id="inicio_contrato">
                </div>
                <div class="col-3 mb-4">
                    <label for="fin_contrato" class="form-label">Fin de Contrato:</label>
                    <input type="date" class="form-control" name="fin_contrato" id="fin_contrato">
                </div>
                <div class="col-3 mb-4">
                    <label for="estado" class="form-label">Estado:</label>
                    <input type="number" class="form-control" name="estado" id="estado">
                </div>
                <div class="mb-4 col-6">
                    <label for="id_sexo" class="form-label">Sexo:</label>
                    <select class="form-select" id="id_sexo" name="id_sexo" readonly>
                        <?php

                        foreach ($genero  as $sexo) : ?>
                            <?= var_dump($persona->getSexo()); ?>

                            <option value="<?= $sexo->getId() ?>" <?= $sexo->getId() == $persona->getSexo() ? 'selected' : "" ?>> <?= $sexo->getSexo() ?></option>;

                        <?php endforeach ?>
                    </select>
                </div>
                <div class="col-6 mb-2">
                    <label for="id_rol" class="form-label">Rol:</label>
                    <select class="form-select" value="<?= $id_rol ?>" id="id_rol" name="id_rol" disabled>
                        <?php
                        foreach ($data  as $datos) {
                            echo '<option value="' . $datos->getId() . '">' . $datos->getRoles() . '</option>';
                        }
                        ?>
                    </select>
                    <?php foreach ($data  as $datos) : ?>

                        <option value="<?= $datos->getId() ?>" <?= $datos->getId() == $persona->getRoles() ? 'selected' : "" ?>> <?= $datos->getRoles() ?></option>;

                    <?php endforeach ?>
                    </select>
                </div>
                <div class="row justify-content-center">
                    <div class="col-3 mb-2">
                        <button type="submit" class="btn btn-outline-primary">Guardar</button>

                        <a class="btn btn-outline-success" href="../Main/index.php">Regresar a Inicio</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php require_once("../Main/partials/footer.php"); ?>