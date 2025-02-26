<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Food_Online_Shortcode {

	protected static $_instance = null;

	protected $is_active = false;


	public static $categories_raw;

	public function __construct() {


		add_shortcode( 'foodonline', array( $this, 'shortcode' ) );



	}

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}



public function shortcode( $atts ) {

if ( $this->is_active && get_option('fdoe_force_shortcode','no')=='no') {
			return;
		}
if (is_admin() || (is_user_logged_in() && !isset(WC()->session))) {
			return;
		}


		$this->is_active = true;

		$options = shortcode_atts( array(
			'categories'         => null,
			'tags'               => null,
			'orderby'               => null,
			'order'               => null,
			'ids'               => null,


		), $atts );

		$orderby = empty($options['orderby']) ? "title" : $options['orderby']  ;
		if(wc_clean($options['orderby']) == 'price'){

		add_filter( 'woocommerce_shortcode_products_query', array($this, 'price_sorting') );
		$options['orderby'] == '';
		}
		$ids = empty($options['ids']) ? '' : 'ids='.$options['ids'];

		$order = empty($options['order']) ? '' : 'order="'.$options['order'].'"'  ;
		$tags = empty($options['tags']) ? '' : 'tag="'.$options['tags'].'"'  ;
		$cats = empty ($options['categories']) ? false : 'category="'. $options['categories'] .'"' ;
		$cats_array = [];
		$cats_array_slug = [];
				if($cats !== false ){
		$pieces = explode(",", $options['categories']);

		foreach ($pieces as $piece ){

			$category = get_term_by( 'name', $piece, 'product_cat' );
			if($category !== false){
			$cat_id = $category->term_id;
			$cats_array[] = $cat_id;
			$cats_array_slug[] = $category->slug;
			}else{
				$piece = str_replace(' ', '', $piece);
				$category = get_term_by( 'slug', $piece, 'product_cat' );
				$cat_id = $category->term_id;
			$cats_array[] = $cat_id;
			$cats_array_slug[] = $category->slug;
			}

		}

			if( get_option('fdoe_is_prem','no') == 'no' && !empty(Food_Online::get_all_categories() )){

					$cats2 = Food_Online::get_all_categories();
					$cats_array_2 = array_column($cats2,'cat_ID');
				// Fix for PHP 7.0.32-33 where array_column is broken
			if(empty($cats_array_2) && is_array($cats2) ):
				$cats_array_2 = array_map(function ($each) {

					return $each->cat_ID;
					}, $cats2);
				endif;

				$cats_array = array_intersect($cats_array_2, $cats_array );
			}

			$cats = 'category="'. implode(',',$cats_array ) .'"';

		}

				self::set_category_objects($cats_array);
		$locs = array(
					  'cats' => self::get_category_objects(),
					  );

		wp_localize_script( 'fdoe-order', 'fdoe_short', $locs );


		ob_start();

		$pp  = 999;
		$l = 'limit='.$pp;

		$shortcode_string = '[products '.$cats.' '.$tags.' '.$l.' orderby="'.$orderby.'" ' . $order .' ' . $ids .' ]';


		echo do_shortcode($shortcode_string);

		$content = ob_get_clean();




		return ($content);
	}

function price_sorting( $args) {

		$args['orderby'] = 'meta_value_num';
	//	$args['order'] = 'asc';
		$args['meta_key'] = '_price';

	return $args;
}
	public static function set_category_objects($cats_array) {
			if (!isset(self::$categories_raw)) {


				$taxonomy       = 'product_cat';
				$orderby        = 'include';//'name';
				$show_count     = 0; // 1 for yes, 0 for no
				$pad_counts     = 0; // 1 for yes, 0 for no
				$hierarchical   = 1; // 1 for yes, 0 for no
				$title          = '';
				$empty          = 0;
				$fields         = 'all';
				$includes = $cats_array;
				$args           = array(
					'taxonomy'                => $taxonomy,
					'orderby'                => $orderby,
					'show_count'                => $show_count,
					'pad_counts'                => $pad_counts,
					'hierarchical'                => $hierarchical,
					'title_li'                => $title,
					'hide_empty'                => $empty,
					'fields'                => $fields,
					'include' => $includes,
				);
				self::$categories_raw = get_categories($args);


				$do_image = (get_option('fdoe_is_prem', 'no') == 'yes' && get_option('fdoe_cat_image', 'no') == 'yes') ? true : false;
					foreach (self::$categories_raw as $fdoe_cat) {
						$term_children  = get_term_children(filter_var($fdoe_cat->term_id, FILTER_VALIDATE_INT) , filter_var('product_cat', FILTER_SANITIZE_STRING));
						$parent_count       = 0;
						$fdoe_cat->image    = false;

						$has_sub        = true;
						if (empty($term_children) || is_wp_error($term_children)) {
							$has_sub        = false;

						}else{
							foreach ($term_children as $child_cat) {
								$child = get_term($child_cat, 'product_cat');
							$parent_count       = $parent_count + $child ->count;

						}

						}
						$fdoe_cat->category_count_not_children = $fdoe_cat->category_count - $parent_count ;
						$fdoe_cat->has_sub         = $has_sub;

						if ($do_image){
							$thumbnail_id   = get_term_meta($fdoe_cat->term_id, 'thumbnail_id', true);
						$image          = wp_get_attachment_url($thumbnail_id);
						$fdoe_cat->image           = $image;
						}
					}

			}
			return;
		}
		// Return product categories
		public static function get_category_objects() {
			return self::$categories_raw;
		}
}
