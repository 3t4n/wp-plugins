<?php
/*
Plugin Name: AutoMeme.Net 
Plugin URI: http://www.patrickmjones.com
Description: Shows a random meme
Author: Patrick Jones
Version: 1.0
Author URI: http://www.patrickmjones.com
*/
 
function pjautomeme() {
	try{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://api.automeme.net/moar.html?lines=1");
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$data = curl_exec($ch);
		curl_close($ch);
	
		echo '<p class="pjautomeme">'.$data.'</p>';
	}catch(Exception $e) {
		// fuck?
	}

}
 
function widget_pjautomeme($args) {
  extract($args);
  echo $before_widget;
  //echo $before_title;?>Automeme<?php echo $after_title;
  pjautomeme();
  echo $after_widget;
}
 
function pjautomeme_init() {
  register_sidebar_widget(__('Automeme'), 'widget_pjautomeme');
}
add_action("plugins_loaded", "pjautomeme_init");

?>
