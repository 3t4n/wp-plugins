<?php

namespace AdBlockGuard;

use AdBlockGuard\Packer;
use MatthiasMullie\Minify;
use AdBlockGuard\PluginLogger;

class AdBlock {

    protected $minLength = 6;
    protected $maxLength = 16;
    protected $debug     = false;
    protected $useLoader = true;
    protected $usePacker = true;
    protected $useMinify = true;
    protected $baseKey   = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    protected $_bait     = 'pub_300x250 pub_300x250m text-ad textAd text_ad adBanner ad-banner ad_box adbox';
    protected $javascriptCodePath = __DIR__ . '/script/code-wp-2.js';
    protected $useObsf   = true;
    protected $dataJson;
    protected $themeJson;
    protected $currentTheme = 'Compact';

    public function setBait($bait)
    {
        $this->_bait = $bait;
    }

    public function getBait()
    {
        return $this->_bait;
    }

    public function getDataJson()
    {
        return $this->dataJson;
    }

    public function setDataJson($json)
    {
        $this->dataJson = $json;
    }

    public function getThemeJson()
    {
        return $this->themeJson;
    }

    public function setThemeJson($json)
    {
        $this->themeJson = $json;
    }

    public function getCurrentTheme()
    {
        return $this->currentTheme;
    }

    public function setCurrentTheme($theme)
    {
        $this->currentTheme = $theme;
    }

    // Function to set the debug mode
    public function setDebug($debug) {
        $this->debug = $debug;
    }

    // Function to set the Loader mode
    public function setUseLoader($useLoader) {
        $this->useLoader = $useLoader;
    }

    // Function to set the Packer mode
    public function setUsePacker($usePacker) {
        $this->usePacker = $usePacker;
    }

    // Function to set the Obsf mode
    public function setUseObsf($useObsf) {
        $this->useObsf = $useObsf;
    }

    // Function to set the Minify mode
    public function setUseMinify($useMinify) {
        $this->useMinify = $useMinify;
    }

    public function isUseLoader() {
        return $this->useLoader;
    }

    public function isUsePacker() {
        return $this->usePacker;
    }


    public function __construct($debug = false) {
        $this->debug = $debug;
    }

    
	// Helper function to load JSON data
	protected function loadJsonData($json)
	{
	    $jsonArray = json_decode($json, true);

	    if (!is_array($jsonArray)) {
	        $error_message = esc_html__('Invalid JSON data encountered.', 'ad-block-guard');
	        PluginLogger::log('error', $error_message, ['json_data' => $json]);
	        throw new \Exception($error_message);
	    }

	    return $jsonArray;
	}

	// Helper function to replace placeholders in templates
	protected function replacePlaceholders($template, $replacements)
	{
	    foreach ($replacements as $key => $value) {
	        // Convert the value to a string if it is not already
	        if (!is_string($value)) {
	            $error_message = sprintf(
	                esc_html__('Non-string value for key {%1$s}: %2$s', 'ad-block-guard'),
	                esc_html($key),
	                esc_html(wp_json_encode($value, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES))
	            );
	            PluginLogger::log('error', $error_message, ['key' => $key, 'value' => $value]);
	            throw new \Exception($error_message);
	        }

	        // Perform the replacement
	        $template = str_replace('{{' . $key . '}}', $value, $template);
	    }

	    return $template;
	}

	// Helper function to determine if a string is JSON
	protected function isJson($string)
	{
	    json_decode($string);
	    return json_last_error() === JSON_ERROR_NONE;
	}

	// Perform JSON data replacements in a template
	public function jsonDataReplacements($template)
	{
	    if (empty($this->dataJson)) {
	        $error_message = esc_html__('Data JSON is not set.', 'ad-block-guard');
	        PluginLogger::log('error', $error_message, ['template' => $template]);
	        throw new \Exception($error_message);
	    }

	    // Load the JSON data
	    try {
	        $jsonArray = $this->loadJsonData($this->dataJson);
	    } catch (\Exception $e) {
	        $error_message = esc_html__('Failed to load JSON data: ', 'ad-block-guard') . $e->getMessage();
	        PluginLogger::log('error', $error_message, ['dataJson' => $this->dataJson]);
	        throw $e;
	    }

	    if (empty($jsonArray)) {
	        $error_message = esc_html__('Loaded JSON data is empty.', 'ad-block-guard');
	        PluginLogger::log('error', $error_message, ['dataJson' => $this->dataJson]);
	        throw new \Exception($error_message);
	    }

	    $replacements = $jsonArray;

	    if (empty($replacements)) {
	        $error_message = esc_html__('Replacements array is empty.', 'ad-block-guard');
	        PluginLogger::log('error', $error_message, ['jsonArray' => $jsonArray]);
	        throw new \Exception($error_message);
	    }

	    return $this->replacePlaceholders($template, $replacements);
	}

	// Perform JSON theme replacements in a template
	public function jsonThemeReplacements($template)
	{
	    if (empty($this->themeJson)) {
	        $error_message = esc_html__('Theme JSON is not set.', 'ad-block-guard');
	        PluginLogger::log('error', $error_message);
	        throw new \Exception($error_message);
	    }

	    $theme = $this->getCurrentTheme();

	    // Load the JSON data
	    try {
	        $jsonArray = $this->loadJsonData($this->themeJson);
	    } catch (\Exception $e) {
	        $error_message = esc_html__('Failed to load theme JSON data: ', 'ad-block-guard') . $e->getMessage();
	        PluginLogger::log('error', $error_message, ['themeJson' => $this->themeJson]);
	        throw $e;
	    }

	    if (!isset($jsonArray[$theme])) {
	        $error_message = sprintf(
	            esc_html__('Invalid theme [%1$s] data or theme not found.', 'ad-block-guard'),
	            esc_html($theme)
	        );
	        PluginLogger::log('error', $error_message, ['theme' => $theme, 'jsonArray' => $jsonArray]);
	        throw new \Exception($error_message);
	    }

	    $replacements = $jsonArray[$theme];

	    // Handle JSON string template
	    if ($this->isJson($template)) {
	        $templateArray = json_decode($template, true);
	        foreach ($templateArray as $key => $value) {
	            if (isset($replacements[$key])) {
	                $templateArray[$key] = $replacements[$key];
	            }
	        }
	        return wp_json_encode($templateArray);
	    }

	    return $this->replacePlaceholders($template, $replacements);
	}

    // Function to generate random strings
    private function jsRandomizer($length, $characters) {
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[wp_rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    // Function to convert string to char codes
    public function toCharCode($str) {
        return array_map('ord', str_split($str));
    }

    // Function to convert char codes back to string
    public function fromCharCode($codes) {
        return implode('', array_map('chr', $codes));
    }

    // Function to obfuscate JavaScript content
    private function customObfuscate($template, $baseKey) {
        // Define the names to be obfuscated, ordered from longest to shortest string
        $names_to_obfuscate = [
            'css-class-ad-block-overlay-content-inner',
            'css-class-ad-block-notice-content-inner',
            'js_var_wuadblockguard_notice_css_location',
            'json_data_method_custom_css_class',
            'json_data_method_custom_css_id',
            'js_const_admin_notice_header_element',
            'json_data_method_custom_load_js_enable',
            'json_data_method_custom_load_js_url',
            'js_const_notice_header_element',
            'js_var_wuadblockguard_notice_element',
            'js_const_notice_style_element',
            'theme_overlay_inner_max_width',
            'theme_overlay_inner_min_width',
            'theme_overlay_title_font_size',
            'theme_overlay_close_but_size',
            'js_var_wuadblockguard_overlay_shown',
            'css-id-ad-block-container',
            'theme_overlay_main_pad_top',
            'js_var_css_element_removal',
            'theme_overlay_font_size',
            'js_func_show_wuadblockguard_overlay',
            'css-id-ad-block-overlay-content',
            'js_func_wuadblockguard_not_detected',
            'js_var_wuadblockguard_show_notice',
            'js_func_wuadblockguard_detected',
            'js_var_wuadblockguard_detected',
            'js_func_detect_ad_block',
            'js_var_wuadblockguard_demo',
            'css-id-ad-block-notice',
            'js_var_wuadblockguard_method_1',
            'js_var_wuadblockguard_method_2',
            'js_var_wuadblockguard_method_3',
            'css-class-body-no-scroll',
            'css-id-ad-block-button',
            'css-class-close-button',
            'js_var_checks_completed',
            'css-id-ad-block-overlay',
            'js_var_total_checks',
            'js_func_verify_and_decode',
            'js_func_decode_base_64',
            'js_var_obfuscated_js',
            'js_var_calculated_checksum',
            'css-id-ad-block-overlay',
            'js_var_loader_overlay',
            'json_data_allow_scroll',
            'js_const_notice_html',
            'js_var_const_style',
            'json_data_buttons',
            'js_const_overlay',
            'js_const_notice',
            'js_var_nothing',
            'js_var_element',
            'js_var_nadda',
            'js_var_encoded',
            'js_var_checksum',
            'js_var_decoded_js',
            'js_var_decoded',
            'js_var_char',
            'js_var_sum',
            'js_var_str',
            'js_var_bait'
        ];

        // Generate unique obfuscated names
        $obfuscated_names = [];
        foreach ($names_to_obfuscate as $name) {
            do {
                $obfuscated_name = $this->jsRandomizer(wp_rand($this->minLength, $this->maxLength), $baseKey);
            } while (in_array($obfuscated_name, $obfuscated_names)); // Ensure uniqueness
            $obfuscated_names[$name] = $obfuscated_name;
        }

        // Replace the original names with the obfuscated names while ignoring {{...}}
        if ($this->useObsf)
            $template = $this->getReplacementsWithoutAlteringExistingJsonVariables($template, $obfuscated_names);

        // Replace bait classes
        $template = str_replace("pub_300x250 pub_300x250m text-ad textAd text_ad adBanner ad-banner ad_box adbox", $this->_bait, $template);

        // Remove log messages and #log related styles if debug is false
        if (!$this->debug) {
            // Remove logMessage function and its calls
            $template = preg_replace('/function\s+logMessage\(message\)\s*\{.*?\}\s*/s', '', $template);
            $template = preg_replace('/logMessage\(.*?\);/s', '', $template);
            $template = preg_replace('/#log\s*\{.*?\}/s', '', $template);
            $template = str_replace('<div id="log"></div>', '', $template);
        }

        // Add a checksum (simple checksum by summing character codes)
        $checksum = array_sum(array_map('ord', str_split($template))) % 256;

        return [$template, $checksum, $obfuscated_names];
    }

    // Function to process JavaScript file
    public function processScript($javascriptCodePath = null) {

        if ($javascriptCodePath === null) {
            $javascriptCodePath = $this->javascriptCodePath;
        }

        // Set up the WordPress Filesystem
        $creds = request_filesystem_credentials('', '', false, false, null);
        if (!\WP_Filesystem($creds)) {
            throw new \Exception(esc_html__('Could not access the file system.', 'ad-block-guard'));
        }

        global $wp_filesystem;

        // Read the JavaScript file using WP_Filesystem
        $js_content = $wp_filesystem->get_contents($javascriptCodePath);

        if ($js_content === false) {
            
            throw new \Exception(sprintf(
                // Translators: %s is the path to the JavaScript file that failed to be read.
                esc_html__('Failed to read the JavaScript file: %s', 'ad-block-guard'),
                esc_html($javascriptCodePath)
            ));
        }



        // Remove block comments and empty lines
        $js_content = preg_replace('!/\*.*?\*/!s', '', $js_content);  // Remove block comments
        $js_content = preg_replace('/\n\s*\n/', "\n", $js_content);  // Remove empty lines

        // Do our {{variable}} replacements
        $js_content = $this->jsonDataReplacements($js_content);
        $js_content = $this->jsonThemeReplacements($js_content);

        // Obfuscate the JavaScript content
        $obfuscationResult = $this->customObfuscate($js_content, $this->baseKey);
        $obfuscated_js = $obfuscationResult[0];
        $checksum = $obfuscationResult[1];
        $obfuscated_names = $obfuscationResult[2];

        // Minify
        if ($this->useMinify) {
            $minifier = new Minify\JS();
            $minifier->add($obfuscated_js);
            $obfuscated_js = $minifier->minify();
        }

        return [$obfuscated_js, $checksum, $obfuscated_names];
    }

    public function getFinalJavaScript() {

        if ($this->isUseLoader()) {
            $javascript = $this->getJavaScriptWithLoader();
        } else {
            $javascript = $this->getJavaScriptWithoutLoader();
        }

        if ($this->isUsePacker()) {
            $javascript = $this->pack($javascript);
        }

        return trim($javascript);
    }

    private function pack($plain_javascript) {
        $packer = new Packer($plain_javascript, 'High ASCII', true, false, true);
        $packed_javascript = $this->iso8859_1_to_utf8($packer->pack()); //mimics deprecated utf8_encode
        return $packed_javascript;
    }

    // Getter for JavaScript without loader
    private function getJavaScriptWithoutLoader() {
        list($obfuscated_js, $checksum, $obfuscated_names) = $this->processScript($this->javascriptCodePath);
        return $obfuscated_js;
    }

    // Getter for JavaScript loader
    private function getJavaScriptWithLoader() {
        list($obfuscated_js, $checksum, $obfuscated_names) = $this->processScript($this->javascriptCodePath);

        global $wp_filesystem;

        // Initialize the WordPress filesystem, no need for credentials
        if (empty($wp_filesystem)) {
            require_once ABSPATH . 'wp-admin/includes/file.php';
            WP_Filesystem();
        }

        // Path to your loader.js file
        $js_file_path = ADBLOCKGUARD_PLUGIN_DIR . 'src/script/loader.js';

        // Get the contents of the file using WP_Filesystem
        $js_loader_template = $wp_filesystem->get_contents($js_file_path);

        // Use the new function to replace variables
        $js_loader_template = $this->javascriptVariableReplacements($js_loader_template, $obfuscated_names, $obfuscated_js, $checksum);

        // Absolutely must Base64 encode the input
        if ($this->isUseLoader()) {
            $obfuscated_js = base64_encode($obfuscated_js);
        }

        // Replace 'OBFUSCATED_JS' and 'CHECKSUM'
        $js_loader_template = str_replace('OBFUSCATED_JAVASCRIPT_ADBLOCK_SCRIPT', $obfuscated_js, $js_loader_template);
        $js_loader_template = str_replace('JS_OBFUSCATION_CHECKSUM', $checksum, $js_loader_template);

        return $js_loader_template;
    }

    public function isDebug() {
        return $this->debug;
    }

    // Set the script path for processing
    public function setScriptPath($javascriptCodePath) {
        $this->javascriptCodePath = $javascriptCodePath;
    }

    // Function to set the bait classes
    public function setBaitClasses($baitClasses) {
        $this->_bait = implode(' ', $baitClasses);
    }

    // Getter for the bait classes
    public function getBaitClasses() {
        $baitArray = explode(' ', $this->_bait);
        shuffle($baitArray); // Randomize the order
        return implode(' ', $baitArray);
    }


    private function javascriptVariableReplacements($template, $obfuscatedNames, $obfuscatedJs, $checksum) {
        // Perform replacements with obfuscated names while ignoring {{...}}
        $template = $this->getReplacementsWithoutAlteringExistingJsonVariables($template, $obfuscatedNames);

        return $template;
    }


    private function getReplacementsWithoutAlteringExistingJsonVariables($template, $obfuscatedNames) {
        return preg_replace_callback('/(.*?)({{.*?}}|$)/s', function ($matches) use ($obfuscatedNames) {
            $part = $matches[1]; // Part of the string outside {{...}}
            $placeholder = $matches[2]; // The {{...}} placeholder

            // Perform replacements with obfuscated names
            foreach ($obfuscatedNames as $original => $obfuscated) {
                $part = str_replace($original, $obfuscated, $part);
            }

            // Return the combined result
            return $part . $placeholder;
        }, $template);
    }

    public function iso8859_1_to_utf8($s) {
        $s .= $s;
        $len = strlen($s);

        for ($i = $len >> 1, $j = 0; $i < $len; ++$i, ++$j) {
            switch (true) {
                case $s[$i] < "\x80": $s[$j] = $s[$i]; break;
                case $s[$i] < "\xC0": $s[$j] = "\xC2"; $s[++$j] = $s[$i]; break;
                default: $s[$j] = "\xC3"; $s[++$j] = \chr(\ord($s[$i]) - 64); break;
            }
        }

        return substr($s, 0, $j);
    }

}