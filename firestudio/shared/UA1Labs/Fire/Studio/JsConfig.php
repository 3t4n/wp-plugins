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

namespace UA1Labs\Fire\Studio;

use \UA1Labs\Fire\Studio\Renderer;
use \UA1Labs\Fire\Studio\DataMapper;
use \stdClass;

class JsConfig
{

    /**
     * Contains the config that will eventually make
     * it to the html as a js object.
     *
     * @var object
     */
    private $config;

    /**
     * The renderer service.
     *
     * @var \UA1Labs\Fire\Studio\Renderer;
     */
    private $renderer;

    /**
     * The DataMapper service.
     *
     * @var \UA1Labs\Fire\Studio\DataMapper
     */
    private $dataMapper;

    /**
     * The class constructor.
     */
    public function __construct(Renderer $renderer, DataMapper $dataMapper)
    {
        $this->renderer = $renderer;
        $this->dataMapper = $dataMapper;
        $this->config = new stdClass();
    }

    /**
     * Merges a stdClass object onto the config object.
     *
     * @param object $obj
     */
    public function addObject($obj)
    {
        $this->config = $this->dataMapper->mergeObjRecursively($this->config, $obj);
    }

    /**
     * Takes the stdClass $config object and writes it
     * to the firestudio.config global variable on the HTML page.
     */
    public function writeJsConfigToHtml()
    {
        $templateRenderer = $this->renderer->getTemplateRenderer();
        $model = (object) [
            'config' => $this->config
        ];
        echo $templateRenderer->renderTemplate(__DIR__ . '/templates/js-config-to-html.phtml', $model);
    }

}