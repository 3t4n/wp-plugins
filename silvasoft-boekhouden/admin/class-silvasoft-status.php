<?php
/**
* Admin log page 
*/
if (!function_exists('is_admin')) {
    header('Status: 403 Forbidden');
    header('HTTP/1.1 403 Forbidden');
    exit();
}

if( !class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-screen.php' );//added
    require_once( ABSPATH . 'wp-admin/includes/screen.php' );//added
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
    require_once( ABSPATH . 'wp-admin/includes/template.php' );
}

//Silvasoft log class (admin log datagrid)
if (!class_exists("Silvasoft_Status")) :
    class Silvasoft_Status
    {
		protected $apiconnector;
		
        function __construct() {
			
		    global $status, $page;
			
			add_action( 'admin_head', array( &$this, 'admin_header' ) );
			
			global $apiconnector;
			$this->apiconnector = $apiconnector;							  
		 
			
		}
		
        
		
		//column styles
		function admin_header() {
		  $page = ( isset($_GET['page'] ) ) ? esc_attr( $_GET['page'] ) : false;
		
		  
		}
		
		function cronCheck($cronName,$cron_events) {
			$grace_period = 30 * 60; // 30 minuten in seconden
			
			$cronFound = false;
			if ($cron_events) {
				foreach ($cron_events as $timestamp => $cron) {
					foreach ($cron as $hook => $details) {
						if ($hook == $cronName) { // Vervang dit met jouw CRON hook naam
							$NextRunUTC = date('d-m-Y H:i:s', $timestamp);
							$cronsSilva[$hook] = array(true,$NextRunUTC);
							
							if ($timestamp < (time() - $grace_period)) {
								echo ' <div class="notice-error notice fade"><p>
								<strong>CRON '.$cronName.'</strong><br/> 
								Er is een fout ontdekt bij uw CRON instellingen. De Silvasoft plugin draait op een vast interval het CRON event ""'.$cronName.'". Hoewel het event is gevonden en gepland, is deze voor het laatst uitgevoerd op '.$NextRunUTC.' (UTC) wat meer dan 30 minuten geleden is. Het niet draaien van het CRON event kan ervoor zorgen dat uw orders niet worden verstuurd, of voorraad niet wordt gesynchroniseerd. Neem contact op met uw webbouwer of hosting provider om te achterhalen waarom uw CRON taken niet worden uitgevoerd. 
								</p></div>';
							} else {
								echo ' <div class="notice-success notice fade"><p>
								<strong>CRON '.$cronName.'</strong><br/> 
								Mooi! De achtergrond taak "'.$cronName.'" is actief en wordt weer uitgevoerd op: ' . $NextRunUTC . ' (UTC)
								</p></div>';
							}								
							$cronFound = true;
						}
					}
				}
			}
			if($cronFound === false) {
				echo ' <div class="notice-error notice fade"><p>
				<strong>CRON '.$cronName.'</strong><br/> 
				De achtergrond taak "'.$cronName.'" is niet actief. Doorgaands is de oplossing om de plugin te deactiveren en opnieuw te activeren.
				</p></div>';
			}
			
			echo '<br/><hr><br/>';
		}
		
		function page() {
			echo '<h1>Silvasoft status informatie</h1>';
			
			echo 'Op deze pagina controleren we een aantal vereisten om te kijken of uw installatie correct is en alles naar verwachting werkt. Ziet u op deze pagina foutmeldingen? Los ze dan op om problemen met de koppeling te voorkomen. ';
			
			echo '<br/><hr><br/>';
			//STATUS HTTPS
			if (empty($_SERVER['HTTPS'])) {

				echo ' <div class="notice-error notice"><p>
					<strong>HTTPS:</strong><br/>
					Het lijkt erop dat uw website geen gebruik maakt van SSL (HTTPS). Dit is onveilig! 
					We raden aan uw website te beveiligen met SSL om gevoelige gegevens te beschermen. 
				</p></div>';
			} else {
				echo ' <div class="notice-success notice"><p>
					<strong>HTTPS:</strong><br/> 
					OK
				</p></div>';
			
			}

			echo '<br/><hr><br/>';
			
			//STATUS MAX EXECUTION TIME
			$maxexectime = ini_get('max_execution_time');
			if(!is_null($maxexectime)) {
				if($maxexectime < 500) {
					echo ' <div class="notice-warning notice fade"><p>
					<strong>Max_execution_time:</strong><br/> 
					Wilt u grote hoeveelheden orders tegelijk naar Silvasoft versturen vanuit het order overzicht? Verhoog dan op uw server de instelling voor \'max_execution_time\'. Uw huidige instelling hiervoor ('.$maxexectime.' seconden) is te kort om grote hoeveelheden orders in 1 keer te versturen naar Silvasoft. 
					</p></div>';
				} else {
					echo ' <div class="notice-success notice"><p>
					<strong>Max_exeution_time:</strong><br/> 
					 Mooi! Het uitvoeren van code mag '.$maxexectime.' seconden duren. Ddit is prima, u hoeft dit waarschijnlijk niet aan te passen. Verhoog op uw server de instelling voor \'max_execution_time\' indien u problemen ervaart bij het versturen van grote hoeveelheden orders naar Silvasoft.
				</p></div>';
				}
			}
			
			echo '<br/><hr><br/>';

			//STATUS CRON
			//check CRON status for silvasoft_woo_cron_stock
			$cron_events = _get_cron_array(); // Haalt alle WP-Cron events op
			
			$cronName = "silvasoft_woo_cron_stock";
			$this->cronCheck($cronName,$cron_events);	
			
			$cronName = "silvasoft_woo_cron";
			$this->cronCheck($cronName,$cron_events);
			
			//STATUS API CONNECTIE
			$result = '';
			try {
				$result = $this->CallAPI('GET','listtaxcodes');					
			} catch (Exception $e) {
				$result = '';
			}	
			
			$optionsHtmlTaxCodes = '<option value=""></option>';
			$resultTaxCodes = array();
			
			//validate
			$validated = $this->validateResult($result,200,true);

			$msg = isset($validated['msg']) ? $validated['msg'] : '';
			//process validation
			if($validated['ok'] === true) {			
				
				echo ' <div class="notice-success notice fade"><p>
					<strong>API connectie:</strong><br/> 
					Connectie met Silvasoft is actief en werkend
					</p></div>';
				
			} else{
				echo ' <div class="notice-error notice fade"><p>
					<strong>API connectie:</strong><br/> 
					Connectie met Silvasoft is niet werkend / actief. Daarom konden er geen btw-codes opgehaald worden. Controleer uw instellingen. Foutmelding: ""'.$msg.'"
					</p></div>';
				
			}
			
		}
		
		
		/* Call API using CURL */
		/* COPY PASTED FROM SETTINGS PAGE */
		function CallAPI($method, $endpoint, $data = false)
		{
			$options = get_option('silva_settings');
			$url = ( isset($options['silva_api_url']) ? $options['silva_api_url'] : '' ) . $endpoint;
			$apikey = isset($options['silva_api_token']) ? $options['silva_api_token'] : '';
			$user =  isset($options['silva_username']) ? $options['silva_username'] : '';
			
			//initiate and build url
			$curl = curl_init();
			$data_string = json_encode($data);

			//setup curl postdata
			switch ($method)
			{
				case "POST":
					curl_setopt($curl, CURLOPT_POST, 1);	
					if ($data)
						curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
					break;
				case "PUT":
					curl_setopt($curl, CURLOPT_PUT, 1);
					if ($data)
						curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
					break;
				default:
					if ($data)
						$url = sprintf("%s?%s", $url, http_build_query($data));

			}
			//set headers
			if($method == 'POST' || $method == 'PUT') {
				curl_setopt($curl, CURLOPT_HTTPHEADER, array(                                                                          
					'ApiKey: '.$apikey,
					'Username: '.$user,
					'Content-Type: application/json',                                                                                
					'Content-Length: ' . strlen($data_string))                                                                       
				);    
			} else {
				//GET
				curl_setopt($curl, CURLOPT_HTTPHEADER, array(                                                                          
					'ApiKey: '.$apikey,
					'Username: '.$user)                                                                      
				);
			}

			curl_setopt($curl, CURLOPT_URL, $url);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			//curl_setopt($curl, CURLOPT_FAILONERROR, true);

			$response = curl_exec($curl);
			$httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);


			if($httpcode === 0 || $httpcode === 404) {
				$response = '{"errorCurl": " '.$httpcode. ' - vermoedelijk is uw API url verkeerd ingesteld onder instellingen. Voorbeeld van een correcte API url is: https://rest-api.silvasoft.nl/rest/"}';
			}

			//build and return response
			$result = array('httpcode' => $httpcode, 'response' => $response);	
			curl_close($curl);	
			return $result;

		}
		
		/* VALIDATE response > DUPLICATE in class-silvasoft-api-connector.php */
		function validateResult($result, $expectedHttpCode, $mayNotBeEmpty) {
		/* Validation 1 - JSON response error */
		$resultresponse = $result['response'];
		$resultcode = $result['httpcode'];
		$resultPHP = json_decode($resultresponse);
		if(isset($resultPHP->errorCode)) {
			$error = $resultPHP->errorCode . ' - '. $resultPHP->errorMessage; 
			return array('ok'=>false,'msg'=>$error);	
		}
		
		/* Validation 2 - Invalid HTTP response code */		
		if($resultcode !== $expectedHttpCode) {
			$error = 'HTTP code voldoet niet aan de verwachtingen. Teruggekregen code is: ' . $resultcode . '. ';
			
			if(isset($resultPHP->errorCurl)){
				$error .= " Error: " . $resultPHP->errorCurl;
			}
			
			return array('ok'=>false,'msg'=>$error);	
		}
		
		//check curl errors
		if(isset($resultPHP->errorCurl)){
			$error .= "CURL error: " . $resultPHP->errorCurl;
			return array('ok'=>false,'msg'=>$error);	
		}
		
		/* Validation 3 - Empty result */
		if($mayNotBeEmpty) {
			if(empty($resultPHP)) {
				$error = 'Het antwoord van Silvasoft voldoet niet aan de verwachting. Reden: leeg antwoord ontvangen. ' . $resultcode; 
				return array('ok'=>false,'msg'=>$error);
			}
		}
		
		return array('ok'=>true,'msg'=>'');	
		
	}
		
		
	}
endif;