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


<!-- Modal -->
<div class="modal fade" id="evento" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Datos del evento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form id="formEvento" action="">

                        {{ csrf_field() }}

                        <input type="hidden" name="id" id="id">

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
                            <label for="start">Fecha de inicio</label>
                            <input type="datetime-local" class="form-control" name="start" id="start"
                                aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-muted">Help text</small>
                        </div>

                        <div class="form-group">
                            <label for="end">Fecha de fin</label>
                            <input type="datetime-local" class="form-control" name="end" id="end"
                                aria-describedby="helpId" placeholder="">
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
            displayEventTime: false,

            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth'
            },

            events: {
                url: 'http://127.0.0.1:8000/evento/mostrar',
                failure: function (response) {
                    console.error('Error al cargar eventos:', response);
                }
            },

            dateClick: function (info) {
                formulario.reset();


                const fechaSeleccionada = info.date;


                const fechaHoraLocal = fechaSeleccionada.toISOString().slice(0, 16);


                formulario.start.value = fechaHoraLocal;
                formulario.end.value = fechaHoraLocal;

                $('#evento').modal('show');
            },

            eventClick: function (info) {
                axios.get('http://127.0.0.1:8000/evento/editar/' + info.event.id)
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

            // Obtén las fechas de inicio y fin
            const start = new Date(datos.get('start'));
            const end = new Date(datos.get('end'));

            // Si start y end son iguales, agrega un minuto a end
            if (start.getTime() === end.getTime()) {
                end.setMinutes(end.getMinutes() + 1); // Agrega 1 minuto a end
            }

            // Formatea las fechas en formato local (YYYY-MM-DDTHH:MM)
            const formatDate = (date) => {
                const year = date.getFullYear();
                const month = String(date.getMonth() + 1).padStart(2, '0');
                const day = String(date.getDate()).padStart(2, '0');
                const hours = String(date.getHours()).padStart(2, '0');
                const minutes = String(date.getMinutes()).padStart(2, '0');
                return `${year}-${month}-${day}T${hours}:${minutes}`;
            };

            // Actualiza los valores en el FormData
            datos.set('start', formatDate(start));
            datos.set('end', formatDate(end));

            console.log('Start:', datos.get('start'));
            console.log('End:', datos.get('end'));

            axios.post('http://127.0.0.1:8000/evento/agregar', datos)
                .then(function (response) {
                    $('#evento').modal('hide');
                    calendar.refetchEvents();
                })
                .catch(function (error) {
                    console.error(error);
                    if (error.response) {
                        console.error('Errores de validación:', error.response.data.errors);
                        alert('Error: ' + JSON.stringify(error.response.data.errors));
                    } else {
                        alert('Error al guardar el evento.');
                    }
                });
        });

        document.getElementById('btnEliminar').addEventListener('click', function () {
            const eventoId = formulario.id.value;

            if (!eventoId) {
                alert('No se ha seleccionado un evento para eliminar.');
                return;
            }

            if (!confirm('¿Estás seguro de que deseas eliminar este evento?')) {
                return;
            }

            axios.delete('http://127.0.0.1:8000/evento/eliminar/' + eventoId)
                .then(function (response) {
                    console.log(response.data.message);
                    $('#evento').modal('hide');
                    calendar.refetchEvents();
                })
                .catch(function (error) {
                    console.error(error);
                    alert('Error al eliminar el evento.');
                });
        });

        document.getElementById('btnModificar').addEventListener('click', function () {
            const eventoId = formulario.id.value;

            if (!eventoId) {
                alert('No se ha seleccionado un evento para actualizar.');
                return;
            }

            const datos = {
                title: formulario.title.value,
                start: formulario.start.value,
                end: formulario.end.value,
                descripcion: formulario.descripcion.value,
                _method: 'PUT'
            };

            axios.put('http://127.0.0.1:8000/evento/actualizar/' + eventoId, datos)
                .then(function (response) {
                    console.log(response.data.message);
                    $('#evento').modal('hide');
                    calendar.refetchEvents();
                })
                .catch(function (error) {
                    console.error(error);
                    if (error.response) {

                        alert(error.response.data.message || 'Error al actualizar el evento.');
                    } else {
                        alert('Error de conexión.');
                    }
                });
        });



    });
</script>

@stop