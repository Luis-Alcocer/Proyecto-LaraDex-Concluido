{{-- maquetado de la vista --}}

{{--extends herada el diseño de un layout --}}
@extends('layouts.app')

{{-- Se asigna el titulo de la pagina especificando la seccion title --}}
@section('title','Trainers Create')
{{-- se establece la seccion del contenido --}}
@section('content')
	
	{{-- maquetado de la vista --}}
	@include('common.errors')
	{!! Form::open(['route'=>'trainers.store','method' => 'POST' ,'files' =>true]) !!}

		@include('trainers.form')
		{!!Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}

	{!!Form::close()!!}

	
@endsection
