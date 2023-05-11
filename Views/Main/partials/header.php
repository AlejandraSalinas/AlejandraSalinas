<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registro y Control</title>

    <link href="../../Public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../../Public/css/sb-admin-2.min.css" rel="stylesheet">

</head>
<body id="page-top" >
    <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">
            <?php 
                include_once("../../Views/Main/index.php");
            ?> 
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <h1>Bienvenidos</h1>
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Pepito Perez - admi</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                        
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>   
        </div>   
    </div>       
<!-- Bootstrap core JavaScript-->
<script src="../../Public/vendor/jquery/jquery.min.js"></script>
<!-- <script src="../../Public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

<!-- Core plugin JavaScript-->
<!-- <script src="../../Public/vendor/jquery-easing/jquery.easing.min.js"></script> -->

<!-- Custom scripts for all pages-->
<!-- <script src="../../Public/js/sb-admin-2.min.js"></script> -->
