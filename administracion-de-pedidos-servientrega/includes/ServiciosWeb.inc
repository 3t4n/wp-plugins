<?php
class admonpedidosservientrega_ServicioWeb_Cliente
{
	#URL del archivo WSDL del Web Service 
	public $wsdl;
	
	#Array asociativo con los parámetros de entrada
	public $parametrosEntrada;
	
	public $client;
	
	#Objeto que retorna el Web Service
	public $respuesta;
	
	
	function setWSDL($wsdl){
		$this->wsdl=$wsdl;
	}
	function getWSDL(){
		return $this->wsdl;
	}
	
	function setparametrosEntrada($parametrosEntrada){
		$this->parametrosEntrada=$parametrosEntrada;
	}
	function getparametrosEntrada(){
		return $this->parametrosEntrada;
	}
	
	
	function __construct(){
		 $args=func_get_args();
		 $len=sizeof($args);
		
		if ($len>=1) 
		{
			$this->wsdl=$args[0];
			$this->crearCliente();
		}
		if ($len>=2) 
		{
			$this->parametrosEntrada=$args[1];
			
		}
		
		
		if ($len==3) 
		{
			
			$this->llamarServicio($args[2]);
		}
	}
	

	
	function setrespuesta($respuesta){
		$this->respuesta=$respuesta;
	}
	function getrespuesta(){
		return $this->respuesta;
	}
	
	 function crearCliente()
	{
		try{
			ini_set('soap.wsdl_cache_enabled', 0);

		
			
			$wsdl = $this->wsdl;

			
			$this->client = new SoapClient($wsdl,array('trace' => 1 ));

			
		    

		}
		catch(SoapFault $e) {
				echo var_dump($e);
			}
		
	}
	
	 function llamarServicio($metodo)
	{
		try{
			
			$this->respuesta=null;
			
			$params = $this->parametrosEntrada;
			
			$client=$this->client;
			
			$this->respuesta = $client->__soapCall($metodo, array($params));
			
		}
		catch(SoapFault $e) {
				echo var_dump($e);
			}
		//return $this->respuesta;
	}
 function llamarServicioComplejo($metodo,$xmlRequest,$version='2')
    {
        try{
            
            $this->respuesta=null;
			$location_URL=str_replace("?wsdl","",($this->wsdl));
			
           /* echo "1<br>";
            $params = $this->parametrosEntrada;
            echo "2<br>";
            $client=$this->client;
            echo "3<br>";
            $headerbody = array('AuthHeader'=>array('login'=>'cap_usuario1',
                                                    'pwd'=>'BpSUh12jBIiWdACDozgOaQ==',
                                                    'Id_CodFacturacion'=>'SER408',
                                                    'Nombre_Cargue'=>'AJA_GROUP'));
            $header = new SoapHeader('tns', 'AuthHeader', $headerbody,false);
            $client->__setSoapHeaders($header); */
			$this->respuesta = $this->client->__doRequest($xmlRequest,$location_URL,$metodo,$version);
			//echo "REQUEST HEADERS:<br>" . $this->client->__getLastRequestHeaders() . "<br>";
			//echo var_dump(($this->respuesta ));
            //$this->respuesta = $client->__soapCall($metodo, array($params));
            
        }
        catch(SoapFault $e) {
			echo "REQUEST HEADERS:<br>" . $this->client->__getLastRequestHeaders() . "<br>";
            echo "RESPONSE HEADERS:<br>" . $this->client->__getLastResponseHeaders() . "<br>";
			echo var_dump($e);
        }
        //return $this->respuesta;
    }
}


?>