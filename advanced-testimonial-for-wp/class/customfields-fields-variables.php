<?php
	if ( ! defined( 'ABSPATH' ) ) exit;
	// custom variables
    global $itt_testimonial_metaboxname_fields;
    $itt_testimonial_metaboxname_fields = array(
        array(
            'label' => '<strong>' . __('Position', ITT_TESTIMONIAL_TEXTDOMAIN) . '</strong>',
            'desc' => __('manager', ITT_TESTIMONIAL_TEXTDOMAIN),
            'id' => ITT_TESTIMONIAL_FIELDS_PERFIX . 'position',
            'type' => 'text'
        ),
        array(
            'label' => '<strong>' . __('Company Name', ITT_TESTIMONIAL_TEXTDOMAIN) . '</strong>',
            'desc' => '',
            'id' => ITT_TESTIMONIAL_FIELDS_PERFIX . 'company_name',
            'type' => 'text'
        ),
        array(
            'label' => '<strong>' . __('Company Website', ITT_TESTIMONIAL_TEXTDOMAIN) . '</strong>',
            'desc' => __('http://www.example.com/', ITT_TESTIMONIAL_TEXTDOMAIN),
            'id' => ITT_TESTIMONIAL_FIELDS_PERFIX . 'company_url',
            'type' => 'url'
        ),
        array(
            'label' => '<strong>' . __('Email', ITT_TESTIMONIAL_TEXTDOMAIN) . '</strong>',
            'desc' => __('example@domain.com', ITT_TESTIMONIAL_TEXTDOMAIN),
            'id' => ITT_TESTIMONIAL_FIELDS_PERFIX . 'email',
            'type' => 'email'
        ),

        array(
            'label' => '<strong>' . __('Rating', ITT_TESTIMONIAL_TEXTDOMAIN) . '</strong>',
            'desc' => '',
            'id' => ITT_TESTIMONIAL_FIELDS_PERFIX . 'rating',
            'type' => 'select',
            'options' => array(
                1 => array(
                    'label' => '1 stars',
                    'value' => 'one'
                ),
                2 => array(
                    'label' => '2 stars',
                    'value' => 'two'
                ),
                3 => array(
                    'label' => '3 stars',
                    'value' => 'three'
                ),
                4 => array(
                    'label' => '4 stars',
                    'value' => 'four'
                ),
                5 => array(
                    'label' => '5 stars',
                    'value' => 'five'
                ),
            )
        ),
        array(
            'label' => '<strong>' . __('Testimonial', ITT_TESTIMONIAL_TEXTDOMAIN) . '</strong>',
            'desc' => __('Enter Testimonial here ... ', ITT_TESTIMONIAL_TEXTDOMAIN),
            'id' => ITT_TESTIMONIAL_FIELDS_PERFIX . 'desc',
            'type' => 'textarea'
        ),
    );

?>
