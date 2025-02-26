<?php
/**
 * Creates the Attrace Menu item and Intergration submenu item for the plugin.
 *
 * @package Attrace
 */

use Attrace\Connector\API\Controller\IntegrationConfigController;
use Attrace\Connector\API\Model\IntegrationConfigModel;
use Attrace\Connector\Util\Base32;

include_once 'lib/Attr4ce_IntegrationConfigsTable.php';

class Attr4ce_IntegrationConfigs
{


    const PAGE_ATTRACE_INTEGRATION_CONFIGS         = '/admin.php?page=attrace-integration-configs';
    const PAGE_ATTRACE_ADD_INTEGRATION_CONFIG      = '/admin.php?page=attrace-integration-configs&action=add';
    const PAGE_ATTRACE_ADD_INFO_AGREEMENT = '/admin.php?page=attrace-integration-configs&action=add-info&agreement=%s';
    const ACTION_ADD                      = 'add';
    const ALLOWED_ACTIONS                 = [self::ACTION_ADD];
    private $action = '';


    /**
     * Initializes all of the partial classes.
     *
     */
    public function __construct()
    {
        if (!isset($_GET['action'])) {
            return;
        }
        $action = sanitize_text_field($_GET['action']); //input checked
        if (in_array($action, self::ALLOWED_ACTIONS)) {
            $this->action = $action;
        }

    }

    /**
     * Adds menu page 'Attrace' for this plugin.
     */
    public function init()
    {
        add_action('admin_init', array($this, 'redirecter'));
        add_action('admin_init', array($this, 'registerSettings'));
        add_action('admin_notices', array($this, 'admin_notices_display'));
        add_action('admin_menu', [$this, 'add_menu_page']);
        add_action('admin_head', array($this, 'adjustTableColumnWidth'));
    }


    function adjustTableColumnWidth()
    {
        echo '<style type="text/css">
        .column-label{ text-align: left; width:120px !important; overflow:hidden;  white-space: nowrap; }
        .column-agreement { text-align: left; width:80px !important; overflow:hidden; white-space: nowrap; }
        .column-type { text-align: left; width:50px !important; overflow:hidden; white-space: nowrap; }
        .column-account { text-align: left; width:80px !important; overflow:hidden; white-space: nowrap;}
        .column-roots { text-align: left; width:200px !important; overflow:hidden ; white-space: nowrap; }
        .column-shortcode { text-align: left; width:60px !important; overflow:hidden; white-space: nowrap; }
        .column-clickout { text-align: left; width:60px !important; overflow:hidden; white-space: nowrap; }
        .urlRow{ padding-top: 1px; padding-bottom: 14px}
        .shortCodeInput{ padding-bottom: 22px}
        </style>';
    }


    function admin_notices_display()
    {
        settings_errors('base32_input_error');
        settings_errors('already_exist_error');
    }


    /**
     * I  might burn in hell for this., hacked own Wordpress router
     */
    public function redirecter()
    {
        //only catch this page
        if (isset($_GET['page']) && $_GET['page'] != 'attrace-integration-configs') { //input checked
            return;
        }

        //Updated ?
        $updated = isset($_GET['settings-updated']); //input checked

        //any errors
        $errors = sizeof(get_settings_errors('base32_input_error')) || sizeof(get_settings_errors('already_exist_error')) ;


        if ($updated && !$errors) {
            // addinfo done, return to overview
            wp_redirect(admin_url(self::PAGE_ATTRACE_INTEGRATION_CONFIGS));
            exit;
        }
    }


    public function registerSettings()
    {
        register_setting(Attr4ce_Constants::OPTION_GROUP_INTEGRATION_CONFIGS, Attr4ce_Constants::OPTION_GROUP_INTEGRATION_CONFIGS, array($this, 'processInput'));
        add_settings_section(Attr4ce_Constants::ATTRACE_INTEGRATION_CONFIGS, __('Add Integration', 'attrace'), array($this, 'renderSectionText'), Attr4ce_Constants::PAGE_INTEGRATION_CONFIGS);
        add_settings_field('renderOperationalKey', __('Configuration code', 'attrace'), array($this, 'renderOperationalKey'), Attr4ce_Constants::PAGE_INTEGRATION_CONFIGS, Attr4ce_Constants::ATTRACE_INTEGRATION_CONFIGS);
    }

    function processInput($input)
    {
        if (!isset($input['configuration_code'])) {
            return $input;
        }

        $newConfig = sanitize_text_field(trim($input['configuration_code'])); //input checked

        //Base decode config
        //$encoder       = new Attr4ce_Base32();
        $decodedString = Base32::decode($newConfig);

        try {
            $integrationConfig = new IntegrationConfigModel($decodedString, true);
        } catch (Exception $exception) {
            add_settings_error(
                'base32_input_error',
                esc_attr('settings_updated'),
				__('The Base32 configuration code that has been provided is invalid. Please try again.', 'attrace'),
                'error'
            );
            return [];
        }


        if (/** @var IntegrationConfigModel */$existingConfig = IntegrationConfigController::getInstance()->get($integrationConfig->getUniqueKey())) {
            add_settings_error(
                'already_exist_error',
                esc_attr('settings_updated'),
				__('This agreement - delegate off combination already exists. Remove the old on in order to add this new one.', 'attrace'),
                'error'
            );
            return [];
        }
        IntegrationConfigController::getInstance()->set($integrationConfig->getUniqueKey(), $integrationConfig);
        return [];
    }

    public function renderSectionText($input)
    {
        echo '<div>';
        echo '<div id="infopng">';
        echo '<img width="500" src="' . plugins_url("assets/img/integration-configuration.png", __FILE__) . '" />';
        echo '</div>';
        echo '<ol>';
        echo '<li>'.__('Copy the configuration code from the dashboard', 'attrace').'</li>';
        echo '<li>'.__('Paste it in the text field below', 'attrace').'</li>';
        echo '<li>'.__('Press the submit button', 'attrace').'</li>';
        echo '</ol>';
        echo '<hr/>';
        echo '</div>';
    }

    public function renderOperationalKey()
    {
        include_once('views/partials/configuration_code.php');

    }


    protected function printDescription($text)
    {
        echo '<p style="font-size: smaller">' . $text . '</p>';
    }


    /**
     * Add the menu page
     */

    public function add_menu_page()
    {
        add_menu_page('Attrace', 'Attrace', 'manage_options', 'attrace-integration-configs', array($this, 'render'), plugins_url("assets/img/menu-logo.png", __FILE__));

        //bit of hack to make submenu other title
        add_submenu_page(
            'attrace-integration-configs',
			__('Integrations', 'attrace'),
            __('Integrations', 'attrace'),
            'manage_options',
            'attrace-integration-configs',
            array($this, 'render')
        );
    }


    public function render()
    {
         //passed to the view
        $action         = $this->action;
        $integrationconfigTable = new Attr4ce_IntegrationConfigsTable();
        include_once('views/integrationconfigs.php');
    }

}
