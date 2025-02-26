<?php

class GooSettingsPage
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
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }

    /**
     * Add options page
     */
    public function add_plugin_page()
    {
        // This page will be under "Settings"
        add_options_page(
            'Settings Admin', 
            'GooVain Settings', 
            'manage_options', 
            'goo-setting-admin', 
            array( $this, 'create_admin_page' )
        );
    }

    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        // Set class property
        $this->options = get_option( 'goo_option_name' );
        ?>
        <div class="wrap">
            <?php screen_icon(); ?>          
            <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                settings_fields( 'goo_option_group' );   
                do_settings_sections( 'goo-setting-admin' );
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
            'goo_option_group', // Option group
            'goo_option_name' // Option name
        );

        add_settings_section(
            'setting_section_id', // ID
            'Vainity URL Settings', // Title
            array( $this, 'print_section_info' ), // Callback
            'goo-setting-admin' // Page
        );  

        add_settings_field(
            'vanity_url', // ID
            'Vanity URL', // Title 
            array( $this,'vanity_input_callback'),
            'goo-setting-admin', // Page
            'setting_section_id' // Section           
        );      
            add_settings_field(
            'google_api', // ID
            'Google API', // Title 
            array( $this,'api_input_callback'),
            'goo-setting-admin', // Page
            'setting_section_id' // Section           
        );   
    }

    /** 
     * Print the Section text
     */
    public function print_section_info()
    {            

        print 'Enter your Vainty URL below (goo.gl/) DO NOT FORGET THE TRAILING SLASH, then enter your google API Key';
        
    }

    public function vanity_input_callback()
    {            
        $file = WP_PLUGIN_DIR."/goovain/goo_pref/goo_pref.txt";
        $current = file_get_contents($file); 
    
        printf('<input type="text" id="vanity_url" name="goo_option_name[vanity_url]" value="'.($current).'" />',
            isset( $this->options['vanity_url'] ) ? esc_attr( $this->options['vanity_url']) : '');

         $new_url = $this->options['vanity_url'];
        file_put_contents($file, $new_url);
    }


        public function api_input_callback()
    {            
        $api = WP_PLUGIN_DIR."/goovain/goo_pref/goo_pref2.txt";
        $current_api = file_get_contents($api);

        printf('<input type="text" id="google_api" name="goo_option_name[google_api]" value="'.($current_api).'" />',
            isset( $this->options['google_api'] ) ? esc_attr( $this->options['google_api']) : '');

         $new_api = $this->options['google_api'];
        file_put_contents($api, $new_api);
    }



}


if( is_admin() )
    $goo_settings_page = new GooSettingsPage();

