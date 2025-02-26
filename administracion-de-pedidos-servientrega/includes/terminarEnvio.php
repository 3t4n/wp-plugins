<?php

 error_reporting(E_ERROR | E_WARNING | E_PARSE);

function admonpedidosservientrega_terminarenvio(){ 
 include "ServiciosWeb.inc";
 include "Utilidades.php";
 
  
     
      
     
		  global $wpdb;	
     	   ;
		  $IdPedidoEnvios =admonpedidosservientrega_SanitizeArrays(isset($_POST["IdPedidoEnvio"]) ? (array) $_POST["IdPedidoEnvio"] : array());
     	  
     	  
     	  
     	  for($i=0;$i<count($IdPedidoEnvios);$i++)
          {
                
                
                $sql="UPDATE wp_PedidoEnvio set idEstado=11 where idPedidoEnvio=".$IdPedidoEnvios[$i];
                $result=$wpdb->get_results($sql);
                
                
                
            }
}