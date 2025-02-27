<?php

namespace Codemanas\CmBlocks;

use WP_Query;

class Helper {
	public static function get_template_part_id(  $slug = '', $theme = '' ) {
		$templates = new WP_Query( [
			'post_type'      => 'wp_template_part',
			'posts_per_page' => - 1,
			'post_status'    => 'publish',
			'tax_query'      => [
				[
					'taxonomy' => 'wp_theme',
					'field'    => 'slug',
					'terms'    => $theme
				]
			],
		] );

		if($templates->have_posts()){
			global $post;
			while ( $templates->have_posts() ): $templates->the_post();
				if($post->post_name == $slug) {
					$the_id = get_the_ID();
					wp_reset_postdata();
					return $the_id;
				}
			endwhile;
			wp_reset_postdata();
		}

		return 0;
	}
}