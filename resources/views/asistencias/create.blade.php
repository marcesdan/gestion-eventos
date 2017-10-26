@extends('layout')
@section('content')
<h1 class="display-4 text-center">Creación de asistentes</h1>
<hr>
@include('partials/errors')
<br>
<form method="POST" action="{{ url('asistentes') }}" class="form">
  {!! csrf_field() !!}
  <div class="form-group row">
    <label for="documento" class="col-lg-3 col-form-label form-control-label field-label-responsive lead">Documento</label>
    <div class="col-lg-7">
      <input type="text" name="documento" id="documento" class="form-control" placeholder="documento del asistente" value="{{ old('documento') }}">
    </div>
  </div>
  <div class="form-group" style="text-align: center;">
    <a href="{{ url('asistentes') }}" class="btn btn-secondary">Cancelar</a>
    <button type="submit" class="btn btn-primary">Crear asistencia</button>
  </div>
</form>
@endsection