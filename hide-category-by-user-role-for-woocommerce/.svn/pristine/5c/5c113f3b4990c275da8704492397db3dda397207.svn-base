<?php

/**
 * Operations of the plugin are included here.
 *
 * @since 1.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

/*
*  WOO Get Categories
*/

function tswchc_get_woo_categories() {

  $taxonomy     = 'product_cat';
  $orderby      = 'name';
  $empty        = 0;

  $args = array(
    'taxonomy'     => $taxonomy,
    'orderby'      => $orderby,
    'hide_empty'   => $empty
  );

  return get_categories($args);
}

/*
*  TS-WCHC Get Category Hierarchy
*/


function tswchc_get_categories_hierarchy() {

  $categories = tswchc_get_woo_categories();

  foreach ($categories as $key => $category) {

    $category->children = tswchc_get_woo_category_childs($category);
  }

  return $categories;
}

function tswchc_get_available_roles() {

  global $wp_roles;

  $wp_roles->roles['guest'] = ['name' => 'Guest'];

  ksort($wp_roles->roles);

  return $wp_roles->roles;
}

/*
*  TS-WCHC Get Category Childs
*/

function tswchc_get_woo_category_childs($parent_cat) {

  $taxonomy     = 'product_cat';
  $orderby      = 'name';
  $empty        = 0;

  $args = array(
    'taxonomy'     => $taxonomy,
    'orderby'      => $orderby,
    'hide_empty'   => $empty
  );

  $defaults = array(
    'parent' => $parent_cat->term_id,
    'hide_empty' => false
  );

  $r = wp_parse_args($args, $defaults);

  $terms = get_terms($taxonomy, $r);

  $children = array();

  foreach ($terms as $term) {

    $term->children = tswchc_get_woo_category_childs($term);

    $children[$term->term_id] = $term;
  }

  return $children;
}

/*
* Pretty Dump or debuggin
*/

function tswchc_dump($args) {
  $print = print_r($args, 1);
  if (isset($_GET['dev'])) {
    echo "<pre>$print</pre>";
  }
}

/*
* Check if hide rule is setup
* rule, hiden_rules
*/

function tswchc_is_checked($category, $role, $prev_rules) {

  if (is_array($prev_rules) && count($prev_rules)) {
    foreach ($prev_rules as $key => $rule) {
      if ($rule->category == $category && $rule->role == $role) {
        return true;
      }
    }
  }

  return false;
}

/*
*/

function tswchc_get_rules($slug, $prev_rules, $by_role = false) {

  $count = 0;

  if (is_array($prev_rules) && count($prev_rules)) {

    foreach ($prev_rules as $key => $rule) {

      if ($by_role && ($rule->role == $slug)) {

        $count++;
      } else if ($rule->category == $slug) {

        $count++;
      }
    }
  }

  return $count;
}

/**/

function tswchc_css_rules_worker($css) {

  $css = preg_replace('/\s+/', ' ', $css);
  $css = preg_replace('!/\*.*?\*/!s', '', $css);
  $css = str_replace('#ts-wchc-message', '', $css);

  $lines = explode("}", $css);
  $output = '';
  foreach ($lines as $line) {
    $line = trim($line);
    if (empty($line)) {
      $output .= $line . "\n";
      continue;
    }
    if (strpos($line, '{') !== false) {
      list($selector, $properties) = explode('{', $line, 2);
      $selector = trim($selector);
      $properties = trim($properties);
      $selector = '#ts-wchc-message ' . $selector;
      $modified_line = $selector . ' {' . $properties;
      $output .= $modified_line . "}\n";
    } else {
      $output .= $line . "\n";
    }
  }

  return $output;
}

/**/

add_action('wp_ajax_tswchc_generate_plugin_options_json', 'tswchc_generate_plugin_options_json');

function tswchc_generate_plugin_options_json() {
  // Check user capability
  if (!current_user_can('manage_options')) {
    wp_send_json_error(['message' => 'You do not have sufficient permissions to perform this action.']);
    return;
  }

  // Verify nonce
  if (!isset($_POST['nonce']) || !check_ajax_referer('tswchc-nonce', 'nonce', false)) {
    wp_send_json_error(['message' => 'Nonce verification failed.']);
    return;
  }

  $options = [];
  $file_name = 'tswchc_plugin_options.json';
  $prefix = 'tswchc_';
  $exclude = ['tswchc_version']; // Exclude specific options
  $allowed_settings = [
    'rules',
    'redirect_url',
    'redirect_mode',
    'display_custom_message',
    'message_wrapper',
    'message_styles'
  ];
  $upload_dir = wp_upload_dir();

  // Validate upload directory
  if (!isset($upload_dir['basedir'], $upload_dir['baseurl']) || !is_dir($upload_dir['basedir'])) {
    wp_send_json_error(['message' => 'Invalid uploads directory configuration.']);
    return;
  }

  $all_options = wp_load_alloptions();

  // Collect and filter options
  foreach ($all_options as $option_name => $option_value) {
    if (strpos($option_name, $prefix) === 0 && !in_array($option_name, $exclude, true)) {
      $clean_option_name = str_replace($prefix, '', $option_name);

      // Allow only whitelisted options
      if (in_array($clean_option_name, $allowed_settings, true)) {
        error_log($clean_option_name);
        if ($clean_option_name == 'display_custom_message') {
          $options[$clean_option_name] = wp_kses_post($option_value);
        } else {
          $options[$clean_option_name] = sanitize_text_field($option_value);
        }
      }
    }
  }

  // Encode options into JSON
  $json_string = json_encode($options, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
  if ($json_string === false) {
    wp_send_json_error(['message' => 'Error encoding options into JSON.']);
    return;
  }

  // Define file path and sanitize filename
  $file_path = trailingslashit($upload_dir['basedir']) . sanitize_file_name($file_name);
  if (file_put_contents($file_path, $json_string) === false) {
    wp_send_json_error(['message' => 'Error saving JSON file to uploads directory.']);
    return;
  }

  // Restrict file permissions
  chmod($file_path, 0644);

  // Send response with the secure URL
  wp_send_json_success([
    'file_url' => esc_url(trailingslashit($upload_dir['baseurl']) . sanitize_file_name($file_name)),
    'message' => 'Plugin options exported successfully.'
  ]);
  wp_die();
}

/***/

add_action('wp_ajax_tswchc_import_plugin_options_json', 'tswchc_import_plugin_options_json');

function tswchc_import_plugin_options_json() {
  // Check user capability
  if (!current_user_can('manage_options')) {
    wp_send_json_error(['message' => 'You do not have sufficient permissions to perform this action.']);
    return;
  }

  // Verify nonce
  if (!isset($_POST['nonce']) || !check_ajax_referer('tswchc-nonce', 'nonce', false)) {
    wp_send_json_error(['message' => 'Nonce verification failed.']);
    return;
  }

  // Validate settings
  if (empty($_POST['settings']) || !is_array($_POST['settings'])) {
    wp_send_json_error(['message' => 'Invalid or missing settings data.']);
    return;
  }

  $prefix = 'tswchc_';
  $success = true;

  // Whitelist of allowed settings keys (without prefix)
  $allowed_settings = [
    'rules',
    'redirect_url',
    'redirect_mode',
    'display_custom_message',
    'message_wrapper',
    'message_styles'
  ];

  foreach ($_POST['settings'] as $key => $value) {
    if (!in_array($key, $allowed_settings, true)) {
      // Skip keys not in the allowed list
      continue;
    }

    $option_name = sanitize_key($prefix . $key);


    // Handle 'display_custom_message' differently to preserve HTML tags
    if ($key === 'display_custom_message') {
      $sanitized_value = wp_kses_post(wp_unslash($value));
    } else {
      $sanitized_value = sanitize_text_field(wp_unslash($value));
    }

    delete_option($option_name);

    if (!update_option($option_name, $sanitized_value)) {
      $success = false;
    }
  }

  if ($success) {
    wp_send_json_success(['message' => 'Your settings have been successfully imported.']);
  } else {
    wp_send_json_error(['message' => 'Errors occurred while importing settings.']);
  }
}

/****/

add_action('wp_ajax_tswchc_reset_plugin_options', 'tswchc_reset_plugin_options');

function tswchc_reset_plugin_options() {
  global $wpdb;

  // Check user capability
  if (!current_user_can('manage_options')) {
    wp_send_json_error(['message' => 'You do not have sufficient permissions to perform this action.']);
    return;
  }

  // Verify nonce
  if (!isset($_POST['nonce']) || !check_ajax_referer('tswchc-nonce', 'nonce', false)) {
    wp_send_json_error(['message' => 'Nonce verification failed.']);
    return;
  }

  $prefix = 'tswchc_';
  $exclude = ['tswchc_version']; // Options to exclude from deletion

  // Validate the exclude list
  if (empty($exclude) || !is_array($exclude)) {
    wp_send_json_error(['message' => 'Invalid exclusion list.']);
    return;
  }

  // Prepare SQL query to find matching options
  $like_prefix = $wpdb->esc_like($prefix) . '%';
  $placeholders = implode(',', array_fill(0, count($exclude), '%s'));

  $query = $wpdb->prepare(
    "SELECT option_name FROM $wpdb->options WHERE option_name LIKE %s AND option_name NOT IN ($placeholders)",
    array_merge([$like_prefix], $exclude)
  );

  $options = $wpdb->get_col($query);

  // Check if options exist
  if (!$options) {
    wp_send_json_error(['message' => 'No options found to reset.']);
    return;
  }

  // Delete options
  foreach ($options as $option_name) {
    if (!delete_option($option_name)) {
      wp_send_json_error(['message' => 'Failed to reset some settings.']);
      return;
    }
  }

  // Return success message
  wp_send_json_success(['message' => 'Your settings have been successfully reset.']);
}

/**/
