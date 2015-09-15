<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/', 'HomeController@getFront');
Route::get('inicio', 'HomeController@getIndex');

Route::get('contacto','HomeController@getContact');
Route::post('contactenos','HomeController@postContact');
Route::get('cambiar-lenguaje/{lang}','HomeController@changeLang');


Route::get('articulos/categoria/{id}','HomeController@getCaTbuscar');
Route::get('articulos/sub-categoria/{id}','HomeController@getSubCatBuscar');
Route::post('cargar-item','HomeController@postItemLoad');
Route::post('articulos/categoria/cargar-item','HomeController@postItemLoad');
Route::post('articulos/sub-categoria/cargar-item','HomeController@postItemLoad');
Route::post('buscar/colores','HomeController@getColors');
Route::post('articulos/categoria/buscar/colores','HomeController@getColors');
Route::post('articulos/sub-categoria/buscar/colores','HomeController@getColors');

Route::get('quienes-somos','HomeController@getAboutUs');
Route::get('terminos-y-condiciones','HomeController@getTerms');
Route::get('politicas-de-privacidad','HomeController@getPol');
Route::group(array('before' =>'no_auth'),function()
{
	Route::get('iniciar-sesion','AuthController@getLogin');
	Route::post('iniciar-sesion/autenticar','AuthController@postLogin');
	Route::get('registro', 'AuthController@getRegister');
	Route::post('registro/enviar','AuthController@postRegister');
	Route::post('registro/buscar-municipio','AuthController@getState');
	Route::post('registro/buscar-parroquia','AuthController@getParroquia');
});

Route::get('articulo/{id}','HomeController@getShowItem');

Route::get('categorias/{subcat}/{id}','HomeController@getSubCatBuscar');
Route::get('categorias/{id}','HomeController@getCatBuscar');

Route::post('busqueda','HomeController@search');

Route::get('administrador', 'AdminController@getLogin');
Route::post('administrador/iniciar-sesion/autenticar','AdminController@postLogin');

Route::group(array('before' =>'auth'),function()
{
	Route::get('mi-lista-de-deseos','UserController@getMyWishList');
	Route::get('mi-perfil','UserController@getProfile');
	/*Rutas del carrito*/
	Route::post('agregar-al-carrito','ItemController@getItem');
	Route::post('vaciar-carrito', 'ItemController@dropCart');
	Route::post('quitar-item', 'ItemController@dropItem');
	Route::post('agregar-item', 'ItemController@addItem');
	Route::post('restar-item','ItemController@restItem');

	Route::post('agregar-lista-de-deseos','ItemController@postMyWishList');

	Route::get('comprar/ver-carrito','ItemController@getCart');
	Route::post('actualizar-al-carrito', 'ItemController@getRefresh');
	Route::post('comprar/ver-carrito/enviar','ItemController@postDir');
	Route::post('comprar/ver-carrito/agragar-y-comprar','ItemController@postPurchaseAndNewDir');
	Route::get('compra/procesar/{id}','ItemController@getProcesePurchase');
	/*rutas usuario */
	Route::get('usuario/perfil','UserController@getProfile');
	Route::post('usuario/modificar-perfil','UserController@postProfile');
	Route::get('usuario/perfil/modificar-direccion/{id}','UserController@getMdfDir');
	Route::post('usuario/perfil/modificar-direccion/enviar','UserController@postMdfDir');
	Route::get('usuario/cambiar-contraseña','UserController@getChangePass');
	Route::post('usuario/cambiar-contraseña/enviar','UserController@postChangePass');

	Route::post('usuario/perfil/eliminar-direccion','UserController@postElimDir');

	Route::get('mis-compras/pago/enviar','ItemController@postPayment');

	Route::get('usuario/mis-compras','UserController@getMyPurchases');
	Route::get('usuario/ver-factura/{id}','UserController@getMyPurchase');
	Route::post('usuario/publicaciones/pago/enviar','ItemController@postSendPayment');

	Route::group(array('before' => 'check_role'), function(){
		Route::get('administrador/inicio','AdminController@getIndex');
		/*Nuevos articulos*/
		Route::post('administrador/ver-articulo/buscar/colores','HomeController@getColors');
		Route::get('administrador/nuevo-articulo','AdminController@getNewItem');
		Route::post('administrador/categoria/buscar-sub-categoria','AdminController@postCatSubCat');
		Route::post('administrador/nuevo-articulo/enviar','AdminController@postNewItem');
		Route::post('administrador/nuevo-articulo/imagenes/eliminar','AdminController@postDeleteImg');
		Route::get('administrador/nuevo-articulo/continuar/{id}/{misc_id}','AdminController@getContinueNew');
		Route::post('administrador/nuevo-articulo/continuar/enviar/{id}/{misc_id}','AdminController@postContinueNew');
		Route::post('administrador/nuevo-articulo/continuar/guardar-cerrar/{id}/{misc_id}','AdminController@postSaveNew');
		Route::post('administrador/nuevo-articulo/imagenes/procesar','AdminController@post_upload');

		Route::post('administrador/modificar-articulo','AdminController@postMdfItem');
		Route::post('administrador/modificar-miscelania','AdminController@postMdfMisc');
		Route::post('administrador/editar-articulo/eliminar-imagen','AdminController@postElimImg');
		Route::post('administrador/cambiar-imagen','AdminController@changeItemImagen');
		Route::post('administrador/agregar-nueva-categoria','AdminController@newCategoriaMdf');
		/**/
		Route::get('administrador/nueva-caracteristica/{id}','AdminController@getNewMisc');
		Route::get('administrador/cambiar-posicion/{id}','AdminController@getNewImgPos');

		Route::post('administrador/cambiar-posicion/cambiar/posiciones','AdminController@postChangePost');
		/*Ver articulos*/
		Route::get('administrador/ver-articulo', 'AdminController@getShowArt');
		Route::get('administrador/ver-articulo/{id}','HomeController@getShowItem');
		Route::post('administrador/ver-articulo/eliminar','AdminController@postElimItem');
		Route::post('administrador/ver-articulo/reactivar','AdminController@postReactItem');
		Route::get('administrador/editar-articulo/{id}','AdminController@getMdfItem');
		/*Categorias*/
		/*nueva*/
		Route::get('categoria/nueva','AdminController@getNewCat');
		Route::post('categoria/nueva/enviar', 'AdminController@postNewCat');

		/*Modificar*/
		Route::get('categoria/ver-categorias','AdminController@getModifyCat');
		Route::get('administrador/ver-categoria/{id}','AdminController@getModifyCatById');
		Route::post('administrador/ver-categoria/modificar/{id}','AdminController@postModifyCatById');
		/*Eliminar*/
		Route::post('categoria/eliminar','AdminController@postElimCat');
		//nueva sub-categoria
		Route::get('categoria/nueva-sub-categoria','AdminController@getNewSubCat');
		Route::post('sub-categoria/nueva/enviar','AdminController@postNewSubCat');
		//ver
		Route::get('sub-categoria/ver-sub-categorias', 'AdminController@getModifySubCat');
		Route::get('administrador/ver-sub-categoria/{id}','AdminController@getModifySubCatById');
		Route::post('administrador/ver-sub-categoria/modificar/{id}','AdminController@postModifySubCatById');
		//eliminar
		Route::post('sub-categoria/eliminar','AdminController@postElimSubCat');
		/**/
		/*Colores*/
		//nuevo
		Route::get('color/nuevo', 'AdminController@getNewColor');
		Route::post('color/nuevo/enviar','AdminController@postNewColor');
		Route::get('talla/nueva','AdminController@getNewTalla');
		Route::post('talla/nueva/enviar','AdminController@postNewTalla');
		Route::get('talla/ver-tallas','AdminController@getShowTallas');
		Route::post('talla/eliminar','AdminController@postElimTalla');
		Route::get('administrador/ver-tallas/{id}','AdminController@getMdfTalla');
		Route::post('talla/modificar/enviar/{id}','AdminController@postMdfTalla');
		//ver
		Route::get('colores/ver-colores', 'AdminController@getModifyColor');
		//Modificar
		Route::get('administrador/ver-color/{id}','AdminController@getModifyColorById');
		Route::post('administrador/ver-color/modificar/{id}','AdminController@postModifyColorById');

		//eliminar
		Route::post('colores/eliminar','AdminController@postElimColor');
		//pagos
		Route::get('administrador/ver-pagos','AdminController@getPayment');
		Route::get('administrador/ver-factura/{id}','AdminController@getPurchases');
		Route::post('administrador/ver-pagos/aprovar','AdminController@postPaymentAprove');
		Route::post('administrador/ver-pagos/rechazar','AdminController@postPaymentReject');
		Route::get('administrador/ver-pagos-aprobados','AdminController@getPaymentAproved');
		//Nuevo admin
		Route::get('administrador/crear-nuevo','AdminController@getNewAdmin');
		Route::post('administrador/crear-nuevo/enviar','AdminController@postNewAdmin');

		Route::get('administrador/cambiar-contraseña','AdminController@getNewPass');
		Route::post('administrador/cambiar-contraseña/enviar','UserController@postChangePass');

		//Nuevo slider
		//unico
		Route::get('administrador/nueva-imagen','AdminController@getNewSlide');
		Route::post('administrador/nueva-imagen/procesar','AdminController@postNewSlide');

		Route::get('administrador/nuevo-slide','AdminController@getNewSlide2');
		Route::post('administrador/nuevo-slide/procesar','AdminController@postNewSlide2');
		//multiple
		Route::post('administrador/nuevos-slides/procesar','AdminController@post_upload_slides2');
		Route::post('administrador/nuevas-imagenes/procesar','AdminController@post_upload_slides');
		Route::post('administrador/nuevos-slides/eliminar','AdminController@postDeleteSlide');
		//editar
		Route::get('administrador/editar-slides','AdminController@getEditSlides');
		Route::post('administrador/editar-slides/actualizar','AdminController@postEditSlides');
		Route::post('administrador/editar-slides/eliminar','AdminController@postElimSlides');
		//Nueva pub
		Route::get('administrador/nueva-publicidad','AdminController@getNewPub');
		//promocion
		Route::get('administrador/nueva-promocion','AdminController@getNewPromotion');
		Route::post('administrador/nueva-publicidad/procesar','AdminController@postNewPub');
		//bancos
		Route::get('administrador/agregar-bancos','AdminController@getNewBank');
		Route::post('administrador/agregar-bancos/enviar','AdminController@postNewBank');
		Route::get('administrador/editar-banco','AdminController@getEditBank');
		Route::get('administrador/editar-banco/{id}','AdminController@getEditBankId');
		Route::post('administrador/editar-bancos/enviar/{id}','AdminController@postEditBankId');
		Route::post('administrador/editar-bancos/eliminar','AdminController@postElimBank');

	});
	
});

Route::post('chequear/email','AuthController@postEmailCheck');
Route::get('cerrar-sesion','AuthController@logOut');

Route::post('pausar','HomeController@postPause');