<?php
/*
 * Plugin Name: 	Awesome Latest Tweets
 * Plugin URI: 		http://wordpress.org/plugins/awesome-latest-tweets/
 * Description: 	Display a list of a user's latest tweets from twitter.
 * Version: 		1.0.0
 * Author: 			Raihanul Islam
 * Author URI: 		https://www.raihanislamcse.me/
 * Text Domain: 	awesome-latest-tweets
 * License: 		GPLv3
 * License URI:		http://www.gnu.org/licenses/gpl-3.0.txt
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! class_exists( 'Display_Latest_Tweets' ) ) {

	class Display_Latest_Tweets {

		/**
		 * Instance of this class.
		 *
		 * @var object
		 */
		protected static $instance = null;

		/**
		 * Return an instance of this class.
		 *
		 * @return Display_Latest_Tweets
		 */
		public static function instance() {
			// If the single instance hasn't been set, set it now.
			if ( is_null( self::$instance ) ) {
				self::$instance = new self;
			}

			return self::$instance;
		}

		/**
		 * Display_Latest_Tweets constructor.
		 */
		public function __construct() {
			require_once dirname( __FILE__ ) . '/includes/class-twitter-api-wordpress.php';
			require_once dirname( __FILE__ ) . '/includes/widget-awesome-latest-tweets.php';

			add_action( 'wp_head', array( $this, 'widget_style' ) );
		}

		/**
		 * Widget basic style
		 */
		public function widget_style() {
			if ( ! is_active_widget( false, false, 'awesome-latest-tweets', true ) ) {
				return;
			}
			?>
            <style type="text/css">
                .widget_display_latest_tweets ul {
                    margin: 0;
                    padding: 0;
                    list-style-type: none;
                }

                .widget_display_latest_tweets ul li {
                    border-top: 1px solid rgba(0, 0, 0, 0.1);
                    padding: 1em 0;
                }

                .widget_display_latest_tweets ul li:first-child {
                    border-top: 0 none;
                    padding-top: 0;
                }

                .widget_display_latest_tweets ul li a {
                    display: inline;
                }

                .widget_display_latest_tweets span {
                    display: block;
                    margin-top: 0.5em;
                }
            </style>
			<?php
		}
	}
}


/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 */
Display_Latest_Tweets::instance();
