<?php

/************************************/
/* The activator                    */
/************************************/
function any_news_ticker_activate(){
	?>
	<script type="text/javascript">
        jQuery(document).ready(function ($) {
            jQuery('#js-news').ticker({
                speed: 0.15,
                htmlFeed: true,
                fadeInSpeed: 300,
                titleText: 'Latest News'
            });

        });
	</script>

	<?php
}
add_action('wp_head','any_news_ticker_activate');


/************************************/
/* Filter wordpress data            */
/************************************/


function any_news_ticker($atts){
    global $ant_news_ticker_options;
    $ant_settings = get_option('ant_news_ticker_options', $ant_news_ticker_options);
    $antspeed = '.'.$ant_settings['ant_ticker_speed'];
	extract(shortcode_atts(array(
		'id' => 'ticker_id',
		'category_id'=>'',
		'category_slug'=>'category_ID',
		'count'=>1,
		'pauseOnItems' => 2000,
		'fadeInSpeed' => 600,
		'fadeoutspeed' => 300,
		'titletext' => 'Latest Posts',

	), $atts, 'anynewsticker'));

	$newslist = new WP_Query(array(
		'post_type'=>$ant_settings['ant_post_type'],
		'posts_per_page'=> $ant_settings['ant_number_of_posts'],
		'cat' => $category_id,
	));

echo '
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            jQuery("#js-news'.$id.'").ticker({
                speed:'.$antspeed.',
                controls:'.$ant_settings['ant_controls'].',
                pauseOnItems:'. $pauseOnItems .',
                fadeInSpeed :'.$fadeInSpeed.',
                fadeOutSpeed: '.$fadeoutspeed.',
                titleText: "'.$ant_settings['ant_ticker_title'].'"
            });
        });
    </script>
        
    <ul id="js-news'.$id.'" class="js-hidden">';
	if ($newslist->have_posts()):
    while($newslist->have_posts() ) : $newslist->the_post();?>
		<li class="news-item"><a href="<?php the_permalink()?>"><?php echo the_title();?></a></li>;

		<?php
	endwhile;
	else:
        ?>
        <li class="news-item"><a href="#">No post found</a></li>;
	<?php
    endif;
	echo '</ul>';
}

add_shortcode('any-ticker','any_news_ticker');









