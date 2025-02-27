<?php
  function calconic_SaveKey() {
    if (isset($_POST['apiKey']) && !empty($_POST['apiKey'])) {
      $key = $_POST['apiKey'];
      $sanitizedKey = sanitize_option($key);

      update_option('calconic_api_key', $sanitizedKey);
      wp_send_json(array(
         'status' => 200,
         'updated' => get_option('calconic_api_key')
      ));
    } else {
      wp_send_json(array(
        'status' => 304
      ));
    }

    wp_die();
  }

  function calconic_registerXHR() {
    add_action('wp_ajax_calconic_save_key', 'calconic_SaveKey');
  }
