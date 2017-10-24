@extends('layout')
@section('content')
<h1 class="display-4 text-center">Lista de asistentes</h1>
<hr>
<div class="jumbotron">
  <div class="container">
    @include('partials/message')
    <div style="text-align: center;">
      <a href="{{ url('asistentes/create') }}" class="btn btn-primary btn-sm center">Agregar un asistente</a>
    </div>
    <br>
    <ul class="list-group">
      @foreach ($asistentes as $asistente)
      <li class="list-inline lead">
        <span class="badge badge-primary"> 
          {{ $asistente->documento }} 
        </span>
        <a href="{{ route('asistentes.show', ['asistentes' => $asistente->id]) }}" class="btn btn-sm btn-default">
          <span class="lead">
            <b>{{ $asistente->apellido }}, {{ $asistente->nombre }}</b>
          </span>
        </a>
        <hr class="my-0">
      </li>
      @endforeach
    </ul>
  </div>
  <br>
  {!! $asistentes->render("pagination::bootstrap-4") !!}
  </div>
  @endsection