<?php
defined( 'ABSPATH' ) or die();

if( !class_exists('CDLZR_ACC_BOX')){
	class CDLZR_ACC_BOX{
		function __construct(){
			require_once( CDLZR_ACORD_PLUGIN_DIR_PATH . 'admin/cpt/class-cdlzr-cpt.php' );
			require_once( CDLZR_ACORD_PLUGIN_DIR_PATH . 'admin/mbox/class-cdlzr-metaboxes.php' );			
			require_once( CDLZR_ACORD_PLUGIN_DIR_PATH . 'admin/menu/class-cdlzr-menu.php' );			

			 add_action('init', array('CDLZR_ACC_BOX_CPTBOX', 'create_cpt'), 1);	
			 add_action( 'admin_menu', array( 'CDLZR_ACC_BOX_MENU', 'cdlzr_accbox_create_menu' ) );					 
			 add_action('add_meta_boxes', array('CDLZR_ACC_BOX_METABOXES', 'metabox_group'));
			 add_action('admin_init', array('CDLZR_ACC_BOX_METABOXES', 'metabox_group'), 1);

			/* Save post meta on the 'save_post' hook. */
			add_action( 'save_post', array('CDLZR_ACC_BOX_METABOXES','accbox_save_metabox'), 10, 2);
			/* Set Testimonial columns */
			add_filter( 'manage_cdlzr_accrodion_box_posts_columns', array( 'CDLZR_ACC_BOX_METABOXES', 'set_columns' ) );
			add_action( 'manage_cdlzr_accrodion_box_posts_custom_column', array( 'CDLZR_ACC_BOX_METABOXES', 'manage_col' ), 10, 2 );	
			add_filter( 'plugin_action_links_' . plugin_basename(CDLZR_ACCORD_FILE), array( 'CDLZR_ACC_BOX_METABOXES', 'acc_plugin_actions_links' ) );		
			
			add_action( 'wp_ajax_clzr_accbox_add_box', array('CDLZR_ACC_BOX_METABOXES','clzr_accbox_add_box' ) );			
			
		}
	}
}