<?php
/**
 * Registering meta boxes
 *
  */
	function aazeen_extension_get_meta_box( $meta_boxes ) {
	$array = array();
	for ($x = 0; $x <= 20; $x++)
	{
	    $array[] = esc_html__( 'Gradient-'.$x.'', 'aazeen-extension' );
	}
	$meta_boxes[] = array(
		'id' => 'gradientbg_color',
		'title' => esc_html__( 'Sub Header Settings', 'aazeen-extension' ),
		'post_types' => array( 'page' ),
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => false,
		'fields' => array(
			array(
    'name' => 'Enable/Disable Subheader',
    'id'   => 'on_off_pagesub',
    'type' => 'checkbox',
    'std'  => true, // 0 or 1
			),

			array(
				'id' => 'subheader_title_fontsize',
				'name' => esc_html__( 'Title Font size', 'aazeen-extension' ),
				'type' => 'number',
				'std' => '38',
				'max' => '400',
				'step' => '0.5',
			),


			array(
				'id' => 'page_sunheader_textcolor',
				'name' => esc_html__( 'Text Color', 'aazeen-extension' ),
				'type' => 'color',
				'std' => '#fff',
			),
			array(
				'id' => 'select_gradient_page_subheader',
				'name' => esc_html__( 'Select header gradient Background color', 'aazeen-extension' ),
				'type' => 'select_advanced',
				'placeholder' => esc_html__( 'Select an Item', 'aazeen-extension' ),
				'options'         => $array,

			),

		),
	);

	$meta_boxes[] = array(
		'id' => 'meatbox_post',
		'title' => esc_html__( 'Sub Header Settings', 'aazeen-extension' ),
		'post_types' => array( 'post' ),
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => false,
				'fields' => array(
			array(
				'id' => 'postsubheader_title_fontsize',
				'name' => esc_html__( 'Title Font size', 'aazeen-extension' ),
				'type' => 'number',
				'std' => '38',
				'max' => '400',
				'step' => '0.5',
			),


			array(
				'id' => 'post_sunheader_textcolor',
				'name' => esc_html__( 'Text Color', 'aazeen-extension' ),
				'type' => 'color',
				'std' => '#fff',
			),
			array(
				'id' => 'select_gradient_post_subheader',
				'name' => esc_html__( 'Select header gradient Background color', 'aazeen-extension' ),
				'type' => 'select_advanced',
				'placeholder' => esc_html__( 'Select an Item', 'aazeen-extension' ),
				'options'         => $array,

			),
				),
	);
	$meta_boxes[] = array(
		'id' => 'meatbox_page_menu',
		'title' => esc_html__( 'Header menu Settings(only work Header 3)', 'aazeen-extension' ),
		'post_types' => array( 'page' ),
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => false,
				'fields' => array(
			array(
				'id' => 'page_menu_textcolor',
				'name' => esc_html__( 'Menu Text Color', 'aazeen-extension' ),
				'type' => 'color',
				'std' => '',
			),
			array(
				'id' => 'page_menu_bgcolor',
				'name' => esc_html__( 'Menu Background Color', 'aazeen-extension' ),
				'type' => 'color',
				'alpha_channel' => true,
				'std' => '',

			),
			array(
    'id'        => 'enable_transparent_menu',
    'name'      => esc_html__( 'Enable/Disable transparent Menu', 'aazeen-extension' ),
    'type'      => 'switch',
    'style'     => 'rounded',
    'on_label'  => 'Enable',
    'off_label' => 'Disable',
),

				),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'aazeen_extension_get_meta_box' );
