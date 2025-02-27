<?php
/**
 * RegisterTagManager Init
 *
 * @version 1.0.1
 * @package 'datalayer'
 */

namespace DatalayerForWoocommerceFree;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'RegisterTagManager' ) ) :

	/**
	 * Class RegisterTagManager
	 */
	class RegisterTagManager {


		/**
		 * Instance
		 *
		 * @var null $instance Instance.
		 */
		protected static $instance = null;

		/**
		 * Options
		 *
		 * @var array $options Options.
		 */
		private $options;

		/**
		 * RegisterTagManager constructor.
		 */
		private function __construct() {
			add_action( 'wp_head', array( $this, 'hook_google_tag_manager_head' ) );
			add_filter( 'template_include', array( $this, 'custom_include' ), 0 );
			add_filter( 'wp_body_open', array( $this, 'hook_google_tag_manager_body' ), 0 );
		}

		/**
		 * Return an instance of this class.
		 *
		 * @return self::$instance
		 */
		public static function instance() {
			if ( null === self::$instance ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Custom Include
		 *
		 * @param object $template  Custom Include.
		 *
		 * @return mixed
		 */
		public function custom_include( $template ) {
			ob_start();
			return $template;
		}

		/**
		 * Push to DataLayer
		 *
		 * @name 'hook_google_tag_manager_head'
		 */
		public function hook_google_tag_manager_head() {
			$this->options = get_option( 'options_tracking_option_free' );
			if ( isset( $this->options['tracking_google_tag_manager'] ) && ! empty( $this->options['tracking_google_tag_manager'] ) ) {
				if ( $this->options['tracking_google_tag_manager'] ) :
					$google_tag_manager = $this->options['tracking_google_tag_manager'];
					printf(
						"<!-- Google Tag Manager -->
                <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
                'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
                })(window,document,'script','dataLayer','%s');</script>
                <!-- End Google Tag Manager -->",
						esc_attr( $google_tag_manager )
					);
				endif;
			};
		}

		/**
		 * Push to DataLayer
		 *
		 * @name 'hook_google_tag_manager_body'
		 */
		public function hook_google_tag_manager_body() {
			$this->options = get_option( 'options_tracking_option_free' );
			if ( isset( $this->options['tracking_google_tag_manager'] ) && ! empty( $this->options['tracking_google_tag_manager'] ) ) {
				if ( $this->options['tracking_google_tag_manager'] ) :
					$google_tag_manager = $this->options['tracking_google_tag_manager'];
					printf(
						"<!-- Google Tag Manager (noscript) -->
<noscript><iframe src='https://www.googletagmanager.com/ns.html?id=%s' height='0' width='0' style='display:none;visibility:hidden'></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->",
						esc_attr( $google_tag_manager )
					);
				endif;
			};
		}


	}

endif;
