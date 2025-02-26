<?php
/*
Plugin Name: ajax-tag-suggest
Plugin URI: http://www.devilalbum.com/2010/03/plugin-ajax-tag-suggest/
Description:  This plugin enables a feature like Google's suggest search. When typing characters in your blog search field, related tags retrieved from the database will be presented.
Version: 1.0
Author: yun77op
Author URI: http://devilalbum.com/
License : GPL v3
*/
?>
<?php


function init_script(){
$plugin_url= WP_PLUGIN_URL . '/ajax-tag-suggest';
$js_string = <<<EOT
<script type="text/javascript" src="$plugin_url/js/json.js"></script>
<script type="text/javascript" src="$plugin_url/js/suggest.js.php"></script>
<script type="text/javascript" >
function loadSuggest() {
t=document.getElementById("s");
t.setAttribute('autocomplete','off');
	var oTextbox = new AutoSuggestControl(t, new SuggestionProvider());
            }

if (document.addEventListener) {
	document.addEventListener("DOMContentLoaded", loadSuggest, false);

} else if (/MSIE/i.test(navigator.userAgent)) {
	document.write('<script id="__ie_onload" defer src="javascript:void(0);"><\/script>');
	var script = document.getElementById("__ie_onload");
	script.onreadystatechange = function() {
		if (this.readyState == 'complete') {
			loadSuggest();
		}
	}

} else if (/WebKit/i.test(navigator.userAgent)) {
	var _timer = setInterval( function() {
		if (/loaded|complete/.test(document.readyState)) {
			clearInterval(_timer);
			loadSuggest();
		}
	}, 10);

} else {
	window.onload = function(e) {
		loadSuggest();
	}
}
</script>

EOT;

	echo $js_string;

}
function suggest_css(){
$plugin_url= WP_PLUGIN_URL . '/ajax-tag-suggest';
wp_enqueue_style('wp-pagenavi', $plugin_url . '/css/autosuggest.css', array() , false, 'all');
}

add_action('wp_head','init_script');
add_action('wp_print_styles','suggest_css');
?>
