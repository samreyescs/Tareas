@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Vista Prueba</div>

                <div class="card-body">
                    Hola
                    {{ $info }}
                    <br><a class="btn btn-success">Esto es un botón</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
