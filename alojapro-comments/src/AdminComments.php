<?php

/**
 * Class AACWP_Comments_Config_Page
 *
 * Options page to configure params
 */
class AACWP_Comments_Config_Page
{

    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;
    private static $instance;

    /**
     * Main Instance
     *
     * @staticvar   array   $instance
     * @return Alojapro_OptionsPage one true instance
     */
    public static function instance() {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    /**
    * Start up
    */
    public function __construct() {
        add_action('admin_menu', array($this, 'add_plugin_page'));
        add_action('admin_init', array($this, 'settings_comments_config'));
    }

    public function add_plugin_page() {
        add_menu_page(__('Alojapro Comments', 'alojapro-comments'), __('Alojapro Comments', 'alojapro-comments'), "manage_options", "config_menu", array($this, 'create_config_page'), "dashicons-admin-comments", 75);
    }

    /**
     * Widget Options page callback
     */
    public function create_config_page()
    {
        // Set class property
        $this->options = get_option('alojapro_settings', array());

        ?>
        <div class="wrap">
            <form method="post" action="options.php">
                <?php
                // This prints out all hidden setting fields
                settings_fields('alojapro_settings_group');
                do_settings_sections('alojapro-comments-settings');
                submit_button(__('Save Changes', 'alojapro-comments'));
                ?>
            </form>
        </div>
        <?php
    }

    /**
    * Register and add settings
    */

    public function settings_comments_config() {

        register_setting(
            'alojapro_settings_group', // Option group
            'alojapro_settings', // Option name
            array($this, 'sanitize') // Sanitize
        );

        add_settings_section(
            'setting_section_id', // ID
            __('Comments Settings', 'alojapro-comments'), // Title
            array($this, 'print_section_info_widget'), // Callback
            'alojapro-comments-settings' // Page
        );

        add_settings_field(
            'propertyId', // ID
            'Property Id', // Title
            array($this, 'input_callback'), // Callback
            'alojapro-comments-settings', // Page
            'setting_section_id', // Section
            array(
                "propertyId",
                "text",
                "",
                'alojapro_settings',
                "",
            ) // params callback function
        );

        add_settings_field(
            'numberOfComments', // ID
            __('Number of comments per call', 'alojapro-comments'), // Title
            array($this, 'input_callback'), // Callback
            'alojapro-comments-settings', // Page
            'setting_section_id', // Section
            array(
                "numberOfComments",
                "text",
                "",
                'alojapro_settings',
                "",
            ) // params callback function
        );
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     * @return array
     */
    public function sanitize($input)
    {
        $new_input = array();
        foreach ($input as $key => $value) {
            switch ($key) {
                case 'propertyId':
                    $new_input[$key] = sanitize_text_field($value);
                    break;
                case 'numberOfComments':
                    $new_input[$key] = sanitize_text_field($value);
                    break;
                default:
                    $new_input[$key] = sanitize_text_field($value);
                    break;      
            }
        }
        
        return $new_input;
    }

    /**
     * Print the Section Widget text
     */
    public function print_section_info_widget()
    {
        print __('Enter the comment plugin configuration parameters:', 'alojapro-comments');
    }

    /**
     * Get the settings option array and print one of its values
     * @param array $params
     */
    public function input_callback(array $params) {
        list($id, $type, $default, $settingsGroup, $labels) = $params;
        switch ($type) {
            case 'textarea': 
                printf(
                    '<textarea id="' . $id . '" cols="50" rows="10" name="' . $settingsGroup . '[' . $id . ']">%s</textarea>',
                    isset($this->options[$id]) ? esc_attr($this->options[$id]) : $default
                );
                break;
            case 'radio':
                for ($i=0; $i < count($default); $i++) { 
                    if ($this->options[$id] == $default[$i] || (!isset($this->options[$id]) && $i == 0)) {
                        printf(
                            '<input type="' . $type . '" name="' . $settingsGroup . '[' . $id . ']" value="' . $default[$i] . '" checked style="margin-top:2px;"/>'
                        );
                    }else{
                        printf(
                            '<input type="' . $type . '" name="' . $settingsGroup . '[' . $id . ']" value="' . $default[$i] . '" style="margin-top:2px;"/>'
                        );
                    }                   
                    printf(
                        '<label for="' . $settingsGroup . '[' . $id . ']">'.$labels[$i].'</label><br>'
                    );
                }
                break;
            default:
                printf(
                    '<input type="' . $type . '" id="' . $id . '" name="' . $settingsGroup . '[' . $id . ']" value="%s" />',
                    isset($this->options[$id]) ? esc_attr($this->options[$id]) : $default
                );
                break;
        }
        
    }

}