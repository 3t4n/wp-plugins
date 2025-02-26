<?php
/*
Plugin Name: List Children
Author: theandystratton
Author URI: http://theandystratton.com
Version: 2.1
Description: Use a shortcode to list all child or sibling pages of the current page displayed.
*/
class ListChildren
{
	private static $instance;
	
	public static function init()
	{
		null === self::$instance && self::$instance = new self();
		return self::$instance;
	}
	
	private function __construct()
	{
		// supported
		\add_shortcode( 'list_children', [ $this, 'list_children' ] );
		\add_shortcode( 'list_siblings', [ $this, 'list_siblings' ] );
	}
	
	public function list_children( $atts )
	{
		$params = \shortcode_atts(array(
			'parent' => 0,
			'sort_column' => 'menu_order, post_title',
			'sort_order' => 'ASC',
			'depth' => 1,
			'title_li' => '',
			'include' => null,
			'exclude' => null,
			'date_format' => \get_option( 'date_format' ),
			'link_before' => '',
			'link_after' => '',
			'authors' => null,
			'offset' => 0,
			'post_type' => \get_post_type()
		), $atts);
		
		if ( !$params['parent'] )
			$params['parent'] = \get_the_ID();
		
		$params['echo'] = false;
		
		return \wp_list_pages( $params );
	}
	
	public function list_siblings( $atts )
	{	
		if ( !\is_array( $atts ) ) $atts = [];

		if ( isset( $atts['post_id'] ) && $atts['post_id'] )
			$post = \get_post( (int) $atts['post_id'] );
		else
			$post = $GLOBALS['post'];
			
		if ( !isset( $atts['exclude_me'] ) || \strtolower( $atts['exclude_me'] ) != 'false' )
		{
			if ( !isset( $atts['exclude'] ) )
				$atts['exclude'] = $post->ID ?? false;
			else
				$atts['exclude'] .= ',' . ( $post->ID ?? 0 );
		}
		
		$atts['parent'] = $post->post_parent;

		return $this->list_children( $atts );
	}
	
}

ListChildren::init();