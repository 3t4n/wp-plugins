<?php
/*
Plugin Name: AlixcaN Alıntı
Plugin URI: http://www.alixcan.net/?p=1608
Description: Siteniz İçerisinde Kolay Alıntı Yapmanızı Sağlar.
Version: 1.0
Author: AlixcaN
Author URI: http://www.alixcan.net/
*/
function AlixcaN_Alinti_Yap($params = array()) {
	extract(shortcode_atts(array(
		'slug' => '',
		'link' => ''
	), $params));
	$html = '';
	if ($slug == '') return $html;
	$q = new WP_Query("pagename=$slug");
	if (!$q->have_posts()) {
		$q = new WP_Query("name=$slug");
	}
	// the loop
	while ($q->have_posts()) {
		$q->the_post();
		// generate HTML
		$html .=
			'<h2><a href="' . get_permalink() . '">' . the_title('','',false) . "</a></h2>\n" .
			(has_post_thumbnail() ? get_the_post_thumbnail() : '') .
			get_the_excerpt();
	}
	return $html;
}
// register shortcode
add_shortcode('alixcan_alinti', 'AlixcaN_Alinti_Yap');
