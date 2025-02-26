<?php
/**
 * Plugin Name: All Social Share Options
 * Plugin URI: http://codiblog.com
 * Description: All Social share option include latest tweet, instagram photos and 30+ 3 stylish social share count
 * Version: 1.0
 * Author: MD Jillur Rahman
 * Author URI: http://themeratio.com
 * License: GPL2
 */
 
//  Version and name
	define ('ASSO_Plugin' , 'ASSO' );
	define ('ASSO_Plugin_ver' , '1.0.0' );
	
// Shortcode Support
	include_once('includes/shortcodes/shortcodelist.php');
	include_once('includes/shortcodes/shortcodes.php');
	
// Included File and Options
function asso_script() {

		if ( !is_admin() ) {

			//JS File
			wp_enqueue_script('jquery');
			wp_enqueue_script( 'main', plugins_url( '/preview/js/main.js', __FILE__ ), array( 'jquery' ), ASSO_Plugin_ver, true );
			
			//Css File
			wp_enqueue_style( 'main-style', plugins_url( '/preview/css/style.css', __FILE__ ) );	
			wp_enqueue_style( 'font-awesome', plugins_url( '/preview/css/fontawesome/css/font-awesome.css', __FILE__ ) );
			
			// Social Option
			$interval    = (get_option('asso_interval') == '') ? themeratio : get_option('asso_interval');
			$twittercount   = (get_option('asso_twittercount') == '') ? 5 : get_option('asso_twittercount');
			$config_array = array(
				'interval' => $interval,
				'twittercount' => $twittercount,
			);
			wp_localize_script('main', 'setting', $config_array);
			
		}
	
	}
add_action( 'wp_enqueue_scripts', 'asso_script' );

// Add css to admin menu	
	add_action( 'admin_enqueue_scripts', 'asso_admin_css_styles' );
	function asso_admin_css_styles() {
		wp_enqueue_style( 'plugin_css', plugins_url( 'preview/css/plugin_css.css', __FILE__ ) );	
	}
	
// Admin Menu
	add_action('admin_menu', 'asso_settings');
	function asso_settings() {
		add_menu_page('All Social Setting', 'All Social Setting', 'administrator', 'asso_sc_settings', 'asso_sc_display_settings', 'dashicons-share', 90);
	}	
	
// Display Setting
	function asso_sc_display_settings() {
		$interval = (get_option('asso_interval') != '') ? get_option('asso_interval') : 'codiblog';
		$twittercount = (get_option('asso_twittercount') != '') ? get_option('asso_twittercount') : '5';

		$html = '</pre>
				<div class="wrap"><form action="options.php" method="post" name="options">
					' . wp_nonce_field('update-options') . '
					<table class="form-table" width="100%" cellpadding="10">
						<tbody>
							<tr>
								<td scope="row" align="left">
									<label><h2>Twitter Options</h2></label>
								</td>
							</tr>
							<tr>
								<td scope="row" align="left">
									<label>Any Twitter Username </label><input type="text" name="asso_interval" value="' . $interval . '" />
								</td>
							</tr>
							<tr>
								<td scope="row" align="left">
									<label>Twitter Tweet Display Number </label><input type="text" name="asso_twittercount" value="' . $twittercount . '" />
								</td>
							</tr>
							<tr>
								<td scope="row" align="left">
									<b style="font-size: 20px;margin: 0 10px 0 0;">Instaram Options:-</b> Purchase Maria for unblock all features								
								</td>
							</tr>
							<tr>
								<td scope="row" align="left">
									<b style="font-size: 20px;margin: 0 10px 0 0;">30+ Social Count Options:-</b> Purchase Maria for unblock all features									
								</td>
							</tr>
							<tr>
								<td scope="row" align="left">
									<b style="font-size: 20px;margin: 0 10px 0 0;">Documentation:-</b> <a href="http://www.codiblog.com/2015/11/all-social-share-options-wordpress-plugins.html" target="_blank">Read this how to use this free plugin</a>									
								</td>
							</tr>
							<tr>
								<td scope="row" align="left">
									<b style="font-size: 20px;margin: 0 10px 0 0;">Lifetime Support:-</b> If you face any problem or just want to say hello, pls <a href="http://www.codiblog.com/2015/11/all-social-share-options-wordpress-plugins.html" target="_blank">Contact with us</a>									
								</td>
							</tr>
							
						</tbody>
					</table>
					
					<input type="hidden" name="action" value="update" />

					<input type="hidden" name="page_options" value="asso_twittercount,asso_interval" />

					<input type="submit" name="Submit" value="Update" /></form></div>
					
					<div class="asso-plugin-content">
						<h2>Premium Plugins</h2>
						<div class="asso-plugin-wrapper">
							<ul>
								<li>
									<a target="_blank" href="http://codecanyon.net/item/maria-all-in-one-social-share-wordpress-plugin/13572307?ref=ThemeRatio"><img src="' . plugins_url( 'images/maria.png', __FILE__ ) . '"/></a>
									<div class="asso_content">
										<large><a target="_blank" href="http://codecanyon.net/item/maria-all-in-one-social-share-wordpress-plugin/13572307?ref=ThemeRatio">Maria - All in One Social Share WordPress Plugin</a></large>
										<p>
											Maria is a first all in one social sharing WordPress Plugin integrated with lot of designs. It will increase your social sharing visibility.
										</p>
									</div>
								</li>
							</ul>
						</div>
					</div>
					
				<pre>
				';

				echo $html;
	}