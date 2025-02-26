<?php
/*
Plugin Name: Add To Social
Plugin URI: http://dev.svil4ok.info/add-to-social/
Description: Adds a list of XHTML compliant graphic links at the end of your posts that allow your visitors to easily submit them to a number of social bookmarking sites.
Version: 0.4.1
Author: Svilen Popov
Author URI: http://svil4ok.info/

*/

define('ADD_TO_SOCIAL_TAG', '[add-to-social]');

// Режим
register_activation_hook(__FILE__,'add_to_social_rejim_install'); 
register_deactivation_hook( __FILE__, 'add_to_social_rejim_remove' );
function add_to_social_rejim_install() {
	add_option("ats-rejim", 'automatic', '', 'yes');
}
function add_to_social_rejim_remove() {
	delete_option('ats-rejim');
}

// Къс URL
register_activation_hook(__FILE__,'add_to_social_shorturl_install'); 
register_deactivation_hook( __FILE__, 'add_to_social_shorturl_remove' );
function add_to_social_shorturl_install() {
	add_option("ats-shorturl", '0', '', 'yes');
}
function add_to_social_shorturl_remove() {
	delete_option('ats-shorturl');
}

// Големина на иконките
register_activation_hook(__FILE__,'add_to_social_size_install'); 
register_deactivation_hook( __FILE__, 'add_to_social_size_remove' );
function add_to_social_size_install() {
	add_option("ats-size", 'small', '', 'yes');
}
function add_to_social_size_remove() {
	delete_option('ats-size');
}

// Подравняване на иконките
register_activation_hook(__FILE__,'add_to_social_align_install'); 
register_deactivation_hook( __FILE__, 'add_to_social_align_remove' );
function add_to_social_align_install() {
	add_option("ats-align", 'justify', '', 'yes');
}
function add_to_social_align_remove() {
	delete_option('ats-align');
}

// Функция за скъсяване на URL адреса
function bitly($url) {
	$bitly = file_get_contents("http://bit.ly/api?url=".$url."");
	return $bitly;
}

// Функция за споделяне в Favit
function favit() {
	$js = "javascript:function%20_a(){if(!document.getElementById('standalonescript')){var%20_b=document.createElement('script');_b.charset='utf-8';_b.id='standalonescript';_b.src=favURL+'/resources/tools/_includer.js';document.body.appendChild(_b)}else{callPopup()}};favURL='http://favit.com';_a();";
	return $js;
}

// Функция изкарваща всички бутони
function ats_buttons() {
	global $post;
	$width = '100%';
	
	// Подравняване на бутоните
	if (get_option('ats-align') == "left") {
		$align = 'left'; // ляво подравнено
	}
	else if (get_option('ats-align') == "center") {
		$align = 'center'; // посредата
	}
	else if (get_option('ats-align') == "right") {
		$align = 'right'; // дясно подравнено
	}
	else {
		$align = 'justify'; // двойно подравнено
	}

	// Папка с иконките
	if (get_option('ats-size') == "large") {
		$folder = get_settings('home') . '/wp-content/plugins/add-to-social/images/large/';
	}
	else {
		$folder = get_settings('home') . '/wp-content/plugins/add-to-social/images/';
	}
	
	// Вид на URL адреса - скъсен или нормален
	if (get_option('ats-shorturl') == 0) {
		$url = get_permalink($post->ID);
	}
	else {
		$url = bitly(get_permalink($post->ID)); 
	}
	$title = str_replace(' ','+',get_the_title( $post->ID )); // Заменяне на празните места в заглавието с +
	$txt .= "";
	$txt .= "\n"
					  . '<div style="padding:16px 0 16px 0; text-align:' . $align . '; width:' . $width . ';"><b>Сподели:</b><br />' . "\n"
					  
					  // Edno23
					  . '<a href="http://edno23.com/pf:open/?loadlink=' . $url . '&amp;loadtext=' . $title . '" target="_blank" rel="nofollow" title="Сподели в Edno23">
					  <img src="' . $folder . 'edno23.png" alt="Edno23" border="0" />
					  </a>' . "\n"
					  
					  //Favit
					  . '<a href="' . favit() . '" title="Сподели в Favit">
					  <img src="' . $folder . 'favit.png" alt="Favit" border="0" />
					  </a>' . "\n"
					  
					  // Svejo
					  . '<a href="http://svejo.net/story/submit_by_url?url=' . $url . '&amp;title=' . $title . '" target="_blank" rel="nofollow" title="Сподели в Svejo">
					  <img src="' . $folder . 'svejo.png" alt="Svejo" border="0" />
					  </a>' . "\n"
				
					  // Twitter
					   . '<a href="http://twitter.com/home?status=' . $title . ' - ' . $url . '" target="_blank" rel="nofollow" title="Сподели в Twitter">
					  <img src="' . $folder . 'twitter.png" alt="Twitter" border="0" />
					  </a>' . "\n"
					  
					  // Facebook
					  . '<a href="http://facebook.com/sharer.php?u=' . $url . '&amp;t=' . $title . '" target="_blank" rel="nofollow" title="Сподели в Facebook">
					  <img src="' . $folder . 'facebook.png" alt="Facebook" border="0" />
					  </a>'."\n"
					  
					  // Google Buzz
					  . '<a href="http://www.google.com/reader/link?url=' . $url . '&title='.$title.'&srcURL=' . $url . '" target="_blank" rel="nofollow" title="Сподели в Google Buzz">
					  <img src="' . $folder . 'google-buzz.png" alt="Google Buzz" border="0" />
					  </a>'."\n"
					  
					  // Delicious
					  . '<a href="http://delicious.com/save?url=' . $url . '&amp;title=' . $title . '" target="_blank" rel="nofollow" title="Сподели в Delicious">
					  <img src="' . $folder . 'delicious.png" alt="Delicious" border="0" />
					  </a>'."\n"
					  
					  // Google Bookmarks
					  . '<a href="http://google.com/bookmarks/mark?op=add&amp;bkmk=' . $url . '&amp;title=' . $title . '" target="_blank" rel="nofollow" title="Сподели в Google Bookmarks">
					  <img src="' . $folder . 'google.png" alt="Google Bookmarks" border="0" />
					  </a>'."\n"
					  
					  // Digg
					  . '<a href="http://digg.com/submit?phase=2&amp;url=' . $url . '&amp;title=' . $title . '" target="_blank" rel="nofollow" title="Сподели в Digg">
					  <img src="' . $folder . 'digg.png" alt="Digg" border="0" />
					  </a>'."\n"
					  
					  . '</div>' . "\n";	
	return $txt;
}


function add_to_social($content) {
	$buttons = ats_buttons();
	if (get_option('ats-rejim') == "shortcode") { // добавяне чрез shortcode
		return str_replace(ADD_TO_SOCIAL_TAG, $buttons, $content);
	}
	else if (get_option('ats-rejim') == "manual") { // добавяне чрез PHP код
		return $content;
	}
	else { // автоматично добавяне
		if (is_single()) {
			$content .= $buttons;
			return $content;
		}
	}
	return $content;
}

add_filter('the_content', 'add_to_social');

function ats_include_admin() {  
     include('add-to-social-admin.php');  
}  

function ats_admin() {
	add_options_page("Add To Social", "Add To Social", 1, "add-to-social", "ats_include_admin");
}

add_action('admin_menu', 'ats_admin');
?>