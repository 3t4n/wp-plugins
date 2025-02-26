<?php
/*
Plugin Name: Simple Video Monetization 
Version: 1.1.2
Plugin URI: https://ingolin.com
Author: inGolin.com
Author URI: https://ingolin.com
Description: Monetize any video with <strong>Leaderboard Banner ads</strong> and popups ads, Add Custom Anti AdBlock any Video - AdClick  Simple Video Monetization. Free Version Supported Services 1. YouTube 2. Vimeo 3.Dailymotion - Pro Version Supported Services more than 1000 Video Sharing Websites 1. Openload 2. Google Drive 3.Streamango etc...
Text Domain: adreclick-free
Domain Path: languages
*/

// Import Javascript
add_action( 'wp_enqueue_scripts', 'video_AdClickFree_script' );
function video_AdClickFree_script() {
	wp_enqueue_style( 'video-AdClickFree-css', plugin_dir_url( __FILE__ ) .  '/css/adclick-free.css' );

        $AdClickFreeonline = get_option('video-AdClickFree-online');
        if ($AdClickFreeonline === 'on') {
	wp_enqueue_script( 'video_AdClickFree_localized', plugin_dir_url( __FILE__ ) .  '/js/adclick-free.js', array( 'jquery' ) );
}
	wp_localize_script('video_AdClickFree_localized', 'VideoAdClickFreeAds', array( 'AdClickFree_inner_html' => get_option('video-AdClickFree-inner-html'), 'AdClickFree_close_button' => get_option('video-AdClickFree-display-close-btn')
    	));
        
        echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
        $(document).ready(function() {
        $(".video-AdClickFree-front").click(function() {
        $(this).hide(1000) 
            });
        });
        </script>
        <script>
        $(document).ready(function() {
        $(".video-AdClickFree-front").attr({"target" : "_blank"})
        })
        </script>'; 
  
  	// Enqueued script with localized data.
	wp_enqueue_script( 'video_AdClickFree_localized' );
 }

// Create Custom Plugin Settings Menu
add_action('admin_menu', 'video_AdClickFree_create_menu');
function video_AdClickFree_create_menu() {
    
	//create new top-level menu
	add_options_page(' AdClick Free Settings', ' AdClick Free Settings', 'administrator', __FILE__, 'video_AdClickFree_settings_page');
	
	//call register settings function
	add_action( 'admin_init', 'video_AdClickFree_register_mysettings' );
}
 
// Plugin Setting Menu
function video_AdClickFree_settings_page() {
?>
<div class="wrap">
    <h2>AdClick Free Settings</h2>
    <div class="video-AdClickFree-ads-optionform-holder">
        <form method="post" action="options.php">
            <?php settings_fields( 'video-AdClickFree-settings' ); ?>
            <?php settings_fields( 'video-AdClickFree-settings' ); ?>
            <table class="form-table">
                <tr valign="top">
                <th scope="row">Check Box To Enable The Ads, Uncheck To Disable</th>
                <td><input type="checkbox" name="video-AdClickFree-online" <?php if ( get_option('video-AdClickFree-online') == 1 || get_option('video-AdClickFree-online') == 'on' ) echo 'checked="checked"'; ?> /></td>
                </tr>
                
                <tr valign="top">
                    <th scope="row">Enter The Ad Code <span style="color: #c90000;"><strong>(If the close button is not enabled, make sure to open all ads <span style="color: #c90000;">on new window.</span></strong> </th>
                    <td><textarea name="video-AdClickFree-inner-html" rows="8" style="width:100%; display:block"><?php echo get_option('video-AdClickFree-inner-html'); ?> </textarea><center>Enter Ads Code, Banner, Popups or Anti AdBlock Code for Videos. </center></td>
                </tr>
                
                <tr valign="top">
                    <th scope="row">Check To Display Close Button</th>
                    <td><input type="checkbox" name="video-AdClickFree-display-close-btn" <?php if ( get_option('video-AdClickFree-display-close-btn') == 1 || get_option('video-AdClickFree-display-close-btn') == 'on' ) echo 'checked="checked"'; ?> /></td>
                </tr>
                
                <tr valign="top">
                    <th scope="row">Check Box to Disable Ads On Video Start, Uncheck To Enable <span style="background-color: #ffff00;"><strong> </strong></span><a href="https://ingolin.com/" target="_blank" rel="noopener"><span style="background-color: #ffff00;"><strong>(Pro Version)</strong></span></a><span style="background-color: #ffff00;"><strong> </strong></span></th>
                    <td><input type="checkbox" name="video-AdClickFree-after-page-load" <?php if ( get_option('video-AdClickFree-after-page-load') == 1 || get_option('video-AdClickFree-after-page-load') == 'on' ) echo 'checked="checked"'; ?> /></td>
                </tr> 
                
                <tr valign="top">
                <th <h2><span style="color: #b50000;"><strong>Attention! Check Only One.</strong></span></h2></th>
                </tr>
                
                 <tr valign="top">
                    <th scope="row">Check To Display The Ads Every 40 Sec <span style="background-color: #ffff00;"><strong> </strong></span><a href="https://ingolin.com/" target="_blank" rel="noopener"><span style="background-color: #ffff00;"><strong>(Pro Version)</strong></span></a><span style="background-color: #ffff00;"><strong> </strong></span></th>
                    <td><input type="checkbox" name="video-AdClickFree-display-ad" <?php if ( get_option('video-AdClickFree-display-ad') == 1 || get_option('video-AdClickFree-display-ad') == 'on' ) echo 'checked="checked"'; ?> /></td>
                </tr>
                
                <tr valign="top">
                    <th scope="row">Check To Display The Ads Every 5 Min <span style="background-color: #ffff00;"><strong> </strong></span><a href="https://ingolin.com/" target="_blank" rel="noopener"><span style="background-color: #ffff00;"><strong>(Pro Version)</strong></span></a><span style="background-color: #ffff00;"><strong> </strong></span></th>
                    <td><input type="checkbox" name="video-AdClickFree-display-ad-one" <?php if ( get_option('video-AdClickFree-display-ad-one') == 1 || get_option('video-AdClickFree-display-ad-one') == 'on' ) echo 'checked="checked"'; ?> /></td>
                </tr>
 
                <tr valign="top">
                    <th scope="row">Check To Display The Ads Every 10 Min <span style="background-color: #ffff00;"><strong> </strong></span><a href="https://ingolin.com/" target="_blank" rel="noopener"><span style="background-color: #ffff00;"><strong>(Pro Version)</strong></span></a><span style="background-color: #ffff00;"><strong> </strong></span></th>
               <td><input type="checkbox" name="video-AdClickFree-display-ad-two" <?php if ( get_option('video-AdClickFree-display-ad-two') == 1 || get_option('video-AdClickFree-display-ad-two') == 'on' ) echo 'checked="checked"'; ?> /></td>
                </tr>               
 
                <tr valign="top">
                    <th scope="row">Check To Display The Ads Every 15 Min <span style="background-color: #ffff00;"><strong> </strong></span><a href="https://ingolin.com/" target="_blank" rel="noopener"><span style="background-color: #ffff00;"><strong>(Pro Version)</strong></span></a><span style="background-color: #ffff00;"><strong> </strong></span></th>
               <td><input type="checkbox" name="video-AdClickFree-display-ad-three" <?php if ( get_option('video-AdClickFree-display-ad-three') == 1 || get_option('video-AdClickFree-display-ad-three') == 'on' ) echo 'checked="checked"'; ?> /></td>
                </tr>               
 
                <tr valign="top">
                    <th scope="row">Check To Display The Ads Every 30 Min <span style="background-color: #ffff00;"><strong> </strong></span><a href="https://ingolin.com/" target="_blank" rel="noopener"><span style="background-color: #ffff00;"><strong>(Pro Version)</strong></span></a><span style="background-color: #ffff00;"><strong> </strong></span></th>
               <td><input type="checkbox" name="video-AdClickFree-display-ad-four" <?php if ( get_option('video-AdClickFree-display-ad-four') == 1 || get_option('video-AdClickFree-display-ad-four') == 'on' ) echo 'checked="checked"'; ?> /></td>
                </tr>
 
                <tr valign="top">
                    <th scope="row">Check To Display The Ads Every 60 Min <span style="background-color: #ffff00;"><strong> </strong></span><a href="https://ingolin.com/" target="_blank" rel="noopener"><span style="background-color: #ffff00;"><strong>(Pro Version)</strong></span></a><span style="background-color: #ffff00;"><strong> </strong></span></th>
               <td><input type="checkbox" name="video-AdClickFree-display-ad-five" <?php if ( get_option('video-AdClickFree-display-ad-five') == 1 || get_option('video-AdClickFree-display-ad-five') == 'on' ) echo 'checked="checked"'; ?> /></td>
                </tr>
              </table>
        <?php submit_button(); ?>
    </form>
    </div>
    
    <div class="video-AdClickFree-ads-righttip-holder">
        
Get <a href="https://ingolin.com/" target="_blank" rel="noopener">AdClick Pro</a>

Supported Services, more than 1000 Video Sharing Websites (Streaming Sites)
<ol>
 	<li>Openload</li>
 	<li>Streamango</li>
 	<li>Streamcherry</li>
 	<li>UpVID</li>
 	<li>THEVIDEO</li>
 	<li>YouTube</li>
 	<li>Google Drive etc..</li>
</ol>
       <h2>Need Help?</h2>
Get Help <a href="https://ingolin.com/support/" target="_blank" rel="noopener">Here</a>
<h3>Do You Like This plugin?</h3>
See More Plugins From <strong><a href="https://ingolin.com/" target="_blank" rel="noopener">inGolin.com</a></strong>

For Pro Plugin Click <a href="https://ingolin.com/" target="_blank" rel="noopener"><strong>Here</strong></a>

For Free Plugins Click <strong><a href="https://profiles.wordpress.org/leoluanelezi#content-plugins" target="_blank" rel="noopener">Here</a>
        </form>
    </div>
</div>

<style>
 .video-AdClickFree-ads-optionform-holder{
    display: block;
    float: left;
    width: 70%;
    margin: 0;
    padding: 10px;
}
.video-AdClickFree-ads-righttip-holder{
    display: block;
    float: left;
    width: 25%;
    background: #dedede;
    border: 1px solid #fff;
    -webkit-border-radius: 5px;
    border-radius: 5px;
    padding: 10px;
    margin: 0;
    margin-top: 30px;
}
@media screen and (max-width: 1080px) {
    .video-AdClickFree-ads-optionform-holder{
        width: 100%;
    }
    .video-AdClickFree-ads-righttip-holder{
        width: 100%;
    }
}   
</style>

<?php 
}

// AdClickFree Register settings
function video_AdClickFree_register_mysettings() {
    
	register_setting( 'video-AdClickFree-settings', 'video-AdClickFree-online' );
	
	register_setting( 'video-AdClickFree-settings', 'video-AdClickFree-inner-html' );
	
	register_setting( 'video-AdClickFree-settings', 'video-AdClickFree-display-close-btn' );
	
	register_setting( 'video-AdClickFree-settings', 'video-AdClickFree-after-page-load' );	
	
	register_setting( 'video-AdClickFree-settings', 'video-AdClickFree-display-ad' );

	register_setting( 'video-AdClickFree-settings', 'video-AdClickFree-display-ad-one' );
 
	register_setting( 'video-AdClickFree-settings', 'video-AdClickFree-display-ad-two' );
	
	register_setting( 'video-AdClickFree-settings', 'video-AdClickFree-display-ad-three' );
	
	register_setting( 'video-AdClickFree-settings', 'video-AdClickFree-display-ad-four' );
	
	register_setting( 'video-AdClickFree-settings', 'video-AdClickFree-display-ad-five' );	
}

?>