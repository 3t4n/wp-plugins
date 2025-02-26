<?php
/*
 * Plugin Name: Admin menu remover
 * Plugin URI: https://wordpress.org/plugins/admin-menu-remover/
 * Description: Remove unnecessary items from admin section menus simply by ticking/unticking checkbox in the settings ui. After plugin is activated, go to settings -> admin menu remover to remove unwanted menu items.
 * Version: 1.0
 * Author: Timo Leppänen
 * Author URI: https://wordpress.org/support/profile/lepileppanen
 * License: GPLv2
 */

/*
 * Security Note:
 * Consider blocking direct access to your plugin PHP files by adding the following line at the top of each of them,
 * or be sure to refrain from executing sensitive standalone PHP code before calling any WordPress functions.
 */
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/*
 * All fields in array
 */
global $amr_data;
$amr_data = array(
	array(
		'name' => 'Dashboard', 
		'field' => 'dashboard', 
		'id' => 'amr_dashboard_remove', 
		'to_remove' => 'index.php', 
		'is_subpage' => false, 
		'parentpage' => '' 
	),
	array(
		'name' => 'Dashboard -> Home', 
		'field' => 'dashboard_home', 
		'id' => 'amr_dashboard_home_remove', 
		'to_remove' => 'index.php', 
		'is_subpage' => true, 
		'parentpage' => 'index.php' 
	),
	array(
		'name' => 'Dashboard -> Updates', 
		'field' => 'dashboard_updates', 
		'id' => 'amr_dashboard_updates_remove', 
		'to_remove' => 'update-core.php', 
		'is_subpage' => true, 
		'parentpage' => 'index.php' 
	),
	array(
		'name' => 'Posts', 
		'field' => 'posts', 
		'id' => 'amr_posts_remove', 
		'to_remove' => 'edit.php', 
		'is_subpage' => false, 
		'parentpage' => '' 
	),
	array(
		'name' => 'Posts -> All posts', 
		'field' => 'posts_all', 
		'id' => 'amr_posts_all_remove', 
		'to_remove' => 'edit.php', 
		'is_subpage' => true, 
		'parentpage' => 'edit.php' 
	),
	array(
		'name' => 'Posts -> Add new', 
		'field' => 'posts_new', 
		'id' => 'amr_posts_new_remove', 
		'to_remove' => 'post-new.php', 
		'is_subpage' => true, 
		'parentpage' => 'edit.php' 
	),
	array(
		'name' => 'Posts -> Categories', 
		'field' => 'posts_categories', 
		'id' => 'amr_posts_categories_remove', 
		'to_remove' => 'edit-tags.php?taxonomy=category', 
		'is_subpage' => true, 
		'parentpage' => 'edit.php' 
	),
	array(
		'name' => 'Posts -> Tags', 
		'field' => 'posts_tags', 
		'id' => 'amr_posts_tags_remove', 
		'to_remove' => 'edit-tags.php?taxonomy=post_tag', 
		'is_subpage' => true, 
		'parentpage' => 'edit.php' 
	),
	array(
		'name' => 'Media', 
		'field' => 'media', 
		'id' => 'amr_media_remove', 
		'to_remove' => 'upload.php', 
		'is_subpage' => false, 
		'parentpage' => '' 
	),
	array(
		'name' => 'Media -> Library', 
		'field' => 'media_library', 
		'id' => 'amr_media_library_remove', 
		'to_remove' => 'upload.php', 
		'is_subpage' => true, 
		'parentpage' => 'upload.php' 
	),
	array(
		'name' => 'Media -> Add new', 
		'field' => 'media_new', 
		'id' => 'amr_media_new_remove', 
		'to_remove' => 'media-new.php', 
		'is_subpage' => true, 
		'parentpage' => 'upload.php' 
	),
	array(
		'name' => 'Pages', 
		'field' => 'pages', 
		'id' => 'amr_pages_remove', 
		'to_remove' => 'edit.php?post_type=page', 
		'is_subpage' => false, 
		'parentpage' => '' 
	),
	array(
		'name' => 'Pages -> All pages', 
		'field' => 'pages_all', 
		'id' => 'amr_pages_all_remove', 
		'to_remove' => 'edit.php?post_type=page', 
		'is_subpage' => true, 
		'parentpage' => 'edit.php?post_type=page' 
	),
	array(
		'name' => 'Pages -> Add new', 
		'field' => 'pages_new', 
		'id' => 'amr_pages_new_remove', 
		'to_remove' => 'post-new.php?post_type=page', 
		'is_subpage' => true, 
		'parentpage' => 'edit.php?post_type=page' 
	),
	array(
		'name' => 'Comments', 
		'field' => 'comments', 
		'id' => 'amr_comments_remove', 
		'to_remove' => 'edit-comments.php', 
		'is_subpage' => false, 
		'parentpage' => ''
	),
	array(
		'name' => 'Appearance', 
		'field' => 'appearance', 
		'id' => 'amr_appearance_remove', 
		'to_remove' => 'themes.php', 
		'is_subpage' => false, 
		'parentpage' => '' 
	),
	array(
		'name' => 'Appearance -> Themes', 
		'field' => 'appearance_themes', 
		'id' => 'amr_appearance_themes_remove', 
		'to_remove' => 'themes.php', 
		'is_subpage' => true, 
		'parentpage' => 'themes.php' 
	),
	array(
		'name' => 'Appearance -> Customize', 
		'field' => 'appearance_customize', 
		'id' => 'amr_appearance_customize_remove', 
		'to_remove' => 'customize.php?return=%2F' . amr_get_home_dir() . '%2Fwp-admin%2F' . amr_get_current_file_name(), 
		'is_subpage' => true, 
		'parentpage' => 'themes.php' 
	),
	array(
		'name' => 'Appearance -> Widgets', 
		'field' => 'appearance_widgets', 
		'id' => 'amr_appearance_widgets_remove', 
		'to_remove' => 'widgets.php', 
		'is_subpage' => true, 
		'parentpage' => 'themes.php' 
	),
	array(
		'name' => 'Appearance -> Menus', 
		'field' => 'appearance_menus', 
		'id' => 'amr_appearance_menus_remove', 
		'to_remove' => 'nav-menus.php', 
		'is_subpage' => true, 
		'parentpage' => 'themes.php' 
	),
	array(
		'name' => 'Appearance -> Editor', 
		'field' => 'appearance_editor', 
		'id' => 'amr_appearance_editor_remove', 
		'to_remove' => 'theme-editor.php', 
		'is_subpage' => true, 
		'parentpage' => 'themes.php' 
	),
	array(
		'name' => 'Plugins', 
		'field' => 'plugins', 
		'id' => 'amr_plugins_remove', 
		'to_remove' => 'plugins.php', 
		'is_subpage' => false, 
		'parentpage' => '' 
	),
	array(
		'name' => 'Plugins -> Installed', 
		'field' => 'plugins_installed', 
		'id' => 'amr_plugins_installed_remove', 
		'to_remove' => 'plugins.php', 
		'is_subpage' => true, 
		'parentpage' => 'plugins.php' 
	),
	array(
		'name' => 'Plugins -> Add new', 
		'field' => 'plugins_addnew', 
		'id' => 'amr_plugins_addnew_remove', 
		'to_remove' => 'plugin-install.php', 
		'is_subpage' => true, 
		'parentpage' => 'plugins.php' 
	),
	array(
		'name' => 'Plugins -> Editor', 
		'field' => 'plugins_editor', 
		'id' => 'amr_plugins_editor_remove', 
		'to_remove' => 'plugin-editor.php', 
		'is_subpage' => true, 
		'parentpage' => 'plugins.php' 
	),
	array(
		'name' => 'Users', 
		'field' => 'users', 
		'id' => 'amr_users_remove', 
		'to_remove' => 'users.php', 
		'is_subpage' => false, 
		'parentpage' => '' 
	),
	array(
		'name' => 'Users -> All users', 
		'field' => 'users_allusers', 
		'id' => 'amr_users_allusers_remove', 
		'to_remove' => 'users.php', 
		'is_subpage' => true, 
		'parentpage' => 'users.php' 
	),
	array(
		'name' => 'Users -> Add new', 
		'field' => 'users_addnew', 
		'id' => 'amr_users_addnew_remove', 
		'to_remove' => 'user-new.php', 
		'is_subpage' => true, 
		'parentpage' => 'users.php' 
	),
	array(
		'name' => 'Plugins -> Profile', 
		'field' => 'users_profile', 
		'id' => 'amr_users_profile_remove', 
		'to_remove' => 'profile.php', 
		'is_subpage' => true, 
		'parentpage' => 'users.php' 
	),
	array(
		'name' => 'Tools', 
		'field' => 'tools', 
		'id' => 'amr_tools_remove', 
		'to_remove' => 'tools.php', 
		'is_subpage' => false, 
		'parentpage' => '' 
	),
	array(
		'name' => 'Tools -> Available tools', 
		'field' => 'tools_available', 
		'id' => 'amr_tools_available_remove', 
		'to_remove' => 'tools.php', 
		'is_subpage' => true, 
		'parentpage' => 'tools.php' 
	),
	array(
		'name' => 'Tools -> Import', 
		'field' => 'tools_import', 
		'id' => 'amr_tools_import_remove', 
		'to_remove' => 'import.php', 
		'is_subpage' => true, 
		'parentpage' => 'tools.php'
	),
	array(
		'name' => 'Tools -> Export', 
		'field' => 'tools_export', 
		'id' => 'amr_tools_export_remove', 
		'to_remove' => 'export.php', 
		'is_subpage' => true, 
		'parentpage' => 'tools.php'
	),
	array(
		'name' => 'Settings -> General', 
		'field' => 'settings_general', 
		'id' => 'amr_settings_general_remove', 
		'to_remove' => 'options-general.php', 
		'is_subpage' => true, 
		'parentpage' => 'options-general.php'
	),
	array(
		'name' => 'Settings -> Writing', 
		'field' => 'settings_writing', 
		'id' => 'amr_settings_writing_remove', 
		'to_remove' => 'options-writing.php', 
		'is_subpage' => true, 
		'parentpage' => 'options-general.php'
	),
	array(
		'name' => 'Settings -> Reading', 
		'field' => 'settings_reading', 
		'id' => 'amr_settings_reading_remove', 
		'to_remove' => 'options-reading.php', 
		'is_subpage' => true, 
		'parentpage' => 'options-general.php'
	),
	array(
		'name' => 'Settings -> Discussion', 
		'field' => 'settings_discussion', 
		'id' => 'amr_settings_discussion_remove', 
		'to_remove' => 'options-discussion.php', 
		'is_subpage' => true, 
		'parentpage' => 'options-general.php'
	),
	array(
		'name' => 'Settings -> Media', 
		'field' => 'settings_media', 
		'id' => 'amr_settings_media_remove', 
		'to_remove' => 'options-media.php', 
		'is_subpage' => true, 
		'parentpage' => 'options-general.php'
	),
	array(
		'name' => 'Settings -> Permalinks', 
		'field' => 'settings_permalink', 
		'id' => 'amr_settings_permalink_remove', 
		'to_remove' => 'options-permalink.php', 
		'is_subpage' => true, 
		'parentpage' => 'options-general.php'
	)
);

/**
 * Return the directory, where wp is installed without '/'-characters.
 *
 * Description.
 *
 * @since 1.0
 *
 * @return string directory name.
 */
function amr_get_home_dir () {
	$dir = home_url('/', 'relative');
	$dir = str_replace('/', '', $dir);
	return urlencode($dir);
}

/**
 * Return the file name, that is currently in use (including query string.
 *
 * Description.
 *
 * @since 1.0
 *
 * @return string file name with query string.
 */
function amr_get_current_file_name () {
	$file = $_SERVER['REQUEST_URI'];
	$file_array = explode('/', $file);
	return urlencode($file_array[count($file_array) - 1]);
}

/**
 * Function to actually remove the menu items.
 *
 * Uses array data to check which to remove.
 *
 * @since 1.0
 *
 * @global array $amr_data includes all the data for admin menus.
 *
 */
function amr_remove_menus(){
	global $amr_data;
	
	$options = get_option('amr');
	
	foreach($amr_data as $row) {
		if(isset($options[$row['field']])) {
			if($options[$row['field']] == 1) {
				if($row['is_subpage'] == false) {
					remove_menu_page( $row['to_remove'] );
				}
				else {
					remove_submenu_page( $row['parentpage'], $row['to_remove'] );
				}
			}
		}
	}
}
add_action( 'admin_init', 'amr_remove_menus' );

/**
 * Add menu item for plugin.
 *
 * @since 1.0
 */
function amr_add_to_settings_menu () {
	add_submenu_page( 
	'options-general.php', //parent slug
	'Admin menu remover', //page title
	'Admin menu remover', //menu title
	'remove_users', //capability
	'admin_menu_remover_settings_page', //subpage slug 
	'amr_build_admin_menu_remover_settings_page' //callback
	);
}
add_action( 'admin_menu', 'amr_add_to_settings_menu');

/**
 * Register settings.
 *
 * @since 1.0
 */
function amr_register_admin_menu_remover_settings(){
	register_setting( 'amr_options', 'amr' );
}
add_action('admin_init', 'amr_register_admin_menu_remover_settings');

/**
 * Wordpress related menu items settings explanation.
 *
 * @since 1.0
 */
function amr_echo_amr_wp() {
	echo '<p>Settings for Wordpress related menu items. Tick items you want to remove.<br/><strong>Settings top level item is not removable on purpose.</strong></p>';
}

/**
 * Creation of settings item, used with add_settings_field-function.
 *
 * @since 1.0
 */
function amr_echo_checkbox($args) {
	$options = get_option('amr');
	
	/*
	 *
	 * Get rid of PHP-warning
	 *
	 */
	if(!isset($options[$args['field']])) {
		$options[$args['field']] = 0;
	}
	?>
	<input type="checkbox" name="amr[<?php echo $args['field'] ?>]" value="1" <?php checked( $options[$args['field']], 1 ); ?>/>
	<?php
}

/**
 * Creation the admin menu remover settings form.
 *
 * @since 1.0
 * 
 * @global array $amr_data includes all the data for admin menus.
 */
function amr_build_admin_menu_remover_settings_page() {
	global $amr_data;
	
	echo '<form action="options.php" method="post">';
	settings_fields('amr_options');
	add_settings_section( 'amr_id', 'Admin menu remover options', 'amr_echo_amr_wp', 'admin_menu_remover_settings_page' );
	foreach ( $amr_data as $row ) {
		add_settings_field( $row['id'], $row['name'], 'amr_echo_checkbox', 'admin_menu_remover_settings_page', 'amr_id', $row);
	}
	
	do_settings_sections( 'admin_menu_remover_settings_page' );
	submit_button();
	
	echo '</form>';
}

?>