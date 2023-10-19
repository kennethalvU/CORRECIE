<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="public/dist/img/CIEG-Logo.png" alt="sisCIEG Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
    <span class="brand-text font-weight-light">CORRECIE v1.0</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="public/dist/img/avatar.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?php echo $_SESSION['nombre']; ?></a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Buscar" aria-label="Buscar">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="inicio" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>
              Inicio
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-file"></i>
            <p>
              Documentos
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="buscarDoc" class="nav-link">
                <i class="fas fa-search nav-icon"></i>
                <p>Buscar Documento</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="subirDoc" class="nav-link">
                <i class="fas fa-file-upload nav-icon"></i>
                <p>Subir Documento</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="buscarDoc" class="nav-link">
                <i class="fas fa-file nav-icon"></i>
                <p>Mis Documentos</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fas fa-history nav-icon"></i>
                <p>Versiones de Documentos </p>
              </a>
            </li>
          </ul>
        </li>
        <?php if ($_SESSION['id_rol'] == 2) { ?>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Gestión de Usuarios
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="listaUsuarios" class="nav-link">
                <i class="fas fa-users nav-icon"></i>
                <p>Listado de Usuarios</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="addUsuario" class="nav-link">
                <i class="fas fa-user-plus nav-icon"></i>
                <p>Añadir Nuevo Usuario</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-sitemap"></i>
            <p>
              Gestión de Departamentos
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="listaDepartamentos" class="nav-link">
                <i class="fas fa-building nav-icon"></i>
                <p>Listado de Departamentos</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="addDepartamento" class="nav-link">
                <i class="fas fa-plus-square nav-icon"></i>
                <p>Añadir Nuevo Departamento</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fas fa-info-circle nav-icon"></i>
                <p>Asignación de Documentos a Departamentos</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-shield-alt"></i>
            <p>
              Roles y Permisos
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="" class="nav-link">
                <i class="fas fa-users-cog nav-icon"></i>
                <p>Listado de Roles</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fas fa-check-circle nav-icon"></i>
                <p>Asignación de Permisos</p>
              </a>
            </li>
          </ul>
        </li>
        <?php } ?>
        <li class="nav-item">
          <a href="pages/gallery.html" class="nav-link">
            <i class="nav-icon fas fa-cogs"></i>
            <p>
              Configuraciones
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>