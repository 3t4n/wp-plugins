<?php
if( ! class_exists('sbw_ajax_actions') ) :

class sbw_ajax_actions {

	/*
	*  __construct
	*
	*  This function will setup the class functionality
	*
	*  @date	23/11/2019
	*  @since	1.0.0
	*
	*  @param	void
	*  @return	void
	*/
	
	function __construct() {
	
		// actions
		add_action ('wp_ajax_login', array($this, 'login_action'));
		add_action ('wp_ajax_logout_action', array($this, 'logout_action'));
		add_action ('wp_ajax_refresh_access', array($this, 'refresh_access_action'));
		add_action ('wp_ajax_get_bots', array($this, 'get_bots_action'));
		add_action ('wp_ajax_deploy_bot', array($this, 'deploy_bot_action'));
	}
	
	/**
	*  login_action
	*
	*  request sign in to SnatchBot api, write response data to DB and response to frontend this one
	*
	*  @date	23/11/2019
	*  @since	1.0.0
	*
	*  @param	void
	*  @return	string The formatted data
	*/

	function login_action() {
		global $wpdb;
		$table = $wpdb->prefix . 'snatchbot_webchat';
		$email = sanitize_email($_POST['email']);
		$password = sanitize_text_field($_POST['password']);

		$data = array(
			'email' => $email,
			'password' => $password,
			'remember' => null
		);
		$data = json_encode($data);
		$url = 'https://account.snatchbot.me/bot/api/login';
		$args = array(
			'body' => $data,
			'headers' => array( "Content-type" => "application/json" ),
			'timeout' => '5',
		);
		$authResponse = wp_remote_post( $url, $args );
		$response = json_decode(wp_remote_retrieve_body($authResponse));		
		$response->data = sbw_esc_checking_db($response->data);

		if (!empty($response->data)) {
			$wp_user_id = get_current_user_id();
			$snatch_user_id = $response->data->id;
			$fullName = $response->data->firstname . ' ' . $response->data->lastname;
			$user = $wpdb->get_results( $wpdb->prepare("SELECT * FROM $table WHERE  wp_user_id = %d", $wp_user_id) );
			if (isset($user[0])) {
				$wpdb->update( $table, array(
					"snatch_user_id" => (int) $snatch_user_id,
					"auth_token" => $response->data->authToken, 
					"refresh_token" => $response->data->refreshToken,
					"email" => $response->data->email,
					"user_name" => $response->data->username,
					"full_name" => $fullName), array( 'wp_user_id' => $wp_user_id ));
			} else {
				$wpdb->insert( $table, array(
					"wp_user_id" => $wp_user_id,
					"snatch_user_id" => (int) $snatch_user_id,
					"auth_token" => $response->data->authToken, 
					"refresh_token" => $response->data->refreshToken,
					"email" => $response->data->email,
					"user_name" => $response->data->username,
					"full_name" => $fullName
				));
			}
			$user = $wpdb->get_results( $wpdb->prepare("SELECT * FROM $table WHERE  wp_user_id = %d", $wp_user_id) );
			$esc_user = sbw_esc_checking_db($user[0]);
	
			echo json_encode($esc_user);
		} else {
			throw new Exception( "Invalid Credentials" );
		}
	
		wp_die ();
	}
	
	/*
	*  logout_action
	*
	*  logout. Delete from DB user data.
	*
	*  @date	23/11/2019
	*  @since	1.0.0
	*
	*  @param	void
	*  @return	void
	*/

	function logout_action() {
		global $wpdb;
		$table = $wpdb->prefix . 'snatchbot_webchat';
		$wp_user_id = get_current_user_id();
	
		$wpdb->update( $table, array(
			"snatch_user_id" => null,
			"auth_token" => null, 
			"refresh_token" => null,
			"email" => null,
			"user_name" => null,
			"full_name" => null), array( 'wp_user_id' => $wp_user_id ));
		$response = array(esc_js('data') => esc_js('logout_action'));
		echo json_encode($response);
	
		wp_die ();
	}

	/** 
	*  refresh_access_action
	*
	*  refresh token if expired. if has argument repeat previous action and return result
	*
	*  @date	23/11/2019
	*  @since	1.0.0
	*
	*  @param	string The next action name
	*  @return	void
	*/
	function refresh_access_action($next = null) {
		global $wpdb;

		$table = $wpdb->prefix . 'snatchbot_webchat';
		$wp_user_id = get_current_user_id();
		$headers = array( "Content-type" => "application/json" );
		
		$user = $wpdb->get_results( $wpdb->prepare("SELECT * FROM $table WHERE  wp_user_id = %d", $wp_user_id) );	
		$esc_user = sbw_esc_checking_db($user[0]);
		if (isset($esc_user)) {
			$headers = array("Content-type" => "application/json", "access-token" => $esc_user->auth_token);
		}
		$data = array(
			"refreshToken" => $esc_user->refresh_token
		);
		$data = json_encode($data);
		$url = 'https://account.snatchbot.me/bot/api/refreshAccess';
		$args = array(
			'body' => $data,
			'headers' => $headers,
			'timeout' => '5',
		);

		$refresh = wp_remote_post( $url, $args );
		$responseCheck = json_decode(wp_remote_retrieve_body($refresh));	
		$responseCheck->data = sbw_esc_checking_db($responseCheck->data);

		if (!isset($responseCheck->data)) {
			sbw_new_error_exception(esc_js('Error authorization. Please sign in again'));
		} else {
			if (!empty($responseCheck->data->authToken) && !empty($responseCheck->data->refreshToken)) {
				$wpdb->update( $table, array(
					"auth_token" => $responseCheck->data->authToken,
					"refresh_token" => $responseCheck->data->refreshToken), array( 'wp_user_id' => $wp_user_id ));
					if ($next === 'get_bots_action') {
						$this->get_bots_action();
					}
			} else {
				$data = array(
					esc_js("error") => esc_js('token_expired')
				);
				$data = json_encode($data);
				echo $data;
			}
		}
		wp_die ();
	}		

	/** 
	*  get_bots_action
	*
	*  get bots from snatchbot api
	*
	*  @date	23/11/2019
	*  @since	1.0.0
	*
	*  @param	void 
	*  @return	string The formated data
	*/
	function get_bots_action() {
		global $wpdb;
		$table = $wpdb->prefix . 'snatchbot_webchat';
		$wp_user_id = get_current_user_id();

		$user = $wpdb->get_results( $wpdb->prepare("SELECT * FROM $table WHERE  wp_user_id = %d", $wp_user_id) );
		$esc_user = sbw_esc_checking_db($user[0]);
		if (isset($esc_user) && !empty($esc_user->auth_token)) {
			$snatchToken = $esc_user->auth_token;
			$url = 'https://account.snatchbot.me/bot/api/botctrl/getBots';
			$args = array(
				'headers' => array("Content-type" => "application/json", "access-token" => $snatchToken)
			);
			$response = wp_remote_get( $url, $args );
			$body = wp_remote_retrieve_body( $response );
			$responseCheck = json_decode($body);
		
			if(!isset($responseCheck->data)) {
				$this->refresh_access_action('get_bots_action');
			}
			
			if (!empty($esc_user->bot_id)) {
				$responseCheck->data->deployed_bot_id = $esc_user->bot_id;
				$body = json_encode($responseCheck);
			}
			echo $body;
		} else {
			sbw_new_error_exception(esc_js('Error authorization. Please sign in again'));
		}

		wp_die ();
	}
	
	/** 
	*  deploy_bot_action
	*
	*  deploy bot to client site
	*
	*  @date	23/11/2019
	*  @since	1.0.0
	*
	*  @param	void 
	*  @return	string The formatted data
	*/
	function deploy_bot_action() {
		global $wpdb;
		$table = $wpdb->prefix . 'snatchbot_webchat';
		$wp_user_id = get_current_user_id();
		$bot_id = sanitize_text_field($_GET['botID']);
		$bot_action = sanitize_text_field($_GET['bot_action']);
		$whatAction = esc_js('deploy');
		if (!empty($bot_id ) && $bot_action == 'Deploy') {
			$wpdb->update( $table, array(
				"bot_id" => null,
				"is_deploy" => false), array('is_deploy' => true));
			$wpdb->update( $table, array(
				"bot_id" => $bot_id,
				"is_deploy" => true), array( 'wp_user_id' => $wp_user_id ));
		} 
		else if (!empty($bot_id ) && $bot_action == 'Disconnect') {
			$wpdb->update( $table, array(
				"bot_id" => null,
				"is_deploy" => false), array( 'wp_user_id' => $wp_user_id ));
			$whatAction = 'disconnect';
		}
		$responceData = array(
			'deploy_action_bot_id' 	=> $bot_id,
			'what_action' 			=> $whatAction
		);
		echo json_encode($responceData);
	
		wp_die ();
	}

}

new sbw_ajax_actions();

endif;

?>