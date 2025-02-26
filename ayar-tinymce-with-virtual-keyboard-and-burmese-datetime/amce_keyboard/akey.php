<?php
/*
Plugin Name: Ayar TinyMCE with Virtual Keyboard and Burmese DateTime
Plugin URI: http://www.ayarunicodegroup.com/
Description: Full version of TinyMCE Editor. Add RichText Editor to comment form, Automatic selection of Keyboard between English(US) and Burmese(Ayar). Displays a virtual, on-screen keyboard to enter the wordpress password in a safer way on login form, for example in internet cafés. Easy Typing in comment form with on-screen Keyboard. Support burmese language. No need to install Keyboard Input Method on your computer. New tinyMCE buttons for burmese date time and fonts. Every textarea and input attached with osk Keyboard.
Version: 1.0_beta
Author: Sithu Thwin
Author URI: http://www.myatsayar.com
Credits:TinyMCE, Ilya Lebedev, mk_is_here, Ko Soe Min, Saturngod.
Tested up to: 3.0.4
*/
if(defined('AKEY_VERSION')) return;
define('AKEY_VERSION', '1.0');
define('AKEY_PLUGIN_PATH', dirname(__FILE__));
define('AKEY_PLUGIN_FOLDER', basename(AKEY_PLUGIN_PATH));

if(defined('WP_ADMIN') && defined('FORCE_SSL_ADMIN') && FORCE_SSL_ADMIN){
    define('AKEY_PLUGIN_URL', rtrim(str_replace('http://','https://',get_option('siteurl')),'/') . '/'. PLUGINDIR . '/' . basename(dirname(__FILE__)) );
}else{
    define('AKEY_PLUGIN_URL', rtrim(get_option('siteurl'),'/') . '/'. PLUGINDIR . '/' . basename(dirname(__FILE__)) );
}
define('AMCEPATH',AKEY_PLUGIN_PATH.'/tiny_mce/');
define('AMCEURL',AKEY_PLUGIN_URL.'/tiny_mce/');
include (AKEY_PLUGIN_PATH.'/mmdate.php');
include (AKEY_PLUGIN_PATH.'/mcecomment.php');
include (AKEY_PLUGIN_PATH.'/mceoptions.php');
//include (AKEY_PLUGIN_PATH.'/defaultmce.php');

// prevent plugin from being used with wp versions under 2.5; otherwise do nothing!
global $wp_db_version;
if ( $wp_db_version >= 7558 ) {

// prevent file from being accessed directly

if ('akey.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not access this file directly. Thanks!');

define("AKEY_VERSION", 1);

function AKEY_mcebutton($buttons) {
	array_push($buttons,"Jsvk");
	return $buttons;
}
function AKEY_mcecss($mce_css) {
	$mce_css = AKEY_PLUGIN_URL.'/editor-style.css';
	return $mce_css;
}
function AKEY_mceplugin($ext_plu) {
	if (is_array($ext_plu) == false) {
		$ext_plu = array();
	}
	$url = AKEY_PLUGIN_URL."/tiny_mce/plugins/Jsvk/editor_plugin_admin.js";
	$result = array_merge($ext_plu, array("Jsvk" => $url));
	return $result;
}
function AKEY_fonts($initArray) {
$fonts= 'ဧရာ=ayar, ဧရာ ဂျူနို=ayar juno, ဧရာ တန်ခူး=ayar takhu, ဧရာ ကဆုန်=ayar kasone, ဧရာ နယုန်=ayar nayon, ဧရာ ဝါဆို=ayar wazo, ဧရာ ဝါေခါင်=ayar wagaung, ဧရာ ေတာ်သလင်း=ayar tawthalin, ဧရာ လက်နှိပ်စက်=ayar typewriter, sans-serif;Andale Mono=andale mono,times;Arial=arial,helvetica,sans-serif;Arial Black=arial black,avant garde;Book Antiqua=book antiqua,palatino;Comic Sans MS=comic sans ms,sans-serif;Courier New=courier new,courier;Georgia=georgia,palatino;Helvetica=helvetica;Impact=impact,chicago;Symbol=symbol;Tahoma=tahoma,arial,helvetica,sans-serif;Terminal=terminal,monaco;Times New Roman=times new roman,times;Trebuchet MS=trebuchet ms,geneva;Verdana=verdana,geneva;Webdings=webdings;Wingdings=wingdings,zapf dingbats';
	$initArray = array_merge($initArray,array("theme_advanced_fonts" => $fonts));
	return $initArray;
}
function AKEY_mceinit() {
/*Language loader*/
if (function_exists('load_plugin_textdomain')) {
        load_plugin_textdomain( 'akey', false, AKEY_PLUGIN_FOLDER . '/langs/');
}
	if ( 'true' == get_user_option('rich_editing') ) {
		add_filter("mce_external_plugins", "AKEY_mceplugin", 0);
		add_filter("mce_buttons", "AKEY_mcebutton", 0);
		add_filter("mce_css", "AKEY_mcecss", 1);
		add_filter("tiny_mce_before_init","AKEY_fonts",$initArray);
	}
}

function AKEY_script() {
?>


<?php
}
if ( function_exists('add_action') ) {
	add_action('init', 'AKEY_mceinit');
	add_action('admin_print_scripts', 'AKEY_script');
	add_action('wp_head','AKEY_script');
	add_action('login_head','AKEY_script');
}

} // closing if for version check

?>
<?php function mce_footer(){ ?>		
	<script type="text/javascript">
	inputArray = document.getElementsByTagName("input");
	for (var index = 0; index < inputArray.length; index++){
		if (inputArray[index].type == "text"){
			inputArray[index].className = "keyboardInput";
		}
	}
	inputArray = document.getElementsByTagName("input");
	for (var index = 0; index < inputArray.length; index++){
		if (inputArray[index].type == "password"){
			inputArray[index].className = "keyboardInput";
		}
	}
	inputArray = document.getElementsByTagName("textarea");
	for (var index = 0; index < inputArray.length; index++){
		if (inputArray[index].className != "theEditor"){ 
			inputArray[index].className = "keyboardInput"; 
		}
		if (inputArray[index].className == "theEditor"){ 
			inputArray[index].rows = "15"; 
		}
		if (inputArray[index].className == "comment"){ 
			inputArray[index].rows = "10"; 
		}
	}
	</script>
	
<script type="text/javascript" src="<?php echo AKEY_PLUGIN_URL;?>/Jsvk/jscripts/vk_easy.js"></script>
<?php 		
}

add_action('admin_footer','mce_footer');
add_action('wp_footer','mce_footer');
add_action('login_form','mce_footer');
function mce_comment_form(){
		?>
	<script type="text/javascript">
		inputArray = document.getElementsByTagName("textarea");
	for (var index = 0; index < inputArray.length; index++){
			inputArray[index].className = "comment";
	}
</script>	
		<?php } 
add_action('comment_form','mce_comment_form');
		?>