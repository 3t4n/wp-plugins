function generarAnularGuiasMasivo(){
		  
		   var Guias=[];
		   var ConCobro=[];
		   var IdOrder=[];
		  
			  
			 var rows=DT1.rows('.selected').data();
				
				for(var i=0;i<rows.length;i++)
				{
					var Guia=rows[i][3];
					var Cobro=rows[i][12];
					var Order=rows[i][11];
					Guias.push(Guia);
				    ConCobro.push(Cobro);
				    IdOrder.push(Order);
					
				}
			  
			  
			  
			 
			  
		  
			  if(Guias.length==0) return;
			  jQuery('#load-aviso').html('Estamos procesando tu solicitud');
			  jQuery('#aplicarAcciones').modal('show');
			  
			  var parametros={'Guias':Guias,'ConCobro':ConCobro,'IdOrder':IdOrder,'action': ajax_anularenviosmasivo_var.action,'nonce':ajax_anularenviosmasivo_var.nonce};
			
			var urlAjax=ajax_anularenviosmasivo_var.url;
			ejecutaProceso(parametros,'#envios',urlAjax,'recargarconsulta',null,'#aplicarAcciones');
		}
			
			

			
	
