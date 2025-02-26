<?php

class Conditional_Discount_Rule_Woocommerce_Public {

	
	private $plugin_name;

	
	private $version;

	
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		new Pi_Cdrw_Apply_Discount();
	}

	
	public function enqueue_styles() {


		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/conditional-discount-rule-woocommerce-public.css', array(), $this->version, 'all' );

	}

	
	public function enqueue_scripts() {


		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/conditional-discount-rule-woocommerce-public.js', array( 'jquery' ), $this->version, false );

	}

}
