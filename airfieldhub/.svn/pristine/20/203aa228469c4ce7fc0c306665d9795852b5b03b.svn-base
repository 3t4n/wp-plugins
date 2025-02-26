<?PHP
/**
 * AirfieldHub WordPress Plugin
 *
 * @package           AirfieldHub
 * @author            AirfieldHub LTD
 * @copyright         2024 AirfieldHub LTD
 * @license           BSD-4-Clause
 *
 * @wordpress-plugin
 * Plugin Name:       AirfieldHub
 * Plugin URI:        https://wordpress.org/plugins/airfieldhub
 * Description:       Integration of AirfieldHub for Wordpress websites, accept PPR, Bookouts and automatically accept payments for landing fees and parking fees for your airfield!
 * Version:           0.1.3
 * Tags:              ppr, airfield, airfieldhub, simple ppr, airfield hub
 * Requires at least: 5.9
 * Requires PHP:      7.2
 * Author:            AirfieldHub LTD
 * Author URI:        https://airfieldhub.com
 * Text Domain:       airfieldhub
 * License:           BSD-4-Clause
 * License URI:       https://wordpress.org/plugins/airfieldhub
 */

/*
Copyright (c) 2024, AirfieldHub LTD All rights reserved.

Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:

Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.
Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution.
All advertising materials mentioning features or use of this software must display the following acknowledgement: This product includes software developed by AirfieldHub LTD.
Neither the name of the AirfieldHub LTD nor the names of its contributors may be used to endorse or promote products derived from this software without specific prior written permission.
THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDER ''AS IS'' AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
*/



//START OF PPR BLOCK

function airfieldhub_display_ppr( $attr ) {
    
    $airfieldhub = get_option('airfieldhub_key');

    $output = '<style>
                #afh_iframe{
                    min-width: 250px;
                    width: 100%;
                }
                .afh_error{
                    position: relative;
                    display: block;
                    max-width: 850px;
                    width: 100%;
                    padding: 10px;
                    border: 3px solid #fff;
                    background: #000;
                    color: #FFF;
                }
                </style><div>';

    $output .= "<script src='".plugin_dir_url(__FILE__)."assets/iframeResizer.min.js'></script>";
    $output .= '<iframe id="afh_iframe" src="https://airfieldhub.com/widget.html/arrival/'.$airfieldhub.'/" frameborder="0" scrolling="no" allowtransparency="true"></iframe>';

    $output .= "<script>
  iFrameResize({ log: true }, '#afh_iframe')
</script>";
    
    $output .= '</div>';


    $output_error = '<style>
                .afh_error{
                    position: relative;
                    display: block;
                    max-width: 850px;
                    width: 100%;
                    padding: 10px;
                    border: 3px solid #fff;
                    background: #000;
                    color: #FFF;
                    text-align: center;
                }
                </style>
                <div class="afh_error">
                    <strong>
                        Sorry.</strong> It looks like you have not yet setup AirfieldHub! <br />
                        Please go to the admin section and enter your AirfieldHub key.
                    
                </div>
                ';
    

    return ($airfieldhub == "") ? $output_error : $output;
}
/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
register_block_type( __DIR__ . '/public/ppr/build', array(
        'render_callback' => 'airfieldhub_display_ppr'
    ) );


//END OF BLOCK



//START OF BOOKOUT BLOCK

function airfieldhub_display_bookout( $attr ) {
    
    $airfieldhub = get_option('airfieldhub_key');

    $output = '<style>
                #afh2_iframe{
                    min-width: 250px;
                    width: 100%;
                }
                </style><div>';
    $output .= "<script src='".plugin_dir_url(__FILE__)."assets/iframeResizer.min.js'></script>";
    $output .= '<iframe id="afh2_iframe" src="https://airfieldhub.com/widget.html/departure/'.$airfieldhub.'/" frameborder="0" scrolling="no" allowtransparency="true"></iframe>';

    $output .= "<script>
  iFrameResize({ log: true }, '#afh2_iframe')
</script>";
    
    $output .= '</div>';


    $output_error = '<style>
                .afh_error{
                    position: relative;
                    display: block;
                    max-width: 850px;
                    width: 100%;
                    padding: 10px;
                    border: 3px solid #fff;
                    background: #000;
                    color: #FFF;
                    text-align: center;
                }
                </style>
                <div class="afh_error">
                    <strong>
                        Sorry.</strong> It looks like you have not yet setup AirfieldHub! <br />
                        Please go to the admin section and enter your AirfieldHub key.
                    
                </div>
                ';
    

    return ($airfieldhub == "") ? $output_error : $output;
}
/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
register_block_type( __DIR__ . '/public/bookout/build', array(
        'render_callback' => 'airfieldhub_display_bookout'
    ) );


//END OF BLOCK




//RESTFUL API TO OBTAIN THE SECRET KEY ENTERED IN THE ADMIN SECTION
add_action( 'rest_api_init', 'airfieldhub_settings_api_init', 10, 1 );
function airfieldhub_settings_api_init() {
    register_rest_route( 'airfieldhub/v1', '/settings', array(
        'methods'             => 'GET',
        'permission_callback' => '__return_true', // *always set a permission callback
        'callback'            => function ( $request ) {
            return array(
                'secret' => "random_assortment", 'airfieldhub_key' => get_option('airfieldhub_key')
            );
        },
    ) );
}




//START OF THE ADMIN SECTION

/**
 * custom option and settings FOR AIRFIELD HUB
 */
function airfieldhub_settings_init() {
    // Register a new setting for "wporg" page.
    register_setting( 'airfieldhub_settings', 'airfieldhub_options' );
    register_setting( 'airfieldhub_settings', 'airfieldhub_key' );

    // Register a new section in the "wporg" page.
    add_settings_section(
        'airfieldhub_section_developers',
        __( 'Welcome to the AirfieldHub settings for WordPress!', 'airfieldhub_settings' ), 'airfieldhub_section_developers_callback',
        'airfieldhub_settings'
    );

    // Register a new field in the "wporg_section_developers" section, inside the "wporg" page.
    add_settings_field(
        'airfieldhub_field_pill', // As of WP 4.6 this value is used only internally. // Use $args' label_for to populate the id inside the callback.
            __( 'AirfieldHub Key', 'airfieldhub' ),
        // 'airfieldhub_field_pill_cb',
        'airfieldhub_settings_field_callback',
        'airfieldhub_settings',
        'airfieldhub_section_developers',
        array(
            'label_for'         => 'airfieldhub_field_pill',
            'class'             => 'airfieldhub_row',
            'airfieldhub_custom_data' => 'custom',
        )
    );
}

/**
 * Register our wporg_settings_init to the admin_init action hook.
 */
add_action( 'admin_init', 'airfieldhub_settings_init' );


/**
 * Custom option and settings:
 *  - callback functions
 */


/**
 * Developers section callback function.
 *
 * @param array $args  The settings array, defining title, id, callback.
 */
function airfieldhub_section_developers_callback( $args ) {
    ?>
    <p id="<?php echo esc_attr( $args['id'] ); ?>"><?php esc_html_e( 'Please find this key in your AirfieldHub account, if you do not yet have an account, it is free to create an account with AirfieldHub, and you it will take less than 15 minutes to get you up and running. Once you have pasted your unique AirfieldHub Key below, you will be able to welcome your first aircraft with AirfieldHub instantly', 'airfieldhub_settings' ); ?></p>
    <?php
}





/**
 * Pill field callbakc function. I left this in for future reference.
 *
 * WordPress has magic interaction with the following keys: label_for, class.
 * - the "label_for" key value is used for the "for" attribute of the <label>.
 * - the "class" key value is used for the "class" attribute of the <tr> containing the field.
 * Note: you can add custom key value pairs to be used inside your callbacks.
 *
 * @param array $args
 */
function airfieldhub_field_pill_cb( $args ) {
    // Get the value of the setting we've registered with register_setting()
    $options = get_option( 'airfieldhub_options' );
    ?>
    <select
            id="<?php echo esc_attr( $args['label_for'] ); ?>"
            data-custom="<?php echo esc_attr( $args['airfieldhub_custom_data'] ); ?>"
            name="airfieldhub_options[<?php echo esc_attr( $args['label_for'] ); ?>]">
        <option value="red" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'red', false ) ) : ( '' ); ?>>
            <?php esc_html_e( 'red pill', 'airfieldhub_settings' ); ?>
        </option>
        <option value="blue" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'blue', false ) ) : ( '' ); ?>>
            <?php esc_html_e( 'blue pill', 'airfieldhub_settings' ); ?>
        </option>
    </select>
    <p class="description">
        <?php esc_html_e( 'You take the blue pill and the story ends. You wake in your bed and you believe whatever you want to believe.', 'airfieldhub_settings' ); ?>
    </p>
    <p class="description">
        <?php esc_html_e( 'You take the red pill and you stay in Wonderland and I show you how deep the rabbit-hole goes.', 'airfieldhub_settings' ); ?>
    </p>
    <?php
}


// field content cb
function airfieldhub_settings_field_callback() {
    // get the value of the setting we've registered with register_setting()
    $setting = get_option('airfieldhub_key');
    // output the field
     ?>
     <input type="text" name="airfieldhub_key" value="<?php echo isset( $setting ) ? esc_attr( $setting ) : ''; ?>">
    <?php 
 }

/**
 * Add the top level menu page.
 */
function airfieldhub_options_page() {
    add_menu_page(
        'AirfieldHub',
        'AirfieldHub',
        'manage_options',
        'airfieldhub_settings',
        'airfieldhub_options_page_html',
        'dashicons-airplane'
       // plugin_dir_url(__FILE__) . 'images/small_logo_icon.png' //our actual logo does live here (not in icon font style)
    );
}


/**
 * Register our wporg_options_page to the admin_menu action hook.
 */
add_action( 'admin_menu', 'airfieldhub_options_page' );


/**
 * Top level menu callback function
 */
function airfieldhub_options_page_html() {
    // check user capabilities
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }

    // add error/update messages

    // check if the user have submitted the settings
    // WordPress will add the "settings-updated" $_GET parameter to the url
    if ( isset( $_GET['settings-updated'] ) ) {
        // add settings saved message with the class of "updated"
        add_settings_error( 'airfieldhub_messages', 'airfieldhub_message', __( 'Settings Saved', 'airfieldhub_settings' ), 'updated' );
    }

    // show error/update messages
    settings_errors( 'airfieldhub_messages' );
    ?>
    <div class="wrap">
        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
        <form action="options.php" method="post">
            <?php
            // output security fields for the registered setting "wporg"
            settings_fields( 'airfieldhub_settings' );
            // output setting sections and their fields
            // (sections are registered for "wporg", each field is registered to a specific section)
            do_settings_sections( 'airfieldhub_settings' );
            // output save settings button
            submit_button( 'Save Settings' );
            ?>
        </form>
    </div>
    <?php
}

//END OF THE ADMIN SECTION











//DEFAULT REGISTRATION CLASSES AND INITIAL INSTALLATION, ACTIVATION, REMOVAL OF THE AIRFIELDHUB PLUGIN ARE BELOW


register_activation_hook(   __FILE__, array( 'AirfieldHubClass', 'on_activation' ) );
register_deactivation_hook( __FILE__, array( 'AirfieldHubClass', 'on_deactivation' ) );
register_uninstall_hook(    __FILE__, array( 'AirfieldHubClass', 'on_uninstall' ) );

add_action( 'plugins_loaded', array( 'AirfieldHubClass', 'init' ) );

class AirfieldHubClass
{
    protected static $instance;

    public static function init()
    {
        is_null( self::$instance ) AND self::$instance = new self;
        return self::$instance;
    }

    public static function on_activation()
    {
        if ( ! current_user_can( 'activate_plugins' ) )
            return;
        
        $plugin = "airfieldhub/airfieldhub.php";
        //exit( var_dump( $_REQUEST['plugin'] ));

        check_admin_referer( "activate-plugin_{$plugin}" );

        # Uncomment the following line to see the function in action
        # exit( var_dump( $_GET ) );
    }

    public static function on_deactivation()
    {
        if ( ! current_user_can( 'activate_plugins' ) )
            return;

        $plugin = "airfieldhub/airfieldhub.php";
        check_admin_referer( "deactivate-plugin_{$plugin}" );

        # Uncomment the following line to see the function in action
        # exit( var_dump( $_GET ) );
    }

    public static function on_uninstall()
    {
        if ( ! current_user_can( 'activate_plugins' ) )
            return;
        check_admin_referer( 'bulk-plugins' );

        delete_option("airfieldhub_key");

        // Important: Check if the file is the one
        // that was registered during the uninstall hook.
        if ( __FILE__ != WP_UNINSTALL_PLUGIN )
            return;

        # Uncomment the following line to see the function in action
        # exit( var_dump( $_GET ) );
    }

    public function __construct()
    {
        # INIT the plugin: Hook your callbacks
    }
}