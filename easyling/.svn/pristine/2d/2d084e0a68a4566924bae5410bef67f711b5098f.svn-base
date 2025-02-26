<?php

$block_path = 'inc/integration/blocks/language-selector/edit.js';

wp_enqueue_script(
  'easyling-language-selector', // Unique handle
  easyling()->get_setting('url') . $block_path, // Script URL
  array( 'wp-blocks', 'wp-i18n', 'wp-editor', 'wp-element' ), // Dependencies
  filemtime( easyling()->get_setting('path') . $block_path ), // Version
  true // Load in footer
);
