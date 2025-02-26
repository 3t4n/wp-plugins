<?php
/**
 * @package   Profitblue
 * @author    Profitblue
 * @license   GPL-2.0+
 * @link      https://profitblue.com
 * @copyright 2024 Profitblue
 */

namespace ProfitBlue;

use ProfitBlue\Enums\DataSetting;
use ProfitBlue\Enums\FixedCostTypes;
use ProfitBlue\Enums\VariableCostTypes;
use ProfitBlue\Enums\IncomeCostTypes;
use ProfitBlue\Enums\WizardSteps;
use ProfitBlue\Abstracts\AbstractForm;
use ProfitBlue\Admin\AdminPage;
use ProfitBlue\Admin\AjaxActions;
use ProfitBlue\Controllers\ProductsController;
use ProfitBlue\Controllers\OrdersController;
use ProfitBlue\Controllers\OrderUpdateController;
use ProfitBlue\Controllers\OrderExport;
use ProfitBlue\Emails\EmailNotification;
use ProfitBlue\Helpers\Helper;
use ProfitBlue\Helpers\CreateTables;
use ProfitBlue\Helpers\CreatePeriods;
use ProfitBlue\Ajax\AjaxCreateCogsProductsData;

class ProfitBlueAdmin {

	/**
	 * Instance of this class.
	 *
	 * @since    1.0
	 *
	 * @var      object
	 */
    protected static $instance = null;
	
	/**
	 * Slug of the plugin screen.
	 *
	 * @since    1.0
	 *
	 * @var      string
	 */
	protected $plugin_screen_hook_suffix = null;

	/**
	 * Initialize the plugin by loading admin scripts & styles and adding a
	 * settings page and menu.
	 *
	 * @since     1.0
	 */
	private function __construct() {

		$this->plugin_slug = 'profitblue-financial-reporting-for-woocommerce';

		// Add the options page and menu item.
		add_action( 'admin_menu', array( $this, 'add_plugin_admin_menu' ) );  

		add_filter( 'plugin_row_meta', array( $this, 'add_action_links' ), 10, 2 );
		add_filter( 'plugin_action_links', array( $this, 'add_setting_link' ), 10, 4 );
		add_filter( 'plugin_action_links', array( $this, 'add_gopro_link' ), 10, 6 );

		// Load admin style sheet and JavaScript.
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_styles' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );

		add_action( 'admin_footer', array( $this, 'modal_code' ) );
		add_action( 'admin_init', array( $this, 'check_data' ) );

		add_action( 'admin_head', array( $this, 'install_redirect' ) );		
		add_action( 'admin_footer', array( $this, 'create_missing_orders' ) );
		
		add_action( 'woocommerce_new_product', array( $this, 'new_product' ), 10, 2 );
		add_action( 'woocommerce_new_product_variation', array( $this, 'new_product' ), 10, 2 );
		add_action( 'woocommerce_update_product', array( $this, 'update_product' ), 10, 2 );
		add_action( 'woocommerce_update_product_variation', array( $this, 'update_product' ), 10, 2 );
		
		$this->ajax();

		//$this->wizzard();		

	}

	/**
	 * Return an instance of this class.
	 *
	 * @since     1.0
	 *
	 * @return    object    A single instance of this class.
	 */
	public static function get_instance() {

		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	/**
	 * Add settings action link to the plugins page.
	 *
	 * @param array $meta
	 * @param string $file
	 *
	 * @return array
	 * @since    1.0.0
	 */
	public function add_action_links( array $meta, string $file ): array {

		if ( $file == 'profitblue/profitblue.php' ) {
			$meta[] = '<a href="https://profitblue.com/documentation/" target="_blank">' . esc_html__( 'Documentation', 'profitblue-financial-reporting-for-woocommerce' ) . '</a>';			
		}

		return $meta;
	}



	/**
	 * Add Settings action link to the plugins page.
	 *
	 * @param array $meta
	 * @param string $file
	 *
	 * @return array
	 * @since    1.0.0
	 */
	public function add_setting_link( array $actions, string $plugin_file, array $plugin_data, string $context ): array {

		if ( $plugin_file == 'profitblue/profitblue.php' ) {
			$actions[] = '<a href="' . admin_url( 'admin.php?page=profitblue' ) . '">' . esc_html__( 'Settings', 'profitblue-financial-reporting-for-woocommerce' ) . '</a>';			
		}

		return $actions;
	}


	/**
	 * Add Go pro action link to the plugins page.
	 *
	 * @param array $meta
	 * @param string $file
	 *
	 * @return array
	 * @since    1.0.0
	 */
	public function add_gopro_link( array $actions, string $plugin_file, array $plugin_data, string $context ): array {

		if ( $plugin_file == 'profitblue/profitblue.php' ) {
			$actions[] = '<b><a href="https://profitblue.com/pricing/" style="color:#FF0000" target="_blank">' . esc_html__( 'Go Pro', 'profitblue-financial-reporting-for-woocommerce' ) . '</a></b>';			
		}

		return $actions;
	}
	

	/**
	 * Register and enqueue admin-specific style sheet.
	 *
	 * @since     1.0
	 *
	 * @return    null    Return early if no settings page is registered.
	 */
	public function enqueue_admin_styles() {
		
		wp_enqueue_style( 'profitblue-financial-reporting-for-woocommerce' .'-select2', PROFITBLUEFURL . 'assets/js/select2.min.css', array(), PROFITBLUEFVERSION );
		wp_enqueue_style( 'profitblue-financial-reporting-for-woocommerce' .'-splide', PROFITBLUEFURL . 'assets/css/splide.min.css', array(), PROFITBLUEFVERSION );
		wp_enqueue_style( 'profitblue-financial-reporting-for-woocommerce' .'-micromodal', PROFITBLUEFURL . 'assets/css/micromodal.css', array(), PROFITBLUEFVERSION );
		wp_enqueue_style( 'profitblue-financial-reporting-for-woocommerce' .'-admin-styles', PROFITBLUEFURL . 'assets/css/admin.css', array(), PROFITBLUEFVERSION );
		wp_enqueue_style( 'profitblue-financial-reporting-for-woocommerce' .'-form-styles', PROFITBLUEFURL . 'assets/css/admin-form.css', array(), PROFITBLUEFVERSION );

	}

	/**
	 * Register and enqueue admin-specific scripts.
	 *
	 * @since     1.0
	 *
	 * @return    null
	 */
	public function enqueue_admin_scripts() {

		wp_enqueue_script( 'splide-carousel', PROFITBLUEFURL . 'assets/js/splide.min.js', array(), PROFITBLUEFVERSION, true );
	
		wp_enqueue_script( 'easepick', PROFITBLUEFURL . 'assets/js/index.umd.min.js', array(), '1.2.0', true );
		wp_enqueue_script( 'micromodal', PROFITBLUEFURL . 'assets/js/micromodal.min.js', array(), PROFITBLUEFVERSION, true );
		wp_enqueue_script( 'profitblue' . '-admin-script', PROFITBLUEFURL . 'assets/js/admin.js', array(), PROFITBLUEFVERSION, true );


		$today = gmdate( 'Y-m-d' );
		$dates = $this->datepicker_dates();
		$nonce = wp_create_nonce( 'profitblue_ajax_nonce' );

		$options = array(
			'templatecssurl'		=> PROFITBLUEFURL . 'assets/css/',
			'ajaxurl' 				=> admin_url().'admin-ajax.php',
			'nonce'					=> $nonce,
			'assetsUrl' 			=> PROFITBLUEFURL,
			'version' 				=> PROFITBLUEFVERSION,
			'TodayStart' 			=> $dates['today'],
			'YesterdayStart' 		=> $dates['yesterday'],
			'ThisWeekStart' 		=> $dates['this_week_start'],
			'ThisWeekEnd' 			=> $dates['this_week_end'],
			'ThisMonthStart' 		=> $dates['this_month_start'],
			'ThisMonthEnd' 			=> $dates['this_month_end'],
			'LastMonthStart' 		=> $dates['last_month_start'],
			'LastMonthEnd' 			=> $dates['last_month_end'],
			'LastSevenDays' 		=> $dates['last_seven_days'],
			'LastThirtyDays' 		=> $dates['last_30_days'],
			'LastNinthyDays' 		=> $dates['last_90_days'],
			'LastNinthyDays' 		=> $dates['last_90_days'],
			'Q1Start' 				=> $dates['q1_start'],
			'Q1End' 				=> $dates['q1_end'],
			'Q2Start' 				=> $dates['q2_start'],
			'Q2End' 				=> $dates['q2_end'],
			'Q3Start' 				=> $dates['q3_start'],
			'Q3End' 				=> $dates['q3_end'],
			'Q4Start' 				=> $dates['q4_start'],
			'Q4End' 				=> $dates['q4_end'],
			'FirstDayOfLastYear' 	=> $dates['first_day_last_year'],
			'LastDayOfLastYear' 	=> $dates['last_day_last_year'],
			'FirstDayOfThisYear' 	=> $dates['first_day_this_year'],
			'LastDayOfThisYear' 	=> $dates['last_day_this_year'],
			'spinner'				=> $this->get_spinner(),
			'sureCogs'				=> esc_html__( 'Are you sure you want to save new data?', 'profitblue-financial-reporting-for-woocommerce' ),
			'notExport'				=> esc_html__( 'Only in PRO version.', 'profitblue-financial-reporting-for-woocommerce' ),
			'sureLastYear'			=> esc_html__( 'Are you sure you want to save data from last year?', 'profitblue-financial-reporting-for-woocommerce' ),
			'deleteText'			=> esc_html__( 'Delete', 'profitblue-financial-reporting-for-woocommerce' ),
			'saveText'				=> esc_html__( 'SAVE', 'profitblue-financial-reporting-for-woocommerce' ),
			'sureCogsInfo'			=> esc_html__( 'You have changed the COGS settings for one or more products. If any of the products are in orders already created, it is necessary to update the dates of these orders.', 'profitblue-financial-reporting-for-woocommerce' ),
			'deleteCogs'			=> esc_html__( 'Are you sure you want to delete COGS data?', 'profitblue-financial-reporting-for-woocommerce' ),
			'deleteCogsInfo'		=> esc_html__( 'If you delete a custom period, the stored product data for that period is also deleted. This action is permanent and cannot be undone.', 'profitblue-financial-reporting-for-woocommerce' ),
			'sureCogsInfo2'		    => esc_html__( 'This operation may take some time, please do not close the window until the data update is complete. You can see the update process below.', 'profitblue-financial-reporting-for-woocommerce' ),
			'cogsInfo'		    => esc_html__( 'The COGS are being regenerated. Please wait few seconds/minutes until everything is set properly. The pop-up window will automatically close and save the settings. No further steps are needed.', 'profitblue-financial-reporting-for-woocommerce' )
		);
		wp_localize_script( 'profitblue' . '-admin-script', 'profitblue', $options );
		
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( !empty( $_GET['page'] ) && 'data-settings' == $_GET['page'] ) {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			if ( !empty( $_GET['subpage'] ) && 'custom-cost-and-income' == $_GET['subpage'] ) {
				wp_enqueue_script( 'profitblue' . '-custom-cost-and-income', PROFITBLUEFURL . 'assets/js/data-settings/custom_cost_and_income.js', array(), PROFITBLUEFVERSION, true );				
				wp_localize_script( 'profitblue' . '-custom-cost-and-income', 'profitblue', $options );
			}
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			if ( !empty( $_GET['subpage'] ) && 'shipping-costs' == $_GET['subpage'] ) {
				wp_enqueue_script( 'profitblue' . '-shipping-cost', PROFITBLUEFURL . 'assets/js/data-settings/shipping-cost.js', array(), PROFITBLUEFVERSION, true );				
				wp_localize_script( 'profitblue' . '-shipping-cost', 'profitblue', $options );
			}
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			if ( !empty( $_GET['subpage'] ) && 'costs-of-goods-sold' == $_GET['subpage'] ) {
				wp_enqueue_script( 'profitblue' . '-cogs-cost', PROFITBLUEFURL . 'assets/js/data-settings/cogs.js', array(), PROFITBLUEFVERSION, true );
				wp_localize_script( 'profitblue' . '-cogs-cost', 'profitblue', $options );
			}
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			if ( !empty( $_GET['subpage'] ) && 'payment-fees' == $_GET['subpage'] ) {
				wp_enqueue_script( 'profitblue' . '-payment-fees', PROFITBLUEFURL . 'assets/js/data-settings/payment-fees.js', array(), PROFITBLUEFVERSION, true );
				wp_localize_script( 'profitblue' . '-payment-fees', 'profitblue', $options );
			}
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			if ( !empty( $_GET['subpage'] ) && 'shop-settings' == $_GET['subpage'] ) {
				wp_enqueue_script( 'profitblue' . '-shop-settings', PROFITBLUEFURL . 'assets/js/data-settings/shop-settings.js', array(), PROFITBLUEFVERSION, true );
				wp_localize_script( 'profitblue' . '-shop-settings', 'profitblue', $options );
			}
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			if ( !empty( $_GET['subpage'] ) && 'manage-notifications' == $_GET['subpage'] ) {
				wp_enqueue_script( 'profitblue' . '-notifications', PROFITBLUEFURL . 'assets/js/data-settings/notifications.js', array(), PROFITBLUEFVERSION, true );
				wp_localize_script( 'profitblue' . '-notifications', 'profitblue', $options );
			}
		}
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( !empty( $_GET['page'] ) && 'products' == $_GET['page'] ) {
			wp_enqueue_script( 'gstatic-loader', PROFITBLUEFURL . 'assets/js/loader.js', array(), PROFITBLUEFVERSION, false );
			wp_enqueue_script( 'profitblue' . '-products-overwiev', PROFITBLUEFURL . 'assets/js/products-overwiev.js', array(), PROFITBLUEFVERSION, true );
			wp_localize_script( 'profitblue' . '-products-overwiev', 'profitblue', $options );
		}
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( !empty( $_GET['page'] ) && 'profit-and-loss' == $_GET['page'] ) {
			wp_enqueue_script( 'profitblue' . '-profit-and-loss', PROFITBLUEFURL . 'assets/js/profit-and-loss.js', array(), PROFITBLUEFVERSION, true );
			wp_localize_script( 'profitblue' . '-profit-and-loss', 'profitblue', $options );
		}
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( !empty( $_GET['page'] ) && 'orders' == $_GET['page'] ) {
			wp_enqueue_script( 'profitblue' . '-orders-overwiev', PROFITBLUEFURL . 'assets/js/orders-overwiev.js', array(), PROFITBLUEFVERSION, true );
			wp_localize_script( 'profitblue' . '-orders-overwiev', 'profitblue', $options );
		}
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( !empty( $_GET['page'] ) && 'profitblue-financial-reporting-for-woocommerce' == $_GET['page'] ) {
			
			wp_enqueue_script( 'select2', PROFITBLUEFURL . 'assets/js/select2.min.js', array(), PROFITBLUEFVERSION, true );
			wp_enqueue_script( 'gstatic-loader', PROFITBLUEFURL . 'assets/js/loader.js', array(), PROFITBLUEFVERSION, false );
			wp_enqueue_script( 'profitblue' . '-profitblue', PROFITBLUEFURL . 'assets/js/overview.js', array(), PROFITBLUEFVERSION, true );
			wp_localize_script( 'profitblue' . '-profitblue', 'profitblue', $options );

		}

		global $pagenow;
		if ( $pagenow == 'plugins.php' ) {
			$options = array(
				'ajaxurl' 				=> admin_url().'admin-ajax.php',
				'assetsUrl' 			=> PROFITBLUEFURL,
				'version' 				=> PROFITBLUEFVERSION,
				'spinner'				=> $this->get_spinner(),
				'content'				=> $this->get_deactivate_content(),			
			);
			wp_enqueue_script( 'profitblue' . '-deactivate', PROFITBLUEFURL . 'assets/js/deactivate.js', array(), PROFITBLUEFVERSION, true );
			wp_localize_script( 'profitblue' . '-deactivate', 'profitblue', $options );
		}
		
	}

	/**
	 * Register the administration menu for this plugin into the WordPress Dashboard menu.
	 *
	 * @since    1.0
	 * @return null
	 */
	public function add_plugin_admin_menu() {

		add_menu_page(
			__( 'Profitblue', 'profitblue-financial-reporting-for-woocommerce' ),
			__( 'Profitblue', 'profitblue-financial-reporting-for-woocommerce' ),
			'manage_options',
			'profitblue-financial-reporting-for-woocommerce',
			array( $this, 'display_main_page' ),
			plugins_url( 'profitblue-financial-reporting-for-woocommerce/assets/images/favicon.svg' ),
			63
		);
			add_submenu_page(
				'profitblue-financial-reporting-for-woocommerce',
				__( 'Products', 'profitblue-financial-reporting-for-woocommerce' ),
				__( 'Products', 'profitblue-financial-reporting-for-woocommerce' ),
				'manage_options',
				'products',
				array( $this, 'display_products_page' )
			);

			add_submenu_page(
				'profitblue-financial-reporting-for-woocommerce',
				__( 'Orders', 'profitblue-financial-reporting-for-woocommerce' ),
				__( 'Orders', 'profitblue-financial-reporting-for-woocommerce' ),
				'manage_options',
				'orders',

				array( $this, 'display_orders_page' )

			);

			add_submenu_page(
				'profitblue-financial-reporting-for-woocommerce',
				__( 'Profit and loss', 'profitblue-financial-reporting-for-woocommerce' ),
				__( 'Profit and loss', 'profitblue-financial-reporting-for-woocommerce' ),
				'manage_options',
				'profit-and-loss',
				array( $this, 'display_profit_loss_page' )
			);

			add_submenu_page(
				'profitblue-financial-reporting-for-woocommerce',
				__( 'Data settings', 'profitblue-financial-reporting-for-woocommerce' ),
				__( 'Data settings', 'profitblue-financial-reporting-for-woocommerce' ),
				'manage_options',
				'data-settings',
				array( $this, 'display_data_settings_page' )
			);

		

		add_submenu_page(
			'profitblue-financial-reporting-for-woocommerce',
			__( 'Tutorials', 'profitblue-financial-reporting-for-woocommerce' ),
			__( 'Tutorials', 'profitblue-financial-reporting-for-woocommerce' ),
			'manage_options',
			'tutorials',
			array( $this, 'display_tutorials_page' )
		);

		add_submenu_page(
			'profitblue-financial-reporting-for-woocommerce',
			__( 'Upgrade to Premium', 'profitblue-financial-reporting-for-woocommerce' ),
			__( 'Upgrade to Premium', 'profitblue-financial-reporting-for-woocommerce' ),
			'manage_options',
			'upgrade',
			array( $this, 'display_upgrade_page' )
		);

 	}
	
	/**
	 * install_redirect
	 *
	 * @return void
	 */
	public function install_redirect() {

		if ( false === $this->is_profitblue_page() ) {
			return;
		}
				

		$instalation_finish = get_option( 'profitblue_instalation_finish' );
		if ( empty( $instalation_finish ) ) {
		
			$instalation_step = get_option( 'profitblue_install_step' );					
			if ( empty( $instalation_step ) ) {
				$instalation_step = 'instal-tables';
			}
			if ( 'installed' == $instalation_step ) {
				return;
			}
			?>
			<div style="display:none;" id="instaltionTarget" data-step="<?php echo esc_html($instalation_step); ?>"><h2 class="are-you-sure"><?php echo esc_html__( 'Creating ProfitBlue data', 'profitblue-financial-reporting-for-woocommerce' ); ?></h2><p class="are-you-sure"><?php echo esc_html__( 'Creating missing database tables and necessary data. This operation may take some time, please do not close the window until the data update is complete. You can see the update process below.', 'profitblue-financial-reporting-for-woocommerce' ); ?></p></div>
			<?php										
		}
	}

	/**
	 * wizard_redirect
	 *
	 * @return void
	 */
	public static function wizard_redirect() {

		$user_id = get_current_user_id();

		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( !empty( $_GET['wizard-proccess'] ) && 'finish' == $_GET['wizard-proccess'] ) {
			update_user_meta( $user_id, 'profitblue_is_wizard_finish', 'finish' );
		}

		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( !empty( $_GET['wizard'] ) && 'clear' == $_GET['wizard'] ) {
			delete_user_meta( $user_id, 'profitblue_is_wizard_finish' );
			$url = admin_url() . 'admin.php?page=data-settings&subpage=costs-of-goods-sold&wizard=profitblue&wizard-step=cogs&step=1';
			delete_user_meta( $user_id, 'profitblue_wizard_current_step', $url );
			wp_redirect( $url );				
		}
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( empty( $_GET['wizard'] ) ) {
			$profitblue_is_wizard_finish = get_user_meta( $user_id, 'profitblue_is_wizard_finish', true );
			
			if ( empty( $profitblue_is_wizard_finish ) || '' === $profitblue_is_wizard_finish ) {
					$profitblue_wizard_current_step = get_user_meta( $user_id, 'profitblue_wizard_current_step', true );					
				if ( empty( $profitblue_wizard_current_step ) ) {
					$url = admin_url() . 'admin.php?page=data-settings&subpage=costs-of-goods-sold&wizard=profitblue&wizard-step=cogs&step=1';
					update_user_meta( $user_id, 'profitblue_wizard_current_step', $url );
					wp_redirect( $url );				
				} else {
					wp_redirect( $profitblue_wizard_current_step );				
				}
			}
		}
		
	}

  	/**
	 * Render the main admin page
	 *
	 * @since    1.0
	 */
	public function display_main_page() {
		include_once( 'Admin/Views/Overview.php' );
	}

	/**
	 * Render the orders page
	 *
	 * @since    1.0
	 */
	public function display_products_page() {
		include_once( 'Admin/Views/ProductOverview.php' );
	}

	/**
	 * Render the orders page
	 *
	 * @since    1.0
	 */
	public function display_orders_page() {
		include_once( 'Admin/Views/OrderOverview.php' );
	}

	/**
	 * Render the profit and loss page
	 *
	 * @since    1.0
	 */
	public function display_profit_loss_page() {
		include_once( 'Admin/Views/ProfitAndLoss.php' );
	}


	/**
	 * Render the data settings page
	 *
	 * @since    1.0
	 */
	public function display_data_settings_page() {
		include_once( 'Admin/Views/DataSetting.php' );
	}

	/**
	 * Render the tutorials page
	 *
	 * @since    1.0
	 */
	public function display_tutorials_page() {
		wp_redirect( 'https://profitblue.com/tutorials/' );
		exit();
	}

	/**
	 * Render the tutorials page
	 *
	 * @since    1.0
	 */
	public function display_upgrade_page() {
		wp_redirect( 'https://profitblue.com/pricing/' );
		exit();
	}

	/**
	 * Include files
	 *
	 * @since    1.0
	 */
	public function ajax() {
		
		new AjaxActions();
		
	}

	/**
	 * Wizzard
	 *
	 * @since    1.0
	 */
	public function wizard() {
		
		new WizardSteps();
		
	}

	/**
	 * Admin modal code
	 *
	 * @since    1.0
	 */
	public function modal_code() {

		$html = '';

		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( !empty( $_GET['wizard'] ) && 'profitblue-financial-reporting-for-woocommerce' == $_GET['wizard'] ) {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$item = isset( $_GET['wizard-step'] ) ? esc_html( wp_unslash( sanitize_text_field( $_GET['wizard-step'] ) ) ) : '';
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$step = isset( $_GET['step'] ) ? esc_html( wp_unslash( sanitize_text_field( $_GET['step'] ) ) ) : '';
			$wizard_data = WizardSteps::get();
			$redirect = $wizard_data[$item]['steps'][$step]['redirect'];
			$redirect_url = $wizard_data[$item]['steps'][$step]['next_url'];
			$html .= '<div class="wizard-overlay" id="wizard-overlay"></div>';
			$html .= '<div class="wizard-tooltip" id="wizard-tooltip">';
				$html .= '<div id="wizard-triangle" class="triangle-bottom-left"></div>';
				$html .= '<div class="wizard-tooltip-inner">';
					$html .= '<h4 id="wizard-tooltip-title">1. The are displayed all the products on your e-shop</h4>';
					$html .= '<div id="wizard-tooltip-content">The are displayed all the products e displayed all the products on your e-shop the are displayed all the products on your e-shop</div>';
					$html .= '<div class="wizard-tooltip-nav">';
						$html .= '<div id="skip-wizard" class="skip-wizard">' . esc_html__( 'Skip wizard', 'profitblue-financial-reporting-for-woocommerce' ) . '</div>';
						$html .= '<a id="wizard-next-step" class="wizard-next-step" href="#" data-item="' . $item . '" data-step="' . $step . '" data-redirect="' . $redirect . '" data-url="' . $redirect_url . '">' . esc_html__( 'Next step', 'profitblue-financial-reporting-for-woocommerce' ) . '</a>';
					$html .= '</div>';
				$html .= '</div>';
			$html .= '</div>';
		}

		$html .= '<div class="modal micromodal-slide" id="modal-quickview" aria-hidden="false">';
			$html .= '<div class="modal__overlay" tabindex="-2" data-micromodal-close="">';
				$html .= '<div class="modal__container" id="quickview_modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-2-title">';
					$html .= '<header class="modal__header" id="quickview_modal__header">';
						$html .= '<button class="modal__close" aria-label="' . esc_html__( 'Close', 'profitblue-financial-reporting-for-woocommerce' ) . '" data-micromodal-close=""></button>';
					$html .= '</header>';
					$html .= '<div class="modal__content">';
					$html .= '<div class="modal_ratio" id="modal-content"></div>';
					$html .= '</div>';														
				$html .= '</div>';
			$html .= '</div>';
		$html .= '</div>';

		$html .= '<div class="install-modal" id="install-modal" aria-hidden="false">';
			$html .= '<div class="install-modal-container">';
				$html .= '<div class="install-modal-content" id="install-modal-content">';
				$html .= '</div>';
			$html .= '</div>';
		$html .= '</div>';

		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo wp_kses( $html, Helper::get_allowed_tags() );

	}

	/**
	 * Get notification email
	 *
	 * @since    1.0
	 */
    public function get_notification_email() {

		$email = new EmailNotification();		
		$email->render();

	}

	/**
	 * Define all dates for datepicker
	 * 
	 * @since 1.0
	 */
	private function datepicker_dates() {

		$dates = array();
		$dates['today'] 				= gmdate( 'Y-m-d' );
		$dates['yesterday'] 			= gmdate( 'Y-m-d', strtotime('-1 days') );
		$dates['this_week_start'] 		= gmdate( 'Y-m-d', strtotime('monday this week'));
		$dates['this_week_end'] 		= gmdate( 'Y-m-d', strtotime('sunday this week'));
		$dates['this_month_start'] 		= gmdate( 'Y-m-01' );
		$dates['this_month_end'] 		= gmdate( 'Y-m-t');
		$dates['last_month_start'] 		= gmdate( 'Y-m-01', strtotime('first day of last month'));
		$dates['last_month_end'] 		= gmdate( 'Y-m-t', strtotime('last day of previous month'));
		$dates['last_seven_days'] 		= gmdate( 'Y-m-d', strtotime('-7 days'));
		$dates['last_30_days'] 			= gmdate( 'Y-m-d', strtotime('-30 days'));
		$dates['last_90_days'] 			= gmdate( 'Y-m-d', strtotime('-90 days'));
		$dates['q1_start'] 				= gmdate( 'Y-01-01' );
		$dates['q1_end'] 				= gmdate( 'Y-03-31' );
		$dates['q2_start'] 				= gmdate( 'Y-04-01' );
		$dates['q2_end'] 				= gmdate( 'Y-06-30' );
		$dates['q3_start'] 				= gmdate( 'Y-07-01' );
		$dates['q3_end'] 				= gmdate( 'Y-09-30' );
		$dates['q4_start'] 				= gmdate( 'Y-10-01' );
		$dates['q4_end'] 				= gmdate( 'Y-12-31' );
		$dates['first_day_last_year'] 	= gmdate( 'Y-01-01', strtotime( '-1 year' ) );
		$dates['last_day_last_year'] 	= gmdate( 'Y-12-31', strtotime( '-1 year' ) );
		$dates['first_day_this_year'] 	= gmdate( 'Y-01-01' );
		$dates['last_day_this_year'] 	= gmdate( 'Y-12-31' );

		return $dates;

	}

	/**
	 * Get svg spinner
	 * 
	 * @since 1.0
	 * @return string
	 */
	private function get_spinner(){

		return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M304 48c0-26.5-21.5-48-48-48s-48 21.5-48 48s21.5 48 48 48s48-21.5 48-48zm0 416c0-26.5-21.5-48-48-48s-48 21.5-48 48s21.5 48 48 48s48-21.5 48-48zM48 304c26.5 0 48-21.5 48-48s-21.5-48-48-48s-48 21.5-48 48s21.5 48 48 48zm464-48c0-26.5-21.5-48-48-48s-48 21.5-48 48s21.5 48 48 48s48-21.5 48-48zM142.9 437c18.7-18.7 18.7-49.1 0-67.9s-49.1-18.7-67.9 0s-18.7 49.1 0 67.9s49.1 18.7 67.9 0zm0-294.2c18.7-18.7 18.7-49.1 0-67.9S93.7 56.2 75 75s-18.7 49.1 0 67.9s49.1 18.7 67.9 0zM369.1 437c18.7 18.7 49.1 18.7 67.9 0s18.7-49.1 0-67.9s-49.1-18.7-67.9 0s-18.7 49.1 0 67.9z"/></svg>';

	}

	/**
	 * Get svg spinner
	 * 
	 * @since 1.0
	 * @return string
	 */
	private function get_deactivate_content(){

		$html ='';
		$html .='<div id="deactivate-list-header" class="deactivate-list-header">';
			$html .='<h2>' . esc_html__( 'Deactivate Profitblue', 'profitblue-financial-reporting-for-woocommerce' )  . '</h2>';
			$html .='<p>' . esc_html__( 'You are about to deactivate Profitblue. Do you want to delete all the Profitblue data or keep it where it is?', 'profitblue-financial-reporting-for-woocommerce' )  . '</p>';
		$html .='</div>';
		$html .='<div id="deactivate-list" class="deactivate-list">';
			$html .='<div class="shipping-list-item">';
				$html .='<div class="shipping-list-item-left">';
					$html .='<div class="shipping-list-item-radio active" data-value="keep"></div>';
				$html .='</div>';
				$html .='<div class="shipping-list-item-right">' . esc_html__( 'Keep all Profitblue tables and data', 'profitblue-financial-reporting-for-woocommerce' )  . '</div>';
			$html .='</div>';
			$html .='<div class="shipping-list-item">';
				$html .='<div class="shipping-list-item-left">';
					$html .='<div class="shipping-list-item-radio" data-value="remove"></div>';
				$html .='</div>';
				$html .='<div class="shipping-list-item-right">' . esc_html__( 'Delete all Profitblue tables and data', 'profitblue-financial-reporting-for-woocommerce' )  . '</div>';
			$html .='</div>';
		$html .='</div>';
		$html .='<div id="deactivate-list-footer" class="deactivate-list-footer">';
			$html .='<a href="#" class="button button-primary" id="run-deactivation">' . esc_html__( 'Deactivate', 'profitblue-financial-reporting-for-woocommerce' )  . '</a>';
			$html .='<a href="#" class="button" id="cancel-deactivation">' . esc_html__( 'Cancel', 'profitblue-financial-reporting-for-woocommerce' )  . '</a>';
		$html .='</div>';

		return $html;

	}

	
	/**
	 * Save product data, when product is created
	 * 
	 * @since 1.0
	 */
	public function new_product( $product_id, $product ){

		$data = array();

		if ( !empty( $product_id ) ) {
			$data['product_id'] = $product_id;
		}
		if ( !empty( $product->get_name() ) ) {
			$data['name'] = $product->get_name();
		}
		if ( !empty( $product->get_type() ) ) {
			$data['type'] = $product->get_type();
		}
		if ( !empty( $product->get_stock_status() ) ) {
			$data['stock_status'] = $product->get_stock_status();
		}
		if ( !empty( $product->get_stock_quantity() ) ) {
			$data['stock_quantity'] = $product->get_stock_quantity();
		}
		if ( !empty( $product->get_sku() ) ) {
			$data['sku'] = $product->get_sku();
		}
		if ( !empty( $product->get_image( 'thumbnail' ) ) ) {
			$data['image'] = $product->get_image( 'thumbnail' );
		}
		if ( !empty( $product->get_price() ) ) {
			$data['price'] = $product->get_price();
		}

		if ( !empty( $data ) ) {
			global $wpdb;
			$table_name = $wpdb->prefix . 'profitblue_products';
			$result = $wpdb->get_results( 
				$wpdb->prepare( 
					"SELECT * FROM %i WHERE product_id=%d",
					array(
						$table_name,
						$product_id
					) 
				) 
			);
			if ( empty( $result ) ) {
				$wpdb->insert( $wpdb->prefix . 'profitblue_products', $data );
				$ProductsController = new ProductsController();
				$this->update_cogs_data( $product_id, $data['name'], $ProductsController );
				
			} else {
				$wpdb->update( $wpdb->prefix . 'profitblue_products', $data, array( 'product_id' => $product_id ) );
				$ProductsController = new ProductsController();
				$cogs = $ProductsController->get_product_cogs_by_id( $product_id );
				if ( empty( $cogs ) ) {
					$this->update_cogs_data( $product_id, $data['name'],  $ProductsController );
				}
			}
		}

	}

	/**
	 * Save product data, when product is created
	 * 
	 * @since 1.0
	 */
	public function update_product( $product_id, $product ){

		if ( 'variation' == $product->get_type() || 'simple' == $product->get_type() ) {

			$data = array();

			if ( !empty( $product_id ) ) {
				$data['product_id'] = $product_id;
			}
			if ( !empty( $product->get_name() ) ) {
				$data['name'] = $product->get_name();
			}
			if ( !empty( $product->get_type() ) ) {
				$data['type'] = $product->get_type();
			}
			if ( !empty( $product->get_stock_status() ) ) {
				$data['stock_status'] = $product->get_stock_status();
			}
			if ( !empty( $product->get_stock_quantity() ) ) {
				$data['stock_quantity'] = $product->get_stock_quantity();
			}
			if ( !empty( $product->get_sku() ) ) {
				$data['sku'] = $product->get_sku();
			}
			if ( !empty( $product->get_image( 'thumbnail' ) ) ) {
				$data['image'] = $product->get_image( 'thumbnail' );
			}
			if ( !empty( $product->get_price() ) ) {
				$data['price'] = $product->get_price();
			}

			if ( !empty( $data ) ) {
				global $wpdb;
				$table_name = $wpdb->prefix . 'profitblue_products';
				$result = $wpdb->get_results(
					$wpdb->prepare( 
						"SELECT * FROM %i WHERE product_id=%d",
						array( 
							$table_name,
							$product_id
						)
					)
				);
				if ( empty( $result ) ) {
					$wpdb->insert( $wpdb->prefix . 'profitblue_products', $data );
				} else {
					$wpdb->update( $wpdb->prefix . 'profitblue_products', $data, array( 'product_id' => $product_id ) );
				}
			}

			$ProductsController = new ProductsController();
			$cogs = $ProductsController->get_product_cogs_by_id( $product_id );
			if ( empty( $cogs ) ) {
				$this->update_cogs_data( $product_id, $data['name'], $ProductsController );
			}

		}

	}

	/**
	 * Save product data, when product is created
	 * 
	 * @since 1.0
	 */
	public function is_profitblue_page(){

		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( !empty( $_GET['page'] ) ) {
			$pages = array( 'profitblue-financial-reporting-for-woocommerce', 'products', 'orders', 'profit-and-loss', 'data-settings' );
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$page = isset( $_GET['page'] ) ? esc_html( wp_unslash( sanitize_text_field( $_GET['page'] ) ) ) : '';
			if ( in_array( $page, $pages ) ) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}

	}

	/**
	 * Update cogs data
	 *
	 * @param  int $post_ID
	 * @return void
	 * 
	 * @since    1.0
	 */
	function update_cogs_data( $product_id, $product_name, $ProductsController ) {

		global $wpdb;

		$periods = AjaxCreateCogsProductsData::get_periods();
		
		$cogs_data = array();
		$ProductsController->set_product_id( $product_id );
		$product = $ProductsController->get_product();										
		if ( !empty( $product ) ) {
			$cogs_data['sku'] = $product->sku;
		} else {
			$cogs_data['sku'] = '';
		}
		$cogs_data['product_id'] = $product_id;
		$cogs_data['product_name'] = $product_name;
		$cogs_data['cogs'] = 0;


		foreach( $periods as $period ) {

			$cogs_data['period'] = $period->ID;
			if ( 'whole-period' == $period->type ) {
				$cogs_data['year'] = 'whole-period';
			} else {
				$cogs_data['year'] = $period->year;
			}
			
			$wpdb->insert( $wpdb->prefix . 'profitblue_cogs', $cogs_data );

		}					
		update_post_meta( $product_id, 'cogs_imported', 'yes' );
		
		return;

	}

	/**
	 * Update cogs data
	 *
	 * @param  int $post_ID
	 * @return void
	 * 
	 * @since    1.0
	 */
	function create_missing_orders() {

		if ( false === $this->is_profitblue_page() ) {
			return;
		}

		$orders_batch = get_option( 'profitblue_notsaved_orders' );
		
		if ( empty( $orders_batch ) ) {
			return;
		}		

		?>
		<div id="missingOrders"><h2 class="are-you-sure"><?php echo esc_html__( 'Creating ProfitBlue missing orders', 'profitblue-financial-reporting-for-woocommerce' ); ?></h2><p class="are-you-sure"><?php echo esc_html__( 'Creating missing database tables and necessary data. This operation may take some time, please do not close the window until the data update is complete.', 'profitblue-financial-reporting-for-woocommerce' ); ?></p></div>			
		<?php

	}

	/**
	 * Check data
	 *
	 * @return void
	 * 
	 * @since    1.0
	 */
	function check_data() {

		if ( false !== $this->is_profitblue_page() ) {
			//$check = get_option( 'profitblue_free_check' );
			$current_month = gmdate( 'Y-m' );
			if ( empty( $check ) || ( !empty( $check ) && ( $current_month != $check ) ) ) {

				global $wpdb;
				$ordersController = new OrdersController();
				$orders = $wpdb->get_results( 
					$wpdb->prepare(
						"SELECT order_id FROM %i WHERE order_date <=%s",
						array(
							$wpdb->prefix . 'profitblue_orders',
							strtotime( $current_month . '-01' . ' 00:00:00' )
						) 
					)
				);
				if ( !empty( $orders ) ) {
					foreach( $orders as $item ) {
						$ordersController->delete_order( $item->order_id );
					}
				}

				update_option( 'profitblue_free_check', $current_month );
				
			}
			
		}

	}	

}