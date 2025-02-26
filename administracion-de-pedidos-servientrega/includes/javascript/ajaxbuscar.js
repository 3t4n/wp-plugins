jQuery(document).ready(function ($) {
	
	
			
	jQuery("#btnBuscar").click(function() {
				
				jQuery('#load-aviso').html('Estamos realizando tu consulta');
				jQuery('#aplicarAcciones').modal('show');
				var hideModal="#aplicarAcciones";
				ejecutarconsultarPedido(ajax_busqueda_var.url,'#aplicarAcciones',ajax_busqueda_var.action,  ajax_busqueda_var.nonce);
			
				/*var filtroPedidos={};
				jQuery(".filtropedido").each(function () {
					filtroPedidos[jQuery(this).attr('id')]= jQuery(this).val()  ;
					});	
				
				
				
				var parametros;
					
				
					parametros={'action': ajax_busqueda_var.action, 'nonce': ajax_busqueda_var.nonce,'filtroPedido':filtroPedidos}; 
					//JSON.stringify(array)}
					
				 //console.log(authHeader);
				 jQuery.ajax({
								data:  parametros, //datos que se envian a traves de ajax
								url:   ajax_busqueda_var.url, //archivo que recibe la peticion
								type:  'post', //método de envio
								beforeSend: function () {
										jQuery('#envios').html("Procesando, espere por favor...");
										jQuery('#aplicarAcciones').modal('show');
								},
								success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
										
												jQuery('#envios').html(response);
												
												configurarTabla();
												
												DT1.column(0).visible(enProceso=='1');
												DT1.column(5).visible(enProceso=='1');
												setTimeout(function(){ if(hideModal!=null) jQuery(hideModal).modal('hide'); }, 100);
												
												
												
												//*******
										
								},
								error: function (request, status, error) {
									jQuery('#envios').html(error);
									setTimeout(function(){ if(hideModal!=null) jQuery(hideModal).modal('hide'); }, 100);
									
								}
							});*/

			
						
			
				
				
			});
			
	
});