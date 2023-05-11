<link href="../../Public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link href="../../Public/css/sb-admin-2.min.css" rel="stylesheet">

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
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

    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePersonas" aria-expanded="true" aria-controls="collapsePersonas">
            <i class="fas fa-fw fa-cog"></i>
            <span>Personas</span>
        </a>
        <div id="collapsePersonas" class="collapse" aria-labelledby="headingpersonas" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Personas:</h6>
                <a class="collapse-item" href="#">Actualizar Usuario</a>
                <a class="collapse-item" href="#">Ver Usuario</a>

            </div>
        </div>
    </li>
  
    
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Admin</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Opciones:</h6>
                <a class="collapse-item" href="../iniciar_sesion_admin/index.php">Administrador</a>
                <!-- <a class="collapse-item" href="../crear_contraseña_admin/index.php">Contraseña Administrador</a> -->
                <a class="collapse-item" href="../iniciar_sesion_vigilante/index.php">Vigilante</a>
                <a class="collapse-item" href="../iniciar_sesion_supervisor/index.php">Supervisor</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<script src="../../Public/vendor/jquery/jquery.min.js"></script>
<script src="../../Public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../Public/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../../Public/js/sb-admin-2.min.js"></script>