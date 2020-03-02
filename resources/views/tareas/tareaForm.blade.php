@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear nueva tarea</div>

                <div class="card-body">
                    {{-- No user_id, categoria_id, equipo_id--}}
                    {{-- <hr> --}
                    {{-- Mostrar formulario --}}

                @if(isset($tarea))
                    <form action="{{ action('TareaController@update', $tarea->id) }}" method="POST">
                        @method('PATCH')
                @else
                    <form action="{{ action('TareaController@store') }}" method="POST">
                @endif

               {{-- <form action="{{ action('TareaController@store') }}" method="POST"> {{-- route('tarea.store')  --}}
                    @csrf
                        <div class="form-group">
                          <label for="tarea">Tarea</label>
                          <input type="text" class="form-control" name="tarea" placeholder="Título de tarea..." value="{{$tarea->tarea ?? ''}}" required>
                        </div>

                        <div class="form-group">
                          <label for="descripcion">Descripción</label>
                          <textarea class="form-control" name="descripcion" rows="3" placeholder="Detalles de la tarea...">{{$tarea->descripcion ?? ''}}</textarea>
                        </div>

                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="prioridad">Prioridad</label>
                            <select name="prioridad" class="form-control">
                              <option value="1" value="{{isset($tarea) && $tarea->prioridad == 1 ? 'selected' : ''}}">Baja</option>
                              <option value="2" value="{{isset($tarea) &&$tarea->prioridad == 2 ? 'selected' : ''}}">Media</option>
                              <option value="3" value="{{isset($tarea) &&$tarea->prioridad == 3 ? 'selected' : ''}}">Alta</option>
                            </select>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="fecha_entrega">Fecha límite</label>
                            <input type="date" class="form-control" name="fecha_entrega" value="{{$tarea->fecha_entrega ?? ''}}">
                          </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-sm">Guardar</button>
                        <button type="reset" class="btn btn-primary btn-sm">Borrar</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
