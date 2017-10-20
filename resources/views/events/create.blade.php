@extends('layout')

@section('content')
  <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <h1>Creación de eventos</h1>
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
          <div class="form-group row">
          <button type="submit" class="btn btn-primary">Crear evento</button>
          </div>
        </form>
      </div>
  </div>
@endsection
