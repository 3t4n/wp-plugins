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

namespace UA1Labs\Fire\Studio\Service\RendererService;

use \UA1Labs\Fire\Studio\Service\DataMapperService;
use \UA1Labs\Fire\Studio\Service\RendererService;

/**
 * This service provides the ability to render a phtml template
 * with a specific model.
 */
class TemplateRendererService {

    /**
     * The DataMapperService service.
     *
     * @var \UA1Labs\Fire\Studio\Service\DataMapperService
     */
    private $dataMapper;

    /**
     * The RendererService service
     *
     * @var \UA1Labs\Fire\Studio\Service\RendererService
     */
    private $renderer;

    /**
     * The class constructor.
     */
    public function __construct(DataMapperService $dataMapper, RendererService $renderer)
    {
        $this->dataMapper = $dataMapper;
        $this->renderer = $renderer;
    }

    /**
     * Used to translate text using the standard wordpress __() function.
     * Text values passed in will be escaped for special characters.
     *
     * @param string $text
     * @param string $domain
     * @return string
     */
    public function t($text, $domain = 'firestudio')
    {
        return $this->renderer->translate($text, $domain);
    }

    /**
     * Used to escape values being rendered in the template.
     *
     * @param string $val
     * @return string
     */
    public function e($val)
    {
        return $this->renderer->escape($val);
    }

    /**
     * Renders a template based on the template and model you pass
     * into it.
     *
     * @return string The rendered template
     */
    public function renderTemplate($template, $model = null)
    {
        if (isset($model) && is_object($model)) {
            $this->dataMapper->mergeObjRecursively($this, $model);
        }

        ob_start();
        include $template;
        $renderedTemplate = ob_get_contents();
        ob_end_clean();

        return $renderedTemplate;
    }

}