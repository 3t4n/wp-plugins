<?php
/**
 *
 * @since      1.0.0
 * @package    go-embed
 * @subpackage go-embed/includes
 * @author    DelightinCode(delightincode.com)
 */

defined('ABSPATH') || exit;

if (is_admin() == true) {
    require_once DLIC_GO_EMBED_PLUGIN_PATH .'/includes/admin-menu.php';
    add_action('admin_init', 'dlic_go_embed_admin_init');
    add_action('admin_enqueue_scripts', 'dlic_go_embed_admin_enqueue_scripts');

    $admin_menu = new Dlic_GoEmbed_Admin_Menu();
    $admin_menu->init();

    function dlic_go_embed_admin_init(){
        /* CSS */
        wp_register_style('mui-css', DLIC_GO_EMBED_PLUGIN_URL . 'assets/vendors/mui.min.css', null, "1.0.0");
        wp_register_style('admin-main-style', DLIC_GO_EMBED_PLUGIN_URL . 'assets/css/admin-main.css', null, "1.0.0");

        /* JS */
        wp_register_script('mui-js', DLIC_GO_EMBED_PLUGIN_URL . 'assets/vendors/mui.min.js', null, "1.0.0");
    }
     
    function dlic_go_embed_admin_enqueue_scripts() {
        wp_enqueue_style('mui-css');
        wp_enqueue_style('admin-main-style');

        wp_enqueue_script('mui-js');
    }

}

function dlic_go_embed_embed($atts) {
    $appid = dlic_dashToCamelCase($atts['id']);
    return '<div id="' . esc_attr($appid) . '">
        <code style="background: #ffc8b9;">
            ' . __('Sorry but the App with id', 'dlic-go-embed') . ' "'. esc_attr($appid) .'" ' . __('has build error', 'dlic-go-embed') . '
        </code>
        </div>
        <script src="' . DLIC_GO_EMBED_PLUGIN_URL . 'apps/' . esc_attr($atts['id']) . '/build/jsappembed.js" async></script>
    ';
}
function dlic_go_embed_plugins_loaded() {
	if(function_exists('add_shortcode')) {
        add_shortcode( 'go-embed', 'dlic_go_embed_embed' );
    }
}

function dlic_go_embed_settings_link( $links ) {
	$url = esc_url( add_query_arg(
		'page',
		'go-embed',
		get_admin_url() . 'admin.php'
	) );
	$settings_link = "<a href=' " . $url . "'>" . __( 'Settings', 'dlic-go-embed' ) . '</a>';

	array_push(
		$links,
		$settings_link
	);
	return $links;
}

add_action( 'plugins_loaded', 'dlic_go_embed_plugins_loaded' );
add_filter( 'plugin_action_links_go-embed/go-embed.php', 'dlic_go_embed_settings_link' );
