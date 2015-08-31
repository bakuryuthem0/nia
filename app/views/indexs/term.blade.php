@extends('layouts.default')

@section('content')
<div class="hidden-container container-in">
  <div class="titulo"><h1>{{ Lang::get('lang.term_title0') }}</h1></div>
  <div class="contenido">
  	<h4 style="text-align:center;">{{ Lang::get('lang.term_title0') }}.</h4>

	<p class="textoPromedio">{{ Lang::get("lang.term_text1") }}.</p>
	<p class="textoPromedio"><strong>{{ Lang::get("lang.term_text1") }}.</strong> </p>
 	<ol class="termol">
		<li>
			<strong><h4>{{ Lang::get('lang.term_title1') }}</h4></strong>
			<p>{{ Lang::get('lang.term_text3') }}</p>
			<ul class="noStyle">
				<li><p><label class="point">1.1.</label> {{ Lang::get('lang.term_text4') }}</p></li>
				<li><p><label class="point">1.2.</label> {{ Lang::get('lang.term_text5') }}</p></li>
				<li><p><label class="point">1.3.</label> {{ Lang::get('lang.term_text6') }}</p></li>

			</ul>
		</li>
		<li>
			<strong><h4>{{ Lang::get('lang.term_title2') }}</h4></strong>
			<p>{{ Lang::get('lang.term_text7') }}</p>
			<ul class="noStyle">
				<li><p><label class="point">2.1.</label> {{ Lang::get('lang.term_text8') }}</p></li>
				<li><p><label class="point">2.2.</label> {{ Lang::get('lang.term_text9') }}</p></li>
				<li><p><label class="point">2.3.</label> {{ Lang::get('lang.term_text10') }}</p></li>
				<li><p><label class="point">2.4.</label> {{ Lang::get('lang.term_text11') }}</p></li>
				<li><p><label class="point">2.5.</label> {{ Lang::get('lang.term_text12') }}</p></li>
			</ul>
		</li>
		<li>
			<strong><h4>{{ Lang::get('lang.term_title3') }}</h4></strong>
			<p>{{ Lang::get('lang.term_text13') }}</p>
			<ul class="noStyle">
				<li><p><label class="point">3.1.</label> {{ Lang::get('lang.term_text14') }}</p></li>
				<li><p><label class="point">3.2.</label> {{ Lang::get('lang.term_text15') }}</p></li>
			</ul>
		</li>
		<li>
			<strong><h4>{{ Lang::get('lang.term_title4') }}</h4></strong>
			<p>{{ Lang::get('lang.term_text16') }}</p>
			<strong><h4>{{ Lang::get('lang.term_subtitle1') }}</h4></strong>
			<ul class="noStyle">
				<li>
					<p><label class="point">4.1.</label> {{ Lang::get('lang.term_text17') }}</p>
					<ul class="noStyle">
						<li><p><label class="point">4.1.1.</label> {{ Lang::get('lang.term_text18') }}</p></li>
						<li><p><label class="point">4.1.2.</label> {{ Lang::get('lang.term_text19') }}</p></li>
						<li><p><label class="point">4.1.3.</label> {{ Lang::get('lang.term_text20') }}</p></li>
					</ul>
				</li>
				<li><p><label class="point">4.2.</label> {{ Lang::get('lang.term_text21') }}</p></li>
			</ul>
			<p>{{ Lang::get('lang.term_text22') }}</p>
		</li>
		<li>
			<strong><h4>{{ Lang::get('lang.term_title5') }}</h4></strong>
			<p>{{ Lang::get('lang.term_text23') }}</p>
		</li>
		<li>
			<strong><h4>{{ Lang::get('lang.term_title6') }}</h4></strong>
			<p>{{ Lang::get('lang.term_text24') }}</p>
			<ul class="noStyle">
				<li><p><label class="point">6.1.</label> {{ Lang::get('lang.term_text25') }}</p></li>
				<li><p><label class="point">6.2.</label> {{ Lang::get('lang.term_text26') }}</p></li>
				<li><p><label class="point">6.3.</label> {{ Lang::get('lang.term_text27') }}</p></li>
				<li><p><label class="point">6.4.</label> {{ Lang::get('lang.term_text28') }}</p></li>
				<li><p><label class="point">6.5.</label> {{ Lang::get('lang.term_text29') }}</p></li>
			</ul>
		</li>
		<li>
			<strong><h4>{{ Lang::get('lang.term_title7') }}</h4></strong>
			<p>{{ Lang::get('lang.term_text30') }}</p>
			<ul class="noStyle">
				<li><p><label class="point">7.1.</label> {{ Lang::get('lang.term_text31') }}</p></li>
				<li><p><label class="point">7.2.</label> {{ Lang::get('lang.term_text32') }}</p></li>
				<li><p><label class="point">7.3.</label> {{ Lang::get('lang.term_text33') }}</p></li>
				<li><p><label class="point">7.4.</label> {{ Lang::get('lang.term_text34') }}</p></li>
			</ul>
		</li>
		<li>
			<strong><h4>{{ Lang::get('lang.term_title8') }}</h4></strong>
			<p>{{ Lang::get('lang.term_text35') }}</p>
			<p>{{ Lang::get('lang.term_text36') }}</p>
		</li>
		<li>
			<strong><h4>{{ Lang::get('lang.term_title9') }}</h4></strong>
			<p>{{ Lang::get('lang.term_text37') }}</p>
			<p>{{ Lang::get('lang.term_text38') }}</p>
			<p>{{ Lang::get('lang.term_text39') }}</p>
		</li>
		<li>
			<strong><h4>{{ Lang::get('lang.term_title10') }}</h4></strong>
			<p>{{ Lang::get('lang.term_text40') }}</p>
		</li>
		<li>
			<strong><h4>{{ Lang::get('lang.term_title11') }}</h4></strong>
			<p>{{ Lang::get('lang.term_text41') }}</p>
			<p>{{ Lang::get('lang.term_text42') }}</p>
		</li>
		<li>
			<strong><h4>{{ Lang::get('lang.term_title12') }}</h4></strong>
			<p>{{ Lang::get('lang.term_text43') }}</p>
		</li>
	</ol>

  </div>
</div>

@stop