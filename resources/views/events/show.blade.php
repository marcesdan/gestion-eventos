@extends('layout')
@section('content')
<h1 class="display-4 text-center">Detalle del evento</h1>
<hr>
<div class="card">
  <h3 class="card-header">{{ \Carbon\Carbon::parse($event->fecha)->format('d/m/Y - h:m')}} ({{ $event->sede->nombre }})</h3>
  <div class="card-block">
    <br>
    <div class="container">
      <h4 class="card-title"> {{ $event->nombre }} </h4>
      <p class="card-text lead"> {{ $event->descripcion }} </p>
      <blockquote class="blockquote-footer">
        <p class="mb-1">{{ $event->sede->contacto->telefono }}</p>
        <p class="mb-1">{{ $event->sede->contacto->email }}</p>
      </blockquote>
    </div>
  </div>
  <div class="form-group" style="text-align: center;">
    <a href="{{ url('events') }}" class="btn btn-secondary">Volver</a>
    <a href="{{ route('events.edit', ['events' => $event->id]) }}" class="btn btn-primary">Editar</a>
    <a href="{{ route('events.delete', ['events' => $event->id]) }}" class="btn btn-danger">Eliminar</a>
  </div>
</div>
@endsection