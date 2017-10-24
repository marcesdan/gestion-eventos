@extends('layout')
@section('content')
<h1 class="display-4 text-center">Lista de eventos</h1>
<hr>
<div class="jumbotron">
  <div class="container">
    @include('partials/message')
    <div style="text-align: center;">
      <a href="{{ url('events/create') }}" class="btn btn-primary btn-sm center">Agregar un evento</a>
    </div>
    <br>
    <ul class="list-group">
      @foreach ($events as $event)
      <li class="list-inline lead">
        <span class="badge badge-primary">
          {{ \Carbon\Carbon::parse($event->fecha)->format('d/m/Y - h:m')}}
        </span>
        <a href="{{ route('events.show', ['events' => $event->id]) }}" class="btn btn-sm btn-default">
          <span class="lead"><b>{{ $event->nombre }}</b></span>
        </a>
        <hr class="my-0">
      </li>
      @endforeach
    </ul>
  </div>
  <br>
  {{ $events->render("pagination::bootstrap-4") }}
</div>
@endsection