<?php
function admonpedidosservientrega_options(){
	?>
	
	<div id="plugin-servientrega">
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
			<h1 class="mb-4 pb-4 border-bottom">Configuración</h1>
			<div class="left-cont">
				<h2 class="mb-3">Datos del contrato</h2>
				<p class="p-big mb-4 color-dark-grey">Para realizar la activación del nuevo servicio deberás completar la siguiente conﬁguración.</p>
				<div class="alert alert-warning" role="alert">
				  <img src="<?php echo plugin_dir_url(__FILE__); ?>images/ico-alert.svg" alt="Alerta" />Es necesario que tengas a la mano el contrato o el email con la información del servicio que tienes actualmente con servientrega.
				</div>
				<form  method="post" action="options.php">
					<?php
					settings_fields('servientrega-autenticacion');
					do_settings_sections('servientrega-autenticacion');
			   ?>
				  	<div class="form-row">
				    	<div class="form-group col-md-6">
				      		<label for="nit">NIT</label><span class="color-lighter-grey float-right" data-toggle="tooltip" title="Contenido del tooltip"><i class="far fa-question-circle"></i></span>
				      		<input type="text" class="form-control" id='IdCliente' name='IdCliente' value="<?php echo get_option("IdCliente") ?>">
				      		<div class="form-text color-grey">Agrega el número de NIT sin código veriﬁcación</div>
				    	</div>
				    	<div class="form-group col-md-6">
				      		<label for="usuario">Usuario</label><span class="color-lighter-grey float-right" data-toggle="tooltip" title="Contenido del tooltip"><i class="far fa-question-circle"></i></span>
				      		<input type="text" class="form-control" id='User' name='User' value='<?php echo get_option("User") ?>'>
				    	</div>
				  	</div>
				  	<div class="form-row">
				    	<div class="form-group col-md-6">
				      		<label for="contrasena">Contraseña</label><span class="color-lighter-grey float-right" data-toggle="tooltip" title="Contenido del tooltip"><i class="far fa-question-circle"></i></span>
				      		<input type="password" class="form-control" id='txtPassword' name='txtPassword'  placeholder="Password">
							<input type="hidden" class="form-control" id='Password' name='Password' value='<?php echo get_option("Password") ?>'>
				      		<div class="form-text color-grey" id="txtMensajePwd">Digita tu password y has clic en validar</div>
				    	</div>
				    	<div class="form-group col-md-6">
				      		<div class="d-none d-md-block"><label class="invisible">Validar contraseña</label></div>
				      		<input type="button" class="btn btn-outline-primary" value="Validar" onclick="ejecutaEncriptar('Password','txtMensajePwd')">
				    	</div>
				  	</div>
				  	<div class="form-row">
				    	<div class="form-group col-md-6">
				      		<label for="codSer">Cod Ser</label>
				      		<input type="text" class="form-control" id='CodSer' name='CodSer' value='<?php echo get_option("CodSer") ?>'>
				    	</div>
				  	</div>
				  	<h5 class="my-4">¿Eres cliente del servicio pago contra entrega?</h5>
				  	<div class="custom-control custom-radio custom-control-inline">
					  	<input type="radio" id="contraEntrega1" name="contraEntrega" class="custom-control-input" value="Si" <?php if(get_option("contraEntrega")=='Si') echo('checked'); ?>>
					  	<label class="custom-control-label" for="contraEntrega1">Sí</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
					  	<input type="radio" id="contraEntrega2" name="contraEntrega" class="custom-control-input" value="No" <?php if(get_option("contraEntrega")!='Si') echo('checked'); ?>>
					  	<label class="custom-control-label" for="contraEntrega2">No</label>
					</div>
					<hr />
					<div id="ConCobro" <?php if(get_option("contraEntrega")!='Si') echo('style="display:none"'); ?> >
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="usuario">Usuario con Cobro</label><span class="color-lighter-grey float-right" data-toggle="tooltip" title="Contenido del tooltip"><i class="far fa-question-circle"></i></span>
								<input type="text" class="form-control" id='UserCobro' name='UserCobro' value='<?php echo get_option("UserCobro") ?>'>
							</div>
						</div>
						
						
						<div class="form-row">
				    	<div class="form-group col-md-6">
				      		<label for="contrasena">Contraseña con Cobro</label><span class="color-lighter-grey float-right" data-toggle="tooltip" title="Contenido del tooltip"><i class="far fa-question-circle"></i></span>
				      		<input type="password" class="form-control" id='txtPasswordCobro' name='txtPasswordCobro'  placeholder="Password">
							<input type="hidden" class="form-control" id='PasswordCobro' name='PasswordCobro' value='<?php echo get_option("PasswordCobro") ?>'>
				      		<div class="form-text color-grey" id="txtMensajePwdCobro">Digita tu password y has clic en validar</div>
				    	</div>
				    	<div class="form-group col-md-6">
				      		<div class="d-none d-md-block"><label class="invisible">Validar contraseña</label></div>
				      		<input type="button" class="btn btn-outline-primary" value="Validar" onclick="ejecutaEncriptar('PasswordCobro','txtMensajePwdCobro')">
				    	</div>
				  	</div>
						
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="codSer">Cod Ser con Cobro</label>
								<input type="text" class="form-control" id='CodSerCobro' name='CodSerCobro' value='<?php echo get_option("CodSerCobro") ?>'>
							</div>
						</div>
						<hr/>
					</div>
					<h2 class="mb-3">Información de despacho de mercancía</h2>
					<div class="form-row">
				    	<div class="form-group col-md-6">
				      		<label for="unidadEmpaque">Unidad de empaque</label>
				      		<input type="text" class="form-control" id='Nom_UnidadEmpaque' name='Nom_UnidadEmpaque' value='<?php echo get_option("Nom_UnidadEmpaque") ?>'>
				    	</div>
				    	<div class="form-group col-md-6">
				      		<label for="correoElectronico">Correo electrónico</label>
				      		<input type="email" class="form-control" id='Correo_remitente' name='Correo_remitente' value='<?php echo get_option("Correo_remitente") ?>' placeholder="Tu correo electrónico">
				    	</div>
				  	</div>
				  	<h5>Teléfonos de contacto</h5>
				  	<div class="form-row">
				    	<div class="form-group col-md-6">
				      		<label for="Celular_remitente">Celular</label>
				      		<input type="tel" class="form-control intl-tel" id="Celular_remitente" name='Celular_remitente' value='<?php echo get_option("Celular_remitente") ?>' placeholder="Celular">
						</div>
				    	<div class="form-group col-md-6">
				      		<label for="Num_TelefonoRemitente">Teléfono fijo</label>
				      		<input type="tel" class="form-control intl-tel" id='Num_TelefonoRemitente' name='Num_TelefonoRemitente' value='<?php echo get_option("Num_TelefonoRemitente") ?>' placeholder="Teléfono fijo">
				    	</div>
				  	</div>
				  	<div class="alert alert-warning" role="alert">
					  <img src="<?php echo plugin_dir_url(__FILE__); ?>images/ico-alert.svg" alt="Alerta" />Indica el departamento y ciudad desde donde se despachen tus productos.
					</div>
					<div class="form-row">
				    	<div class="form-group col-md-6">
				      		<label for="Des_DepartamentoOrigen">Departamento de despacho</label>
				      		<select class="form-control" id='Des_DepartamentoOrigen' name='Des_DepartamentoOrigen'>
						        <option >Selecciona</option>
						        <?php require_once(plugin_dir_path(__DIR__ ) . 'arrays/dptos.php');
								admonpedidosservientrega_dptoOptions(get_option("Des_DepartamentoOrigen"));?>
						    </select>
				    	</div>
				    	<div class="form-group col-md-6">
				      		<label for="Des_CiudadOrigen">Ciudad despacho</label>
				      		<select class="form-control" id='Des_CiudadOrigen' name='Des_CiudadOrigen'>
						        <option selected>Selecciona</option>
						        
						    </select>
				    	</div>
				  	</div>
				  	<div class="form-row">
				    	<div class="form-group col-md-6">
				      		<label for="dirDespacho">Dirección de despacho</label>
				      		<input type="text" class="form-control" id='Des_DireccionRemitente' name='Des_DireccionRemitente' value='<?php echo get_option("Des_DireccionRemitente") ?>' placeholder="Indica la dirección de despacho">
				    	</div>
				  	</div>
					<p class="text-left mt-3 d-flex align-items-center">
					
					<button type="submit" class="btn btn-rounded" >Finalizar configuración</button>
					<input type="hidden" class="form-control" id='Nombre_Cargue' name='Nombre_Cargue' value='INTEGRACION INFO_CLIENTE'>
					<!--input type="hidden" class="form-control" id='Num_IdentiRemitente' name='Num_IdentiRemitente' value=''-->
					<!--input type="hidden" class="form-control" id='Nom_Remitente' name='Nom_Remitente' value=''-->
					<!--input type="hidden" class="form-control" id='Nombrecontacto_remitente' name='Nombrecontacto_remitente' value=''-->
					
					
		
					<!--a href="#" class="color-light-grey font-bigger ml-4" disabled>Cancelar</a--></p>
				</form>
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
		    	<p class="text-center p-big" id='load-aviso'>Estamos actualizando los cambios</p>
		    	<p class="text-center my-4"><img class="fa-pulse" src="<?php echo plugin_dir_url(__FILE__); ?>images/loading-servientrega.svg" alt="loading" /></p>
		      </div>
		    </div>
		  </div>
		</div>
	
	</div><!-- Fin Contenedor plugin servientrega -->
		
	<script>
		"use strict";
		
		jQuery(document).ready(function(){
			
			
			jQuery("input[name$='contraEntrega']").click(function() {
			var muestra = jQuery(this).val()=='Si';
			if(muestra) jQuery("#ConCobro").show();
			else jQuery("#ConCobro").hide();
			});
			llenaCiudades(jQuery("#Des_DepartamentoOrigen").val());
			jQuery("#Des_DepartamentoOrigen").change(function(){
				llenaCiudades(jQuery(this).val());
			});
			
			jQuery( "form" ).submit(function() {
			  jQuery('#aplicarAcciones').modal('show');
			  return true;
			});
		});
	
		function llenaCiudades(elegido){
			jQuery("#Des_CiudadOrigen").empty();
			if(!municipios[elegido]) return;
			municipios[elegido].forEach(function(element,index){
			var selected="";
			if(element[0]=='<?php echo get_option("Des_CiudadOrigen") ?>') selected="selected" ;
				jQuery('#Des_CiudadOrigen').append('<option value="'+element[0]+'" '+selected+'>'+element[1]+'</option>');
			});
		}
	</script>
	
	<?php	
}
?>