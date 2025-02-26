<?php

namespace RANKOLOGY_STATS\MetaBox;

class useronline
{

    public static function get($args = array())
    {

        // Prepare Response
        try {
            $response = \RANKOLOGY_STATS\UserOnline::get($args);
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