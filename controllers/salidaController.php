<?php

    if (!empty($_POST)["fecha_salida"])) {
        if (!empty($_POST["ndit"])) {
            $numero_identificacion = $_POST["ndit"];
            $consulta = $conexion -> query("$numero_identificacion");
            $id = $conexion =query("$numero_identificacion");

            if ($consulta -> fetch_object() -> id_persona);
            $fecha = date("Y-m-d h-i-s");
            $id_persona = $busqueda ->fetch_object() -> id_persona;
            $busqueda = $conexion -> query("$id_persona");
            $id_ingresar = $busqueda -> fetch_object() -> $id_ingresar;
            $sql = $conexion -> query("$fecha $id_ingresar");
            
                if ($sql == true) { ?>
                    <script>
                        $(function notificacion(){
                            new PNotify({
                                title: "Correcto",
                                type: "error",
                                text:"Salida registrada",
                            })
                        })
                    </script>
                <?php }else{ ?>
                    <script>
                        $(function notificacion(){
                            new PNotify({
                                title: "Incorrecto",
                                type: "error",
                                text:"Error al registrar la salida",
                            })
                        })
                    </script>
                    <?php }
            } else { ?>
                <script>
                    $(function notificacion(){
                        new PNotify({
                            title: "Incorrecto",
                            type: "error",
                            text:"El número de identificación no exixte",
                        })
                    })
                </script>
            <?php } 
        } else { ?>
            <script>
                $(function notificacion(){
                    new PNotify({
                        title: "Incorrecto",
                        type: "error",
                        text:"Ingrese el número de identificación",
                    })
                })
            </script>
        <?php } ?>
        <script>
            setTimeout(() => {
                window.history.replaceState(null, null, window.location.pathnase);
            }, 0);
        </script>
    
          