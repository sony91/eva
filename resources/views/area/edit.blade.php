@extends('layouts.admin')
	@section('content')
	@include('alerts.request')
		{!!Form::model($area,['route'=>['area.update',$area],'method'=>'PUT'])!!}
			@include('area.forms.ar')
			{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}

		
	@endsection
