<?php

namespace Ambikly;

class Hooks
{
    private $hooks = [];

    public function __construct()
    {
        $this->register();

        add_action('init', array($this, 'dispatch'));
    }

    public function register()
    {
        $this->hooks = [
            'Ambikly\Hooks\AccountHook',
            'Ambikly\Hooks\AdminBarHook',
        ];
    }

    public function dispatch()
    {
        foreach ($this->hooks as $hook) {

            new $hook();
        }
    }

}