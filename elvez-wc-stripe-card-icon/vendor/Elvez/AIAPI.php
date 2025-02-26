<?php
namespace Elvez;

class AIAPI {
    /**
	 * API endpoint.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $endpoint  url of API endpoint.
	 */
    private $endpoint = 'https://ai.elvez.jp/api';

    /**
	 * Auth token.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $auth_token  string of auth token.
	 */
    private $auth_token;
    
    /**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $auth_token=null ) {
        $this->auth_token = $auth_token;
    }

   /**
	 * Return result of health check API.
	 *
	 * @since    1.0.0
     * @return  string  result of health check API
	 */
	public function health_check() {

        $header = array(
            'Authorization: Token ' . $this->auth_token,
            'Content-Type: application/json',
        );

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);

        curl_setopt($curl, CURLOPT_URL, $this->endpoint . '/health_check');
        $result = curl_exec($curl);
        curl_close($curl);

        //return json_decode($result);
        return $result;
    }    
}