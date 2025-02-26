<?php
/**
 * Plugin Name: AA Sitemap
 * Plugin URI: https://wordpress.org/plugins/aasitemap/
 * Description: A simple plugin for include sitemap to your wordpress website. 
 * Version: 1.0
 * Author: aaextention
 * Author URI: http://webdesigncr3ator.com
 * Support Email : contact2us.aa@gmail.com
 * License: GPL2
 **/


// Code starts from here
function sitemap_shortcode(){
?>
	<div >			
		<div >
			<div>
				<h2><?php _e('Pages', ''); ?></h2>
				<ul>
					<?php wp_list_pages('title_li='); ?>
				</ul>
			</div>
			<div>
				<h2><?php _e('Categories', ''); ?></h2>
				<ul>
					<?php wp_list_categories('title_li='); ?>
				</ul>
			</div>
			<div>
				<h2><?php _e('Archives', ''); ?></h2>
				<ul>
					<?php wp_get_archives('type=monthly&show_post_count=0'); ?>
				</ul>
			</div>
		</div>
		<div>
			<h2><?php _e('Posts per category', ''); ?></h2>
			<?php
				$cats = get_categories();
				foreach ( $cats as $cat ) {
				query_posts( 'cat=' . $cat->cat_ID );
			?>
				<h3><?php echo $cat->cat_name; ?></h3>
				<ul>	
					<?php while ( have_posts() ) { the_post(); ?>
					<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
					<?php } wp_reset_query(); ?>
				</ul>
			<?php } ?>
		</div>						
	</div>
<?php
}

add_shortcode('sitemap','sitemap_shortcode');