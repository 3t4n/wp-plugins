<?php

/**
 * Class Alojapro_OptionsPage
 *
 * Options page to configure Alojapro Widget params
 */
class Alojapro_OptionsPage
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
    public static function instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    /**
     * Start up
     */
    public function __construct()
    {
        add_action('admin_menu', array($this, 'add_plugin_page'));
        add_action('admin_init', array($this, 'page_init'));
    }

    /**
     * Add options pages
     */
    public function add_plugin_page()
{
    add_menu_page(
        "Alojapro Widget",
        "Alojapro Widget",
        "manage_options",
        "alojapro-widget-settings",
        array($this, 'create_widget_page'),
        "dashicons-calendar-alt",
        "21"
    );

    add_submenu_page(
        "alojapro-widget-settings",
        "Alojapro Config.",
        "Configuration",
        "manage_options",
        "alojapro-config-settings",
        array($this, 'create_config_page')
    );

    add_submenu_page(
        "alojapro-widget-settings",
        "Alojapro Integration",
        "Integration",
        "manage_options",
        "alojapro-integration-page",
        array($this, 'create_integration_page')
    );

    add_submenu_page(
        "alojapro-widget-settings",
        "Alojapro Comments",
        "Comments",
        "manage_options",
        "alojapro-comments-settings",
        array($this, 'create_comments_page')
    );

    add_submenu_page(
        "alojapro-widget-settings",
        "Alojapro Offers",
        "Offers",
        "manage_options",
        "alojapro-offers-settings",
        array($this, 'create_offers_page')
    );
}


    /**
     * Register and add settings
     */
    public function page_init()
    {
        $this->settings_alojaproConfig();
        $this->settings_alojaproWidget();
        $this->settings_alojaproIntegration();
        $this->settings_alojaproComments();
        $this->settings_alojaproOffers();
    }

/**
* Config Options page callback
*/
public function create_config_page()
{
    // Set class property
    $this->options = array_merge(get_option('alojapro_config', array()));

    ?>
    <div class="wrap">
        <h1>Configuración General del Widget</h1>
        <form method="post" action="options.php">
            <?php
            // This prints out all hidden setting fields
            settings_fields('alojapro_config_group');
            do_settings_sections('alojapro-config-settings');
            submit_button("Guardar cambios");
            ?>
        </form>
    </div>
    <?php
}

/**
 * Print the Section Widget text
 */
public function print_section_info_config()
{
    print 'Introduce los parámetros de configuración general:';
}

public function settings_alojaproConfig()
{
    register_setting(
        'alojapro_config_group', // Option group
        'alojapro_config', // Option name
        array($this, 'sanitize') // Sanitize
    );

    add_settings_section(
        'setting_section_id', // ID
        'Parámetros de configuración generales', // Title
        array($this, 'print_section_info_config'), // Callback
        'alojapro-config-settings' // Page
    );

    add_settings_field(
        'action', // ID
        'Action form', // Title
        array($this, 'input_callback'), // Callback
        'alojapro-config-settings', // Page
        'setting_section_id', // Section
        array(
            "action",
            "text",
            "",
            'alojapro_config',
            "",
        ) // params callback function
    );

    add_settings_field(
        'login', // ID
        'Email', // Title
        array($this, 'input_callback'), // Callback
        'alojapro-config-settings', // Page
        'setting_section_id', // Section
        array(
            "login",
            "text",
            "",
            'alojapro_config',
            "",
        ) // params callback function
    );

    add_settings_field(
        'password', // ID
        'Password', // Title
        array($this, 'input_callback'), // Callback
        'alojapro-config-settings', // Page
        'setting_section_id', // Section
        array(
            "password",
            "text",
            "",
            'alojapro_config',
            "",
        ) // params callback function
    );

    add_settings_field(
        'platformId', // ID
        'Id plataforma', // Title
        array($this, 'input_callback'), // Callback
        'alojapro-config-settings', // Page
        'setting_section_id', // Section
        array(
            "platformId",
            "number",
            2,
            'alojapro_config',
            "",
        ) // params callback function
    );

    add_settings_field(
        'widgetId', // ID
        'Id widget', // Title
        array($this, 'input_callback'), // Callback
        'alojapro-config-settings', // Page
        'setting_section_id', // Section
        array(
            "widgetId",
            "number",
            0,
            'alojapro_config',
            "",
        ) // params callback function
    );

    add_settings_field(
        'widgetInternationalId', // ID
        'Id widget Internacional', // Title
        array($this, 'input_callback'), // Callback
        'alojapro-config-settings', // Page
        'setting_section_id', // Section
        array(
            "widgetInternationalId",
            "number",
            0,
            'alojapro_config',
            "",
        ) // params callback function
    );

    add_settings_field(
        'widgetMobileId', // ID
        'Id widget Mobile (opcional)', // Title
        array($this, 'input_callback'), // Callback
        'alojapro-config-settings', // Page
        'setting_section_id', // Section
        array(
            "widgetMobileId",
            "number",
            0,
            'alojapro_config',
            "",
        ) // params callback function
    );
}


    /**
     * Widget Options page callback
     */
    public function create_widget_page()
    {
        // Set class property
        $this->options = array_merge(get_option('alojapro_settings', array()));

        ?>
        <div class="wrap">
            <h1>Alojapro Widget</h1>
            <form method="post" action="options.php">
                <?php
                // This prints out all hidden setting fields
                settings_fields('alojapro_settings_group');
                do_settings_sections('alojapro-widget-settings');
                submit_button("Guardar cambios");
                ?>
            </form>
        </div>
        <?php
    }

    /**
     * Print the Section Widget text
     */
    public function print_section_info_widget()
    {
        print 'Introduce los parámetros de configuración del motor de búsqueda:';
    }

    public function settings_alojaproWidget()
    {
        register_setting(
            'alojapro_settings_group', // Option group
            'alojapro_settings', // Option name
            array($this, 'sanitize') // Sanitize
        );

        add_settings_section(
            'setting_section_id', // ID
            'Parámetros de configuración del Widget', // Title
            array($this, 'print_section_info_widget'), // Callback
            'alojapro-widget-settings' // Page
        );
        
        add_settings_field(
            'maxAdult', // ID
            'Numero màximo de adultos por reserva', // Title
            array($this, 'input_callback'), // Callback
            'alojapro-widget-settings', // Page
            'setting_section_id', // Section
            array(
                "maxAdult",
                "number",
                0,
                'alojapro_settings',
                "",
            ) // params callback function
        );

        add_settings_field(
            'maxChild', // ID
            'Numero màximo de niños por reserva', // Title
            array($this, 'input_callback'), // Callback
            'alojapro-widget-settings', // Page
            'setting_section_id', // Section
            array(
                "maxChild",
                "number",
                0,
                'alojapro_settings',
                "",
            ) // params callback function
        );

        add_settings_field(
            'maxChildAge', // ID
            'Edad màxima niños', // Title
            array($this, 'input_callback'), // Callback
            'alojapro-widget-settings', // Page
            'setting_section_id', // Section
            array(
                "maxChildAge",
                "number",
                0,
                'alojapro_settings',
                "",
            ) // params callback function
        );

        add_settings_field(
            'widgetPropertyType', // ID
            'Property type widget', // Title
            array($this, 'input_callback'), // Callback
            'alojapro-widget-settings', // Page
            'setting_section_id', // Section
            array(
                "widgetPropertyType",
                "radio",
                array("0", "1"),
                'alojapro_settings',
                array("Hotel", "Apartamentos"),
            ) // params callback function
        );

        add_settings_field(
            'customLayout', // ID
            'Layout', // Title
            array($this, 'input_callback'), // Callback
            'alojapro-widget-settings', // Page
            'setting_section_id', // Section
            array(
                "customLayout",
                "radio",
                array("classic", "modern"),
                'alojapro_settings',
                array("Classic", "Modern"),
            ) // params callback function
        );

        add_settings_field(
            'widgetType', // ID
            'Type widget', // Title
            array($this, 'input_callback'), // Callback
            'alojapro-widget-settings', // Page
            'setting_section_id', // Section
            array(
                "widgetType",
                "radio",
                array("0", "1", "2", "3", "4", "5"),
                'alojapro_settings',
                array("Estándar <small>*Classic</small>", "Sin Descuentos <small>*Classic</small>", "Con filtros avanzados <small>*Classic & Modern</small>", "Con filtros avanzados sin descuentos <small>*Classic & Modern</small>", "Con destinos <small>*Modern</small>", "Con destinos sin descuentos <small>*Modern</small>"),
            ) // params callback function
        );

        add_settings_field(
            'customPrimaryColor', // ID
            'Custom Primary Color', // Title
            array($this, 'input_callback'), // Callback
            'alojapro-widget-settings', // Page
            'setting_section_id', // Section
            array(
                "customPrimaryColor",
                "color",
                "",
                'alojapro_settings',
                "",
            ) // params callback function
        );

        add_settings_field(
            'customSecondaryColor', // ID
            'Custom Secondary Color', // Title
            array($this, 'input_callback'), // Callback
            'alojapro-widget-settings', // Page
            'setting_section_id', // Section
            array(
                "customSecondaryColor",
                "color",
                "",
                'alojapro_settings',
                "",
            ) // params callback function
        );

        add_settings_field(
            'customStyle', // ID
            'Style', // Title
            array($this, 'input_callback'), // Callback
            'alojapro-widget-settings', // Page
            'setting_section_id', // Section
            array(
                "customStyle",
                "radio",
                array("0", "1"),
                'alojapro_settings',
                array("Flat", "Rounded"),
            ) // params callback function
        );

        add_settings_field(
            'customCss', // ID
            'Custom CSS', // Title
            array($this, 'input_callback'), // Callback
            'alojapro-widget-settings', // Page
            'setting_section_id', // Section
            array(
                "customCss",
                "textarea",
                "",
                'alojapro_settings',
                "",
            ) // params callback function
        );
    }


    /**
     * Widget Integration page callback
     */

    public function create_integration_page()
    {
        // Set class property
        $this->options = array_merge(get_option('alojapro_integration', array()));
        ?>
        <div class="wrap">
            <h1>Integración del widget</h1>
            <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                settings_fields('alojapro_integration_group');
                do_settings_sections('alojapro-integration-settings');
                submit_button("Guardar cambios");
            ?>
            </form>
        </div>
        <?php
    }
 
    /**
     * Print the Integration Section Widget text
    */
    public function print_section_info_integration()
    {
        print 'Introduzca los parámetros de configuración de la integración del widget:';
    }

    public function settings_alojaproIntegration()
    {
        register_setting(
            'alojapro_integration_group', // Option group
            'alojapro_integration', // Option name
            array($this, 'sanitize') // Sanitize
        );

        add_settings_section(
            'integration_setting_section', // ID
            'Parámetros de configuración de la integracion del widget', // Title
            array($this, 'print_section_info_integration'), // Callback
            'alojapro-integration-settings' // Page
        );

        add_settings_field(
            'widgetUrl', // ID
            'Widget URL', // Title
            array($this, 'input_callback'), // Callback
            'alojapro-integration-settings', // Page
            'integration_setting_section', // Section
            array(
                "widgetUrl",
                "text",
                "",
                'alojapro_integration',
                "",
            ) // params callback function
        );

        add_settings_field(
            'originUrl', // ID
            'Origin URL', // Title
            array($this, 'input_callback'), // Callback
            'alojapro-integration-settings', // Page
            'integration_setting_section', // Section
            array(
                "originUrl",
                "text",
                "",
                'alojapro_integration',
                "",
            ) // params callback function
        );

        add_settings_field(
            'scriptNameBooking', // ID
            'Booking [ScriptName]', // Title
            array($this, 'input_callback'), // Callback
            'alojapro-integration-settings', // Page
            'integration_setting_section', // Section
            array(
                "scriptNameBooking",
                "text",
                "",
                'alojapro_integration',
                "",
            ) // params callback function
        );

        add_settings_field(
            'scriptNameGiftbox', // ID
            'Giftbox [ScriptName]', // Title
            array($this, 'input_callback'), // Callback
            'alojapro-integration-settings', // Page
            'integration_setting_section', // Section
            array(
                "scriptNameGiftbox",
                "text",
                "",
                'alojapro_integration',
                "",
            ) // params callback function
        );

        add_settings_field(
            'initialMethodGiftbox', // ID
            'Initial Method Giftbox', // Title
            array($this, 'input_callback'), // Callback
            'alojapro-integration-settings', // Page
            'integration_setting_section', // Section
            array(
                "scriptNameInitialMethodGiftbox",
                "text",
                "",
                'alojapro_integration',
                "",
            ) // params callback function
        );

        add_settings_field(
            'scriptNameActivities', // ID
            'Activities [ScriptName]', // Title
            array($this, 'input_callback'), // Callback
            'alojapro-integration-settings', // Page
            'integration_setting_section', // Section
            array(
                "scriptNameActivities",
                "text",
                "",
                'alojapro_integration',
                "",
            ) // params callback function
        );

        add_settings_field(
            'scriptNameOffers', // ID
            'Offers [ScriptName]', // Title
            array($this, 'input_callback'), // Callback
            'alojapro-integration-settings', // Page
            'integration_setting_section', // Section
            array(
                "scriptNameOffers",
                "text",
                "",
                'alojapro_integration',
                "",
            ) // params callback function
        );

        add_settings_field(
            'scriptNameComments', // ID
            'Comments [ScriptName]', // Title
            array($this, 'input_callback'), // Callback
            'alojapro-integration-settings', // Page
            'integration_setting_section', // Section
            array(
                "scriptNameComments",
                "text",
                "",
                'alojapro_integration',
                "",
            ) // params callback function
        );
    }

    /**
     * Widget Comments page callback
     */
    public function create_comments_page()
    {
        // Set class property
        $this->options = array_merge(get_option('alojapro_comments', array()));
        ?>
        <div class="wrap">
            <h1>Integración de los comentarios</h1>
            <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                settings_fields('alojapro_comments_group');
                do_settings_sections('alojapro-comments-settings');
                submit_button("Guardar cambios");
            ?>
            </form>
        </div>
        <?php
    }

    /**
     * Print the Section Comment text
     */
    public function print_section_info_comments()
    {
        print 'Introduce los parámetros de configuración para los comentarios:';
    }

    public function settings_alojaproComments()
    {
        register_setting(
            'alojapro_comments_group', // Option group
            'alojapro_comments', // Option name
            array($this, 'sanitize') // Sanitize
        );

        add_settings_section(
            'integration_comments_section', // ID
            'Parámetros de configuración de los comentarios:', // Title
            array($this, 'print_section_info_comments'), // Callback
            'alojapro-comments-settings' // Page
        );

        add_settings_field(
            'propertyId', // ID
            'Property Id', // Title
            array($this, 'input_callback'), // Callback
            'alojapro-comments-settings', // Page
            'integration_comments_section', // Section
            array(
                "propertyId",
                "text",
                "",
                'alojapro_comments',
                "",
            ) // params callback function
        );

        add_settings_field(
            'propertyStyle', // ID
            'Property Style', // Title
            array($this, 'input_callback'), // Callback
            'alojapro-comments-settings', // Page
            'integration_comments_section', // Section
            array(
                "propertyStyle",
                "text",
                "",
                'alojapro_comments',
                "",
            ) // params callback function
        );

        add_settings_field(
            'numComments', // ID
            'Número de Comentarios', // Title
            array($this, 'input_callback'), // Callback
            'alojapro-comments-settings', // Page
            'integration_comments_section', // Section
            array(
                "numComments",
                "text",
                "",
                'alojapro_comments',
                "",
            ) // params callback function
        );

        add_settings_field(
            'widgetCss', // ID
            'Styles', // Title
            array($this, 'input_callback'), // Callback
            'alojapro-comments-settings', // Page
            'integration_comments_section', // Section
            array(
                "widgetCss",
                "text",
                "",
                'alojapro_comments',
                "",
            ) // params callback function
        );
    }

    /**
     * Widget Offers page callback
     */
    public function create_offers_page()
    {
        // Set class property
        $this->options = array_merge(get_option('alojapro_offers', array()));
        ?>
        <div class="wrap">
            <h1>Integración de las offers</h1>
            <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                settings_fields('alojapro_offers_group');
                do_settings_sections('alojapro-offers-settings');
                submit_button("Guardar cambios");
            ?>
            </form>
        </div>
        <?php
    }

    /**
     * Print the Section Offers text
     */
    public function print_section_info_offers()
    {
        print 'Introduce los parámetros de configuración para las ofertas:';
    }

    public function settings_alojaproOffers()
    {
        register_setting(
            'alojapro_offers_group', // Option group
            'alojapro_offers', // Option name
            array($this, 'sanitize') // Sanitize
        );

        add_settings_section(
            'integration_offers_section', // ID
            'Parámetros de configuración de las ofertas:', // Title
            array($this, 'print_section_info_offers'), // Callback
            'alojapro-offers-settings' // Page
        );

        add_settings_field(
            'language', // ID
            'Language', // Title
            array($this, 'input_callback'), // Callback
            'alojapro-offers-settings', // Page
            'integration_offers_section', // Section
            array(
                "language",
                "text",
                "",
                'alojapro_offers',
                "",
            ) // params callback function
        );

        add_settings_field(
            'firstSearch', // ID
            'First Search', // Title
            array($this, 'input_callback'), // Callback
            'alojapro-offers-settings', // Page
            'integration_offers_section', // Section
            array(
                "firstSearch",
                "text",
                "",
                'alojapro_offers',
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
                case 'platformId':
                    $new_input[$key] = absint($value);
                    break;
                case 'widgetId':
                    $new_input[$key] = absint($value);
                    break;
                case 'propertyId':
                    $new_input[$key] = absint($value);
                    break;
                case 'scrollMobile':
                    $new_input[$key] = absint($value);
                    break;
                case 'scrollDesktop':
                    $new_input[$key] = absint($value);
                    break;
                case 'login':
                    $new_input[$key] = sanitize_email($value);
                    break;
                case 'customCss':
                    $new_input[$key] = sanitize_textarea_field($value);
                    break;
                default:
                    $new_input[$key] = sanitize_text_field($value);
                    break;
                    
            }
        }

        return $new_input;
    }

    

    /**
     * Get the settings option array and print one of its values
     * @param array $params
     */
    public function input_callback(array $params)
    {
        list($id, $type, $default, $settingsGroup, $labels) = $params;

        switch ($type) {
            case 'textarea':
                printf(
                    '<textarea id="' . $id . '" cols="100" rows="15" name="' . $settingsGroup . '[' . $id . ']">%s</textarea>',
                    isset($this->options[$id]) ? esc_attr($this->options[$id]) : $default
                );
                break;
            case 'radio':
                //print_r($id);
                for ($i = 0; $i < count($default); $i++) { 
                    if (!isset($default[$i]) || !isset($labels[$i])) {
                        // Si el valor en $default o $labels no está definido, saltamos esta iteración
                        continue;
                    }
                    
                    if (is_numeric($default[$i])) {
                        if (isset($this->options[$id]) && $this->options[$id] == $default[$i] || (!isset($this->options[$id]) && $i == 0)) {
                            printf(
                                '<input type="%s" name="%s[%s]" value="%s" checked style="margin-top:2px;"/>',
                                $type, $settingsGroup, $id, $default[$i]
                            );
                        } else {
                            printf(
                                '<input type="%s" name="%s[%s]" value="%s" style="margin-top:2px;"/>',
                                $type, $settingsGroup, $id, $default[$i]
                            );
                        }
                        printf(
                            '<label for="%s[%s]">%s</label><br>',
                            $settingsGroup, $id, $labels[$i]
                        );
                    } else {
                        $image = ($default[$i] == 'classic') ? 'form_classic.png' : 'form_modern.png';
                        if (isset($this->options[$id]) && $this->options[$id] == $default[$i] || (!isset($this->options[$id]) && $i == 0)) {
                            printf(
                                '<img src="%scss/images/%s" width="800px"><br>
                                <input type="%s" name="%s[%s]" value="%s" checked style="margin-top:2px;"/>',
                                ALOJAPRO_PLUGIN_BASE_URL, $image, $type, $settingsGroup, $id, $default[$i]
                            );
                        } else {
                            printf(
                                '<img src="%scss/images/%s" width="800px"><br>
                                <input type="%s" name="%s[%s]" value="%s" style="margin-top:2px;"/>',
                                ALOJAPRO_PLUGIN_BASE_URL, $image, $type, $settingsGroup, $id, $default[$i]
                            );
                        }
                        printf(
                            '<label for="%s[%s]">%s</label><br><br>',
                            $settingsGroup, $id, $labels[$i]
                        );
                    }
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