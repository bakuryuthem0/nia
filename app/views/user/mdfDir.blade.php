@extends('layouts.default')

@section('content')
<div class="hidden-container container-in">
  <div class="titulo"><h1>Modificar dirección</h1></div>
  <div class="contenido">
	<div class="row">
		<div class="col-xs-12 cont" style="margin-top:1em;">
			<div class="col-xs-12 contdeColor contCentrado">
				@if (Session::has('error'))
				<div class="col-xs-6">
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<p class="textoPromedio">{{ Session::get('error') }}</p>
					</div>
				</div>
				@endif
			</div>
			<div class="col-xs-12">
				<p class="textoPromedio"><i class="fa fa-exclamation-triangle"></i> Sus datos se cambiaran para todas las facturas hechas.</p>
			</div>
			<form method="POST" action="{{ URL::to('usuario/perfil/modificar-direccion/enviar') }}">
				<div class="col-xs-12 formulario">
					<label class="textoPromedio">Dirección</label>
					<textarea name="dir" class="form-control">{{ $dir->dir }}</textarea>
					@if ($errors->has('dir'))
						 @foreach($errors->get('dir') as $err)
						 	<div class="alert alert-danger">
						 		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						 		<p class="textoPromedio">{{ $err }}</p>
						 	</div>
						 @endforeach
					@endif
				</div>
				<div class="col-xs-12 formulario">
					<label class="textoPromedio">Dirección</label>
					<input type="text" name="email" value="{{ $dir->email }}" class="form-control">
					@if ($errors->has('email'))
								 @foreach($errors->get('email') as $err)
								 	<div class="alert alert-danger">
								 		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								 		<p class="textoPromedio">{{ $err }}</p>
								 	</div>
								 @endforeach
							@endif
				</div>
				<div class="col-xs-12 formulario">
					<button class="btn btn-success" name="id" value="{{ $dir->id }}">Enviar</button>
				</div>
			</form>
		</div>
	</div>
</div>
@stop