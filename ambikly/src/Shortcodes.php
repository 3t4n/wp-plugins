<?php

namespace Ambikly;
class Shortcodes
{
    private $shortcodes = [];

    public function __construct()
    {
        $this->register();

        add_action('init', array($this, 'dispatch'));
    }

    public function register()
    {
        $this->shortcodes = [
            'Ambikly\Shortcodes\CartShortcode',
            'Ambikly\Shortcodes\CheckoutShortcode',
            'Ambikly\Shortcodes\AccountShortcode',
            'Ambikly\Shortcodes\LoginShortcode',
        ];
    }

    public function dispatch()
    {
        foreach ($this->shortcodes as $shortcode) {

            new $shortcode();
        }
    }

}