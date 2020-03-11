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

                    <a href="{{action('TareaController@index')}}" class="btn btn-primary btn-sm" tabindex="-1" role="button" aria-disabled="true">Regresar</a>
                    <hr>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(isset($tarea))
                    {{--<form action="{{ action('TareaController@update', $tarea->id) }}" method="POST">
                        @method('PATCH')--}}
                    {!! Form::model($tarea, ['route' => ['tarea.update', $tarea->id], 'method' => 'PATCH']) !!}
                @else
                    {{-- <form action="{{ action('TareaController@store') }}" method="POST"> --}}
                    {!! Form::open(['route' => 'tarea.store']) !!}
                @endif

               {{-- <form action="{{ action('TareaController@store') }}" method="POST"> {{-- route('tarea.store')  --}}
                    {{--@csrf--}}
                        <div class="form-group">
                          {{--<label for="tarea">Tarea</label>--}}
                          {!! Form::label('tarea', 'Tarea') !!} {{-- opcional --}}
                          {{--<input type="text" class="form-control" name="tarea" placeholder="Título de tarea..." value="{{$tarea->tarea ?? ''}}" required>--}}
                          {!! Form::text('tarea', null, ['class' => 'form-control', 'id' => 'tarea', 'placeholder' => 'Título de tarea...', 'required']) !!}
                        </div>

                        <div class="form-group">
                          <label for="descripcion">Descripción</label>
                          {{--<textarea class="form-control" name="descripcion" rows="3" placeholder="Detalles de la tarea...">{{$tarea->descripcion ?? ''}}</textarea>--}}
                          {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'rows' => '3', 'placeholder' => 'Detalles de la tarea...']) !!}
                        </div>


                        <div class="form-row">
                          <div class="form-group col-md-4">
                            <label for="prioridad">Prioridad</label>
                            {{--<select name="prioridad" class="form-control">
                              <option value="1" value="{{isset($tarea) && $tarea->prioridad == 1 ? 'selected' : ''}}">Baja</option>
                              <option value="2" value="{{isset($tarea) &&$tarea->prioridad == 2 ? 'selected' : ''}}">Media</option>
                              <option value="3" value="{{isset($tarea) &&$tarea->prioridad == 3 ? 'selected' : ''}}">Alta</option>
                            </select>--}}
                            {!! Form::select('prioridad', ['1'  => 'Baja', '2' => 'Media', '3' => 'Alta'], null, ['class' => 'form-control']) !!}
                          </div>
                          <div class="form-group col-md-4">
                            <label for="categoria_id">Categoria</label>
                            {!! Form::select('categoria_id', $categorias, null, ['class' => 'form-control']) !!}
                          </div>
                          <div class="form-group col-md-4">
                            <label for="fecha_entrega">Fecha límite</label>
                            {{--<input type="date" class="form-control" name="fecha_entrega" value="{{$tarea->fecha_entrega ?? ''}}">--}}
                            {!! Form::date('fecha_entrega', null, ['class' => 'form-control']) !!}
                          </div>
                        </div>

                        {{--<button type="submit" class="btn btn-primary btn-sm">Guardar</button>--}}
                        {!! Form::submit('Guardar', ['class' => 'btn btn-primary btn-sm']) !!}
                        {{--<button type="reset" class="btn btn-primary btn-sm">Borrar</button>--}}
                        {!! Form::reset('Limpiar', ['class' => 'btn btn-danger btn-sm']) !!}

                      {{--</form>--}}
                      {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
