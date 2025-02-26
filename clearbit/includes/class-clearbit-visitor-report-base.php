<?php

class Clearbit_Visitor_Report_Base {
  public static function event($name, $params = array()) {
    if ( ini_get('allow_url_fopen') ) {
      $options = array('siteurl');

      foreach ($options as $option) {
        $params[$option] = get_option($option, null);
      }

      $postdata = array(
        'event' => $name,
        'userId' => $params['siteurl'],
        'params' => $params,
      );

      $args = array(
        'headers' => array(
          'Content-Type' => 'application/json; charset=utf-8',
        ),
        'body' => json_encode( $postdata ),
      );

      $response = wp_remote_post( 'https://clearbit.com/resources/api/external-event', $args );

      if ( ! is_wp_error( $response ) && wp_remote_retrieve_response_code( $response ) === 200 ) {
        // API call was successful
        return true;
      } else {
        // Error occurred
        return false;
      }
    }
  }
}
