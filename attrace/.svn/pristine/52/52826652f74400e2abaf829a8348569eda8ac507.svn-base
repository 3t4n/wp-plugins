<?php


use Attrace\Connector\API\Controller\ConfigController;
use Attrace\Connector\API\Model\ConfigModel;
use Attrace\Connector\MasterTag\TagManager;
use Attrace\Connector\Util\NetUtil;

include_once 'lib/Attr4ce_Constants.php';

/**
 * Creates the Settings item for the plugin.
 *
 * @package Attrace
 */
class Attr4Ce_Config
{


    /**
     * Initializes all of the partial classes.
     *
     */
    public function __construct()
    {
    }

    /**
     * Adds a submenu for this plugin to the 'Tools' menu.
     */
    public function init()
    {
        add_action('admin_init', array($this, 'registerSettings'));
        add_action('admin_menu', array($this, 'setupMenu'));
    }

    public function setupMenu()
    {
        add_submenu_page(
            'attrace-integration-configs',
			__('Configure', 'attrace'),
			__('Configuration', 'attrace'),
            'manage_options',
            'attrace-config',
            array($this, 'render')
        );
    }


    public function render()
    {
        include_once('views/settings.php');
    }

    public function registerSettings()
    {
        register_setting(Attr4ce_Constants::OPTION_GROUP, Attr4ce_Constants::OPTION_GROUP, [$this, 'validateInput']);

        add_settings_section(Attr4ce_Constants::ATTRACE_SETTINGS, __('Configuration', 'attrace'), [$this, 'renderConfigurationSectionText'], Attr4ce_Constants::PAGE);
        add_settings_field('account', __('Account', 'attrace'), [$this, 'account'], Attr4ce_Constants::PAGE, Attr4ce_Constants::ATTRACE_SETTINGS);
        add_settings_field('clickoutSlug', __('Clickout Path', 'attrace'), [$this, 'clickOutSlug'], Attr4ce_Constants::PAGE, Attr4ce_Constants::ATTRACE_SETTINGS);
        add_settings_field('networkBroadcastStrategy', __('Network broadcast strategy', 'attrace'), [$this, 'networkBroadcastStrategy'], Attr4ce_Constants::PAGE, Attr4ce_Constants::ATTRACE_SETTINGS);

        add_settings_section('attrace_tracking_conversion', __('Advertiser tracking & conversion', 'attrace'), [$this, 'renderConversionSectionText'], Attr4ce_Constants::PAGE);
        add_settings_field('trackingStrategy', __('Tracking strategy', 'attrace'), [$this, 'trackingStrategy'], Attr4ce_Constants::PAGE, 'attrace_tracking_conversion');
        add_settings_field('conversionStrategy', __('Conversion strategy', 'attrace'), [$this, 'conversionStrategy'], Attr4ce_Constants::PAGE, 'attrace_tracking_conversion');

        add_settings_field('masterTagUrl', __('MasterTag URL', 'attrace'), [$this, 'masterTagUrl'], Attr4ce_Constants::PAGE, 'attrace_tracking_conversion');
        add_settings_field('shortcodes', __('Shortcodes', 'attrace'), [$this, 'shortcodes'], Attr4ce_Constants::PAGE, 'attrace_tracking_conversion');
        add_settings_section('attrace_advanced', __('Advanced', 'attrace'), [$this, 'renderAdvancedSectionText'], Attr4ce_Constants::PAGE);
        add_settings_field('profilingLevel', __('Profiling', 'attrace'), [$this, 'profilingLevel'], Attr4ce_Constants::PAGE, 'attrace_advanced');
        add_settings_field('network', __('Network', 'attrace'), [$this, 'network'], Attr4ce_Constants::PAGE, 'attrace_advanced');
        add_settings_field('mode', __('Mode', 'attrace'), [$this, 'mode'], Attr4ce_Constants::PAGE, 'attrace_advanced');
    }


    public function renderConfigurationSectionText()
    {
        echo "<hr/>";
    }

    public function renderConversionSectionText()
    {
        echo "<hr/>";
        echo "<br/>";
        _e('This section is for tracking and conversion settings. If you are a publisher (so only serving clickouts), this section is irrelevant for you.', 'attrace');
        echo "<br/>";
    }

    public function renderAdvancedSectionText()
    {
        echo "<hr/>";
    }


    public function account()
    {
        $address = ConfigController::getInstance()->get(ConfigModel::ACCOUNT, "");
        printf("<input id='account' name='%s[" . ConfigModel::ACCOUNT . "]' type='text' value='%s'  size=\"80\" />", Attr4ce_Constants::OPTION_GROUP,
            esc_attr($address));
        $this->printDescription(__('You Attrace public address will be used to add as a meta tag to the header of your website. This way the Attrace Network can verify the owner of this public address is indeed the owner of this website. Also this address is used if you wish to use monitoring on your connector to check security.', 'attrace'));
		$this->printDescription(__('Copy the public address from the Attrace menu and paste it in the text field above:', 'attrace'));
		$this->printDescription('<img width="300" src="' . plugins_url("assets/img/public-address.png", __FILE__) . '" />');
    }

    public function clickoutSlug()
    {
        $slug = ConfigController::getInstance()->get(ConfigModel::CLICKOUT_PATH);
        printf("<input id='clickoutSlug' name='%s[" . ConfigModel::CLICKOUT_PATH . "]' type='text' value='%s'  size=\"50\" />", Attr4ce_Constants::OPTION_GROUP,
            esc_attr($slug));
        $this->printDescription(__('The click-out URL to the page you want to promote will look like this:', 'attrace'));
		$this->printDescription('<em>' . NetUtil::getDomainUrl(true) . $slug . '/%hash%</em>.');
		$this->printDescription(__('Change this value if you would like another URL', 'attrace'));
    }

    function networkBroadcastStrategy()
    {
        $value = ConfigController::getInstance()->get(ConfigModel::NETWORK_BROADCAST_STRATEGY);
        $this->createDropdown(ConfigModel::NETWORK_BROADCAST_STRATEGY, [
            ConfigModel::NETWORK_BROADCAST_STRATEGY_BLOCKING => __('Direct (blocking)', 'attrace'),
            ConfigModel::NETWORK_BROADCAST_STRATEGY_QUEUE    => __('Queue (using WP Cron)', 'attrace')
        ], $value);
        $this->printDescription(__('The Network broadcast strategy determines if the click should be put on a queue and processed later by cronjob, or is directly executed<br/>(which can cause a slight delay in the redirect to your advertiser).', 'attrace'));
		$this->printDescription(__('<strong>Direct:</strong> (Default) Broadcast to the network before the user is redirected (and blocks the user).', 'attrace'));
		$this->printDescription(__('<strong>Queue:</strong> Fast background processing, where a background thread or queue is broadcasting to the network near-realtime. Needs WP Cron enabled', 'attrace'));
    }

    function trackingStrategy()
    {
        $value = ConfigController::getInstance()->get(ConfigModel::TRACKING_STRATEGY);
        $this->createDropdown(ConfigModel::TRACKING_STRATEGY, [
            ConfigModel::TRACKING_STRATEGY_BACKEND => __('Backend', 'attrace'),
            ConfigModel::TRACKING_STRATEGY_JS      => __('Javascript Clientside', 'attrace')
        ], $value);
        $this->printDescription(__('For advertisers, the tracking strategy determines how the connector is setting cookies.<br/>If possible, use server side tracking (for instance within WooCommerce). The JS mtag library is in this case not used.', 'attrace'));
		$this->printDescription(__('<strong>Backend:</strong> (Default) Server module adds Set-Cookie headers.', 'attrace'));
		$this->printDescription(__('<strong>Javascript Clientside:</strong> Javascript mastertag sets the tracking cookies.', 'attrace'));
    }

    function conversionStrategy()
    {
        $value = ConfigController::getInstance()->get(ConfigModel::CONVERSION_STRATEGY);
        $this->createDropdown(ConfigModel::CONVERSION_STRATEGY, [
            ConfigModel::CONVERSION_STRATEGY_BACKEND => __('Backend', 'attrace'),
            ConfigModel::CONVERSION_STRATEGY_JS      => __('Javascript Clientside', 'attrace')
        ], $value);
        $this->printDescription(__('For advertisers, the conversion strategy determines how the conversion is created. When enabled, Woocommerce can execute the conversion serverside.<br/>If you use another shopping system, either use the Javascript or shortcodes to create the conversion, or implement the conversion within your solution.', 'attrace'));
		$this->printDescription(__('<strong>Backend:</strong> (Default) Server module handles the conversions.', 'attrace'));
        $this->printDescription(__('<strong>Javascript Clientside:</strong> Javascript tag handles conversions.', 'attrace'));
    }

    function profilingLevel()
    {
        $value = ConfigController::getInstance()->get(ConfigModel::PROFILING_LEVEL);
        $this->createDropdown(ConfigModel::PROFILING_LEVEL, [
            ConfigModel::PROFILING_LEVEL_NONE => __('No profiling', 'attrace'),
            ConfigModel::PROFILING_LEVEL_ALL  => __('All', 'attrace')
        ], $value);
		
		$this->printDescription(__('This option additional tracing level for performance and debugging.', 'attrace'));
		$this->printDescription(__('<strong>No profiling:</strong> (Default) No profiling enabled (good performance).', 'attrace'));
		$this->printDescription(__('<strong>All:</strong> Debug all requests with profiling (degraded performance)', 'attrace'));
    }

    function mode()
    {
        $value = ConfigController::getInstance()->get(ConfigModel::MODE);
        $this->createDropdown(ConfigModel::MODE, [
            ConfigModel::MODE_PRODUCTION  => __('Production', 'attrace'),
            ConfigModel::MODE_DEVELOPMENT => __('Development', 'attrace')
        ], $value);
		$this->printDescription(__('Environment setting in which this plugin is running', 'attrace'));
		$this->printDescription(__('<strong>Production:</strong> (Default) Guarantees that all develop functionality is disabled.', 'attrace'));
		$this->printDescription(__('<strong>Development:</strong> Debug mode enabled, might expose phpinfo and other environment sensitive info.', 'attrace'));
    }

    function network()
    {
        $value = ConfigController::getInstance()->get(ConfigModel::NETWORK);
        $this->createDropdown(ConfigModel::NETWORK, [
            ConfigModel::NETWORK_BETANET => 'Betanet',
            ConfigModel::NETWORK_TESTNET => 'Testnet'
        ], $value);

		$this->printDescription(__('This option additional determines which network the connector is publishing its transactions.', 'attrace'));
		$this->printDescription(__('<strong>Betanet:</strong> (Default) The production environment of Attrace.network, to publish real transactions', 'attrace'));
		$this->printDescription(__('<strong>Testnet:</strong> The test environment of Attrace.network, use this for testing or debug purposes only', 'attrace'));
    }


    public function masterTagUrl()
    {
        $tag = ConfigController::getInstance()->get(ConfigModel::MASTERTAG_URL);

        printf("<input id='masterTagUrl' name='%s[" . ConfigModel::MASTERTAG_URL . "]' type='text' value='%s'  size=\"50\" />", Attr4ce_Constants::OPTION_GROUP,
            esc_attr($tag));

        $versionedTag = str_replace('.js', '.' . TagManager::getMtagHash() . '.js', $tag);
        $versionedTag = str_replace('_js', '_' . TagManager::getMtagHash() . '_js', $versionedTag);
		$domainUrl = NetUtil::getDomainUrl(true);
  
		$this->printDescription(__('This configures the mastertag lib that you want to include on your page, current configured URL is:', 'attrace'));
		$this->printDescription('<em><a href="' . $domainUrl . $tag . '">' . $domainUrl . $tag . '</a></em>.');
		$this->printDescription(__('You can also use a versioned url with 8 characters to avoid caching, like:', 'attrace'));
		$this->printDescription('<em><a href="' . $domainUrl . $versionedTag . '">' . $domainUrl . $versionedTag . '</a></em>.');
		$this->printDescription(__('The end of the url should be "js" but you can use another separator, like "_js" to avoid nginx caching and such.', 'attrace'));
		$this->printDescription(__('Click on the links above to see if your JS is loaded properly, and change the extensions if there are issues.', 'attrace'));
    }


    public function shortcodes()
    {
        $shortcodes =
            [
                '[attr_master_tag]'  => __('Use this shortcode to include the Master Tag Javascript on a a page or post.', 'attrace'),
                '[attr_action_sale]' => __('Use this shortcode to invoke a Sale action (use this for instance on the thank you page).', 'attrace'),
                '[attr_action_lead]' => __('Use this shortcode to invoke a Lead action (use this for instance on the subscribed to news letter).', 'attrace'),
            ];
        foreach ($shortcodes as $code => $description) {
            printf("<input type=text value='%s' size='20' onclick=\"this.select()\" readonly>", $code);  //output checked
            $this->printDescription($description.'<br/><br/>');
        }
    }


    function validateInput($input)
    {
        $filteredOutput[ConfigModel::CLICKOUT_PATH]              = sanitize_text_field(trim($input[ConfigModel::CLICKOUT_PATH]));
        $filteredOutput[ConfigModel::ACCOUNT]                    = sanitize_text_field(trim($input[ConfigModel::ACCOUNT]));
        $filteredOutput[ConfigModel::MASTERTAG_URL]              = sanitize_text_field(trim($input[ConfigModel::MASTERTAG_URL]));
        $filteredOutput[ConfigModel::NETWORK_BROADCAST_STRATEGY] = $input[ConfigModel::NETWORK_BROADCAST_STRATEGY];
        $filteredOutput[ConfigModel::TRACKING_STRATEGY]          = $input[ConfigModel::TRACKING_STRATEGY];
        $filteredOutput[ConfigModel::CONVERSION_STRATEGY]        = $input[ConfigModel::CONVERSION_STRATEGY];
        $filteredOutput[ConfigModel::PROFILING_LEVEL]            = $input[ConfigModel::PROFILING_LEVEL];
        $filteredOutput[ConfigModel::NETWORK]                    = $input[ConfigModel::NETWORK];
        $filteredOutput[ConfigModel::MODE]                       = $input[ConfigModel::MODE];
        //
        $filteredOutput[ConfigModel::MONITORS] = ConfigController::getInstance()->get(ConfigModel::MONITORS);
        //we can not store this through ConfigController set($key value).
        //reason is this validateInput function will be triggered and gets in infite loop. Let WP handle this. FFS.return $filteredOutput;
        return $filteredOutput;
    }

    protected function createDropdown($name, $items, $selected)
    {
        printf('  <select name="%s[%s]" id="%s[%s]">', Attr4ce_Constants::OPTION_GROUP, $name, Attr4ce_Constants::OPTION_GROUP, $name);
        foreach ($items as $key => $label) {
            if ($key == $selected) {
                printf('<option value="%s" selected>%s</option>', $key, $label);
                continue;
            }
            printf('<option value="%s">%s</option>', $key, $label);
        }
        printf('</select>');
    }

    protected function printDescription($text)
    {
        echo '<p style="font-size: smaller">' . $text . '</p>';
    }

}
