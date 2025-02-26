<?php
/**
 * Plugin Name: Disable Custom Post Types
 * Description: Simple plugin to disable unwanted custom post types.
 * Author: Muhammad Kashif
 * Author URI: https://meshpros.com/
 * Version: 1.0
 */


 require_once dirname( __FILE__ ) . '/src/class.settings-api.php';
 require_once dirname( __FILE__ ) . '/settings.php';

 /**
  * Get the value of a settings field
  *
  * @param string $option settings field name
  * @param string $section the section name this field belongs to
  * @param string $default default text if it's not found
  *
  * @return mixed
  */
 function hmk_get_option( $option, $section, $default = '' ) {

     $options = get_option( $section );

     if ( isset( $options[$option] ) ) {
         return $options[$option];
     }

     return $default;
 }

 /**
  * Fire on the initialization of the admin screen or scripts.
  */
 function hmk_disable_custom_post_types() {

   global $wp_post_types;

   new hmk_settings_disable_post_type();


    $hmk_disable_ptypes = hmk_get_option( 'hmk_excl', 'hmk_excl_ptypes');
    $hmk_disable_plugin = hmk_get_option( 'hmk_excl', 'hmk_disable_plugin');

    if(!empty($hmk_disable_ptypes) && empty($hmk_disable_plugin)) {
    foreach( $hmk_disable_ptypes as $post_type ) {

        unregister_post_type( $post_type );

      }
    }

 }
 add_action( 'init', 'hmk_disable_custom_post_types' );
