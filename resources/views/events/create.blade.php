@extends('layout')
@section('content')
  <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <h1 class="display-4">Creación de eventos</h1>
        <hr>
        @include('partials/errors')
        <form method="POST" action="{{ url('events') }}" class="form">
          {!! csrf_field() !!}
          <div class="form-group row">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="nombre del evento" value="{{ old('nombre') }}">   
          </div>
          <div class="form-group row">
            <label for="descripcion">Descripcion</label>
            <textarea name="descripcion" id="descripcion" class="form-control" placeholder="descripcion del evento">{{ old('descripcion') }}</textarea>
          </div>
          <div class="form-group row">
            <label for="sede">Sede</label>  
            <select class="form-control" name="sede_id">
              @if($sedes->count() > 0)
                @foreach($sedes as $sede)
                  <option value=" {{ $sede->id }} ">{{ $sede->nombre }}</option>
                @endforeach
              @else
                <option value="No Record Found" selected="selected"></option>
              @endif   
          </select>
          </div>
          <div class="form-group row">
            <label for="fecha">Fecha y hora</label>
            <input name="fecha" class="form-control" type="datetime-local" id="fecha" value="{{ old('fecha') }}">
          </div>
          <br>
          <div class="form-group">
          <a href="{{ url('events') }}" class="btn btn-secondary">Volver</a>
          <button type="submit" class="btn btn-primary" style="float:right">Crear evento</button>
          </div>  
        </form>
      </div>
  </div>
@endsection
