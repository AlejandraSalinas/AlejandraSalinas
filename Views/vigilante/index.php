<?php
include_once(__DIR__ . "../../../Config/config.php");
include_once('../Main/partials/header.php');
require_once '../../models/VigilanteModel.php';
require_once('../../Models/PersonaModel.php');

$data = new PersonaModel();
$registro = $data->getAll();

$datos_vigilante = new VigilanteModel();
$registro_vigilante = $datos_vigilante->getAll();
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Vigilante</h1>
    <div class="container text-center">
        <?php include_once('../Main/partials/listado.php'); ?>
        <br>
        <br>
        <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Tipo de Identificación</th>
                            <th scope="col">Número de Identificación</th>
                            <th scope="col">Primer Nombre</th>
                            <th scope="col">Segundo Nombre</th>
                            <th scope="col">Primer Apellido</th>
                            <th scope="col">Segundo Apellido</th>
                            <th scope="col">Email:</th>
                            <th scope="col">Teléfono:</th>
                            <th scope="col">Dirección:</th>
                            <th scope="col">Contraseña:</th>
                            <th scope="col">Inicio Contrato:</th>
                            <th scope="col">Fin Contrato:</th>
                            <th scope="col">Estado:</th>
                            <th scope="col">Sexo:</th>
                            <th scope="col">Rol:</th>
                            <th scope="col" colspan="16">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>                        
                        <?php
                        if ($registro_vigilante) {
                            $pos = 1;

                            foreach ($registro_vigilante as $row) {

                        ?>
                                <tr class="text-center"> 
                                    <td><?= $row->getTipoIdentificacion()?></td>
                                    <td><?= $row->getNumeroIdentificacion()?></td>
                                    <td><?= $row->getPrimerNombre()?></td>
                                    <td><?= $row->getSegundoNombre()?></td>
                                    <td><?= $row->getPrimerApellido()?></td>
                                    <td><?= $row->getSegundoApellido()?></td>
                                    <td><?= $row->getEmail()?></td>
                                    <td><?= $row->getTelefono() ?></td>
                                    <td><?= $row->getDireccion() ?></td>
                                    <td><?= $row->getSexo() ?></td>
                                    <td><?= $row->getRoles()?></td>
                                    <td><?= $row->getPassword()?></td>
                                    <td><?= $row->getInicioContrato()?></td>
                                    <td><?= $row->getFinContrato()?></td>
                                    <td><?= $row->getEstado()?></td>
                                    <td>
                                        <span id="tipo_identificacion<?= $identificacion->getId() ?>"> <?= $identificacion->getTipoIdentificacion() ?> </span>
                                    </td>
                                    <td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-warning" onclick="show(<?= $identificacion-> getId()  ?>)">
                                            <i class="bi bi-pencil-square" style="font-size: 1.4rem;"></i>
                                        </a>
                                        <a class="btn btn-sm btn-outline-danger" href="../../controllers/tipoIdentificacionController.php?c=4&id_tipo_identificacion=<?= $identificacion-> getId() ?>">
                                            <i class="bi bi-trash3-fill" style="font-size: 1.4rem;"></i>
                                        </a>
                                    
                                    </td>
                                    </td>
                                </tr>
                            <?php
                                $pos++;
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="16" class="text-center">No hay datos</td>
                            </tr>
                        <?php
                          }
                        ?>
                </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        var btn_editar = document.getElementById("btn_editar");
        btn_editar.hidden = true;
    });

    function show(id_tipo_identificacion) {
        var btn_editar = document.getElementById("btn_guardar");
        btn_editar.hidden = true;

        var btn_editar = document.getElementById("btn_editar");
        btn_editar.hidden = false;

        let elemento = document.getElementById(`tipo_identificacion${id_tipo_identificacion}`);
        let documento = elemento.textContent

        document.getElementById('nombre').value = documento
        document.getElementById('nombre').setAttribute('data-id', id_tipo_identificacion);
    }

    function editar() {

        let elemento = document.getElementById("nombre");
        let id_tipo_identificacion = elemento.dataset.id
        let nombre = elemento.value

        axios.post(`../../controllers/tipoIdentificacionController.php?c=3&id_tipo_identificacion=${id_tipo_identificacion}&nombre=${nombre}`)
            .then(function(response) {
                window.location.reload();
                document.getElementById('nombre').focus();
            })
            .catch(function(error) {
                console.error(error);
            });
    }

    function borrar(){
        var btn_editar = document.getElementById("btn_guardar");
        btn_editar.hidden = false;

        var btn_editar = document.getElementById("btn_editar");
        btn_editar.hidden = true;

        document.getElementById('nombre').removeAttribute('data-id');

        document.getElementById('nombre').value = "";
        document.getElementById('nombre').focus();
    }
</script>
<!-- /.container-fluid -->

<?php require_once("../Main/partials/footer.php"); ?>

