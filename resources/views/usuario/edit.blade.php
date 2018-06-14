@extends('layouts.admin')
	@section('content')
	@include('alerts.request')
		{!!Form::model($user,['route'=>['usuario.update',$user],'method'=>'PUT'])!!}
			@include('usuario.forms.usr')
			{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}

	
	@endsection
