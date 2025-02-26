<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       whitelabelcoders.com
 * @since      1.0.0
 *
 * @package    Wp_Screens
 * @subpackage Wp_Screens/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_Screens
 * @subpackage Wp_Screens/admin
 * @author     wpscreens <pfober@whitelabelcoders.com>
 */
class Wpscrn_Wp_Screens_Admin
{

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version = $version;
        add_action('admin_head', array($this, 'wpscrn_add_custom_button_increaselimit'));
    }
    public function wpscrn_add_custom_button_increaselimit()
    {
        global $post_type;

        if ($post_type == 'displays') {
            $wpscreens_licence = get_option('wpscreens_licence');
            if (!empty($wpscreens_licence)) {
?>
<script>
jQuery(document).ready(function() {

    jQuery(".wrap h1").append(
        "<h1 class='wp-heading-inline'><a href='<?php echo 'https://wpscreens.com/product/wpscreens-add-on'; ?>' class='page-title-action' target=_blank>Increase Limit Add-On</a>"
    );
});
</script>
<?php
            }
        }
    }
    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function wpscrn_enqueue_styles()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Wp_Screens_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Wp_Screens_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/wp-screens-admin.css', array(), $this->version, 'all');
    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function wpscrn_enqueue_scripts()
    {

        /**
     * This function is provided for demonstration purposes only.
     *
     * An instance of this class should be passed to the run() function
     * defined in Wp_Screens_Loader as all of the hooks are defined
     * in that particular class.
     *
     * The Wp_Screens_Loader will then create the relationship
     * between the defined hooks and the functions defined in this
     * class.
     */

    // Deregister WordPress jQuery and add jQuery from a CDN
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://code.jquery.com/jquery-3.6.0.min.js', false, '3.6.0', true);
    wp_enqueue_script('jquery');

    $time = time();

    // Enqueue your plugin's admin script with cache-busting parameter
    wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/wp-screens-admin.js', array('jquery'), $this->version . '-' . $time, false);
    }

    public function wpscrn_limit_wpscreens()
    {   
        global $typenow;

        # Not our post type, bail out
        if ('displays' !== $typenow) {
            return;
        }

        $wpscreens_valid_licance = get_option('wpscreens_valid_licance');
        $wp_screens_addon_valid_licence = get_option('wpscreens_valid_licence_addon');
        // echo "<pre>";
        // print_r($wp_screens_addon_valid_licence);
        // echo "</pre>";
        
       // $getExtrascreen = get_option('wpscreen_custom_define');
       $getExtrascreen = '';
        $getExtrascreens = 0;$total_screens=0;
        if (is_numeric($getExtrascreen))
           $getExtrascreens = $getExtrascreen;
        
        if ('1' === $wpscreens_valid_licance) {
            $total_screens = (20 + $getExtrascreens);
        } elseif ('2' === $wpscreens_valid_licance) {
            $total_screens = (30 + $getExtrascreens);
        }else {
            $total_screens = (10 + $getExtrascreens);
        }
        if('3' === $wp_screens_addon_valid_licence ){
            $validaddonif = get_option( 'addon_increment_valid' );
            $countaddon=1;
            if(is_array($validaddonif) && count($validaddonif)>0)
            $countaddon=count(array_unique($validaddonif));
            $total_screens = ((25*$countaddon) + $total_screens);
           
        }
       
        # Grab all our CPT, adjust the status as needed
        $total = get_posts(
            array(
                'post_type' => 'displays',
                'numberposts' => -1,
                'post_status' => 'publish,future,draft,trash',
            )
        );
      
  
        if ($total && count($total) >= $total_screens) {
            if('3' === $wp_screens_addon_valid_licence){
                wp_die(
                    'Sorry, maximum number of WP Slides reached.<a href ="https://wpscreens.com/product/wpscreens-add-on/" target="_blank">Increase the limit</a>',
                    'Maximum reached',
                    array(
                        'response' => 500,
                        'back_link' => true,
                    )
                );
            }
            else{
                wp_die(
                    'Sorry, maximum number of WP Slides reached.<a href ="https://wpscreens.com/product/wpscreens-add-on/" target="_blank">Increase the limit</a>',
                    'Maximum reached',
                    array(
                        'response' => 500,
                        'back_link' => true,
                    )
                );
        }
            
        }
    }

    function wpscrn_wpscreens_register_settings()
    {
        add_option('wpscreens_option_name', 'This is my option value.');
        register_setting('wpscreens_options_group', 'wpscreens_licence', 'wpscreens_callback');
        register_setting('wpscreens_options_group', 'wpscreen_addon_licence', 'wpscreens_callback');
        //register_setting('wpscreens_options_group', 'wpscreen_addon_licence_valid', 'wpscreens_callback');
    }

    public function wpscrn_wpscreens_register_options_page()
    {
        add_options_page('WP Screens', 'WP Screens', 'manage_options', 'wpscreens', array($this, 'wpscrn_wpscreens_options_page'));
        add_submenu_page('edit.php?post_type=displays', __('New WPSplitscreen', 'wpscreens'), __('New WPSplitscreen', 'wpscreens'), 'manage_options', 'post-new.php?post_type=split_displays');
    }
    public function wpscrn_check_wpscreens_licence_addon()
    {
        $wpscreens_valid_licance = get_option('wpscreens_valid_licence_addon');
      
    
        if ('3' == $wpscreens_valid_licance) {
            $today = gmdate('Y-m-d');
            $last_updated = get_option('wpscreens_last_update_addon');

            if ($last_updated === $today) {
               return;
            } else {
                $this->wpscrn_check_if_wpscreens_licence_addon_is_active();
                update_option('wpscreens_last_update_addon', $today);
               return;
            }
        }
      
    }
    public function wpscrn_check_wpscreens_licence()
    {
        $wpscreens_valid_licance = get_option('wpscreens_valid_licance');
        
        // $request_uri = "https://wpscreens.com/wp-json/upgradescreens/v1/upgrade/" . get_option('wpscreens_licence');
        // $data = wp_remote_get($request_uri);

        // $data_body = json_decode($data['body']);
        // if (!is_null($data_body)) {
        //     $getExtrascreen = get_option('wpscreen_custom_define');
        //     $getExtrascreens = 0;
        //     if (is_numeric($getExtrascreen))
        //         $getExtrascreens = $getExtrascreen;
        //     $wp_screens = 0;

        //     if (is_numeric($data_body->post_content)) {
        //         $wp_screens = $data_body->post_content;
        //         update_option('wpscreen_custom_define', ($getExtrascreens + $wp_screens));
        //     }
        // }
        if ('1' === $wpscreens_valid_licance || '2' == $wpscreens_valid_licance) {
            $today = gmdate('Y-m-d');
            $last_updated = get_option('wpscreens_last_update');

            if ($last_updated === $today) {
                return;
            } else {
                $this->wpscrn_check_if_wpscreens_licence_is_active();
                update_option('wpscreens_last_update', $today);
                return;
            }
        }
      
    }
    public function wpscrn_check_if_wpscreens_licence_addon_is_active() {
        // Get the license from options
        $wpscreens_licence = get_option('wpscreen_addon_licence');
    
        // Extracting type from the license
        $type = explode('-', esc_html($wpscreens_licence));
    
        if ('Ad' === $type[0] || 'AD' === $type[0]) {
            $licence_val = 3;
        } else {
            // You might want to handle other types here
            $licence_val = 0; // Default value if not 'Ad'
        }
    
        // Determine the protocol (http or https)
        $protocol = ('off' !== !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] || 443 == $_SERVER['SERVER_PORT']) ? 'https://' : 'http://';
        define('WPSCRN_SL_INSTANCE', str_replace($protocol, '', get_bloginfo('wpurl')));
    
        // Prepare the request URI
        $request_uri = "https://wpscreens.com/?woo_sl_action=activate&licence_key=" . $wpscreens_licence . "&product_unique_id=WPS-ADDON-20&domain=" . str_replace($protocol, '', get_bloginfo('wpurl'));
    
        // Make the remote request
        $data = wp_remote_get($request_uri);
    
        // Check for errors in the request
        if (is_wp_error($data)) {
            // Log the error message
            error_log('WP Remote Get Error: ' . $data->get_error_message());
            return; // Exit the function on error
        }
    
        // Decode the response body
        $data_body = json_decode($data['body']);
    
        // Check the response for status
        if (isset($data_body[0]->status)) {
            if ('success' == $data_body[0]->status) {
                // License is valid
                update_option('wpscreens_valid_licence_addon', $licence_val);
                update_option('wpscreens_valid_licence_message_addon', $data_body[0]->message);
            } else {
                // License is not valid
                update_option('wpscreens_valid_licence_addon', '0');
                update_option('wpscreens_valid_licence_message_addon', $data_body[0]->message);
            }
        } else {
            // Handle cases where status is not set
            error_log('Invalid response structure: ' . print_r($data_body, true));
        }
    }
    
    public function wpscrn_check_if_wpscreens_licence_is_active()
    {

        $wpscreens_licence = get_option('wpscreens_licence');

        $type = explode('-', esc_html($wpscreens_licence));

        if ('Pr' === $type[0] || 'PR' === $type[0]) {
            define('WPSCRN_SL_PRODUCT_ID', 'WPS-Pro-20');
            $licence_val = 1;
        }

        if ('CL' === $type[0] || 'Cl' === $type[0]) {
            define('WPSCRN_SL_PRODUCT_ID', 'WPS-Clo-20');
            $licence_val = 2;
        }

        define('WPSCRN_SL_APP_API_URL', 'https://wpscreens.com/index.php');

        $protocol = ('off' !== !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] || 443 == $_SERVER['SERVER_PORT']) ? 'https://' : 'http://';
        define('WPSCRN_SL_INSTANCE', str_replace($protocol, '', get_bloginfo('wpurl')));

        $args = array(
            'woo_sl_action' => 'status-check',
            'licence_key' => $wpscreens_licence,
            'product_unique_id' => WPSCRN_SL_PRODUCT_ID,
            'domain' => WPSCRN_SL_INSTANCE,
        );
        $request_uri = WPSCRN_SL_APP_API_URL . '?' . http_build_query($args);
        $data = wp_remote_get($request_uri);

        $data_body = json_decode($data['body']);

        if (isset($data_body[0]->status)) {

            if (('success' == $data_body[0]->status)) {
                update_option('wpscreens_valid_licance', $licence_val);
                update_option('wpscreens_valid_licance_message', $data_body[0]->message);
            } else {
                update_option('wpscreens_valid_licance', '0');
                update_option('wpscreens_valid_licance_message', $data_body[0]->message);
            }
        } else {
        }
    }


    public function wpscrn_verify_wpscreens_licence2($key, $new_value)
    {
        // Define a default product ID
        
       

        $type = explode('-', $new_value);
         $licence_id='';
        if ('Pr' === $type[0] || 'PR' === $type[0]) {
          
           $licence_id='WPS-Pro-20';
            $licence_val = 1;
        }

        if ('CL' === $type[0] || 'Cl' === $type[0]) {
            $licence_id='WPS-Clo-20';
           
            $licence_val = 2;
        }

        define('WPSCRN_SL_APP_API_URL', 'https://wpscreens.com/index.php');

        $protocol = ('off' !== !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] || 443 == $_SERVER['SERVER_PORT']) ? 'https://' : 'http://';

        define('WPSCRN_SL_INSTANCE', str_replace($protocol, '', get_bloginfo('wpurl')));

        $args = array(
            'woo_sl_action' => 'activate',
            'licence_key' => esc_html($new_value),
            'product_unique_id' => $licence_id,
            'domain' => WPSCRN_SL_INSTANCE,
        );
        $request_uri = WPSCRN_SL_APP_API_URL . '?' . http_build_query($args);

        $data = wp_remote_get($request_uri);


        $data_body = json_decode($data['body']);


        if (isset($data_body[0]->status)) {

            if (('success' == $data_body[0]->status)) {
                update_option('wpscreens_valid_licance', $licence_val);
                update_option('wpscreens_valid_licance_message', $data_body[0]->message);
            } else {
                update_option('wpscreens_valid_licance', '0');
                update_option('wpscreens_valid_licance_message', $data_body[0]->message);
            }
        } else {

            //update_option( 'wpscreens_valid_licance', '0' );
        }
    }


    public function wpscrn_verify_wpscreens_licence($old_value, $new_value)
    {
        // print_r($_POST);

        if ($old_value !== $new_value) {
            $type = explode('-', $new_value);

            // Validate array and index before accessing
            if (isset($type[0])) {
                if ('Pr' === $type[0] || 'PR' === $type[0]) {
                    define('WPSCRN_SL_PRODUCT_ID', 'WPS-Pro-20');
                    $licence_val = 1;
                } elseif ('CL' === $type[0] || 'Cl' === $type[0]) {
                    define('WPSCRN_SL_PRODUCT_ID', 'WPS-Clo-20');
                    $licence_val = 2;
                } else {
                    // Handle invalid type
                    return;
                }

                define('WPSCRN_SL_APP_API_URL', 'https://wpscreens.com/index.php');
                $protocol = ('off' !== !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] || 443 == $_SERVER['SERVER_PORT']) ? 'https://' : 'http://';
                define('WPSCRN_SL_INSTANCE', str_replace($protocol, '', get_bloginfo('wpurl')));

                $args = array(
                    'woo_sl_action' => 'activate',
                    'licence_key' => esc_html($new_value),
                    'product_unique_id' => WPSCRN_SL_PRODUCT_ID,
                    'domain' => WPSCRN_SL_INSTANCE,
                );
                $request_uri = WPSCRN_SL_APP_API_URL . '?' . http_build_query($args);


                $data = wp_remote_get($request_uri);

                // Check for WP_Error
                if (is_wp_error($data)) {
                    // Handle WP Error
                    return;
                }

                $data_body = json_decode(wp_remote_retrieve_body($data));
                //  var_dump($data_body);
                //  die;
                if (isset($data_body[0]->status)) {
                    if ('success' == $data_body[0]->status) {
                        update_option('wpscreens_valid_licance', $licence_val);
                        update_option('wpscreens_valid_licance_message', $data_body[0]->message);
                    } else {
                        update_option('wpscreens_valid_licance', '0');
                        update_option('wpscreens_valid_licance_message', $data_body[0]->message);
                    }
                } else {
                    // Update option if status is not set
                    update_option('wpscreens_valid_licance', '0');
                }
            }
        }
    }

    // addon licence key ****************************************************************

    public function wpscrn_verify_wpscreens_licence_addon($old_value, $new_value)
    {

        if ($old_value !== $new_value) {
            $type = explode('-', $new_value);

            // Validate array and index before accessing
            if (isset($type[0])) {
                if ('Ad' === $type[0] || 'AD' === $type[0]) {
                    define('WPSCRN_AD_PRODUCT_ID', 'WPS-ADDON-20');
                    $licence_val = 3;
                }

                // define('WPSCRN_SL_APP_API_URL', 'https://wpscreens.com/index.php');
                $protocol = ('off' !== !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] || 443 == $_SERVER['SERVER_PORT']) ? 'https://' : 'http://';
                define('WPSCRN_SL_INSTANCE', str_replace($protocol, '', get_bloginfo('wpurl')));

                // $args = array(
                //     'woo_ad_action' => 'activate',
                //     'licence_key' => esc_html($new_value),
                //     'product_unique_id' => WPSCRN_AD_PRODUCT_ID,
                //     'domain' => WPSCRN_SL_INSTANCE,
                // );

                $request_uri = "https://wpscreens.com/?woo_sl_action=activate&licence_key=" . esc_html($new_value) . "&product_unique_id=WPS-ADDON-20&domain=" . str_replace($protocol, '', get_bloginfo('wpurl'));



                $data = wp_remote_get($request_uri);

                // Check for WP_Error
                if (is_wp_error($data)) {
                    // Handle WP Error
                    return;
                }

                $data_body = json_decode(wp_remote_retrieve_body($data));
                // print_r($data_body);
                // die;
                if (isset($data_body[0]->status)) {
                    if ('success' == $data_body[0]->status) {
                        $validaddonif = get_option( 'addon_increment_valid' );
                        if(is_array($validaddonif))
                        {
                            $validaddonif[]=$new_value;
                            update_option('addon_increment_valid',$validaddonif);
                        }else
                        {
                            update_option('addon_increment_valid',array($new_value));
                        }
                        update_option('wpscreens_valid_licence_addon', $licence_val);
                        update_option('wpscreens_valid_licence_message_addon', $data_body[0]->message);
                    } else {
                        update_option('wpscreens_valid_licence_addon', '0');
                        update_option('wpscreens_valid_licence_message_addon', $data_body[0]->message);
                    }
                } else {
                    // Update option if status is not set
                    update_option('wpscreens_valid_licence_addon', '0');
                }
            }
        }
    }
    public function wpscrn_verify_wpscreens_licence_addon_add($key, $new_value)
    {
      
        // Define a default product ID
        // Define a default product ID
       

        $type = explode('-', $new_value);

        if ('Ad' === $type[0] || 'AD' === $type[0]) {
            define('WPSCRN_AD_PRODUCT_ID', 'WPS-ADDON-20');
            $licence_val = 3;
        }

        //define('WPSCRN_SL_APP_API_URL', 'https://wpscreens.com/index.php');

        $protocol = ('off' !== !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] || 443 == $_SERVER['SERVER_PORT']) ? 'https://' : 'http://';
        define('WPSCRN_SL_INSTANCE', str_replace($protocol, '', get_bloginfo('wpurl')));

        // $args = array(
        //     'woo_sl_action' => 'activate',
        //     'licence_key' => esc_html($new_value),
        //     'product_unique_id' => WPSCRN_AD_PRODUCT_ID,
        //     'domain' => WPSCRN_SL_INSTANCE,
        // );
        $request_uri = "https://wpscreens.com/?woo_sl_action=activate&licence_key=" . esc_html($new_value) . "&product_unique_id=WPS-ADDON-20&domain=" . str_replace($protocol, '', get_bloginfo('wpurl'));

        $data = wp_remote_get($request_uri);

        // Check for WP_Error
        if (is_wp_error($data)) {
            // Handle WP Error
            return;
        }

        $data_body = json_decode(wp_remote_retrieve_body($data));

        if (isset($data_body[0]->status)) {
            if ('success' == $data_body[0]->status) {
                $validaddonif = get_option( 'addon_increment_valid' );
                if(is_array($validaddonif))
                {
                    $validaddonif[]=$new_value;
                    update_option('addon_increment_valid',$validaddonif);
                }else
                {
                    update_option('addon_increment_valid',array($new_value));
                }
                update_option('wpscreens_valid_licence_addon', $licence_val);
                update_option('wpscreens_valid_licence_message_addon', $data_body[0]->message);
            } else {
                update_option('wpscreens_valid_licence_addon', '0');
                update_option('wpscreens_valid_licence_message_addon', $data_body[0]->message);
            }
        } else {
            // Update option if status is not set
            update_option('wpscreens_valid_licence_addon', '0');
        }
    }


    public function wpscrn_wpscreens_options_page()
    {
        ?>
<div>
    <?php screen_icon();

            ?>
    <h1><?php echo __('WP Screens', 'wpscreens'); ?></h1>
    <form method="post" action="options.php">
        <?php settings_fields('wpscreens_options_group'); ?>
        <p><?php echo __('The easy way to display your favorite slider on every screen.', 'wpscreens'); ?><br /><a
                href="https://wpscreens.com/" target="_blank"><?php echo __('visit our store', 'wpscreens'); ?></a></p>
        <table class="wpscr_wpscreens-options">
            <tr>
                <td><label for="wpscreens_licence"><?php echo __('Licence Key', 'wpscreens'); ?>(Please add Pro and
                        Cloud license key here start with Pr- or CL-)</label></td>
                <td><input type="text" id="wpscreens_licence" pattern="^(CL-|PR-|Pr-|Cl-).*$" name="wpscreens_licence"
                        value="<?php echo esc_html(get_option('wpscreens_licence')); ?>" /></td>
            </tr>
            <td><label for="wpscreens_licence"><?php echo __('Valid?', 'wpscreens'); ?></label></td>
            <td>
                <?php

                        $wpscreens_valid_licance = get_option('wpscreens_valid_licance');
                        $wpscreens_valid_licance_message = get_option('wpscreens_valid_licance_message');
                        if ('1' === $wpscreens_valid_licance) {
                            echo '<div class="valid"></div> <h3 class="licence-type">Version Pro</h3>';
                        } elseif ('2' === $wpscreens_valid_licance) {
                            echo '<div class="valid"></div> <h3 class="licence-type">Version Cloud</h3>';
                        } else {
                            echo '<div class="not-valid"></div>';
                        }

                        echo '<div class="licence-meaasge">' . esc_html($wpscreens_valid_licance_message) . '</div>';
                        ?>
            </td>
            </tr>
            <tr>
                <td><label for="wp_screen_addon"><?php echo __('Addon Licence Key', 'wpscreens'); ?>(Please add Add on
                        license key here start with Ad-)</label></td>
                <td><input type="text" id="wp_screens_licence" name="wpscreen_addon_licence" pattern="^Ad-.*$"
                        value="<?php echo esc_html(get_option('wpscreen_addon_licence')); ?>"></td>

            </tr>
            <tr>
                <td><label for="wpscreens_licence"><?php echo __('Valid Addon Key', 'wpscreens'); ?></label></td>
                <td>
                    <?php
                            $wpscreens_addon_licence = get_option('wpscreens_valid_licence_addon');

                            //var_dump($wpscreens_addon_licence);
                            if ('3' === $wpscreens_addon_licence) {
                                echo '<div class="valid"></div> <h3 class="licence-type">Addon Licence Key</h3>';
                            } else {
                                echo '<div class="not-valid"></div>';
                            }
                            //echo '<div class="licence-meaasge">' . esc_html($wpscreens_valid_licance_message) . '</div>';
                            ?>
                </td>
            </tr>
        </table>
        <?php submit_button(); ?>
    </form>
</div>
<?php
    }

    public function wpscrn_custom_meta_box_markup($object)
    {
        wp_nonce_field(basename(__FILE__), 'meta-box-nonce');
    ?>
<div>
    <?php
            $slider_type = get_post_meta($object->ID, 'slider_type', true);

            if (!empty($slider_type)) {
                echo '<span class="saved-slider" id=' . esc_html($slider_type) . '></span>';
            }
            $SliderArray = array("smart-slider" => "Smart Slider", "layer-slider" => "LayerSlider WP", "revolution-slider" => "Revolution Slider", "depicter-slider" => "Depicter (Free) Slider");
            ?>
    <select id="slect-slider-type" name="slider_type" class="wpscr_slect-slider-type">
        <option value=""><?php echo __('Select Slider', 'wpscreens'); ?></option>
        <?php
                foreach ($SliderArray as $key => $value) {
                    $check = (esc_html($slider_type) == $key) ? 'selected' : '';
                ?>
        <option <?php echo $check; ?> value="<?php echo $key; ?>"><?php echo __($value, 'wpscreens'); ?></option>
        <?php } ?>
        </option>
    </select>
    <div id="smart-slider" class="wpscr_slider-wrapper">
        <?php echo $this->wpscrn_load_smart_slider($object->ID); ?>
    </div>
    <div id="layer-slider" class="wpscr_slider-wrapper">
        <?php echo $this->wpscrn_load_layerslider($object->ID); ?>
    </div>
    <div id="revolution-slider" class="wpscr_slider-wrapper">
        <?php echo $this->wpscrn_load_revslider($object->ID); ?>
    </div>
    <div id="depicter-slider" class="wpscr_slider-wrapper">
        <?php echo $this->wpscrn_load_depicterslider($object->ID); ?>
    </div>
</div>
<?php
      $wpscreens_valid_licance = get_option('wpscreens_valid_licance');
        $wpscreens_valid_licance_message = get_option('wpscreens_valid_licance_message');

        if ('1' === $wpscreens_valid_licance || '2' === $wpscreens_valid_licance || '3' === $wpscreens_valid_licance_message) {
            
        } else {
            ?>
<div>
    <a href="https://wpscreens.com/" target="_blank">

        <img src="<?php echo plugin_dir_url(basename(__FILE__)); ?>wpscreens/assets/pro.png"
            style="width: 100%; height: auto; margin-top: 50px;" alt="<?php echo __('WP Screens', 'wpscreens'); ?>">
    </a>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
jQuery(document).ready(function() {
    $(".wpscr_slider-wrapper").hide();
    jQuery('#slect-slider-type').on('change', function() {
        var slider = jQuery(this).find(":selected").val();
        if (slider) {
            jQuery('.wpscr_slider-wrapper').hide();
            jQuery('.wpscr_slider-wrapper#' + slider).show();
        }
    });

    var savedSlider = jQuery('.saved-slider').attr('id');
    if (savedSlider) {
        jQuery('.wpscr_slider-wrapper#' + savedSlider).show();
    }
});
</script>
<?php } ?>
<?php
    }

    public function wpscrn_load_depicterslider($id)
    {

        global $wpdb;
        $sliders = $wpdb->get_results(
            '
			SELECT id, name  
			FROM ' . $wpdb->prefix . 'depicter_documents where parent = 0',
            ARRAY_A
        );
        if (is_array($sliders) && count($sliders) > 0) {
            $sl_select = '<label for="depicter-slider-id">Slider</label>
			<select name="depicter-slider-id">
				<option value="">Select</option>';

            foreach ($sliders as $key => $slider) {
                if (get_post_meta($id, 'depicter-slider-id', true) === $slider['id']) {

                    $sl_select .= '<option selected value="' . $slider['id'] . '">' . $slider['name'] . '(id: ' . $slider['id'] . ')</option>';
                } else {
                    $sl_select .= '<option value="' . $slider['id'] . '">' . $slider['name'] . ' (id: ' . $slider['id'] . ')</option>';
                }
            }
            $sl_select .= '</select>';
        } else {
            $sl_select = 'No slider!';
        }

        //var_dump($sl_select);

        return $sl_select;
    }

    public function wpscrn_load_layerslider($id)
    {

        global $wpdb;
        $sliders = $wpdb->get_results(
            '
			SELECT id, name as title  
			FROM ' . $wpdb->prefix . 'layerslider
			
			',
            ARRAY_A
        );
        if (is_array($sliders) && count($sliders) > 0) {
            $sl_select = '<label for="layer-slider-id">Slider</label>
			<select name="layer-slider-id">
				<option value="">Select</option>';

            foreach ($sliders as $key => $slider) {
                if (get_post_meta($id, 'layer-slider-id', true) === $slider['id']) {

                    $sl_select .= '<option selected value="' . $slider['id'] . '">' . $slider['title'] . '(id: ' . $slider['id'] . ')</option>';
                } else {
                    $sl_select .= '<option value="' . $slider['id'] . '">' . $slider['title'] . ' (id: ' . $slider['id'] . ')</option>';
                }
            }
            $sl_select .= '</select>';
        } else {
            $sl_select = 'No slider!';
        }

        //var_dump($sl_select);

        return $sl_select;
    }

    public function wpscrn_load_revslider($id)
    {

        global $wpdb;
        $sliders = $wpdb->get_results(
            '
			SELECT alias as id, title  
			FROM ' . $wpdb->prefix . 'revslider_sliders
			
			',
            ARRAY_A
        );
        if (is_array($sliders) && count($sliders) > 0) {
            $sl_select = '<label for="rev-slider-id">Slider</label>
			<select name="rev-slider-id">
				<option value="">Select</option>';

            foreach ($sliders as $key => $slider) {
                if (get_post_meta($id, 'rev-slider-id', true) === $slider['id']) {

                    $sl_select .= '<option selected value="' . $slider['id'] . '">' . $slider['title'] . '(id: ' . $slider['id'] . ')</option>';
                } else {
                    $sl_select .= '<option value="' . $slider['id'] . '">' . $slider['title'] . ' (id: ' . $slider['id'] . ')</option>';
                }
            }
            $sl_select .= '</select>';
        } else {
            $sl_select = 'No slider!';
        }

        //var_dump($sl_select);

        return $sl_select;
    }

    public function wpscrn_load_smart_slider($id)
    {

        global $wpdb;
        $sliders = $wpdb->get_results(
            '
			SELECT id, title  
			FROM ' . $wpdb->prefix . 'nextend2_smartslider3_sliders
			
			',
            ARRAY_A
        );
        if (is_array($sliders) && count($sliders) > 0) {
            $sl_select = '<label for="smart-slider-id">Slider</label>
			<select name="smart-slider-id">
				<option value="">Select</option>';

            foreach ($sliders as $key => $slider) {
                if (get_post_meta($id, 'smart-slider-id', true) === $slider['id']) {

                    $sl_select .= '<option selected value="' . $slider['id'] . '">' . $slider['title'] . '(id: ' . $slider['id'] . ')</option>';
                } else {
                    $sl_select .= '<option value="' . $slider['id'] . '">' . $slider['title'] . ' (id: ' . $slider['id'] . ')</option>';
                }
            }
            $sl_select .= '</select>';
        } else {
            $sl_select = 'No slider!';
        }

        //var_dump($sl_select);

        return $sl_select;
    }

    public function wpscrn_add_custom_meta_box()
    {

        add_meta_box('wpscrn-wp-screens-box', 'Slider', array($this, 'wpscrn_custom_meta_box_markup'), 'displays', 'normal', 'high', null);
    }

    public function wpscrn_save_custom_meta_box($post_id)
    {

        $smart_slider_id_value = '';

        if (isset($_POST['smart-slider-id'])) {
            $smart_slider_id_value = sanitize_text_field($_POST['smart-slider-id']);
            update_post_meta($post_id, 'smart-slider-id', $smart_slider_id_value);
        }

        if (isset($_POST['rev-slider-id'])) {
            $smart_slider_id_value = sanitize_text_field($_POST['rev-slider-id']);
            update_post_meta($post_id, 'rev-slider-id', $smart_slider_id_value);
        }

        if (isset($_POST['layer-slider-id'])) {
            $smart_slider_id_value = sanitize_text_field($_POST['layer-slider-id']);
            update_post_meta($post_id, 'layer-slider-id', $smart_slider_id_value);
        }

        if (isset($_POST['depicter-slider-id'])) {
            $smart_slider_id_value = sanitize_text_field($_POST['depicter-slider-id']);
            update_post_meta($post_id, 'depicter-slider-id', $smart_slider_id_value);
        }

        if (isset($_POST['slider_type'])) {
            $smart_slider_id_value = sanitize_text_field($_POST['slider_type']);
            update_post_meta($post_id, 'slider_type', $smart_slider_id_value);
        }
    }

    public function wpscrn_cpt_displays()
    {
        $labels = array(
            'name' => _x('WPScreens', 'Post Type General Name', 'wpscreens'),
            'singular_name' => _x('WPScreen', 'Post Type Singular Name', 'wpscreens'),
            'menu_name' => __('WPScreens', 'wpscreens'),
            'name_admin_bar' => __('WPScreens', 'wpscreens'),
            'archives' => __('Item', 'wpscreens'),
            'attributes' => __('Item', 'wpscreens'),
            'parent_item_colon' => __('Parent Item:', 'wpscreens'),
            'all_items' => __('All WPScreens', 'wpscreens'),
            'add_new_item' => __('New WPScreen', 'wpscreens'),
            'add_new' => __('New WPScreen', 'wpscreens'),
            'new_item' => __('New WPScreen', 'wpscreens'),
            'edit_item' => __('Edit Item', 'wpscreens'),
            'update_item' => __('Update Item', 'wpscreens'),
            'view_item' => __('View Item', 'wpscreens'),
            'view_items' => __('View Items', 'wpscreens'),
            'search_items' => __('Search Item', 'wpscreens'),
            'not_found' => __('Not found', 'wpscreens'),
            'not_found_in_trash' => __('Not found in Trash', 'wpscreens'),
            'featured_image' => __('Featured Image', 'wpscreens'),
            'set_featured_image' => __('Set featured image', 'wpscreens'),
            'remove_featured_image' => __('Remove featured image', 'wpscreens'),
            'use_featured_image' => __('Use as featured image', 'wpscreens'),
            'insert_into_item' => __('Insert into item', 'wpscreens'),
            'uploaded_to_this_item' => __('Uploaded to this item', 'wpscreens'),
            'items_list' => __('Items list', 'wpscreens'),
            'items_list_navigation' => __('Items list navigation', 'wpscreens'),
            'filter_items_list' => __('Filter items list', 'wpscreens'),
        );
        $args = array(
            'label' => __('WPScreens', 'wpscreens'),
            'description' => __('WPScreens', 'wpscreens'),
            'labels' => $labels,
            'supports' => array('title'),
            'hierarchical' => true,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 5,
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'can_export' => true,
            'has_archive' => true,
            'exclude_from_search' => false,
            'publicly_queryable' => true,
            'capability_type' => 'page',
            'show_in_rest' => false,
            'rewrite' => array('slug' => 'wpscreens'),
            'orderby' => 'menu_order',
            'order' => 'ASC',
            'menu_icon' => 'dashicons-money',
        );
        register_post_type('displays', $args);
        $labels_new = array(
            'name' => _x('WPSplitscreens', 'Post Type General Name', 'wpscreens'),
            'singular_name' => _x('WPSplitscreen', 'Post Type Singular Name', 'wpscreens'),
            'menu_name' => __('WPSplitscreens', 'wpscreens'),
            'name_admin_bar' => __('WPSplitscreens', 'wpscreens'),
            'archives' => __('WPSplitscreens item', 'wpscreens'),
            'attributes' => __('WPSplitscreens item', 'wpscreens'),
            'parent_item_colon' => __('Parent Item:', 'wpscreens'),
            'all_items' => __('All WPSplitscreens', 'wpscreens'),
            'add_new_item' => __('New WPSplitscreen', 'wpscreens'),
            'add_new' => __('New WPSplitscreen', 'wpscreens'),
            'new_item' => __('New WPSplitscreen', 'wpscreens'),
            'edit_item' => __('Edit WPSplitscreen Item', 'wpscreens'),
            'update_item' => __('Update WPSplitscreen Item', 'wpscreens'),
            'view_item' => __('View WPSplitscreen Item', 'wpscreens'),
            'view_items' => __('View WPSplitscreen Items', 'wpscreens'),
            'search_items' => __('Search WPSplitscreen Item', 'wpscreens'),
            'not_found' => __('Not found', 'wpscreens'),
            'not_found_in_trash' => __('Not found in Trash', 'wpscreens'),
            'featured_image' => __('Featured Image', 'wpscreens'),
            'set_featured_image' => __('Set featured image', 'wpscreens'),
            'remove_featured_image' => __('Remove featured image', 'wpscreens'),
            'use_featured_image' => __('Use as featured image', 'wpscreens'),
            'insert_into_item' => __('Insert into item', 'wpscreens'),
            'uploaded_to_this_item' => __('Uploaded to this item', 'wpscreens'),
            'items_list' => __('Items list', 'wpscreens'),
            'items_list_navigation' => __('Items list navigation', 'wpscreens'),
            'filter_items_list' => __('Filter items list', 'wpscreens'),
        );
        $args_new = array(
            'label' => __('WPSplitscreens', 'wpscreens'),
            'description' => __('WPSplitscreens', 'wpscreens'),
            'labels' => $labels_new,
            'supports' => array('title'),
            'hierarchical' => true,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => 'edit.php?post_type=displays',
            'menu_position' => 5,
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'can_export' => true,
            'has_archive' => true,
            'exclude_from_search' => false,
            'publicly_queryable' => true,
            'capability_type' => 'page',
            'show_in_rest' => false,
            'rewrite' => array('slug' => 'wpsplitscreens'),
            'orderby' => 'menu_order',
            'order' => 'ASC',
            'menu_icon' => 'dashicons-money',
        );
        register_post_type('split_displays', $args_new);
    }
}

if (function_exists('acf_add_local_field_group')) :

    acf_add_local_field_group(array(
        'key' => 'group_645498b7ac4fc',
        'title' => 'WPSplitscreen partition',
        'fields' => array(
            array(
                'key' => 'field_645499259179a',
                'label' => 'WPSplitscreen partition 1',
                'name' => 'wpsplitscreen_partition_1',
                'type' => 'post_object',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => 'wpSplitScreenPartition1',
                    'id' => '',
                ),
                'post_type' => array(
                    0 => 'displays',
                ),
                'taxonomy' => '',
                'allow_null' => 0,
                'multiple' => 0,
                'return_format' => 'id',
                'ui' => 1,
            ),
            array(
                'key' => 'field_645499de7fed0',
                'label' => 'WPSplitscreen partition 2',
                'name' => 'wpsplitscreen_partition_2',
                'type' => 'post_object',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => 'wpSplitScreenPartition2',
                    'id' => '',
                ),
                'post_type' => array(
                    0 => 'displays',
                ),
                'taxonomy' => '',
                'allow_null' => 0,
                'multiple' => 0,
                'return_format' => 'id',
                'ui' => 1,
            ),
            array(
                'key' => 'field_645499e47fed1',
                'label' => 'Splitscreen',
                'name' => 'splitscreen',
                'type' => 'radio',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '50',
                    'class' => 'wpSplitScreenType',
                    'id' => '',
                ),
                'choices' => array(
                    'landscape' => 'Landscape',
                    'portrait' => 'Portrait',
                ),
                'allow_null' => 0,
                'other_choice' => 0,
                'default_value' => 'landscape',
                'layout' => 'horizontal',
                'return_format' => 'value',
                'save_other_choice' => 0,
            ),
            array(
                'key' => 'field_64549a5b7fed2',
                'label' => 'Partition',
                'name' => 'partition',
                'type' => 'group',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '50',
                    'class' => 'wpSplitPartition',
                    'id' => '',
                ),
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_64549ad67fed3',
                        'label' => 'Partition 1',
                        'name' => 'partition_1',
                        'type' => 'number',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '50',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => 66,
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '%',
                        'min' => '',
                        'max' => '',
                        'step' => '',
                    ),
                    array(
                        'key' => 'field_64549ae67fed4',
                        'label' => 'Partition 2',
                        'name' => 'partition_2',
                        'type' => 'number',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '50',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => 33,
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '%',
                        'min' => '',
                        'max' => '',
                        'step' => '',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'split_displays',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));

endif;