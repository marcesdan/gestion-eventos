@extends('layout')
@section('content')
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <h1>Edición de eventos</h1>
    @include('partials/errors')
    @if(Session::has('message'))
    <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" arial-label="Close"><span aria-      hidden="true">x</span></button>
      {{ Session::get('message') }}
    </div>
    @endif
    <form method="POST" action="{{ route('events.update', ['events' => $event->id]) }}" class="form">
      {!! csrf_field() !!}
      <div class="form-group row">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" class="form-control" value="{{ $event->nombre }}">
      </div>
      <div class="form-group row">
        <label for="descripcion">Descripcion</label>
        <textarea name="descripcion" class="form-control">{{ $event->descripcion }}</textarea>
      </div>
      <div class="form-group row">
        <select class="form-control" name="sede_id">
          @if($sedes->count() > 0)
          <option value="{{ $selectedSede->id }}" selected="selected">{{ $selectedSede->nombre }}</option>
          @foreach($sedes as $sede)
          <option value="{{ $sede->id }}">{{ $sede->nombre }}</option>
          @endforeach
          @else
          <option value="No Record Found" selected="selected"></option>
          @endif
        </select>
      </div>
      <div class="form-group row">
        <label for="fecha">Fecha y hora</label>
        <input name="fecha" class="form-control" type="datetime-local" value="{{ $event->fecha }}">
      </div>
      <div class="form-group row">
        <button type="submit" class="btn btn-primary">Editar evento</button>
      </div>
    </form>
  </div>
</div>
@endsection