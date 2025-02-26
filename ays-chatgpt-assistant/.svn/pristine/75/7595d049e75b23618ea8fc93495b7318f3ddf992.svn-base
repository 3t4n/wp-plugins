<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://ays-pro.com/
 * @since      1.0.0
 *
 * @package    Ays_Chatgpt_Assistant
 * @subpackage Ays_Chatgpt_Assistant/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Ays_Chatgpt_Assistant
 * @subpackage Ays_Chatgpt_Assistant/admin
 * @author     Ays_ChatGPT Assistant Team <info@ays-pro.com>
 */
class Chatgpt_Assistant_Admin {

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
	 * @var Chatgpt_Assistant_DB_Actions
	 */
	private $db_obj;

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

		$this->db_obj = new Chatgpt_Assistant_DB_Actions( $this->plugin_name );

		// include_once(plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/chatgpt-assistant-chatbox-display.php');
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
		 * defined in Chatgpt_Assistant_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Chatgpt_Assistant_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/chatgpt-assistant-admin.css', array(), $this->version, 'all' );

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
		 * defined in Chatgpt_Assistant_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Chatgpt_Assistant_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/chatgpt-assistant-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
     * Register the administration menu for this plugin into the WordPress Dashboard menu.
     *
     * @since    1.0.0
     */
    public function add_plugin_admin_menu(){
        global $wpdb;

        $menu_item = __( "ChatGPT Assistant", "ays-chatgpt-assistant" );
        $this->capability = 'manage_options';

        $hook_page_view = add_menu_page(
            __( 'ChatGPT Assistant', "ays-chatgpt-assistant" ),
            $menu_item,
            $this->capability,
            $this->plugin_name,
            array($this, 'display_plugin_main_page'),
            CHATGPT_ASSISTANT_ADMIN_URL . '/images/icons/chatgpt-icon-menu.png',
            '6.224'
        );
    }

	public function display_plugin_main_page(){
		if (isset( $_POST['ays_chatgpt_assistant_save_bttn'] )) {
			$this->db_obj->add_or_edit_item( $_POST );
		}
        include_once('partials/chatgpt-assistant-data-display.php');
    }

	public function chatgpt_display_chat_icon(){
        include_once(plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/chatgpt-assistant-chatbox-display.php');
    }
}
