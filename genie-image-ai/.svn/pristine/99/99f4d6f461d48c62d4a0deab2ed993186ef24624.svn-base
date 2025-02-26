<?php

namespace GenieImageAi\App\Utilities\Traits;

defined( 'ABSPATH' ) || exit;

trait Singleton
{

    private static $instance;

    public static function instance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}
