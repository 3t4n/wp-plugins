<?php

 error_reporting(E_ERROR | E_WARNING | E_PARSE);

function admonpedidosservientrega_anularenviosmasivo_ajax(){
 include "ServiciosWeb.inc";
 include "Utilidades.php";
     
      
    
 global $wpdb;
     

          
            
	        
	        $strXMLNormal='<soap:Header><tem:AuthHeader>
    			<tem:login>'.get_option("User").'</tem:login>
    			<tem:pwd>'.get_option("Password").'</tem:pwd>
    			<tem:Id_CodFacturacion>'.get_option("CodSer").'</tem:Id_CodFacturacion>
    			<tem:Nombre_Cargue>'.get_option("Nombre_Cargue").'</tem:Nombre_Cargue>
    		</tem:AuthHeader></soap:Header>';
    		
    	
	        $strXMLCobro='<soap:Header><tem:AuthHeader>
    			<tem:login>'.get_option("UserCobro").'</tem:login>
    			<tem:pwd>'.get_option("PasswordCobro").'</tem:pwd>
    			<tem:Id_CodFacturacion>'.get_option("CodSerCobro").'</tem:Id_CodFacturacion>
    			<tem:Nombre_Cargue>'.get_option("Nombre_Cargue").'</tem:Nombre_Cargue>
    		</tem:AuthHeader></soap:Header>';
     
            $Ide_CodFacturacionNormal=get_option("CodSer");
            $Ide_CodFacturacionCobro=get_option("CodSerCobro");
            
            
            
  
		  $Guias=admonpedidosservientrega_SanitizeArrays(isset($_POST["Guias"]) ? (array) $_POST["Guias"] : array());
		  $ConCobro=admonpedidosservientrega_SanitizeArrays(isset($_POST["ConCobro"]) ? (array) $_POST["ConCobro"] : array());
		  $IdOrder=admonpedidosservientrega_SanitizeArrays(isset($_POST["IdOrder"]) ? (array) $_POST["IdOrder"] : array());
     	  
     	  for($i=0;$i<count($Guias);$i++)
          {
             $strXML='<soap:Envelope xmlns:soap="http://www.w3.org/2003/05/soap-envelope" xmlns:tem="http://tempuri.org/">';
                 
                if ($ConCobro[$i]==0) {
                    $strXML.=$strXMLNormal;
                    $Ide_CodFacturacion=$Ide_CodFacturacionNormal;
                    
                 }
                
                if ($ConCobro[$i]==1) {
                    $strXML.=$strXMLCobro;
                    $Ide_CodFacturacion=$Ide_CodFacturacionCobro;
                   
                }
                
                $strXML.="<soap:Body>
                    		<tem:AnularGuias>
                			<tem:num_Guia>".$Guias[$i]."</tem:num_Guia>
                			<tem:num_GuiaFinal>".$Guias[$i]."</tem:num_GuiaFinal>
                			<tem:interno>
                				<tem:ResultadoAnulacionGuias>
                					<tem:Num_Guia>0</tem:Num_Guia>
                					<tem:Descripcion>0</tem:Descripcion>
                				</tem:ResultadoAnulacionGuias>
                			</tem:interno>
                		</tem:AnularGuias>
                    	</soap:Body></soap:Envelope>";
                    	
                   	
				
                $servicio= new admonpedidosservientrega_ServicioWeb_Cliente('http://web.servientrega.com:8081/GeneracionGuias.asmx?wsdl');
                $servicio->llamarServicioComplejo('AnularGuias',$strXML);
                $resultado=admonpedidosservientrega_simplexml_load_string_nons($servicio->respuesta)->soap_Body->AnularGuiasResponse ->interno->ResultadoAnulacionGuias;
                
               
                $sql="UPDATE wp_PedidoEnvio set idEstado=3 where NroGuia=".$Guias[$i];
                $result = $wpdb->get_results($sql); 
                
            }
          
}