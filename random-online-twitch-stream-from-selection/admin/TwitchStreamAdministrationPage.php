<?php

declare(strict_types=1);

require_once plugin_dir_path(__DIR__) . 'services/TwitchStreamFormDataNormalizer.php';

class TwitchStreamAdministrationPage
{
    private string $pluginName;

    private string $version;

    private TwitchStreamFormDataNormalizer $twitchStreamFormDataNormalizer;

    /**
     * @param string $pluginName
     * @param string $version
     */
    public function __construct(string $pluginName, string $version)
    {
        $this->pluginName = $pluginName;
        $this->version = $version;
        $this->twitchStreamFormDataNormalizer = new TwitchStreamFormDataNormalizer(get_option('twitch-stream-options'));
    }

    public function enqueueStyles(): void
    {
        if (isset($_GET['page']) && $_GET['page'] === 'twitch-stream') {
            wp_enqueue_style('twitch-stream-embed-admin-css', plugin_dir_url(__FILE__) . 'css/twitch-stream-admin.css', [], $this->version);
            wp_enqueue_style('twitch-stream-embed-plugin-css', plugins_url('public/css/twitch-stream-public.css', __DIR__), [], $this->version);
            wp_enqueue_style('wp-color-picker');
            wp_enqueue_script('twitch-stream-js', plugins_url('/public/js/twitch-stream-public.js', __DIR__), ['jquery'], $this->version, true);
            $twitchJsVars = [
                'theme' => $this->twitchStreamFormDataNormalizer->getValueFromForm('twitch_appearance_colour_theme'),
                'language' => $this->twitchStreamFormDataNormalizer->getValueFromForm('twitch_settings_language'),
                'twitchGame' => $this->twitchStreamFormDataNormalizer->getValueFromForm('twitch_settings_game'),
                'twitchNames' => $this->twitchStreamFormDataNormalizer->getValueFromForm('twitch_settings_channel'),
                'twitchIds' => $this->twitchStreamFormDataNormalizer->getValueFromForm('twitch_settings_id'),
                'twitchOfflineHtml' => esc_html($this->twitchStreamFormDataNormalizer->getValueFromForm('twitch_settings_stream_offline_html', TwitchStreamFormDataNormalizer::TWITCH_SETTINGS_STREAM_OFFLINE_HTML_DEFAULT_VALUE, false)),
            ];
            wp_localize_script('twitch-stream-js', 'twitch_stream_vars', $twitchJsVars);
        }
    }

    public function enqueueScripts(): void
    {
        if (isset($_GET['page']) && $_GET['page'] === 'twitch-stream') {
            wp_enqueue_script('twitch-API', 'https://embed.twitch.tv/embed/v1.js', ['jquery'], '');
        }
    }

    public function createAdminPage(): void
    {
        add_options_page(
            'Twitch Stream',
            'Twitch Stream',
            'manage_options',
            'twitch-stream',
            'twitchStreamOptions'
        );

        function twitchStreamOptions(): void
        {
            $twitchOptions = get_option('twitch-stream-options'); ?>

            <div><h2>Twitch Stream</h2></div>
            <div class="twitch-wall-preview-text">
            </div>
            <?php
            if (isset($twitchOptions['twitch_settings_channel'], $twitchOptions['twitch_settings_game'])) {
                $twitchStreamShortcodeAttribute = new TwitchStreamShortcodeAttribute([]);
                include plugin_dir_path(__FILE__) . '/../public/partials/output.php';
            } ?>
            <form class="twitch-form" action="options.php" method="post">
            <?php
            settings_fields('twitch-stream-options');
            do_settings_sections('twitch_stream'); ?>
            <input name="Submit" type="submit" value="Save Changes" />
            </form>
            <?php
        }
    }

    public function twitchStreamAdminInit(): void
    {
        include 'partials/fields-output.php';
        include 'partials/sanitize.php';

        register_setting('twitch-stream-options', 'twitch-stream-options', 'twitchStreamOptionsValidate');
        add_settings_section('twitch_main_wall', 'Main Settings', 'twitchStreamSectionText', 'twitch_stream');
        add_settings_field('twitch_settings_game', 'Game (required)', 'twitchStreamSettingsGame', 'twitch_stream', 'twitch_main_wall');
        add_settings_field('twitch_settings_language', 'Language', 'twitchStreamSettingsLanguage', 'twitch_stream', 'twitch_main_wall');
        add_settings_field('twitch_settings_channel', 'Streamer (name)', 'twitchStreamSettingsStreamer', 'twitch_stream', 'twitch_main_wall');
        add_settings_field('twitch_appearance_colour_theme', 'Colour Theme', 'twitchStreamAppearanceColourTheme', 'twitch_stream', 'twitch_main_wall');
        add_settings_field('twitch_settings_stream_offline_html', 'Text when no streamers are online', 'twitchStreamSteamOfflineHtml', 'twitch_stream', 'twitch_main_wall');

        function twitchStreamSectionText(): void
        {
            echo wp_kses('<p>Fill in the below fields to hook your Twitch Wall upto twitch.tv. Fill in either the game field or the channels field to start pulling streams from twitch!</p>', ['p' => true]);
        }

        function twitchStreamDismissAcfNotice(): void
        {
            update_option('twitch-wall-notice-dismissed', 1);
        }

        add_action('wp_ajax_twitch_stream_dismiss_acf_notice', 'twitchStreamDismissAcfNotice');
    }
}
