<?php

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

/**
 * @param array $input
 * @return array
 */
function twitchStreamOptionsValidate(array $input): array
{
    $newInput = [];
    if (isset($input['twitch_settings_game'])) {
        if ($input['twitch_settings_game'] !== '') {
            $newInput['twitch_settings_game'] = sanitize_text_field($input['twitch_settings_game']);
        } else {
            $newInput['twitch_settings_game'] = '';
        }
    }
    if (isset($input['twitch_settings_channel'])) {
        if ($input['twitch_settings_channel'] !== '') {
            $newInput['twitch_settings_channel'] = sanitize_text_field($input['twitch_settings_channel']);
            $response = wp_remote_get('https://api.twitch.tv/kraken/users?login=' . $input['twitch_settings_channel'], [
                'timeout' => 10,
                'headers' => [
                    'Client-ID' => 'c9y13nevu8fzazuq2ty6zdqz9f7xlem',
                    'Accept' => 'application/vnd.twitchtv.v5+json',
                ],
            ]);
            $responseContent = wp_remote_retrieve_body($response);
            $response = json_decode($responseContent, true);
            $userList = '';
            foreach ($response['users'] as $channel) {
                $userList .= $channel['_id'] . ',';
            }
            $newInput['twitch_settings_id'] = substr($userList, 0, -1);
        } else {
            $newInput['twitch_settings_channel'] = '';
            $newInput['twitch_settings_id'] = '';
        }
    }
    if (isset($input['twitch_settings_language'])) {
        $newInput['twitch_settings_language'] = sanitize_text_field($input['twitch_settings_language']);
    }

    if (isset($input['twitch_appearance_colour_theme'])) {
        // Should only be set to either 'dark' or 'light'.
        $sanitizedColourTheme = sanitize_text_field($input['twitch_appearance_colour_theme']);
        if ($sanitizedColourTheme !== 'light' && $sanitizedColourTheme !== 'dark') {
            $newInput['twitch_appearance_colour_theme'] = 'dark';
        } else {
            $newInput['twitch_appearance_colour_theme'] = $sanitizedColourTheme;
        }
    }

    if (isset($input['twitch_settings_stream_offline_html'])) {
        $newInput['twitch_settings_stream_offline_html'] = $input['twitch_settings_stream_offline_html'];
    }

    return $newInput;
}
