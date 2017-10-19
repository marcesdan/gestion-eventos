@extends('layout')
@section('content')
  <h1> Eventos </h1>
  <p>
    <a href="{{ url('events/create') }}">Agregar un evento</a>
  </p>
  <ul class="list-group">
      @foreach ($events as $event)
      <li class="list-group-item">
        <span class="badge badge-info"> {{ \Carbon\Carbon::parse($event->fecha)->format('d/m/Y - h:m')}} </span>
        | {{ $event->nombre }}
        <br>
        <a href="{{ route('events.show', ['events' => $event->id]) }}" class="small">Detalles</a> |
        <a href="{{ route('events.edit', ['events' => $event->id]) }}" class="small">Editar</a> |
        <a href="{{ route('events.delete', ['events' => $event->id]) }}" class="small">Eliminar</a>
      </li>
      @endforeach
  </ul>
    {!! $events->render("pagination::bootstrap-4") !!}
@endsection