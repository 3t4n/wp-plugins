<?php
/**
 * @package  WooSearch
 * @developer  name : Joy Shaha
 */
namespace WOOS\Library;

if (!class_exists('WOOSGetFunction')) {

	class WOOSGetFunction {
		
	
    	/**
		* Setting Data
		* Feature added by : Joy Shaha joysaha7302@gmail.com
		* Date       : 22.04.2020
		*/
    	public static function woos_last_code_get_settings( $name ) {
	        $plugin_option = get_option( 'woos_setting_data' ) ? : array();
			$return_value = isset( $plugin_option[1][ $name ] ) ? $plugin_option[1][ $name ] : '';
	        return $return_value;
	    }
		/**
		* Post Table
		* Feature added by : Joy Shaha joysaha7302@gmail.com
		* Date       : 22.04.2020
		*/
		public static function woos_last_code_post_table(){
			global $wpdb;
			return $wpdb->prefix . "posts";
		}
		/**
		* term_relationships Table
		* Feature added by : Joy Shaha joysaha7302@gmail.com
		* Date       : 22.04.2020
		*/
		public static function woos_last_code_term_relationships(){
			global $wpdb;
			return $wpdb->prefix . "term_relationships";
		}
		/**
		* term_taxonomy Table
		* Feature added by : Joy Shaha joysaha7302@gmail.com
		* Date       : 22.04.2020
		*/
		public static function woos_last_code_term_taxonomy(){
			global $wpdb;
			return $wpdb->prefix . "term_taxonomy";
		}
		/**
		* terms Table
		* Feature added by : Joy Shaha joysaha7302@gmail.com
		* Date       : 22.04.2020
		*/
		public static function woos_last_code_terms(){
			global $wpdb;
			return $wpdb->prefix . "terms";
		}
		/**
		* postmeta Table
		* Feature added by : Joy Shaha joysaha7302@gmail.com
		* Date       : 22.04.2020
		*/
		public static function woos_last_code_postmeta(){
			global $wpdb;
			return $wpdb->prefix . "postmeta";
		}
		/**
		* Content Short
		* Feature added by : Joy Shaha joysaha7302@gmail.com
		* Date       : 23.04.2020
		*/
		public static function woos_last_code_shorten_text($text , $no_of__limit){
	       	$chars_limit = $no_of__limit;
			$chars_text = strlen($text);
			$text = $text." ";
			$text = substr($text,0,$chars_limit);
			$text = substr($text,0,strrpos($text,' '));
			if ($chars_text > $chars_limit)
			{

				$text = $text."...";

			}
			return $text;
	    }
		/**
		 * Product taxonomy hierarchy
		 * @return string
		 * Feature added by : Joy Shaha <joysaha7302@gmail.com>
		 * Date : 22.04.2020
		*/
		public static function woos_last_code_get_taxonomy_hierarchy( $taxonomy, $parent = 0, $exclude = 0) {
		    $taxonomy = is_array( $taxonomy ) ? array_shift( $taxonomy ) : $taxonomy;
		    $terms = get_terms( $taxonomy, array( 'parent' => $parent, 'hide_empty' => false, 'exclude' => $exclude) );
		 
		    $children = array();
		    foreach ( $terms as $term ){
		        $term->children = self::woos_last_code_get_taxonomy_hierarchy( $taxonomy, $term->term_id, $exclude);
		        $children[ $term->term_id ] = $term;
		    }
		    return $children;
		}
		/**
		 * Product list taxonomy hierarchy no instance
		 * @return string
		 * Feature added by : Joy Shaha <joysaha7302@gmail.com>
		 * Date : 22.04.2020
		*/
		public static function woos_last_code_list_taxonomy_hierarchy_no_instance( $taxonomies ) {
			$tax = '';
		     foreach ( $taxonomies as $taxonomy ) { 
		     $children = $taxonomy->children; 
		     $tax .= '<option value="'.esc_attr($taxonomy->term_id).'">'.esc_html__($taxonomy->name, 'woosearch').'</option>';
		      if (is_array($children) && !empty($children)){
		         $tax .= '<optgroup label="'.esc_html__($taxonomy->name, 'woosearch').'">';
		         $tax .= self::woos_last_code_list_taxonomy_hierarchy_no_instance($children); 
		         $tax .= '</optgroup>';
		       }
		   	}
		   	return $tax;
		}
		/**
		 * Product categories hierarchy
		 * @return string
		 * Feature added by : Joy Shaha <joysaha7302@gmail.com>
		 * Date : 22.04.2020
		*/
		public static function woos_last_code_product_categories_hierarchy() {
 
		    if ( false === ( $categories = get_transient( 'product-categories-hierarchy' ) ) ) {
		 
		        $categories = self::woos_last_code_get_taxonomy_hierarchy( 'product_cat', 0, 0);

		        if ( ! empty( $categories ) ) {
		            $categories = base64_encode( serialize( $categories ) );
		            set_transient( 'product-categories-hierarchy', $categories, apply_filters( 'null_categories_cache_time', 0 ) );
		        }
		    }
		 
		    if ( ! empty( $categories ) ) {
		 
		        return unserialize( base64_decode( $categories ) );
		 
		    } else {
		 
		        return new WP_Error( 'no_categories', esc_html__( 'No categories.', 'woosearch' ) );
		 
		    }
		}
	}
}