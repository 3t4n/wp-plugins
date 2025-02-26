<?php
function admonpedidosservientrega_generarcosultarEstadoMasivo(){ 
include "ServiciosWeb.inc";
 include "Utilidades.php";
 
 






$Guias=admonpedidosservientrega_SanitizeArrays(isset($_POST["Guias"]) ? (array) $_POST["Guias"] : array());




  
     $IdCliente=get_option("IdCliente");
	 
	 

      
global $wpdb;
	

for($i=0;$i<count($Guias);$i++)
{
    if(empty($Guias[$i])) continue;
    $params = array(
    	  'ID_Cliente'=> $IdCliente,
    	  'guia'=> $Guias[$i]
	    );
	
	

    $servicio= new admonpedidosservientrega_ServicioWeb_Cliente('http://wssismilenio.servientrega.com/wsrastreoenvios/wsrastreoenvios.asmx?wsdl');
    $servicio->parametrosEntrada=$params;
   
	
	$servicio->llamarServicio('EstadoGuia');
	
	
	
    $json = json_encode(simplexml_load_string($servicio->respuesta->EstadoGuiaResult->any));
    $arr = json_decode($json,TRUE);
   

    

	$sql="UPDATE wp_PedidoEnvio set FechaActualizacionEstado=Now(), IdEstadoEnvio=".(empty($arr["NewDataSet"] ["EstadosGuias"]["IdEstadoEnvio"])?'null':$arr["NewDataSet"] ["EstadosGuias"]["IdEstadoEnvio"]).",".
		 "Estado_Envio='".$arr["NewDataSet"]["EstadosGuias"]["Estado_Envio"]."',".
		 "Fecha_Entrega='".$arr["NewDataSet"]["EstadosGuias"]["Fecha_Entrega"]."',".
		 "Novedad='".$arr["NewDataSet"]["EstadosGuias"]["Novedad"]."'".
		 " where NroGuia=".$Guias[$i];
    $result=$wpdb->get_results($sql);
				 

    
    
}

 




}