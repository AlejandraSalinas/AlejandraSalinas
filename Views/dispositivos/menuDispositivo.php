<?php
    require_once dirname(__FILE__) . '../../../config/config.php';
    include_once '../../Config/config.php';
    include_once('../../Views/Main/partials/header.php'); 
     include "../../models/dataBaseModel.php"

     ?>
     <?php 
     date_default_timezone_set("America/Bogota");
     echo date ("h:i a - d-m-Y")
     ?> 
    <div class="container-fluid">
    <p class="txtdni">Ingrese su número de identificación</p>
    <form action="  ../../../../controllers/ingresoController.php" method="POST">
    <!-- <div class="col-6 mb-3">
        <input type="number" placeholder="Número de identificación" class="form-control" id="numero_identificacion" name="numero_identificacion">
    </div> -->
    <!-- <div class="mb-3">
        <button type="submit" class="btn btn-primary mb-3" name="fecha_entrada" id="fecha_entrada">Entrada</button>
                            <button type="submit" class="btn btn-primary mb-3" name="fecha_salida" id="fecha_salida">Salida</button>
<br> -->
    <label>Entrada: <br> <input type="datetime" name="fecha_entrada" value="<?php= $fecha_entrada?>"></label>
        <input type="submit" name="ingresar" value="ingressar">



        <?php
if (isset($_REQUEST['ingresar'])){
    $fecha $_POST['fecha'];
    $consulta ="INSERT INTO fecha (fecha_entada) VALUES ('$fecha')";
    $ejecutar =
}
?>
                            <button>
                            <a class="collapse-item" href="<?php constant('URL') ?>../../Views/ingreso/index.php">Visualizar Datos De Ingreso/egreso</a>
                            </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </body>

    </html>
    
    <?php require_once('../Main/partials/footer.php'); ?>
</div>