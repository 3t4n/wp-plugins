<?php if ( ! defined( 'ABSPATH' ) ) {
	die; } // Cannot access directly.

//
// Create a section.
//
WPGP::createSection(
	$wpgp_page_opts,
	array(
		'title'  => 'CSS',
		'icon'   => 'fa fa-css3',
		'fields' => array(

			array(
				'type'    => 'content',
				'content' => '<div class="wpgp--menu-detail">
									<strong>CSS Code</strong>
									<a href="https://forhad.net//support-forum/" target="_blank" class="wpgp--need-help">Need Help?</a>
									<br>
									<p>Cascading Style Sheets is a style sheet language used for describing the presentation of a document written in a markup language like HTML. Your styles could not be working if other styles overwrite yours. In this case, you can level up your specificity or use "!important" rule.</p>
								</div>',
			),

			array(
				'id'       => 'acc_code_editor_css',
				'type'     => 'code_editor',
				'settings' => array(
					'theme' => 'mbo',
					'mode'  => 'css',
				),
			),

		),
	)
);
