<?php
use MetzWeb\Instagram\Instagram;

if ( ! class_exists( 'smt_get_instagram' ) ) {
	class smt_get_instagram {
		private static $instance;

		public function __construct() {
			add_shortcode( 'smt_instagram', array( $this, 'instagram_initilization' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

		}

		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}

			return self::$instance;
		}
		function enqueue_scripts(){
			wp_register_style( 'instagram-default', plugins_url( 'css/instagram-default.css', __FILE__ ) );
			wp_register_script( 'instagram-default-js',  plugins_url( 'js/instagram-default.js', __FILE__ ), array( 'jquery' ), '', true );

			wp_enqueue_style( 'instagram-default' );
			wp_enqueue_script( 'instagram-default-js' );
		}

		public function instagram_initilization($atts) {
			require_once( dirname( __FILE__ ) . '/src/Instagram.php' );

			$shortcode_elements = shortcode_atts( array(
				'show_scroll_bar' => 'true',
				'template'        => 'default',
			), $atts );

			ob_start();
			if ( $shortcode_elements[ 'show_scroll_bar' ] == 'false' ) {
				?>
				<style>
					#trifecta-instagram-main-wrapper {
						height: 650px;
					}

					#trifecta-instagram-holder-default {
						overflow: hidden;
					}
				</style>
				<?php
			} elseif ( $shortcode_elements[ 'show_scroll_bar' ] == 'true' ) {
				?>
				<style>
					#trifecta-instagram-main-wrapper {
						height: auto;
					}

					#trifecta-instagram-holder-default {
						overflow-y: scroll;
					}
				</style>
				<?php
			}


			try {
				$instagram = new Instagram( array(
					'apiKey'      => get_option( "instagram_app_id" ),
					'apiSecret'   => get_option( "instagram_app_secret_key" ),
					'apiCallback' => '',

				) );

				$access_token = get_option( "instagram_access_token" );
				$instagram->setAccessToken( $access_token );
				// now you have access to all authenticated user methods
				$instagram_data = $instagram->getUserMedia( 'self', 13 );


				if ( $instagram_data->meta->code === 200 ) {
					if ( $shortcode_elements[ 'template' ] == 'default' ) {

						if ( locate_template( 'social-meida-trifecta/instagram/instagram-default.php' ) ) {

							include_once( locate_template( 'social-meida-trifecta/instagram/instagram-default.php', true ) );

						} else {
							include_once( SOCIAL_MEDIA_TIRFECTA . '/templates/instagram/instagram-default.php' );
						}
					} else if($shortcode_elements['template']=='developer') {
						if ( locate_template( 'social-meida-trifecta/instagram/instagram-developer.php' ) ) {
							include_once( locate_template( 'social-meida-trifecta/instagram/instagram-developer.php' ) );

						} else {
							include_once( SOCIAL_MEDIA_TIRFECTA . '/templates/instagram/instagram-developer.php' );
						}

					}else{
						return "Please select a valid template. Either default or developer";
					}
				}else{
					echo "Error code ".$instagram_data->meta->code ;
				}


			} catch ( Exception $e ) {
				echo $e->getMessage();
			}
			$output = ob_get_clean();

			return $output;

		}
	}
}

add_action( 'plugins_loaded', array( 'smt_get_instagram', 'get_instance' ) );