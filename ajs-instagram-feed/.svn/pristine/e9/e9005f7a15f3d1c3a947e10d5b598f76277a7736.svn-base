<?php

	class Ajs_Instagram_Feed_Admin {

		private $version;

		public function __construct( $version ) {			
			$this->version = $version;
		}

		public function enqueue_styles() {			
			wp_enqueue_style(
				'ajs-instagram-feed-admin',
				plugin_dir_url( __FILE__ ) . 'css/ajs-instagram-feed-admin.css',
				array(),
				$this->version,
				FALSE
			);
			
			wp_enqueue_style(
				'ajs-instagram-feed-admin-font-awesome',
				plugins_url('ajs-instagram-feed/font-awesome/css/font-awesome.min.css'),
				array(),
				$this->version,
				FALSE
			);
			
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_script( 'ajs-instagram-feed-admin-script', plugin_dir_url( __FILE__ ) . 'js/ajs-instagram-feed-admin-script.js', array( 'wp-color-picker' ), false, true );

		}

		/** Create menu for options page */
		public function ajs_instagram_feed_admin_actions() {			
			add_options_page(__('AJS Instagram Feed', 'ajs-insta'), __('AJS Instagram Feed', 'ajs-insta'), 'manage_options', 'ajs-instagram-feed', array(
							 $this,
							 'ajs_instagram_feed_admin'
							));
		}
		
		/** To perform admin page functionality */
		function ajs_instagram_feed_admin() {		
			if ( !current_user_can('manage_options') )
				wp_die( __('You do not have sufficient permissions to access this page.','ajs-instagram-feed') );
			require_once plugin_dir_path( __FILE__ ) . 'partials/ajs-instagram-feed.php';
		}
	}
?>