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

class WpSqlQueries extends Panel
{

    const ID = 'wpsqlqueries';
    const NAME = 'Wordpress SQL {{count}}';

    /**
     * The queries from wordpress
     *
     * @var array<array>
     */
    private $queries;

    /**
     * The class constructor.
     */
    public function __construct()
    {
        $this->queries = [];
        parent::__construct(self::ID, self::NAME, __DIR__ . '/../Templates/panels/sql-queries.phtml');
    }

    /**
     * Add sql query to the stack.
     *
     * @param array<array> $queries
     */
    public function addWpQueries($queries)
    {
        $this->queries = $queries;
    }

    /**
     * Returns an array of sql queries
     *
     * @return array<object>
     */
    public function getWpQueries()
    {
        return $this->queries;
    }

    /**
     * Renders the panel.
     */
    public function render()
    {
        $queryCount = count($this->queries);
        $this->setName(str_replace('{{count}}', '{' . $queryCount . '}', self::NAME));
        parent::render();
    }
}