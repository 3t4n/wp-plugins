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
use \UA1Labs\Fire\Studio\Service\RendererService;
use \UA1Labs\Fire\Studio\Service\WpHelperService;
use \WP_Admin_Bar;
use \UA1Labs\Fire\Studio\Service\DataService;

/**
 * This feature adds an Admin Modal along with a FireStudio
 * link to the admin bar. When the admin is signed in and the
 * admin bar is displayed, the admin has the ability to display
 * the admin modal by clicking the FireStudio link in the admin
 * bar.
 */
class AdminModal extends Feature
{

    /**
     * The RendererService service.
     *
     * @var \UA1Labs\Fire\Studio\Service\RendererService
     */
    private $renderer;

    /**
     * The WpHelperService service.
     *
     * @var \UA1Labs\Fire\Studio\Service\WpHelperService
     */
    private $wpHelper;

    /**
     * The class constructor.
     *
     * @param \UA1Labs\Fire\Studio\RendererService $renderer
     * @param \UA1Labs\Fire\Studio\Service\WpHelperService $wpHelper
     */
    public function __construct(RendererService $renderer, WpHelperService $wpHelper, DataService $dataService)
    {
        $this->renderer = $renderer;
        $this->wpHelper = $wpHelper;

        if ($this->wpHelper->isAdminUser()) {
            // add admin modal scripts
            $fsAdminModalScriptId = 'firestudio-admin-modal-js';
            $fsAdminModalScript = __DIR__ . '/../../../../../features/admin-modal/js/firestudio-admin-modal.js';
            $this->addFrontendScript($fsAdminModalScriptId, $fsAdminModalScript);
            $this->addAdminScript($fsAdminModalScriptId, $fsAdminModalScript);

            // add admin modal stylesheets
            $fsAdminModalStylesheetId = 'firestudio-admin-modal-css';
            $fsAdminModalStylesheet = __DIR__ . '/../../../../../features/admin-modal/css/firestudio-admin-modal.css';
            $this->addFrontendStylesheet($fsAdminModalStylesheetId, $fsAdminModalStylesheet);
            $this->addAdminStylesheet($fsAdminModalStylesheetId, $fsAdminModalStylesheet);
        }
    }

    /**
     * Adds the FireStudio menu and icon to the admin bar.
     *
     * @action admin_bar_menu
     * @priority 100
     * @param WP_Admin_Bar $adminBar The admin bar object from wordpress
     */
    public function registerFireStudioMenuItemToAdminBar(WP_Admin_Bar $adminBar)
    {
        if ($this->wpHelper->isAdminUser()) {
            $model = (object) [
                'logo' => $this->getAssetUrl(__DIR__ . '/../../../../../features/admin-modal/img/firestudio-22x22.png')
            ];
            $title = $this->renderer->renderTemplate(__DIR__ . '/AdminModal/templates/admin-modal-title.phtml', $model);

            $adminBar->add_menu([
                'id' => 'firestudio',
                'title' => $title,
                'href' => '#'
            ]);
        }
    }

    /**
     * Renders the admin modal.
     *
     * @action wp_after_admin_bar_render
     */
    public function renderAdminModal()
    {
        if ($this->wpHelper->isAdminUser()) {
            $model = (object) [
                'fireStudioLogo' => $this->getAssetUrl(__DIR__ . '/../../../../../features/admin-modal/img/firestudio-209x50.png')
            ];
            echo $this->renderer->renderTemplate(__DIR__ . '/AdminModal/templates/admin-modal.phtml', $model);
        }
    }

}