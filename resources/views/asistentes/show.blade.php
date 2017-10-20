@extends('layout')
@section('content')
  <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <h1>Eventos</h1>
        <a href="{{ url('events') }}">Ver todos los eventos</a>
        <br>
        <span class="badge badge-info"> 
          {{ \Carbon\Carbon::parse($event->fecha)->format('d/m/Y - h:m')}} ({{ $event->sede->nombre }})</span>
        | {{ $event->nombre}}
        <p>
          {{ $event->descripcion}}
        </p>
      </div>
  </div>
@endsection
