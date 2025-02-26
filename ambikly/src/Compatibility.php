<?php

namespace Ambikly;

class Compatibility
{
    private $compatibility = [];

    public function __construct()
    {
        $this->register();

        add_action('init', array($this, 'dispatch'));
    }

    public function register()
    {
        $this->compatibility = [
            'Ambikly\Compatibility\Twentytwentyfour',
        ];
    }

    public function dispatch()
    {
        foreach ($this->compatibility as $shortcode) {

            new $shortcode();
        }
    }

}