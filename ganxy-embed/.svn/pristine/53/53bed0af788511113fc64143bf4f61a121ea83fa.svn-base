<?php
defined( 'ABSPATH' ) or die( "No Direct Access!" );
global $fcm_plugin_array;
global $fcm_plugin_array_apiset;

if ( !class_exists( 'FCM_Plugin_Update_Class' ) ){
	class FCM_Plugin_Update_Class{
		var $slug;
		var $api_url;
		var $wpvers;
		var $api_set = false;
		function __construct($slug){
			global $wp_version;
			global $fcm_plugin_array_apiset;
			$this->set_plugin($slug);
			$this->wpvers	= $wp_version;
			//$this->api_url	= 'http://graphiccaffeine.com/dev-updates-temp/';
			$this->api_url	= 'http://graphiccaffeine.com/wp-admin/admin-ajax.php';
			add_filter( 'pre_set_site_transient_update_plugins', array($this,'check_for_plugin_update'));
			if( $fcm_plugin_array_apiset !== true )
				add_filter( 'plugins_api', array($this,'do_plugin_api_call'), 10, 3);
			$fcm_plugin_array_apiset = true;
		}
		public function set_plugin($slug){
			global $fcm_plugin_array;
			$fcm_plugin_array[$slug] = array(
				'slug' => $slug,
				'pslug' => $slug.'/'.$slug.'.php',
				'checked' => 0,
			);
		}
 		public function check_for_plugin_update($checked_data) {
			if ( empty($checked_data->checked ) ){ return $checked_data; }
			global $fcm_plugin_array;
			if(is_array($fcm_plugin_array) && !empty($fcm_plugin_array)){
				foreach($fcm_plugin_array as $key => $val){
					$slug 	= isset( $val['slug'] ) && $val['slug'] != '' ? $val['slug'] : '';
					$pslug 	= isset( $val['pslug'] ) && $val['pslug'] != '' ? $val['pslug'] : '';
					$checkd  = isset( $val['checked'] ) && (int) $val['checked'] == 1 ? true : false;
					if( $slug != '' && isset( $checked_data->checked[ $pslug ] ) && !$checkd){
						$args 			= array('slug' =>$slug, 'version' => $checked_data->checked[$pslug]);
						$request_string = array('body' => array('action' => 'basic_check','request' => serialize($args),'api-key' => md5( get_bloginfo('url') )),'user-agent' => 'WordPress/' . $this->wpvers . '; ' . get_bloginfo('url'));
						$raw_response 	= wp_remote_post( $this->api_url, $request_string );
						if ( !is_wp_error( $raw_response ) && ( $raw_response['response']['code'] == 200 ) ){
							$response = maybe_unserialize( rtrim($raw_response['body'],'0') );
						}
						if ( is_object( $response ) && !empty( $response ) ){
							$checked_data->response[$pslug] = $response;
						}
						$fcm_plugin_array[$key]['checked'] = 1;
					}
				}
			}
			return $checked_data;
		}
		public function do_plugin_api_call($def, $action, $args) {
			global $fcm_plugin_array;
			$slugCheck 			= isset($args->slug) ? $args->slug : '';
			$slug 				= isset( $fcm_plugin_array[$slugCheck] ) && $fcm_plugin_array[$slugCheck]['slug'] != '' ? $fcm_plugin_array[$slugCheck]['slug'] : '';
			$pslug 				= isset( $fcm_plugin_array[$slugCheck] ) && $fcm_plugin_array[$slugCheck]['pslug'] != '' ? $fcm_plugin_array[$slugCheck]['pslug'] : '';
			$checkd  			= isset( $fcm_plugin_array[$slugCheck] ) && (int) $fcm_plugin_array[$slugCheck]['checked'] == 1 ? true : false;
			$plugin_info 		= get_site_transient('update_plugins');
			if( $slugCheck == '' || !isset( $fcm_plugin_array[$slugCheck] ) ||  !isset( $plugin_info->checked ) ){return false; }
			$current_version 	= $plugin_info->checked[$pslug];
			$args->version 		= $current_version;
			$request_string 	= array('body' => array('action' => $action, 'request' => serialize($args),'api-key' => md5( get_bloginfo('url') )),'user-agent' => 'WordPress/' . $this->wpvers . '; ' . get_bloginfo('url'));
			$request 			= wp_remote_post($this->api_url, $request_string);
			if ( is_wp_error( $request ) ) {
				$resd = new WP_Error('plugins_api_failed', __( 'An Unexpected HTTP Error occurred during the API request.' ) . '</p> <p><a href="?" onclick="document.location.reload(); return false;">' . __( 'Try again' ) . '</a>', $request->get_error_message());
			} else {
				$resd = unserialize( rtrim($request['body'],'0') );
				if (! is_object( $resd ) && ! is_array( $resd )){
					$resd = new WP_Error( 'plugins_api_failed', __( 'An unknown error occurred' ), $request['body'] );
				}
			}
			return $resd;
		}
	}
}