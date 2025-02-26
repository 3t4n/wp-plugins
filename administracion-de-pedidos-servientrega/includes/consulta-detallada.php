<?php

function admonpedidosservientrega_pedidos(){
	include  plugin_dir_path(__DIR__ ) . 'arrays/pluginexterno/states/CO.php';
	?>
  <div id="contenedor">

  <div id="plugin-servientrega"><!-- Inicio Contenedor plugin servientrega -->
		<header id="header-main-serv">
			<div class="container">
				<div class="row justify-content-start align-items-center">
					<div class="col-12 logo text-left">
						<img src="<?php echo plugin_dir_url(__FILE__); ?>images/logo-servientrega.png" alt="Servientrega" />
					</div>
				</div>
			</div>
		</header>
		
		<div id="content-serv">
			<div class="container">
				<h1 class="mb-4">Gestión de envíos</h1>
				<div class="envios">
					<nav>
					  	<div class="nav nav-tabs" id="envios-tab" role="tablist">
						    <a class="nav-link active" id="envios-proceso-tab" data-toggle="tab" href="#envios-proceso" role="tab" aria-controls="envios-proceso" aria-selected="true">Envíos en proceso</a>
						    <a class="nav-link" id="envios-realizados-tab" data-toggle="tab" href="#envios-proceso" role="tab" aria-controls="envios-proceso" aria-selected="false">Envíos realizados</a>
					  	</div>
					</nav>
					
					<div class="tab-content" id="envios-tabContent">
					  	<div class="tab-pane fade show active" id="envios-proceso" role="tabpanel" aria-labelledby="envios-proceso-tab">
					  		
					  		<div class="border-bottom d-flex justify-content-between pb-2 align-items-center flex-wrap flex-md-nowrap">
					  			
					  			<div class="right-div">
					  				<a data-toggle="collapse" class="busqueda-avanzada" href="#busquedaAvanzada" role="button" aria-expanded="true" aria-controls="busquedaAvanzada"><img src="<?php echo plugin_dir_url(__FILE__); ?>images/ico-busqueda-avanzado.svg" alt="Opciones" /> Búsqueda avanzada</a> <span class="color-lighter-grey p-big separator">|</span> 
					  				<div class="d-inline-flex">
						  				<label class="p-medium">Periodo:</label>
						  				<select class="form-control no-border" id="idPeriodo">
						  					<option value="14">Últimos 15 días</option>
						  					<option value="29">Últimos 30 días</option>
						  					<option value="59">Últimos 60 días</option>
						  				</select>
						  			</div>
					  			</div>
					  		</div>
					  		<div class="collapse multi-collapse show" id="busquedaAvanzada">
						      	<div class="card-body mt-4 shadow">
						        	<h4>Consulta detallada</h4>
						        	<form>
						        		<div class="form-row">
									    	<div class="form-group col-md-4">
									      		<label for="ConCobro">Tipo de envío</label>
									      		<select class="form-control filtropedido" id="ConCobro">
											        <option value="" selected>Seleccionar</option>
													<option value="0">Normal</option>
													<option value="1">Con cobro</option>
											        
											    </select>
									    	</div>
									    	<div class="form-group col-md-4" id="divEstadoEnvio">
									      		<label for="idEstado">Estado del envío</label>
									      		<select class="form-control filtropedido" id="idEstado">
											        <option value="" selected>Seleccionar</option>
													<?php 
														$estadosenvio = include plugin_dir_path(__DIR__ ) . 'arrays/estadosenvio.php';
														
														foreach($estadosenvio as $key => $item){
														?>
														<option value='<?php echo esc_attr($key) ?>'><?php echo esc_html($item[0]) ?></option>
													<?php	
														    
														}
													?>
											    </select>
									    	</div>
									    	
									  	</div>
						        		<div class="form-row">
									    	<div class="form-group col-md-4">
									      		<label for="DesDptoDestino">Departamento de envío</label>
									      		<select class="form-control filtropedido" id="DesDptoDestino">
											        <option  value="" selected>Selecciona</option>
											        <?php 
														
														foreach($states['CO'] as $key => $item){?>
														<option value='<?php echo esc_attr(esc_attr($key)) ?>'><?php echo esc_html(esc_html($item)) ?></option>
														<?php }
														
													
													?>
											    </select>
									    	</div>
									    	<div class="form-group col-md-4">
									      		<label for="DesCiudadDestino">Ciudad de envío</label>
									      		<select class="form-control filtropedido" id="DesCiudadDestino">
											        <option  value="" selected>Selecciona</option>
											        
											    </select>
									    	</div>
									  	</div>
									  	<h5 class="mb-1">Ver periodo</h5>
									  	<div class="form-row">
									    	<div class="form-group col-xl-2 col-md-4">
									      		<label for="fromFC">Desde</label>
									      		<input type="date" class="form-control filtropedido" id="fromFC">
									    	</div>
									    	<div class="form-group col-xl-2 col-md-4">
									      		<label for="toFC">Hasta</label>
									      		<input type="date" class="form-control filtropedido" id="toFC">
									    	</div>
									    </div>
									    <div class="form-group">
										    <button class="btn btn-outline-primary" id="btnBuscar" type="button">Buscar</button>
											
											<span id="my-events-list"></span>
										</div>
						        	</form>
						      	</div>
						    </div>
							<div id="divAcciones">
								<h4 class="mt-4">Acciones</h4>
								<div class="d-flex justify-content-between align-items-end flex-wrap">
									<div>
										<p class="p-semi">Selecciona varias órdenes y aplica acciones masivamente</p>
										<div class="form-inline acciones-form">
											<select class="form-control mr-sm-2" id="cmbAcciones">
												<option value="" selected>Acciones</option>
												<option value="generarguia">Generar guías</option>
												<option value="anularguia">Anular guías</option>
												<option value="marcarrecoleccion">Marcar para recolección</option>
												<option value="desmarcarrecoleccion">Desmarcar para recolección</option>
												<option value="asignarrecoleccion">Asignar recolección</option>
												<option value="generarpdf">Generar PDF guía</option>
												<option value="actualizarestadoenvio">Actualizar estado del envío</option>
												<option value="terminarenvio">Terminar envío</option>
												
												
												
												
												
												
											</select>
											<div class="form-group">
												<button type="button" class="btn btn-outline-primary" id="btnAplicar">Aplicar</button>
											</div>
											<input type="hidden" class="form-control filtropedido" id="enProceso" value="1"/>
										</div>
									</div>
									<div class="mt-2">
										<a class="boton-guias" id="generarguiasmasivo" role="button" ><img src="<?php echo plugin_dir_url(__FILE__); ?>images/ico-guias.svg" alt="Guías" /> Generar guías</a> <span class="color-lighter-grey p-big separator">|</span> 
										<a class="boton-guias"  role="button" onclick="generarGuiasStickerMasivo()"><img src="<?php echo plugin_dir_url(__FILE__); ?>images/ico-pdf.svg" alt="PDF" /> Generar PDF de guía</a> <span class="color-lighter-grey p-big separator">|</span> 
										<a class="boton-guias"  role="button" onclick="descargarStickerZip()"><img src="<?php echo plugin_dir_url(__FILE__); ?>images/ico-download.svg" alt="Descargar" /> Descargar PDFs</a>
									</div>
								</div>
							</div>
						    <div class="tabla-datatables my-4" id="envios">
						
						    	
						    </div>
					  	</div>
					  	<div class="tab-pane fade" id="envios-realizados" role="tabpanel" aria-labelledby="envios-realizados-tab">Contenido en pantalla <a >envíos realizados</a></div>
					</div>
				</div>
			</div>
		</div>

		<!-- Modales -->
		<div class="modal fade" id="generarGuias" tabindex="-1" aria-labelledby="generarGuiasLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg modal-servientrega">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h2 class="modal-title" id="generarGuiasLabel">Generar guías</h2>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		    	<p class="text-center p-big generarguiastexto py-3">El proceso terminó de ejecutarse.  Revisar en la tabla los resultados</p>
		    	<!--p class="text-center my-4"><a href="#" class="btn btn-rounded">Continuar</a></p-->
		      </div>
		    </div>
		  </div>
		</div>
		<div class="modal fade" id="aplicarAcciones" tabindex="-1" aria-labelledby="aplicarAccionesLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg modal-servientrega">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h2 class="modal-title" id="aplicarAccionesLabel">¡Un momento por favor!</h2>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		    	<p class="text-center p-big" id='load-aviso'>Estamos procesando tu consulta</p>
		    	<p class="text-center my-4"><img class="fa-pulse" src="<?php echo plugin_dir_url(__FILE__); ?>images/loading-servientrega.svg" alt="loading" /></p>
		      </div>
		    </div>
		  </div>
		</div>
		
		<div class="modal fade" id="asignarRecoleccion" tabindex="-1" aria-labelledby="generarGuiasLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg modal-servientrega">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h2 class="modal-title" id="generarGuiasLabel">Asignar recolección</h2>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		    	<p class="text-center p-big generarguiastexto">Selecciona la fecha y hora de recolección</p>
		    	<div class="generarguiastexto p-medium">
		    		<div class="form-row my-3">
					    <div class="col-sm-6">
					      <input type="date" class="form-control" id="pickupDate">
					    </div>
					    <div class="col-sm-6">
					      	<div class="input-group bootstrap-timepicker timepicker">
								<div class="input-group-prepend ">
								    <span class="input-group-text"><i class="far fa-clock"></i></span>
								</div>
								
							  	<input id="pickupHour" type="text" class="form-control input-small">
								
							</div>
					    </div>
						
					  </div>
		    	</div>
		    	<p class="text-center my-4"><a href="#" id="aAsignarRecoleccion" class="btn btn-rounded">Asignar recolecciones</a></p>
		      </div>
		    </div>
		  </div>
		</div>


		<div class="modal fade" id="descargarZipPDF" tabindex="-1" aria-labelledby="generarGuiasLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg modal-servientrega">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h2 class="modal-title" id="generarGuiasLabel">Descargar archivo comprimido</h2>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		    	
		    	
		    	<p class="text-center my-4" id="pDescargarZIP"></p>
		      </div>
		    </div>
		  </div>
		</div>
		
		<div class="modal fade" id="uploadArchivo" tabindex="-1" aria-labelledby="generarGuiasLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg modal-servientrega">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h2 class="modal-title" id="generarGuiasLabel">Cargar archivo de envíos</h2>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		    	
		    	<form  method="post" id="upload_excel" name="upload_excel" enctype="multipart/form-data" >
				  <div class="form-group">
					
					<input type="file" class="form-control-file" id="file" name="file">
				  </div>
				  <p class="text-center p-big generarguiastexto py-3" id="rtaUpload"></p>
				  <p class="text-center my-4">
				  <button type="submit" id="btsubmit" name="btsubmit" class="btn btn-rounded" >Cargar Archivo</button>
				  </p>
				 
				</form>
		    	
		      </div>
		    </div>
		  </div>
		</div>
		
		
		

		
		

	</div><!-- Fin Contenedor plugin servientrega -->
  	
	<script>
	
			"use strict";
			var DT1;
			var enProceso;
			var today = new Date();
			
			jQuery('#pickupDate').val(today.getFullYear()+'-'+((today.getMonth()+1)<10?'0'+(today.getMonth()+1):(today.getMonth()+1))+'-'+((today.getDate()+1)<10?'0'+(today.getDate()+1):(today.getDate()+1)));
			
			
			
			jQuery(document).ready(function(){
				
			jQuery("#idPeriodo").change(function(){
				
				var fechafin=new Date();
				var fechaini=new Date();
				var dias=jQuery('#idPeriodo').val();
				
				fechaini.setDate(fechaini.getDate() - dias);
				
				alert(fechaini);
				
				jQuery('#fromFC').val(fechaini.getFullYear()+'-'+((fechaini.getMonth()+1)<10?'0'+(fechaini.getMonth()+1):(fechaini.getMonth()+1))+'-'+((fechaini.getDate()+1)<10?'0'+(fechaini.getDate()+1):(fechaini.getDate()+1)));
				jQuery('#toFC').val(fechafin.getFullYear()+'-'+((fechafin.getMonth()+1)<10?'0'+(fechafin.getMonth()+1):(fechafin.getMonth()+1))+'-'+((fechafin.getDate()+1)<10?'0'+(fechafin.getDate()+1):(fechafin.getDate()+1)));
				
				
				
				jQuery("#btnBuscar").click();
			});

			jQuery("#envios-realizados-tab").click(function(){ 
				jQuery('#divEstadoEnvio').hide(); 
				jQuery('#divAcciones').hide(); 
				jQuery('#enProceso').val('0');
				enProceso='0';
				
				
				var fechafin=new Date();
				var fechaini=new Date();
				var dias=jQuery('#idPeriodo').val();
				
				fechaini.setDate(fechaini.getDate() - dias);
				
				
				
				jQuery('#fromFC').val(fechaini.getFullYear()+'-'+((fechaini.getMonth()+1)<10?'0'+(fechaini.getMonth()+1):(fechaini.getMonth()+1))+'-'+((fechaini.getDate()+1)<10?'0'+(fechaini.getDate()):(fechaini.getDate())));
				jQuery('#toFC').val(fechafin.getFullYear()+'-'+((fechafin.getMonth()+1)<10?'0'+(fechafin.getMonth()+1):(fechafin.getMonth()+1))+'-'+((fechafin.getDate()+1)<10?'0'+(fechafin.getDate()):(fechafin.getDate())));
				
				
				jQuery("#btnBuscar").click();
			});
			
			jQuery("#envios-proceso-tab").click(function(){ 
				jQuery('#divEstadoEnvio').show(); 
				jQuery('#divAcciones').show(); 
				jQuery('#enProceso').val('1');
				enProceso='1';
				
				var fechafin=new Date();
				var fechaini=new Date();
				var dias=jQuery('#idPeriodo').val();
				
				fechaini.setDate(fechaini.getDate() - dias);
				
				
				
				jQuery('#fromFC').val(fechaini.getFullYear()+'-'+((fechaini.getMonth()+1)<10?'0'+(fechaini.getMonth()+1):(fechaini.getMonth()+1))+'-'+((fechaini.getDate())<10?'0'+(fechaini.getDate()):(fechaini.getDate())));
				jQuery('#toFC').val(fechafin.getFullYear()+'-'+((fechafin.getMonth()+1)<10?'0'+(fechafin.getMonth()+1):(fechafin.getMonth()+1))+'-'+((fechafin.getDate())<10?'0'+(fechafin.getDate()):(fechafin.getDate())));
				
				jQuery("#btnBuscar").click();
				
				/*var urlAjax='<?php echo plugin_dir_url(__FILE__); ?>consultarenvios.php';
				ejecutarconsultarPedido(urlAjax);*/
				//jQuery("#btnBuscar").click();
				
			});
      
			jQuery('#pickupHour').timepicker({
                minuteStep: 15,
                template: 'modal',
                appendWidgetTo: 'body',
                //showSeconds: true,
                showMeridian: false
                //defaultTime: false
            });

			jQuery("#btnAplicar").click(function(){
				
				var accion = jQuery('#cmbAcciones').val();
				 
				switch(accion)
				{
					case 'generarguia':
						jQuery("#generarguiasmasivo").click();
						break;
					case 'anularguia':
						generarAnularGuiasMasivo();
						break;
					case 'marcarrecoleccion':
						generarRecoleccionEsporadica(1);
						break;
					case 'desmarcarrecoleccion':
						generarRecoleccionEsporadica(0);
						break;
					case 'asignarrecoleccion':
						jQuery('#asignarRecoleccion').modal('show');
						
						break;
					case 'generarpdf':
						generarGuiasStickerMasivo();
						break;
					case 'actualizarestadoenvio':
						generarcosultarEstadoMasivo();
						break;
					case 'terminarenvio':
						terminarenvio();
						break;
				}
				 
				
				
			});

			
			
			
			
			
			jQuery('#aAsignarRecoleccion').click(function(e) {
				e.preventDefault();
				generarRecogidaMasivo();
				

			});
			
		
			
			jQuery('#aEspecificaciones').click(function(e) {
				e.preventDefault();
				window.location.href = "<?php echo plugin_dir_url(__FILE__); ?>Especificaciones.xlsx";
				
				
				

			});
			
			jQuery('#aSubmitUpload').click(function(e) {
				e.preventDefault();
				jQuery('#upload_excel').submit();
			});
			
			jQuery("#envios-proceso-tab").click();
			
		});
		
		
		
	
		function startUpload(){
		  jQuery('#load-aviso').html('Estamos procesando tu archivo');
		  jQuery('#aplicarAcciones').modal('show');
		  jQuery('#uploadArchivo').modal('hide');
		  jQuery('#rtaUpload').html('');
		  return true;
		}

		function stopUpload(success){
			  var result = '';
			
			  if (success == 1){
				 result = 'El archivo se cargó exitosamente.';
				 
			  }
			  else {
				 result = 'Hubo un error en la carga del archivo.';
				 
			  }
			 
			  jQuery('#rtaUpload').html(result);
			  //document.getElementById('rtaUpload').innerHTML = result ;
			  
			  //document.getElementById('f1_upload_form').style.visibility = 'visible'; 
			  document.getElementById('file').value="";	
			  jQuery('#aplicarAcciones').modal('hide');
			  jQuery('#uploadArchivo').modal('show');
			  return true;   
		}
		
  	    function generarRecogidaMasivo(){
			   
			   var horamin=jQuery("#pickupHour").val();
			   var myArr = horamin.split(":");
			   horamin=myArr[0]<10?"0"+horamin:horamin;
			   
			   
			  
			   var Guias=[];
			   var ConCobro=[];
			   var RecEsporadica=[];
			   var IdOrder=[];
			   
			   
			   
			   var FechaHoraPickUp= jQuery("#pickupDate").val() + ' ' + horamin;
			   
			  
			   
			   var rows=DT1.rows('.selected').data();
				
				for(var i=0;i<rows.length;i++)
				{
					var estado=rows[i][29];
					if (estado==2||estado==8|estado==10) 
					{
					   Guias.push(rows[i][3]);
					   RecEsporadica.push(rows[i][15]);
					   ConCobro.push(rows[i][12]);
					   IdOrder.push(rows[i][11]);
					}
					
				}
			 
			   
			  if(Guias.length==0) return;
			  var parametros={'Guias':Guias,
							  'ConCobro':ConCobro,
							  'RecEsporadica':RecEsporadica,
							  'IdOrder':IdOrder,
							  'FechaHoraPickUp':FechaHoraPickUp,
							  'opcion':'asignarrecoleccion',
							  'action': ajax_otrasacciones_var.action,
							  'nonce':ajax_otrasacciones_var.nonce};
			
		    

			ajaxotrasacciones(parametros, '#envios','recargarconsulta',null,'#asignarRecoleccion');
		  }  

		
		function generarRecoleccionEsporadica(valor){
			   
			 
			  var IdPedidoEnvio=[];
			  
				
			  
			   var rows=DT1.rows('.selected').data();
				
				for(var i=0;i<rows.length;i++)
				{
					var estado=rows[i][29];
					if (estado==1||estado==3||estado==6) IdPedidoEnvio.push(rows[i][1]);
					
				}
				
				if(IdPedidoEnvio.length==0) return;
				jQuery('#load-aviso').html('Estamos procesando tu solicitud<br>Aplicará solamente para los registros que tengan estado "Pendiente de generar guía", "Guía Anulada" y "Envío generado con error');
				jQuery('#aplicarAcciones').modal('show');
			  
			 
			  
			  var parametros={'IdPedidoEnvio':IdPedidoEnvio,'RecEsporadica':valor,'opcion':'generarRecoleccionEsporadica','action': ajax_otrasacciones_var.action,'nonce':ajax_otrasacciones_var.nonce};
			  
			
		
			  ajaxotrasacciones(parametros, '#envios','recargarconsulta', '#generarGuias','#aplicarAcciones');
			  
		} 

		
	
		

		  
		
		function generarcosultarEstadoMasivo(){
		   
		   var Guias=[];
		   var ConCobro=[];
		   var IdOrder=[];
		   
		    var rows=DT1.rows('.selected').data();
				
				for(var i=0;i<rows.length;i++)
				{
					var Guia=rows[i][3];
			
					Guias.push(Guia);
				   
					
				}
		   
		  if(Guias.length==0) return;
		  jQuery('#aplicarAcciones').modal('show');
		  var parametros={'Guias':Guias,
						  'opcion':'actualizarestadoenvio',
						  'action': ajax_otrasacciones_var.action,
						  'nonce':ajax_otrasacciones_var.nonce};
							
			
		  	
			
	
		ajaxotrasacciones(parametros, '#envios','recargarconsulta', null,'#aplicarAcciones');
	  }

		function generarGuiasStickerMasivo(){
			   
			   var Guias=[];
			   var ConCobro=[];
			   var IdOrder=[];
			   var estadoguia;
			   
			   var rows=DT1.rows('.selected').data();
				
				for(var i=0;i<rows.length;i++)
				{
				     estadoguia=rows[i][29];
				    
				    if(estadoguia==3) {
				        
				       
				        
    				    jQuery('#load-aviso').html('Dentro de los registros seleccionados hay al menos un una guía anulada; desmarque estos registros para poder ejecutar esta acción');
    				    jQuery('#aplicarAcciones').modal('show');
    				    return;
				        
				        
				    }
				       
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
			   
			  
			  if(Guias.length==0) return;
			  var parametros={'Guias':Guias,
							  'ConCobro':ConCobro,
							  'IdOrder':IdOrder,
							  'opcion':'generarpdf',
							  'action': ajax_otrasacciones_var.action,
							  'nonce':ajax_otrasacciones_var.nonce};
							 
				
			
			
			ajaxotrasacciones(parametros, '#envios','recargarconsulta', null,'#aplicarAcciones');
		  }      

		
		function descargarStickerZip(){
			   
			   var Guias=[];
			  
			  var rows=DT1.rows('.selected').data();
				
				for(var i=0;i<rows.length;i++)
				{
					var Guia=rows[i][3];
					
					Guias.push(Guia);
				    
					
				}
		   
		  if(Guias.length==0) return;
		  jQuery('#descargarZipPDF').modal('show');
			   
			  
			  if(Guias.length==0) return;
			  var parametros={'Guias':Guias,
							  'opcion':'descargarstickerzip',
							  'action': ajax_otrasacciones_var.action,
							  'nonce':ajax_otrasacciones_var.nonce};
			
			
			ajaxotrasacciones(parametros, '#pDescargarZIP',null,null,null);
			
		  }         
		
		
		function terminarenvio(){
			   
			 
			  var IdPedidoEnvio=[];
			  
				
			  
			   var rows=DT1.rows('.selected').data();
				
				for(var i=0;i<rows.length;i++)
				{
					IdPedidoEnvio.push(rows[i][1]);
					
				}
				
				if(IdPedidoEnvio.length==0) return;
				jQuery('#load-aviso').html('Estamos procesando tu solicitud');
				jQuery('#aplicarAcciones').modal('show');
			  
			 
			  
			  var parametros={'IdPedidoEnvio':IdPedidoEnvio,
							  'opcion':'terminarenvio',
							  'action': ajax_otrasacciones_var.action,
							  'nonce':ajax_otrasacciones_var.nonce};
			  
			  ajaxotrasacciones(parametros, '#envios','recargarconsulta', null,'#aplicarAcciones');
			 
		} 
	
	</script>
	

   </div>	
	

<!--/body-->
<?php 
}
?>