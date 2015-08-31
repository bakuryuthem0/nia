<?php

Class ShowSlides{
	static function show()
	{
		$slides = Slides::where('deleted','=',0)->where('pos','=',1)->where('active','=',1)->get();
		foreach ($slides as $s) {
			echo ' <div class="front"><img src="'.asset('images/slides-top/'.$s->image).'"/></div>';
		}

	}
	static function showTallas()
	{
		$tallas = Tallas::where('deleted','=',0)->get();
		return $tallas;
	}
}