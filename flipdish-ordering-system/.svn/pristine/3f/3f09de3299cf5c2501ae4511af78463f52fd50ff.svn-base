<?php // Flipdish Ordering - Register Settings - Display

// Register Group
add_settings_section(
	'flipdish_ordering_section_display',
	esc_html__( 'Ordering System Display Settings', 'flipdish_ordering' ),
	'flipdish_ordering_callback_section_display',
	'flipdish_ordering'
);


// Fields
add_settings_field(
	'fd_data_offset_value',
	esc_html__( 'Space above Basket', 'flipdish_ordering' ),
	'flipdish_ordering_callback_field_text',
	'flipdish_ordering',
	'flipdish_ordering_section_display',
	array(
		'id'    => 'fd_data_offset_value',
		'label' => esc_html__( 'When headings are fixed on the page they can overlap the Basket. Increase this number in order to move the Basket down.', 'flipdish_ordering' ),
	)
);


add_settings_field(
	'fd_initial_screen',
	esc_html__( 'Initial Ordering System Screen', 'flipdish_ordering' ),
	'flipdish_ordering_callback_field_radio',
	'flipdish_ordering',
	'flipdish_ordering_section_display',
	array(
		'id'      => 'fd_initial_screen',
		'label'   => esc_html__( 'Initial ordering system display page.', 'flipdish_ordering' ) . ' <a href="https://help.flipdish.com/en/articles/1088676-add-web-ordering-to-your-website">Learn more.</a>',
		'options' => array(
			'options' => esc_html__( 'Ordering Options', 'flipdish_ordering' ),
			'menu'    => esc_html__( 'Menu', 'flipdish_ordering' ),
		),
	)
);

add_settings_field(
	'fd_mobile_full_screen',
	'Display page header and footer on mobile',
	'flipdish_ordering_callback_field_checkbox',
	'flipdish_ordering',
	'flipdish_ordering_section_display',
	array(
		'id'    => 'fd_mobile_full_screen',
		'label' => esc_html__( 'Choose whether to display your page header and footer on mobile or not.', 'flipdish_ordering' ),
	)
);

add_settings_field(
	'fd_add_css',
	'Additional CSS',
	'flipdish_ordering_callback_field_textarea',
	'flipdish_ordering',
	'flipdish_ordering_section_display',
	array(
		'id'    => 'fd_add_css',
		'label' => esc_html__( 'Additional CSS added to the <head>', 'flipdish_ordering' ),
	)
);

add_settings_field(
	'fd_new_web_ordering',
	esc_html__( 'For Flipdish Use Only', 'flipdish_ordering' ),
	'flipdish_ordering_callback_field_checkbox',
	'flipdish_ordering',
	'flipdish_ordering_section_display',
	array(
		'id'    => 'fd_new_web_ordering',
	)
);
