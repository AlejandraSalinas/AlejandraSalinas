<?php
// include_once(__DIR__ . "../../../config/config.php");
// include_once('../../Views/Main/partials/aside.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<link href="../../Public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link href="../../Public/css/sb-admin-2.min.css" rel="stylesheet">

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../../Main/index.php">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Registro y Control</div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Menu Principal</span>
        </a>
    </li>

   <!-- NOTA LLAMAR AL HEADER Y A footer -->

    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<script src="../../Public/vendor/jquery/jquery.min.js"></script>
<script src="../../Public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../Public/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../../Public/js/sb-admin-2.min.js"></script>
</body>
</html>
<?php
include_once('../../views/main/partials/footer.php');
?>