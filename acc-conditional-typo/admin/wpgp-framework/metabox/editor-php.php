<?php if ( ! defined( 'ABSPATH' ) ) {
	die; } // Cannot access directly.

//
// Create a section.
//
WPGP::createSection(
	$wpgp_page_opts,
	array(
		'title'  => 'PHP',
		'icon'   => 'fa fa-code',
		'fields' => array(

			array(
				'type'    => 'content',
				'content' => '<div class="wpgp--menu-detail">
									<strong>PHP Code</strong>
									<a href="https://forhad.net//support-forum/" target="_blank" class="wpgp--need-help">Need Help?</a>
									<br>
									<p style="background: antiquewhite;padding: 10px;text-align: center;color: chocolate;">The code you have to write your own risk. You don\'t get any warning or error messages. You have to figure out your own way. Wrong PHP code could be a security risk for your website. So keep focus to write a valid code.</p>
								</div>',
			),

			array(
				'id'       => 'acc_code_editor_php',
				'type'     => 'code_editor',
				'settings' => array(
					'theme' => 'ambiance',
					'mode'  => 'php',
				),
			),

		),
	)
);
