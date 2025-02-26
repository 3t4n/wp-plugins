<?php
/**
 * @package  WooSearch
 * @developer  name : Joy Shaha
 */
namespace WOOS\Common;

if (!class_exists('WOOSTransient')) {
	
	class WOOSTransient{
		/**
	    * Constructor
	    * Feature added by : Joy Shaha joysaha7302@gmail.com
	    * Date       : 22.04.2020
	    */
		public function woos_register()
		{
		add_action( "create_term", array( $this,  "woos_edit_product_term" ), 99, 3);
		add_action( "edit_term", array( $this,  "woos_edit_product_term" ), 99, 3);
		add_action( "delete_term", array( $this,  "woos_delete_product_term" ), 99, 4);
		add_action( "save_post", array( $this,  "woos_save_post_action" ), 99, 3);
		}
		/**
		 * Create and Edit Transient
		 * Feature added by : Joy Shaha joysaha7302@gmail.com
		 * Date : 22.04.2020
		*/
		public function woos_edit_product_term($term_id, $tt_id, $taxonomy) {
		    $term = get_term($term_id,$taxonomy);
		    if (!is_wp_error($term) && is_object($term)) {
		        $taxonomy = $term->taxonomy;
		        if ($taxonomy == "product_cat") {
		            delete_transient( 'product-categories-hierarchy' );
		        }
		    }
		}
		/**
		 * Delete Term
		 * Feature added by : Joy Shaha joysaha7302@gmail.com
		 * Date : 22.04.2020
		*/
		public function woos_delete_product_term($term_id, $tt_id, $taxonomy, $deleted_term) {
		    if (!is_wp_error($deleted_term) && is_object($deleted_term)) {
		        $taxonomy = $deleted_term->taxonomy;
		        if ($taxonomy == "product_cat") {
		            delete_transient( 'product-categories-hierarchy' );
		        }
		    }
		}
		/**
		 * Save
		 * Feature added by : Joy Shaha joysaha7302@gmail.com
		 * Date : 22.04.2020
		*/
		public function woos_save_post_action( $post_id ){
		 
		    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
		    if (!current_user_can( 'edit_page', $post_id ) ) return;
		 
		    $post_info = get_post($post_id);
		 
		    if (!is_wp_error($post_info) && is_object($post_info)) {
		        $content   = $post_info->post_content;
		        $post_type = $post_info->post_type;
		 
		        if ($post_type == "product"){
		            delete_transient( 'woos-product-categories' );
		        }
		    }
		 
		}
	}
}