<?php

if ( ! defined( 'WPINC' ) ) {
	die;
}

if( !class_exists( 'PROFILEPROAdminHookActions' ) ){
	
	class PROFILEPROAdminHookActions{
	
		function __construct(){
			add_filter( 'manage_profilepro_form_posts_columns', array( $this, 'set_custom_edit_profilepro_form_columns' ) );
			add_action( 'manage_profilepro_form_posts_custom_column' , array( $this, 'custom_profilepro_form_column' ), 10, 2 );
		}
		
		function set_custom_edit_profilepro_form_columns( $columns ){
			 $columns['form_type'] = __( 'Form Type', PROFILEPRO_PLUGIN_SLUG );
    		 $columns['shortcode'] = __( 'Shortcode', PROFILEPRO_PLUGIN_SLUG );
    		 return $columns;
		}
		
		function custom_profilepro_form_column( $column, $post_id ){
			switch ( $column ) {
				
				case 'form_type' :
					echo ucfirst( get_post_meta( $post_id, 'profilepro_form_type', true ) );
					break;
					
				case 'shortcode':
					echo "[profilepro id=$post_id]";
					break;	
			}
		}
	}
	
	new PROFILEPROAdminHookActions();
}
