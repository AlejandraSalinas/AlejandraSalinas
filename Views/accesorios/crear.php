<?php
require_once dirname(__FILE__) . '../../../config/config.php';
require_once('../../Views/Main/partials/header.php');
require_once('../../models/PersonaModel.php');
require_once('../../models/accesoriosDispositivoModel.php');
require_once('../../models/marcaDispositivoModel.php');
require_once('../../models/colorDispositivoModel.php');


$personas_model = new PersonaModel();
$personas = $personas_model->NombreCompleto();

// $datos_accesorios = new AccesoriosDispositivoModel();
// $accesorios = $datos_accesorios->getAll();


// $datos_marca = new MarcaDispositivoModel();
// $marca = $datos_marca->getAll();

// $datos_color = new ColorDispositivoModel();
// $color = $datos_color->getAll();



//cargar getAll de personas

?>
<div class="container-fluid">
    <h1 class="h3 mb-3 text-gray-800">Crear Nuevo Registro de Dispositivo</h1>
    <form action="../../controllers/accesorioModel.php" method="POST">
        <input type="hidden" name="c" value="1">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-3">
                    <label for="id_persona" class="form_label">Nombre Completo</label>
                    <select class="form-select persona" aria-label="default select example" value="<?= $id_persona ?>" id="id_persona" name="id_persona">
                    <?php    
                        foreach ($personas  as $persona) {
                            echo '<option value="' . $persona->getIdPersona() . '">' . $persona->getNombre() . '</option>';

                        }
                    ?>
                    </select>
                </div>
                 <div class="row">
                    <div class="col-6 mb-3">
                    <label for="nombre_accesorio" class="form_label">Acccesorio</label>
                           <input type="text" class="form-control" id="nombre_accesorio" name="nombre_accesorio" required="required">
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