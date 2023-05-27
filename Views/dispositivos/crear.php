<?php
    require_once dirname(__FILE__) . '../../../config/config.php';
    require_once('../../Views/Main/partials/header.php');
    require_once('../../models/tipoIdentificacionModel.php');
    require_once('../../models/tipoDispositivoModel.php');
    require_once('../../models/marcaDispositivoModel.php');
    require_once('../../models/colorDispositivoModel.php');
    require_once('../../models/accesoriosDispositivoModel.php');
    ?>

        <div class="container-fluid">
            <h1  class="h3 mb-4 text-gray-800">Registro de Dispositivo</h1>
                    <form action="../../controllers/dispositivosController.php" method="POST">
                        <input type="hidden" name="c" value="1">
                        <div class="container">
                            <div class="row">

                            <label for="tipo_identificacion" class="form-label">Tipo de Identificación:</label>
                            <select class="form-select" id="tipo_identificacion" name="tipo_identificacion" required="required">
                                <option selected>Seleccionar</option>
                                <?php
                                foreach ($tipo_identificacion  as $datos) {
                                    echo '<option value="' . $datos->getId() . '">' . $datos->gettipoIdentificacion() . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-4 mb-6">
                            <label for="numero_identificacion" class="form_label">Número de Identificación</label>
                            <input type="number" class="form-control" id="numero_identificacion" name="numero_identificacion" required="required">
                        </div>

                        <div class="col-6 mb-4">
                            <label for="id_tipo_dispositivos" class="form_label">Tipo de Dispositivo</label>
                            <select class="form-select" id="id_tipo_dispositivos" name="id_tipo_dispositivos" required="required">
                                <option selected>Seleccionar</option>
                                <?php
                                foreach ($tipo_dispositivo as $datos) {
                                    echo '<option value="' . $datos->getId() . '">' . $datos->getmarc() . '</option>';

                                }
                                ?>
                                
                            </select>
                        </div>
                        <div class="mb-4 col-6">
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
                        <div class="col-6 mb-4">
                            <label for="id_color" class="form_label">Color</label>
                            <select class="form-select" id="id_color" name="id_color">
                                <option value="1">Blanco</option>
                                <option value="2">Gris</option>
                                <option value="3">Negro</option>
                                <option value="4"></option>
                            </select>
                        </div>
                        <div class="mb-4 col-6">
                            <label for="id_accesorios" class="form_label">Accesorios</label>
                            <select class="form-select" id="id_accesorios" name="id_accesorios">
                                <option value="1">Cargador</option>
                                <option value="2">Mouse</option>
                                <option value="3">Teclado</option>
                            </select>
                        </div>
                        <div class="col-6 mb-4">
                            <label for="serie" class="form_label">Serie</label>
                            <input type="number" class="form-control" id="serie" name="serie">
                        </div>
                        <div class="mb-4 col-6">
                            <br> <button type="submit" class="btn btn-primary mb-3">Guardar</button>
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