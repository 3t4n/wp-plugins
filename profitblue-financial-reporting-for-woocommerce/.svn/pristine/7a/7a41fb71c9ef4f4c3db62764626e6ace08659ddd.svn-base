<?php

namespace ProfitBlue\Admin;

use ProfitBlue\Ajax\AjaxRenderShippingCosts;
use ProfitBlue\Ajax\AjaxSaveShippingCosts;
use ProfitBlue\Ajax\AjaxSaveCogsCustomPeriod;
use ProfitBlue\Ajax\AjaxSavePaymentsCustomPeriod;
use ProfitBlue\Ajax\AjaxSaveShippingCustomPeriod;
use ProfitBlue\Ajax\AjaxDeleteShipingData;
use ProfitBlue\Ajax\AjaxSaveCogsProductsData;
use ProfitBlue\Ajax\AjaxCreateCogsProductsData;
use ProfitBlue\Ajax\AjaxCogsGetModal;
use ProfitBlue\Ajax\AjaxDeleteCogsData;
use ProfitBlue\Ajax\AjaxSavePaymentsData;
use ProfitBlue\Ajax\AjaxDeletePaymentsData;
use ProfitBlue\Ajax\AjaxSaveNotificationsData;
use ProfitBlue\Ajax\AjaxSaveCustomCostAndIncomeData;
use ProfitBlue\Ajax\AjaxSaveShopSettingData;
use ProfitBlue\Ajax\AjaxSaveShopSettingCustomPeriod;
use ProfitBlue\Ajax\AjaxRecalculateOrdersData;
use ProfitBlue\Ajax\AjaxLoadMoreCogs;
use ProfitBlue\Ajax\AjaxLoadMoreProducts;
use ProfitBlue\Ajax\AjaxLoadMoreOrders;
use ProfitBlue\Ajax\AjaxGetBestSeller;
use ProfitBlue\Ajax\AjaxOverwievCategoryData;
use ProfitBlue\Ajax\AjaxProcessCogsBatch;
use ProfitBlue\Ajax\AjaxProcessOrdersShippingPayment;
use ProfitBlue\Ajax\AjaxSaveLastYearCcaiData;
use ProfitBlue\Ajax\AjaxProductsGetModal;
use ProfitBlue\Ajax\AjaxOrdersGetModal;
use ProfitBlue\Blocks\FixedCostsFormLine;
use ProfitBlue\Blocks\VariableCostsFormLine;
use ProfitBlue\Blocks\IncomeCostsFormLine;
use ProfitBlue\Ajax\AjaxSaveWizardStep;
use ProfitBlue\Ajax\AjaxSaveWizardEnd;
use ProfitBlue\Ajax\AjaxLoadMoreProductOrders;
use ProfitBlue\Ajax\AjaxCreateOrdersData;
use ProfitBlue\Ajax\AjaxCreateProducts;
use ProfitBlue\Ajax\AjaxInstall;
use ProfitBlue\Ajax\AjaxCreateMissingOrders;
use ProfitBlue\Models\CustomCostsAndIncomeModel;



/**
 * Class AjaxActions
 *
 */
class AjaxActions {

	public function __construct() {
		
		add_action( 'wp_ajax_save_shipping_costs', array( $this, 'save_shipping_costs' ) );
		add_action( 'wp_ajax_render_shipping_costs', array( $this, 'render_shipping_costs' ) );	
		add_action( 'wp_ajax_save_cogs_custom_period', array( $this, 'save_cogs_custom_period' ) );
		add_action( 'wp_ajax_save_cogs_products_data', array( $this, 'save_cogs_products_data' ) );
		add_action( 'wp_ajax_create_cogs_products_data', array( $this, 'create_cogs_products_data' ) );
		add_action( 'wp_ajax_cogs_get_modal', array( $this, 'cogs_get_modal' ) );
		add_action( 'wp_ajax_get_fixed_line', array( $this, 'get_fixed_line' ) );
		add_action( 'wp_ajax_get_variable_line', array( $this, 'get_variable_line' ) );
		add_action( 'wp_ajax_get_income_line', array( $this, 'get_income_line' ) );	
		add_action( 'wp_ajax_save_acci_data', array( $this, 'save_acci_data' ) );	
		add_action( 'wp_ajax_save_payments_custom_period', array( $this, 'save_payments_custom_period' ) );	
		add_action( 'wp_ajax_save_shipping_custom_period', array( $this, 'save_shipping_custom_period' ) );
		add_action( 'wp_ajax_delete_shipping_data', array( $this, 'delete_shipping_data' ) );
		add_action( 'wp_ajax_save_payments_data', array( $this, 'save_payments_data' ) );
		add_action( 'wp_ajax_delete_payments_data', array( $this, 'delete_payments_data' ) );
		add_action( 'wp_ajax_save_notifications_data', array( $this, 'save_notifications_data' ) );	
		add_action( 'wp_ajax_save_shop_setting', array( $this, 'save_shop_setting' ) );	
		add_action( 'wp_ajax_save_shop_setting_custom_period', array( $this, 'save_shop_setting_custom_period' ) );	
		add_action( 'wp_ajax_process_cogs_batch', array( $this, 'process_cogs_batch' ) );	
		add_action( 'wp_ajax_delete_cogs_data', array( $this, 'delete_cogs_data' ) );

		add_action( 'wp_ajax_recalculate_orders_data', array( $this, 'recalculate_orders_data' ) );	
		add_action( 'wp_ajax_get_best_seller_product', array( $this, 'get_best_seller_product' ) );	
		add_action( 'wp_ajax_get_overwiev_category_data', array( $this, 'get_overwiev_category_data' ) );
		add_action( 'wp_ajax_load_more_orders', array( $this, 'load_more_orders' ) );

		add_action( 'wp_ajax_save_wizard_step', array( $this, 'save_wizard_step' ) );
		add_action( 'wp_ajax_save_wizard_end', array( $this, 'save_wizard_end' ) );

		add_action( 'wp_ajax_load_more_cogs', array( $this, 'load_more_cogs' ) );
		add_action( 'wp_ajax_load_more_products', array( $this, 'load_more_products' ) );	
		add_action( 'wp_ajax_load_more_product_orders', array( $this, 'load_more_product_orders' ) );	

		add_action( 'wp_ajax_update_order_shipping_payment', array( $this, 'update_order_shipping_payment' ) );
		add_action( 'wp_ajax_create_orders_data', array( $this, 'create_orders_data' ) );

		add_action( 'wp_ajax_save_last_year_ccai_data', array( $this, 'save_last_year_ccai_data' ) );

		add_action( 'wp_ajax_products_get_modal', array( $this, 'products_get_modal' ) );
		add_action( 'wp_ajax_orders_get_modal', array( $this, 'orders_get_modal' ) );

		add_action( 'wp_ajax_create_products', array( $this, 'create_products' ) );

		add_action( 'wp_ajax_profitblue_install', array( $this, 'profitblue_install' ) );
		add_action( 'wp_ajax_profitblue_create_missing_orders', array( $this, 'create_missing_orders' ) );		
	
	}

	public function profitblue_install() {
		AjaxInstall::handle();
	}

	public function create_missing_orders() {
		AjaxCreateMissingOrders::handle();
	}

	public function create_products() {
		AjaxCreateProducts::handle();
	}

	public function products_get_modal() {
		AjaxProductsGetModal::handle();
	}

	public function orders_get_modal() {
		AjaxOrdersGetModal::handle();
	}

	public function save_last_year_ccai_data() {
		AjaxSaveLastYearCcaiData::handle();
	}

	public function create_orders_data() {
		AjaxCreateOrdersData::handle();
	}

	public function load_more_product_orders() {
		AjaxLoadMoreProductOrders::handle();
	}

	public function update_order_shipping_payment() {
		AjaxProcessOrdersShippingPayment::handle();
	}

	public function load_more_orders() {
		AjaxLoadMoreOrders::handle();
	}

	public function get_overwiev_category_data() {
		AjaxOverwievCategoryData::handle();
	}

	public function get_best_seller_product() {
		AjaxGetBestSeller::handle();
	}

	public function load_more_products() {
		AjaxLoadMoreProducts::handle();
	}

	public function load_more_cogs() {
		AjaxLoadMoreCogs::handle();
	}

	public function save_notifications_data() {
		AjaxSaveNotificationsData::handle();
	}

	public function save_acci_data() {
		AjaxSaveCustomCostAndIncomeData::handle();
	}

	public function render_shipping_costs() {
		AjaxRenderShippingCosts::handle();
	}
	
	public function save_shipping_costs() {
		AjaxSaveShippingCosts::handle();
	}

	public function save_cogs_custom_period() {
		AjaxSaveCogsCustomPeriod::handle();		
	}

	public function save_cogs_products_data() {		
		AjaxSaveCogsProductsData::handle();	
	}

	public function create_cogs_products_data() {		
		AjaxCreateCogsProductsData::handle();	
	}

	public function cogs_get_modal() {		
		AjaxCogsGetModal::handle();	
	}

	public function import_cogs() {		
		AjaxImportCogs::handle();	
	}

	public function save_wizard_step() {		
		AjaxSaveWizardStep::handle();	
	}

	public function save_wizard_end() {		
		AjaxSaveWizardEnd::handle();	
	}

	/**
	 * Render form line for fixed income setting
	 * @return void
	 */
	public function get_fixed_line() {

		if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( wp_unslash( sanitize_text_field( $_POST['nonce'] ) ), 'profitblue_ajax_nonce' ) ) {
			wp_send_json_error( 'Invalid nonce' );
			wp_die();
		}
		$count = isset( $_POST['count'] ) ? wp_unslash( sanitize_text_field( $_POST['count'] ) ) : '';
		$count++;
		$data = array( 'count' => $count );
		$html = FixedCostsFormLine::get_line( $data );
		$response = array();
		$response['count'] = $count;
		$response['status'] = 'success';
		$response['html']   = $html;
		echo wp_json_encode( $response );
		exit();

	}

	public function get_variable_line() {

		if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( wp_unslash( sanitize_text_field( $_POST['nonce'] ) ), 'profitblue_ajax_nonce' ) ) {
			wp_send_json_error( 'Invalid nonce' );
			wp_die();
		}
		$count = isset( $_POST['count'] ) ? wp_unslash( sanitize_text_field( $_POST['count'] ) ) : '';
		$count++;
		$data = array( 'count' => $count );
		$html = VariableCostsFormLine::get_line( $data );
		$response = array();
		$response['count'] = $count;
		$response['status'] = 'success';
		$response['html']   = $html;
		echo wp_json_encode( $response );
		exit();

	}

	public function get_income_line() {

		if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( wp_unslash( sanitize_text_field( $_POST['nonce'] ) ), 'profitblue_ajax_nonce' ) ) {
			wp_send_json_error( 'Invalid nonce' );
			wp_die();
		}
		$count = isset( $_POST['count'] ) ? wp_unslash( sanitize_text_field( $_POST['count'] ) ) : '';
		if ( 0 == $count ) {
			$count = 1;
		} else {
			$count++;
		}
		$data = array( 'count' => $count );
		$html = IncomeCostsFormLine::get_line( $data );
		$response = array();
		$response['count'] = $count;
		$response['status'] = 'success';
		$response['html']   = $html;
		echo wp_json_encode( $response );
		exit();

	}

	public function save_payments_custom_period() {
		AjaxSavePaymentsCustomPeriod::handle();		
	}

	public function save_shipping_custom_period() {
		AjaxSaveShippingCustomPeriod::handle();		
	}

	public function delete_shipping_data() {
		AjaxDeleteShipingData::handle();	
	}
	
	public function delete_cogs_data() {
		AjaxDeletecogsData::handle();	
	}
	
	public function save_payments_data() {
		AjaxSavePaymentsData::handle();	
	}
	public function delete_payments_data() {
		AjaxDeletePaymentsData::handle();	
	}

	public function save_shop_setting_custom_period() {
		AjaxSaveShopSettingCustomPeriod::handle();		
	}

	public function save_shop_setting() {

		AjaxSaveShopSettingData::handle();
		
	}

	public function recalculate_orders_data() {

		AjaxRecalculateOrdersData::handle();
		
	}

	public function process_cogs_batch() {

		AjaxProcessCogsBatch::handle();
		
	}

}
