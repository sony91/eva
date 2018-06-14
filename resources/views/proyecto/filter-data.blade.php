@extends('layouts.admin')

@section('content')
    <legend>Resultado de la busqueda</legend>
    
<a href="{{url('reports/pdf') }}">Download PDF</a>

    <table class="table">
        <thead>
        <th>Numero</th>
        <th>Titulo</th>
        <th>Autor</th>
        <th>Tutor</th>
        <th>Carrera</th>
        <th>Modalidad</th>
        </thead>
        @foreach($proyectos as $proyecto)
            <tbody>
            <td><span class="text-primary">{{$proyecto->project_number}}</span></td>
            <td>{{$proyecto->titulo}}</td>
            <td>{{$proyecto->author}}</td>
            <td>{{$proyecto->tutor_data}}</td>
            <td>{{$proyecto->namecarre}}</td>
            <td>{{$proyecto->namemodal}}</td>
            </tbody>
        @endforeach
                  
    </table>


@endsection
