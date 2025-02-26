<?php
/*
Plugin Name: Appreplica
Plugin URI: http://appreplica.com
Description: Appreplica for WordPress, embed your favorite websites.
Author: Appreplica
Version: 3.5
Author URI: http://appreplica.com
*/

# Prevent direct access
if (!defined('ABSPATH')) die('Error!');

# Add jquery
wp_enqueue_script('jquery');

# Register [appreplica] shortcode
add_shortcode( 'appreplica', 'embed_appreplica' );


# Create appreplica settings menu for admin
add_action( 'admin_menu', 'appreplica_create_menu' );
add_action( 'network_admin_menu', 'appreplica_network_admin_create_menu' );

# Create link to plugin options page from plugins list
function appreplica_plugin_add_settings_link( $links ) {
    $settings_link = '<a href="admin.php?page=appreplica_settings_page">Settings</a>';
    array_push( $links, $settings_link );
    return $links;
}

$appreplica_plugin_basename = plugin_basename( __FILE__ );
add_filter( 'plugin_action_links_' . $appreplica_plugin_basename, 'appreplica_plugin_add_settings_link' );

# Create new top level menu for sites
function appreplica_create_menu() {
    add_menu_page('Appreplica Options', 'Appreplica', 'install_plugins', 'appreplica_settings_page', 'appreplica_settings_page');
}

# Create new top level menu for network admin
function appreplica_network_admin_create_menu() {
    add_menu_page('Appreplica Options', 'Appreplica', 'manage_options', 'appreplica_settings_page', 'appreplica_settings_page');
}

function appreplica_update_option($name, $value) {
    return is_multisite() ? update_site_option($name, $value) : update_option($name, $value);
}

function appreplica_settings_page() {

?>

<div id="appreplica_admin" class="wrap">

<div style="padding-bottom: 10px;">
<h1>Appreplica</h1>
</div>

<?php $appreplica_active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'support'; ?>

<h2 class="nav-tab-wrapper">

<a href="?page=appreplica_settings_page&amp;tab=support" class="nav-tab <?php echo $appreplica_active_tab == 'support' ? 'nav-tab-active' : ''; ?>">Support</a>

</h2>


<?php if( $appreplica_active_tab == 'support' ) { // Support Tab ?>

<table class="form-table">
<tbody>

<tr valign="top">
<td>

<div style="max-width: 700px;">

<br /><br /><br />
<h1>
This plugin has been retired as of January 1, 2021 and will no longer function. Please visit our new site at <a target="_blank" href="https://wpcloudgallery.com">https://wpcloudgallery.com</a> for your photo library needs.
</h1>


</div>
</td>
</tr>

</tbody>
</table>

<br /><br /><br />

<?php } // End Support Tab ?>




</div>
<?php } ?>