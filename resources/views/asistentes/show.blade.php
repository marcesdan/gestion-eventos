@extends('layout')
@section('content')
  <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <h1>Detalle del asistente</h1>
        <a href="{{ url('asistentes') }}">Ver todos los asistentes</a>
        <br>
        <span class="badge badge-info"> 
          {{ $asistente->documento }}
        </span>
        | {{ $asistente->apellido}}, {{ $asistente->nombre}}.
        <br>
        <p>
          {{ $asistente->contacto->telefono}}, {{ $asistente->contacto->email }}
        </p>
      </div>
  </div>
@endsection
