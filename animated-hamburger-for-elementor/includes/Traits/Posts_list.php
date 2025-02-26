<?php

namespace CliccheWidgetsForElementor\Traits;

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

trait Posts_list
{
    // Get all Elementor Popups
	protected function cliccheGetPopups( )
	{
		
			$options = [];
			
			$options[''] = __( 'Choose a popup', 'clicche-elementor' );
			
			$post_list = get_posts(array(
				'lang' => '',
				'post_type' => 'elementor_library',
				'meta_query' => array(
					array(
						'key' => '_elementor_template_type',
						'value' => 'popup',
					),
				),
			));

			if (!empty($post_list) && !is_wp_error($post_list)) {
				foreach ($post_list as $post) {
					$options[ $post->ID ] =  $post->post_title;
				}
			}        
		
			return $options;				
		
	}
	//We generate the action url based on popup id and needed action (open)
	//using the Elementor tools
	protected function generateActionUrl( $action, $id ) 
	{
		
			$url = '';

			// Generate the URL based on its action using the native Elementor's function.
			switch ( $action ) {
				case 'close':
				case 'close-forever':
					$url = \Elementor\Plugin::instance()->frontend->create_action_hash(
						'popup:close',
						array(
							'do_not_show_again' => 'close-forever' === $action ? 'yes' : '',
						)
					);
					break;
				
				case 'open':
				case 'toggle':
				default:
					$url = \Elementor\Plugin::instance()->frontend->create_action_hash(
						'popup:open',
						array(
							'id'     => strval( $id ),
							'toggle' => 'toggle' === $action,
						)
					);
					break;
			}

			// Revert back the encoded "%23" to "#" to prevent WordPress automatically adding "http://" prefix in the URL.
			// This also works as a fallback compatibility for the old version.
			//$url = str_replace( '%23', '#', $url );

			return $url;
	}

  
}
