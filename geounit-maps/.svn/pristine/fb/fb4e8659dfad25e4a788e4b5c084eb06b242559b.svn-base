<?php
class GeounitMapsSettingsPage
{
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct()
    {
        add_action('admin_menu', [$this, 'add_plugin_page']);
        add_action('admin_init', [$this, 'page_init']);
    }

    /**
     * Add options page
     */
    public function add_plugin_page()
    {
        
        // This page will be under "Settings"
        add_options_page(
            'GeoUNIT Maps Options', 
            'GeoUNIT Maps', 
            'manage_options', 
            'geounit-maps-admin', 
            [$this, 'create_admin_page']
        );
        
    }

    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        
        // Set class property
        $this->options = get_option( 'geounit_option_name' );
        ?>
        <div class="wrap">
            <h1><?php echo __('GeoUNIT Maps Settings', 'geounit-maps') ?></h1>
            <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                settings_fields( 'geounit_option_group' );
                do_settings_sections( 'geounit_maps_admin' );
                submit_button();
            ?>
            </form>
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function page_init()
    {        
        register_setting(
            'geounit_option_group', // Option group
            'geounit_option_name', // Option name
            [$this, 'sanitize'] // Sanitize
        );

        add_settings_section(
            'setting_section_id', // ID
            __('Performance', 'geounit-maps'), // Title
            [$this, 'print_section_info'], // Callback
            'geounit_maps_admin' // Page
        );  

        add_settings_field(
            'cache_enabled', // ID
            __('Enable Caching', 'geounit-maps'), // Title 
            [$this, 'cache_enabled_callback'], // Callback
            'geounit_maps_admin', // Page
            'setting_section_id' // Section           
        );

        add_settings_field(
            'expire_enabled', // ID
            __('Enable Expire Client Header', 'geounit-maps'), // Title 
            [$this, 'expire_enabled_callback'], // Callback
            'geounit_maps_admin', // Page
            'setting_section_id' // Section           
        );
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize($input)
    {
        $sanitizedInput = [];
        
        if (!isset($input['cache_enabled']))
            $sanitizedInput['cache_enabled'] = 0;

        if (!isset($input['expire_enabled']))
            $sanitizedInput['expire_enabled'] = 0;
        
        return $sanitizedInput;
    }

    /** 
     * Print the Section text
     */
    public function print_section_info()
    {
        print __('Enter your performance settings below:', 'geounit-maps');
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function cache_enabled_callback()
    {   
        if ($this->options && isset($this->options['cache_enabled'])) {
            $option = esc_attr($this->options['cache_enabled']);
        } else {
            $option = 1;
        }

        printf(
            '<input type="checkbox" id="cache_enabled" name="geounit_option_name[cache_enabled]" value="1" %2$s/>',
            $option,
            checked(1, $option, false)
        );
        printf('<small>' . __('disable if your map is not shown properly', 'geounit-maps') .'</small>');
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function expire_enabled_callback()
    {   
        if ($this->options && isset($this->options['expire_enabled'])) {
            $option = esc_attr($this->options['expire_enabled']);
        } else {
            $option = 1;
        }

        printf(
            '<input type="checkbox" id="expire_enabled" name="geounit_option_name[expire_enabled]" value="1" %2$s/>',
            $option,
            checked(1, $option, false)
        );
        printf('<small>' . __('add header for client caching "Cache-Control: max-age=3600"', 'geounit-maps') .'</small><br/>');
        printf('<small>' . __('disable if your map is not shown properly', 'geounit-maps') .'</small>');
    }
}

if( is_admin() )
    $geounit_maps_settings = new GeounitMapsSettingsPage();