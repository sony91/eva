@extends('layouts.admin')
	@section('content')
	@include('alerts.request')
		{!!Form::model($aux,['route'=>['auxiliar.update',$aux],'method'=>'PUT'])!!}
			@include('auxiliar.forms.auxi')
			{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}


	@endsection
