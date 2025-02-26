<?php if ( ! defined( 'ABSPATH' ) ) {
	die; } // Cannot access directly.

//
// Set a unique slug-like ID.
//
$wpgp_prefix = '_wpgp_option_global';

//
// Create customize options.
//
WPGP::createOptions(
	$wpgp_prefix,
	array(
		'framework_title'   => __( '<strong>Advanced Custom Code</strong>', 'acc-conditional-typo' ),
		'menu_title'        => __( 'Global', 'acc-conditional-typo' ),
		'menu_parent'       => 'edit.php?post_type=gpac_code',
		'menu_slug'         => 'wpgpsc_global',
		'menu_type'         => 'submenu',
		'sticky_header'     => false,
		'show_bar_menu'     => false,
		'show_search'       => false,
		'show_network_menu' => false,
		'ajax_save'         => false,
		'theme'             => 'light',
		'footer_credit'     => __( 'If you like <strong>ACC</strong> please consider leaving a <a href="https://wordpress.org/plugins/acc-conditional-typo/" target="_blank">&#9733;&#9733;&#9733;&#9733;&#9733;</a> review. It will help us to grow the plugin and make it more popular. Thank you.', 'acc-conditional-typo' ),
		'class'             => 'wpgpsc--option-global',
	)
);
