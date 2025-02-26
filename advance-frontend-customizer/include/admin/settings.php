<?php
/**
 * To prevent direct access to this file.
 * Only allowed to access when it is included as part of the core system.
 *
 * @since 1.0.0
 *
 */
defined('ABSPATH') or die('No script kiddies please!');

/**
 * To add custom tab in setting page of woocommerce
 *
 * @since 1.0.0
 *
 */
class WFM_Settings_Tab_Custom {

    /**
     * Bootstraps the class and hooks required actions & filters.
     *
     */
    public static function init() {
        //echo __CLASS__;
        add_filter('woocommerce_settings_tabs_array', __CLASS__ . '::wfm_add_settings_tab', 50);
        add_action('woocommerce_settings_tabs_settings_tab_custom', __CLASS__ . '::wfm_settings_tab');
        add_action('woocommerce_update_options_settings_tab_custom', __CLASS__ . '::wfm_update_settings');
    }

    /**
     * Add a new settings tab to the WooCommerce settings tabs array.
     *
     * @param array $settings_tabs Array of WooCommerce setting tabs & their labels, excluding the Subscription tab.
     * @return array $settings_tabs Array of WooCommerce setting tabs & their labels, including the Subscription tab.
     */
    public static function wfm_add_settings_tab($settings_tabs) {
        $settings_tabs['settings_tab_custom'] = __('Frontend Customizer for WooCommerce', 'wfm-text');
        return $settings_tabs;
    }

    /**
     * Uses the WooCommerce admin fields API to output settings via the @see woocommerce_admin_fields() function.
     *
     * @uses woocommerce_admin_fields()
     * @uses self::wfm_get_settings()
     */
    public static function wfm_settings_tab() {
        woocommerce_admin_fields(self::wfm_get_settings());
    }

    /**
     * Uses the WooCommerce options API to save settings via the @see woocommerce_update_options() function.
     *
     * @uses woocommerce_update_options()
     * @uses self::wfm_get_settings()
     */
    public static function wfm_update_settings() {
        woocommerce_update_options(self::wfm_get_settings());
    }

    /**
     * Get all the settings for this plugin for @see woocommerce_admin_fields() function.
     *
     * @return array Array of settings for @see woocommerce_admin_fields() function.
     */
    public static function wfm_get_settings() {
        $selection = get_option('wfm_settings_tab_custom_out_of_stock_selection_value');
        $hidden_class = '';
        if ($selection != 'global') {
            $hidden_class = 'hidden';
        }

        $desc = "Notice: Please check inventory tab,there you can change text of 'Out Of Stock' manually.";
        $settings = array(
            // set custom text
            'section_title_text' => array(
                'name' => __('Custom text change', 'wfm-text'),
                'type' => 'title',
                'desc' => __('Change default text of the woocommerce', 'wfm-text'),
                'id' => 'wfm_settings_tab_custom_section_title_custom_text'
            ),
            'add-to-cart' => array(
                'name' => __('Add to cart', 'wfm-text'),
                'type' => 'text',
                'id' => 'wfm_settings_tab_custom_add-to-cart'
            ),
            'checkout' => array(
                'name' => __('Checkout', 'wfm-text'),
                'type' => 'text',
                'id' => 'wfm_settings_tab_custom_checkout'
            ),
            'place-order' => array(
                'name' => __('Place Order', 'wfm-text'),
                'type' => 'text',
                'id' => 'wfm_settings_tab_custom_place-order'
            ),
            'section_end' => array(
                'type' => 'sectionend',
                'id' => 'wfm_settings_tab_custom_section_end_text'
            ),
            // set default product image
            'section_title_image' => array(
                'name' => __('Change woocommerce Default image', 'wfm-text'),
                'type' => 'title',
                'desc' => __('Change Default image of the woocommerce products', 'wfm-text'),
                'id' => 'wfm_settings_tab_custom_section_title_image'
            ),
            'default-images' => array(
                'name' => __('Default Image', 'wfm-text'),
                'type' => 'image',
                'id' => 'wfm_settings_tab_custom_default_image'
            ),
            'section_end_image' => array(
                'type' => 'sectionend',
                'id' => 'wfm_settings_tab_custom_section_end_image'
            ),
            //Add / Update SKU
            'section_title_sku' => array(
                'name' => __('Pre-define SKU', 'wfm-text'),
                'type' => 'title',
                'desc' => __('Add/Update Sku of the woocommerce products', 'wfm-text'),
                'id' => 'wfm_settings_tab_custom_section_title_sku'
            ),
            'pre-define add sku' => array(
                'name' => __('Enable Feature', 'wfm-text'),
                'type' => 'checkbox',
                'css' => 'min-width:300px;',
                'id' => 'wfm_settings_tab_custom_add_sku'
            ),
            'section_end_sku' => array(
                'type' => 'sectionend',
                'id' => 'wfm_settings_tab_custom_section_end_sku'
            ),
            //change text of out of stock
            'section_title_stock' => array(
                'name' => __('Change text of "Out Of Stock"', 'wfm-text'),
                'type' => 'title',
                'desc' => __('Change text of the woocommerce out of stock', 'wfm-text'),
                'id' => 'wfm_settings_tab_custom_section_title_stock'
            ),
            'selection-stock-text' => array(
                'name' => __('Select Option', 'wfm-text'),
                'type' => 'select',
                'options' => array(
                    'none' => __('None', 'wfm-text'),
                    'global' => __('Globally', 'wfm-text'),
                    'admin_side_changes' => __('Manually', 'wfm-text'),
                ),
                'desc' => $desc,
                'id' => 'wfm_settings_tab_custom_out_of_stock_selection_value'
            ),
            'out-of-stock' => array(
                'name' => __('Out of Stock', 'wfm-text'),
                'type' => 'text',
                'id' => 'wfm_settings_tab_custom_out_of_stock',
                'class' => $hidden_class,
            ),
            'section_end_stock' => array(
                'type' => 'sectionend',
                'id' => 'wfm_settings_tab_custom_section_end_stock'
            ),
        );

        return apply_filters('wc_settings_tab_custom_settings', $settings);
    }

}

WFM_Settings_Tab_Custom::init();

/**
 * To change text of add to cart
 *
 * @since 1.0.0
 */
if (!function_exists('wfm_custom_cart_button_text')) {

    add_filter('add_to_cart_text', 'wfm_custom_cart_button_text');
    add_filter('woocommerce_product_add_to_cart_text', 'wfm_custom_cart_button_text');
    add_filter('woocommerce_product_single_add_to_cart_text', 'wfm_custom_cart_button_text');

    function wfm_custom_cart_button_text($add_to_cart_real_text) {
        $add_to_cart_text = get_option('wfm_settings_tab_custom_add-to-cart');
        if ($add_to_cart_text != '') {
            return __($add_to_cart_text, 'wfm-text');
        } else {
            return $add_to_cart_real_text;
        }
    }

}

/**
 * To change text of checkout button
 *
 * @since 1.0.0
 */
if (!function_exists('wfm_custom_checkout_button_text')) {

    add_action('woocommerce_proceed_to_checkout', 'wfm_custom_checkout_button_text');

    function wfm_custom_checkout_button_text() {

        $checkout_text = get_option('wfm_settings_tab_custom_checkout');
        $checkout_url = wc_get_checkout_url();
        if ($checkout_text != '') {
            remove_action('woocommerce_proceed_to_checkout', 'woocommerce_button_proceed_to_checkout', 20);
            ?>
            <a href="<?php echo $checkout_url; ?>" class="checkout-button button alt wc-forward"><?php _e($checkout_text, 'wfm-text'); ?></a>
            <?php
        }
    }

}

/**
 * To change text of Place order
 *
 * @since 1.0.0
 */
if (!function_exists('wfm_custom_order_button_text')) {

    add_filter('woocommerce_order_button_text', 'wfm_custom_order_button_text');

    function wfm_custom_order_button_text($place_order_default_text) {

        $place_order_text = get_option('wfm_settings_tab_custom_place-order');

        if ($place_order_text != '') {
            return __($place_order_text, 'wfm-text');
        } else {
            return $place_order_default_text;
        }
    }

}

/**
 * To add pre-define SKU in newly added product
 *
 * @global array $post
 * @return string
 *
 * @since 1.0.0
 */
if (!function_exists('wfm_save_the_sku_to_general_product_field')) {

    add_action('save_post', 'wfm_save_the_sku_to_general_product_field');

    function wfm_save_the_sku_to_general_product_field() {

        global $post;
        $sku = get_option('wfm_settings_tab_custom_add_sku');
        if ($sku == 'yes') {

            if ($post->post_type != 'product') {
                return;
            }

            if (isset($_REQUEST['_sku']) && $_REQUEST['_sku'] != NULL) {
                return;
            }

            $post_id = $post->ID;
            $post_title = $post->post_title;
            $post_sku = $post_id . '-' . $post_title;
            update_post_meta($post_id, '_sku', $post_sku);
        }
    }

}

/**
 * To change text of Out of stock
 *
 * @global array $post
 * @param array $availability
 * @return string
 *
 * @since 1.0.0
 */
if (!function_exists('wfm_change_text_out_of_stock')) {

    add_filter('woocommerce_get_availability', 'wfm_change_text_out_of_stock', 10, 2);

    function wfm_change_text_out_of_stock($availability) {

        global $post;
        if ($availability['class'] == 'out-of-stock') {

            $selection = get_option('wfm_settings_tab_custom_out_of_stock_selection_value');

            if ($selection == 'global') {

                $out_of_stock_text = get_option('wfm_settings_tab_custom_out_of_stock');

                if ($out_of_stock_text != NULL) {

                    $availability['availability'] = $out_of_stock_text;
                }
            } elseif ($selection == 'admin_side_changes') {

                $stock_value = get_post_meta($post->ID, '_stock_value');
                $stock_status = get_post_meta($post->ID, '_stock_status');
                // echo $stock_status[0];exit;
                if ($stock_value != NULL && $stock_status[0] == 'outofstock') {

                    $availability['availability'] = $stock_value[0];
                }
            }
            return $availability;
        }
    }

}

/**
 * To add custom text field in admin side inventory tab. it's change text of single product of out of stock-text
 *
 * @global array $post
 *
 * @since  1.0.0
 */
if (!function_exists('wfm_add_custom_field_inventory_product_data')) {
    add_action('woocommerce_product_options_inventory_product_data', 'wfm_add_custom_field_inventory_product_data', 10, 0);

    function wfm_add_custom_field_inventory_product_data() {

        global $post;

        $selection = get_option('wfm_settings_tab_custom_out_of_stock_selection_value');
        if ($selection == 'admin_side_changes') {
            $product_stock = get_post_meta($post->ID, '_stock_value', true);

            echo '<div class="options_group">';

            woocommerce_wp_text_input(array(
                'id' => '_stock_value',
                'label' => __('Change Text Of Out Of Stock', 'wfm-text'),
                'placeholder' => '',
                'description' => __('Enter the Text', 'wfm-text')
            ));

            echo '</div>';
        }
    }

}

/**
 * To display text on inventory custom text field in admin side
 *
 * @param int $post_id
 *
 * @since 1.0.0
 */
if (!function_exists('wfm_save_the_stock_to_invetory_product_field')) {
    add_action('woocommerce_process_product_meta', 'wfm_save_the_stock_to_invetory_product_field');

    function wfm_save_the_stock_to_invetory_product_field($post_id) {

        $wc_field = $_POST['_stock_value'];

        if (!empty($wc_field)) {
            update_post_meta($post_id, '_stock_value', sanitize_text_field($wc_field));
        }
    }

}

/**
 * To add custom css for show/hide text field of out of stock
 *
 * @since 1.0.0
 */
if (!function_exists('wfm_custom_style')) {

    add_action('admin_footer', 'wfm_custom_style');

    function wfm_custom_style() {
        ?>
        <script>
            jQuery(document).ready(function () {
                var select_opt;

                select_opt = jQuery('#wfm_settings_tab_custom_out_of_stock_selection_value').val();

                if (select_opt != 'global') {
                    jQuery('label[for = "wfm_settings_tab_custom_out_of_stock"]').hide();
                }

                if (select_opt != 'admin_side_changes') {

                    jQuery('#wfm_settings_tab_custom_out_of_stock_selection_value').next().hide();
                } else {

                    jQuery('#wfm_settings_tab_custom_out_of_stock_selection_value').next().show();
                }

                jQuery('#wfm_settings_tab_custom_out_of_stock_selection_value').change(function () {

                    var selection_value;

                    selection_value = jQuery(this).val();

                    if (selection_value == 'global') {

                        jQuery('#wfm_settings_tab_custom_out_of_stock').css("display", "block");
                        jQuery('label[for = "wfm_settings_tab_custom_out_of_stock"]').show();
                    } else {

                        jQuery('#wfm_settings_tab_custom_out_of_stock').css("display", "none");
                        jQuery('label[for = "wfm_settings_tab_custom_out_of_stock"]').hide();
                    }

                    if (selection_value != 'admin_side_changes') {

                        jQuery('#wfm_settings_tab_custom_out_of_stock_selection_value').next().hide();
                    } else {

                        jQuery('#wfm_settings_tab_custom_out_of_stock_selection_value').next().show();
                    }

                });
            });
        </script>

        <?php
    }

}

/**
 * To display image button on admin side
 *
 * @param array $data
 *
 * @since  1.0.0
 */
if (!function_exists('wfm_def_image_field')) {

    add_action('woocommerce_admin_field_image', 'wfm_def_image_field', 5, 1);

    function wfm_def_image_field($data) {

        $value = WC_Admin_Settings::get_option($data['id']);
        ?>
        <table>
            <tr valign="top">
                <th scope="row" class="titledesc">
                    <label for="<?php echo ($data['id']); ?>"><?php echo sanitize_text_field($data['title']); ?></label>
                </th>

                <td class="forminp forminp-<?php echo sanitize_title($data['type']) ?>">
                    <?php
                    wfm_media_modal_images(array(
                        'button_id' => ($data['id'] . '-button'),
                        'option_name' => ($data['id']),
                        'data' => ($value),
                        'type' => 'button',
                    ));
                    ?>
                </td>
            </tr>
        </table>
        <?php
    }

}
/**
 * To replace default image
 *
 * @since 1.0.0
 */
if (!function_exists('wfm_placeholder_replacing')) {

    add_action("init", "wfm_placeholder_replacing", 100);

    function wfm_placeholder_replacing() {

        $img_id = WC_Admin_Settings::get_option('wfm_settings_tab_custom_default_image');

        if ($img_id) {
            add_filter('woocommerce_placeholder_img', 'wfm_replace_wc_placeholder_img', 100, 3);
            add_filter('woocommerce_placeholder_img_src', 'wfm_replace_wc_placeholder_img_src', 100);
        }
    }

}
/**
 * To replace default image with old default image
 *
 * @param type $html
 * @param type $size
 * @param type $dimensions
 * @return type
 *
 * @since 1.0.0
 */
if (!function_exists('wfm_replace_wc_placeholder_img')) {

    function wfm_replace_wc_placeholder_img($html, $size, $dimensions) {

        $img_id = WC_Admin_Settings::get_option('wfm_settings_tab_custom_default_image');
        return $img_id ? wp_get_attachment_image($img_id, $size) : $html;
    }

}

/**
 * To display default image of single product
 *
 * @return array
 *
 * @since 1.0.0
 */
if (!function_exists('wfm_replace_wc_placeholder_img_src')) {

    function wfm_replace_wc_placeholder_img_src() {
        $img_id = WC_Admin_Settings::get_option('wfm_settings_tab_custom_default_image');
        return wp_get_attachment_image_url($img_id, apply_filters('wfm_placeholder_src', 'shop_single'));
    }

}

/**
 * To display default image size
 *
 * @return string
 *
 * @since 1.0.0
 */
if (!function_exists('wfm_placeholder_src_size')) {
    add_filter('wfm_placeholder_src', 'wfm_placeholder_src_size', 10);

    function wfm_placeholder_src_size() {
        if (is_product_category())
            return 'shop_catalog';
    }

}

/**
 * To display default image in front side
 *
 * @global type $wpdb
 * @global array $post
 * @param array $html
 * @param int $post_id
 * @param int $post_thumbnail_id
 * @param array $size
 * @param array $attr
 * @return array
 *
 * @since 1.0.0
 */
if (!function_exists('wfm_post_thumbnail_html')) {
    add_filter('post_thumbnail_html', 'wfm_post_thumbnail_html', 100, 5);

    function wfm_post_thumbnail_html($html, $post_id, $post_thumbnail_id, $size, $attr) {
        global $wpdb, $post;
        if ($html) {
            return $html;
        }
        if ($post_thumbnail_id) {
            return $html;
        }

        if ($post->ID != $post_id) {
            $post_type = $wpdb->get_results($wpdb->prepare("SELECT post_type FROM {$wpdb->posts} WHERE ID = %d", $post_id));
            if (empty($post_type) || $post_type[0]->post_type != 'product') {
                return $html;
            }
        } else {
            if ($post->post_type != 'product') {
                return $html;
            }
        }

        $img_id = WC_Admin_Settings::get_option('wfm_settings_tab_custom_default_image');
        return wp_get_attachment_image($img_id, $size);
    }

}

/**
 * To show upload image in admin side
 *
 * @param array $args
 *
 * @since 1.0.0
 */
if (!function_exists('wfm_media_modal_images')) {

    function wfm_media_modal_images($args) {

        $defaults = array(
            'post_id' => $args['data'],
            'button_id' => 'button_id_' . rand(0, 9999),
            'button_text' => __('Select Image', 'wfm-text'),
            'multiselect' => false,
            'img_width' => 'initial',
            'data' => false,
            'meta_key' => false,
            'thumb_size' => 'thumbnail',
        );

        $img_detail = (object) wp_parse_args($args, $defaults);

        $img_detail->img_width = !empty($img_detail->img_width) ? 'style="width : ' . $img_detail->img_width . ';"' : '';
        ?>
        <div id="<?php echo $img_detail->button_id ?>_wrapper" class="wpmediamodal_wrapper">
            <input type="button" class="wpmediamodal" id="<?php echo $img_detail->button_id; ?>" wpmediamodal-ids="<?php echo $img_detail->button_id ?>_img_ids" wpmediamodal-preview="<?php echo $img_detail->button_id ?>_preview" wpmediamodal-multiSelect="<?php echo $img_detail->multiselect ?>" value="<?php echo $img_detail->button_text ?>"><br />
            <ul class="preview clearfix" id="<?php echo $img_detail->button_id ?>_preview" >
                <?php
                if ($img_detail->meta_key !== false) :
                    if (metadata_exists('post', $img_detail->post_id, $img_detail->meta_key)) {
                        $previews = get_post_meta($img_detail->post_id, $img_detail->meta_key, TRUE);
                    };
                else :
                    $previews = $img_detail->data;
                endif;
                $attachments = array_filter(explode(',', $previews));
                if ($attachments) {
                    foreach ($attachments as $attachment_id) {
                        echo '<li class="image" data-attachment_id="' . $attachment_id . '" ' . $img_detail->img_width . '>' . wp_get_attachment_image($attachment_id, $img_detail->thumb_size) . '<span><a class="delete_slide" title="' . __('Delete', 'wfm-text') . '"></a></span></li>';
                    }
                }
                ?>
            </ul>
            <input type="hidden" id="<?php echo $img_detail->button_id ?>_img_ids" name="<?php echo $img_detail->option_name ?>" value="<?php echo ($previews); ?>" />
            <br clear="all" />
        </div>
        <?php
    }

}
