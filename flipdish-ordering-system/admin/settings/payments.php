<?php // Flipdish Ordering - Register Settings - Configuration

// Register Group
add_settings_section(
	'flipdish_ordering_section_payments',
	esc_html__( 'Store Payments Settings', 'flipdish_ordering' ),
	'flipdish_ordering_callback_section_payments',
	'flipdish_ordering'
);

// Fields
$apple_pay_label = 'Once activated, please email <a href="mailto:help@flipdish.com?subject=Activate Apple pay for ' . site_url() . ' &body=Hello Flipdish,%0D%0A %0D%0A Can you please activate Apple pay on my domain ' . site_url() . '.%0D%0A %0D%0A Thank you">help@flipdish.com</a> to notify us and we will enable Apple Pay for your website on our end.';

add_settings_field(
	'fd_apple_pay',
	'Apple Pay',
	'flipdish_ordering_callback_field_checkbox',
	'flipdish_ordering',
	'flipdish_ordering_section_payments',
	array(
		'id'    => 'fd_apple_pay',
		'label' => $apple_pay_label,
	)
);
