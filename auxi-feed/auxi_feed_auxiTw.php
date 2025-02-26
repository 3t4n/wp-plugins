<?php

/**
 * Created by Auxilerate.com.
 */

require_once( 'lib/TwitterAPIExchange.php' );
require_once( '_inc/ui_elements.php' );

//require_once( 'admin/classes/auxi_admin.php' );

class Auxi_Feeds_Tw {

	const API_URL = "https://api.twitter.com/1.1/statuses/user_timeline.json";
	const ERROR_MESSAGE = "<h3>Missing parameters, go to Dashboard > Settings > Auxi Feed to setup the app</h3>";
	const RETURNED_ITEMS = 20;
	public $settings;
	public $reply_icon;
	public $like_icon;
	public $retweet_icon;
	public $twitter_controls;
	public $admin_page;
	public $ui_elements;
	public $feed_item_count;
	public $user_ID;
	public $auxi_admin;
	private $in_admin;
	private $oauth_access_token;
	private $oauth_access_secret;
	private $consumer_key;
	private $consumer_secret;
	private $auxi_tw_username;
	private $config_error;
	public $auxi_plugin_page_name;
	public $ajax_nonce;

	public function __construct() {

		add_action( 'app_settings', array( $this, 'load_app_settings' ) );
		add_shortcode( 'auxi_feed', array( $this, 'auxi_start' ) );
		add_action( 'admin_menu', array( $this, 'auxi_twitter_feed_plugin_menu' ) );
		add_action( 'wp_ajax_auxiadmin', array( $this, 'get_twitter_keys_data_from_admin_form' ) );
		add_action( 'wp_ajax_nopriv_auxiadmin', array( $this, 'get_twitter_keys_data_from_admin_form' ) );

		$this->ui_elements = new ui_elements();
		$this->auxi_plugin_page_name = "tw00001";

		if ( isset( $_GET["page"] ) && $_GET["page"] == $this->auxi_plugin_page_name || strstr( $_SERVER['REQUEST_URI'], "wp-admin" ) != false ) {

			self::auxi_is_user_admin();
			$this->in_admin = true;
		}

	}

	public function auxi_is_user_admin() {

		if ( current_user_can( "manage_options" ) ) {

			self::auxi_get_admin_assets();
			$this->user_ID    = get_current_user_id();
			$this->admin_page = $this->ui_elements->get_admin_page();
			$this->ajax_nonce = wp_create_nonce( "auxifeed_tw" );
			$this->admin_page = str_replace("[auxi-verif]",$this->ajax_nonce,$this->admin_page);

		} else {
			return;
		}
	}

	public function auxi_get_admin_assets() {

		if ( ! isset( $_GET['page'] ) ) {
			return;
		} else {

			$page_name = $_GET['page'];
			if ( $page_name == "tw00001" ) {
				add_action( 'admin_enqueue_scripts', array( $this, 'auxi_load_admin_assets' ) );

			} else {
				return;
			}
		}
	}

	private static function  humanTiming( $time ) {

		$time   = time() - $time; // to get the time since that moment
		$time   = ( $time < 1 ) ? 1 : $time;
		$tokens = array(
			31536000 => 'year',
			2592000  => 'month',
			604800   => 'week',
			86400    => 'day',
			3600     => 'hour',
			60       => 'minute',
			1        => 'second'
		);

		foreach ( $tokens as $unit => $text ) {
			if ( $time < $unit ) {
				continue;
			}
			$numberOfUnits = floor( $time / $unit );

			return $numberOfUnits . ' ' . $text . ( ( $numberOfUnits > 1 ) ? 's' : '' );
		}
	}

	public function auxi_start() {


		self::auxi_get_options();

		$otions_count = count( $this->settings );
		if ( $otions_count > 0 ) {
			self::init_resources();
			self::auxi_set_ui_controls();
			self::auxi_get_twitter_feed();
		}

	}

	public function  auxi_get_options() {

		$auxi_option_array = array();


		$auxi_at          = get_option( "auxi_at" );
		$auxi_as          = get_option( "auxi_as" );
		$auxi_ck          = get_option( "auxi_ck" );
		$auxi_cs          = get_option( "auxi_cs" );
		$auxi_fc          = get_option( "auxi_fc" );
		$auxi_tw_username = get_option( "auxi_tw_username" );


		if ( ! empty( $auxi_at ) ) {
			$this->oauth_access_token = $auxi_at;
		} else {
			self::auxi_send_error( "Check your access token key" );

			return;
		}
		if ( ! empty( $auxi_as ) ) {
			$this->oauth_access_secret = $auxi_as;
		} else {
			self::auxi_send_error( "Check your access secret key" );

			return;
		}
		if ( ! empty( $auxi_ck ) ) {
			$this->consumer_key = $auxi_ck;
		} else {
			self::auxi_send_error( "Check your consumer key" );

			return;
		}
		if ( ! empty( $auxi_cs ) ) {
			$this->consumer_secret = $auxi_cs;
		} else {
			self::auxi_send_error( "Check your consumer secret key" );

			return;
		}
		if ( ! empty( $auxi_fc ) ) {
			$this->feed_item_count = $auxi_fc;
		} else {
			self::auxi_send_error( "Error 12" );

			return;
		}
		if ( ! empty( $auxi_tw_username ) ) {
			$this->auxi_tw_username = $auxi_tw_username;
		} else {
			self::auxi_send_error( "Check your username" );
		}

		$this->settings = array(
			'oauth_access_token'        => $this->oauth_access_token,
			'oauth_access_token_secret' => $this->oauth_access_secret,
			'consumer_key'              => $this->consumer_key,
			'consumer_secret'           => $this->consumer_secret
		);


	}

	public function auxi_send_error( $error_number ) {
		if ( $this->in_admin == false ) {
			echo '<div><img src="' . $this->ui_elements->get_alert_icon().'"></div>An error occured (' . $error_number . '). You probably need to setup the plugin in the<a href="/wp-admin/options-general.php?page=' . $this->auxi_plugin_page_name . '"> dashboard.</a> Go to dashboard>settings>Auxi_feed';
			$this->config_error = true;

			return false;
		}
	}

	function init_resources() {

		wp_enqueue_style( 'masonry-css', plugins_url( 'assets/css/auxi_feed_min.css', __FILE__ ), array() );
		wp_enqueue_style( 'popup-css', plugins_url( 'assets/css/popup.css', __FILE__ ), array() );
		wp_register_script( 'masonry-js', plugins_url( 'assets/js/auxi_feed_min.js', __FILE__ ), '', '1.0', true );
		wp_enqueue_script( 'masonry-js', plugins_url( 'assets/js/auxi_feed_min.js', __FILE__ ) );
		wp_register_script( 'popup-js', plugins_url( 'assets/js/popup.js', __FILE__ ), '', '1.0', true );
		wp_enqueue_script( 'popup-js', plugins_url( 'assets/js/popup.js', __FILE__ ) );
	}

	private function auxi_set_ui_controls() {

		$this->reply_icon       = $this->ui_elements->set_reply_icon();
		$this->retweet_icon     = $this->ui_elements->set_retweet_icon();
		$this->like_icon        = $this->ui_elements->set_like_icon();
		$this->twitter_controls = $this->ui_elements->set_twitter_controls();

		$this->twitter_controls = str_replace( '[replyicon]', $this->reply_icon, $this->twitter_controls );
		$this->twitter_controls = str_replace( '[retweeticon]', $this->retweet_icon, $this->twitter_controls );
		$this->twitter_controls = str_replace( '[likeicon]', $this->like_icon, $this->twitter_controls );
	}

	public function auxi_get_twitter_feed() {


		$profile_image_url = "";
		$poster_name       = "";
		$tweet_text        = "";
		$expanded_url      = "";
		$reg_exUrl         = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
		$reg_exHash        = "/#([a-z_0-9]+)/i";
		$reg_exUser        = "/@([a-z_0-9]+)/i";
		$render            = '<div class="auxi_wrapper"><div class="twitter_masonry" id="twitter_masonry">';
		$tw_logo           = '<img src="' . plugin_dir_url( __FILE__ ) . '/assets/images/twitter-bird-16x16.png"/>';
		$requestMethod     = "GET";
		$count             = $this->feed_item_count;
		$auxi_get_fields   = "?screen_name=$this->auxi_tw_username&count=$count";
		$auxi_twitter      = new TwitterAPIExchange( $this->settings );
		$auxi_twitter_feed = json_decode( $auxi_twitter->setGetfield( $auxi_get_fields )
		                                               ->buildOauth( self::API_URL, $requestMethod )
		                                               ->performRequest(), $assoc = true );


		if ( isset( $auxi_twitter_feed["errors"][0]["message"] ) ) {
			$error_string = $auxi_twitter_feed["errors"][0]["message"];
			if ( $error_string != "" ) {
				$render = "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p><p><em>" . $error_string . "</em></p>";
				echo $render;

				return;
			}
		}


		foreach ( $auxi_twitter_feed as $items ) {


			if ( isset( $items["user"]["profile_image_url"] ) ) {
				$profile_image_url = $items["user"]["profile_image_url"];
			}

			if ( isset( $items["entities"]["media"][0]["media_url"] ) ) {

				$media_url     = $items["entities"]["media"][0]["media_url"];
				$media_url_img = "<div class='popup_img'><a href='" . $media_url . "'><img src='" . $media_url . "'/></a></div>";

			} else {

				$media_url_img = "<div class='popup_img'></div>";

			}
			if ( isset( $items["retweeted_status"]["user"]["name"] ) ) {

				$poster_name = $items["retweeted_status"]["user"]["name"];
			}
			if ( isset( $items["retweeted_status"]["user"]["profile_image_url"] ) ) {

				$poster_logo = $items["retweeted_status"]["user"]["profile_image_url"];

			} else {

				$poster_logo = $profile_image_url;
			}
			if ( isset( $items["retweeted_status"]["user"]["screen_name"] ) ) {

				$poster_screen_name = $items["retweeted_status"]["user"]["screen_name"];
			}
			if ( isset( $items["entities"]["urls"][0]["expanded_url"] ) ) {

				$expanded_url = $items["entities"]["urls"][0]["expanded_url"];
			}

			if ( isset( $items["text"] ) ) {
				$description = $items["text"];
			} else {
				$description = "";
			}


			if ( isset( $items["id"] ) ) {

				$twit_id = $items["id"];

			}
			if ( isset( $items["user"]["name"] ) ) {

				$editor_name = $items["user"]["name"];

			} else {
				$editor_name = "";
			}
			if ( isset( $items["user"]["screen_name"] ) ) {

				$editor_screen_name = $items["user"]["screen_name"];

			} else {
				$editor_screen_name = "";
			}
			if ( isset( $items["entities"]["urls"]["0"]["display_url"] ) ) {

				$display_url = $items["entities"]["urls"]["0"]["display_url"];

			} else {
				$display_url = "";
			}

			if ( isset( $items["entities"]["urls"]["0"]["url"] ) ) {

				$source = '<a href="' . $items["entities"]["urls"]["0"]["url"] . '">' . $display_url . '</a>';

			} else {
				$source = "";
			}

			//$created_at = $items["created_at"];
			//$elapsed_time       = self::humanTiming( strtotime( $created_at ) );
			$regex_0     = "@(http?://([-\w\.]+[-\w])+(:\d+)?(/([\w/_\.#-]*(\?\S+)?[^\.\s])?).*$)@";
			$description = preg_replace( $regex_0, ' ', $description );
			$regex_1     = "@(https?://([-\w\.]+[-\w])+(:\d+)?(/([\w/_\.#-]*(\?\S+)?[^\.\s])?).*$)@";
			$description = preg_replace( $regex_1, ' ', $description );

			$this->twitter_controls = str_replace( '[twitterid]', $twit_id, $this->twitter_controls );


			if ( $poster_name == "" ) {
				$poster_name = $editor_name;
			}

			//Process logo
			if ( ! empty( $poster_logo ) ) {
				$poster_logo = "<img src='" . $poster_logo . "'/>";
			} else {
				$poster_logo = "<img src='" . $profile_image_url . "'/>";
			}

			if ( ! empty( $poster_screen_name ) ) {
				$poster_screen_name = "@" . $poster_screen_name;
			} else {
				$poster_screen_name = "@" . $editor_screen_name;
			}


			if ( preg_match( $reg_exUrl, $items['text'], $items['url'] ) ) {
				// make the urls hyper links
				$tweet_text = preg_replace( $reg_exUrl, "<a href='{$items['url'][0]}'>{$items['url'][0]}</a> ", $items['text'] );
			}
			if ( preg_match( $reg_exHash, $tweet_text, $hash ) ) {

				// make the hash tags hyper links    https://twitter.com/search?q=%23truth
				$tweet_text = preg_replace( $reg_exHash, "<a href='https://twitter.com/search?q={$hash[0]}'>{$hash[0]}</a><br/><br/> ", $tweet_text );

				// swap out the # in the URL to make %23
				$tweet_text = str_replace( "/search?q=#", "/search?q=%23", $tweet_text );
			}

			if ( preg_match( $reg_exUser, $tweet_text, $user ) ) {

				$tweet_text = preg_replace( "/@([a-z_0-9]+)/i", "<a href='http://twitter.com/$1'>$0</a>", $tweet_text );
			}

			$feed_renderer = $this->ui_elements->auxi_render_feed();
			$desc          = self::auxi_parse_description( $description );

			$feed_renderer = str_replace( "[poster_logo]", $poster_logo, $feed_renderer );
			$feed_renderer = str_replace( "[poster_name]", $poster_name, $feed_renderer );
			$feed_renderer = str_replace( "[poster_screen_name]", $poster_screen_name, $feed_renderer );
			$feed_renderer = str_replace( "[expanded_url]", $expanded_url, $feed_renderer );
			$feed_renderer = str_replace( "[description]", $desc, $feed_renderer );
			$feed_renderer = str_replace( "[twitter_controls]", $this->twitter_controls, $feed_renderer );
			$feed_renderer = str_replace( "[tw_logo]", $tw_logo, $feed_renderer );
			$feed_renderer = str_replace( "[source]", $source, $feed_renderer );
			$feed_renderer = str_replace( "[media_url_img]", $media_url_img, $feed_renderer );

			$render .= $feed_renderer;

		}
		$render .= "</div></div>";
		$render .= '<div class="tw_sources"> <a href="http://auxillerate.com" target="new"><img src="'.$this->ui_elements->get_auxi_logo().'"/></a></div>';

		echo $render;
	}

	public function auxi_parse_description( $description ) {
		$pieces = explode( ":", $description );
		if ( isset( $pieces[1] ) ) {

			if ( isset( $pieces[2] ) ) {
				return $pieces[1] . $pieces[2];
			} else {
				return $pieces[1];
			}
		} else {
			return $description;
		}
	}

	public function get_twitter_keys_data_from_admin_form() {


		if ( isset( $_POST['oauth_access_token'] ) && ! empty( $_POST['oauth_access_token'] ) ) {
			$this->oauth_access_token = sanitize_text_field( $_POST['oauth_access_token'] );
			self::auxi_store_options( "auxi_at", $this->oauth_access_token );
		}
		if ( isset( $_POST['oauth_access_secret'] ) && ! empty( $_POST['oauth_access_secret'] ) ) {
			$this->oauth_access_secret = sanitize_text_field( $_POST['oauth_access_secret'] );
			self::auxi_store_options( "auxi_as", $this->oauth_access_secret );
		}
		if ( isset( $_POST['consumer_key'] ) && ! empty( $_POST['consumer_key'] ) ) {
			$this->consumer_key = sanitize_text_field( $_POST['consumer_key'] );
			self::auxi_store_options( "auxi_ck", $this->consumer_key );
		}
		if ( isset( $_POST['consumer_secret'] ) && ! empty( $_POST['consumer_secret'] ) ) {
			$this->consumer_secret = sanitize_text_field( $_POST['consumer_secret'] );
			self::auxi_store_options( "auxi_cs", $this->consumer_secret );
		}
		if ( isset( $_POST['feed_item_count'] ) && ! empty( $_POST['feed_item_count'] ) ) {
			$this->feed_item_count = sanitize_text_field( $_POST['feed_item_count'] );
			self::auxi_store_options( "auxi_fc", intval( $this->feed_item_count ) );
		}
		if ( isset( $_POST['auxi_tw_username'] ) && ! empty( $_POST['auxi_tw_username'] ) ) {
			$this->auxi_tw_username = sanitize_text_field( $_POST['auxi_tw_username'] );
			self::auxi_store_options( "auxi_tw_username", $this->auxi_tw_username );
		}

	}

	public function auxi_store_options( $option_name, $option_value ) {
		echo $option_name . "--" . $option_value;
		update_option( $option_name, $option_value, "yes" );
	}

	public function auxi_load_admin_assets() {

		//wp_register_script( 'admin_0-js', plugins_url( 'admin/assets/js/twitter_admin_feed.js', __FILE__ ), '', '1.0', true );
		//wp_enqueue_script( 'admin-1-js', plugins_url( 'admin/assets/js/twitter_admin_feed.js', __FILE__ ) );

		wp_register_script( 'admin_0-js', plugins_url( 'admin/assets/js/auxi_feed_admin_js.js', __FILE__ ), '', '1.0', true );
		wp_enqueue_script( 'admin-1-js', plugins_url( 'admin/assets/js/auxi_feed_admin_js.js', __FILE__ ) );

		wp_register_script( 'validate-0-js', plugins_url( 'admin/assets/js/jquery-validation/dist/jquery.validate.js', __FILE__ ), '', '1.0', true );
		wp_enqueue_script( 'validate-1-js', plugins_url( 'admin/assets/js/jquery-validation/dist/jquery.validate.js', __FILE__ ) );
		wp_enqueue_style( 'admin-style-css', plugins_url( 'admin/assets/css/admin_style.css', __FILE__ ), array() );
	}

	public function auxi_twitter_feed_plugin_menu() {
		add_options_page( 'Auxi Feed', 'Auxi Feed', 'manage_options', 'tw00001', array(
			$this,
			'auxi_get_admin_page'
		) );
	}

	public function auxi_get_admin_page() {


		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
		}
		echo $this->admin_page;
	}


}