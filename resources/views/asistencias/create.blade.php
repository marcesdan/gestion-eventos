@extends('layout')
@section('content')
<h1 class="display-4 text-center">Creación de asistentes</h1>
<hr>
@include('partials/errors')
<form method="POST" action="{{ url('asistentes') }}" class="form">
  {!! csrf_field() !!}
  <div class="form-group row">
    <label for="nombre" class="col-lg-3 col-form-label form-control-label field-label-responsive lead">Nombre</label>
    <div class="col-lg-7">
      <input type="text" name="nombre" id="nombre" class="form-control" placeholder="nombre del asistente" value="{{ old('nombre') }}">
    </div>
  </div>
  <div class="form-group row">
    <label for="apellido" class="col-lg-3 col-form-label form-control-label field-label-responsive lead">Apellido</label>
    <div class="col-lg-7">
      <input type="text" name="apellido" id="apellido" class="form-control" placeholder="apellido del asistente" value="{{ old('apellido') }}">
    </div>
  </div>
  <div class="form-group row">
    <label for="documento" class="col-lg-3 col-form-label form-control-label field-label-responsive lead">Documento</label>
    <div class="col-lg-7">
      <input type="text" name="documento" id="documento" class="form-control" placeholder="documento del asistente" value="{{ old('documento') }}">
    </div>
  </div>
  <div class="form-group row">
    <label for="email" class="col-lg-3 col-form-label form-control-label field-label-responsive lead">Email</label>
    <div class="col-lg-7">
      <input type="email" name="email" id="email" class="form-control" placeholder="email@ejemplo.com" value="{{ old('documento') }}">
    </div>
  </div>
  <div class="form-group row">
    <label for="telefono" class="col-lg-3 col-form-label form-control-label field-label-responsive lead">Teléfono</label>
    <div class="col-lg-7">
      <input type="number" name="telefono" id="telefono" class="form-control" placeholder="telefono" value="{{ old('documento') }}">
    </div>
  </div>
  <div class="form-group" style="text-align: center;">
    <a href="{{ url('asistentes') }}" class="btn btn-secondary">Cancelar</a>
    <button type="submit" class="btn btn-primary">Crear asistente</button>
  </div>
</form>
@endsection