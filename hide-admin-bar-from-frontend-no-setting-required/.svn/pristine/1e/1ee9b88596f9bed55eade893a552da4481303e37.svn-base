<?php
/*
    Plugin Name: Hide Admin Bar From frontend No setting required
    Plugin URI: 
    Description: Simple Plugin to Hide Admin Bar From frontend No setting required
    Author: Navneet Soni
    Version: 0.1
    Author URI: http://www.navneetsoni.com
*/
add_action('admin_print_scripts-profile.php', 'hide_admin_bar_from_frontend');
function hide_admin_bar_from_frontend() { ?>
<style type="text/css">
	.show-admin-bar {display: none;}
</style>
<?php
}
add_filter('show_admin_bar', '__return_false');
?>