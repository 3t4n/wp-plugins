<?php
/** PB API info resource */

if ( ! defined( 'ABSPATH' ) ) {
    die;
}

if ( ! function_exists( 'get_plugins' ) ) {
	require_once ABSPATH . 'wp-admin/includes/plugin.php';
}

add_action( 'rest_api_init', function () {
  register_rest_route( 'wc/sharespine', '/info',
  array(
      'methods' => 'GET',
      'permission_callback' => function () {
          return current_user_can("read");
      },
      'callback' => function() {
          include( ABSPATH . WPINC . '/version.php' );

          $sh = new Sharespine_ApiInfo();

          $out = array(
              "wordpress_version" => $wp_version,
              "woocommerce_version" => $sh->get_woocommerce_version(),
              "plugin_version" => $sh->plugin["Version"],
              "php_version" => phpversion(),
              "default_currency" => get_woocommerce_currency(),
              "default_language" => get_locale(),
              "shop_country" => $sh->get_country(),
              "timezone" => $sh->get_timezone(),
              "server_time" => gmdate("Y-m-d\\Th:m:s\\Z"),
              "price_num_decimals" => wc_get_price_decimals(),
              "tax_included" => wc_prices_include_tax(),
              "weight_unit" => get_option( 'woocommerce_weight_unit' ),
              "dimension_unit" => get_option( 'woocommerce_dimension_unit' ),
              "plugins" => $sh->get_plugins(),
              "taxes" => $sh->get_taxes()
          );

          return $out;
      }
  )
  );
  register_rest_route( 'wc/sharespine', '/orders/orderstatuses',
  array(
      'methods' => 'GET',
      'permission_callback' => function () {
          return current_user_can("read");
      },
      'callback' => function() {
          $sh = new Sharespine_ApiInfo();
          $out = $sh->get_order_statuses();

          return $out;
      }
  )
  );
});

class Sharespine_ApiInfo
{
    public function __construct()
    {
        $this->base_location = wc_get_base_location();

        $this->all_plugins = get_plugins();
        $this->plugin =
            $this->all_plugins["sharespine-woocommerce-connector/sharespine-woocommerce-connector.php"];
    }

    public function get_woocommerce_version()
    {
        global $woocommerce;

        if ($woocommerce->version) {
            return $woocommerce->version;
        } else {
            /* Find woocommerce */
            foreach ($this->all_plugins as $key => $val) {
                if (strpos($key, "/woocommerce.php") !== false)
                    return $val["Version"];
            }
        }
    }

    public function get_plugins()
    {
        /* Remap plugins */
        $plugins = array();
        foreach ($this->all_plugins as $key => $val) {
            $pl = array(
                "id" => $key,
                "name" => $val["Name"],
                "Version" => $val["Version"]
            );
            array_push($plugins, $pl);
        }

        return $plugins;
    }

    public function get_timezone()
    {
        /* Find timezone */
        $tz = get_option('timezone_string');
        if (!$tz) {
            $tz = get_option('gmt_offset');
            if ($tz < 0) $tz = "UTC" . $tz;
            else $tz = "UTC+" . $tz;
        }

        return $tz;
    }

    public function get_country()
    {
        return $this->base_location["country"];
    }

    public function get_taxes()
    {
        $out = Array();

        $classes = WC_Tax::get_tax_classes();
        foreach ($classes as $class) {
            $slug = sanitize_title($class);
            $rate = WC_Tax::get_base_tax_rates($class);

            array_push($out, Array(
                "class" => $class,
                "slug" => $slug,
                "rate" => $rate
            ));
        }

        return $out;
    }

    public function get_order_statuses()
    {
        $out = Array();

        // Get Woocommerce order statuses
        $wc_order_statuses = wc_get_order_statuses();

        // Strip wc- prefix from status array keys
        foreach( $wc_order_statuses as $key => $status ) {
            if ( substr( $key, 0, 3 ) == 'wc-' ) {
                $out[ str_replace( 'wc-', '', $key ) ] = $status;
            } else {
                $out[ $key ] = $status;
            }
        }

        return $out;
    }
}
?>