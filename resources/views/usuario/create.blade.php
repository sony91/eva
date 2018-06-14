@extends('layouts.admin')
	@section('content')
	@include('alerts.request')
	{!!Form::open(['route'=>'usuario.store', 'method'=>'POST'])!!}
		@include('usuario.forms.usr')
		{{-- <div class="form-group">
			{!!Form::label('nombreRol','Rol:')!!}
			{!!Form::select('nameRol_id',$roles)!!}
		</div> --}}
		{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}
	@endsection
