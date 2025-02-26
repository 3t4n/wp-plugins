<?php

declare(strict_types=1);

require_once plugin_dir_path(__DIR__) . 'services/TwitchStreamShortcodeAttribute.php';
require_once plugin_dir_path(__DIR__) . 'services/TwitchStreamFormDataNormalizer.php';

class TwitchStreamPublicPage
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
        wp_enqueue_style($this->pluginName, plugin_dir_url(__FILE__) . 'css/twitch-stream-public.css', [], $this->version, 'all');
    }

    public function enqueueScripts(): void
    {
        wp_enqueue_script('twitch-API', 'https://embed.twitch.tv/embed/v1.js', ['jquery'], '', false);
        wp_enqueue_script('twitch-stream-js', plugins_url('/public/js/twitch-stream-public.js', __DIR__), ['jquery'], $this->version, true);
        $twitchJsVars = [
            'theme' => $this->twitchStreamFormDataNormalizer->getValueFromForm('twitch_appearance_colour_theme'),
            'language' => $this->twitchStreamFormDataNormalizer->getValueFromForm('twitch_settings_language'),
            'twitchGame' => $this->twitchStreamFormDataNormalizer->getValueFromForm('twitch_settings_game'),
            'twitchNames' => $this->twitchStreamFormDataNormalizer->getValueFromForm('twitch_settings_channel'),
            'twitchIds' => $this->twitchStreamFormDataNormalizer->getValueFromForm('twitch_settings_id'),
            'twitchOfflineHtml' => $this->twitchStreamFormDataNormalizer->getValueFromForm('twitch_settings_stream_offline_html', TwitchStreamFormDataNormalizer::TWITCH_SETTINGS_STREAM_OFFLINE_HTML_DEFAULT_VALUE, false),
        ];
        wp_localize_script('twitch-stream-js', 'twitch_stream_vars', $twitchJsVars);
    }

    /**
     * @param \TwitchStreamShortcodeAttribute $twitchStreamShortcodeAttribute
     */
    public function getTwitchOutput(TwitchStreamShortcodeAttribute $twitchStreamShortcodeAttribute): void
    {
        include 'partials/output.php';
    }

    public function getTwitchStreamShortcode(): void
    {
        add_shortcode('getTwitchStream', [$this, 'getTwitchContent']);
    }

    /**
     * @param string|string[] $attributes
     * @return false|string
     */
    public function getTwitchContent($attributes)
    {
        ob_start();
        $twitchStreamShortcodeAttribute = new TwitchStreamShortcodeAttribute((array)$attributes);
        $this->getTwitchOutput($twitchStreamShortcodeAttribute);

        return ob_get_clean();
    }
}
