<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @since      1.0.0
 * @package    TyresAddict/TyreFilter
 * @author     TyresAddict
 * @link       http://b2b.tyresaddict.com
 */


namespace TyresAddict\TyreFilter;


// The public-facing functionality of the plugin.

class PluginPublic 
{

	/**
	 * Filter products to match filter parameters | Woo
	 *
	 * @param array $meta_query Meta query.
	 * @return array
	 */
	public function woocommerce_product_query_meta_query( $meta_query = array() ) 
	{
		// set only in categories

		if ( PluginOptions::value('category') != '' && !Woo::product_category_of( PluginOptions::value('category') ) )
			return $meta_query;

		$meta_query = [];

		if ( Request::width() ) 
			$meta_query[] = [ 'relation' => 'AND', [ 'key' => 'width', 		'value' => Request::width(), 'compare' => '=' ] ];

		if ( Request::profile() ) 
			$meta_query[] = [ 'relation' => 'AND', [ 'key' => 'profile', 	'value' => Request::profile(), 'compare' => '=' ] ];
		
		if ( Request::r() ) 
			$meta_query[] = [ 'relation' => 'AND', [ 'key' => 'diameter', 	'value' => Request::r(), 'compare' => '=' ] ];
		
		if ( Request::season() && Request::season() != 'all' )
		{
			if ( strtolower( Request::season() ) == 'all season' )
				$meta_query[] = [ 'relation' => 'AND', [ 'key' => 'season', 'value'   => ['all season', 'allseason'], 'compare' => 'IN' ] ];
			else
				$meta_query[] = [ 'relation' => 'AND', [ 'key' => 'season', 'value'   => Request::season(), 'compare' => '=' ] ];
		}
		                            
		if ( Request::car_type() && Request::car_type() != 'all' )
			$meta_query[] = [ 'relation' => 'AND', [ 'key' => 'car_type', 	'value'   => Request::car_type(), 'compare' => '=' ] ];

		if ( Request::brand() && Request::brand() !== 'all' && Request::brand() !== ['all'] )
		{
		    if ( !is_array( Request::brand() ) )
				$meta_query[] = [ 'relation' => 'AND', [ 'key' => 'tyre_brand', 'value'   => Request::brand(), 'compare' => '=' ] ];
			else 
				$meta_query[] = [ 'relation' => 'AND', [ 'key' => 'tyre_brand', 'value'   => Request::brand(), 'compare' => 'IN' ] ];
		}

		return $meta_query;
	}
	
	

	// Enqueue styles

	public function enqueue_inline_styles_css()
	{
		if ( is_single() || is_page() ) {
			echo '<style type="text/css"><!-- TyresAddict Woo Filter CSS -->' . PluginOptions::value('custom_css') . '</style>';
		}
	}

	public function enqueue_styles() 
	{                                   
		wp_register_style( Plugin::name, plugins_url() . '/' . Plugin::name . '/public/css/filter-' . 'white' . '.css', [], Plugin::version, 'all' );
	}

	// Register the JavaScript for the public-facing side of the site.

	public function enqueue_scripts() 
	{                          
		wp_register_script( Plugin::name, plugins_url() . '/' . Plugin::name . '/public/js/taw-tyre-filter.js', [ 'jquery' ], Plugin::version, false );
	}

}
