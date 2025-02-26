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
use \UA1Labs\Fire\Studio\Service\JsConfigService;

class FireStudio extends Feature
{

    /**
     * The renderer service.
     *
     * @var \UA1Labs\Fire\Studio\Service\RendererService;
     */
    private $renderer;

    /**
     * The JsConfig Service.
     *
     * @var \UA1Labs\Fire\Studio\Service\JsConfigService
     */
    private $jsConfig;

    /**
     * The class constructor.
     */
    public function __construct(RendererService $renderer, JsConfigService $jsConfig)
    {
        $this->renderer = $renderer;
        $this->jsConfig = $jsConfig;
    }

    /**
     * Adds the FireStudio Shared Fire script for frontend pages.
     *
     * @action wp_enqueue_scripts
     * @priority 1
     */
    public function addFireStudioSharedFireFrontendScript()
    {
        $id = 'firestudio-shared-fire';
        $script = $this->getAssetUrl(__DIR__ . '/../../../../../features/firestudio/js/shared-fire.js');
        wp_enqueue_script($id, $script);
    }

    /**
     * Adds the FireStudio Shared Fire script for admin pages.
     *
     * @action admin_enqueue_scripts
     * @priority 1
     */
    public function addFireStudioSharedFireAdminScript()
    {
        $id = 'firestudio-shared-fire';
        $script = $this->getAssetUrl(__DIR__ . '/../../../../../features/firestudio/js/shared-fire.js');
        wp_enqueue_script($id, $script);
    }

    /**
     * Takes the JsConfigService config object and writes it
     * to the firestudio.config global variable on the HTML page.
     *
     * @action wp_enqueue_scripts
     * @priority 1
     */
    public function writeJsConfigToFrontendHtml()
    {
        $model = (object) [
            'config' => $this->jsConfig->getConfig()
        ];
        echo $this->renderer->renderTemplate(__DIR__ . '/FireStudio/Templates/js-config-to-html.phtml', $model);
    }

    /**
     * Takes the JsConfigService config object and writes it
     * to the firestudio.config global variable on the HTML page.
     *
     * @action admin_enqueue_scripts
     * @priority 1
     */
    public function writeJsConfigToAdminHtml()
    {
        $model = (object) [
            'config' => $this->jsConfig->getConfig()
        ];
        echo $this->renderer->renderTemplate(__DIR__ . '/FireStudio/Templates/js-config-to-html.phtml', $model);
    }

}