<?php


namespace Level_Wp\Affiliate_Advantage\Providers;


use Level_Wp\Affiliate_Advantage\Controllers\Meta_Boxes_Controller;
use Level_Wp\Affiliate_Advantage\Plugin;

class Meta_Boxes_Service_Provider extends Base_Service_Provider {

	private $meta_boxes_controller;

	public function __construct() {
		$this->meta_boxes_controller = new Meta_Boxes_Controller();
	}

	/**
	 * Registers wordpress action hooks and filters.
	 *
	 * @return mixed|void
	 *
	 * @since 1.0.0
	 */
	public function register() {
		add_action( 'admin_menu', [ $this, 'run' ] );
		add_action( 'save_post', [ $this->meta_boxes_controller, 'save' ], 10, 2 );
	}

	public function run() {
		remove_meta_box( 'submitdiv', Plugin::get_instance()->cpt, 'side' );
//        remove_meta_box('slugdiv', Plugin::get_instance()->cpt, 'normal');


        add_meta_box( 'submitdiv', 'Publish', [
			$this->meta_boxes_controller,
			'display_submit_meta_box'
		], Plugin::get_instance()->cpt, 'side' );

		add_meta_box( 'link_options', 'Link Options', [
			$this->meta_boxes_controller,
			'display_meta_box'
		], Plugin::get_instance()->cpt, 'side', 'default', [ 'metabox' => 'link_options' ] );

		add_meta_box( 'link_details', 'Link Details', [
			$this->meta_boxes_controller,
			'display_meta_box'
		], Plugin::get_instance()->cpt, 'normal', 'default', [ 'metabox' => 'link_details' ] );

		add_meta_box( 'link_settings', 'Advanced Link Settings', [
			$this->meta_boxes_controller,
			'display_meta_box'
		], Plugin::get_instance()->cpt, 'normal', 'default', [ 'metabox' => 'link_settings' ] );

//		add_meta_box( 'insert_affiliate_link', 'Post Sponsor', [
//			$this->meta_boxes_controller,
//			'display_meta_box'
//		], 'post', 'normal', 'default', [ 'metabox' => 'insert_affiliate_link' ] );
	}

}
