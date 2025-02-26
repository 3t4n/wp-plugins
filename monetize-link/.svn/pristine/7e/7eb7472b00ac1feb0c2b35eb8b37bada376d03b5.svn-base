<?php
namespace MonetizeLinkPlugin;

function mlp_plugin_set_link( $link, $string )
{
	if ( ! $link ) {
		$link = '#';
	}

	if ( $link === 'popup' ) {
		$replace = '<a class="takeads-btn" data-action="' . esc_attr__( $link ) . '"';
	} else {
		$replace = '<a href="' . esc_url( $link ) . '" target="_blank"';
	}

	return str_replace( '<a', $replace, $string );
}

function mlp_plugin_delete_options()
{
	if ( ! is_multisite() ) {
		delete_option( MLP_Config::OPTION );
	} else {
		global $wpdb;

		$blog_ids         = $wpdb->get_col( "SELECT blog_id FROM $wpdb->blogs" );
		$original_blog_id = get_current_blog_id();

		foreach ( $blog_ids as $blog_id )   {
			switch_to_blog( $blog_id );
			delete_site_option( MLP_Config::OPTION );
		}

		switch_to_blog( $original_blog_id );
	}
}