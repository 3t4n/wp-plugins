<?php

use GenieImageAi\Bootstrap\Application;
use GenieImageAi\Bootstrap\System\ConfigReader;

if ( ! defined( 'ABSPATH' ) ) exit;


if (!function_exists('genieimage_view')) {

    /**
     * @param $path
     * @param  array  $data
     * @return bool
     */
    function genieimage_view($path, $data = [])
    {

        if (count($data)) {
            extract($data);
        }

        include GENIEIMAGE_DIR . 'resources/view/admin/default.php';

        return true;
    }
}