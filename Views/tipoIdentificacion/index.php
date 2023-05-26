<?php
include_once(__DIR__ . "../../../Config/config.php");
include_once('../Main/partials/header.php');
require_once '../../models/TipoIdentificacionModel.php';

$datos_identificacion = new TipoIdentificacionModel();
$registro_identificacion = $datos_identificacion->getAll();

foreach ($registro_identificacion as $identificacion) {
    $id_tipo_identificacion = $identificacion->getId();
    $nombre = $identificacion->getTipoIdentificacion();
}

?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Configiración</h1>
    <div class="container text-center">
        <?php include_once('../Main/partials/lista.php'); ?>
        <br>
        <br>
        <div class="row">
            <div class="col">
                <div class="card card-body">
                    <h3>Crear Tipo De Identificación:</h3>
                    <div class="mb-3">
                        <form action="../../controllers/tipoIdentificacionController.php?c=1" method="POST">
                            <div class="input-group ">
                                <div class="input-group mb-3">
                                    <input type="text" name="nombre" class="form-control" placeholder="Ingrese un nuevo tipo de identificación" required>
                                    <button class="btn btn-primary" type="submit" id="btn_guardar">Guardar</button>
                                    <button class="btn btn-danger" type="button">Cancelar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <br>

                <br>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tipo Identificación</th>
                            <th scope="col" colspan="2">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            if ($registro_identificacion) {
                                $pos = 1;
                                foreach ($registro_identificacion as $identificacion) {
                            ?>
                        <tr>
                            <td><?= $pos ?></td>
                            <td>
                                <span id="tipo_identificacion<?= $identificacion->getId() ?>"> <?= $identificacion->getTipoIdentificacion() ?> </span>
                            </td>
                            <td>
                                <a class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="id_tipo_identificaion"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg>
                                </a>
                                <a class="btn btn-sm btn-outline-danger" href="../../controller/tipoIdentificacionController.php?c=4&id_tipo_documento="><svg xmlns="http://www.w3.org/2000/svg" width="40" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                    </svg>
                                </a>
                            </td>

                        </tr>
                    <?php
                                    $pos++;
                                }
                            } else {
                    ?>
                    <tr>
                        <td colspan="3" class="text-center">No hay datos</td>
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
    function update(id) {
        let elemento = document.getElementById(`documento${id}`);
        let documento = elemento.textContent

        document.getElementById('tipo_actualizado').value = documento
    }

    function recarga(id) {

        let elemento = document.getElementById("tipo_actualizado");
        let documento = elemento.value

        axios.post(`../../controller/documentoController.php?c=3&id_tipo_documento=${id}&tipo=${ documento }`)
            .then(function(response) {
                window.location.reload()
            })
            .catch(function(error) {
                console.error(error);
            });
    }
</script>
<!-- /.container-fluid -->

<?php require_once("../Main/partials/footer.php"); ?>