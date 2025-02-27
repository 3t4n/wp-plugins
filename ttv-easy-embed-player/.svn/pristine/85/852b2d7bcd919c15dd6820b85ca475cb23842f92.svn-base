<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.streamweasels.com
 * @since      1.0.0
 *
 * @package    Streamweasels_Player_Pro
 * @subpackage Streamweasels_Player_Pro/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Streamweasels_Player_Pro
 * @subpackage Streamweasels_Player_Pro/admin
 * @author     StreamWeasels <admin@streamweasels.com>
 */
class Streamweasels_Player_Pro_Admin {

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
		$this->baseOptions = get_option( 'swti_options', array() );
		$this->options = swti_get_options_player();
		$this->base = '';
		if (in_array('streamweasels-twitch-integration-pro/streamweasels.php', apply_filters('active_plugins', get_option('active_plugins')))){ 
			$this->base = '/streamweasels-twitch-integration-pro';
		}
		if (in_array('streamweasels-twitch-integration/streamweasels.php', apply_filters('active_plugins', get_option('active_plugins')))){ 
			$this->base = '/streamweasels-twitch-integration';
		}
		if (in_array('streamweasels-base/streamweasels.php', apply_filters('active_plugins', get_option('active_plugins')))){ 
			$this->base = '/streamweasels-base';
		}				
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
		 * defined in Streamweasels_Player_Pro_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Streamweasels_Player_Pro_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'dist/streamweasels-player-pro-admin.min.css', array(), $this->version, 'all' );

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
		 * defined in Streamweasels_Player_Pro_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Streamweasels_Player_Pro_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'dist/streamweasels-player-pro-admin.min.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Register the admin page.
	 *
	 * @since    1.0.0
	 */
	public function display_admin_page() {

		add_options_page(
			'Twitch TV Player',
			'[StreamWeasels] Twitch Player',
			'manage_options',
			'twitch-tv-player',
			array($this, 'swti_showLegacyPlayerAdmin')
		);

		add_submenu_page(
			'streamweasels',
			'[Add-On] Player',
			'[Add-On] Player',
			'manage_options',
			'streamweasels-player',
			array($this, 'swti_showAdmin')
		);			

		$tooltipArray = array(
			'Welcome Background Colour'=> 'Welcome Background Colour <span class="sw-shortcode-help tooltipped tooltipped-n" aria-label="player-welcome-bg-colour=\'\'"></span>',
			'Welcome Image'=> 'Welcome Background Image <span class="sw-shortcode-help tooltipped tooltipped-n" aria-label="player-welcome-image=\'\'"></span>',
			'Welcome Logo'=> 'Welcome Logo <span class="sw-shortcode-help tooltipped tooltipped-n" aria-label="player-welcome-logo=\'\'"></span>',
			'Welcome Text'=> 'Welcome Text <span class="sw-shortcode-help tooltipped tooltipped-n" aria-label="player-welcome-text=\'\'"></span>',
			'Welcome Text 2'=> 'Welcome Text 2 <span class="sw-shortcode-help tooltipped tooltipped-n" aria-label="player-welcome-text-2=\'\'"></span>',
			'Welcome Text Colour'=> 'Welcome Text Colour <span class="sw-shortcode-help tooltipped tooltipped-n" aria-label="player-welcome-text-colour=\'\'"></span>',
			'Stream List Position'=> 'Stream List Position <span class="sw-shortcode-help tooltipped tooltipped-n" aria-label="player-stream-list-position=\'\'"></span>',
		);		

		register_setting( 'swti_options_player', 'swti_options_player', array($this, 'swti_options_validate'));	
		add_settings_section('swti_player_shortcode_settings', 'Shortcode', false, 'swti_player_shortcode_fields');		
		add_settings_section('swti_player_settings', '[Add-On] Player Settings', false, 'swti_player_fields');
		add_settings_field('swti_player_welcome_bg_colour', $tooltipArray['Welcome Background Colour'], array($this, 'streamweasels_player_welcome_bg_colour'), 'swti_player_fields', 'swti_player_settings');	
		add_settings_field('swti_player_welcome_logo', $tooltipArray['Welcome Logo'], array($this, 'streamweasels_player_welcome_logo_cb'), 'swti_player_fields', 'swti_player_settings');	
		add_settings_field('swti_player_welcome_image', $tooltipArray['Welcome Image'], array($this, 'streamweasels_player_welcome_image_cb'), 'swti_player_fields', 'swti_player_settings');	
		add_settings_field('swti_player_welcome_text', $tooltipArray['Welcome Text'], array($this, 'streamweasels_player_welcome_text_cb'), 'swti_player_fields', 'swti_player_settings');	
		add_settings_field('swti_player_welcome_text_2', $tooltipArray['Welcome Text 2'], array($this, 'streamweasels_player_welcome_text_2_cb'), 'swti_player_fields', 'swti_player_settings');	
		add_settings_field('swti_player_welcome_text_colour', $tooltipArray['Welcome Text Colour'], array($this, 'streamweasels_player_welcome_text_colour_cb'), 'swti_player_fields', 'swti_player_settings');	
		add_settings_field('swti_player_stream_position', $tooltipArray['Stream List Position'], array($this, 'streamweasels_player_stream_position_cb'), 'swti_player_fields', 'swti_player_settings');	
	}

	public function swti_showLegacyPlayerAdmin() {
		include ('partials/streamweasels-player-pro-admin-display.php');
	}

	public function swti_showAdmin() {
		include (WP_PLUGIN_DIR.$this->base.'/admin/partials/streamweasels-admin-display.php');
	}		

	public function streamweasels_player_welcome_bg_colour() {
		$welcomeBgColour = ( isset ( $this->options['swti_player_welcome_bg_colour'] ) ) ? $this->options['swti_player_welcome_bg_colour'] : '';
		?>
		
		<input type="text" id="sw-welcome-bg-colour" name="swti_options_player[swti_player_welcome_bg_colour]" size='40' value="<?php echo esc_html($welcomeBgColour); ?>" />

		<p>Choose the background colour of the [Add-On] Player.</p>

		<?php
	}	

	public function streamweasels_player_welcome_image_cb() {
		$welcomeImage = ( isset ( $this->options['swti_player_welcome_image'] ) ) ? $this->options['swti_player_welcome_image'] : '';
		?>
		
		<input type="text" id="sw-welcome-image" name="swti_options_player[swti_player_welcome_image]" size='40' value="<?php echo esc_html($welcomeImage); ?>" />
        <input type="button" name="upload-btn" class="upload-btn button-secondary" value="Upload Image">
		<p>Choose to display a welcome background image of the [Add-On] Player. Ideal image dimensions are 900 x 480.</p>

		<?php
	}

	public function streamweasels_player_welcome_logo_cb() {
		$welcomeLogo = ( isset ( $this->options['swti_player_welcome_logo'] ) ) ? $this->options['swti_player_welcome_logo'] : '';
		?>
		
		<input type="text" id="sw-welcome-logo" name="swti_options_player[swti_player_welcome_logo]" size='40' value="<?php echo esc_html($welcomeLogo); ?>" />
        <input type="button" name="upload-btn" class="upload-btn button-secondary" value="Upload Image">
		<p>Choose to display a welcome logo inside your [Add-On] Player. Ideal image dimensions are 100 x 100.</p>

		<?php
	}	

	public function streamweasels_player_welcome_text_cb() {
		$welcomeText = ( isset ( $this->options['swti_player_welcome_text'] ) ) ? $this->options['swti_player_welcome_text'] : '';
		?>
		
		<input type="text" id="sw-welcome-text" name="swti_options_player[swti_player_welcome_text]" size='40' value="<?php echo esc_html($welcomeText); ?>" />

		<p>Choose the welcome text (line 1) of the [Add-On] Player.</p>

		<?php
	}

	public function streamweasels_player_welcome_text_2_cb() {
		$welcomeText2 = ( isset ( $this->options['swti_player_welcome_text_2'] ) ) ? $this->options['swti_player_welcome_text_2'] : '';
		?>
		
		<input type="text" id="sw-welcome-text-2" name="swti_options_player[swti_player_welcome_text_2]" size='40' value="<?php echo esc_html($welcomeText2); ?>" />

		<p>Choose the welcome text (line 2) of the [Add-On] Player.</p>

		<?php
	}	

	public function streamweasels_player_welcome_text_colour_cb() {
		$welcomeTextColour = ( isset ( $this->options['swti_player_welcome_text_colour'] ) ) ? $this->options['swti_player_welcome_text_colour'] : '';
		?>
		
		<input type="text" id="sw-welcome-text-colour" name="swti_options_player[swti_player_welcome_text_colour]" size='40' value="<?php echo esc_html($welcomeTextColour); ?>" />

		<p>Choose the welcome text colour of the [Add-On] Player.</p>

		<?php
	}	

	public function streamweasels_player_stream_position_cb() {
		$position = ( isset ( $this->options['swti_player_stream_position'] ) ) ? $this->options['swti_player_stream_position'] : '';
		?>
		
		<select id="sw-player-stream-position" name="swti_options_player[swti_player_stream_position]">
            <option value="left" <?php echo selected( $position, 'left', false ); ?>>Left</option>
            <option value="right" <?php echo selected( $position, 'right', false ); ?>>Right</option>
			<option value="none" <?php echo selected( $position, 'none', false ); ?>>None</option>
        </select>
		<p>Choose the position of the list of streamers in your [Add-On] Player.</p>

		<?php
	}

	public function swti_options_validate($input) {

		$new_input = [];
		$options = get_option('swti_options_player');

		if( isset( $input['swti_player_welcome_bg_colour'] ) ) {
			$new_input['swti_player_welcome_bg_colour'] = sanitize_text_field( $input['swti_player_welcome_bg_colour'] );
		}

		if( isset( $input['swti_player_welcome_logo'] ) ) {
			$new_input['swti_player_welcome_logo'] = sanitize_text_field( $input['swti_player_welcome_logo'] );
		}		

		if( isset( $input['swti_player_welcome_image'] ) ) {
			$new_input['swti_player_welcome_image'] = sanitize_text_field( $input['swti_player_welcome_image'] );
		}	

		if( isset( $input['swti_player_welcome_text'] ) ) {
			$new_input['swti_player_welcome_text'] = sanitize_text_field( $input['swti_player_welcome_text'] );
		}

		if( isset( $input['swti_player_welcome_text_2'] ) ) {
			$new_input['swti_player_welcome_text_2'] = sanitize_text_field( $input['swti_player_welcome_text_2'] );
		}		
		
		if( isset( $input['swti_player_welcome_text_colour'] ) ) {
			$new_input['swti_player_welcome_text_colour'] = sanitize_text_field( $input['swti_player_welcome_text_colour'] );
		}		
		
		if( isset( $input['swti_player_stream_position'] ) ) {
			$new_input['swti_player_stream_position'] = sanitize_text_field( $input['swti_player_stream_position'] );
		}			

		return $new_input;
	}	

	public function swti_twitch_layout_options_pro( $options ) {

		$options['player'] = 'Player';
	
		return $options;
	}	

}

function swti_get_options_player() {
	return get_option( 'swti_options_player', array() );
}
