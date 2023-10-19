<div class="col-md-6">
    <div class="card card-primary">
        <div class="card-body p-0">
            <!-- THE CALENDAR -->
            <div id="calendar"></div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<style>
    /* Estilo General del Calendario */
    #calendar {
        border-radius: 15px;
        box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
    }

    /* Encabezado del Calendario */
    .fc-header-toolbar {
        background: linear-gradient(160deg, #2c3e50, #3498db);
        color: white;
    }

    /* Efecto Hover para Días */
    .fc-day:hover {
        background-color: rgba(52, 152, 219, 0.1);
    }

    /* Efecto Hover para Eventos */
    .fc-event:hover {
        box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
        transform: translateY(-2px);
        transition: all 0.3s;
    }

    /* Estilo para botones y links */
    .btn,
    a {
        border-radius: 20px;
        transition: all 0.3s;
    }

    .btn-primary {
        background: linear-gradient(160deg, #2c3e50, #3498db);
        border: none;
    }

    .btn-primary:hover {
        background: linear-gradient(160deg, #3498db, #2c3e50);
        transform: translateY(-2px);
    }
</style>