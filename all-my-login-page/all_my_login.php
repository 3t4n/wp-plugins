<?php 
/**
* Plugin Name: All my login page.
* Plugin URI: http://aplswd.com
* Description: Hide all your wordpress
* Version: 1.2
* Author: Pranav Saraf
* Author URI: http://pranavsaraf.com
* Network: Optional. Whether the plugin can only be activated network wide. Example: true
* License: A short license name. Example: GPL2
*/ 
error_reporting(-1);
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
// site, since it is in a file that is normally only loaded in the admin.
// require_once(dirname( __FILE__ ) . "/req.php");
if ( ! function_exists( 'get_plugins' ) ) {
require_once ABSPATH . 'wp-admin/includes/plugin.php';
}

require_once(dirname( __FILE__ ) . "/all_my_options.php");

function all_my_add_stylesheet(){
$all_my_css = get_option("all_my_css","login.css");
 wp_enqueue_style("all-my-button",plugin_dir_url( __FILE__ ) .'css/buttons.min.css');   
 wp_enqueue_style("all-my-login-min",plugin_dir_url( __FILE__ ) .'css/login.min.css');   
 wp_enqueue_style("all-my-login",plugin_dir_url( __FILE__ ) .'css/'.$all_my_css);   

}
if ( ! has_action( 'login_enqueue_scripts', 'wp_print_styles' ) )
add_action( 'login_enqueue_scripts', 'wp_print_styles', 11 );
add_action('login_enqueue_scripts', 'all_my_add_stylesheet',0);
//*custom login for theme *//
function all_my_childtheme_custom_login() {
   
// all_my_add_stylesheet();
$img_path1 = get_option('all_my_image_logo');
$img_path2 = get_option('all_my_image_background');


    if(!empty($img_path2))
{
$url = $img_path2;
}
else{
$url =plugin_dir_url( __FILE__ ) .'image/abstract-blurred-background.jpg';
}
if(!empty($img_path1))
{
$logo  = $img_path1;
}
else{
$logo = plugin_dir_url( __FILE__ ) .'image/invisible-logo.png';
}

echo '<style type="text/css">
body.login { background:none; } html { background: url("'.$url.'") no-repeat center center fixed; background-size: cover; } .login label, #reg_passmail { color: #ffffff; } .login form { background: #212121; } #nav{ color: rgba(255, 255, 255, 0.25); } .login #backtoblog a, .login #backtoblog a:hover, .login #nav a, .login #nav a:hover, .login #nav, div.updated, .login .message, .login #login_error a, div.error, .login #login_error { color: #ffffff } .login #wp-submit { color: #ffffff; background: #1e73be; }
html {
background: url("'.$url.'") no-repeat center center fixed;
background-size: cover;
}
.login #nav{
margin-top:-5px;
padding:10px;
background:#212121;
}
#backtoblog{display:none;}
.login .message{
background: #212121;
padding: 15px;
font-size: 14px;}
.login #login_error{background: #FD6E6E;
font-size: 14px;
padding: 15px;}
.login h1 a{background-image: none,url("'.$logo.'");display:block !important;}
</style>';


}
add_action('login_head', 'all_my_childtheme_custom_login');



// Register the new dashboard widget with the 'wp_dashboard_setup' action

add_action('admin_init', 'all_my_meta_box' );
function all_my_meta_box(){
add_meta_box('dashboard_widget', 'Offers', 'all_my_dashboard_widget_function', 'dashboard', 'side', 'high');
add_meta_box('dashboard_widget_subscribe', 'Subscribe', 'all_my_dashboard_widget_subscribe', 'dashboard', 'side', 'high');
add_meta_box('dashboard_widget', 'Offers', 'all_my_dashboard_widget_function', 'post', 'advanced', 'low');
add_meta_box('dashboard_widget', 'Offers', 'all_my_dashboard_widget_function', 'page', 'advanced', 'low');
add_meta_box('dashboard_widget', 'Offers', 'all_my_dashboard_widget_function', 'product', 'advanced', 'low');
}


function all_my_dashboard_widget_function( $post, $callback_args ) {
	echo '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- baby ad -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-6487900944251457"
     data-ad-slot="2687339698"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
<div id="my_section" ></div>
<script>
jQuery.ajax({url: "http://aplswd.com/offers/index.php", success: function(result){
   jQuery(#my_section).html();
    }});
</script>

';
}
function all_my_dashboard_widget_subscribe( $post, $callback_args ) {
	echo '
<!-- Begin MailChimp Signup Form -->
<link href="//cdn-images.mailchimp.com/embedcode/slim-081711.css" rel="stylesheet" type="text/css">
<style type="text/css">
	#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
	/* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
	   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
</style>
<div id="mc_embed_signup">
<form action="//aplswd.us11.list-manage.com/subscribe/post?u=b6748402c2028673acfb1a60e&amp;id=23983b5a50" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
    <div id="mc_embed_signup_scroll">
	<label for="mce-EMAIL">Subscribe to our mailing list</label>
	<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;"><input type="text" name="b_b6748402c2028673acfb1a60e_23983b5a50" tabindex="-1" value=""></div>
    <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
    </div>
</form>
</div>

<!--End mc_embed_signup-->
';
}
?>