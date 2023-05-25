<?php
// include_once(__FILE__ . "../../../config/config.example.php");
// include_once('../../views/main/partials/header.php');
// require_once '../../models/RolesModel.php';

$datos_rol  = new RolesModel();
$data  = $datos_rol->getAll();

foreach ($registros as $rol) {
    $id_rol     = $rol->getId();
    $nombre = $rol->getRoles();
}
?>

<div class="container-fluid">
    <div class="container text-center">
        <h1 class="h3 mb-4 text-gray-800">Configuración Del Sistema</h1>
        <hr>
        <?php include_once('../../views/main/partials/menu.php'); ?>
        <hr>
        <h1 class="h3 mb-4 text-gray-800 text-left">Departamentos
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                <i class="bi bi-plus-circle-fill" style="font-size: 1.5rem; "></i>
            </button>
        </h1>
        <div class="row">
            <div class="col">
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        <div class="mb-3">
                            <form action="../../controller/ciudadController.php" method="POST">
                                <input type="hidden" name="c" value="1">
                                <div class="input-group ">
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese un nuevo nuevo departamento">
                                    <button type="submit" class="btn btn-outline-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="bi bi-send-plus-fill" style="font-size: 1.0rem; "></i>
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <!-- Actualizacion de registro-->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Actualizar Registro </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="input-group ">
                                    <input type="text" class="form-control" id="nombre_actualizado" name="nombre">
                                </div>
                                <div class="modal-footer">
                                    <a class="btn btn-sm btn-outline-success" data-bs-dismiss="modal" onclick="recarga(<?= $ciudades->getId() ?>)">Actualizar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Departemento</th>
                            <th scope="col" colspan="2">opciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($registros) {
                            $pos = 1;
                            foreach ($registros as $ciudades) {
                        ?>
                                <tr>
                                    <td><?= $pos ?></td>
                                    <td>
                                        <span id="ciudad_<?= $ciudades->getId() ?>"> <?= $ciudades->getCiudad() ?> </span>
                                    </td>
                                    <td>
                                        <a type="button" class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="id_ciudad_<?= $ciudades->getId()?>" onclick="update (<?= $ciudades->getId()?>)">Actualizar</a>
                                        <a type="button" class="btn btn-sm btn-outline-danger" href="../../controller/ciudadController.php?c=4&id_ciudad=<?= $ciudades->getId() ?>">Eliminar</a>

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

                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>
<script>
    function update(id){
        let elemento=document.getElementById(`ciudad_${id}`)
        let nombre = elemento.textContent
        
        document.getElementById('nombre_actualizado').value = nombre
        
    }
    
    function recarga(id){
        let elemento = document.getElementById("nombre_actualizado")
        let nombre  = elemento.value
 
        axios.post(`../../controller/ciudadController.php?c=3&id_ciudad=${id}&nombre=${nombre}`)
        .then(function(response){
            window.location.reload()
        })
        .catch(function(error){
            console.log(error);
        });
    }

</script>
<!-- /.container-fluid -->

<?php
include_once('../../views/main/partials/footer.php');
?>