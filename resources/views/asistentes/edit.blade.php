@extends('layout')
@section('content')
<h1 class="display-4 text-center">Edición de asistentes</h1>
<hr>
@include('partials/errors')
<form method="POST" action="{{ route('asistentes.update', ['asistentes' => $asistente->id]) }}" class="form">
  {!! csrf_field() !!}
  <div class="form-group row">
    <label for="nombre" class="col-lg-3 col-form-label form-control-label field-label-responsive lead">Nombre</label>
    <div class="col-lg-7">
        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="nombre del asistente" value="{{ $asistente->nombre}}" required>
    </div>
  </div>
    <div class="form-group row">
      <label for="apellido" class="col-lg-3 col-form-label form-control-label field-label-responsive lead">Apellido</label>
      <div class="col-lg-7">
        <input type="text" name="apellido" id="apellido" class="form-control" placeholder="apellido del asistente" value="{{ $asistente->apellido }}" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="documento" class="col-lg-3 col-form-label form-control-label field-label-responsive lead">Documento</label>
      <div class="col-lg-7">
        <input type="text" name="documento" id="documento" class="form-control" placeholder="documento del asistente" value="{{ $asistente->documento }}" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="email" class="col-lg-3 col-form-label form-control-label field-label-responsive lead">Email</label>
      <div class="col-lg-7">
        <input type="email" name="email" id="email" class="form-control" placeholder="email@ejemplo.com" value="{{ $asistente->contacto->email }}" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="telefono" class="col-lg-3 col-form-label form-control-label field-label-responsive lead">Teléfono</label>
      <div class="col-lg-7">
        <input type="tel" name="telefono" id="telefono" class="form-control" placeholder="telefono" value="{{ $asistente->contacto->telefono }}">
      </div>
    </div>
    <div class="form-group" style="text-align: center;">
      <a href="{{ url('asistentes') }}" class="btn btn-secondary">Cancelar</a>
      <button type="submit" class="btn btn-primary">Editar asistente</button>
    </div>
  </form>
  @endsection