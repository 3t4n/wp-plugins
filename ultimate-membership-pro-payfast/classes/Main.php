<?php
/*
 * Run on public section
 */
namespace UmpPayFast;

class Main
{
		/**
		 * @var array
		 */
		private $addOnSettings				= [];
		/**
		 * @var string
		 */
		private $view 								= null;

		/**
		 * @param array
		 * @param string
		 * @return none
		 */
    public function __construct( $addOnSettings=[], $viewObject=null )
    {
				$this->addOnSettings 	= $addOnSettings;
				$this->view 					= $viewObject;

	    		// check if magic feat is active filter ...
       			 add_filter( 'ihc_is_magic_feat_active_filter', [ $this, 'isMagicFeatActive' ], 1, 2 );

				if ( !get_option( $this->addOnSettings['slug'] . '-enabled' ) ){
						return;
				}

				add_filter( 'ihc_payment_gateway_box_status', [ $this, 'paymentGatewayBoxStatus' ], 1, 2 );

				add_filter( 'ihc_payment_gateways_list', [ $this, 'paymentGatewaysList'], 1, 1 );

				add_filter( 'ihc_payment_gateway_create_payment_object', [ $this, 'createPaymentObject'], 11, 2 );

				add_filter( 'ihc_payment_gateway_status', [ $this, 'isPaymentAvailable' ], 1, 2 );

				add_filter( 'ihc_filter_payment_logo', [ $this, 'logo' ], 1, 2 );

				add_filter( 'query_vars', [ $this, 'addQueryVar' ], 99, 1 );

				add_action( 'pre_get_posts', [ $this, 'formAndRedirect' ], 99, 1 );
    }

		/**
		 * @param none
		 * @return none
		 */
		public function styleAndScripts()
		{
				wp_enqueue_style( $this->addOnSettings['slug'] . '-public-style', $this->addOnSettings['dir_url'] . 'assets/css/public.css' );
		}


		/**
		 * @param bool
 		 * @param string
		 * @return bool
		 */
    public function isMagicFeatActive( $isActive=false, $type='' )
    {
        if ( $this->addOnSettings['slug'] != $type ){

            return $isActive;
        }

        // check if is active ...
        $settings = ihc_return_meta_arr( $this->addOnSettings['slug'] );
        if ( !empty( $settings[ $this->addOnSettings['slug'] . '-enabled'] ) ){
            return true;
        }
        return false;
    }


		/**
		 * Return payment status for the box in payments services. admin.php?page=ihc_manage&tab=payment_settings
		 * The array must contain:
		 * 'active' => '{your-payment-slug}-active' ( this is a css class )
		 * 'status' => 0 or 1
		 * 'settings' => 'Completed' or 'Uncompleted'
		 * @param array
		 * @param string
		 * @return array
		 */
		public function paymentGatewayBoxStatus( $status=[], $paymentType='' )
		{
				if ( $paymentType != $this->addOnSettings['slug'] ){
						return $status;
				}
				$status = [
										'active'			=> '',
										'status'			=> 0,
										'settings'		=> 'Uncompleted',
				];

				$settings = ihc_return_meta_arr( 'ump_payfast' );

				if ( !empty( $settings['ump_payfast-merchant_id'] ) && !empty( $settings['ump_payfast-merchant_key'] )) {
						$status['settings'] = 'Completed';
				}
				if ( !empty($settings['ump_payfast-enabled']) ){
						$status['active'] = $this->addOnSettings['slug'].'-active';
						$status['status'] = 1;
				}
				return $status;
		}

		/**
		 * Add this payment gateway into all ump payment gateways lists.
		 * @param array
		 * @return array
		 */
		public function paymentGatewaysList( $list=[] )
		{
				$list[ $this->addOnSettings['slug'] ] = __( 'PayFast', 'ihc' );
				return $list;
		}

		/**
		 * Create a instance of payment gateway object. It's used in DoPayment class and indeed-membership-pro.php webhook section.
		 * This method must return an object that extends \Indeed\Ihc\Gateways\PaymentAbstract
		 * @param object
		 * @param string
		 * @return object
		 */
		public function createPaymentObject( $object=null, $paymentType='' )
		{
				if ( $paymentType != $this->addOnSettings['slug'] ){
						return $object;
				}
				if ( class_exists( '\UmpPayFastPro\PayFast' ) ){
						// pro version
						return new \UmpPayFastPro\PayFast();
				}
				return new \UmpPayFast\PayFast();
		}

		/**
		 * Return a URL to your payment gateway logo. It will be used on public section.
		 * @param string
		 * @param string
		 * @return string
		 */
		public function logo( $imageUrl='', $paymentType='' )
		{
				if ( $paymentType != $this->addOnSettings['slug'] ){
						return $imageUrl;
				}
				return UMP_PAYFAST_URL . 'assets/images/ump_payfast.png';
		}

		/**
		 * Check if the payment if enabled and all the credentials are completed.
 		 * @param bool
		 * @return bool
		 */
		public function isPaymentAvailable( $status=false, $type='' )
		{
				if ( $type != $this->addOnSettings['slug'] ){
						return $status;
				}
				$settings = ihc_return_meta_arr( $this->addOnSettings['slug'] );
				if ( !empty($settings['ump_payfast-enabled']) && $settings['ump_payfast-merchant_id'] && !empty( $settings['ump_payfast-merchant_key'] )) {
						return true;
				}
				return false;
		}

		/**
		 * @param array
		 * @return array
		 */
		public function addQueryVar( $vars=[] )
		{
				$vars[] = "ump-payfast";
				return $vars;
		}

		/**
		 * @param string
		 * @return none
		 */
		public function formAndRedirect()
		{
				global $wp_query;
				$submit = isset( $_GET['ump-payfast'] ) ? sanitize_text_field( $_GET['ump-payfast'] ) : false;
				if ( !empty( $submit ) ){
						$isPayFast = $submit;
				} else if ( !empty( $wp_query ) ){
						$isPayFast = get_query_var('ump-payfast');
						$isPayFast = sanitize_text_field( $isPayFast );
				}
			  if ( empty( $isPayFast ) || $isPayFast === '' ){
						return;
				}

				if ( get_option( 'ump_payfast-sandbox', '1' ) ){
						// sandbox
						$targetUrl = 'https://sandbox.payfast.co.za/eng/process';
				} else {
						// live
						$targetUrl = 'https://www.payfast.co.za/eng/process';
				}
				$merchantId = get_option( 'ump_payfast-merchant_id', false );
				if ( $merchantId === false || $merchantId === '' ){
						return;
				}
				$merchantKey = get_option( 'ump_payfast-merchant_key', false );
				if ( $merchantKey === false || $merchantKey === '' ){
						return;
				}
				$lid = isset( $_GET['lid'] ) ? sanitize_text_field( $_GET['lid'] ) : 0;
				$membershipData = \Indeed\Ihc\Db\Memberships::getOne( $lid );
				$returnUrl = get_option( 'ump_payfast-return_page', 0 );

				if ( $returnUrl > 0 ){
						$returnUrl = get_permalink( $returnUrl );

				}
				if ( $returnUrl === 0 || $returnUrl === false || $returnUrl === '' || $returnUrl === '-1' ){
						$returnUrl = get_site_url();
				}

				$data = [
									'form_target'							=> $targetUrl,
									'merchant_id'							=> $merchantId,
									'merchant_key'						=> $merchantKey,
									'amount'									=> empty( $_GET['amount'] ) ? 0 : sanitize_text_field( $_GET['amount'] ),
									'item_name'								=> empty( $membershipData['label'] ) ? '' : $membershipData['label'],
									'item_description'				=> empty( $membershipData['description'] ) ? '' : $membershipData['description'],
									'custom_str1'							=> json_encode([
										'order_id'              => empty( $_GET['order_id'] ) ? 0 : sanitize_text_field( $_GET['order_id'] ),
										'uid'                   => empty( $_GET['uid'] ) ? 0 : sanitize_text_field( $_GET['uid'] ),
										'lid'                   => !isset( $_GET['lid'] ) ? 0 : sanitize_text_field( $_GET['lid'] ),
										'order_identificator'   => empty( $_GET['order_identificator'] ) ? 0 : sanitize_text_field( $_GET['order_identificator'] ),
										'subscription_id'				=> empty( $_GET['subscription_id'] ) ? 0 : $_GET['subscription_id'],
									]),
									'name_first'							=> empty( $_GET['first_name'] ) ? 0 : sanitize_text_field( $_GET['first_name'] ),
									'name_last'								=> empty( $_GET['last_name'] ) ? 0 : sanitize_text_field( $_GET['last_name'] ),
									'email_address'						=> empty( $_GET['email'] ) ? 0 : sanitize_text_field( $_GET['email'] ),
									'email_confirmation'			=> '0',
									'return_url'							=> $returnUrl,
									'cancel_url'							=> get_site_url(),
									'notify_url'							=> get_site_url() . '?ihc_action=ump_payfast',
				];
				$isRecurring = isset( $_GET['is_recurring'] ) ? sanitize_text_field( $_GET['is_recurring'] ) : false;
				if ( $isRecurring !== false ){
						$data['subscription_type'] = empty( $_GET['subscription_type'] ) ? 1 : sanitize_text_field( $_GET['subscription_type'] );
						//$data['billing_date'] = '1';
						$data['recurring_amount'] = empty( $_GET['amount'] ) ? 0 : sanitize_text_field( $_GET['amount'] );
						$data['frequency'] = empty( $_GET['frequency'] ) ? 3 : sanitize_text_field( $_GET['frequency'] );
						$data['cycles'] = empty( $_GET['cycles'] ) ? 2 : sanitize_text_field( $_GET['cycles'] );
						$data['subscription_notify_email'] = '0';
						$data['subscription_notify_webhook'] = '1';
				}

				$string = $this->view->setTemplate( $this->addOnSettings['dir_path'] . 'views/form.php' )
														 ->setContentData( $data )
														 ->getOutput();

				$allowedHtml = [
											'script'  => [],
											'input'		=> [
																			'type' 				=> [],
																			'name' 				=> [],
																			'value' 			=> [],
																	],
											'form'		=> [
																			'action' => [],
																			'method' => [],
																			'class'  => [],
																		],
											];

				echo wp_kses( $string, $allowedHtml );
				exit;
		}

}
