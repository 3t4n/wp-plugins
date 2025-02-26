<?php
/*
Plugin Name: Advanced Media Button Remover
Plugin URI: http://www.basis42.de/wordpress/media_button_remover/
Description: Removes selected media buttons from visual post editor
Version: 1.0.2
License: GPL
Author: Mario Rutz
Author URI: http://www.basis42.de/
*/

function advanced_media_button_remover_init() {
	// only add script if the user is able to use the editor
	if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
	return;
	wp_enqueue_script( 'advanced_media_button_remover', WP_PLUGIN_URL . '/advanced-media-button-remover/js/advanced_media_button_remover.js', array('jquery'));
}

add_action('init', 'advanced_media_button_remover_init');


// create custom plugin settings menu
add_action('admin_menu', 'advanced_media_button_remover_create_menu');

function advanced_media_button_remover_create_menu() {

	//create new top-level menu
	add_submenu_page('options-general.php', 'Advanced Media Button Remover Settings', 'Adv. Media Button Remover', 'administrator', __FILE__, 'advanced_media_button_remover_settings_page');

	//call register settings function
	add_action( 'admin_init', 'register_advanced_media_button_remover_settings' );
}

function register_advanced_media_button_remover_settings() {
	register_setting( 'advanced-media-button-remover-settings-group', 'advanced_media_button_remover_options' );
}

function adv_media_button_items(){
	$options = get_option('advanced_media_button_remover_options');
	echo json_encode($options);
	exit;
}

add_action('wp_ajax_adv_media_button_items', 'adv_media_button_items');

function advanced_media_button_remover_settings_page() {
?>

<form method="post" action="options.php">
<?php settings_fields( 'advanced-media-button-remover-settings-group' ); ?>
<?php $options = get_option('advanced_media_button_remover_options'); ?>

<div class="wrap">
<h2><?php echo __('Advanced Media Button Remover Settings') ?></h2>
<p><?php echo __('Please tick the button(s) you want to remove from the visual editors menu.') ?> 
<table class="form-table">
	<tr valign="top">
	<th scope="row"><img src="<?php echo 'images/media-button-image.gif' ?>"/> Image button</th>
		<td><input name="advanced_media_button_remover_options[image_button]" type="checkbox" value="1" <?php checked('1', $options['image_button']); ?> /></td>
	</tr>
	<tr valign="top">
	<th scope="row"><img src="<?php echo 'images/media-button-video.gif' ?>"/> Video button</th>
		<td><input name="advanced_media_button_remover_options[video_button]" type="checkbox" value="1" <?php checked('1', $options['video_button']); ?> /></td>
	</tr>
	<tr valign="top">
	<th scope="row"><img src="<?php echo 'images/media-button-music.gif' ?>"/> Music button</th>
		<td><input name="advanced_media_button_remover_options[music_button]" type="checkbox" value="1" <?php checked('1', $options['music_button']); ?> /></td>
	</tr>
	<tr valign="top">
	<th scope="row"><img src="<?php echo 'images/media-button-other.gif' ?>"/> Media button</th>
		<td><input name="advanced_media_button_remover_options[media_button]" type="checkbox" value="1" <?php checked('1', $options['media_button']); ?> /></td>
	</tr>
</table>
</p>
<p class="submit"><input type="submit" class="button-primary"
	value="<?php _e('Save Changes') ?>" /></p>

</form>

</div>

<?php  } ?>