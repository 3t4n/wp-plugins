<?php

function ampbc_enqueue_script() {
    wp_enqueue_script(
    'am-plugin-admin',
    AMPLUGIN_URL . 'admin/js/am-plugin-admin.js',
    ['jquery'],
    time()
  );

}
add_action( 'wp_enqueue_scripts', 'ampbc_enqueue_script');


