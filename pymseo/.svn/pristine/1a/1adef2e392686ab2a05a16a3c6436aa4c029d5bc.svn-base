<?php
// WPO -> Performance -> Defer js
// Aplicar defer a los script menos al jquery
function fun_pymseo_defer_scripts($tag, $handle) {
	if (is_admin()){
		return $tag;
	}
	if (strpos($tag, '/wp-includes/js/jquery/jquery')) {
		return $tag;
	}
	if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 9.') !==false) {
		return $tag;
	}
	else {
		return str_replace(' src',' defer src', $tag);
	}
}
add_filter('script_loader_tag', 'fun_pymseo_defer_scripts',10,2);


?>