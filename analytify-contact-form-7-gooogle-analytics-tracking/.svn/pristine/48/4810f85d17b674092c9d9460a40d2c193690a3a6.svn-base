<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) { exit; }

class ANALYTIF_CF7_TRACKING {


	function __construct() {

    $this->scripts();
	}

  function scripts() {
    add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
  }


  /**
   * Add All Front Scripts
   *
   * @since 1.0.0
   */
  function enqueue_scripts() {

    wp_enqueue_script( 'analytify-event-cf7-front', plugins_url( 'assets/js/cf7-front.js', dirname( __FILE__ ) ), array( 'jquery' ), ANALTYIFY_CF7_TRACKING_VERSION, true);
		
  }

}
new ANALYTIF_CF7_TRACKING();
