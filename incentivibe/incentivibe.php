<?php
/*
Plugin Name: Incentivibe
Plugin URI: http://www.incentivibe.com
Description: Increase email leads and social media exposure by up to 400%!
Version: 1.0.3
Author: Incentivibe
Author URI: www.incentivibe.com
*/

define('INCENTIVIBE_VERSION', '1.0.2');

add_action('admin_menu', 'incentivibe_admin_menu');
add_action('wp_head', 'incentivibe_wp_head');

function incentivibe_admin_menu(){
	add_menu_page( __('Incentivibe'), __('Incentivibe'), 'manage_options', __FILE__, 'incentivibe_main_page', plugins_url( 'images/appicon.png', __FILE__ ) , 90);
	add_action('admin_init', 'incentivibe_register_settings');
}

function incentivibe_register_settings() {
	register_setting( 'incentivibe_main', 'incentivibe_header_code' );
}

function incentivibe_main_page() {
	?>
<style>
	p {
		font-family: "Trebuchet MS", Helvetica, sans-serif;
		font-size: 16px;
		line-height: 29px;
		width: 1000px;
		
	}
	h3 {
		font-size: 1.6em;
	}
</style>
<div class="wrap">
	<?php screen_icon('options-general'); ?>
	<h2><?php _e('Incentivibe'); ?></h2>

	<p><?php _e('
		Incentivibe is the first and only company in the world, which specializes in shared giveaways for small businesses. With Incentivibe\'s Shared Giveaways, small businesses become co-sponsors of a great prize by sharing a fraction (e.g. $19.99) of the prize cost with other small businesses (free trial available), and offer their visitors a legitimate chance to win that prize.
	'); ?></p>
	
	<h3><?php _e('How to Install?'); ?></h3>
	
	<p><?php _e('
		To install incentivibe, please click <a href="http://www.incentivibe.com/users/sign_up?provider=wordpress&utm_source=platform&utm_medium=wordpress-link&utm_campaign=wordpress-after-plugin-page" target="_blank">here</a> to register and generate a code. Paste the generated code in the space below and you are done!.
	'); ?></p>
	<form method="post" action="options.php">
		<?php settings_fields( 'incentivibe_main' ); ?>
		<?php /*do_settings( 'inscr_main' );*/ ?>
		<textarea name="incentivibe_header_code" cols="100" rows="10"><?php echo get_option('incentivibe_header_code'); ?></textarea>
		<?php submit_button(); ?>
	</form>

	<p><?php _e('Some text here'); ?></p>
</div>
<?php
}

function incentivibe_wp_head() {
	echo get_option('incentivibe_header_code')."\n";
}