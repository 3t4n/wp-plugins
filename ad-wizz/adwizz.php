<?php 
session_start();
//error_reporting(0); // Disable error reporting... For debug mode please comment this line.


/*
Plugin Name: AdWizz
Plugin URI: 
Description: This plugin display a custom add page to your page visitors.
Version: 1.0
Author: wpwizz
Author URI: http://www.wpwizz.com/
Programed by: Marius Moiceanu (marius81@gmail.com) 
*/



add_filter('admin_head','zd_multilang_tinymce_addwizz');

function zd_multilang_tinymce_addwizz() {
	// conditions here
	wp_enqueue_script( 'common' );
	wp_enqueue_script( 'jquery-color' );
	wp_print_scripts('editor');
	if (function_exists('add_thickbox')) add_thickbox();
	wp_print_scripts('media-upload');
	if (function_exists('wp_tiny_mce')) wp_tiny_mce();
	wp_admin_css();
	wp_enqueue_script('utils');
	do_action("admin_print_styles-post-php");
	do_action('admin_print_styles');
}


$blog_url = get_bloginfo('wpurl');
$base_url_add = "wp-content/plugins/ad-wizz/";




$current_time = time();


add_action('admin_menu', 'show_config_page_addwizz');
 function show_config_page_addwizz() {

			global $wpdb;

			if ( function_exists('add_options_page') ) {

				add_options_page('AdWizz Configuration', 'AdWizz', 9, basename(__FILE__), 'show_page_add');

			}

			}



function show_page_add() { 

if (isset($_POST['expire']) || isset($_POST['forward_wizz']) || isset($_POST['redirect_wizz']) || isset($_POST['logged_in']) || isset($_POST['enable_ad'])) {

if (isset($_POST['expire'])) {
update_option('expire',$_POST['expire']);
}

if (isset($_POST['forward_wizz'])) {
update_option('forward_wizz',$_POST['forward_wizz']);
}

if (isset($_POST['redirect_wizz'])) {
update_option('redirect_wizz',$_POST['redirect_wizz']);
}

if (isset($_POST['enable_ad'])) {
update_option('enable_ad',$_POST['enable_ad']);
}

if (isset($_POST['logged_in'])) {
update_option('logged_in',$_POST['logged_in']);
}

$message_add = "<div id=\"message_add\" style='width:95%; background:#ABFEAF; text-align:center; padding:5px; margin-top:10px; margin-bottom:15px;'>Value updated</div>";
} else $message_add ="";


if (isset($_POST['content'])) {
update_option('content_add',$_POST['content']);
$message_add_content = "<div id=\"message_add\" style='width:95%; background:#ABFEAF; text-align:center; padding:5px; margin-top:10px; margin-bottom:15px;'>Value updated</div>";

} else $message_add_content ="";
?>

<script type="text/javascript"> 
$(document).ready(function() { 
$('#message_add').delay(2000).slideUp(1000);
});
</script>



<div class="wrap">
<div id="icon-options-general" class="icon32"><br /></div>
<h2>AdWizz</h2>

<?php 
echo $message_add;
echo $message_add_content;
include "../wp-content/plugins/ad-wizz/options.php";

}

$enable_ad = get_option('enable_ad');
if(!isset($enable_ad)) {
update_option('enable_ad','0');
}


if(!isset($_SESSION['time_add'])) {
$_SESSION['time_add'] = $current_time-10;
}




//echo time();
//echo "<br>".$_SESSION['time_add'];
//echo "add".$enable_ad;

function search_and_replace_add($post_title) {

global $wpdb,$blog_url,$base_url_add, $current_time, $enable_ad;

if ($_SESSION['time_add'] < $current_time) {

$expire = get_option('expire');

if(!isset($expire)) {
$expire = 120;
}


$post_title = $base_url_add."template.php?expire=".$expire."&link=".$post_title;

$content_addwizz =  get_option('content_add');
$content_addwizz = str_replace("\&quot;","",$content_addwizz);
$_SESSION['content_add'] = $content_addwizz;
$_SESSION['forward_wizz'] =  get_option('forward_wizz');
$_SESSION['redirect_wizz'] =  get_option('redirect_wizz');


}
 
return $post_title;
}

// I see if user is logged in 
function get_user_info() {
require (ABSPATH . WPINC . '/pluggable.php');
global $current_user;

wp_get_current_user();

if ( 0 == $current_user->ID ) {
 return 0;
} else {
 return 1;
}
}

$level_ad = get_user_info();
$is_logged_in = get_option('logged_in');
//echo "Sunt logat ".$is_logged_in.$level_ad;
if ($enable_ad == 1) {
  if ($level_ad <> 1 ||  $is_logged_in <> 1)  {
add_filter('the_permalink','search_and_replace_add',10);
}
}
?>