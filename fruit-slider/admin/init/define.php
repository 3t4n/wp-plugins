<?php

if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__FILE__) . '/');
}

define('FRUIT_SLIDER_SLUG', 'fruit-slider');
define('FRUIT_SLIDER_TEXT_DOMAIN', 'fruitslider');
define('FRUIT_SLIDER_DIR', dirname(dirname(plugin_dir_path(__FILE__))));
define('FRUIT_SLIDER_URL', plugins_url('', dirname(plugin_dir_path(__FILE__))));

Class fruit_slider_plugin {

    // Constructor 
    function __construct() {
        add_action('admin_menu', array($this, 'fruit_slider_add_menu'));
        register_activation_hook(__FILE__, array($this, 'fruit_slider_install'));
        register_deactivation_hook(__FILE__, array($this, 'fruit_slider_uninstall'));
    }

    function fruit_slider_install() {
        add_option('Activated_Plugin', FRUIT_SLIDER_SLUG);
    }

    function fruit_slider_uninstall() {
        
    }

    function fruit_slider_add_menu() {
        add_menu_page('slider settings', 'Fruit Slider', 'manage_options', 'slider_settings', 'fruit_slider_settings', FRUIT_SLIDER_URL . '/includes/images/slider-icon.png', 61);
        add_submenu_page('slider_settings', 'Add New Gallery', 'Gallery', 'manage_options', 'add_gallery', 'fruit_add_gallery_settings');
        add_submenu_page('slider_settings', 'Add Slider', 'Add New Slider', 'manage_options', 'add_slider_page', 'fruit_add_slider_settings');
        add_submenu_page('slider_settings', 'Edit Layer', 'Slider Settings', 'manage_options', 'edit_layer_settings', 'fruit_edit_layer_settings');
    }

}

function load_plugin() {
    global $fruit_slider_plugin;
    $fruit_slider_plugin = new fruit_slider_plugin();
}

add_action('plugins_loaded', 'load_plugin');

require_once( FRUIT_SLIDER_DIR . '/admin/includes/admin_enque_files.php');

function fruit_slider_settings() {
    require_once( FRUIT_SLIDER_DIR . '/admin/includes/save_slider.php');
}

function fruit_add_slider_settings() {
    require_once( FRUIT_SLIDER_DIR . '/admin/includes/add_slider_settings.php');
}

function fruit_edit_layer_settings() {
    require_once( FRUIT_SLIDER_DIR . '/admin/includes/edit_settings.php');
}

function fruit_add_gallery_settings() {
    require_once( FRUIT_SLIDER_DIR . '/admin/includes/add_gallery_settings.php');
}

require_once( FRUIT_SLIDER_DIR . '/view/front.php');
?>
<?php

add_action('wp_ajax_edit_gallery', 'edit_gallery');
add_action('wp_ajax__nopriv_edit_gallery', 'edit_gallery');

function edit_gallery() {
    global $wpdb;
    $table = $wpdb->prefix . "add_fruitgallery";
    $gname = sanitize_text_field($_REQUEST['gname']);
    $gid = sanitize_text_field($_REQUEST['gid']);
    $wpdb->update($table, array('gallery_name' => $gname), array('ID' => $gid), array('%s'), array('%d'));
    echo json_encode(array('flag' => 1));
    die();
}

?>
