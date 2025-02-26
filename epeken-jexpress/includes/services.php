<?php
if(!defined('ABSPATH')) exit;
##################################################
## Shipping Microservices functions to Anteraja ##
##################################################
/*
* Get Anteraja Rate
*/
function epeken_jexpress_price($origin_city,$dest_city,$dest_district,$dest_province,$weight){
    $logger = new WC_Logger();
    $logger -> add('jexpress', 'Rate from '.$origin_city.', '.$dest_city.', '. $dest_district.' ,'.$weight);
    $license = sanitize_text_field(get_option('epeken_wcjne_license_key'));
    $origin_city = urlencode($origin_city); 
    $dest_city = urlencode($dest_city);
    $dest_district = urlencode($dest_district);
    $url = EPEKEN_JEXPRESS_API_RATE_URL.$license.'/'.$origin_city.'/';
    $url .= $dest_city.'/'.$dest_district.'/'.$dest_province.'/'.$weight;
    $response=wp_remote_get($url);
    $rate = wp_remote_retrieve_body($response);
    return $rate;
  }	

function epeken_jexpress_save_credential($username,$password, $client_id) {
    $license = sanitize_text_field(get_option('epeken_wcjne_license_key'));
    $url = EPEKEN_JEXPRESS_API_CREDENTIAL;

    $post_data = ["license" => $license, 
      "username" => $username, 
      "password" => $password, 
      "client_id" => $client_id
      ];
  
    $return = wp_remote_post($url, array(
      'headers'     => array('Content-Type' => 'application/json; charset=utf-8'),
      'body'        => json_encode($post_data),
      'method'      => 'POST',
      'data_format' => 'body',)
    );
    if(is_wp_error($return)) {
      return false;
    }else{
      return true;
    }
}

?>
