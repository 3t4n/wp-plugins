<?php 
/*
Plugin Name:News Ticker
Plugin URI: http://www.lucky.sohaga.com/plugins/lazy-news-ticker
Description: This plugin will enable news ticker in your wordpress theme. You can embed news ticker via shortcode in everywhere you want, even in theme files. 
Author: Fazilatunnesa
Version: 1.0
Author URI: http://www.lucky.sohaga.com/
*/


function lazy_tickr_wp_latest_jquery() {
	wp_enqueue_script('jquery');
}
add_action('init', 'lazy_tickr_wp_latest_jquery');



function lazy_news_plugin_main_js() {
    wp_enqueue_script( 'lazy-news-js', plugins_url( '/js/jquery.ticker.min.js', __FILE__ ), array('jquery'), 1.0, false);
    wp_enqueue_style( 'lazy-news-css', plugins_url( '/css/style.css', __FILE__ ));
}

add_action('init','lazy_news_plugin_main_js');




function tickr_list_shortcode($atts){
	extract( shortcode_atts( array(
		'id' => 'tickrid',
		'category' => '',
		'count' => '5',
		'category_slug' => 'category_ID',
		'speed' => '3000',
		'typespeed' => '50',
		'color' => '#000',
		'text' => 'Latest News',
	), $atts, 'projects' ) );
	
    $q = new WP_Query(
        array('posts_per_page' => $count, 'post_type' => 'post', $category_slug => $category)
        );		
		
		
	$list = '
	<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery("#lazytickr'.$id.'").ticker({
				itemSpeed: '.$speed.',
				cursorSpeed: '.$typespeed.',
			});
		}); 	
	</script>	
	<div id="lazytickr'.$id.'" class="ticker"><strong style="background-color:'.$color.'">'.$text.'</strong><ul>';
	while($q->have_posts()) : $q->the_post();
		$idd = get_the_ID();
		$list .= '
		
			<li>'.get_the_title().'</li>
		
		';        
	endwhile;
	$list.= '</ul></div>';
	wp_reset_query();
	return $list;
}
add_shortcode('tickr_list', 'tickr_list_shortcode');	


?>