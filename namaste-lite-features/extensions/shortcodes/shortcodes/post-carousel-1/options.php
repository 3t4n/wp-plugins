<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

// Post categories

$post_categories = array();
$category_terms = get_categories();
foreach ( $category_terms as $category_term ) {
$post_categories[$category_term->slug] = $category_term->slug;}
$category_tags_tmp = array_unshift($post_categories, "All");

$options = array(
	'category' => array(
		'type' => 'select',
		'label' => __('Category', 'namaste-lite'),
		'value'	  => '1',
		'desc' => __('Select a category or leave it blank for all posts.', 'namaste-lite'),
		'choices' => $post_categories
	),
	'column'  => array(
		'label'   => __( 'Columns', 'namaste-lite' ),
		'desc'    => __( 'Number of columns on big screens.', 'namaste-lite' ),
		'type'    => 'select',
		'value'	  => '3',
		'choices' => array(
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4'
		)
	),
	'delay'   => array(
		'label' => __( 'Delay', 'namaste-lite' ),
		'desc'  => __( 'The delay for autoplay in sec. (default: false)', 'namaste-lite' ),
		'type'  => 'text',
	),
	'pagination'  => array(
		'label'   => __( 'Pagination', 'namaste-lite' ),
		'type'    => 'select',
		'value'	  => 'true',
		'choices' => array(
			'true' => __( 'True', 'namaste-lite' ),
			'false' => __( 'False', 'namaste-lite' ),
		)
	),
	'navigation'  => array(
		'label'   => __( 'Navigation', 'namaste-lite' ),
		'type'    => 'select',
		'value'	  => 'dark',
		'choices' => array(
			'dark' => __( 'Dark', 'namaste-lite' ),
			'light' => __( 'Light', 'namaste-lite' ),
			'burgundy' => __( 'Burgundy', 'namaste-lite' ),
			'big' => __( 'Big', 'namaste-lite' ),
			'false' => __( 'False', 'namaste-lite' ),
		)
	),
);