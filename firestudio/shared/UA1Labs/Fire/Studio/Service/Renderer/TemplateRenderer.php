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

namespace UA1Labs\Fire\Studio\Service\Renderer;

use \UA1Labs\Fire\Studio\Service\DataMapper;

/**
 * This service provides the ability to render a phtml template
 * with a specific model.
 */
class TemplateRenderer {

    /**
     * The DataMapper service.
     *
     * @var \UA1Labs\Fire\Studio\Service\DataMapper
     */
    private $dataMapper;

    /**
     * The class constructor.
     */
    public function __construct(DataMapper $dataMapper)
    {
        $this->dataMapper = $dataMapper;
    }

    /**
     * Used to escape values being rendered in the template.
     *
     * @param string $val
     * @return string
     */
    public function e($val)
    {
        return htmlspecialchars($val, ENT_COMPAT | ENT_HTML401, 'UTF-8');
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