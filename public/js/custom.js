jQuery(document).ready(function($) {
	if ($(window).width() < 991) {
		$('.cd-pagination  li:not(.paraMovil)').css({
			'display':'none',
		});
	}
});
jQuery(document).ready(function($) {
	function cambiarFondo()
	{
		var origin = ['0% 0% 0px','0% 100% 0px','100% 0% 0px','100% 100% 0px','50% 50% 0px'];
		var option = [4,1,3,0,4,3,2,1,2,0];
		var rand = Math.ceil(Math.random()*10);
		
		if ($('.front').next().length > 0) {

			$('.front').removeClass('front').addClass('back').next('div').removeClass('back').addClass('front');
			
		}else
		{
			$('.front').removeClass('front').addClass('back');
			$('.carousel').children('div:first-child').addClass('front').removeClass('back')

		}
		$('.front').css({
				'transform-origin' : origin[option[rand]]
			});
	}
	if ($(window).width() > 991) {
		setInterval(cambiarFondo, 10000);
		
	};
	$('.navicon').click(function(event){
		if($('.hidden-container').hasClass('container-in'))
		{
			$('.container-in').removeClass('container-in');

		}else
		{
			$('.hidden-container').addClass('container-in');
		}
		if ($('.navicon').hasClass('navicon-in')) {
			$('.navicon-in').removeClass('navicon-in');
			$('.navicon-in-col').removeClass('navicon-in-col');
			$('.active').removeClass('active');
			$('.si-in').removeClass('si-in');
		}else
		{
			$('.navicon').addClass('navicon-in');
			$('header').addClass('active');
			$('.nav-bar > .icon').addClass('navicon-in-col');
			$('.no-in').addClass('si-in');
		}
	});
});
jQuery(document).ready(function($) {
	$('.logout').click(function(event) {
		var x = confirm('¿Seguro desea salir?');
		if (!x) {
			event.preventDefault();
		}
	});	
});

jQuery(document).ready(function($) {
	
	$('.btnMdfShow').click(function(event) {
		$(this).addClass('deactiveForm')
		$('.mdfForm').addClass('activeForm');
		$('.mdfText').addClass('deactiveForm');
		$('.botones').addClass('activeForm');
	});
	$('.btnSend').click(function(event) {
		$('.formMdf').submit();
	});
	$('.btnCancelMdf').click(function(event) {
		$('.activeForm').removeClass('activeForm');
		$('.deactiveForm').removeClass('deactiveForm');	
	});
	$('.btnElimDir').click(function(event) {
		$('.btnModalElimDir').val($(this).val())
		console.log($('.btnModalElimDir').val())
		$('.btnModalElimDir').click(function(event) {
			var id = $(this).val();
			$.ajax({
				url: 'usuario/perfil/eliminar-direccion',
				type: 'POST',
				dataType: 'json',
				data: {'id': id},
				beforeSend:function()
				{
					$('.btnModalElimDir').before('<img src="http://niaboutique.tecnographic.com.ve/public/images/loading.gif" class="loading">');
					$('.loading').css({
						'display': 'block',
						'margin': '2em auto'
					}).animate({
						'opacity': 1},
						500);
				},
				success:function(response){
					$('.loading').animate({
						'opacity': 0},
						500,function(){
							$(this).remove();
						});
					$('.responseDanger').removeClass('alert-danger');
					$('.responseDanger').removeClass('alert-success');
					$('.responseDanger').stop().css({'display':'block'}).addClass('alert-'+response.type).html('<p class="textoPromedio">'+response.msg+'</p>').animate({
						'opacity': 1},
						500);
					$('#modalElimDir').modal('hide')
				}
			})
			
		});
	});
});
/*olvide la contraseña esto me ayuda*/
jQuery(document).ready(function($) {
	$('.forgot').click(function(event) {
		$('.myModal').css({
			'display': 'block'
		}).animate({
			'opacity': 1},
			500);
		$('.cerrar').click(function(event) {
			$('.myModal').stop().animate({
				'opacity':0},
				500, function() {
				$(this).css({
					display: 'none'
				});
				$('body').css({
					'overflow': 'scroll'
				});
				$('.responseDanger').animate({
					'opacity': 0},
					500,function(){
						$(this).css({
							'display': 'none'
						});
				});
			});
			
		});
		$('body').css({
			'overflow': 'hidden'
		});
		$('.emailForgot').focus(function(event) {
			$('.responseDanger').animate({
					'opacity': 0},
					500,function(){
						$(this).css({
							'display': 'none'
						});
				});
		});
		$('.envForgot').click(function(event) {
			var email = $('.emailForgot').val();
			var boton = $(this);
			event.preventDefault();
			boton.prop({
				'disabled': true
			})
			$.ajax({
				url: 'http://niaboutique.tecnographic.com.ve/public/chequear/email',
				type: 'POST',
				dataType: 'json',
				data: {'email': email},
				beforeSend:function()
				{
					$('.envForgot').after('<img src="http://niaboutique.tecnographic.com.ve/public/images/loading.gif" class="loading">');
					$('.loading').css({
						'display': 'block',
						'margin': '2em auto'
					}).animate({
						'opacity': 1},
						500);
				},
				success:function(response){
					$('.loading').animate({
						'opacity': 0},
						500,function(){
							$(this).remove();
						});
					$('.responseDanger').removeClass('alert-danger');
					$('.responseDanger').removeClass('alert-success');
					$('.responseDanger').stop().css({'display':'block'}).addClass('alert-'+response.type).html('<p class="textoPromedio">'+response.msg+'</p>').animate({
						'opacity': 1},
						500);
					if (response.type == 'danger') {
						event.preventDefault();
					}
					boton.prop({
						'disabled': false,
					})
				},error:function()
				{
					console.log('error');
				}
			})
			
		});

	});

});
function quitarPopover()
{
	$('.popover').hide('slow');
}
jQuery(document).ready(function($) {
	$('.pais').change(function(event) {
		
		if ($(this).val() == 31) {
			$('.depSel').css({'display': 'inline-block'}).attr('name', 'department').addClass('inputFondoNegro');
			$('.depInp').css({'display': 'none'}).attr('name', '').removeClass('inputFondoNegro');
		}else
		{
			$('.depSel').css({'display': 'none'}).attr('name', '').removeClass('inputFondoNegro');
			$('.depInp').css({'display': 'inline-block'}).attr('name', 'department').addClass('inputFondoNegro');

		}
	});
	$('.inputFondoNegro').focus(function(event) {
		if ($(this).attr('id') != "pass2") {
			$(this).popover('show')
		}else{
			$(this).next().remove();			
		}
		$(this).removeClass('peligro')
		console.log($(this).next(''))
		$(this).next().next('p').remove();
	});
	$('.inputFondoNegro').blur(function(event) {
		$(this).popover('hide');
	});
	$('#enviar').click(function(event) {
		$('.errorText').remove()
		$(this).addClass('disabled');
		$(this).after('<img src="http://niaboutique.tecnographic.com.ve/public/images/loading.gif" class="loading">')
		$('.loading').css(
			{
				'margin-left':'1em',
				'display': 'inline-block'
			}
		).animate(
		{
			'opacity':1
		}, 250);
		var b = 0;
		$('.inputFondoNegro').each(function(i, e) {
			if ($(e).val() == '' && $(e).attr('name') != 'dir2' && $(e).attr('name') != 'telefono') {
				alerta($(e));
				b = 1;
				$('.disabled').removeClass('disabled');
				$('.loading').animate({'opacity':0}, 250,function(){
					$(this).remove();
				})
			}
		});
		if (b == 0) {
			$('#formRegister').submit();
		};
	});
});
jQuery(document).ready(function($) {

	$('.imgMini').on('mouseover',function() {
		var esto = $(this);
		if ($('.imgMini').length > 1) {
			$('.imgPrinc').stop().animate({
				
				'opacity':0.5},
				150, function() {
					var imgHover = esto.attr('src');
					console.log(imgHover)
					$('.imgPrinc').attr('src',imgHover);

					$('.imgPrinc').stop().animate({
						
						'opacity':1},
						150);	
				});
		}
		
	});
});
jQuery(document).ready(function($) {
	$('#enviar').click(function(event) {
		$('.errorText').remove();
		
		$('.inputForm').click(function(event) {
			$(this).css({
				'box-shadow': '0px 0px 1px 1px rgba(0,0,0,0)'
			});
			$(this).next('p').remove()
		});
		$('.inputForm').each(function(){
			if ($(this).val() == "") {
				alerta($(this))
			}

		})
		
	});
});
function alerta(esto){
	esto.addClass('peligro')
	esto.after('<p class="textoPromedio errorText">Debe llenar este campo</p>')
}
//ajax para eliminar cosas
jQuery(document).ready(function($) {
	$('.elimBtn').click(function(event) {
		var boton = $(this);
	
		$('.responseDanger').removeClass('alert-danger');
		$('.responseDanger').removeClass('alert-success');
		$('.responseDanger').css({
			'display': 'none',
			'opacity': 0
		});
		$('.close').click(function(event) {
			$('.responseDanger').removeClass('alert-danger');
			$('.responseDanger').removeClass('alert-success');	
			$('.responseDanger').css({
				'display': 'none',
				'opacity': 0
			});
			$('.envElim').removeClass('disabled')
		});
		$('.envElim').val($(this).val());
		$('.envElim').click(function(event) {

			$(this).unbind('click');
			$.ajax({
				url: 'eliminar',
				type: 'POST',
				dataType: 'json',
				data: {id: $(this).val()},
				beforeSend:function()
				{
					$('.envElim').before('<img src="http://niaboutique.tecnographic.com.ve/public/images/loading.gif" class="loading">');
					$('.loading').css({
						'display': 'block',
						'margin': '2em auto'
					}).animate({
						'opacity': 1},
						500);
					$('.envElim').addClass('disabled');
				},
				success:function(response)
				{
					$('.envElim').removeClass('disabled');
					$('.loading').animate({
						'opacity': 0},
						500,function(){
							$(this).remove();
						});
					if (response.type == 'success') {

						boton.parent().parent().remove();
					};
					$('.responseDanger').addClass('alert-'+response.type).html(response.msg).css({
						'display': 'block'
					}).animate({
						'opacity': 1},
						500);
				}
			})
			
			
		});
	});
});
jQuery(document).ready(function($) {
	$('.iconToggle').click(function(event) {

		if ($(this).hasClass('fa-plus-circle')) {
			$(this).removeClass('fa-plus-circle');
			$(this).addClass('fa-minus-circle');
		}else if($(this).hasClass('fa-minus-circle')){
			$(this).removeClass('fa-minus-circle');
			$(this).addClass('fa-plus-circle');
		}
	});
	
});
jQuery(document).ready(function($) {
	var cat = $('.cat');
	cat.change(function(event) {
		var id = $(this).val();
		$.ajax({
			url: 'categoria/buscar-sub-categoria',
			type: 'POST',
			data: {'id': id},
			success:function(response)
			{
				$('.optionModelParr').remove();
				for (var i = 0 ; i < response.length; i++) {
					$('.subcat').append('<option class="optionModelParr" value="'+response[i].id+'">'+response[i].sub_desc+'</option>');
				};
			
			}
		})
	});
});

jQuery(document).ready(function($) {
	$('.contArtPrinc').click(function(event) {

		$('.contArtPrinc').animate({
			'opacity':0},
			250);
		$('.misc_item').remove();
		var id = $(this).data('id');
		if (id != $('.showItemContent').attr('data-modal-id')) {
			$('.imgMini').remove();
			$.ajax({
				url: 'cargar-item',
				type: 'POST',
				data: {'id': id},
				beforeSend:function()
				{
					$('.contLoading').css({'display':'block'}).animate({
						'opacity':1},
						500);
				},
				success:function(response)
				{
					$('.showItemContent').attr('data-modal-id',id);
					$('.contLoading').animate({
						'opacity':0},
						500, function() {
						$(this).css({'display':'none'});
					});
					$('.values').val(response['item'].id)
					for (var i = 0; i < response.images.length; i++) {
						$('.contImagesMini').append('<img src="http://niaboutique.tecnographic.com.ve/public/images/items/'+response.images[i].image+'" class="imgMini image_misc_'+response.images[i].misc_id+'">');
						
					};
					for (var i = 0; i < response.tallas.length; i++) {
						$('.selectChoose option[value = '+response.tallas[i]+']').prop('disabled',false);
					};
					for (var i = 0; i < response['item'].misc.length;i++) {
						$('.contMiscHid').append('<input type="hidden" class="misc_item_'+response['item'].misc[i].ta+'" value="'+response['item'].misc[i].id+'">')
					};
					$('.imgMini').hide();

					$('.ItemTitle').html(response['item'].item_nomb+' - '+response['item'].item_cod)
					$('.contDescription').html(response['item'].item_desc)
					$('.contImageItem > .imagenPrincipal').attr('data-zoom-image','http://niaboutique.tecnographic.com.ve/public/images/items/'+response.princ)
					$('.contImageItem > .imagenPrincipal').attr('src','http://niaboutique.tecnographic.com.ve/public/images/items/'+response.princ)
					$('.precio').html('USD.'+response['item'].item_precio);
					$('.btnAgg').val(response['item'].id)
					$('.btnAgg').attr('data-name-value', response['item'].item_nomb);
					$('.btnAgg').attr('data-price-value', response['item'].item_precio);
					$('.btnAddWishList').val(response['item'].id)
					$('.imagenPrincipal').hover(function(event) {
						$('.zoomed').attr('src', $(this).attr('src'));
						$('.zoomed').css({
							'display':'block'
						}).stop().animate({'opacity':1}, 250)
						$(this).stop().animate({'opacity':0}, 250)
						$(this).mousemove(function(event) {
							var x = event.pageX - $(this).offset().left;
							var y = event.pageY - $(this).offset().top;
							$('.zoomed').css({
								'transform-origin': x+'px '+y+'px'
							});
							
						});
					}, function(event) {
						$('.zoomed').stop().animate({'opacity':0}, 250,function()
						{
							$(this).css({
								'display':'none'
							})
						})
						$(this).stop().animate({'opacity':1}, 250)
					});
					$('.imgMini').click(function(event) {
						var src = $(this).attr('src');
						if (src != $('.imagenPrincipal').attr('src')) {
							$('.imagenPrincipal').stop().animate({'opacity':0}, 250,function()
							{
								$(this).attr('src', src);
								$(this).animate({'opacity':1}, 250)
							})
						};
					});
				}
			})
		}

	});
	$('#showItem').on('hide.bs.modal', function(event) {
		$('.contArtPrinc').animate({
				'opacity':1},
		250);	
		$('.seleccioname').prop('selected', true)
	});
});
jQuery(document).ready(function($) {
	$('.btnElimBank').click(function(event) {
		var id = $(this).val();
		var boton = $(this);
		var x = confirm('¿Seguro desea eliminar el banco? Esta acción es irreversible');
		if (x) {
			$.ajax({
				url: 'editar-bancos/eliminar',
				type: 'POST',
				dataType: 'json',
				data: {'id': id},
				beforeSend:function()
				{
					boton.before('<img src="http://niaboutique.tecnographic.com.ve/public/images/loading.gif" class="loading">');
					$('.loading').css({
						'display': 'block',
						'margin': '2em auto'
					}).animate({
						'opacity': 1},
						500,function(){
							boton.css({
								'display':'none'
							});
						});
				},
				success:function(response)
				{
					$('.loading').animate({
						'opacity': 0},
						500,function(){
							boton.css({
								'display':'block'
							});
							$(this).remove();
						});
					if (response.type == 'success') {

						boton.parent().parent().remove();
					};
					$('.responseDanger').addClass('alert-'+response.type).html(response.msg).css({
						'display': 'block'
					}).animate({
						'opacity': 1},
						500);
					setTimeout(function(){

						$('.responseDanger').removeClass('success')
						$('.responseDanger').removeClass('danger')
						$('.responseDanger').stop().animate({
							'opacity':0},
							500, function() {
							$(this).css({
								'display':'none'
							});
						});
					},6000);
				}
			})		
		};
	});
});
jQuery(document).ready(function($) {
	$('.btnAddWishList').click(function(event) {
		$('.btnAddMyWishList').val($(this).val());
		$('.btnAddMyWishList').click(function(event) {
			event.stopImmediatePropagation()
			$.ajax({
				url: 'http://niaboutique.tecnographic.com.ve/public/agregar-lista-de-deseos',
				type: 'POST',
				dataType: 'json',
				data: {'id':$(this).val()},
				beforeSend:function()
				{
					$('.btnAddMyWishList').addClass('disabled');
					$('.btnAddMyWishList').before('<img src="http://niaboutique.tecnographic.com.ve/public/images/loading.gif" class="loading">');
					$('.loading').css({
						'display': 'block',
						'margin': '2em auto'
					}).animate({
						'opacity': 1},
						500);
				},
				success:function(response)
				{
					$('.disabled').removeClass('disabled');
					$('.loading').animate({
						'opacity': 0},
						500,function(){
							$(this).remove();
						});
					$('#addWishList').modal('hide');
					if (response.type == 'success') {
						alert('Articulo agregado satisfactoriamente.')
					}else if(response.type == 'warning')
					{
						alert('El item ya esta en su lista de deseo.');						
					}else
					{
						alert('Error al agregar el articulo.')
					}

				}
			})
			
		});
	});
});
jQuery(document).ready(function($) {
	$('.tallasCollapse').on('show.bs.collapse',  function(event) {
		$('.dedo').addClass('rotated')
	});
	$('.tallasCollapse').on('hide.bs.collapse',  function(event) {
		$('.dedo').removeClass('rotated')
	});
});
jQuery(document).ready(function($) {
	function doAjax(esto)
	{
		var boton = esto;
		to = boton.attr('data-url-value');
		$.ajax({
			//casa
			url: 'http://preview.Nia Boutique/public/'+to,
			//trabajo
			//url: '/prueba/Nia Boutique/public/'+to,
			type: 'POST',
			dataType: 'json',
			data: {'id':boton.val() },
			beforeSend:function()
			{
				
				boton.animate({
						'opacity': 0},
						250,function(){
							$(this).css({
								'display':'none'
							});
							$('.loading').css({
								'display': 'inline-block'
							}).animate({
								'opacity': 1},
								250);
						}
				);
				boton.after('<img src="http://niaboutique.tecnographic.com.ve/public/images/loading.gif" class="loading">');
				
			},
			success:function(response)
			{
					$('.loading').animate({
						'opacity': 0},
						250,function(){
							$(this).remove();
							boton.css({
								'display': 'inline-block'
							}).animate({
								'opacity': 1},
								250);
						});
				$('#'+response.id+'> .carItem:nth-child(5)').html(response.qty);
				$('#'+response.id+'> .carItem:nth-child(7)').html(response.subtotal);
				$('.catnArt').html(response.count)
				$('.total').html(response.total)				
			
			}
		})
	}


	function doQuitarAjax(esto)
	{
		var boton = esto;
		var to = boton.attr('data-url-value');
			$.ajax({
				//casa
				url: 'http://niaboutique.tecnographic.com.ve/public/'+to,
				//trabajo
				//url: '/prueba/Nia Boutique/public/'+to,
				type: 'POST',
				dataType: 'json',
				data: {'id':boton.val() },
				beforeSend:function()
				{
					boton.after('<img src="http://niaboutique.tecnographic.com.ve/public/images/loading.gif" class="loading">');
					boton.animate({
							'opacity': 0},
							250,function(){
								$(this).css({
									'display':'none'
								});
								$('.loading').css({
									'display': 'inline-block'
								}).animate({
									'opacity': 1},
									250);
							}
					);
					
				},
				success:function(response)
				{
					if($('.carItems').length < 1)
					{
						$('.btn-comprar').removeClass('btn-comprar').addClass('btn-no');
					}
					$('.loading').animate({
							'opacity': 0},
							250,function(){
								$(this).remove();
								boton.css({
									'display': 'inline-block'
								}).animate({
									'opacity': 1},
									250);
							});
					
					boton.parent().parent().animate({
							'opacity':0
						},
						250, function() {
						$(this).remove();
						});
					$('.total').html(response.total)				
				}
			})
	}
	$('.btnQuitar').on('click',function(event) {
		var x = confirm('¿Seguro desea quitar el item?');
		if (x) {
			var esto = $(this);
			doQuitarAjax(esto);

		}
	});
	$('.btnVaciar').click(function(event) {
		event.stopImmediatePropagation();
		var x = confirm('¿Seguro desea vaciar el carrito?');
		if (x) {
			$.ajax({
				//casa
				url: 'http://niaboutique.tecnographic.com.ve/public/vaciar-carrito',
				//trabajo
				//url: '/prueba/Nia Boutique/public/vaciar-carrito',
				type: 'POST',
				dataType: 'json',
				beforeSend:function()
				{
					$('.btnVaciar').animate({
							'opacity': 0},
							250,function(){
								$(this).css({
									'display':'none'
								});
								$('.loading').css({
									'display': 'inline-block'
								}).animate({
									'opacity': 1},
									250);
							}
					);
					$('.btn-carrito').addClass('disabled')
					$('.btnVaciar').after('<img src="http://niaboutique.tecnographic.com.ve/public/images/loading.gif" class="loading">');
					
				},
				success:function(response)
				{
					
					$('.loading').animate({
							'opacity': 0},
							250,function(){
								$(this).remove();
								$('.btnVaciar').css({
									'display': 'inline-block'
								}).animate({
									'opacity': 1},
									250);
							});
					$('.removable').remove();
					$('.total').html('0')
					
				}
			})

		}
	});
	$('.choose').change(function(event) {
		if ($(this).val() != "") {
			var misc  = $('.misc_item_'+$(this).val());
			$('.imgMini:not(.image_misc_'+misc.val()+')').animate({'opacity':'0'}, 500,function() {
				$(this).hide();
			});
			$('.image_misc_'+misc.val()).animate({'opacity':1}, 500,function () {
				$(this).show();
			});

		}else
		{
			$('.imgMini').animate({'opacity':1}, 500,function () {
				$(this).show();
			});
		}
		var id = $(this).val();
		var item_id = $('.values').val();
		if (id == "") {
			$('.removable').remove();
			$('.colores').append('<li class="removable">Elija una talla</li>')
		}else
		{
			$.ajax({
				url: 'http://niaboutique.tecnographic.com.ve/public/buscar/colores',
				type: 'POST',
				dataType: 'json',
				data: {'id': id,'item_id':item_id},
				beforeSend:function(){
					$('.choose').after('<img src="http://niaboutique.tecnographic.com.ve/public/images/loading.gif" class="loading">');
					$('.loading').css({
						'display': 'block',
						'margin': '2em auto'
					}).animate({
						'opacity': 1},
						500);
				},
				success:function(response){
					$('.loading').animate({
						'opacity': 0},
						500,function(){
							$(this).remove();
						});
					if (response != "undefined" && response.length > 0) {
						$('.removable').remove();
						for(var i = 0;i<response.length;i++)
						{
							if (response[i].item_stock > 5) {
								$('.colores').append('<li class="removable" style="color:black;">'+response[i].color_desc+' - Disponible en stock.</li>')
								
							}else if(response[i].item_stock > 0 && response[i].item_stock < 5)
							{
								$('.colores').append('<li class="removable" style="color:black;">'+response[i].color_desc+' - '+response[i].item_stock+' en stock</li>')

							}else if(response[i].item_stock < 1)
							{
								$('.colores').append('<li class="removable" style="color:black;">'+response[i].color_desc+' -  No disponible</li>')
$('.colorModal').addClass('disabled').after('<p class="alerta">Lo sentimos, no poseemos stock para este articulo</p>');
									setTimeout(function() {
										$('.alerta').remove();
									},5000)
							}
						}	
					};
				}
			})		
		}
	});
	
	$('.btnAgg').on('click',function(event) {
		var name  = $(this).attr('data-name-value');
		var price = $(this).attr('data-price-value');
		$('.btnAddCart').val($(this).val())
		$('.chooseModal').change(function(event) {
			var id = $(this).val();
			var item_id = $('.values').val();
			if (id == "" || $('.colorModal').val() == "") {
				$('.btnAddCart').addClass('disabled')
			}else
			{
				$('.disabled').removeClass('disabled');
			}
			if (id == "") {
				$('.removable').remove();
				$('.colores').append('<option class="removable">Elija una talla</option>')
			}else
			{
				$.ajax({
					url: 'http://niaboutique.tecnographic.com.ve/public/buscar/colores',
					type: 'POST',
					dataType: 'json',
					data: {'id': id,'item_id':item_id},
					beforeSend:function(){
						//casa
						$('.btnAddCart').before('<img src="http://niaboutique.tecnographic.com.ve/public/images/loading.gif" class="loading">');
						//trabajo
						//$('.btnAddCart').after('<img src="http://niaboutique.tecnographic.com.ve/public/images/loading.gif" class="loading">');
						$('.loading').css({
							'display': 'inline-block',
							'margin': '2em auto'
						}).animate({
							'opacity': 1},
							500);
					},
					success:function(response){	
						$('.loading').animate({
							'opacity': 0},
							500,function(){
								$(this).remove();
							});
						if (response != "undefined" && response.length > 0) {
							$('.removable').remove();
							for(var i = 0;i<response.length;i++)
							{
								if (response[i].item_stock > 5 ) {
									$('.colorModal').append('<option class="removable" value="'+response[i].item_color+'">'+response[i].color_desc+' - Disponible en stock</option>')
								}else if(response[i].item_stock > 0 && response[i].item_stock < 5)
								{
									$('.colorModal').append('<option class="removable" style="color:black;" value="'+response[i].item_color+'">'+response[i].color_desc+' - '+response[i].item_stock+' en stock</option >')

								}else if(response[i].item_stock < 1)
								{
									$('.colorModal').append('<option class="removable" style="color:black;">'+response[i].color_desc+' -  No disponible</option>')
	                                                                $('.colorModal').addClass('disabled').after('<p class="alerta">Lo sentimos, no poseemos stock para este articulo</p>');
										setTimeout(function() {
											$('.alerta').remove();
										},5000)
								}
							}	
						};
					}
				})		
			}
		});
		$('.colorModal').change(function(event) {
			if ($(this).val() == "" || $('.chooseModal').val() == "") {
				$('.btnAddCart').addClass('disabled')
			}else
			{
				$('.disabled').removeClass('disabled');
			}
		});

		$('.btnAddCart').on('click',function(event) {
			event.stopImmediatePropagation();
			console.log(event)
			var id = $(this).val();
			if ($('.colorModal').val() == "" || $('.chooseModal').val() == "") {
				alert('Debes elegir la talla y el color.')
			}else
			{
				var talla = $('.chooseModal').val();
				var color = $('.colorModal').val();
				dataPost = 
				{
					'id'		: id,
					'name'  	: name,
					'price' 	: price,
					'talla'		: talla,
					'color'		: color
				}
				$.ajax({
					//casa
					url: 'http://niaboutique.tecnographic.com.ve/public/agregar-al-carrito',
					//trabajo
					//url: '/prueba/Nia Boutique/public/agregar-al-carrito',

					type: 'POST',
					dataType: 'json',
					data: dataPost,
					beforeSend:function()
					{
						$('.btnAddCart').addClass('disabled');
						//casa
						$('.btnAddCart').before('<img src="http://niaboutique.tecnographic.com.ve/public/images/loading.gif" class="loading">');
						//trabajo
						//$('.btnAddCart').before('<img src="http://niaboutique.tecnographic.com.ve/public/images/loading.gif" class="loading">');

						$('.loading').css({
								'display': 'inline-block'
							}).animate({
								'opacity': 1},
								500);
					},
					success:function(response)
					{
						$('.btnAddCart').unbind('click');
						$('#addCart').modal('hide');
						$('#showItem').modal('hide');
						$('#cd-cart-trigger').popover('show');
						$('#cd-cart-trigger').click(function(){
							$('.popover').remove();
						})
						$('#cd-cart-trigger').addClass('activated');
						$('.btnAddCart').removeClass('disabled');
						$('.loading').animate({
							'opacity': 0},
						250);
						if ($('#'+response.rowid).length < 1) {
							$('.tableItems').append('<tr id="'+response.rowid+'" class="removable textoPromedio"><td class="textoNegro">'+response.price+'</td><td class="textoNegro">'+response.name+'</td><td class="textoNegro">'+response.qty+'</td><td><button class="btn btn-danger btn-xs btnQuitar btn-carrito" data-url-value="quitar-item" value="'+response.rowid+'"><i class="fa fa-close"></i></button></td></tr>')
							$('.total').html(response.total)
						}else
						{
							$('#'+response.id+'> .qty').html(response.qty);
							$('.total').html(response.total)
						}
						
						setTimeout(function(){
							window.location.reload();
						},2000)
					}
				})
			}
		});
		
	});
});
/**/

jQuery(document).ready(function($) {
	$('#cd-cart-trigger').click(function(event) {
		if ($(this).hasClass('activated')) {
			$(this).removeClass('activated');
		};
	});
});

jQuery(document).ready(function($) {
	$('.btnActualizar').click(function(event) {
		var boton = $(this);
		var inp = $(boton.attr('data-field-value'))
		if (inp.val()<1) {
			var x = confirm('¿Seguro desea quitar el item?');
			if (x) {
				$.ajax({
					//casa
					
					url:'http://niaboutique.tecnographic.com.ve/public/quitar-item',
					type: 'POST',
					dataType: 'json',
					data: {'id':boton.val() },
					beforeSend:function()
					{
						boton.after('<img src="http://niaboutique.tecnographic.com.ve/public/images/loading.gif" class="loading">');
						boton.animate({
								'opacity': 0},
								250,function(){
									$(this).css({
										'display':'none'
									});
									$('.loading').css({
										'display': 'inline-block'
									}).animate({
										'opacity': 1},
										250);
								}
						);
						
					},
					success:function(response)
					{
						
						$('.loading').animate({
								'opacity': 0},
								250,function(){
									$(this).remove();
									boton.css({
										'display': 'inline-block'
									}).animate({
										'opacity': 1},
										250);
								});
						
						boton.parent().parent().animate({
								'opacity':0
							},
							250, function() {
							$(this).remove();
							});
						$('#'+response.id).remove();
						$('.catnArt').html(response.count)
						$('.total').html(response.total)				
					}
				})

			}
		}else
		{
			$.ajax({
					//casa
					url: 'http://niaboutique.tecnographic.com.ve/public/actualizar-al-carrito',
					//trabajo
					//url: '/prueba/Nia Boutique/public/actualizar-al-carrito',
					//serv
					//url:'/public/actualizar-al-carrito',
					type: 'POST',
					dataType: 'json',
					data: {
						'id' :boton.val(),
						'qty':inp.val(),
						'talla':boton.attr('data-talla'),
						'color':boton.attr('data-color'),
						'item_id':boton.attr('data-id') },
					beforeSend:function()
					{
						boton.after('<img src="http://niaboutique.tecnographic.com.ve/public/images/loading.gif" class="loading">');
						boton.animate({
								'opacity': 0},
								250,function(){
									$(this).css({
										'display':'none'
									});
									$('.loading').css({
										'display': 'inline-block'
									}).animate({
										'opacity': 1},
										250);
								}
						);
						
					},
					success:function(response)
					{
						
						$('.loading').animate({
								'opacity': 0},
								250,function(){
									$(this).remove();
									boton.css({
										'display': 'inline-block'
									}).animate({
										'opacity': 1},
										250);
								});
						if (response.type == "success") {
							alert('carrito actualizado');
							$('#'+response.id+'> .carItem:nth-child(5)').html(response.qty);
							$(boton.attr('data-field-value')+'_subtotal').html(response.subtotal);
							$('.catnArt').html(response.count)
							$('.total').html(response.total)				

						}else{
							alert('No hay inventario suficiente para abarcar esta solicitud');
						}
					}
				})
		}
	});
});
jQuery(document).ready(function($) {
	$('.optionA').click(function(event) {
		var target = $(this).data('target');
		$('.contOptionA').animate({'opacity':0}, 500,function(){
			$(this).css({'display':'none'});
			$(target).css({'display':'block'}).animate({'opacity':1},500)
			$('.volver').css({'display':'block'}).animate({'opacity':1}, 500)
			setTimeout(function(){
				$('.error').animate({
					'opacity':0},
					500);
			},5000)
		})
	});
	$('.volver').click(function(event) {
		$(this).animate({'opacity':0}, 500,function(){
			$(this).css({'display':'none'});
			$('.contOptionA').css({'display':'block'}).animate({'opacity':1},500)
		})
		$('.imagesSlidesOption').animate({'opacity':0}, 500,function(){
			$(this).css({'display':'none'});
		})
	});
});
jQuery(document).ready(function($) {
	$('#continuar').on('shown.bs.collapse',function(){
		if ($(window).width() > 991) {
			var pos = $('.continuar').position();
			$(window).scrollTop(pos.top)
			
		};
	})
});
jQuery(document).ready(function($) {
	$('.btnShowInfoItem').click(function(event) {
		var x = $(this);
		$('.itemNameModal').html('<label>Articulo: </label><p>'+x.attr('data-name'))
		$('.itemTallaModal').html('<label>Talla: </label><p>'+x.attr('data-talla')+'</p>')
		$('.itemColorModal').html('<label>Color: </label><p>'+x.attr('data-color')+'</p>')
		$('.itemPrecioModal').html('<label>Precio: </label><p>'+x.attr('data-precio')+'</p>')
		$('.itemSubtotalModal').html('<label>Sub-Total: </label><p>'+x.attr('data-subtotal')+'</p>')
		$('.itemQtylModal').html('<label>Cantidad: </label><p>'+x.attr('data-qty')+'</p>')
	});
});
jQuery(document).ready(function($) {
	$('.refresh').click(function(event) {
		var id = $(this).val(),status = $(this).data('status');
		var boton = $(this);
		$.ajax({
			url: 'editar-slides/actualizar',
			type: 'POST',
			dataType: 'json',
			data: {'id': id,'status':status},
			beforeSend:function () {
				boton.after('<img src="http://niaboutique.tecnographic.com.ve/public/images/loading.gif" class="loading">');
				boton.animate({
						'opacity': 0},
						250,function(){
							$(this).css({
								'display':'none'
							});
							$('.loading').css({
								'display': 'inline-block'
							}).animate({
								'opacity': 1},
								250);
						}
				);
			},success:function(response) {
				$('.loading').animate({
					'opacity': 0},
					250,function(){
						$(this).remove();
						boton.css({
							'display': 'inline-block'
						}).animate({
							'opacity': 1},
							250);
					});
				if (boton.hasClass('active')) {
					boton.removeClass('active')
					boton.html('Activar')
				}else
				{
					boton.addClass('active')
					boton.html('Desactivar')
				}
				
				$('.responseDanger').removeClass('alert-danger');
					$('.responseDanger').removeClass('alert-success');
					$('.responseDanger').stop().css({'display':'block'}).addClass('alert-'+response.type).html('<p class="textoPromedio">'+response.msg+'</p>').animate({
						'opacity': 1},
						500);
				setTimeout(function(){ 
					$('.responseDanger').animate({
						'opacity':0},
						400, function() {
						$(this).css({
							
							'display':'none'
						});
					});
				}, 3000);
			}
		})
		
	});
	$('.deleteSlide').click(function(event) {
		$('.envElim').removeClass('disabled');
		var id = $(this).val();
		var fila = $(this);
		$('.envElim').val(id);
		$('.envElim').click(function(event) {
		event.stopImmediatePropagation();
			
			var boton = $(this);
			$.ajax({
				url: 'editar-slides/eliminar',
				type: 'POST',
				dataType: 'json',
				data: {'id': id},
				beforeSend:function() {
					boton.after('<img src="http://niaboutique.tecnographic.com.ve/public/images/loading.gif" class="loading">');
					boton.animate({
						'opacity': 0},
						250,function(){
							$(this).css({
								'display':'none'
							});
							$('.loading').css({
								'display': 'inline-block'
							}).animate({
								'opacity': 1},
								250);
						}
				);
				},success:function(response) {
					$('.loading').animate({
						'opacity': 0},
						250,function(){
							$(this).remove();
							boton.css({
								'display': 'inline-block'
							}).animate({
								'opacity': 1},
								250);
						});
					fila.parent().parent().remove();
					$('.responseDanger').removeClass('alert-danger');
						$('.responseDanger').removeClass('alert-success');
						$('.responseDanger').stop().css({'display':'block'}).addClass('alert-'+response.type).html('<p class="textoPromedio">'+response.msg+'</p>').animate({
							'opacity': 1},
							500);
					$('#elimModal').modal('hide')
					$('.envElim').addClass('disabled')
					setTimeout(function(){ 
						$('.responseDanger').animate({
							'opacity':0},
							400, function() {
							$(this).css({
								
								'display':'none'
							});
						});
					}, 3000);
				}
			})
			
		});
	});
	$('#formSlides').submit(function(event) {
		return false;
	});
});
jQuery(document).ready(function($) {
	$('.btn-reactivar').on('click', function(event) {
		var boton = $(this)	
boton.unbind('click')
		$('.envReactivar').val($(this).val())
		$('.envReactivar').click(function(event) {
			$.ajax({
				url: 'ver-articulo/reactivar',
				type: 'POST',
				dataType: 'json',
				data: {'id': $(this).val()},
				beforeSend:function()
				{
					$('.envReactivar').before('<img src="http://niaboutique.tecnographic.com.ve/public/images/loading.gif" class="loading">');
					$('.loading').css({
						'display': 'block',
						'margin': '2em auto'
					}).animate({
						'opacity': 1},
						500);
					$('.envReactivar').addClass('disabled');
				},
				success:function(response)
				{
					$('.envReactivar').removeClass('disabled');
					$('.loading').animate({
						'opacity': 0},
						500,function(){
							$(this).remove();
						});
					if (response.type == 'success') {
						boton.removeClass('btn-reactivar').removeClass('active').addClass('btnElimItem').data('target','#elimModal').html('Eliminar');
						$('.btnElimItem').bind('click');
						$('.modal').hide('slow');
window.location.reload();
					};
					$('.responseDanger').addClass('alert-'+response.type).html(response.msg).css({
						'display': 'block'
					}).animate({
						'opacity': 1},
						500);
				}
			})
			
			
		});
	});
	$('.btnElimItem').click(function(event) {
		var boton = $(this);
boton.unbind('click')
		$('.responseDanger').removeClass('alert-danger');
		$('.responseDanger').removeClass('alert-success');
		$('.responseDanger').css({
			'display': 'none',
			'opacity': 0
		});
		
		$('.envElim').val($(this).val());
		$('.envElim').click(function(event) {
			$.ajax({
				url: 'ver-articulo/eliminar',
				type: 'POST',
				dataType: 'json',
				data: {'id': $(this).val()},
				beforeSend:function()
				{
					$('.envElim').before('<img src="http://niaboutique.tecnographic.com.ve/public/images/loading.gif" class="loading">');
					$('.loading').css({
						'display': 'block',
						'margin': '2em auto'
					}).animate({
						'opacity': 1},
						500);
					$('.envElim').addClass('disabled');
				},
				success:function(response)
				{
					$('.envElim').removeClass('disabled');
					$('.loading').animate({
						'opacity': 0},
						500,function(){
							$(this).remove();
						});
					if (response.type == 'success') {
						boton.addClass('btn-reactivar').addClass('active').removeClass('btnElimItem').data('target','#reactivarModal').html('Reactivar'); 												
						$('.btn-reactivar').bind('click');
						$('.modal').hide('slow');

window.location.reload();
					};
					$('.responseDanger').addClass('alert-'+response.type).html(response.msg).css({
						'display': 'block'
					}).animate({
						'opacity': 1},
						500);
				}
			})
			
			
		});
	});
});

jQuery(document).ready(function($) {
	$('.slick-prev').html('<i class="fa fa-caret-left"></i>');
	$('.slick-next').html('<i class="fa fa-caret-left"></i>');
});
jQuery(document).ready(function($) {
	var id = $('.art_id').val(),misc = $('.misc_id').val();
	$('.contNew').click(function(event) {
		$('.formCart').prop({
			'action': 'http://niaboutique.tecnographic.com.ve/public/administrador/nuevo-articulo/continuar/enviar/'+id+'/'+misc,
		})
		$('.formCart').submit();
	});
	$('.contSave').click(function(event) {
		$('.formCart').prop({
			'action': 'http://niaboutique.tecnographic.com.ve/public/administrador/nuevo-articulo/continuar/guardar-cerrar/'+id+'/'+misc,
		})
		$('.formCart').submit();
	});
});
jQuery(document).ready(function($) {
	/*-------------------------------------------registro de usuario-------------------------------------------*/
	var estado = $('#estado2');
	estado.change(function(event) {
		if ($(this).val() != "") {
			var id = estado.val();
			$.ajax({
				url: 'http://niaboutique.tecnographic.com.ve/public/registro/buscar-municipio',
				type: 'POST',
				data: {'id': id},
				success:function(response)
				{
					$('.optionModel').remove();
					for (var i = 0 ; i < response.length; i++) {
						$('#municipio2').append('<option class="optionModel" value="'+response[i].id+'">'+response[i].nombre+'</option>');
					};

					var mun = $('#municipio2');
					mun.change(function(event) {
						var id = $(this).val();
						$.ajax({
							url: 'http://niaboutique.tecnographic.com.ve/public/registro/buscar-parroquia',
							type: 'POST',
							data: {'id': id},
							success:function(response)
							{
								$('.optionModelParr').remove();
								for (var i = 0 ; i < response.length; i++) {
									$('#parroquia2').append('<option class="optionModelParr" value="'+response[i].id+'">'+response[i].nombre+'</option>');
								};
							
							}
						})
					});
				}
			})

			
		}
	});
});
jQuery(document).ready(function($) {
	$('.upload').click(function(event) {
		var boton = $(this).parent();
		boton.css({'display':'none'});
		$(this).parent().after('<button class="btn btn-success btn-work" style="margin-right:1em;">Enviar</button><input type="reset" class="btn-work btn btn-warning btn-cancel" value="Cancelar">')
		$('.btn-cancel').click(function(event) {
			$('.btn-work').remove();
			boton.css({'display':'inline-block'});	
			$(boton.children('.upload').data('target')).attr('src',$(boton.children('.upload').data('target')).data('src'))
		});
	});
	$('.btn-elim-img').click(function(event) {
		$('.btn-eliminar-image').val($(this).val()).data('parent', $(this).attr('id'))
	});
	$('.btn-eliminar-image').click(function(event) {
		var id = $(this).val();
		var bot = $('#'+$(this).data('parent'));
		$.ajax({
			url: 'http://niaboutique.tecnographic.com.ve/public/administrador/editar-articulo/eliminar-imagen',
			type: 'POST',
			dataType: 'json',
			data: {'id': id},
			beforeSend:function()
			{
				$('.btn-eliminar-image').before('<img src="http://niaboutique.tecnographic.com.ve/public/images/loading.gif" class="loading">');
					$('.loading').css({
						'display': 'inline',
					}).animate({
						'opacity': 1},
						500);
					$(this).addClass('disabled');
			},
			success:function(response)
			{
				$('.btn-eliminar-image').removeClass('disabled');
				$('.loading').animate({
					'opacity': 0},
					500,function(){
						$(this).remove();
				});
				$('.responseDanger').removeClass('alert-danger');
				$('.responseDanger').removeClass('alert-success');
				$('.responseDanger').stop().css({'display':'block'}).addClass('alert-'+response.type).html('<p class="textoPromedio">'+response.msg+'</p>').animate({
					'opacity': 1},
					500);
				if (response.type == 'success') {
					bot.parent().parent().remove()
					$('.modal').hide('slow');
				};

			}
		});
		
		
	});
	var cat = $('.catx');
	cat.change(function(event) {
		var id = $(this).val();
		$.ajax({
			url: '../categoria/buscar-sub-categoria',
			type: 'POST',
			data: {'id': id},
			success:function(response)
			{
				$('.optionModelParr').remove();
				for (var i = 0 ; i < response.length; i++) {
					$('.subcat').append('<option class="optionModelParr" value="'+response[i].id+'">'+response[i].sub_desc+'</option>');
				};
			
			}
		})
	});
});

jQuery(document).ready(function($) {
	$('.aprov-fac').click(function(event) {
		var boton = $(this);
		
		$.ajax({
			//casa
			url: 'ver-pagos/aprovar',
			type: 'POST',
			dataType: 'json',
			data: {'id':boton.val() },
			beforeSend:function()
			{
				
				boton.animate({
						'opacity': 0},
						250,function(){
							$(this).css({
								'display':'none'
							});
							$('.loading').css({
								'display': 'inline-block'
							}).animate({
								'opacity': 1},
								250);
						}
				);
				boton.after('<img src="http://niaboutique.tecnographic.com.ve/public/images/loading.gif" class="loading">');
				
			},
			success:function(response)
			{
					$('.loading').animate({
						'opacity': 0},
						250,function(){
							$(this).remove();
							boton.css({
								'display': 'inline-block'
							}).animate({
								'opacity': 1},
								250);
						});
					$('.responseDanger').removeClass('alert-danger');
					$('.responseDanger').removeClass('alert-success');
					$('.responseDanger').stop().css({'display':'block'}).addClass('alert-'+response.type).html('<p class="textoPromedio">'+response.msg+'</p>').animate({
						'opacity': 1},
						500);
					if (response.type == 'success') {
						boton.parent().parent().remove();
						
					};
			}
		})
	});
	$('.reject-fac').click(function(event) {
		var boton = $(this);
		$('.responseDanger').removeClass('alert-danger');
		$('.responseDanger').removeClass('alert-success');
		$('.responseDanger').css({
			'display': 'none',
			'opacity': 0
		});
		$('.envReject').val(boton.val());
		$('.envReject').click(function(event) {
			var boton2 = $(this);
			var motivo = $('#motivo').val();
			$.ajax({
				url: 'ver-pagos/rechazar',
				type: 'POST',
				dataType: 'json',
				data: {'id': $(this).val(),'motivo': motivo},
				beforeSend:function()
				{
					boton2.before('<img src="http://niaboutique.tecnographic.com.ve/public/images/loading.gif" class="loading">');
					$('.loading').css({
						'display': 'block',
						'margin': '2em auto'
					}).animate({
						'opacity': 1},
						500);
					boton2.addClass('disabled');
				},
				success:function(response)
				{
					boton2.removeClass('disabled');
					$('.loading').animate({
						'opacity': 0},
						500,function(){
							$(this).remove();
						});
					if (response.type == 'success') {

						boton.parent().parent().remove();
					};
					$('.responseDanger').addClass('alert-'+response.type).html(response.msg).css({
						'display': 'block'
					}).animate({
						'opacity': 1},
						500);
                                        $('.envReject').after('<button class="btn btn-success btn-aceptar" data-dismiss="modal" style="margin-top:1em;">Aceptar</button>');
					$('.envReject').css({
						'display': 'none'
					});
					$('.btn-aceptar').bind('click');
				}
			})
			
			
		});
$('.btn-aceptar').on('click',function() {
			$('.envReject').css('display','block');
			$(this).remove();
		})
	});
});

$(document).ready(function() {
    var activeSystemClass = $('.list-group-item.active');

    //something is entered in search form
    $('#buscar-usuario').keyup( function() {
       var that = $(this);
        // affect all table rows on in systems table
        var tableBody = $('.table-list-search tbody');
        var tableRowsClass = $('.table-list-search tbody tr');
        $('.search-sf').remove();
        tableRowsClass.each( function(i, val) {
        
            //Lower text for case insensitive
            var rowText = $(val).text().toLowerCase();
            var inputText = that.val().toLowerCase();
            if(inputText != '')
            {
                $('.search-query-sf').remove();
                tableBody.prepend('<tr class="search-query-sf"><td colspan="100"><strong>Buscando por: "'
                    + that.val()
                    + '"</strong></td></tr>');
            }
            else
            {
                $('.search-query-sf').remove();
            }

            if( rowText.indexOf( inputText ) == -1 )
            {
                //hide rows
                tableRowsClass.eq(i).hide();
                
            }
            else
            {
                $('.search-sf').remove();
                tableRowsClass.eq(i).show();
            }
        });
        //all tr elements are hidden
        if(tableRowsClass.children(':visible').length == 0)
        {
            tableBody.append('<tr class="search-sf"><td class="text-muted" colspan="100">No se encontraron resultados.</td></tr>');
        }
    });
});

jQuery(document).ready(function($) {
	$('.ver').click(function(event) {
		var id = $(this).val();
		var username = $('.username-'+id).val();
		var name = $('.name-'+id).val();
		var email = $('.email-'+id).val();
		var phone = $('.phone-'+id).val();
		var dir = $('.dir-'+id).val();
		var pagWeb = $('.est-'+id).val();
		var carnet = $('.mun-'+id).val();
		var nit = $('.par-'+id).val();
		$('.usernameModal').html(username);
		$('.nameModal').html(name);
		$('.emailModal').html(email);
		$('.dirModal').html(dir);
		$('.phoneModal').html(phone);
		$('.pagWebModal').html(pagWeb);
		$('.carnetModal').html(carnet);
		$('.nitModal').html(nit);
	});
	$('.verTransData').click(function(event) {
		var id = $(this).val();
		var bank  = $('.bank-'+id).val();
		var bank2 = $('.bank2-'+id).val();
		var fech  = $('.fech-'+id).val();
		var num   = $('.num-'+id).val();
		
		$('.bankeModal').html(bank);
		$('.bankemisorModal').html(bank2);
		$('.fechTransModal').html(fech);
		$('.numTransModal').html(num);
		
	});
});

jQuery(document).ready(function($) {
	$('.btnChange').click(function(event) {
		$('.minis').addClass('miniSortable');

		$('.btn-no').addClass('btn-show');
		$(this).addClass('btn-no');
		
		$( ".minis" ).sortable({
	      revert: true
	    });

	    $(".minis").disableSelection();
	});
	$('.btnChangeEnviar').click(function(event) {
		var lista = $('.imgMini')
		var ids   = [];
		lista.each(function(i, el) {
			ids[i] = $(el).attr('data-id-value');
		});
		var id = $(this).val();
		$.ajax({
			url: 'cambiar/posiciones',
			type: 'POST',
			dataType: 'json',
			data: {'ids': ids},
			beforeSend:function () {
				$('.btnChangeEnviar').before('<img src="http://niaboutique.tecnographic.com.ve/public/images/loading.gif" class="loading">');
				$('.loading').css({
					'display': 'block',
					'margin': '2em auto'
				}).animate({
					'opacity': 1},
					500);
				$('.btn').addClass('disabled');	
			},
			success:function (response) {
				$('.disabled').removeClass('disabled');
				$('.loading').animate({
					'opacity': 0},
				500,function(){
					
					$(this).remove();
				});
				$('.responseDanger').addClass('alert-'+response.type).html('<p class="textoPromedio">'+response.msg+'</p>').css({
					'display': 'block'
				}).animate({
					'opacity': 1},
					500);
				$('.minis').sortable("destroy");
				$('.miniSortable').removeClass('miniSortable');
				$('.btn-show').removeClass('btn-show');
				$('.btnChange').removeClass('btn-no');
				setTimeout(function(){

					$('.responseDanger').removeClass('success')
					$('.responseDanger').removeClass('danger')
					$('.responseDanger').stop().animate({
						'opacity':0},
						500, function() {
						$(this).css({
							'display':'none'
						});
					});
				},6000);
				
			}
		})
		
	});
	$('.btnChangeCancel').click(function(event) {
		$('.minis').sortable("destroy");
		$('.miniSortable').removeClass('miniSortable');
		$('.btn-show').removeClass('btn-show');
		$('.btnChange').removeClass('btn-no');
	});
});

//cart plugin
jQuery(document).ready(function($){
	//if you change this breakpoint in the style.css file (or _layout.scss if you use SASS), don't forget to update this value as well
	var $L = 1200,
		$menu_navigation = $('#main-nav'),
		$cart_trigger = $('#cd-cart-trigger'),
		$hamburger_icon = $('#cd-hamburger-menu'),
		$lateral_cart = $('#cd-cart'),
		$shadow_layer = $('#cd-shadow-layer');

	//open lateral menu on mobile
	$hamburger_icon.on('click', function(event){
		event.preventDefault();
		//close cart panel (if it's open)
		$lateral_cart.removeClass('speed-in');
		toggle_panel_visibility($menu_navigation, $shadow_layer, $('body'));
	});

	//open cart
	$cart_trigger.on('click', function(event){
		event.preventDefault();
		//close lateral menu (if it's open)
		$menu_navigation.removeClass('speed-in');
		toggle_panel_visibility($lateral_cart, $shadow_layer, $('body'));
	});

	//close lateral cart or lateral menu
	$shadow_layer.on('click', function(){
		$shadow_layer.removeClass('is-visible');
		// firefox transitions break when parent overflow is changed, so we need to wait for the end of the trasition to give the body an overflow hidden
		if( $lateral_cart.hasClass('speed-in') ) {
			$lateral_cart.removeClass('speed-in').on('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
				$('body').removeClass('overflow-hidden');
			});
			$menu_navigation.removeClass('speed-in');
		} else {
			$menu_navigation.removeClass('speed-in').on('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
				$('body').removeClass('overflow-hidden');
			});
			$lateral_cart.removeClass('speed-in');
		}
	});

	//move #main-navigation inside header on laptop
	//insert #main-navigation after header on mobile
	move_navigation( $menu_navigation, $L);
	$(window).on('resize', function(){
		move_navigation( $menu_navigation, $L);
		
		if( $(window).width() >= $L && $menu_navigation.hasClass('speed-in')) {
			$menu_navigation.removeClass('speed-in');
			$shadow_layer.removeClass('is-visible');
			$('body').removeClass('overflow-hidden');
		}

	});
});

function toggle_panel_visibility ($lateral_panel, $background_layer, $body) {
	if( $lateral_panel.hasClass('speed-in') ) {
		// firefox transitions break when parent overflow is changed, so we need to wait for the end of the trasition to give the body an overflow hidden
		$lateral_panel.removeClass('speed-in').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
			$body.removeClass('overflow-hidden');
		});
		$background_layer.removeClass('is-visible');

	} else {
		$lateral_panel.addClass('speed-in').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
			$body.addClass('overflow-hidden');
		});
		$background_layer.addClass('is-visible');
	}
}

function move_navigation( $navigation, $MQ) {
	if ( $(window).width() >= $MQ ) {
		$navigation.detach();
		$navigation.appendTo('header');
	} else {
		$navigation.detach();
		$navigation.insertAfter('header');
	}
}


/*Plugin*/
jQuery(document).ready(function($){
	var visionTrigger = $('.cd-3d-trigger'),
		galleryItems = $('.no-touch #cd-gallery-items').children('li'),
		galleryNavigation = $('.cd-item-navigation a');

	//on mobile - start/end 3d vision clicking on the 3d-vision-trigger
	visionTrigger.on('click', function(){
		$this = $(this);
		if( $this.parent('li').hasClass('active') ) {
			$this.parent('li').removeClass('active');
			hideNavigation($this.parent('li').find('.cd-item-navigation'));
		} else {
			$this.parent('li').addClass('active');
			updateNavigation($this.parent('li').find('.cd-item-navigation'), $this.parent('li').find('.cd-item-wrapper'));
		}
	});

	//on desktop - update navigation visibility when hovering over the gallery images
	galleryItems.hover(
		//when mouse enters the element, show slider navigation
		function(){
			$this = $(this).children('.cd-item-wrapper');
			updateNavigation($this.siblings('nav').find('.cd-item-navigation').eq(0), $this);
		},
		//when mouse leaves the element, hide slider navigation
		function(){
			$this = $(this).children('.cd-item-wrapper');
			hideNavigation($this.siblings('nav').find('.cd-item-navigation').eq(0));
		}
	);

	//change image in the slider
	galleryNavigation.on('click', function(){
		var navigationAnchor = $(this);
			direction = navigationAnchor.text(),
			activeContainer = navigationAnchor.parents('nav').eq(0).siblings('.cd-item-wrapper');
		
		( direction=="Next") ? showNextSlide(activeContainer) : showPreviousSlide(activeContainer);
		updateNavigation(navigationAnchor.parents('.cd-item-navigation').eq(0), activeContainer);
	});
});

function showNextSlide(container) {
	var itemToHide = container.find('.cd-item-front'),
		itemToShow = container.find('.cd-item-middle'),
		itemMiddle = container.find('.cd-item-back'),
		itemToBack = container.find('.cd-item-out').eq(0);

	itemToHide.addClass('move-right').removeClass('cd-item-front').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
		itemToHide.addClass('hidden');
	});
	itemToShow.addClass('cd-item-front').removeClass('cd-item-middle');
	itemMiddle.addClass('cd-item-middle').removeClass('cd-item-back');
	itemToBack.addClass('cd-item-back').removeClass('cd-item-out');
}

function showPreviousSlide(container) {
	var itemToMiddle = container.find('.cd-item-front'),
		itemToBack = container.find('.cd-item-middle'),
		itemToShow = container.find('.move-right').slice(-1),
		itemToOut = container.find('.cd-item-back');

	itemToShow.removeClass('hidden').addClass('cd-item-front');
	itemToMiddle.removeClass('cd-item-front').addClass('cd-item-middle');
	itemToBack.removeClass('cd-item-middle').addClass('cd-item-back');
	itemToOut.removeClass('cd-item-back').addClass('cd-item-out');

	//wait until itemToShow does'n have the 'hidden' class, then remove the move-right class 
	//in this way, transition works also in the way back
	var stop = setInterval(checkClass, 100);
	
	function checkClass(){
		if( !itemToShow.hasClass('hidden') ) {
			itemToShow.removeClass('move-right');
			window.clearInterval(stop);
		}
	}
}

function updateNavigation(navigation, container) {
	var isNextActive = ( container.find('.cd-item-middle').length > 0 ) ? true : false,
		isPrevActive = 	( container.children('li').eq(0).hasClass('cd-item-front') ) ? false : true;
	(isNextActive) ? navigation.find('a').eq(1).addClass('visible') : navigation.find('a').eq(1).removeClass('visible');
	(isPrevActive) ? navigation.find('a').eq(0).addClass('visible') : navigation.find('a').eq(0).removeClass('visible');
}

function hideNavigation(navigation) {
	navigation.find('a').removeClass('visible');
}

jQuery(document).ready(function($) {
	$(window).load(function() {
		$('.contLoading').animate({'opacity':0},1000,function() {
			$(this).css({
				'display': 'none'
			});
		})
	})
});