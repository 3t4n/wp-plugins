<?php

 error_reporting(E_ERROR | E_WARNING | E_PARSE);
 
	function admonpedidosservientrega_generarRecoleccionEsporadica(){
	 include "ServiciosWeb.inc";
	 include "Utilidades.php";
	 
	  
		
		  
		 
			  global $wpdb;	
			  
			  $RecEsporadica=sanitize_text_field($_POST["RecEsporadica"]);
			  
			  $IdPedidoEnvios=admonpedidosservientrega_SanitizeArrays(isset($_POST["IdPedidoEnvio"]) ? (array) $_POST["IdPedidoEnvio"] : array());
			
			  
			  for($i=0;$i<count($IdPedidoEnvios);$i++)
			  {
					
					
					$sql="UPDATE wp_PedidoEnvio set TieneRecoleccionEsp=".$RecEsporadica." where idPedidoEnvio=".$IdPedidoEnvios[$i];
					$result=$wpdb->get_results($sql);
					
					
					
				}
	}