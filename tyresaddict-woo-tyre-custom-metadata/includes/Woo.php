<?php

/**
 * WP & WooCommerce helpers
 *
 * @since      1.0.0
 * @package    TyresAddict/Filter
 * @subpackage TyresAddict/Filter/includes
 * @author     TyresAddict
 * @link       http://b2b.tyresaddict.com
 */

namespace TyresAddict\TCM;


class Woo
{
	static function top_product_categories()
	{
		$result = get_categories( [ 'taxonomy' => 'product_cat', 'parent' => 0 ] );
		$top = [];
		foreach( $result as $category )
		{
			$top[ $category->slug ] = $category->name;
		}
		return $top;
	}

	static function sub_category_names( $category_id )
	{
		$result = get_categories( [ 'taxonomy' => 'product_cat', 'parent' => $category_id ] );
		$categories = [];
		foreach( $result as $category )
		{
			$categories[] = $category->name;
		}
		return $categories;
	}

	static function meta_values( $key, $type = 'product', $status = 'publish' ) 
	{
		global $wpdb;
		
		if( empty( $key ) )
			return;

		$sql = "SELECT pm.meta_value 
				FROM {$wpdb->postmeta} pm
				LEFT JOIN {$wpdb->posts} p ON p.ID = pm.post_id
				WHERE pm.meta_key = '%s' 
					AND p.post_status = '%s' 
					AND p.post_type = '%s'
				GROUP BY pm.meta_value";

		$r = $wpdb->get_results( $wpdb->prepare( $sql, $key, $status, $type ) );

		$metas = [];
	    foreach ( $r as $my_r )
    	    $metas[] = $my_r->meta_value;

		sort($metas);
		return $metas;
	}

	static function allow_metabox( $type )
	{
		global $post;

		if ( PluginOptions::value($type . '_category') == '' )
			return true;

	    $product = wc_get_product( $post->ID );

    	if (false === $product)			// edit page
    		return false;
		
		$terms = get_the_terms( $product->get_id(), 'product_cat' );

    	if($terms === false) 			// new product
    		return false;	

		// fast test for root category
		
		$category_ids = $product->get_category_ids();

		if ( PluginOptions::value($type . '_category_id') != 0 && in_array( PluginOptions::value($type . '_category_id'), 	$category_ids ) )
			return true;
		
		// test for ancstors (todo: test check to root include)

		$viewed = [];
		foreach($terms as $term)
		{
			$ancestors = get_ancestors( $term->term_id, 'product_cat' );

			if ( !isset( $viewed[ end( $ancestors ) ] ) )
			{
				$top_term = get_term( end( $ancestors ), 'product_cat' );

				if ( empty( $top_term ) || is_wp_error( $top_term ) )
					continue;

				$viewed[ end( $ancestors ) ] = $top_term;

				if( $viewed[ end( $ancestors ) ]->slug == PluginOptions::value($type . '_category') )
					return true;
			}

			if ( $term->slug == PluginOptions::value($type . '_category') )
				return true;
		}

		return false;
	}

	static function cache( $key, $timeout, $func, ...$params)
	{
	    $value = get_transient( $key );

	    if ( false === $value )
	    {
			$value = $func( ...$params );
	        set_transient( $key, $value, $timeout );
		}

		return $value;
	}
}


