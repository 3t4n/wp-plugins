<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @since      1.0.0
 * @package    Partnero
 * @subpackage Partnero/admin
 * @author     https://www.partnero.com/
 */

class Partnero_Admin {

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param    string    $plugin_name
     * @param    string    $version
     */
    public function __construct( $plugin_name, $version ) {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles() {
        /**
         * Quick solution to load admin css only for partnero page
         * Make sure to match the page name given in add_menu_page() hook
         */
        if(isset($_GET['page']) && $_GET['page'] == 'partnero-admin'){
            wp_enqueue_style(
                $this->plugin_name,
                plugin_dir_url( __FILE__ ) . 'css/partnero-admin.css',
                array(),
                $this->version,
                'all'
            );

            wp_enqueue_script(
                $this->plugin_name,
                plugin_dir_url( __FILE__ ) . 'js/partnero-admin.js',
                array(),
                $this->version,
                true // Load in the footer
            );
        }

    }

    /**
     * Attaches partnero menu in the sidebar.
     *
     * @since    1.0.0
     */
    public function attach_partnero_menu() {
        add_menu_page(
            'Partnero',                                           // Page title
            'Partnero',                                           // Menu title
            'manage_options',                                     // Capability
            'partnero-admin',                                     // Menu slug
            array($this, 'init_admin_page'),                      // Callback function
            Partnero_Util::get_image_url() . 'menu-icon.png',     // Icon
        );
    }

    /**
     * Handler function for the partnero page in admin.
     *
     * @since    1.0.0
     */
    public function init_admin_page() {
        // Remove partnero settings on program detach button click
        if(
            $_POST
            && array_key_exists( 'program_action', $_POST ) && $_POST['program_action'] === 'detach-program'
            && array_key_exists( 'program_type', $_POST ) && !empty($_POST['program_type'])
        ) {
            if ( in_array($_POST['program_type'], Partnero_Util::ALL_TYPES, true) ) {
                delete_option( Partnero_Util::get_option_key($_POST['program_type']) );
            }
        }

        if(
            $_POST
            && array_key_exists( 'program_action', $_POST ) && $_POST['program_action'] === 'update-tax-setting'
            && array_key_exists( 'program_type', $_POST ) && !empty($_POST['program_type'])
        ) {
            if ( in_array($_POST['program_type'], Partnero_Util::ALL_TYPES, true) ) {
                $this->update_tax_setting($_POST['program_type'], (string)$_POST['tax_setting']);
            }
        }

        if(
            $_POST
            && array_key_exists( 'program_action', $_POST ) && $_POST['program_action'] === 'update-sync-customers-setting'
            && array_key_exists( 'program_type', $_POST ) && !empty($_POST['program_type'])
        ) {
            if ( $_POST['program_type'] == Partnero_Util::TYPE_REFER_A_FRIEND ) {
                $this->update_sync_customers_setting($_POST['program_type'], (string)$_POST['sync_customers_setting']);
            }
        }

        // If clicked on save button of api key form, call the handler function
        if(
            $_POST
            && array_key_exists( 'api_key', $_POST ) && !empty( $_POST['api_key'] )
            && array_key_exists( 'api_key_type', $_POST ) && !empty( $_POST['api_key_type'] )
        ) {
            $this->api_key_form_handler();
            return;
        }

        // If partnero settings are set for affiliate or refer_a_friend, show dashbord
        $active_type = self::get_active_type();
        if(Partnero_Util::has_option($active_type, 'api_key')) {
            $this->show_dashboard();
            return;
        }

        // If api key is not set show form to enter it
        $this->api_key_form();
    }

    /**
     * Show api form.
     *
     * @since    1.0.0
     */
    private function api_key_form( $error = '', $type = '') {
        $active_type = $type ?: self::get_active_type();
        require_once Partnero_Util::get_plugin_directory() . 'admin/template/api-key-form.php';
    }

    /**
     * Api key form handler function for save button click.
     *
     * @since    1.0.0
     */
    private function api_key_form_handler() {

        $api_key_type = sanitize_text_field( $_POST['api_key_type'] );
        $api_key = sanitize_text_field( $_POST['api_key'] );

        Partnero_Api::set_api_key_type( $api_key_type );
        Partnero_Api::set_api_key( $api_key );

        $result = Partnero_Api::test_call();

        $error_message = 'Error connecting to program!';

        if( !empty( $result ) ) {
            if ( $result->program->type === $api_key_type ) {
                $option_key = Partnero_Util::get_option_key($api_key_type);
                if ( !empty( $option_key ) ) {
                    add_option( $option_key, array(
                        'api_key'           => $api_key,
                        'program_public_id' => $result->program->pub_id,
                        'tax_setting'       => 'net',
                    ) );
                }
                header("Refresh:0");
                return;
            } else {
                $error_message = 'Invalid program type.';
            }
        }

        // If no result found show error in api key form
        $this->api_key_form( $error_message, $api_key_type );
    }

    /**
     * Shows admin dashboard page after api key is entered.
     *
     * @since    1.0.0
     */
    private function show_dashboard() {
        $active_type = self::get_active_type();

        Partnero_Api::set_api_key_type($active_type);
        $result = Partnero_Api::program_overview_call();
        $tax_setting = Partnero_Util::has_option($active_type, 'tax_setting') ? Partnero_Util::get_option($active_type, 'tax_setting') : 'net';
        $sync_customers_setting = Partnero_Util::has_option($active_type, 'sync_customers') ? Partnero_Util::get_option($active_type, 'sync_customers') : 'false';

        require_once Partnero_Util::get_plugin_directory() . 'admin/template/dashboard.php';
    }

    /**
     * Retrieves the currently active program type based on the 'type' query parameter.
     *
     * @return string The active program type, either TYPE_AFFILIATE or TYPE_REFER_A_FRIEND.
     */
    private function get_active_type() {
        $active_type = isset($_GET['type']) && in_array(
            $_GET['type'],
            Partnero_Util::ALL_TYPES,
            true
        ) ? $_GET['type'] : null;

        if ( is_null($active_type) ) {
            if ( Partnero_Util::has_option(Partnero_Util::TYPE_AFFILIATE, 'api_key') ) {
                $active_type = Partnero_Util::TYPE_AFFILIATE;
            } else if ( Partnero_Util::has_option( Partnero_Util::TYPE_REFER_A_FRIEND, 'api_key') ) {
                $active_type = Partnero_Util::TYPE_REFER_A_FRIEND;
            } else {
                $active_type = Partnero_Util::TYPE_AFFILIATE;
            }
        }

        return $active_type;
    }

    /**
     * Save tax setting to option
     *
     * @param $program_type
     * @param $option_value
     * @since 1.3.1
     */
    private function update_tax_setting($program_type, $option_value): void
    {
        $option_key = Partnero_Util::get_option_key($program_type);

        if ( !empty($option_key) ) {
            $current_options = get_option( $option_key );
            $current_options['tax_setting'] = $option_value;

            update_option( $option_key, $current_options );
        }
    }

    /**
     * Save sync customers setting to option
     *
     * @param $program_type
     * @param $option_value
     * @since 1.3.1
     */
    private function update_sync_customers_setting($program_type, $option_value): void
    {
        $option_key = Partnero_Util::get_option_key($program_type);

        if ( !empty($option_key) ) {
            $current_options = get_option( $option_key );
            $current_options['sync_customers'] = $option_value;

            update_option( $option_key, $current_options );
        }


        if ( $option_value === 'true' ) {

            // Initialize variables
            $batch_size = 100;
            $offset = 0;
            $counter = 0;
            $max_iterations = 1000;

            $active_type = self::get_active_type();
            Partnero_Api::set_api_key_type($active_type);

            do {
                // Fetch a batch of customers from WooCommerce
                $customers = Partnero_Util::get_woo_commerce_customers($batch_size, $offset);

                if (!empty($customers)) {
                    Partnero_Api::sync_customers_call($customers);
                    $offset += $batch_size;
                }
            } while (!empty($customers) && $counter++ < $max_iterations);
        }

    }
}
