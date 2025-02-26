<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       
 * @since      1.0.1
 *
 * @package    Exly_WP
 * @subpackage Exly_WP/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Exly_WP
 * @subpackage Exly_WP/admin
 * @author     Ramesh Singh
 */
class Exly_WP_Admin
{

    /**
     * The ID of this plugin.
     *
     * @since    1.0.1
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.1
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.1
     * @param      string    $content       The name of this content.
     */

    private $content;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.1
     * @param      string    $className  The name of this class name.
     */
    private $className;

    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version = $version;

        // Lets add an action to setup the admin menu in the left nav
        add_action('admin_menu', array(
            $this,
            'add_admin_menu'
        ));
        // Add some actions to setup the settings we want on the wp admin page
        add_action('admin_init', array(
            $this,
            'setup_sections'
        ));
        add_action('admin_init', array(
            $this,
            'setup_fields'
        ));
        add_action('before_license_key_content', array(
            $this,
            'before_license_key_content_callback'
        ));
        add_action('after_license_key_content', array(
            $this,
            'after_license_key_content_callback'
        ));
        add_action('wp_ajax_validate_license_key', array(
            $this,
            'license_key_validation_callback'
        ));
        add_action('wp_ajax_nopriv_validate_license_key', array(
            $this,
            'license_key_validation_callback'
        ));

    }

    /**
     * Add the menu items to the admin menu
     *
     * @since    1.0.1
     */
    public function add_admin_menu()
    {

        // Main Menu Item
        add_menu_page('Exly WP', 'Exly WP', 'manage_options', 'exly-wp', array(
            $this,
            'wp_exly_admin_page'
        ) , 'dashicons-store', 1);

        // Sub Menu Item One
        add_submenu_page('exly-wp', 'Settings', 'Settings', 'manage_options', 'exly-wp', array(
            $this,
            'wp_exly_admin_page'
        ));
        // Sub Menu Item Two
        
    }

    /**
     * Callback function for displaying the admin settings page.
     *
     * @since    1.0.1
     */
    public function wp_exly_admin_page()
    {
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/partials/exly-wp-admin-display.php';
    }

    /**
     * Callback function for displaying the license key content page.
     *
     * @since    1.0.1
     */

    public function before_license_key_content_callback()
    {
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/partials/exly-wp-admin-license-before-display.php';
    }

    /**
     * Callback function for displaying the license key content page.
     *
     * @since    1.0.1
     */

    public function after_license_key_content_callback()
    {
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/partials/exly-wp-admin-license-after-display.php';
    }
    /**
     * Setup action in the validation key
     *
     * @since    1.0.1
     */

    public function license_key_validation_callback()
    {
        check_ajax_referer('wp-exely-license-key', 'security');
        $checkResponse = array();
        $license_key = sanitize_text_field($_POST['licenseKey']);
        if (!empty($license_key))
        {
            $checkValidResponse = $this->license_key_response_callback($license_key);
            if ($checkValidResponse['status'] === 'success')
            {
                $checkResponse['valid'] = true;
                update_option('wp_exly_license_key', $checkValidResponse['token_key'], true);
                $checkResponse['msg'] = __('License key successfully linked!', 'exly-wp');
                
            }
            if ($checkValidResponse['status'] === 'error')
            {
                $checkResponse['valid'] = false;
                delete_option('wp_exly_license_key');
                $checkResponse['msg'] = __('Invalid Key! Please enter the correct key.', 'exly-wp');
            }
            if ($checkValidResponse['status'] === 'domain_error')
            {
                $checkResponse['valid'] = false;
                delete_option('wp_exly_license_key');
                $checkResponse['msg'] = __('Invalid subdomain! Please use this plugin on the registered subdomain of Wp Exly.', 'exly-wp');
            }
        }
        else
        {
            delete_option('wp_exly_license_key');
            $checkResponse['msg'] = __('Please enter the license key.', 'exly-wp');
        }

        echo json_encode($checkResponse);

        die();
    }

    /**
     * Setup action in the validation response from license key
     *
     * @since    1.0.1
     */

    public function license_key_response_callback($authKey)
    {
        $valid = array();
        $loader = new Exly_WP_Loader();
        $baseURL = $loader->get_website_base_url();
        $baseURL = parse_url($baseURL, PHP_URL_HOST);
        $domain = $loader->get_and_varify_domain($baseURL);
        $domain = EXLY_SUB_DOMAIN;

        $url = EXLY_BASE_URL . EXLY_TOKEN_URL .'?platform=Wordpress&sub_domain='.$domain.'&token='.$authKey;
        
        $response = wp_remote_get($url, array(
            'timeout' => 10000,
            'redirection' => 5,
            'httpversion' => '1.0',
            'blocking' => true,
            'headers' => array(
                'Content-Type' => 'text/plain',
                'scoot-origin' => 'web_app',
                'accept' => 'application/json',
                'accept-language' => 'en-US',
                'auth-token' => EXLY_ACCESS_TOKEN,
            ) ,
            'cookies' => array()
        ));

        if (is_wp_error($response))
        {
            $error_message = $response->get_error_message();
            return $error_message;
        }
        else
        {
            $result = json_decode($response['body'], true);
            if ($result)
            {
                if ($result['status'] === 200)
                {
                    $valid['status'] = 'success';
                    $valid['token_key'] = $authKey;
                }
                else
                {
                    $valid['status'] = 'error';
                }
            }

        }

        return $valid;
    }

    /**
     * Setup sections in the settings
     *
     * @since    1.0.1
     */
    public function setup_sections()
    {
        add_settings_section('section_one', 'License', array(
            $this,
            'section_callback'
        ) , 'exly-wp-options');
        
    }

    /**
     * Callback for each section
     *
     * @since    1.0.1
     */
    public function section_callback($arguments)
    {
        switch ($arguments['id'])
        {
            case 'section_one':
                echo esc_html('Your license key provides access to updates and support.');
            break;
                
        }
    }

    /**
     * Field Configuration, each item in this array is one field/setting we want to capture
     *
     * @since    1.0.1
     */
    public function setup_fields()
    {
        $fields = array(

            array(
                'uid' => 'wp_exly_license_key',
                'label' => 'License Key',
                'section' => 'section_one',
                'type' => 'text',
                'placeholder' => 'Paste license key here',
                'helper' => '',
                'description' => '',
                'default' => "",
            ) ,

        );
        // Lets go through each field in the array and set it up
        foreach ($fields as $field)
        {
            add_settings_field($field['uid'], $field['label'], array(
                $this,
                'field_callback'
            ) , 'exly-wp-options', $field['section'], $field);
            register_setting('exly-wp-options', $field['uid']);
        }
    }

    /**
     * This handles all types of fields for the settings
     *
     * @since    1.0.1
     */
    public function field_callback($arguments)
    {
        // Set our $value to that of whats in the DB
        $value = get_option($arguments['uid']);
        // Only set it to default if we get no value from the DB and a default for the field has been set
        if (!$value)
        {
            $value = $arguments['default'];
        }
        // Lets do some setup based ont he type of element we are trying to display.
        switch ($arguments['type'])
        {
            case 'text':
                if ($arguments['uid'] == 'wp_exly_license_key'):

                    do_action('before_license_key_content');
                    $ajax_nonce = wp_create_nonce("wp-exely-license-key");
                    printf('<p><input name="%1$s" id="%1$s" type="password" placeholder="%3$s" value="%4$s" /><input type="hidden" id="nounceKey" name="nounce" value="' . $ajax_nonce . '"><button class="button" id="validateKey" type="button">Validate</button>
   </p>', $arguments['uid'], $arguments['type'], $arguments['placeholder'], $value);

                    do_action('after_license_key_content');

                endif;
            break;

        }
        // If there is helper text, lets show it.
        if (array_key_exists('helper', $arguments) && $helper = $arguments['helper'])
        {
            printf('<span class="helper"> %s</span>', $helper);
        }
        // If there is supplemental text lets show it.
        if (array_key_exists('description', $arguments) && $description = $arguments['description'])
        {
            printf('<p class="description">%s</p>', $description);
        }
    }

    /**
     * Admin Notice
     *
     * This displays the notice in the admin page for the user
     *
     * @since    1.0.1
     */
    public function admin_notice($message)
    {

        if (empty($message))
        {
            $className = 'notice-error';
            $content = __('Please enter your Exly WP license key!', 'exly-wp');
        }
?>	
             <div class="notice <?php echo esc_html($className); ?> is-dismissible">
                 <p><?php echo esc_html($content); ?></p>
                  </div>
<?php
    }
    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.1
     */
    public function enqueue_styles()
    {
        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Exly_WP_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Exly_WP_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/exly-wp-admin.css', array() , $this->version, 'all');
    }
    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.1
     */
    public function enqueue_scripts()
    {
        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Exly_WP_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Exly_WP_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/exly-wp-admin.js', array(
            'jquery'
        ) , $this->version, false);
        //wp_localize_script('mylib', 'WPURLS', array( 'siteurl' => get_option('siteurl') ));
        wp_add_inline_script($this->plugin_name, 'const WPEXLY = ' . json_encode(array(
            'loading_url' => admin_url('images/loading.gif') ,
        )) , 'before');
    }
}

// Register the setting and add the settings section and field
add_action('admin_init', 'my_plugin_register_settings');

function my_plugin_register_settings() {
    // Register the custom field setting
    register_setting('my_plugin_settings_group', 'custom_field');

    // Add the section where your field will appear
    add_settings_section(
        'my_plugin_section',                 // Section ID
        'Settings',                 // Section Title
        'my_plugin_section_callback',        // Callback function for section description
        'my_plugin_settings_page'            // Page slug where the section will appear
    );

    // Add the field to the section
    add_settings_field(
        'custom_field',                      // Field ID
        'Custom Domain',                      // Field Title
        'display_custom_field',              // Callback to display the field
        'my_plugin_settings_page',           // Page slug where the field will appear
        'my_plugin_section'                  // Section ID where the field will appear
    );
}

// Section callback (can be empty or with a description)
function my_plugin_section_callback() {
    echo '<p>The Custom Domain must be linked with your Exly account via the integrations page</p>';
}

// Display the custom field
function display_custom_field() {
    $customField = get_option('custom_field');
    echo "<span class='prefix'>https:// </span><input type='text' name='custom_field' id='customFieldUrl' placeholder='Enter your domain' value='" . esc_attr($customField) . "' />";
    echo "<p class='error-message' id='urlError'>Please do not include <b>https://</b> or <b>http://</b>.</p>";
    
}