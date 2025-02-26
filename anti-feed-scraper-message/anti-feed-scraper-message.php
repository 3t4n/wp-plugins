<?php
/*
Plugin Name: Anti Feed-Scraper Message
Version: 0.9.3
Description: Helps discourage your RSS feed from being "scraped" by automatically adding a customizable link at the bottom of all your posts, in the RSS feed.
Author: Joen
Author URI: http://noscope.com/
Plugin URI: http://noscope.com/?p=4721
*/


//load_plugin_textdomain('afs', NULL, dirname(plugin_basename(__FILE__)));



// Function
function insertFeedMessage($output) {
	
	/**
	* Show feed message if feed
	*/
	if ( is_feed() ) {
	
		$message = get_option('afs_message');
		
		// postname
		$message = str_replace("[postname]", '<a href="'.get_permalink().'" rel="bookmark">'.get_the_title().'</a>', $message);
		
		// sitename
		$message = str_replace("[sitename]", '<a href="'.get_bloginfo('home').'">'.get_bloginfo('name').'</a>', $message);
		
		// postdate
		$message = str_replace("[postdate]", get_the_time(get_option('date_format')), $message);

		// tweetthis
		$tweetthis = '<a href="http://twitter.com/home/?status=' . get_the_title() . ': '. get_bloginfo('url') . '/?p=' . get_the_ID() . '">Tweet This</a>';
		$message = str_replace("[tweetthis]", $tweetthis, $message);

	}
	

	/**
	* Output
	*/
	return $output . wpautop($message);


}

// Register functions
add_filter('the_content_feed', 'insertFeedMessage');






/*****************************
* Options Page
*/
// Options
$afs_plugin_name = __("Anti Feed-Scraper", 'afs');
$afs_plugin_filename = basename(__FILE__);

add_option("afs_message", "[postname] originally appeared on [sitename] on [postdate].", "", "yes");




function afs_admin_init() {
	if ( function_exists('register_setting') ) {
		register_setting('afs_settings', 'option-1', '');
	}
}
function add_afs_option_page() {
	global $wpdb;
	global $afs_plugin_name;

	add_options_page($afs_plugin_name . ' ' . __('Options', 'afs'), $afs_plugin_name, 8, basename(__FILE__), 'afs_options_page');
	
}
add_action('admin_init', 'afs_admin_init');
add_action('admin_menu', 'add_afs_option_page');



// Options function
function afs_options_page() {

	if (isset($_POST['info_update'])) {
			
		// Update options
		$afs_message = $_POST["afs_message"];
		update_option("afs_message", $afs_message);


		// Give an updated message
		echo "<div class='updated fade'><p><strong>" . __('Options updated', 'afs') . "</strong></p></div>";
		
	}

	// Show options page
	?>

		<div class="wrap">
		
			<div class="options">
		
				<form method="post" action="options-general.php?page=<?php global $afs_plugin_filename; echo $afs_plugin_filename; ?>">
			
				<h2><?php global $afs_plugin_name; printf(__('%s Settings', 'afs'), $afs_plugin_name); ?></h2>
	
		
					<h3><?php _e("Feed Message", 'afs'); ?></h3>
					<textarea cols="50" rows="10" name="afs_message" id="afs_message"><?php echo get_option('afs_message'); ?></textarea>

					
					<br />
					
					<p class="setting-description"><?php _e("Enter the message that will be shown after every post on your blog, but only in your feed. <strong>Remember</strong>, everybody can see this message, not only the 'scrape bots'."); ?>
					</p>
					<p class="setting-description"><?php _e("You can use these tags in your message: <code>[postname]</code>, <code>[sitename]</code>, <code>[postdate]</code>, <code>[tweetthis]</code>. They will be replaced with their counterparts. You can also use HTML, but remember to use inline CSS styles.", 'afs') ?></p>


		
					<p class="submit">
						<?php if ( function_exists('settings_fields') ) settings_fields('afs_settings'); ?>
						<input type='submit' name='info_update' value='<?php _e('Save Changes', 'afs'); ?>' />
					</p>
				
				</form>
				
				
			</div><?php //.options ?>
			
		</div>

<?php
}








?>