@extends('layouts.default')
@section('content')
<div class="hidden-container container-in">
  <div class="titulo"><h1>{{ Lang::get('lang.menu_changepass') }}</h1></div>
  <div class="contenido">
    <form action="{{ URL::to('usuario/cambiar-contraseña/enviar') }}" method="POST">
		@if (Session::has('error'))
		<div class="col-xs-12">
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<p class="textoPromedio">{{ Session::get('error') }}</p>
			</div>
		</div>
		<div class="clearfix"></div>
		@elseif(Session::has('success'))
		<div class="col-xs-12">
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<p class="textoPromedio">{{ Session::get('success') }}</p>
			</div>
		</div>
		@endif
		
		<div class="col-xs-12">
			<p class="textoPromedio">Un email le sera enviado con su nueva contraseña.</p>
		</div>
		<div class="col-xs-12 formulario">
			<label for="passnew" class="textoPromedio">Contraseña Actual:</label>
			<input type="password" name="passnew" class="form-control" required>
		</div>
		<div class="col-xs-12 formulario">
			<label for="pass" class="textoPromedio">Nueva Contraseña: </label>
			<input type="password" name="password" class="form-control" required>
		</div>
		<div class="col-xs-12 formulario">
			<label for="pass" class="textoPromedio">Nueva Contraseña: </label>
			<input type="password" name="password_re" class="form-control" required>
		</div>
		
		<div class="col-xs-12">
			<input type="submit" name="enviar" value="{{ Lang::get('lang.btn_send') }}" class="btn btn-primary">
		</div>
	</form>
	<div class="clearfix"></div>
  </div>
</div>
<div class="modal fade" id="changePass" tabindex="-1" role="dialog" aria-labelledby="modalForggo" aria-hidden="true">
	<div class="forgotPass modal-dialog imgLiderUp">
		<div class="modal-content" style="color:black;padding:1em;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			</div>
			<h3>{{ Lang::get('lang.login_getback') }}</h3>
			<div class="modal-footer " style="text-align:center;">
				<div class="alert responseDanger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				</div>
				<form methos="POST" action="{{ URL::to('recuperar/password') }}">
					<p class="textoPromedio">{{ Lang::get('lang.login_text1') }}</p>
					<input class="form-control emailForgot" name="email" placeholder="{{ Lang::get('lang.placeholder_email') }}">
					<button class="btn btn-success envForgot" style="margin-top:2em;">{{ Lang::get('lang.btn_send') }}</button>	
				</form>
			</div>
		</div>
	</div>
</div>

@stop