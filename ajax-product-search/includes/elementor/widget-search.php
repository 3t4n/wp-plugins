<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// search
class ajax_product_search_Widget_search extends Widget_Base {
 
   public function get_name() {
      return 'ajax-product-search';
   }
 
   public function get_title() {
      return esc_html__( 'Ajax Product Search', 'ajax_product_search' );
   }
 
   public function get_icon() { 
        return 'eicon-site-search';
   }
 
   public function get_categories() {
      return [ 'ajax_product_search' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'search_section',
         [
            'label' => esc_html__( 'Search', 'ajax_product_search' ),
            'type' => Controls_Manager::SECTION,
         ]
      );


      $this->add_control(
         'placeholder',
         [
            'label' => __( 'Search placeholder', 'ajax_product_search' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Search...','ajax_product_search')
         ]
      );

      $this->add_control(
         'button',
         [
            'label' => __( 'Button', 'ajax_product_search' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Search','ajax_product_search')
         ]
      );

      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
    // get our input from the widget settings.       
    $settings = $this->get_settings_for_display(); ?>

     <?php echo do_shortcode( '[ajaxsearch placeholder="'.esc_attr( $settings['placeholder'] ).'" button="'.esc_attr( $settings['button'] ).'"]' ) ?>

    <?php
   }
}

Plugin::instance()->widgets_manager->register_widget_type( new ajax_product_search_Widget_search );