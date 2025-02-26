<?php

class DIVIEC_EventsCalendarDivi extends DiviExtension
{
    /**
     * The gettext domain for the extension's translations.
     *
     * @since 1.0.0
     *
     * @var string
     */
    public $gettext_domain = 'diviec-events-calendar-divi';

    /**
     * The extension's WP Plugin name.
     *
     * @since 1.0.0
     *
     * @var string
     */
    public $name = 'ikj-events-calendar-for-divi';

    /**
     * The extension's version
     *
     * @since 1.0.0
     *
     * @var string
     */
    public $version = '1.0.0';

    /**
     * DIVIEC_EventsCalendarDivi constructor.
     *
     * @param string $name
     * @param array  $args
     */
    public function __construct($name = 'ikj-events-calendar-for-divi', $args = array())
    {
        $this->plugin_dir     = plugin_dir_path(__FILE__);
        $this->plugin_dir_url = plugin_dir_url($this->plugin_dir);

        parent::__construct($name, $args);
    }
}

new DIVIEC_EventsCalendarDivi();
