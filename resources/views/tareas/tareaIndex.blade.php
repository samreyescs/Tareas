@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Listado de tareas</div>

                <div class="card-body">
                <a href="{{action('TareaController@create')}}" class="btn btn-success btn-sm">Nueva tarea</a>
                    <hr>
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Tarea</th>
                            <th>Descripción</th>
                        </tr>

                        @foreach ($tareas as $tarea)
                            <tr>
                                <td>{{ $tarea->id }}</td>
                                <td>
                                    <a href="{{ route('tarea.show', $tarea->id)}}" > {{$tarea->tarea }} </a>
                                </td>
                                <td>{{ $tarea->descripcion }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
