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

namespace UA1Labs\Fire\Studio\Feature\Debug\Panel;

use \UA1Labs\Fire\Bug\Panel;

class WpActions extends Panel
{

    const ID = 'wpactions';
    const NAME = 'Wordpress Actions {{count}}';

    /**
     * Wordpress actions and function data.
     *
     * @var array<array>
     */
    private $actions;

    /**
     * The class constructor.
     */
    public function __construct()
    {
        $this->actions = [];
        parent::__construct(self::ID, self::NAME, __DIR__ . '/../Templates/panels/wp-actions.phtml');
    }

    /**
     * Parses wp_actions and wp_filter to find all actions/functions fired
     * and puts them into a data structure for displaying within the panel.
     *
     * @param array $wpActions The global $wp_actions
     * @param array $wpFilter The global $wp_filter
     */
    public function parseActionsAndFilters($wpActions, $wpFilter)
    {
        $actions = [];
        foreach ($wpActions as $action => $count) {
            $actions[$action] = (object)[
                'actionName' => $action,
                'timesExecuted' => $count,
                'functions' => []
            ];
            if (isset($wpFilter[$action]->callbacks)) {
                $callbacks = $wpFilter[$action]->callbacks;
                foreach ($callbacks as $priority => $functions) {
                    foreach ($functions as $name => $fn) {
                        if (is_array($fn['function'])) {
                            if (is_string($fn['function'][0])) {
                                $className = $fn['function'][0];
                            } else {
                                $className = \get_class($fn['function'][0]);
                            }
                            $fnName = $className . '::' . $fn['function'][1];
                        } else {
                            $fnName = $fn['function'];
                        }
                        $actions[$action]->functions[] = (object) [
                            'action' => $action,
                            'priority' => $priority,
                            'function' => $fnName
                        ];
                    }
                }
            }
        }
        $this->actions = $actions;
    }

    /**
     * Returns the actions
     */
    public function getActions()
    {
        return $this->actions;
    }

    /**
     * Renders the panel.
     */
    public function render()
    {
        $queryCount = count($this->actions);
        $this->setName(str_replace('{{count}}', '{' . $queryCount . '}', self::NAME));
        parent::render();
    }
}