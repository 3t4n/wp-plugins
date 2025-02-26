<?php
//error_reporting(E_ERROR | E_WARNING | E_PARSE);
 //include "ServiciosWeb.inc";
 //include "Utilidades.php";
 
function admonpedidosservientrega_detalleenvio(){
 include "ServiciosWeb.inc";
 include "Utilidades.php";
 include  plugin_dir_path(__DIR__ ) . 'arrays/pluginexterno/states/CO.php';

if (isset($_POST["IdPedidoEnvio"])) {
	

    $IdPedidoEnvio=sanitize_text_field($_POST["IdPedidoEnvio"]);    

}

global $wpdb;

 $Ide_CodFacturacion =get_option("CodSer");
 
 $sqlConsulta="SELECT * FROM wp_PedidoEnvio WHERE idPedidoEnvio =".$IdPedidoEnvio;
 
 $resultConsulta=$wpdb->get_results($sqlConsulta);
 

 
 foreach ($resultConsulta as $row)
        
		{
		
        	
		$nroGuia=$row->NroGuia;
		
		if(!empty($nroGuia)) $nroGuia= " Nro. Guía: ".$nroGuia; 
		
		$estadosenvio = include plugin_dir_path(__DIR__ ) . 'arrays/estadosenvio.php';;
				
		$estadoenvio = array_search($row->idEstado, $estadosenvio);
		
		
		
		$mediotransporte="1";
						 
		$aereo=  include plugin_dir_path(__DIR__ ) . 'arrays/DaneAereo.php';
		
		
		
		$nombreCortoDpto=admonpedidosservientrega_nombreCortoDpto(admonpedidosservientrega_limpiar_cadena($states['CO'][$row->DesDptoDestino]));
		
		$ciudadDestino=admonpedidosservientrega_nombreCortoCiudad(admonpedidosservientrega_limpiar_cadena($row->DesCiudadDestino));
		
		$address_destine = "$ciudadDestino-$nombreCortoDpto";
		
		$habilitaLogisticaCobro=true;
		
		$arrLogisticaCobro=  include plugin_dir_path(__DIR__ ) . 'arrays/LogisticaCobro.php';
			if(in_array($address_destine,$arrLogisticaCobro)) 
			{ 
				echo "El destino ".esc_html($address_destine)."  no está habilitado para envío con Logistica para cobro".
				"<br> Se cambia por Normal ";
				
				$habilitaLogisticaCobro=false;
				
			}
		
		if(in_array($address_destine,$aereo)) $mediotransporte="2";
		
		
?>

	<div id="plugin-servientrega"><!-- Inicio Contenedor plugin servientrega -->
		<header id="header-main-serv">
			<div class="container">
				<div class="row justify-content-start align-items-center">
					<div class="col-12 logo text-left">
						<img src="<?php echo plugin_dir_url(__FILE__)?>images/logo-servientrega.png" alt="Servientrega" />
					</div>
				</div>
			</div>
		</header>
		
		<div id="content-serv">
			<div class="container">
				<p class="p-medium font-weight-bold"><a href="admin.php?page=servientrega-generacion-envio"><i class="fas fa-arrow-left color-black"></i> Volver</a></p>
				<div class="row detalle-envio">
					<div class="col-xxl-10 col-lg-9 col-md-8">
						<div class="d-flex flex-wrap justify-content-between mb-4">
							<h1 class="mb-0 mr-2">Detalle de envío <?php echo esc_html($nroGuia); ?></h1>
							<?php if($row->idEstado==1||$row->idEstado==3||$row->idEstado==6){?>
								<a href="#" id="hrefEditar" class="editar-info p-big"><i class="fas fa-pen"></i> Editar información del envío</a>
							<?php }?>
							
						</div>
						<div class="shadow my-3 py-md-4 py-2 px-4 shadow-box">
							<div class="row p-big">
								<div class="col-md-6 col-xl-3">
									<strong>Número de orden:</strong>
									<div class="p-semi"><?php echo esc_html($row->IdOrder) ?></div>
								</div>
								<div class="col-md-6 col-xl-3">
									<strong>Estado del envío:</strong>
									<div>
									    <span class='<?php echo esc_attr($estadosenvio[$row->idEstado][1]); ?>'> <?php echo esc_html($estadosenvio[$row->idEstado][0]); ?> </span>
									  
									</div>
								</div>
								<div class="col-md-6 col-xl-3">
									<strong>Fecha de creación:</strong>
									<div class="p-semi"><?php echo esc_html($row->FechaCreacion)?></div>
								</div>
								<!--div class="col-md-6 col-xl-3">
									<strong>Recolección esporádica:</strong>
									<div class="p-semi"></div>
								</div-->
							</div>
						</div>
						<form class="mt-5">
							<input class='authHeader' type='hidden' id='login' name='txtlogin' value=''>
							<input class='authHeader' type='hidden' id='pwd' name='txtpwd' value=''>
							<input class='authHeader' type='hidden' id='Id_CodFacturacion' name='txtId_CodFacturacion' value=''>
							<input class='authHeader' type='hidden' id='Nombre_Cargue' name='txtNombre_Cargue' value=''>
							<h3 class="mb-3">Información de envío:</h3>
							<div class="left-cont">
							  	<div class="form-row">
							    	<div class="form-group col-md-6">
							      		<label for="tipoMercanciaPremier">Tipo de envío</label>
							      		<select class="form-control" id="tipoMercanciaPremier" disabled>
							      			 <option value="N" <?php echo esc_attr($row->ConCobro==0  ? "selected":"") ?> >Normal</option>
											 <option value="C" <?php echo esc_attr($row->ConCobro==1 && $habilitaLogisticaCobro?"selected":"") ?>>Con Cobro</option>
							      		</select>
							    	</div>
							    	<div class="form-group col-md-6">
							      		<label for="Des_CiudadOrigen">DANE Ciudad de origen</label>
							      		<input type="text" class="form-control enviosExterno" id="Des_CiudadOrigen"  orden="1"  value='<?php echo esc_attr(get_option("Des_CiudadOrigen")); ?>' disabled>
							    	</div>
							  	</div>
							  	<div class="form-row">
							    	<div class="form-group col-md-6">
							      		<label for="Celular_remitente">Teléfono del emisor</label>
							      		<input type="text" class="form-control enviosExterno" orden="1"  id="Celular_remitente" value='<?php echo esc_attr(get_option("Celular_remitente")); ?>' disabled> 
							    	</div>
							  	</div>
							</div>
							<hr />
							<h3 class="my-3">Información de destino:</h3>
							<div class="left-cont">
							  	<div class="form-row">
							    	<div class="form-group col-md-6">
							      		<label for="Des_DepartamentoDestino">Departamento de destino</label>
							      		<!--input type="text" class="form-control" id="deptoDestino" value="Crra 150 # 56 -00  Mazurén" disabled-->
										<select class="form-control enviosExterno" orden="45"  id="Des_DepartamentoDestino" disabled>
											        <option  value="" selected>Selecciona</option>
											        <?php 
														$codDpto=$row->DesDptoDestino=='DC'?'CUN':$row->DesDptoDestino;
														foreach($states['CO'] as $key => $item){
															
															$selected="";
															if($key==$codDpto) $selected="selected";?>
															<option <?php echo esc_attr($selected) ?> value='<?php echo esc_attr($key) ?>'> <?php echo esc_html($item)?></option>
													<?php	} ?>
														
													
													
											    </select>
							    	</div>
							    	<div class="form-group col-md-6">
							      		<label for="Des_CorreoElectronico">Correo electrónico del destinatario</label>
							      		<input type="text" class="form-control enviosExterno" orden="54"  id="Des_CorreoElectronico" value="<?php echo esc_attr($row->Correo_Electronico) ?>" disabled>
							    	</div>
							  	</div>
							  	<div class="form-row">
							    	<div class="form-group col-md-6">
							      		<label for="Des_Ciudad">Ciudad de destino</label>
							      		<select class="form-control enviosExterno" orden="21"  id="Des_Ciudad" disabled>
											        <option  value="" selected>Selecciona</option>
											        
										</select>
							    	</div>
							    	<div class="form-group col-md-6">
							      		<label for="Des_Direccion">Dirección de destino</label>
							      		<input type="text" class="form-control enviosExterno" orden="22"  id="Des_Direccion"  value="<?php echo esc_attr($row->Direccion)?>" disabled>
							    	</div>
							  	</div>
							  	
							  	<div class="form-row">
									<div class="form-group col-md-6">
							      		<label for="Nom_Contacto">Nombre de contacto</label>
							      		<input type="text" class="form-control enviosExterno" orden="23"  id="Nom_Contacto" value="<?php echo esc_attr($row->Contacto) ?>" disabled>
							    	</div>
							    	<div class="form-group col-md-6">
							      		<label for="Des_Telefono">Teléfono de contacto</label>
							      		<input type="text" class="form-control enviosExterno" orden="20"  id="Des_Telefono" value="<?php echo esc_attr($row->Telefono) ?>" disabled>
							    	</div>
							  	</div>
							</div>
							<hr />
							<h3 class="my-3">Información del paquete:</h3>
							<div class="left-cont">
							  	<div class="form-row">
							    	<div class="form-group col-md-6">
							      		<label for="numeroFactura">Número de factura</label>
							      		<input type="text" class="form-control enviosExterno" orden="53"  id="Num_Factura" value="<?php echo esc_attr(($row->IdOrder)) ?>" disabled>
							    	</div>
							    	<div class="form-group col-md-6">
							      		<label for="Des_DiceContener">Paquete dice contener</label>
							      		<input type="text" class="form-control enviosExterno" orden="26"  id="Des_DiceContener" value="<?php echo esc_attr($row->DiceContener) ?>" disabled>
							    	</div>
							  	</div>							  	
							  	<div class="form-row">
							    	<div class="form-group col-md-6">
							      		<label for="Num_ValorDeclaradoTotal">Valor declarado</label>
							      		<input type="text" class="form-control enviosExterno" orden="15"  id="Num_ValorDeclaradoTotal" value="<?php echo esc_attr($row->ValorDeclaradoTotal) ?>" disabled>
							    	</div>
							    	<div class="form-group col-md-6">
							      		<label for="Num_PesoTotal">Peso (kg)</label>
							      		<input type="text" class="form-control enviosExterno" orden="14"  id="Num_PesoTotal" value="<?php echo esc_attr($row->PesoTotal) ?>" disabled>
							    	</div>
							  	</div>							  	
							  	<div class="form-row">
							    	<div class="form-group col-md-6">
							      		<p class="p-medium mb-1">Dimensiones (cm):</p>
							      		<div class="form-row form-group-inside">
							      			<div class="form-group col-4 col-xl-3">
							      				<label for="Num_Ancho">Ancho</label>
									      		<input type="text" class="form-control enviosExterno" orden="41"  id="Num_Ancho" value="<?php echo esc_attr($row->Ancho) ?>" disabled>
									      	</div>
							      			<div class="form-group col-4 col-xl-3">
							      				<label for="Num_Largo">Largo</label>
									      		<input type="text" class="form-control enviosExterno" orden="42"  id="Num_Largo" value="<?php echo esc_attr($row->Largo) ?>" disabled>
									      	</div>
							      			<div class="form-group col-4 col-xl-3">
							      				<label for="Num_Alto">Alto</label>
									      		<input type="text" class="form-control enviosExterno" orden="40"  id="Num_Alto" value="<?php echo esc_attr($row->Alto) ?>" disabled>
									      	</div>
									    </div>
							    	</div>
							    	<!--div class="form-group col-md-6">
							      		<label for="costoEnvio">Costo de envío</label>
							      		<input type="text" class="form-control" id="costoEnvio" value="$5.000" disabled>
							    	</div-->
							  	</div>
							</div>
							<input class='enviosExterno' type='hidden' id='Num_Guia' orden="1" name='txtNum_Guia' value='0'>
							<input class='enviosExterno' type='hidden' id='Num_Sobreporte' orden="2"  name='txtNum_Sobreporte' value='0'>
							<input class='enviosExterno' type='hidden' id='Num_SobreCajaPorte' orden="3"  name='txtNum_SobreCajaPorte' value='0'>
							<input class='enviosExterno' type='hidden' id='Fec_TiempoEntrega' orden="4"  name='txtFec_TiempoEntrega' value='0'>
							<input class='enviosExterno' type='hidden' id='Doc_Relacionado' orden="5"  name='txtDoc_Relacionado' value=''>
							<input class='enviosExterno' type='hidden' id='Num_Piezas' orden="6"  name='txtNum_Piezas' value='1'>
							<input class='enviosExterno' type='hidden' id='Des_TipoTrayecto'  orden="7" name='txtDes_TipoTrayecto' value='1'>
							<input class='enviosExterno' type='hidden' id='Ide_Producto' orden="8"  name='txtIde_Producto' value='2'>
							<input class='enviosExterno' type='hidden' id='Ide_Destinatarios' orden="9"  name='txtIde_Destinatarios' value='00000000-0000-0000-0000-000000000000'>
							<input class='enviosExterno' type='hidden' id='Ide_CodFacturacion' orden="10"  name='txtIde_CodFacturacion' value='<?php echo esc_attr($Ide_CodFacturacion) ?>'>
							<input class='enviosExterno' type='hidden' id='Ide_Manifiesto' orden="11"  name='txtIde_Manifiesto' value='00000000-0000-0000-0000-000000000000'>
							<input class='enviosExterno' type='hidden' id='Des_FormaPago' orden="12"  name='txtDes_FormaPago' value='2'>
							<input class='enviosExterno' type='hidden' id='Des_MedioTransporte' orden="13"  name='txtDes_MedioTransporte' value='<?php echo esc_attr($mediotransporte) ?>'>
							<input class='enviosExterno' type='hidden' id='Num_VolumenTotal' orden="16"  name='txtNum_VolumenTotal' value='0'>
							<input class='enviosExterno' type='hidden' id='Num_BolsaSeguridad' orden="17"  name='txtNum_BolsaSeguridad' value='0'>
							<input class='enviosExterno' type='hidden' id='Num_Precinto' orden="18"  name='txtNum_Precinto' value='0'>
							<input class='enviosExterno' type='hidden' id='Des_TipoDuracionTrayecto' orden="19"  name='txtDes_TipoDuracionTrayecto' value='1'>
							<input class='enviosExterno' type='hidden' id='Des_VlrCampoPersonalizado1' orden="24"  name='txtDes_VlrCampoPersonalizado1' value='DE WooCommerce'>
							<input class='enviosExterno' type='hidden' id='Num_ValorLiquidado' orden="25"  name='txtNum_ValorLiquidado' value='0'>
							<input class='enviosExterno' type='hidden' id='Des_TipoGuia' orden="27"  name='txtDes_TipoGuia' value='2'>
							<input class='enviosExterno' type='hidden' id='Des_CiudadRemitente' orden="28"  name='txtDes_CiudadRemitente' value='Traer de configuración de la tienda'>
							<input class='enviosExterno' type='hidden' id='Num_VlrSobreflete' orden="29"  name='txtNum_VlrSobreflete' value='0'>
							<input class='enviosExterno' type='hidden' id='Num_VlrFlete' orden="30"  name='txtNum_VlrFlete' value='0'>
							<input class='enviosExterno' type='hidden' id='Num_Descuento' orden="31"  name='txtNum_Descuento' value='0'>
							<input class='enviosExterno' type='hidden' id='Tipo_Doc_Destinatario' orden="32"  name='txtTipo_Doc_Destinatario' value='CC'>
							<input class='enviosExterno' type='hidden' id='Ide_Num_Identific_Dest' orden="33"   name='txtIde_Num_Identific_Dest' value='<?php echo esc_attr($row->IdOrder) ?>'>
							<input class='enviosExterno' type='hidden' id='Num_PesoFacturado' orden="34"  name='txtNum_PesoFacturado' value='0'>
							<input class='enviosExterno' type='hidden' id='Nom_TipoTrayecto' orden="35"  name='txtNom_TipoTrayecto' value='1'>
							<input class='enviosExterno' type='hidden' id='Est_CanalMayorista' orden="36"  name='txtEst_CanalMayorista' value='false'>
							<input class='enviosExterno' type='hidden' id='Nom_Remitente' orden="37"   name='txtNom_Remitente' value='Traer de la configuración de la tienda'>
                            <input class='enviosExterno' type='hidden' id='Num_IdentiRemitente' orden="38"   name='txtNum_IdentiRemitente' value='Traer de la configuración de la tienda'>
                            <input class='enviosExterno' type='hidden' id='Num_TelefonoRemitente' orden="39"   name='txtNum_TelefonoRemitente' value='<?php echo esc_attr(get_option("Num_TelefonoRemitente")) ?>'>
          
							<input class='enviosExterno' type='hidden' id='Des_DiceContenerSobre' orden="44"  name='txtDes_DiceContenerSobre' value='false'>   
							<input class='enviosExterno' type='hidden' id='Des_DepartamentoOrigen' orden="46"   name='txtDes_DepartamentoOrigen' value='Traer de la configuración de la tienda'>
							<input class='enviosExterno' type='hidden' id='Gen_Cajaporte' orden="47"  name='txtGen_Cajaporte' value='false'>
							<input class='enviosExterno' type='hidden' id='Gen_Sobreporte' orden="48"  name='txtGen_Sobreporte' value='false'>
							<input class='enviosExterno' type='hidden' id='Nom_UnidadEmpaque' orden="49"  name='txtNom_UnidadEmpaque' value='Traer de la configuración'>
							<input class='enviosExterno' type='hidden' id='Des_UnidadLongitud' orden="50"  name='txtDes_UnidadLongitud' value='cm'>
							<input class='enviosExterno' type='hidden' id='Des_UnidadPeso' orden="51"  name='txtDes_UnidadPeso' value='kg'>
							<input class='enviosExterno' type='hidden' id='Num_ValorDeclaradoSobreTotal' orden="52"  name='txtNum_ValorDeclaradoSobreTotal' value='0'>
							<input class='enviosExterno' type='hidden' id='Num_Celular' orden="55"  name='txtNum_Celular' value='<?php echo esc_attr($row->Telefono) ?>'>
							<input class='enviosExterno' type='hidden' id='Num_Recaudo' orden="56" name='txtNum_Recaudo' value='<?php echo esc_attr($row->ConCobro==1 && $habilitaLogisticaCobro ?$row->ValorDeclaradoTotal:0) ?>' >
							<input class='enviosExterno' type='hidden' id='id_zonificacion' orden="57"  name='txtid_zonificacion' value='10'>
							
							<input class='enviosExterno' type='hidden' id='nombrecontacto_remitente' orden="58" name='txtnombrecontacto_remitente' value=''>
							
							<input class='enviosExterno' type='hidden' id='correo_remitente' orden="60" name='txtcorreo_remitente' value=''>
							<input type='hidden'  id='IdPedidoEnvio' name='IdPedidoEnvio' value='<?php echo esc_attr($IdPedidoEnvio) ?>'>
							
						</form>
					</div>
					<div class="col-xxl-2 col-lg-3 col-md-4 sidebar">
					    <?php if($row->idEstado==1||$row->idEstado==3||$row->idEstado==6){?>
								<a href="#" id="hrefGenerarGuias" class="btn btn-rounded btn-block btn-small"><img src="<?php echo plugin_dir_url(__FILE__)?>images/ico-guias-detalle.svg" alt="Guías"> Generar guía</a>
						<?php }?>
						
						
					</div>

				</div>
				
			</div>
		</div>
		<!--div id="Respuesta"></div-->
	
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
		    	<p class="text-center p-big generarguiastexto py-3" id="Respuesta">Se generaron correctamente las guías para los envíos seleccionados.</p>
		    	<p class="text-center my-4"><a href="#" onclick="recargarDetalle(<?php echo esc_attr($IdPedidoEnvio)?>)" class="btn btn-rounded">Continuar</a></p>
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
	
	</div><!-- Fin Contenedor plugin servientrega -->
	<script>
		jQuery(document).ready(function(){
			
			jQuery("#tipoMercanciaPremier").change(function() {
          
				  if(jQuery("#tipoMercanciaPremier").val()=='C')
				  {
					  jQuery("#Num_Recaudo").val(jQuery("#Num_ValorDeclaradoTotal").val());
				  }
				  else
				  {
					   jQuery("#Num_Recaudo").val(0);
				  }
				  
			}); 
			
			jQuery('#hrefEditar').click(function(e) {
				
				e.preventDefault();
				jQuery("#tipoMercanciaPremier").removeAttr('disabled');
				
				jQuery('.enviosExterno').each(function(){
					
					if(jQuery(this).attr("id")!="Des_CiudadOrigen" && jQuery(this).attr("id")!="Celular_remitente" ) 			
						jQuery(this).removeAttr('disabled');
					
					
					
					
					//if(jQuery(this).is("select")) jQuery(this).removeAttr('disabled');
				});
				//jQuery(this).html('<i class="fas fa-pen"></i> Deshabilitar campos');
				//jQuery('#uploadArchivo').modal('show');

			});
			
			jQuery('#hrefGenerarGuias').click(function(e) {
				
				e.preventDefault();
				
				
				
				var arrSortenviosExterno ={};
				
				
				jQuery(".enviosExterno").each(function () {
					var enviosExternotemp={}; 
					enviosExternotemp[jQuery(this).attr('id')] = jQuery(this).val()  ;
					
					arrSortenviosExterno[jQuery(this).attr("orden")]=enviosExternotemp;
					
				});
				
				var enviosExterno={};
				
				var keys=Object.keys(arrSortenviosExterno);
				
				for(var i=0;i<keys.length;i++)
				{
					var pareja=arrSortenviosExterno[keys[i]];
					var keysChild=Object.keys(pareja);
					
					
					enviosExterno[keysChild[0]]=pareja[keysChild[0]];
					
				}
				
				
				jQuery('#aplicarAcciones').modal('show');

				
				ejecutarCargueMasivoExtendido(enviosExterno,'#generarGuias','#aplicarAcciones');
				
				
				
			});
			
			
			
			jQuery("#Des_DepartamentoDestino").change(function() {
									
					llenarCiudades(jQuery(this).val());
				});
			
			llenarCiudades('<?php echo esc_html($row->DesDptoDestino) ?>');
				
			
				
				
				
				
		});
			
		function llenarCiudades(valor) {
			
			
			var parametros={'action': ajax_ciudades_var.action, 'nonce': ajax_ciudades_var.nonce, 'elegido':valor };
				
				
				jQuery.ajax({
					data:  parametros, //datos que se envian a traves de ajax
					url:   ajax_ciudades_var.url, //archivo que recibe la peticion
					type:  'post', //método de envio
					success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
									
								jQuery('#Des_Ciudad').html(response);
								jQuery("#Des_Ciudad option[value='<?php echo esc_js($row->DesCiudadDestino) ?>']").attr("selected", true);
							
							
					}
					
				});
			
			
		}
		
	</script>
<?php } 
}

	