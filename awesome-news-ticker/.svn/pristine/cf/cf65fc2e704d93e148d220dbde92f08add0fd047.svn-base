<?php 
/*
Plugin Name:Awesome News Ticker
Plugin URI: https://wordpress.org/plugins/Awesome-news-ticker/
Description:This plugin will be enable in your any wordpress themes.you can embed news ticker via shortcode in everywhere you want even
in theme files. 
Version:0.1.0
Author:Ariful
Author URI:http://arifulislam.ultimatefreehost.in/
Text Domain:simple-news-ticke
Domain Path: /languages
*/



//---add latest jquery start  --//

function simple_tickr_wp_latest_jquery() {
	wp_enqueue_script('jquery');
}
add_action('init', 'simple_tickr_wp_latest_jquery');

//---end----//




function simple_news_ticker_plugin_main_js() {
    wp_enqueue_script( 'news-ticker-js', plugins_url( '/js/jquery.ticker.min.js', __FILE__ ), array('jquery'), 1.0, true);
    wp_enqueue_style( 'news-ticker-js', plugins_url( '/css/style.css', __FILE__ ));
}

add_action('init','simple_news_ticker_plugin_main_js');


// going code to wp header start//

/*
function simple_news_ticker_active(){?>
	
	<script type="text/javascript"> 
		jQuery( document ).ready(function() {
			jQuery('.ticker').ticker();
		});
	</script>
	
<?php	
}


add_action('wp_head','simple_news_ticker_active');

*/

// end//



//simple shortcode creation start//

/* function simple_news_ticker_sorttcode(){
	
	return '
		<div class="ticker">
			<strong>Latest News:</strong>
			<ul>
				<li>Ticker item #1</li>
				<li>Ticker item #2</li>
				<li><em>Another</em> ticker item</li>
				...
			</ul>
		</div>';	
}

add_shortcode('ticker','simple_news_ticker_sorttcode');	

*/
///-----end----//





function tickerlist_shortcode( $atts, $content = null){

		extract( shortcode_atts( array(
			'category'=>'',
			'id'=>'tickerid',
			'count'=>'3',
			'category_slug'=>'category_ID',
			'speed'=>'3000',
			'typespeed'=>'50',
			'heading_bg_color'=>'#212121',
			'text'=>'Latest News',
			'background'=>'#BDBDBD',
			'ticker_text_color'=>'#212121'
			
		), $atts) );
		
		$q = new WP_Query(
        array('posts_per_page' => $count, 'post_type' => 'post',$category_slug=> $category)
        );
		
$list ='
			<script type="text/javascript"> 
				jQuery( document ).ready(function() {
					jQuery("#newaticker'.$id.'").ticker({
						
						itemSpeed :'.$speed.',
						cursorSpeed :'.$typespeed.'
						
					});
				});
			</script>

			<div id="newaticker'.$id.'" class="ticker" style="background:'.$background.';color:'.$ticker_text_color.'">
			<strong style="background-color:'.$heading_bg_color.'">'.$text.':</strong>
			<ul>';

while($q->have_posts()) :$q->the_post();

$idd =get_the_ID();
$person_position=get_post_meta($idd,'person_position',true);

$list .='<li style="">'.get_the_title().'</li>';

endwhile;
$list .='</ul></div>';
wp_reset_query();
return	$list;
	
	
}
add_shortcode('tickerlist','tickerlist_shortcode');




//option page menu //



add_action( 'admin_menu', 'simple_news_ticker' );

function simple_news_ticker() {            // add_options_page use for option display in setting menu//
											// add_menu_page use for option display in dashbord menu//
	add_menu_page( 
		'News Ticker Options panel',
		'News Ticker Options',
		'manage_options',
		'Simple Ticker Opts',
		'simple_news_ticker_option',
		plugins_url('/img/icon.png', __FILE__ ), //icon set of menu page name//
		8 								//menu page name position set//
	);
	
	
	
											
	add_options_page( 
		'News Ticker Options panel',
		'News Ticker Options',
		'manage_options',
		'Simple Ticker Opts',
		'simple_news_ticker_option'	
	);
	
	
	
}

function simple_news_ticker_option(){?>
	
	<div class="wrap"> 
		<h2>Awesome New Ticker Options Panel</h2>
	</div>
	
<?php
}












?>