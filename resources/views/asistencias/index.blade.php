@extends('layout')
@section('content')
<h1 class="display-4 text-center">Lista de asistencias</h1>
<hr>
<div class="jumbotron">
    <div class="container">
        @include('partials/message')
        <div style="text-align: center;">
            <a href="{{ route('asistencias.create', ['asistencias' => $evento->id]) }}" class="btn btn-primary btn-sm center">Agregar una asistencia</a>
        </div>
        <br>
        <blockquote class="blockquote">
            <p class="mb-0"> {{ $evento->nombre }}</p>
            <footer class="blockquote-footer">
                {{ \Carbon\Carbon::parse($evento->fecha)->format('d/m - h:m')}} 
                ({{ $evento->sede->nombre }})
            </footer>
        </blockquote>
        <ul class="list-group">
            @foreach ($asistencias as $asistencia)
            <li class="list-inline lead">
                <div class="form-group">
                    <form name="myform"
                          action="{{ route('asistencias.delete',
                              ['asistencia' => $asistencia->id , 
                                  'evento' => $evento->id]) }}" method="post"> 
                        {!! csrf_field() !!}
                        <span class="badge badge-primary">
                            {{ $asistencia->documento }}
                        </span>
                        <span class="lead">
                            <b>{{ $asistencia->apellido }}, {{ $asistencia->nombre}} </b>
                        </span>
                        <span style="float: right;">
                            <button class="btn btn-danger btn-sm">Eliminar</button>
                        </span>
                    </form>
                    <hr>
                    </li>
                    @endforeach
                    </ul>
                </div>
                <br>
                {!! $asistencias->render("pagination::bootstrap-4") !!}
                </div>
                @endsection