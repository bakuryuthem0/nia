<?php

class UserController extends Controller {

	
	public function getProfile()
	{
		$title ="Cambiar Perfil | Nia Boutique.com";

		$user = User::where('usuario.id','=',Auth::user()->id)
		->leftJoin('departamento','departamento.id','=','usuario.department')
		->get(array(
			'usuario.*',
			'departamento.nombre as dep'
		));
		$dep = Department::get();
		$dir = Dir::where('user_id','=',Auth::user()->id)
		->where('deleted','=',0)
		->get();
		if (!empty($user) && $user != "" && !is_null($user) ) {
			return View::make('user.profile')
			->with('title',$title)
			->with('dep',$dep)
			->with('user',$user[0])
			->with('dir',$dir);
		}		
		
	}
	public function postProfile()
	{
		$input = Input::all();
		$user = User::find(Auth::user()->id);
		
		if (!empty($input['phone']) && $user->telefono != $input['phone']) {
			$user->telefono = $input['phone'];
		}
		if (!empty($input['dep']) && $user->department != $input['dep']) {
			$user->department = $input['dep'];
		}
		if (!empty($input['dir']) && $user->dir != $input['dir']) {
			$user->dir = $input['dir'];
		}
		if (!empty($input['dir2']) && $user->dir2 != $input['dir2']) {
			$user->dir2 = $input['dir2'];
		}
		if($user->save())
		{
			
			Session::flash('success', 'Datos Cambiados correctamente. Le hemos enviado un correo electrónico como seguridad.');
			return Redirect::back();
		}else{
			Session::flash('error','Error no se pudo modificar los datos');
			return Redirect::back();
		}
	}
	public function getMyPurchases()
	{
		$title = "Mis compras | Nia Boutique.com";
		$fac = Facturas::leftJoin('direcciones','direcciones.id','=','facturas.dir')
		->where('facturas.user_id','=',Auth::user()->id)
		->orderBy('facturas.id','DESC')
		->get(array(
			'facturas.*',
			'direcciones.dir as direccion'
		));
		return View::make('user.myPurchases')
		->with('title',$title)
		->with('fac',$fac);
	}
	public function getMyPurchase($id)
	{
		$title = "Factura";
		$fac   = Facturas::find($id);
		$user = User::find($fac->user_id);
		$aux = FacturaItem::where('factura_id','=',$id)->get(array('item_id','item_qty'));
		$i = 0;
		foreach ($aux as $a) {
			$b = Items::find($a->item_id);
			$b->qty = $a->item_qty;
			$aux = Misc::where('item_id','=',$a->item_id)->where('deleted','=',0)->first();
			$b->img = Images::where('misc_id','=',$aux->id)->where('deleted','=',0)->first(); 
			$item[$i] = $b;
			$i++;

		}
		return View::make('user.factura')
		->with('fact',$item)
		->with('title',$title)
		->with('user',$user)
		->with('factura',$fac);
	}
	public function getMyWishList()
	{
		$title = 'Mis articulos | Nia Boutique.com';
		$wish  = Wish::join('item','item.id','=','wish_list.item_id')
		->join('miscelanias','item.id','=','miscelanias.item_id')
		->leftJoin('images','miscelanias.id','=','images.misc_id')
		->groupBy('item.id')
		->where('user_id','=',Auth::user()->id)
		->where('item.deleted','=',0)
		->where('wish_list.deleted','=',0)
		->get(array(
			'images.image',
			'item.*'
		));

		return View::make('user.wishlist')
		->with('title',$title)
		->with('wish',$wish);
	}
	public function getMdfDir($id)
	{
		$dir = Dir::find($id);
		$title = 'Modificar dirección | Nia Boutique.com';
		return View::make('user.mdfDir')
		->with('title',$title)
		->with('dir',$dir);
	}

	public function postMdfDir()
	{
		$inp = Input::all();
		$rules = array(
			'dir' 	=> 'required',
			'email'	=> 'required|email'
		);
		$msg = array(
			'required' => 'El campo es obligatorio',
			'email'	   => 'El email es invalido'
		);
		$validator = Validator::make($inp, $rules, $msg);
		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput();
		}
		$dir = Dir::find($inp['id']);
		$dir->dir 	= $inp['dir'];
		$dir->email = $inp['email'];
		if ($dir->save()) {
			Session::flash('success', 'Se ha modificado la dirección satisfactoriamente.');
			return Redirect::to('usuario/perfil');
		}else
		{
			Session::flash('error', 'Error al guardar la modificación.');
			return Redirect::back();
		}
	}
	public function postElimDir()
	{
		$id = Input::get('id');
		$dir = Dir::find($id);
		$dir->deleted = 1;
		if ($dir->save()) {
			return Response::json(array(
				'type' 	=> 'success',
				'msg'	=> 'Se ha eliminado la dirección.'
			));
		}else
		{
			return Response::json(array(
				'type' 	=> 'danger',
				'msg'	=> 'Error al eliminar la dirección.'
			));
		}
	}
	public function getChangePass()
	{
		$title = "Cambiar contraseña";
		return View::make('indexs.changePass')
		->with('title',$title);
	}
	public function postChangePass()
	{
		$inp 	= Input::all();
		$user = User::find(Auth::user()->id);
		if (!Hash::check($inp['passnew'], $user->password)) {
			Session::flash('error', 'La contraseña actual es incorrecta.');
			return Redirect::back();
		}
		if($inp['password'] != $inp['password_re'])
		{
			Session::flash('error', 'Las contraseñas no concuerdan.');
			return Redirect::back();
		}

		$user->password = Hash::make($inp['password']);
		if ($user->save()) {
			Session::flash('success', 'Contraseña cambiada satisfactoriamente.');
			/*$data = array(
				'clave' => $inp['password']
			);
			Mail::send('emails.newPass', $data, function ($message) use ($inp){
			    $message->subject('Correo cambio de clave Nia Boutique.com');
			    $message->to('someemail@Nia Boutique.com');
			});*/
			return Redirect::back();
		}else
		{
			Session::flash('error', 'Error al cambiar la contraseña.');
			return Redirect::back();
		}

	}
}