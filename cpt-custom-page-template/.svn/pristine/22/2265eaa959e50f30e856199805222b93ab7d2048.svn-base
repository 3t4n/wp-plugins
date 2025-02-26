<?php
/*
Plugin Name:CPT custom page template
Plugin URI: https://wordpress.org/plugins/cpt-custom-page-template/
Description: Adding Template Options to a Wordpress Custom Post Type.
Version: 1.0.1
Author: Ganesh Paygude
Text Domain: cpt-custom-page-template
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Clarion Technologies; either version 2
of the License, or (at your option) any later version.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Clarion Technologies.

Copyright 2005-2020  Clarion Technologies.
*/


/* Setup the plugin. */
add_action( 'plugins_loaded', 'cptct_plugin_setup' );

/* Register plugin activation hook. */
register_activation_hook( __FILE__, 'cptct_plugin_activation' );

/* Register plugin activation hook. */
register_deactivation_hook( __FILE__, 'cptct_plugin_deactivation' );
/**
 * Do things on plugin activation.
 *
 */
function cptct_plugin_activation() {
	/* Flush permalinks. */
    flush_rewrite_rules();
}
/**
 * Flush permalinks on plugin deactivation.
 */
function cptct_plugin_deactivation() {
    flush_rewrite_rules();
}
function cptct_plugin_setup() {

/* Get the plugin directory URI. */
define( 'CPT_CUSTOM_TEMPLATE_URI', trailingslashit( plugin_dir_url( __FILE__ ) ) );


/* Add meta boxes on the 'add_meta_boxes' hook. */
add_action( 'add_meta_boxes', 'cptcts_meta_boxes' );

/* Save post meta on the 'save_post' hook. */
add_action( 'save_post', 'cptcts_save_meta', 10, 2 );

/* Load template filter */
add_filter( 'single_template', 'cptcts_load_PostTemplate' );
  
}

function cptcts_meta_boxes() {

	
	$post_types = get_post_types();
	  add_meta_box(
		'cpt-template-meta-box'
		, __( 'Page Template', 'cpt-custom-template' )
		, 'cptcts_meta_box_html'
		, $post_types
		, 'side'
		, 'core'
	  );
}

function cptcts_meta_box_html( $object, $box ) { 
  
  
    wp_nonce_field( basename(__FILE__), 'cptcts_post_type_template_meta_nonce' );   
    $current_template = get_post_field( 'cptcts_post_type_template',$post->ID);   
    $cptcts_template_options_list = get_page_templates();
	
    $cptcts_label = '<label for="cptcts_post_type_template">Page Template</label>';
	$cptcts_select = '<select name="cptcts_post_type_template">';    
    $cptcts_default_option = '<option value="">Default Template</option>';
    $cptcts_options = '';

    foreach (  $cptcts_template_options_list as $name=>$file ) {
        if ( $current_template == $file ) {
			
            $cptcts_options .= '<option value="' . $file . '" selected="selected">' . $name . '</option>';
		
        } else {
            $cptcts_options .= '<option value="' . $file . '">' . $name . '</option>';
			
        }
    }
   
    echo $cptcts_label;
    echo $cptcts_select;
    echo $cptcts_default_option;
    echo $cptcts_options;
    echo '</select>';
 }

/* Save the meta box's post metadata. */
function cptcts_save_meta( $post_id, $post ) {

	$cptcts_post_type_template_meta_nonce = $_POST['cptcts_post_type_template_meta_nonce'];
    $cptcts_is_autosaving = wp_is_post_autosave( $post_id );
    $cptcts_is_revision   = wp_is_post_revision( $post_id );
    $cptcts_valid_nonce   = ( isset( $cptcts_post_type_template_meta_nonce ) && wp_verify_nonce( $cptcts_post_type_template_meta_nonce, basename( __FILE__ ) ) ) ? 'true' : 'false';

    if ( $cptcts_is_autosaving || $cptcts_is_revision || !$cptcts_valid_nonce ) {
        return;
    }
	
    $cptcts_post_type_template = $_POST['cptcts_post_type_template'];
    update_post_meta( $post_id, 'cptcts_post_type_template', $cptcts_post_type_template );
}
function cptcts_load_PostTemplate() {
    
    // access our post meta data
    $cptcts_query_object = get_queried_object();
    $cptcts_post_type_template = get_post_meta( $cptcts_query_object->ID, 'cptcts_post_type_template', true );

    
    $cptcts_default_templates    = array();
    $cptcts_default_templates[] = "single-{$cptcts_query_object->post_type}-{$cptcts_query_object->post_name}.php";
	$cptcts_default_templates[] = "single-{$cptcts_query_object->post_type}.php";
    $cptcts_default_templates[]  = 'single.php';

    // only apply our template to post and other CPT except pages.
    if ( $cptcts_query_object->post_type != 'page' ) {
        
        if ( !empty( $cptcts_post_type_template ) ) {            
            $cptcts_default_templates = $cptcts_post_type_template;
        }
    }

    // locate the template and return it
    $cptcts_template = locate_template( $cptcts_default_templates, false );
    return $cptcts_template;
}
function custom_page_template_load_plugin_textdomain() {
    load_plugin_textdomain( 'cpt-custom-page-template', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
  }
  add_action( 'plugins_loaded', 'custom_page_template_load_plugin_textdomain' );