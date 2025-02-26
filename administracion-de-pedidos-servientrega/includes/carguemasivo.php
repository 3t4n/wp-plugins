<?php
function admonpedidosservientrega_carguedetallado(){
 include "ServiciosWeb.inc";
 include "Utilidades.php";
 include  plugin_dir_path(__DIR__ ) . 'arrays/pluginexterno/states/CO.php';
 
 $TipoMercanciaPremier=sanitize_text_field($_POST["TipoMercanciaPremier"]);
 
 if (isset($_POST["IdPedidoEnvio"])) {
	

    $IdPedidoEnvio=sanitize_text_field($_POST["IdPedidoEnvio"]);    

}
global $wpdb;
 
 //$NumRecaudo=0;
 if($TipoMercanciaPremier=='N')
{
	$authHeader["login"]=get_option("User");
	$authHeader["pwd"]=get_option("Password");
	$authHeader["Id_CodFacturacion"] =get_option("CodSer");
	
}
else
{
	$authHeader["login"]=get_option("UserCobro");
	$authHeader["pwd"]=get_option("PasswordCobro");
	$authHeader["Id_CodFacturacion"] =get_option("CodSerCobro");
}



 
 $authHeader["Nombre_Cargue"] =get_option("Nombre_Cargue");
  

  
		
 $CargueMasivoExterno=admonpedidosservientrega_SanitizeKeysValuesArray($_POST["CargueMasivoExterno"]);
 

 
 $DesDptoDestino=$CargueMasivoExterno["envios"]["CargueMasivoExternoDTO"]["objEnvios"]["EnviosExterno"]["Des_DepartamentoDestino"];
 
 $DesCiudadDestino=$CargueMasivoExterno["envios"]["CargueMasivoExternoDTO"]["objEnvios"]["EnviosExterno"]["Des_Ciudad"];
 
 $nombreCortoDpto=admonpedidosservientrega_nombreCortoDpto(admonpedidosservientrega_limpiar_cadena($states['CO'][$DesDptoDestino]));
			
 $ciudadDestino=admonpedidosservientrega_nombreCortoCiudad(admonpedidosservientrega_limpiar_cadena($DesCiudadDestino));
 
 
	
 $address_destine = "$ciudadDestino-$nombreCortoDpto";
 
 $cities = include plugin_dir_path(__DIR__ )  . 'arrays/CiudadesDane.php';

 $cod_dane = array_search($address_destine, $cities);
 
 if(!$cod_dane)
	$cod_dane = array_search($address_destine, admonpedidosservientrega_clean_cities_rate($cities));
 

 
 $ValorDeclaradoTotal=$CargueMasivoExterno["envios"]["CargueMasivoExternoDTO"]["objEnvios"]["EnviosExterno"]["Num_ValorDeclaradoTotal"];
 
 $ValorDeclaradoTotal=( $ValorDeclaradoTotal<5000?5000: $ValorDeclaradoTotal);
 
 $CargueMasivoExterno["envios"]["CargueMasivoExternoDTO"]["objEnvios"]["EnviosExterno"]["Num_ValorDeclaradoTotal"]=$ValorDeclaradoTotal;
 
 $mediotransporte="1";
					
 $aereo=  include plugin_dir_path(__DIR__ ) . 'arrays/DaneAereo.php';
					    
 if(in_array($cod_dane,$aereo)) $mediotransporte="2";
 
 
 // $NumRecaudo=0;
 //if($TipoMercanciaPremier!='N') $NumRecaudo= $ValorDeclaradoTotal;
 
 $CargueMasivoExterno["envios"]["CargueMasivoExternoDTO"]["objEnvios"]["EnviosExterno"]["Des_CiudadRemitente"]=get_option("Des_CiudadOrigen");//get_option("Des_CiudadRemitente");
 $CargueMasivoExterno["envios"]["CargueMasivoExternoDTO"]["objEnvios"]["EnviosExterno"]["Des_DireccionRemitente"]=get_option("Des_DireccionRemitente");
 $CargueMasivoExterno["envios"]["CargueMasivoExternoDTO"]["objEnvios"]["EnviosExterno"]["Nom_Remitente"]=get_option("Nom_Remitente");
 $CargueMasivoExterno["envios"]["CargueMasivoExternoDTO"]["objEnvios"]["EnviosExterno"]["Num_IdentiRemitente"]=get_option("Num_IdentiRemitente");
 $CargueMasivoExterno["envios"]["CargueMasivoExternoDTO"]["objEnvios"]["EnviosExterno"]["Num_TelefonoRemitente"]=get_option("Num_TelefonoRemitente");
 $CargueMasivoExterno["envios"]["CargueMasivoExternoDTO"]["objEnvios"]["EnviosExterno"]["Des_CiudadOrigen"]=get_option("Des_CiudadOrigen");
 $CargueMasivoExterno["envios"]["CargueMasivoExternoDTO"]["objEnvios"]["EnviosExterno"]["Des_DepartamentoOrigen"]=get_option("Des_DepartamentoOrigen");
 $CargueMasivoExterno["envios"]["CargueMasivoExternoDTO"]["objEnvios"]["EnviosExterno"]["Nombrecontacto_remitente"]=get_option("Nombrecontacto_remitente");
 $CargueMasivoExterno["envios"]["CargueMasivoExternoDTO"]["objEnvios"]["EnviosExterno"]["Celular_remitente"]=get_option("Celular_remitente");
 $CargueMasivoExterno["envios"]["CargueMasivoExternoDTO"]["objEnvios"]["EnviosExterno"]["Correo_remitente"]=get_option("Correo_remitente");
 $CargueMasivoExterno["envios"]["CargueMasivoExternoDTO"]["objEnvios"]["EnviosExterno"]["Nom_UnidadEmpaque"]=get_option("Nom_UnidadEmpaque");
 $CargueMasivoExterno["envios"]["CargueMasivoExternoDTO"]["objEnvios"]["EnviosExterno"]["Des_DepartamentoDestino"]= $nombreCortoDpto;
 $CargueMasivoExterno["envios"]["CargueMasivoExternoDTO"]["objEnvios"]["EnviosExterno"]["Des_Ciudad"]=$cod_dane;//$ciudadDestino;
 $CargueMasivoExterno["envios"]["CargueMasivoExternoDTO"]["objEnvios"]["EnviosExterno"]["Des_MedioTransporte"] =$mediotransporte;


 $strXML='<soap:Envelope xmlns:soap="http://www.w3.org/2003/05/soap-envelope" xmlns:tem="http://tempuri.org/">';
 $strXML= $strXML.'<soap:Header>'.admonpedidosservientrega_despliegueRecursivoArray($authHeader,"tem","AuthHeader").'</soap:Header>';
 $strXML= $strXML.'<soap:Body>'.admonpedidosservientrega_despliegueRecursivoArray($CargueMasivoExterno,"tem","CargueMasivoExterno").'</soap:Body>'.'</soap:Envelope>';
 $servicio= new admonpedidosservientrega_ServicioWeb_Cliente('http://web.servientrega.com:8081/GeneracionGuias.asmx?wsdl');




 $servicio->llamarServicioComplejo('CargueMasivoExterno',$strXML);
 

 
 $resultado=(admonpedidosservientrega_simplexml_load_string_nons($servicio->respuesta)->soap_Body->CargueMasivoExternoResponse->CargueMasivoExternoResult);
 


 $arrayGuias=((admonpedidosservientrega_simplexml_load_string_nons($servicio->respuesta)->soap_Body->CargueMasivoExternoResponse->arrayGuias));
 
    
  
 $NroGuia="NULL";
 $DescripcionError="";
 
 if(filter_var($resultado, FILTER_VALIDATE_BOOLEAN)){
	  
		foreach($arrayGuias->string as $s)
		{
			$NroGuia=$s;
		}   
	 }
 else{ 
	   
		foreach($arrayGuias->string as $s)
		{
			$DescripcionError.=$s;
		} 
	 }	
	

	$camposUpadate="";
	$ConCobro=$TipoMercanciaPremier=='N'?"0":"1";
	if($NroGuia=="NULL") $idEstado=6;
            else {$idEstado=2;
                $camposUpadate= ",ConCobro=".$ConCobro
                .",DesDptoDestino='".$DesDptoDestino."'"
                .",DesCiudadDestino='".$DesCiudadDestino."'"
                .",Correo_Electronico='".$CargueMasivoExterno["envios"]["CargueMasivoExternoDTO"]["objEnvios"]["EnviosExterno"]["Des_CorreoElectronico"]."'"
                .",Direccion='".$CargueMasivoExterno["envios"]["CargueMasivoExternoDTO"]["objEnvios"]["EnviosExterno"]["Des_Direccion"]."'"
                .",Contacto='".$CargueMasivoExterno["envios"]["CargueMasivoExternoDTO"]["objEnvios"]["EnviosExterno"]["Nom_Contacto"]."'" 
                .",Telefono='".$CargueMasivoExterno["envios"]["CargueMasivoExternoDTO"]["objEnvios"]["EnviosExterno"]["Des_Telefono"]."'"
                .",Num_Factura='".$CargueMasivoExterno["envios"]["CargueMasivoExternoDTO"]["objEnvios"]["EnviosExterno"]["Num_Factura"]."'"
                .",DiceContener='".$CargueMasivoExterno["envios"]["CargueMasivoExternoDTO"]["objEnvios"]["EnviosExterno"]["Des_DiceContener"]."'"
                .",ValorDeclaradoTotal=".$ValorDeclaradoTotal
                .",PesoTotal=".$CargueMasivoExterno["envios"]["CargueMasivoExternoDTO"]["objEnvios"]["EnviosExterno"]["Num_PesoTotal"]
                .",Alto=".$CargueMasivoExterno["envios"]["CargueMasivoExternoDTO"]["objEnvios"]["EnviosExterno"]["Num_Alto"]
                .",Largo=".$CargueMasivoExterno["envios"]["CargueMasivoExternoDTO"]["objEnvios"]["EnviosExterno"]["Num_Largo"]
                .",Ancho=".$CargueMasivoExterno["envios"]["CargueMasivoExternoDTO"]["objEnvios"]["EnviosExterno"]["Num_Ancho"];
            }
 
   
	$sql="UPDATE wp_PedidoEnvio set idEstado=".$idEstado.", NroGuia=".$NroGuia.",	DescripcionError='".$DescripcionError."'".$camposUpadate." where  idPedidoEnvio=".$IdPedidoEnvio;

	$result = $wpdb->get_results($sql);

   
	if($NroGuia=="NULL") echo "Errores: ". esc_html($DescripcionError);
	else echo "Se ha creado la gu&iacute;a ".esc_html($NroGuia);
	
}
