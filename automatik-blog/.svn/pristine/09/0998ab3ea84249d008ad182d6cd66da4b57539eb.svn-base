<?php
/**
 * Plugin Name: Automatik Blog
 * Description: Plugin for integration with Automatik Blog, allowing automated publishing of SEO-optimized articles.
 * Version: 1.0.2
 * Author: Automatik Blog
 * Author URI: https://automatikblog.com
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: automatik-blog
 */

if (!defined('ABSPATH')) {
    exit;
}

define('AUTOMATIK_BLOG_PLUGIN_VERSION', '1.0.2');
define('AUTOMATIK_BLOG_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('AUTOMATIK_BLOG_PLUGIN_URL', plugin_dir_url(__FILE__));

require_once AUTOMATIK_BLOG_PLUGIN_DIR . 'includes/class-plugin-settings.php';
require_once AUTOMATIK_BLOG_PLUGIN_DIR . 'includes/class-rest-api-endpoints.php';
require_once AUTOMATIK_BLOG_PLUGIN_DIR . 'includes/class-logger.php';

function automatik_blog_generate_unique_code()
{
    $code = get_option('automatik_blog_unique_code');
    if (!$code) {
        // Use wp_generate_password to create a secure unique code
        $code = wp_generate_password(20, false, false);
        add_option('automatik_blog_unique_code', $code);
    }
}
register_activation_hook(__FILE__, 'automatik_blog_generate_unique_code');

function automatik_blog_init()
{
    load_plugin_textdomain('automatik-blog', false, dirname(plugin_basename(__FILE__)) . '/languages/');

    new Automatik_Blog_Plugin_Settings();
    new Automatik_Blog_REST_API_Endpoints();
}
add_action('plugins_loaded', 'automatik_blog_init');
