<?php

class Shortcodes_In_Widgets
{

    static $instance;

    //Constructor of the Class
    public function __construct()
    {

        self::$instance = $this;

        // Enable shortcodes in text widgets
        add_filter('widget_text', 'do_shortcode');
    }
}

?>