@extends('layout')
@section('content')
<h1 class="display-4 text-center">Lista de asistencias</h1>
<hr>
<div class="jumbotron">
  <div class="container">
    @include('partials/message')
    <div style="text-align: center;">
      <a href="{{ url('asistencias/create') }}" class="btn btn-primary btn-sm center">Agregar un asistencia</a>
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="input-group">
            <span class="input-group-btn">
              <button class="btn btn-secondary" type="button">Por documento</button>
            </span>
            <input type="text" class="form-control" placeholder="Product name" aria-label="Product name">
            <span class="input-group-btn">
              <button class="btn btn-secondary" type="button">Por evento</button>
            </span>
          </div>
        </div>
      </div>
    </div>
    <br>
    <ul class="list-group">
      @foreach ($asistencias as $asistencia)
      <li class="list-inline lead">
        <span class="badge badge-primary">
          {{ \Carbon\Carbon::parse($asistencia->event->fecha)->format('d/m/Y - h:m')}}
        </span>
        <a href="{{ route('asistencias.show', ['asistencias' => $asistencia->id]) }}" class="btn btn-sm btn-default">
          <span class="lead">
            <b>
              {{ $asistencia->asistente->apellido }}, {{ $asistencia->asistente->nombre }}. {{ $asistencia->evento->nombre }}
            </b>
          </span>
        </a>
        <hr class="my-0">
      </li>
      @endforeach
    </ul>
  </div>
  <br>
  {!! $asistencias->render("pagination::bootstrap-4") !!}
</div>
@endsection