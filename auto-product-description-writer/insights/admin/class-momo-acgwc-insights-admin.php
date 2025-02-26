<?php
/**
 * Admin Init
 *
 * @package momoacg
 */
class MoMo_ACGWC_Insights_Admin {
	/**
	 * Constructor
	 */
	public function __construct() {
		add_action( 'momo_acgwc_register_settings', array( $this, 'momo_acgwc_insights_register_settings' ) );
		add_action( 'momo_add_submenu_to_momoacgwc', array( $this, 'momo_add_submenu_of_insights' ), 15 );

		add_action( 'admin_enqueue_scripts', array( $this, 'momoacg_searchlog_print_admin_ss' ) );

		add_action( 'wp_ajax_momo_insights_clear_cache', array( $this, 'momo_insights_clear_cache' ) );

		add_action( 'wp_ajax_momoacgwc_generate_template', array( $this, 'momoacgwc_generate_template' ) );
		add_action( 'wp_ajax_momoacgwc_insights_change_timeframe', array( $this, 'momoacgwc_insights_change_timeframe' ) );

		/* add_filter( 'momo_acgwc_add_data_to_admin_locale', array( $this, 'momo_cb_add_some_locale' ) ); */
	}
	/**
	 * Add some locale data
	 *
	 * @param array $ajaxdata Default datas.
	 */
	/* public function momo_cb_add_some_locale( $ajaxdata ) {
		$ajaxdata['edit_email_template'] = esc_html__( 'Edit email template', 'momoacgwc' );
		return $ajaxdata;
	} */

	/**
	 * Clear Insights Cache
	 */
	public function momo_insights_clear_cache() {
		$res = check_ajax_referer( 'momoacg_security_key', 'security' );
		if ( isset( $_POST['action'] ) && 'momo_insights_clear_cache' !== $_POST['action'] ) {
			return;
		}
		$type = isset( $_POST['type'] ) ? sanitize_text_field( wp_unslash( $_POST['type'] ) ) : 'dashboard';
		switch ( $type ) {
			case 'dashboard':
				delete_transient( 'momo_revenue_insights' );
				delete_transient( 'momo_revenue_insights_monthly' );
				delete_transient( 'momo_revenue_insights_weekly' );
				delete_transient( 'momo_revenue_insights_yearly' );
				delete_transient( 'momo_order_insights' );
				delete_transient( 'momo_average_order_insights' );
				break;
			case 'sales':
				delete_transient( 'momo_weekly_sales_insights' );
				delete_transient( 'momo_monthly_sales_insights' );
				break;
			case 'overall':
				delete_transient( 'momo_overall_insights' );
				delete_transient( 'momo_overall_insights_monthly' );
				delete_transient( 'momo_overall_insights_weekly' );
				delete_transient( 'momo_overall_insights_yearly' );
				break;
		}
		echo wp_json_encode(
			array(
				'status'  => 'good',
				'message' => esc_html__( 'Insights cache cleared successfully. Please refresh page for updated insights.', 'momoacgwc' ),
			)
		);
		exit;
	}
	public function momoacgwc_insights_change_timeframe() {
		$res = check_ajax_referer( 'momoacg_security_key', 'security' );
		if ( isset( $_POST['action'] ) && 'momoacgwc_insights_change_timeframe' !== $_POST['action'] ) {
			return;
		}
		$timeframe                                   = isset( $_POST['timeframe'] ) ? sanitize_text_field( wp_unslash( $_POST['timeframe'] ) ) : 'monthly';
		$momo_acgwc_insights_settings                = get_option( 'momo_acgwc_insights_settings' );
		$momo_acgwc_insights_settings['time_filter'] = $timeframe;
		update_option( 'momo_acgwc_insights_settings', $momo_acgwc_insights_settings );
		echo wp_json_encode(
			array(
				'status'  => 'good',
				'message' => esc_html__( 'Timeframe changed successfully. Please refresh page for updated insights.', 'momoacgwc' ),
			)
		);
		exit;
	}
	/**
	 * Generate an email template using AI based on type.
	 *
	 * The template type is sent as a POST variable.
	 *
	 * @since 1.2.5
	 */
	public function momoacgwc_generate_template() {
		global $momoacgwc;
		$res = check_ajax_referer( 'momoacg_security_key', 'security' );
		if ( isset( $_POST['action'] ) && 'momoacgwc_generate_template' !== $_POST['action'] ) {
			return;
		}
		$template_type = isset( $_POST['template_type'] ) ? sanitize_text_field( wp_unslash( $_POST['template_type'] ) ) : '';

		$response = $momoacgwc->instapi->momoacgwc_get_ai_template( $template_type );
	
		echo wp_json_encode(
			array(
				'status' => 'good',
				'preview' => $response,
				'template' => $response,
				'message' => esc_html__( 'Template Created', 'momoacgwc' ),
			)
		);
		exit;
	}
	/**
	 * Register Settings
	 */
	public function momo_acgwc_insights_register_settings() {
		register_setting( 'momoacgwc-settings-insights-group', 'momo_acg_wc_insights_settings' );
	}
	/**
	 * Adds Submenu
	 */
	public function momo_add_submenu_of_insights() {
		global $momoacgwc;
		add_submenu_page(
			'momoacgwc',
			esc_html__( 'WooAI Insights', 'momoacgwc' ),
			'Insights',
			'manage_options',
			'momoacgwc-insights',
			array( $this, 'wooai_insights_add_admin_settings_page' )
		);
	}
	/**
	 * Settings Page
	 */
	public function wooai_insights_add_admin_settings_page() {
		global $momoacgwc;
		include_once $momoacgwc->plugin_path . 'insights/admin/pages/momo-acgwc-insights-settings.php';
	}
	/**
	 * Enqueue script and styles
	 */
	public function momoacg_searchlog_print_admin_ss() {
		$current_screen = get_current_screen();
		if ( isset( $current_screen->base ) && 'woo-ai_page_momoacgwc-insights' === $current_screen->base ) {
			global $momoacgwc;

			$momo_acgwc_insights_settings = get_option( 'momo_acgwc_insights_settings' );
			$time_filter                  = isset( $momo_acgwc_insights_settings['time_filter'] ) ? $momo_acgwc_insights_settings['time_filter'] : 'monthly';

			$time_legend = esc_html__( 'Month', 'momoacgwc' );
			if ( 'weekly' === $time_filter ) {
				$time_legend = esc_html__( 'Week', 'momoacgwc' );
			} elseif ( 'daily' === $time_filter ) {
				$time_legend = esc_html__( 'Day', 'momoacgwc' );
			} elseif ( 'yearly' === $time_filter ) {
				$time_legend = esc_html__( 'Year', 'momoacgwc' );
			} elseif ( 'monthly' === $time_filter ) {
				$time_legend = esc_html__( 'Month', 'momoacgwc' );
			}
			wp_enqueue_style( 'momoacg_trumbowyg', $momoacgwc->plugin_url . 'insights/assets/trumbowyg/ui/trumbowyg.min.css', array(), $momoacgwc->version );
			wp_enqueue_script( 'momoacg_trumbowyg', $momoacgwc->plugin_url . 'insights/assets/trumbowyg/trumbowyg.min.js', array( 'jquery' ), $momoacgwc->version, true );

			wp_enqueue_style( 'momoacg_insights_admin', $momoacgwc->plugin_url . 'insights/assets/css/momoacgwc-insights-admin.css', array(), $momoacgwc->version );
			wp_register_script( 'momoacg_insights_admin', $momoacgwc->plugin_url . 'insights/assets/js/momoacgwc-insights-admin.js', array( 'jquery', 'momoacg_trumbowyg' ), $momoacgwc->version, true );
			wp_register_script( 'momoacg_insights_chart', $momoacgwc->plugin_url . 'insights/assets/js/chart.js', array( 'jquery' ), '4.6.6', true );
			wp_enqueue_script( 'momoacg_insights_admin' );
			wp_enqueue_script( 'momoacg_insights_chart' );
			$ajaxurl = array(
				'ajaxurl'             => admin_url( 'admin-ajax.php' ),
				'momoacg_ajax_nonce'  => wp_create_nonce( 'momoacg_security_key' ),
				'clearing_cache'      => esc_html__( 'Clearing Cache...', 'momoacgwc' ),
				'generating_template' => esc_html__( 'Generating Template...', 'momoacgwc' ),
				'empty_title'         => esc_html__( 'Empty Title', 'momoacgwc' ),
				'open_template'       => esc_html__( 'Opening Template.....', 'momoacgwc' ),
				'change_tf'           => esc_html__( 'Changing TimeFrame.....', 'momoacgwc' ),
				'time_legend'         => $time_legend,
			);
			wp_localize_script( 'momoacg_insights_admin', 'momoacg_insights_admin', $ajaxurl );
		}
	}
}
new MoMo_ACGWC_Insights_Admin();
