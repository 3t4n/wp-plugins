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
$adminModal = $injector->get(\UA1Labs\Fire\Studio\Feature\AdminModal::class);
$wpPluginHelper = $injector->get(\UA1Labs\Fire\Studio\WpPluginHelper::class);

if ($wpPluginHelper->isAdminUser()) {
    add_action('init', [$adminModal, 'enqueueStylesForAdminModal']);
    add_action('wp_enqueue_scripts', [$adminModal, 'enqueueScriptsForAdminModal']);
    add_action('admin_enqueue_scripts', [$adminModal, 'enqueueScriptsForAdminModal']);
    add_action('admin_bar_menu', [$adminModal, 'registerFireStudioMenuItemToAdminBar'], 100);
    add_action('wp_after_admin_bar_render', [$adminModal, 'renderAdminModal']);
}