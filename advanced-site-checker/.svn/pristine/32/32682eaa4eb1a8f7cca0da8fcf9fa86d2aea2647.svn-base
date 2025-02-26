<?php
/**
 * @package Advanced site checker
 */
/*
Plugin Name: Advanced Site Checker
Plugin URI: https://advanced-site-checker.com/
Description: ASC is an ultimate tool to improve your site.
Version: 0.8.2
Author: Advanced site checker
Author URI: https://advanced-site-checker.com/
Text Domain: advanced-site-checker
*/
function asc_button($wp_admin_bar) {
    if(is_admin()) { 
        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
        $args = array(
            'id' => 'asc-button',
            'title' => '<img src="'.plugins_url( 'icon.png', __FILE__) .'" style="margin-top: 6px; height: 19px; border-radius: 2px;filter: grayscale(100%);">',
            'href' => '/wp-admin/admin.php?page=asc-error&link='.$actual_link
        );
        $wp_admin_bar->add_node($args);
    } else {
        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
        $args = array(
            'id' => 'asc-button',
            'title' => '<img src="'.plugins_url( 'icon.png', __FILE__) .'" style="margin-top: 6px; height: 19px; border-radius: 2px;">',
            'href' => 'https://advanced-site-checker.com/tools/page-checker?url='.urlencode($actual_link),
            'meta' => array(
                'target' => '_blank'
            )
        );
        $wp_admin_bar->add_node($args);
    }
}
add_action('admin_bar_menu', 'asc_button', 50);

function asc_init() {
    add_submenu_page('', 'Report', 'Report', 'manage_options', 'asc-error', 'asc_error_page');
}
add_action( 'admin_menu', 'asc_init' );
function asc_error_page() {
    ?>
    <h1>Page must be accessible from the outside</h1>
    <p>Page "<?=$_GET['link']?>" is an admin page. Our service haven't access to check it.</p>
    <?php
}
