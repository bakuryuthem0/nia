@extends('layouts.default')

@section('content')
<div class="hidden-container container-in">
  <div class="titulo"><h1>Mi lista de deseos</h1></div>
  <div class="contenido">
    @if(Session::has('success'))
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<p class="textoPromedio">{{ Session::get('success') }}</p>
	</div>
	@endif
	<div class="col-xs-12">
		<p class="textoPromedio">A continuación se mostrara su lista de deseos. Podra agregar a su lista de deseos si hay disponibilidad.</p>
		<table class="table table-hover" style="margin:5em 0">
			<thead>
				<tr>
					<th></th>
					<th class="textoPromedio">Codigo del articulo</th>
					<th class="textoPromedio">Articulo</th>
					<th class="textoPromedio">Precio</th>
					<th class="textoPromedio">Comprar</th>
				</tr>
			</thead>
			<tbody>
				@foreach($wish as $w)
				<tr class="textoPromedio">
					<td><img src="{{ asset('images/items/'.$w->image) }}" style="width:25%;"></td>
					<td>
						{{ $w->item_cod }}
					</td>
					<td>
						{{ $w->item_nomb }}
					</td>
					<td>{{ $w->item_precio }} USD.</td>
					<td>
						<button class="btn btn-success contArtPrinc" data-id="{{ $w->id }}" data-toggle="modal" data-target="#showItem">Ver</button>
					</td>
					
				</tr>
				@endforeach
			</tbody>
		</table>
		@if(count($wish)<1)
			<div class="alert alert-warning">
			    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			    <p class="textoPromedio">No ha agregado items a su lista de deseos</p>
			</div>
		@endif
	</div>
	
  </div>
</div>
<div class="modal fade" id="showItem" tabindex="-1" role="dialog" aria-labelledby="showItem" aria-hidden="true">
  <div class="showItemContent modal-dialog imgLiderUp">
    <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    </div>
      <div class="col-xs-12">
        <div class="col-xs-12 contCentrado contdeColor">
          <legend class="ItemTitle textoNegro tituloDeColor"></legend>
          <div class="col-xs-4 textoPromedio contDescItem">
            <div class="col-xs-12" style="word-break: break-word;">

              <div class="contDescription textoNegro"></div>
            </div>
         
          </div>
          <div class="col-xs-4 contImageItem">
            <div class="cien">
              <img src="" class="zoomed">
            </div>
            <img src="" class="imagenPrincipal" data-src="{{ asset('images/items/') }}" data-zoom-image="">
          </div>
          <div class="col-xs-4 textoPromedio ">
            <div class="col-xs-12">
              <label class="textoNegro">:<span class="precio"></span></label>
            </div>
            <div class="col-xs-12 formulario">
              <label class="textoNegro">Talla</label>
              <select class="choose form-control selectChoose">
                <option value="" class="seleccioname">Seleccione una talla</option>
                 @foreach(ShowSlides::showTallas() as $talla)
                  <option disabled value="{{ $talla->id }}">{{ $talla->talla_nomb.' - '.$talla->talla_desc }}</option>
                 @endforeach
              </select>
            </div>
            <div class="col-xs-12 formulario">
              <label class="textoNegro">Color</label>
              <ul class="colores">
                <li class="removable textoNegro">Elija una talla</li>
              </ul>
              <input type="hidden" class="values" value="" data-misc-id="">
            </div>
            
            @if(Auth::check() && Auth::user()->role != 1)
            <div class="col-xs-12 formulario">
                <button class="btn btn-success btnAgg" data-toggle="modal" data-target="#addCart" data-cod-value="" data-price-value="" data-name-value="" value="">Agregar al carrito.</button>
            </div>
            @else
            <div class="col-xs-12 formulario">
                <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#loginModal">Agregar al carrito.</a>
            </div>
            @endif
          </div>
        </div>
        <div class="col-xs-12 contImagesMini"></div>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
<div class="modal fade" id="addCart" tabindex="-1" role="dialog" aria-labelledby="modalForggo" aria-hidden="true">
  <div class="forgotPass modal-dialog imgLiderUp">
    <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    </div>
    <div class="textoNegro">
            <h3>Agregar al carrito </h3>
        </div>
        <div class="col-xs-12 formulario textoPromedio">
        <label>Talla</label>
        <select class="chooseModal form-control selectChoose">
          <option value="">Seleccione una talla</option>
          @foreach(ShowSlides::showTallas() as $talla)
          <option disabled value="{{ $talla->id }}">{{ $talla->talla_nomb.' - '.$talla->talla_desc }}</option>
         @endforeach
          
        </select>
      </div>
      <div class="col-xs-12 formulario textoPromedio textoNegro">
        <label>Color</label>
        <select class="colorModal form-control">
          <option value="">Seleccione un color</option>
        </select>
      </div>
      <div class="clearfix"></div>
      <div class="modal-footer">
        <button class="btn btn-success btnAddCart disabled">Agregar</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="addWishList" tabindex="-1" role="dialog" aria-labelledby="modalForggo" aria-hidden="true">
  <div class="forgotPass modal-dialog imgLiderUp">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      </div>
      <div class="textoNegro">
        <h3>Agregar a mi lista de deseos </h3>
      </div>
        <p class="textoNegro textoPromedio">¿Seguro desea agregar este item a su lista de deseos?</p>
        <div class="clearfix"></div>
        <div class="modal-footer">
          <button class="btn btn-danger btnAddMyWishList">Agregar</button>
        </div>
      </div>
  </div>
</div>
@stop