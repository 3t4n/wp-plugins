<?php
if ( ! class_exists( 'smt_twitter_tweets' ) ) {
	class smt_twitter_tweets {
		private static $instance;
		private        $tmhOAuth;

		public function __construct() {
			add_shortcode( 'smt_twitter', array( $this, 'twitter_auth' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

		}

		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}

			return self::$instance;
		}

		public function twitter_auth( $atts ) {
			require_once( dirname( __FILE__ ) . '/lib/tmhOAuth/tmhOAuth.php' );
			$this->tmhOAuth = new tmhOAuth( array(
				'consumer_key'    => get_option( 'twitter_consumer_key' ),
				'consumer_secret' => get_option( 'twitter_secreat_consumer_key' ),
				'token'           => get_option( 'access_token_twitter' ),
				'secret'          => get_option( 'twitter_secret_access_token' ),
			) );
			$params         = array(

				'count' => 5,// Need to make it dynamic in next version
			);

			$shortcode_elements = shortcode_atts( array(
				'show_scroll_bar' => 'true',
				'template'        => 'default',

			), $atts );
			$response_code      = $this->tmhOAuth->request( 'GET', $this->tmhOAuth->url( '1.1/statuses/user_timeline.json' ), $params );
			// For additional response https://dev.twitter.com/rest/reference
			ob_start();


			$twitter_data = json_decode( $this->tmhOAuth->response[ 'response' ], true );
			if ( $shortcode_elements[ 'template' ] == 'default' ) {

				if ( locate_template( 'social-meida-trifecta/twitter/twitter-default.php' ) ) {

					include_once( locate_template( 'social-meida-trifecta/twitter/twitter-default.php', true ) );

				} else {
					include_once( SOCIAL_MEDIA_TIRFECTA . '/templates/twitter/twitter-default.php' );
				}
			} else if ( $shortcode_elements[ 'template' ] == 'developer' ) {
				if ( locate_template( 'social-meida-trifecta/twitter/twitter-developer.php' ) ) {
					include_once( locate_template( 'social-meida-trifecta/twitter/twitter-developer.php' ) );

				} else {
					include_once( SOCIAL_MEDIA_TIRFECTA . '/templates/twitter/twitter-developer.php' );
				}
			} else {
				return "Please select a valid template. Either default or developer";
			}

			$return = ob_get_clean();

			return $return;


		}

		public function autolink( $tweet ) {
			require_once( dirname( __FILE__ ) . '/lib/twitter-text-php/lib/Twitter/Autolink.php' );

			$autolinked_tweet = Twitter_Autolink::create( $tweet, false )->setNoFollow( false )->setExternal( false )->setTarget( '' )->setUsernameClass( '' )->setHashtagClass( '' )->setURLClass( '' )->addLinks();

			return $autolinked_tweet;
		}

		public function get_tweet_date( $tweet ) {
			$utc_offset = $tweet[ 'user' ][ 'utc_offset' ];
			$tweet_time = strtotime( $tweet[ 'created_at' ] ) + $utc_offset;


			$format       = str_replace( '%O', date( 'S', $tweet_time ), '%I:%M %p %b %e%O' );  // The defult date format e.g. 12:08 PM Jun 12th. See: http://php.net/manual/en/function.strftime.php
			$display_time = strftime( $format, $tweet_time );

			return $display_time;


		}

		function enqueue_scripts() {

			wp_register_style( 'smt-twitter-default', plugins_url( 'css/smt-twitter.css', __FILE__ ) );


			wp_enqueue_style( 'smt-twitter-default' );

		}


	}
}

add_action( 'plugins_loaded', array( 'smt_twitter_tweets', 'get_instance' ) );