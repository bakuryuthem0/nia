@extends('layouts.default')

@section('content')
<div class="hidden-container container-in">
  <div class="titulo">
    <h1>
      {{ Lang::get('lang.titulo_5') }} <a href="{{ URL::previous() }}" class="btn btn-volver" style="float:right;">Volver</a>
    </h1>
  </div>
  <div class="contenido">
  		<div class="col-xs-12 contdeColor contEm">
        <legend>Mi carrito</legend>
        @if(Session::has('danger'))
          <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <p class="textoPromedio">{{ Session::get('danger') }}</p>
          </div>
        @endif
             <table class="table table-hover tableCarrito">
               <tr class="textoPromedio">
                 @if(isset($method))
                  <th>
                    Codigo del articulo
                  </th>
                  @endif
                  <th>
                   Imagen
                  </th>
                  <th class="noMovil">
                   Artículo
                  </th>
                  <th class="noMovil">
                   Talla del Artículo
                  </th>
                  <th class="noMovil">
                   Color del Artículo
                  </th>
                  <th class="onlyMovil">
                    Ver
                  </th>
                  @if(!isset($method))
                  <th>
                    Cantidad
                  </th>
                  @else
                  <th class="noMovil">
                    Cantidad
                  </th>
                  @endif
                  <th class="noMovil">
                    Precio Unitario
                  </th>
                  <th class="noMovil">
                    Sub-total
                  </th>
                  @if(!isset($method))
                   <th>
                    Actualizar
                  </th>
                   
                  <th class="noMovil">
                    <button class="btn btn-danger btn-xs btnVaciar">
                      Vaciar
                    </button>
                  </th>
                  @endif
                </tr>
              @if(!isset($method))
              <?php 
              $total = 0; 
              ?>
              @foreach(Cart::content() as $cart)
                <tr class="textoPromedio carItems" id="{{ $cart->id }}">
                  <td class="carItem">
                    <img src="{{ asset('images/items/'.$cart->options['img']) }}" class="carImg">
                  </td>
                  <td class="carItem noMovil">
                    {{ $cart->name }}
                  </td>
                  <td class="carItem noMovil">
                    {{ $cart->options['talla_desc'] }}
                  </td>
                  <td class="carItem noMovil">
                    {{ $cart->options['color_desc'] }}
                  </td>
                  <td class="onlyMovil">
                    <button class="btn btn-success btn-xs btnShowInfoItem" data-name="{{ $cart->name }}" data-talla="{{ $cart->options['talla_desc'] }}" data-color="{{ $cart->options['color_desc'] }}" data-qty="{{ $cart->qty }}" data-precio="{{ $cart->price }}" data-subtotal="{{ $cart->subtotal }}" data-toggle="modal" data-target="#showItemModal">Ver</button>
                  </td>
                  <td class="carItem columnCant">
                    <input class="form-control cantArt" id="input{{ $cart->id }}" value="{{ $cart->qty }}">
                  </td>
                  <td class="carItem noMovil">
                    USD.{{ $cart->price }}
                  </td>
                  <td class="carItem noMovil" id="input{{ $cart->id }}_subtotal">
                    USD.{{ $cart->subtotal }} 
                  </td>
                  <td class="carItem">
                    <button class="btn btn-success btn-xs btnActualizar btn-carrito" data-field-value="#input{{ $cart->id }}" data-talla="{{ $cart->options['talla'] }}" data-color="{{$cart->options['color']}}" data-id="{{ $cart->id }}" value="{{ $cart->rowid }}">
                      Actualizar
                    </button>
                  </td>
                  
                  <td class="carItem noMovil">
                    <button class="btn btn-danger btn-xs btnQuitar btn-carrito" data-url-value="quitar-item" value="{{ $cart->rowid }}">
                      Quitar
                    </button>
                  </td>
                </tr>
                <?php $total = $total+($cart->qty*$cart->price); ?>
              @endforeach
              <tr>
                <td class="noMovil"></td>
                <td class="noMovil"></td>
                <td class="noMovil"></td>
                <td class="noMovil"></td>
                <td class="noMovil"></td>
                <td class="noMovil"></td>
                <td class="noMovil"></td>
                <td><h3>Total:</h3></td>
                <td><h3 class="precio total">USD.{{ $total }}</h3></td>
              </tr>
              @else
                @foreach($items as $cart)
                <tr class="textoPromedio carItems" id="{{ $cart->id }}">
                  <td>
                    {{ $cart->item_cod }}
                  </td>
                  <td class="carItem">
                    <img src="{{ asset('images/items/'.$cart->img->image) }}" class="carImg">
                  </td>
                  <td class="onlyMovil">
                    <button class="btn btn-success btn-xs btnShowInfoItem" data-name="{{ $cart->item_nomb }}" data-talla="{{ $cart->item_talla }}" data-color="{{ $cart->item_color }}" data-precio="{{ $cart->precio }}" data-qty="{{ $cart->qty }}" data-subtotal="{{  $cart->qty*$cart->precio }}" data-toggle="modal" data-target="#showItemModal">Ver</button>
                  </td>
                  <td class="carItem noMovil">
                    {{ $cart->item_nomb }}
                  </td>
                  <td class="carItem noMovil">
                    {{ $cart->item_talla }}
                  </td>
                  <td class="carItem noMovil">
                    {{ $cart->item_color }}
                  </td>
                  <td class="carItem noMovil columnCant">
                    {{ $cart->qty }}
                  </td>
                  <td class="carItem noMovil">
                    USD.{{ $cart->precio }}
                  </td>
                  <td class="carItem noMovil" id="input{{ $cart->id }}_subtotal">
                    USD.{{ $cart->qty*$cart->precio }}
                  </td>
                  <?php $total = $total+($cart->qty*$cart->precio); ?>
                </tr>
              @endforeach
              <tr>
                <td class="noMovil"></td>
                <td class="noMovil"></td>
                <td class="noMovil"></td>
                <td class="noMovil"></td>
                <td class="noMovil"></td>
                <td class="noMovil"></td>
                <td></td>

                <td><h3>Total:</h3></td>
                <td><h3 class="precio total">USD.{{ $total }}</h3></td>
              </tr>
              @endif
            </table>
            @if(!isset($method))<buttom class="btn btn-success continuar" data-toggle="collapse" href="#continuar">Continuar</buttom>@endif
            
    </div>
    @if(!isset($method))
    <div class="collapse contdeColor col-xs-12 scrollTo" id="continuar" style="margin-top:2em;">
      <div class="col-xs-12 col-md-12 containerMovil" style="padding:0px;">
        <form method="POST" action="{{ URL::to('comprar/ver-carrito/enviar') }}">
          <legend>Seleccione la sucursal para envio de fletes chavales s.a.</legend>
          <select autocomplete="off" name="suc" class="form-control" style="margin-bottom:1em;">
            @foreach($suc as $s)
              <option value="{{ $s->id }}">Sucursal {{ ucfirst(strtolower($s->nombre)) }}</option>
            @endforeach
          </select>
          <button class="btn btn-success">Comprar</button>
        </form>
       @if((!empty(Auth::user()->dir) && !is_null(Auth::user()->dir)) || count($dir) > 0)
       {{--<h3>Usar dirección existente</h3>
        <hr>
       <form method="POST" action="{{ URL::to('comprar/ver-carrito/enviar') }}">
        <table class="table table-hover table-dir">
          <thead>
            <tr>
              <th></th>
              <th>Email</th>
              <th>Dirección</th>
            </tr>
          </thead>
          <tbody>--}}
            @if(!empty(Auth::user()->dir) && !is_null(Auth::user()->dir))
               {{--<tr>
                <td class="textoPromedio" ><input type="radio" name="dir" value="user_id"></td>
                <td class="textoPromedio" >{{ Auth::user()->email }}</td>
                <td class="textoPromedio" >{{ Auth::user()->dir }}</td>
              </tr>--}}
            @endif

            @if(count($dir) > 0)
              @foreach($dir as $d)
                 {{--<tr>
                  <td class="textoPromedio" ><input type="radio" name="dir" value="{{ $d->id }}"></td>
                  <td class="textoPromedio" >{{ $d->email }}</td>
                  <td class="textoPromedio" >{{ $d->dir }}</td>
                </tr>--}}
              @endforeach
            @endif
{{--
          </tbody>
        </table>

        <button class="btn btn-success">Comprar</button>
      </form> --}}
      @endif
      </div>
      {{-- <div class="col-xs-12 col-md-6 containerMovil">
        <h3>Usar nueva direccion</h3>
        <hr>
        <p class="bg-info textoPromedio textoNegro" style="padding:0.5em;">En caso de no tener una direccion registrada o desee agregar una nueva llene el siguiente formulario</p>
        <form method="POST" action="{{ URL::to('comprar/ver-carrito/agragar-y-comprar') }}" >
          <label class="textoPromedio">Email.</label>
          <input type="text" class="form-control" name="email" placeholder="Email" value="{{ Input::old('email') }}" required> --}}
          @if ($errors->has('email'))
             @foreach($errors->get('email') as $err)
               {{--<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <p class="textoPromedio">{{ $err }}</p>
              </div>--}}
             @endforeach
          @endif
           {{--<br>
          <label class="textoPromedio">Dirección</label>
          <textarea class="form-control" name="dir" placeholder="Dirección" required>{{ Input::old('dir') }}</textarea>--}}
          @if ($errors->has('dir'))
               @foreach($errors->get('dir') as $err)
                {{-- <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <p class="textoPromedio">{{ $err }}</p>
                </div>--}}
               @endforeach
            @endif
           {{--<br>
          <button class="btn btn-success">Enviar y comprar</button>
        </form>
      </div> --}}
    </div>
    @else
    <div class="contdeColor col-xs-12 scrollTo" style="margin-top:2em;">
      <h3 style="text-align:center;">Metodos de pago</h3>
      <div class="col-xs-12 containerMovil noPadding">
        <h3><i class="fa fa-plus-circle iconToggle" data-toggle="collapse" href="#transferencia"></i> Transferencia en linea</h3>
        <div class="col-xs-12 collapse noPadding" id="transferencia" style="padding:2em;">
          <p class="textoPromedio">Una vez haya realizado su pago, introduzca el número de transacción en la casilla</p>
          <p class="textoPromedio">Datos</p>
          
          <form method="post" action="{{ URL::to('usuario/publicaciones/pago/enviar') }}" enctype="multipart/form-data">
            <div class="col-xs-12 noPadding">
              <div class="col-xs-12 formulario textoPromedio">
                <label>Banco</label>
                  <select name="banco" class="form-control">
                    <option value="">Seleccione el banco</option>
                    @foreach($bancos as $b)
                      <option value="{{ $b->id }}">{{ $b->banco.' - '.$b->num_cuenta }}</option>
                    @endforeach
                  </select>
                  @if ($errors->has('banco'))
                 @foreach($errors->get('banco') as $err)
                  <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p class="">{{ $err }}</p>
                  </div>
                 @endforeach
              @endif
              </div>
              <div class="col-xs-12 formulario textoPromedio">
                <label>Banco remitente (opcional)</label>
                <input type="text" name="bank_ext" placeholder="Banco remitente" class="form-control" value="{{ Input::old('bank_ext') }}">
                @if ($errors->has('bank_ext'))
                 @foreach($errors->get('bank_ext') as $err)
                  <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p class="">{{ $err }}</p>
                  </div>
                 @endforeach
              @endif
              </div>
              <div class="col-xs-12 formulario textoPromedio">
                <label>Fecha de transacción</label>
                <input type="text" id="fecha" name="fecha" placeholder="DD-MM-YYYY" class="form-control" value="{{ Input::old('fecha') }}">
                @if ($errors->has('fecha'))
                 @foreach($errors->get('fecha') as $err)
                  <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p class="">{{ $err }}</p>
                  </div>
                 @endforeach
              @endif
              </div>
              <div class="col-xs-12 formulario textoPromedio">
                <label>Bauche</label>
                <p class="bg-info" style="padding:0.5em;color:black;"><i class="fa fa-exclamation-triangle"></i> Introduzca una imagen del bouche de su transacción</p>
                <input type="file" id="numTransVal" name="transNumber">
                @if ($errors->has('transNumber'))
                 @foreach($errors->get('transNumber') as $err)
                  <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p class="">{{ $err }}</p>
                  </div>
                 @endforeach
              @endif
              </div>
                <input type="hidden" name="factId" value="{{ $id }}">
                <input type="hidden" name="total" value="{{ $total }}">
                
              <button class="btn btn-success" style="margin-top:1em;">Enviar</button>
                <a class="btn btn-primary"  data-toggle="modal" data-target="#myModalBancos" style="margin-top:1em;">CUENTAS Y ENTIDADES BANCARIAS.</a>
            </div>
          </form>
        </div>
      </div>

    </div>
    @endif
  </div>
</div>
     
  </div>
</div>
<div class="modal fade" id="myModalBancos" tabindex="-1" role="dialog" aria-labelledby="myModalBancos" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title textoNegro" id="myModalLabel">Lista de bancos.</h4>
          <p class="textoPromedio textoNegro">Datos</p>
          <ul class="textoPromedio textoNegro">
            <li>Nombre:  Nijma Shehaded.</li>
          </ul>
          @if(isset($bancos))
          @foreach($bancos as $b)
          <div class="col-xs-12 formulario textoPromedio textoNegro">
            <label>{{ $b->banco }}</label>
            <li>Numero de cuenta: {{ $b->num_cuenta.' - Tipo de cuenta: '.$b->tipo }}</li>
            <a href="{{ URL::to($b->link) }}" target="_blank"><img src="{{ URL::to('images/bancos/'.$b->imagen) }}" style="  margin: 0 auto;display: block;"></a>
          </div>
          @endforeach
          @endif
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
</div>
<div class="modal fade" id="showItemModal" tabindex="-1" role="dialog" aria-labelledby="myModalBancos" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header textoNegro">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" id="myModalLabel">Información del articulo.</h4>
          <br>
          <div class="col-xs-12 formulario textoPromedio itemNameModal textoNegro">
          </div>
          <div class="col-xs-12 formulario textoPromedio itemTallaModal textoNegro">
          </div>
          <div class="col-xs-12 formulario textoPromedio itemColorModal textoNegro">
          </div>
          <div class="col-xs-12 formulario textoPromedio itemPrecioModal textoNegro">
          </div>
          <div class="col-xs-12 formulario textoPromedio itemSubtotalModal textoNegro">
          </div>
          <div class="col-xs-12 formulario textoPromedio itemQtylModal textoNegro" >
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
</div>
@stop

@section('postscript')
 <script>
   $( "#fecha" ).datepicker({
      inline: true,
      showAnim: 'fadeIn',
      dateFormat: 'dd-mm-yy',
      showOtherMonths: true,
      selectOtherMonths: true
    });
  </script>
@stop