@extends('layout')
@section('content')
<!-- form -->
<h1 class="display-4 text-center">Creación de un evento</h1>
<hr>
@include('partials/errors')
<form method="POST" action="{{ url('events') }}" class="form">
  {!! csrf_field() !!}
  <div class="form-group row">
    <label for="nombre" class="col-lg-3 col-form-label form-control-label field-label-responsive lead">Nombre</label>
    <div class="col-lg-7">
      <input type="text" name="nombre" id="nombre" class="form-control" placeholder="nombre del evento" value="{{ old('nombre') }}">
    </div>
  </div>
  <div class="form-group row">
    <label for="descripcion" class="col-lg-3 col-form-label form-control-label field-label-responsive lead">Descripcion</label>
    <div class="col-lg-7">
      <textarea name="descripcion" id="descripcion" class="form-control" placeholder="descripcion del evento">{{ old('descripcion') }}</textarea>
    </div>
  </div>
  <div class="form-group row">
    <label for="sede" class="col-lg-3 col-form-label form-control-label field-label-responsive lead">Sede</label>
    <div class="col-lg-7">
      <select class="form-control" name="sede_id">
        @if($sedes->count() > 0)
        @foreach($sedes as $sede)
        <option value=" {{ $sede->id }} ">{{ $sede->nombre }}</option>
        @endforeach
        @else
        <option value="No Record Found" selected="selected"></option>
        @endif
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="fecha" class="col-lg-3 col-form-label form-control-label field-label-responsive lead">Fecha y hora</label>
    <div class="col-lg-7">
      <input name="fecha" class="form-control" type="datetime-local" id="fecha" value="{{ old('fecha') }}">
    </div>
  </div>
  <br>
  <div class="form-group" style="text-align: center;">
    <a href="{{ url('events') }}" class="btn btn-secondary">Cancelar</a>
    <button type="submit" class="btn btn-primary">Crear evento</button>
  </div>
</form>
@endsection