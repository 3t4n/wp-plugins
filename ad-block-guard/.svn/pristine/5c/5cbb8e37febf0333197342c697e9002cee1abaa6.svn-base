<?php

namespace AdBlockGuard;

use AdBlockGuard\CarbonFieldsSetup;
use AdBlockGuard\PluginLogger;
use AdBlockGuard\Notices;


if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class Upgrade
{

	protected static $old_version;
	protected static $new_version;

    /**
     * Runs the upgrade process.
     *
     * @param string $old_version The previous version of the plugin.
     * @param string $new_version The new version of the plugin.
     */
    public static function run($old_version, $new_version)
    {

    	self::$old_version = $old_version;
    	self::$new_version = $new_version;


    	self::pre_upgrade();


        if (version_compare($old_version, '2.2.6', '<')) {
            self::upgrade_to_2_2_6();
        }

        self::post_upgrade($old_version, $new_version);
    }

    /**
     * This runs every time an upgrade occurs
     */
    private static function pre_upgrade() {

        // Update the option and reset the transient
        update_option('wuadblockguard_version', self::$new_version, false);

		// Delete the transient first to avoid stale cache issues
		delete_transient('wuadblockguard_version');

		// Set transient with the new version number
		set_transient('wuadblockguard_version', ADBLOCKGUARD_VERSION, DAY_IN_SECONDS);

    }

    /**
     * This runs every time an upgrade occurs
     */
    private static function post_upgrade() {

		PluginLogger::log('info', 'UPGRADE COMPLETED: v' . self::$new_version, [
			'old_version' => self::$old_version,
			'new_version' => self::$new_version,
		    'bypass' => true,
		]);

    }


    private static function upgrade_to_2_2_0() {

    }


    /**
     * Example upgrade to version 2.2.0
     */
    private static function upgrade_to_2_2_6()
    {

		$options_to_delete = [
			'wuadblockguard_notices',
		    '_wuadblockguard_exclude_user_roles_check',
		    '_wuadblockguard_exclude_user_roles',
		    '_wuadblockguard_exclude_categories',
		    '_wuadblockguard_exclude_tags',
		    '_wuadblockguard_exclude_special_pages',
		    '_wuadblockguard_usergroup_settings',
		    '_wuadblockguard_exclude_pages',
		    '_wuadblockguard_exclude_woocommerce_pages',
		];

		foreach ($options_to_delete as $option) {
		    delete_option($option);
		    wp_cache_delete($option, 'options');
		}

		$notices = new Notices();

		$message = sprintf(
		    __('AdBlock Guard v2.2.6 has forced a RESET and DISABLED AdBlock in this release - please <a href="%s"><b>manually reconfigure</b></a> and reactivate AdBlock Guard.', 'ad-block-guard'),
		    esc_url(admin_url('admin.php?page=wuadblockguard_settings'))
		);

		$notices->add_notice(
		    'wuadblockguard_notice_upgrade_226',
		    $message,
		    'error',
            true, // Persistent notice
            false, // Not dismissible
		    [
		        'label' => __('Dismiss this notice', 'ad-block-guard'),
		        'url'   => admin_url('admin.php?page=wuadblockguard_settings'),
		        'type'  => 'link', 
		    ]
		);

		PluginLogger::log('info', 'UPGRADE STEP v2.2.6: Deleting database options: ', [
			'options_to_delete' => $options_to_delete,
		    'bypass' => true,
		]);

    }

}
