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
     <nav role="navigation">
          <?php  $presenter = new Illuminate\Pagination\BootstrapPresenter($pag); ?>
          @if ($pag->getLastPage() > 1)
          <ul class="cd-pagination no-space">
            <?php
              $beforeAndAfter = 2;
           
              //Página actual
              $currentPage = $pag->getCurrentPage();
           
              //Última página
              $lastPage = $pag->getLastPage();
           
              //Comprobamos si las páginas anteriores y siguientes de la actual existen
              $start = $currentPage - $beforeAndAfter;
           
                  //Comprueba si la primera página en la paginación está por debajo de 1
                  //para saber como colocar los enlaces
              if($start < 1)
              {
                $pos = $start - 1;
                $start = $currentPage - ($beforeAndAfter + $pos);
              }
           
              //Último enlace a mostrar
              $end = $currentPage + $beforeAndAfter;
           
              if($end > $lastPage)
              {
                $pos = $end - $lastPage;
                $end = $end - $pos;
              }
           
              //Si es la primera página mostramos el enlace desactivado
              if ($currentPage <= 1)
              {
                echo '<li class="disabled noMovil"><span>&lt;&lt;Primera</span></li>';
              }
              //en otro caso obtenemos la url y mostramos en forma de link
              else
              {
                $url = $pag->getUrl(1);
           
                echo '<li class="noMovil"><a href="'.$url.'">&lt;&lt; Primera</a></li>';
              }
           
              //Para ir a la anterior
              echo '<li class="noMovil">'.$presenter->getPrevious('&lt; Anterior').'</li>';
           
              //Rango de enlaces desde el principio al final, 3 delante y 3 detrás
              echo $presenter->getPageRange($start, $end);
           
              //Para ir a la siguiente
              echo '<li class="noMovil">'.$presenter->getNext('Siguiente &gt;').'</li>';
           
              ////Si es la última página mostramos desactivado
              if ($currentPage >= $lastPage)
              {
                echo '<li class="disabled noMovil"><span>Última</span></li>';
              }
              //en otro caso obtenemos la url y mostramos en forma de link
              else
              {
                $url = $pag->getUrl($lastPage);
           
                echo '<li class="noMovil"><a href="'.$url.'">Última &gt;&gt;</a></li>';
              }
              ?>
            @endif
          </ul>
        </nav> <!-- cd-pagination-wrapper -->
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