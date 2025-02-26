<?php
/*
AI Mortgage Calculator
Website: https://aimortgagecalculator.com
Author: Choice Home Mortgage
Author URI: http://choicehm.com
*/

if ( ! defined( 'ABSPATH' ) ) die;
if ( ! class_exists( 'AIMC_Shortcode' ) ) die;

class AIMC_Shortcode {

	public function __construct() {
		add_shortcode( 'aimc', array( $this, 'calculators') );
	}

	public function calculators($atts) {
		$type = isset($atts['calculator']) ? $atts['calculator'] : 'default';

		ob_start();
        include_once(plugin_dir_path( dirname( __FILE__ ) ) . '/calculators/' . $type . '.php' );
        return ob_get_clean();
	}

}

new AIMC_Shortcode();