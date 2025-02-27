<?php
if (!empty($_POST['update_style_change']) && $_POST['update_style_change'] == 'Save' && $_POST['id'] != '') {
  $nonce = $_REQUEST['_wpnonce'];
  if (!wp_verify_nonce($nonce, 'imh_6310_nonce_field_form')) {
    die('You do not have sufficient permissions to access this pagess.');
  } else {
    $id = sanitize_text_field($_POST['id']);
    $name = sanitize_text_field($_POST['name']);
    $css = imh_6310_extract_data($_POST);
    if ($id) {
      $wpdb->query($wpdb->prepare("UPDATE $style_table SET name = %s, css = %s WHERE id = %d", $name, $css, $id));
    } else {
      $wpdb->query($wpdb->prepare("INSERT into $style_table SET name = %s, css = %s", $name, $css));
      $redirect_id = $wpdb->insert_id;
      $url = admin_url("admin.php?page=imh-6310-image-map-hotspot&action=preview&styleid=$redirect_id");
      wp_register_script('imh-6310-redirect-script', '');
      wp_enqueue_script('imh-6310-redirect-script');
      wp_add_inline_script('imh-6310-redirect-script', "document.location.href = '" . $url . "';");
    }
  }
}
$cssData = [];
if ($ids) {
  $styledata = $wpdb->get_row($wpdb->prepare("SELECT * FROM $style_table WHERE id = %d ", $ids), ARRAY_A);
  $css = explode("!!##!!", $styledata['css']);
  $key = explode(",", $css[0]);
  $value = explode("||##||", $css[1]);
  $filterKey = [];
  $filterValue = [];
  for ($i = 0; $i < count($key); $i++) {
    $filterKey[] = esc_attr($key[$i]);
  }
  for ($i = 0; $i < count($value); $i++) {
    $filterValue[] = esc_attr($value[$i]);
  }
  $cssData = array_combine($filterKey, $filterValue);
}
$jsonData = isset($cssData['json_data']) ? json_decode(stripslashes(html_entity_decode($cssData['json_data']))) : [];