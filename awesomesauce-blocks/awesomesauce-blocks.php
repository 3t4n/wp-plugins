<?php
/**
 * Plugin Name: Awesomesauce Blocks
 * Plugin URI: http://awesomesauce.great-site.net
 * Description: Ѧwesoməsauce bløcks for your WordPress website with ultra lightweight codes and extraterrestrial design! (ﾉ◕ヮ◕)ﾉ*:･ﾟ✧
 * Version: 1.0
 * Author: Ѧwesomə Pøssum &#9825;
 * Author URI: http://awesomesauce.great-site.net/about-the-author/
 * License: GPLv3 or later
 **/

use Awesomesauce\Awesomesauce;

if (!defined('ABSPATH')) {
    exit;
}

define('AWESOMESAUCE_BLOCKS_PLUGIN_FILE', __FILE__);
define('AWESOMESAUCE_BLOCKS_PLUGIN_DIR', rtrim(plugin_dir_path(AWESOMESAUCE_BLOCKS_PLUGIN_FILE), '/\\'));
define('AWESOMESAUCE_BLOCKS_PLUGIN_URL', rtrim(plugin_dir_url(AWESOMESAUCE_BLOCKS_PLUGIN_FILE), '/\\'));

function awesomesauce_activate() {
    $capabilities = array(
        'edit_awesomesauce_block',
        'read_awesomesauce_block',
        'delete_awesomesauce_block',
        'edit_awesomesauce_blocks',
        'edit_others_awesomesauce_blocks',
        'delete_awesomesauce_blocks',
        'publish_awesomesauce_blocks',
        'read_private_awesomesauce_blocks',
        'delete_private_awesomesauce_blocks',
        'delete_published_awesomesauce_blocks',
        'delete_others_awesomesauce_blocks',
        'edit_private_awesomesauce_blocks',
        'edit_published_awesomesauce_blocks',
        'create_awesomesauce_blocks'
    );

    $wp_role = get_role('administrator');

    foreach ($capabilities as $capability) {
        if (!$wp_role->has_cap($capability)) {
            $wp_role->add_cap($capability);
        }
    }

    if (function_exists('opcache_reset') && is_callable('opcache_reset')) {
        opcache_reset();
    }
}

function awesomesauce_add_plugin_meta_links($links, $file) {
    if (plugin_basename(__FILE__) === $file) {
        $links[] = '<a href="http://awesomesauce.great-site.net/docs/awesomesauce-blocks-documentation" target="_blank">Documentation</a>';
        $links[] = '<a href="https://wordpress.org/support/plugin/awesomesauce-blocks" target="_blank">Support</a>';
    }

    return $links;
}

add_filter('plugin_row_meta', 'awesomesauce_add_plugin_meta_links', 10, 2);

register_activation_hook(__FILE__, 'awesomesauce_activate');

require_once(dirname(__FILE__) . '/Awesomesauce/Sanitization.php');
require_once(dirname(__FILE__) . '/Awesomesauce/Awesomesauce.php');

new Awesomesauce();

require_once(dirname(__FILE__) . '/Awesomesauce/Admin/Gutenberg/AwesomesauceGutenberg.php');