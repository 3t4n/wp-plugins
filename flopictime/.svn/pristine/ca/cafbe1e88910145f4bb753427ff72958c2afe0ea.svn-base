<?php
	/**
	 *
	 */
	class Flo_Pictime_Api {

		private $api_url;

		function __construct() {
			//$this->api_url = 'https://testingapi.pic-time.com/apiV2/';
			$this->api_url = 'https://productionapi.pic-time.com/apiV2/';
		}


		/**
		 * Add the plugins settings page options
		 *
		 * @since    1.0.0
		 */
		public function pictime_options() {

			if(isset($_GET['clientCode'])) {
				$this->get_pictime_access_token($client_code = $_GET['clientCode']);
			}

			$pictime_options = get_option('flo_pictime_options', array());

			//delete_option( 'flo_pictime_options' );

			include_once(dirname(__FILE__).'/../admin/partials/pictimewp-admin-display.php');
		}

		/**
		 *
		 * retrieve the Pic-Time access token
		 * then retrieve the account info
		 */
		public function get_pictime_access_token($client_code, $trial = 1) {

	    		$secrete = 'BFE1E6675AC144BDB1351F1001A36616';
	        $redirect_url = admin_url('/admin.php?page=flo_pictime_settings'); // same settings page

	        $url = $this->api_url.'accessToken'; // update this to the live settings

	        $args = array(
	          'headers' => array(
	            'Content-type' => 'application/json',
	            'cache-control' => 'no-cache',
	          ),
	          'method' => 'POST',
	          'body' => json_encode(array('clientCode' => $client_code, 'redirectUrl' => $redirect_url, 'appSecret' => $secrete ))
	        );
	        $response = wp_remote_request( $url, $args );


	        //Check the response code
	        $response_code       = wp_remote_retrieve_response_code( $response );
	        $response_message = wp_remote_retrieve_response_message( $response );

	        $response_data = json_decode(wp_remote_retrieve_body( $response ), true);

					// if for some reason the accessToken was not received, we try to get it 5 times in a row (while $trial < 5)
					if( !(isset($response_data['accessToken']) && strlen($response_data['accessToken']) && isset($response_data['ok']) && $response_data['ok'] === true) && $trial < 5 ) {

						$trial = $trial + 1;
						$this->get_pictime_access_token($client_code, $trial);


					}else{
						if(isset($response_data['accessToken']) && strlen($response_data['accessToken']) && isset($response_data['ok']) && $response_data['ok'] === true ) {
		        	// save the access token
		        	$pictime_options = get_option('flo_pictime_options', array());
		        	$pictime_options['access_token'] = $response_data['accessToken'];


		        	$account_integration = $this->accountIntegrations($acces_token = $response_data['accessToken']);

		        	if($account_integration){
		        		$pictime_options['account_integrations'] = $account_integration;
		        	}

		        	update_option( 'flo_pictime_options', $pictime_options, $autoload = false );
		        }else{
							//var_dump($response_data);
							echo '<div class="notice pt-notice notice-warning is-dismissible"><p>';
		        	_e('Something went wrong and the access token could not be received. Try again please', 'pictimewp');
							echo '</p></div>';
		        }
					}





		}



		/**
		 *
		 * Get account integration data by making a API request to the Pic-Time API and saves it to a transient
		 * @param string - acces_token
		 * @return array - accountIntegrations data in a format like: https://pastebin.com/efPpzkdV
		 */
		public function accountIntegrations($acces_token) {

			$transient_name = 'account_integrations_data';
			//delete_transient( $transient_name );
			$account_integrations_data = get_transient( $transient_name );

			if ( FALSE == $account_integrations_data ) {
				$url = $this->api_url.'account/me/integrationdata';

		    $args = array(
		      'headers' => array(
		        'Authorization' => 'Bearer ' . $acces_token,
		        'Content-type' => 'application/json',
		        'cache-control' => 'no-cache',
		      ),
		      'method' => 'GET',
		      //'body' => json_encode(array('accessToken' => $acces_token, 'accountId' => 'me' )),
		      'data_format' => 'body',
		      'body' => array('accessToken' => $acces_token, 'accountId' => 'me' )
		    );

		    $response = wp_remote_get( $url, $args );

		    // Check the response code
		    $response_code       = wp_remote_retrieve_response_code( $response );
		    $response_message = wp_remote_retrieve_response_message( $response );
		    $response_body = json_decode(wp_remote_retrieve_body( $response ), true);

		    if($response_code == 200 && $response_message == 'OK' && is_array($response_body) && sizeof($response_body)) {

		    	set_transient( $transient_name, $response_body, 60 ); // 1 hour transient
		    	return $response_body;
		    }else{
		    	return false;
		    }
			}else{
				return $account_integrations_data;
			}

		}

		/**
		 *
		 * get the Pic-Time access token from saved option
		 *	@return - string
		 */
		public function get_saved_token() {
			$pictime_options = get_option( 'flo_pictime_options', array() );
			if(isset($pictime_options['access_token']) && strlen($pictime_options['access_token']) ) {
				return $pictime_options['access_token'];
			}

			return false;
		}

		/**
		 *
		 * Get account Projects data by making a API request to the Pic-Time API and saves it to a transient
		 * @param string - acces_token
		 * @return array - account Projects data in a format like: https://pastebin.com/UQne86mm
		 *
		 */
		public function get_projects() {
			$transient_name = 'flo_pictime_projects';

			//delete_transient( $transient_name );
			$projects = get_transient( $transient_name );
			if ( FALSE == $projects ) {
				$acces_token = $this->get_saved_token();

				$url = $this->api_url.'account/me/projects';

				$args = array(
				  'headers' => array(
				    'Authorization' => 'Bearer ' . $acces_token,
				    'Content-type' => 'application/json',
				    'cache-control' => 'no-cache',
				  ),
				  'method' => 'GET',
				  'body' => array('accessToken' => $acces_token )
				);

				$response = wp_remote_get( $url, $args );

				$response_code       = wp_remote_retrieve_response_code( $response );
				$response_message = wp_remote_retrieve_response_message( $response );

				if($response_message == 'OK') {
					$projects_data = json_decode(wp_remote_retrieve_body( $response ), true);

					if(isset($projects_data['projects']) && $projects_data['projects'] != null ) {
						set_transient( $transient_name, $projects_data, 60 ); // 1 hour transient

						return $projects_data;
					}else{
						return false;
					}

				}else{
					return false;
				}

			}

			return $projects;

		}


		/**
		 *
		 * Get project data by project ID
		 *
		 */
		public function get_project($project_id) {
			$acces_token = $this->get_saved_token();

	    $project_id = $project_id; // from the json file: https://pictimecloudaf.blob.core.windows.net/pictures/accountdata/82/82158/portfolioprojects.json.txt

	    $url = $this->api_url.'project/'.$project_id.'/photos';

	    $args = array(
	      'headers' => array(
	        'Authorization' => 'Bearer ' . $acces_token,
	        'Content-type' => 'application/json',
	        'cache-control' => 'no-cache',
	      ),
	      'method' => 'GET',
	      //'data_format' => 'body',
	      'body' => array('accessToken' => $acces_token, 'projectId' => $project_id )
	    );

	    $response = wp_remote_get( $url, $args );

	    // Check the response code
	    $response_code       = wp_remote_retrieve_response_code( $response );
	    $response_message = wp_remote_retrieve_response_message( $response );

			//var_dump($response);
	    return wp_remote_retrieve_body( $response );

		}

		/**
		 *
		 * handle the ajax request to fetch the project data.
		 * TO DO: make sure it will work with multiple selected projects
		 */
		public function flo_get_project_data() {
			if(isset($_POST['project_id'])) {
					$response = $this->get_project($project_id = $_POST['project_id']);
					//var_dump(json_decode($response));
					$dr = json_decode($response); // decoded json


					// upon API changes, the baseUrl comes back without '/' at the end
    			// we need to check that and add if not present
					if( is_object($dr) && substr($dr->baseUrl, -1) != '/') {
						$dr->baseUrl .= '/';

						$response = json_encode($dr);
						
					}

					echo $response;
			}

			exit();
		}
	}
?>
