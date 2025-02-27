<?php
namespace UmpPayFast;

class PayFast extends \Indeed\Ihc\Gateways\PaymentAbstract
{

    protected $paymentType                    = 'ump_payfast'; // slug. cannot be empty.

    protected $paymentRules                   = [
                'canDoRecurring'						                  => false, // does current payment gateway supports recurring payments.
                'canDoTrial'							                    => false, // does current payment gateway supports trial subscription
                'canDoTrialFree'						                  => false, // does current payment gateway supports free trial subscription
                'canApplyCouponOnRecurringForFirstPayment'		=> false, // if current payment gateway support coupons on recurring payments only for the first transaction
                'canApplyCouponOnRecurringForFirstFreePayment'=> false, // if current payment gateway support coupons with 100% discount on recurring payments only for the first transaction.
                'canApplyCouponOnRecurringForEveryPayment'	  => true, // if current payment gateway support coupons on recurring payments for every transaction
                'paymentMetaSlug'                             => 'ump_payfast', // payment gateway slug. exenple: paypal, stripe, etc.
                'returnUrlAfterPaymentOptionName'             => 'ump_payfast-return_page', // option name ( in wp_option table ) where it's stored the return URL after a payment is done.
                'returnUrlOnCancelPaymentOptionName'          => '', // option name ( in wp_option table ) where it's stored the return URL after a payment is canceled.
                'paymentGatewayLanguageCodeOptionName'        => '', // option name ( in wp_option table ) where it's stored the language code.
    ]; // some payment does not support all our features
    protected $intervalSubscriptionRules      = [
                'daysSymbol'               => '',
                'weeksSymbol'              => '',
                'monthsSymbol'             => 'Monthly',
                'yearsSymbol'              => 'Annual',
                'daysSupport'              => false,
                'daysMinLimit'             => 7,
                'daysMaxLimit'             => 90,
                'weeksSupport'             => false,
                'weeksMinLimit'            => 1,
                'weeksMaxLimit'            => 52,
                'monthsSupport'            => true,
                'monthsMinLimit'           => 1,
                'monthsMaxLimit'           => 6,
                'yearsSupport'             => true,
                'yearsMinLimit'            => 1,
                'yearsMaxLimit'            => 15,
                'maximumRecurrenceLimit'   => 52, // leave this empty for unlimited
                'minimumRecurrenceLimit'   => 2,
                'forceMaximumRecurrenceLimit'   => false,
    ];
    protected $intervalTrialRules             = [
                              'daysSymbol'               => '',
                              'weeksSymbol'              => '',
                              'monthsSymbol'             => '',
                              'yearsSymbol'              => '',
                              'supportCertainPeriod'     => false,
                              'supportCycles'            => false,
                              'cyclesMinLimit'           => 1,
                              'cyclesMaxLimit'           => '',
                              'daysSupport'              => false,
                              'daysMinLimit'             => 1,
                              'daysMaxLimit'             => 90,
                              'weeksSupport'             => false,
                              'weeksMinLimit'            => 1,
                              'weeksMaxLimit'            => 52,
                              'monthsSupport'            => true,
                              'monthsMinLimit'           => 1,
                              'monthsMaxLimit'           => 24,
                              'yearsSupport'             => false,
                              'yearsMinLimit'            => 1,
                              'yearsMaxLimit'            => 5,
    ];

    protected $stopProcess                    = false;
    protected $inputData                      = []; // input data from user
    protected $paymentOutputData              = [];
    protected $paymentSettings                = []; // api key, some credentials used in different payment types

    protected $paymentTypeLabel               = 'PayFast'; // label of payment
    protected $redirectUrl                    = ''; // redirect to payment gateway or next page
    protected $defaultRedirect                = ''; // redirect home
    protected $errors                         = [];

    /**
     * @param none
     * @return object
     */
    public function charge()
    {
        if ( !$this->paymentOutputData['is_recurring'] ){
            // single payment
            $params = [
                        'amount'                => $this->paymentOutputData['amount'],
                        'order_id'              => $this->paymentOutputData['order_id'],
                        'uid'                   => $this->paymentOutputData['uid'],
                        'lid'                   => $this->paymentOutputData['lid'],
                        'order_identificator'   => $this->paymentOutputData['order_identificator'],
                        'first_name'            => get_user_meta( $this->paymentOutputData['uid'], 'first_name', true ),
                        'last_name'             => get_user_meta( $this->paymentOutputData['uid'], 'last_name', true ),
                        'email'                 => $this->paymentOutputData['customer_email'],
            ];
        }
        if ( empty( $params ) ){
            return $this;
        }
        $this->redirectUrl = get_site_url() . '?ump-payfast=1&' . http_build_query( $params );
        return $this;

    }

    /**
     * @param none
     * @return none
     */
    public function webhook()
    {
        $customData = isset( $_POST['custom_str1'] ) ? sanitize_text_field( $_POST['custom_str1'] ) : false;
        $paymentStatus = isset( $_POST['payment_status'] ) ? sanitize_text_field( $_POST['payment_status'] ) : false;

        if ( $customData === false || $paymentStatus === false ){
          _e( '<p>============= Ultimate Membership Pro - PayFast Webhook =============</p>', 'ultimate-membership-pro-payfast');
          _e( '<p>No Payments details sent. Come later</p>', 'ultimate-membership-pro-payfast');
          exit;
        }

        $customData = json_decode( stripslashes( $customData ), true );

        if ( $paymentStatus === 'COMPLETE' ){
            $status = 'completed';
            $this->webhookData = [
                                    'transaction_id'              => sanitize_text_field( $_POST['pf_payment_id'] ),
                                    'order_identificator'         => sanitize_text_field( $customData['order_identificator'] ),
                                    'amount'                      => sanitize_text_field( $_POST['amount_net'] ),
                                    'currency'                    => 'ZAR', // ZAR is the only supported currency at this point
                                    'payment_details'             => '',
                                    'payment_status'              => $status,
                                    'uid'                         => isset( $customData['uid'] ) ? sanitize_text_field( $customData['uid'] ) : 0,
                                    'lid'                         => isset( $customData['lid'] ) ? sanitize_text_field( $customData['lid'] ) : 0,
            ];
        }

    }

    /**
     * @param int
     * @param int
     * @param string
     * @return none
     */
    public function canDoCancel( $uid=0, $lid=0, $subscriptionId='' )
    {
        if ( isset( $subscriptionId ) && $subscriptionId !== '' ){
            //

        }
        return false;
    }


    /**
     * @param int
     * @param int
     * @param string
     * @return none
     */
    public function cancel( $uid=0, $lid=0, $transactionId='' )
    {
        if ( !$transactionId ){
            return false;
        }
        $orderMeta = new \Indeed\Ihc\Db\OrderMeta();
        $orderId = $orderMeta->getIdFromMetaNameMetaValue( 'transaction_id', $transactionId );
        if ( $orderId ){
            $subscriptionId = $orderMeta->get( $orderId, 'subscription_id' );
        }
        if ( isset( $subscriptionId ) && $subscriptionId !== '' ){

        }
        return false;
    }


}
