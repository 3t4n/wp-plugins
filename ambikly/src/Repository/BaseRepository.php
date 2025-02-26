<?php

namespace Ambikly\Repository;


abstract class BaseRepository
{

    protected $table;

    protected $wpdb;


    public function __construct()
    {
        global $wpdb;

        $this->wpdb = $wpdb;
    }

    public function getResults($query, $params = [])
    {
        if (is_null($params) || empty($params)) {

            return $this->wpdb->get_results($query, ARRAY_A);
        } else {

            $safe_sql = $this->wpdb->prepare(
                $query,
                $params
            );
            return $this->wpdb->get_results($safe_sql, ARRAY_A);
        }
    }

    public function getVar(string $query, array $params = [])
    {
        // Use wpdb::prepare to ensure safety, even if no params are provided
        $safe_sql = empty($params) ? $query : $this->wpdb->prepare($query, ...$params);

        return $this->wpdb->get_var($safe_sql, ARRAY_A);
    }
}
