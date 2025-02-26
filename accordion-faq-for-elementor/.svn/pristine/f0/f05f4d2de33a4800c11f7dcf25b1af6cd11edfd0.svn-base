<?php
function afaq_6310_faq_01_10()
{
  global $wpdb;
  $style_table = $wpdb->prefix . 'afaq_6310_style';
  $faq_table = $wpdb->prefix . 'afaq_6310_faq';
  $category_table = $wpdb->prefix . 'afaq_6310_category';

  wp_enqueue_style('afaq-6310-style', plugins_url('assets/css/style.css', __FILE__));

  afaq_6310_link_css_js();

  include afaq_6310_plugin_url . 'header.php';

  if (empty($_GET['styleid'])) {
    wp_enqueue_style('afaq-6310-google-font', 'https://fonts.googleapis.com/css?family=Amaranth');
    wp_enqueue_style('afaq-6310-style-01-10', plugins_url('assets/css/style-01-10.css', __FILE__));
    include afaq_6310_plugin_url . 'settings/preview-01-10.php';
  } else if (!empty($_GET['styleid'])) {
    afaq_6310_color_picker_script();
    afaq_6310_font_picker_script();
    $styleId = (int) sanitize_text_field( $_GET['styleid'] );
    wp_enqueue_script('afaq-6310-font-select-js', plugins_url('assets/js/fontselect.js', __FILE__), array('jquery'));
    wp_enqueue_script('afaq-6310-admin-js', plugins_url('assets/js/afaq-6310-admin-script.js', __FILE__), array('jquery'));
    wp_enqueue_style('afaq-6310-font-select-style', plugins_url('assets/css/fontselect.css', __FILE__));
    $styledata = $wpdb->get_row($wpdb->prepare("SELECT * FROM $style_table WHERE id = %d ", $styleId), ARRAY_A);
    $ids = substr(esc_attr($styledata['style_name']), -2);
    include afaq_6310_plugin_url . 'settings/helper/faq-for-elementor-save.php';
    if (!empty($_POST['update_style_change']) && $_POST['update_style_change'] == 'Save' && $_POST['id'] != '') {
      $nonce = $_REQUEST['_wpnonce'];
      if (!wp_verify_nonce($nonce, 'afaq_6310_nonce_field_form')) {
          die('You do not have sufficient permissions to access this pagess.');
      } else {
          $css = afaq_6310_extract_data($_POST);
          $id = (int) sanitize_text_field($_POST['id']);
          $wpdb->query($wpdb->prepare("UPDATE $style_table SET css = %s WHERE id = %d", $css, $id));
      }
    }
    $styledata = $wpdb->get_row($wpdb->prepare("SELECT * FROM $style_table WHERE id = %d ", $styleId), ARRAY_A);
    $css = explode("!!##!!", esc_attr($styledata['css']));
    $key = explode(",", $css[0]);
    $value = explode("||##||", $css[1]);
    $tempData = array_combine($key, $value);
    $cssData = [];
    if($tempData){
      foreach($tempData as $tkey=>$tvalue){
        $cssData[esc_attr($tkey)] = esc_attr( $tvalue );
      }
    }
    $template_order  = explode(",", esc_attr($styledata['templateids']));
    $category_order  = explode(",", esc_attr($styledata['categoryids']));

    $faqs = array();
    if (esc_attr($styledata['templateids'])) {
      $memberids = explode(",", esc_attr($styledata['templateids']));
      if ($memberids) {
          foreach ($memberids as $acc) {
            if ($acc != '') {
                $results = $wpdb->get_row("SELECT * FROM $faq_table WHERE id={$acc}", ARRAY_A);
                if($results){
                  $faqs[] = array_map('esc_attr', $results);
                }
            }
          }
      }
    }
    include afaq_6310_plugin_url . "settings/css/_category.php";
    include afaq_6310_plugin_url . "settings/form/_form-{$ids}.php";
    include afaq_6310_plugin_url . "settings/css/_css-{$ids}.php";
    include afaq_6310_plugin_url . "settings/css/_button-css.php";
    include afaq_6310_plugin_url . "settings/helper/_button.php";
    include afaq_6310_plugin_url . "settings/helper/_helper-{$ids}.php";
    $templates = [];
    for ($i = 1; $i <= 20; $i++) {
        $templates[] = sprintf('template-%02d', $i); // %02d ensures two digits with leading zero
    }
    if (in_array($styledata['style_name'], $templates, true)) {
        //It will only support template-01,template-02,template-03......etc
        $fileUrl = afaq_6310_plugin_url . 'settings/templates/' . esc_attr($styledata['style_name']) . '.php';
        if (file_exists($fileUrl)) {
          include $fileUrl;
        }
    }
    include afaq_6310_plugin_url . "settings/helper/common-helper.php";
  }
}

function afaq_6310_faq_11_20()
{
  global $wpdb;
  $style_table = $wpdb->prefix . 'afaq_6310_style';
  $faq_table = $wpdb->prefix . 'afaq_6310_faq';
  $category_table = $wpdb->prefix . 'afaq_6310_category';

  wp_enqueue_style('afaq-6310-style', plugins_url('assets/css/style.css', __FILE__));

  afaq_6310_link_css_js();

  include afaq_6310_plugin_url . 'header.php';

  if (empty($_GET['styleid'])) {
    wp_enqueue_style('afaq-6310-google-font', 'https://fonts.googleapis.com/css?family=Amaranth');
    wp_enqueue_style('afaq-6310-style-11-20', plugins_url('assets/css/style-11-20.css', __FILE__));
    include afaq_6310_plugin_url . 'settings/preview-11-20.php';
  } else if (!empty($_GET['styleid'])) {
    afaq_6310_color_picker_script();
    afaq_6310_font_picker_script();
    $styleId = (int) sanitize_text_field( $_GET['styleid'] );
    wp_enqueue_script('afaq-6310-font-select-js', plugins_url('assets/js/fontselect.js', __FILE__), array('jquery'));
    wp_enqueue_script('afaq-6310-admin-js', plugins_url('assets/js/afaq-6310-admin-script.js', __FILE__), array('jquery'));
    wp_enqueue_style('afaq-6310-font-select-style', plugins_url('assets/css/fontselect.css', __FILE__));
    $styledata = $wpdb->get_row($wpdb->prepare("SELECT * FROM $style_table WHERE id = %d ", $styleId), ARRAY_A);
    $ids = substr(esc_attr($styledata['style_name']), -2);
    include afaq_6310_plugin_url . 'settings/helper/faq-for-elementor-save.php';
    if (!empty($_POST['update_style_change']) && $_POST['update_style_change'] == 'Save' && $_POST['id'] != '') {
      $nonce = $_REQUEST['_wpnonce'];
      if (!wp_verify_nonce($nonce, 'afaq_6310_nonce_field_form')) {
          die('You do not have sufficient permissions to access this pagess.');
      } else {
          $css = afaq_6310_extract_data($_POST);
          $wpdb->query($wpdb->prepare("UPDATE $style_table SET css = %s WHERE id = %d", $css, sanitize_text_field($_POST['id'])));
      }
    }
    $styledata = $wpdb->get_row($wpdb->prepare("SELECT * FROM $style_table WHERE id = %d ", $styleId), ARRAY_A);
    $css = explode("!!##!!", esc_attr($styledata['css']));
    $key = explode(",", $css[0]);
    $value = explode("||##||", $css[1]);
    $tempData = array_combine($key, $value);
    $cssData = [];
    if($tempData){
      foreach($tempData as $tkey=>$tvalue){
        $cssData[esc_attr($tkey)] = esc_attr( $tvalue );
      }
    }
    $template_order  = explode(",", esc_attr($styledata['templateids']));
    $category_order  = explode(",", esc_attr($styledata['categoryids']));

    $faqs = array();
    if (esc_attr($styledata['templateids'])) {
      $memberids = explode(",", esc_attr($styledata['templateids']));
      if ($memberids) {
          foreach ($memberids as $acc) {
            if ($acc != '') {
              $results = $wpdb->get_row("SELECT * FROM $faq_table WHERE id={$acc}", ARRAY_A);
              if($results){
                $faqs[] = array_map('esc_attr', $results);
              }
            }
          }
      }
    }
    include afaq_6310_plugin_url . "settings/form/_form-{$ids}.php";
    include afaq_6310_plugin_url . "settings/css/_css-{$ids}.php";
    include afaq_6310_plugin_url . "settings/css/_button-css.php";
    include afaq_6310_plugin_url . "settings/helper/_button.php";
    include afaq_6310_plugin_url . "settings/helper/_helper-{$ids}.php";
    include afaq_6310_plugin_url . "settings/helper/common-helper.php";
    $templates = [];
    for ($i = 1; $i <= 20; $i++) {
        $templates[] = sprintf('template-%02d', $i); // %02d ensures two digits with leading zero
    }
    if (in_array($styledata['style_name'], $templates, true)) {
        //It will only support template-01,template-02,template-03......etc
        $fileUrl = afaq_6310_plugin_url . 'settings/templates/' . esc_attr($styledata['style_name']) . '.php';
        if (file_exists($fileUrl)) {
          include $fileUrl;
        }
    }
  }
}

function afaq_6310_manage_faq()
{
  global $wpdb;
  wp_enqueue_style('afaq-6310-style', plugins_url('assets/css/style.css', __FILE__));

   afaq_6310_link_css_js();

   include afaq_6310_plugin_url . 'header.php';
   include afaq_6310_plugin_url . 'settings/faq.php';
}

function afaq_6310_manage_category()
{
  global $wpdb;
  wp_enqueue_style('afaq-6310-style', plugins_url('assets/css/style.css', __FILE__));
   afaq_6310_link_css_js();
   include afaq_6310_plugin_url . 'header.php';
   include afaq_6310_plugin_url . 'settings/category.php';
}
function afaq_6310_faq_settings()
{
  global $wpdb;
  wp_enqueue_style('afaq-6310-style', plugins_url('assets/css/style.css', __FILE__));
  afaq_6310_link_css_js();
  include afaq_6310_plugin_url . 'header.php';
  include afaq_6310_plugin_url . 'settings.php';
}

function afaq_6310_faq_lincense()
{
  global $wpdb;
  wp_enqueue_style('afaq-6310-style', plugins_url('assets/css/style.css', __FILE__));
  afaq_6310_link_css_js();
  include afaq_6310_plugin_url . 'header.php';
  include afaq_6310_plugin_url . 'license.php';
}

function afaq_6310_faq_faq_6310_how_to_use() {
  wp_enqueue_style('afaq-6310-style', plugins_url('assets/css/style.css', __FILE__));
  afaq_6310_link_css_js();
  include afaq_6310_plugin_url . 'header.php';
  include afaq_6310_plugin_url . 'settings/how-to-use.php';
}

function afaq_6310_wpmart_plugins() {
  wp_enqueue_style('afaq-6310-style', plugins_url('assets/css/style.css', __FILE__));
  afaq_6310_link_css_js();
  include afaq_6310_plugin_url . 'header.php';
  include afaq_6310_plugin_url . 'settings/wpmart-plugins.php';
}

function afaq_6310_import_export()
{
  global $wpdb;
  wp_enqueue_style('afaq-6310-style', plugins_url('assets/css/style.css', __FILE__));
  afaq_6310_link_css_js();

  include afaq_6310_plugin_url . 'header.php'; 
  include afaq_6310_plugin_url . 'settings/import-export-plugins.php';
}