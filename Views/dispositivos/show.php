<?php
    require_once dirname(__FILE__) . '../../../config/config.php';
    require_once('../../Views/Main/partials/header.php');
    require_once('../../models/dispositivosModel.php');
    require_once('../../models/tipoDispositivoModel.php');
    require_once('../../models/marcaDispositivoModel.php');
    require_once('../../models/colorDispositivoModel.php');
    require_once('../../models/accesoriosDispositivoModel.php');

    $data = new DispositivoModel();
    $registroDispositivo = $data->getAll('id_dispositivo');
$datos_usuario = new PersonaModel();
 $registro_usuario = $datos_usuario->getAll();


// $personas_model = new PersonaModel();
// $personas = $personas_model->NombreCompleto();

$datos_dispositivo = new TipoDispositivoModel();
$dispositivos = $datos_dispositivo->getAll();

$datos_marca = new MarcaDispositivoModel();
$marca = $datos_marca->getAll();

$datos_color = new ColorDispositivoModel();
$color = $datos_color->getAll();

$datos_accesorios = new AccesoriosDispositivoModel();
$accesorios = $datos_accesorios->getAll();

    foreach( $registroDispositivo as $ingresar){
        $id_dispositivo                = $id_dispositivo -> getId();
        $id_persona                 = $id_persona -> getId();

        //$id_tipo_identificacion     = $ingresar -> getTipoIdentificacion();
        //$numero_identificacion      = $ingresar -> getNumeroIdentificacion();
        $id_tipo_dispositivos       = $ingresar -> getTipoDispositivos();
        $id_marca                   = $ingresar -> getMarca();
        $id_color                   = $ingresar -> getColor();
        $id_accesorios              = $ingresar -> getAccesorios();
        $serie                      = $ingresar -> getSerie();
    }

?>
<div class="container-fluid">
    <h1  class="h3 mb-4 text-gray-800">Actualizar Dispositivo Registrado</h1>
    <form action="../../controllers/dispositivosController.php?c=3&id_dispositivo=<?= $id_dispositivo ?> " method="post">
    <input type="hidden" name="id" value="<?= $id_dispositivo ?>">
        <div class="container">
            <div class="row">
            <div class="col-12 mb-3">
             <select class="form-select"  id="id_personas" name="id_personas" disabled>
                        <?php foreach ($personas as $persona) : ?>

                            <option value="<?= $persona->getId() ?>" <?= $persona->getId() == $persona->getIdPersona() ? 'selected' : "" ?>> <?= $persona->getIdPersona() ?></option>;

                        <?php endforeach ?>
                    </select>
                </div>
             
                <div class="row">
                    <div class="col-6 mb-3">
                        <label for="id_tipo_dispositivo" class="form_label">Tipo de Dispositivo</label>
                        <select class="form-select"  value="<?= $id_tipo_dispositivos ?>"" id="id_tipo_identificacion" name="id_tipo_identificacion" disabled>
                        <select class="form-select" id="id_tipo_dispositivo" name="id_tipo_dispositivo" disabled>
                            <option selected>Seleccionar</option>
                            <?php
                            foreach ($dispositivos  as $dispositivo) : ?>
                                <option value="<?= $dispositivo->getId() ?>" <?= $dispositivo->getId() == $ingresar->getTipoDispositivos() ? 'selected' :  "" ?>><?= $dispositivo->getTipoDispositivos() ?></option>

                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="col-6 mb-3 ">
                        <label for="id_marca" class="form_label">Marca</label>
                        <select class="form-select" value="<?= $id_marca ?>" id="id_marca" name="id_marca" disabled>
                            <option selected>Seleccionar</option>
                            <?php
                            foreach ($marca  as $marca) : ?>
                                <option value="<?= $marca->getId() ?>" <?= $marca->getId() == $ingresar->getMarca() ? 'selected' : "" ?>> <?= $marca->getMarca() ?></option>;  
                              
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-6">
                        <label for="id_color" class="form_label">Color</label>
                        <select class="form-select"  value="<?= $id_color ?>"  id="id_color" name="id_color" disabled>
                            <option selected>Seleccionar</option>
                            <?php
                            foreach ($color  as $color) : ?>
                                <option value="<?= $color->getId() ?>" <?= $color->getId() == $ingresar->getColor() ? 'selected' : "" ?>> <?= $color->getColor() ?></option>;                                
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="col-6 mb-3">
                        <label for="id_accesorios" class="form_label">Accesorios</label>
                        <select class="form-select"  value="<?= $id_accesorios ?>" id="id_accesorios" name="id_accesorios" disabled>
                            <option selected>Seleccionar</option>
                            <?php
                            foreach ($accesorios  as $accesorio) : ?>
                                <option value="<?= $accesorio->getId() ?>" <?= $accesorio->getId() == $ingresar->getAccesorios() ? 'selected' : "" ?>> <?= $accesorio->getAccesorios() ?></option>;                                
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 mb-3">
                        <label for="serie" class="form_label">Serie</label>
                        <input type="text" class="form-control"  value="<?= $serie ?>" name="serie" id="serie" disabled>
                    </div>
                </div>

                <div class="col-6 mb-4">
                    <button type="submit" class="btn btn-primary mb-3">Guardar</button>
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