<?php

class WBS_Api {
    
    private $url;
    private $username;
    private $password;
	private $options;
	private $app_token;
	private static $token = false;
    
    private $error = FALSE;
    private $error_msg = NULL;

    public function __construct( $options ) {
        $this->options = get_option('wbs_options');
		$this->url = empty($options['api_url']) ? 'https://api.worldsoft-wbs.com/' : $options['api_url'];
        
    }
    
    private function reset_error() {
        $this->error = FALSE;
        $this->error_msg = NULL;
    }
    
	
	private function has_error($json){
		if ( $json->error ) {
            $this->error = true;
            $this->error_msg = $json->error_msg;
            return true;
        }
		return false;
	}
    
	public function auth_app($force = false) {
		$this->reset_error();
		if (isset($this->app_token) && $this->app_token && !$force) {
			return $this->app_token;
		}
        $token = get_transient('wbs_app_token');
		if ($token && !$force) {
			return $token;
		}
		$fn = 'app/auth';
		$json = $this->call($fn, array(
			'company_id' => $this->options['api_company_id'], 
			'secret' => $this->options['api_secret'], 
			'key' => $this->options['api_key'], 
		));
		if ($this->has_error($json)){
			return false;
		}	
		
		set_transient('wbs_app_token', $json->data->app_token, 7200);
		return $json->data->app_token;	
	}
	
    public function getToken() {
		if ( false === self::$token ) {
			$transient_timeout = get_option ( '_transient_timeout_wbs_token');
			if ( $transient_timeout === false) {
				self::$token = false;
			} elseif ( $transient_timeout < time() ) {
				delete_transient( 'wbs_token' );
				self::$token = false;
			}
			else {
				self::$token = get_transient('wbs_token');	
			}
		
		}
		return self::$token;
	}
    /**
     * Returns UserData object by specified token.
     * @param type $token
     */
    public function getTokenData( $token ) {
        $fn = 'login/getTokenData';

        $this->reset_error();
        $json = $this->call($fn, array('token' => $token));

        if ($this->has_error($json)){
			return false;
		}
        
        return $json->data;
    }
    
    
    public function connector_forms_getall() {
        $fn = 'widget/forms/getAllWebForms';

		if ( false === $this->auth_app()  || false === self::getToken() ) {
			return false;
		}
		$this->reset_error();
		$json = $this->call($fn, array(
            'app_token' => $this->auth_app(),
            'company_id' => $this->options['api_company_id'],
			'token' => self::getToken(),
			
        ));
        if ($this->has_error($json)){
			return false;
		}

        return $json->data->rows;
    }
    
    
    public function connector_widgets_getJSlink( $id ) {
        $fn = 'widget/forms/getCode';
		
        $this->reset_error();
		if (false === self::getToken() ) {
			return false;
		}
        $json = $this->call($fn, array(
            'id' => $id,
			'company_id' => $this->options['api_company_id'], 	
			'token' => self::getToken(),
			'app_token' => $this->auth_app(),
        ));
        
		if ($this->has_error($json) || !isset($json->data->code)){
			return false;
		}
		
		return stripslashes(html_entity_decode(trim($json->data->code, "'")));
    }
    

    private function call( $function, $params ) {
        $query = '';
        $query_parts = array();
        $function_url = $this->url . $function;

        foreach ( $params as $param_name => $param_value ) {
            $query_parts[] = $param_name . '=' . urlencode($param_value);
        }

        $query = implode('&', $query_parts);
        $call_url = $function_url . '?' . $query;
        $curl = curl_init();
        $curl_options  = array(
            CURLOPT_HEADER => FALSE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_TIMEOUT => 60,
            CURLOPT_URL => $call_url,
            CURLOPT_CUSTOMREQUEST => 'GET',
			CURLOPT_SSL_VERIFYPEER => false,
        );
		curl_setopt_array($curl, $curl_options);
        
        $response = curl_exec($curl);
        $json = json_decode($response);
		curl_close($curl);
        
        return $json;
    }
    
    
    public function get_error_msg($sep = "\n") {
        if ( $this->error_msg ) {
            if ( is_array($this->error_msg) ) {
                return implode($sep, $this->error_msg);
            }
            return $this->error_msg;
        }

        return NULL;
    }
    
}