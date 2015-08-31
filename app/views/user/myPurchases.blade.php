@extends('layouts.default')

@section('content')
<div class="hidden-container container-in">
  <div class="titulo"><h1>Mis compras</h1></div>
  <div class="contenido">
    @if(Session::has('success'))
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<p class="textoPromedio">{{ Session::get('success') }}</p>
	</div>
	@endif
	<div class="col-xs-12">
		<div class="col-xs-12 formulario">
			<legend>Leyenda</legend>
			<p class="textoPromedio">
				Pendiente: <i class="fa fa-exclamation-circle icon-status-pending icon"></i>				
				- 
				Procesando: <i class="fa fa-clock-o btn-xs icon-status-procesing icon"></i>
				-
				Aprobado: <i class="fa fa-check-circle btn-xs icon-status-success icon"></i>

			</p>
		</div>

		<div class="col-xs-12 formulario"><p class="textoPromedio">A continuación se mostrara su lista de compras</p></div>
			<table class="table table-hover" style="margin:5em 0">
				<thead>
					<tr class="textoPromedio">
						<th>Codigo de factura</th>
						<th>Status</th>
						<th>Dirección</th>
					</tr>
				</thead>
				<tbody>
					@foreach($fac as $f)
					<tr class="textoPromedio">
						<td>{{ $f->id }}</td>
						<td>
							@if($f->pagada == 0)
								<i class="fa fa-exclamation-circle icon-status-pending icon"></i>
							@elseif($f->pagada == -1)
								<i class="fa fa-clock-o btn-xs icon-status-procesing icon"></i>
							@elseif($f->pagada == 1)
								<i class="fa fa-check-circle btn-xs icon-status-success icon"></i>
							@endif
						</td>
						<td>{{ $f->direccion }}</td>
						@if($f->pagada == 0) 
							<td>
								<a href="{{ URL::to('compra/procesar/'.$f->id) }}" class="btn btn-success btn-xs">Pagar</a>
							</td>
						@else
							<td></td>
						@endif
						<td>
							<a target="_blank" href="{{ URL::to('usuario/ver-factura/'.$f->id) }}" class="btn btn-xs btn-info">Ver factura</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		@if(count($fac)<1)
			<div class="alert alert-warning">
			    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			    <p class="textoPromedio">No ha realizado ninguna compra</p>
			</div>
		@endif
	</div>
	
  </div>
</div>

@stop