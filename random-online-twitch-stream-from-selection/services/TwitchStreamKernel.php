<?php

declare(strict_types=1);

require_once plugin_dir_path(__DIR__) . 'services/TwitchStreamLoader.php';
require_once plugin_dir_path(__DIR__) . 'services/TwitchStreamTranslations.php';
require_once plugin_dir_path(__DIR__) . 'admin/TwitchStreamAdministrationPage.php';
require_once plugin_dir_path(__DIR__) . 'public/TwitchStreamPublicPage.php';

class TwitchStreamKernel
{
    private const PLUGIN_NAME = 'twitchStream';
    private const APP_VERSION = '1.1.0';

    public static function run(): void
    {
        $loader = new TwitchStreamLoader();

        $twitchStreamTranslations = new TwitchStreamTranslations();
        $loader->addAction('loadPluginTranslations', $twitchStreamTranslations, 'loadPluginTranslations');

        $administrationPage = new TwitchStreamAdministrationPage(self::PLUGIN_NAME, self::APP_VERSION);
        $loader->addAction('admin_enqueue_scripts', $administrationPage, 'enqueueStyles');
        $loader->addAction('admin_enqueue_scripts', $administrationPage, 'enqueueScripts');
        $loader->addAction('admin_menu', $administrationPage, 'createAdminPage');
        $loader->addAction('admin_init', $administrationPage, 'twitchStreamAdminInit');

        $publicPage = new TwitchStreamPublicPage(self::PLUGIN_NAME, self::APP_VERSION);
        $loader->addAction('wp_enqueue_scripts', $publicPage, 'enqueueStyles');
        $loader->addAction('wp_enqueue_scripts', $publicPage, 'enqueueScripts');
        $loader->addAction('init', $publicPage, 'getTwitchStreamShortcode');

        $loader->loadAllFiltersAndActions();
    }
}
