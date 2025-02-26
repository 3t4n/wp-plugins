<?php

namespace RANKOLOGY_STATS\MetaBox;

use RANKOLOGY_STATS\Visitor;

class top_visitors
{

    public static function get($args = array())
    {

        // Prepare Response
        try {
            $response = Visitor::getTop($args);
        } catch (\Exception $e) {
            $response = array();
        }

        // Check For No Data Meta Box
        if (count($response) < 1) {
            $response['no_data'] = 1;
        }

        // Response
        return $response;
    }

}