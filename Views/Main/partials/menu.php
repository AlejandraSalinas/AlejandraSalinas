<?php require_once dirname(__FILE__) . '../../../../Config/config.php'; ?>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsuarios" aria-expanded="true" aria-controls="collapseUsuarios">
        <i class="bi bi-people-fill" style="font-size: 1.4rem;"></i>
    <span>Usuarios</span>
    </a>
    <div id="collapseUsuarios" class="collapse" aria-labelledby="headingUsuarios" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Opciones:</h6>
            <a class="collapse-item" href="<?php constant('URL') ?>../../Views/usuarios/index.php">Ver</a>
            <a class="collapse-item" href="<?php constant('URL') ?>../../Views/usuarios/crear.php">Crear</a>
        </div>
    </div>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="bi bi-pc-display" style="font-size: 1.4rem;"></i>
        <span>Dispositivos</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Opciones:</h6>
            <a class="collapse-item" href="<?php constant('URL') ?>../../Views/dispositivos/index.php">Ver</a>
            <a class="collapse-item" href="<?php constant('URL') ?>../../Views/dispositivos/crear.php">Crear</a>
        </div>
    </div>
</li>
<hr class="sidebar-divider">
<li class="nav-item">
    <a class="nav-link" href="<?= constant('URL') ?>./Views/administrador/crear.php">
        <i class="bi bi-person-gear" style="font-size: 1.4rem;"></i>
        <span>Administrador</span>
    </a>
</li>
<hr class="sidebar-divider">
<li class="nav-item">
    <a class="nav-link" href="<?= constant('URL') ?>./Views/tipoIdentificacion/index.php">
        <i class="bi bi-gear-fill" style="font-size: 1.4rem;"></i>
        <span>Configuración</span>
    </a>
</li>