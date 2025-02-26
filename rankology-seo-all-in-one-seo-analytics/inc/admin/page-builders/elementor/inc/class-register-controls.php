<?php
namespace WPRankologyElementorAddon;

if ( ! defined( 'ABSPATH' ) ) {
	die();
}

class Register_Controls {
	use \WPRankologyElementorAddon\Singleton;

	/**
	 * Initialize class
	 *
	 * @return  void
	 */
	private function _initialize() {
		add_action( 'elementor/controls/register', [ $this, 'register_controls' ] );
	}

	/**
	 * Register controls
	 *
	 * @return  void
	 */
	public function register_controls( $controls_manager ) {
		$controls_manager->register( new \WPRankologyElementorAddon\Controls\Social_Preview_Control() );
		$controls_manager->register( new \WPRankologyElementorAddon\Controls\Text_Letter_Counter_Control() );
		$controls_manager->register( new \WPRankologyElementorAddon\Controls\Content_Analysis_Control() );
		$controls_manager->register( new \WPRankologyElementorAddon\Controls\Google_Suggestions_Control() );
	}
}
