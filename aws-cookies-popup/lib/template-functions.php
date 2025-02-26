<?php
/**
 * Template functions for this plugin
 * 
 * Place all functions that may be usable in theme template files here.
 * 
 * @package Addweb Cookies Popup
 * 
 * @author Addwebsolution Pvt. Ltd.
 * @version 1.5
 * @since 1.0.0
 */

/**
* Prints scripts or data before the closing body tag on the front end.
*
* @since 1.5.1
*/
function cookie_popup_wp_footer() {
	if (!is_admin()) {
		global $AWSCookies;

		/* Get position of popup */
		if($AWSCookies->get_option( 'position' ) == 'top') {
			$position = 'top';
		} else {
			$position = 'bottom';
		}

    //Get default message...
    $message = $AWSCookies->get_option( 'message' );

    //Get default container type...
    $container = $AWSCookies->get_option( 'type' );

    //Get default container bg color...
    $bgcolor = $AWSCookies->get_option( 'bgcolor' );

    //Get default container font color...
    $fcolor = $AWSCookies->get_option( 'fcolor' );

	//Get default container font color...
    $bfcolor = $AWSCookies->get_option( 'bfcolor' );

    //Get default container font color...
    $title = $AWSCookies->get_option( 'title' );

    //Get default cookie expire time...
    $expire = $AWSCookies->get_option( 'expire' );

    //Get default Close Button Text...
    $closetext = $AWSCookies->get_option( 'closetext' );

    //Get default Close Button Text...
    $closecolor = $AWSCookies->get_option( 'closecolor' );
   
		//Display message belt...
		?><div id="aws_cookie" class="aws-cookie <?php echo $container; ?> <?php echo $position; ?>">
			<div class="popup-wrapper">
				<div class="popup-cookie">
					<?php if(!empty($title)) { ?><h4 id="aws_cookie_header"><?php echo $title; ?></h4><?php }?>
					<p><?php echo ($message); ?></p>
				</div>
				<div id="aws_cookie_accept" class="close-popup" title="Close cookie popup"><?php print($closetext);?></div>
			</div>
		</div>
		<input type="hidden" id="aws_close_bgcolor" value="<?php print($closecolor);?>">
		<input type="hidden" id="aws_close_text" value="<?php print($closecolor);?>">
		<input type="hidden" id="aws_popup_bgcolor" value="<?php print($bgcolor);?>">
		<input type="hidden" id="aws_popup_expire" value="<?php print($expire);?>">
		<input type="hidden" id="aws_popup_fcolor" value="<?php print($fcolor);?>">
		<input type="hidden" id="aws_popup_bfcolor" value="<?php print($bfcolor);?>"><?php
	}
}
add_action('wp_footer', 'cookie_popup_wp_footer');

/**
* Prints scripts or data on the front end.
*
* @since 1.5.0
*/
function ckeditor_plugin_admin_enqueue_scripts($hook) {
	//Include into this plugin setting page only 
	if ('settings_page_aws-cookies' != $hook ) {
      return;
  }
  //For color-picker
  wp_enqueue_style( 'wp-color-picker' );
  wp_enqueue_script('wp-color-picker', plugins_url(COOKIES_DIRNAME . '/js/wp-color-picker-script.js', __FILE__ ), array( 'farbtastic' ), false, true );

	//enqueue the script
  wp_enqueue_script( "ckeditor-message", plugins_url(COOKIES_DIRNAME . '/js/admin.js' ));
}
add_action( 'admin_enqueue_scripts' , 'ckeditor_plugin_admin_enqueue_scripts');










