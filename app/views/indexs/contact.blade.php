@extends('layouts.default')

@section('content')
<div class="hidden-container container-in">
  <div class="titulo"><h1>{{ Lang::get('lang.titulo_4') }}</h1></div>
  <div class="contenido">
    <legend>{{ Lang::get('lang.form_text4') }}</legend>
	<p class="textoPromedio">{{ Lang::get('lang.form_text5') }}.</p>
	<div class="col-xs-12" style="text-align:center;">
				<legend>Contáctenos</legend>
				<p class="textoPromedio">Si desea contactar con nuestro equipo, puede hacerlo mediante algunos de los métodos que le ofrecemos a continuación</p>
			</div>
			<div class="clearfix"></div>
	@if(Session::has('success'))
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<p class="textoPromedio">{{Session::get('success')}}</p>
	</div>
	@elseif(Session::has('error'))
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<p class="textoPromedio">{{ Session::get('error') }}</p>
	</div>
	@endif
	<form method="POST" action="{{ URL::to('contactenos') }}">
	<div class="col-xs-12">
		<label for="nombre" class="textoPromedio">{{ Lang::get('lang.form_name') }}</label>
		{{ Form::text('nombre', Input::old('nombre'),array('class' => 'form-control','placeholder' => Lang::get('lang.form_name'))) }}
		@if ($errors->has('nombre'))
			 @foreach($errors->get('nombre') as $err)
			 	<div class="alert alert-danger">
			 		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			 		<p class="textoPromedio">{{ $err }}</p>
			 	</div>
			 @endforeach
		@endif
	</div>
	<hr>
	<div class="col-xs-12">
		<label for="asunto" class="textoPromedio">{{ Lang::get('lang.form_subject') }}</label>
		{{ Form::text('asunto', Input::old('asunto'),array('class' => 'form-control','placeholder' => Lang::get('lang.form_subject'))) }}
		@if ($errors->has('asunto'))
			 @foreach($errors->get('asunto') as $err)
			 	<div class="alert alert-danger">
			 		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			 		<p class="textoPromedio">{{ $err }}</p>
			 	</div>
			 @endforeach
		@endif
	</div>
	<div class="col-xs-12">
		<label for="email" class="textoPromedio">{{ Lang::get('lang.form_email') }}</label>
		{{ Form::text('email', Input::old('email'),array('class' => 'form-control','placeholder' => Lang::get('lang.form_email'))) }}
		@if ($errors->has('email'))
			 @foreach($errors->get('email') as $err)
			 	<div class="alert alert-danger">
			 		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			 		<p class="textoPromedio">{{ $err }}</p>
			 	</div>
			 @endforeach
		@endif
	</div>
	<div class="col-xs-12">
		<label for="mensaje" class="textoPromedio">{{ Lang::get('lang.form_msg') }}</label>
		{{ Form::textarea('mensaje', Input::old('mensaje'),array('class' => 'form-control','placeholder' => Lang::get('lang.form_email'))) }}
		@if ($errors->has('mensaje'))
			 @foreach($errors->get('mensaje') as $err)
			 	<div class="alert alert-danger">
			 		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			 		<p class="textoPromedio">{{ $err }}</p>
			 	</div>
			 @endforeach
		@endif
	</div>
	<div class="col-xs-12">
		<input type="submit" name="enviar" value="{{ Lang::get('lang.btn_send') }}" class="btn btn-success" style="margin-top:2em;">
	</div>
	</form>
  </div>
</div>

@stop