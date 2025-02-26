<?php
/*
 Plugin Name: Author Posts Shortcode
Plugin URI: http://gomorrah-online.de/
Description: Keine Einstellungen nötig. Shortcodes: [authorposts id=authorid] für weitere Shortcode attribute siehe readme.txt im plugin verzeichniss
Version: 1.0
Author: Marcus Reuß
Author URI: http://gomorrah-online.de/
*/

function gomorrah_authorposts($atts)
{
	extract(shortcode_atts(array(
	"id" => 0, 'post_type' => 'post', 'num' => 5, 'excerpt' => false, 'thumbnail' => false, 'thumb_size' => 'thumbnail', 'title_pos' => 'after_thumb', 'date' => false, 'cat' => false, 'exclude_cat' => false, 'tag' => false, 'exclude_tag' => false), $atts));
	
	$args = array(
		'post_status' => 'publish',
		'orderby' => 'post_date',
		'post_type' => $post_type,
		'posts_per_page' => $num
	);
	
	if ($cat != false) {
		$cats = explode($cat);
		$cat_select = 'category__in';
		if ($exclude_cat != false) {
			$cat_select = 'category__not_in';
		}
		$args[$cat_select] = $cats;
	}
	
	if ($tag != false) {
		$tags = explode($tag);
		$cat_select = 'tag__in';
		if ($exclude_tag != false) {
			$tag_select = 'tag__not_in';
		}
		$args[$tag_select] = $tags;
	}
	
	$posts = new WP_Query($args);
	$i = 0;

	if ($posts->have_posts()){
		while ($posts->have_posts()){
			$posts->the_post();
			
			
			?>
				<div class="post author-post">
					<?php if ($title_pos == 'before_thumb'){ ?>
					<a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><h3 class="author-post-title"><?php the_title() ?></h3></a>
					<?php } ?>
					<?php if (has_post_thumbnail() && $thumbnail) { ?>
					<div class="author-post-thumb">
						<?php the_post_thumbnail($thumb_size); ?>
					</div>
					<?php } ?>
					<?php if ($title_pos == 'after_thumb'){ ?>
					<a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><h3 class="author-post-title"><?php the_title() ?></h3></a>
					<?php } ?>
					<?php if ($excerpt || $date) { ?>
					<div calss="author-post-meta-data">
					<?php if ($excerpt) { ?>
					<div class="author-post-date">
						<?php the_date(); ?>
					</div>
					<div class="author-post-auszug">
						<?php the_excerpt(); ?>
					</div>
					<?php } ?>
					</div>
					<?php } ?>
				</div>
			<?php
			
		}
	}
	
}

add_shortcode("authorposts", "gomorrah_authorposts");
?>