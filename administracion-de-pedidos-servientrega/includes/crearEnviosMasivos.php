<?php

function admonpedidosservientrega_crearenviosmasivo_ajax(){
 include "ServiciosWeb.inc";
 include "Utilidades.php";
 include  plugin_dir_path(__DIR__ ) . 'arrays/pluginexterno/states/CO.php';
     
		
	
		
			
				
			
		
			
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
            
            
            //$Des_CiudadRemitente =  get_option("Des_CiudadRemitente");
    	    $Des_DireccionRemitente = get_option("Des_DireccionRemitente");
    		$Nom_Remitente = get_option("Nom_Remitente");
    		$Num_IdentiRemitente = get_option("Num_IdentiRemitente");
    		$Num_TelefonoRemitente = get_option("Num_TelefonoRemitente");
    		$Des_CiudadOrigen = get_option("Des_CiudadOrigen");
    		$Des_DepartamentoOrigen = get_option("Des_DepartamentoOrigen");
    		$Nombrecontacto_remitente = get_option("Nombrecontacto_remitente");
    		$Celular_remitente = get_option("Celular_remitente");
    		$Correo_remitente = get_option("Correo_remitente");
            $Nom_UnidadEmpaque = get_option("Nom_UnidadEmpaque");
            
          
           
     
		
			$IdPedidoEnvios =admonpedidosservientrega_SanitizeArrays(isset($_POST["IdPedidoEnvio"]) ? (array) $_POST["IdPedidoEnvio"] : array());
			
    
			$sqlConsulta="SELECT * FROM wp_PedidoEnvio WHERE idPedidoEnvio in (".implode(",",$IdPedidoEnvios).")";
    
    
    

    
		
	$resultConsulta = $wpdb->get_results($sqlConsulta);
    
	
    
    
   
     
    
   foreach ($resultConsulta as $rowCosulta)
       
		
           {
            $codDpto=$rowCosulta->DesDptoDestino=='DC'?'CUN':$rowCosulta->DesDptoDestino;
            
			$nombreCortoDpto=admonpedidosservientrega_nombreCortoDpto(admonpedidosservientrega_limpiar_cadena($states['CO'][$codDpto]));
			
			$ciudadDestino=admonpedidosservientrega_nombreCortoCiudad(admonpedidosservientrega_limpiar_cadena($rowCosulta->DesCiudadDestino));
			
			$address_destine = "$ciudadDestino-$nombreCortoDpto";
			
			$cities = include plugin_dir_path(__DIR__ )  . 'arrays/CiudadesDane.php';

            $cod_dane = array_search($address_destine, $cities);
             
            if(!$cod_dane)
                $cod_dane = array_search($address_destine, admonpedidosservientrega_clean_cities_rate($cities));
			
			
			
			
             $strXML='<soap:Envelope xmlns:soap="http://www.w3.org/2003/05/soap-envelope" xmlns:tem="http://tempuri.org/" >';
           
            
			$ValorDeclaradoTotal=0;
            if ($rowCosulta->ConCobro==0) {
                $strXML.=$strXMLNormal;
                $Ide_CodFacturacion=$Ide_CodFacturacionNormal;
                
            }
			
			
            if ($rowCosulta->ConCobro==1) {
                $strXML.=$strXMLCobro;
                $Ide_CodFacturacion=$Ide_CodFacturacionCobro;
                $ValorDeclaradoTotal=$rowCosulta->ValorDeclaradoTotal;
				$arrLogisticaCobro=  include plugin_dir_path(__DIR__ ) . 'arrays/LogisticaCobro.php';
				if(in_array($address_destine,$arrLogisticaCobro)) 
				{ 
					$DescripcionError="El destino no permite pago contraentrega";
					
					$wpdb->update('wp_PedidoEnvio',array('idEstado'=> 6, 'DescripcionError'=>$DescripcionError),array('idPedidoEnvio'=>$rowCosulta->idPedidoEnvio));
				
					
					
					
				    	
					
					/*$sql="UPDATE wp_PedidoEnvio set idEstado=6, NroGuia=NULL,	DescripcionError='El destino no está habilitado para envío con Logistica para cobro' where  idPedidoEnvio=".$rowCosulta->idPedidoEnvio;
					
					$result = $wpdb->get_results($sql);*/
					
					
					
				
					
					
					
					
					continue;
					
				}
				
            }
			$mediotransporte="1";
						 
			$aereo=  include plugin_dir_path(__DIR__ ) . 'arrays/DaneAereo.php';
			
			
			
			
			
			
						
			if(in_array($cod_dane,$aereo)) $mediotransporte="2";
			
			
			
		
			
            $peso_total=($rowCosulta->PesoTotal)>=3?($rowCosulta->PesoTotal):3;
            $NroGuia="NULL";
            $DescripcionError="";
            $strCuerpo="<soap:Body>
		<tem:CargueMasivoExterno>
			<tem:envios>
				<tem:CargueMasivoExternoDTO>
					<tem:objEnvios>
						<tem:EnviosExterno>
							<tem:Num_Guia>0</tem:Num_Guia>
							<tem:Num_Sobreporte>0</tem:Num_Sobreporte>
							<tem:Num_SobreCajaPorte>0</tem:Num_SobreCajaPorte>
							<tem:Fec_TiempoEntrega>0</tem:Fec_TiempoEntrega>
							<tem:Doc_Relacionado></tem:Doc_Relacionado>
							<tem:Num_Piezas>1</tem:Num_Piezas>
							<tem:Des_TipoTrayecto>1</tem:Des_TipoTrayecto>
							<tem:Ide_Producto>2</tem:Ide_Producto>
							<tem:Ide_Destinatarios>00000000-0000-0000-0000-000000000000</tem:Ide_Destinatarios>
							<tem:Ide_CodFacturacion>".$Ide_CodFacturacion."</tem:Ide_CodFacturacion>
							<tem:Ide_Manifiesto>00000000-0000-0000-0000-000000000000</tem:Ide_Manifiesto>
							<tem:Des_FormaPago>2</tem:Des_FormaPago>
							<tem:Des_MedioTransporte>".$mediotransporte."</tem:Des_MedioTransporte>
							<tem:Num_PesoTotal>".$peso_total."</tem:Num_PesoTotal>
							<tem:Num_ValorDeclaradoTotal>".($rowCosulta->ValorDeclaradoTotal<5000?5000:$rowCosulta->ValorDeclaradoTotal)."</tem:Num_ValorDeclaradoTotal>
							<tem:Num_VolumenTotal>0</tem:Num_VolumenTotal>
							<tem:Num_BolsaSeguridad>0</tem:Num_BolsaSeguridad>
							<tem:Num_Precinto>0</tem:Num_Precinto>
							<tem:Des_TipoDuracionTrayecto>1</tem:Des_TipoDuracionTrayecto>
							<tem:Des_Telefono>".$rowCosulta->Telefono."</tem:Des_Telefono>
							<tem:Des_Ciudad>".$cod_dane."</tem:Des_Ciudad>
							<tem:Des_Direccion>".$rowCosulta->Direccion."</tem:Des_Direccion>
							<tem:Nom_Contacto>".$rowCosulta->Contacto."</tem:Nom_Contacto>
							<tem:Des_VlrCampoPersonalizado1>PLGWOOCOMMERCE</tem:Des_VlrCampoPersonalizado1>
							<tem:Num_ValorLiquidado>0</tem:Num_ValorLiquidado>
							<tem:Des_DiceContener>".$rowCosulta->DiceContener."</tem:Des_DiceContener>
							<tem:Des_TipoGuia>2</tem:Des_TipoGuia>
							<tem:Des_CiudadRemitente>".$Des_CiudadOrigen."</tem:Des_CiudadRemitente>
							<tem:Num_VlrSobreflete>0</tem:Num_VlrSobreflete>
							<tem:Num_VlrFlete>0</tem:Num_VlrFlete>
							<tem:Num_Descuento>0</tem:Num_Descuento>
							<tem:Tipo_Doc_Destinatario>CC</tem:Tipo_Doc_Destinatario>
							<tem:Ide_Num_Identific_Dest>".$rowCosulta->IdOrder."</tem:Ide_Num_Identific_Dest>
							<tem:Ide_Num_Referencia_Dest>Valor12</tem:Ide_Num_Referencia_Dest>
							<tem:Des_DireccionRemitente>".$Des_DireccionRemitente."</tem:Des_DireccionRemitente>
							<tem:Num_PesoFacturado>0</tem:Num_PesoFacturado>
							<tem:Nom_TipoTrayecto>1</tem:Nom_TipoTrayecto>
							<tem:Est_CanalMayorista>false</tem:Est_CanalMayorista>
							<tem:Nom_Remitente>$Nom_Remitente</tem:Nom_Remitente>
							<tem:Num_IdentiRemitente>$Num_IdentiRemitente</tem:Num_IdentiRemitente>
							<tem:Num_TelefonoRemitente>$Num_TelefonoRemitente</tem:Num_TelefonoRemitente>
							<tem:Num_Alto>".$rowCosulta->Alto."</tem:Num_Alto>
							<tem:Num_Ancho>".$rowCosulta->Ancho."</tem:Num_Ancho>
							<tem:Num_Largo>".$rowCosulta->Largo."</tem:Num_Largo>
							<tem:Des_CiudadOrigen>".$Des_CiudadOrigen."</tem:Des_CiudadOrigen>
							<tem:Des_DiceContenerSobre>false</tem:Des_DiceContenerSobre>
							<tem:Des_DepartamentoDestino>".$nombreCortoDpto."</tem:Des_DepartamentoDestino>
							<tem:Des_DepartamentoOrigen>".$Des_DepartamentoOrigen."</tem:Des_DepartamentoOrigen>
							<tem:Gen_Cajaporte>false</tem:Gen_Cajaporte>
							<tem:Gen_Sobreporte>false</tem:Gen_Sobreporte>
							<tem:Nom_UnidadEmpaque>".$Nom_UnidadEmpaque."</tem:Nom_UnidadEmpaque>
							<tem:Des_UnidadLongitud>cm</tem:Des_UnidadLongitud>
							<tem:Des_UnidadPeso>kg</tem:Des_UnidadPeso>
							<tem:Num_ValorDeclaradoSobreTotal>0</tem:Num_ValorDeclaradoSobreTotal>
							<tem:Num_Factura>".$rowCosulta->Num_Factura."</tem:Num_Factura>
							<tem:Des_CorreoElectronico>".$rowCosulta->Correo_Electronico."</tem:Des_CorreoElectronico>
							<tem:Num_Celular>".$rowCosulta->Telefono."</tem:Num_Celular>
							<tem:Num_Recaudo>".$ValorDeclaradoTotal."</tem:Num_Recaudo>
							<tem:id_zonificacion>10</tem:id_zonificacion>
							<tem:nombrecontacto_remitente>".$Nombrecontacto_remitente."</tem:nombrecontacto_remitente>
							<tem:celular_remitente>".$Celular_remitente."</tem:celular_remitente>
							<tem:correo_remitente>".$Correo_remitente."</tem:correo_remitente>
							<tem:Recoleccion_Esporadica>1</tem:Recoleccion_Esporadica>
							<tem:Nombrecontacto_remitente></tem:Nombrecontacto_remitente>
							<tem:Celular_remitente>".$Celular_remitente."</tem:Celular_remitente>
							<tem:Correo_remitente>".$Correo_remitente."</tem:Correo_remitente>
						</tem:EnviosExterno>
						
					</tem:objEnvios>
				</tem:CargueMasivoExternoDTO>
							
			</tem:envios>
		</tem:CargueMasivoExterno>
	</soap:Body>";
	
            $strXML.=$strCuerpo.'</soap:Envelope>';
            
			
			$servicio= new admonpedidosservientrega_ServicioWeb_Cliente('http://web.servientrega.com:8081/GeneracionGuias.asmx?wsdl'); 
			
            try{
               
      
             
             $servicio->llamarServicioComplejo('CargueMasivoExterno',$strXML);
          			
             $resultado=((admonpedidosservientrega_simplexml_load_string_nons($servicio->respuesta)->soap_Body->CargueMasivoExternoResponse->CargueMasivoExternoResult));
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
             
           
            
            if($NroGuia=="NULL") $idEstado=6;
            else $idEstado=2;
			
			
            }
            catch(Exception $e)
            {
                $DescripcionError.= 'Excepción capturada: '.$e->getMessage();
            }                         
            
		
              $sql="UPDATE wp_PedidoEnvio set idEstado=".$idEstado.", NroGuia=".$NroGuia.",	DescripcionError='".$DescripcionError."' where  idPedidoEnvio=".$rowCosulta->idPedidoEnvio;
                
				$result = $wpdb->get_results($sql);
                
        
       
          $servicio=NULL; }
           
          
      
           
     
}	
?>