@extends('layout')
@section('content')
<h1 class="display-4 text-center">Detalle del asistente</h1>
<hr>
<div class="card">
    <h3 class="card-header">{{ $asistente->apellido}}, {{ $asistente->nombre}}.</h3>
    <div class="card-block">
        <br>
        <div class="container">
            <div class="row">
                <label class="col-lg-3 col-form-label form-control-label field-label-responsive lead">Documento</label>
                <div class="col-lg-7">
                    <input type="email" class="form-control" value="{{ $asistente->documento }}" readonly>
                </div>
            </div>
            <div class="row">
                <label class="col-lg-3 col-form-label form-control-label field-label-responsive lead">Email</label>
                <div class="col-lg-7">
                    <input type="email" class="form-control" value="{{ $asistente->contacto->email }}" readonly>
                </div>
            </div>
            <div class="row">
                <label class="col-lg-3 col-form-label form-control-label field-label-responsive lead">Teléfono</label>
                <div class="col-lg-7">
                    <input type="tel" class="form-control" value="{{ $asistente->contacto->telefono }}" readonly>
                </div>
            </div>
        </div>
    </div>
    <br>
    <form name="myform" action="{{ route('asistentes.delete', ['asistentes' => $asistente->id]) }}" method="post">
        {!! csrf_field() !!}
        <div class="form-group" style="text-align: center;">
            <a href="{{ url('asistentes') }}" class="btn btn-secondary">Volver</a>
            <a href="{{ route('asistentes.edit', ['asistentes' => $asistente->id]) }}" class="btn btn-primary">Editar</a>
            <button class="btn btn-danger">Eliminar</button>
        </div>
    </form>
</div>
@endsection