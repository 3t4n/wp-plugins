jQuery(document).ready(function ($) {
	
	jQuery("#DesDptoDestino").change(function() {
				
				var parametros={'action': ajax_ciudades_var.action, 'nonce': ajax_ciudades_var.nonce, 'elegido':jQuery(this).val() };
				
				
				jQuery.ajax({
					data:  parametros, //datos que se envian a traves de ajax
					url:   ajax_ciudades_var.url, //archivo que recibe la peticion
					type:  'post', //método de envio
					success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
									
									jQuery('#DesCiudadDestino').html(response);
							
							
					}
					
				});
			});
			
	
});