<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>CALENDARIO DE ACTIVIDADES DE MANTENIMIENTO</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-body p-0">
                            <!-- THE CALENDAR -->
                            <div id="calendar"></div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
    $(document).ready(function() {

        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            expandRows: true,
            slotMinTime: '06:00',
            slotMaxTime: '23:00',
            themeSystem: 'bootstrap',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
            },
            initialView: 'dayGridMonth',
            navLinks: true, // can click day/week names to navigate views
            editable: true,
            // selectable: true, para crear espacios en el calendario
            nowIndicator: true,
            dayMaxEvents: true, // allow "more" link when too many events
            select: function(arg) {
                var title = prompt('Event Title:');
                if (title) {
                    calendar.addEvent({
                        title: title,
                        start: arg.start,
                        end: arg.end,
                        allDay: arg.allDay,
                        id: arg.id
                    })
                }
                calendar.unselect()
            },
            eventClick: function(arg) {

                // PARA MANDAR MENSAJE AL HACER CLICK
                alert(arg.event.id);

            },
            events:

                <?php

                include("accion/coneccion.php");

                $query = "SELECT 
                ordentrabajo.idorden,
                procedimiento.idprocedimiento,
                procedimiento.nombre,
                replace(ordentrabajo.inicio,' ','T'),
                replace(ordentrabajo.final,' ','T'),
                procedimiento.idtrabajador,
                concat(m_trabajador.t_apelllido, ', ',m_trabajador.t_nombre),
                prioridad.nombre,
                prioridad.color,
                if(ordentrabajo.estado = 1,'Abierto','Cerrado')
                FROM 
                ((ordentrabajo inner join procedimiento on ordentrabajo.idprocedimiento = procedimiento.idprocedimiento)
                inner join m_trabajador on m_trabajador.t_dni = procedimiento.idtrabajador)
                inner join prioridad on ordentrabajo.idprioridad = prioridad.idprioridad;";

                $rs = mysqli_query($con, $query);

                $rows = array();

                while ($row = mysqli_fetch_row($rs)) {
                    $rows[] = $row;
                }
                $fechas = "[";
                foreach ($rows as $row) {
                    $fechas = $fechas . "
                    {
                        id             :  $row[0],
                        idprocedimiento: '$row[1]',
                        title          : '$row[2]',
                        start          : '$row[3]',
                        end            : '$row[4]',
                        idtrabajador   : '$row[5]',
                        nombretrab     : '$row[6]',
                        prioridad      : '$row[7]',
                        backgroundColor: '$row[8]',
                        borderColor    : '$row[8]',
                        estado         : '$row[9]'
                      },";
                }

                $fechas = $fechas . "]";

                echo $fechas;

                ?>

        });

        calendar.render();

        

    });
</script>