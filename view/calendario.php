<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>CALENDARIO GENERAL</h1>
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

        var y = 2022;
        var m = 9;
        var d = 23;

        var calendar = new FullCalendar.Calendar(calendarEl, {
            expandRows: true,
            slotMinTime: '08:00',
            slotMaxTime: '20:00',
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
                alert(arg.event.id);
            },
            events:

                <?php

                echo $xd =  "[
            {
                title: 'All Day Event',
                start: '2022-09-01',
                id: 1
            },
            {
                title: 'Long Event',
                start: '2022-09-07',
                end: '2022-09-10',
                id: 2
            },
            {
                groupId: 999,
                id: 3,
                title: 'Repeating Event',
                start: '2022-09-09T16:00:00'
            },
            {
                groupId: 999,
                id: 4,
                title: 'Repeating Event',
                start: '2022-09-16T16:00:00'
            },
            {
                title: 'Conference',
                start: '2022-09-11',
                end: '2022-09-13'
            },
            {
                title: 'Meeting',
                start: '2022-09-12T10:30:00',
                end: '2022-09-12T12:30:00'
            },
            {
                title: 'Lunch',
                start: '2022-09-12T12:00:00'
            },
            {
                title: 'Meeting',
                start: '2022-09-12T14:30:00'
            },
            {
                title: 'Happy Hour',
                start: '2022-09-12T17:30:00'
            },
            {
                title: 'Dinner',
                start: '2022-09-12T20:00:00'
            },
            {
                title: 'Birthday Party',
                start: '2022-09-13T07:00:00'
            },
            {
                title: 'Click for Google',
                url: 'http://google.com/',
                start: '2022-09-28'
            },
            {
                title          : 'All Day Event',
                start          : new Date(y, m, 1),
                backgroundColor: '#f56954', //red
                borderColor    : '#f56954', //red
                allDay         : true
              },
              {
                title          : 'Long Event',
                start          : new Date(y, m, d - 5),
                end            : new Date(y, m, d - 2),
                backgroundColor: '#f39c12', //yellow
                borderColor    : '#f39c12' //yellow
              },
              {
                title          : 'Meeting',
                start          : new Date(y, m, d, 10, 30),
                allDay         : false,
                backgroundColor: '#0073b7', //Blue
                borderColor    : '#0073b7' //Blue
              },
              {
                title          : 'Lunch',
                start          : new Date(y, m, d, 12, 0),
                end            : new Date(y, m, d, 14, 0),
                allDay         : false,
                backgroundColor: '#00c0ef', //Info (aqua)
                borderColor    : '#00c0ef' //Info (aqua)
              },
              {
                title          : 'Birthday Party',
                start          : new Date(y, m, d + 1, 19, 0),
                end            : new Date(y, m, d + 1, 22, 30),
                allDay         : false,
                backgroundColor: '#00a65a', //Success (green)
                borderColor    : '#00a65a' //Success (green)
              },
              {
                title          : 'Click for Google',
                start          : new Date(y, m, 28),
                end            : new Date(y, m, 29),
                url            : 'https://www.google.com/',
                backgroundColor: '#3c8dbc', //Primary (light-blue)
                borderColor    : '#3c8dbc' //Primary (light-blue)
              }
        ]";


                ?>

        });

        calendar.render();
    });
</script>