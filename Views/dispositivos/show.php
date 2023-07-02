<?php
    require_once dirname(__FILE__) . '../../../config/config.php';
    require_once('../../Views/Main/partials/header.php');
    require_once('../../models/dispositivosModel.php');
    require_once('../../models/personaNombreModel.php');
    require_once('../../models/tipoDispositivoModel.php');
    require_once('../../models/marcaDispositivoModel.php');
    require_once('../../models/colorDispositivoModel.php');


    $data = new DispositivoModel();
    $registroDispositivo = $data->getAll('id_dispositivo');


$personas_model = new personaNombreModel();
$personas = $personas_model->NombreCompleto();

    foreach( $registroDispositivo as $dispositivo){
        $id_dispositivo             = $dispositivo -> getId();
        $id_persona                = $dispositivo -> getId();

        $id_tipo_dispositivos       = $dispositivo -> getTipoDispositivos();
        $id_marca                   = $dispositivo -> getMarca();
        $id_color                   = $dispositivo -> getColor();
        $serie                      = $dispositivo -> getSerie();
        $descripcion                =$dispositivo  -> getDescripcion(); 
       }

?>
<div class="container-fluid">
    <h1  class="h3 mb-4 text-gray-800">Información del  Dispositivo Registrado</h1>
    <form action="../../controllers/dispositivosController.php?c=3&id_dispositivo=<?= $id_dispositivo ?> " method="post">
    <input type="hidden" name="id" value="<?= $id_dispositivo ?>">
        <div class="container">
            <div class="row">
            <div class="col-12 mb-3">
             <select class="form-select"  id="id_personas" name="id_personas" disabled>
                        <?php foreach ($personas as $persona) : ?>

                            <option value="<?= $persona->getId() ?>" <?= $persona->getId() == $persona->getPersonaNombre() ? 'selected' : "" ?>> <?= $persona->getPersonaNombre() ?></option>;

                        <?php endforeach ?>
                    </select>
                    
                </div>
             
                <div class="row">
                    <div class="col-6 mb-3">
                        <label for="id_tipo_dispositivo" class="form_label">Tipo de Dispositivo</label>
                        <input type="text" class="form-control"  value="<?= $id_tipo_dispositivos ?>" name="$id_tipo_dispositivos" id="$id_tipo_dispositivos" disabled>

                    </div>
                    <div class="col-6 mb-3 ">
                        <label for="id_marca" class="form_label">Marca</label>
                        <input type="text" class="form-control"  value="<?= $id_marca ?>" name="id_marca" id="id_marca" disabled>

                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-6">
                        <label for="id_color" class="form_label">Color</label>
                        <input type="text" class="form-control"  value="<?= $id_color ?>" name="$id_color" id="$id_color" disabled>

                    </div>

                    <div class="col-6 mb-3">
                        <label for="serie" class="form_label">Serie</label>
                        <input type="text" class="form-control"  value="<?= $serie ?>" name="serie" id="serie" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 mb-3">
                    <label for="descripcion" class="form_label">Descripción</label>
                        <input type="text" class="form-control" value="<?= $descripcion ?>" id="descripcion" name="descripcion" disabled>
                    </div>
                </div>

                <div class="col-6 mb-4">
                <a class="btn btn-success" href="../../Views/dispositivos/index.php">Regresar</a>
                </div>
            </div>
        </div>
    </form>
</div>

<?php require_once('../Main/partials/footer.php'); ?>
<script>
    $(".persona").select2({
        placeholder: "Seleccionar",
        allowClear: true
    });
</script>