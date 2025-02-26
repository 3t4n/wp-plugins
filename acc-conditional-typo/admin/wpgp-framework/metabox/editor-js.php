<?php if ( ! defined( 'ABSPATH' ) ) {
	die; } // Cannot access directly.

//
// Create a section.
//
WPGP::createSection(
	$wpgp_page_opts,
	array(
		'title'  => __( 'JavaScript', 'acc-conditional-typo' ),
		'icon'   => 'fa fa-file-code-o',
		'fields' => array(

			array(
				'type'    => 'content',
				'content' => '<div class="wpgp--menu-detail">
									<strong>JavaScript Code</strong>
									<a href="https://forhad.net//support-forum/" target="_blank" class="wpgp--need-help">Need Help?</a>
									<br>
									<p>You can write jQuery here.</p>
								</div>',
			),

			array(
				'id'       => 'acc_code_editor_js',
				'type'     => 'code_editor',
				'settings' => array(
					'theme' => 'monokai',
					'mode'  => 'javascript',
				),
			),

		),
	)
);
