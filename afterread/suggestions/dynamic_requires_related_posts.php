<?php
global $afterRead_sugestion;

//below this line goes any suggestion specific code
//the "$afterRead_sugestion =" must go second to last, because it is how the suggestion returns the html, notice that "$afterRead_sugestion" will be a string containing the html 
if(function_exists('wp_get_related_posts()')){
	$afterRead_sugestion = wp_get_related_posts();
} else {
$afterRead_sugestion = '<br /> ******You must have <a href="http://wordpress.org/extend/plugins/wordpress-23-related-posts-plugin/installation/">Wordpress Related Posts</a> installed for this suggestion to work!******';
}

//the next line is also required, do not change it or add anything after it 
?>