@extends('layouts.default')

@section('content')
<div class="hidden-container container-in">
  <div class="titulo"><h1>{{ Lang::get('lang.menu_my_size') }}</h1></div>
  <div class="contenido">
  	<h4 style="text-align:center;">{{ Lang::get('lang.text_mysize0') }}.</h4>
  	<br>
    <p class="textoPromedio"><strong>{{ Lang::get('lang.title_mysize1') }}</strong>:{{ Lang::get('lang.text_mysize1') }}. </p>
 
	<p class="textoPromedio"><strong>{{ Lang::get('lang.title_mysize2') }}</strong>:{{ Lang::get('lang.text_mysize2') }}.</p>
 
	<p class="textoPromedio"><strong>{{ Lang::get('lang.title_mysize3') }}</strong>:{{ Lang::get('lang.text_mysize3') }}</p>
 
	<p class="textoPromedio"><strong>{{ Lang::get('lang.title_mysize4') }}</strong>:{{ Lang::get('lang.text_mysize4') }}.</p>

	<p class="textoPromedio">{{ Lang::get('lang.text_mysize5') }}.</p>
	<br>
	<h4 style="text-align:center;">{{ Lang::get('lang.title_mysize5') }}</h4>
	<br>
	<p class="textoPromedio">{{ Lang::get("lang.text_mysize6") }}.</p>
	<p class="textoPromedio">{{ Lang::get("lang.text_mysize7") }}. </p>
 	
	<h4 style="text-align:center;" data-toggle="collapse" data-target=".tallasCollapse" class="toCollapse">
		<i class="fa fa-hand-o-right dedo"></i> {{ Lang::get('lang.btn_mysize') }}</h4>
  	<div class="collapse tallasCollapse">
		<p class="textoPromedio">TALLA “S” = MEDIDA 36</p>
		<ul class="textoPromedio">
			<li>{{ Lang::get('lang.title_mysize1') }} = 85 cm / 88 cm</li>
			<li>{{ Lang::get('lang.title_mysize2') }} = 69 cm / 71 cm</li>
			<li>{{ Lang::get('lang.title_mysize3') }} = 65 cm / 67 cm</li>
			<li>{{ Lang::get('lang.title_mysize6') }} = 90 cm / 93 cm</li>
			<li>{{ Lang::get('lang.title_mysize4') }} = 149 cm / 152 cm</li>
		</ul>
	 
		<p class="textoPromedio">TALLA “M” = MEDIDA 38</p>
		<ul class="textoPromedio">
			<li>{{ Lang::get('lang.title_mysize1') }} = 90 cm / 93 cm</li>
			<li>{{ Lang::get('lang.title_mysize2') }} = 74 cm / 76 cm</li>
			<li>{{ Lang::get('lang.title_mysize3') }} = 70 cm / 72 cm</li>
			<li>{{ Lang::get('lang.title_mysize6') }} = 95 cm / 98 cm</li>
			<li>{{ Lang::get('lang.title_mysize4') }} = 156 cm / 160 cm</li>
		</ul>
	 
		<p class="textoPromedio">TALLA “L” = MEDIDA 40</p>
		<ul class="textoPromedio">
			<li>{{ Lang::get('lang.title_mysize1') }} = 97 cm / 100 cm</li>
			<li>{{ Lang::get('lang.title_mysize2') }} = 80 cm / 84 cm</li>
			<li>{{ Lang::get('lang.title_mysize3') }} = 76 cm / 80 cm</li>
			<li>{{ Lang::get('lang.title_mysize6') }} = 102 cm / 105 cm</li>
			<li>{{ Lang::get('lang.title_mysize4') }} = 164 cm / 168 cm</li>
		</ul>
	  
	 	<p class="textoPromedio">TALLA “XL”= MEDIDA 42</p>
		<ul class="textoPromedio">
			<li>{{ Lang::get('lang.title_mysize1') }} = 104 cm</li>
			<li>{{ Lang::get('lang.title_mysize2') }} = 88 cm</li>
			<li>{{ Lang::get('lang.title_mysize3') }} = 84 cm</li>
			<li>{{ Lang::get('lang.title_mysize6') }} = 109 cm</li>
			<li>{{ Lang::get('lang.title_mysize4') }} = 171 cm</li>
		</ul>
	</div>


  </div>
</div>

@stop