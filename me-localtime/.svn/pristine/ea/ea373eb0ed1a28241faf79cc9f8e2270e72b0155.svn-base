<?php

class MELT_LocalTimeScript {

  function __construct(){
    add_action('wp_enqueue_scripts', array( $this, 'melt_local_time_script' ) );
    add_action('admin_enqueue_scripts', array( $this, 'melt_local_time_script' ) );
  }

  function melt_local_time_script(){

      wp_enqueue_script( 'melt-local-time', plugin_dir_url( __DIR__ ) . 'public/js/melt-localtime.js', array('jquery'), '1.0.0', false );

  }

}

$localTimeScript = new MELT_LocalTimeScript();
