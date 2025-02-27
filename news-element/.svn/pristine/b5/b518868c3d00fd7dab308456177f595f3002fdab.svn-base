<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class News24_Activation {

  function __construct() {  

    register_activation_hook( NEWS_ELM_ROOT_FILE,  [ $this, 'init' ] );
    add_action('elementor/tracker/send_event', [__CLASS__, 'init']);
    add_action( 'elementor/core/files/clear_cache', array( __CLASS__, 'init' ), 10, 2 );
  }

  public static function init(){
    
    $remote = News24_Cloud_Library::$plugin_data["remote_site"];
    $endpoint = News24_Cloud_Library::$plugin_data["rest_call"];
    $data = json_decode(wp_remote_retrieve_body(wp_remote_get($remote.'wp-json/wp/v2/'.$endpoint)), true);
    $sites = json_decode(wp_remote_retrieve_body(wp_remote_get($remote.'wp-json/wp/v2/news24_sites')), true);

    if ( $data && $sites ){
      $data['sites'] = $sites;
      update_option( 'news24lib', $data);
    }

    News_Element_Style_Grabber::generate_css();
  }

}

new News24_Activation();





