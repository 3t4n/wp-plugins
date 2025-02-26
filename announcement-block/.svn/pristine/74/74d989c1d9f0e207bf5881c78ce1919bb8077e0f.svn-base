<?php
if (! defined('ABSPATH')) exit;
$show = isset($attributes['show']) ? $attributes['show'] : true;
$hide_after_date_time = isset($attributes['hideAfterDateTime']) ? $attributes['hideAfterDateTime'] : '';
$end_date_string = "";
if (!empty($hide_after_date_time)) {
    // dateformat is 2024-12-20T07:21:00.000Z
    $end_date_string = $hide_after_date_time;
    $hide_after_date_time = date('Y-m-d H:i:s', strtotime($hide_after_date_time));
}

$current_time = current_time('mysql', true);

if ((empty($hide_after_date_time) || strtotime($current_time) < strtotime($hide_after_date_time))) {
    if ($show) {
        if ($hide_after_date_time) {
            $dateInformation = ' data-hide-after-date-time="' . $end_date_string . '"';
        } else {
            $dateInformation = '';
        }
        $template = '<div class="wp-block-aptex-announcement-block__wrapper"' . $dateInformation . '>%s</div>';
        echo sprintf(
            $template,
            wp_kses_post($content)
        );
    }
}
