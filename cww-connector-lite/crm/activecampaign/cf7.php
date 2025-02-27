<?php
/**
 * Active Campaign settings for Contact Form 7
 *  API related settings
 */

if (!defined('ABSPATH'))
    exit;

if(!class_exists('CWW_Connector_Lite_Active_Campaign_Subscribe')){
	class CWW_Connector_Lite_Active_Campaign_Subscribe{

		public function __construct(){
			add_action( 'wpcf7_before_send_mail', array($this, 'crm_subscribe' )); 
		}

		

		public function crm_subscribe($contact_form ){
			
			$submission 	= WPCF7_Submission::get_instance();
		    $posted_data 	= $submission->get_posted_data();
			$wpcf7 			= WPCF7_ContactForm::get_current();
			$form_id 		= $wpcf7->id();
		    $enable_cww 	= get_post_meta($form_id,'cww_enable',true);
		   
			if( $enable_cww == 'no'){
				return;
			}
		    

			if($enable_cww == 'yes' && apply_filters( 'cww_send_data', 'true' ) == 'true'){

				$fields 	= get_post_meta($form_id,'cww_fields',true);
				$emailkey 	= isset($fields['cww_email']) ? $fields['cww_email'] : '';
				$fnamekey 	= isset($fields['cww_first_name']) ? $fields['cww_first_name'] : '';
				$lnamekey 	= isset($fields['cww_last_name']) ? $fields['cww_last_name'] : '';
				$phonekey 	= isset($fields['cww_phone']) ? $fields['cww_phone'] : '';
				$orgkey 	= isset($fields['cww_organization']) ? $fields['cww_organization'] : '';
                

				$email = '';
				if(!empty($emailkey))
				$email = isset($posted_data[$emailkey]) ? $posted_data[$emailkey] : '';

				$fname = '';
				if(!empty($fnamekey))
				$fname = isset($posted_data[$fnamekey]) ? $posted_data[$fnamekey] : '';

				$lname = '';
				if(!empty($lnamekey))
				$lname = isset($posted_data[$lnamekey]) ? $posted_data[$lnamekey] : '';

				$phone = '';
				if(!empty($phonekey))
				$phone = isset($posted_data[$phonekey]) ? $posted_data[$phonekey] : '';

				$organization = '';
				if(!empty($orgkey))
				$organization = isset($posted_data[$orgkey]) ? $posted_data[$orgkey] : '';


				//Active Campaign starts
				if(!empty($email)){

					$ac = get_post_meta($form_id,'cww_credentials',true);

					if(isset($ac['url']) && !empty($ac['url']) && isset($ac['api_key']) && !empty($ac['api_key']) && isset($ac['list_id'])){

						$url 		= $ac['url'];
						$api_key 	= $ac['api_key'];
						
						update_option('cww_cf7apikey',$api_key);
						update_option('cww_cf7apiurl',$url);

						$list_id 	= isset($ac['list_id']) ? $ac['list_id'] : '';
						$params 	= array(
							'api_key'      => $ac['api_key'],
							'api_action'   => 'contact_add',
							'api_output'   => 'serialize',
						);

						$body = array(
							'email'        						=> $email,
							'p['.$list_id.']'          			=> $list_id, 
							'status['.$list_id.']'     			=> 1,
							'instantresponders['.$list_id.']' 	=> 0,
						);

						if(!empty($fname)){
							$body['first_name'] = $fname;
						}
						if(!empty($lname)){
							$body['last_name'] 	= $lname;
						}
						if(!empty($phone)){
							$body['phone'] 		= $phone;
						}
						if(!empty($organization)){
							$body['orgname'] 	= $organization;
						}

						$args = array(
                    		'method' 		=> 'POST',
                    		'timeout'     	=> 15,
                    		'redirection' 	=> 15,
                    		'headers'     	=> "Content-Type: application/x-www-form-urlencoded",
                    		'body' 			=> $body,
                    	);
                    	
                    	$api_url = $url . "/admin/api.php?api_action=contact_sync&api_output=json&api_key=".$api_key;
                    	$response = wp_remote_request( $api_url, $args);
                    
                    	if( is_wp_error( $response ) ) {
                    		// do nothing
                    	}
					}
				}
			}
		}
	}
	new CWW_Connector_Lite_Active_Campaign_Subscribe();
}