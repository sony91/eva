@extends('layouts.admin')
	@section('content')

{!!Form::open(['route'=>'subarea.store', 'method'=>'POST'])!!}
<div class="form-group">
    {!!Form:: label ('Nombre de sub-area ')!!}
    {!!Form::text('subarea',null, ['class'=>'form-control', 'placeholder'=>'Ingresar sub-area'])!!}
</div>
    {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
{!!form::close()!!}
@endsection
