<?php

class RWITPF_Assets {

	private $settings;
	public function __construct()
	{
		$helper = new RWITPF_Helper();
		$this->settings = $helper->getSettingData();
		add_action( 'wp_enqueue_scripts', array($this, 'frontend_scripts') );
	}
	/**
	 * Enqueue frontend scripts and styles.
	 */
	function frontend_scripts() {
		wp_enqueue_script(
		'rwitpf-frontend-js',
		plugins_url( '../assets/js/frontend.js', __FILE__ ),
		[ 'jquery' ],
		'11272018'
		);
		
		wp_localize_script( 'rwitpf-frontend-js', 'options', $this->settings );

		wp_enqueue_style(
			'rwitpf-frontend',
			plugins_url('../assets/css/frontend.css', __FILE__ )
		);
	}
}