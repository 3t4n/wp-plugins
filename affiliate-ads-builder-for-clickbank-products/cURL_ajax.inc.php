<?php 


		function mycbgenie_ads_file_get_contents_curl($url) {
			
				$ch = curl_init();
			
				curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
				curl_setopt($ch, CURLOPT_HEADER, 0);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_URL, $url);
				//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);       
			
				$data = curl_exec($ch);
				curl_close($ch);
			
				return $data;
			}
			
			
			function mycbgenie_fetch_url_in_ajax($base_url,$ref,$ad_format){

		
				if (	(!isset($ref)) || (empty($ref)) || ($ref==NULL) 	){
				
							echo '<h2>I am sorry! The System cannot continue, untill you set your MyCBGenie account number in the settings page of the plugin.</h2>';
							//return;
							
				}
				if ( isset($ref) ){
			
					  if (   (abs($ref) == 33333)  	)  {
								echo '<h2>I am sorry! The System cannot continue, untill you set your MyCBGenie account number in the settings page of the plugin.</h2>';
							//return;
						}
				}else{
					echo '<h2>I am sorry! The System cannot continue, untill you set your MyCBGenie account number in the settings page of the plugin.</h2>';
					//return;
				}
				
				$ref_url = urlencode("http".(!empty($_SERVER['HTTPS'])?"s":"").
				"://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
				//add_action('wp_enqueue_scripts', 'mycbgenie_carousel_ads_load_scripts');
				
				if (abs(date("s")) % 5!=0) {
				
					//$full_url = $base_url.'&account='.$ref.'&format='.$ad_format;
				}else{
				
					// $full_url = $base_url.'&ref='.$ref_url.'&account='.$ref.'&format='.$ad_format;
				}
                    $full_url = $base_url.'&ref_mycbgenie_url='.$ref_url.'&account='.$ref.'&format='.$ad_format;
		
		
			return $full_url;
		}

?>