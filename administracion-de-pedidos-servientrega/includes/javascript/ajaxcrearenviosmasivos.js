jQuery(document).ready(function ($) {
	
	
			
	jQuery("#generarguiasmasivo").click(function() {
				
			 
			   var IdPedidoEnvio=[];
			   var IdDescEstado=[];
			   
				
				var rows=DT1.rows('.selected').data();
				
				for(var i=0;i<rows.length;i++)
				{
					var estado=rows[i][29];
					if (estado==1||estado==3||estado==6) IdPedidoEnvio.push(rows[i][1]);
				}
				
				if(IdPedidoEnvio.length==0) return;
				jQuery('#load-aviso').html('Estamos procesando tu solicitud<br>Aplicará solamente para los registros que tengan estado "Pendiente de generar guía", "Guía Anulada" y "Envío generado con error');
				jQuery('#aplicarAcciones').modal('show');
				  var parametros={'IdPedidoEnvio':IdPedidoEnvio,'action': ajax_crearenviosmasivo_var.action,'nonce':ajax_crearenviosmasivo_var.nonce};
					
				var urlAjax=ajax_crearenviosmasivo_var.url;
				
				ejecutaProceso(parametros,'#envios',urlAjax,'recargarconsulta','#generarGuias','#aplicarAcciones');
			
				
				
				
			});
			
			

			
	
});