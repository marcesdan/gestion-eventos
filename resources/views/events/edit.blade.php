@extends('layout')

@section('content')
  <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <h1>Editar el evento "{{ $event->nombre }}"</h1>
        @include('partials/errors')
       
       	<form method="POST" action="{{ route('events.update', ['events' => $event->id]) }}" class="form">
          {!! csrf_field() !!}
          {!! method_field('PUT') !!}

          <div class="form-group row">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ $event->nombre }}">            
          </div>
          <div class="form-group row">
            <label for="nombre">Descripcion</label>
            <textarea name="descripcion" class="form-control">
              {{ $event->descripcion }}
            </textarea>
          </div>

          <div class="form-group row">  
            <select class="form-control" name="sede_id">
              @if($sedes->count() > 0)
                @foreach($sedes as $sede)    
                  @if($event->sede_id == $sede->id)
                    <option selected="selected">{{ $sede->nombre }}</option>
                  @else
                    <option>{{ $sede->nombre }}</option>
                  @endif
                @endforeach
              @else
                No Record Found
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
