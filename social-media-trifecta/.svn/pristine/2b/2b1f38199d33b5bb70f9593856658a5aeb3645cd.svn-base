<?php
if ( ! class_exists( 'smt_facebook_graph' ) ) {
	class smt_facebook_graph {
		private static $instance;
		private        $facebook_page_id_field  = 'smt_fb_page_id';
		private        $facebook_app_id         = 'smt_fb_app_id';
		private        $facebook_app_secret_key = 'smt_fb_app_secret_key';

		public function __construct() {
			add_shortcode( 'smt_facebook', array( $this, 'get_facebook_data' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		}

		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}

			return self::$instance;
		}

		function enqueue_scripts() {

			wp_register_style( 'facebook-default', plugins_url( 'css/facebook-default.css', __FILE__ ) );
			wp_register_script( 'facebook-default-js', plugins_url( 'js/facebook-default.js', __FILE__ ), array( 'jquery' ), '', true );

			wp_enqueue_style( 'facebook-default' );
			wp_enqueue_script( 'facebook-default-js' );
		}

		 function fetchUrl( $url ) {

			$ch = curl_init();
			curl_setopt( $ch, CURLOPT_URL, $url );
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
			curl_setopt( $ch, CURLOPT_TIMEOUT, 20 );
			// You may need to add the line below
			curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );

			$feedData = curl_exec( $ch );
			curl_close( $ch );

			return $feedData;


		}

		public function get_facebook_data( $atts ) {
			$profile_id     = get_option( $this->facebook_page_id_field );
			$app_id         = get_option( $this->facebook_app_id );
			$app_secret_key = get_option( $this->facebook_app_secret_key );
			$authToken      = $this->fetchUrl( "https://graph.facebook.com/oauth/access_token?grant_type=client_credentials&client_id={$app_id}&client_secret={$app_secret_key}" );

			$json_object = $this->fetchUrl( "https://graph.facebook.com/{$profile_id}/feed?{$authToken}&fields=message,full_picture,created_time,link,name,message_tags" );

			$facebook_data = json_decode( $json_object );

			$shortcode_elements = shortcode_atts( array(
				'show_scroll_bar' => 'true',
				'template'        => 'default',

			), $atts );

			if ( $facebook_data ) {
				ob_start();


				if ( $shortcode_elements[ 'show_scroll_bar' ] == 'false' ) {
					?>
					<style>
						#main-facbook-wrapper {
							height: 650px;
						}

						#triefecta-facebook-holder-default {
							overflow: hidden;
						}
					</style>
					<?php
				} elseif ( $shortcode_elements[ 'show_scroll_bar' ] == 'true' ) {
					?>
					<style>
						#main-facbook-wrapper {
							height: auto;
						}

						#triefecta-facebook-holder-default {
							overflow-y: scroll;
						}
					</style>
					<?php
				}
				//This valirable contains data sent from facebooks graph api. IT contains all values in json

				if ( $shortcode_elements[ 'template' ] == 'default' ) {
					if ( locate_template( 'social-meida-trifecta/facebook/facebook-default.php' ) ) {
						include_once( locate_template( 'social-meida-trifecta/facebook/facebook-default.php' ) );

					} else {
						include_once( SOCIAL_MEDIA_TIRFECTA . '/templates/facebook/facebook-default.php' );
					}
				} else if($shortcode_elements['template']=='developer') {
					if ( locate_template( 'social-meida-trifecta/facebook/facebook-developer.php' ) ) {
						include_once( locate_template( 'social-meida-trifecta/facebook/facebook-developer.php' ) );

					} else {
						include_once( SOCIAL_MEDIA_TIRFECTA . '/templates/facebook/facebook-developer.php' );
					}

				}else{
						return "Please select a valid template. Either default or developer";
				}

				$return = ob_get_clean();

				return $return;

			}else{
				return __('Please enter valid facebook credentials','social-meida-trifecta');
			}
		}


	}
}

add_action( 'plugins_loaded', array( 'smt_facebook_graph', 'get_instance' ) );