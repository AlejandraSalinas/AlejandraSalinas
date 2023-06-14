<?php
require_once dirname(__FILE__) . '../../../config/config.php';
require_once('../../Views/Main/partials/header.php');
require_once('../../models/dispositivosModel.php');
require_once('../../models/PersonaModel.php');
require_once('../../models/tipoDispositivoModel.php');
require_once('../../models/marcaDispositivoModel.php');
require_once('../../models/colorDispositivoModel.php');
require_once('../../models/accesoriosDispositivoModel.php');


    $datos = new DispositivoModel();
    $datos_dipositivo = $datos->getAll();

    // var_dump($datos);
    // die();

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

foreach( $accesorios as $dispositivo){
    $id_dispositivo   = $dispositivo -> getId();
    // //$id_tipo_identificacion     = $ingresar -> getTipoIdentificacion();
    // //$numero_identificacion      = $ingresar -> getNumeroIdentificacion();
    // $id_persona                 = $dispositivo -> getIdPersona();
    
    $id_tipo_dispositivos       = $dispositivo -> getTipoDispositivos();
    $id_marca                   = $dispositivo -> getMarca();
    $id_color                   = $dispositivo -> getColor();
    $id_accesorios              = $dispositivo -> getAccesorios();
    $serie                      = $dispositivo -> getSerie();
    }

?>
<div class="container-fluid">
    <h1  class="h3 mb-4 text-gray-800">Dispositivo Registrado</h1>
    <form method="POST">
    <input type="hidden" name="id" value="<?= $id_dispositivo ?>">
        <div class="container">
            <div class="row">
             <div class="col-12 mb-3">
                    <label for="id_persona" class="form_label">Nombre Completo</label>
                    <select class="form-select" value="<?= $id_persona ?>" id="id_persona" name="id_persona">
                        <?php
                        foreach ($personas  as $persona) {
                            echo '<option value="' . $persona->getIdPersona() . '">' . $persona->getNombre() . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="row">
                    <div class="col-6 mb-3">
                        <label for="id_tipo_dispositivo" class="form_label">Tipo de Dispositivo</label>
                        <select class="form-select" value="<?= $id_tipo_dispositivo ?>" id="id_tipo_dispositivo" name="id_tipo_dispositivo" disabled>
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
                        <select class="form-select" value="<?= $id_marca ?>" id="id_marca" name="id_marca" disabled>
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
                        <select class="form-select" value="<?= $id_color ?>" id="id_color" name="id_color" disabled>
                            <option selected>Seleccionar</option>
                            <?php
                            foreach ($color  as $datos) {
                                echo '<option value="' . $datos->getId() . '">' . $datos->getColor() . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-6 mb-3">
                        <label for="id_accesorios" class="form_label">Accesorios</label>
                        <select class="form-select" value="<?= $id_accesorios ?>" id="id_accesorios" name="id_accesorios" disabled>
                            <option selected>Seleccionar</option>
                            <?php
                            foreach ($accesorios  as $datos) {
                                echo '<option value="' . $datos->getId() . '">' . $datos->getAccesorios() . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 mb-3">
                        <label for="serie" class="form_label">Serie</label>
                        <input type="text" class="form-control" id="serie" name="serie" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 mb-3">
                        <button type="submit" class="btn btn-outline-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<?php require_once('../Main/partials/footer.php'); ?>