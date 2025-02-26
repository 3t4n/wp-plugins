<?php

namespace AdBlockGuard;

use Alledia\EDD_SL_Plugin_Updater;
use AdBlockGuard\PluginLogger;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class LicenseChecker
{
    private $licenseKey;
    private $productId = ADBLOCKGUARD_ITEM_ID; // Your product ID
    private $storeUrl = ADBLOCKGUARD_STORE_URL; // Your store URL
    private $cacheDuration; // Cache duration for the transient

    private static $instance = null;

    private function __construct($licenseKey = null)
    {
        $this->cacheDuration = defined('ADBLOCKGUARD_DEBUG') && ADBLOCKGUARD_DEBUG ? HOUR_IN_SECONDS : DAY_IN_SECONDS;

        // Private constructor to prevent direct instantiation
        if ($licenseKey) {
            $this->licenseKey = $licenseKey;
            update_option('wuadblockguard_license_key', $licenseKey);
        } else {
            $this->licenseKey = get_option('wuadblockguard_license_key', '');
        }

        $this->registerPluginRowMeta();
        $this->initializeUpdater();
        $this->setupUpdateTransientsClear();
        $this->scheduleCrons();
    }

    public static function getInstance($licenseKey = null)
    {
        if (self::$instance === null) {
            self::$instance = new self($licenseKey);
        }
        return self::$instance;
    }

    public function getProductId()
    {
        return $this->productId;
    }

    public function getStoreUrl()
    {
        return $this->storeUrl;
    }

    public function getLicenseKey()
    {
        return $this->licenseKey;
    }

    public function setLicenseKey($licenseKey)
    {
        $this->licenseKey = $licenseKey;
        update_option('wuadblockguard_license_key', $licenseKey);
    }

    public function activateLicense()
    {
        $api_params = array(
            'edd_action' => 'activate_license',
            'license'    => $this->licenseKey,
            'item_id'    => $this->getProductId(),
            'url'        => home_url(),
        );

        $response = wp_remote_post($this->getStoreUrl(), array('body' => $api_params));

        if (is_wp_error($response)) {
            return array('success' => false, 'error' => $response->get_error_message());
        }

        $license_data = json_decode(wp_remote_retrieve_body($response));

        if ($license_data->license === 'valid') {
            $this->updateLicenseStatus('valid', $license_data->expires);
            return array('success' => true, 'expires' => $license_data->expires);
        } else {
            $this->updateLicenseStatus('invalid');
            return array('success' => false, 'error' => $license_data->error);
        }
    }

    public function deactivateLicense()
    {
        $api_params = array(
            'edd_action' => 'deactivate_license',
            'license'    => $this->licenseKey,
            'item_id'    => $this->getProductId(),
            'url'        => home_url(),
        );

        $response = wp_remote_post($this->getStoreUrl(), array('body' => $api_params));

        if (is_wp_error($response)) {
            $error_message = $response->get_error_message();

            PluginLogger::log('debug', "Deactivate License - WP Error: " . $error_message);
            

            return array('success' => false, 'error' => $error_message);
        }

        $license_data = json_decode(wp_remote_retrieve_body($response));

        if ($license_data && isset($license_data->license) && $license_data->license === 'deactivated') {
            $this->clearLicenseData();
            return array('success' => true);
        } else {
            $error_message = isset($license_data->error) ? $license_data->error : __('An unknown error occurred during license deactivation.', 'ad-block-guard');

            // Log the full API response for further diagnosis
            PluginLogger::log('debug', "Deactivate License - Full Response: " . wp_json_encode($license_data, JSON_PRETTY_PRINT));

            return array('success' => false, 'error' => $error_message);
        }
    }

    public function registerPluginRowMeta()
    {
        // Ensure filters are only added once
        if (has_filter('plugin_row_meta', [$this, 'pluginRowMeta']) === false) {
            add_filter('plugin_row_meta', [$this, 'pluginRowMeta'], 10, 2);
        }

        if (has_filter('plugin_action_links_ad-block-guard/ad-block-guard.php', [$this, 'pluginActionLinks']) === false) {
            add_filter('plugin_action_links_ad-block-guard/ad-block-guard.php', [$this, 'pluginActionLinks'], 10, 2);
        }
    }

	public function pluginRowMeta($plugin_meta, $plugin_file)
	{
	    // Check if this is the correct plugin
	    if ($plugin_file === 'ad-block-guard/ad-block-guard.php') {
	        // Add the "Rate it" link
	        $plugin_meta[] = '<a href="https://wordpress.org/support/plugin/ad-block-guard/reviews/#new-post" target="_blank" rel="noopener noreferrer">' . __('Rate AdBlock Guard', 'ad-block-guard') . '</a>';

	        // Add the "Get Support" link
	        $plugin_meta[] = '<a href="https://www.wutime.com/contact/" target="_blank" rel="noopener noreferrer">' . __('Get Support', 'ad-block-guard') . '</a>';
	    }

	    return $plugin_meta;
	}


	public function pluginActionLinks($links, $plugin_file)
	{
	    if ($plugin_file === 'ad-block-guard/ad-block-guard.php') {
	        // Add Settings link
	        $settings_link = '<a href="' . esc_url(admin_url('admin.php?page=wuadblockguard_settings')) . '">' . __('Settings', 'ad-block-guard') . '</a>';
	        array_unshift($links, $settings_link); // Add to the beginning of the links

	        // Add other links
	        if ($this->isLicenseValid()) {
	            $links[] = '<a href="' . esc_url(admin_url('admin.php?page=wuadblockguard_license_key')) . '">' . __('Manage License', 'ad-block-guard') . '</a>';
	        } else {
	            $links[] = '<a href="' . esc_url(admin_url('admin.php?page=wuadblockguard_license_key')) . '">' . __('Activate License', 'ad-block-guard') . '</a>';
	            $links[] = '<a href="' . esc_url($this->getUpgradeLink()) . '" aria-label="' . esc_attr__('Upgrade to AdBlock Guard Pro', 'ad-block-guard') . '" target="_blank" rel="noopener noreferrer" style="color: rgb(0, 163, 42); font-weight: 700;" onmouseover="this.style.color=\'#008a20\';" onmouseout="this.style.color=\'#00a32a\';">' . __('Get AdBlock Guard Pro', 'ad-block-guard') . '</a>';
	        }
	    }

	    return $links;
	}


    public function isLicenseValid()
    {
        // Check the transient for last license check time
        $lastCheck = get_transient(ADBLOCKGUARD_LICENSE_LAST_CHECK);
        if ($lastCheck && $lastCheck > time()) {
            // Transient exists and is still valid, use cached license status
            $licenseStatus = get_option('wuadblockguard_license_status', 'inactive');
            return $licenseStatus === 'valid';
        }

        // If the transient has expired, check the license status with the remote server
        $result = $this->checkLicenseValidity();
        return $result['success'] && $result['status'] === 'valid';
    }

    public function isUpdateAvailable()
    {
        // Here you would check the current installed version against the available version on the server.
        $current_version = ADBLOCKGUARD_VERSION;
        $latest_version = get_transient('wuadblockguard_latest_version');

        if (!$latest_version) {
            $response = wp_remote_get($this->getStoreUrl() . '/edd-api/products/?product=' . $this->getProductId());
            if (!is_wp_error($response)) {
                $data = json_decode(wp_remote_retrieve_body($response));
                $latest_version = $data->products[0]->info->version ?? $current_version;
                set_transient('wuadblockguard_latest_version', $latest_version, DAY_IN_SECONDS);
            }
        }

        return version_compare($current_version, $latest_version, '<');
    }

    public function initializeUpdater()
    {
        if (is_admin()) {
            $edd_updater = new EDD_SL_Plugin_Updater($this->getStoreUrl(), ADBLOCKGUARD_PLUGIN_FILE, array(
                'version'   => ADBLOCKGUARD_VERSION,
                'license'   => $this->getLicenseKey(),
                'item_id'   => $this->getProductId(),
                'author'    => 'Wutime',
                'url'       => home_url(),
                'beta'      => false,
                'automatic' => true, // This enables auto-updates
            ));
        }
    }

    public function setupUpdateTransientsClear()
    {
        add_action('upgrader_process_complete', function ($upgrader_object, $options) {
            if ($options['action'] == 'update' && $options['type'] == 'plugin') {
                if (isset($options['plugins']) && in_array(plugin_basename(__FILE__), $options['plugins'])) {
                    // Clear only the transients related to your plugin
                    delete_transient('wuadblockguard_latest_version');
                    delete_transient('wuadblockguard_product_details');
                    delete_option('wuadblockguard_license_status');
                    delete_option('wuadblockguard_license_expires');
                }
            }
        }, 10, 2);
    }


	public function scheduleCrons()
	{
	    // Schedule the 'wuadblockguard_update_product_details' cron job
	    if (!wp_next_scheduled('wuadblockguard_update_product_details')) {
	        wp_schedule_event(time(), 'weekly', 'wuadblockguard_update_product_details');
	    }

	    // Schedule the 'wuadblockguard_license_check' cron job
	    $hook = 'wuadblockguard_license_check';
	    $interval = defined('ADBLOCKGUARD_DEBUG') && ADBLOCKGUARD_DEBUG ? 'hourly' : 'daily';

	    // Remove all scheduled instances of the hook (to prevent duplicates)
	    while ($timestamp = wp_next_scheduled($hook)) {
	        wp_unschedule_event($timestamp, $hook);
	    }

	    // Schedule the hook if not already scheduled
	    if (!wp_next_scheduled($hook)) {
	        $scheduled = wp_schedule_event(time(), $interval, $hook);

	        // Log or debug scheduling failures
	        if (!$scheduled) {
	            error_log("Failed to schedule event: {$hook} with interval {$interval}");
	        }
	    }

	    // Ensure the hook is connected to its callback
	    add_action('wuadblockguard_license_check', [$this, 'validateLicenseCron']);
	}


	public function clearScheduledCrons()
	{
	    // Clear all instances of 'wuadblockguard_update_product_details'
	    wp_unschedule_hook('wuadblockguard_update_product_details');

	    // Clear all instances of 'wuadblockguard_license_check'
	    wp_unschedule_hook('wuadblockguard_license_check');
	}


    public function updateProductDetails()
    {
        $this->getProductDetails();
    }

    public function checkLicense()
    {
        $this->checkLicenseValidity();
    }

    public function getProductDetails()
    {
        $transient_name = 'wuadblockguard_product_details';
        $product_details = get_transient($transient_name);

        if ($product_details === false) {
            $download_id = $this->getProductId();
            $url = $this->getStoreUrl();
            $productApiUrl = $url . '/edd-api/products/?product=' . $download_id;

            $response = wp_remote_get($productApiUrl);

            if (is_wp_error($response)) {
                return false;
            }

            $body = wp_remote_retrieve_body($response);
            $data = json_decode($body);

            if (isset($data->products[0]->info)) {
                $info = $data->products[0]->info;
                $licensing = $data->products[0]->licensing;

                $product_details = [
                    'permalink' => $info->permalink,
                    'title' => $info->title,
                    'price' => wp_strip_all_tags($info->price),
                    'version' => $licensing->version, // Ensure we store the latest version
                ];

                set_transient($transient_name, $product_details, WEEK_IN_SECONDS);
                set_transient('wuadblockguard_latest_version', $licensing->version, WEEK_IN_SECONDS); // Cache the latest version
            } else {
                return false;
            }
        }

        return $product_details;
    }

    public function checkLicenseValidity($forceCheck = false)
    {
        $lastCheck = get_transient(ADBLOCKGUARD_LICENSE_LAST_CHECK);

        if (!$forceCheck && $lastCheck) {

            // Transient exists, return cached status
            $licenseStatus = get_option('wuadblockguard_license_status', 'inactive');

            return [
                'success' => $licenseStatus === 'valid',
                'status' => $licenseStatus,
                'expires' => get_option('wuadblockguard_license_expires', ''),
                'cached' => true
            ];
        }

        // Prepare the API request parameters
        $api_params = array(
            'edd_action' => 'check_license',
            'license'    => $this->getLicenseKey(),
            'item_id'    => $this->getProductId(),
            'url'        => home_url(),
        );

        // Send the request to the EDD store
        $response = wp_remote_post($this->getStoreUrl(), array('body' => $api_params));

        if (is_wp_error($response)) {
            PluginLogger::log('error', "Check License Validity - WP Error: " . $response->get_error_message());
            return array('success' => false, 'error' => $response->get_error_message());
        }

        $license_data = json_decode(wp_remote_retrieve_body($response));

        if ($license_data && isset($license_data->license)) {
            $this->updateLicenseStatus($license_data->license, $license_data->expires ?? null);

            return [
                'success' => $license_data->license === 'valid',
                'status' => $license_data->license,
                'expires' => $license_data->expires ?? '',
                'cached' => false
            ];
        } else {
            PluginLogger::log('error', 'License Check Error: Invalid response from license server.');

            return [
                'success' => false,
                'status' => 'error',
                'error' => __('Invalid response from license server.', 'ad-block-guard')
            ];
        }
    }

    public function validateLicenseCron()
    {
        // Force a license check and update cached data
        $this->checkLicenseValidity(true);
    }


    private function updateLicenseStatus($status, $expires = null)
    {
        update_option('wuadblockguard_license_status', $status);
        set_transient(ADBLOCKGUARD_LICENSE_LAST_CHECK, time() + $this->cacheDuration, $this->cacheDuration);

        if ($expires) {
            update_option('wuadblockguard_license_expires', $expires);
        }
    }

    private function clearLicenseData()
    {
        delete_transient(ADBLOCKGUARD_LICENSE_LAST_CHECK);
        delete_option('wuadblockguard_license_key');
        delete_option('wuadblockguard_license_status');
        delete_option('wuadblockguard_license_expires');
    }

    public function getUpgradeLink()
    {
        $productDetails = $this->getProductDetails();
        return $productDetails['permalink'] . '?utm_source=WordPress&utm_medium=all-plugins&utm_campaign=liteplugin&utm_locale=' . get_locale() . '&utm_content=' . rawurlencode(__('Get AdBlock Guard Pro', 'ad-block-guard'));
    }
}
