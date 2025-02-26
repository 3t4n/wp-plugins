<?php if ( ! defined( 'ABSPATH' ) ) {
	die; } // Cannot access directly.

//
// Create a section.
//
WPGP::createSection(
	$wpgp_page_opts,
	array(
		'title'  => __( 'HTML', 'acc-conditional-typo' ),
		'icon'   => 'fa fa-html5',
		'fields' => array(

			array(
				'type'    => 'content',
				'content' => '<div class="wpgp--menu-detail">
									<strong>HTML Code</strong>
									<a href="https://forhad.net//support-forum/" target="_blank" class="wpgp--need-help">Need Help?</a>
									<br>
									<p>Hypertext Markup Language is the standard markup language for documents designed to be displayed in a web browser.  If you leave any closing tag, your website can be messy and the W3C validator will not point them out. You can use any attribute like id or class that able to style via CSS or JavaScript code editor.</p>
								</div>',
			),

			array(
				'id'       => 'acc_code_editor_html',
				'type'     => 'code_editor',
				'settings' => array(
					'theme' => 'mdn-like',
					'mode'  => 'htmlmixed',
				),
			),

		),
	)
);
