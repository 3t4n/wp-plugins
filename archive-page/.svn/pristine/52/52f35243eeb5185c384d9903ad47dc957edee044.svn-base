<?php
/*
Plugin Name: Archive Page
Plugin URI: http://wp-plugins.in/archive-page
Description: Make archive page easily with full customize and in all languages of the world.
Version: 1.0.1
Author: Alobaidi
Author URI: http://wp-plugins.in
License: GPLv2 or later
*/

/*  Copyright 2015 Alobaidi (email: wp-plugins@outlook.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


function alobaidi_archive_page_plugin_row_meta( $links, $file ) {

	if ( strpos( $file, 'archive-page.php' ) !== false ) {
		
		$new_links = array(
						'<a href="http://wp-plugins.in/archive-page" target="_blank">Explanation of Use</a>',
						'<a href="https://profiles.wordpress.org/alobaidi#content-plugins" target="_blank">More Plugins</a>',
						'<a href="http://www.elegantthemes.com/affiliates/idevaffiliate.php?tid1=archive_page_plugin&id=24967&url=27796" target="_blank">Elegant Themes</a>'
					);
		
		$links = array_merge( $links, $new_links );
		
	}
	
	return $links;
	
}
add_filter( 'plugin_row_meta', 'alobaidi_archive_page_plugin_row_meta', 10, 2 );


// Include shortcodes page
include(plugin_dir_path(__FILE__).'/shortcodes-page.php');


// check if blog posts equal 1 or more than 1
function ch_more_than_1_post(){
	$count_posts = wp_count_posts();
	$get_posts_count = $count_posts->publish;
	return $get_posts_count >= 1;
}


// check if blog pages equal 1 or more than 1
function ch_more_than_1_page(){
	$count_pages = wp_count_posts('page');
	$get_pages_count = $count_pages->publish;
	return $get_pages_count >= 1;
}


// get latest posts
function obi_get_latest_posts($posts_number = '10'){

	$latest_post_args = array( 'numberposts' => $posts_number, 'post_type' => 'post', 'post_status' => 'publish' );
	$recent_posts = wp_get_recent_posts( $latest_post_args );
	$html = '';
	
	foreach( $recent_posts as $recent ){
		$html .= '<li><a href="' . get_permalink($recent["ID"]) . '" title="'.esc_attr($recent["post_title"]).'">'.$recent["post_title"].'</a></li>';
	}
	
	return $html;
}


// get tags list
function obi_get_tags_list($tags_number = '10'){
	
	$tags = get_tags("orderby=count&hide_empty=1&number=$tags_number");
	$html = '';
	
	foreach ( $tags as $tag ) {
		$tag_link = get_tag_link( $tag->term_id );	
		$html .= "<li><a href='{$tag_link}' title='{$tag->name} Tag'>{$tag->name}</a></li>";
	}
	
	return $html;
}


// daily archive shortcode
function obi_daily_archive( $atts, $content = null ){

	extract(
		shortcode_atts(
			array(
				"number"		=>	'', // default is no limit.
				"heading"		=>	'h3', // default is <h3></h3>.
				"list"			=>	'ul', // default is unordered list <ul></ul>.
				"title"			=>	'Daily Archive', // default title is Daily Archive.
			),$atts
		)
	);
	
	?>
		<?php if ( ch_more_than_1_post() ) : ?>
			<?php 
				$result  = "<$heading>$title</$heading>";
				$result .= "<$list>";
				$result .= wp_get_archives( array( 'type' => 'daily', 'limit' => $number, 'echo' => 0 ) );
				$result .= "</$list>";
				return $result;
            ?>
		<?php endif; ?>
    <?php

}
add_shortcode("obi_daily_archive", "obi_daily_archive");


// monthly archive shortcode
function obi_monthly_archive( $atts, $content = null ){

	extract(
		shortcode_atts(
			array(
				"number"		=>	'', // default is no limit.
				"heading"		=>	'h3', // default is <h3></h3>.
				"list"			=>	'ul', // default is unordered list <ul></ul>.
				"title"			=>	'Monthly Archive', // default title is Monthly Archive.
			),$atts
		)
	);
	
	?>
		<?php if ( ch_more_than_1_post() ) : ?>
			<?php 
				$result  = "<$heading>$title</$heading>";
				$result .= "<$list>";
				$result .= wp_get_archives( array( 'type' => 'monthly', 'limit' => $number, 'echo' => 0 ) );
				$result .= "</$list>";
				return $result;
            ?>
		<?php endif; ?>
    <?php

}
add_shortcode("obi_monthly_archive", "obi_monthly_archive");


// yearly archive shortcode
function obi_yearly_archive( $atts, $content = null ){

	extract(
		shortcode_atts(
			array(
				"number"		=>	'', // default is no limit.
				"heading"		=>	'h3', // default is <h3></h3>.
				"list"			=>	'ul', // default is unordered list <ul></ul>.
				"title"			=>	'Yearly Archive', // default title is Yearly Archive.
			),$atts
		)
	);
	
	?>
		<?php if ( ch_more_than_1_post() ) : ?>
			<?php 
				$result  = "<$heading>$title</$heading>";
				$result .= "<$list>";
				$result .= wp_get_archives( array( 'type' => 'yearly', 'limit' => $number, 'echo' => 0 ) );
				$result .= "</$list>";
				return $result;
            ?>
		<?php endif; ?>
    <?php

}
add_shortcode("obi_yearly_archive", "obi_yearly_archive");


// latest posts shortcode
function obi_latest_posts( $atts, $content = null ){

	extract(
		shortcode_atts(
			array(
				"number"		=>	'10', // default is 10 posts.
				"heading"		=>	'h3', // default is <h3></h3>.
				"list"			=>	'ul', // default is unordered list <ul></ul>.
				"title"			=>	'Latest Posts', // default title is Latest Posts.
			),$atts
		)
	);
	
	?>
		<?php if ( ch_more_than_1_post() ) : ?>
			<?php 
				$result  = "<$heading>$title</$heading>";
				$result .= "<$list>";
				$result .= obi_get_latest_posts($number);
				$result .= "</$list>";
				return $result;
            ?>
		<?php endif; ?>
    <?php

}
add_shortcode("obi_latest_posts", "obi_latest_posts");


// get cats shortcode
function obi_get_cats( $atts, $content = null ){

	extract(
		shortcode_atts(
			array(
				"number"		=>	'', // default is no limit.
				"heading"		=>	'h3', // default is <h3></h3>.
				"list"			=>	'ul', // default is unordered list <ul></ul>.
				"title"			=>	'Categories', // default title is Categories.
			),$atts
		)
	);
	
	?>
		<?php 
			$result  = "<$heading>$title</$heading>";
			$result .= "<$list>";
			$result .= wp_list_categories("title_li=0&number=$number&echo=0");
			$result .= "</$list>";
			return $result;
		?>
    <?php

}
add_shortcode("obi_get_cats", "obi_get_cats");


// get tags shortcode
function obi_get_tags( $atts, $content = null ){

	extract(
		shortcode_atts(
			array(
				"number"		=>	'10', // default is 10 tags.
				"heading"		=>	'h3', // default is <h3></h3>.
				"list"			=>	'ul', // default is unordered list <ul></ul>.
				"title"			=>	'Tags', // default title is Tags.
			),$atts
		)
	);
	
	?>
    	<?php if( wp_count_terms('post_tag', 'hide_empty=1') >= 1 ) : ?>
			<?php 
				$result  = "<$heading>$title</$heading>";
				$result .= "<$list>";
				$result .= obi_get_tags_list($number);
				$result .= "</$list>";
				return $result;
            ?>
        <?php endif; ?>
    <?php

}
add_shortcode("obi_get_tags", "obi_get_tags");


// get pages shortcode
function obi_get_pages( $atts, $content = null ){

	extract(
		shortcode_atts(
			array(
				"number"		=>	'', // default is no limit.
				"heading"		=>	'h3', // default is <h3></h3>.
				"list"			=>	'ul', // default is unordered list <ul></ul>.
				"title"			=>	'My Pages', // default title is My Pages.
			),$atts
		)
	);
	
	?>
    	<?php if( ch_more_than_1_page() ) : ?>
			<?php 
				$result  = "<$heading>$title</$heading>";
				$result .= "<$list>";
				$result .= wp_list_pages("title_li=0&number=$number&echo=0");
				$result .= "</$list>";
				return $result;
            ?>
        <?php endif; ?>
    <?php

}
add_shortcode("obi_get_pages", "obi_get_pages");


// get authors shortocode
function obi_get_authors( $atts, $content = null ){

	extract(
		shortcode_atts(
			array(
				"number"		=>	'', // default is no limit.
				"heading"		=>	'h3', // default is <h3></h3>.
				"list"			=>	'ul', // default is unordered list <ul></ul>.
				"title"			=>	'Authors', // default title is Authors.
			),$atts
		)
	);
	
	?>
		<?php if ( ch_more_than_1_post() ) : ?>
			<?php 
				$result  = "<$heading>$title</$heading>";
				$result .= "<$list>";
				$result .= wp_list_authors("hide_empty=1&show_fullname=1&style=list&optioncount=1&orderby=id&html=1&number=$number&echo=0");
				$result .= "</$list>";
				return $result;
            ?>
		<?php endif; ?>
    <?php

}
add_shortcode("obi_get_authors", "obi_get_authors");