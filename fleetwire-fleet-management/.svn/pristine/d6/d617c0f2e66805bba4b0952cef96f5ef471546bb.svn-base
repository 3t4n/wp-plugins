<?php
/**
 * @wordpress-plugin
 * Plugin Name: Fleetwire Fleet Management Plugin
 * Description: Fleet management plugin for WordPress. Turn your website into a complete online rental store by connecting your Fleetwire.io account to WordPress.
 * Author: Fleetwire, LLC
 * Version: 1.0.13
 * Author URI: https://fleetwire.io
 * Copyright: 2024 Fleetwire, LLC
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

//
// Admin
//

// Include admin settings page
function fleetwire_admin() {
	include( 'admin/fleetwire_admin.php' );
}


function fleetwire_company_name_form_process() {
	if ( ! wp_verify_nonce( $_POST['fw_nonce'], 'fleetwire_company_name_form_process' ) ) {
		die( __( 'Security check' ) );
	}

	$company = sanitize_text_field( $_POST['fleetwire_company_name'] );
	update_option( 'fleetwire_company_name', $company );
	$response['message'] = 'Options saved.';
	wp_send_json( $response );
}


function fleetwire_admin_actions() {
	add_options_page( "Fleetwire", "Fleetwire", 'administrator', "Fleetwire", "fleetwire_admin" );
}

function fleetwire_admin_resources( $hook ) {
	// Load only on ?page=Fleetwire
	if ( $hook != 'settings_page_Fleetwire' ) {
		return;
	}
	wp_enqueue_style( 'fleetwire-admin', plugins_url( 'assets/fleetwire-admin.css', __FILE__ ) );
}


function fleetwire_admin_js() { ?>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#fleetwire_form').on('submit', function (e) {
                e.preventDefault();
                const companyUuid = $('.fleetwire-company-uuid').val();

                $.ajax({
                    type: 'POST',
                    url: "<?php echo admin_url( 'admin-ajax.php' ); ?>",
                    data: {
                        'fleetwire_company_name': companyUuid,
                        'fw_nonce': "<?php echo wp_create_nonce( 'fleetwire_company_name_form_process' ) ?>",
                        'action': 'fleetwire_company_name_form_process'
                    }, success: function (result) {
                        console.dir(result);
                        $('.fleetwire-card .updated').removeClass('fleetwire-d-none').addClass('fleetwire-d-block')
                    },
                    error: function () {
                        alert("error");
                    }
                });
            });
        });
    </script> <?php
}

function fleetwire_admin_settings_link( $links ) {
	$settings_link = '<a href="options-general.php?page=Fleetwire">' . __( 'Settings' ) . '</a>';
	array_unshift( $links, $settings_link );

	return $links;
}

function fleetwire_admin_notice() {
	global $hook_suffix;

	if ( in_array( $hook_suffix, array( 'jetpack_page_akismet-key-config', 'settings_page_akismet-key-config' ) ) ) {
		// This page manages the notices and puts them inline where they make sense.
		return;
	}

	if ( $hook_suffix == 'plugins.php' && trim( get_option( 'fleetwire_company_name' ) ) == false ) {
		include( 'admin/fleetwire_notice.php' );
	}
}

//
// Assets
//

// Load client script
function add_fleetwire_js() {
	$asset_url = 'https://' . get_option( 'fleetwire_company_name' ) . '.fleetwire.io/tenant/v2/fleetwire.js';
//    $asset_url = 'http://fleetwire.test/tenant/v2/fleetwire.js';
	wp_enqueue_script( 'fleetwire_v1', $asset_url, array(), '1.0.8', true );
}

// Insert client configuration
function add_fleetwire_client_configuration_js() {
	?>
    <script>window.fleetwireOptions = {
            company: '<?php echo get_option( 'fleetwire_company_name' ); ?>',
            storeProvider: 'wordpress'
        };</script>
	<?php
}

//
// fleetwire codes
//

// Convert shortcode options to data-{key}={value}
function fleetwire_shortcode_options_to_data( $options ) {
	return implode( ' ', array_map(
		function ( $v, $k ) {
			if ( ! empty( $v ) ) {
				return sprintf( "data-%s=\"%s\"", $k, $v );
			}
		},
		$options,
		array_keys( $options )
	) );
}

// fleetwire code for embedding a product
// [fleetwire_card id="l_PP4QD3PM"]
function fleetwire_card_bb( $params ) {
	$options = shortcode_atts( array(
		'id'        => null,
		'showprice' => null,
	), $params );

	return '<div class="fleetwire-listing-card" ' . fleetwire_shortcode_options_to_data( $options ) . '></div>';
}


// fleetwire code for embedding a product button
// [fleetwire_button id="l_PP4QD3PM"]
function fleetwire_button_bb( $params ) {
	$options = shortcode_atts( array(
		'id' => null
	), $params );

	return '<div class="fleetwire-product-button" ' . fleetwire_shortcode_options_to_data( $options ) . '></div>';
}

// fleetwire code for embedding a product detail view
// [fleetwire_detail id="l_PP4QD3PM"]
function fleetwire_detail_bb( $params ) {
	$options = shortcode_atts( array(
		'id' => null
	), $params );

	return '<div class="fleetwire-product-detail" ' . fleetwire_shortcode_options_to_data( $options ) . '></div>';
}

// fleetwire shortcode for embedding a vehicles number of doors
// [fleetwire_listing_doors id="l_PP4QD3PM"]
function fleetwire_vehicle_doors_bb( $params ) {
	$options = shortcode_atts( array(
		'id' => null
	), $params );

	return '<span class="fleetwire-listing-doors" ' . fleetwire_shortcode_options_to_data( $options ) . '></span>';
}

// fleetwire shortcode for embedding a vehicles number of seats
// [fleetwire_listing_seats id="l_PP4QD3PM"]
function fleetwire_vehicle_seats_bb( $params ) {
	$options = shortcode_atts( array(
		'id' => null
	), $params );

	return '<span class="fleetwire-listing-seats" ' . fleetwire_shortcode_options_to_data( $options ) . '></span>';
}


// fleetwire shortcode for embedding a vehicles feature list
// [fleetwire_listing_features id="l_PP4QD3PM"]
function fleetwire_vehicle_features_bb( $params ) {
	$options = shortcode_atts( array(
		'id' => null
	), $params );

	return '<span class="fleetwire-listing-features" ' . fleetwire_shortcode_options_to_data( $options ) . '></span>';
}

// fleetwire shortcode for embedding a vehicles reviews
// [fleetwire_listing_reviews id="l_PP4QD3PM"]
function fleetwire_vehicle_reviews_bb( $params ) {
	$options = shortcode_atts( array(
		'id'         => null,
		'showsource' => null,
	), $params );

	return '<span class="fleetwire-listing-reviews" ' . fleetwire_shortcode_options_to_data( $options ) . '></span>';
}

// fleetwire shortcode for embedding a vehicles image gallery
// [fleetwire_listing_image_gallery id="l_PP4QD3PM"]
function fleetwire_vehicle_image_gallery_bb( $params ) {
	$options = shortcode_atts( array(
		'id' => null,
	), $params );

	return '<span class="fleetwire-listing-image-gallery" ' . fleetwire_shortcode_options_to_data( $options ) . '></span>';
}

// fleetwire code for embedding a product list
// [fleetwire_list]
// [fleetwire_list tags="tablets"]
// [fleetwire_list categories="apple"]
function fleetwire_list_bb( $params ) {

	$options = shortcode_atts( array(
		'tags'        => null,
		'categories'  => null,
		'per'         => null,
		'limit'       => null,
		'show-search' => null,
		'showprice'   => null,
		'search-key'  => null
	), $params );

	return '<div class="fleetwire-listing-list" ' . fleetwire_shortcode_options_to_data( $options ) . '></div>';
}

// fleetwire code for embedding a product search
// [fleetwire_search]
// [fleetwire_search search-key="only-tablets"]
function fleetwire_search_bb( $params ) {
	$options = shortcode_atts( array(
		'search-key' => null
	), $params );

	return '<div class="fleetwire-product-search" ' . fleetwire_shortcode_options_to_data( $options ) . '></div>';
}

// fleetwire code for embedding an availability checker
// [fleetwire_availability]
// [fleetwire_availability data-show-location-picker="false"]
function fleetwire_availability( $params ) {
	$options = shortcode_atts( array(
		'data-show-location-picker' => null
	), $params );

	return '<div class="fleetwire-search" ' . fleetwire_shortcode_options_to_data( $options ) . '></div>';
}

// fleetwire code for datepicker
// [fleetwire_datepicker]
function fleetwire_datepicker_bb( $params ) {
	$options = shortcode_atts( array(), $params );

	return '<div class="fleetwire-datepicker" ' . fleetwire_shortcode_options_to_data( $options ) . '></div>';
}

add_shortcode( 'fleetwire_datepicker', 'fleetwire_datepicker_bb' );

// fleetwire code for embedding a cart button
// [fleetwire_cart_button]
function fleetwire_cart_button_bb( $params ) {
	$options = shortcode_atts( array(
		'href' => null
	), $params );

	return '<div class="fleetwire-cart-button" ' . fleetwire_shortcode_options_to_data( $options ) . '></div>';
}

// fleetwire code for embedding the embeddable cart
// [fleetwire_embeddable_cart]
function fleetwire_embeddable_cart_bb( $params ) {
	return '<div class="fleetwire-embeddable-cart"></div>';
}

// fleetwire code for embedding the embeddable cart lines
// [fleetwire_embeddable_cart_lines]
function fleetwire_embeddable_cart_lines_bb( $params ) {
	$options = shortcode_atts( array(
		'compact' => null
	), $params );

	return '<div class="fleetwire-embeddable-cart-lines" ' . fleetwire_shortcode_options_to_data( $options ) . '></div>';
}

// fleetwire code for embedding the embeddable cart sidebar
// [fleetwire_embeddable_cart_sidebar]
function fleetwire_embeddable_cart_sidebar_bb( $params ) {
	$options = shortcode_atts( array(
		'continue-shopping' => null,
		'datepicker'        => null
	), $params );

	return '<div class="fleetwire-embeddable-cart-sidebar" ' . fleetwire_shortcode_options_to_data( $options ) . '></div>';
}

// fleetwire code for embedding a sidebar with datepicker and categories
// [fleetwire_sidebar]
function fleetwire_sidebar_bb( $params ) {
	return '<div class="fleetwire-sidebar"></div>';
}

// fleetwire code for embedding a sorting select
// [fleetwire_sort]
// [fleetwire_sort search-key="only-tablets"]
function fleetwire_sort_bb( $params ) {
	$options = shortcode_atts( array(
		'search-key' => null
	), $params );

	return '<div class="fleetwire-sort" ' . fleetwire_shortcode_options_to_data( $options ) . '></div>';
}

// fleetwire code for embedding a bar with search and sorting select
// [fleetwire_bar]
// [fleetwire_bar search-key="only-tablets"]
function fleetwire_bar_bb( $params ) {
	$options = shortcode_atts( array(
		'search-key' => null,
	), $params );

	return '<div class="fleetwire-bar" ' . fleetwire_shortcode_options_to_data( $options ) . '></div>';
}

// fleetwire code for embedding a category list
// [fleetwire_categories]
// [fleetwire_categories search-key="only-tablets"]
function fleetwire_categories_bb( $params ) {
	$options = shortcode_atts( array(
		'search-key' => null
	), $params );

	return '<div class="fleetwire-categories" ' . fleetwire_shortcode_options_to_data( $options ) . '></div>';
}

// fleetwire code for embedding a listing description
// [fleetwire_categories]
// [fleetwire_categories search-key="only-tablets"]
function fleetwire_description_bb( $params ) {
	$options = shortcode_atts( array(
		'id'     => null,
		'length' => null,
	), $params );

	return '<div class="fleetwire-listing-description" ' . fleetwire_shortcode_options_to_data( $options ) . '></div>';
}

function fleetwire_initialize() {
	add_action( 'admin_menu', 'fleetwire_admin_actions' );
	add_action( 'admin_notices', 'fleetwire_admin_notice' );
	add_action( 'admin_enqueue_scripts', 'fleetwire_admin_resources' );
	add_action( 'wp_ajax_fleetwire_company_name_form_process', 'fleetwire_company_name_form_process' );


	$plugin = plugin_basename( __FILE__ );
	add_filter( "plugin_action_links_$plugin", 'fleetwire_admin_settings_link' );

	add_action( 'wp_enqueue_scripts', 'add_fleetwire_js' );
	add_action( 'wp_head', 'add_fleetwire_client_configuration_js' );
	add_action( 'admin_footer', 'fleetwire_admin_js' );


	add_shortcode( 'fleetwire_listing_card', 'fleetwire_card_bb' );
	add_shortcode( 'fleetwire_button', 'fleetwire_button_bb' );
	add_shortcode( 'fleetwire_product', 'fleetwire_button_bb' );
	add_shortcode( 'fleetwire_detail', 'fleetwire_detail_bb' );
	add_shortcode( 'fleetwire_list', 'fleetwire_list_bb' );
	add_shortcode( 'fleetwire_search', 'fleetwire_search_bb' );
	add_shortcode( 'fleetwire_availability', 'fleetwire_availability' );
	add_shortcode( 'fleetwire_cart_button', 'fleetwire_cart_button_bb' );
	add_shortcode( 'fleetwire_embeddable_cart', 'fleetwire_embeddable_cart_bb' );
	add_shortcode( 'fleetwire_embeddable_cart_sidebar', 'fleetwire_embeddable_cart_sidebar_bb' );
	add_shortcode( 'fleetwire_embeddable_cart_lines', 'fleetwire_embeddable_cart_lines_bb' );
	add_shortcode( 'fleetwire_sidebar', 'fleetwire_sidebar_bb' );
	add_shortcode( 'fleetwire_sort', 'fleetwire_sort_bb' );
	add_shortcode( 'fleetwire_bar', 'fleetwire_bar_bb' );
	add_shortcode( 'fleetwire_categories', 'fleetwire_categories_bb' );
	add_shortcode( 'fleetwire_listing_description', 'fleetwire_description_bb' );
	add_shortcode( 'fleetwire_listing_doors', 'fleetwire_vehicle_doors_bb' );
	add_shortcode( 'fleetwire_listing_seats', 'fleetwire_vehicle_seats_bb' );
	add_shortcode( 'fleetwire_listing_reviews', 'fleetwire_vehicle_reviews_bb' );
	add_shortcode( 'fleetwire_listing_image_gallery', 'fleetwire_vehicle_image_gallery_bb' );
	add_shortcode( 'fleetwire_listing_features', 'fleetwire_vehicle_features_bb' );
}

fleetwire_initialize();

?>
