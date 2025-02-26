<?php

declare(strict_types=1);

class TwitchStreamLoader
{
    protected array $actions;

    protected array $filters;

    public function __construct()
    {
        $this->actions = [];
        $this->filters = [];
    }

    /**
     * @param string $hook
     * @param object $component
     * @param string $callback
     * @param int $priority
     * @param int $acceptedArgs
     */
    public function addAction(string $hook, object $component, string $callback, int $priority = 10, int $acceptedArgs = 1): void
    {
        $this->actions[] = [
            'hook' => $hook,
            'component' => $component,
            'callback' => $callback,
            'priority' => $priority,
            'accepted_args' => $acceptedArgs,
        ];
    }

    /**
     * @param string $hook
     * @param object $component
     * @param string $callback
     * @param int $priority
     * @param int $acceptedArgs
     */
    public function addFilter(string $hook, object $component, string $callback, int $priority = 10, int $acceptedArgs = 1): void
    {
        $this->filters[] = [
            'hook' => $hook,
            'component' => $component,
            'callback' => $callback,
            'priority' => $priority,
            'accepted_args' => $acceptedArgs,
        ];
    }

    public function loadAllFiltersAndActions(): void
    {
        foreach ($this->filters as $hook) {
            add_filter($hook['hook'], [$hook['component'], $hook['callback']], $hook['priority'], $hook['accepted_args']);
        }

        foreach ($this->actions as $hook) {
            add_action($hook['hook'], [$hook['component'], $hook['callback']], $hook['priority'], $hook['accepted_args']);
        }
    }
}
