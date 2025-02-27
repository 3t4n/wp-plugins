<?php

namespace GS_BOOKS;

defined( 'ABSPATH' ) || exit;

function is_pro_active() {
    require_once ABSPATH . 'wp-admin/includes/plugin.php';
    return defined( "GS_BOOKS_PRO_VERSION" ) && is_plugin_active( GS_BOOKS_PRO_PLUGIN );
}

function gs_appsero_init() {

	if ( ! class_exists( 'GSBookAppSero\Client' ) ) {
		require_once GS_BOOKS_PLUGIN_DIR . '/includes/appsero/Client.php';
	}

	$client = new \GSBookAppSero\Client(
		'f8265887-01c2-4841-9716-d45eed199345',
		__( 'GS Books Showcase', 'gsbookshowcase' ),
		GS_BOOKS_PLUGIN_FILE
	);

	// Active insights
	$client->insights()->init();
	
} 

function gsbooks_get_shortcode_params( $settings ) {

    $params = [];

    foreach( $settings as $key => $val ) {
        if ( gettype($val) == 'array' ) {
            $val = implode(',', $val);
        }
        $params[] = $key.'="'.$val.'"';
    }

    return implode( ' ', $params );

}

function get_settings( $atts = array() ) {
    return shortcode_atts( apply_filters( 'gsbookshowcase_shortcode_attributes', plugin()->builder->get_shortcode_default_settings() ), $atts );
}

function get_shortcodes() {
	return plugin()->builder->_get_shortcodes( null, false, true );
}

function get_carousel_settings( $settings ) {

	$getDatas                           = array();
	$getDatas['speed']                  = intval( $settings['speed'] );
	$getDatas['isAutoplay']             = wp_validate_boolean( $settings['isAutoplay'] );
	$getDatas['autoplay_delay']         = intval( $settings['autoplay_delay'] );
	$getDatas['loop']        		    = wp_validate_boolean( $settings['infinite_loop']  );
	// $getDatas['reverseDirection']       = false;
	$getDatas['pause_on_hover']         = wp_validate_boolean( $settings['pause_on_hover'] );
	$getDatas['navs']                   = wp_validate_boolean( $settings['gsb_slider_navs'] );
	$getDatas['dots']                   = wp_validate_boolean( $settings['gsb_slider_dots'] );
	$getDatas['desktop_columns']        = intval( $settings['columns'] );
	$getDatas['tablet_columns']         = intval( $settings['columns_tablet'] );
	$getDatas['mobile_columns']         = intval( $settings['columns_mobile_portrait'] );
	$getDatas['columns_small_mobile']   = intval( $settings['columns_mobile'] );
	$getDatas['carousel_navs_style']    = sanitize_key( $settings['gsb_navs_style'] );
	$getDatas['carousel_dots_style']    = sanitize_key( $settings['gsb_dots_style'] );
	$getDatas['gsb_navs_pos']           = sanitize_key( $settings['gsb_navs_pos'] );
	$getDatas['reverseDirection'] 		= wp_validate_boolean( $settings['reverse_direction'] );
	$getDatas['slidesPerGroup'] 		= intval( $settings['slides_per_group'] );

	return $getDatas;
}

function is_divi_active() {
	if ( ! defined( 'ET_BUILDER_PLUGIN_ACTIVE' ) || ! ET_BUILDER_PLUGIN_ACTIVE ) {
		return false;
	}
	return et_core_is_builder_used_on_current_request();
}

function is_divi_editor() {
	if ( ! empty( $_POST['action'] ) && $_POST['action'] == 'et_pb_process_computed_property' && ! empty( $_POST['module_type'] ) && $_POST['module_type'] == 'gs_testimonial_slider' ) {
		return true;
	}
}

function get_all_groups( array $exclude_group, $settings ) {

	$args = array(
		'taxonomy'   => 'bookshowcase_group',
		'orderby'    => $settings['group_order_by'] ?? 'name',
		'order'      => $settings['group_order'] ?? 'DESC',
		'hide_empty' => true,
	);
	
	// add_filter('get_terms_orderby', function ($orderby, $args) {
	// 	if (isset($args['orderby']) && $args['orderby'] === 'term_order') {
	// 		return 't.term_order';
	// 	}
	// 	return $orderby;
	// }, 10, 2);
	
	$groups = get_terms($args);
	
	// remove_filter('get_terms_orderby', '__anonymous_function__');	

	$all_groups = wp_list_pluck( $groups, 'slug' );
	$all_groups = array_diff( $all_groups, $exclude_group ); 

	return $all_groups;
}

function get_all_tags( $term_name, array $exclude_group ) {
	
	$tags = get_terms(
		array(
			'taxonomy'   => $term_name,
			'orderby'    => 'name',
			'order'      => 'ASC',
			'hide_empty' => true,
		)
	);	

	$all_tags = wp_list_pluck( $tags, 'slug' );
	$all_tags = array_diff( $all_tags, $exclude_group ); 

	return $all_tags;
}

function add_tax_query( &$queryArgs, $taxonomy, $terms, $operator = 'IN' ) {
    if (!empty($terms)) {
        $queryArgs['tax_query'][] = array(
            'taxonomy' => $taxonomy,
            'field'    => 'slug',
            'terms'    => $terms,
            'operator' => $operator,
        );
    }
}

function minimize_css_simple( $css ) {
    // https://datayze.com/howto/minify-css-with-php
    $css = preg_replace('/\/\*((?!\*\/).)*\*\//', '', $css); // negative look ahead
    $css = preg_replace('/\s{2,}/', ' ', $css);
    $css = preg_replace('/\s*([:;{}])\s*/', '$1', $css);
    $css = preg_replace('/;}/', '}', $css);
    return $css;
}

function gs_wp_kses( $content ) {

	$allowed_tags = wp_kses_allowed_html( 'post' );

	$input_common_atts = array(
		'class'       => true,
		'id'          => true,
		'style'       => true,
		'novalidate'  => true,
		'name'        => true,
		'width'       => true,
		'height'      => true,
		'data'        => true,
		'title'       => true,
		'placeholder' => true,
		'value'       => true,
	);

	$allowed_tags = array_merge_recursive(
		$allowed_tags,
		array(
			'select' => $input_common_atts,
			'input'  => array_merge(
				$input_common_atts,
				array(
					'type'    => true,
					'checked' => true,
				)
			),
			'option' => array(
				'class'    => true,
				'id'       => true,
				'selected' => true,
				'data'     => true,
				'value'    => true,
			),
		)
	);

	return wp_kses( stripslashes_deep( $content ), $allowed_tags );
}

function select_builder( $name, $options, $selected = '', $selecttext = '', $class = '', $optionvalue = 'value' ) {

	if ( is_array( $options ) ) {

		$select_html = sprintf( '<select name="%1$s" class="%2$s">', esc_attr( $name ), esc_attr( $class ) );

		if ( $selecttext ) {
			$select_html .= sprintf( '<option value="">%s</option>', esc_html( $selecttext ) );
		}

		foreach ( $options as $key => $option ) {
			$value        = $optionvalue == 'value' ? $option : $key;
			$is_selected  = $value == $selected ? 'selected="selected"' : '';
			$select_html .= sprintf( '<option value="%s" %s>%s</option>', esc_attr( $value ), $is_selected, esc_html( $option ) );
		}

		$select_html .= '</select>';
		echo gs_wp_kses( $select_html );
	}
}

function getoption( $option, $default = '' ) {
    $prefs = plugin()->builder->_get_shortcode_pref( false );
    return isset($prefs[$option]) ? $prefs[$option] : $default;
}

/**
 * Plugins action links
 */
function add_pro_link( $links ) {
    if ( ! is_pro_active() ) {
        $links[] = '<a style="color: red; font-weight: bold;" class="gs-pro-link" href="https://www.gsplugins.com/product/gs-books-showcase/" target="_blank">Go Pro!</a>';
    }
    $links[] = '<a href="https://www.gsplugins.com/wordpress-plugins" target="_blank">GS Plugins</a>';
    return $links;
}

/**
 * On Activation
 */
function on_activation() {
}

/**
 * On Deactivation
 */
function on_deactivation() {
}

/**
 * Compatibility check with Pro plugin
 */
function is_pro_compatible() {
    require_once ABSPATH . 'wp-admin/includes/plugin.php';
    if ( defined('GS_BOOKS_PRO_VERSION') && is_plugin_active( GS_BOOKS_PRO_PLUGIN ) ) {
        if ( version_compare( GS_BOOKS_PRO_VERSION, GS_BOOKS_MIN_PRO_VERSION, '<' ) ) {
            add_action( 'admin_notices', 'GS_BOOKS\pro_compatibility_notice' );
            return false;
        }
    }
    return true;
}

/**
 * Upgrade notice if compatibility fails
 */
function pro_compatibility_notice() {

    $screen = get_current_screen();
    
    if ( isset( $screen->parent_file ) && 'plugins.php' === $screen->parent_file && 'update' === $screen->id ) return;
    if ( 'update' === $screen->base && 'update' === $screen->id ) return;

    if ( ! current_user_can( 'update_plugins' ) ) return;

    $upgrade_url = wp_nonce_url( self_admin_url( 'update.php?action=upgrade-plugin&plugin=' . GS_BOOKS_PRO_PLUGIN ), 'upgrade-plugin_' . GS_BOOKS_PRO_PLUGIN );
    $message = '<p>' . __( 'GS Books Showcase is not working because you need to upgrade the GS Books Showcase Pro plugin to latest version.', 'gsbookshowcase' ) . '</p>';
    $message .= '<p>' . sprintf( '<a href="%s" class="button-primary">%s</a>', $upgrade_url, __( 'Upgrade GS Books Showcase Pro Now', 'gsbookshowcase' ) ) . '</p>';

    echo '<div class="error"><p>' . $message . '</p></div>';
    
}

/**
 * Plugins Load Text Domain
 */
function gs_load_textdomain() {
    load_plugin_textdomain( 'gsbookshowcase', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}

function wp_get_attachment_image_no_srcset($attachment_id, $size = 'thumbnail', $icon = false, $attr = '') {
    // add a filter to return null for srcset
    add_filter( 'wp_calculate_image_srcset_meta', '__return_null' );
    // get the srcset-less img html
    $html = wp_get_attachment_image($attachment_id, $size, $icon, $attr);
    // remove the above filter
    remove_filter( 'wp_calculate_image_srcset_meta', '__return_null' );
    return $html;
}