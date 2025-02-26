<?php
/*
* Plugin Name: About US Post Type
* Plugin URI: https://seosthemes.com/about-post-type
* Description: Simple WordPress About Post Type Plugin.
* Contributors: seosbg
* Author: seosbg
* Author URI: https://seosthemes.com/
* Text Domain: about-post-type
* Version: 1.0
* License: GPL2
*/


/****************************************************
Add Menu
****************************************************/

add_action('admin_menu', 'about_post_type_menu');

function about_post_type_menu() {
		add_menu_page('About Post Type', 'About Post Type', 'administrator', 'about-post-type-settings', 'about_post_type_settings_page', plugins_url('images/icon.png' , __FILE__ )
    );

    add_action('admin_init', 'about_post_type_seos_register_settings');
}

/****************************************************
Admin Enqueue Scripts
****************************************************/

add_action('admin_enqueue_scripts', 'about_post_type_seos_admin_scripts');

function about_post_type_seos_admin_scripts() {
 
    wp_enqueue_script('jquery');

	wp_enqueue_media();
	
	wp_enqueue_style('about_post_type_style', plugin_dir_url(__FILE__) . '/css/admin.css');

	wp_enqueue_script('about_post_type_script_load', plugin_dir_url(__FILE__) . '/js/admin.js', array(), '', true );

}


/****************************************************
WP Enqueue Scripts
****************************************************/

add_action('wp_enqueue_scripts', 'about_post_type_wp_scripts');

function about_post_type_wp_scripts(){
	
	wp_enqueue_style('about_post_type_style', plugin_dir_url(__FILE__) . '/css/style.css');
		
	wp_enqueue_script('jquery');

}


/****************************************************
Register Settings
****************************************************/

function about_post_type_seos_register_settings() {
    register_setting('about-post-type-settings', 'about_post_type_title');
    register_setting('about-post-type-settings', 'about_post_type_number');
}


/****************************************************
Add Form
****************************************************/

function about_post_type_settings_page() {
?>

    <div class="wrap about-post-type">

        <form action="options.php" method="post" role="form" name="about-post-type-form">
		
			<?php settings_fields( 'about-post-type-settings' ); ?>
			<?php do_settings_sections( 'about-post-type-settings' ); ?>
		
			<div>
				<a target="_blank" href="http://seosthemes.com/">
					<div class="btn s-red">
						 <?php _e('SEOS', 'about-post-type'); echo ' <img class="ss-logo" src="' . plugins_url( 'images/logo.png' , __FILE__ ) . '" alt="logo" />';  _e(' THEMES', 'about-post-type'); ?>
					</div>
				</a>
			</div>
			

	<!-- ------------------------------------------ About Post Type ------------------------------------------ -->		
				
			<h1><?php _e('About Post Type', 'about-post-type'); ?></h1>
			<div>	
				<table class="form-table">		
					<tr valign="top">   
						<th scope="row"><?php _e('Title of About Post Type section: ', 'about-post-type'); ?></th>
						<td>
							<input type="text" name="about_post_type_title" size="40" value="<?php echo  esc_attr(get_option('about_post_type_title')); ?>">
						</td>
					</tr>
					<tr valign="top">    
						<th scope="row"><?php _e('Number of the newest posts to be shown: ', 'about-post-type'); ?> </th>
						<td>	
							<input type="number" min="1" max="100" name="about_post_type_number" size="4" value="<?php echo  esc_attr(get_option('about_post_type_number')); ?>">
						</td>
					</tr>
					<tr valign="top">    
						<th scope="row"><?php _e('Include About Post Type: ', 'about-post-type'); ?> </th>
						<td>	
							<?php _e('Shortcode', 'about-post-type'); ?> : <textarea onClick="this.select();" readonly style="resize: none; background: #C6C6C6; padding: 5px; width: 130px; height: 33px;" > [about-post-type] </textarea>
						</td>
					</tr>
				</table>
			</div>
			
			<hr />
				
			<div style="margin-top: 20px;"><?php submit_button(); ?></div>
			
		</form>	
	</div>
	
	<?php } 

/****************************************************
Language Load
****************************************************/
	
	function about_post_type_language_load() {
		load_plugin_textdomain('about_post_type_language_load', FALSE, basename(dirname(__FILE__)) . '/languages');
	}
	
	add_action('init', 'about_post_type_language_load');

	
// ************** Include **************

include_once(plugin_dir_path(__FILE__) . 'inc/class-about-post-type.php');	
include_once(plugin_dir_path(__FILE__) . 'inc/thumbnails.php');
include_once(plugin_dir_path(__FILE__) . 'inc/front-end.php');