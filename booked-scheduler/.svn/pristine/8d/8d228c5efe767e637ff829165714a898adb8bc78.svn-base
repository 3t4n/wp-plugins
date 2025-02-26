<?php
/**
 * @copyright Copyright 2024 Twinkle Toes Software, LLC
 */

defined('ABSPATH') || exit;

class Booked_Loader
{
    protected array $actions = [];
    protected array $filters = [];
    protected array $shortcodes = [];

    public function __construct()
    {
        $this->actions = [];
        $this->filters = [];
        $this->shortcodes = [];
    }

    public function add_action($hook, $callback, $priority = 10, $accepted_args = 1)
    {
        $this->actions = $this->add($this->actions, $hook, $callback, $priority, $accepted_args);
    }

    public function add_filter($hook, $callback, $priority = 10, $accepted_args = 1)
    {
        $this->filters = $this->add($this->filters, $hook, $callback, $priority, $accepted_args);
    }

    public function add_shortcode($tag, $callback, $priority = 10, $accepted_args = 2)
    {
        $this->shortcodes = $this->add($this->shortcodes, $tag, $callback, $priority, $accepted_args);
    }

    private function add($hooks, $hook, $callback, $priority, $accepted_args)
    {
        $hooks[] = array(
            'hook' => $hook,
            'callback' => $callback,
            'priority' => $priority,
            'accepted_args' => $accepted_args
        );

        return $hooks;
    }

    public function run()
    {
        foreach ($this->filters as $hook) {
            add_filter($hook['hook'], $hook['callback'], $hook['priority'], $hook['accepted_args']);
        }

        foreach ($this->actions as $hook) {
            add_action($hook['hook'], $hook['callback'], $hook['priority'], $hook['accepted_args']);
        }

        foreach ($this->shortcodes as $hook) {
            add_shortcode($hook['hook'], $hook['callback'], $hook['priority'], $hook['accepted_args']);
        }
    }
}