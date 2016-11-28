@include('head',array('titulo'=>$titulo,'subtitulo'=>$subtitulo))
<style>
    .fc-left{
        display:none;
    }

    .fc-center button{
        display:inline-block ;
        float: left ;
    }
    .fc-center h2{
        display: inline-block ;
        float: left ;
    }
</style>
<div id="calendar"></div>
@include('home.calendar.task')
@include('footer')
<script>
   $(document).ready(function(){
       $('#calendar').fullCalendar({

           //  eventSources: ['{{url()}}/carga_eventos'],
           //timezone: 'UTC',
           //default: true,
           contentHeight: 'auto',
           lang: 'es',
           ignoreTimezone:true,
           firstDay:1,
           height: '100%',
           header: {
               center: 'prev,title,next',
               right: 'month,agendaWeek,agendaDay'
           },
           buttonText: {
               day: 'Día',
               month: 'Mes',
               week: 'Semana',
               today : 'Hoy'
           },
           axisFormat: 'HH:mm',
           timeFormat: 'HH:mm',
           eventRender: function(event, element, view,calEvent) {

           },

           dayClick: function(date, jsEvent, view) {
               $('#agregar_tarea').modal();
           },

       });
   });
</script>