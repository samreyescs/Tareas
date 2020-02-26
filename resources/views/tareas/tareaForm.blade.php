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

                <form action="{{ action('TareaController@store') }}" method="POST"> {{-- route('tarea.store')  --}}
                    @csrf
                        <div class="form-group">
                          <label for="tarea">Tarea</label>
                          <input type="text" class="form-control" name="tarea" placeholder="Título de tarea..." required>
                        </div>

                        <div class="form-group">
                          <label for="descripcion">Descripción</label>
                          <textarea class="form-control" name="descripcion" rows="3" placeholder="Detalles de la tarea..."></textarea>
                        </div>

                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="prioridad">Prioridad</label>
                            <select name="prioridad" class="form-control">
                              <option selected>Selecciona...</option>
                              <option value="1">Baja</option>
                              <option value="2">Media</option>
                              <option value="3">Alta</option>
                            </select>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="fecha_entrega">Fecha límite</label>
                            <input type="date" class="form-control" name="fecha_entrega">
                          </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-sm">Enviar</button>
                        <button type="reset" class="btn btn-primary btn-sm">Limpiar</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
