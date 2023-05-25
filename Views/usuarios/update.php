<?php 
require_once dirname(__FILE__) . '../../../config/config.php';

require_once("../Main/partials/header.php"); 

require_once '../../models/PersonaModel.php';
require_once '../../models/tipoIdentificacionModel.php';
require_once '../../models/RolesModel.php';
require_once '../../models/SexoModel.php';


$datos = new PersonaModel();
$registro = $datos->getById($_REQUEST['id_persona']);

$datos_identificacion = new TipoIdentificacionModel();
$registro_identificacion = $datos_identificacion->getAll();

$datos_rol  = new RolesModel();
$data  = $datos_rol->getAll();

$datos_sexo = new SexoModel();
$genero = $datos_sexo->getAll();

foreach ($registro as $persona) {
    $id_persona            = $persona->getId();
    $tipo_identificacion   = $persona->getTipoIdentificacion();
    $numero_identificacion = $persona->getNumeroIdentificacion();
    $primer_nombre         = $persona->getPrimerNombre();
    $segundo_nombre        = $persona->getSegundoNombre();
    $primer_apellido       = $persona->getPrimerApellido();
    $segundo_apellido      = $persona->getSegundoApellido();
    $email                 = $persona->getEmail();
    $telefono              = $persona->getTelefono();
    $direccion             = $persona->getDireccion();
    $id_sexo               = $persona->getSexo();
    $id_rol                = $persona->getRol();
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Actualizar Usuario</h1>
    <hr class="hr mb-5">
    <form action="../../controllers/PersonaController.php?c=3&id_persona=<?= $id_persona ?> " method="post">
        <div class="container">
            <div class="row">
                <div class="mb-4 col-6">
                    <label for="tipo_identificacion" class="form-label">Tipo de Identificación:</label>
                    <select class="form-select" id="tipo_identificacion" name="tipo_identificacion" required="required">
                        <?php foreach ($registro_identificacion as $datos) : ?> 
                               
                            <option value="<?= $datos->getId() ?>" <?= $datos->getId() == $persona->getTipoIdentificacion() ? 'selected' :  "" ?>><?= $datos->getTipoIdentificacion() ?></option>
                           
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="col-6 mb-4">
                    <label for="numero_identificacion" class="form-label">Número de Identificación:</label>
                    <input type="number" class="form-control" id="numero_identificacion" name="numero_identificacion" value="<?= $numero_identificacion ?>">
                </div>
                <div class="mb-4 col-6">
                    <label for="primer_nombre" class="form-label">Primer Nombre:</label>
                    <input type="text" class="form-control" name="primer_nombre" id="primer_nombre" value="<?= $primer_nombre ?>">
                </div>
                <div class="col-6 mb-4">
                    <label for="segundo_nombre" class="form-label">Segundo Nombre:</label>
                    <input type="text" class="form-control" name="segundo_nombre" id="segundo_nombre" value="<?= $segundo_nombre ?>">
                </div>
                <div class="mb-4 col-6">
                    <label for="primer_apellido" class="form-label">Primer Apellido:</label>
                    <input type="text" class="form-control" name="primer_apellido" id="primer_apellido" value="<?= $primer_apellido ?>">
                </div>
                <div class="col-6 mb-4">
                    <label for="segundo_apellido" class="form-label">Segundo Apellido:</label>
                    <input type="text" class="form-control" name="segundo_apellido" id="segundo_apellido" value="<?= $segundo_apellido ?>">
                </div>
                <div class="mb-4 col-6">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" id="email">
                </div>
                <div class="col-3 mb-4">
                    <label for="telefono" class="form-label">Teléfono:</label>
                    <input type="number" class="form-control" id="telefono" name="telefono">
                </div>
                <div class="col-3 mb-4">
                    <label for="direccion" class="form-label">Dirección:</label>
                    <input type="text" class="form-control" id="direccion" name="direccion">
                </div>
                <div class="mb-4 col-6">
                    <label for="id_sexo" class="form-label">Sexo:</label>
                    <select class="form-select" id="id_sexo" name="id_sexo" required="required">
                        <?php foreach ($genero as $sexo_persona) : ?> 
                               
                            <option value="<?= $sexo_persona->getId() ?>" <?= $sexo_persona->getId() == $persona->getSexo() ? 'selected' :  "" ?>><?= $sexo_persona->getSexo() ?></option>
                           
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="col-6 mb-2">
                    <label for="id_rol" class="form-label">Rol:</label>
                    <select class="form-select" id="id_rol" name="id_rol" required="required">                    
                    <?php foreach ($data as $datos) : ?> 
                               
                       <option value="<?= $datos->getId() ?>" <?= $datos->getId() == $persona->getRol() ? 'selected' :  "" ?>><?= $datos->getRol() ?></option>
                              
                    <?php endforeach ?>
                    </select>
                </div>
                <div class="row justify-content-center">
                    <div class="col-1">
                        <button type="submit" class="btn btn-outline-primary">Guardar</button>
                    </div>    
                </div>
            </div>   
        </div>        
    </form>
    <div class="row justify-content-center">
        <div class="col-3 mb-2">
            <button type="submit" class="btn btn-outline-primary">Guardar</button>
                        
            <a class="btn btn-outline-success"  href="../Main/index.php">Regresar a Inicio</a>
        </div>    
    </div>
</div>
<!-- /.container-fluid -->


<?php require_once("../Main/partials/footer.php"); ?>