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
            <br>
        </div>
    </div>
    <form name="myform" action="{{ route('events.delete', ['evento' => $event->id]) }}" method="post">
        {!! csrf_field() !!}
        <div class="form-group" style="text-align: center;"> 
            <a href="{{ url('events') }}" class="btn btn-secondary">Volver</a>
            <a href="{{ route('asistencias.create', ['asistencias' => $event->id]) }}" class="btn btn-success">Agregar asistente</a>
            <a href="{{ route('asistencias.indexEvento', ['asistencias' => $event->id]) }}" class="btn btn-success">Ver asistentes</a>
            <a href="{{ route('events.edit', ['events' => $event->id]) }}" class="btn btn-primary">Editar</a>
            <button class="btn btn-danger">Eliminar</button>
        </div>
    </form>

</div>
@endsection