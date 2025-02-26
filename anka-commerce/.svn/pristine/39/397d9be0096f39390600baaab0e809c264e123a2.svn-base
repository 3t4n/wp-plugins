<?php
  /**
   * ANKA Commerce Payment Button integration to handle payment buttons feature.
   *
   * @package Anka_Commerce
   * @since 1.1.0
   */

  if ( ! defined( 'ABSPATH' ) ) {
    exit;
  }

  class Anka_Commerce_Payment_Button {
    /**
     * Enqueue scripts and styles.
     */
    public static function anka_commerce_payment_button_enqueue_scripts() {
      if (has_shortcode(get_post()->post_content, 'anka_pay_button')) {
        wp_enqueue_style(
          'ankapay-payment-button-style',
          esc_url(ANKA_COMMERCE_PLUGIN_URL . 'assets/css/payment-button-style.css'),
          array(),
          ANKA_COMMERCE_VERSION
        );
      }
    }

    /**
     * Enqueue scripts and styles for the block editor to render the payment button block in Gutenberg.
     */
    public static function anka_commerce_payment_button_guttenberg_register_block() {
      $script_path       = '/build/anka-commerce-payment-button-block.js';
      $script_asset_path = ANKA_COMMERCE_PLUGIN_DIR . 'build/anka-commerce-payment-button-block.asset.php';
      $script_asset      = file_exists( $script_asset_path )
        ? require( $script_asset_path )
        : array(
          'dependencies' => array('wp-hooks', 'wp-element', 'wp-blocks', 'wp-editor', 'wp-components'),
          'version'      => ANKA_COMMERCE_VERSION
        );
      $script_url        = esc_url( ANKA_COMMERCE_PLUGIN_URL . $script_path );

      wp_register_script(
        'anka_commerce_payment_button_block',
        $script_url,
        $script_asset[ 'dependencies' ],
        $script_asset[ 'version' ],
        true
      );

      if ( function_exists( 'wp_set_script_translations' ) ) {
        wp_set_script_translations(
          'anka_commerce_payment_button_block',
          'anka-commerce',
          ANKA_COMMERCE_PLUGIN_DIR . 'languages/'
        );
      }

      register_block_type('anka-commerce/payment-button', array(
        'editor_script' => 'anka_commerce_payment_button_block',
      ));
    }

    /**
     * Plugin includes.
     */
    public static function anka_commerce_payment_button_includes() {
      require_once ANKA_COMMERCE_PLUGIN_DIR . 'includes/payment-button/class-anka-commerce-payment-button-admin-setting.php';
    }

    /**
     * Render the shortcode output for a payment button.
     */
    public static function anka_commerce_payment_button_render_shortcode($atts) {
      $atts = shortcode_atts(['shortcode' => ''], $atts, 'anka_pay_button');
      $button = self::anka_commerce_payment_button_get_by_shortcode(sanitize_text_field($atts['shortcode']));
      if (!$button) return '';

      $button_url = esc_url($button->payment_url ?? '#');
      $button_text = esc_html($button->button_text ?? __('Pay Now', 'anka-commerce'));
      $button_color = esc_attr(get_option('anka_commerce_payment_button_btn_color', '#B818B2'));

      return sprintf(
        '<div><a href="%s" class="anka-pay-button" style="background-color: %s;">%s</a></div>',
        $button_url, $button_color, $button_text
      );
    }

    /**
     * Retrieve a payment button by shortcode.
     * It caches the result for 1 hour.
     */
    private static function anka_commerce_payment_button_get_by_shortcode($shortcode) {
      global $wpdb;

      $shortcode = sanitize_text_field($shortcode);
      $cache_key = 'anka_commerce_payment_button_' . $shortcode;
      $button = wp_cache_get($cache_key, 'anka_commerce');

      if (false === $button) {
        $button = $wpdb->get_row($wpdb->prepare(
          "SELECT * FROM {$wpdb->prefix}anka_commerce_payment_buttons WHERE shortcode = %s",
          $shortcode
        ));

        if ($button) {
          wp_cache_set($cache_key, $button, 'anka_commerce', 3600); // Cache for 1 hour
        }
      }

      return $button;
    }

    /**
     * Create the success page for the payment button.
     */
    public static function anka_commerce_payment_button_create_success_page() {
      $page_slug = 'anka-commerce-payment-button-success';
      $existing_page = get_page_by_path($page_slug);

      if (!$existing_page) {
        $page_data = array(
          'post_title'   => __('Payment Success', 'anka-commerce'),
          'post_content' => __('Thank you for your payment! Your transaction was successful.', 'anka-commerce'),
          'post_status'  => 'publish',
          'post_type'    => 'page',
          'post_name'    => $page_slug,
        );

        $page_id = wp_insert_post($page_data);

        if ($page_id && !is_wp_error($page_id)) {
          update_option('anka_commerce_payment_button_success_page_id', $page_id);
        }
      }
    }

    /**
     * Create ANKA Pay payment link for the payment button order.
     */
    public static function anka_commerce_payment_button_create_payment_link($data) {
      $data = self::anka_commerce_payment_button_build_payment_link_data($data);

      $api_token = get_option('anka_commerce_api_token') ?: get_option('woocommerce_ankapay_settings')['api_token'];

      if (empty($api_token)) {
        error_log('ANKA Pay API token is missing.');
        return false;
      }

      $ankapay_api = new Anka_Pay_API($api_token);
      $response = $ankapay_api->create_payment_link($data);

      return $response;
    }

    /**
     * Register the REST API route for payment buttons.
     */
    public static function anka_commerce_payment_button_register_rest_api_route() {
      register_rest_route(
        'anka-commerce/v1',
        '/payment-buttons',
        array(
          'methods' => WP_REST_Server::READABLE,
          'callback' => array('Anka_Commerce_Payment_Button', 'anka_commerce_payment_button_get_payment_buttons'),
          'permission_callback' => function() {
            return current_user_can('edit_posts');
          }
        )
      );
    }

    /**
     * Retrieve all payment buttons.
     */
    public static function anka_commerce_payment_button_get_payment_buttons() {
      global $wpdb;

      $cache_key = 'anka_commerce_payment_buttons_all';
      $buttons = wp_cache_get($cache_key, 'anka_commerce');

      if ($buttons === false) {
        $buttons = $wpdb->get_results("SELECT id, title, shortcode, payment_url FROM {$wpdb->prefix}anka_commerce_payment_buttons");

        if (!empty($buttons)) {
          wp_cache_set($cache_key, $buttons, 'anka_commerce', 3600); // Cache for 1 hour
        }
      }

      $response = array();
      foreach ($buttons as $button) {
        $response[] = array(
          'id' => $button->id,
          'title' => $button->title,
          'shortcode' => $button->shortcode,
          'payment_url' => $button->payment_url
        );
      }

      return rest_ensure_response($response);
    }

    public static function anka_commerce_payment_button_settings_link($links) {
      $settings_link = '<a href="' . admin_url('admin.php?page=anka_commerce_payment_buttons_settings') . '">' . __('Settings', 'anka-commerce') . '</a>';
      return array_merge(array($settings_link), $links);
    }

    /**
     * Build the payment link data for the payment button order.
     */
    private static function anka_commerce_payment_button_build_payment_link_data($data) {
      $default_success_page = get_page_by_path('anka-commerce-payment-button-success');
      $success_page_id = get_option('anka_commerce_payment_button_success_page_id', $default_success_page ? $default_success_page->ID : 0);
      $success_page_url = $success_page_id ? get_permalink($success_page_id) : home_url();

      $payload = array(
        'type' => 'payment_links',
        'attributes' => array(
          'title' => $data['title'],
          'description' => substr($data['description'], 0, 250),
          'amount_cents' => self::anka_commerce_payment_button_amount_in_cents($data['amount'], $data['currency']),
          'amount_currency' => $data['currency'],
          'shippable' => false,
          'reusable' => true,
          'callback_url' => esc_url($success_page_url),
          'source' => 'wordpress'
        )
      );

      return $payload;
    }

    /**
     * Convert the payment button amount to cents.
     */
    private static function anka_commerce_payment_button_amount_in_cents($amount, $currency) {
      $currency = strtoupper($currency);
      $cent_multiplier = in_array( $currency, Anka_Pay_API::CENTLESS_CURRENCIES ) ? 1 : 100;
      return intval($amount * $cent_multiplier);
    }
  }
?>
