<?php
/**
 * firepro-blocks.
 * User: Paul
 * Date: 2020-07-29
 *
 */

namespace firepro;

if (!defined('WPINC')) {
    die;
}

class Firepro
{
    public function __construct()
    {
        var_dump($this->get_site_id());
    }
    public function calls_left(){

        return 4;
    }
    public function get_site_id(){
        return md5( get_bloginfo('url') ) . '-.-' . md5( WP_CACHE_KEY_SALT );
    }
}
