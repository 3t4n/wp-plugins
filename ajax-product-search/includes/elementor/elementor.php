<?php

if ( ! defined( 'ABSPATH' ) ) exit;

function ajax_product_search_add_elementor_widget_categories( $elements_manager ) {

	$elements_manager->add_category(
		'ajax_product_search',
		[
			'title' => esc_html__( 'Ajax Product Search', 'ajax_product_search' ),
			'icon' => 'fa fa-plug',
		]
	);

}
add_action( 'elementor/elements/categories_registered', 'ajax_product_search_add_elementor_widget_categories' );

//Elementor init

class ajax_product_search_ElementorCustomElement {
 
   private static $instance = null;
 
   public static function get_instance() {
      if ( ! self::$instance )
         self::$instance = new self;
      return self::$instance;
   }
 
   public function init(){
      add_action( 'elementor/widgets/widgets_registered', array( $this, 'widgets_registered' ) );
   }


   public function widgets_registered() {
 
    // We check if the Elementor plugin has been installed / activated.
    if(defined('ELEMENTOR_PATH') && class_exists('Elementor\Widget_Base')){
         include_once(plugin_dir_path( __FILE__ ).'/widget-search.php');
      }
	}

}

ajax_product_search_ElementorCustomElement::get_instance()->init();