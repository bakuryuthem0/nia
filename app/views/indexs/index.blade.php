@extends('layouts.default')

@section('content')
<div class="hidden-container container-in">
  <div class="titulo"><h1>{{ Lang::get('lang.titulo_1') }}</h1></div>
  <div class="contenido">
    @foreach($cats as $c)
    <div class="col-xs-12">
      <h3><a href="{{ URL::to('articulos/categoria/'.$c->id) }}">{{ $c->cat_desc }}</a></h3>
      <div class="mySlide">
      @foreach($c->subcat as $s)
        <div>
          <a href="{{ URL::to('articulos/sub-categoria/'.$s->id) }}">
            <img src="{{ asset('images/categorias/'.$s->img) }}">
            <div class="tituloCat">
              <h3>{{ $s->sub_desc }}</h3>
            </div>
          </a>
        </div>
      @endforeach
      </div>
    </div>
    @endforeach
    
  </div>
</div>
@stop

@section('postscript')
   <script type="text/javascript">
          $(document).ready(function(){
            $('.mySlide').slick({
              adaptiveHeight: true,
              accessibility:true,
              autoplay    : true,
              autoplaySpeed : 5000,
              dots: false,
              infinite: true,
              speed: 300,
              slidesToShow: 4,
              slidesToScroll: 1,
            });
            
            /*$('.fade').slick({
              dots: true,
              infinite: true,
              speed: 500,
              fade: true,
              cssEase: 'linear',
              adaptiveHeight: true,
              autoplay    : true,
              autoplaySpeed : 5000
            });
            */
          });
    </script>
@stop