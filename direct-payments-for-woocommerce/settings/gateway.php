<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 
// Add WooCommerce Payment Gateway
function digages_add_direct_payment_gateway($methods) {
    $methods[] = 'Digages_Gateway_Direct_Pay';
    return $methods;
}
 
add_filter('woocommerce_payment_gateways', 'digages_add_direct_payment_gateway');

// Init WooCommerce payment gateway
function digages_direct_payments_gateway_init() {
    if (!class_exists('WC_Payment_Gateway')) return;

    class Digages_Gateway_Direct_Pay extends WC_Payment_Gateway {

        public function __construct() {
            
            $this->id = 'digages_direct_payments';
            $this->method_title = 'Direct Payments for Woocommerce';
            $this->method_description = 'Pay instantly with bank transfers, mobile money, crypto and peer-to-peer apps—zero transaction fees, just easy payments.';

            // Initialize form fields and settings
            $this->init_form_fields();
            $this->init_settings();

            $this->title = $this->get_option('title');
            $this->description = $this->get_option('description');

            // Save settings
            // Add the action to process options 

            add_action('woocommerce_update_options_payment_gateways_' . $this->id, array($this, 'process_admin_options'));
        }

        // Define the settings form fields
        public function init_form_fields() { 
     
            $this->form_fields = array(
                'enabled' => array(
                    'title' => 'Enable/Disable',
                    'type' => 'checkbox',
                    'label' => 'Enable Direct Payments for Woocommerce',
                    'default' => 'no'
                ),
                'title' => array(
                    'title' => 'Title',
                    'type' => 'text',
                    'description' => 'This controls the title for the payment method that the customer sees during checkout.',
                    'default' => 'Direct Payments for Woocommerce',
                    'desc_tip' => true
                ),
                'description' => array(
                    'title' => 'Description',
                    'type' => 'textarea',
                    'description' => 'Payment method description that the customer will see during checkout.',
                    'default' => 'Pay instantly with bank transfers, mobile money, and peer-to-peer apps.',
                    'desc_tip' => true
                ),
                    'enable_bank_transfers' => array(
                        'title' => 'Payment Methods',
                        'type' => 'checkbox',
                        'label' => 'Enable Bank Transfers',
                        'default' => 'yes',
                        'description' => 'Accept payments to your bank accounts directly. Configure <a href="' . esc_url(
                            add_query_arg(
                                ['page' => 'direct-payments-bank-transfer', 
                                '_wpnonce' => wp_create_nonce('digages_direct_payments_nonce')
                                ], 
                                admin_url('admin.php')
                                )
                                ) . '/"  >Bank Transfer</a>.',
                        'class' => 'tumaz-payment-method-field payment-method-checkbox'
                    ),
                    'enable_mobile_money' => array( 
                        'type' => 'checkbox',
                        'label' => 'Enable Mobile Money',
                        'default' => 'no',
                        'description' => 'Accept payments through mobile money platforms. Configure <a href="' . esc_url(
                            add_query_arg(
                                ['page' => 'direct-payments-mobile-money', 
                                '_wpnonce' => wp_create_nonce('digages_direct_payments_nonce')
                                ], 
                                admin_url('admin.php')
                                )
                                ) . '/"  >Mobile Money</a>.',
                        'class' => 'tumaz-payment-method-field payment-method-checkbox'
                    ),
                    'enable_crypto_money' => array( 
                        'type' => 'checkbox',
                        'label' => 'Enable Crypto payments',
                        'default' => 'no',
                        'description' => 'Accept payments via Cryptocurrency. Configure <a href="' . esc_url(
                            add_query_arg(
                                ['page' => 'direct-payments-cryptocurrency', 
                                '_wpnonce' => wp_create_nonce('digages_direct_payments_nonce')
                                ], 
                                admin_url('admin.php')
                                )
                                ) . '/"  >Crypto</a>.',
                        'class' => 'tumaz-payment-method-field payment-method-checkbox'
                    ),
                    'enable_p2p_payments' => array(
                        'type' => 'checkbox',
                        'label' => 'Enable Peer-to-Peer Payments',
                        'default' => 'no',
                        'description' => 'Accept payments via peer-to-peer apps like Venmo, Zelle, GCash e.tc.  Configure <a href="' . esc_url(
                            add_query_arg(
                                ['page' => 'direct-payments-p2p', 
                                '_wpnonce' => wp_create_nonce('digages_direct_payments_nonce')
                                ], 
                                admin_url('admin.php')
                                )
                                ) . '/"  >Peer-to-Peer</a>.<br/><div class="container-fluid text-start digages_settings_notice_topspace upgrbgtum digages_settings_notice">
                    <div class="rowt rowt-colts-1 rowt-colts-sm-1 rowt-colts-md-1">
                    <div class="colt upgrbgtumtxt">Only 1 payment method is allowed in the Free version. Upgrade to Pro for just $39 to unlock all methods and more features.
                    </div>
                    <div class="colt"><a href="https://digages.com/direct-payments-for-woocommerce/" target="_blank"><button type="button" class="trddbtn">Upgrade to Pro</button></a></div> 
                    </div>
                    </div>',
                        'class' => 'tumaz-payment-method-field payment-method-checkbox'
                    ), 
                'enable_email_notifications' => array(
                    'title' => 'Email Notifications',
                    'type' => 'checkbox',
                    'label' => 'Enable email notifications',
                    'description' => esc_html('Get alerts to ' . sanitize_email(get_option('admin_email')) . ' for every payment received.'),
                    'default' => 'yes',
                ),
                'enable_payment_confirmations' => array(
                        'type' => 'checkbox',
                        'label' => 'Enable payment confirmations via email',
                        'description' => '<a href="https://digages.com/direct-payments-for-woocommerce/" target="_blank">Upgrade to Pro</a> for just <b>$39</b> to enable email payment confirmation.',
                        'default' => 'no', 
                        'disabled' => true,
                    ),
                        'accent_color' => array(
                        'title' => 'Accent Color',
                        'type' => 'color',
                        'description' => '<a href="https://digages.com/direct-payments-for-woocommerce/" target="_blank">Upgrade to Pro</a> for just <b>$39</b> to change the accent colors of your payment popup.',
                        'default' => '#222222',
                        'class' => 'accent-color-readonly', // Custom class
                    ),

                'auto_cancel_pending' => array(
                    'title' => 'Auto-cancel pending payments',
                    'type' => 'text',
                    'placeholder' => 'N/A',
                    'description' => 'Enter the number of days after which pending payments should be auto-canceled.',
                    'default' => '0',
                ),
                
            ); 
            
        }

        public function process_admin_options() {   

                // Get the options for each payment method
                // phpcs:ignore WordPress.Security.NonceVerification.Missing -- Already verified above
                $enabled_bank_transfer = isset($_POST['woocommerce_digages_direct_payments_enable_bank_transfers']) ? 'yes' : 'no';
                // phpcs:ignore WordPress.Security.NonceVerification.Missing -- Already verified above
                $enabled_mobile_money = isset($_POST['woocommerce_digages_direct_payments_enable_mobile_money']) ? 'yes' : 'no';
                // phpcs:ignore WordPress.Security.NonceVerification.Missing -- Already verified above
                $enabled_p2p_payments = isset($_POST['woocommerce_digages_direct_payments_enable_p2p_payments']) ? 'yes' : 'no';
        
                // Check how many methods are enabled
                $selected_methods = array_filter([$enabled_bank_transfer, $enabled_mobile_money, $enabled_p2p_payments], function($method) {
                    return $method === 'yes';
                });
        
                // If more than one method is enabled, display an error message and stop saving
                if (count($selected_methods) > 1) {
                    add_action('admin_notices', function() { 
                    });

                    // Reload the options without saving them
                    $this->init_settings();
                    return false; // Prevent saving options 
            }
        
            // If validation passed, proceed to save the settings
            return parent::process_admin_options();

        }

                          

        function digages_auto_cancel_pending_payments() {
            $auto_cancel_days = get_option('auto_cancel_pending'); // retrieve the setting value
            if (empty($auto_cancel_days) || $auto_cancel_days == '0') {
                return; // do nothing if the setting is not set or set to 0
            }
        
            $auto_cancel_days = (int) $auto_cancel_days; // convert to integer
         
        }
        
        // Email with confirm and cancel options
        public function digages_send_payment_confirmation_email($order_id) {
            $order = wc_get_order($order_id);
            
            $user_email = $order->get_billing_email();
            $full_name = $order->get_billing_first_name() . ' ' . $order->get_billing_last_name();
            $admin_email = get_option('admin_email');
            $subject = 'Confirm or Cancel Direct Payment Order: #' . $order_id;
            $headers = array('Content-Type: text/html; charset=UTF-8');

            // Create action links for Confirm and Cancel
            $confirm_url = add_query_arg(
                array(
                    'action' => 'confirm_order',
                    'order_id' => $order_id,
                    'nonce' => wp_create_nonce('confirm_order_' . $order_id),
                ),
                site_url('/order-action')  // Custom endpoint
            );

            $cancel_url = add_query_arg(
                array(
                    'action' => 'cancel_order',
                    'order_id' => $order_id,
                    'nonce' => wp_create_nonce('cancel_order_' . $order_id),
                ),
                site_url('/order-action')  // Custom endpoint
            );
            
        }

        // Simple email notification
        public function send_simple_admin_notification($order_id) {
            $order = wc_get_order($order_id);
            
        }

        public function process_payment($order_id) {
            $order = wc_get_order($order_id);
            $order->update_status('pending', 'Awaiting direct payment');
            wc_reduce_stock_levels($order_id);

            // Check if email notifications are enabled
            $enable_email_notifications = $this->get_option('enable_email_notifications');
            $enable_payment_confirmations = $this->get_option('enable_payment_confirmations');

            if ($enable_email_notifications === 'yes') {
                $this->send_simple_admin_notification($order_id);
            }

            if ($enable_payment_confirmations === 'yes') {
                $this->digages_send_payment_confirmation_email($order_id);
            }

            return array(
                'result' => 'success',
                'redirect' => $this->get_return_url($order)
            );
        }
    }
}

add_action('plugins_loaded', 'digages_direct_payments_gateway_init');
        // schedule the function to run daily
        add_action('wp_scheduled_delete', 'digages_auto_cancel_pending_payments');
        
        // register the schedule
        register_activation_hook(__FILE__, 'digages_auto_cancel_pending_payments_schedule');
        function digages_auto_cancel_pending_payments_schedule() {
            if (!wp_next_scheduled('wp_scheduled_delete')) {
                wp_schedule_event(time(), 'daily', 'wp_scheduled_delete');
            }
        }
        

        
    // this function prevents users from choosing more than one payment method
    function digages_enqueue_payment_method_script() {
        // Only enqueue on the settings page
    // phpcs:ignore WordPress.Security.NonceVerification.Recommended
        if (isset($_GET['page']) && $_GET['page'] === 'wc-settings') {
            wp_enqueue_script(
                'digages-payment-method-handler',
                plugins_url('../assets/js/settings-payment-method-handler.js', __FILE__),
                array('jquery'),
                '1.0.0',
                true
            );
        }
    }
    add_action('admin_enqueue_scripts', 'digages_enqueue_payment_method_script');  

        ?>