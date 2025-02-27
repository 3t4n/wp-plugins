<?php
/*
Plugin Name: CSS Minify
Description: Minify and Optimize your CSS by clicking one button.
Version: 3.0
Author: peterpfeiffer
Domain Path: localization/
Text Domain: bpminifycss
Released under the GNU General Public License (GPL)
http://www.gnu.org/licenses/gpl.txt
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

define('bpminifycss_PLUGIN_DIR',plugin_dir_path(__FILE__));

// Load config class
include(bpminifycss_PLUGIN_DIR.'classes/bpminifycssConfig.php');

// Load toolbar class
include( bpminifycss_PLUGIN_DIR.'classes/bpminifycssToolbar.php' );

// Load partners tab if admin
if (is_admin()) {
    include bpminifycss_PLUGIN_DIR.'classlesses/bpminifycssPartners.php';
}

// Do we gzip when caching (needed early to load bpminifycssCache.php)
define('bpminifycss_CACHE_NOGZIP',(bool) get_option('bpminifycss_cache_nogzip'));

// Load cache class
include(bpminifycss_PLUGIN_DIR.'classes/bpminifycssCache.php');

// wp-content dir name (automagically set, should not be needed), dirname of AO cache dir and AO-prefix can be overridden in wp-config.php
if (!defined('bpminifycss_WP_CONTENT_NAME')) { define('bpminifycss_WP_CONTENT_NAME','/'.wp_basename( WP_CONTENT_DIR )); }
if (!defined('bpminifycss_CACHE_CHILD_DIR')) { define('bpminifycss_CACHE_CHILD_DIR','/cache/bpminifycss/'); }
if (!defined('bpminifycss_CACHEFILE_PREFIX')) { define('bpminifycss_CACHEFILE_PREFIX', 'bpminifycss_'); }

// Plugin dir constants (plugin url's defined later to accomodate domain mapped sites)
if (is_multisite() && apply_filters( 'bpminifycss_separate_blog_caches' , true )) {
    $blog_id = get_current_blog_id();
    define('bpminifycss_CACHE_DIR', WP_CONTENT_DIR.bpminifycss_CACHE_CHILD_DIR.$blog_id.'/' );
} else {
    define('bpminifycss_CACHE_DIR', WP_CONTENT_DIR.bpminifycss_CACHE_CHILD_DIR);
}
define('bpminifycss_CACHE_DELAY',true);
define('WP_ROOT_DIR',str_replace(bpminifycss_WP_CONTENT_NAME,'',WP_CONTENT_DIR));

// Initialize the cache at least once
$conf = bpminifycssConfig::instance();

/* Check if we're updating, in which case we might need to do stuff and flush the cache
to avoid old versions of aggregated files lingering around */

$bpminifycss_version="2.1.0";
$bpminifycss_db_version=get_option('bpminifycss_version','none');

if ($bpminifycss_db_version !== $bpminifycss_version) {
    if ($bpminifycss_db_version==="none") {
        add_action('admin_notices', 'bpminifycss_install_config_notice');
    } else {
        // updating, include the update-code
        include(bpminifycss_PLUGIN_DIR.'classlesses/bpminifycssUpdateCode.php');
    }

    update_option('bpminifycss_version',$bpminifycss_version);
    $bpminifycss_db_version=$bpminifycss_version;
}

// Load translations
function bpminifycss_load_plugin_textdomain() {
    load_plugin_textdomain('bpminifycss',false,plugin_basename(dirname( __FILE__ )).'/localization');
}
add_action( 'init', 'bpminifycss_load_plugin_textdomain' );

function bpminifycss_uninstall(){
    bpminifycssCache::clearall();

    $delete_options=array("bpminifycss_cache_clean", "bpminifycss_cache_nogzip", "bpminifycss_css", "bpminifycss_css_datauris", "bpminifycss_css_justhead", "bpminifycss_css_defer", "bpminifycss_css_defer_inline", "bpminifycss_css_inline", "bpminifycss_css_exclude", "bpminifycss_html", "bpminifycss_html_keepcomments", "bpminifycss_js", "bpminifycss_js_exclude", "bpminifycss_js_forcehead", "bpminifycss_js_justhead", "bpminifycss_js_trycatch", "bpminifycss_version", "bpminifycss_show_adv", "bpminifycss_cdn_url", "bpminifycss_cachesize_notice","bpminifycss_css_include_inline","bpminifycss_js_include_inline","bpminifycss_css_nogooglefont");

    if ( !is_multisite() ) {
        foreach ($delete_options as $del_opt) {    delete_option( $del_opt ); }
    } else {
        global $wpdb;
        $blog_ids = $wpdb->get_col( "SELECT blog_id FROM $wpdb->blogs" );
        $original_blog_id = get_current_blog_id();
        foreach ( $blog_ids as $blog_id ) {
            switch_to_blog( $blog_id );
            foreach ($delete_options as $del_opt) {    delete_option( $del_opt ); }
        }
        switch_to_blog( $original_blog_id );
    }

    if ( wp_get_schedule( 'ao_cachechecker' ) ) {
        wp_clear_scheduled_hook( 'ao_cachechecker' );
    }
}

function bpminifycss_install_config_notice() {
    echo '<div class="updated"><p>';
    _e('Thank you for installing and activating bpminifycss. Please configure it under "Settings" -> "bpminifycss" to start improving your site\'s performance.', 'bpminifycss' );
    echo '</p></div>';
}

function bpminifycss_update_config_notice() {
    echo '<div class="updated"><p>';
    _e('bpminifycss has just been updated. Please <strong>test your site now</strong> and adapt bpminifycss config if needed.', 'bpminifycss' );
    echo '</p></div>';
}

function bpminifycss_cache_unavailable_notice() {
    echo '<div class="error"><p>';
    _e('bpminifycss cannot write to the cache directory (default: /wp-content/cache/bpminifycss), please fix to enable CSS/ JS optimization!', 'bpminifycss' );
    echo '</p></div>';
}

// Set up the buffering
function bpminifycss_start_buffering() {
    $ao_noptimize = false;

    // noptimize in qs to get non-optimized page for debugging
    if (array_key_exists("ao_noptimize",$_GET)) {
        if ( ($_GET["ao_noptimize"]==="1") && (apply_filters('bpminifycss_filter_honor_qs_noptimize',true)) ) {
            $ao_noptimize = true;
        }
    }

    // check for DONOTMINIFY constant as used by e.g. WooCommerce POS
    if (defined('DONOTMINIFY') && (constant('DONOTMINIFY')===true || constant('DONOTMINIFY')==="true")) {
        $ao_noptimize = true;
    }

    // filter you can use to block autoptimization on your own terms
    $ao_noptimize = (bool) apply_filters( 'bpminifycss_filter_noptimize', $ao_noptimize );

    if (!is_feed() && !$ao_noptimize && !is_admin() && ( !function_exists('is_customize_preview') || !is_customize_preview() ) ) {
        // Config element
        $conf = bpminifycssConfig::instance();

        // Load our base class
        include(bpminifycss_PLUGIN_DIR.'classes/bpminifycssBase.php');

        // Load extra classes and set some vars
        if($conf->get('bpminifycss_html')) {
            include(bpminifycss_PLUGIN_DIR.'classes/bpminifycssHTML.php');
            // BUG: new minify-html does not support keeping HTML comments, skipping for now
            // if (defined('bpminifycss_LEGACY_MINIFIERS')) {
                @include(bpminifycss_PLUGIN_DIR.'classes/external/php/minify-html.php');
            // } else {
            //    @include(bpminifycss_PLUGIN_DIR.'classes/external/php/minify-2.1.7-html.php');
            // }
        }

        if($conf->get('bpminifycss_js')) {
            include(bpminifycss_PLUGIN_DIR.'classes/bpminifycssScripts.php');
            if (!class_exists('JSMin')) {
                if (defined('bpminifycss_LEGACY_MINIFIERS')) {
                    @include(bpminifycss_PLUGIN_DIR.'classes/external/php/jsmin-1.1.1.php');
                } else {
                    @include(bpminifycss_PLUGIN_DIR.'classes/external/php/minify-2.3.1-jsmin.php');
                }
            }
            if ( ! defined( 'CONCATENATE_SCRIPTS' )) {
                define('CONCATENATE_SCRIPTS',false);
            }
            if ( ! defined( 'COMPRESS_SCRIPTS' )) {
                define('COMPRESS_SCRIPTS',false);
            }
        }

        if($conf->get('bpminifycss_css')) {
            include(bpminifycss_PLUGIN_DIR.'classes/bpminifycssStyles.php');
            if (defined('bpminifycss_LEGACY_MINIFIERS')) {
                if (!class_exists('Minify_CSS_Compressor')) {
                    @include(bpminifycss_PLUGIN_DIR.'classes/external/php/minify-css-compressor.php');
                }
            } else {
                if (!class_exists('CSSmin')) {
                    @include(bpminifycss_PLUGIN_DIR.'classes/external/php/yui-php-cssmin-2.4.8-4_fgo.php');
                }
            }
            if ( ! defined( 'COMPRESS_CSS' )) {
                define('COMPRESS_CSS',false);
            }
        }

        // filter to be used with care, kills all output buffers when true. use with extreme caution. you have been warned!
        if (apply_filters('bpminifycss_filter_obkiller',false)) {
            while (ob_get_level() > 0) {
                ob_end_clean();
            }
        }
                
        // Now, start the real thing!
        ob_start('bpminifycss_end_buffering');
    }
}

// Action on end, this is where the magic happens
function bpminifycss_end_buffering($content) {
    if ( ((stripos($content,"<html") === false) && (stripos($content,"<!DOCTYPE html") === false)) || preg_match('/<html[^>]*(?:amp|⚡)/',$content) === 1 || stripos($content,"<xsl:stylesheet") !== false ) { return $content; }
    
    // load URL constants as late as possible to allow domain mapper to kick in
    if (function_exists("domain_mapping_siteurl")) {
        define('bpminifycss_WP_SITE_URL',domain_mapping_siteurl(get_current_blog_id()));
        define('bpminifycss_WP_CONTENT_URL',str_replace(get_original_url(bpminifycss_WP_SITE_URL),bpminifycss_WP_SITE_URL,content_url()));
    } else {
        define('bpminifycss_WP_SITE_URL',site_url());
        define('bpminifycss_WP_CONTENT_URL',content_url());
    }

    if ( is_multisite() && apply_filters( 'bpminifycss_separate_blog_caches' , true ) ) {
        $blog_id = get_current_blog_id();
        define('bpminifycss_CACHE_URL',bpminifycss_WP_CONTENT_URL.bpminifycss_CACHE_CHILD_DIR.$blog_id.'/' );
    } else {
        define('bpminifycss_CACHE_URL',bpminifycss_WP_CONTENT_URL.bpminifycss_CACHE_CHILD_DIR);
    }
    define('bpminifycss_WP_ROOT_URL',str_replace(bpminifycss_WP_CONTENT_NAME,'',bpminifycss_WP_CONTENT_URL));

    // Config element
    $conf = bpminifycssConfig::instance();

    // Choose the classes
    $classes = array();
    if($conf->get('bpminifycss_js'))
        $classes[] = 'bpminifycssScripts';
    if($conf->get('bpminifycss_css'))
        $classes[] = 'bpminifycssStyles';
    if($conf->get('bpminifycss_html'))
        $classes[] = 'bpminifycssHTML';

    // Set some options
    $classoptions = array(
        'bpminifycssScripts' => array(
            'justhead' => $conf->get('bpminifycss_js_justhead'),
            'forcehead' => $conf->get('bpminifycss_js_forcehead'),
            'trycatch' => $conf->get('bpminifycss_js_trycatch'),
            'js_exclude' => $conf->get('bpminifycss_js_exclude'),
            'cdn_url' => $conf->get('bpminifycss_cdn_url'),
            'include_inline' => $conf->get('bpminifycss_js_include_inline')
        ),
        'bpminifycssStyles' => array(
            'justhead' => $conf->get('bpminifycss_css_justhead'),
            'datauris' => $conf->get('bpminifycss_css_datauris'),
            'defer' => $conf->get('bpminifycss_css_defer'),
            'defer_inline' => $conf->get('bpminifycss_css_defer_inline'),
            'inline' => $conf->get('bpminifycss_css_inline'),
            'css_exclude' => $conf->get('bpminifycss_css_exclude'),
            'cdn_url' => $conf->get('bpminifycss_cdn_url'),
            'include_inline' => $conf->get('bpminifycss_css_include_inline'),
            'nogooglefont' => $conf->get('bpminifycss_css_nogooglefont')
        ),
        'bpminifycssHTML' => array(
            'keepcomments' => $conf->get('bpminifycss_html_keepcomments')
        )
    );

    $content = apply_filters( 'bpminifycss_filter_html_before_minify', $content );

    // Run the classes
    foreach($classes as $name) {
        $instance = new $name($content);
        if($instance->read($classoptions[$name])) {
            $instance->minify();
            $instance->cache();
            $content = $instance->getcontent();
        }
        unset($instance);
    }
    
    $content = apply_filters( 'bpminifycss_html_after_minify', $content );
    return $content;
}

if ( bpminifycssCache::cacheavail() ) {
    $conf = bpminifycssConfig::instance();
    if( $conf->get('bpminifycss_html') || $conf->get('bpminifycss_js') || $conf->get('bpminifycss_css') ) {
        // Hook to wordpress
        if (defined('bpminifycss_INIT_EARLIER')) {
            add_action('init','bpminifycss_start_buffering',-1);
        } else {
            add_action('template_redirect','bpminifycss_start_buffering',2);
        }
    }
} else {
    add_action('admin_notices', 'bpminifycss_cache_unavailable_notice');
}

register_uninstall_hook(__FILE__, "bpminifycss_uninstall");
include_once('classlesses/bpminifycssCacheChecker.php');

// Do not pollute other plugins
unset($conf);
