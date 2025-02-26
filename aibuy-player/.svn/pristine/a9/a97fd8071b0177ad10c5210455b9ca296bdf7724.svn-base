<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/billizzard
 * @since      1.0.0
 *
 * @package    Aibuy_simple_content_video_player
 * @subpackage Aibuy_simple_content_video_player/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Aibuy_simple_content_video_player
 * @subpackage Aibuy_simple_content_video_player/public
 * @author     Hmylko Vladimir <billizzard@mail.ru>
 */
class Aibuy_simple_content_video_player_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

    function filter_the_content_in_the_main_loop( $content ) {
        if ( in_the_loop() && is_main_query() ) {
            $site = get_option('aibuy_site', Aibuy_simple_content_video_player::DEFAULT_SITE);
            $pattern = '/<img [^>]* data-u="https:\/\/' . $site . '\/([^"]*)" data-w="([^"]*)" data-h="([^"]*)" [^>]*\/?>/i';

            $content =  preg_replace($pattern, $this->getReplacement($site), $content);
        }

        return $content;
    }

    function getReplacement($site) {
	    $player = get_option('aibuy_player', Aibuy_simple_content_video_player::PLAYER_IFRAME);
	    if ($player == Aibuy_simple_content_video_player::PLAYER_JS) {
	        return $this->getJsReplacement();
        }
        return $this->getIframeReplacement($site);
    }

    function getIframeReplacement($site) {
	    return '
            <div class="cinsay-player-wrapper cinsay-player-wrapper--iframe" style="width:$2; height:$3">
                <iframe frameborder="0" src="//' . $site . '/embed/$1"></iframe >
            </div>';
    }

    function getJsReplacement() {
        return '
            <div class="cinsay-player-wrapper cinsay-player-wrapper--html" style="width: $2; height: $3">
                <div class="cinsay-vss" data-guid="$1">
                    <div class="cinsay-player">
                        <video class="cinsay-video-player" playsinline="1" preload="none"></video>
                    </div>
                </div>
            </div>';
    }

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Aibuy_simple_content_video_player_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Aibuy_simple_content_video_player_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/aibuy_simple_content_video_player-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Aibuy_simple_content_video_player_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Aibuy_simple_content_video_player_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/aibuy_simple_content_video_player-public.js', array( 'jquery' ), $this->version, false );
        if (get_option('aibuy_player') == Aibuy_simple_content_video_player::PLAYER_JS) {
            wp_enqueue_script($this->plugin_name, '//vss.aibuy.io/assets/js/vss.js', null, null, true);
        }

	}

}
