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

namespace UA1Labs\Fire\Studio\Service;

use \UA1Labs\Fire\Studio\Injector;
use \UA1Labs\Fire\Studio\Service\Renderer\TemplateRenderer;

/**
 * This service provides access to template rendering strategies.
 * Currently, we support the following stragegies:
 *
 * 1. \UA1Labs\Fire\Studio\Service\Renderer\TemplateRenderer - The TemplateRenderer
 * service binds a PHTML file to a object model you pass in and returns the
 * rendered template.
 */
class Renderer
{
    /**
     * The FireStudio Injector
     *
     * @var \UA1Labs\Fire\Studio\Injector
     */
    private $injector;

    /**
     * The class constructor.
     */
    public function __construct()
    {
        $this->injector = Injector::instance();
    }

    /**
     * Returns a template renderer for rendering phtml templates.
     *
     * @return \UA1Labs\Fire\Studio\Renderer\TemplateRenderer
     */
    public function getTemplateRenderer()
    {
        return $this->injector->get(TemplateRenderer::class);
    }

}