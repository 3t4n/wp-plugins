<?php

/**
 * Register autoload function.
 * 
 * Dynamically load classes instantiated by the plugin.
 * 
 * @package Custom_WP_Framework\Includes
 */

 spl_autoload_register( 'custom_wp_framework_autoload' );

 /**
  * Load the class instantiated by the plugin. 
  * 
  * @since  1.0.0
  * @param  string  $class_name     The fully-qualified name of the class to load. 
  */
function custom_wp_framework_autoload( $class_name ) {

    // Abort if specified class name does not include root namespace.
    if ( false === strpos( $class_name, 'Custom_WP_Framework' ) ) {
        return;
    }

    // Split the class name into an array to read the namespace and class.
    $file_parts = explode( '\\', $class_name );
 
    // Variable to store namespace.
    $namespace = '';

    // Variable to store filename.
    $file_name = '';

    // Do a reverse loop through $file_parts to build the path to the file.
    $namespace = '\\';
    
    for( $i = 0; $i < count( $file_parts ); $i++) {

        $current = strTolower( $file_parts[$i] );
        $current = str_ireplace( '_', '-', $current );

        if ( $current === 'custom-wp-framework' ) {
            continue;
        }

        if( count( $file_parts ) - 1 == $i ) {
            $file_name = 'class-' . $current;
        }
        else {
            $namespace .= $current . '\\'; 
        }
    }
    
    // Build a path to the file using mapping to the file location.
    $file_path  = dirname( dirname( __FILE__ ) ) . $namespace;
    $file_path .= $file_name . '.php';
    
    // If the file exists in the specified path, then include it.
    if ( file_exists( $file_path ) ) {
        include_once( $file_path );
    } 
    else {
        wp_die(
            esc_html( sprintf( __( "The file attempting to be loaded at %s does not exist.", CUSTOM_WP_FRAMEWORK_TEXT_DOMAIN ), $file_path ) )
        );
    }
}