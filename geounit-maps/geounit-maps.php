<?php

/**
* Plugin Name:       GDPR & DSGVO Compliant Maps | GeoUNIT Maps
* Description:       This plugin adds a Gutenberg block to display gdpr compliant maps from GeoUNIT servers. No 2 click or cookie consent tools needed 
* Version:           0.1.2
* Requires at least: 5.5
* Requires PHP:      7.0
* Author:            Unit08
* Author URI:        https://unit08.de/
* License:           GPL v3
* License URI:       https://www.gnu.org/licenses/gpl-3.0.html
* 
*/
//  Exit if accessed directly.
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
define( 'GEOUNITMAPSDIR', __DIR__ );
define( 'GEOUNITMAPSURL', plugin_dir_url( __FILE__ ) );
if ( function_exists( 'geounit_maps' ) ) {
    geounit_maps()->set_basename( false, __FILE__ );
} else {
    if ( !function_exists( 'geounit_maps' ) ) {
        // ... Freemius integration snippet ...
        function geounit_maps() {
            global $geounit_maps;
            if ( !isset( $geounit_maps ) ) {
                // Include Freemius SDK.
                require_once dirname( __FILE__ ) . '/lib/freemius/start.php';
                $geounit_maps = fs_dynamic_init( array(
                    'id'             => '12649',
                    'slug'           => 'geounit-maps',
                    'type'           => 'plugin',
                    'public_key'     => 'pk_0573a647c5c134b15ffdc29e95c36',
                    'is_premium'     => false,
                    'premium_suffix' => 'Premium',
                    'has_addons'     => false,
                    'has_paid_plans' => true,
                    'trial'          => array(
                        'days'               => 14,
                        'is_require_payment' => true,
                    ),
                    'menu'           => array(
                        'first-path' => 'plugins.php',
                        'support'    => false,
                    ),
                    'is_live'        => true,
                ) );
            }
            return $geounit_maps;
        }

        // Init Freemius.
        geounit_maps();
        // Signal that SDK was initiated.
        do_action( 'geounit_maps_loaded' );
    }
    function geounit_maps_settings_link(  $links  ) {
        if ( geounit_maps()->is_trial() || geounit_maps()->is_free_plan() ) {
            $settings_link = "<a style='color:green; font-weight:bold;' href='" . geounit_maps()->get_upgrade_url() . "' target='_blank'>" . __( 'Buy Premium', 'geounit-maps-block' ) . '</a>';
            array_push( $links, $settings_link );
        }
        return $links;
    }

    add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'geounit_maps_settings_link' );
    // ... Your plugin's main file logic ...
    add_action( 'init', function () {
        require_once plugin_dir_path( __FILE__ ) . 'geounit-maps-options.php';
        wp_register_style(
            'lib-css-geounit-maps-block-lf',
            plugins_url( '/lib/leaflet.css', __FILE__ ),
            [],
            '1.9.4'
        );
        wp_register_script(
            'lib-js-geounit-maps-block-lf',
            plugins_url( '/lib/leaflet.js', __FILE__ ),
            [],
            '1.9.4',
            false
        );
        wp_register_style( 'lib-css-geounit-maps', plugins_url( '/lib/css/geounit.css', __FILE__ ) );
        wp_enqueue_style( 'lib-css-geounit-maps' );
        $registry = WP_Block_Type_Registry::get_instance();
        if ( !$registry->get_registered( 'geounit-maps-block' ) ) {
            register_block_type( __DIR__ . '/build/geounit-maps-block' );
        }
        wp_add_inline_script( 'geounit-maps-block-geounit-maps-block-editor-script', 'const rest_url = "' . esc_url( get_site_url() ) . '";', 'before' );
        add_shortcode( 'geounit', 'geounit_maps_render_shortcode' );
        if ( did_action( 'elementor/loaded' ) ) {
            require_once 'elementor/class-widgets.php';
            require_once 'elementor/custom-control-init.php';
            wp_register_style( 'geounit-leaflet-css', GEOUNITMAPSURL . 'elementor/assets/geounit-leaflet.css' );
            wp_enqueue_style( 'geounit-leaflet-css' );
        }
        geounit_maps()->add_filter( 'show_deactivation_feedback_form', '__return_false' );
    } );
    function geounit_maps_elementor_frontend_scripts() {
        wp_register_style(
            'lib-css-geounit-maps-block-lf',
            plugins_url( '/lib/leaflet.css', __FILE__ ),
            [],
            '1.9.4'
        );
        wp_register_script(
            'geounit-leaflet-js',
            plugins_url( 'elementor/assets/geounit-leaflet.js', __FILE__ ),
            ['lib-js-geounit-maps-block-lf'],
            '1.0.0',
            true
        );
        wp_enqueue_script( 'geounit-leaflet-js' );
        wp_enqueue_style( 'lib-css-geounit-maps-block-lf' );
    }

    add_action( 'elementor/frontend/after_enqueue_scripts', 'geounit_maps_elementor_frontend_scripts' );
    function geounit_maps_render_shortcode(  $attributes  ) {
        $mutable_attributes = [
            'lat',
            'lng',
            'zoom',
            'height',
            'content',
            'markercolor',
            'disablemarker',
            'disablezoom',
            'infoposition',
            'infocontent'
        ];
        $default_attributes = geounit_maps_get_defaults();
        $default_attributes['themeurl'] = $default_attributes['styles'][0]->url;
        $attributes = ( is_array( $attributes ) ? array_intersect_key( $attributes, array_fill_keys( $mutable_attributes, 'geounit' ) ) : $default_attributes );
        $attributes = shortcode_atts( $default_attributes, $attributes, 'geounit' );
        wp_enqueue_style(
            'lib-css-geounit-maps-block-lf',
            plugins_url( '/lib/leaflet.css', __FILE__ ),
            [],
            '1.9.4'
        );
        wp_enqueue_script(
            'lib-js-geounit-maps-block-lf',
            plugins_url( '/lib/leaflet.js', __FILE__ ),
            [],
            '1.9.4',
            false
        );
        ob_start();
        include plugin_dir_path( __FILE__ ) . 'build/geounit-maps-block/render.php';
        $content = ob_get_clean();
        return $content;
    }

    function geounit_maps_get_defaults(  $premium = false  ) {
        $block_attributes = wp_json_file_decode( GEOUNITMAPSDIR . '/build/geounit-maps-block/block.json' )->attributes;
        if ( $premium ) {
            $block_attributes = wp_json_file_decode( GEOUNITMAPSDIR . '/build/geounit-maps-block-premium/block.json' )->attributes;
        }
        $default_attributes = [];
        foreach ( $block_attributes as $key => $attr ) {
            $default_attributes[$key] = $attr->default;
        }
        return array_change_key_case( (array) $default_attributes, CASE_LOWER );
    }

    add_action( 'rest_api_init', function () {
        register_rest_route( 'geounit-map/v1', '/', [
            'methods'             => 'GET',
            'callback'            => '__return_true',
            'permission_callback' => '__return_true',
        ] );
    } );
    add_action( 'parse_request', function () {
        if ( empty( $GLOBALS['wp']->query_vars['rest_route'] ) || empty( $_GET['geounitsrv'] ) ) {
            return;
        }
        $params = $_GET;
        $subDomain = $params['geounitsrv'];
        unset($params['rest_route']);
        unset($params['geounitsrv']);
        unset($params['_nonce']);
        $transient = 'geounit_tile_response_' . md5( esc_attr( $GLOBALS['wp']->query_vars['rest_route'] ) );
        if ( get_option( 'geounit_option_name' ) && isset( get_option( 'geounit_option_name' )['cache_enabled'] ) ) {
            $cacheEnabled = esc_attr( get_option( 'geounit_option_name' )['cache_enabled'] );
        } else {
            $cacheEnabled = 1;
        }
        if ( get_option( 'geounit_option_name' ) && isset( get_option( 'geounit_option_name' )['expire_enabled'] ) ) {
            $expireEnabled = esc_attr( get_option( 'geounit_option_name' )['expire_enabled'] );
        } else {
            $expireEnabled = 1;
        }
        $cachedTile = get_transient( $transient );
        if ( $cachedTile && $cacheEnabled ) {
            if ( $expireEnabled ) {
                header( 'Cache-Control: max-age=3600' );
            }
            echo base64_decode( $cachedTile );
            exit;
        } else {
            $url = add_query_arg( $params, 'https://' . esc_attr( $subDomain ) . '.tileserver.geounit.de' . str_replace( '/geounit-map/v1/', '/geounit-maps/', esc_attr( $GLOBALS['wp']->query_vars['rest_route'] ) ) );
            $response = wp_remote_get( $url, [
                'timeout' => 10,
            ] );
            $body = wp_remote_retrieve_body( $response );
            $tile = @imagecreatefromstring( $body );
            if ( !is_wp_error( $response ) && $tile !== false ) {
                $w = imagesx( $tile );
                $h = imagesy( $tile );
                if ( $w == '256' && $h == '256' || $w == '512' && $h == '512' || $w == '768' && $h == '768' ) {
                    imagedestroy( $tile );
                    if ( $cacheEnabled ) {
                        set_transient( $transient, base64_encode( $body ), WEEK_IN_SECONDS );
                    }
                    if ( $expireEnabled ) {
                        header( 'Cache-Control: max-age=3600' );
                    }
                    echo $body;
                    exit;
                }
            }
        }
        delete_transient( $transient );
        status_header( 500 );
        exit;
    }, 9 );
}