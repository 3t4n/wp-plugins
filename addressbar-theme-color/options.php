<?php
class AddressbarThemeColorSettingsPage
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
        add_theme_page(
            'Addressbar Theme Color', 
            'Addressbar Theme Color', 
            'switch_themes', 
            'addressbar-theme-color', 
            array( $this, 'create_admin_page' )
        );
    }

    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        // Set class property
        $this->options = get_option( 'addressbar_theme_color_settings' );
        ?>
        <div class="wrap">
            <h1><?php _e('Addressbar Theme Color Settings', 'addressbar_theme_color_settings'); ?></h1>
            <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                settings_fields( 'addressbar_theme_color_option_group' );
                do_settings_sections( 'html5-adressbar-theme-color-admin' );
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
            'addressbar_theme_color_option_group', // Option group
            'addressbar_theme_color_settings', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'setting_section_id', // ID
            __('Theme Color Settings', 'addressbar_theme_color_settings'), // Title
            array( $this, 'print_section_info' ), // Callback
            'html5-adressbar-theme-color-admin' // Page
        );  

        add_settings_field(
            'addressbar_theme_color', 
            __('Addressbar Theme Color.', 'addressbar_theme_color_settings') . ' ' . __('Use hexadecimal value. Ex: #FF0000' , 'addressbar_theme_color_settings'), 
            array( $this, 'addressbar_theme_color_callback' ), 
            'html5-adressbar-theme-color-admin', 
            'setting_section_id'
        );      
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input )
    {
        $new_input = array();

        if( isset( $input['addressbar_theme_color'] ) )
            $new_input['addressbar_theme_color'] = sanitize_text_field( $input['addressbar_theme_color'] );

        return $new_input;
    }

    /** 
     * Print the Section text
     */
    public function print_section_info()
    {
        _e('Set the color theme for mobile browser adress bar.', 'addressbar_theme_color_settings');
    }


    /** 
     * Get the settings option array and print one of its values
     */
    public function addressbar_theme_color_callback()
    {
        printf(
            '<input type="text" id="addressbar_theme_color" name="addressbar_theme_color_settings[addressbar_theme_color]" value="%s" />',
            isset( $this->options['addressbar_theme_color'] ) ? esc_attr( $this->options['addressbar_theme_color']) : ''
        );
    }
}

if( is_admin() )
    $my_settings_page = new AddressbarThemeColorSettingsPage();


