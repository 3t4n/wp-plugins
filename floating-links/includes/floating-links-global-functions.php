<?php
/*
* Stop execution if someone tried to get file directly.
*/
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/*
* Get the social icons settings from DB
*/
if ( ! function_exists( 'fl_get_social_icons_settings' ) ) {
	function fl_get_social_icons_settings() {
		$fl_settings = get_option( 'fl_settings', false );
		if ( isset( $fl_settings['social_icons'] ) ) {
			$fl_social_icons_settings = $fl_settings['social_icons'];
		} else {
			$fl_social_icons_settings = array();
		}
		$fl_social_icons_settings = wp_parse_args( $fl_social_icons_settings, fl_social_icons_defaults() );

		if ( isset( $fl_social_icons_settings['networks'] ) ) {
			$fl_social_networks = $fl_social_icons_settings['networks'];
		} else {
			$fl_social_networks = fl_social_networks_defaults();
		}
		//      $fl_social_networks = wp_parse_args( $fl_social_networks, fl_social_networks_defaults() );

		$fl_social_icons_settings['networks'] = $fl_social_networks;

		return $fl_social_icons_settings;
	}
}

/*
* Create default array of social icons
*/
if ( ! function_exists( 'fl_social_icons_defaults' ) ) {
	function fl_social_icons_defaults() {
		$defaults = array(
			'enable_minimizer' => 'on',
			'type'             => 'bar',
			'bar_position'     => 'left',
		);
		return apply_filters( 'fl_social_icons_defaults', $defaults );
	}
}

/*
* Create default array of social icons
*/
if ( ! function_exists( 'fl_social_networks_defaults' ) ) {
	function fl_social_networks_defaults() {

		$defaults = array(
			'facebook' => array(
				'id'      => 'facebook',
				'name'    => 'Facebook',
				'icon'    => 'fa fa-facebook',
				'enabled' => 'on',
			),
			'twitter'  => array(
				'id'      => 'twitter',
				'name'    => 'X (Twitter)',
				'icon'    => 'fa fa-twitter',
				'enabled' => 'on',
			),
			'linkedin' => array(
				'id'      => 'linkedin',
				'name'    => 'Linkedin',
				'icon'    => 'fa fa-linkedin',
				'enabled' => 'on',
			),
		);

		return apply_filters( 'fl_social_networks_defaults', $defaults );

	}
}

/*
* Create social sharing link
*/
if ( ! function_exists( 'fl_social_share_url' ) ) {
	function fl_social_share_url( $network ) {

		$fl_social_share_url = '';

		$fl_permalink = ( class_exists( 'WooCommerce' ) && is_checkout() || fl_is_homepage() ) ? get_bloginfo( 'url' ) : get_permalink();

		if ( class_exists( 'BuddyPress' ) && is_buddypress() ) {

			$fl_permalink = bp_get_requested_url();
		}

		$fl_permalink = rawurlencode( $fl_permalink );

		$title = class_exists( 'WooCommerce' ) && is_checkout() || fl_is_homepage() ? get_bloginfo( 'name' ) : get_the_title();

		$title = rawurlencode( wp_strip_all_tags( html_entity_decode( $title, ENT_QUOTES, 'UTF-8' ) ) );

		switch ( $network ) {

			case 'facebook':
				$fl_social_share_url = add_query_arg(
					array(
						'u' => $fl_permalink,
						't' => $title,
					),
					'http://www.facebook.com/sharer.php'
				);

				break;

			case 'twitter':
				$fl_social_share_url = add_query_arg(
					array(
						'text' => $title,
						'url'  => $fl_permalink,
					),
					'http://twitter.com/share'
				);

				break;

			case 'linkedin':
				$fl_social_share_url = add_query_arg(
					array(
						'mini'  => 'true',
						'url'   => $fl_permalink,
						'title' => $title,
					),
					'http://www.linkedin.com/shareArticle'
				);

				break;

			default:
				$fl_social_share_url = add_query_arg(
					array(
						'u' => $fl_permalink,
						't' => $title,
					),
					'http://www.facebook.com/sharer.php'
				);
				break;
		}

		return $fl_social_share_url;

	}
}


/*
* Check if home or frontpage
*/
if ( ! function_exists( 'fl_is_homepage' ) ) {
	function fl_is_homepage() {

		return is_front_page() || is_home();
	}
}

if ( ! function_exists( 'fl_get_customizer_url' ) ) {
	/**
	 * Get the customizer url
	 *
	 *
	 * @return string
	 * @since 1.0.0
	 */
	function fl_get_customizer_url() {

		$url          = null;
		$recent_posts = wp_get_recent_posts( array( 'posts_per_page' => 1 ) );

		if ( isset( $recent_posts['0'] ) ) {
			$first_post_url = get_permalink( $recent_posts['0']['ID'] );
			$url            = add_query_arg(
				array(
					'url'              => urlencode( $first_post_url ),
					'autofocus[panel]' => 'fl_customizer_panel',
				),
				admin_url( 'customize.php' )
			);
		}
		return $url;
	}
}

if ( ! function_exists( 'fl_get_sort_order' ) ) {
	/**
	 * Get the sort order
	 *
	 *
	 * @return string
	 * @since 1.0.0
	 */
	function fl_get_sort_order( $module = 'links' ) {

		$settings   = get_option( 'fl_settings', false );
		$sort_order = 'fl_next,fl_prev,fl_random,fl_top,fl_bottom,fl_home,fl_copy_url';

		if ( $module == 'links' && isset( $settings['fl_sort'] ) && ! empty( $settings['fl_sort'] ) ) {
			$sort_order = $settings['fl_sort'];
		}

		$array = explode( ',', $sort_order );

		// Find the key and remove 'fl_minimizer'
		if ( ( $key = array_search( 'fl_minimizer', $array ) ) !== false ) {
			unset( $array[ $key ] );
		}

		// Convert array back to string
		$sort_order = implode( ',', $array );

		if ( $module == 'social' ) {
			if ( isset( $fl_settings['social_icons']['sort'] ) && ! empty( $fl_settings['social_icons']['sort'] ) ) {
				$sort_order = $fl_settings['social_icons']['sort'];
			} else {
				$sort_order = 'facebook,twitter,linkedin';
			}
		}
		return $sort_order;
	}
}
