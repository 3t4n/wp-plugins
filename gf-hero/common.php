<?php

if ( ! defined( 'TGGH_URL' ) ) {
    exit;
}

// Utilities
// ---------

function tggh__( $text ) {
    return __( $text, 'gf-hero' );
}

function tggh_array_insert_after( $array, $key, $new_items ) {
	$keys  = array_keys( $array );
	$index = array_search( $key, $keys );
	$pos   = ( $index === false ) ? count( $array ) : $index + 1;

	return array_merge(
        array_slice( $array, 0, $pos ),
        $new_items,
        array_slice( $array, $pos )
    );
}

function tggh_get( $array, $key, $default = null ) {
    return is_array( $array )
        ? ( isset( $array[$key] ) ? $array[$key] : $default )
        : $default;
}

function tggh_get_array( $array, $key, $default = array() ) {
    return tggh_get( $array, $key, $default );
}

function tggh_ensure_session_start() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}

function tggh_get_domain() {
    return parse_url( get_site_url(), PHP_URL_HOST );
}

function tggh_get_level_name( $level ) {
    switch ( $level ) {
        case 1: return 'Essential';
        case 2: return 'Standard';
        case 3: return 'Advanced';
        default: return ( 'Level ' . $level );
    }
}

// Assets
// ------

function tggh_asset_min() {
    return TGGH_IS_DEBUG ? '.min' : '';
}

function tggh_asset_handle( $fname ) {
    return 'tggh_' . preg_replace( '/[^a-zA-Z0-9]+/', '_', $fname );
}

function tggh_asset_src( $fname ) {
    return plugins_url( $fname, __FILE__ );;
}

function tggh_asset_ver( $fname ) {
    return date( 'ymd_His', filemtime( plugin_dir_path( __FILE__ ) . $fname ) );
}

global $tggh_enqueued;
$tggh_enqueued = array( 'script' => array(), 'style' => array() );

function tggh_enqueue( $type, $fname, $deps = array() ) {
    $handle = tggh_asset_handle( $fname );
    $src    = tggh_asset_src( $fname );
    $deps   = is_array( $deps ) ? $deps : array( $deps );
    $ver    = tggh_asset_ver( $fname );

    switch ( $type ) {
        case 'script': wp_enqueue_script( $handle, $src, $deps, $ver ); break;
        case 'style':  wp_enqueue_style ( $handle, $src, $deps, $ver ); break;
    }

    if ( is_admin() ) {
        global $tggh_enqueued;

        $tggh_enqueued[$type][$handle] = $handle;
        foreach ( $deps as $dep_handle ) {
            $tggh_enqueued[$type][$dep_handle] = $dep_handle;
        }
    }
}

// Levels
// ------

function tggh_get_level() {
    static $level = null;

    if ( is_null( $level ) ) {
        for ( $level = 1; $level <= TGGH_MAX_LEVEL; ++$level ) {
            if ( ! file_exists( __DIR__ . '/level-' . $level ) ) {
                break;
            }
        }
        --$level;
    }

    return $level;
}

function tggh_enqueue_levels( $name, $options = array() ) {
    $script_deps = empty( $options['script_deps'] )
        ? array()
        : $options['script_deps'];

    $style_deps = empty( $options['style_deps'] )
        ? array()
        : $options['style_deps'];

    for ( $level = 1, $max = tggh_get_level(); $level <= $max; ++$level ) {
        foreach ( array( 'common', $name ) as $subname ) {
            $fname = 'level-' . $level . '/' . $subname;

            $fname_css = $fname . '.css';
            if ( file_exists( __DIR__ . '/' . $fname_css ) ) {
                tggh_enqueue( 'style', $fname_css, $style_deps );
            }

            $fname_js = $fname . '.js';
            if ( file_exists( __DIR__ . '/' . $fname_js ) ) {
                tggh_enqueue( 'script', $fname_js, $script_deps );
            }
        }
    }
}

function tggh_require_levels( $name ) {
    for ( $level = 1, $max = tggh_get_level(); $level <= $max; ++$level ) {
        foreach ( array( 'common', $name ) as $subname ) {
            $path = __DIR__ . '/level-' . $level . '/' . $subname . '.php';
            if ( file_exists( $path ) ) {
                require_once $path;
            }
        }
    }
}
