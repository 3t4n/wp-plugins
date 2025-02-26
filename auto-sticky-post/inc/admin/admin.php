<?php

defined( 'ABSPATH' ) or	die( 'Cheatin\' uh?' );

/**
 * Link to the configuration page of the plugin
 *
 * Since 1.0
 *
 */

add_filter( 'plugin_action_links_'.plugin_basename( jlasp_FILE ), 'jlasp_settings_action_links' );
function jlasp_settings_action_links( $actions )
{
    array_unshift( $actions, '<a href="' . admin_url( 'options-general.php?page=auto-sticky-post' ) . '">' . __( 'Settings' ) . '</a>' );
    return $actions;
}


/**
 * Add some informations about authors in plugins list area
 *
 * Since 1.0
 *
 */

add_filter( 'plugin_row_meta', 'jlasp_plugin_row_meta', 10, 2 );
function jlasp_plugin_row_meta( $plugin_meta, $plugin_file )
{
	if( plugin_basename( jlasp_FILE ) == $plugin_file ):
		$last = end( $plugin_meta );
		$plugin_meta = array_slice( $plugin_meta, 0, -2 );
		$a = array();
		$authors = array(
			array( 	'name'=>'LIJE Creative', 'url'=>'http://www.lije-creative.com' ),
		);
		foreach( $authors as $author )
			$a[] = '<a href="' . $author['url'] . '" title="' . esc_attr__( 'Visit author homepage' ) . '">' . $author['name'] . '</a>';
		$a = sprintf( __( 'By %s' ), wp_sprintf( '%l', $a ) );
		$plugin_meta[] = $a;
		$plugin_meta[] = $last;
	endif;
	return $plugin_meta;
}