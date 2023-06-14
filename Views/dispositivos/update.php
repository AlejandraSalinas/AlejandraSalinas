<?php
    require_once dirname(__FILE__) . '../../../config/config.php';
    require_once('../../Views/Main/partials/header.php');
    require_once('../../models/dispositivosModel.php');
    require_once('../../models/tipoDispositivoModel.php');
    require_once('../../models/marcaDispositivoModel.php');
    require_once('../../models/colorDispositivoModel.php');
    require_once('../../models/accesoriosDispositivoModel.php');

    $datos = new DispositivoModel();
    $datos_dipositivo = $datos->getById($_REQUEST['id_dispositivo']);

// $datos_usuario = new PersonaModel();
// $registro_usuario = $datos_usuario->getAll();


$personas_model = new PersonaModel();
$personas = $personas_model->NombreCompleto();

$datos_dispositivo = new TipoDispositivoModel();
$dispositivos = $datos_dispositivo->getAll();

$datos_marca = new MarcaDispositivoModel();
$marca = $datos_marca->getAll();

$datos_color = new ColorDispositivoModel();
$color = $datos_color->getAll();

$datos_accesorios = new AccesoriosDispositivoModel();
$accesorios = $datos_accesorios->getAll();

    foreach( $registro as $dispositivo){
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
                    <label for="id_persona" class="form_label">Nombre Completo</label>
                    <select class="form-select" value="<?= $id_persona ?>" id="id_persona" name="id_persona" disabled>
                        <?php
                        foreach ($personas  as $persona) {
                            echo '<option value="' . $persona->getIdPersona() . '">' . $persona->getNombre() . '</option>';
                        }
                        ?>
                    </select>


                <div class="mb-4 col-6">
                    <label for="id_tipo_dispositivos" class="form_label">Tipo de Dispositivo</label>
                    <select class="form-select" value="<?= $id_tipo_dispositivos ?>" id="id_tipo_dispositivos" name="id_tipo_dispositivos" require="required">
                        <?php foreach ($dispositivos  as $dispositivo) : ?>
                        <option value="<?= $datos->getId() ?>" <?= $datos->getId() == $registro_dispositivos->getTipoDispositivos() ? 'selected' : "" ?><?= $datos->getTipoDispositivos()?>></option>
                        <?php endforeach?>
                    </select>
                <div>

                <div class="col-6 mb-4">
                    <label for="id_marca" class="form_label">Marca</label>
                    <select class="form-select" value="<?= $id_marca ?>" id="id_marca" name="id_marca" require="required">
                        <?php foreach ($registro_marca  as $datos) : ?>
                        <option value="<?= $datos->getId() ?>" <?= $datos->getId() == $registro_dispositivos->getMarca() ? 'selected' : "" ?><?= $datos->getMarca()?>></option>
                        <?php endforeach?>
                    </select>
                </div>

                <div class="mb-4 col-6">
                    <label for="id_color" class="form_label">Color</label>
                    <select class="form-select" value="<?= $id_color ?>" id="id_color" name="id_color" require="required">
                        <?php foreach ($registro_color  as $datos) : ?>
                        <option value="<?= $datos->getId() ?>" <?= $datos->getId() == $registro_dispositivos->getColor() ? 'selected' : "" ?><?= $datos->getColor()?>></option>
                        <?php endforeach?>
                    </select>
                </div>

                <div class="col-6 mb-4">
                    <label for="id_accesorios" class="form_label">Accesorios</label>
                    <select class="form-select" value="<?= $id_accesorios ?>" id="id_accesorios" name="id_accesorios" require="required">
                        <?php foreach ($registro_accesorios  as $datos) : ?>
                        <option value="<?= $datos->getId() ?>" <?= $datos->getId() == $registro_dispositivos->getAccesorios() ? 'selected' : "" ?><?= $datos->getAccesorios()?>></option>
                        <?php endforeach?>
                    </select>
                </div>

                <div class="mb-4 col-6">
                    <label for="serie" class="form_label">Serie</label>
                    <input type="number" class="form-control" value="<?= $serie ?>" id="serie" name="serie">
                </div>

                <div class="col-6 mb-4">
                    <button type="submit" class="btn btn-primary mb-3">Guardar</button>
                </div>
            </div>
        </div>
    </form>
</div>

<?php require_once('../Main/partials/footer.php'); ?>