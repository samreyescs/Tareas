@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detalle de tarea</div>

                <div class="card-body">
                    <a href="{{action('TareaController@index')}}" class="btn btn-primary btn-sm" tabindex="-1" role="button" aria-disabled="true">Regresar</a>
                    <hr>

                    <h2>{{$tarea->tarea}}</h2>
                    <p>{{$tarea->descripcion}}</p>

                    <div class="row">
                        <div class="form-group col-md-6">
                            Prioridad: {{$tarea->prioridad}}

                        </div>
                        <div class="form-group col-md-6">
                            Fecha límite: {{$tarea->fecha_entrega}}
                        </div>
                    </div>


                      {{--<a href="{{action('TareaController@edit', $tarea->id)}}" class="btn btn-warning btn-sm" tabindex="-1" role="button" aria-disabled="true">Editar</a>--}}

                      <hr>
                      <form action="{{route('tarea.destroy', $tarea->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{action('TareaController@edit', $tarea->id)}}" class="btn btn-warning btn-sm" tabindex="-1" role="button" aria-disabled="true">Editar</a>
                        <button type="submit" class="btn btn-danger btn-sm">Borrar</button>
                      </form>


                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
