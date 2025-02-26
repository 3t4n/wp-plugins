<?php
/**
 * WooCommerce Lottery Settings
 *
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if (  class_exists( 'WC_Settings_Page' ) ) :

/**
 * WC_Settings_Accounts
 */
class WC_Settings_atcbm extends WC_Settings_Page {

	/**
	 * Constructor.
	 */
	public function __construct() {

      $this->id    = 'wc_atcbm_options';
      $this->label = __( 'Add to cart button manipulation', 'wc-atcbm-options' );

      add_filter( 'woocommerce_settings_tabs_array', array( $this, 'add_settings_page' ), 20 );
      add_action( 'woocommerce_settings_' . $this->id, array( $this, 'output' ) );
      add_action( 'woocommerce_settings_save_' . $this->id, array( $this, 'save' ) );
	}

	/**
	 * Get settings array
	 *
	 * @return array
	 */
	public function get_settings() {

		return apply_filters( 'woocommerce_' . $this->id . '_settings', array(

			array(	'title' => __( 'Woocommerce Add to cart button manipulation', 'wc-atcbm-options' ), 'type' => 'title','desc' => '', 'id' => 'wc-atcbm-options' ),

      array(
              'title'     => __( 'Show date from', 'wc-atcbm' ),
              'desc'      => __( 'Show date available from', 'wc-atcbm' ),
              'id'        => 'wc-atcbm_show_from',
              'type'      => 'checkbox',
              'default'   => 'yes'
      ),
      array(
              'title'     => __( 'Show date to', 'wc-atcbm' ),
              'desc'      => __( 'Show date available to', 'wc-atcbm' ),
              'id'        => 'wc-atcbm_show_to',
              'type'      => 'checkbox',
              'default'   => 'yes'
      ),
      array(
              'title'     => __( 'Show counter', 'wc-atcbm' ),
              'desc'      => __( 'Show counter when dates from or to are set', 'wc-atcbm' ),
              'id'        => 'wc-atcbm_counter',
              'type'      => 'checkbox',
              'default'   => 'yes'
      ),

      array(
              'title' 			=> __( "Countdown format", 'wc-atcbm' ),
              'desc'				=> __( "The format for the countdown display. Default is yowdHMS", 'wc-atcbm' ),
              'desc_tip' 		=> __( "Use the following characters (in order) to indicate which periods you want to display: 'Y' for years, 'O' for months, 'W' for weeks, 'D' for days, 'H' for hours, 'M' for minutes, 'S' for seconds. Use upper-case characters for mandatory periods, or the corresponding lower-case characters for optional periods, i.e. only display if non-zero. Once one optional period is shown, all the ones after that are also shown.", 'wc-atcbm' ),
              'type' 				=> 'text',
              'id'					=> 'wc-atcbm_countdown_format',
              'default' 		=> 'yowdHMS'
      ),

      array( 'type' => 'sectionend', 'id' => 'wc-atcbm-options'),

		)); // End pages settings
	}
}
return new WC_Settings_atcbm();

endif;
