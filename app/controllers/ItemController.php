<?php

class ItemController extends BaseController {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function getItem()
	{
		if (Request::ajax()) {
			$inp = Input::all();
			$misc = Misc::where('item_id','=',$inp['id'])
			->where('item_talla','=',$inp['talla'])
			->where('item_color','=',$inp['color'])
			->where('deleted','=',0)->first();

			$aux = Misc::where('item_id','=',$inp['id'])->where('deleted','=',0)->first();

			$img = Images::where('deleted','!=',1)->where('misc_id','=',$aux->id)->first();
			$talla = Tallas::find($inp['talla']);
			$color = Colores::find($inp['color']);
			Cart::add(array(
				'id' => $inp['id'],
				'name' => $inp['name'],
				'qty' => 1,
				'options' =>array(
					'misc' 			=> $misc->id, 
					'img' 			=> $img->image,
					'talla'			=> $inp['talla'],
					'talla_desc'	=> $talla->talla_desc,
					'color'			=> $inp['color'],
					'color_desc'	=> $color->color_desc
					),
				'price' => $inp['price']
				));
			$rowid = Cart::search(array('id' => $inp['id'],'options' => array('talla' => $inp['talla'],'color' => $inp['color'])));
			$item = Cart::get($rowid[0]);

			
			return Response::json(array(
				'rowid'		=> $rowid[0],
				'img' 		=> $img->image,
				'id' 		=> $item->id,
				'name' 		=> $item->name,
				'talla'		=> $talla->talla_desc,
				'color'		=> $color->color_desc,
				'qty' 		=> $item->qty,
				'price' 	=> $item->price,
				'subtotal'	=> $item->subtotal,
				'cantArt' 	=> Cart::count(),
				'total' 	=> Cart::total()
			));
		}
	}
	public function addItem()
	{
		if (Request::ajax()) {
			$id = Input::get('id');
			$cart = Cart::get($id);
			$qty = $cart->qty;
			Cart::update($id,$qty+1);
			$count = Cart::count();
			$total = Cart::total();
			return Response::json(array('type' => 'success','count' => $count,'total' => $total,'qty' => $cart->qty,'id' => $cart->id,'subtotal'=>$cart->subtotal));
		}
	}
	public function dropItem()
	{
		if (Request::ajax()) {
			$id = Input::get('id');
			$cart = Cart::get($id);
			Cart::remove($id);
			$count = Cart::count();
			$total = Cart::total();
			return Response::json(array('type' => 'success','id' =>$cart->id,'count' => $count,'total' => $total));
		}
	}
	public function dropCart()
	{
		if (Request::ajax()) {
			Cart::destroy();
			
			return Response::json(array('type' => 'success'));
		}
		
	}
	public function restItem()
	{
		if (Request::ajax()) {
			$id = Input::get('id');
			$cart = Cart::get($id);
			$qty = $cart->qty;
			Cart::update($id,$qty-1);
			$count = Cart::count();
			$total = Cart::total();
			return Response::json(array('type' => 'success','count' => $count,'total' => $total,'qty' => $cart->qty,'id' => $cart->id,'subtotal'=>$cart->subtotal));
		}
	}
	public function getCart()
	{
		$title = "Mi carrito";
		$c   = Dir::where('user_id','=',Auth::user()->id)->count();
		if ($c > 0) {
			$dir   = Dir::where('user_id','=',Auth::user()->id)->get();
		}else{
			$dir   = array();
		}
		return View::make('indexs.showCart')
		->with('title',$title)
		->with('dir',$dir);
	}
	public function getRefresh()
	{
		if (Request::ajax()) {
			$item_id= Input::get('item_id');
			$id 	= Input::get('id');
			$qty 	= Input::get('qty');
			$talla 	= Input::get('talla');
			$color 	= Input::get('color'); 
			$misc = Misc::where('item_talla','=',$talla)
			->where('item_id','=',$item_id)
			->where('item_color','=',$color)
			->pluck('item_stock');
			if ($misc < $qty) {
				return Response::json(array('type' => 'danger'));
			}
			$cart 	= Cart::get($id);
			Cart::update($id,$qty);
			$count 	= Cart::count();
			$total 	= Cart::total();
			return Response::json(array('type' => 'success','count' => $count,'total' => $total,'qty' => $cart->qty,'id' => $cart->id,'subtotal'=>$cart->subtotal));
		}
	}
	public function postDir()
	{
	if (Cart::count()<1) {
			Session::flash('danger','Error, no posee articulos en el carrito');
			return Redirect::back();
		}
		$id = Input::get('dir');
		if (empty($id) || is_null($id)) {
			Session::flash('error', 'Debe seleccionar una dirección.');
			return Redirect::back();
		}
		if ($id == 'user_id') {
			$dir = Dir::where('user_id','=',Auth::user()->id)->where('user_dir','=',1)->first();
			if (count($dir)>0) {
				$id = $dir->id;
			}else
			{
				$dir = new Dir;
				$dir->user_id = Auth::user()->id;
				$dir->email   = Auth::user()->email;
				$dir->dir 	  = Auth::user()->dir;
				$dir->user_dir= 1;
				$dir->save();
				$id = $dir->id;
			}
		}
		$fac = new Facturas;
		$fac->user_id =  Auth::user()->id;
		$fac->dir     = $id;
		if($fac->save())
		{
			foreach (Cart::content() as $c) {
				$misc = Misc::find($c->options['misc']);
				$misc->item_stock = $misc->item_stock-$c->qty;
				$misc->save();

				$itemFac = new FacturaItem;
				$itemFac->factura_id = $fac->id;
				$itemFac->item_id    = $c->id;
				$itemFac->item_qty	 = $c->qty;
				$itemFac->item_talla = $c->options['talla'];
				$itemFac->item_color = $c->options['color'];
				$itemFac->item_precio= $c->price;
				$itemFac->save();
			}
			Cart::destroy();
			return Redirect::to('compra/procesar/'.$fac->id);			
		}
	}
	public function postPurchaseAndNewDir()
	{
	if (Cart::count()<1) {
			Session::flash('danger','Error, no posee articulos en el carrito');
			return Redirect::back();
		}
		$input = Input::all();
		$rules = array(
			'email' => 'required|email',
			'dir'   => 'required'
		);
		$msg = array(
			'required' => 'Campo requerido',
			'email'	   => 'El campo debe ser un email'
		);
		$validator = Validator::make($input,$rules,$msg);
		if ($validator->fails()) {
			Redirect::back()->withError($validator)->withInput();
		}
		$dir = new Dir;
		$dir->user_id = Auth::user()->id;
		$dir->email   = $input['email'];
		$dir->dir 	  = $input['dir'];
		if ($dir->save()) {
			$fac = new Facturas;
			$fac->user_id =  Auth::user()->id;
			$fac->dir 	  = $dir->id;
			if($fac->save())
			{

				foreach (Cart::content() as $c) {
					$misc = Misc::find($c->options['misc']);
					$misc->item_stock = $misc->item_stock-$c->qty;
					$misc->save();

					$itemFac = new FacturaItem;
					$itemFac->factura_id = $fac->id;
					$itemFac->item_id    = $c->id;
					$itemFac->item_qty	 = $c->qty;
					$itemFac->item_talla = $c->options['talla'];
					$itemFac->item_color = $c->options['color'];
					$itemFac->item_precio= $c->price;
					$itemFac->save();
				}
				Cart::destroy();
				return Redirect::to('compra/procesar/'.$fac->id);			
			}
		}
	}
	public function getProcesePurchase($id)
	{
		$title = "Metodo de pago | Nia Boutique.com";
		$fac = Facturas::find($id);
		$x 	 = FacturaItem::where('factura_id','=',$id)->sum('item_qty');
		$aux = FacturaItem::where('factura_id','=',$id)->get(array('item_id','item_qty','item_talla','item_color','item_precio'));
		$i = 0;
		$auxT = 0;
		$auxQ = 0;
		$p = '';
		foreach ($aux as $a) {
			$b = Items::where('item.id','=',$a->item_id)->first();
			$p = $p.$b->item_nomb.', ';
			$b->qty = $a->item_qty;
			$b->precio = $a->item_precio;
			$b->item_talla = Tallas::where('id','=',$a->item_talla)->pluck('talla_desc');
			$b->item_color = Colores::where('id','=',$a->item_color)->pluck('color_desc');
			$auxT = $auxT+($b->qty*$b->item_precio);
			$auxQ = $auxQ+$b->qty;
			$aux = Misc::where('item_id','=',$a->item_id)->where('deleted','=',0)->first();
			$b->img = Images::where('misc_id','=',$aux->id)->where('deleted','=',0)->first(); 
			$item[$i] = $b;
			$i++;

		}
		$total = 0;
		$method = 'hola';
		$bancos = Bancos::where('deleted','=',0)->get();
		return View::make('indexs.showCart')
		->with('title',$title)
		->with('method',$method)
		->with('total',$total)
		->with('items',$item)
		->with('id',$id)
		->with('bancos',$bancos);
	}

	public function postSendPayment(){
		$input = Input::all();
		$id = $input['factId'];
		$rules = array(
			'transNumber' => 'required',
			'banco'		  => 'required',
			'fecha'		  => 'required'
		);
		$messages = array(
			'required' => 'El campo es obligatorio.',
			'numeric' => 'El campo debe ser un número.',
			);
		$validator = Validator::make($input, $rules, $messages);
		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput();
		}
		$fac 			= Facturas::find($id);

		$fac->banco 	= $input['banco'];
		if (!empty($input['bank_ext'])) {
			$fac->banco_ext = $input['bank_ext'];
		}
		if (Input::hasFile('transNumber')) {
			$file = Input::file('transNumber');
			if (file_exists('images/pagos/'.$file->getClientOriginalName())) {
				//guardamos la imagen en public/imgs con el nombre original
	            $i = 0;//indice para el while
	            //separamos el nombre de la img y la extensión
	            $info = explode(".",$file->getClientOriginalName());
	            //asignamos de nuevo el nombre de la imagen completo
	            $miImg = $file->getClientOriginalName();
	            //mientras el archivo exista iteramos y aumentamos i
	            while(file_exists('images/pagos/'.$miImg)){
	                $i++;
	                $miImg = $info[0]."(".$i.")".".".$info[1];              
	            }
	            //guardamos la imagen con otro nombre ej foto(1).jpg || foto(2).jpg etc
	            $file->move("images/pagos/",$miImg);
	            if($miImg != $file->getClientOriginalName()){
	            	$fac->num_trans = $miImg;
	            }
			}else
			{
				$file->move("images/pagos/".$id,$file->getClientOriginalName());
	           	$fac->num_trans = $file->getClientOriginalName();
			}
			
		}
		$fac->fech_trans= $input['fecha'];
		$fac->pagada 	= -1;
		if ($fac->save()) {
			$subject = "Correo de administrador";
			$data = array(
				'subject' => $subject,
				'createBy'=> Auth::user()->username,
				'monto'   => $input['total']
			);
			$to_Email = 'ejemplo@gmail.com';
			Mail::send('emails.newPayment', $data, function($message) use ($input,$to_Email,$subject)
			{
				$message->to($to_Email)->from('sistema@niaboutique.com')->subject($subject);
			});
			Session::flash('success', 'Pago enviado, pronto procesaremos su pago');
			return Redirect::to('usuario/mis-compras');
		}else
		{
			Session::flash('danger', 'Error al guardar el pago');
			return Redirect::back();
		}
	}
	public function postMyWishList()
	{
		if (Request::ajax()) {
			$id = Input::get('id');
			$wish = Wish::where('item_id','=',$id)->where('deleted','=',0)->count();
			if ($wish > 0) {
				return Response::json(array('type' => 'warning'));
			}
			$wish = new Wish;
			$wish->item_id = $id;
			$wish->user_id = Auth::user()->id;
			if ($wish->save()) {
				return Response::json(array('type' => 'success'));
			}else
			{
				return Response::json(array('type' => 'danger'));
			}
		}
	}
}