@extends('layouts.admin')
    @section('content')
    @include('alerts.request')
    {!!Form::open(['route'=>'area.store', 'method'=>'POST'])!!}
        @include('area.forms.ar')
        {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
        {{-- {!!Form::submit('Cancelar',['class'=>'btn btn-primary'])!!} --}}
    {!!form::close()!!}
@endsection
