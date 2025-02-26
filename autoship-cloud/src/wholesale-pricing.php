<?php
/**
 * The core Wholesale Pricing Autoship Cloud plugin class.
 * This class uses methods from the WooCommerce Wholesale Prices Plugin classes
 * and filters from the Autoship Cloud Plugin.
 *
 * @since      1.0.0
 * @package    Autoship_Cloud_Wholesale_Pricing
 * @subpackage Autoship_Cloud_Wholesale_Pricing/includes
 * @author     Patterns In the Cloud LLC
 */
class Autoship_Cloud_Wholesale_Pricing {

	/**
	 * Class instance.
	 *
	 * @since    1.0.0
	 * @see get_instance()
	 * @var object
	 */
	protected static $instance = NULL;


  /**
  * Initial Setup
  *
  * @since    1.0.0
  */
  public function load() {

  	$this->define_admin_hooks();
    $this->define_public_hooks();
  }

  /**
   * Access this instance
   *
   * @wp-hook plugins_loaded
   * @since    1.0.0
   * @return  object of this class
   */
  public static function get_instance(){
    NULL === self::$instance and self::$instance = new self;
    return self::$instance;
  }

  /**
  * Register all of the hooks related to the admin area functionality.
  *
  * @since    1.0.0
  * @access   private
  */
  private function define_admin_hooks() {


    // Add the opt-in option to the edit product screen.
    add_action( 'autoship_after_print_product_custom_fields', array( $this, 'schedule_order_wholesale_discount' ), 10, 1 );
    add_action( 'autoship_after_print_variable_product_custom_fields', array( $this, 'schedule_order_variation_wholesale_discount' ), 10, 3 );

    // Saves the custom option on edit update
    add_action( 'woocommerce_process_product_meta', array( $this, 'save_product_custom_options' ), 10, 1 );
    add_action( 'woocommerce_save_product_variation', array( $this, 'save_product_custom_options' ), 10, 2 );

  }

  /**
  * Register all of the hooks related to the public-facing functionality.
  *
  * @since    1.0.0
  * @access   private
  */
  private function define_public_hooks() {

    if ( ! is_admin() || defined( 'DOING_AJAX' ) ) {

      // If you want use WooCommerce functions, do that after WooCommerce is loaded
      add_action( 'woocommerce_init', array( $this , 'define_woo_dependent_hooks' ) );

    }

	}

  /**
  * Register the Woo Commerce Filters and Hooks.
  *
  * @since    1.0.0
  * @access   public
  */
  public function  define_woo_dependent_hooks(){

    /* Hooks to process wholesale pricing on the Native UI */
    add_filter( 'autoship_create_scheduled_order_item_data', array( $this , 'autoship_add_schedule_items_wholesale_price' ), 10, 5 );
    add_filter( 'autoship_update_schedule_items_changes',    array( $this , 'autoship_update_schedule_items_wholesale_price' ), 10, 5 );
    add_filter( 'autoship_scheduled_order_form_item_add_display_name', array( $this , 'autoship_product_dropdown_get_price_range' ), 10, 5 );
    add_filter( 'autoship_scheduled_order_form_add_item_price', array( $this , 'autoship_added_product_html_get_price' ), 10, 3 );
    add_filter( 'autoship_scheduled_order_form_item_quantity_field', array( $this , 'autoship_enable_schedule_items_wholesale_price_input' ), 10, 3 );

    // Do not run on edit SO page to prevent modifying product price before checks for requirements to get wholesale pricing
    if( is_product() ) {
      add_filter( 'autoship_all_prices_array', array( $this , 'autoship_all_prices_array_w_wholesale' ) , 10, 3 );
    } 
    add_filter( 'autoship_discount_checkout_and_recurring_same', array( $this , 'autoship_checkout_recurring_discount_wholesale_string' ) , 10, 4 );
    add_filter( 'autoship_product_discount_data', array( $this , 'autoship_adjust_displayed_wholesale_string_price' ), 10, 2 );

    /* Hooks to process wholesale pricing on the Cart & Checkout*/
    add_filter( 'wwp_filter_get_custom_product_type_wholesale_price', array( $this , 'autoship_adjust_cart_item_general_wholesale_price' ), 10, 4 );
    add_filter( 'wwp_filter_wholesale_price_cart', array( $this , 'autoship_adjust_cart_item_wholesale_price' ), 10, 5 );
    add_filter( 'autoship_get_scheduled_order_data_full_item_data', array( $this , 'autoship_update_scheduled_order_full_item_data' ), 10, 3 );

  }



  /**
  * Checks for Empty Value ( Checks empty not 0 strings and NULL )
  *
  * @since     1.0.0
  *
  * @static
  * @access public
  * @return void
  */
  public function NonZeroEmpty( $val )  {

  	return !isset( $val ) || ( empty( $val ) && $val !== 0 );

  }


  // ==========================================================
  // Save Functions
  // ==========================================================

  /**
  * Saves the Autoship Custom Field(s) for a Products and Variations
  * @see woocommerce_process_product_meta
  * @see woocommerce_save_product_variation
  *
  * @since     1.0.0
  *
  * @access public
  * @param int $id The variation id.
  * @param int #index. Optional The current variation index. Default NULL
  */
  public function save_product_custom_options( $id, $index = NULL ) {

    $options = array(
      '_autoship_schedule_order_wholesale_discount' => 'floatval',
    );

    $values = array();

    // If the index is NULL then this is a product and not a variation. Variations have indexes.
    if ( NULL === $index ){

      foreach ( $options as $option => $sanitization) {

        $values[$option] = isset( $_POST[ $option ] ) ?
                           $sanitization( $_POST[ $option ] ) : '';
      }

    } else {

      foreach ( $options as $option => $sanitization) {

        $values[$option] = isset( $_POST[ $option ] ) &&
                           isset( $_POST[ $option ][$index] )?
                           $sanitization( $_POST[ $option ][$index] ) : '';

      }

    }

    // Save all the new values.
    $this->set_product_wholesale_discount( $id, $values['_autoship_schedule_order_wholesale_discount'] );

  }

  // ==========================================================
  // Set Functions
  // ==========================================================

  /**
  * Sets the Scheduled Order Wholesale Discount Option for a product
  *
  * @since     1.0.0
  *
  * @access public
  * @param int|WC_Product $product_id The current woocommerce product.
  * @param string $value The value to update the option to.
  * @return bool True if successful else false.
  */
  public function set_product_wholesale_discount( $product_id, $value = 0 ){
    return update_post_meta( $product_id, '_autoship_schedule_order_wholesale_discount', $value );
  }

  // ==========================================================
  // Get Functions
  // ==========================================================

  /**
  * Gets the Scheduled Order Wholesale Discount Option for a product
  *
  * @since     1.0.0
  *
  * @access public
  * @param int|WC_Product $product_id The current woocommerce product.
  * @param string $default The value to return if the key isn't  populated.
  * @return float The percentge discount
  */
  public function get_product_wholesale_discount( $product_id ){
    return get_post_meta( $product_id, '_autoship_schedule_order_wholesale_discount', true );
  }

  /************************************
  *         Edit Product Page
  *************************************/

  /**
  * Outputs the Wholesale Discount Field for variations
  *
  * @since     2.0.0
  *
  * @access public
  *
  * @param int     $loop
  * @param array   $variation_data
  * @param WP_Post $variation
  * @return void
  */
  public function schedule_order_variation_wholesale_discount ( $loop, $variation_data, $variation  ) {

    ?>

    <div class="autoship_scheduled_order_wholesale_extension_settings data">

      <h4><?php echo __('Autoship Cloud Wholesale Settings', 'autoship'); ?></h4>

      <div class="options_group autoship_scheduled_order_wholesale_extension">

        <?php
        // Assigned Group Ids
        woocommerce_wp_text_input(
          array(
            'id' => '_autoship_schedule_order_wholesale_discount' . $loop,
            'name'=> "_autoship_schedule_order_wholesale_discount[{$loop}]",
            'label' => __('Discount Percentage', 'autoship'),
            'description' => __('Enter an additional discount percentage to apply to the checkout & recurring price for Wholesale Autoship products.', 'autoship'),
            'placeholder' => __('(Optional)', 'autoship'),
            'data_type' => 'decimal',
            'value' => $this->get_product_wholesale_discount( $variation->ID ),
            'desc_tip' => true
          )
        );?>

      </div>

    </div>

    <?php

  }

  /**
  * Outputs the Wholesale Discount Field
  *
  * @since     2.0.0
  *
  * @access public
  * @param WC_Product $_product The current woocommerce product.
  * @return void
  */
  public function schedule_order_wholesale_discount ( $_product ) {

    ?>

    <div class="autoship_scheduled_order_wholesale_extension_settings autoship-sync-active-option-group">

      <h4><?php echo __('Autoship Cloud Wholesale Settings', 'autoship'); ?></h4>

      <div class="options_group autoship_scheduled_order_wholesale_extension">

        <?php
        // Assigned Group Ids
        woocommerce_wp_text_input(
          array(
            'id' => '_autoship_schedule_order_wholesale_discount',
            'label' => __('Discount Percentage', 'autoship'),
            'description' => __('Enter an additional discount percentage to apply to the checkout & recurring price for Wholesale Autoship products.', 'autoship'),
            'placeholder' => __('(Optional)', 'autoship'),
            'data_type' => 'decimal',
            'value' => $this->get_product_wholesale_discount( $_product->get_id() ),
            'desc_tip' => true
          )
        );?>

      </div>

    </div>

    <?php

  }

  /************************************
  *         Utilities
  *************************************/

  /**
  * Gets the automatic wholesale discount percentage for
  * autoship items
  *
  * @param int $product_id The current product id.
  * @param string $user_wholesale_role The current users wholesale role
  *
  * @since     1.0.1
  *
  * @return float The discount
  */
  public function autoship_get_scheduled_discount_percentage( $product_id, $user_wholesale_role ){
    $percentage = $this->get_product_wholesale_discount( $product_id );
    return apply_filters( 'autoship_wholesale_scheduled_discount_percentage', empty( $percentage ) ? 0: $percentage / 100, $product_id, $user_wholesale_role );
  }

  /**
  * Get the sites wholesale settings.
  *
  * @since     1.0.0
  *
  * @return array The Site Settings.
  */
  public function autoship_site_wholesale_settings( $user_id = NULL ){

    if ( !isset( $user_id ) )
    $user_id = get_current_user_id();

    return array(

      'minimum_cart_items'                     => trim( get_option( 'wwpp_settings_minimum_order_quantity' ) ),
      'minimum_cart_price'                     => trim( get_option( 'wwpp_settings_minimum_order_price' ) ),
      'minimum_requirements_conditional_logic' => get_option( 'wwpp_settings_minimum_requirements_logic' ),
      'override_per_wholesale_role'            => get_option( 'wwpp_settings_override_order_requirement_per_role' , false ),
      'per_wholesale_role_order_requirement'   => get_option( 'wwpp_option_wholesale_role_order_requirement_mapping' , array() ),
      'shop_base_currency'                     => get_option( 'woocommerce_currency' ),

      'user_min_order_qty_override'            => get_user_meta( $user_id , 'wwpp_override_min_order_qty' , true ),
      'user_min_order_qty'                     => get_user_meta( $user_id , 'wwpp_min_order_qty' , true ),
      'user_min_order_price_override'          => get_user_meta( $user_id , 'wwpp_override_min_order_price' , true ),
      'user_min_order_price'                   => get_user_meta( $user_id , 'wwpp_min_order_price' , true ),
      'user_min_order_logic'                   => get_user_meta( $user_id , 'wwpp_min_order_logic' , true ),
    );

  }

  /**
  * Return product wholesale price for a given wholesale user role.
  *
  * @since     1.0.0
  *
  * @see WWP_Wholesale_Prices::get_product_raw_wholesale_price()
  *
  * @param int     $product_id          Product id.
  * @param array   $user_wholesale_role Array of user wholesale roles.
  *
  * @param float The newly adjusted wholesale price.
  */
  public function autoship_calculate_schedule_product_wholesale_price( $product_id,  $user_wholesale_role  ){

    if ( !class_exists('WWP_Wholesale_Prices') )
    return NULL;

    $prices = WWP_Wholesale_Prices::get_product_wholesale_price_on_shop_v3( $product_id , $user_wholesale_role );
    return apply_filters( 'autoship_calculate_schedule_product_wholesale_price', trim( $prices['wholesale_price'] ), $product_id , $user_wholesale_role );

  }

  /**
  * Return wholesale user role for a user.
  *
  * @since     1.0.0
  * @see WWP_Wholesale_Roles->getUserWholesaleRole()
  *
  * @param int     $user_id  The WC User id.
  * @return string The supplied user's WholeSale Role.
  */
  public function autoship_get_user_wholesale_role( $user_id = NULL ){

    if ( !class_exists('WWP_Wholesale_Roles') )
    return '';

    $wwp_roles = new WWP_Wholesale_Roles();

    // Get the users Wholesale Role.
    return apply_filters( 'autoship_get_user_wholesale_role', $wwp_roles -> getUserWholesaleRole( $user_id ), $user_id );

  }

  /**
  * Checks and Retrieves the Wholesale Base Price if it exists and this
  * user is a wholesale user
  *
  * @since 1.0.1
  *
  * @param int $product_id The current product id.
  * @param float|null $price Optional. The current price.
  *
  * @return float|null The wholesale price else null
  */
  public function autoship_retrieve_wholesale_base_price( $product_id ){

    $wholesale = NULL;

    // Get the User's Wholesale Role.
    $user_wholesale_role = $this->autoship_get_user_wholesale_role();

    // No Wholesale Role Skip
    if ( !empty( $user_wholesale_role ) ){

      // Get the WholeSale Price for this user. If no Wholesale price then the standard price should be used.
      $wholesale = $this->autoship_calculate_schedule_product_wholesale_price( $product_id, $user_wholesale_role );

    }

    return $this->NonZeroEmpty( $wholesale ) ? NULL : $wholesale;

  }

  /**
  * Adjusts the wholesale price for a user, if no wholesale price exists the
  * supplied regular price will ne used.
  *
  * @since 1.0.1
  *
  * @param int $product_id The current product id.
  * @param float|null $base_wholesale_price. The base wholesale price.
  * @param float|null $regular_price Optional. The current non-wholesale price.
  *
  * @return float|null The wholesale price else null
  */
  public function autoship_adjust_wholesale_price( $product_id, $base_wholesale_price = NULL, $regular_price = NULL ){

    // Get the User's Base Wholesale Price if it exists.
    if ( is_null( $base_wholesale_price ) )
    $base_wholesale_price = $this->autoship_retrieve_wholesale_base_price( $product_id );

    // No Wholesale Role Price Skip
    if ( !is_null( $base_wholesale_price ) ){

      // Get the User's Wholesale Role.
      $user_wholesale_role = $this->autoship_get_user_wholesale_role();

      // Get the WholeSale Price for this user. If no Wholesale price then the standard price should be used.
      $regular_price = floatval( $base_wholesale_price )  - ( floatval( $base_wholesale_price )  * $this->autoship_get_scheduled_discount_percentage( $product_id, $user_wholesale_role ) );

    }

    // Check for empty string in case it was pulled from
    // metadata originally
    return $this->NonZeroEmpty( $regular_price ) ? NULL : $regular_price;

  }

  /**
  * Return Title with wholesale price range for a product drop down.
  *
  * @since     1.0.0
  * @see WWP_Wholesale_Roles->getUserWholesaleRole()
  *
  * @param string  $dropdown The current title and price string
  * @param string  $title The current product title to include in the dropdown.
  * @param float   $originalprice The current regular price from QPilot
  * @param float   $saleprice  The sale price from QPilot
  * @param array   $product  The product data from QPilot
  *
  * @return string The New Product Select Name for the drop down.
  */
  public function autoship_product_dropdown_get_price_range( $dropdown, $title, $originalprice, $saleprice, $product ){

    if ( !class_exists('WWP_Wholesale_Roles') || !class_exists('WWP_Wholesale_Roles') )
    return $dropdown;

    $uses_wc_data = autoship_filter_schedulable_products_use_wc_data();
    $product = $uses_wc_data ? $product : wc_get_product( $product['id'] );

    // Create the new item to run through the pricing method
    $new_item = array(
      'price'     => $originalprice,
      'salePrice' => NULL,
      'quantity'  => 0,
    );

    // Get the new Wholesale price with the added discount if entered
    $prices = $this->autoship_filter_add_schedule_items_wholesale_price( $new_item, '', 1, $product->get_id(),  $product->get_id() );

    // Reformat the value in the drop down.
    $new_dropdown = $dropdown;
    if ( isset( $prices['salePrice'] ) && !empty( $prices['salePrice'] ) ){

      $new_dropdown = sprintf( $dropdown . ' %s %s', trim(apply_filters('wwp_filter_wholesale_price_title_text', __('Wholesale Price:', 'woocommerce-wholesale-prices'))), autoship_get_formatted_price( $prices['salePrice'] ) );

    }

    return apply_filters( 'autoship_product_dropdown_get_price_range',
      $new_dropdown,
      $dropdown,
      $new_item,
      $prices,
      $product->get_id());

  }

  /**
  * Adjusts the html input for WholeSale items to allow for current value.
  * The wholesale plugin currently overrides the value displayed in the
  *
  * @since     1.0.0
  *
  * @param string $product_quantity The input html string.
  * @param array $item The current Scheduled Order Item
  * @param array $scheduled_item The Raw Schduled Order Item from QPilot
  *
  * @return string The filtered html string
  */
  public function autoship_enable_schedule_items_wholesale_price_input ( $product_quantity, $item, $scheduled_item ){

    if ( ( $item['is_sold_individually'] ) || ( 'outofstock' == $item['stock_status'] ) )
    return $product_quantity;

    // Need more efficient way
    $dom = new DOMDocument();
    $dom->loadHTML($product_quantity);

    $xpath = new DOMXPath($dom);
    $tags = $xpath->query('//input[@title="Qty"]');

    // One time purchase has no Qty input so we can skip
    if( $tags->length <= 0 ) {
      return $product_quantity;
    }

    $value = trim($tags[0]->getAttribute('value'));

    if ( $value != $item['qty'] )
    $product_quantity = str_replace('value="'. $value . '"', 'value="'. $item['qty'] . '"', $product_quantity);

    return $product_quantity;

  }

  /**
   * Filter if apply wholesale price per Scheduled Order Item level. Validate if Order Item level requirements are meet or not.
   *
   * @since 1.0.0
   *
   * @param boolean $apply_price           Boolean flag that determines either to apply or not wholesale pricing.
   * @param int     $items_total_price     Total $ Amount for this item.
   * @param int     $item_total            Total Qty for this Item.
   * @param array   $user_wholesale_role   The users wholesale role.
   * @return array|boolean Array of error notices on if order fails wholesale requirements,
   *                       boolean true if passed and should apply wholesale pricing.
   */
  public function autoship_validate_wholesale_price ( $apply_price , $items_total_price , $user_wholesale_role , $item_total = 1, $product_id = false ) {

      $notice                                 = array();
      $wholesale_settings                     = $this->autoship_site_wholesale_settings();
      extract($wholesale_settings);
      $minimum_order_items = NULL;
      $minimum_order_price = NULL;
      $product = wc_get_product( $product_id );

      if( $product_id && $this->usesPremium() ) {
        if ( $minimum_cart_items && is_numeric( $minimum_cart_items ) ) {
          $moq = (int) $minimum_cart_items;
        } else {
          $moq = get_post_meta( $product_id, $user_wholesale_role[0] . '_wholesale_minimum_order_quantity', true );
        }
        $minimum_order_items = ( is_numeric( $moq ) ) ? (int) $moq : NULL;

        if ( $minimum_cart_price && is_numeric( $minimum_cart_price ) ) {
          $minimum_order_price = (int) $minimum_cart_price;
        }
      }


      if ( $override_per_wholesale_role === 'yes' ) {
        if ( !is_array( $per_wholesale_role_order_requirement ) )
          $per_wholesale_role_order_requirement = array();

        if ( array_key_exists( $user_wholesale_role[ 0 ] , $per_wholesale_role_order_requirement ) ) {

          // Use minimum order quantity set for this current wholesale role
          $minimum_order_items    = $per_wholesale_role_order_requirement[ $user_wholesale_role[ 0 ] ][ 'minimum_order_quantity' ];
          $minimum_order_price    = $per_wholesale_role_order_requirement[ $user_wholesale_role[ 0 ] ][ 'minimum_order_subtotal' ];
          $minimum_requirements_conditional_logic = $per_wholesale_role_order_requirement[ $user_wholesale_role[ 0 ] ][ 'minimum_order_logic' ];

        }

      }

      $user_min_order_qty_applied   = false;
      $user_min_order_price_applied = false;

      // Check if min order qty is overridden per wholesale user
      if ( $user_min_order_qty_override === 'yes' ) {
        if ( is_numeric( $user_min_order_qty ) || empty( $user_min_order_qty ) ) {
          $minimum_order_items         = $user_min_order_qty;
          $user_min_order_qty_applied = true;
        }
      }

      // Check if min order price is overridden per wholesale user
      if ( $user_min_order_price_override === 'yes' ) {
        if ( is_numeric( $user_min_order_price ) || empty( $user_min_order_price ) ) {
          $minimum_order_price           = $user_min_order_price;
          $user_min_order_price_applied = true;
        }
      }

      // Check if min order logic is overridden per wholesale user
      if ( $user_min_order_qty_applied && $user_min_order_price_applied ) {
        if ( in_array( $user_min_order_logic , array( 'and' , 'or' ) ) )
            $minimum_requirements_conditional_logic = $user_min_order_logic;
      }

      /**
       * Make min order price requirement compatible with "Aelia Currency Switcher" plugin
       */
      if ( WWP_ACS_Integration_Helper::aelia_currency_switcher_active() ) {
          $active_currency    = get_woocommerce_currency();
          if ( $active_currency != $shop_base_currency )
            $minimum_order_price = WWP_ACS_Integration_Helper::convert( $minimum_order_price , $active_currency , $shop_base_currency );
      }

      if ( isset( $minimum_order_items ) || isset( $minimum_order_price ) ){

        if ( is_numeric( $minimum_order_items ) && ( !is_numeric( $minimum_order_price ) || strcasecmp( $minimum_order_price , '' ) == 0 || ( ( float ) $minimum_order_price <= 0) ) ) {

            $minimum_order_items = (int) $minimum_order_items;
            if ( $item_total < $minimum_order_items ) {
              $message = sprintf(
                __(
                    '%1$sYou did not meet the minimum order quantity %2$s of the product %3$s to activate wholesale pricing. Please increase quantities to the cart to activate adjusted pricing.',
                    'autoship'
                ),
                '<span class="wwpp-notice">',
                '<b>(' . $minimum_order_items . ' items)</b>',
                '<b>' . $product->get_title() . '</b>',
                '</span>'
              );
              $notice = apply_filters( 'autoship_filter_wholesale_price_min_quantity_requirement_failure_notice', array( 'type' => 'notice' , 'message' => $message, ), $item_total, $minimum_order_items, $items_total_price, $minimum_order_price, $wholesale_settings );
            }

        } elseif ( is_numeric( $minimum_order_price ) && ( !is_numeric( $minimum_order_items ) || strcasecmp( $minimum_order_items , '' ) == 0 || ( (int) $minimum_order_items <= 0) ) ){
            $minimum_order_price = (float) $minimum_order_price;
            if ( $items_total_price < $minimum_order_price ) {
              $message = sprintf(
                __(
                    '%1$sYou have not met the minimum order subtotal of %2$s to activate adjusted pricing.
                        Retail  prices will be shown below until the minimum order threshold is met. The cart subtotal calculated with wholesale prices is %3$s%4$s',
                    'woocommerce-wholesale-prices-premium'
                ),
                '<span class="wwpp-notice">',
                '<b>(' . wc_price( $minimum_order_price ) . ')</b>',
                '<b>(' . wc_price( $items_total_price ) . ')</b>',
                '</span>'
              );
              $notice = apply_filters( 'autoship_filter_wholesale_price_min_subtotel_requirement_failure_notice',array( 'type' => 'notice' , 'message' => $message ), $item_total, $minimum_order_items, $items_total_price, $minimum_order_price, $wholesale_settings );
            }

        } elseif ( is_numeric($minimum_order_price) && is_numeric($minimum_order_items) ) {

            if ( strcasecmp( $minimum_requirements_conditional_logic , 'and' ) === 0) {
                if ( $item_total < $minimum_order_items || $items_total_price < $minimum_order_price ) {
                  $message = sprintf(
                    __(
                        '%1$sYou have not met the minimum order quantity of %2$s and minimum order subtotal of %3$s to activate adjusted pricing. 
                            Retail prices will be shown below until the minimum order threshold is met.
                            The cart subtotal calculated with wholesale prices is %4$s%5$s',
                        'woocommerce-wholesale-prices-premium'
                    ),
                    '<span class="wwpp-notice">',
                    '<b>(' . $minimum_cart_items . ')</b>',
                    '<b>(' . wc_price( $minimum_order_price ) . ')</b>',
                    '<b>(' . wc_price( $items_total_price ) . ')</b>',
                    '</span>',
                  );
                  $notice = apply_filters( 'autoship_filter_wholesale_price_min_quantity_and_min_subtotel_requirement_failure_notice', array( 'type' => 'notice' , 'message' => $message ), $item_total, $minimum_order_items, $items_total_price, $minimum_order_price, $wholesale_settings );
                }

            } elseif ( $item_total < $minimum_order_items && $items_total_price < $minimum_order_price ) {
              $message = sprintf(
                __(
                    '%1$sYou have not met the minimum order quantity of %2$s or minimum order subtotal of %3$s to activate adjusted pricing.
                        Retail prices will be shown below until the minimum order threshold is met.
                        The cart subtotal calculated with wholesale prices is %4$s%5$s',
                    'woocommerce-wholesale-prices-premium'
                ),
                '<span class="wwpp-notice">',
                '<b>(' . $minimum_order_items . ')</b>',
                '<b>(' . wc_price( $minimum_order_price ) . ')</b>',
                '<b>(' . wc_price( $items_total_price ) . ')</b>',
                '</span>',
              );
              $notice = apply_filters( 'autoship_filter_wholesale_price_min_quantity_and_min_subtotel_requirement_failure_notice', array( 'type' => 'notice' , 'message' => $message ), $item_total, $minimum_order_items, $items_total_price, $minimum_order_price, $wholesale_settings );

          }

        }

      }

      $notice = apply_filters( 'autoship_filter_wholesale_price_requirement_failure_notice' , $notice , $minimum_order_items , $minimum_order_price , $item_total , $items_total_price , $user_wholesale_role );

      return !empty( $notice ) ? $notice : $apply_price;

  }

  /************************************
  *         Cart Adjustments
  *************************************/

  /**
  * Adjusts the Items if needed for the Autoship Price
  *
  * @param array $data The current cart item's data array.
  * @param string $cart_item_key The current cart item's hash key
  */
  public function autoship_adjust_cart_item_general_wholesale_price( $wholesale_price, $cart_item, $user_wholesale_role, $cart_object ){

    // Check if Autoship options are selected and if not
    if ( !isset( $cart_item['autoship_frequency_type'] ) || empty( $cart_item['autoship_frequency_type'] ) || !isset( $cart_item['autoship_frequency'] ) || empty( $cart_item['autoship_frequency'] ) )
    return $wholesale_price;

    return $this->autoship_adjust_wholesale_price( $product_id, $wholesale_price );

  }

  /**
   * Return adjusted product wholesale price for a given wholesale user role.
   *
   * @param array   $values              Array containing the price and type
   * @param int     $product_id          Product id.
   * @param array   $user_wholesale_role Array of user wholesale roles.
   * @param array   $cart_item           Cart item data.
   * @param WC_Cart $cart_object         The current cart object
   *
   * @return string Filtered wholesale price.
   */
  public function autoship_adjust_cart_item_wholesale_price( $values, $product_id, $user_wholesale_role, $cart_item, $cart_object ){


    // Check if Autoship options are selected and if not
    if ( !isset( $cart_item['autoship_frequency_type'] ) || empty( $cart_item['autoship_frequency_type'] ) || !isset( $cart_item['autoship_frequency'] ) || empty( $cart_item['autoship_frequency'] ) )
    return $values;

    $values['wholesale_price'] = $this->autoship_adjust_wholesale_price( $product_id, $values['wholesale_price'] );

    return $values;

  }

  /************************************
  *         Native UI Adjustments
  *************************************/

  /**
  * Adjust the price for the wholesale price.
  *
  * @since     1.0.0
  *
  * @param string  $formatted_amount The current formatted price string
  * @param array   $item The current item data array.
  * @param array   $product  The product data from QPilot
  *
  * @return string The New formatted amount.
  */
  public function autoship_added_product_html_get_price( $formatted_amount, $item, $product ){

    // Create the new item to run through the pricing method
    $new_item = array(
      'price'     => $item['price'],
      'salePrice' => NULL,
      'quantity'  => $item['min_input'],
    );

    // Get the new Wholesale price with the added discount if entered
    $prices = $this->autoship_add_schedule_items_wholesale_price( $new_item, '', 1, $item['wc_product_id'],  $item['wc_product_id'] );

    if ( isset( $prices['salePrice'] ) && !empty( $prices['salePrice'] ) )
    return autoship_get_formatted_price( $prices['salePrice'] );

    return $formatted_amount;

  }


  /**
  * Adjusts the price for new order items added in the Autoship Scheduled Order UI.
  *
  * @since     1.0.0
  *
  * @param array {
  *      $new_items An array of the new scheduled order items being added.
  *      'quantity'          => $qty,
  *      "ScheduledOrderId"  => $order_id,
  *      "ProductId"         => $product_id,
  *      "Price"             => $item_price,
  *      'salePrice'         => $item_sale_price,
  *      'quantity'          => $qty
  * }
  * @param string $frequency_type The current frequency type.
  * @param int $frequency The current frequency.
  * @param int $product_id The current autoship product id.
  * @param int $external_id The current wc product id.
  *
  * @return array The new items after adjustment
  */
  public function autoship_add_schedule_items_wholesale_price ( $new_item, $frequency_type, $frequency, $product_id, $external_id ){
    // Skip when product is "added" to SO, but Update items button is not pressed yet
    // Prevents "fake" notice to be shown or duplicated notice
    if( $new_item['quantity'] <= 0 ) {
      return $new_item;
    }
    // If you need a Product object for the above:
    $product = wc_get_product( $external_id );

    // Itterate throught the current scheduled items.
    $autoship = array();
    $autoship['price']    = $new_item['price'];
    $autoship['type']     = $product->is_type( 'simple' ) ? 'simple' : 'variation';
    $autoship['qty']      = $new_item['quantity'];
    $autoship['id']       = $external_id;
    $autoship['rule_id']  = 'simple' == $autoship['type'] ?
    $external_id : wp_get_post_parent_id( $external_id );

    // Get the users Wholesale Role.
    $user_wholesale_role = $this->autoship_get_user_wholesale_role();

    // Apply the wholesale pricing adjustment based on the products rule sets.
    $autoship['adjusted_price'] = $this->autoship_adjust_wholesale_price( $autoship['id'] );

    // No Wholesale price - use the current Prices else use wholesale as sale prices
    if ( !$this->NonZeroEmpty( $autoship['adjusted_price'] ) && $autoship['adjusted_price'] != $autoship['price'] ){

      // Validate the price is correct for this quantity
      $apply = $this->autoship_validate_wholesale_price ( true, round( $autoship['adjusted_price'] * $autoship['qty'], 2 ), $user_wholesale_role, $autoship['qty'], $external_id );

      if ( $apply === true ){
        $new_item['salePrice'] = $autoship['adjusted_price'];
      } else {
        wc_add_notice( $apply['message'], $apply['type'] );
      }

    }

    return $new_item;

  }

 /**
  * Adjusts the price for Add item dropdown in the Autoship Scheduled Order UI.
  *
  * @since     1.0.0
  *
  * @param array {
  *      $new_items An array of the new scheduled order items being added.
  *      'quantity'          => $qty,
  *      "ScheduledOrderId"  => $order_id,
  *      "ProductId"         => $product_id,
  *      "Price"             => $item_price,
  *      'salePrice'         => $item_sale_price,
  *      'quantity'          => $qty
  * }
  * @param string $frequency_type The current frequency type.
  * @param int $frequency The current frequency.
  * @param int $product_id The current autoship product id.
  * @param int $external_id The current wc product id.
  *
  * @return array The new items after adjustment
  */
  public function autoship_filter_add_schedule_items_wholesale_price ( $new_item, $frequency_type, $frequency, $product_id, $external_id ){

    // If you need a Product object for the above:
    $product = wc_get_product( $external_id );

    // Itterate throught the current scheduled items.
    $autoship = array();
    $autoship['price']    = $new_item['price'];
    $autoship['type']     = $product->is_type( 'simple' ) ? 'simple' : 'variation';
    $autoship['qty']      = $new_item['quantity'];
    $autoship['id']       = $external_id;
    $autoship['rule_id']  = 'simple' == $autoship['type'] ?
    $external_id : wp_get_post_parent_id( $external_id );

    // Get the users Wholesale Role.
    $user_wholesale_role = $this->autoship_get_user_wholesale_role();

    // Apply the wholesale pricing adjustment based on the products rule sets.
    $autoship['adjusted_price'] = $this->autoship_adjust_wholesale_price( $autoship['id'] );

    // No Wholesale price - use the current Prices else use wholesale as sale prices
    if ( !$this->NonZeroEmpty( $autoship['adjusted_price'] ) && $autoship['adjusted_price'] != $autoship['price'] ){
      $new_item['salePrice'] = $autoship['adjusted_price'];
    }

    return $new_item;

  }

  /**
  * Adjusts the price for Qty updates in the Autoship Scheduled Order UI.
  *
  * @since     1.0.0
  *
  * @param array $updated_items An array of the current scheduled order items being updated.
  * @param array $original_items An array of the original scheduled order items.
  * @param int   $order_id The QPilot order ID.
  * @param string $action The Action being performed.
  * @param array $data The Scheduled Order Data.
  *
  * @return array The updated items after adjustment
  */
  public function autoship_update_schedule_items_wholesale_price ( $updated_items , $original_items, $order_id, $action , $data ){

    // Get the users Wholesale Role.
    $user_wholesale_role = $this->autoship_get_user_wholesale_role();

    // Not a Wholesale user skip
    if ( empty( $user_wholesale_role ) )
    return $updated_items;

    // Itterate throught the current scheduled items.
    $autoship = array();
    foreach ( $updated_items as $key => $updated_item ) {

      $autoship[$key]['price']    = $updated_item['price'];
      $autoship[$key]['saleprice']= $updated_item['product']['salePrice'];
      $autoship[$key]['type']     = $updated_item['product']['Type'];
      $autoship[$key]['qty']      = $updated_item['quantity'];
      $autoship[$key]['id']       = $updated_item['product']['id'];
      $autoship[$key]['rule_id']  = 'simple' == $autoship[$key]['type'] ?
      $updated_item['product']['id'] :
      wp_get_post_parent_id( $updated_item['product']['id'] );

    }

    // Loop through the autoship products and adjust prices based on sets.
    foreach ($autoship as $key => $item) {

      // Get the WholeSale Price for this user. If no Wholesale price then the standard price should be used.
      $autoship[$key]['adjusted_price'] = $this->autoship_adjust_wholesale_price( $autoship[$key]['id'] );

      // No Wholesale price - use the current Prices else use wholesale as sale prices
      if ( !$this->NonZeroEmpty( $autoship[$key]['adjusted_price'] ) && $autoship[$key]['adjusted_price'] != $autoship[$key]['price'] ){

        $apply = $this->autoship_validate_wholesale_price ( true, round( $autoship[$key]['adjusted_price'] * $item['qty'], 2 ), $user_wholesale_role, $item['qty'], $autoship[$key]['id'] );

        if ( $apply === true ){
          $updated_items[$key]['salePrice'] = $autoship[$key]['adjusted_price'];
        } else {

          // Reset the price
          $updated_items[$key]['salePrice'] = apply_filters( 'autoship_update_schedule_items_wholesale_price', NULL, $autoship[$key], $updated_items[$key], $user_wholesale_role );

          wc_add_notice( $apply['message'], $apply['type'] );
          continue;
        }

      }

    }

    return $updated_items;

  }

  /************************************
  *         Product Page Adjustments
  *************************************/

  /**
  * Adds the additional wholesale rate and discount percentage to the price array
  * @since 1.0.0
  *
  * @param array $prices The current list of prices for the product.
  * @param int $product_id The current product id.
  * @param wc_product $product The woocommerce product.
  *
  * @return array The adjusted prices array.
  */
  public function autoship_all_prices_array_w_wholesale( $prices, $product_id, $product ){

    // if this user is a wholesale user and has a wholesale price
    // then we need to adjust all prices to be based off the new discounted price.
    // Get the User's Wholesale Role.
    $user_wholesale_role = $this->autoship_get_user_wholesale_role();
    $base_wholesale_price = $this->autoship_retrieve_wholesale_base_price( $product_id );
    $wholesale_price = !empty( $user_wholesale_role ) ? $this->autoship_adjust_wholesale_price( $product_id, $base_wholesale_price ) : NULL;

    if ( !is_null( $wholesale_price ) ){

      // The Custom Autoship Checkout Price ( either wholesale or autoship )
      $prices['autoship_checkout_price']            = $this->autoship_adjust_wholesale_price( $product_id, $base_wholesale_price, $prices['autoship_checkout_price'] );

      // The Custom Autoship Checkout Price including or excluding tax, based on the 'woocommerce_tax_display_shop' setting.
      $prices['autoship_checkout_display_price']    = wc_get_price_to_display( $product, array( 'price' => $prices['autoship_checkout_price'] ) );

      // The final Checkout Price ( either Autoship or WC )
      $prices['checkout_price']                     = autoship_checkout_price( $product, array( 'price' => $prices['price'], 'discount' => $prices['autoship_checkout_price'] )  );

      // Record if the price is WC or Autoship
      $prices['checkout_price_is_autoship']         = $prices['checkout_price'] != $prices['price'];

      // The final Checkout Price ( either Autoship or WC ) including or excluding tax, based on the 'woocommerce_tax_display_shop' setting.
      $prices['checkout_display_price']             = wc_get_price_to_display( $product, array( 'price' => $prices['checkout_price'] ) );

      // The Custom Autoship Price for Recurring Orders ( either wholesale or autoship )
      $prices['autoship_recurring_price']           = $this->autoship_adjust_wholesale_price( $product_id, $base_wholesale_price, $prices['autoship_recurring_price'] );

      // The Custom Autoship Price for Recurring Orders including or excluding tax, based on the 'woocommerce_tax_display_shop' setting.
      $prices['autoship_recurring_display_price']   = wc_get_price_to_display( $product, array( 'price' => $prices['autoship_recurring_price'] ) );

      // The regular price is the wholesale price in this instance since
      // recurring price is a discount on the wholesale
      $prices['wholesale']             = $base_wholesale_price;
      $prices['regular_price']         = $prices['wholesale'];

      // The Products Regular Price if/when it's not on sale including or excluding tax, based on the 'woocommerce_tax_display_shop' setting.
      $prices['regular_display_price']              = wc_get_price_to_display( $product, array( 'price' => $prices['regular_price'] ) );

      // Get the calculated Percent Discount for the Checkout Price
      $prices['autoship_percent_discount']          = autoship_percent_discount( $product, array( 'price' => $prices['regular_price'], 'discount' => $prices['autoship_checkout_price'] ) );

      // Get the calculated Percent Discount for the Recurring Price
      $prices['autoship_percent_recurring_discount']= autoship_percent_recurring_discount( $product, array( 'price' => $prices['regular_price'], 'discount' => $prices['autoship_recurring_price'] ) );

    	$prices['wholesale_pct']        = 100 * $this->autoship_get_scheduled_discount_percentage( $product_id, $user_wholesale_role );
      $prices['wholesale_discount']   = $prices['wholesale'] - ( $prices['wholesale'] * ( $prices['wholesale_pct'] / 100 ) );
      $prices['wholesale_product_id'] = $product_id;

    }

    return $prices;

  }

  /**
  * Adjusts the autoship notice if wholesale prices exist.
  * @since 1.0.0
  *
  * @param string $output The current autoship notice
  * @param array $strings The array of notice components
  * @param array $prices The current list of prices for the product.
  * @param WC_Product $product The current product.
  *
  * @return string The adjusted autoship notice string
  */
  public function autoship_checkout_recurring_discount_wholesale_string ( $output, $strings, $prices, $product ){

    // Create the new discount string if there's a wholesale price
    $new_output = $strings['autoship_string']
    . sprintf( ' <span class="autoship-checkout-percent-discount">%s%%</span> on Wholesale Orders', $prices['autoship_percent_discount'] )
    . $strings['price_string'];

    // Check if there's a wholesale price for this user
    // and if so return the discount string
    return !isset( $prices['wholesale'] ) || is_null( $prices['wholesale'] ) ? $output : $new_output;

  }

  /**
  * Adjusts the autoship displayed price html.
  * @since 1.0.0
  *
  * @param array $data The data to use to display
  * @param WC_Product $product The WooCommerce Product
  *
  * @return array The adjusted data
  */
  public function autoship_adjust_displayed_wholesale_string_price( $data, $product ){

    if ( !isset( $data['prices']['wholesale'] ) )
    return $data;

    $data['discount_display_price']          = $data['discounted_price_html'];
    $data['discount_display_price_selector'] = 'simple' == $product->get_type() ?
    ".wholesale_price_container .woocommerce-Price-amount.amount > bdi" : ".wholesale_price_container > ins";

    return $data;

  }

  /************************************
  *         Checkout Adjustments
  *************************************/

  /**
  * Adjusts the recurring price for scheduled order items at checkout.
  *
  * @since     1.0.0
  *
  * @param array $scheduled_order_item_data The current scheduled order line item data.
  * @param int   $order_id                  The WC Order id.
  * @param WC_Order_Item $item              The current WC_Order_Item data.
  *
  * @return array The updated scheduled order line item data.
  */
  public function autoship_update_scheduled_order_full_item_data ( $scheduled_order_item_data, $order_id, $item ){

    // Get the User's Wholesale Role.
    $user_wholesale_role = $this->autoship_get_user_wholesale_role();

    // No Wholesale Role Skip
    if ( empty( $user_wholesale_role ) )
    return $scheduled_order_item_data;

    // Grab the wc product and info we need
    $product_id               = $scheduled_order_item_data['product']['id'];

    $autoship = array();
    $product                  = wc_get_product( $product_id );
    $autoship['id']           = $product_id;
    $autoship['price']        = $product->get_price();
    $autoship['qty']          = $scheduled_order_item_data['quantity'];
    $autoship['type']         = $product->is_type( 'simple' ) ? 'simple' : 'variation';
    $autoship['rule_id']      = 'simple' == $autoship['type'] ? $product_id : wp_get_post_parent_id( $product_id );

    // Get the WholeSale Price for this user. If no Wholesale price then the standard price should be used.
    $autoship['adjusted_price'] = $this->autoship_adjust_wholesale_price( $autoship['id'] );

    // No Wholesale price - use the current Prices else use wholesale as sale prices
    if ( !$this->NonZeroEmpty( $autoship['adjusted_price'] ) && $autoship['adjusted_price'] != $autoship['price'] ){

      $apply = $this->autoship_validate_wholesale_price ( true, round( $autoship['adjusted_price'] * $autoship['qty'], 2 ), $user_wholesale_role, $autoship['qty'], $autoship['id'] );

      if ( $apply === true )
      $scheduled_order_item_data['salePrice'] = $autoship['adjusted_price'];

    }

    return $scheduled_order_item_data;

  }

  private function usesPremium() {
    return class_exists( 'WooCommerceWholeSalePricesPremium' );
  }

}

/**
 * Load Autoship_Cloud_Wholesale_Pricing
 */
function autoship_wholesale_pricing_init() {

  // Bail if extension in use and show admin notice
  if( class_exists( 'Autoship_Cloud_Wholesale_Pricing_Extension' ) ) {
    add_action( 'admin_notices', 'autoship_cloud_wholesale_pricing_notice' );
    return;
  }

  // Check for Wholesuite plugin
  if ( class_exists( 'WooCommerceWholeSalePrices' ) ) {
    $wholesale = Autoship_Cloud_Wholesale_Pricing::get_instance();
    $wholesale->load();
  }

}
add_action( 'plugins_loaded', 'autoship_wholesale_pricing_init', 100 );


/**
* Outputs the notice if Autoship Cloud Solutions - Wholesale Pricing Extension plugin in use
*/
function autoship_cloud_wholesale_pricing_notice(){
    ?><div class="error"><p>Autoship Cloud Solutions - Wholesale Pricing Extension is now part of the Autoship Cloud plugin.</p><p>Please deactivate and uninstall the Autoship Cloud Solutions - Wholesale Pricing Extension plugin.</p></div><?php
}
