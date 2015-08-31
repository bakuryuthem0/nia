@extends('layouts.'.$layout)
@section('content')

<div class="row">
		<div class="col-xs-12">
			<div class="col-xs-12 contCentrado contdeColor">
				<h2>Vista previa del articulo</h2>
				<br>
				<br>
				<legend>{{ $art->item_nomb.' - '.$art->item_cod }}</legend>
				<div class="col-xs-4 textoPromedio contDescItem">
					<div class="col-xs-12" style="word-break: break-word;">
						<label class="description">Descripción</label>
						{{ $art->item_desc }}
						<div id="fb-root"></div>
						<div class="fb-like" data-href="{{ Request::url() }}" data-layout="box_count" data-action="like" data-show-faces="true" data-share="true"></div>
						<br>
						<br>
						<a href="{{ URL::previous() }}" class="btn btn-success btn-volver">Volver</a>
					</div>
				</div>
				<div class="col-xs-4 contImageItem">
					<div class="cien">
		              <img src="" class="zoomed">
		            </div>
					<img src="{{ asset('images/items/'.$art->images[0][0]->image) }}" class="imgPrincSelf" data-zoom-image="{{ asset('images/items/'.$art->images[0][0]->image) }}">				
				</div>

				<div class="col-xs-4 textoPromedio contPrecItem">
					<div class="col-xs-12">
						<label>PRECIO EN Nia Boutique:</label>

							@if(isset($art->percent))
								<h3 class="precio">Precio Actual: USD. {{ $art->item_precio-($art->item_precio*$art->percent/100) }}</h3>
								<li class="disabled">Precio Anterior: USD. {{ $art->item_precio }}</li>
							@else
								<h3 class="precio">USD. {{ $art->item_precio }}</h3>
							@endif

					</div>
					<div class="col-xs-12 formulario">
						<label>Talla</label>
						<select class="choose form-control">
							<option value="">Seleccione una talla</option>
							@foreach($tallas as $t)
								<?php $n = 0;?>
								@foreach($art->tallas as $at)
									@if($at->item_talla == $t->id || $at->item_talla == "all")
										<?php $n = 0;?>
										<option value="{{ $t->id }}">{{ strtoupper($t->talla_nomb).' - '.ucfirst($t->talla_desc) }}</option>
										<?php break;?>
									@else
										<?php $n = 1;?>
									@endif
								@endforeach
								@if($n == 1)
									<option class="disabled" disabled value="{{ $t->id }}">{{ strtoupper($t->talla_nomb).' - '.ucfirst($t->talla_desc) }}</option>
								@endif
							@endforeach
						</select>
					</div>
					<div class="col-xs-12 formulario">
						<label>Color</label>
						<ul class="colores">
							<li class="removable">Elija una talla</li>
						</ul>
						<input type="hidden" class="values" value="{{ $art->id }}" data-misc-id="">
					</div>
					

					
				</div>
				<div class="col-xs-12 contImagesMini">
					@foreach($art->images as $images)
						@foreach($images as $i)
							<img src="{{ asset('images/items/'.$i->image) }}" class="imgMini">
						@endforeach
					@endforeach
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
        		<div class="">
                    <h3>Agregar al carrito </h3>
              	</div>
               	<div class="col-xs-12 formulario textoPromedio">
						<label>Talla</label>
						<select class="chooseModal form-control">
							<option value="">Seleccione una talla</option>
							@foreach($tallas as $t)
								<?php $n = 0;?>
								@foreach($art->tallas as $at)
									@if($at->item_talla == $t->id || $at->item_talla == "all")
										<?php $n = 0;?>
										<option value="{{ $t->id }}">{{ strtoupper($t->talla_nomb).' - '.ucfirst($t->talla_desc) }}</option>
										<?php break;?>
									@else
										<?php $n = 1;?>
									@endif
								@endforeach
								@if($n == 1)
									<option class="disabled" disabled value="{{ $t->id }}">{{ strtoupper($t->talla_nomb).' - '.ucfirst($t->talla_desc) }}</option>
								@endif
							@endforeach
						</select>
					</div>
					<div class="col-xs-12 formulario textoPromedio">
						<label>Color</label>
						<select class="colorModal form-control">
							<option value="">Seleccione un color</option>
						</select>
						<input type="hidden" class="values" value="{{ $art->id }}" data-misc-id="">
					</div>
					<div class="clearfix"></div>
					<div class="modal-footer">
						<button class="btn btn-danger btnAddCart disabled">Agregar</button>
					</div>
            </div>
          </div>
      </div>
@stop

@section('postscript')
<script type="text/javascript">
	jQuery(document).ready(function($) {
		if ($(window).width()<991) {
			$('.cd-3d-trigger').popover('show');
			$('.popover').click(function(event) {
				$('.popover').remove();
			});
		}
	});
</script>
@stop