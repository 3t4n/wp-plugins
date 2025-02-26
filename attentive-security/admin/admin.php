<?php
/**
 * @package Attentive
 * @version 1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class attwspSettingsPage
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
        add_action( 'admin_menu', array( $this, 'attwsp_add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'attwsp_page_init' ) );
    }

    /**
     * Add options page
     */
    public function attwsp_add_plugin_page()
    {
        // This page will be under "Settings"
        add_options_page(
            'Settings Admin', 
            'Attentive WSP Settings', 
            'manage_options', 
            'attwsp-setting-admin', 
            array( $this, 'attwsp_create_admin_page' )
        );       

    }

    /**
     * Options page callback
     */
    public function attwsp_create_admin_page()
    {
        // Set class property
        $this->options = get_option( 'attwsp_option_name' );
        ?>
        <div class="wrap">
			<h2><?php esc_html_e( 'Attentive WSP Settings', 'attwsp' ); ?></h2>  
		
            <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
				settings_fields( 'attwsp_option_group' );

                do_settings_sections( 'attwsp-setting-admin' );

                submit_button(); 
            ?>
            </form>
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function attwsp_page_init()
    {   

        register_setting(
            'attwsp_option_group', // Option group
            'attwsp_option_name', // Option name
            array( $this, 'attwsp_sanitize' ) // Sanitize
        );

        add_settings_section(
            'setting_section_id', // ID
            'Attentive WSP Settings', // Title
            array( $this, 'attwsp_print_section_info' ), // Callback
            'attwsp-setting-admin' // Page
        );
		
		// Scroll field Settings
		add_settings_field(
			'hidewpv_active', // ID
			'Hide Wordpress Version', // Title 
			array( $this, 'attwsp_hidewpv_active_callback' ), // Callback
			'attwsp-setting-admin', // Page
			'setting_section_id' // Section           
        ); 
		add_settings_field(
			'homeredirect_active', // ID
			'wp-admin redirect active and home page', // Title 
			array( $this, 'attwsp_homeredirect_active_callback' ), // Callback
			'attwsp-setting-admin', // Page
			'setting_section_id' // Section           
        );
        add_settings_field(
            'otherpageredirect', // ID
            'wp-admin redirect other page', // Title 
            array( $this, 'attwsp_otherpageredirect_callback' ), // Callback
            'attwsp-setting-admin', // Page
            'setting_section_id' // Section           
        ); 
     

	
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function attwsp_sanitize( $input )
    {
        $new_input = array();
		// sanitize
        if( isset( $input['hidewpv_active'] ) )
            $new_input['hidewpv_active'] = sanitize_text_field( $input['hidewpv_active'] );
		
		if( isset( $input['homeredirect_active'] ) )
            $new_input['homeredirect_active'] = sanitize_text_field( $input['homeredirect_active'] );
     
		if( isset( $input['otherpageredirect'] ) )
            $new_input['otherpageredirect'] = sanitize_text_field( $input['otherpageredirect'] );
    
        return $new_input;
    }

    /** 
     * Print the Section text
     */
    public function attwsp_print_section_info()
    {

        print 'Enter your settings below:';
    }

    /** 
     * Get the Scroll fields settings
     */
	
	public function attwsp_hidewpv_active_callback()
    {
		printf(
            '<input type="checkbox" id="hidewpv_active" name="attwsp_option_name[hidewpv_active]" value="true" %s />',
            isset( $this->options['hidewpv_active'] ) ? 'checked' : ''
        );

    }
    public function attwsp_otherpageredirect_callback()
    {
        printf(
            '<input type="text" id="otherpageredirect" name="attwsp_option_name[otherpageredirect]" value="%s" placeholder="use page slug" />',
            isset( $this->options['otherpageredirect'] ) ? esc_attr( $this->options['otherpageredirect']) : ''
        );	
		
    } 
 
	public function attwsp_homeredirect_active_callback()
    {
		printf(
            '<input type="checkbox" id="homeredirect_active" name="attwsp_option_name[homeredirect_active]" value="true" %s />',
            isset( $this->options['homeredirect_active'] ) ? 'checked' : ''
        );

    }
	
	
}

if( is_admin() )
    $woomet_settings_page = new attwspSettingsPage();
