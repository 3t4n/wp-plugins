<?php
/*
 * Plugin Name: AutoHan
 * Plugin URI: http://wordpress.org/plugins/autohan/
 * Description: Automatically switch to traditional Han characters (Kanji｜Hanzi｜漢字｜汉字), or simplified Han characters, which the user is more accustomed to, based on the default language type accepted by the browser. People in Singapore, Malaysia, Japan, China, Hong Kong, Taiwan, Macau, etc. have different Han character reading preferences. You can also switch manually.
 * Version: 0.5
 * Author: ZUOLA TECHNOLOGY CO,. LTD.
 * Text Domain: autohan
 * Domain Path: /languages
 * Author URI: https://biz.zuo.la/
 * License: GPLv2 or later
 * */
add_action('init','autohan_load_textdomain' );
 
function autohan_load_textdomain() {
    load_plugin_textdomain( 'autohan', false, 'autohan/languages' );
}

function include_autohan_js(){
	echo '<script language="JavaScript" src="'.plugins_url( 'Std_StranJF.php', __FILE__ ).'" type="text/javascript"></script>';

}


function autohan_multi_language_greetings(){
$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 4); 
//只取前4位，这样只判断最优先的语言。如果取前5位，可能出现en,zh的情况，影响判断。
$lang = preg_replace("/('|“|”|\"|;|\/|\||\\\)/i", "", $lang); 
//过滤单引号、双引号、冒号、斜杠、反斜杠，竖杠,毕竟	HTTP_ACCEPT_LANGUAGE 的值可以被伪造
if (preg_match("/zh-c/i", $lang)){
	echo "太好了！你的浏览器的是简体中文版, ";
	}
	else if (preg_match("/zh-s/i", $lang)){
	echo "你来自新加坡？你的浏览器的是简体中文版吧？ ";
	}
	else if (preg_match("/zh-h/i", $lang)){
	echo "你來自香港？你的瀏覽器的是繁體中文版吧？ ";
	}
	else if (preg_match("/zh/i", $lang)){
	echo "太好了！你的瀏覽器的是繁體中文版, ";
	}
	else if (preg_match("/en/i", $lang)){
	echo "Welcome！";
	}
	else if (preg_match("/fr/i", $lang)){
	echo "Française？Bonjour! Fàguó rén Nǐ hǎo! ";
	}
	else if (preg_match("/de/i", $lang)){
	echo "Aus Deutschland?,Willkommen.";
	}
	else if (preg_match("/jp/i", $lang)){
	echo "From Japan? ようこそ！ ";
	}
	else if (preg_match("/ko/i", $lang)){
	echo "From Korean？환영합니다! ";
	}
	else if (preg_match("/es/i", $lang)){
	echo "Hola! España? Bienvenido! ";
	}
	else if (preg_match("/sv/i", $lang)){
	echo "Hej! Svenska？Välkommen! ";
	}
//echo "<br>你用的是简体中文浏览器,也可切换到<a href='javascript:StranBody()' id='StranLink'>繁体中文</a> ";
}
//add_action( 'wp_sidebar', 'multi_language_greetings', 100 );
add_action( 'wp_footer', 'include_autohan_js', 80 );

//以下内容为AutoHan简单使用说明，用户可以自行移除以下所有内容，从而移除AutoHan菜单

add_action( 'admin_menu', 'autohan_create_menu' );

function autohan_create_menu() {
             
  //create custom top-level menu
  add_menu_page( 'AutoHan Settings Page', 'AutoHan',
      'manage_options', 'AutoHan-options', 'autohan_setting_page',
      'dashicons-align-left', 99 );

}

function autohan_setting_page() {
	_e( '<h1>Installation completed</h1><hr>', 'autohan' );
$autohan_logo =plugins_url( 'images/logo.svg', __FILE__ );
	printf(
   __('<img src="%s" width="180" style="margin:0.5em 3em;float:right;">', 'autohan'),
$autohan_logo
);
	_e( "<p style='margin-right:3em;'>Many people who use simplified Han characters (Kanji｜Hanzi｜漢字｜汉字) slow down their reading speed when reading traditional Han characters, and vice versa, and users of traditional Han characters may also experience discomfort when they first see simplified Han characters. This plugin can partially solve this problem, but the problem of vocabulary correspondence between different regions is not solved by this plugin. <hr>After installing this wordpress plugin, only the Std_StranJF.js javascript code is added at the end of the page, which can automatically display the simplified Han interface or the traditional Han interface according to the language supported by the visitor's browser, making it easier for visitors from different regions to read the content.</p>", 'autohan' );
	echo '<p><code> &lt;script language="JavaScript" src="'.plugins_url( 'Std_StranJF.php', __FILE__ ).'" type="text/javascript"&gt;&lt;/script&gt;</code></p>';
	
	_e( "<p>How it works: Based on the setting of the browser's acceptable language （&#x24;_SERVER['HTTP_ACCEPT_LANGUAGE']）, the default is to provide a simplified Han character interface for China and Singapore, and a traditional Han character interface for Japan, Korea, Hong Kong, Taiwan, Macau and other regions. Users can test the performance of this plugin in different regions by changing the language priority of Google Chrome browser.</p>", 'autohan' );
	_e( 'You can add the following HTML code to Dashboard ➟ Appearance ➟ Widgets ➟ Custom HTML', 'autohan' );
    _e( "<p><code> &lt;a href='javascript:AutoHan_StranBody()' id='StranLink'&gt;繁体中文&lt;/a&gt;</code> </p><p>Thus add the function to manually switch between traditional and simplified Han characters interface</p><hr>", "autohan" );
	printf(
	__(
      '<div>Did the plugin solve your problem? If it helps, a small donation is welcome and <a href=%s >buying me coffee</a> would be an encouragement. </div>',
      'autohan'
   ),
   'https://www.buymeacoffee.com/zuola'
);
$line_donate =plugins_url( 'images/line_donate.svg', __FILE__ );	
$paypal_donate =plugins_url( 'images/paypal_donate.svg', __FILE__ );
$alipay_donate =plugins_url( 'images/alipay_donate_t.svg', __FILE__ );
$wechat_donate =plugins_url( 'images/wechat_donate.svg', __FILE__ );
$cash_donate =plugins_url( 'images/cash_donate.svg', __FILE__ );
	printf(
   __('<div style="width:100%%"><table style="width:100%%"> <tbody><tr><td align="center"><a href="%6$s"><img src="%1$s" width="140"></a></td><td align="center"><a href="%7$s"><img src="%2$s" width="140"></a></td><td align="center"><a href="%8$s"><img src="%3$s" width="140"></a></td><td align="center"><a href="%9$s"><img src="%4$s" width="140"></a></td><td align="center"><a href="%10$s"><img src="%5$s" width="140"></a></td></tr></tbody></table></div>', 'autohan'),
$line_donate,
$cash_donate,
$wechat_donate,
$alipay_donate,
$paypal_donate,
        'https://line.me/R/ch/1586237320/?forwardPath=/c2c/transfer&no=25190077070',
		'https://cash.app/$zuola',
        'wxp://f2f0LX4LnkY4sXj6Y8rI0ByAWUc_eWeUtKEi',
        'https://qr.alipay.com/apoqy7hwhtbe2dgr0f',
        'https://www.paypal.com/paypalme/zuoia/20'
);
	printf(
	__(
      '<hr><a href=%s><b>ZUOLA TECHNOLOGY CO,. LTD.</b> </a> presents.',
      'autohan'
   ),
   'https://www.xn--qqq44c53cd8xokat1ttz0brw1c.com/'
);	
 }

?>
