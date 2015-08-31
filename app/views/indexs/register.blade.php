@extends('layouts.default')
@section('content')
<div class="hidden-container container-in">
  <div class="titulo"><h1>{{ Lang::get('lang.titulo_3') }}</h1></div>
  <div class="contenido">
  	@if (Session::has('error'))
				<div class="col-xs-6">
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<p class="textoPromedio">{{ Session::get('error') }}</p>
					</div>
				</div>
				<div class="clearfix"></div>
				@endif
				<div class="col-xs-12">
					<div class="col-xs-12">
						<legend>{{ Lang::get('lang.form_text1') }}</legend>
						<p class="textoPromedio">{{ Lang::get('lang.form_text2') }}</p>
						<p class="textoPromedio">{{ Lang::get('lang.form_text3') }}</p>
						<hr>
					</div>						
				</div>
				<form action="{{ URL::to('registro/enviar') }}" id="formRegister" method="POST">
					<div class="col-xs-12 formulario">
						<div class="col-xs-6 inputRegister">
							<p class="textoPromedio">(*) {{ Lang::get('lang.form_email') }}:</p>
						</div>
						<div class="col-xs-6 inputRegister">
							{{ Form::text('email', Input::old('email'),array(
								'class' 				=> 'form-control inputFondoNegro',
								'placeholder' 			=> Lang::get('lang.form_email'),
								'required' 				=> 'required',
								'required' 	  			=> 'required',
								'data-trigger' 					=> 'manual',
								"data-toggle" 			=> "popover",
								"data-placement" 		=> "left",
								"data-content" 			=> "Ejemplo@dominio.com",
								"data-original-title" 	=> "Atención")) }}
							@if ($errors->has('email'))
								 @foreach($errors->get('email') as $err)
								 	<div class="alert alert-danger">
								 		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								 		<p class="textoPromedio">{{ $err }}</p>
								 	</div>
								 @endforeach
							@endif
						</div>
					</div>
					
					<div class="col-xs-12 formulario">
						<div class="col-xs-6 inputRegister">
							<p class="textoPromedio">(*) {{ Lang::get('lang.form_pass') }}:</p>
						</div>
						<div class="col-xs-6 inputRegister">
							{{ Form::password('pass',array(
								'class' 	  			=> 'form-control inputFondoNegro password',
								'placeholder' 			=> Lang::get('lang.form_pass'),
								'required' 	  			=> 'required',
								'data-trigger' 					=> 'manual',
								"data-toggle" 			=> "popover",
								"data-placement" 		=> "top",
								"data-content" 			=> "La contraseña debe tener al menos 6 caracteres",
								"data-original-title" 	=> "Atención")) }}
							@if ($errors->has('pass'))
								 @foreach($errors->get('pass') as $err)
								 	<div class="alert alert-danger">
								 		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								 		<p class="textoPromedio">{{ $err }}</p>
								 	</div>
								 @endforeach
							@endif
						</div>
					</div>
					<div class="col-xs-12 formulario">
						<div class="col-xs-6 inputRegister">
							<p class="textoPromedio">(*) {{ Lang::get('lang.form_pass2') }}:</p>
						</div>
						<div class="col-xs-6 inputRegister">
							{{ Form::password('pass_confirmation',array(
								'id' 					=> 'pass2',
								'class' 				=> 'form-control inputFondoNegro',
								'placeholder' 			=> Lang::get('lang.form_pass2'),
								'required' 	  			=> 'required',
								'data-trigger' 					=> 'manual',
								"data-toggle" 			=> "popover",
								"data-placement" 		=> "left",
								"data-content" 			=> "La contraseña no concuerda",
								"data-original-title" 	=> "Atención")) }}
							@if ($errors->has('pass_confirmation'))
								 @foreach($errors->get('pass_confirmation') as $err)
								 	<div class="alert alert-danger">
								 		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								 		<p class="textoPromedio">{{ $err }}</p>
								 	</div>
								 @endforeach
							@endif
						</div>
					</div>
					
					<div class="col-xs-12 formulario">
						<div class="col-xs-6 inputRegister">
							<p class="textoPromedio">(*) {{ Lang::get('lang.form_name') }}:</p>
						</div>
						<div class="col-xs-6 inputRegister">
							{{ Form::text('name', Input::old('name'),array(
								'class'	 				=> 'form-control inputFondoNegro',
								'placeholder' 			=> Lang::get('lang.form_name'),
								'required' 	  			=> 'required',
								'data-trigger' 					=> 'manual',
								"data-toggle" 			=> "popover",
								"data-placement" 		=> "top",
								"data-content" 			=> "Campo requerido",
								"data-original-title" 	=> "Atención")) }}
							@if ($errors->has('name'))
								 @foreach($errors->get('name') as $err)
								 	<div class="alert alert-danger">
								 		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								 		<p class="textoPromedio">{{ $err }}</p>
								 	</div>
								 @endforeach
							@endif
						</div>
					</div>
					<div class="col-xs-12 formulario">
						<div class="col-xs-6 inputRegister">
							<p class="textoPromedio">(*) {{ Lang::get('lang.form_lastname') }}</p>
						</div>
						<div class="col-xs-6 inputRegister">
							{{ Form::text('lastname', Input::old('lastname'),array(
								'class' => 'form-control inputFondoNegro',
								'placeholder' => Lang::get('lang.form_lastname'),
								'required' 	  			=> 'required',
								'data-trigger' 					=> 'manual',
								"data-toggle" 			=> "popover",
								"data-placement" 		=> "left",
								"data-content" 			=> "Campo requerido",
								"data-original-title" 	=> "Atención")) }}
							@if ($errors->has('lastname'))
								 @foreach($errors->get('lastname') as $err)
								 	<div class="alert alert-danger">
								 		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								 		<p class="textoPromedio">{{ $err }}</p>
								 	</div>
								 @endforeach
							@endif
						</div>
					</div>
					<div class="col-xs-12 formulario">
						<div class="col-xs-6 inputRegister">
							<p class="textoPromedio">(*) Provincia:</p>
						</div>
						<div class="col-xs-6 inputRegister">
							<select name="estado" class = "form-control depInp"
								required 	  			= "required"
								style 	  				= "display:inline-block;"
								placeholder  			= "Estado"
								data-trigger 			= "manual"
								data-toggle 			= "popover"
								data-placement 			= "left"
								data-content			= "Campo requerido"
								data-original-title 	= "Atención">
								<option value="">Seleccione una provincia</option>
								@foreach($prov as $p)
									<option value="{{ $p->id }}">{{ $p->nombre }}</option>
								@endforeach
							</select>
							@if ($errors->has('estado'))
								
								 @foreach($errors->get('estado') as $err)
								 	<div class="alert alert-danger">
								 		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								 		<p class="textoPromedio">{{ $err }}</p>
								 	</div>
								 @endforeach
							@endif
						</div>
					</div>
					<div class="col-xs-12 formulario">
						<div class="col-xs-6 inputRegister">
							<p class="textoPromedio">(*) {{ Lang::get('lang.form_city') }}</p>
						</div>
						<div class="col-xs-6 inputRegister">
							{{ Form::text('city', Input::old('city'),array(
								'class' => 'form-control inputFondoNegro',
								'placeholder' => Lang::get('lang.form_city'),
								'required' 	  			=> 'required',
								'data-trigger' 					=> 'manual',
								"data-toggle" 			=> "popover",
								"data-placement" 		=> "left",
								"data-content" 			=> "Campo requerido",
								"data-original-title" 	=> "Atención")) }}
							@if ($errors->has('city'))
								 @foreach($errors->get('city') as $err)
								 	<div class="alert alert-danger">
								 		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								 		<p class="textoPromedio">{{ $err }}</p>
								 	</div>
								 @endforeach
							@endif
						</div>
					</div>
					<div class="col-xs-12 formulario">
						<div class="col-xs-6 inputRegister">
							<p class="textoPromedio">(*) {{ Lang::get('lang.form_dir1') }}</p>
						</div>
						<div class="col-xs-6 inputRegister">
							<textarea class="form-control inputFondoNegro"  data-trigger="manual" data-toggle="popover" data-placement="left" data-content="Campo requerido" data-original-title="Atención" placeholder="{{ Lang::get('lang.form_dir1') }}" name="dir">{{ Input::old('dir') }}</textarea>
							@if ($errors->has('dir'))
								 @foreach($errors->get('dir') as $err)
								 	<div class="alert alert-danger">
								 		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								 		<p class="textoPromedio">{{ $err }}</p>
								 	</div>
								 @endforeach
							@endif
						</div>
					</div>
					<div class="col-xs-12 formulario">
						<div class="col-xs-6 inputRegister">
							<p class="textoPromedio"> {{ Lang::get('lang.form_dir2') }}</p>
						</div>
						<div class="col-xs-6 inputRegister">
							<textarea class="form-control inputFondoNegro" placeholder="{{ Lang::get('lang.form_dir2') }}" name="dir2">{{ Input::old('dir2') }}</textarea>
							@if ($errors->has('dir2'))
								 @foreach($errors->get('dir2') as $err)
								 	<div class="alert alert-danger">
								 		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								 		<p class="textoPromedio">{{ $err }}</p>
								 	</div>
								 @endforeach
							@endif
						</div>
					</div>
					<div class="col-xs-12 formulario">
						<div class="col-xs-6 inputRegister">
							<p class="textoPromedio">{{ Lang::get('lang.form_phone') }}</p>
						</div>
						<div class="col-xs-6 inputRegister">
							{{ Form::text('telefono', Input::old('telefono'),array(
								'class' => 'form-control inputFondoNegro',
								'placeholder' => Lang::get('lang.form_phone')
								)) }}
							@if ($errors->has('telefono'))
								 @foreach($errors->get('telefono') as $err)
								 	<div class="alert alert-danger">
								 		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								 		<p class="textoPromedio">{{ $err }}</p>
								 	</div>
								 @endforeach
							@endif
						</div>
					</div>
					<div class="col-xs-12 formulario">
						<div class="col-xs-6 inputRegister">
							<p class="textoPromedio">(*) Captcha:</p>
						</div>
						<div class="col-xs-6 inputRegister">
							
							<div class="g-recaptcha" data-sitekey="6Ld_2AsTAAAAAEDIGnAMzvm43PPrjYAFc7gm4rBm"></div>
							<div class="clearfix"></div>
							@if ($errors->has('g-recaptcha-response'))
									 @foreach($errors->get('g-recaptcha-response') as $err)
									 	<div class="alert alert-danger">
									 		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									 		<p class="textoPromedio">{{ $err }}</p>
									 	</div>
									 @endforeach
							@endif
						</div>
					</div>
				</form>
				<div class="col-xs-12 formulario">
					<div class="col-xs-6 imgLiderUp">
						<button id="enviar" class="btn btn-success btnAlCien">{{ Lang::get('lang.btn_send') }}</button>
						
					</div>
				</div>
			</div>
  </div>
</div>

@stop

