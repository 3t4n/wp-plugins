<?php

function admonpedidosservientrega_generarRecogidaMasivo(){
 include "ServiciosWeb.inc";
 include "Utilidades.php";





$FechaHoraPickUp=sanitize_text_field($_POST["FechaHoraPickUp"]) ;

$Guias=admonpedidosservientrega_SanitizeArrays(isset($_POST["Guias"]) ? (array) $_POST["Guias"] : array());
$RecEsporadica=admonpedidosservientrega_SanitizeArrays(isset($_POST["RecEsporadica"]) ? (array) $_POST["RecEsporadica"] : array());
$ConCobro=admonpedidosservientrega_SanitizeArrays(isset($_POST["ConCobro"]) ? (array) $_POST["ConCobro"] : array());



 global $wpdb;
 
    
    

	
	$strXML='<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:tem="http://tempuri.org/" xmlns:arr="http://schemas.microsoft.com/2003/10/Serialization/Arrays">';


    
	

		
		
               $strXMLNormal="<soapenv:Header>
		            <tem:User>".get_option("User")."</tem:User>
            		<tem:Password>".get_option("Password")."</tem:Password>
            		<tem:CodSer>".get_option("CodSer")."</tem:CodSer>
            	</soapenv:Header>";


                $strXMLCobro="<soapenv:Header>
		            <tem:User>".get_option("UserCobro")."</tem:User>
            		<tem:Password>".get_option("PasswordCobro")."</tem:Password>
            		<tem:CodSer>".get_option("CodSerCobro")."</tem:CodSer>
            	</soapenv:Header>";
 
		  
		  
		  
     	
		
		

		  
         
     
    $arrGuiasNormal="";
    $arrGuiasCobro="";
    $NroGuiasNormal="";
    $NroGuiasCobro="";
	$error="";
	$pickupRequestNumber="";
    
    for($i=0;$i<count($Guias);$i++)
          {
           
             if($RecEsporadica[$i]==0 || empty($Guias[$i])) continue;
             
              if ($ConCobro[$i]==0) {
                    //$strXML.=$strXMLNormal;
                     $arrGuiasNormal.="<arr:string>".$Guias[$i]."</arr:string>";
                     $NroGuiasNormal.=$Guias[$i].",";
                    
                }
                if ($ConCobro[$i]==1) {
                    
                    $arrGuiasCobro.="<arr:string>".$Guias[$i]."</arr:string>";
                    $NroGuiasCobro.=$Guias[$i].",";
                }
          }
    
  if(!empty($arrGuiasNormal)) 
  {
      $xml=  $strXML.$strXMLNormal."<soapenv:Body><tem:CreateRequestSporadic><tem:lstGuides>".$arrGuiasNormal."</tem:lstGuides><tem:pickUpDate>".explode(" ", $FechaHoraPickUp)[0].
                "</tem:pickUpDate><tem:pickUpHour>".explode(" ", $FechaHoraPickUp)[1]."</tem:pickUpHour>".
        "<tem:comments></tem:comments>
    		</tem:CreateRequestSporadic>
    	</soapenv:Body>
    </soapenv:Envelope>";
    
    $servicio= new admonpedidosservientrega_ServicioWeb_Cliente('http://web.servientrega.com:8085/PickUpRequest.svc?wsdl');
     $servicio->llamarServicioComplejo('http://tempuri.org/IPickUpRequest/CreateRequestSporadic',$xml,1);

     $pickupRequestNumber=(
                    (admonpedidosservientrega_simplexml_load_string_nons($servicio->respuesta)->s_Body->CreateRequestSporadicResponse 
    						->CreateRequestSporadicResult->a_PickUpRequestList->b_PickUpRequest->b_PickupRequestNumber) 
                    );
         
   
  
   
	$error= (admonpedidosservientrega_simplexml_load_string_nons($servicio->respuesta)->s_Body->CreateRequestSporadicResponse ->CreateRequestSporadicResult->a_PickUpRequestList
					->b_PickUpRequest->b_DocumentList->a_Document->a_Comment);
	

	 
	 // if($error!=1){
		if( $pickupRequestNumber === null || trim($pickupRequestNumber) === '' )  
			$sql="UPDATE wp_PedidoEnvio set idEstado=10,DescripcionError='".$error."' where NroGuia in (".substr($NroGuiasNormal, 0, -1).")";
		else
			$sql="UPDATE wp_PedidoEnvio set idEstado=4,PickupRequestNumber=".$pickupRequestNumber.",DescripcionError='".$error."' where NroGuia in (".substr($NroGuiasNormal, 0, -1).")";
			
			
		
      $result=$wpdb->get_results($sql);}
		
  //}

  if(!empty($arrGuiasCobro)) 
  {
    
      $xml=  $strXML.$strXMLCobro."<soapenv:Body><tem:CreateRequestSporadic><tem:lstGuides>".$arrGuiasCobro."</tem:lstGuides><tem:pickUpDate>".explode(" ", $FechaHoraPickUp)[0].
      "</tem:pickUpDate><tem:pickUpHour>".explode(" ", $FechaHoraPickUp)[1]."</tem:pickUpHour>".
        "<tem:comments></tem:comments>
    		</tem:CreateRequestSporadic>
    	</soapenv:Body>
    </soapenv:Envelope>";
    
     $servicio= new admonpedidosservientrega_ServicioWeb_Cliente('http://web.servientrega.com:8085/PickUpRequest.svc?wsdl');
     $servicio->llamarServicioComplejo('http://tempuri.org/IPickUpRequest/CreateRequestSporadic',$xml,1);


    
    $pickupRequestNumber=(
                    (admonpedidosservientrega_simplexml_load_string_nons($servicio->respuesta)->s_Body->CreateRequestSporadicResponse 
    						->CreateRequestSporadicResult->a_PickUpRequestList->b_PickUpRequest->b_PickupRequestNumber) 
                    );
					
	$error= (admonpedidosservientrega_simplexml_load_string_nons($servicio->respuesta)->s_Body->CreateRequestSporadicResponse ->CreateRequestSporadicResult->a_PickUpRequestList
					->b_PickUpRequest->b_DocumentList->a_Document->a_Comment);
					
	

	
	if( $pickupRequestNumber === null || trim($pickupRequestNumber) === '' )
		$sql="UPDATE wp_PedidoEnvio set idEstado=10,DescripcionError='".$error."' where NroGuia in (".substr($NroGuiasCobro, 0, -1).")";	
	else
		$sql="UPDATE wp_PedidoEnvio set idEstado=4,PickupRequestNumber=".$pickupRequestNumber.",DescripcionError='".$error."' where NroGuia in (".substr($NroGuiasCobro, 0, -1).")";	
     $result=$wpdb->get_results($sql);
	 
	 
      }
    
  
    


}