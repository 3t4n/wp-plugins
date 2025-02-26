<?php
// no outside access
if (!defined('WPINC')) die('No access outside of wordpress.');

function ktr_get_tracking_url($host, $event, $timestamp)
{
    if ((!$host || $host == '')
        || (!$event || $event == '')
        || (!$timestamp || $timestamp == '')
    ) {
        return false;
    } else {
        return 'https://europe-west3-kontextr.cloudfunctions.net/at-wp-track?p=' .
            KTR_PLUGIN_NAME . '&d=' . $host . '&evt=' . $event . '&ts=' . $timestamp;
    }
}
