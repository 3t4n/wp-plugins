<?php
/**
 * Contains the wallet widget class.
 *
 */

defined( 'ABSPATH' ) || exit;

/**
 * The wallet widget class.
 *
 *
 * @since      1.0.0-beta
 * @package    Invoicing
 * @subpackage Wallet
 */
class WPInv_Wallet_Widget extends WP_Super_Duper {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {

		$options = array(
			'textdomain'     => 'getpaid-wallet',
			'block-icon'     => 'category',
			'block-category' => 'widgets',
			'block-keywords' => "['invoicing','wallet','wpinv']",
			'block-output'   => array( // the block visual output elements as an array
				array(
					'element' => 'h2',
					'title'   => __( 'Placeholder', 'getpaid-wallet' ),
					'content' => '[%title%]'
                ),
                array(
					'element' => 'p',
					'title'   => __( 'Placeholder', 'getpaid-wallet' ),
					'content' => __( 'The account balance will appear here', 'getpaid-wallet' )
				)
			),
			'class_name'     => 'WPInv_Wallet_Widget',
			'base_id'        => 'wpinv_wallet',
			'name'           => __( 'GetPaid > Wallet', 'getpaid-wallet' ),
			'widget_ops'     => array(
				'classname'   => 'getpaid-wallet bsui',
				'description' => esc_html__( "Displays the current user's account balance", 'getpaid-wallet' ),
			),
			'arguments'      => array(
				'title'  => array(
					'title'    => __('Title', 'getpaid-wallet'),
					'type'     => 'text',
					'default'  => '',
					'desc_tip' => true,
					'advanced' => false
                ),
                'before_balance'  => array(
					'title'    => __('Before Balance', 'getpaid-wallet'),
                    'type'     => 'text',
                    'desc'     => __( 'Text to display before the account balance.', 'getpaid-wallet' ),
					'default'  => esc_html__( 'Your account balance is:', 'getpaid-wallet' ),
					'desc_tip' => true,
					'advanced' => false
				),
				'topup_text'   => array(
					'title'    => __( 'Topup Text', 'getpaid-wallet' ),
                    'type'     => 'text',
					'default'  => esc_html__( 'Topup', 'getpaid-wallet' ),
					'desc_tip' => true,
					'advanced' => false
				),
				'withdraw_text'   => array(
					'title'       => __( 'Withdraw Text', 'getpaid-wallet' ),
                    'type'        => 'text',
					'default'     => esc_html__( 'Withdraw', 'getpaid-wallet' ),
					'desc'        => __( 'The text to use in case withdrawals have been enabled', 'getpaid-wallet' ),
					'desc_tip'    => true,
					'advanced'    => false
				),
				'show_user_name'  => array(
					'type'        => 'checkbox',
					'title'       => __( 'Show User Name', 'getpaid-wallet' ),
					'desc_tip'    => true,
					'default'     => false,
					'advanced'    => false
				),
			)
		);

		parent::__construct( $options );
	}


	/**
	 * This is the output function for the widget, shortcode and block (front end).
	 *
	 * @param array $args The arguments values.
	 * @param array $widget_args The widget arguments when used.
	 * @param string $content The shortcode content argument
	 *
	 * @return string
	 */
	public function output( $args = array(), $widget_args = array(), $content = '' ) {

		// Abort early if the user is not logged in.
		$user_id = get_current_user_id();
        if ( empty( $user_id ) ) {
            return;
        }

		// Options.
		$defaults = array(
			'title'          => __( 'Wallet', 'getpaid-wallet' ),
            'show_user_name' => false,
			'before_balance' => __( 'Your account balance is:', 'getpaid-wallet' ),
			'topup_text'     => __( 'Topup', 'getpaid-wallet' ),
			'withdraw_text'  => __( 'Withdraw', 'getpaid-wallet' ),
		);

		/**
		 * Parse incoming $args into an array and merge it with $defaults
		 */
		$args       = wp_parse_args( $args, $defaults );

        $output     = wpinv_wallet_get_user_balance( $user_id );
		$output     = "<strong class='wpinv-wallet-balance font-weight-bold'>$output</strong>";
		$topup_form = (int) get_option( 'wpinv_wallet_default_topup_form', 0 );
		$topup_text = sanitize_text_field( $args['topup_text'] );
		$buttons    = "<a class='wpinv-wallet-topup-link getpaid-payment-button btn btn-primary btn-sm' data-form='$topup_form' href='#'>$topup_text</a>";

		if ( 1 == (int) wpinv_get_option( 'wpinv_wallet_enable_withdrawals', 1 ) ) {
			// Withdraw template footer.
			add_action( 'wp_footer', array( $this, 'wp_footer') );

			$text   = sanitize_text_field( $args['withdraw_text'] );
			$buttons .= "<a href='#' class='wpinv-wallet-withdraw-link btn btn-outline-primary btn-sm ml-2' data-toggle='modal' data-target='#wpinv-wallet-footer-template'>$text</a></span>";
        }

		$output .= '<div class="wpinv-wallet-buttons mt-2">'.$buttons.'</div>';

        if ( ! empty( $args['before_balance'] ) ) {
            $prefix       = sanitize_text_field( $args['before_balance'] );
            $output       = "<span class='wpinv-wallet-before-balance'>$prefix</span> $output"; 
        }

        if ( $args['show_user_name'] ) {
            $current_user = wp_get_current_user();
            $name         = sanitize_text_field( $current_user->display_name );
            $prefix       = esc_html__( "Hello", 'getpaid-wallet' );
            $output       = "<span class='wpinv-wallet-username-before-balance'>$prefix $name,</span> $output"; 
        }

		return wp_kses_post( "<p>$output</p>" );

	}

	 /**
	 * Adds scripts to the wp footer
	 *
	 * @access      public
	 * @since       2.0.6
	 * @return      void
	 */
	public function wp_footer() {
		include plugin_dir_path( __FILE__ ) . 'views/footer-template.php';
	}
}
