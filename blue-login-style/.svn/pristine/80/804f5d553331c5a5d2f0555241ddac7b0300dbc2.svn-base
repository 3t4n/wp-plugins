<?php
	// Exit if accessed directly
	if ( ! defined( 'ABSPATH' ) ) exit;

	//include plugin setting functions
	include( plugin_dir_path(__FILE__) . 'blue-settings.php');

	//include switch theme functions
	include( plugin_dir_path(__FILE__) . 'blue-switch-theme.php');

	//include about page functions
	include( plugin_dir_path(__FILE__) . 'blue-about-page.php');

	//create plugin menu
	add_action('admin_menu', 'blue_login_create_menu');
	function blue_login_create_menu() {

		add_menu_page(__( 'Login Themes', 'alimir' ), __( 'Login Themes', 'alimir' ), 'manage_options', 'blue-login-themes', 'blue_login_switch_theme', 'dashicons-lightbulb');
		
		add_submenu_page('blue-login-themes', __( 'Login Options', 'alimir' ), __( 'Login Options', 'alimir' ), 'manage_options', 'blue-login-options', 'blue_login_settings_page');	
		
		add_submenu_page('blue-login-themes', __( 'About Blue Login', 'alimir' ), __( 'About Blue Login', 'alimir' ), 'manage_options', 'about-blue-login', 'blue_login_about_page');	
		
		add_action( 'admin_init', 'blue_login_register_mysettings' );
		
	}

	//add new theme on wp-login.php
	add_action('login_enqueue_scripts', 'blue_login_custom_style');
	function blue_login_custom_style()
	{
		$options = get_option('blue_default_theme');
		$themes = array('BlueWorld','DarkLight','SimpleBlue','BlueMount','WoodStyle','BlurPurple','SimpleFlat','SimpleOutLine');
		
		if($options != ''):
		foreach ($themes as $theme) {
			if($options ==  $theme)
			echo '<link rel="stylesheet" type="text/css" href="' . plugins_url('assets/css/'.$theme.'.css', dirname(__FILE__)) . '" />';
		}
		endif;
		
		if ( is_rtl()) {
			if($options == "BlueWorld")
			echo '<link rel="stylesheet" type="text/css" href="' . plugins_url('assets/css/rtl.css', dirname(__FILE__)) . '" />';
			else
			echo '<link rel="stylesheet" type="text/css" href="' . plugins_url('assets/css/rtl2.css', dirname(__FILE__)) . '" />';
		}
		
	}

	//add new logo on wp-login.php
	add_action('login_enqueue_scripts', 'blue_login_custom_setting');
	function blue_login_custom_setting()
	{

		$img_url = get_option('blue_upload_logo');
		
		if ($img_url != '') {
			$imgwidth         = blue_login_get_attachment_id($img_url);
			$image_attributes = wp_get_attachment_image_src($imgwidth,'full');
			$width            = $image_attributes[1];
			$height           = $image_attributes[2];
			
		} else {
			$img_url = plugins_url('assets/images/Blue-Login-Logo.png', dirname(__FILE__));
			$width                = 250;
			$height               = 63;
		}
		
		?>
		<style type="text/css">
			<?php
			if(get_option('blue_custom_style') != null && get_option('blue_upload_background') != null):
			$repeat = blue_login_repeat_option();
			$position = blue_login_position_option();
			?>
			body.login, html {
				background: url(<?php echo get_option('blue_upload_background'); ?>) <?php echo $repeat . ' ' . $position; ?>;
				<?php if($repeat == 'no-repeat') :?>
				-webkit-background-size: cover;
				-moz-background-size: cover;
				background-size: cover;
				<?php endif; ?>
			}
			<?php endif; ?>
			body.login div#login h1 a {
				background-image: url(<?php echo $img_url; ?>);
				height:<?php echo $height; ?>px;
				width:<?php echo $width; ?>px;
				background-size:auto;
				margin-top:10px;
				margin-left: auto;
				margin-right: auto;
				padding-bottom:10px;
			}
		</style>
		<?php
	}

	//get attachment id
	function blue_login_get_attachment_id($attachment_url)
	{
		global $wpdb;
		$attachment_id = false;
		
		// If there is no url, return.
		if ('' == $attachment_url)
			return;
		
		// Get the upload directory paths
		$upload_dir_paths = wp_upload_dir();
		
		// Make sure the upload path base directory exists in the attachment URL, to verify that we're working with a media library image
		if (false !== strpos($attachment_url, $upload_dir_paths['baseurl'])) {
			
			// If this is the URL of an auto-generated thumbnail, get the URL of the original image
			$attachment_url = preg_replace('/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $attachment_url);
			
			// Remove the upload path base directory from the attachment URL
			$attachment_url = str_replace($upload_dir_paths['baseurl'] . '/', '', $attachment_url);
			
			// Finally, run a custom database query to get the attachment ID from the modified attachment URL
			$attachment_id = $wpdb->get_var($wpdb->prepare("SELECT wposts.ID FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta WHERE wposts.ID = wpostmeta.post_id AND wpostmeta.meta_key = '_wp_attached_file' AND wpostmeta.meta_value = '%s' AND wposts.post_type = 'attachment'", $attachment_url));
			
		}
		
		return $attachment_id;
	}