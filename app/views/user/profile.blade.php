@extends('layouts.default')
@section('content')
<div class="hidden-container container-in">
  <div class="titulo"><h1>{{ Lang::get('lang.menu_profile') }}</h1></div>
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
				@elseif (Session::has('success'))
					<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<p class="textoPromedio">{{ Session::get('success') }}</p>
					</div>
				<div class="clearfix"></div>
				@endif
				<div class="alert responseDanger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				</div>
					<form method="POST" action="{{ URL::to('usuario/modificar-perfil') }}" class="formMdf">
					<div class="col-xs-12 formulario">
						<div class="col-xs-6 inputRegister">
							<p class="textoPromedio"><strong>Nombre:</strong></p>
						</div>
						<div class="col-xs-6 inputRegister">
							<p class="textoPromedio">{{ Auth::user()->nombre }}</p>
						</div>
					</div>
					<div class="col-xs-12 formulario">
						<div class="col-xs-6 inputRegister">
							<p class="textoPromedio"><strong>Apellido</strong></p>
						</div>
						<div class="col-xs-6 inputRegister">
							<p class="mdfInfo textoPromedio">{{ Auth::user()->apellido }}</p>
						</div>
					</div>
					<div class="col-xs-12 formulario">
						<div class="col-xs-6 inputRegister">
							<p class="textoPromedio"><strong>Cedula</strong></p>
						</div>
						<div class="col-xs-6 inputRegister">
							<p class="mdfInfo textoPromedio">{{ Auth::user()->cedula }}</p>
						</div>
					</div>
					<div class="col-xs-12 formulario">
						<div class="col-xs-6 inputRegister">
							<p class="textoPromedio"><strong>Email</strong></p>
						</div>
						<div class="col-xs-6 inputRegister">
							<p class="mdfInfo textoPromedio">{{ Auth::user()->email }}</p>
						</div>
					</div>
					<div class="col-xs-12 formulario">
						<div class="col-xs-6 inputRegister">
							<p class="textoPromedio"><strong>Teléfono</strong></p>
						</div>
						<div class="col-xs-6 inputRegister">
							<p class="mdfInfo textoPromedio mdfText">{{ Auth::user()->telefono }}</p>
							<input type="text" name="phone" class="form-control mdfForm" placeholder="Telefono" id="phone" value="{{ Auth::user()->telefono }}">
							
						</div>
					</div>
					<div class="col-xs-12 formulario">
						<div class="col-xs-6 inputRegister">
							<p class="textoPromedio"><strong>(*) Departamento:</strong></p>
						</div>
						<div class="col-xs-6 inputRegister">
							<p class="mdfInfo textoPromedio mdfText">{{ ucfirst($user->dep) }}</p>
							<select name="dep" class="form-control mdfForm" id="estado2">
								<option value="">Seleccione un estado</option>
								@foreach($dep as $d)
									@if($d->id == Auth::user()->department)
										<option value="{{ $d->id }}" selected>{{ $d->nombre }}</option>
									@else
										<option value="{{ $d->id }}">{{ $d->nombre }}</option>
									@endif
								@endforeach
							</select>
							
						</div>
					</div>
					<div class="col-xs-12 formulario">
						<div class="col-xs-6 inputRegister">
							<p class="textoPromedio"><strong>Dirección #1:</strong></p>
						</div>
						<div class="col-xs-6 inputRegister">
							<p class="mdfInfo textoPromedio mdfText">{{ Auth::user()->dir }}</p>
							<textarea name="dir" class="form-control mdfForm" placeholder="Dirección" id="zip_cod"> {{ Auth::user()->dir }}</textarea>
							
						</div>
					</div>	
					<div class="col-xs-12 formulario">
						<div class="col-xs-6 inputRegister">
							<p class="textoPromedio"><strong>Dirección #2:</strong></p>
						</div>
						<div class="col-xs-6 inputRegister">
							<p class="mdfInfo textoPromedio mdfText">{{ Auth::user()->dir2 }}</p>
							<textarea name="dir2" class="form-control mdfForm" placeholder="Dirección" id="zip_cod"> {{ Auth::user()->dir }}</textarea>
							
						</div>
					</div>		
							
					</form>	
						<input type="submit" name="enviar" value="Enviar" class="btn btn-success btn-not-show  botones inputRegister btnSend">
						<button class="btn btn-danger btn-not-show btnCancelMdf botones">Cancelar</button>
				<div class="col-xs-12">
					<div class="col-xs-6">
						<button class="btnMdfShow btn btn-primary">Modificar</button>
					</div>
					<div class="col-xs-6">
						<button class="btn btn-warning" data-toggle="collapse" data-target="#changePass">Cambiar contraseña</button>
					</div>
				</div>
				<div class="clearfix"></div>
				<div id="changePass" class="collapse" style="margin-top:2em;">
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
				</div>
				<div class="col-xs-12" style="margin-top:2em;">
					<div class="col-xs-12">
						<a href="#" data-toggle="collapse" data-target=".tableDir" class="textoPromedio"><i class="fa fa-hand-o-right"></i> Ver direcciones</a>
					</div>
				</div>
				<div class="collapse tableDir">
					<table class="table table-hover textoPromedio">
						<thead>
							<tr>
								<th>Dirección</th>
								<th>Email</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
						@foreach($dir as $d)
							<tr>
								<td>
									{{ $d->dir }}
								</td>
								<td>
									{{ $d->email }}
								</td>
								<td>
									<a href="{{ URL::to('usuario/perfil/modificar-direccion/'.$d->id) }}" class="btn btn-xs btn-warning">Modificar</a>
								</td>
								<td>
									<button class="btn btn-xs btn-danger btnElimDir" data-toggle="modal" href='#modalElimDir' value="{{ $d->id }}">Eliminar</button>
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>
</div>
<div class="modal fade" id="modalElimDir">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<p class="textoPromedio textoNegro">¿Seguro que desea realizar esta acción?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btnModalElimDir">Eliminar</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@stop