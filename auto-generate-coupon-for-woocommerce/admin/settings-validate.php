<?php

// validate plugin settings
// exit if file is called directly
if (!defined('ABSPATH')) {

    exit;
}

function auto_generate_coupon_callback_validate_options($input) {
    return $input;
}
