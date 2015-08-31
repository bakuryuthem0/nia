@extends('layouts.default')

@section('content')
<div class="hidden-container container-in">
  <div class="titulo"><h1><strong>{{ Lang::get('lang.term_title13') }}</strong></h1></div>
  <div class="contenido">
  	<div class="container-pol">
	  	<h4 style="text-align:center;">{{ Lang::get('lang.term_title13') }}.</h4>
		<p class="textoPromedio">{{ Lang::get('lang.term_text44') }}</p>
		<h4 class="textoPromedio"><strong>{{ Lang::get("lang.term_title14") }}.</strong> </h4>
		<p class="textoPromedio">{{ Lang::get('lang.term_text45') }}</p>
		<p class="textoPromedio">{{ Lang::get('lang.term_text46') }}</p>
		<p class="textoPromedio">{{ Lang::get('lang.term_text47') }}</p>
		<p class="textoPromedio">{{ Lang::get('lang.term_text48') }}</p>
		<p class="textoPromedio">{{ Lang::get('lang.term_text49') }}</p>
		<h4 class="textoPromedio"><strong>{{ Lang::get("lang.term_title15") }}.</strong> </h4>
		<p class="textoPromedio">{{ Lang::get('lang.term_text50') }}</p>
  	</div>

  </div>
</div>

@stop