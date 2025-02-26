<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.cutowl.com/
 * @since      1.0.0
 *
 * @package    Lights_Off
 * @subpackage Lights_Off/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Lights_Off
 * @subpackage Lights_Off/admin
 * @author     Cutowl <contacts@cutowl.com>
 */
class Lights_Off_Admin {

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

	 /**
	 * The options name to be used in this plugin
	 *
	 * @since  	1.0.0
	 * @access 	private
	 * @var  	string 		$option_name 	Option name of this plugin
	*/
	private $option_name = 'lightsoff_setting';

	 /**
	 * Register the setting parameters
	 *
	 * @since  	1.0.0
	 * @access 	public
	*/

	public function register_lightsoff_plugin_settings() {
		// Add a General section
		add_settings_section(
			$this->option_name. '_general',
			__( 'General', 'lights-off' ),
			array( $this, $this->option_name . '_general_cb' ),
			$this->plugin_name
		);

		// Add a select field
		add_settings_field(
			$this->option_name . '_select',
			__( 'Choose theme', 'lights-off'),
			array($this, $this->option_name . '_select_cb'),
			$this->plugin_name,
			$this->option_name . '_general',
			array( 'label_for' => $this->option_name . '_select', 'class' => 'lightsoff_theme_field' )
		);

		// Register the select field
		$valid_themes=["default", "coffee", "neon"];
		if(isset($_POST['lightsoff_setting_select'])){

			//Sanitize select data
			$chosen_theme = sanitize_text_field($_POST['lightsoff_setting_select']);

			//Checks if selected value is valid
			if(in_array($chosen_theme, $valid_themes)){
				update_user_meta(get_current_user_id(), $this->option_name . '_select', $chosen_theme);
			}
		}

		// Add a checkbox field
		add_settings_field(
			$this->option_name . '_checkbox',
			__( 'Show toggler', 'lights-off'),
			array($this, $this->option_name . '_checkbox_cb'),
			$this->plugin_name,
			$this->option_name . '_general',
			array( 'label_for' => $this->option_name . '_checkbox')
		);

		// Register the checkbox field
		$valid_values=["true", "false"];
		if(isset($_POST['lightsoff_switch_checkbox'])){

			//Sanitize select data
			$switch_setting = sanitize_text_field($_POST['lightsoff_switch_checkbox']);

			//Checks if selected value is valid
			if(in_array($switch_setting, $valid_values)){
				update_user_meta(get_current_user_id(), $this->option_name . '_checkbox', $switch_setting);
			}
		}
	}

	/**
	 * Render the text for the general section
	 *
	 * @since  	1.0.0
	 * @access 	public
	*/
	public function lightsoff_setting_general_cb() {
		?>
		<strong>Brought to you by</strong>
		<?php

		if(get_user_meta(get_current_user_id(), 'lightsoff_setting_toggler')[0] == 'on'){
			$logo_color = "dark";
		} else{
			$logo_color = "light";
		}

		$url = plugin_dir_url('') . "cut-the-lights/assets/cutowl-" . $logo_color . ".png";
		?>
		<div style="margin-top:5px">
			<a href="https://www.cutowl.com">
				<img src="<?php echo esc_url($url); ?>" style="width: 150px">
			</a>
		</div>
		<?php

	}

	/**
 * Render the select input field
 *
 * @since  1.0.0
 * @access public
*/
	public function lightsoff_setting_select_cb() {
		$current_theme = get_user_meta(get_current_user_id(), 'lightsoff_setting_select')[0];
		?>
				
				<fieldset id="color-picker" class="scheme-list">
				<input type="hidden" id="color-nonce" name="color-nonce">
					<div class="color-option <?php selected($current_theme, 'default');?>">
							<input name="<?php echo esc_attr($this->option_name . '_select'); ?>" id="admin_color_fresh" type="radio" value="default" class="tog" <?php checked($current_theme, 'default');?>>
							<input type="hidden" class="icon_colors">
							<label for="admin_color_fresh">Default</label>
							<table class="color-palette">
								<tbody>
									<tr>
										<td style="background-color: #1f1e23">&nbsp;</td>
										<td style="background-color: #303141">&nbsp;</td>
										<td style="background-color: #d1d1d1">&nbsp;</td>
										<td style="background-color: #3e3e45">&nbsp;</td>
									</tr>
								</tbody>
							</table>
					</div>
					<div class="color-option <?php selected($current_theme, 'coffee');?>">
							<input name="<?php echo esc_attr($this->option_name . '_select'); ?>" id="admin_color_fresh" type="radio" value="coffee" class="tog" <?php checked($current_theme, 'coffee');?>>
							<input type="hidden" class="icon_colors">
							<label for="admin_color_fresh">Coffee</label>
							<table class="color-palette">
								<tbody>
									<tr>
										<td style="background-color: #1f1e23">&nbsp;</td>
										<td style="background-color: #5a5a54">&nbsp;</td>
										<td style="background-color: #858868">&nbsp;</td>
										<td style="background-color: #0d0d0d">&nbsp;</td>
									</tr>
								</tbody>
							</table>
					</div>
					<div class="color-option <?php selected($current_theme, 'neon');?>">
							<input name="<?php echo esc_attr($this->option_name . '_select'); ?>" id="admin_color_fresh" type="radio" value="neon" class="tog" <?php checked($current_theme, 'neon');?>>
							<input type="hidden" class="icon_colors">
							<label for="admin_color_fresh">Neon</label>
							<table class="color-palette">
								<tbody>
									<tr>
										<td style="background-color: #1f1e23">&nbsp;</td>
										<td style="background-color: #455650">&nbsp;</td>
										<td style="background-color: #70a57d">&nbsp;</td>
										<td style="background-color: #141313">&nbsp;</td>
									</tr>
								</tbody>
							</table>
					</div>
				</fieldset>
   <?php
	}

	/**
 * Render the select input field
 *
 * @since  1.0.0
 * @access public
*/
	public function lightsoff_setting_checkbox_cb() {
		$current_switch_setting = get_user_meta(get_current_user_id(), 'lightsoff_setting_checkbox')[0];
		?>
      <input type="radio" id="lightsoff_switch_on" name="lightsoff_switch_checkbox" value="true" <?php checked($current_switch_setting, 'true'); ?>>
      <label for="lightsoff_switch_on" style="margin-right:10px">Enable</label>

      <input type="radio" id="lightsoff_switch_off" name="lightsoff_switch_checkbox" value="false" <?php checked($current_switch_setting, 'false'); ?>>
      <label for="lightsoff_switch_off">Disable</label>
   <?php
	}

	/**
	 * Include the setting page
	 *
	 * @since  1.0.0
	 * @access public
	*/
	function lightsoff_init(){
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}
		include LIGHTS_OFF_PATH . 'admin/partials/lights-off-admin-display.php' ;
	
	}
	
	public function lightsoff_plugin_setup_menu(){
		add_menu_page( 'Cut The Lights Settings', 'Cut The Lights', 'manage_options', 'lights-off', array($this, 'lightsoff_init'), 'dashicons-lightbulb' );
		
	} 

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

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Lights_Off_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Lights_Off_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		$current_theme = get_user_meta(get_current_user_id(), 'lightsoff_setting_select')[0];
		$current_switch = get_user_meta(get_current_user_id(), 'lightsoff_setting_checkbox')[0];
		$screen = get_current_screen();
		$is_customize_page = str_contains($_SERVER['REQUEST_URI'], 'customize.php');
		$valid_switch_values= ['on', 'off'];

		//Renders toggler if enabled in settings
		if($current_switch == 'true'){

			//Validates toggler status
			if(isset($_POST['lo_dm_status']) && in_array($_POST['lo_dm_status'], $valid_switch_values )){
				update_user_meta(get_current_user_id(), 'lightsoff_setting_toggler', sanitize_text_field($_POST['lo_dm_status']));
			}

			?>
			<!-- Toggler HTML -->
			<div id="lo_dm">
				<form id="lo_dm_form" action="" method="POST">
					<label id="lo_dm_theme" for="lo_toggler">
							<input type="checkbox" id="lo_toggler" class="lo_dm_check"  <?php checked(get_user_meta(get_current_user_id(), 'lightsoff_setting_toggler')[0], 'on') ?>/>
							<div class="lo_dm_slider lo_dm_round"></div>
							<input type="hidden" id="lo_toggler_value" name="lo_dm_status">
					</label>
				</form>
			</div>

			<!-- Toggler CSS -->
			<style>
            #lo_dm {
                position: fixed;
                right: 50px;
                bottom: 50px;
                z-index: 1;
            }
            #lo_dm_theme {
                display: inline-block;
                height: 34px;
                position: relative;
                width: 60px;
              }
              
              #lo_dm_theme input {
                display:none;
              }
              .lo_dm_slider {
                background-color: #ccc;
                bottom: 0;
                cursor: pointer;
                left: 0;
                position: absolute;
                right: 0;
                top: 0;
                transition: .4s;
              }
              
              .lo_dm_slider:before {
                background-color: #fff;
                bottom: 4px;
                content: '';
                height: 26px;
                left: 4px;
                position: absolute;
                transition: .4s;
                width: 26px;
								background-image: url( <?php echo esc_url(plugin_dir_url('') . "cut-the-lights/assets/sun-regular.svg") ?>);
								background-size: 20px 20px;
								background-position: center;
								background-repeat: no-repeat;
              }
              
              input:checked + .lo_dm_slider {
                background-color: #2b2b2b;
              }
              
              input:checked + .lo_dm_slider:before {
                transform: translateX(26px);
								background-image: url( <?php echo esc_url(plugin_dir_url('') . "cut-the-lights/assets/moon-solid.svg") ?>);
								background-size: 20px 20px;
								background-position: center;
								background-repeat: no-repeat;
              }
              
              .lo_dm_slider.lo_dm_round {
                border-radius: 34px;
              }
              
              .lo_dm_slider.lo_dm_round:before {
                border-radius: 50%;
              }
        </style>
        
				<!-- Toggler JS -->
        <script>
                const toggleSwitch = document.querySelector('.lo_dm_check');
								const toggleSwitchValue = document.getElementById('lo_toggler_value')
								const toggleSwitchForm = document.getElementById('lo_dm_form');

								//Changes hidden input value when clicked
                toggleSwitch.addEventListener('change', function(){
										if(this.checked){
											toggleSwitchValue.value="on";
										} else{
											toggleSwitchValue.value="off";
										}
										
										toggleSwitchForm.submit()
								})  
        </script>
			<?php
		} else if($current_switch == 'false'){
			update_user_meta(get_current_user_id(), 'lightsoff_setting_toggler', 'on');
		}

		// Doesn't load plugin styles in block editor and customization page
		if ( !$screen->is_block_editor && !$is_customize_page && get_user_meta(get_current_user_id(), 'lightsoff_setting_toggler')[0] == 'on') {
			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/themes/' . $current_theme . '/' . $current_theme . '.css', array(), $this->version, 'all' );
		}

		function admin_color_scheme() {
			global $_wp_admin_css_colors;
			$_wp_admin_css_colors = 0;
	 	}
	 	add_action('admin_head', 'admin_color_scheme');

		function cutthelights_color_scheme_notice() {
		?>
		<div class="notice notice-warning is-dismissible">
				<p><?php _e( 'Warning: Cut The Lights plugin has temporally disabled admin themes to prevent conflicts.'); ?></p>
		</div>
		<?php
		}
		add_action( 'admin_notices', 'cutthelights_color_scheme_notice' );


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
		 * defined in Lights_Off_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Lights_Off_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/lights-off-admin.js', array( 'jquery' ), $this->version, false );

	}

}
