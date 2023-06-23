<?php
    require_once dirname(__FILE__) . '../../../config/config.php';
    include_once '../../Config/config.php';
    include_once('../../Views/Main/partials/header.php'); 
     include "../../models/dataBaseModel.php"

    ?>


 
<div class="container-fluid">
                    <p class="txtdni">Ingrese su número de identificación</p>
                    <form action="  ../../../../controllers/ingresoController.php" method="POST">
                        <div class="col-6 mb-3">
                            <input type="number" placeholder="Número de identificación" class="form-control" id="numero_identificacion" name="numero_identificacion">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary mb-3" name="fecha_entrada" id="fecha_entrada">Entrada</button>
                            <?php 
                            date_default_timezone_set("America/Bogota");
                            echo date ("h:i a - d-m-Y")
                            ?> 

                            <br>
                            <h2>Click</h2>
<form action="" method="POST">
    <button name="click" class="click">Click me!</button>
</form>

<?php
if(isset($_POST['click']))
{
    $date_clicked = date('Y-m-d H:i:s');;
    echo "Time the button was clicked: " . $date_clicked . "<br>";
}
?>
                            

                            <button type="submit" class="btn btn-primary mb-3" name="fecha_salida" id="fecha_salida">Salida</button>
<br>

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