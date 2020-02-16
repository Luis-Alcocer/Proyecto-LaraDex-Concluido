
@extends('layouts.app')
@section('title','Trainers Edit')

@section('content')

{!! Form::model($trainer, ['route'=>['trainers.update', $trainer], 'method' => 'PUT' ,'files' =>true]) !!}

	@include('trainers.form')

{{-- <div class="form-group">
			{!!Form::label('name', 'Nombre') !!}
			{!!Form::text('name',null,['class' =>'form-control'])!!}
		</div>

		<div class="form-group">
			{!!Form::label('slug', 'Slug') !!}
			{!!Form::text('slug',null,['class' =>'form-control'])!!}
		</div>



		<div class="form-group">
			{!!Form::label('avatar', 'Avatar') !!}
			{!!Form::file('avatar')!!}
		</div>--}}

		{!!Form::submit('Guardar', ['class' => 'btn btn-primary']) !!} 


{!!Form::close()!!}
	 {{-- <form class="form-group" method="POST" action="/trainers/{{$trainer->slug}}" enctype="multipart/form-data" >
		@method('PUT')
		@csrf
		<div class="form-group">
			<label for="">Nombre</label>
			<input type="text" value="{{$trainer->name}}"name="name" class="form-control">
		</div>

		<div class="form-group">
			<label for="">Avatar</label>
			<input type="file" name="avatar">
		</div>
			
		<button type="submit" class="btn btn-primary">Actualizar</button>
	</form>   --}}

@endsection