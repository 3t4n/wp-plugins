<?php
/**
 * @link        https://ahsandev.com/
 * @since       1.0.0
 * @package     shipping_class_by_category_for_woocommerce
 * 
 * @wordpress-plugin
 * Plugin Name: Shipping Class By Category For Woocommerce
 * Plugin URI:  https://wordpress.org/plugins/shipping-class-by-category-for-woocommerce/
 * Description: Easily assign WooCommerce shipping classes to products by category, saving time and avoiding bulk edit limitations.
 * Version:     1.0.2
 * Author:      Ahsan Khan
 * Author URI:  https://ahsandev.com/
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: shipping-class-by-category-for-woocommerce
 */

if ( ! defined( 'WPINC' ) ) {
    die;
}

function scbcfw_activate() {
    // Check if WooCommerce is active
    if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
        // WooCommerce is active, proceed with activating
    } else {
        // WooCommerce is not active, print a message to the user
        wp_die('WooCommerce is not active. Please install and activate WooCommerce to use this plugin.');
    }
}
register_activation_hook( __FILE__, 'scbcfw_activate' );


if (!class_exists('SCBCFW_Admin')) {

    class SCBCFW_Admin {

        public function __construct() {

            add_action('admin_init', [$this, 'scbcfw_register_settings']);
            add_action('admin_menu', [$this, 'scbcfw_add_admin_menu']);

            add_action('save_post', [$this, 'scbcfw_assign_shipping_class_on_new_product']);

            add_filter('manage_edit-product_columns', [$this, 'scbcfw_custom_product_columns']);
            add_action('manage_product_posts_custom_column', [$this, 'scbcfw_custom_product_column_content'], 10, 2);

            add_action('wp_ajax_scbcfw_process_shipping_class_batch', [$this, 'scbcfw_process_shipping_class_batch']);

            add_action('admin_enqueue_scripts', [$this, 'scbcfw_enqueue_admin_scripts']);
        }

        public function scbcfw_add_admin_menu() {
            add_menu_page(
                __('Shipping Class Assigner', 'shipping-class-by-category-for-woocommerce'),
                __('Shipping Class Assigner', 'shipping-class-by-category-for-woocommerce'),
                'manage_woocommerce',
                'scbcfw',
                [$this, 'scbcfw_render_admin_page'],
                'dashicons-admin-generic',
                5
            );
            add_submenu_page(
                'scbcfw',
                __('Settings', 'shipping-class-by-category-for-woocommerce'),
                __('Settings', 'shipping-class-by-category-for-woocommerce'),
                'manage_options', 
               'scbcfw-settings',
                array($this, 'scbcfw_render_setting_page'),
                1
            );
        }

        public function scbcfw_render_setting_page() {
            ?>
            <div class="wrap">
                <h1><?php esc_html_e('Shipping Class By Category Settings','shipping-class-by-category-for-woocommerce'); ?></h1>
                <form method="post" action="options.php">
                    <?php
                    settings_fields('scbcfw_settings');
                    do_settings_sections('scbcfw_settings');
                    submit_button();
                    ?>
                </form>
            </div>
            <?php
        }

        public function scbcfw_register_settings() {
            register_setting('scbcfw_settings', 'scbcfw_shipping_class_column');
            add_settings_section(
                'scbcfw_section',
                __('Shipping Class Column Settings','shipping-class-by-category-for-woocommerce'),
                null,
                'scbcfw_settings'
            );
            add_settings_field(
                'scbcfw_shipping_class_column',
                __('Enable Shipping Class Column','shipping-class-by-category-for-woocommerce'),
                [$this, 'scbcfw_shipping_class_column_callback'],
                'scbcfw_settings',
                'scbcfw_section'
            );
        }

        public function scbcfw_enqueue_admin_scripts($hook_suffix) {
            // Enqueue admin scripts and styles
            if ($hook_suffix !== 'toplevel_page_scbcfw') {
                return;
            }

            // Enqueue your custom CSS
            wp_enqueue_style('scbcfw-style', plugins_url('assets/css/scbcfw_style.css', __FILE__),array(),'1.0.2');

            // Enqueue your custom JS
            wp_enqueue_script('scbcfw-script', plugins_url('assets/js/scbcfw_script.js', __FILE__), array('jquery'), '1.0.2', true);
        }

        public function scbcfw_shipping_class_column_callback() {
            $is_col_active = get_option('scbcfw_shipping_class_column', 'no');
?>
            <input type="checkbox" id="scbcfw_shipping_class_column" name="scbcfw_shipping_class_column" value="yes" <?php echo $is_col_active === 'yes' ? esc_html__('checked','shipping-class-by-category-for-woocommerce') : '';?>>
            <label for="scbcfw_shipping_class_column"><?php echo esc_html__('Enable Shipping Class column in Products table','shipping-class-by-category-for-woocommerce');?></label>
<?php
        }

        public function scbcfw_custom_product_columns($columns) {
            // Optionally add Shipping Class column
            $is_col_active = get_option('scbcfw_shipping_class_column', 'no');
            if($is_col_active === 'yes'){
                $columns['shipping_class'] = 'Shipping Class';
            }
            return $columns;
        }

        public function scbcfw_custom_product_column_content($column, $post_id) {
            if ($column === 'shipping_class') {
                $product = wc_get_product($post_id);
                $shipping_class_id = $product->get_shipping_class_id();
                if ($shipping_class_id) {
                    $shipping_class = get_term_by('id', $shipping_class_id, 'product_shipping_class');
                    if ($shipping_class) {
                        echo esc_html($shipping_class->name);
                    }
                }
            }
        }

        // Render the admin page
        public function scbcfw_render_admin_page() {
            $categories = get_terms('product_cat');
            if (!empty($categories)) {
                $shipping_classes = WC()->shipping->get_shipping_classes();
                if (!empty($shipping_classes)) {
                    ?>
                    <div class="wrap">
                        <h1><?php esc_html_e('Assign Shipping Class to Category','shipping-class-by-category-for-woocommerce'); ?></h1>
                        <form id="shipping-class-form" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                            <input type="hidden" name="action" value="assign_shipping_class">
                            <table class="form-table">
                                <tr>
                                    <th><label for="product_cat"><?php esc_html_e('Categories','shipping-class-by-category-for-woocommerce'); ?></label></th>
                                    <td>
                                        <select name="product_cat" id="product_cat" class="wc-category-search select2">
                                            <?php foreach ($categories as $category) : ?>
                                                <option value="<?php echo esc_attr($category->term_id); ?>"><?php echo esc_html($category->name); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th><label for="shipping_classes"><?php esc_html_e('Shipping Classes','shipping-class-by-category-for-woocommerce'); ?></label></th>
                                    <td>
                                        <select name="shipping_class" id="shipping_classes" class="postform wc-shipping_classes-search select2">
                                            <option value="0"><?php esc_html_e('Remove Shipping Class','shipping-class-by-category-for-woocommerce'); ?></option>
                                            <?php foreach ($shipping_classes as $class) : ?>
                                                <option value="<?php echo esc_attr($class->term_id); ?>"><?php echo esc_html($class->name); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                            <?php wp_nonce_field('scbcfw_nonce_live', 'scbcfw_nonce'); ?>
                            <a id="shipping-class-assign" href="#" class="button-primary"><?php esc_html_e('Start Assigning', 'shipping-class-by-category-for-woocommerce'); ?></a>
                            <br>
                            <div id="progress-bar-wrapper">
                                <div id="progress-bar"></div>
                            </div>
                        </form>
                        <div id="ajax-response"></div>
                    </div>
<?php
                }
            }
        }

        public function scbcfw_process_shipping_class_batch() {
            check_ajax_referer('scbcfw_nonce_live', 'scbcfw_nonce');

            if(isset($_POST['product_cat']) && isset($_POST['shipping_class']) && isset($_POST['batch_size']) && isset($_POST['offset'])){
                $category_id = intval(sanitize_text_field(wp_unslash($_POST['product_cat'])));
                $shipping_class = intval(sanitize_text_field(wp_unslash($_POST['shipping_class'])));
                $batch_size = intval(sanitize_text_field(wp_unslash($_POST['batch_size'])));
                $offset = intval(sanitize_text_field(wp_unslash($_POST['offset'])));

                if($batch_size <= 0){
                    $batch_size = 100;
                }
                if($offset < 0){
                    $offset = 0;
                }
                $args = array(
                    'post_type'      => 'product',
                    'posts_per_page' => $batch_size,
                    'offset'         => $offset,
                    'tax_query'      => array( //phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query
                        array(
                            'taxonomy' => 'product_cat',
                            'field'    => 'term_id',
                            'terms'    => $category_id,
                        ),
                    ),
                );

                update_term_meta($category_id, 'scbcfw_shipping_class', $shipping_class);

                $products = new WP_Query($args);
                $processed_count = 0;
                $total_count = $products->found_posts;

                if ($products->have_posts()) {
                    while ($products->have_posts()) {
                        $products->the_post();
                        $product_id = get_the_ID();

                        if (empty($shipping_class) || $shipping_class == 0) {
                            wp_set_object_terms($product_id, array(), 'product_shipping_class', false);
                        } else {
                            $existing_classes = wp_get_object_terms($product_id, 'product_shipping_class', array('fields' => 'ids'));
                            if (!in_array($shipping_class, $existing_classes)) {
                                wp_set_object_terms($product_id, $shipping_class, 'product_shipping_class', false);
                            }
                        }

                        $processed_count++;
                    }
                    wp_reset_postdata();
                }
                wp_send_json_success([
                    'processed_count' => $processed_count,
                    'total_count' => $total_count,
                    'message' => esc_html__('Shipping class assignment complete.', 'shipping-class-by-category-for-woocommerce')
                ]);
            }
            wp_send_json_success([
                'processed_count' => 0,
                'total_count' => 0,
                'message' => esc_html__('Shipping class assignment incomplete: Some Issue.', 'shipping-class-by-category-for-woocommerce')
            ]);
            
        }

        // Assign category's shipping classes to a newly created product
        public function scbcfw_assign_shipping_class_on_new_product($post_id) {
            if ('product' !== get_post_type($post_id)) {
                return;
            }

            $categories = wp_get_post_terms($post_id, 'product_cat');
            if (!empty($categories)) {
                foreach ($categories as $category) {
                    $shipping_class = get_term_meta($category->term_id, 'scbcfw_shipping_class', true);
                    if (!empty($shipping_class)) {
                        wp_set_object_terms($post_id, $shipping_class, 'product_shipping_class', false);
                    }
                }
            }
        }
    }
}

new SCBCFW_Admin();