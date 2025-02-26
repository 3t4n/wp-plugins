<?php

/**
 *    __  _____   ___   __          __
 *   / / / /   | <  /  / /   ____ _/ /_  _____
 *  / / / / /| | / /  / /   / __ `/ __ `/ ___/
 * / /_/ / ___ |/ /  / /___/ /_/ / /_/ (__  )
 * `____/_/  |_/_/  /_____/`__,_/_.___/____/
 *
 * @package FireStudio
 * @author UA1 Labs Developers https://ua1.us
 * @copyright Copyright (c) UA1 Labs
 */

$injector = ua1_firestudio_injector();
$debug = $injector->get(\UA1Labs\Fire\Studio\Feature\Debug::class);
$wpPluginHelper = $injector->get(\UA1Labs\Fire\Studio\WpPluginHelper::class);

if ($wpPluginHelper->isAdminUser()) {
    add_action('plugins_loaded', [$debug, 'initDebug'], 1);
    add_action('init', [$debug, 'enqueueDebugStyles']);
    add_action('wp_enqueue_scripts', [$debug, 'enqueueDebugScripts']);
    add_action('admin_enqueue_scripts', [$debug, 'enqueueDebugScripts']);
    add_action('firestudio_admin_modal', [$debug, 'renderDebugPanel'], 100);
}
