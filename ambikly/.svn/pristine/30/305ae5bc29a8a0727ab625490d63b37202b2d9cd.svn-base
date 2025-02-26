<?php

namespace Ambikly\Shortcodes;
abstract class BaseShortcode
{
    public function __construct($shortcode)
    {
        add_shortcode($shortcode, [$this, 'render']);
    }

    public function render($args)
    {
        ob_start();
        $this->output($args);
        return ob_get_clean();
    }

    abstract function output($args);

}