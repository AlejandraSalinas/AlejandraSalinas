<?php
require_once dirname(__FILE__) . '../../../config/config.php';
require_once('../../Views/Main/partials/header.php');
require_once('../../models/PersonaModel.php');
// require_once('../../models/tipoDispositivoModel.php');
// require_once('../../models/marcaDispositivoModel.php');
// require_once('../../models/colorDispositivoModel.php');
// require_once('../../models/TipoAccesorioModel.php');

//$data = new DispositivoModel();
//$registro = $data->getId();

$personas_model = new PersonaModel();
$personas = $personas_model->NombreCompleto();

// $datos_dispositivo = new TipoDispositivoModel();
// $dispositivos = $datos_dispositivo->getAll();

// $datos_marca = new MarcaDispositivoModel();
// $marca = $datos_marca->getAll();

// $datos_color = new ColorDispositivoModel();
// $color = $datos_color->getAll();



//cargar getAll de personas

?>
<div class="container-fluid">
    <h1 class="h3 mb-3 text-gray-800">Crear Nuevo Registro de Dispositivo</h1>
    <form action="../../controllers/dispositivosController.php" method="POST">
        <input type="hidden" name="c" value="1">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-3">
                    <label for="numero_identificacion" class="form_label">Número De identificación</label>
                    <select class="form-select persona" aria-label="default select example" value="<?= $numero_identificacion ?>" id="numero_identificacion" name="numero_identificacion">
                    <?php    
                        foreach ($personas  as $persona) {
                            echo '<option value="' . $persona->getNumeroIdentificacion() . '">' . $persona->getNumeroIdentificacion() . '</option>';

                        }
                    ?>
                    </select>
                </div>


                <div class="row">
                    <div class="col-6 mb-3">
                        <label for="id_tipo_dispositivo" class="form_label">Tipo de Dispositivo</label>
                        <select class="form-select" value="<?= $id_tipo_dispositivo ?>" id="id_tipo_dispositivo" name="id_tipo_dispositivo" required="required">
                            <option selected>Seleccionar</option>
                            <?php
                            foreach ($dispositivos  as $dispositivo) {
                                echo '<option value="' . $dispositivo->getId() . '">' . $dispositivo->getTipoDispositivo() . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-6 mb-3 ">
                        <label for="id_marca" class="form_label">Marca</label>
                        <select class="form-select" value="<?= $id_marca ?>" id="id_marca" name="id_marca" required="required">
                            <option selected>Seleccionar</option>
                            <?php
                            foreach ($marca  as $datos) {
                                echo '<option value="' . $datos->getId() . '">' . $datos->getMarca() . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row">



                    <div class="mb-3 col-6">
                        <label for="id_color" class="form_label">Color</label>
                        <select class="form-select" value="<?= $id_color ?>" id="id_color" name="id_color" required="required">
                            <option selected>Seleccionar</option>
                            <?php
                            foreach ($color  as $datos) {
                                echo '<option value="' . $datos->getId() . '">' . $datos->getColor() . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                     <div class="col-6 mb-3">
                        <label for="serie" class="form_label">Serie</label>
                        <input type="text" class="form-control" id="serie" name="serie" required="required">
                    </div>

                   
                </div>
                <div class="row">

                <div class="col-6 mb-3">
                        <label for="descripcion" class="form_label">Descripción</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" required="required">
                    </div>


                
                </div>
                <div class="row">
                    <div class="col-6 mb-3">
                        <button type="submit" class="btn btn-outline-primary">Guardar</button>
                    </div>
                </div>
            </div>
    </form>
</div>

<script>
    $(".persona").select2({
        placeholder: "Seleccionar",
        allowClear: true
    });
</script>
    <?php require_once('../Main/partials/footer.php'); ?>