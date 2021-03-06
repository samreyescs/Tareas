@extends('layouts.tema')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Listado de tareas</div>

                <div class="card-body">
                <a href="{{action('TareaController@create')}}" class="btn btn-primary btn-sm">Nueva tarea</a>
                    {{--- <hr> ---}}
                    <br> <br>
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Tarea</th>
                            <th>Descripción</th>
                            <th>Categoria</th>
                            <th>Usuario</th>
                        </tr>

                        @foreach ($tareas as $tarea)
                        <tr>
                            <td>{{ $tarea->id }}</td>
                            <td>
                                <a href="{{ route('tarea.show', $tarea->id) }}"> {{ $tarea->tarea }} </a>
                            </td>
                            <td>{{ $tarea->descripcion }}</td>
                            <td>{{ $tarea->categoria->nombre }}</td>
                            <td>
                                {{ $tarea->user->name }} <br>
                                {{ $tarea->user->email }}
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
