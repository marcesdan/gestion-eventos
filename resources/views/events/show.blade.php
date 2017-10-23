@extends('layout')
@section('content')
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <h1 class="display-4">Detalle del evento</h1><hr>
    <span class="badge badge-primary">
      {{ \Carbon\Carbon::parse($event->fecha)->format('d/m/Y - h:m')}} ({{ $event->sede->nombre }})
    </span>
    <b>{{ $event->nombre}}</b>
    <p>
      {{ $event->descripcion}}
      <p>
        <div class="btn-group btn-group-sm" role="group">
          <a href="{{ url('events') }}" class="btn btn-sm btn-primary">Volver</a>
          <a href="{{ route('events.edit', ['events' => $event->id]) }}" class="btn btn-sm btn-primary">Editar</a>
          <a href="{{ route('events.delete', ['events' => $event->id]) }}" class="btn btn-sm btn-primary">Eliminar</a>
        </div>
  </div>
</div>
@endsection