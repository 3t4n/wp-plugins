<?php

namespace AdBlockGuard;

use AdBlockGuard\AdBlock;
use Jaybizzle\CrawlerDetect\CrawlerDetect;
use AdBlockGuard\PluginLogger;

class AdBlockExtended extends AdBlock {

    protected $is_demo = false;
    protected $role;
    protected $settings = [];
    protected $overlaySettings;
    protected $cssNoticeBlockLocation = '#content';
    protected $debugMessages = [];

/*

Possible Settings:

{
    debug
    easylist_url
    enable
    fast_detection
    hide_from_crawlers
    ignore_pages
    live_easylist
    network_detection
    prevent_masquerading
    pro_license_key
    remote_detection

    usergroup: "administrator",        // User group this setting applies to (e.g., administrator, subscriber, etc.)
    overlay_enabled: true,             // Boolean indicating whether the overlay is enabled
    theme: "Compact",                  // Theme of the overlay (e.g., Compact, Fullscreen, etc.)
    allow_close: true,                 // Boolean allowing users to close the overlay
    background_color: "#000000D9",     // Background color of the overlay (hex code with opacity)
    foreground_color: "#AC0000D9",     // Foreground color of the overlay (hex code with opacity)
    overlay_delay: 0,                  // Delay before the overlay appears (in milliseconds)
    overlay_title: "AdBlock Detected", // Title displayed on the overlay
    overlay_message:                   // Message displayed within the overlay (HTML format allowed)
        "<p>We know, advertisements are annoying, but they also support our website. Please close your adblocker to access the amazing content on our website.</p>",
    buttons: [                         // Array of buttons to be displayed on the overlay
        {
            value: "_",                // Identifier or value associated with the button
            background_color: "#007cba", // Background color of the button (hex code)
            foreground_color: "#ffffff", // Foreground color of the button (hex code)
            link: {
                value: "",             // Identifier or value associated with the link
                url: "#",              // URL the button will link to
                anchor: "I've Disabled my AdBlocker", // Text displayed on the button
                blank: '0'             // Boolean or string indicating whether to open the link in a new tab (0 for same tab, 1 for new tab)
            }
        }
    ]
}

*/


    public function setIsDemo(bool $is_demo): void
    {
        $this->is_demo = $is_demo;
    }

    public function isDemo(): bool
    {
        return $this->is_demo;
    }

    public function setRole(string $role): void
    {
        $this->role = $role;
    }

    public function setSettings(array $settingsArray): void
    {
        $this->settings = $settingsArray;
    }

    public function getCssNoticeBlockLocation (): string {
        return $this->cssNoticeBlockLocation;
    }

    public function setCssNoticeBlockLocation ($cssNoticeBlockLocation) {
        $this->cssNoticeBlockLocation = $cssNoticeBlockLocation;
    }

    /*
    * settings is the settings array, $role is the WordPress role
    */
    public function __construct(bool $debug = false)
    {
        parent::__construct($debug);

        $this->addConsoleMessages('Constructed AdBlockExtended with debug: ' . $debug);
    }

    public function initialize() {

        // wordpress setup
        $this->getWordPressSettings();

        // Check if the options exist, otherwise set them to false
        $useLoader  = ADBLOCKGUARD_USE_LOADER;
        $usePacker  = ADBLOCKGUARD_USE_PACKER;
        $useMinify  = ADBLOCKGUARD_USE_MINIFY;
        $useObsf    = ADBLOCKGUARD_USE_OBFS;

        // Apply the options if they are set to true
        $this->setUseLoader($useLoader);
        $this->setUsePacker($useLoader);
        $this->setUseMinify($useMinify);
        $this->setUseObsf($useObsf);

        $this->setBait($this->fetchCachedEasyListBait());
    }

    public function getWordPressSettings() {

        if (!$this->setUserRoleOverlay()) {
            if (defined('WP_DEBUG') && WP_DEBUG && defined('WP_DEBUG_LOG') && WP_DEBUG_LOG) {
                PluginLogger::log('error', 'AdBlockExtended: setUserRoleOverlay() did not find the role');
            }
        } else {
            $this->currentTheme = $this->overlaySettings['theme'];
            $this->addConsoleMessages('getWordPressSettings()');
            $this->addConsoleMessages($this->overlaySettings);
            $this->setWordPressDataJson();
            $this->setWordPressThemeJson();
        }

    }


    // loops through all usergroups to find our overlay settings for our present role
    public function setUserRoleOverlay()
    {
        foreach ($this->settings['usergroup_settings'] as $key => $roleOverlay) {
            if ($roleOverlay['usergroup'] === $this->role) {
                $this->overlaySettings = $roleOverlay;
                return true;
            }
        }
        return false;
    }

    public function processAndGetButtonsHtml() 
    {
        if (isset($this->overlaySettings['buttons']) && count($this->overlaySettings['buttons']) > 0) 
        {
            $buttonHtml = '<div class="css-id-ad-block-container">';

            foreach ($this->overlaySettings['buttons'] as $button) 
            {
                if (isset($button['link']['url']) && !empty($button['link']['url'])) 
                {
                    $url = $button['link']['url'];
                    $anchor = $button['link']['anchor'];
                    $target = ($button['link']['blank'] == '1') ? ' target="_blank"' : '';

                    $backgroundColor = $button['background_color'];
                    $foregroundColor = $button['foreground_color'];

                    $buttonHtml .= '<a href="' . esc_url($url) . '"' . $target . ' style="background-color:' . esc_attr($backgroundColor) . '; color:' . esc_attr($foregroundColor) . ';" class="css-id-ad-block-button">' . esc_html($anchor) . '</a>';
                }
            }

            $buttonHtml .= '</div>'; // Close the container div

            return $buttonHtml;
        } 

        return '';
    }


    public function setWordPressDataJson() {

        $data = [
            "json_data_is_demo" => $this->getTrueFalse($this->isDemo()),
            "json_data_buttons" => $this->processAndGetButtonsHtml(),
            "json_data_bgcolor" => $this->hexToRgb($this->overlaySettings['background_color']),
            "json_data_fgcolor" => $this->hexToRgb($this->overlaySettings['foreground_color']),
            "json_data_windowcolor" => $this->hexToRgb($this->overlaySettings['window_color']),
            "json_data_textcolor" => $this->hexToRgb($this->overlaySettings['title_text_color']),
            "json_data_messagecolor" => $this->hexToRgb($this->overlaySettings['message_text_color']),
            "json_data_main_title" => "margin: clamp(8px, 2vw, 16px) 0;",
            "json_data_allow_close_link" => $this->getTrueFalse($this->overlaySettings['allow_close']),
            "json_data_allow_scroll" => $this->getTrueFalse($this->overlaySettings['allow_scroll']),
            "json_data_but_disabled_link" => " ",
            "json_data_but_nothanks_link" => "#",
            "json_data_title" => $this->overlaySettings['overlay_title'],
            "json_data_description" => $this->overlaySettings['overlay_message'],
            "json_data_description_notice" => $this->overlaySettings['overlay_message'],
            "json_data_close_fa_icon" => "<i>x</i>",
            "json_data_method_custom_css_class" => (string) $this->settings['custom_css_class'],
            "json_data_method_custom_css_id" => (string) $this->settings['custom_css_id'],
			"json_data_method_custom_load_js_url" => (string) $this->settings['custom_load_js_url'],
            "json_data_method_custom_load_js_enable" => $this->getTrueFalse($this->settings['custom_load_js_enable']),
            "json_data_method_two" => $this->getTrueFalse($this->settings['remote_detection']),
            "json_data_method_one" => $this->getTrueFalse($this->settings['fast_detection']),
            "json_data_method_two" => $this->getTrueFalse($this->settings['remote_detection']),
            "json_data_method_three" => $this->getTrueFalse($this->settings['network_detection']),
            "json_data_overlay_timeout" => (string) ($this->overlaySettings['overlay_delay']*1000),
            "json_data_show_notice" => "false",
            "js_data_notice_css_location" => $this->cssNoticeBlockLocation
        ];

        $jsonData = wp_json_encode($data);

        $this->setDataJson($jsonData);
    }

    public  function getTrueFalse ($value)
    {
        if ($value)
            return "true";
        else
            return "false";

    }

    public function getXfDataJson()
    {
        return $this->getDataJson();
    }

    public function arrayToCss($array)
    {
        if (!is_array($array)) {
            return '';
        }

        $css = '';

        foreach ($array as $key => $value)
        {
            $css .= $key . ': ' . $value . ";\n";
        }
        return rtrim($css, "\n");
    }

    public function turnOff() {
        $this->setUseLoader(false);
        $this->setUsePacker(false);
        $this->setUseMinify(false);
    }

	public function setWordPressThemeJson()
	{
	    global $wp_filesystem;

	    // Initialize the filesystem API if not already initialized
	    if (!isset($wp_filesystem) || !is_object($wp_filesystem)) {
	        $creds = request_filesystem_credentials('', '', false, false, null);
	        if (!WP_Filesystem($creds)) {
	            $error_message = esc_html__('Unable to initialize the WordPress filesystem.', 'ad-block-guard');
	            PluginLogger::log('error', $error_message, ['filesystem_status' => 'not_initialized']);
	            throw new \Exception($error_message);
	        }
	    }

	    // Set the theme data path
	    $themeJsonPath = ADBLOCKGUARD_PLUGIN_DIR . 'src/json/theme.json';

	    // Read the file contents using the filesystem API
	    $themeData = $wp_filesystem->get_contents($themeJsonPath);
	    if ($themeData === false) {
	        $error_message = sprintf(
	            /* Translators: %s is the path to the JSON file that failed to be read. */
	            esc_html__('Unable to read the JSON file at %s.', 'ad-block-guard'),
	            esc_html($themeJsonPath)
	        );
	        PluginLogger::log('error', $error_message, ['path' => $themeJsonPath]);
	        throw new \Exception($error_message);
	    }

	    // Set the theme JSON data
	    try {
	        $this->setThemeJson($themeData);
	    } catch (\Exception $e) {
	        $error_message = esc_html__('Failed to set theme JSON data.', 'ad-block-guard');
	        PluginLogger::log('error', $error_message, [
	            'path' => $themeJsonPath,
	            'exception_message' => $e->getMessage(),
	        ]);
	        throw $e; // Re-throw the exception to maintain behavior
	    }
	}


    public function getLiveAdBlockSourceForAdminDemo() {

        $script = $this->getFinalJavaScript();

        $this->addConsoleMessages(esc_html__('Role: ', 'ad-block-guard') . esc_html($this->role));
        $this->addConsoleMessages($this->overlaySettings); 
        $this->addConsoleMessages($this->settings); 

        $outputBuffer = '';
        $outputBuffer .= '<script>';
        $outputBuffer .= $this->outputDebugMessages(); 
        $outputBuffer .= $script; 
        $outputBuffer .= '</script>';

        return $outputBuffer;
    }

    public function getLatestAdBlockSource() {

        // Check the user agent of the current 'visitor'
        if ($this->settings['hide_from_crawlers'] && self::isCrawler()) {
            // true if crawler user agent detected
            return;
        }

        $noCache = !ADBLOCKGUARD_CACHING;
        $isDebug = $this->debug;

        // caching logic goes here
        $script = $this->getFinalJavaScript();

        $this->addConsoleMessages(esc_html__('Role: ', 'ad-block-guard') . esc_html($this->role));
        $this->addConsoleMessages(esc_html__('noCache: ', 'ad-block-guard') . intval($noCache));
        $this->addConsoleMessages($this->settings); 

        $outputBuffer = '';
        $outputBuffer .= '<script>';
        $outputBuffer .= $this->outputDebugMessages(); 
        $outputBuffer .= $script; 
        $outputBuffer .= '</script>';

        return $outputBuffer;
    }

    public function fetchCachedEasyListBait()
    {
        // Check if caching is enabled
        if (ADBLOCKGUARD_CACHING && $this->settings['live_easylist']) {

            $cacheKey = 'wuadblockguard_bait_cache';
            $cacheLifetime = DAY_IN_SECONDS / 2;   // 12 hours

            // Try to fetch the cached value from WordPress cache
            $cachedBait = get_transient($cacheKey);

            if ($cachedBait !== false) {
                return $cachedBait;
            }

            // If not in cache, generate the bait list and cache it
            $baitList = $this->getEasyListBait();

            delete_transient($cacheKey);

            // Store the bait list in WordPress cache
            $result = set_transient($cacheKey, $baitList, $cacheLifetime);

            return $baitList;
        }

        // If caching is not enabled or cache couldn't be used, return _bait
        return $this->_bait;
    }

    public function getEasyListBait()
    {
        $baitCSS = [];
        $limit = 3;

        $defaultUrl = 'https://easylist.to/easylist/easylist.txt';
        $url = !empty($this->settings['easylist_url']) ? $this->settings['easylist_url'] : $defaultUrl;

        // Attempt to fetch content from the provided URL
        $response = wp_remote_get(esc_url_raw($url));

        if (is_wp_error($response)) {
            
            $error_message = esc_html($response->get_error_message());

			PluginLogger::log('error', 'AdBlockExtended: getEasyListBait() failed to fetch content from custom url: ' . $url);

            if ($url !== $defaultUrl) {
                $response = wp_remote_get(esc_url_raw($defaultUrl));

                if (is_wp_error($response)) {
                    
                    $error_message = esc_html($response->get_error_message());

					PluginLogger::log('error', 'AdBlockExtended: getEasyListBait() failed to fetch content from default url: ' . $defaultUrl);

                    return $this->_bait;
                }
            } else {
                // If the default URL fails, return the default bait value
                return $this->_bait;
            }
        }

        // Check the response code
        $response_code = wp_remote_retrieve_response_code($response);
        if ($response_code !== 200) {
            PluginLogger::log('error', 'AdBlockExtended: getEasyListBait() response code NOT 200 (NOT OK) from: ' . $url);
            return $this->_bait;
        }

        // Retrieve the body of the response
        $fileContents = wp_remote_retrieve_body($response);

        if (empty($fileContents)) {
            PluginLogger::log('error', 'AdBlockExtended: getEasyListBait() bait content empty from: ' . $url);
            return $this->_bait;
        }

        // Process the file contents
        $lines = explode("\n", $fileContents);
        
        foreach ($lines as $line) {
            // Check if the line starts with "##."
            if (strpos($line, '##.') === 0) {
                // Remove "##." and strip whitespace
                $bait = trim(substr($line, 3));
                if (!empty($bait)) {
                    $baitCSS[] = esc_html($bait);
                }
            }
        }

        // Shuffle and limit the array
        shuffle($baitCSS);
        $baitCSS = array_slice($baitCSS, 0, $limit);

        // Return the result as a space-separated string or the default value if empty
        return !empty($baitCSS) ? implode(' ', $baitCSS) : $this->_bait;
    }





    public static function isCrawler () {
        $CrawlerDetect = new CrawlerDetect;

        if($CrawlerDetect->isCrawler()) {
            // true if crawler user agent detected
            return true;
        }
        return false;
    }

    /* return admin div for user selected div class */
    public static function getNoticeCssIdOrClassDiv() {
        $cssIdOrClass = self::stripFirstCharacter($this->settings['cssNoticeBlockLocation']);
        $htmlDiv = "<div id='{$cssIdOrClass}' class='{$cssIdOrClass}'></div>";
        return $htmlDiv;
    }

    public static function hexToRgb($hex)
    {
        // Remove the hash if present
        $hex = ltrim($hex, '#');

        // Check if the hex code has an alpha channel
        if (strlen($hex) === 8) {
            $r = hexdec(substr($hex, 0, 2));
            $g = hexdec(substr($hex, 2, 2));
            $b = hexdec(substr($hex, 4, 2));
            $a = round(hexdec(substr($hex, 6, 2)) / 255, 2);
            return "rgba($r, $g, $b, $a)";
        } elseif (strlen($hex) === 6) {
            $r = hexdec(substr($hex, 0, 2));
            $g = hexdec(substr($hex, 2, 2));
            $b = hexdec(substr($hex, 4, 2));
            return "rgb($r, $g, $b)";
        } else {
            return false; // Invalid hex code
        }
    }



    public static function stripFirstCharacter($str) {
        if (strlen($str) > 0) {
            return substr($str, 1);
        }
        return $str; // return the original string if it's empty
    }


    /**
     * Output settings or messages to the console
     */
	public function addConsoleMessages($data)
	{
	    if (ADBLOCKGUARD_CONSOLE_LOG) {
	        // Use proper escaping for JavaScript syntax
	        $this->debugMessages[] = 'console.log("' . __CLASS__ . ':", ' . wp_json_encode($data, JSON_PRETTY_PRINT | JSON_HEX_TAG) . ');';
	    }
	}



    public function outputDebugMessages()
    {   
        $messages = '';
        if (!empty($this->debugMessages)) {
            foreach ($this->debugMessages as $message) {
                $messages .= $message;
            }
        }
        return $messages;
    }

}
