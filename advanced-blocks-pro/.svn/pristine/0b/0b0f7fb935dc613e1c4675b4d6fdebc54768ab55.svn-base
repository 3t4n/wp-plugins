<?php

namespace Advanced_Blocks_Pro;


add_filter('block_categories_all', function ($categories, $post) {
	$file = _get_plugin_url() . '/lib/logo-white.svg';
	// var_dump($file);
	// die;
	if (file_exists($file)) {
		$svg = file_get_contents($file);
	}
	return array_merge(
		$categories,
		[
			[
				'slug' => 'advanced-blocks-pro',
				'icon' => isset($svg) ? $svg : 'wordpress-alt',
				'title' => __('Advanced Blocks Pro', 'advanced-blocks-pro'),
			],
		]
	);
}, 10, 2);
