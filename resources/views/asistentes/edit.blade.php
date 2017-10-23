@extends('layout')

@section('content')
  <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <h1>Edición de asistentes</h1>
        @include('partials/errors')
       	<form method="POST" action="{{ route('asistentes.update', ['asistentes' => $asistente->id]) }}" class="form">
          {!! csrf_field() !!}
          <div class="form-group row">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="nombre del asistente" value="{{ $asistente->nombre}}">   
          </div>
          <div class="form-group row">
            <label for="apellido">Apellido</label>
            <input type="text" name="apellido" id="apellido" class="form-control" placeholder="apellido del asistente" value="{{ $asistente->apellido }}">   
          </div>
          <div class="form-group row">
            <label for="documento">Documento</label>
            <input type="text" name="documento" id="documento" class="form-control" placeholder="documento del asistente" value="{{ $asistente->documento }}">   
          </div>
           <div class="form-group row">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="email@ejemplo.com" value="{{ $asistente->contacto->email }}">   
          </div>
          <div class="form-group row">
            <label for="telefono">Teléfono</label>
            <input type="tel" name="telefono" id="telefono" class="form-control" placeholder="telefono" value="{{ $asistente->contacto->telefono }}">   
          </div>
          <div class="form-group row">
          <button type="submit" class="btn btn-primary">Editar asistente</button>
          </div>
        </form>
      </div>
  </div>
@endsection
