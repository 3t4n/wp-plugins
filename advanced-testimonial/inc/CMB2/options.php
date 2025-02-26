<?php

add_action( 'cmb2_admin_init', 'bts_slider_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function bts_slider_metabox() {
	/**
	 * Sample metabox to demonstrate each field type included
	 */

	$bts_slide_field = new_cmb2_box( array(
		'id'            => 'slider_metabox',
		'title'         => esc_html__( 'Test Metabox', 'cmb2' ),
		'object_types'  => array( 'slider', ),
	) );

	$bts_slide_field->add_field( array(
		'name' => esc_html__( 'Sub Heading', 'cmb2' ),
		'desc' => esc_html__( 'Sub Heading', 'cmb2' ),
    	'default' 	=> 'Trusted',
		'id'   => 'bts_subheading',
		'type' => 'text',
	) );
	$bts_slide_field->add_field( array(
		'name' => esc_html__( 'Heading', 'cmb2' ),
		'desc' => esc_html__( 'Heading', 'cmb2' ),
    	'default' 	=> 'Slider loved by users & clients world wide',
		'id'   => 'bts_heading',
		'type' => 'text',
	) );

	// $bts_group_field_id is the field id string, so in this case: 'advanced_testimonial_slider_group'
	$bts_group_field_id = $bts_slide_field->add_field( array(
		'id'          => 'advanced_testimonial_slider_group',
		'type'        => 'group',
		'description' => esc_html__( 'Generates reusable form entries', 'cmb2' ),
		'options'     => array(
			'group_title'    => esc_html__( 'Entry {#}', 'cmb2' ), // {#} gets replaced by row number
			'add_button'     => esc_html__( 'Add Another Entry', 'cmb2' ),
			'remove_button'  => esc_html__( 'Remove Entry', 'cmb2' ),
			'sortable'       => true,
			// 'closed'      => true, // true to have the groups closed by default
			// 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
		),
	) );

	$bts_slide_field->add_group_field( $bts_group_field_id, array(
      'name'          => __( 'Client Image', 'cmb2' ),
      'desc'          => 'Upload an image or enter an URL.',
      'default' 	  => plugin_dir_url( __DIR__ ) .'client.png',
      'id'            => 'client_img',
      'type'          => 'file',
        'options' => array(
            'url' => true,
        ),
        'text'    => array(
            'add_upload_file_text' => 'Add Image' 
        ),
        'query_args' => array(
            'type' => array(
                'image/jpeg',
                'image/png',
            ),
        ),
        'preview_size' => 'medium',
    ) );


	$bts_slide_field->add_group_field( $bts_group_field_id, array(
		'name'		=> esc_html__( 'Client Name', 'cmb2' ),
		'desc'		=> esc_html__( 'Client Name', 'cmb2' ),
    	'default' 	=> 'Monowar',
		'id'         => 'client_name',
		'type'       => 'text',
	) );

	$bts_slide_field->add_group_field( $bts_group_field_id, array(
		'name'       => esc_html__( 'Client Designation', 'cmb2' ),
		'desc'       => esc_html__( 'Client Designation', 'cmb2' ),
    	'default' => 'Developer',
		'id'         => 'client_deg',
		'type'       => 'text',
	) );

	$bts_slide_field->add_group_field( $bts_group_field_id, array(
		'name'             => esc_html__( 'Rating', 'cmb2' ),
		'id'               => 'review_star_number',
    	'default' => 'Developer',
		'type'             => 'select',
		'show_option_none' => false,
		'options'          => array(
			'5'     => esc_html__( '5', 'cmb2' ),
			'4'     => esc_html__( '4', 'cmb2' ),
			'3'     => esc_html__( '3', 'cmb2' ),
			'2'   	=> esc_html__( '2', 'cmb2' ),
			'1' 	=> esc_html__( '1', 'cmb2' ),
		),
	) );

	$bts_slide_field->add_group_field( $bts_group_field_id, array(
		'name' => esc_html__( 'Testimonial Date Picker', 'cmb2' ),
		'desc' => esc_html__( ' Select client review date', 'cmb2' ),
    	'default' => ' on 29 Aug, 2019',
		'id'   => 'client_review_date',
		'type' => 'text_date',
		'date_format' => 'd-M-Y',
	) );


	$bts_slide_field->add_group_field( $bts_group_field_id, array(
		'name'       => esc_html__( 'Slide Content', 'cmb2' ),
		'desc'       => esc_html__( 'Slide Content', 'cmb2' ),
    	'default' => 'At vero eos et et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem eirmod tempor invidunt ut et dolore magna aliquyam erat, sed diam voluptua.
    	
    	Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet repellendus obcaecati nostrum enim. Nostrum laboriosam quos eligendi explicabo tempore illo excepturi aut aperiam cumque quam. Eos, commodi, quod, repellat ipsa in quaerat id laboriosam ducimus ullam minima aut et quae officia incidunt distinctio!',
		'id'         => 'slide_desc',
		'type'       => 'textarea_small',
	) );


}
