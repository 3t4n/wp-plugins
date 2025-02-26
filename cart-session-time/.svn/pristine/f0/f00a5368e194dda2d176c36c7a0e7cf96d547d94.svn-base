<?php

// database
register_activation_hook(__FILE__, 'cst_database_install');
register_uninstall_hook(__FILE__, 'cst_database_delete');

/* table make */
function cst_database_install()
{
  global $wpdb;
  $table_name = esc_sql($wpdb->prefix . 'andbro_table');
  $charset_collate = $wpdb->get_charset_collate();

  if ($wpdb->get_var("show tables like '$table_name'") != $table_name) {
    $sql = $wpdb->prepare(
      "CREATE TABLE %s (
        query_num int,
        file_name VARCHAR(400),
        item1 VARCHAR(30),
        item2 VARCHAR(30),
        item3 VARCHAR(30)
      ) %s;",
      $table_name,
      $charset_collate
    );

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
  }
}

/* delete database */
function cst_database_delete()
{
  global $wpdb;
  $table_name = esc_sql($wpdb->prefix . 'andbro_table');
  $wpdb->query($wpdb->prepare("DROP TABLE IF EXISTS %s", $table_name));
}

/* setting wiget */
add_action('admin_menu', 'cst_add_setting_page');
function cst_add_setting_page()
{
  add_menu_page(
    'Cart Session Plugin',
    'Cart Session Time',
    'administrator',
    __FILE__,
    'cst_setting_page',
    'dashicons-clock',
    56,
  );
}
/* setting page include */
function cst_setting_page()
{
  require_once plugin_dir_path(__FILE__) . 'inc/setting-page.php';
}

// Clear cart
function woocommerce_clear_cart()
{
  if (class_exists('WooCommerce')) {
    global $woocommerce;
    // Get current time
    $current_time = (new DateTime(current_time('Y-m-d H:i:s'), new DateTimeZone('Asia/Tokyo')))->format('U');
    $time_name_all = sanitize_text_field('time_name_all');
    // Get previously saved value if available
    $time_val_all = get_option($time_name_all);
    // User setting time
    $expiry_in_seconds = intval($time_val_all);
    // Check if active time is set in a cookie
    if (!isset($_COOKIE['active_time'])) {
      // Set the current time
      setcookie('active_time', (new DateTime(current_time('Y-m-d H:i:s'), new DateTimeZone('Asia/Tokyo')))->format('U'), time() + (10 * 365 * 24 * 60 * 60), '/');
    } else {
      // Add the set time
      $cart_expiry_time = intval($_COOKIE['active_time']) + $expiry_in_seconds;
      // Calculate the remaining time
      $diff = $cart_expiry_time - $current_time;

      // Clear cart if the time is up
      if ($diff < 0 && isset($woocommerce) && property_exists($woocommerce, 'cart') && method_exists($woocommerce->cart, 'empty_cart')) {
        $woocommerce->cart->empty_cart();
      }
    }
  }
}
add_action('wp_footer', 'woocommerce_clear_cart');

// Clear cookie
function my_custom_function()
{
  setcookie('active_time', '', time() - 3600, "/");
}
add_action('woocommerce_add_to_cart', 'my_custom_function', 10, 3);
add_action('woocommerce_ajax_added_to_cart', 'my_custom_function', 10, 3);
