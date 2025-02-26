<?php

declare(strict_types=1);

/**
 * @wordpress-plugin
 * Plugin Name:       Random Online Twitch Stream from selection
 * Version:           1.1.0
 * Author:            Sspooky13
 * License:           MIT
 * Description:       Plugin for show random Twitch stream from your selected streamers and games
 * Text Domain:       twitch-stream
 * Domain Path:       /languages
 */
if (!defined('WPINC')) {
    die;
}

register_activation_hook(__FILE__, 'activateTwitchStream');
register_deactivation_hook(__FILE__, 'deactivateTwitchStream');
require plugin_dir_path(__FILE__) . 'services/TwitchStreamKernel.php';

function activateTwitchStream(): void
{
    require_once plugin_dir_path(__FILE__) . 'services/TwitchStreamActivator.php';
    TwitchStreamActivator::activate();
}

function deactivateTwitchStream(): void
{
    require_once plugin_dir_path(__FILE__) . 'services/TwitchStreamDeactivator.php';
    TwitchStreamDeactivator::deactivate();
}

function runTwitchSteam(): void
{
    TwitchStreamKernel::run();
}

runTwitchSteam();
