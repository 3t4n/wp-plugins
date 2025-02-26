<?php

namespace SMFWC\Shiperman\Admin;

use SMFWC\Shiperman\Orders_List_Table\SMFWC_Shiperman_Orders_List_Table;
use SMFWC\Shiperman\API\SMFWC_Shiperman_API;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class SMFWC_Shiperman_Admin
{
    private $api_base_url = 'https://api.shiperman.com/api';

    private $orders_list_table;

    public function __construct()
    {
        add_action('init', [$this, 'init_session'], 1);

        add_action('admin_menu', [$this, 'add_admin_menu']);

        add_action('admin_enqueue_scripts', [$this, 'enqueue_admin_scripts']);

        add_action('admin_post_shiperman_login', [$this, 'process_login']);

        add_action('admin_post_shiperman_logout', [$this, 'process_logout']);

        add_action('admin_footer', [$this, 'add_shipment_modal_html']);

        add_action('wp_ajax_fetch_shipment_data', [$this, 'fetch_shipment_data']);
    }

    public function init_session()
    {
        if (!session_id()) {
            session_start();
        }
    }

    public function add_admin_menu()
    {

        //add_menu_page('Shiperman', 'Shiperman', 'manage_options', 'shiperman_login', [$this, 'render_login_page'], 'dashicons-dashboard');

        add_menu_page('Shiperman', 'Shiperman', 'manage_options', 'shiperman_home', [$this, 'render_home_page'], 'dashicons-store', 6);
        $order_page_hook = add_submenu_page('shiperman_home', 'Orders', 'Orders', 'manage_options', 'shiperman_orders', [$this, 'render_orders_page']);
        add_submenu_page('shiperman_home', 'Customers', 'Customers', 'manage_options', 'shiperman_customers', [$this, 'render_customers_page']);
        add_submenu_page('shiperman_home', 'Wallet', 'Wallet', 'manage_options', 'shiperman_wallet', [$this, 'render_wallet_page']);
        add_submenu_page('shiperman_home', 'Shipping Depos', 'Shipping Depos', 'manage_options', 'shiperman_depos', [$this, 'render_depos_page']);
        add_submenu_page('shiperman_home', 'Settings', 'Settings', 'manage_options', 'shiperman_settings', [$this, 'render_settings_page']);
        add_submenu_page('shiperman_home', 'Logout', 'Logout', 'manage_options', 'shiperman_logout', [$this, 'process_logout']);
        //add_menu_page('Shipperman Login', 'Shipperman', 'manage_options', 'shiperman_login', [$this, 'render_login_page'], 'dashicons-dashboard', 6);
        add_action("load-$order_page_hook", array(&$this, 'init_table'));
    }

    public function init_table()
    {
        // Create an instance of the list table
        $this->orders_list_table = new SMFWC_Shipperman_Orders_List_Table();
    }

    public function enqueue_admin_scripts($hook_suffix)
    {

        $allowed_pages = [
            'toplevel_page_shiperman_home',
            'shiperman_page_shiperman_orders',
            'shiperman_page_shiperman_customers',
            'shiperman_page_shiperman_wallet',
            'shiperman_page_shiperman_settings',
            'toplevel_page_shiperman_login',
            'woocommerce_page_wc-orders',
            'edit.php'
        ];

        if (in_array($hook_suffix, $allowed_pages)) {
            wp_enqueue_style('shiperman_roboto_font', 'https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap', [], null);
            wp_register_style('shiperman_admin_css', SMFWC_SHIPERMAN_PLUGIN_URL . 'assets/css/admin-styles.css', [], SMFWC_SHIPERMAN_PLUGIN_VERSION);
            wp_enqueue_style('shiperman_admin_css');

            wp_enqueue_script('jquery');
            wp_enqueue_script('shipment-modal-script', SMFWC_SHIPERMAN_PLUGIN_URL . 'assets/js/shipment-modal.js', ['jquery'], SMFWC_SHIPERMAN_PLUGIN_VERSION, true);
            wp_enqueue_script(
                'shiperman-admin-script',
                plugins_url('/assets/js/admin-script.js', dirname(__FILE__, 2)), // Path to admin-script.js
                ['jquery'],
                SMFWC_SHIPERMAN_PLUGIN_VERSION, // Use plugin version constant for cache-busting
                true // Load script in footer
            );

            wp_localize_script('shipment-modal-script', 'shipmentModalData', [
                'ajax_url' => admin_url('admin-ajax.php'),
                'nonce'    => wp_create_nonce('view_shipment_nonce'),
            ]);
        }
    }

    public function render_login_page()
    {
?>
        <div class="wrap">
            <div class="shiperman-title">
                <h1><?php esc_html_e('Login', 'shiperman-for-woocommerce'); ?></h1>
            </div>
            <div class="shiperman-login-wrapper">
                <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                    <?php wp_nonce_field('shiperman_form_nonce', 'shiperman_form_nonce'); ?>
                    <input type="hidden" name="action" value="shiperman_login">
                    <div class="shiperman-form-table <?php echo esc_attr(isset($_GET['login_error']) ? 'has-error' : ''); ?>">
                        <div class="shiperman-logo">
                            <img src="<?php echo esc_url(SMFWC_SHIPERMAN_PLUGIN_URL . 'assets/images/shiperman-logo.png'); ?>" alt="<?php esc_attr_e('Shiperman logo', 'shiperman-for-woocommerce'); ?>">
                        </div>
                        <div class="shiperman-form-field">
                            <label for="email"><?php esc_html_e('Email:', 'shiperman-for-woocommerce'); ?></label>
                            <input type="email" name="email" id="email" required>
                        </div>
                        <div class="shiperman-form-field">
                            <label for="password"><?php esc_html_e('Password:', 'shiperman-for-woocommerce'); ?></label>
                            <input type="password" name="password" id="password" required>
                        </div>
                        <?php if (isset($_GET['login_error'])): ?>
                            <p style="color: red; text-align:center; font-size:18px; line-height: 30px;"><?php esc_html_e('Wrong email or password!', 'shiperman-for-woocommerce'); ?></p>
                        <?php endif; ?>
                        <div class="shiperman-submit">
                            <button type="submit" class="shiperman-btn btn-primary"><?php esc_html_e('Login', 'shiperman-for-woocommerce'); ?></button>
                        </div>
                        <div class="shiperman-form-field">
                            <a href="#" class="shiperman-link"><?php esc_html_e('Get Started', 'shiperman-for-woocommerce'); ?></a>
                            <a href="#" class="shiperman-link forgot-password"><?php esc_html_e('Forgotten Password', 'shiperman-for-woocommerce'); ?></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php
    }

    public function process_login()
    {
        if (!isset($_POST['shiperman_form_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['shiperman_form_nonce'])), 'shiperman_form_nonce')) {
            wp_die(esc_html__('Nonce verification failed.', 'shiperman-for-woocommerce'));
        }

        if (!isset($_POST['email']) || !isset($_POST['password'])) {
            wp_safe_redirect(admin_url('admin.php?page=shiperman_login&login_error=1'));
            exit;
        }

        $email = sanitize_text_field(sanitize_email(wp_unslash($_POST['email'])));
        $password = sanitize_text_field(wp_unslash($_POST['password']));

        $shiperman_api = SMFWC_Shiperman_API::get_instance();

        $data = $shiperman_api->get_access_token($email, $password);

        if (isset($data['data']['token'])) {
            // Save token in session or transient
            $this->init_session();
            $_SESSION['shiperman_jwt_token'] = $data['data']['token'];
            wp_safe_redirect(admin_url('admin.php?page=shiperman_home'));
        } else {
            wp_safe_redirect(admin_url('admin.php?page=shiperman_login&login_error=1'));
        }
        exit;
    }

    public function process_logout()
    {
        $this->init_session();
        unset($_SESSION['shiperman_jwt_token']);

        // Redirect to login page
        wp_safe_redirect(admin_url('admin.php?page=shiperman_login'));
        exit;
    }

    private function is_logged_in()
    {
        return isset($_SESSION['shiperman_jwt_token']);
    }
    public function render_home_page()
    {
        if (!$this->is_logged_in()) {
            $this->render_login_page();
            return;
        }
    ?>
        <div class="wrap">
            <div class="shiperman-title">
                <h1><?php esc_html_e('Home', 'shiperman-for-woocommerce'); ?></h1>
            </div>
            <div class="shiperman-home-wrapper">
                <div class="shiperman-recent-orders">
                    <?php
                    $endpoint = "plugin/orders?page=1&size=5";
                    $shiperman_api = SMFWC_Shiperman_API::get_instance();

                    $recent_orders = $shiperman_api->make_authenticated_request($endpoint);

                    if ($recent_orders) {
                        $recent_orders = apply_filters('shiperman_recent_orders_data', $recent_orders);
                        wc_get_template(
                            'shiperman/homepage-content.php',
                            ['recent_orders' => $recent_orders],
                            'woocommerce/',
                            SMFWC_SHIPERMAN_TEMPLATE_PATH
                        );
                    } else {
                        echo '<p>' . esc_html__('No fetching orders!', 'shiperman-for-woocommerce') . ' </p>';
                    } ?>
                </div>
                <?php
                $balance = '0.00';
                $currency = '€';
                $shiperman_api = SMFWC_Shiperman_API::get_instance();
                $wallet_response = $shiperman_api->make_authenticated_request('plugin/wallet');

                if (isset($wallet_response['status']) && 'success' === $wallet_response['status']) {
                    $balance = esc_html($wallet_response['data']['balance']);
                    $currency = $wallet_response['data']['currency'] === 'EUR' ? '€' : esc_html($wallet_response['data']['currency']);
                }
                ?>
                <div class="shiperman-wallet-card">
                    <div class="shiperman-wallet-balance">
                        <span><?php esc_html_e('Wallet Balance:', 'shiperman-for-woocommerce'); ?></span>
                        <span class="shiperman-wallet-balance--display"><?php echo esc_html($balance) . ' ' . esc_html($currency); ?></span>
                    </div>
                    <div class="wallet-add-more">
                        <button type="button" class="shiperman-btn" id="add-more-balance"><?php esc_html_e('Add more', 'shiperman-for-woocommerce'); ?></button>
                    </div>
                </div>
            </div>
        </div><?php

            }

            public function render_orders_page()
            {
                if (!$this->is_logged_in()) {
                    $this->redirect_to_login();
                    return;
                } ?>
        <div class="wrap">
            <div class="shiperman-title">
                <h1><?php esc_html_e('Orders', 'shiperman-for-woocommerce'); ?></h1>
            </div>
            <div class="shiperman-orders-list-table-wrapper">
                <?php


                // Prepare items and display the table
                $this->orders_list_table->prepare_items();

                // Add search box
                ?>
                <form method="get">
                    <input type="hidden" name="page" value="shiperman_orders">
                    <?php $this->orders_list_table->search_box(esc_html__('Search Orders', 'shiperman-for-woocommerce'), 'search_id'); ?>
                </form>
                <?php

                // Display the table
                $this->orders_list_table->display(); ?>
            </div>
        </div><?php
            }

            public function render_customers_page()
            {
                if (!$this->is_logged_in()) {
                    $this->redirect_to_login();
                    return;
                }
                echo '<h1>' . esc_html__('Customers', 'shiperman-for-woocommerce') . '</h1>';
            }

            public function render_wallet_page()
            {
                if (!$this->is_logged_in()) {
                    $this->redirect_to_login();
                    return;
                }
                echo '<h1>' . esc_html__('Wallet', 'shiperman-for-woocommerce') . '</h1>';
            }

            public function render_depos_page()
            {
                if (!$this->is_logged_in()) {
                    $this->redirect_to_login();
                    return;
                }

                // Prepare the API endpoint with pagination parameters
                $endpoint = "plugin/depos";

                $shiperman_api = SMFWC_Shiperman_API::get_instance();
                $response = $shiperman_api->make_authenticated_request($endpoint, 'GET');

                // Check for errors in the API request
                if (is_wp_error($response)) {
                    echo '<div class="notice notice-error is-dismissible"><p>' . esc_html__('Failed to fetch depos data. Please try again.', 'shiperman-for-woocommerce') . '</p></div>';
                    return;
                }

                // Decode the API response
                $depos_data = json_decode(wp_remote_retrieve_body($response), true);

                // Check if data is available
                if (empty($depos_data)) {
                    echo '<div class="notice notice-error is-dismissible"><p>' . esc_html__('No depos data found.', 'shiperman-for-woocommerce') . '</p></div>';
                    return;
                }
                ?>
        <div class="wrap">
            <div class="shiperman-title">
                <h1><?php esc_html_e('Shipping Depos', 'shiperman-for-woocommerce'); ?></h1>
            </div>
            <div class="shiperman-orders-list-table-wrapper">
                <?php foreach ($depos_data as $depo): ?>
                    <div class="shiperman-card">
                        <h2><?php echo esc_html($depo['title']); ?></h2>
                        <p><?php echo esc_html($depo['description']); ?></p>
                        <p><strong><?php esc_html_e('Location:', 'shiperman-for-woocommerce'); ?></strong> <?php echo esc_html($depo['location']); ?></p>
                        <p><strong><?php esc_html_e('Capacity:', 'shiperman-for-woocommerce'); ?></strong> <?php echo esc_html($depo['capacity']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php
            }


            public function render_settings_page()
            {
                if (!$this->is_logged_in()) {
                    $this->redirect_to_login();
                    return;
                }

                echo '<h1>' . esc_html__('Settings', 'shiperman-for-woocommerce') . '</h1>';
            }

            public function redirect_to_login()
            {
                wp_safe_redirect(admin_url('admin.php?page=shiperman_home'));
                exit;
            }


            public function add_shipment_modal_html()
            {
    ?>
        <div id="shipment-modal" style="display:none;">
            <div class="shipment-modal-content">
                <span class="close-modal">&times;</span>
                <h2><?php esc_html_e('Shipment Details', 'shiperman-for-woocommerce'); ?></h2>
                <p><strong><?php esc_html_e('Order Number:', 'shiperman-for-woocommerce'); ?></strong> <span id="shipment-order-number"></span></p>
                <p><strong><?php esc_html_e('Internal ID:', 'shiperman-for-woocommerce'); ?></strong> <span id="shipment-internal-id"></span></p>
                <p><strong><?php esc_html_e('Price:', 'shiperman-for-woocommerce'); ?></strong> <span id="shipment-price"></span></p>
                <p><strong><?php esc_html_e('Weight:', 'shiperman-for-woocommerce'); ?></strong> <span id="shipment-weight"></span></p>
                <p><strong><?php esc_html_e('Service Type:', 'shiperman-for-woocommerce'); ?></strong> <span id="shipment-service-type"></span></p>
                <p><strong><?php esc_html_e('Item Value:', 'shiperman-for-woocommerce'); ?></strong> <span id="shipment-item-value"></span></p>
                <p><strong><?php esc_html_e('Tracking Number:', 'shiperman-for-woocommerce'); ?></strong> <span id="shipment-tracking-number"></span></p>
                <p><strong><?php esc_html_e('Service:', 'shiperman-for-woocommerce'); ?></strong> <span id="shipment-service"></span></p>
                <p><strong><?php esc_html_e('Carrier:', 'shiperman-for-woocommerce'); ?></strong> <span id="shipment-carrier"></span></p>
                <p><strong><?php esc_html_e('Carrier Tracking Number:', 'shiperman-for-woocommerce'); ?></strong> <span id="shipment-carrier-tracking-number"></span></p>
                <p><strong><?php esc_html_e('Carrier Tracking URL:', 'shiperman-for-woocommerce'); ?></strong> <a id="shipment-tracking-url" href="#" target="_blank"><?php esc_html_e('Track Shipment', 'shiperman-for-woocommerce'); ?></a></p>
                <p><strong><?php esc_html_e('Download Label:', 'shiperman-for-woocommerce'); ?></strong> <a id="shipment-pdf-link" href="#" target="_blank"><?php esc_html_e('Download PDF', 'shiperman-for-woocommerce'); ?></a></p>
            </div>
        </div>
<?php
            }

            public function fetch_shipment_data()
            {
                check_ajax_referer('view_shipment_nonce', 'security');

                $order_id = isset($_POST['order_id']) ? intval($_POST['order_id']) : 0;
                if (!$order_id) {
                    wp_send_json_error(esc_html__('Invalid Order ID', 'shiperman-for-woocommerce'));
                }

                $logger = new \WC_Logger();
                $log_context = 'Shipment meta';

                $logger->add($log_context, 'Order id ' . esc_html($order_id));

                // Get shipment data from post meta
                $shipment_data = get_post_meta($order_id, '_shiperman_shipment_data', true);
                $logger->add($log_context, 'Shipment Data ' . print_r($shipment_data, true));

                if (empty($shipment_data)) {
                    wp_send_json_error(esc_html__('No shipment data found.', 'shiperman-for-woocommerce'));
                }

                $pdf_url = '';
                if (!empty($shipment_data['items'][0]['label_image'])) {
                    $pdf_url = $this->save_base64_pdf($shipment_data['items'][0]['label_image'], $shipment_data['items'][0]['tracking_number'], $shipment_data['reference_id']);

                    if (is_wp_error($pdf_url)) {
                        wp_send_json_error(esc_html__('PDF url not found!', 'shiperman-for-woocommerce'));
                    }
                }

                $response_data = [
                    'order_number'              => isset($shipment_data['reference_id']) ? esc_html($shipment_data['reference_id']) : '',
                    'internal_id'               => isset($shipment_data['internal_id']) ? esc_html($shipment_data['internal_id']) : '',
                    'price'                     => isset($shipment_data['items'][0]['price']) ? esc_html($shipment_data['items'][0]['price']) : '',
                    'weight'                    => isset($shipment_data['items'][0]['weight']) ? esc_html($shipment_data['items'][0]['weight']) : '',
                    'item_value'                => isset($shipment_data['items'][0]['item_value']) ? esc_html($shipment_data['items'][0]['item_value']) : '',
                    'carrier'                   => isset($shipment_data['items'][0]['carrier']) ? esc_html($shipment_data['items'][0]['carrier']) : '',
                    'carrier_tracking_number'   => isset($shipment_data['items'][0]['carrier_tracking_number']) ? esc_html($shipment_data['items'][0]['carrier_tracking_number']) : '',
                    'service_type'              => isset($shipment_data['items'][0]['service_type']) ? esc_html($shipment_data['items'][0]['service_type']) : '',
                    'service'                   => isset($shipment_data['items'][0]['service']) ? esc_html($shipment_data['items'][0]['service']) : '',
                    'tracking_number'           => isset($shipment_data['items'][0]['tracking_number']) ? esc_html($shipment_data['items'][0]['tracking_number']) : '',
                    'tracking_url'              => isset($shipment_data['items'][0]['carrier_tracking_url']) ? esc_url($shipment_data['items'][0]['carrier_tracking_url']) : '',
                    'pdf_url'                   => esc_url($pdf_url),
                ];

                $logger->add($log_context, '$response_data ' . print_r($response_data, true));

                wp_send_json_success($response_data);
            }


            public function save_base64_pdf($base64_pdf, $tracking_number, $reference_id)
            {
                // Ensure WP_Filesystem is loaded
                if (! function_exists('get_filesystem_method')) {
                    require_once ABSPATH . 'wp-admin/includes/file.php';
                }

                // Initialize WP_Filesystem
                global $wp_filesystem;
                if (empty($wp_filesystem)) {
                    \WP_Filesystem();
                }

                // Get the upload directory
                $upload_dir = wp_upload_dir();
                $pdf_dir = $upload_dir['basedir'] . '/shiperman_pdfs';
                $pdf_url = $upload_dir['baseurl'] . '/shiperman_pdfs';

                // Ensure the directory exists
                if (! $wp_filesystem->is_dir($pdf_dir)) {
                    // Create the directory using WP_Filesystem
                    $wp_filesystem->mkdir($pdf_dir, 0755);
                }


                // Handle base64 PDF data
                if (preg_match('/^data:application\/pdf;base64,/', $base64_pdf)) {
                    $base64_pdf = substr($base64_pdf, strpos($base64_pdf, ',') + 1);
                }

                $pdf_data = base64_decode($base64_pdf);
                if ($pdf_data === false) {
                    // Return an error response if decoding fails
                    wp_send_json_error(__('Base64 decoding failed.', 'shiperman-for-woocommerce'));
                }

                // Set the PDF file path
                $pdf_file = "$pdf_dir/{$tracking_number}_{$reference_id}.pdf";

                // Write the PDF data to the file using WP_Filesystem
                if (! $wp_filesystem->put_contents($pdf_file, $pdf_data, FS_CHMOD_FILE)) {
                    wp_send_json_error(__('Failed to write PDF file.', 'shiperman-for-woocommerce'));
                }

                return "$pdf_url/{$tracking_number}_{$reference_id}.pdf";
            }
        }
