<?php

/**
* Plugin Name: Rename Post Labels
* Plugin URI: http://wowdevshop.com
* Description: This plugin let's you change the default labels of the post type and customize the icon.
* Author: XicoOfficial
* Version: 1.1.3
* License: GPLv2
* Author URI: http://wowdevshop.com
* Text Domain: rename-post-labels-by-wowdevshop
*
* @package WordPress
* @subpackage WowDevShop_Rename_Post_Labels
* @author XicoOfficial
* @since 1.0.0
*/

/**
 * Tell WordPress to load a translation file if it exists for the user's language
 * @since 1.2.0
 */
function wds_rps_load_plugin_textdomain() {
    load_plugin_textdomain( 'rename-post-labels-by-wowdevshop', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}

add_action( 'plugins_loaded', 'wds_rps_load_plugin_textdomain' );


// Register Subpage menu on settings
add_action( 'admin_menu', 'wds_rps_register_subpage' );

// Change menu labels
add_action( 'admin_menu', 'wds_rps_change_admin_menu_labels' );

// Change post labels
add_action( 'init', 'wds_rps_change_post_labels' );

// Callback funtion that register the new subpage
function wds_rps_register_subpage() {
	add_options_page(
		__('Rename Post Labels', 'rename-post-labels-by-wowdevshop'),
		__('Rename Post Labels', 'rename-post-labels-by-wowdevshop'),
		'administrator', 'rename-post-labels', 'wds_rps_RenamePostLabels');
}


function wds_rps_RenamePostLabels() {
	if(isset($_POST['name']) && ($_POST['name']) ) {
		$data['name'] = sanitize_text_field( $_POST['name'] );
		$data['singular_name'] = sanitize_text_field( $_POST['singular_name'] );
		$data['add_new'] = sanitize_text_field( $_POST['add_new'] );
		$data['add_new_item'] = sanitize_text_field( $_POST['add_new_item'] );
		$data['edit_item'] = sanitize_text_field( $_POST['edit_item'] );
		$data['new_item'] = sanitize_text_field( $_POST['new_item'] );
		$data['view_item'] = sanitize_text_field( $_POST['view_item'] );
		$data['search_items'] = sanitize_text_field( $_POST['search_items'] );
		$data['not_found'] = sanitize_text_field( $_POST['not_found'] );
		$data['not_found_in_trash'] = sanitize_text_field( $_POST['not_found_in_trash'] );
		$data['menu_icon'] = sanitize_text_field( $_POST['menu_icon']);

		update_option('RenamePostLabels', $data);

		echo '<h2>Labels changed successfully</h2>';
		echo("<meta http-equiv='refresh' content='0'>");

	}
	else {
		$data =  get_option('RenamePostLabels');
	}

	$name = (isset($data['name']))? esc_html($data['name']) : __('Posts', 'rename-post-labels-by-wowdevshop');
	$singular_name = (isset($data['singular_name']))? esc_html($data['singular_name']) : __('Post', 'rename-post-labels-by-wowdevshop') ;
	$add_new = (isset($data['add_new']))? esc_html($data['add_new']) : __('Add New', 'rename-post-labels-by-wowdevshop');
	$add_new_item = (isset($data['add_new_item']))? esc_html($data['add_new_item']) : __('Add New Post', 'rename-post-labels-by-wowdevshop');
	$edit_item = (isset($data['edit_item']))? esc_html($data['edit_item']) : __('Edit Post', 'rename-post-labels-by-wowdevshop');
	$new_item = (isset($data['new_item']))? esc_html($data['new_item']) : __('New Post', 'rename-post-labels-by-wowdevshop');
	$view_item = (isset($data['view_item']))? esc_html($data['view_item']) : __('View Post', 'rename-post-labels-by-wowdevshop');
	$search_items = (isset($data['search_items']))? esc_html($data['search_items']) : __('Search Posts', 'rename-post-labels-by-wowdevshop');
	$not_found = (isset($data['not_found']))? esc_html($data['not_found']) : __('No posts found', 'rename-post-labels-by-wowdevshop');
	$not_found_in_trash = (isset($data['not_found_in_trash']))? esc_html($data['not_found_in_trash']) : __('No posts found in Trash', 'rename-post-labels-by-wowdevshop');

	$menu_icon = (isset($data['menu_icon']))? esc_html($data['menu_icon']) : __('dashicons-admin-post', 'rename-post-labels-by-wowdevshop');

	// Call the menu settings template
	include( 'includes/menu-settings.php' );

}


// Callback funtion that changes the admin menu labels
function wds_rps_change_admin_menu_labels() {
    global $menu;
    global $submenu;
	$data =  get_option('RenamePostLabels');
	if(current_user_can( 'edit_posts' )){
		if($data){
			$menu[5][0] = $data['name'];
			$submenu['edit.php'][5][0] = $data['name'];
			$submenu['edit.php'][10][0] = $data['add_new'];
			$submenu['edit.php'][16][0] = __('Tags', 'rename-post-labels-by-wowdevshop');
			echo '';
		}
	}
}

// Callback funtion that changes the label to the new ones
function wds_rps_change_post_labels() {
	global $wp_post_types;

	$labels = &$wp_post_types['post']->labels;
	$menu_icon = &$wp_post_types['post']->menu_icon;

	$data =  get_option('RenamePostLabels');

	$menu_icon = $data['menu_icon'];

	if($data){
		$labels->name = $data['name'];
		$labels->singular_name =  $data['singular_name'];
		$labels->add_new =  $data['add_new'];
		$labels->add_new_item =  $data['add_new_item'];
		$labels->edit_item =  $data['edit_item'];
		$labels->new_item =  $data['new_item'];
		$labels->view_item =  $data['view_item'];
		$labels->search_items =  $data['search_items'];
		$labels->not_found =  $data['not_found'];
		$labels->not_found_in_trash =  $data['not_found_in_trash'];
	}
}

?>
