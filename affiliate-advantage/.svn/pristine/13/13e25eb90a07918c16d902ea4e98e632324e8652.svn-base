<?php


namespace Level_Wp\Affiliate_Advantage\Providers;


use Level_Wp\Affiliate_Advantage\Plugin;

class Assets_Service_Provider extends Base_Service_Provider {

	/**
	 * Registers wordpress action hooks and filters.
	 *
	 * @return mixed|void
	 *
	 * @since 1.0.0
	 */
	public function register() {
		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_styles' ] );
	}

	public function run() {

	}

	/**
	 * Enqueues admin script and styles
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function enqueue_scripts() {
	    global $post_type;

		if ( Plugin::get_instance()->cpt == get_post_type() ) {
//            wp_dequeue_script( 'autosave' );
        }

		// Only loads our styles on our pages
		if ( get_current_screen()->post_type == Plugin::get_instance()->cpt ) {
			wp_enqueue_script( 'media-upload' );
			wp_enqueue_script( 'thickbox' );
            wp_enqueue_media();

			wp_register_script( 'affiliate-advantage', Plugin::get_instance()->get_url() . 'Assets/js/affiliate-advantage.js', array(
				'jquery',
				'thickbox',
				'affiliate-advantage-chart-js'
			) );
			wp_register_script( 'affiliate-advantage-chart-js', Plugin::get_instance()->get_url() . 'Assets/js/chart.js' );

			wp_enqueue_script( 'affiliate-advantage-chart-js' );
			wp_enqueue_script( 'affiliate-advantage' );

			wp_localize_script( 'affiliate-advantage', 'affiliate_advantage', [
				'prefix' => Plugin::get_instance()->prefix,
				'cpt' => Plugin::get_instance()->cpt
			] );

			wp_register_style( 'affiliate-advantage-admin', Plugin::get_instance()->get_url() . 'Assets/css/affiliate-advantage-admin.css' );

			wp_enqueue_style( 'affiliate-advantage-admin' );


		}

	}

	/**
	 * Enqueues frontend script and styles
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function enqueue_styles() {
		wp_register_style( 'affiliate-advantage', Plugin::get_instance()->get_url() . 'Assets/css/affiliate-advantage.css' );
		wp_register_style( 'affiliate-advantage-bootstrap', Plugin::get_instance()->get_url() . 'Assets/css/affiliate-advantage.css' );

		wp_enqueue_style( 'affiliate-advantage' );
	}
}
