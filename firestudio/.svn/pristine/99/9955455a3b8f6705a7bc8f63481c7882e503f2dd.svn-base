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

namespace UA1Labs\Fire\Studio\Service;

use \UA1Labs\Fire\Sql;

/**
 * This service provides a way to connect to data from the database.
 */
class DataService
{

    /**
     * FireSql.
     *
     * @var \UA1Labs\Fire\Sql
     */
    private $fireSql;

    /**
     * The class constructor.
     */
    public function __construct(Sql $fireSql)
    {
        $this->fireSql = $fireSql;
    }

    /**
     * Returns a collection object to access data in the database.
     *
     * @param string $name
     * @return \UA1Labs\Fire\Sql\Collection
     */
    public function collection($name)
    {
        return $this->fireSql->collection($name);
    }

}