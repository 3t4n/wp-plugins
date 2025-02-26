<?php // Flipdish Ordering - Register Settings - Configuration

// Register Group
add_settings_section(
	'flipdish_ordering_section_configuration',
	esc_html__( 'Store Configuration', 'flipdish_ordering' ),
	'flipdish_ordering_callback_section_configuration',
	'flipdish_ordering'
);

// Fields
add_settings_field(
	'fd_portal_id',
	esc_html__( 'Flipdish AppID', 'flipdish_ordering' ),
	'flipdish_ordering_callback_field_text',
	'flipdish_ordering',
	'flipdish_ordering_section_configuration',
	array(
		'id'    => 'fd_portal_id',
		'label' => __( '<a href="https://help.flipdish.com/en/articles/4175488-how-to-find-your-appid" rel="noopener noreferrer" target="_blank">Learn how to get your Flipdish AppID here.</a>', 'flipdish_ordering' ),
	)
);
