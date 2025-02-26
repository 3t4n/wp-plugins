<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://viitorcloud.com/
 * @since      3.0.0
 *
 * @package    Analytics_Code_Management
 * @subpackage Analytics_Code_Management/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Analytics_Code_Management
 * @subpackage Analytics_Code_Management/admin
 */
class Analytics_Code_Management_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    3.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    3.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    3.0.0
	 * @param      string $plugin_name       The name of this plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    3.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Analytics_Code_Management_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Analytics_Code_Management_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/analytics-code-management-admin.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    3.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Analytics_Code_Management_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Analytics_Code_Management_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/analytics-code-management-admin.js', array( 'jquery' ), $this->version, false );
	}

	/**
	 * add plugin main menu in admin menu
	 */
	public function analytics_code_custom_menu() {

		// add admin main plugins menu
		$current_user = wp_get_current_user();
		if ( current_user_can( 'administrator' ) ) {
			add_submenu_page( 'options-general.php', ACM_PLUGIN_PAGE_MENU_TITLE, __( ACM_PLUGIN_NAME, ACM_PLUGIN_SLUG ), 'manage_options', ACM_PLUGIN_PAGE_MENU_SLUG, 'custom_analytics_code_setting_html' );
		}

		/**
		 * function for plugin admin menu callback html function
		 */
		function custom_analytics_code_setting_html() {
			global $wpdb;
			$current_user = wp_get_current_user();
			if ( current_user_can( 'administrator' ) ) {
				// get settings option
				$get_analytic_settings = get_option( ACM_PLUGIN_GLOBAL_SETTING_KEY );
				$get_analytic_settings = maybe_unserialize( $get_analytic_settings );
				?>

			<!--create analytics_codes settings html-->
			<div class="analytics_codes-containar">
					<fieldset class="fs_global">
					<legend><div class="analytics_codes-header"><h2><?php echo __( ACM_PLUGIN_HEADER_NAME, ACM_PLUGIN_SLUG ); ?></h2></div></legend>
					<div class="analytics_codes-contain">

						<form id="analytics_codes_plugin_form_id" method="post" action="<?php echo get_admin_url(); ?>admin-post.php">
							<input type='hidden' name='action' value='submit-form' />
							<input type='hidden' name='action-which' value='add' />

							<table class="form-table">
								<tbody>
									<tr>
										<th scope="row"><label  for="pluginname"><?php echo __( ACM_PLUGIN_ADDITIONAL_STYLE_TITLE, ACM_PLUGIN_SLUG ); ?></label></th>
										<td><input type="text" name="add_custom_service_style" id="add_custom_service_style" class="code" style="width: 30%; font-size: 17px;" maxlength="15" value="<?php echo esc_html( ! empty( $get_analytic_settings['include_analytics_codes'] ) ) ? ( $get_analytic_settings['include_analytics_codes'] ) : ''; ?>" /></td>
									</tr>
								</tbody>
							</table>

							<p class="submit"><input type="submit" value="<?php echo __( ACM_PLUGIN_OPTION_SAVE_BTN, ACM_PLUGIN_SLUG ); ?>" class="button button-primary" id="submit_plugin" name="submit_plugin"></p>
						</form>
					</div>

				</fieldset>
			</div>
				<?php
			}
		}
	}

		/**
		 * function for add or update analytics codes admin settings
		 */
	public function analytics_code_setting_add_update() {
		global $wpdb, $wp, $post;

		// get action
		$submitAction     = ! empty( $_POST['action'] ) ? $_POST['action'] : '';
		$submitFormAction = ! empty( $_POST['action-which'] ) ? $_POST['action-which'] : '';

		$addCustomServiceStyle = sanitize_text_field( ! empty( $_POST['add_custom_service_style'] ) ? $_POST['add_custom_service_style'] : null );

		$analytics_codesSettingArray = array();

		// check action
		if ( $submitFormAction == 'add' && ! empty( $submitFormAction ) && $submitFormAction != '' && $submitAction == 'submit-form' ) {

			// create analytics_codes settings array
			$analytics_codesSettingArray['include_analytics_codes'] = $addCustomServiceStyle;

			// serialize analytics_codes settings array
			$analytics_codesSettingArray = maybe_serialize( $analytics_codesSettingArray );

			// update analytics_codes setting array
			update_option( ACM_PLUGIN_GLOBAL_SETTING_KEY, $analytics_codesSettingArray );
		}

		// redirect whatsapp analytics_codes page
		wp_safe_redirect( site_url( '/wp-admin/admin.php?page=' . ACM_PLUGIN_PAGE_MENU_SLUG ) );
		exit();
	}
	/* Welcome page redirect function */

	public function welcome_page_activation_redirect_tab() {

		if ( ! get_transient( '_welcome_screen_tab_activation_redirect_data' ) ) {
				return;
		}

		// Delete the redirect transient
		delete_transient( '_welcome_screen_tab_activation_redirect_data' );

		// if activating from network, or bulk
		if ( is_network_admin() || isset( $_GET['activate-multi'] ) ) {
			return;
		}
		// Redirect to analytics code welcome  page
		wp_safe_redirect( add_query_arg( array( 'page' => 'add-analytics-code-abouts' ), admin_url( 'index.php' ) ) );
	}


	public function welcome_pages_screen_tab() {
			$current_user = wp_get_current_user();
		if ( current_user_can( 'administrator' ) ) {
			add_dashboard_page(
				'Add Analytics Code Plugin Dashboard',
				'Add Analytics Code Plugin Dashboard',
				'read',
				'add-analytics-code-abouts',
				array( &$this, 'welcome_screen_content_tab' )
			);
		}
	}

	public function welcome_screen_content_tab() {
		?>
		<div class="wrap about-wrap">
		
				<h1 style="font-size: 2.1em;"><?php printf( __( 'Welcome to Google Analytics Code Management', 'add-analytics-code' ) ); ?></h1>

				<div class="about-text">
					<?php
					$message = '';
					printf( __( '%s An easy way to Add Google Analytics Code from backend.', 'add-google-analytics-code' ), $message, $this->version );
					?>
					<img class="version_logo_img" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/analytics.png'; ?>">
				</div>

				<?php
				$setting_tabs_wc = apply_filters( 'acm_setting_tab', array( 'about' => 'Overview' ) );
				$current_tab_wc  = ( isset( $_GET['tab'] ) ) ? $_GET['tab'] : 'about';
				$aboutpage       = isset( $_GET['page'] )
				?>
				<h2 id="analytics-tab-wrapper" class="nav-tab-wrapper">
				<?php
				foreach ( $setting_tabs_wc as $name => $label ) {
					echo '<a  href="' . home_url( 'wp-admin/index.php?page=add-analytics-code-abouts&tab=' . $name ) . '" class="nav-tab ' . ( $current_tab_wc == $name ? 'nav-tab-active' : '' ) . '">' . $label . '</a>';
				}
				?>
				</h2>

				<?php
				foreach ( $setting_tabs_wc as $setting_tabkey_wc => $setting_tabvalue ) {
					switch ( $setting_tabkey_wc ) {
						case $current_tab_wc:
							do_action( 'analytics_code_' . $current_tab_wc );
							break;
					}
				}
				?>
				<hr/>
				<div class="return-to-dashboard">
					<a href="<?php echo home_url( '/wp-admin/options-general.php?page=add_analytics_codes' ); ?>"><?php _e( 'Go to Add Google Analytics Code Settings', 'add-analytics-codes' ); ?></a>
				</div>
			</div>
		<?php
	}

	public function analytics_code_about() {
		?>
		<div class="changelog">
				</br>
				<style type="text/css">
					p.gamc_overview {max-width: 100% !important;margin-left: auto;margin-right: auto;font-size: 15px;line-height: 1.5;}
					.gamc_ul ul li {margin-left: 3%;list-style: initial;line-height: 23px;}
				</style>
				<div class="changelog about-integrations">
					<div class="wc-feature feature-section col three-col">
						<div>
							<p class="gamc_overview"><?php _e( 'A simple and straightforward solution for viewing Google Analytics for your site, using Google Analytics Code Management plugin.', 'add-social-analytics_codes-buttons' ); ?></p>
							<p class="gamc_overview"><?php _e( 'Once you’ve done this, you’ll be able to track visitors to your site.', 'add-social-analytics_codes-buttons' ); ?></p>
							<p class="gamc_overview"><strong>Plugin Functionality: </strong></p>
							<div class="gamc_ul">
								<ul>
									<li>Easy setup from backend</li>
									<li>User-friendly Settings Interface</li>
									<li>Get your analytics tracking ID following below steps:<br>
									1) Sign up or Login for Google Analytics<br>
									2) Copy your tracking ID<br>
									3) Paste your tracking ID in  <a href="<?php echo site_url(); ?>/wp-admin/options-general.php?page=add_analytics_codes">Google Analytics Code Settings</a>
									</li>
								</ul>
							</div>

							<p class="gamc_overview"><strong>Plugin Supports: </strong></p>
							<div class="gamc_ul">
								<ul>
									<li>This plugin includes a function to add the Google Analytics tracking code from backend</li>
									<li>No need to edit PHP files</li>
								</ul>
							</div>

						</div>

					</div>
				</div>
			</div>
		<?php
	}

	public function adjust_the_wp_menu_gamc() {
			remove_submenu_page( 'index.php', 'add-analytics-code-about' );
	}
}
