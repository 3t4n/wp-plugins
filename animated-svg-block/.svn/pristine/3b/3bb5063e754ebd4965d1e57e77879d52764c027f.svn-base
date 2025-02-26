<?php
/**
 * Plugin Name: Animated SVG Block
 * Plugin URI: https://robertgoldberg.net/svg-plugin
 * Description: A custom Gutenberg block to insert a stroke-animated SVG image. Use a path with a stroke color and width and no fill. NOTE: SVG support is added by this plugin.  Mixed content (using both HTTP and HTTPS) can cause issues and prevent the plugin from functioning correctly, see readme for information on addressing mixed content.  
 * Version: 1.01
 * Author: Rob Goldberg
 * Author URI: https://robertgoldberg.net
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: animated-svg-block
 * Domain Path: /languages
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


// Define the function to check for active SVG support plugins
function animated_svg_is_any_plugin_active() {
    $svg_plugins = array(
        'safe-svg/safe-svg.php',
        'svg-support/svg-support.php',
        // Add other SVG plugins here
    );

    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

    foreach ($svg_plugins as $plugin) {
        if (is_plugin_active($plugin)) {
            return true;
        }
    }

    return false;
}

// Check if any common SVG support plugin is active
if ( !animated_svg_is_any_plugin_active() ) {

    // Allow SVG uploads
    function animated_svg_mime_types($mimes) {
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    }
    add_filter('upload_mimes', 'animated_svg_mime_types');

    // Fix SVG MIME type
    function animated_svg_fix_mime_type($data, $file, $filename, $mimes) {
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if ($ext === 'svg') {
            $data['type'] = 'image/svg+xml';
            $data['ext'] = 'svg';
        }
        return $data;
    }
    add_filter('wp_check_filetype_and_ext', 'animated_svg_fix_mime_type', 10, 4);

    // Sanitize SVG
    function animated_svg_sanitize($svg) {
        $svg = simplexml_load_string($svg, 'SimpleXMLElement', LIBXML_NOCDATA);
        if ($svg === false) {
            return false;
        }

        $dom = dom_import_simplexml($svg)->ownerDocument;
        $xpath = new DOMXPath($dom);

        // Remove script elements
        while ($script = $xpath->query('//script')->item(0)) {
            $script->parentNode->removeChild($script);
        }

        // Remove on* attributes (e.g., onclick, onload)
        foreach ($xpath->query('//@*') as $attr) {
            if (strpos($attr->name, 'on') === 0) {
                $attr->parentNode->removeAttribute($attr->name);
            }
        }

        return $dom->saveXML($dom->documentElement);
    }

    function animated_svg_handle_upload($upload) {
        if ($upload['type'] === 'image/svg+xml') {
            $svg = animated_svg_file_get_contents_safe($upload['file']);
            $sanitized_svg = animated_svg_sanitize($svg);
            if ($sanitized_svg === false) {
                $upload['error'] = 'Invalid SVG file';
            } else {
                animated_svg_file_put_contents_safe($upload['file'], $sanitized_svg);
            }
        }
        return $upload;
    }
    add_filter('wp_handle_upload', 'animated_svg_handle_upload');
}

function animated_svg_file_get_contents_safe($filename) {
    global $wp_filesystem;
    if (empty($wp_filesystem)) {
        require_once ABSPATH . 'wp-admin/includes/file.php';
        WP_Filesystem();
    }
    return $wp_filesystem->get_contents($filename);
}

function animated_svg_file_put_contents_safe($filename, $data) {
    global $wp_filesystem;
    if (empty($wp_filesystem)) {
        require_once ABSPATH . 'wp-admin/includes/file.php';
        WP_Filesystem();
    }
    return $wp_filesystem->put_contents($filename, $data, FS_CHMOD_FILE);
}

// Enqueue block editor assets.
function animated_svg_block_enqueue_block_editor_assets() {
    wp_enqueue_script(
        'animated-svg-block-js',
        plugin_dir_url( __FILE__ ) . 'dist/block.js',
        array( 'wp-blocks', 'wp-element', 'wp-editor', 'wp-components', 'wp-block-editor' ), // Ensure all dependencies are included
        filemtime( plugin_dir_path( __FILE__ ) . 'dist/block.js' ),
        true // Load in footer
    );

    wp_enqueue_style(
        'animated-svg-block-editor-css',
        plugin_dir_url( __FILE__ ) . 'css/editor.css',
        array(),
        filemtime( plugin_dir_path( __FILE__ ) . 'css/editor.css' )
    );
}
add_action( 'enqueue_block_editor_assets', 'animated_svg_block_enqueue_block_editor_assets' );

// Enqueue front-end assets.
function animated_svg_block_enqueue_frontend_assets() {
    wp_enqueue_style(
        'animated-svg-block-css',
        plugin_dir_url( __FILE__ ) . 'css/style.css',
        array(),
        filemtime( plugin_dir_path( __FILE__ ) . 'css/style.css' )
    );

    wp_enqueue_script(
        'vivus-js',
        plugin_dir_url( __FILE__ ) . 'js/vivus.min.js',
        array(),
        filemtime( plugin_dir_path( __FILE__ ) . 'js/vivus.min.js' ),
        true
    );

    wp_enqueue_script(
        'animated-svg-block-frontend-js',
        plugin_dir_url( __FILE__ ) . 'js/frontend.js',
        array( 'vivus-js' ),
        filemtime( plugin_dir_path( __FILE__ ) . 'js/frontend.js' ),
        true
    );
}
add_action( 'wp_enqueue_scripts', 'animated_svg_block_enqueue_frontend_assets' );

// Register a custom block category (optional).
function animated_svg_block_categories($categories, $post) {
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'custom-category',
                'title' => __('Custom Category', 'animated-svg-block'),
                'icon' => 'wordpress',
            ),
        )
    );
}
add_filter('block_categories_all', 'animated_svg_block_categories', 10, 2);
