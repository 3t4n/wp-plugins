<?php

/**
 * @link       https://bitbucket.org/allouise/easy-hide-form/
 * @since      1.0.0
 *
 * @package    Alf_Easy_Hide_Form
 * @subpackage Alf_Easy_Hide_Form/admin
 */

/**
 * @package    Alf_Easy_Hide_Form
 * @subpackage Alf_Easy_Hide_Form/admin
 * @author     Allyson Flores <elixirlouise@gmail.com>
 */
class Alf_Easy_Hide_Form_Admin {

	/**
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of plugin.
	 */
	private $plugin_name;

	/**
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of plugin.
	 * @param      string    $version    The version of plugin.
	 */
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/easy-hide-form-admin.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/easy-hide-form-admin.js', array( 'jquery' ), $this->version, false );
	}

	/**
	 * Add Settings Links in Plugin list page
	 *
	 * @since    1.0.0
	 */
	public function add_settings_link_plugin( $links ) {
		$links[] = '<a href="' . admin_url( 'admin.php?page=' . $this->plugin_name ) . '">' . __('Settings') . '</a>';
		return $links;
	}

	/**
	 * Add Settings page for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function add_admin_menu_page() {
		
		add_menu_page( __( ALF_EASY_HIDE_FORM_TITLE." Settings", $this->plugin_name ), __( ALF_EASY_HIDE_FORM_TITLE, $this->plugin_name ), "manage_options", $this->plugin_name, array( $this, 'display_settings_page' ), plugins_url( 'easy-hide-form/images/icon-sm.png' ), 80 );
	}

	/**
	 * Dashboard page for the Admin Area.
	 *
	 * @since    1.0.0
	 */
	public function display_settings_page() {
		require_once plugin_dir_path( __FILE__ ). 'partials/easy-hide-form-admin-display.php';
	}

	/**
	 * Register Settings for the plugin.
	 *
	 * @since    1.0.0
	 */
	public function register_setting() {
		$args = array(
			'type' => 'string', 
			'sanitize_callback' => 'sanitize_text_field',
			'default' => NULL,
		);

		add_settings_section( "aehf_posts_section", "", array( $this, "aehf_posts_section" ), $this->plugin_name );

			#Hidden Posts
			add_settings_field( 
				'aehf_posts_hidden', 
				__( 'Hide Comment/Reply Form for these Posts', $this->plugin_name ), 
				array( $this, 'aehf_posts_input' ),  
				$this->plugin_name, 
				'aehf_posts_section',
				array( 'label_for' => 'aehf_posts_hidden' ) 
			);

			register_setting( $this->plugin_name, 'aehf_posts_hidden', array($this, 'aehf_posts_input_sanitize') );
	}

	/**
	 * Render the treshold Settings Section Title
	 *
	 * @since  1.0.0
	 */
	public function aehf_posts_section() {
		echo "<hr/><h3 class='b-b text-center'>".__( "Hide Comment/Reply", $this->plugin_name )." | &nbsp; <label><input type='checkbox' id='hide-comment-form'/> <small>Toggle Checkboxes</small></label></h3>";
	}

	/**
	 * Render the treshold Hidden Posts input
	 *
	 * @since  1.0.0
	 */
	public function aehf_posts_input() {
		$input = get_option( 'aehf_posts_hidden', '' );
		$input = ( isset($input) && $input != '' )? unserialize($input) : array();
		$post_types = get_post_types( array('public' => true), 'objects' );

		foreach ($post_types as $key => $value) { ?>
			<label class="checkbox">
				<input type="checkbox" name="aehf_posts_hidden[]" <?php echo in_array($value->name, $input)? 'checked' : ''; ?> value="<?php echo $value->name; ?>">
				<?php echo $value->label; ?>
			</label>
		<?php
		}
	}

	/**
	 * Sanitize Hidden Posts input
	 *
	 * @since  1.0.0
	 */
	public function aehf_posts_input_sanitize( $hidden_posts ) {
		$post_types = get_post_types( array('public' => true) );

		if( is_array($hidden_posts) === true ){
			$invalid = array_diff($hidden_posts, $post_types);
			$hidden_posts = array_diff($hidden_posts, $invalid);
			$hidden_posts = ( count($hidden_posts) > 0 )? serialize($hidden_posts) : '';
		}else{
			$hidden_posts = '';
		}
		
		return $hidden_posts;
	}
	
}
