<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-lg-12 col-sm-12">
                    <h1>CALENDARIO DE ACTIVIDADES DE MANTENIMIENTO</h1>
                </div>
                <div class="col-lg-5 col-sm-12">
                    <br>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>PRIORIDAD</th>
                                <th>COLOR</th>
                            </tr>
                        </thead>
                        <tbody>



                            <?php
                            $query = "SELECT * FROM prioridad;";

                            $rs = mysqli_query($con, $query);

                            $rows = array();

                            while ($row = mysqli_fetch_row($rs)) {
                                $rows[] = $row;
                            }

                            foreach ($rows as $row) {
                                echo "
                                <tr>
                                <td>
                                    $row[1]
                                </td>
                                <td>
                                    <input type='color' disabled class='form-control form-control-color' value='$row[2]' title='Color de la prioridad'>
                                </td>
                            </tr>
                          ";
                            }
                            ?>
                        </tbody>
                    </table>
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


<!-- Modal Mostrar -->
<div class="modal fade" id="modalMostrar">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">INFORMACION DE LA ACTIVIDAD</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action='accion/imprimirOrden.php' method='post' target='_blank'>
                <div class="modal-body">

                    <div class="row">

                        <div class="col-lg-12 col-sm-12">
                            <div class="form-group">
                                <label for="idImprimir">Nro de Actividad :</label>
                                <input type="text" id="idImprimir" name="idImprimir" readonly class="form-control form-control-border border-width-2">
                            </div>
                        </div>

                        <div class="col-lg-12 col-sm-12">
                            <div class="form-group">
                                <label for="ordentitle">Titulo de la Actividad :</label>
                                <input type="text" id="ordentitle" readonly class="form-control form-control-border border-width-2">
                            </div>
                        </div>

                        <div class="col-lg-12 col-sm-12">
                            <div class="form-group">
                                <label for="ordenstart">Inicio de la Actividad :</label>
                                <input type="text" id="ordenstart" readonly class="form-control form-control-border border-width-2">
                            </div>
                        </div>

                        <div class="col-lg-12 col-sm-12">
                            <div class="form-group">
                                <label for="ordenend">Finalizacion de la Actividad :</label>
                                <input type="text" id="ordenend" readonly class="form-control form-control-border border-width-2">
                            </div>
                        </div>



                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" name="btnOrden">Ir a orden de trabajo</button>
                </div>
            </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

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

                $("#idImprimir").val(arg.event.id);
                $("#ordentitle").val(arg.event.title);
                $("#ordenstart").val(arg.event.start);
                $("#ordenend").val(arg.event.end);

                $("#modalMostrar").modal('show');

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
                inner join prioridad on ordentrabajo.idprioridad = prioridad.idprioridad where ordentrabajo.estado = 1;";

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
                        idproc         : '$row[1]',
                        title          : '$row[2]',
                        start          : '$row[3]',
                        end            : '$row[4]',
                        idtra          : '$row[5]',
                        nombr          : '$row[6]',
                        prior          : '$row[7]',
                        backgroundColor: '$row[8]',
                        borderColor    : '$row[8]',
                        estad          : '$row[9]'
                      },";
                }

                $fechas = $fechas . "]";

                echo $fechas;

                ?>

        });

        calendar.render();

    });
</script>