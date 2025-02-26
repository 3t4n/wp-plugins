<?php

if ( !defined( 'ABSPATH' ) ) {
    exit;
    // Exit if accessed directly
}
/**
 * Start: TradeIn Payment Methods
 **/
add_action( 'plugins_loaded', 'wcpti_init_gateway_class' );
function wcpti_init_gateway_class() {
    class WCPTI_generic_gateway extends WC_Payment_Gateway {
        public $title;

        public $description;

        public $instructions;

        function generalSetup() {
            // Load the settings.
            $this->init_form_fields();
            $this->init_settings();
            // Define user set variables.
            $this->title = $this->get_option( 'title' );
            $this->description = $this->get_option( 'description' );
            $this->instructions = $this->get_option( 'instructions' );
        }

        public function process_payment( $order_id ) {
            global $woocommerce;
            $order = wc_get_order( $order_id );
            $orderObj = new WC_Order($order_id);
            if ( !isLocalPickup( $orderObj ) ) {
                if ( get_option( 'wcpti_settings_vpfi_use_easypost' ) != 'no' ) {
                    WCPTI_EasyPost::createLabel( array(
                        'orderObj' => $orderObj,
                        'order_id' => $order_id,
                    ) );
                }
            }
            $order->update_status( 'on-hold', __( '"Order Created" email sent. Gyta Automatic Status Handling:', 'woothemes' ) );
            //$order->update_status('on-hold'); // the line above seems to make a memo in the order that we don't need or want.
            $woocommerce->cart->empty_cart();
            // Return thankyou redirect
            return array(
                'result'   => 'success',
                'redirect' => $this->get_return_url( $order ),
            );
        }

        public function outputPaymentInputFields( $params = array() ) {
            $fields = $params['fields'];
            ?>

				<fieldset id="<?php 
            echo esc_attr( $this->id );
            ?>-wcpti-payment-form" class=' wc-payment-form'> <!-- wc-echeck-form -->
					<?php 
            do_action( 'woocommerce_wcpti_' . $this->id . '_form_start', $this->id );
            ?>
					<?php 
            if ( $this->description ) {
                echo wpautop( wp_kses_post( $this->description ) );
            }
            foreach ( $fields as $field ) {
                echo $field;
                // phpcs:ignore WordPress.XSS.EscapeOutput.OutputNotEscaped
            }
            ?>
					<?php 
            do_action( 'woocommerce_wcpti_' . $this->id . '_form_end', $this->id );
            ?>
					<div class="clear"></div>
				</fieldset>
			<?php 
        }

    }

    class WCPTI_PayPal extends WCPTI_generic_gateway {
        function __construct() {
            $this->id = 'wcpti_paypal';
            $this->icon = apply_filters( 'woocommerce_paypal_icon', '' );
            $this->has_fields = true;
            $this->method_title = _x( 'PayPal TradeIn Payments', 'PayPal payment method', 'woocommerce' );
            $this->method_description = __( 'Pay via PayPal after the order is received from the customer.', 'woocommerce' );
            $this->generalSetup();
            // run method in the parent class
            // Actions.
            add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array($this, 'process_admin_options') );
            // add_action( 'woocommerce_thankyou_cheque', array( $this, 'thankyou_page' ) );
            // Customer Emails.
            // add_action( 'woocommerce_email_before_order_table', array( $this, 'email_instructions' ), 10, 3 );
        }

        public function init_form_fields() {
            $this->form_fields = array(
                'enabled'     => array(
                    'title'       => 'Enable/Disable',
                    'label'       => 'Enable ' . $this->method_title,
                    'type'        => 'checkbox',
                    'description' => '',
                    'default'     => 'yes',
                ),
                'title'       => array(
                    'title'       => 'Title',
                    'type'        => 'text',
                    'description' => 'This controls the title which the user sees during checkout.',
                    'default'     => 'PayPal',
                    'desc_tip'    => true,
                ),
                'description' => array(
                    'title'       => 'Description',
                    'type'        => 'textarea',
                    'description' => 'This controls the description which the user sees during checkout.',
                    'default'     => 'Get Paid via PayPal after we receive your package.',
                ),
            );
        }

        public function payment_fields() {
            $fields = array();
            $default_fields = array(
                'paypal-email-address' => '<p class="form-row form-row-first">
					<label for="' . esc_attr( $this->id ) . '-paypal-email-address">' . esc_html__( 'PayPal Email Address', 'woocommerce' ) . '&nbsp;<span class="required">*</span></label>
					<input id="' . esc_attr( $this->id ) . '-paypal-email-address" class="input-text wcpti-paypal-form-paypal-email-address" type="text" autocomplete="off"  name="' . esc_attr( $this->id ) . '-paypal-email-address" />
				</p>',
            );
            $fields = wp_parse_args( $fields, apply_filters( 'woocommerce_wcpti_paypal_form_fields', $default_fields, $this->id ) );
            $this->outputPaymentInputFields( array(
                'fields' => $fields,
            ) );
        }

        public function process_payment( $order_id ) {
            $order = wc_get_order( $order_id );
            $order->update_meta_data( '_wcpti_paypal_address', sanitize_text_field( $_POST[$this->id . '-paypal-email-address'] ) );
            $order->save();
            return parent::process_payment( $order_id );
        }

        public function validate_fields() {
            if ( empty( sanitize_text_field( $_POST[$this->id . '-paypal-email-address'] ) ) ) {
                wc_add_notice( '<b>PayPal Email Address</b> is required to be paid via PayPal', 'error' );
                return false;
            }
            return true;
        }

    }

    class WCPTI_Check extends WCPTI_generic_gateway {
        function __construct() {
            $this->id = 'wcpti_check';
            $this->icon = apply_filters( 'woocommerce_cheque_icon', '' );
            $this->has_fields = false;
            $this->method_title = _x( 'Check TradeIn Payments', 'Check payment method', 'woocommerce' );
            $this->method_description = __( 'Mail a check after the order is received.', 'woocommerce' );
            $this->generalSetup();
            // run method in the parent class
            // Actions.
            add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array($this, 'process_admin_options') );
            // add_action( 'woocommerce_thankyou_cheque', array( $this, 'thankyou_page' ) );
            // Customer Emails.
            // add_action( 'woocommerce_email_before_order_table', array( $this, 'email_instructions' ), 10, 3 );
        }

        public function init_form_fields() {
            $this->form_fields = array(
                'enabled'     => array(
                    'title'       => 'Enable/Disable',
                    'label'       => 'Enable ' . $this->method_title,
                    'type'        => 'checkbox',
                    'description' => '',
                    'default'     => 'yes',
                ),
                'title'       => array(
                    'title'       => 'Title',
                    'type'        => 'text',
                    'description' => 'This controls the title which the user sees during checkout.',
                    'default'     => 'Check',
                    'desc_tip'    => true,
                ),
                'description' => array(
                    'title'       => 'Description',
                    'type'        => 'textarea',
                    'description' => 'This controls the description which the user sees during checkout.',
                    'default'     => 'Receive a printed check after we receive your package.',
                ),
            );
        }

    }

    class WCPTI_AmazonGiftCard extends WCPTI_generic_gateway {
        function __construct() {
            $this->id = 'wcpti_amazon_gift_card';
            $this->icon = apply_filters( 'woocommerce_cheque_icon', '' );
            // woocommerce_bacs_icon
            $this->has_fields = false;
            $this->method_title = _x( 'Amazon Gift Card TradeIn Payment', 'Amazon Gift Card payment method', 'woocommerce' );
            $this->method_description = __( 'Send payment via Amazon Gift Card after the order is received.', 'woocommerce' );
            $this->generalSetup();
            // run method in the parent class
            // Actions.
            add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array($this, 'process_admin_options') );
            // add_action( 'woocommerce_thankyou_cheque', array( $this, 'thankyou_page' ) );
            // Customer Emails.
            // add_action( 'woocommerce_email_before_order_table', array( $this, 'email_instructions' ), 10, 3 );
        }

        public function init_form_fields() {
            $this->form_fields = array(
                'enabled'     => array(
                    'title'       => 'Enable/Disable',
                    'label'       => 'Enable ' . $this->method_title,
                    'type'        => 'checkbox',
                    'description' => '',
                    'default'     => 'no',
                ),
                'title'       => array(
                    'title'       => 'Title',
                    'type'        => 'text',
                    'description' => 'This controls the title which the user sees during checkout.',
                    'default'     => 'Amazon Gift Card',
                    'desc_tip'    => true,
                ),
                'description' => array(
                    'title'       => 'Description',
                    'type'        => 'textarea',
                    'description' => 'This controls the description which the user sees during checkout.',
                    'default'     => 'Get Paid via an Amazon Gift Card after we receive your package.',
                ),
            );
        }

        public function payment_fields() {
            $fields = array();
            $default_fields = array(
                'amazon-gift-card-address' => '<p class="form-row form-row-first">
					<label for="' . esc_attr( $this->id ) . '-amazon-gift-card-address">' . esc_html__( 'Amazon Gift Card email address', 'woocommerce' ) . '&nbsp;<span class="required">*</span></label>
					<input id="' . esc_attr( $this->id ) . '-amazon-gift-card-address" class="input-text wcpti-form-amazon-gift-card-address" type="text" autocomplete="off"  name="' . esc_attr( $this->id ) . '-amazon-gift-card-address" />
				</p>',
            );
            $fields = wp_parse_args( $fields, apply_filters( 'woocommerce_wcpti_amazon_gift_card_form_fields', $default_fields, $this->id ) );
            $this->outputPaymentInputFields( array(
                'fields' => $fields,
            ) );
        }

        public function process_payment( $order_id ) {
            $order = wc_get_order( $order_id );
            $order->update_meta_data( '_wcpti_amazon-gift-card-address', sanitize_text_field( $_POST[$this->id . '-amazon-gift-card-address'] ) );
            $order->save();
            return parent::process_payment( $order_id );
        }

        public function validate_fields() {
            if ( empty( sanitize_text_field( $_POST[$this->id . '-amazon-gift-card-address'] ) ) ) {
                wc_add_notice( '<b>Email address</b> is required to be paid via Amazon Gift Card', 'error' );
                return false;
            }
            return true;
        }

    }

}

function wcpti_add_gateways(  $methods  ) {
    $methods[] = 'WCPTI_Check';
    $methods[] = 'WCPTI_PayPal';
    $methods[] = 'WCPTI_AmazonGiftCard';
    return $methods;
}

add_filter( 'woocommerce_payment_gateways', 'wcpti_add_gateways' );
/**
 * End: TradeIn Payment Methods
 **/