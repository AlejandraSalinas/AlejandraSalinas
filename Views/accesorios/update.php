<?php
    require_once dirname(__FILE__) . '../../../config/config.php';
    require_once('../../Views/Main/partials/header.php');
    require_once('../../models/accesorioModel.php');
    // require_once('../../models/TipoAccesorioModel.php');
    // require_once('../../models/marcaDispositivoModel.php');
    // require_once('../../models/colorDispositivoModel.php');

    $data = new AccesorioModel();
    $registroAccesorios = $data->getAll('id_accesorio');

    // $datos_usuario = new PersonaModel();
    // $registro_usuario = $datos_usuario->getAll();

    // $personas_model = new PersonaModel();
    // $personas = $personas_model->NombreCompleto();

    // $datos_marca = new MarcaDispositivoModel();
    // $marca = $datos_marca->getAll();

    // $datos_color = new ColorDispositivoModel();
    // $color = $datos_color->getAll();

    // $datos_accesorios = new TipoAccesorioModel();
    // $accesorios = $datos_accesorios->getAll();

    foreach( $registroAccesorios as $dispositivo){
        $id_accesorio                = $id_accesorio -> getId();
        $id_persona                 = $id_persona -> getId();
        $id_marca                   = $dispositivo -> getMarca();
        $id_color                   = $dispositivo -> getColor();
        $serie                      = $dispositivo -> getSerie();
        $descripcion              = $dispositivo -> getDescripcion();
    }

?>
<div class="container-fluid">
    <h1  class="h3 mb-4 text-gray-800">Accesorios Registrado</h1>
    <form action="../../controllers/accesorioController.php?c=3&id_accesorio=<?= $id_accesorio ?> " method="post">
    <input type="hidden" name="id" value="<?= $id_accesorio ?>">
        <div class="container">
            <div class="row">
            <div class="col-12 mb-3">
             <select class="form-select" value="<?= $personas ?>" id="id_personas" name="id_personas" require="required">
                        <?php foreach ($personas as $persona) : ?>

                            <option value="<?= $persona->getId() ?>" <?= $persona->getId() == $persona->getIdPersona() ? 'selected' : "" ?>> <?= $persona->getIdPersona() ?></option>;

                        <?php endforeach ?>
                    </select>
                </div>
                </div>
                <div class="row">
                    <div class="col-6 mb-3">
                    <label for="nombre_accesorio" class="form_label">Acccesorio</label>
                    <input type="text" class="form-control" id="nombre_accesorio" value="<?= $nomb ?>" name="nombre_accesorio" required="required">
                </div>
             

                    <div class="col-6 mb-3">
                        <label for="serie" class="form_label">Serie</label>
                        <input type="text" class="form-control" value="<?= $serie ?>" name="serie" id="serie" require="required">

                    </div>
                </div>
                <div class="row">
                    <div class="col-6 mb-3">
                    <label for="descripcion" class="form_label">Descripción</label>
                        <input type="text" class="form-control" value="<?= $descripcion ?>" id="descripcion" name="descripcion" required="required">
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