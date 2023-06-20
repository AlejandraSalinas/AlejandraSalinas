<?php require_once dirname(__FILE__) . '../../../../Config/config.php'; ?>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsuarios" aria-expanded="true" aria-controls="collapseUsuarios">
        <i class="bi bi-people-fill" style="font-size: 1.4rem;"></i>
    <span>Usuarios</span>
    </a>
    <div id="collapseUsuarios" class="collapse" aria-labelledby="headingUsuarios" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Opciones:</h6>
            <a class="collapse-item" href="<?php constant('URL') ?>../../Views/usuarios/crear.php">Crear</a>
            <a class="collapse-item" href="<?php constant('URL') ?>../../Views/usuarios/index.php">Ver</a>
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDispositivos" aria-expanded="true" aria-controls="collapseDispositivos">
        <i class="bi bi-pc-display" style="font-size: 1.4rem;"></i>
        <span>Dispositivos</span>
    </a>
    <div id="collapseDispositivos" class="collapse" aria-labelledby="headingDispositivos" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Opciones:</h6>
            <a class="collapse-item" href="<?php constant('URL') ?>../../Views/dispositivos/menuDispositivo.php">Ingreso/Egreso</a>
            <a class="collapse-item" href="<?php constant('URL') ?>../../Views/dispositivos/index.php">Ver</a>
            <a class="collapse-item" href="<?php constant('URL') ?>../../Views/dispositivos/crear.php">Crear</a>
        </div>
    </div>
</li>
<hr class="sidebar-divider">

<li class="nav-item">
    <a class="nav-link" href="<?= constant('URL') ?>./Views/config_marca/index.php">
        <i class="bi bi-gear-fill" style="font-size: 1.4rem;"></i>
        <span>Configuración</span>
    </a>
</li>