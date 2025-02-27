<?php
/**
 * Contains the main plugin class.
 *
 */

defined( 'ABSPATH' ) || exit;

/**
 * The main plugin class.
 *
 *
 * @since      1.0.0-beta
 * @package    Invoicing
 * @subpackage Wallet
 */
class WPInv_Wallet {

    /**
     * @var int $db_version The current database version
     *
     * @since      1.0.0-beta
     */
    public $db_version = 1;

    /**
     * @var WPInv_Wallet_Payout The WPInv_Wallet_Payout class.
     *
     * @since      1.0.0-beta
     */
    public $payouts;

    /**
     * Class constructor
     *
     * Includes the required files and sets up hooks
     *
     * @since      1.0.0-beta
     */
    public function __construct() {

        // Then setup hooks.
        $this->setup_actions();

        // Maybe upgrade the database.
        $this->maybe_upgrade_db();

        // Init the payouts.
        $this->payouts = new WPInv_Wallet_Payout();

        /**
         * Fires after invoicing wallet loads
         * @since      1.0.0-beta
         */
        do_action( 'wpinv_wallet_loaded' );
    }

    /**
     * Sets up action and filter hooks
     *
     *
     * @since      1.0.0-beta
     */
    public function setup_actions() {

        // Show balances on user's list table.
        add_filter( 'manage_users_columns', array( $this, 'modify_users_table' ) );
        add_filter( 'manage_users_custom_column', array( $this, 'modify_users_table_row' ), 10, 3 );

        // Change user's balance.
        add_action( 'show_user_profile', array( $this, 'backend_edit_wallet_balance' ), 101 ); // editing your own profile
        add_action( 'edit_user_profile', array( $this, 'backend_edit_wallet_balance' ), 101 ); // editing another user
        add_action( 'personal_options_update', array( $this, 'backend_save_wallet_balance' ) );
        add_action( 'edit_user_profile_update', array( $this, 'backend_save_wallet_balance' ) );

        // Invoice settings.
        add_filter( 'wpinv_settings_general',                 array( $this, 'wallet_settings' ) );
        add_filter( 'wpinv_settings_sections_general',        array( $this, 'wallet_section' ) );

		// Invoice payments.
		add_action( 'getpaid_invoice_status_publish', array( $this, 'invoice_paid' ) );

        // Withdraw template footer.
        //add_action( 'wp_footer', array( $this, 'wp_footer') ); // Moved to widget

        // Register new menu pages.
        add_action( 'admin_menu', array( $this, 'add_menu_page' ) );

        // Register the transactions tab.
        add_filter( 'getpaid_user_content_tabs', array( $this, 'register_transactions_tab' ), 11 );

        /**
         * Fires after invoicing wallet sets up action and filter hooks
         * @since      1.0.0-beta
         */
        do_action( 'wpinv_wallet_setup_actions' );
    }

    /**
     * Adds new columns to the user's table
     *
     *
     * @since      1.0.0-beta
     */
    public function modify_users_table( $columns ) {

        $columns['wpinv_wallet'] = __( 'Wallet Balance', 'getpaid-wallet' );
        return $columns;

    }

    /**
     * Display custom columns
     *
     *
     * @since      1.0.0-beta
     */
    public function modify_users_table_row( $val, $column_name, $user_id ) {

        switch ( $column_name ) {
            case 'wpinv_wallet' :
                return wpinv_wallet_get_user_balance( $user_id );
            default:
        }
        return $val;

    }

    /**
     * Allow admins to edit user's balances on the backend
     *
     *
     * @since      1.0.0-beta
     */
    public function backend_edit_wallet_balance( WP_User $user ) {

        if ( current_user_can( 'manage_options' ) ) {
            $user_id = $user->ID;
            include WPINV_WALLET_PLUGIN_DIR . 'includes/views/admin-edit-balance.php';
        }

    }

    /**
     * Save updated user's balance
     *
     *
     * @since      1.0.0-beta
     */
    public function backend_save_wallet_balance( $user_id ) {

        if ( current_user_can( 'manage_options' ) ) {
            $balance     = empty( $_REQUEST['wallet_balance'] ) ? 0.00 : wpinv_sanitize_amount( $_REQUEST['wallet_balance'] );
            $old_balance = wpinv_wallet_get_user_balance( $user_id, false );

            // Maybe abort early.
            if ( $balance == $old_balance ) {
                return;
            }

            // Prepare transaction details.
            $current_user = wp_get_current_user();
            $args = array(
                'amount'   => $balance - $old_balance,
                'balance'  => $balance,
                'details'  => sanitize_text_field( sprintf(
                    __( 'Manually updated by %s', 'getpaid-wallet' ),
                    $current_user->display_name
                ))
            );

            wpinv_wallet_add_new_transaction( $user_id, $args );
        }

    }

    /**
     * Upgrades the db if need be
     *
     *
     * @since      1.0.0-beta
     */
    public function maybe_upgrade_db() {

        $installed_version = absint( get_option( 'wpinv_wallet_db_version', 0 ) );

        // If installed version is lower than current version...
        if ( $installed_version < $this->db_version ) {

            // Load the db upgrade script.
            require_once( WPINV_WALLET_PLUGIN_DIR . 'includes/class-wpinv-wallet-install.php' );

            // Upgrade the db.
            new WPInv_Wallet_Install( $installed_version );

            // Save the new db version.
            update_option( 'wpinv_wallet_db_version', $this->db_version );
		}

        $topup_form = get_option( 'wpinv_wallet_default_topup_form', 0 );

        if ( empty( $topup_form ) || 'publish' != get_post_status( $topup_form ) ) {

            $topup_form = wp_insert_post(
                array(
                    'post_type'   => 'wpi_payment_form',
                    'post_title'  => __( 'Wallet Topup', 'getpaid-wallet' ),
                    'post_status' => 'publish',
                    'meta_input'  => array(
                        'wpinv_form_elements' => include plugin_dir_path( __FILE__ ) . 'views/topup-form.php',
                        'wpinv_form_items'    => array(),
                    )
                )
            );

            update_option( 'wpinv_wallet_default_topup_form', $topup_form );
        }

    }

    /**
     * Wallet settings
     *
     *
     * @since      1.0.0-beta
     */
    public function wallet_settings( $settings = array() ) {

        $wallet_settings    = include WPINV_WALLET_PLUGIN_DIR . 'includes/views/settings.php';
        $settings['wallet'] = apply_filters( 'wpinv_wallet_settings', $wallet_settings );
        return $settings;

    }

    /**
     * Wallet section
     *
     *
     * @since      1.0.0-beta
     */
    public function wallet_section( $sections = array() ) {

        $sections['wallet'] = __( 'Wallet', 'getpaid-wallet' );
        return $sections;

    }

    /**
     * Maybe update a user's wallet after an invoice has been paid
     *
	 * @param WPInv_Invoice $invoice
     *
     * @since      1.0.0-beta
     */
    public function invoice_paid( $invoice ) {

		$topup_form = (int) get_option( 'wpinv_wallet_default_topup_form', 0 );
		if ( $invoice->get_payment_form() == $topup_form ) {

			$user_id     = $invoice->get_user_id();
            $amount      = $invoice->get_total();
			$balance     = wpinv_wallet_get_user_balance( $user_id, false, $invoice->get_currency() );

			$args = array(
                'amount'   => $amount,
                'balance'  => $balance + $amount,
                'type'     => 'topup',
                'currency' => $invoice->get_currency(),
                'details'  => sanitize_text_field(
					sprintf(
						__( 'Wallet topup via invoice #%s', 'getpaid-wallet' ),
						$invoice->get_number()
					)
				),
			);

			wpinv_wallet_add_new_transaction( $user_id, $args );

			$invoice->add_note( esc_html__( 'Account balance topup', 'getpaid-wallet' ), true );
		}

    }

    /**
     * Adds scripts to the wp footer
     *
     * @access      public
     * @since       1.0.0-beta
     * @return      void
     */
    public function wp_footer() {
        include plugin_dir_path( __FILE__ ) . 'views/footer-template.php';
    }

    /**
	 * Register admin page
	 *
	 * @access      public
	 * @since       1.0.0
	 * @return      void
	 */
	public function add_menu_page() {

		add_submenu_page(
			'wpinv',
			esc_html__( 'Wallet Transactions', 'getpaid-wallet' ),
			esc_html__( 'Wallet Transactions', 'getpaid-wallet' ),
			wpinv_get_capability(),
			'getpaid-wallet-transactions',
			array( $this, 'render_wallet_page' )
		);

    }

    /**
	 * Displays the wallet page
	 *
	 * @access      public
	 * @since       1.0.0
	 * @return      void
	 */
	public function render_wallet_page() {

		// Only admins can access this page.
		if ( ! wpinv_current_user_can_manage_invoicing() ) {
			return;
		}

		/**
		 * Runs before displaying the transactions page.
		 *
		 * @param array $this The admin instance
		 */
		do_action( 'wpinv_wallet_before_wallet_transactions_page', $this );

        $table = new WPInv_Wallet_Transactions_Table();
        $table->prepare_items();

        ?>
        <style>
            #wpinv-wallet-transactions-table #amount,
            #wpinv-wallet-transactions-table #currency,
            #wpinv-wallet-transactions-table #balance,
            #wpinv-wallet-transactions-table #date {
                width: 140px;
            }
        </style>
		<div class="wrap">
			<h1 class="wp-heading-inline"><?php echo esc_html( get_admin_page_title() ); ?></h1>
			<form id="wpinv-wallet-transactions-table" class="bsui" method="POST">
				<?php $table->display(); ?>
			</form>
		</div>
		<?php

        /**
		 * Runs after displaying the transactions page.
		 *
		 * @param array $this The admin instance
		 */
        do_action( 'wpinv_wallet_after_wallet_transactions_page', $this );

    }

    /**
     * Registers the transactions tab.
     *
     * @param array $tabs
     */
    public function register_transactions_tab( $tabs ) {
        $content      = "
            <!-- wp:shortcode -->
            [wpinv_wallet]
            <!-- /wp:shortcode -->

            <!-- wp:shortcode -->
            [wpinv_wallet_transactions]
            <!-- /wp:shortcode -->
        ";

        return array_merge(
            $tabs,
            array(
                'gp-transactions' => array(
                    'label'       => __( 'Transactions', 'getpaid-wallet' ),
                    'content'     => $content,
                    'icon'        => 'fas fa-chart-line',
                )
            )
        );
    }

}
