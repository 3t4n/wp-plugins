<?php

/**
 * Gravity Forms Emercury API Library.
 *
 * @since     1.0
 * @package   GravityForms
 * @author    Emercury
 * @copyright Copyright (c) 2019, Emercury
 */
class GF_Emercury_API {

	const API_URL = 'https://panel.emercury.net/api.php';

	/**
	 * Emercury account API key.
	 *
	 * @access protected
	 * @var    string $api_key Emercury account API key.
	 */
	protected $api_key;

	/**
	 * Emercury account API key.
	 *
	 * @access protected
	 * @var    string $api_email Emercury account API email.
	 */
	protected $api_email;

	/**
	 * Initialize API library.
	 *
	 * @access public
	 *
	 * @param string $api_key (default: '') Emercury API key.
	 * @param string $api_email (default: '') Emercury API email.
	 *
	 * @uses GF_Emercury_API::verify_access_api()
	 */
	public function __construct( $api_key = '', $api_email = '' ) {

		// Assign API key to object.
		$this->api_key = $api_key;
		// Assign API email to object.
		$this->api_email = $api_email;

		// Verify access api.
		$this->verify_access_api();
	}

	/**
	 * Get Audience.
	 *
	 * @access public
	 *
	 * @return array
	 */
	public function getAudience()
    {
        $xml = '<?xml version="1.0" encoding="utf-8"?>
            <request>
                <method>GetAudiences</method>
                <user mail="'.$this->api_email.'" API_key="'.$this->api_key.'"></user>
            </request>'; 

        return $this->sendRequest($xml );
    }

    /**
	 * Get Audience.
	 *
	 * @access public
	 *
	 * @return List Name or List Id
	 */
	public function getAudienceID($list_id )
    {
        $xml = '<?xml version="1.0" encoding="utf-8"?>
            <request>
                <method>GetAudiences</method>
                <user mail="'.$this->api_email.'" API_key="'.$this->api_key.'"></user>
                <parameters>
                    <audience_id>'. $list_id .'</audience_id>
                </parameters>
            </request>';

        $result = $this->sendRequest($xml );

        if($result['code'] == 'ok' ) {
			$listName = (string)$result['message']->audiences->audience->name;
		} else {
			$listName = $list_id;
		}

        return $listName;
    }

    /**
	 * Get CustomFields.
	 *
	 * @access public
	 *
	 * @return array
	 */
    public function getCustomFields()
    {
        $xml = '<?xml version="1.0" encoding="utf-8" ?>
            <request>
                    <user mail="'.$this->api_email.'" API_key="'.$this->api_key.'"></user>
                    <method>getCustomFields</method>
            </request>'; 

        return $this->sendRequest($xml );
    }

    /**
	 * Update Subscribers.
	 *
	 * @access public
	 *
	 * @return string List name or false
	 */
    public function updateSubscribers($data, $list_id)
    {
        $result = '';
        foreach ($data as $key => $value) {
            $result .= "<". $key .">". $value ."</". $key .">";
        }

        $xml = '<?xml version="1.0" encoding="utf-8" ?>
                    <request>
                        <method>UpdateSubscribers</method>
                        <user mail="'. $this->api_email .'" API_key="'. $this->api_key .'"></user>
                        <parameters>
                            <audience_id>'. $list_id .'</audience_id>
                            <date_format_id>1</date_format_id>
                            <subscriber>
                                '.$result.'
                            </subscriber>
                        </parameters>
                    </request>';

        $result = $this->sendRequest($xml );

        if($result['code'] == 'ok' ) {
        	$result = $this->getAudienceID( $list_id );
		} else {
			$result = false;
		} 
    
        return $result;
    }

    private function parameters($request)
    {
        $body = [];
        $body['request'] = $request;

        return array(
            'method' => 'POST',
            'httpversion' => '1.0',
            'blocking' => true,
            'sslverify' => false,
            'body' => $body
        ); 
    }

    /**
	 * Process Emercury API request.
	 *
	 * @access private
	 *
	 * @param xml $xml Request data.
	 * @param string $method Request method POST.
	 *
	 * @return array
	 */
    private function sendRequest($xml )
    {
    	// If API key is not set, throw exception.
		if ( rgblank( $this->api_key ) ) {
			throw new Exception( 'API key must be defined to process an API request.' );
		}

		// If API email is not set, throw exception.
		if ( rgblank( $this->api_email ) ) {
			throw new Exception( 'API email must be defined to process an API request.' );
		}

        $res = wp_remote_request(self::API_URL, 
            $this->parameters($xml)
        );

        $output = [];
        if (is_wp_error( $res ) ) {
            $output = [
                'code' => 'error',
                'message' => $res->get_error_message()
            ]; 
        } else {
            $res = $res['body'];
            $output = [
                'code' => 'ok',
                'message' => (is_string($res)) ? simplexml_load_string($res) : $res 
            ];
        }
        return $output;
    }

	/**
	 * Verify access API.
	 *
	 * @access private
	 */
	private function verify_access_api() {

		// If API key is empty, return.
		if ( empty( $this->api_key ) ) {
			return;
		}

		// If API email is empty, return.
		if ( empty( $this->api_email ) ) {
			return;
		}
	}

}
