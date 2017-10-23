@extends('layout')
@section('content')
<div class="container">
  <h1> Asistentes: </h1>
  <p>
    <a href="{{ url('asistentes/create') }}" class="btn btn-primary btn-sm">Agregar un asistente</a>
  </p>
  <ul class="list-group">
      @foreach ($asistentes as $asistente)
      <li class="list-group-item">
        <span class="badge badge-primary"> {{ $asistente->documento }} </span>
        | {{ $asistente->apellido }}, {{ $asistente->nombre }}
        
        <div class="btn-group btn-group-sm" role="group" style="float:right">
        <a href="{{ route('asistentes.show', ['asistentes' => $asistente->id]) }}" class="btn btn-sm btn-primary">Detalles</a>
        <a href="{{ route('asistentes.edit', ['asistentes' => $asistente->id]) }}" class="btn btn-sm btn-primary">Editar</a>
        <a href="{{ route('asistentes.delete', ['asistentes' => $asistente->id]) }}" class="btn btn-sm btn-primary">Eliminar</a>
        </div>

      </li>
      @endforeach
  </ul> 
  <br>
  {!! $asistentes->render("pagination::bootstrap-4") !!}  
</div>
@endsection