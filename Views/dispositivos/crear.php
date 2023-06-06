<?php
    require_once dirname(__FILE__) . '../../../config/config.php';
    require_once('../../Views/Main/partials/header.php');
    require_once('../../models/tipoIdentificacionModel.php');
    require_once('../../models/tipoDispositivoModel.php');
    require_once('../../models/marcaDispositivoModel.php');
    require_once('../../models/colorDispositivoModel.php');
    require_once('../../models/accesoriosDispositivoModel.php');

    $datos_identificacion = new TipoIdentificacionModel();
    $registro_identificacion = $datos_identificacion->getAll();

    $datos_dispositivo = new TipoDispositivoModel();
    $registro_dispositivo = $datos_dispositivo->getAll();

    $datos_marca = new MarcaDispositivoModel();
    $registro_marca = $datos_marca->getAll();

    $datos_color = new ColorDispositivoModel();
    $registro_color = $datos_color->getAll();

    $datos_accesorios = new AccesoriosDispositivoModel();
    $registro_accesorios = $datos_accesorios->getAll();

?>
<div class="container-fluid">
    <h1  class="h3 mb-4 text-gray-800">Crear Nuevo Registro de Dispositivo</h1>
    <form action="../../controllers/dispositivosController.php" method="POST">
        <input type="hidden" name="c" value="1">
        <div class="container">
            <div class="row">
                <div class="mb-4 col-6">
                    <label for="id_tipo_identificacion" class="form-label">Tipo de Identificación:</label>
                    <select class="form-select" value="<?= $id_tipo_identificacion ?>" id="id_tipo_identificacion" name="id_tipo_identificacion" required="required">
                        <option selected>Seleccionar</option>
                        <?php
                            foreach ($registro_identificacion  as $datos) {
                                echo '<option value="' . $datos->getId() . '">' . $datos->getTipoIdentificacion() . '</option>';
                            }
                        ?>
                    </select>
                </div>

                <div class="col-6 mb-4">
                    <label for="numero_identificacion" class="form_label">Número de Identificacion</label>
                    <input type="number" class="form-control" value="<?= $numero_identificacion ?>" id="numero_identificacion" name="numero_identificacion" required="required">
                </div>

                <div class="mb-4 col-6">
                    <label for="id_tipo_dispositivos" class="form_label">Tipo de Dispositivo</label>
                    <select class="form-select" value="<?= $id_tipo_dispositivos ?>" id="id_tipo_dispositivos" name="id_tipo_dispositivos" required="required">
                        <option selected>Seleccionar</option>
                            <?php
                            foreach ($registro_dispositivo  as $datos) {
                                echo '<option value="' . $datos->getId() . '">' . $datos->getTipoDispositivo() . '</option>';
                            }
                        ?>
                    </select>
                <div>

                <div class="col-6 mb-4">
                    <label for="id_marca" class="form_label">Marca</label>
                    <select class="form-select" value="<?= $id_marca ?>" id="id_marca" name="id_marca" required="required">
                        <option selected>Seleccionar</option>
                        <?php
                            foreach ($registro_marca  as $datos) {
                                echo '<option value="' . $datos->getId() . '">' . $datos->getMarca() . '</option>';
                            }
                        ?>
                    </select>
                </div>

                <div class="mb-4 col-6">
                    <label for="id_color" class="form_label">Color</label>
                    <select class="form-select" value="<?= $id_color ?>" id="id_color" name="id_color" required="required">
                        <option selected>Seleccionar</option>
                        <?php
                            foreach ($registro_color  as $datos) {
                                echo '<option value="' . $datos->getId() . '">' . $datos->getColor() . '</option>';
                            }
                        ?>
                    </select>
                </div>

                <div class="col-6 mb-4">
                    <label for="id_accesorios" class="form_label">Accesorios</label>
                    <select class="form-select" value="<?= $id_accesorios ?>" id="id_accesorios" name="id_accesorios" required="required">
                        <option selected>Seleccionar</option>
                        <?php
                            foreach ($registro_accesorios  as $datos) {
                                echo '<option value="' . $datos->getId() . '">' . $datos->getAccesorios() . '</option>';
                            }
                        ?>
                    </select>
                </div>

                <div class="mb-4 col-6">
                    <label for="serie" class="form_label">Serie</label>
                    <input type="number" class="form-control" value="<?= $serie ?>" id="serie" name="serie" required="required">
                </div>

                <div class="col-6 mb-4">
                    <button type="submit" class="btn btn-primary mb-3">Guardar</button>
                    <button type="submit" href="../../Views/dispositivos/menuDispositivo.php" class="btn btn-primary mb-3">Menú Principal</button>
                </div>
            </div>
        </div>
    </form>
</div>

<?php require_once('../Main/partials/footer.php'); ?>