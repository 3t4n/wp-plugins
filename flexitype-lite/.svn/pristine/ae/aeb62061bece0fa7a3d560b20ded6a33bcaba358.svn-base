<?php
// Exit if accessed directly
if (!defined('ABSPATH'))
    exit;

// disable this Post Types from Search Results

function flexitype_lite_exclude_cpt_from_search($query)
{
    if (!is_admin() && $query->is_main_query() && $query->is_search()) {
        $exclude_post_type = 'flexitype_builder';
        $query->set('post_type', array_diff(get_post_types(), array($exclude_post_type)));
    }
}
add_action('pre_get_posts', 'flexitype_lite_exclude_cpt_from_search');

function flexitype_lite_get_allowed_html_tags()
{
	$allowed_html = [
		'small'   => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
        'br'      => [],
        'b'      => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		'i'      => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		'u'      => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
        'p'   => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
        'span'   => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		'strong' => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		'h1'  => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		'h2'  => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		'h3'  => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		'h4'  => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		'h5'  => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		'h6'  => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
        'hr'      => [
            'class' => [],
            'id'    => [],
            'style' => [],
        ],
        'img'     => [
            'src'    => [],
            'alt'    => [],
            'height' => [],
            'width'  => [],
            'class'  => [],
            'id'     => [],
            'style'  => [],
        ],
        'a'       => [
            'href'   => [],
            'title'  => [],
            'target' => [],
            'class'  => [],
            'id'     => [],
            'style'  => [],
        ],
	];

	return $allowed_html;
}

function flexitype_lite_allow_html($string = '') {
	return wp_kses($string, flexitype_lite_get_allowed_html_tags());
}