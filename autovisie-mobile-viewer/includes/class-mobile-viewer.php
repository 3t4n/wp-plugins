<?php

/**
 * Core functions
 *
 * @link       https://autovisie.nl
 * @since      1.0.0
 *
 * @package    Mobile_Viewer
 * @subpackage Mobile_Viewer/includes
 */



class Mobile_Viewer {


	/*
	 * get all the phones
	 */
	public function phones() {
		$phones = array(
			'iphone6' => array(
				'title' => 'iPhone 6',
				'active' => 1
			),
			'samsung-s7' => array(
				'title' => 'Samsung S7',
				'active' => 0
			)
		);

		return $phones;
	}

	public function run() {

		add_action( 'wp_enqueue_scripts', 'Mobile_Viewer_Public::enqueue_styles');
		add_filter( 'body_class', 'Mobile_Viewer_Public::add_body_class' );
		add_action( 'wp_head', 'Mobile_Viewer_Public::remove_admin_bar' );
		add_action( 'widgets_init', 'Mobile_Viewer_Widget::register_widget');

	}
}