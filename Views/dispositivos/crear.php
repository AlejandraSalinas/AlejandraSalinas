<?php
require_once dirname(__FILE__) . '../../../config/config.php';
require_once('../../Views/Main/partials/header.php');
require_once('../../models/personaNombreModel.php');
require_once('../../models/tipoDispositivoModel.php');
require_once('../../models/marcaDispositivoModel.php');
require_once('../../models/colorDispositivoModel.php');


//$data = new DispositivoModel();
//$registro = $data->getId();

$personas_model = new personaNombreModel();
$personas = $personas_model->NombreCompleto();

$datos_dispositivo = new TipoDispositivoModel();
$dispositivos = $datos_dispositivo->getAll();

$datos_marca = new MarcaDispositivoModel();
$marca = $datos_marca->getAll();

$datos_color = new ColorDispositivoModel();
$color = $datos_color->getAll();



//cargar getAll de personas

?>
<div class="container-fluid">
    <h1 class="h3 mb-3 text-gray-800">Crear Nuevo Registro de Dispositivo</h1>
    <form action="../../controllers/dispositivosController.php" method="POST">
        <input type="hidden" name="c" value="1">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-3">
                  
                    <label for="id_persona" class="form-label text-center">Selecione nombre del usuario:</label>
                    <select class="form-control persona" aria-label="Default select example" value="<?= $id_persona ?>" id="id_persona" name="id_persona">
                    <option value="">Seleccion un nombre</option>
                        <?php
                        foreach ($personas  as $persona) {
                            echo '<option value="' . $persona->getPersonaNombre() . '">' . $persona->getNombre() . '</option>';
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
                    <a class="btn btn-outline-success" href="../../Views/accesorios/crear.php">Registrar Accesorio</a>
                    <a class="btn btn-outline-success" href="../../Views/accesorios/crear.php">Registrar Accesorio</a>

                    <div class="col-6 mb-3">
                        <button type="submit" class="btn btn-outline-primary">Guardar</button>
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
 
 (".persona").select2({
     placeholder: "Seleccionar",
     allowClear: true
    });
</script>
    <?php require_once('../Main/partials/footer.php'); ?>