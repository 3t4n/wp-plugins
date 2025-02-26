<?php

declare(strict_types=1);

require_once plugin_dir_path(__DIR__) . '/../services/TwitchStreamFormDataNormalizer.php';

if (!defined('ABSPATH')) {
    exit;
}

function twitchStreamSettingsGame(): void
{
    $options = get_option('twitch-stream-options'); ?>
    <input id='twitch_settings_game' name='twitch-stream-options[twitch_settings_game]' size='40' type='text' value="<?php echo wp_kses($options['twitch_settings_game'], []); ?>" required="required" /><br>
    <label for='twitch_settings_game'>Show only streamers who play this game.</label>
<?php
}

function twitchStreamSettingsStreamer(): void
{
    $options = get_option('twitch-stream-options'); ?>
    <input id='twitch_settings_channel' name='twitch-stream-options[twitch_settings_channel]' size='40' type='text' value="<?php echo wp_kses($options['twitch_settings_channel'], []); ?>" pattern='^\w*(,*\w+)*$' /><br><label for='twitch_settings_channel'>The name of streamers to fill the Twitch Stream with. Separate multiple streamers with a comma. Must be in format: "streamerName,nextStreamerName..."</label>
<?php
}

function twitchStreamSettingsLanguage(): void
{
    $options = get_option('twitch-stream-options'); ?>
    <input id='twitch_settings_language' name='twitch-stream-options[twitch_settings_language]' size='40' type='text' value="<?php echo wp_kses($options['twitch_settings_language'], []); ?>" /><br><label for='twitch_settings_language'>If you want to limit the game feed to a specific language, do that here. Use the <a target='_blank' href='https://en.wikipedia.org/wiki/ISO_639-1'>ISO 639-1</a> language code. Leave this blank for all languages.</label>
<?php
}

function twitchStreamAppearanceColourTheme(): void
{
    $options = get_option('twitch-stream-options'); ?>
    <select id="twitch_appearance_colour_theme" name="twitch-stream-options[twitch_appearance_colour_theme]">
        <option value="dark" <?php echo wp_kses(selected($options['twitch_appearance_colour_theme'], 'dark', false), []); ?>>Dark Theme</option>
        <option value="light" <?php echo wp_kses(selected($options['twitch_appearance_colour_theme'], 'light', false), []); ?>>Light Theme</option>
    </select>
<?php
}

function twitchStreamSteamOfflineHtml(): void
{
    $options = get_option('twitch-stream-options'); ?>
    <textarea id='twitch_settings_stream_offline_html' name='twitch-stream-options[twitch_settings_stream_offline_html]' placeholder='<?php echo esc_html(TwitchStreamFormDataNormalizer::TWITCH_SETTINGS_STREAM_OFFLINE_HTML_DEFAULT_VALUE); ?>' cols="60" rows="4"><?php echo esc_html($options['twitch_settings_stream_offline_html']); ?></textarea><br><label for='twitch_settings_stream_offline_html'>You can use HTML tags</label>
<?php
}

?>
