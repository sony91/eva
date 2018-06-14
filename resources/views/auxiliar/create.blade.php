@extends('layouts.admin')
	@section('content')
	@include('alerts.request')
	{!!Form::open(['route'=>'auxiliar.store', 'method'=>'POST'])!!}
		@include('auxiliar.forms.auxi')
		{{-- <div class="form-group">
			{!!Form::label('nombreRol','Rol:')!!}
			{!!Form::select('nameRol_id',$roles)!!}
		</div> --}}
		{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}
	@endsection
