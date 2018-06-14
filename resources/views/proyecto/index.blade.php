@extends('layouts.admin')

@if(Session::has('message'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        {{Session::get('message')}}
    </div>
@endif

@section('content')
    <table class="table">
        <thead>
        <th>Numero</th>
        <th>Titulo</th>
        <th>Autor</th>
        <th>Tutor</th>
        <th>Carrera</th>
        <th>Area</th>
        <th>Modalidad</th>
        <th>Archivo</th>
        <th>Operacion</th>
        </thead>
        @foreach($proyectos as $proyecto)
            <tbody>
            <td><span class="text-primary">{{$proyecto->project_number}}</span></td>
            <td>{{$proyecto->titulo}}</td>
            <td>{{$proyecto->author}}</td>
            <td>{{$proyecto->tutor_data}}</td>
            <td>{{$proyecto->namecarre}}</td>
            <td>{{$proyecto->nameare}}</td>
            <td>{{$proyecto->namemodal}}</td>

            <td><a href="proyectos/{{$proyecto->path}}" target="_blank"><i class="fa fa-file-pdf-o"
                                                                           style="font-size:20px;color:red"></i></a>
            </td>

            <img src="proyectos/{{$proyecto->path}}" alt="" style="width:100px;"/>
            </td>
            <td>
                {!!link_to_route('proyecto.edit', $title = 'Editar', $parameters = $proyecto->id, $attributes = ['class'=>'btn btn-primary'])!!}

            </td>
            </tbody>
        @endforeach
    </table>
    {!!$proyectos->render()!!}
@endsection
