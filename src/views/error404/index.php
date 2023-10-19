<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CORRECIE v1.0 | Error 404</title>

  <link rel="shortcut icon" href="public/dist/img/CIEG-Logo.png" type="image/x-icon">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="public/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="public/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php
            include __DIR__ . '/../includes/navbar.php';
            include  __DIR__ . '/../includes/menu.php';
        ?>

          <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php
      include  __DIR__ . '/../includes/header.php'
    ?>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="error-page">
        <h2 class="headline text-warning"> 404</h2>

        <div class="error-content">
          <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Pagina no responde.</h3>

          <p>
            No pudimos encontrar la página que estabas buscando.
            Mientras tanto, puedes <a href="inicio">regresar al inicio</a> o intenta usar el formulario de búsqueda.
          </p>

        <form class="search-form" action="https://www.google.com/search" method="get">
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search">
            <div class="input-group-append">
                <button type="submit" name="submit" class="btn btn-warning">
                            <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
        <!-- /.input-group -->
        </form>

        </div>
        <!-- /.error-content -->
      </div>
      <!-- /.error-page -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
      include  __DIR__ . '/../includes/footer.php'
    ?>
</div>

<!-- jQuery -->
<script src="public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="public/dist/js/adminlte.min.js"></script>

    </div>
</body>