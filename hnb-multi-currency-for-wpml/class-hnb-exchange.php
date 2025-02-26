<?php
/**
 * Rate service for WCML_Exchange_Rates_HNB
 *
 * @package WCML_Exchange_Rates_HNB
 */

/**
 * Class WCML_Exchange_Rates_HNB
 *
 * Get rates from HNB Croatia National Bank
 * @category Class
 * @author Mario Rendić <mario@simplesolutions.hr>
 */

class WCML_Exchange_Rates_HNB extends WCML_Exchange_Rate_Service {

    private $id = 'hnb';
    private $name = 'HNB';
    private $url            = 'https://www.hnb.hr/hnb-api';
    private $api_url        = 'http://api.hnb.hr/tecajn/v2';

    public function __construct() {
        parent::__construct( $this->id, $this->name, $this->api_url, $this->url  );
        $this->requires_key = false;

    }

    /**
    * @param string $from
    * @param array $tos
    *
    * @return array
    * @throws Exception
    */
    /**
    * @param $from string
    * @param $to array
    * @return array
    * @throws Exception
    */
    public function get_rates( $from, $tos ){

        parent::clear_last_error();
        $rates = array();

        $http = new WP_Http();
        $data = $http->request( $this->api_url );

        if( is_wp_error( $data ) ){

            $http_error = join("\n", $data->get_error_messages() );
            parent::save_last_error( $http_error );
            throw new Exception( $http_error );

        } else {

            $data = json_decode($data['body']);
            $data[] = (object) ['valuta' => 'HRK','jedinica' => '1', 'srednji_tecaj' => '1', ];

            foreach( $data as $currency ) {
                if ($currency->valuta == $from) {
                    $fromValue =  str_replace(",", ".", $currency->srednji_tecaj);
                }
            }

            foreach( $data as $currency ) {
                if (in_array($currency->valuta,$tos)) {
                    $rates[$currency->valuta] = str_replace(",", ".", $currency->jedinica) *  $fromValue / str_replace(",", ".", $currency->srednji_tecaj);
                }
            }


        }

        return $rates;

    }

}
