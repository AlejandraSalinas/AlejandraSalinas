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



    $datos_dispositivo = new TipoDispositivoModel();
    $dispositivos = $datos_dispositivo->getAll();

    $datos_marca = new MarcaDispositivoModel();
    $marca = $datos_marca->getAll();

    $datos_color = new ColorDispositivoModel();
    $color = $datos_color->getAll();




    foreach( $registroDispositivo as $dispositivoId ){
        $id_dispositivo                = $dispositivoId  -> getId();
        $id_persona                 = $dispositivoId  -> getPersonaNombre();

        //$id_tipo_identificacion     = $dispositivo  Id  -> getTipoIdentificacion();
        //$numero_identificacion      = $dispositivo  Id  -> getNumeroIdentificacion();
        $id_datos_dispositivo       = $dispositivoId  -> getTipoDispositivos();
        $id_marca                   = $dispositivoId  -> getMarca();
        $id_color                   = $dispositivoId  -> getColor();
        $serie                      = $dispositivoId  -> getSerie();
    }

?>
<script>
    $(".persona").select2({
        placeholder: "Seleccionar",
        allowClear: true
    });
</script>


<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Actualización Datos Dispositivo</h1>
    <hr class="hr mb-5">
    <form  action="../../controllers/dispositivosController.php?c=3&$id_dispositivo=<?= $id_dispositivo ?> " method="post">
        <div class="container">
            <div class="row">              
                <div class="col-3 mb-4">
                
             <select class="form-select"  id="id_personas" name="id_personas" require='require'>
                        <?php foreach ($personas as $persona) : ?>

                            <option value="<?= $persona->getId() ?>" <?= $persona->getId() == $persona->getPersonaNombre() ? 'selected' : "" ?>> <?= $persona->getPersonaNombre() ?></option>;

                        <?php endforeach ?>
                    </select>
                </div>
             
                <div class="row">
                <div class="col-md-4">
                        <label for="id_tipo_dispositivo" class="form-label">Dispositivo</label>
                        <select class="form-select" aria-label="Default select example" name="id_tipo_dispositivo" id="id_tipo_dispositivo">
                            <?php foreach ($dispositivos as $datos_dispositivo) : ?>
                                <option value="<?= $datos_dispositivo->getId() ?>" <?= $datos_dispositivo->getId() == $dispositivoId->getTipoDispositivos() ? 'selected' :  "" ?>><?= $datos_dispositivo->getDispositivo() ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="id_marca" class="form-label">Marca</label>
                        <select class="form-select" aria-label="Default select example" name="id_marca" id="id_marca">
                            <?php foreach ($marcas as $datos_marca) : ?>
                                <option value="<?= $datos_marca->getId() ?>" <?= $datos_marca->getId() == $dispositivoId->getMarca() ? 'selected' :  "" ?>><?= $datos_marca->getMarca() ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-6">
                        <label for="id_color" class="form_label">Color</label>
                        <select class="form-select"  value="<?= $id_color ?>"  id="id_color" name="id_color" require='require'>
                            <option selected>Seleccionar</option>
                            <?php
                            foreach ($color  as $color) : ?>
                                <option value="<?= $color->getId() ?>" <?= $color->getId() == $dispositivo->getColor() ? 'selected' : "" ?>> <?= $color->getColor() ?></option>;                                
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="col-6 mb-3">
                        <label for="serie" class="form_label">Serie</label>
                        <input type="text" class="form-control"  value="<?= $serie ?>" name="serie" id="serie" require='require'>
                    </div>
                </div>
                <div class="row">
                <div class="col-6 mb-3">
                    <label for="descripcion" class="form_label">Descripción</label>
                        <input type="text" class="form-control" value="<?= $descripcion ?>" id="descripcion" name="descripcion" required="required">
                    </div>
                </div>
                </div>
        </div>
        <<div class="row justify-content-center">
            <div class="col-2 mb-4">
                <button type="submit" href="index.php" class="btn btn-outline-primary">Guardar</button>
                <a class="btn btn-outline-success" href="index.php">Regresar</a>
            </div>
        </div>6
    </form>
</div>
<!-- /.container-fluid -->


<?php require_once("../Main/partials/footer.php"); ?>