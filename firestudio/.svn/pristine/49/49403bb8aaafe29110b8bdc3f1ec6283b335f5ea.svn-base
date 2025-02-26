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
use \UA1Labs\Fire\Studio\Service\RendererService\TemplateRendererService;

/**
 * This service provides access to template rendering strategies.
 * Currently, we support the following stragegies:
 *
 * 1. \UA1Labs\Fire\Studio\Service\RendererService\TemplateRendererService - The TemplateRendererService
 * service binds a PHTML file to a object model you pass in and returns the
 * rendered template.
 */
class RendererService
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
     * Escapes html characters to prevent XSS attaches.
     *
     * @param mixed $val The value you would like escaped
     * @param mixed The escaped value
     */
    public function escape($val)
    {
        if (is_string($val)) {
            return htmlspecialchars($val, ENT_COMPAT | ENT_HTML401, 'UTF-8');
        }
        return $val;
    }

    /**
     * Used to translate content using the standard wordpress __() function.
     *
     * @param string $text The text you want translated
     * @param string $domain The domain of the test
     * @return string The translated string
     */
    public function translate($text, $domain = 'firestudio')
    {
        return __($this->escape($text), $domain);
    }

    /**
     * Returns a template renderer for rendering phtml templates.
     *
     * @return \UA1Labs\Fire\Studio\RendererService\TemplateRendererService
     */
    public function getTemplateRendererService()
    {
        return $this->injector->get(TemplateRendererService::class);
    }

    /**
     * Renders a template using the TemplateRendererService service.
     *
     * @param string $template The path to the phtml template
     * @param object $model An object you that represents data for the template
     * @return string The rendered template
     */
    public function renderTemplate($template, $model)
    {
        $t = $this->getTemplateRendererService();
        return $t->renderTemplate($template, $model);
    }

}