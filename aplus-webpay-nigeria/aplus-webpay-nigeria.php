<?php
/*
	Plugin Name: A+ Interswitch Nigeria WebPAY
	Plugin URI: http://batisson-tech.com/
	Description: The A+ Interswitch WebPAY Plugin plugin facilitates processing of VISA, Mastercard and Verve cards through the Interswitch WebPAY portal.
	Version: 1.0.0
	License:    GPL-2.0+
*/

if ( ! defined( 'ABSPATH' ) )
	exit;
//plugins_loaded:-
//This hook is called once any activated plugins have been loaded.
//Is generally used for immediate filter setup, or plugin overrides
add_action('plugins_loaded', 'essl_wc_interswitch_webpay_init', 0);

function add_my_custom_page() 
{
    $page_content = getPaymentHelpPageContent();
    // Create post object
    $my_post = array(
      'post_title'    => wp_strip_all_tags( 'How to Pay with WebPAY©' ),
      'post_content'  => $page_content,
      'post_status'   => 'publish',
      'post_author'   => 1,
      'post_type'     => 'page',
    );

    // Insert the post into the database
    wp_insert_post( $my_post );
}

function getPaymentHelpPageContent()
{
    $site_url = get_site_url();
    $contactperson = "080111222333";
    $page_content = '
                        &nbsp;
<p style="text-align: center;"><strong><u>MAKING ONLINE PAYMENTS ON <span style="color: #ff0000;">' . $site_url . '</span></u></strong></p>
Issues paying online? Please contact us at <span style="color: #ff6600;"><u>' . $contactperson . '</u> </span>for assistance.
There are three major ATM card companies in Nigeria. They are:
<ul>
 	<li>Verve</li>
 	<li>Mastercard</li>
 	<li>Visa</li>
</ul>
Most of the ATM cards issued by Nigerian banks are usually from one of these three companies. Some of these cards include Interswitch <strong><em>Verve</em></strong>, Naira <strong><em>Mastercard</em></strong>, Naira <strong><em>Visa</em></strong> Card etc. To know which type of card you have, check the front and back of the card for any of the logos shown below:

VERVE CARD

<img class="alignnone size-full wp-image-48" src="' . plugins_url( 'assets/images/verve.png' , __FILE__ ) . '" alt="" width="70" height="42" />

MasterCard CARD

<img class="alignnone size-full wp-image-51" src="' . plugins_url( 'assets/images/mastercard.png' , __FILE__ ) . '" alt="" width="64" height="47" />

VISA CARD

<img class="alignnone size-full wp-image-49" src="' . plugins_url( 'assets/images/visa.png' , __FILE__ ) . '" alt="" width="100" height="37" />

There are 2 kinds of WebPAY Pages, kindly <strong>select</strong> the version you see:-

&nbsp;
<table style="border-collapse: collapse; width: 555px; height: 452px;" border="0" width="128" cellspacing="0" cellpadding="0"><colgroup> <col style="width: 48pt;" span="2" width="64" /> </colgroup>
<tbody>
<tr style="height: 14.4pt;">
<td class="xl63" style="height: 14.4pt; width: 48pt;" width="64" height="19"><strong>WEBPAY</strong></td>
<td class="xl63" style="border-left: none; width: 48pt;" width="64"><strong>NEW WEBPAY</strong></td>
</tr>
<tr style="height: 14.4pt;">
<td class="xl63" style="height: 14.4pt; border-top: none;" height="19"><img class="alignnone wp-image-38 size-full" src="' . plugins_url( 'assets/images/old_webpay.png' , __FILE__ ) . '" alt="" width="369" height="421" /></td>
<td class="xl63" style="border-top: none; border-left: none;"><img class="alignnone wp-image-33 size-full" src="' . plugins_url( 'assets/images/new_webpay_6.png' , __FILE__ ) . '" alt="" width="363" height="698" /></td>
</tr>
</tbody>
</table>
&nbsp;

<strong><u>How to Make a Payment on WebPAY</u></strong>

Step 1

When the <span style="color: #ff0000;"><strong>WebPAY</strong> </span>Payment page loads up, click “<em><span style="color: #ff0000;">Select your card type</span></em>” dropdown. Based on your card type (see introduction for description of various card types), select the correct option for you
<table style="border-collapse: collapse; width: 819px; height: 435px;" border="0" width="128" cellspacing="0" cellpadding="0"><colgroup><col style="width: 48pt;" span="2" width="64" /> </colgroup>
<tbody>
<tr style="height: 14.4pt;">
<td class="xl65" style="height: 14.4pt; width: 48pt;" width="64" height="19"><img class="alignnone wp-image-39 size-full" src="' . plugins_url( 'assets/images/old_webpay_1.png' , __FILE__ ) . '" alt="" width="460" height="424" /></td>
<td class="xl65" style="border-left: none; width: 48pt;" width="64"><img class="alignnone wp-image-40 " src="' . plugins_url( 'assets/images/old_webpay_2.png' , __FILE__ ) . '" alt="" width="454" height="417" /></td>
</tr>
</tbody>
</table>
&nbsp;

Step 3: When you have selected card type, fill out the form appropriately with the following information
<ul>
 	<li>Card Number (PAN)</li>
 	<li>Expiry Date (Month/Year)</li>
 	<li>CVV2</li>
 	<li>PIN</li>
</ul>
<img class="alignnone wp-image-50 size-full" src="' . plugins_url( 'assets/images/card_details.png' , __FILE__ ) . '" alt="" width="485" height="423" />

Please note you must use the <span style="color: #ff0000;"><strong>keypad</strong> </span>to enter PIN (by clicking the numbers)

<img class="alignnone wp-image-47 size-full" src="' . plugins_url( 'assets/images/old_webpay_details.png' , __FILE__ ) . '" alt="" width="624" height="530" />

&nbsp;

Step 4: Once done filling the form, click the “<span style="color: #ff0000;"><strong><em>Pay</em></strong></span>” button.

<img class="alignnone wp-image-41 size-full" src="' . plugins_url( 'assets/images/old_webpay_3.png' , __FILE__ ) . '" alt="" width="463" height="542" />

Once you click pay, your payment will start processing.

NB: If you are using a <img class="alignnone wp-image-49" src="' . plugins_url( 'assets/images/visa.png' , __FILE__ ) . '" alt="" width="65" height="24" /> card please see <strong>STEP 4b</strong> on how to proceed.

Step 4b: For <strong>VISA</strong> card holders, you will be redirected to the below page to enter your iPIN
<table style="border-collapse: collapse; width: 711px; height: 480px;" border="0" width="128" cellspacing="0" cellpadding="0"><colgroup><col style="width: 48pt;" span="2" width="64" /> </colgroup>
<tbody>
<tr style="height: 14.4pt;">
<td class="xl65" style="height: 14.4pt; width: 48pt;" width="64" height="19"><img class="alignnone wp-image-44 size-full" src="' . plugins_url( 'assets/images/old_webpay_6.png' , __FILE__ ) . '" alt="" width="294" height="341" /></td>
<td class="xl65" style="border-left: none; width: 48pt;" width="64"><img class="alignnone wp-image-43 " src="' . plugins_url( 'assets/images/old_webpay_5.png' , __FILE__ ) . '" alt="" width="615" height="791" /></td>
</tr>
</tbody>
</table>
&nbsp;

Step 4b: Fill out the OTP section with details of the pin code sent to your mobile phone.

<img class="alignnone wp-image-45 size-full" src="' . plugins_url( 'assets/images/old_webpay_7.png' , __FILE__ ) . '" alt="" width="434" height="512" />

Once done click on <strong><em>Next</em></strong>

<img class="alignnone wp-image-46 size-full" src="' . plugins_url( 'assets/images/old_webpay_8.png' , __FILE__ ) . '" alt="" width="350" height="450" />

Step 5: IF filled properly and your account is funded, you will be redirected to ' . $site_url . ' and receive successful transaction message.
1
&nbsp;

&nbsp;

<strong><u>How to Make a Payment on the New WebPAY</u></strong>

Step 1

When the <strong>New WebPAY</strong> Payment page loads up, enter your card directly in the <strong><em>Card Number</em></strong> box. Based on your card type (see introduction for description of various card types), your card brand logo will show up.
<table style="border-collapse: collapse; width: 1058px; height: 630px;" border="0" width="192" cellspacing="0" cellpadding="0"><colgroup><col style="width: 48pt;" span="3" width="64" /> </colgroup>
<tbody>
<tr style="height: 14.4pt;">
<td class="xl65" style="height: 14.4pt; width: 48pt;" width="64" height="19"><a href="' . plugins_url( 'assets/images/new_webpay_3.png' , __FILE__ ) . '"><img class="alignnone wp-image-55 size-full" src="' . plugins_url( 'assets/images/new_webpay_3.png' , __FILE__ ) . '" alt="" width="421" height="611" /></a></td>
<td class="xl65" style="border-left: none; width: 48pt;" width="64"><a href="' . plugins_url( 'assets/images/new_webpay_2.png' , __FILE__ ) . '"><img class="alignnone wp-image-54 size-full" src="' . plugins_url( 'assets/images/new_webpay_2.png' , __FILE__ ) . '" alt="" width="444" height="696" /></a></td>
<td class="xl65" style="border-left: none; width: 48pt;" width="64"><a href="' . plugins_url( 'assets/images/new_webpay_1.png' , __FILE__ ) . '"><img class="alignnone wp-image-53 size-full" src="' . plugins_url( 'assets/images/new_webpay_1.png' , __FILE__ ) . '" alt="" width="425" height="690" /></a></td>
</tr>
</tbody>
</table>
&nbsp;

Step 3: Next proceed to fill out the <strong><em>Expiry Date</em></strong> and <strong><em>CVV2 Number</em></strong>. Both can be found on your card.
<ul>
 	<li>Card Number (PAN)</li>
 	<li>Expiry Date (Month/Year)</li>
 	<li>CVV2</li>
</ul>
<img class="alignnone wp-image-50 size-full" src="' . plugins_url( 'assets/images/card_details.png' , __FILE__ ) . '" alt="" width="485" height="423" />

Please note you must use the keypad to enter PIN (by clicking the numbers)
<table style="border-collapse: collapse; width: 1056px; height: 499px;" border="0" width="192" cellspacing="0" cellpadding="0"><colgroup><col style="width: 48pt;" span="3" width="64" /> </colgroup>
<tbody>
<tr style="height: 14.4pt;">
<td class="xl65" style="height: 14.4pt; width: 48pt;" width="64" height="19"><img class="alignnone wp-image-55 size-full" src="' . plugins_url( 'assets/images/new_webpay_3.png' , __FILE__ ) . '" alt="" width="421" height="611" /></td>
<td class="xl65" style="border-left: none; width: 48pt;" width="64"><img class="alignnone wp-image-31 size-full" src="' . plugins_url( 'assets/images/new_webpay_4.png' , __FILE__ ) . '" alt="" width="421" height="611" /></td>
<td class="xl65" style="border-left: none; width: 48pt;" width="64"><img class="alignnone wp-image-32 size-full" src="' . plugins_url( 'assets/images/new_webpay_5.png' , __FILE__ ) . '" alt="" width="422" height="609" /></td>
</tr>
</tbody>
</table>
&nbsp;

Step 4: Proceed to enter your <strong><em><u>PIN</u></em></strong> number using the <em>numeric keypad</em>.
<table style="border-collapse: collapse; width: 727px; height: 682px;" border="0" width="128" cellspacing="0" cellpadding="0"><colgroup><col style="width: 48pt;" span="2" width="64" /> </colgroup>
<tbody>
<tr style="height: 14.4pt;">
<td class="xl65" style="height: 14.4pt; width: 48pt;" width="64" height="19"><img class="alignnone wp-image-34 size-full" src="' . plugins_url( 'assets/images/new_webpay_7.png' , __FILE__ ) . '" alt="" width="378" height="705" /></td>
<td class="xl65" style="border-left: none; width: 48pt;" width="64"><img class="alignnone wp-image-33 size-full" src="' . plugins_url( 'assets/images/new_webpay_6.png' , __FILE__ ) . '" alt="" width="363" height="698" /></td>
</tr>
</tbody>
</table>
&nbsp;

Once you click pay, your payment will start processing.

<img class="alignnone wp-image-35 size-full" src="' . plugins_url( 'assets/images/new_webpay_8.png' , __FILE__ ) . '" alt="" width="374" height="633" />

If you are a  or  customer, you will be asked to Authorize your transaction by entering <strong>OTP</strong> sent to your mobile via SMS, or <strong>hard token</strong> code. Enter your OTP or Hard token code number and click <strong><em>Continue</em></strong> to complete the transaction.

<img class="alignnone wp-image-36 size-full" src="' . plugins_url( 'assets/images/new_webpay_9.png' , __FILE__ ) . '" alt="" width="401" height="633" />

NB: If you are using a  <img class="alignnone wp-image-49" src="' . plugins_url( 'assets/images/visa.png' , __FILE__ ) . '" alt="" width="73" height="27" />CARD please see <strong>STEP 4b</strong> on how to proceed.

Step 4b: For  card holders, you will be redirected to the below page to authorize the transaction. Once done click on <strong><em>Next</em></strong>

<img class="alignnone wp-image-37 size-full" src="' . plugins_url( 'assets/images/new_webpay_10.png' , __FILE__ ) . '" alt="" width="290" height="460" />

Step 5: IF filled properly and your account is funded, you will be redirected to XXXXXXXX and receive successful transaction message.
                    ';
    
    return $page_content;
}

register_activation_hook(__FILE__, 'add_my_custom_page');

//use functions for everything
function essl_wc_interswitch_webpay_init() 
{
    if ( !class_exists( 'WC_Payment_Gateway' ) ) return;

    /**
     * Main Gateway class
     */
    class WC_Essl_Webpay_Gateway extends WC_Payment_Gateway 
    {
        public function __construct()
        {
            global $woocommerce;

            $this->id 				= 'essl_webpay_gateway';
            $this->icon 				= apply_filters('woocommerce_webpay_icon', plugins_url( 'assets/images/isw.png' , __FILE__ ) );
            $this->has_fields 			= false;
            $this->testurlnew 			= 'https://sandbox.interswitchng.com/collections/w/pay';
            $this->testurlold 			= 'https://sandbox.interswitchng.com/webpay/pay';
            $this->liveurlold 			= 'https://webpay.interswitchng.com/paydirect/pay';
            $this->liveurlnew 			= 'https://webpay.interswitchng.com/collections/w/pay';
            $this->redirect_url        	= WC()->api_request_url( 'WC_Essl_Webpay_Gateway' );
            $this->method_title     	= 'A+ Interswitch WebPAY©';
            $this->method_description  	= 'WebPAY© processes Verve, MasterCard and VISA Cards';


            // Load the Gateway Settings Form Fields.
            $this->init_form_fields();

            // Load the settings.
            $this->init_settings();

            // Define user set variables
            $this->title 				= $this->get_option( 'title' );
            $this->description 				= $this->get_option( 'description' );
            $this->product_id				= $this->get_option( 'product_id' );
            $this->pay_item_id				= $this->get_option( 'pay_item_id' );
            $this->mac_key				= $this->get_option( 'mac_key' );
            $this->testmode				= $this->get_option( 'testmode' );
            $this->oldwebpay				= $this->get_option( 'oldwebpay' );
            $this->newwebpay				= $this->get_option( 'newwebpay' );

            //Actions
            add_action('woocommerce_receipt_essl_webpay_gateway', array($this, 'receipt_page'));
            add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array( $this, 'process_admin_options' ) );

            // Payment listener/API hook
            add_action( 'woocommerce_api_wc_essl_webpay_gateway', array( $this, 'check_webpay_response' ) );

            //Display Transaction Reference on checkout
            add_action( 'before_woocommerce_pay', array( $this, 'display_transaction_id' ) );

            // Check if the gateway can be used
            if ( ! $this->is_valid_for_use() ) 
            {
                $this->enabled = false;
            }
        }

        /**
        * Check if the store currency is set
        **/
        public function is_valid_for_use()
        {
            if( ! in_array( get_woocommerce_currency(), array('NGN') ) )
            {
                $this->msg = 'Interswitch Webpay invalid currency format, change to Nigerian Naira &#8358; <a href="' . get_bloginfo('wpurl') . '/wp-admin/admin.php?page=wc_settings&tab=general">here</a>';
                return false;
            }
            
            return true;
        }

        /**
         * Admin Panel Options
         **/
        public function admin_options()
        {
            echo '<h3>WebPAY© by Interswitch</h3>';
            echo '<p>WebPAY© powered by Interswitch processes MasterCard, VISA and Verve cards.</p>';


            if ( $this->is_valid_for_use() )
            {
                echo '<table class="form-table">';
                $this->generate_settings_html();
                echo '</table>';
            }
            else
            {	 
            ?>
                <div class="inline error"><p><strong>Interswitch WebPAY© Payment Gateway Disabled</strong>: <?php echo $this->msg ?></p></div>
            <?php 
            }
        }


        /**
         * Initialise Gateway Settings Form Fields
        **/
        function init_form_fields()
        {
            $this->form_fields = 
                array(
                    'enabled'   => array
                                (
                                    'title' 		=> 'Enable/Disable',
                                    'type' 		=> 'checkbox',
                                    'label' 		=> 'Enable Webpay',
                                    'description' 	=> 'Enable or Disable the payment gateway.',
                                    'desc_tip'      	=> true,
                                    'default' 		=> 'yes'
                                ),
                    'testmode'   => array
                                (
                                    'title'       	=> 'Test Mode',
                                    'type'        	=> 'checkbox',
                                    'label'       	=> 'Enable Test Mode',
                                    'default'     	=> 'no',
                                    'description' 	=> 'Uncheck to migrate to Production enviroment.',
                                ),
                    'webpayv'   => array
                                (
                                    'title'       	=> 'Webpay Version',
                                    'type'        	=> 'select',
                                    'options'           => array
                                                                (
                                                                    'oldwebpay' => _('Old Webpay'),
                                                                    'newwebpay' => _('New Webpay')
                                                                ),
                                    'label'       	=> 'Select Webpay Version',
                                    'desc_tip'          => true,
                                    'description' 	=> 'Webpay Version.',
                                ),
                    'title'     => array
                                (
                                    'title' 		=> 'Title',
                                    'type' 		=> 'text',
                                    'description'       => 'Title displayed at checkout.',
                                    'desc_tip'          => false,
                                    'default' 		=> 'WebPAY© powered by Interswitch'
                                ),
                    'description' => array
                                (
                                    'title' 		=> 'Description',
                                    'type' 		=> 'textarea',
                                    'description'       => 'Description displayed at checkout.',
                                    'default' 		=> 'WebPAY© powered by Interswitch processes MasterCard, VISA and Verve cards.<br />For inforation on how to make payment, click <a href="www.google.com">here</a>.'
                                ),
                    'product_id'  => array
                                (
                                    'title' 		=> 'Product ID',
                                    'type' 		=> 'text',
                                    'description'       => 'Product ID issued by Interswitch.' ,
                                    'default' 		=> '',
                                    'desc_tip'          => false
                                ),
                    'pay_item_id' => array
                                (
                                    'title' 		=> 'Pay Item ID',
                                    'type' 		=> 'text',
                                    'description'       => 'Payment Item ID issued by Interswitch' ,
                                    'default' 		=> '',
                                    'desc_tip'          => false
                                ),
                    'mac_key'     => array
                                (
                                    'title' 		=> 'Mac Key',
                                    'type' 		=> 'text',
                                    'description'       => 'MAC Key issued by Interswitch (kindly avoid extra spaces or characters' ,
                                    'default' 		=> '',
                                    'desc_tip'          => false
                                )
                );
        }

        /**
         * Get Webpay Args for passing to Interswitch
        **/
        function get_webpay_args( $order ) 
        {
            global $woocommerce;

            $order_total	= $order->get_total();
            $order_total        = $order_total * 100;

            $product_id 	= $this->product_id;
            $pay_item_id 	= $this->pay_item_id;
            $product_id 	= $this->product_id;
            $mac_key            = $this->mac_key;

            $redirect_url 	= $this->redirect_url;

            $txn_ref            = uniqid();
            $txn_ref            = $txn_ref.'_'.$order->id;

            $customer_name	= $order->billing_first_name. ' ' . $order->billing_last_name;

            $hash 		= $txn_ref.$product_id.$pay_item_id.$order_total.$redirect_url.$mac_key;
            $hash 		= hash("sha512", $hash);

            // webpay Args
            $webpay_args = array(
                'product_id' 		=> $product_id,
                'amount' 		=> $order_total,
                'currency' 		=> 566,
                'site_redirect_url' 	=> $redirect_url,
                'txn_ref' 		=> $txn_ref,
                'hash' 			=> $hash,
                'pay_item_id' 		=> $pay_item_id,
                'cust_name'		=> $customer_name,
                'cust_name_desc'	=> 'Customer Name',
                'cust_id'		=> $txn_ref,
                'cust_id_desc'		=> 'Transaction Reference',
            );

            WC()->session->set( 'essl_wc_webpay_txn_id', $txn_ref );

            $webpay_args = apply_filters( 'woocommerce_webpay_args', $webpay_args );

            return $webpay_args;
        }

        /**
             * Generate the Webpay Payment button link
        **/
        function generate_webpay_form( $order_id ) 
        {
            global $woocommerce;

            $order = new WC_Order( $order_id );

            //Old WebPAY
            if('oldwebpay' == $this->oldwebpay)
            {
                // check if Sandbox MOde
                if ( 'yes' == $this->testmode )
                {
                    $webpay_adr = $this->testurlold;
                } 
                //if not test, Live mode
                else 
                {
                    $webpay_adr = $this->liveurlold;
                }
            } 
            //New WebPAY
            else 
            {
                if ( 'yes' == $this->testmode ) 
                {
                    $webpay_adr = $this->testurlnew;
                } 
                else 
                {
                    $webpay_adr = $this->liveurlnew;
                }
            }

            $webpay_args = $this->get_webpay_args( $order );

            // before payment hook
            do_action('essl_wc_webpay_before_payment', $webpay_args);

            $webpay_args_array = array();

            foreach ($webpay_args as $key => $value) 
            {
                $webpay_args_array[] = '<input type="hidden" name="'.esc_attr( $key ).'" value="'.esc_attr( $value ).'" />';
            }
            
            //AutoRedirect Page
            wc_enqueue_js( '
                            $.blockUI({
                                message: "' . esc_js( __( 'Redirecting to Interswitch secured gateway. Thank you', 'woocommerce' ) ) . '",
                                baseZ: 333333,
                                overlayCSS:
                                {
                                        background: "#fff",
                                        opacity: 0.6
                                },
                                css: {
                                        padding:        "20px",
                                        zindex:         "333333",
                                        textAlign:      "center",
                                        color:          "#00f",
                                        border:         "3px solid #000",
                                        backgroundColor:"#fff",
                                        cursor:         "wait",
                                        lineHeight:		"24px",
                                }
                            });
                            jQuery("#submit_webpay_payment_form").click();
                        ' );

                    return '<form action="' . esc_url( $webpay_adr ) . '" method="post" id="webpay_payment_form" target="_top">
                                    ' . implode( '', $webpay_args_array ) . '
                                    <!-- Button Fallback -->
                                    <div class="payment_buttons">
                                            <input type="submit" class="button alt" id="submit_webpay_payment_form" value="' . __( 'Pay via Webpay by Interswitch', 'woocommerce' ) . '" /> <a class="button cancel" href="' . esc_url( $order->get_cancel_order_url() ) . '">' . __( 'Cancel order &amp; restore cart', 'woocommerce' ) . '</a>
                                    </div>
                                    <script type="text/javascript">
                                            jQuery(".payment_buttons").hide();
                                    </script>
                            </form>';
        }

        /**
         * Process the payment and return the result
        **/
            function process_payment( $order_id ) 
            {
                $order = new WC_Order( $order_id );
                return array(
                                'result'        => 'success',
                                'redirect'	=> $order->get_checkout_payment_url( true )
                            );
            }

        /**
         * Output for the order received page.
        **/
        function receipt_page( $order ) 
        {
            echo '<p>' . __( 'Thank you - Payment Pending. You will be redirected to Interswitch to complete payment.', 'woocommerce' ) . '</p>';
            echo $this->generate_webpay_form( $order );
        }

        /**
         * Verify a successful Payment!
         **/
        function check_webpay_response()
        {
            if( isset( $_POST['txnref'] ) || isset ($_REQUEST['txnRef']))
            {
                if( isset($_POST['txnref']))
                {
                    $txnref = $_POST['txnref'];
                }
                if(isset($_REQUEST['txnRef']))
                {
                    $txnref = $_REQUEST['txnRef'];
                }
                $order_details 	= explode('_', $txnref);
                $txn_ref 		= $order_details[0];
                $order_id 		= $order_details[1];

                $order_id 		= (int) $order_id;

                $order 		= new WC_Order($order_id);
                $order_total	= $order->get_total();

                $total              = $order_total * 100;

                $response           = $this->essl_webpay_transaction_details( $txnref, $total);

                $amount_paid        = $response -> Amount / 100;
                $response_code      = $response -> ResponseCode;
                $response_desc      = $response -> ResponseDescription;

                // after payment hook
                do_action('essl_wc_webpay_after_payment', $_POST, $response );

                //process a SUCCESSFUL transaction
                if( '00' == $response_code)
                {
                    // check if the amount paid is equal to the order amount.
                    if($order_total != $amount_paid)
                    {
                        //Update the order status
                        $order->update_status('on-hold', '');

                        //Error Note
                        $message = 'Thank you for your order.<br/>Transaction was successful, however, amount is inconsistent.<br/>Order is on-hold.<br/>Keep your transaction reference for resolutions.<br/>Transaction Reference: '.$txnref;
                        $message_type = 'notice';

                        //Add Customer Order Note
                        $order->add_order_note( $message, 1 );

                        //Add Admin Order Note
                        $order->add_order_note('Review order. <br />Order currently on hold.<br />Reason: Amount is inconsistent.<br />Amount Paid was &#8358; '.$amount_paid.' while the total order amount is &#8358; '.$order_total.'<br />Transaction Reference: '.$txnref);

                        // Reduce stock levels
                        $order->reduce_order_stock();

                        // Empty cart
                        $woocommerce->cart->empty_cart();
                    }
                    else
                    {
                        if($order->status == 'processing')
                        {
                            $order->add_order_note('Payment Via Interswitch Webpay<br />Transaction Reference: '.$txnref);

                            //Add customer order note
                            $order->add_order_note('Payment Received.<br />Processing order.<br />We will be shipping your order to you soon.<br /Transaction Reference: '.$txnref, 1);

                            // Reduce stock levels
                            $order->reduce_order_stock();

                            // Empty cart
                            WC()->cart->empty_cart();

                            $message = 'Thank you for your order.<br />Transaction was successful, payment received.<br />Order processing in progress.<br />Transaction Reference: '.$txnref;
                            $message_type = 'success';
                        }
                        else
                        {

                            if( $order->has_downloadable_item() ){

                                //Update order status
                                $order->update_status( 'completed', 'Payment received, order is complete.' );

                                //Add admin order note
                                $order->add_order_note('Payment Via Interswitch Webpay<br />Transaction Reference: '.$txnref);

                                //Add customer order note
                                $order->add_order_note('Payment Received.<br />Your order is now complete.<br />Transaction Reference: '.$txnref, 1);

                                $message = 'Thank you for your order.<br />Transaction was successful, payment received.<br />Order is complete.<br />Transaction Reference: '.$txnref;
                                $message_type = 'success';

                            }
                            else{

                                //Update order status
                                $order->update_status( 'processing', 'Payment received, your order is currently being processed.' );

                                //Add admin order noote
                                $order->add_order_note('Payment Via Interswitch Webpay<br />Transaction Reference: '.$txnref);

                                //Add customer order note
                                $order->add_order_note('Payment Received.<br />order processing in progress.<br />We will be shipping your order to you soon.<br />Transaction Reference: '.$txnref, 1);

                                $message = 'Thank you for your order.<br />Transaction was successful, payment received.<br />Order processing in progress.<br />Transaction Reference: '.$txnref;
                                $message_type = 'success';
                            }

                            // Reduce stock levels
                            $order->reduce_order_stock();

                            // Empty cart
                            WC()->cart->empty_cart();
                        }
                    }
                }
                //process a FAILED transaction
                else
                {
                    //process a failed transaction
                    $message = 	'Thank you for your order. <br />Transaction wasn\'t successful, payment wasn\'t received.<br />Reason: '. $response_desc.'(' . $response_code . ')<br />Transaction Reference: '.$txnref;
                    $message_type = 'error';

                    //Add Customer Order Note
                    $order->add_order_note( $message, 1 );

                    //Add Admin Order Note
                    $order->add_order_note( $message );

                    //Update the order status
                    $order->update_status('failed', '');
                }
            }
            else
            {
                $message        = 'Thank you for your order. <br />However, the transaction wasn\'t successful, payment wasn\'t received.';
                $message_type   = 'error';
            }

            $notification_message = array(
                                            'message'       => $message,
                                            'message_type'  => $message_type
                                        );

            if ( version_compare( WOOCOMMERCE_VERSION, "2.2" ) >= 0 ) 
            {
                add_post_meta( $order_id, '_transaction_id', $txnref, true );
            }

            update_post_meta( $order_id, '_essl_interswitch_wc_message', $notification_message );

            $redirect_url = esc_url( $this->get_return_url( $order ) );
            wp_redirect( $redirect_url );
            exit;
        }



        /**
        * Query a transaction details
        **/
        function essl_webpay_transaction_details( $txnref, $total )
        {
            $product_id 	= $this->product_id;
            $mac_key            = $this->mac_key;

            //OLD WEBPAY
            if('oldwebpay' == $this->oldwebpay)
            {
                // Sandbox Mode
                if ( 'yes' == $this->testmode ) {
                    $query_url = 'https://sandbox.interswitchng.com/webpay/api/v1/gettransaction.json';
                } 
                //LIVE MODE
                else 
                {
                    $query_url = 'https://webpay.interswitchng.com/paydirect/api/v1/gettransaction.json';
                }
            } 
            //NEW WEBPAY
            else 
            {
                // Sandbox Mode
                if ( 'yes' == $this->testmode ) 
                {
                    $query_url = 'https://sandbox.interswitchng.com/collections/api/v1/gettransaction.json';
                } 
                //LIVE MODE
                else 
                {
                    $query_url = 'https://webpay.interswitchng.com/collections/api/v1/gettransaction.json';
                }
            }

            $url 	=   "$query_url?productid=$product_id&transactionreference=$txnref&amount=$total";

            $hashi 	=   $product_id.$txnref.$mac_key;
            $thash 	=   hash("sha512", $hashi);

            /*$headers = array(
                    'Hash' => $hash
            );*/

            /*$args = array(
                    'timeout'	=> 30,
                    'headers' 	=> $headers
            );*/

            $headers = array(
                            "GET /HTTP/1.1",
                            "User-Agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.0.1) Gecko/2008070208 Firefox/3.0.1",
                            //"Content-type:  multipart/form-data",
                            //"Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8", 
                            "Accept-Language: en-us,en;q=0.5",
                            //"Accept-Encoding: gzip,deflate",
                            //"Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7",
                            "Keep-Alive: 300",      
                            "Connection: keep-alive",
                            //"Hash:$thash",
                            "Hash: $thash " 
                            );

            $ch = curl_init($url); 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION ,1);
            curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
            curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,120);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER ,false);
            curl_setopt($ch, CURLOPT_TIMEOUT, 120);

            //$response 		= wp_remote_get( $url, $args );
            $response               = curl_exec($ch); 
            //$response  		= json_decode($response['body'], true);
            curl_close($ch);

            $response               = json_decode($response);
            
            return $response;

        }


        /**
         * Display the Transaction Reference on the payment confirmation page for all transactions.
        **/
            function display_transaction_id()
            {
                $order_id = absint( get_query_var( 'order-pay' ) );
                $order = new WC_Order( $order_id );

                $payment_method =  $order->payment_method;

                if( !isset( $_GET['pay_for_order'] ) && ( 'essl_webpay_gateway' == $payment_method ) )
                {
                    $txn_ref =$order_id = WC()->session->get( 'essl_wc_webpay_txn_id' );
                    WC()->session->__unset( 'essl_wc_webpay_txn_id' );
                    echo '<h4>Transaction Reference: '. $txn_ref .'</h4>';
                }
            }
    }


    function essl_wc_interswitch_message()
    {
        if( get_query_var('order-received'))
        {
            $order_id       =   absint( get_query_var( 'order-received' ) );
            $order          =   new WC_Order( $order_id );
            $payment_method =   $order->payment_method;

            if( is_order_received_page() &&  ( 'essl_webpay_gateway' == $payment_method ) )
            {
                $notification 	=   get_post_meta( $order_id, '_essl_interswitch_wc_message', true );
                $message 	=   isset($notification['message']) ? $notification['message']:'';
                $message_type 	=   isset($notification['message_type']) ? $notification['message_type']:'';

                delete_post_meta( $order_id, '_essl_interswitch_wc_message' );

                if( ! empty( $message) )
                {
                    wc_add_notice( $message, $message_type );
                }
            }
        }
    }
        //transactions log
        
    add_action('admin_menu', 'isw_tranactions_log');
 
    function isw_tranactions_log() 
    {
        add_menu_page('Webpay Requery', 'Webpay Requery', 'administrator', 'isw_logs', 'webpay_logs');
    }

    function webpay_logs()
    {

         echo '<form action=" '. WC()->api_request_url( 'WC_Essl_Webpay_Gateway' ). '" method="post" id="webpay_requery_form" target="_top">

					 <div class="form-group">
                        <div class="input-icon right">
                            <i class="fa fa-user"></i>
                            <label for="txnref">Transaction Reference</label>
                        </div>
                        <input type="text" class="form-control" name="txnref" id="txnref" required="true" >
                    </div>
					<!-- Button Fallback -->
					<div class="payment_buttons">
						<input type="submit" class="button alt" id="submit_webpay_requery_form" value="Requery" />

					</div>

				</form>';
    }
        
    add_action('wp', 'essl_wc_interswitch_message', 0);

    /**
    * Add Webpay Gateway to WC
    **/
    function wc_add_iswebay_gateway($methods) 
    {
        $methods[] = 'WC_Essl_Webpay_Gateway';
        return $methods;
    }

    add_filter('woocommerce_payment_gateways', 'wc_add_iswebay_gateway' );


    /**
     * only add the naira currency and symbol if WC versions is less than 2.1
     */
    if ( version_compare( WOOCOMMERCE_VERSION, "2.1" ) <= 0 ) 
    {

        /**
        * Add NGN as a currency in WC
        **/
        add_filter( 'woocommerce_currencies', 'essl_add_my_currency' );

        if( ! function_exists( 'essl_add_my_currency' ))
        {
            function essl_add_my_currency( $currencies ) {
                 $currencies['NGN'] = __( 'Naira', 'woocommerce' );
                 return $currencies;
            }
        }

        /**
        * Enable the naira currency symbol in WC
        **/
        add_filter('woocommerce_currency_symbol', 'essl_add_my_currency_symbol', 10, 2);

        if( ! function_exists( 'essl_add_my_currency_symbol' ) )
        {
            function essl_add_my_currency_symbol( $currency_symbol, $currency ) 
            {
                switch( $currency ) 
                {
                    case 'NGN': $currency_symbol = '&#8358; '; break;
                }
                 return $currency_symbol;
            }
        }
    }


    /**
    * Add Settings link to the plugin entry in the plugins menu for WC below 2.1
    **/
    if ( version_compare( WOOCOMMERCE_VERSION, "2.1" ) <= 0 ) 
    {

        add_filter('plugin_action_links', 'essl_webpay_plugin_action_links', 10, 2);

        function essl_webpay_plugin_action_links($links, $file) 
        {
            static $this_plugin;

            if (!$this_plugin) 
            {
                $this_plugin = plugin_basename(__FILE__);
            }

            if ($file == $this_plugin) 
            {
                $settings_link = '<a href="' . get_bloginfo('wpurl') . '/wp-admin/admin.php?page=woocommerce_settings&tab=payment_gateways&section=WC_Essl_Webpay_Gateway">Settings</a>';
                array_unshift($links, $settings_link);
            }
            return $links;
        }
    }
    /**
    * Add Settings link to the plugin entry in the plugins menu for WC 2.1 and above
    **/
    else
    {
        add_filter('plugin_action_links', 'essl_webpay_plugin_action_links', 10, 2);

        function essl_webpay_plugin_action_links($links, $file) 
        {
            static $this_plugin;

            if (!$this_plugin) 
            {
                $this_plugin = plugin_basename(__FILE__);
            }

            if ($file == $this_plugin) 
            {
                $settings_link = '<a href="' . get_bloginfo('wpurl') . '/wp-admin/admin.php?page=wc-settings&tab=checkout&section=wc_essl_webpay_gateway">Settings</a>';
                array_unshift($links, $settings_link);
            }
            return $links;
        }
    }


    /**
    * Display the testmode notice
    **/
    function essl_webpay_testmode_notice()
    {
        $essl_webpay_settings = get_option( 'woocommerce_essl_webpay_gateway_settings' );

        $webpay_test_mode = $essl_webpay_settings['testmode'];

        if ( 'yes' == $webpay_test_mode ) 
        {
        ?>
            <div class="update-nag">
                Interswitch WebPAY© Testmode is still enabled, remember to disable it when you want to start accepting live payment on your site.
            </div>
        <?php
        }
    }
    
    add_action( 'admin_notices', 'essl_webpay_testmode_notice' );
}
