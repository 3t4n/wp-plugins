<?php

namespace RANKOLOGY_STATS\MetaBox;

use RANKOLOGY_STATS\SearchEngine;

class words
{

    public static function get($args = array())
    {

        // Prepare Response
        try {
            $response = SearchEngine::getLastSearchWord($args);
        } catch (\Exception $e) {
            $response = array();
        }

        // Check For No Data Meta Box
        if (count(array_filter($response)) < 1) {
            $response['no_data'] = 1;
        }

        // Response
        return $response;
    }

}