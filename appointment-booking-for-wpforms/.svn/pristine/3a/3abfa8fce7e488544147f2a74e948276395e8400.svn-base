<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
class Booknow_Locations_Backend {
	function __construct(){
        add_action( 'init', array($this,'custom_post_type') );
        add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
    }
    function custom_post_type() {
        register_post_type('booknow_locations',
            array(
                'labels'      => array(
                    'name'          => esc_html__( 'Locations', 'booknow' ),
                    'singular_name' => esc_html__( 'Locations', 'booknow' ),
                ),
                'public'      => true,
                'has_archive' => true,
                'rewrite'     => array( 'slug' => 'booknow_locations' ),
                'supports'    =>array('title'),
                'show_in_menu'=> "booknow",
            )
        );
    }
    function add_meta_boxes() {
        add_meta_box(
            'booknow_locations',
            esc_html__( 'Settings', 'booknow' ),
            array( $this, 'form_main' ),
            'booknow_locations',
            'normal',
            'default'
        );
    }
    function form_main($post ) {
        $post_id= $post->ID;
      ?>
      <div class="booknow-container">
          <div class="booknow-tabs">
              <ul>
                  <li><?php esc_html_e("Addres","booknow") ?></li>
                  <li><?php esc_html_e("Date & Time","booknow") ?></li>
              </ul>
          </div>
      </div>
    <?php
  }
}