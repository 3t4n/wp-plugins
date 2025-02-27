<?php

/**
 * @author OWL WP PLUGINS
 * @created 2018/09/28
 */

function wpwc_url_exists( $url ){

  if( ! $url && ! is_string( $url ) ){ return false; }

  $headers = @get_headers( $url );
  if( preg_match( '/[2][0-9][0-9]/', $headers[0] ) ){
    return true;
  }else{
    return false;
  }

}

?>