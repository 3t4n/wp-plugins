<?php defined('ABSPATH') or die('No script kiddies please!!'); ?>
<script id="tmpl-icon-template" type="text/html">
    <?php
    unset($fsdt_menu_settings);
    $field_key = '{{data.icon_key}}';
    include(FSDT_PATH . '/includes/views/backend/js-templates/icon-template.php'); ?>
</script>
