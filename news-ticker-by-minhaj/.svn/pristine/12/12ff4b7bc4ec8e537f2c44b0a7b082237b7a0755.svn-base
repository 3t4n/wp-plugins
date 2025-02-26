<?php 
/*
Plugin Name: News ticker by minhaj
Plugin URI: http://wp-plugin.mritsolution.com/news-ticker
Description: This plugin will show niews ticker in your wordpress site. you can use news ticker by useing shortcode in everywhere you want, even in theme files
Author: minhazur rahman
Version: 1.0
Author URI: http://mritsolution.com
*/


function mrnews_ticker_lates_jy(){
        wp_enqueue_script('jQuery');
}
add_action('int','mrnews_ticker_lates_jy');

function mrnews_ticker_jsm() {
    wp_enqueue_script( 'newsticker-js', plugins_url( '/js/news.ticker.min.js', __FILE__ ), array ('jquery'),1.2,false);
	wp_enqueue_style( 'newsticker-css',  plugins_url( '/css/style.css', __FILE__ ) );
}

add_action('wp_enqueue_scripts','mrnews_ticker_jsm');







function mrticker_list_shortcode($atts){



extract(shortcode_atts( array(
	'id'=>'tickerid',
	'category'=>'',
	'category_slug'=>'category_ID',
	'speed'=>'3000',
	'count'=>'5',
	'typespeed'=>'50',
	'fadeInSpeed'=>'600',
	'fadeOutSpeed'=>'300',
	'color'=>'#000',
	'text'=>'Lates News',
	),$atts,'projects'));

$q= new WP_Query( array('posts_per_page' => $count, 'post_type'  => 
'post',$category_slug=>$category)
);

$list ='<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery("#newsticker'.$id.'").ticker(
			{
				itemSpeed:'.$speed.',
				cursorSpeed:'.$typespeed.',
				fadeInSpeed:'.$fadeInSpeed.',  
                fadeOutSpeed: '.$fadeOutSpeed.',
				
			});
			
		});

</script>

<div id="newsticker'.$id.'" class="ticker"><strong style="background-color:'.$color.'">'.$text.':</strong><ul>';


while($q->have_posts()): $q->the_post();
$idd= get_the_ID();
$list .='
<li><a href =" '.get_permalink().'">'.get_the_title().'</a></li>'
;

endwhile;
$list.=' </ul></div>';
wp_reset_query();
return $list;
}

add_shortcode('ticker_list', 'mrticker_list_shortcode');







?>