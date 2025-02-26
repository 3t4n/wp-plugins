<?php

/**
 * The settings of the plugin.
 *
 * @link  http://devinvinson.com
 * @since 1.0.0
 *
 * @package    Admin_Block_By_Ip
 * @subpackage Admin_Block_By_Ip/setting
 */

/**
 * Class WordPress_Plugin_Template_Settings
 */
class Admin_Allow_By_Ip_Settings
{

    /**
     * The ID of this plugin.
     *
     * @since  1.0.0
     * @access private
     * @var    string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since  1.0.0
     * @access private
     * @var    string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since 1.0.0
     * @param string $plugin_name The name of this plugin.
     * @param string $version     The version of this plugin.
     */
    public function __construct( $plugin_name, $version )
    {

        $this->plugin_name = $plugin_name;
        $this->version = $version;

    }

    /**
     * This function introduces the theme options into the 'Appearance' menu and into a top-level
     * 'HMP' menu.
     */
    public function setup_plugin_options_menu()
    {

        //Add the menu to the Plugins set of menu items
        add_options_page(
            'Admin block', // The title to be displayed in the browser window for this page.
            'Admin block', // The text to be displayed for this menu item
            'manage_options', // Which type of users can see this menu item
            'abbi_options', // The unique ID - that is, the slug - for this menu item
            array( $this, 'render_settings_page_content'), // The name of the function to call when rendering this menu's page
            'dashicons-lock'
        );

    }

    /**
     * Provides default values for the Display Options.
     *
     * @return array
     */
    public function default_advanced_options()
    {

        $defaults = array(
            'hide_wplogins'     => '127.0.0.1',
            'enable_devmode'    => '',
            'maintenance'       => '/maintenance.html'
        );

        return $defaults;

    }

    /**
     * Provide default values for the Social Options.
     *
     * @return array
     */
    public function default_abbi_help()
    {

        $defaults = array(

        );

        return  $defaults;

    }

    /**
     * Renders a simple page to display for the theme menu defined above.
     */
    public function render_settings_page_content( $active_tab = '' )
    {
        ?>
        <!-- Create a header in the default WordPress 'wrap' container -->
        <div class="wrap">

            <h2><?php _e('Admin block by IP', 'admin-allow-by-ip'); ?></h2>
            <?php settings_errors(); ?>

            <?php if ( isset($_GET[ 'tab' ] ) ) {

                $active_tab = $_GET[ 'tab' ];

            } elseif ( $active_tab == 'abbi_help' ) {

                $active_tab = 'abbi_help';

            } else {

                $active_tab = 'advanced_options';

            } // end if/else 
            ?>

            <h2 class="nav-tab-wrapper">
                <a href="?page=abbi_options&tab=advanced_options" class="nav-tab <?php echo $active_tab == 'advanced_options' ? 'nav-tab-active' : ''; ?>"><?php _e('Advanced', 'admin-allow-by-ip'); ?></a>
                <a href="?page=abbi_options&tab=abbi_help" class="nav-tab <?php echo $active_tab == 'abbi_help' ? 'nav-tab-active' : ''; ?>"><?php _e('Help', 'admin-allow-by-ip'); ?></a>
            </h2>

            <form method="post" action="options.php">
                <?php

                if ( $active_tab == 'advanced_options' ) {

                    settings_fields('abbi_options_advanced_options');
                    do_settings_sections('abbi_options_advanced_options');

                    submit_button();
                } elseif ( $active_tab == 'abbi_help' ) {

                    settings_fields('abbi_options_abbi_help');
                    do_settings_sections('abbi_options_abbi_help');

                } // end if/else



                ?>
            </form>

        </div><!-- /.wrap -->
        <?php
    }


    /**
     * This function provides a simple description for the General Options page.
     *
     * It's called from the 'wppb-demo_initialize_theme_options' function by being passed as a parameter
     * in the add_settings_section function.
     */
    public function general_options_callback()
    {
        $options = get_option('abbi_options_advanced_options');
        // var_dump($options);
        echo '<p>' . __('Enter which IPs wish to display wp-admin.', 'admin-allow-by-ip') . '</p>';
    } // end general_options_callback


    /**
     * Initializes the theme's display options page by registering the Sections,
     * Fields, and Settings.
     *
     * This function is registered with the 'admin_init' hook.
     */
    public function initialize_advanced_options()
    {

        // If the theme options don't exist, create them.
        if ( false == get_option('abbi_options_advanced_options') ) {
            $default_array = $this->default_advanced_options();
            add_option('abbi_options_advanced_options', $default_array);
        }


        add_settings_section(
            'general_settings_section', // ID used to identify this section and with which to register options
            __('Development mode', 'admin-allow-by-ip'),    // Title to be displayed on the administration page
            array( $this, 'general_options_callback'), // Callback used to render the description of the section
            'abbi_options_advanced_options' // Page on which to add this section of options
        );

        add_settings_field(
            'enable_devmode',
            __('Enable Development', 'admin-allow-by-ip'),
            array( $this, 'toggle_block_callback'),
            'abbi_options_advanced_options',
            'general_settings_section',
            array(
                __('Enable developing mode for below IP(s).', 'admin-allow-by-ip'),
            )
        );    


        // Next, we'll introduce the fields for toggling the visibility of content elements.
        add_settings_field(
            'hide_wplogins', // ID used to identify the field throughout the theme
            __('Hide wp logins', 'admin-allow-by-ip'), // The label to the left of the option interface element
            array( $this, 'toggle_ips_callback'), // The name of the function responsible for rendering the option interface
            'abbi_options_advanced_options', // The page on which this option will be displayed
            'general_settings_section', // The name of the section to which this field belongs
            array( // The array of arguments to pass to the callback. In this case, just a description.
                __('ex - 192.168.1.2,192.168.1.3', 'admin-allow-by-ip'),
            )
        );

        add_settings_field(
            'redirect_location',
            __('Redirect location', 'dmin-allow-by-ip'),
            array( $this, 'select_direction_callback'),
            'abbi_options_advanced_options',
            'general_settings_section'
        );

        // Finally, we register the fields with WordPress
        register_setting(
            'abbi_options_advanced_options',
            'abbi_options_advanced_options',
            array( $this, 'validate_input_examples')
        );

    } // end wppb-demo_initialize_theme_options

    public function initialize_help_options()
    {
        // add_settings_section(
        //     'general_settings_section', // ID used to identify this section and with which to register options
        //     __('Development mode', 'admin-allow-by-ip'),    // Title to be displayed on the administration page
        //     array( $this, 'general_options_callback'), // Callback used to render the description of the section
        //     'abbi_options_help_options' // Page on which to add this section of options
        // );

        // add_settings_field(
        //     'enable_devmode',
        //     __( 'Enable Development', 'admin-allow-by-ip' ),
        //     array( $this, 'toggle_block_callback'),
        //     'abbi_options_help_options',
        //     'general_settings_section',
        //     array(
        //         __( 'Enable developing mode for below IP(s).', 'admin-allow-by-ip' ),
        //     )
        // );    
    }

    public function toggle_block_callback($args)
    {

        $options = get_option('abbi_options_advanced_options');
        $devmode = "enable_devmode";

        $checked = checked(1, isset($options['enable_devmode']) ? $options['enable_devmode'] : 0, false);

        $html = '<input type="checkbox" id="'.esc_attr($devmode).'" name="abbi_options_advanced_options['.$devmode.']" value="1" ' . $checked. '/>';

        $html .= "<label for=".esc_attr($devmode, 'admin-allow-by-ip').">". esc_html__($args[0], 'admin-allow-by-ip') ."</label>";

        $allowed_html = array(
            'input' => array(
                'type'      => array(),
                'id'          => array(),
                'name'      => array(),
                'value'     => array(),
                'checked'   => array()
            ),
        );

        echo wp_kses($html, $allowed_html);

    } 

    public function select_direction_callback()
    {

        $options = get_option('abbi_options_advanced_options');

        $url = get_site_url().'/maintenance.html';

        $page_status = $this->check_404($url);
        
        

        $html = '<select id="direction_option" name="abbi_options_advanced_options[direction_option]">';
        $html .= '<option value="default">' . __('Select redirection...', 'admin-allow-by-ip') . '</option>';
        $html .= '<option value="home-page"' . selected($options['direction_option'], 'home-page', false) . '>' . __('Home', 'admin-allow-by-ip') . '</option>';
        $html .= '<option value="maintenance-page"' . selected($options['direction_option'], 'maintenance-page', false) . '>' . __('Maintain page', 'admin-allow-by-ip') . '</option>';

        if (($options['direction_option']) == "maintenance-page") {
            if ( $this->check_404($url) == false ) {
                echo "<p><code>maintenance.html</code> located in root folder</p> ";
            } else {
                echo "<p>couldn't find <code>maintenance.html</code><br>you need create maintenance page in your root folder. Download sample maintenance page <a href='https://github.com/apsaraaruna/maintenance-landing' target='_blank'>here</a></p>";    
            }

        }
        
        $allowed_html = array(
            'select' => array(
                'class'  => array(),
                'id'     => array(),
                'name'   => array(),
                'value'  => array(),
                'type'   => array(),
            ),
            'option' => array(
                'value' => array(),
                'selected' => array(),
            )
        );

        echo wp_kses($html, $allowed_html);

    } // end select_element_callback

    /**
     * This function renders the interface elements for toggling the visibility of the header element.
     *
     * It accepts an array or arguments and expects the first element in the array to be the description
     * to be displayed next to the checkbox.
     */
    public function toggle_ips_callback($args)
    {

        // First, we read the options collection
        $options = get_option('abbi_options_advanced_options');

        // Next, we update the name attribute to access this element's ID in the context of the display options array
        // We also access the hide_wplogins element of the options collection in the call to the checked() helper function

        $html = '<input type="text" id="'.esc_attr('hide_wplogins').'" name="abbi_options_advanced_options[hide_wplogins]" value="' .esc_attr($options['hide_wplogins']) . '" />';
        // Here, we'll take the first argument of the array and add it to a label next to the checkbox
        $html .= "<label for=".esc_attr('hide_wplogins', 'admin-allow-by-ip').">". esc_html__($args[0], 'admin-allow-by-ip') ."</label>";

        $allowed_html = array(
            'input' => array(
                'type'      => array(),
                'id'      => array(),
                'name'      => array(),
                'value'     => array()
            ),
        );

        echo wp_kses($html, $allowed_html);

    } // end toggle_ips_callback



    /**
     * Sanitization callback for the social options. Since each of the social options are text inputs,
     * this function loops through the incoming option and strips all tags and slashes from the value
     * before serializing it.
     *
     * @params $input    The unsanitized collection of options.
     *
     * @returns The collection of sanitized values.
     */
    public function sanitize_abbi_help( $input )
    {

        // Define the array for the updated options
        $output = array();

        // Loop through each of the options sanitizing the data
        foreach ( $input as $key => $val ) {

            if ( isset($input[$key] ) ) {
                $output[$key] = esc_url_raw(strip_tags(stripslashes($input[$key])));
            } // end if

        } // end foreach

        // Return the new collection
        return apply_filters('sanitize_abbi_help', $output, $input);

    } // end sanitize_abbi_help

    

    public function validate_input_examples( $input )
    {

        // Create our array for storing the validated options
        $output = array();

        // Loop through each of the incoming options
        foreach ( $input as $key => $value ) {

            // Check to see if the current option has a value. If so, process it.
            if ( isset($input[$key]) ) {

                // Strip all HTML and PHP tags and properly handle quoted strings
                $output[$key] = strip_tags(stripslashes($input[ $key ]));

            } // end if

        } // end foreach

        // Return the array processing any additional functions filtered by this action
        return apply_filters('validate_input_examples', $output, $input);

    } // end validate_input_examples


    function _restrict_wp_login()
    {

        global $pagenow; 

        $options = get_option('abbi_options_advanced_options');
        
        $getipset = get_option('abbi_options_advanced_options')['hide_wplogins'];

        $removelastcomma = str_replace(' ', '', rtrim($getipset, ','));

        $iplists = explode(",", $removelastcomma);

        $removeempty = array_filter($iplists);

        foreach ( $removeempty as $singleip ) {

            if ( !empty($_SERVER['HTTP_CLIENT_IP']) ) { 

                $ip = $_SERVER['HTTP_CLIENT_IP'];

            } elseif ( !empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { 

                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];

            } else { 

                $ip = $_SERVER['REMOTE_ADDR'];

            }

            if ( $singleip != $ip ) {
                if ( is_user_logged_in() || strpos($singleip, $ip) !== false ) { 
                    return;
                }

                if ( 'wp-login.php' == $pagenow && $_GET['action'] != "logout" ) {

                    $url = home_url().'/maintenance.html';

                    if ( ($options['direction_option']) == "maintenance-page" ) {
                        wp_redirect($url);
                        // exit();
                    } else {
                        wp_redirect(home_url());
                        exit();
                    }    

                }

            }

        } 

    }


    function check_404($url){

        $headers=get_headers($url, 1);

        if ($headers[0]!='HTTP/1.1 200 OK') {

            return true; 

        } else { 

            return false;

        }
    }

}