@extends('layout')
@section('content')
    <h1 class="display-4">Lista de eventos</h1>
    <hr>   
      <p><a href="{{ url('events/create') }}" class="btn btn-primary btn-sm">Agregar un evento</a></p>
        <ul class="list-group">
            @foreach ($events as $event)
            <li class="list-inline">
              <span class="badge badge-primary"> {{ \Carbon\Carbon::parse($event->fecha)->format('d/m/Y - h:m')}}</span>
              <a href="{{ route('events.show', ['events' => $event->id]) }}" class="btn btn-sm btn-default"><b>{{ $event->nombre }}</b></a>   
            </li>
            @endforeach
        </ul>
        <br>
        {!! $events->render("pagination::bootstrap-4") !!}
</div>
@endsection