<?php if ( ! defined( 'ABSPATH' ) ) {
	die; } // Cannot access directly.

//
// Create a section.
//
WPGP::createSection(
	$wpgp_page_opts,
	array(
		'title'  => __( 'General', 'acc-conditional-typo' ),
		'icon'   => 'fa fa-puzzle-piece',
		'fields' => array(

			array(
				'type'    => 'content',
				'content' => '<div class="wpgp--menu-detail">
									<strong>General</strong>
									<a href="https://forhad.net//support-forum/" target="_blank" class="wpgp--need-help">Need Help?</a>
									<br>
									<p>General settings connecting the most important part of this plugin. You can show  a text formate with uploading media through WP Editor with TinyMCE on a specific post or page where the shortcode applied. Load external libraries from CDN. To know more click the help button beside.</p>
								</div>',
			),

			array(
				'id'            => 'acc_wp_editor',
				'type'          => 'wp_editor',
				'desc'          => 'Here you can use this WP Editor with tinymce, if you can display a text formate.',
				'tinymce'       => true,
				'quicktags'     => true,
				'media_buttons' => true,
				'height'        => '100px',
			),

			//
			// Load Libraries.
			//
			array(
				'type'    => 'heading',
				'content' => 'Load External Libraries',
			),
			array(
				'id'         => 'acc_library_bootstrap_load',
				'type'       => 'switcher',
				'before'     => __( '<h4>Load Bootstrap</h4>', 'acc-conditional-typo' ),
				'class'      => 'acc--inline-block-fields',
				'text_on'    => __( 'Load', 'acc-conditional-typo' ),
				'text_off'   => __( 'Unload', 'acc-conditional-typo' ),
				'text_width' => 85,
				'default'    => false,
			),
			array(
				'id'         => 'acc_library_fontawesome_load',
				'type'       => 'switcher',
				'before'     => __( '<h4>Load FontAwesome5</h4>', 'acc-conditional-typo' ),
				'class'      => 'acc--inline-block-fields',
				'text_on'    => __( 'Load', 'acc-conditional-typo' ),
				'text_off'   => __( 'Unload', 'acc-conditional-typo' ),
				'text_width' => 85,
				'default'    => false,
			),
			array(
				'id'         => 'acc_library_animatecss_load',
				'type'       => 'switcher',
				'before'     => __( '<h4>Load Animate.css</h4>', 'acc-conditional-typo' ),
				'class'      => 'acc--inline-block-fields',
				'text_on'    => __( 'Load', 'acc-conditional-typo' ),
				'text_off'   => __( 'Unload', 'acc-conditional-typo' ),
				'text_width' => 85,
				'default'    => false,
			),
			array(
				'id'         => 'acc_library_vuejs_load',
				'type'       => 'switcher',
				'before'     => __( '<h4>Load Vue.js</h4>', 'acc-conditional-typo' ),
				'class'      => 'acc--inline-block-fields',
				'text_on'    => __( 'Load', 'acc-conditional-typo' ),
				'text_off'   => __( 'Unload', 'acc-conditional-typo' ),
				'text_width' => 85,
				'default'    => false,
			),
			array(
				'id'      => 'acc_lib_load_repeater',
				'type'    => 'repeater',
				'before'  => 'Also you can enqueue google fonts. Checkout <a href="https://fonts.google.com/">fonts.google.com</a>',
				'class'   => 'acc--lib-load-repeater',
				'fields'  => array(

					array(
						'id'         => 'acc_is_lib_cdn_load',
						'type'       => 'switcher',
						'title'      => __( 'Load This Link', 'acc-conditional-typo' ),
						'text_on'    => __( 'Load', 'acc-conditional-typo' ),
						'text_off'   => __( 'Unload', 'acc-conditional-typo' ),
						'text_width' => 85,
						'default'    => false,
					),
					array(
						'id'    => 'acc_lib_load_cdn_link',
						'type'  => 'text',
						'title' => 'CDN Link',
					),

				),

				'default' => array(
					array(
						'acc_is_lib_cdn_load'   => true,
						'acc_lib_load_cdn_link' => '',
					),
				),

			),

		),
	)
);
