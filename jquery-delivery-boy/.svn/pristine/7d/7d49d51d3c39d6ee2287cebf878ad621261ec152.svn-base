<?php
/*
Plugin Name: jQuery Delivery Boy
Plugin URI: http://kestrelid.com
Version: 0.3, 11/03/2011
Author: Ian Huet - http://www.kestrelid.com
Description: jQuery via Google CDN or WP local version depending on availability. Now with an admin options screen so you can pick the CDN version you want. Inspired by a www.Forrst.com conversation & a Chris Coyier code snippet on www.css-tricks.com.
*/


function jdboy_cdn_available( $url )
{
	if ( function_exists( 'curl_init' ) )
	{
		$ch = curl_init( $url );
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, TRUE);
		curl_setopt($ch, CURLOPT_NOBODY, TRUE);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

		$data = curl_exec($ch);
		curl_close($ch);

		if (! $data) {
			return 'Exec fail';
		}
		else {
			preg_match_all("/HTTP\/1\.[1|0]\s(\d{3})/", $data, $matches);
			$code = end($matches[1]);
			if ($code == 200) {
				return 1;
			}
			elseif ($code == 404) {
				return '404';
			}
			else {
				return "Unknown ($code:$data)";
			}
		}
	}
	else {
		return 'No cURL';
	}
}



function jquery_delivery_boy()
{
	$cdn = get_option( 'jdboy_script_path' );
	if( empty( $cdn ))
	{
		$cdn = 'http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js';
	}

	$result = jdboy_cdn_available( $cdn );
	if ( $result == 1 && ! is_admin()) {
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', $cdn, NULL, FALSE, FALSE );
	}
	wp_enqueue_script( 'jquery' );
}
add_action('init', 'jquery_delivery_boy');



function jdboy_option_page()
{

	if ( $_POST['submit'] && check_admin_referer( 'jdboy_setting_update' ))
	{
		update_option( 'jdboy_script_path', $_POST['jdboy_script'] );
		if($result = jdboy_cdn_available( get_option( 'jdboy_script_path' )))
		{
			$result = NULL;
			jquery_delivery_boy();
		}
		else
		{
?>
			<div id='message' class='updated'>ERROR - <?php echo $result; ?></div>
<?php
		}
	}
?>


	<div class='wrap'>
		<style type='text/css' rel='stylesheet'>
			.extended-text { width: 50em; }
		</style>

		<?php screen_icon(); ?>
		<h2>jQuery Delivery Boy - Settings</h2>
		<form action='' method='post' id='jdboy-script-option-form'>
			<h3><label for='jdboy_script'>Enter the full path to your preferred CDN jQuery script</label><br>
			<input name='jdboy_script' id='jdboy_script' value='<?php echo esc_attr(get_option('jdboy_script_path')); ?>' class='extended-text' type='text'></h3>
			<p><input name='submit' value='Update Setting' type='submit'></p>
			
			<?php wp_nonce_field( 'jdboy_setting_update' ); ?>
		</form>
	</div>
<?php
}



function jdboy_plugin_menu()
{
	add_options_page('jQuery Delivery Boy Settings', 'jDelivery Boy', 'manage_options', 'jdb-plugin', 'jdboy_option_page' );
}
add_action('admin_menu', 'jdboy_plugin_menu' );


?>