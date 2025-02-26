<?php
namespace WPRankologyElementorAddon\Admin;

class Rankology_Meta_Helper {

	public static function get_meta_fields() {
		return [
			'_rankology_titles_title',
			'_rankology_titles_desc',
			'_rankology_robots_index',
			'_rankology_robots_follow',
			'_rankology_robots_imageindex',
			'_rankology_robots_archive',
			'_rankology_robots_snippet',
			'_rankology_robots_canonical',
			'_rankology_robots_primary_cat',
			'_rankology_robots_breadcrumbs',
			'_rankology_social_fb_title',
			'_rankology_social_fb_desc',
			'_rankology_social_fb_img',
			'_rankology_social_twitter_title',
			'_rankology_social_twitter_desc',
			'_rankology_social_twitter_img',
			'_rankology_redirections_enabled',
			'_rankology_redirections_type',
			'_rankology_redirections_value',
			'_rankology_analysis_target_kw',
			'_rankology_analysis_data',
		];
	}
}

function rankology_get_meta_helper() {
	return new Rankology_Meta_Helper();
}
