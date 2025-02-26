<?php

/**
 *    __  _____   ___   __          __
 *   / / / /   | <  /  / /   ____ _/ /_  _____
 *  / / / / /| | / /  / /   / __ `/ __ `/ ___/
 * / /_/ / ___ |/ /  / /___/ /_/ / /_/ (__  )
 * `____/_/  |_/_/  /_____/`__,_/_.___/____/
 *
 * @package FireStudio
 * @author UA1 Labs Developers https://ua1.us
 * @copyright Copyright (c) UA1 Labs
 */

namespace UA1Labs\Fire\Studio\Feature;

use \UA1Labs\Fire\Studio\Feature;
use \UA1Labs\Fire\Bug;
use \UA1Labs\Fire\Studio\Service\RendererService;
use \UA1Labs\Fire\Studio\Service\CookieService;
use \UA1Labs\Fire\Studio\Service\WpHelperService;
use \UA1Labs\Fire\Studio\Service\JsConfigService;
use \UA1Labs\Fire\Studio\Feature\Debug\Panel\FireStudioDebugPanel;
use \UA1Labs\Fire\Studio\Feature\Debug\Panel\WpActionsDebugPanel;
use \UA1Labs\Fire\Studio\Feature\Debug\Panel\WpSqlQueriesDebugPanel;
use \UA1Labs\Fire\Bug\Panel\Debugger;
use \UA1Labs\Fire\Sql\Panel\FireSqlPanel;
use \WP_Admin_Bar;

class Debug extends Feature
{

    const TOGGLE_DEBUG_DISPLAY_ERRORS = 'displayPhpErrors';
    const TOGGLE_DEBUG_CURRENT_PAGE = 'currentPageDebug';
    const COOKIE_FS_DEBUG_TOGGLE = 'fsDebugToggles';

    /**
     * The FireBug class instance.
     *
     * @var \UA1Labs\Fire\Bug
     */
    private $fireBug;

    /**
     * The renderer service
     *
     * @var \UA1Labs\Fire\Studio\Service\RendererService
     */
    private $renderer;

    /**
     * The Cookie service.
     *
     * @var \UA1Labs\Fire\Studio\Service\CookieService
     */
    private $cookie;

    /**
     * The JsConfigService service.
     *
     * @var \UA1Labs\Fire\Studio\Service\JsConfigService
     */
    private $jsConfig;

    /**
     * The WpHelperService service.
     *
     * @var \UA1Labs\Fire\Studio\Service\WpHelperService;
     */
    private $wpHelper;

    /**
     * An array of available debug toggles.
     *
     * @var array<object>
     */
    private $debugToggles;

    /**
     * The class constructor.
     */
    public function __construct(
        Bug $fireBug,
        RendererService $renderer,
        CookieService $cookie,
        JsConfigService $jsConfig,
        WpHelperService $wpHelper,
        FireStudioDebugPanel $fireStudioDebugPanel,
        WpActionsDebugPanel $wpActions,
        WpSqlQueriesDebugPanel $wpSqlQueries
    )
    {
        $this->fireBug = $fireBug;
        $this->renderer = $renderer;
        $this->cookie = $cookie;
        $this->jsConfig = $jsConfig;
        $this->wpHelper = $wpHelper;

        $this->fireBug->addPanel($fireStudioDebugPanel);
        $this->fireBug->addPanel($wpActions);
        $this->fireBug->addPanel($wpSqlQueries);
        $this->debugToggles = [];

        if ($this->wpHelper->isAdminUser()) {
            // load debug scripts
            $debugAdminModalScriptId = 'debug-admin-modal-js';
            $debugAdminModalScript = __DIR__ . '/../../../../../features/debug/js/admin-modal-debug.js';
            $this->addFrontendScript($debugAdminModalScriptId, $debugAdminModalScript);
            $this->addAdminScript($debugAdminModalScriptId, $debugAdminModalScript);

            // load debug stylesheets
            $debugAdminModalStylesheetId = 'debug-admin-modal-css';
            $debugAdminModalStylesheet = __DIR__ . '/../../../../../features/debug/css/debug-admin-modal.css';
            $this->addFrontendStylesheet($debugAdminModalStylesheetId, $debugAdminModalStylesheet);
            $this->addAdminStylesheet($debugAdminModalStylesheetId, $debugAdminModalStylesheet);
        }
    }

    /**
     * Initializes debugging.
     *
     * @action firestudio_loaded
     * @priority 1
     */
    public function initDebug()
    {
        $this->registerDebugToggle(self::TOGGLE_DEBUG_DISPLAY_ERRORS, __('Enable PHP Error Display', 'firestudio'));
        $this->registerDebugToggle(self::TOGGLE_DEBUG_CURRENT_PAGE, __('Enable Current Page Debugging', 'firestudio'));
        do_action('firestudio_register_debug_toggles');

        $this->parseDebugToggleCookie();
    }

    /**
     * Renders the debug panel.
     *
     * @action firestudio_admin_modal
     * @priority 100
     */
    public function renderDebugPanel()
    {
        $this->translateDebugPanelNamesAndDescriptions();
        $this->addFireStudioDebugPanelData();
        $this->addWpSqlQueriesDebugPanelPanelData();
        $this->addWpActionsDebugPanelData();

        $model = (object) [
            'page' => $_SERVER['REQUEST_URI'],
            'method' => $_SERVER['REQUEST_METHOD'],
            'debugToggles' => $this->debugToggles
        ];
        if ($this->isDebugToggleEnabled(self::TOGGLE_DEBUG_CURRENT_PAGE)) {
            $model->fireBugPanel = $this->fireBug->render();
        }

        echo $this->renderer->renderTemplate(__DIR__ . '/Debug/Templates/debug.phtml', $model);
    }

    /**
     * Adds a debug toggle to the debug panel.
     *
     * @param string $id
     * @param string $label
     */
    public function registerDebugToggle($id, $label)
    {
        $toggle = (object) [
            'id' => $id,
            'label' => $label
        ];
        $this->debugToggles[$id] = $toggle;
    }

    /**
     * Enables a debug toggle. hint: A debug toggle must be registered before
     * it can be enabled.
     *
     * @param string $id
     */
    public function enableDebugToggle($id)
    {
        if (isset($this->debugToggles[$id])) {
            $this->debugToggles[$id]->enabled = true;
        }
    }

    /**
     * Determines if a debug toggle has been enabled.
     *
     * @param string $id
     * $return boolean
     */
    public function isDebugToggleEnabled($id)
    {
        if (isset($this->debugToggles[$id])) {
            return isset($this->debugToggles[$id]->enabled) ? $this->debugToggles[$id]->enabled : false;
        }
        return false;
    }

    /**
     * Parses the "fsDebugToggles" cookie for debug toggle values.
     */
    private function parseDebugToggleCookie()
    {
        $fsDebugToggles = $this->cookie->getCookieValue(self::COOKIE_FS_DEBUG_TOGGLE);

        if ($fsDebugToggles) {
            $toggles = json_decode(urldecode($fsDebugToggles));
            foreach ($toggles as $name => $enabled) {
                if ($enabled) {
                    $this->enableDebugToggle($name);
                }
            }
        }

        $debugToggles = (object) [];
        foreach($this->debugToggles as $toggle) {
            $debugToggles->{$toggle->id} = $this->isDebugToggleEnabled($toggle->id);
        }
        $this->jsConfig->addConfig('debugToggles', $debugToggles);
    }

    /**
     * Adds data to the FireStudio debug panel.
     */
    private function addFireStudioDebugPanelData()
    {
        $fireStudio = firestudio();
        $fireStudioDebugPanel = $this->fireBug->getPanel(FireStudioDebugPanel::ID);

        // get loaded features
        $loadedFeatures = array_keys($fireStudio->getLoadedFeatures());
        $fireStudioDebugPanel->setLoadedFeatures($loadedFeatures);

        // get injector cache
        $injectorCache = array_keys($fireStudio->injector->getObjectCache());
        $fireStudioDebugPanel->setInjectorCache($injectorCache);
    }

    /**
     * Adds query data to the WpSqlQueriesDebugPanel debug panel.
     */
    private function addWpSqlQueriesDebugPanelPanelData()
    {
        global $wpdb;
        $wpSqlQueriesPanel = $this->fireBug->getPanel(WpSqlQueriesDebugPanel::ID);

        // load queries
        $wpSqlQueriesPanel->addWpQueries($wpdb->queries);
    }

    /**
     * Adds action data to the WpAction debug panel.
     */
    private function addWpActionsDebugPanelData()
    {
        global $wp_actions;
        global $wp_filter;

        $wpActionsPanel = $this->fireBug->getPanel(WpActionsDebugPanel::ID);

        // load actions and filters
        $wpActionsPanel->parseActionsAndFilters($wp_actions, $wp_filter);
    }

    /**
     * Translates all debug panel names and descriptions using the WP way of translations.
     *
     * @return void
     */
    private function translateDebugPanelNamesAndDescriptions()
    {
        $debugger = $this->fireBug->getPanel(Debugger::ID);
        $debugger->setName($this->renderer->translate($debugger->getName()));
        $debugger->setDescription($this->renderer->translate($debugger->getDescription()));

        $fireSql = $this->fireBug->getPanel(FireSqlPanel::ID);
        $fireSql->setName($this->renderer->translate($fireSql->getName()));
        $fireSql->setDescription($this->renderer->translate($fireSql->getDescription()));

        $fireStudio = $this->fireBug->getPanel(FireStudioDebugPanel::ID);
        $fireStudio->setName($this->renderer->translate($fireStudio->getName()));
        $fireStudio->setDescription($this->renderer->translate($fireStudio->getDescription()));

        $wpActions = $this->fireBug->getPanel(WpActionsDebugPanel::ID);
        $wpActions->setName($this->renderer->translate($wpActions->getName()));
        $wpActions->setDescription($this->renderer->translate($wpActions->getDescription()));

        $wpSql = $this->fireBug->getPanel(WpSqlQueriesDebugPanel::ID);
        $wpSql->setName($this->renderer->translate($wpSql->getName()));
        $wpSql->setDescription($this->renderer->translate($wpSql->getDescription()));    }

}