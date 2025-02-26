<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/billizzard
 * @since      1.0.0
 *
 * @package    Aibuy_simple_content_video_player
 * @subpackage Aibuy_simple_content_video_player/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Aibuy_simple_content_video_player
 * @subpackage Aibuy_simple_content_video_player/admin
 * @author     Hmylko Vladimir <billizzard@mail.ru>
 */
class Aibuy_simple_content_video_player_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

    public function settings_page() {
        add_options_page( 'AIBuy Player Settings', 'AIBuy Player', 'manage_options', 'aibuy_player', array($this, 'settings_page_content'));
    }

    public function settings_page_content() {
	    $successSubmit = false;
	    $errorSubmit = '';

        if (!current_user_can('manage_options')) {
            wp_die('Unauthorized user');
        }

        if (isset($_POST['aibuy_site']) && isset($_POST['aibuy_player'])) {
            check_admin_referer('wpshout_option_page_aibuy_player');
            if ($_POST['aibuy_site']) {
                update_option('aibuy_site', $_POST['aibuy_site']);
                update_option('aibuy_player', $_POST['aibuy_player']);
                $successSubmit = true;
            } else {
                $errorSubmit = 'Field "Site" is required';
            }
        }

        $values['aibuy_site'] = get_option('aibuy_site', Aibuy_simple_content_video_player::DEFAULT_SITE);
        $values['aibuy_player'] = get_option('aibuy_player', Aibuy_simple_content_video_player::PLAYER_IFRAME);
        include __DIR__ . '/index.php';
    }

    public function player_button() {
        add_filter( "mce_external_plugins", array($this, "player_add_button") );
        add_filter( 'mce_buttons', array($this, 'player_register_button') );
    }

    public function player_add_button( $plugin_array ) {
        $plugin_array['aibuy_player'] = plugin_dir_url( __FILE__ ) . 'js/aibuy_simple_content_video_player-admin.js';
        return $plugin_array;
    }

    public function player_register_button( $buttons ) {
        array_push( $buttons, 'aibuy_player' );
        return $buttons;
    }

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/aibuy_simple_content_video_player-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
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

		//wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/aibuy_simple_content_video_player-admin.js', array( 'jquery' ), $this->version, false );

	}

}
