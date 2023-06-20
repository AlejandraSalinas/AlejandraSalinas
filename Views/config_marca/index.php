<?php
include_once(__DIR__ . "../../../Config/config.php");
include_once('../Main/partials/header.php');
require_once '../../models/RolesModel.php';

$datos_marca = new MarcaDispositivoModel();
$marca = $datos_marca->getAll();
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Configuración</h1>
    <div class="container text-center">
        <?php include_once('../Main/partials/lista.php'); ?>
        <br>
        <br>
        <div class="row">
            <div class="col">
                <div class="card card-body">
                    <h3>Crear Rol:</h3>
                    <div class="mb-3">
                        <form action="../../controllers/marcaDispositivoController.php?c=1" method="POST">
                            <div class="input-group ">
                                <div class="input-group mb-3">
                                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese una nueva marca" required>
                                    <button class="btn btn-primary" type="submit" id="btn_guardar">Guardar</button>
                                    <a class="btn btn-warning" onclick="editar()" id="btn_editar">Editar</a>
                                    <a class="btn btn-danger" onclick="borrar()">Cancelar</a>

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
                            <th scope="col">marca</th>
                            <th scope="col" colspan="2">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            if ($marca) {
                                $pos = 1;
                                foreach ($marca as $marca) {

                            ?>
                        <tr>
                            <td><?= $pos ?></td>
                            <td>
                                <span id="id_marca<?= $marca->getId() ?>"> <?= $marca->getMarca() ?> </span>
                            </td>
                            <td>
                            <td>
                                <a class="btn btn-sm btn-outline-warning" onclick="show(<?= $marca-> getId()  ?>)">
                                    <i class="bi bi-pencil-square" style="font-size: 1.4rem;"></i>
                                </a>
                                <a class="btn btn-sm btn-outline-danger" href="../../controllers/marcaDispositivoController.php?c=4&id_marca=<?= $rol-> getId() ?>">
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
    document.addEventListener("DOMContentLoaded", () => {
        var btn_editar = document.getElementById("btn_editar");
        btn_editar.hidden = true;
    });

    function show(id_marca) {
        var btn_editar = document.getElementById("btn_guardar");
        btn_editar.hidden = true;

        var btn_editar = document.getElementById("btn_editar");
        btn_editar.hidden = false;

        let elemento = document.getElementById(`id_marca${id_marca}`);
        let documento = elemento.textContent

        document.getElementById('nombre').value = documento
        document.getElementById('nombre').setAttribute('data-id', id_marca);
    }

    function editar() {

        let elemento = document.getElementById("nombre");
        let id_marca = elemento.dataset.id
        let nombre = elemento.value

        axios.post(`../../controllers/marcaDispositivoController.php?c=3&id_marca=${id_marca}&nombre=${nombre}`)
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