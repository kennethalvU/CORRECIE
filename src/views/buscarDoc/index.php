<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CORRECIE v1.0 | Busqueda de Documentos</title>

    <link rel="shortcut icon" href="public/dist/img/CIEG-Logo.png" type="image/x-icon">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="public/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="public/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="public/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="public/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="public/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php
        include __DIR__ . '/../includes/navbar.php';
        include __DIR__ . '/../includes/menu.php';
        ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <?php
            include __DIR__ . '/../includes/header.php'
                ?>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <section class="content">
                                    <div class="container-fluid">
                                        <h2 class="text-center display-4">Buscador de Documentos</h2>
                                        <?php
                                        include 'modulos/buscador.php';
                                        include 'modulos/tabla.php';
                                        ?>
                                    </div>
                                </section>
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php
        include __DIR__ . '/../includes/footer.php'
            ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="public/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="public/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="public/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="public/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="public/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="public/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="public/plugins/jszip/jszip.min.js"></script>
    <script src="public/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="public/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="public/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="public/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="public/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="public/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="public/dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
        $(function () {
            var table = $("#tablaDocs").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "dom": 'Blrtip', 
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
                }
            });

            table.buttons().container().appendTo('#tablaDocs_wrapper .col-md-6:eq(0)');

            // Evento para realizar la búsqueda
            $('#searchBox').on('keyup', function() {
                table.search(this.value).draw();
            });
        });
    </script>
</body>

</html>