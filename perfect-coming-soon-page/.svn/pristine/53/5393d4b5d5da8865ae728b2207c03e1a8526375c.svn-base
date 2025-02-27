<?php
/*
Plugin Name: Perfect Coming Soon Page
Plugin URI: https://profiles.wordpress.org/paramsheoran
Description: Perfect Coming Soon Page plugin is the light weighted utility that enables Maintenace Mode, Under Construction Mode, Coming Soon Mode on your website/blog/shop.
Author: param sheoran
Version: 1.0
Author URI: http://paramsheoran.com
*/
 
// Exit if accessed directly.
if( !defined( 'ABSPATH' ) ) exit;
 
function contentcomingsoon() {
    $file = plugin_dir_path(__FILE__).'templates/template-coming-soon-page.php'; 
				   include($file);
				   exit();
} 

function perfectcomingsoon() {
	if(!is_user_logged_in()){
     echo contentcomingsoon();
		exit;
	}                                             
}

add_action('template_redirect', 'perfectcomingsoon'); 
 
// registering menu 
 add_action('admin_menu', function() {
    add_options_page( 'Perfect Coming Soon settings', 'Perfect Coming Soon Page', 'manage_options', 'perfect-coming-soon', 'perfect_coming_soon_page' );
});
 
 
add_action( 'admin_init', function() {
	 register_setting( 'perfect-coming-soon-settings', 'title_main_heading' );  
	 register_setting( 'perfect-coming-soon-settings', 'pcsp_bg_image_url' ); 
	 register_setting( 'perfect-coming-soon-settings', 'description_content_block' ); 
    register_setting( 'perfect-coming-soon-settings', 'google_plus_url' );
    register_setting( 'perfect-coming-soon-settings', 'facebook_page_url' );
    register_setting( 'perfect-coming-soon-settings', 'twitter_handle_url' ); 
});


// Add settings link on plugin page
function pcsp_settings_link($links) { 
  $settings_link = '<a href="options-general.php?page=perfect-coming-soon">Settings</a>'; 
  array_unshift($links, $settings_link); 
  return $links; 
}
 
$plugin = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$plugin", 'pcsp_settings_link' );

 
add_option( 'pcsp_bg_image_url', 'https://plugins.svn.wordpress.org/perfect-coming-soon-page/trunk/images/bg.jpg', '', 'yes' );
add_option( 'title_main_heading', 'We are Coming Soon !', '', 'yes' );
add_option( 'title_main_heading', 'We are a great business & getting make over. We will be back with something great shortly. Edit this text from Settings > Perfect Coming Soon Page', '', 'yes' );
 
function perfect_coming_soon_page() {
  ?>
    <div class="wrap">
      <form action="options.php" method="post">
 
        <?php
          settings_fields( 'perfect-coming-soon-settings' );
          do_settings_sections( 'perfect-coming-soon-settings' );
        ?>
        <table>
             <h2>Welcome to Perfect Coming Soon Page Settings </h2>
			<br>
			<tr>
                <th>Title Heading</th>
                <td><input type="text" placeholder="coming soon" name="title_main_heading" value="<?php echo esc_attr( get_option('title_main_heading') ); ?>" size="50" /></td>
            </tr>
			
			<tr>
                <th>Paste Background Image URL/Link</th>
                <td><input type="text" placeholder="background image url" name="pcsp_bg_image_url" value="<?php echo esc_attr( get_option('pcsp_bg_image_url') ); ?>" size="50" /></td>
            </tr>
         
            <tr>
                <th>Enter Detailed Message</th>
				<td> 
				<textarea placeholder="Detailed Description" name="description_content_block" rows="5" cols="40"><?php echo esc_attr( get_option('description_content_block') ); ?></textarea>
				
				</td>
          </tr>
			<tr>
                <th>Your Facebook URL</th>
                <td><input type="text" placeholder="URL" name="facebook_page_url" value="<?php echo esc_attr( get_option('facebook_page_url') ); ?>" size="50" /></td>
          </tr>
		  <br>
		  <tr>
                <th>Your Twitter URL</th>
                <td><input type="text" placeholder="URL" name="twitter_handle_url" value="<?php echo esc_attr( get_option('twitter_handle_url') ); ?>" size="50" /></td>
          </tr>
                <tr>
                <th>Your G+ URL</th>
                <td><input type="text" placeholder="title for coming soon" name="google_plus_url" value="<?php echo esc_attr( get_option('google_plus_url') ); ?>" size="50" /></td>
            </tr>
		  <tr>
                <td><?php submit_button(); ?></td>
            </tr>
 
        </table>
 
      </form>
    </div>
  <?php
}

 
