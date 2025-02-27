<?php
/**
 * Handle all the view part and tab navigation for admin pannel
 *
 * @package embed-sharepoint-onedrive-documents/View
 */

namespace MoSharePointObjectSync\View;

use MoSharePointObjectSync\Wrappers\WpWrapper;
use MoSharePointObjectSync\Wrappers\PluginConstants;

/**
 * Handles all the part of displaying UI and navigation tab bar for admin pannel
 */
class AdminView {

	/**
	 * Holds the singleton instance of Admin_View class
	 *
	 * @var AdminView|null singleton instance of AdminView.
	 */
	private static $instance;

	/**
	 * Returns the singleton instance of AdminView.
	 *
	 * @return AdminView The singleton instance of AdminView.
	 */
	public static function get_view() {
		if ( ! isset( self::$instance ) ) {
			$class          = __CLASS__;
			self::$instance = new $class();
		}
		return self::$instance;
	}

	/**
	 * Function to display the navigation menu.
	 *
	 * @return void
	 */
	public function mo_sps_menu_display() {
        //phpcs:ignore WordPress.Security.NonceVerification.Recommended -- GET parameter in the URL for checking option name doesn't require nonce verification.
		$tab = ! empty( $_GET['tab'] ) ? sanitize_text_field( wp_unslash( $_GET['tab'] ) ) : 'app_config';
		$this->mo_sps_display_tabs( $tab );
	}

	/**
	 * Function to display the tabs.
	 *
	 * @param string $active_tab Holds the value of current selected tab.
	 * @return void
	 */
	private function mo_sps_display_tabs( $active_tab ) {
		echo '<div style="display:flex;justify-content:space-between;align-items:flex-start;padding-top:8px;"><div style="width:100% !important;" id="mo_sps_container" class="mo-container">';
		$this->mo_sps_display__header_menu();

		$mo_app_config_js_url = plugins_url( '../includes/js/appConfig.js', __FILE__ );
		wp_enqueue_script( 'mo_sps_app_config_js', $mo_app_config_js_url, array( 'jquery' ), MO_SPS_PLUGIN_VERSION, false );

		wp_localize_script(
			'mo_sps_app_config_js',
			'appConfig',
			array(
				'ajax_url'  => admin_url( 'admin-ajax.php' ),
				'admin_url' => admin_url( 'admin.php' ),
				'nonce'     => wp_create_nonce( 'mo_sps_app_config__nonce' ),
				'test_url'  => $this->mo_sps_get_test_url(),
				'add_new'   => esc_url( MO_SPS_PLUGIN_URL . '/images/add-new.svg' ),
			)
		);

		if ( WpWrapper::mo_sps_check_client_secret_expiry_customers() ) {
			$connector = WpWrapper::mo_sps_get_option( PluginConstants::CLOUD_CONNECTOR );
			echo '<div class="mo_sps_expired_client_secret_notice">Your Connection is expired/inactive. Please click here to reconnect: <input type="button" id="mo_sps_fetch_client_secret_auto" data-type="' . esc_attr( $connector ) . '" class="mo-ms-tab-content-button" style="border-radius:4px;" value="Reconnect"></div>';
		}

		$this->mo_sps_display__tabs( $active_tab );

		echo '<div style="display:flex;justify-content:space-between;align-items:flex-start;">';
		$this->mo_sps_display__tab_content( $active_tab );
		if ( 'Documents' !== $active_tab ) {
			$support_form_handler = SupportForm::get_view();
			$support_form_handler->mo_sps_display_support_form();
		}
		echo '</div>';
		echo '</div></div>';

	}

	/**
	 * Function to get the test window URL.
	 *
	 * @return string
	 */
	private function mo_sps_get_test_url() {
		return add_query_arg(
			array(
				'option' => 'testSPSApp',
			),
			admin_url( 'admin.php' )
		);
	}

	/**
	 * Function to display the header menu.
	 *
	 * @return void
	 */
	private function mo_sps_display__header_menu() {
		?>
		<div class="mo_sps_newbanner_flex-container">
			<div>
				<img width="65px" height="60px" id="mo-ms-title-logo" src="<?php echo esc_url( plugin_dir_url( MO_SPS_PLUGIN_FILE ) . 'images/miniorange_logo.png' ); ?>"/>
			</div>
			<div class="mo_sps_newbanner_flex-content">
				<div>
					<h1><label for="sync_integrator">Embed SharePoint OneDrive Documents</label></h1>
				</div>
				<div>
					<button class="mo_sps_newbanner_manage-apps-button" onclick="openPluginPage('mo_sps&tab=app_config')">
						<span class="dashicons dashicons-admin-settings"></span><a>Manage Apps</a>
					</button>
					<button class="mo_sps_newbanner-ask-us-button" onclick="window.open('https://forum.miniorange.com/','_blank').focus()">
						<span class="dashicons dashicons-admin-users"></span><a>Ask Us On Forum</a>
					</button>
					<button class="mo_sps_newbanner-faq-button" onclick="window.open('https://faq.miniorange.com/kb/azure-ad-integration/sharepoint/','_blank').focus()">
						<span class="dashicons dashicons-editor-help"></span><a>Frequently Asked Questions</a>
					</button>
				</div>
			</div>
		<span><a target="_blank" href="<?php echo esc_url( PluginConstants::PRICING_CARD ); ?>" class="banner_buttons button button-primary licensing-plan-button Features-pricing-button specific_premium_button banner_button_marketing">Features & Pricing<img class="mo_sps_premium-label" src="<?php echo esc_url( MO_SPS_PLUGIN_URL . '/images/premium-label.png' );?>" alt="SharePoint paid Plans Logo"></a></span>
			<span>
				<a target="_blank" 
				href="<?php echo esc_url( PluginConstants::SPS_DEMO_REQUEST ); ?>" 
				class="banner_buttons button button-primary licensing-plan-button banner_button_marketing specific_demo_button">
				Request for Demo
				</a>
			</span>
			<span>
				<a target="_blank" 
				href="<?php echo esc_url( PluginConstants::SPS_VIDEO_LIBRARY ); ?>"
				class="button button-primary licensing-plan-button mo_sps_newbanner_book-meeting-button banner_buttons banner_button_marketing specific_video_button">
				Video Library <span class="dashicons dashicons-video-alt2"></span>
				</a>
			</span>
		</div>


		<script>
			function openPluginPage(tab) {
			var adminUrl = '<?php echo esc_url( admin_url() ); ?>';
			var pluginUrl = adminUrl + 'admin.php?page=mo_sps&tab=' + tab;
			window.location.href = pluginUrl;
			}
		</script>
		<?php
	}

	/**
	 * Function to display the tabs.
	 *
	 * @param string $active_tab Holds the value of current selected tab.
	 * @return void
	 */
	private function mo_sps_display__tabs( $active_tab ) {
		$app = WpWrapper::mo_sps_get_option( PluginConstants::APP_CONFIG );

		$value = ! empty( $state ) ? $state : ( isset( $app['folder_path'] ) ? $app['folder_path'] : '' );
		?>
		<div class="mo-ms-tab ms-tab-background mo-ms-tab-border">
			<ul class="mo-ms-tab-ul">
				<li id="app_config" class="mo-ms-tab-li">
					<a href="
					<?php
					echo esc_url(
						add_query_arg(
							array(
								'page' => 'mo_sps',
								'tab'  => 'app_config',
							),
							admin_url( 'admin.php' )
						)
					);
					?>
					">
						<div id="application_div_id" class="mo-ms-tab-li-div 
						<?php
						if ( 'app_config' === $active_tab ) {
							echo 'mo-ms-tab-li-div-active';
						}
						?>
						" aria-label="Application" title="Application Configuration" role="button" tabindex="0">
							<div id="add_icon" class="mo-ms-tab-li-icon" >
								<img style="width:20px;height:20px" src="<?php echo esc_url( MO_SPS_PLUGIN_URL . '/images/microsoft-sharepoint.svg' ); ?>">
							</div>
							<div id="add_app_label" class="mo-ms-tab-li-label">
								Connection
							</div>
						</div>
					</a>
				</li>

				<li id="Documents" class="mo-ms-tab-li" style="margin-left:10px;" role="presentation" title="user_manage">
					<a href="
					<?php
					echo esc_url(
						add_query_arg(
							array(
								'page' => 'mo_sps',
								'tab'  => 'Documents',
							),
							admin_url( 'admin.php' )
						)
					);
					?>
					">
						<input type="hidden" id="Documents_tab" value="<?php echo esc_url_raw( admin_url() . 'admin.php?page=mo_sps&tab=Documents' ); ?>">
						<div id="Documents_id" class="mo-ms-tab-li-div 
						<?php
						if ( 'Documents' === $active_tab ) {
							echo 'mo-ms-tab-li-div-active';
						}
						?>
						" aria-label="Documents" title="Documents" role="button" tabindex="0">
							<div id="add_icon" class="mo-ms-tab-li-icon" >
								<img class="filter-green" style="width:20px;height:20px;" src="<?php echo esc_url( MO_SPS_PLUGIN_URL . '/images/folder_main.svg' ); ?>">
							</div>
							<div id="add_app_label" class="mo-ms-tab-li-label">
								Preview Documents / Files
							</div>
						</div>
					</a>
				</li>

				<li id="Shortcode" class="mo-ms-tab-li" style="margin-left:10px;" role="presentation" title="user_manage">
					<a href="
					<?php
					echo esc_url(
						add_query_arg(
							array(
								'page' => 'mo_sps',
								'tab'  => 'Shortcode',
							),
							admin_url( 'admin.php' )
						)
					);
					?>
					">
						<input type="hidden" id="Shortcode_tab" value="<?php echo esc_url_raw( admin_url() . 'admin.php?page=mo_sps&tab=Shortcode' ); ?>">
						<div id="Documents_id" class="mo-ms-tab-li-div 
						<?php
						if ( 'Shortcode' === $active_tab ) {
							echo 'mo-ms-tab-li-div-active';
						}
						?>
						" aria-label="Shortcode" title="Shortcode" role="button" tabindex="0">
							<div id="add_icon" class="mo-ms-tab-li-icon" >
								<img class="filter-green" style="width:20px;height:20px;" src="<?php echo esc_url( MO_SPS_PLUGIN_URL . '/images/shortcode.png' ); ?>">
							</div>
							<div id="add_app_label" class="mo-ms-tab-li-label">
								Embed Options
							</div>
						</div>
					</a>
				</li>

                <li id="market_feature" class="mo-ms-tab-li" style="margin-left:10px;" role="presentation" >
					<a href="
					<?php
					echo esc_url(
						add_query_arg(
							array(
								'page' => 'mo_sps',
								'tab'  => 'advanced_settings',
							),
							admin_url( 'admin.php' )
						)
					);
					?>
					">
						<input type="hidden" id="Shortcode_tab" value="<?php echo esc_url_raw( admin_url() . 'admin.php?page=mo_sps&tab=advanced_settings' ); ?>">
						<div id="Documents_id" class="mo-ms-tab-li-div 
						<?php
						if ( 'advanced_settings' === $active_tab ) {
							echo 'mo-ms-tab-li-div-active';
						}
						?>
						" aria-label="advanced_settings" title="advanced_settings" role="button" tabindex="0">
							<div id="add_icon" class="mo-ms-tab-li-icon" >
								<img class="filter-green" style="width:20px;height:20px;" src="<?php echo esc_url( MO_SPS_PLUGIN_URL . '/images/settings.png' ); ?>">
							</div>
							<div id="add_app_label" class="mo-ms-tab-li-label">
								Advanced Settings
							</div>
						</div>
					</a>
				</li>
 

				<li id="account_setup" class="mo-ms-tab-li">
					<a href="
					<?php
					echo esc_url(
						add_query_arg(
							array(
								'page' => 'mo_sps',
								'tab'  => 'account_setup',
							),
							admin_url( 'admin.php' )
						)
					);
					?>
					">
						<div id="account_setup_div_id" class="mo-ms-tab-li-div 
						<?php
						if ( 'account_setup' === $active_tab ) {
							echo 'mo-ms-tab-li-div-active';
						}
						?>
						" aria-label="account_setup" title="Account Setup" role="button" tabindex="2">
							<div id="account_setup_icon" class="mo-ms-tab-li-icon" >
								<img style="width:16px;height:16px;" src="<?php echo esc_url( MO_SPS_PLUGIN_URL . '/images/login.png' ); ?>">
							</div>
							<div id="account_setup_label" class="mo-ms-tab-li-label">
								Account Setup
							</div>
						</div>
					</a>
				</li>


			</ul>
		</div>
		<?php
	}

	/**
	 * Function to display the tab content according to the current selected tab.
	 *
	 * @param string $active_tab Holds the current active tab.
	 * @return void
	 */
	private function mo_sps_display__tab_content( $active_tab ) {
		$handler = self::get_view();
		switch ( $active_tab ) {
			case 'app_config':
				$handler = AppConfig::get_view();
				break;

			case 'Documents':
				$handler = DocumentsSync::get_view();
				break;

			case 'Shortcode':
				$handler = Shortcode::get_view();
				break;

			case 'advanced_settings':
				$handler = AdvancedSettings::get_view();
				break;

			case 'account_setup':
				$handler = accountSetup::get_view();
				break;

		}

		$handler->mo_sps_display__tab_details();

	}

	/**
	 * Function to show admin_view UI if any class is missing.
	 *
	 * @return void
	 */
	private function mo_sps_display__tab_details() {
		esc_html_e( "Class missing. Please check if you've installed the plugin correctly.", 'embed-sharepoint-onedrive-documents' );
	}

}
