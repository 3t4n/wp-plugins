<?php
  /**
   * Anka_Commerce_Woocommerce_Gateway_Anka_Pay class to handle ANKA Pay payments in WooCommerce.
   *
   * @package Anka_Commerce
   * @since 1.0.0
   */

  if ( ! defined( 'ABSPATH' ) ) {
    exit;
  }

  class Anka_Commerce_Woocommerce_Gateway_Anka_Pay extends WC_Payment_Gateway {
    /**
     * API Token for the ANKA Pay API
     * @var string
     */
    private $api_token;

    /**
     * Unique id for the gateway.
     * @var string
     *
     */
    public $id = 'ankapay';

    public function __construct() {
      include_once ANKA_COMMERCE_PLUGIN_DIR . 'includes/api/class-anka-pay-api.php';
      include_once ANKA_COMMERCE_PLUGIN_DIR . 'includes/webhook/class-anka-pay-webhook-handler.php';

      $this->icon = apply_filters( 'anka_commerce_ankapay_logo', esc_url( Anka_Commerce_Woocommerce::anka_commerce_woocommerce_get_icon_url() ) );
      $this->title = __( 'ANKA Pay', 'anka-commerce');
      $this->has_fields = false;
      $this->supports = array('products');

      $this->method_title = __( 'ANKA Pay', 'anka-commerce' );
      $this->method_description = __( 'Accept payments through ANKA Pay on your WooCommerce store using Credit Cards, Mobile Money, Nigerian Bank Transfer, and PayPal.', 'anka-commerce');

      // Load the settings.
      $this->init_form_fields();
      $this->init_settings();

      // Define user set variables.
      $this->api_token = sanitize_text_field( $this->get_option('api_token') );
      $this->description = sanitize_text_field( $this->get_option('description') );

      // Actions.
      add_action('woocommerce_update_options_payment_gateways_' . $this->id, array($this, 'process_admin_options'));
      add_action('rest_api_init', array($this, 'register_rest_api_route'));

      // SSL Check
      add_action('admin_notices', array($this, 'ssl_check'));
    }

    /**
     * Initialize Anka Commerce WooCommerce Gateway form fields.
     */
    public function init_form_fields() {
      $this->form_fields = array(
        'api_token' => array(
          'title'       => __( 'API Token', 'anka-commerce' ),
          'description' => sprintf(
            /* translators: %s: URL to ANKA Pay API settings */
            __('Find your API Token in your API and Webhook Settings <a href="%s" target="_blank">here</a>.', 'anka-commerce'),
            esc_url('https://www.anka.africa/account/en/pay_by_links/api_setting')
          ),
          'type'        => 'password',
        ),
        'description' => array(
          'title'       => __( 'Description', 'anka-commerce' ),
          'description' => __( 'This controls the description which the user sees during checkout.', 'anka-commerce' ),
          'type'        => 'text',
          'default'     => __( 'Pay using Credit Card, Mobile Money, Nigerian Bank Transfer or PayPal.', 'anka-commerce'),
          'desc_tip'    => true,
        ),
        'direct_checkout' => array(
          'title'       => __( 'Enable Direct Checkout', 'anka-commerce' ),
          'description' => __( 'Skip WordPress checkout and go directly to ANKA Pay checkout.', 'anka-commerce' ),
          'type'        => 'checkbox',
          'default'     => 'no',
        ),
      );
    }

    /**
     * Process the payment and enable the webhook from the ANKA Pay API.
     *
     * @param int $order_id
     * @return array
     */
    public function process_admin_options() {
      $saved = parent::process_admin_options();

      $this->api_token = sanitize_text_field( $this->get_option( 'api_token' ) );
      $this->enable_webhook();

      return $saved;
    }

    /**
     * Enable the webhook from the ANKA Pay API.
     */
    public function enable_webhook() {
      if ( empty( $this->api_token ) ) {
        error_log( 'ANKA Pay API token is missing.', 0 );
        return;
      }

      $ankapay_api = new Anka_Pay_API( $this->api_token );
      $ankapay_api->enable_webhook();
    }

    /**
     * Process the payment and create the payment link with the ANKA Pay API.
     *
     * @param int $order_id
     * @return array
     */
    public function process_payment( $order_id ) {
      $response = Anka_Commerce_Woocommerce::anka_commerce_woocommerce_create_payment_link($order_id);

      if ( $response['success'] == true && $response['redirect_url'] ) {
        return array(
          'result'   => 'success',
          'redirect' => esc_url_raw( $response['redirect_url'] )
        );
      } else {
        wc_add_notice( __( 'Payment error: Unable to create payment link with ANKA Pay.', 'anka-commerce' ), 'error' );

        $order = wc_get_order( $order_id );
        $order->update_status( 'failed', __( 'Payment error: Unable to create payment link with ANKA Pay.', 'anka-commerce' ) );

        if ( isset( $response['errors'] ) && ! empty( $response['errors'] ) ) {
          $order->add_order_note(
            sprintf(
              /* translators: %s: error message */
              __( 'ANKA Pay API Error: %s', 'anka-commerce' ),
              $response['errors']
            )
          );

          $order->save();
        }

        return array(
          'result'   => 'failure',
          'redirect' => ''
        );
      }
    }

    /**
     * Register the ANKA Pay webhook route to handle incoming webhooks to update order status.
     */
    public function register_rest_api_route() {
      register_rest_route('anka-pay/v1', '/webhook', array(
        'methods' => WP_REST_Server::CREATABLE,
        'callback' => array($this, 'handle_rest_webhook'),
        'permission_callback' => '__return_true'
      ));
    }

    /**
     * Handle the incoming webhook from the ANKA Pay API to update the order status.
     *
     * @param WP_REST_Request $request
     * @return WP_REST_Response
     */
    public function handle_rest_webhook(WP_REST_Request $request) {
      $ankapay_webhook = new Anka_Pay_Webhook_Handler();
      return $ankapay_webhook->handle_webhook($request);
    }

    /**
     * Display an error message if ANKA Pay is enabled but the checkout page is not secure.
     */
    public function ssl_check() {
      if ( 'yes' === $this->get_option('enabled') && ! wc_checkout_is_https() ) {
        echo '<div class="error"><p>' . sprintf(
          /* translators: 1: WooCommerce settings URL */
          esc_html__( 'ANKA Pay is enabled, but the checkout page is not forced to use HTTPS. Please ensure your checkout page is secure by forcing SSL on the checkout pages in the %s.', 'anka-commerce' ),
          '<a href="' . esc_url( admin_url( 'admin.php?page=wc-settings&tab=advanced' ) ) . '">' . esc_html__( 'WooCommerce settings', 'anka-commerce' ) . '</a>'
        ) . '</p></div>';
      }
    }
  }
?>
