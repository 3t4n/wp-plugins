<?php
wp_enqueue_script('jquery');

wp_register_script('add_js', plugins_url('/js/advertisement.js', __FILE__));
wp_enqueue_script('add_js');

function anti_block_admin_notices() {
  if ($notices= get_option('anti_block_deferred_admin_notices')) {
    foreach ($notices as $notice) {
      echo "<div class='error'><p>$notice</p></div>";
    }
    delete_option('anti_block_deferred_admin_notices');
  }
}

define(SETTINGS, admin_url('options-general.php')."?page=anti-block");

function anti_block_start_session() {
    if(!session_id()) {
        session_start();
    }
}