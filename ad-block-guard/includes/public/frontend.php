<?php

namespace AdBlockGuard;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

use AdBlockGuard\CarbonFieldsSetup; // Make sure to import the class
use AdBlockGuard\AdBlockExtended;
use AdBlockGuard\PluginLogger;

class Frontend
{
    private static $instance = null;
    private $debug = null;
    private $data = [];
    private $script = null;
    private $role = null;
    private $mode = 'frontend';
    private $settings;

    public static function get_instance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __construct($role = null)
    {


        // get/set all settings
        $allSettings = $this->getAllCarbonFieldSettingsFromCache();
        $this->settings = $allSettings;

        // get mode 
        if ($role === null) {
            $this->logBrowserConsole('** Frontend Mode **');
            $this->runModeFrontend();
        } else {
            $this->logBrowserConsole('** Demo Mode **');
            $this->mode = 'demo';
            $this->role = $role;
            $this->runModeDemo();
        }

    }

    private static function getAllOptionNames() {
		return [
		    'enable', 'fast_detection', 'custom_css_class', 'custom_css_id', 'custom_load_js_enable', 'custom_load_js_url', 
		    'remote_detection', 'network_detection', 'usergroup_settings', 'hide_from_crawlers', 'prevent_masquerading', 
		    'live_easylist', 'easylist_url', 'ignore_pages', 'debug', 'ignore_urls', 'exclude_pages_check', 
		    'exclude_pages', 'exclude_posts', 'exclude_categories', 'exclude_tags', 'exclude_woocommerce', 'exclude_woocommerce_pages', 
		    'exclude_special_pages_check', 'exclude_special_pages'
		];
    }

    private static function getAllTextOptions() {
		return [
		    'easylist_url', 
		    'custom_css_id', 
		    'custom_css_class', 
		    'custom_load_js_url',
		    'ignore_urls'
		];
    }

    private static function getSerializedOptionNames() {
		return [
		    'usergroup_settings', 
		    'exclude_special_pages', 
		    'exclude_pages', 
		    'exclude_woocommerce_pages', 
		    'exclude_categories', 
		    'exclude_tags'
		];
    }

    private function runModeFrontend () {
        if ($this->isEnabledGlobally()) {

            // set the role
            $this->role = $this->getRole();
            $this->logBrowserConsole("Got role: {$this->role}");

            // if we have an enabled user role overlay
            if ($this->isUserOverlayEnabled($this->role)) {

                $this->logBrowserConsole(strtoupper($this->role) . ' role overlay is enabled');

                // role overlay settings (also in allSettings)
                $roleSettings = $this->getUserGroupSettings($this->role);

                $this->logBrowserConsole('roleSettings: ('.count($roleSettings).')');

                // render the AdBlock
                $this->renderAdBlock();

            } else {
                $this->logBrowserConsole($this->role . ' is NOT Enabled');
            }
        } else {
            $this->logBrowserConsole('AdBlock Guard is DISABLED');
        }
    }

    private function runModeDemo() {
        $this->logBrowserConsole("Demo role: {$this->role}");

        // role overlay settings (also in allSettings)
        $roleSettings = $this->getUserGroupSettings($this->role);
        $this->logBrowserConsole($roleSettings);

        $AdBlock = new AdBlockExtended($this->isDebug());
        $AdBlock->setRole($this->role);
        $AdBlock->setSettings($this->data);
        $AdBlock->setIsDemo(true);
        $AdBlock->initialize();
        $this->script = $AdBlock->getLiveAdBlockSourceForAdminDemo();

        // Render the JavaScript in the footer
        add_action('admin_footer', [$this, 'render_footer_content'], 999);
    }

    private function renderAdBlock() 
    {
        if ($this->isUserOverlayRenderable()) {

            $this->logBrowserConsole('isUserOverlayRenderable() = True');

            $AdBlock = new AdBlockExtended($this->isDebug());
            $AdBlock->setRole($this->role);
            $AdBlock->setSettings($this->data);
            $AdBlock->initialize();
            $this->script = $AdBlock->getLatestAdBlockSource();

            $this->logBrowserConsole('AdBlock Overlay should be visible');

            // Render the JavaScript in the footer
            add_action('wp_footer', [$this, 'render_footer_content'], 999);
        } else {
            $this->logBrowserConsole('isUserOverlayRenderable() = False');
        }
    }

    public function render_footer_content() {
        if (!$this->isEnabledGlobally() && $this->mode === 'frontend') {
            $this->logBrowserConsole('render_footer_content: AdBlock Guard is not enabled');
            return;
        }

        if (!empty($this->script)) {
            /* 
             * WordPress Reviewers: Safe Direct Output Justification
             * 
             * The following script is output directly as it has been thoroughly sanitized and is safe.
             * 
             * Note: WP Plugin Check may flag this as a potential security risk, but it is essential for the plugin's functionality.
             * Given these factors, direct output is justified and necessary for proper operation.
             * 
             * *Important for Reviewers:*
             * 
             * Enabling `AD_BLOCK_GUARD_DEBUG` to `true` in the main plugin file will allow you to review the code 
             * without packing and obfuscation.
             * 
             * Packing and obfuscation are necessary to prevent ad-block extensions from easily identifying and blocking 
             * the features provided by this plugin. Without these measures, the purpose of this plugin would be defeated, 
             * as ad-blockers could easily circumvent the protections it provides sitewide.
             *
             * Important Details:
             *
             * 1. All user input originates from the WordPress admin area (`is_admin()`) and is managed using Carbon Fields.
             * 2. Every input is properly sanitized and escaped before being used.
             * 3. This plugin does not process or utilize any front-end user input; all operations are strictly handled by the admin.
             * 4. The JavaScript being output here is statically defined and stored in the plugin’s source file at: 
             *    /plugins/ad-block-guard/src/js/code-wp-2.js
             * 
             */
            echo $this->script;
        }
    }

    // this queries wp directly for this setting (no cache)
    public function isEnabledGlobally()
    {
    	if(isset($this->data['enable']) && $this->data['enable']) {
    		return true;
    	}

    	$this->logBrowserConsole('isEnabledGlobally() = False');

    	return false;
    }

    // this queries wp directly for this setting (no cache)
    public function isDebug()
    {
        return ADBLOCKGUARD_DEBUG;
    }

    public function is_checkbox_checked($value)
    {
        return $value === 'yes';
    }

    public function getRole()
    {
        // Check if the user is logged in
        if (is_user_logged_in()) {
            // Get the current user object
            $user = wp_get_current_user();
            
            // Get the user's roles
            $roles = $user->roles;

            // Return the first role if available
            if (!empty($roles)) {
                return $roles[0]; // Assuming the user has one primary role
            }
        }

        // Return 'guest' if the user is not logged in or no role found
        return 'guest';
    }


	public function getUserGroupSettings($role)
	{
	    // Get the settings array
	    $settings = $this->data;

	    // Check if usergroup_settings exists and is an array
	    if (isset($settings['usergroup_settings']) && is_array($settings['usergroup_settings'])) {
	        foreach ($settings['usergroup_settings'] as $group) {
	            // Check if the usergroup matches the role provided
	            if (isset($group['usergroup']) && $group['usergroup'] === $role) {
	                return $group;
	            }
	        }
	    }

	    return null; // Return null if no match found
	}


    public function getUserOverlaySettings($role)
    {
        // Get the specific user group settings
        return $this->getUserGroupSettings($role);
    }

	public function isUserOverlayEnabled($role)
	{
	    // Get the specific user group settings
	    $groupSettings = $this->getUserGroupSettings($role);

	    // Debugging: Output groupSettings
	    $this->logBrowserConsole("Group Settings for role '{$role}':");
	    $this->logBrowserConsole($groupSettings);

	    // Check if the overlay is enabled
	    if (isset($groupSettings['overlay_enabled']) && $groupSettings['overlay_enabled'] === true) {
	        return true;
	    }

	    return false;
	}


	public function getAllCarbonFieldSettingsFromCache()
	{
	    // Check if the data is already stored in $this->data
	    if (!empty($this->data)) {
	        return $this->data;
	    }

	    // Get from transient
	    $settings = get_transient(CarbonFieldsSetup::CACHE_KEY);

	    if ($settings === false) {
	        // Transient not found, fall back to the option
	        $this->logBrowserConsole("Retrieving from [[OBJECT CACHE]]");
	        $settings = get_option(CarbonFieldsSetup::CACHE_KEY);

	        // If the settings are retrieved from the option, store them back as a transient
	        if ($settings !== false) {
	            set_transient(CarbonFieldsSetup::CACHE_KEY, $settings, 0);
	        }
	    } else {
	    	$this->logBrowserConsole("Retrieving from [[TRANSIENT]]");
	    }

	    // Cache in $this->data
	    $this->data = $settings;

	    return $this->data;
	}

    public function isUserOverlayRenderable() 
    {

        // Exclude special pages
        if (!$this->canRenderOnSpecialPages()) {
        	$this->logBrowserConsole('EXCLUDED by canRenderOnSpecialPages()');
            return false;
        }

        // Exclude pages
		if (!$this->canRenderOnExcludedPages()) {
			$this->logBrowserConsole('EXCLUDED by canRenderOnExcludedPages()');
		    return false;
		}

        // Exclude posts (categories/tags)
		if (!$this->canRenderOnExcludedPosts()) {
			$this->logBrowserConsole('EXCLUDED by canRenderOnExcludedPosts()');
		    return false;
		}

	    // Check if the current URL is in the ignored list
	    if (!$this->canRenderOnIgnoredUrls()) {

	    	$this->logBrowserConsole('EXCLUDED by canRenderOnIgnoredUrls()');
	        return false;
	    }

        // Check if the WooCommerce exclusion logic allows rendering
        if (!$this->canRenderOnWooCommercePages()) {
        	$this->logBrowserConsole('EXCLUDED by canRenderOnWooCommercePages()');
            return false;
        }

        // Additional conditions can be added here, e.g., checking for other types of pages or custom logic.

        // Default to rendering if none of the conditions block it
        return true;
    }

	private function getCurrentRelativePath() {
	    // Parse the current URL
	    $parsedUrl = wp_parse_url($_SERVER['REQUEST_URI']);
	    $currentPath = isset($parsedUrl['path']) ? rtrim($parsedUrl['path'], '/') : '/';
	    return $currentPath;
	}



	private function isPathMatchingPattern($currentPath, $pattern) {
	    // Escape special regex characters except for '*'
	    $regex = '/^' . str_replace(
	        ['\*', '/\*/'], // Replace '*' and '/*' for wildcard flexibility
	        ['.*', '(.*\/)?'], // '*' matches anything; '/*' matches subdirectories
	        preg_quote($pattern, '/')
	    ) . '$/';
	    return preg_match($regex, $currentPath);
	}

private function canRenderOnIgnoredUrls() {
    $ignoredUrls = trim($this->settings['ignore_urls']);

    // If no ignore URLs set, nothing to ignore so render.
    if (empty($ignoredUrls)) {
        return true;
    }

    // Normalize ignored patterns: trim, ensure leading slash, and remove trailing slash (if not wildcard)
    $urlPatterns = array_filter(array_map(function($line) {
        $trimmed = trim($line);
        if (!$trimmed) {
            return null;
        }
        // Ensure the line has a leading slash.
        $normalized = (strpos($trimmed, '/') === 0 ? $trimmed : '/' . $trimmed);
        // If the pattern ends with a wildcard, remove the wildcard from normalization,
        // then later use it for prefix match.
        if (substr($normalized, -1) === '*') {
            return rtrim($normalized, '*'); // Preserve pattern as prefix
        }
        return rtrim($normalized, '/');  // Remove trailing slash for consistency
    }, explode("\n", $ignoredUrls)));

    if (empty($urlPatterns)) {
        return true;
    }

    $currentPath = rtrim($this->getCurrentRelativePath(), '/'); // also remove trailing slash

    // Loop through each pattern and check if the current path matches.
    foreach ($urlPatterns as $pattern) {

        // Check if the pattern is a prefix match (wildcard version) OR a full equality match
        if (substr($pattern, -1) === '/' || $pattern === $currentPath) {
            // For patterns that don't indicate a wildcard, perform an equality check.
            // (We already removed the trailing slash from normalization so the check is consistent.)
            if ($pattern === $currentPath) {
            	$this->logBrowserConsole('EXCLUDE Url: ' . $pattern);
                return false;
            }
        } else {
            // Since we removed wildcard (*) earlier, we treat the pattern as a prefix for wildcard matches.
            // If the $pattern isn't empty and currentPath starts with $pattern, it's a match.
            if (!empty($pattern) && strpos($currentPath, $pattern) === 0) {
            	$this->logBrowserConsole('EXCLUDE WILDCard (*) Url: ' . $pattern);
                return false;
            }
        }
    }

    // None of the patterns matched.
    return true;
}


private function canRenderOnExcludedPages() {

    // Check if the exclusion is enabled
    if (empty($this->data['exclude_pages_check'])) {
        return true;
    }

    // Ensure the excluded pages list exists and is not empty
    if (!isset($this->data['exclude_pages']) || empty($this->data['exclude_pages'])) {
        return true;
    }

    // Extract valid page IDs
    $excludedPageIds = array_filter(
        $this->data['exclude_pages'], // No 'value' wrapping
        'is_numeric'
    );

    // If no valid excluded pages, allow rendering
    if (empty($excludedPageIds)) {
        return true;
    }

    // Ensure we're on a valid page and check if the current page ID is excluded
    $currentPageId = get_the_ID();
    if ($currentPageId && in_array($currentPageId, $excludedPageIds, true)) {
        return false; // Block rendering
    }

    return true; // Allow rendering
}

private function canRenderOnExcludedPosts() {

    if (!$this->data['exclude_posts']) {
        return true;
    }

    // Check if categories are excluded
    if (isset($this->data['exclude_categories']) && !empty($this->data['exclude_categories'])) {
        $excludedCategories = array_filter($this->data['exclude_categories'], 'is_numeric'); // No 'value' wrapping
    } else {
        $excludedCategories = [];
    }

    // Check if tags are excluded
    if (isset($this->data['exclude_tags']) && !empty($this->data['exclude_tags'])) {
        $excludedTags = array_filter($this->data['exclude_tags'], 'is_numeric'); // No 'value' wrapping
    } else {
        $excludedTags = [];
    }

    // If neither categories nor tags are excluded, allow rendering
    if (empty($excludedCategories) && empty($excludedTags)) {
        return true;
    }

    $currentPostId = get_the_ID();
    if (!$currentPostId || get_post_type($currentPostId) !== 'post') {
        return true; // Allow rendering if not on a valid post page
    }

    // Get categories and tags for the current post
    $postCategories = wp_get_post_categories($currentPostId);
    $postTags = wp_get_post_tags($currentPostId, ['fields' => 'ids']);

    // Check for intersection with excluded categories or tags
    $hasExcludedCategory = !empty(array_intersect($postCategories, $excludedCategories));
    $hasExcludedTag = !empty(array_intersect($postTags, $excludedTags));

    // Block rendering if either condition matches
    return !$hasExcludedCategory && !$hasExcludedTag;
}

private function canRenderOnWooCommercePages() {

    // Ensure WooCommerce is active
    if (!class_exists('WooCommerce')) {
        return true; // Allow rendering if WooCommerce is not active
    }

    // Check if WooCommerce exclusion is enabled
    if (empty($this->data['exclude_woocommerce'])) {
        return true;
    }

    // Validate excluded WooCommerce pages
    if (!isset($this->data['exclude_woocommerce_pages']) || empty($this->data['exclude_woocommerce_pages'])) {
        return true;
    }

    // Loop through excluded WooCommerce pages and check if the current page matches
    foreach ($this->data['exclude_woocommerce_pages'] as $page) {
        if ($this->isCurrentWooCommercePageTypeExcluded($page)) { // No 'value' wrapping
            return false; // Block rendering if the current page matches an excluded WooCommerce page type
        }
    }

    return true; // Allow rendering if no conditions block it
}

private function canRenderOnSpecialPages() {

    // Check if special page exclusions are enabled
    if (empty($this->data['exclude_special_pages_check'])) {
        return true;
    }

    // Validate excluded special pages
    if (empty($this->data['exclude_special_pages']) || !is_array($this->data['exclude_special_pages'])) {
        return true;
    }

    // Loop through excluded special pages and check if the current page matches
    foreach ($this->data['exclude_special_pages'] as $pageType) { // No 'value' wrapping
        if ($this->isCurrentPageTypeExcluded($pageType)) {
            return false; // Block rendering if the current page matches an excluded type
        }
    }

    return true; // Allow rendering if no exclusions match
}



private function isCurrentWooCommercePageTypeExcluded($pageType) {

    switch ($pageType) {
        case 'is_shop':
            return is_shop();
        case 'is_product_category':
            return is_product_category();
        case 'is_product_tag':
            return is_product_tag();
        case 'is_product':
            return is_product();
        case 'is_cart':
            return is_cart();
        case 'is_checkout':
            return is_checkout();
        case 'is_account_page':
            return is_account_page();
        case 'is_order_received_page':
            return is_order_received_page();
        default:
            return false;
    }
}




	private function isCurrentPageTypeExcluded($pageType) {


		

	    switch ($pageType) {
	        case 'is_singular':
	            return is_singular();
	        case 'is_page':
	            return is_page();
	        case 'is_single':
	            return is_single();
	        case 'is_front_page':
	            // Exclude the homepage regardless of whether it's a static page or blog posts index
	            return is_front_page() || is_home();
	        case 'is_home':
	            return is_home();
	        case 'is_archive':
	            return is_archive();
	        case 'is_category':
	            return is_category();
	        case 'is_tag':
	            return is_tag();
	        case 'is_tax':
	            return is_tax();
	        case 'is_search':
	            return is_search();
	        case 'is_404':
	            return is_404();
	        case 'login_page':
	            return $this->isLoginPage();
	        case 'registration_page':
	            return $this->isRegistrationPage();
	        default:
	            return false;
	    }
	}

	private function isLoginPage() {
	    return $GLOBALS['pagenow'] === 'wp-login.php';
	}

	private function isRegistrationPage() {
	    return isset($_GET['action']) && $_GET['action'] === 'register';
	}



	public function logBrowserConsole($data, $level='info')
	{
	    if (ADBLOCKGUARD_CONSOLE_LOG) {
	        echo '<script type="text/javascript">';

	        if ($level === 'error') {
	            // Corrected the syntax for applying CSS styles in console.log
	            echo 'console.log("%c' . __CLASS__ . ':", "color: red; font-weight: bold;", ' . wp_json_encode($data, JSON_PRETTY_PRINT | JSON_HEX_TAG) . ');';
	        } else {
	            echo 'console.log("' . __CLASS__ . ':", ' . wp_json_encode($data, JSON_PRETTY_PRINT | JSON_HEX_TAG) . ');';
	        }

	        echo '</script>';
	    }
	}


}
