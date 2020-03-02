@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detalle de tarea</div>

                <div class="card-body">

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

                      <a href="{{action('TareaController@index')}}" class="btn btn-primary btn-sm" tabindex="-1" role="button" aria-disabled="true">Regresar</a>
                      <a href="{{action('TareaController@edit', $tarea->id)}}" class="btn btn-warning btn-sm" tabindex="-1" role="button" aria-disabled="true">Editar</a>

                      <hr>
                      <form action="{{route('tarea.destroy', $tarea->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Borrar</button>
                      </form>


                    {{--
                        <br> <br>
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <th>Tarea</th>
                                <th>Descripción</th>
                            </tr>
                            <tr>
                                <td>{{ $tarea->id }}</td>
                                <td>
                                    <a href="{{ route('tarea.show', $tarea->id)}}">{{$tarea->tarea }} </a>
                                </td>
                                <td>{{ $tarea->descripcion }}</td>
                            </tr>
                        </table>

                        <a href="{{action('TareaController@index')}}" class="btn btn-primary btn-sm" tabindex="-1" role="button" aria-disabled="true">Regresar</a>
                          <a href="{{action('TareaController@edit', $tarea->id)}}" class="btn btn-warning btn-sm" tabindex="-1" role="button" aria-disabled="true">Editar</a>

                          <hr>
                          <form action="{{route('tarea.destroy', $tarea->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Borrar</button>
                          </form
                        --}}

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
