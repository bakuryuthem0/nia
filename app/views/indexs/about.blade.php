@extends('layouts.default')

@section('content')
<div class="hidden-container container-in">
  <div class="titulo"><h1>{{ strtoupper(Lang::get('lang.about_title1')) }}</h1></div>
  <div class="contenido">
  	<h4 style="text-align:center;">{{ Lang::get('lang.about_title2') }}.</h4>
  	<br>
    <p class="textoPromedio">{{ Lang::get('lang.about_text1') }}. </p>
 
	<p class="textoPromedio">{{ Lang::get('lang.about_text2') }}.</p>
 
	<p class="textoPromedio">{{ Lang::get('lang.about_text3') }}</p>
 
  </div>
</div>

@stop