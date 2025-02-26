<?php

/**
 * Gravity Forms Freshsales CRM API Library.
 * 
 * @since 1.0.0
 * 
 * @copyright 2019 Pugmarker Creative Solutions
 */

class PM_Freshsales_API
{

    protected $api_url = '';

    protected $auth_data = array();

    /**
     * Initialize API library
     */
    public function __construct()
    {
        $this->auth_data = pm_freshsales_crm()->get_api_domain_token();
        
        if( isset($this->auth_data) && !empty($this->auth_data) )
        {
            $this->api_url = "https://".$this->auth_data['domain'].".freshsales.io/api/";
        }
        
        return $this->api_url;

    }

    /**
     * Make API Request
     * 
     * @access public 
     * 
     * @param string $path  Request path ( eg. leads/ ) don't include api/
     * @param array $data   Request data
     * @param string $method    Request method ( GET | POST | PUT )
     * @param string $return_key Response return key if null returns full response
     * @param int $response_code Expected HTTP response code
     * 
     * @return array|WP_Error
     */

    public function make_request( $path = '', $data = array(), $method = 'POST', $return_key = '')
    {
        
        $request_url = $this->api_url.$path;

        // Prepare request arguments
        $args = array(
            'headers' => array(
				'Content-Type' => 'application/json',
				'cache-control' => 'no-cache',
				'Authorization' => 'Token token='.$this->auth_data['token']
			)
        );

        // Add body to arguments if request method is POST or PUT
        if( in_array( $method, array( 'POST', 'PUT' ) ) )
        {
            $args['body'] = json_encode($data);
            $args['method'] = $method;
        }

        // wp_remote_request send a request to api
        $response = wp_remote_request( $request_url, $args );
        
        

        $response_code = wp_remote_retrieve_response_code( $response );

        if( rgar( $response, 'body' ) ){
            $response = json_decode( $response['body'], true );

            // If a return key is defined and array item exists, return it.
            if ( ! empty( $return_key ) && rgar( $response, $return_key ) ) {
                return rgar( $response, $return_key );
            }
            
            return $response;
        }
        else if( rgar( $response, 'errors' ) )
        {
            return $response;
        }
        else{
            return $response;
        }
        
    }

    /**
     * Check valid domain and token before saving setting form
     */
    public function test_connection( $domain, $token )
    {
        $api_url = "https://".$domain.".freshsales.io/api/settings/leads/fields";


        // Prepare request arguments
        $args = array(
            'headers' => array(
				'Content-Type' => 'application/json',
				'cache-control' => 'no-cache',
				'Authorization' => 'Token token='.$token
			)
        );

        // wp_remote_request send a request to api
        $response = wp_remote_request( $api_url, $args );

        if( rgar( $response, 'body' ) ){
            $response = json_decode( $response['body'], true );

            return $response;
        }
        else{
            return $response;
        }

    }

    /**
     * Get fields for module
     * @since 1.0.0
     * 
     * @uses PM_Freshsales_API::make_request to make HTTP request
     * 
     */

    public function get_fields( $module = 'Leads' )
    {

        $fields = array();
        $formatted_fields = array();

        $modules = array( 
            'Leads'     =>  'settings/leads/fields',
            'Contacts'  =>  'settings/contacts/fields'
        );

        if( in_array( $module, array_keys($modules) ) )
        {
            $fields = $this->make_request($modules[$module], '', 'GET', 'fields');
            
        }
        // Check fields returned or not
        if( !empty( $fields ) ){
            foreach( $fields as $field )
            {

                if( $field['name'] === 'emails' )
                {
                    $formatted_fields['other_fields'][] = array(
                        'label'     => 'Email',
                        'name'      => $field['base_model'].'-email',
                        'value'     => $field['base_model'].'-email',
                        'required'  =>  $field['required'],
                    );
                }
                else if( $field['name'] === 'last_name' )
                {
                    $formatted_fields['standard_fields'][] = array(
                        'label'     => 'Last Name',
                        'name'      => $field['base_model'].'-'.$field['name'],
                        'value'     => $field['base_model'].'-'.$field['name'],
                        'required'  =>  $field['required'],
                    );
                }
                else{
                    $formatted_fields['other_fields'][] = array(
                        'label'     => $field['label'],
                        'name'      => $field['base_model'].'-'.$field['name'],
                        'value'     => $field['base_model'].'-'.$field['name'],
                        'required'  =>  $field['required'],
                    );
                }

            }
            
            return $formatted_fields;
        }

        
    
    }

    /**
     * Check Lead or Contact Exists or not
     *
     * @param string $module
     * @param string $email
     * @param string $mobile
     * @return $response|false
     */
    public function check_is_exists( $module = 'Lead', $email = '', $mobile = '' )
    {
        // If Module is lead
        if( $module === 'Lead' )
        {   
            // Check email exists or not
            if( !empty( $email ) && empty( $mobile ) )
            {
                $response = $this->make_request( 'search?q='.$email.'&include=lead', '', 'GET', '' );

            }
            // Check mobile exists or not
            else if( !empty( $mobile ) && empty( $email ) )
            {
                $response = $this->make_request( 'search?q='.$mobile.'&include=lead', '', 'GET', '' );

            }
            // Check if both are exists
            else if( !empty( $email ) && !empty( $mobile ) )
            {
                // check email first
                $email_response = $this->check_is_exists($module, $email, '');
                if( empty($email_response) )
                {
                    $response = $this->check_is_exists($module, '', $mobile);
                }
                else{
                    return $email_response;
                }
                
            }

            return $response;
        }

        /**
         * If $module is Contact
         */
        if( $module === 'Contact' )
        {   
            // Check email exists or not
            if( !empty( $email ) && empty( $mobile ) )
            {
                $response = $this->make_request( 'search?q='.$email.'&include=contact', '', 'GET', '' );

            }
            // Check mobile exists or not
            else if( !empty( $mobile ) && empty( $email ) )
            {
                $response = $this->make_request( 'search?q='.$mobile.'&include=contact', '', 'GET', '' );

            }
            // Check if both are exists
            else if( !empty( $email ) && !empty( $mobile ) )
            {
                // check email first
                $email_response = $this->check_is_exists($module, $email, '');
                if( empty($email_response) )
                {
                    $response = $this->check_is_exists($module, '', $mobile);
                }
                else{
                    return $email_response;
                }
                
            }

            return $response;
        }
    }



    
}