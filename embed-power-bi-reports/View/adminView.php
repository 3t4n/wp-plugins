<?php
/**
 * Handles Admin View
 *
 * @package embed-power-bi-reports\View
 */

namespace MoEmbedPowerBI\View;

use MoEmbedPowerBI\View\powerBI;
use MoEmbedPowerBI\View\support_form;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class to handle all the view and show the tab nav bar.
 */
class adminView {

	/**
	 * Holds the instance of AdminView class.
	 *
	 * @var AdminView
	 */
	private static $instance;

	/**
	 * Object instance(AdminView) getter method.
	 *
	 * @return AdminView
	 */
	public static function get_view() {
		if ( ! isset( self::$instance ) ) {
			$class          = __CLASS__;
			self::$instance = new $class();
		}
		return self::$instance;
	}

	/**
	 * Function to display the menu.
	 *
	 * @return void
	 */
	public function mo_epbr_menu_display() {
		if ( isset( $_GET['tab'] ) ) { //phpcs:ignore WordPress.Security.NonceVerification.Recommended -- GET parameter in the URL for checking option name doesn't require nonce verification.
			$active_tab = sanitize_text_field( wp_unslash( $_GET['tab'] ) ); //phpcs:ignore WordPress.Security.NonceVerification.Recommended -- GET parameter in the URL for checking option name doesn't require nonce verification.
		} else {
			$active_tab = 'app_config';
		}
		echo '<div style="display:flex;">';
		$this->mo_epbr_display_tabs( $active_tab );

		echo '</div>';
	}

	/**
	 * Function to display the tab with support form.
	 *
	 * @param string $active_tab Holds the current active tab value.
	 * @return void
	 */
	private function mo_epbr_display_tabs( $active_tab ) {

		if ( 'licensing_plans' !== $active_tab ) {
			echo '<div style="display:flex;justify-content:space-between;align-items:flex-start;padding-top:8px;margin-right:-1.5rem;width:100%">
            <div style="width:100%;" id="mo_epbr_container" class="mo-container">';
			$this->mo_epbr_display__header_menu();
			$this->mo_epbr_display__tabs( $active_tab );
			echo '<div style="display:flex;justify-content:space-between;align-items:flex-start;">';
			$this->mo_epbr_display__tab_content( $active_tab );
			$handler = support_form::get_view();
			$handler->mo_epbr_display_support_form();
			echo '</div></div>';
			echo '</div>';
		}
	}

	/**
	 * Function to display the header menu.
	 *
	 * @return void
	 */
	private function mo_epbr_display__header_menu() {
		?>
		<div style="display: flex;">
			<img id="mo-ms-title-logo" src="<?php echo esc_url( plugin_dir_url( MO_EPBR_PLUGIN_FILE ) . 'images/miniorange.png' ); ?>">
			<h1><label for="power_bi_integrator">WP Embed Power BI Reports</label></h1>
			<span><a href="<?php echo esc_url( 'https://plugins.miniorange.com/wordpress-power-bi-embed' ); ?>" target="_blank" class="mo-button mo-button-setup">Setup Guide</a> </span>
			<span><a href="<?php echo esc_url( 'https://plugins.miniorange.com/microsoft-power-bi-embed-for-wordpress#pricing-cards' ); ?>" target="_blank" class="mo-button mo-button-licensing">Licensing Plans</a> </span>
		</div>
		<?php
	}

	/**
	 * Function to display the tabs.
	 *
	 * @param string $active_tab Holds the value of current selected tab.
	 * @return void
	 */
	private function mo_epbr_display__tabs( $active_tab ) {
		?>
		<div class="mo-ms-tab ms-tab-background mo-ms-tab-border">
			<ul class="mo-ms-tab-ul">
				<li id="app_config" class="mo-ms-tab-li">
					<a href="<?php echo esc_url( add_query_arg( 'tab', 'app_config' ) ); ?>">
						<div id="application_div_id" class="mo-ms-tab-li-div 
						<?php
						if ( 'app_config' === $active_tab ) {
							echo 'mo-ms-tab-li-div-active';
						}
						?>
						" aria-label="Application" title="Application Configuration" role="button" tabindex="0">
							<div class="mo-ms-tab-centre">
							<div id="add_icon" class="mo-ms-tab-li-icon" >
								<span class="dashicons dashicons-align-wide"></span>
							</div>
							<div id="add_app_label" class="mo-ms-tab-li-label">
								Manage Application
							</div>
							</div>

						</div>
					</a>
				</li>
				&nbsp
				<li id="pb_app_config" class="mo-ms-tab-li">
					<a href="<?php echo esc_url( add_query_arg( 'tab', 'pb_app_config' ) ); ?>">
						<div id="application_div_id" class="mo-ms-tab-li-div 
						<?php
						if ( 'pb_app_config' === $active_tab ) {
							echo 'mo-ms-tab-li-div-active';
						}
						?>
						" aria-label="PowerBI" title="PowerBI Configuration" role="button" tabindex="0">
						<div class="mo-ms-tab-centre">
							<div id="add_icon" class="mo-ms-tab-li-icon" >
								<img class="power_bi_tab_image" src="<?php echo esc_url( plugin_dir_url( __FILE__ ) . '../images/power-bi.svg' ); ?>">
							</div>
							<div id="add_app_label" class="mo-ms-tab-li-label">
								Embed Power BI
							</div>
						</div>
						</div>
					</a>
				</li>
				&nbsp
				<li id="settings_tab" class="mo-ms-tab-li">
					<a href="<?php echo esc_url( add_query_arg( 'tab', 'settings_tab' ) ); ?>">
						<div id="application_div_id" class="mo-ms-tab-li-div 
						<?php
						if ( 'settings_tab' === $active_tab ) {
							echo 'mo-ms-tab-li-div-active';
						}
						?>
						" aria-label="Settings Tab" title="Settings Tab" role="button" tabindex="0">
							<div class="mo-ms-tab-centre">
							<div id="add_icon" class="mo-ms-tab-li-icon" >
								<span class="dashicons dashicons-admin-tools"></span>
							</div>
							<div id="settings_tab" class="mo-ms-tab-li-label">
								Settings
							</div>
							</div>
						</div>
					</a>
				</li>
				&nbsp
				<li id="demorequest_tab" class="mo-ms-tab-li">
					<a href="<?php echo esc_url( add_query_arg( 'tab', 'demorequest_tab' ) ); ?>">
						<div id="application_div_id" class="mo-ms-tab-li-div 
						<?php
						if ( 'demorequest_tab' === $active_tab ) {
							echo 'mo-ms-tab-li-div-active';
						}
						?>
						" aria-label="Demo Request Tab" title="Demo Request Tab" role="button" tabindex="0">
						<div class="mo-ms-tab-centre">
							<div id="add_icon" class="mo-ms-tab-li-icon" >
								<span class="dashicons dashicons-email-alt"></span>
							</div>
							<div id="demorequest_tab" class="mo-ms-tab-li-label">
								Demo Request
							</div>
						</div>

						</div>
					</a>
				</li>
				&nbsp
				<li id="integrations_tab" class="mo-ms-tab-li">
					<a href="<?php echo esc_url( add_query_arg( 'tab', 'integrations_tab' ) ); ?>">
						<div id="application_div_id" class="mo-ms-tab-li-div 
						<?php
						if ( 'integrations_tab' === $active_tab ) {
							echo 'mo-ms-tab-li-div-active';
						}
						?>
						" aria-label="integrations Tab" title="Integrations Tab" role="button" tabindex="0">
						<div class="mo-ms-tab-centre">
							<div id="add_icon" class="mo-ms-tab-li-icon" >
								<span class="dashicons dashicons-networking"></span>
							</div>
							<div id="integrations_tab" class="mo-ms-tab-li-label">
								Integrations
							</div>
						</div>

						</div>
					</a>
				</li>
				&nbsp
				<li id="account_setup_tab" class="mo-ms-tab-li">
					<a href="<?php echo esc_url( add_query_arg( 'tab', 'account_setup_tab' ) ); ?>">
						<div id="application_div_id" class="mo-ms-tab-li-div 
						<?php
						if ( 'account_setup_tab' === $active_tab ) {
							echo 'mo-ms-tab-li-div-active';
						}
						?>
						" aria-label="account setup tab" title="Account Setup Tab" role="button" tabindex="0">
						<div class="mo-ms-tab-centre">
							<div id="add_icon" class="mo-ms-tab-li-icon" >
								<!-- <span class="dashicons dashicons-share-alt"></span> -->
								<img class="account_setup_logo" src="<?php echo esc_url( plugin_dir_url( __FILE__ ) . '../images/login.png' ); ?>">
							</div>
							<div id="account_setup_tab" class="mo-ms-tab-li-label">
								Account Setup
							</div>
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
	private function mo_epbr_display__tab_content( $active_tab ) {
		$handler = self::get_view();
		switch ( $active_tab ) {
			case 'app_config':
				$handler = appConfig::get_view();
				break;

			case 'pb_app_config':
				$handler = powerBI::get_view();
				break;

			case 'settings_tab':
				$handler = powerBIsettings::get_view();
				break;

			case 'demorequest_tab':
				$handler = demorequest::get_view();
				break;

			case 'integrations_tab':
				$handler = integrations::get_view();
				break;

			case 'account_setup_tab':
				$handler = accountSetup::get_view();
				break;

		}
		$handler->mo_epbr_display__tab_details();
	}

	/**
	 * Function to show if any class is missing.
	 *
	 * @return void
	 */
	private function mo_epbr_display__tab_details() {
		esc_html_e( "Class missing. Please check if you've installed the plugin correctly.", 'embed-power-bi-reports' );
	}
}
