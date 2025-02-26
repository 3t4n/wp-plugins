<?php

declare(strict_types=1);

require_once plugin_dir_path(__DIR__) . '/../services/TwitchStreamFormDataNormalizer.php';

$twitchStreamFormDataNormalizer = new TwitchStreamFormDataNormalizer(get_option('twitch-stream-options'));
$theme = $twitchStreamFormDataNormalizer->getValueFromForm('twitch_appearance_colour_theme');
/** @var \TwitchStreamShortcodeAttribute $twitchStreamShortcodeAttribute */
$customCssClass = $twitchStreamShortcodeAttribute->customCssClass;
include plugin_dir_path(__FILE__) . '../../templates/twitch-stream-app.php';
