<?php
/*
	Plugin Name: GetResponse Footer SlideUp
	Plugin URI: http://wordpress.org/extend/plugins/getresponse-footer-slideup/
	Description: Footer Slideup Form is one of the best ways to ask your user to subscribe to your list without any interruption or blocking and this plugin does exactly that.  It adds GetResponse subscribe form in the footer of your Wordpress blog. <A HREF="http://imtips.co/go/gr">GetResponse</A> (Aff Link) is an autoresponders which allows you to send series of email message to subscribers.
	Author: Shabbir Bhimani
	Version: 0.3
	Author URI: http://imtips.co/
 */
if ( ! defined( 'WP_CONTENT_URL' ) )
    define( 'WP_CONTENT_URL', get_option( 'siteurl' ) . '/wp-content' );
if ( ! defined( 'WP_CONTENT_DIR' ) )
    define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );
if ( ! defined( 'WP_PLUGIN_URL' ) )
    define( 'WP_PLUGIN_URL', WP_CONTENT_URL. '/plugins' );
if ( ! defined( 'WP_PLUGIN_DIR' ) )
    define( 'WP_PLUGIN_DIR', WP_CONTENT_DIR . '/plugins' );

function grfs_header_elements()
{
$plugin_abs_url = WP_PLUGIN_URL.'/getresponse-footer-slideup';
?>
<link rel="stylesheet" href="<?php echo $plugin_abs_url; ?>/style.css" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo $plugin_abs_url; ?>/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="<?php echo $plugin_abs_url; ?>/js/jquery-cookie.js"></script>
<script type="text/javascript" src="<?php echo $plugin_abs_url; ?>/js/jquery-libs.js"></script>
<?php
}
function grfs_form()  {
$grfs_hiddenfields = get_option('grfs_hiddenfields');
if($grfs_hiddenfields =='') return;
?>
<div id="footerform">
	<div class="close">
		<div id="closefornow"> <a href="#" onclick="slidedown(); return false;">Close for now.</a></div>
	    <div id="dontshowanymore"><a href="#" onclick="slidedown(); return false;">Never show again.</a></div>
	</div>

	<div class="tagline"><?php $grfs_tagline=get_option('grfs_tagline'); echo $grfs_tagline==''?'Subscribe By Email for Weekly Updates.':$grfs_tagline; ?></div>

	<form accept-charset="utf-8" action="http://www.getresponse.com/add_contact_webform.html" method="post">
		<?php echo $grfs_hiddenfields ?>
		<input type="text" name="name" id="subscriber_name" class="formInputfooter formInputNamefooter" value="What is your name?" size="20" />
		<input type="text" name="email" id="subscriber_email" class="formInputfooter formInputEmailfooter" value="What is your email?" size="20" />
		<input type="submit" name="submit" class="formInputSubmitfooter" value="Subscribe Now !!!">
	</form>
<script type="text/javascript">var el=document.getElementById("custom_http_referer");if(el != null){el.value = document.location};</script>
</div>
<?
}
add_action ( 'wp_footer', 'grfs_form');
add_action ( 'wp_head', 'grfs_header_elements');
add_action ( 'admin_menu', 'grfs_plugin_menu');

function grfs_plugin_menu() {

	add_options_page('GetResponse Footer SlideUp', 'GetResponse Footer SlideUp', 'manage_options', 'grfs', 'grfs_plugin_options');
	add_action( 'admin_init', 'register_grfs_settings' );
}

function register_grfs_settings() {
	//register our settings
	register_setting( 'grfs-settings-group', 'grfs_tagline' );
	register_setting( 'grfs-settings-group', 'grfs_hiddenfields' );
}


function grfs_plugin_options() {
?>
<div class="wrap">
<p>Footer Slideup Form is one of the best ways to ask your user to subscribe to your list without any interruption or blocking and this plugin does exactly that.  It adds GetResponse subscribe form in the footer of your Wordpress blog. <A HREF="http://imtips.co/go/gr">GetResponse</A> (Aff Link) is an autoresponders which allows you to send series of email message to subscribers.</p>
<p>If you are still not using GetResponse for your blog and thinking of purchase you can use my affiliate <A HREF="http://imtips.co/go/gr/">link</A>.</p>
<p>For all your queries, help and support for plugin please post them in comments <A HREF="http://imtips.co/getresponse-footer-slideup.html" target="_blank">at my blog</A>. I will be actively supporting the plugin.</p>

<form method="post" action="options.php">
<?php settings_fields( 'grfs-settings-group' ); ?>
<table class="form-table">
<tr valign="top">
<th scope="row">Heading Tag Line (Optional)</th>
<td><input type="text" name="grfs_tagline" value="<?php echo get_option('grfs_tagline'); ?>" /></td>
</tr>
<tr valign="top">
<th scope="row">Hidden GetResponse Form Fields (Required)
<div style="font-weight:bold;color:red;padding-top:10px;">Generate an Inline form using the GetResponseInterface. Grab the HTML code of your Form and Search for Hidden form fields. You will see it just after after the <FORM> tag. Add all the Hidden Fields Code apart from the custom_http_referer hidden fields
</div></th>
<td>
<textarea name="grfs_hiddenfields" id="grfs_hiddenfields" rows="15" cols="90"  ><?php echo get_option('grfs_hiddenfields'); ?></textarea>
</td>
</tr>
</table>
<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="grfs_tagline,grfs_hiddenfields" />
<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</p>
</form>
</div>
<?
}
?>