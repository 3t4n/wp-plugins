<?php
/*
Plugin Name: User Insight Wordpress Plugin
Plugin URI: https://ui.userlocal.jp
Description: Quick install UserInsight, a powerful web-analytics tool.
Version: 1.0.5
Author: User Local Inc
Author URI: http://www.userlocal.jp/
License: GPL2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

User Insight WordPress Plugin is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
User Insight WordPress Plugin is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
*/

class UserInsight {
  
  public function __construct() {
    add_action('wp_footer', array($this, 'attachUiTag'));
    add_action('admin_menu', array($this, 'addPage'));
  }

  public function attachUiTag() {
    $analyticsId = @get_option('ui_analytics_id');

    // won't output id if it hasn't been set yet.
    if(empty($analyticsId)){
        return;
    }

    // additional tags
    $additionalTag = @get_option('ui_additional_tag');
    $freeTag = !empty($additionalTag) ? $additionalTag : '';

    $tag = <<< EOF
<!-- User Insight PCDF Code Start : userlocal.jp -->
<script type="text/javascript">
var _uic = _uic ||{}; var _uih = _uih ||{};_uih['id'] = {$analyticsId};
_uih['lg_id'] = '';
_uih['fb_id'] = '';
_uih['tw_id'] = '';
_uih['uigr_1'] = ''; _uih['uigr_2'] = ''; _uih['uigr_3'] = ''; _uih['uigr_4'] = ''; _uih['uigr_5'] = '';
_uih['uigr_6'] = ''; _uih['uigr_7'] = ''; _uih['uigr_8'] = ''; _uih['uigr_9'] = ''; _uih['uigr_10'] = '';
_uic['uls'] = 1;

{$freeTag}

/* DO NOT ALTER BELOW THIS LINE */
/* WITH FIRST PARTY COOKIE */
(function() {
var bi = document.createElement('script');bi.type = 'text/javascript'; bi.async = true;
bi.src = '//cs.nakanohito.jp/b3/bi.js';
var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(bi, s);
})();
</script>
<!-- User Insight PCDF Code End : userlocal.jp -->
EOF;
    echo $tag;
  }

  public function addPage() {
    add_menu_page('UserInsight', 'UserInsight', 'manage_options', __FILE__, array($this, 'settingsPage'));
  }

  public function settingsPage() {
    $pluginName = plugin_basename(dirname(__FILE__));
    $pluginUrl = plugins_url($pluginName);
    
    wp_enqueue_style('ui-css-bootstrap', $pluginUrl . '/css/bootstrap.min.css');

    // setting id
    if (isset($_POST['analyticsId'])) {
      // using nonces and checking permissions
      if (check_admin_referer('update_ui_id', 'update_ui_id_nonce') && current_user_can('administrator')) {
        // sanitizing
        $analyticsId = sanitize_text_field($_POST['analyticsId']);
        // validation
        if (ctype_digit($analyticsId)) {
          @update_option('ui_analytics_id', $analyticsId);
          $message = array('alert-success', '解析IDを登録しました。');
          // escaping
          $analytics_id = esc_html__($analyticsId);
        } else {
          $message = array('alert-danger', '解析IDは数値で入力してください。');
        }
      }
    } else {
      $analytics_id = @get_option('ui_analytics_id');
    }

    // setting free additional tag
    if (isset($_POST['additionalTag'])) {
      // using nonces and checking permissions
      if (check_admin_referer('update_ui_add_tag', 'update_ui_add_tag_nonce') && current_user_can('administrator')) {
        $additionalTag = stripslashes_deep($_POST['additionalTag']);
        @update_option('ui_additional_tag', $additionalTag);
        $message = array('alert-success', '自由記述を登録しました。');
      }
    } else {
      $additionalTag = @get_option('ui_additional_tag');
    }

    // show
    $plugin_path = urlencode($pluginName . '/' . basename(__FILE__));
    require(plugin_dir_path(__FILE__) . 'view/admin.php'); 
  }

}

new UserInsight();

?>
