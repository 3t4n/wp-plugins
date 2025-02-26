<?php

declare(strict_types=1);

class TwitchStreamTranslations
{
    public function loadPluginTranslations(): void
    {
        load_plugin_textdomain('twitchStream', false, dirname(plugin_basename(__FILE__), 2) . '/languages/');
    }
}
