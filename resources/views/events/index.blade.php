@extends('layout')
@section('content')
  <div class="container">
    <h1> Eventos </h1>
  <p>
    <a href="{{ url('events/create') }}" class="btn btn-primary btn-sm">Agregar un evento</a>
  </p>
  <ul class="list-group">
      @foreach ($events as $event)
      <li class="list-group-item">
        <span class="badge badge-primary"> {{ \Carbon\Carbon::parse($event->fecha)->format('d/m/Y - h:m')}} </span>
        | {{ $event->nombre }}

        <div class="btn-group btn-group-sm" role="group" style="float:right">
        <a href="{{ route('events.show', ['events' => $event->id]) }}" class="btn btn-sm btn-primary">Detalles</a>
        <a href="{{ route('events.edit', ['events' => $event->id]) }}" class="btn btn-sm btn-primary">Editar</a>
        <a href="{{ route('events.delete', ['events' => $event->id]) }}" class="btn btn-sm btn-primary">Eliminar</a>
        </div>
         
      </li>
      @endforeach
  </ul>
  <br>
  {!! $events->render("pagination::bootstrap-4") !!}
  </div>
@endsection