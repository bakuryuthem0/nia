@extends('layouts.default')

@section('content')
<div class="hidden-container container-in">
  <div class="titulo">
    <h1>
      {{ $busq }} <a href="{{ URL::previous() }}" class="btn btn-volver" style="float:right;">Volver</a>
    </h1>
  </div>
  <div class="contenido">
    <?php $i = 1;?>
     @foreach($art as $a)
      @if($i%4 == 0)
        <div class="row">
      @endif
            <div class="col-xs-12 col-md-6 col-lg-3 contArtPrinc" data-id="{{ $a->id }}" data-toggle="modal" data-target="#showItem">
              <img src="{{ asset('images/items/'.$a->image) }}" class="imgArtPrinc imgPrinc">
              <ul class="textoPromedio ulNoStyle">
                <li>
                  <label>{{ $a->item_nomb.' - Cod: '.$a->item_cod }}</label>
                </li>
                <li>
                    <p>USD. {{ $a->item_precio }}</p>
                </li>
              </ul>
            </div>
            @if($i%4 == 0)
        <div class="clearfix"></div>
      </div>
      @endif
            <?php $i++; ?>
        @endforeach
  </div>
</div>

<div class="modal fade" id="showItem" tabindex="-1" role="dialog" aria-labelledby="showItem" aria-hidden="true">
  <div class="showItemContent modal-dialog imgLiderUp">
  
    <div class="modal-content">
    <div class="">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    </div>
      <div class="col-xs-12">
        <div class="col-xs-12 contCentrado contdeColor">
          <legend class="ItemTitle textoNegro tituloDelArticulo"></legend>
          <div class="col-xs-4 textoPromedio contDescItem">
            <div class="col-xs-12 noMovil" style="word-break: break-word;">

              <div class="contDescription textoNegro"></div>
            </div>
          @if(Auth::check() && Auth::user()->role != 1)
          <div class="col-xs-12 formulario">
              <a class="btn btnAddWishList" data-toggle="modal" data-target="#addWishList" data-cod-value="" data-price-value="" data-name-value="" value=""><i class="fa fa-heart fa-2x"></i></a>
          </div>
          @else
          <div class="col-xs-12 formulario">
              <a class="btn" href="#" data-toggle="modal" data-target="#loginModal"><i class="fa fa-heart fa-2x" style="colo:white;"></i></a>
          </div>
          @endif
          </div>
          <div class="col-xs-4 contImageItem">
            <div class="cien">
              <img src="" class="zoomed">
            </div>
            <img src="" class="imagenPrincipal" data-src="{{ asset('images/items/') }}" data-zoom-image="">
          </div>
          <div class="contMiscHid">
          </div>
<div class="col-xs-12 decMovil" style="word-break: break-word;">
            <div class="clearfix"></div>
            <div class="contDescription textoNegro textoPromedio"></div>
          </div>
          <div class="col-xs-4 textoPromedio ">
            <div class="col-xs-12">
              <label class="textoNegro"><h2 class="precio"></h2></label>
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
                <a class="btn btn-success" href="#" data-toggle="modal" data-target="#loginModal">Agregar al carrito.</a>
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