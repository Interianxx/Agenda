@extends('adminlte::page')

@section('title', config('app.name'))

@section('content_header')
<div class="row align-items-center">
    <div class="col-6 d-flex">
        <h1 class="me-auto">Eventos</h1>
    </div>
</div>
@stop

@section('content')
<div class="container-fluid">
    <div id="agenda">
    </div>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#evento">
    Launch
</button>

<!-- Modal -->
<div class="modal fade" id="evento" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form id="formEvento" action="">

                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="id">ID:</label>
                            <input type="text" class="form-control" name="id" id="id" aria-describedby="helpId"
                                placeholder="">
                            <small id="helpId" class="form-text text-muted">Help text</small>
                        </div>

                        <div class="form-group">
                            <label for="title">Titulo</label>
                            <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId"
                                placeholder="Escribe el titulo del evento">
                            <small id="helpId" class="form-text text-muted">Help text</small>
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="start">start</label>
                            <input type="text" class="form-control" name="start" id="start" aria-describedby="helpId"
                                placeholder="">
                            <small id="helpId" class="form-text text-muted">Help text</small>
                        </div>

                        <div class="form-group">
                            <label for="end">end</label>
                            <input type="text" class="form-control" name="end" id="end" aria-describedby="helpId"
                                placeholder="">
                            <small id="helpId" class="form-text text-muted">Help text</small>
                        </div>

                    </form>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btnGuardar">Guardar</button>
                <button type="button" class="btn btn-warning" id="btnModificar">Modificar</button>
                <button type="button" class="btn btn-danger" id="btnEliminar">Eliminar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>

        </div>
    </div>
</div>


@if (session('sessionMessage'))
    <div class="alert alert-success text-center">
        {{ session('sessionMessage') }}
    </div>
@endif
@stop

@section('css')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.css">

@stop

@section('js')

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/locales-all.js"></script>


<script>
    document.addEventListener('DOMContentLoaded', function () {

        let formulario = document.getElementById('formEvento')

        var calendarEl = document.getElementById('agenda');

        if (!calendarEl) {
            console.error("Error: No se encontró el elemento #agenda");
            return;
        }

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: "es",

            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },

            events: {
                url: 'http://127.0.0.1:8000/evento/mostrar', // Ruta evento.mostrar
                failure: function (response) {
                    console.error('Error al cargar eventos:', response);
                }
            },

            dateClick: function (info) {
                formulario.reset();

                formulario.start.value = info.dateStr;
                formulario.end.value = info.dateStr;


                $('#evento').modal('show');
            },

            eventClick: function (info) {
                var evento = info.event;
                console.log(evento);

                axios.get('http://127.0.0.1:8000/evento/editar/' + info.event.id) // Ruta evento.edit
                    .then(function (response) {
                        formulario.id.value = response.data.id;
                        formulario.title.value = response.data.title;
                        formulario.start.value = response.data.start;
                        formulario.end.value = response.data.end;
                        formulario.descripcion.value = response.data.descripcion;

                        $('#evento').modal('show');
                    })
                    .catch(function (error) {
                        console.error(error);
                    });


            }

        });

        calendar.render();

        document.getElementById('btnGuardar').addEventListener('click', function () {
            const datos = new FormData(formulario);

            axios.post('http://127.0.0.1:8000/evento/agregar', datos) // Ruta evento.store
                .then(function (response) {
                    console.log(response);
                    $('#evento').modal('hide');
                    calendar.refetchEvents();
                })
                .catch(function (error) {
                    console.error(error);
                });
        });

    });
</script>

@stop