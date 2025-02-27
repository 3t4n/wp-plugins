<?php

namespace ChinaPayments;

use ChinaPayments\PaymentGateway as CP_PaymentGateway;

class ActionScheduler {

  /**
   * @var null|ActionScheduler;
   */
  protected static $_instance = null;

  /**
   * @return ActionScheduler
   */
  public static function instance(): ActionScheduler {
    if ( self::$_instance === null ) {
      self::$_instance = new self();
    }

    return self::$_instance;
  }

  /**
   * At the moment, the purpose for this, is strictly for WooCommerce, which includes Action Scheduler by default.
   * @return void
   */
  public function setup() {
    if( did_action('plugins_loaded') ) {
      $this->_register_action_scheduler();
    } else {
      add_action( 'plugins_loaded', [ $this, '_register_action_scheduler' ], 99 );
    }
  }

  public function _register_action_scheduler() {
    if( !function_exists( 'as_has_scheduled_action' ) )
      return;

    if( !function_exists('WC'))
      return;

    if( !apply_filters( 'china_payments_woocommerce_has_background_payment_check', true ) )
      return;

    add_action( 'init', [ $this, '_init' ], 99 );
    add_action( 'china_payments_woocommerce_background_payment_check', [ $this, '_china_payments_woocommerce_background_payment_check' ] );
  }

  public function _init() {
    if ( false === as_has_scheduled_action( 'china_payments_woocommerce_background_payment_check' ) ) {
      as_schedule_recurring_action( strtotime( 'now' ), MINUTE_IN_SECONDS * 15, 'china_payments_woocommerce_background_payment_check' );
    }
  }

  public function _china_payments_woocommerce_background_payment_check() {
    if( !apply_filters( 'china_payments_woocommerce_has_background_payment_check', true ) )
      return;

    $order_ids = china_payments_woocommerce_stripe_awaiting_payments_order_ids();

    if(empty($order_ids))
      return;

    foreach( $order_ids as $order_id ) {
      $order = wc_get_order( $order_id );

      if(empty($order))
        continue;

      $is_live           = $order->get_meta( 'china_payments_is_live' );
      $payment_intent_id = $order->get_meta( 'china_payments_payment_intent_id' );

      if ( empty( $payment_intent_id ) ) {
        continue;
      }

      $stripeIntegration = CP_PaymentGateway::get_integration_from_settings( 'stripe', $is_live );

      try {
        $payment_intent = $stripeIntegration->stripeClient()->paymentIntents->retrieve( $payment_intent_id );

        if ( $payment_intent->status === 'succeeded' ) {
          if ( ! $order->is_paid() ) {
            $order->payment_complete( $payment_intent->id );
          }
        }
      } catch ( \Exception $e ) {
      }
    }
  }

}