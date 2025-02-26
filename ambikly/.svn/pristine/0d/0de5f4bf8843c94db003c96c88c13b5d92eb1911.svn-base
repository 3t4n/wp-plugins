<?php

use Ambikly\Constants;

function ambikly_get_option($option, $default_value = false)
{
    $option = Constants::SETTING_PREFIX . $option;

    return apply_filters($option, get_option($option, $default_value));
}

function ambikly_update_option($option, $default_value = false)
{
    $option = Constants::SETTING_PREFIX . $option;

    return update_option($option, $default_value);
}