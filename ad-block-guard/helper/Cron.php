<?php

namespace AdBlockGuard;

use AdBlockGuard\LicenseChecker;
use AdBlockGuard\PluginLogger;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class Cron
{
    public function __construct()
    {
        // Schedule the cron jobs
        add_action('plugins_loaded', [$this, 'initializeCrons']);
        add_action('wuadblockguard_update_product_details', [$this, 'updateProductDetails']);
        add_action('wuadblockguard_daily_license_check', [$this, 'dailyLicenseCheck']);

        // Register activation and deactivation hooks
        register_activation_hook(ADBLOCKGUARD_PLUGIN_DIR . 'ad-block-guard.php', [$this, 'scheduleCrons']);
        register_deactivation_hook(ADBLOCKGUARD_PLUGIN_DIR . 'ad-block-guard.php', [$this, 'clearScheduledCrons']);
    }

    public function initializeCrons()
    {
        $this->scheduleCrons();
    }

    public function scheduleCrons()
    {
        $this->scheduleWeeklyProductUpdate();
        $this->scheduleDailyLicenseCheck();
    }

    public function scheduleWeeklyProductUpdate()
    {
        if (!wp_next_scheduled('wuadblockguard_update_product_details')) {
            wp_schedule_event(time(), 'weekly', 'wuadblockguard_update_product_details');   
        }
    }

    public function scheduleDailyLicenseCheck()
    {
        if (!wp_next_scheduled('wuadblockguard_daily_license_check')) {
            wp_schedule_event(time(), 'daily', 'wuadblockguard_daily_license_check');
        }
    }

    public function updateProductDetails()
    {
        LicenseChecker::getInstance()->getProductDetails();

        PluginLogger::log('info', "Cron: Weekly: updateProductDetails() completed");
    }

    public function dailyLicenseCheck()
    {
        $checker = LicenseChecker::getInstance();
        $checker->checkLicenseValidity();

        PluginLogger::log('info', "Cron: Daily: dailyLicenseCheck() completed");
    }

    public function clearScheduledCrons()
    {
        wp_clear_scheduled_hook('wuadblockguard_update_product_details');
        wp_clear_scheduled_hook('wuadblockguard_daily_license_check');
    }
}
