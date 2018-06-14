@extends('layouts.admin')
@section('content')
    <legend>Lista de proyectos</legend>
    <div class="alert alert-info">
        La lista de proyectos donde se visualiza cuantos docentes asignados tiene en la columna docentes.
    </div>
    <table class="table">
        <thead>
        <th>Proyecto</th>
        <th>Descripcion</th>
        <th>Tribunales</th>
        <!-- <th>Operaciones</th> -->
        </thead>

        @foreach($proyectos as $proyecto)
            <tbody>
            <td>{{$proyecto->titulo}}</td>
            <td>
                {{$proyecto->descripcion}}
            </td>
            <td>
                @foreach($proyecto->proyectoTribunales as $profesional)
                    <span class="badge badge-success">
                        {{$profesional->name}} - {{$profesional->surname}} - {{$profesional->code_number}}
                    </span> <br>
                @endforeach
            </td>
            <!-- <td> 
            {!!Form::open(['route'=>['asignacion.destroy', $proyecto], 'method' => 'DELETE'])!!}
            {!!Form::submit('Concluir',['class'=>'btn btn-primary'])!!}
            {!!Form::close()!!}
            </td> -->
            </tbody>
        @endforeach
    </table>
    {!!$proyectos->render()!!}
    {{-- {!!$var->render()!!} --}}
@endsection
