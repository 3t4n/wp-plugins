<?php

class WAPF_AdditionalFields
{

    public static function wapf_init()
    {
        self::init_wapf_hooks();
    }

    /**
     * Initializes WordPress hooks
     */
    private static function init_wapf_hooks()
    {
        //Simple Product Hooks
        // Display Fields
        add_action('woocommerce_product_options_general_product_data', array('WAPF_AdditionalFields', 'wapf_custom_general_fields'), 10, 3);

        // Save Fields
        add_action('woocommerce_process_product_meta', array('WAPF_AdditionalFields', 'wapf_save_custom_general_fields'), 10, 3);

        //Variable Product Hooks
        //Display Fields (both actions below should work)
        add_action('woocommerce_product_after_variable_attributes', array('WAPF_AdditionalFields', 'wapf_custom_variable_fields', 10, 3));

        //woocommerce_process_product_meta_variable no longer works, and it must be changed to woocommerce_save_product_variation
        add_action('woocommerce_save_product_variation', array('WAPF_AdditionalFields', 'wapf_save_custom_variable_fields'), 10, 1);

        //add wapf_additional_fields shortcode
        add_shortcode('WAPF_additional_fields', array('WAPF_AdditionalFields', 'wapf_woo_additional_fields'));

        //echo do_shortcode('[wapf_additional_fields name="after_add_to_cart_button"]');

    }

    public static function wapf_custom_general_fields()
    {
        global $post;

        echo '<div id="cpf_attr" class="options_group">';
        //ob_start();

        //Brand field
        woocommerce_wp_text_input(
            array(
                'id' => '_wapf_brand',
                'label' => __('Brand', 'wapf_woo_additional_fields'),
                'desc_tip' => 'true',
                //'type'        => 'text',
                'value' => get_post_meta($post->ID, '_wapf_brand', true),
                'description' => __('Enter the product Brand here.', 'wapf_woo_additional_fields')
            )
        );
        echo '</div>';
        echo '<div id="cpf_attr" class="options_group show_if_simple show_if_external">';

        //MPN Field
        woocommerce_wp_text_input(
            array(
                'id' => '_wapf_mpn',
                'label' => __('MPN', 'wapf_woo_additional_fields'),
                'desc_tip' => 'true',
                'description' => __('Enter the manufacturer product number', 'wapf_woo_additional_fields'),
            )
        );

        //UPC Field
        woocommerce_wp_text_input(
            array(
                'id' => '_wapf_upc',
                'label' => __('UPC', 'wapf_woo_additional_fields'),
                'desc_tip' => 'true',
                'description' => __('Enter the product UPC here.', 'wapf_woo_additional_fields'),
            )
        );

        //UPC Field
        woocommerce_wp_text_input(
            array(
                'id' => '_wapf_ean',
                'label' => __('EAN', 'wapf_woo_additional_fields'),
                'desc_tip' => 'true',
                'description' => __('Enter the product EAN here.', 'wapf_woo_additional_fields'),
            )
        );

        //Shipping Cost Field
        woocommerce_wp_text_input(
            array
            (
                'id' => '_wapf_shipping_cost',
                'label' => __('Shipping Cost', 'wapf_woo_additional_fields'),
                'desc_tip' => 'true',
                'description' => __('Enter the cost of shipping charged to DN', 'wapf_woo_additional_fields'),
                'type' => 'number',
                'custom_attributes' => array(
                    'step' => 'any',
                    'min' => '-1'
                )
            )
        );


        //Notes about this prodcut
        woocommerce_wp_textarea_input(
            array
            (
                'id' => '_wapf_notes',
                'label' => __('Product notes', 'wapf_woo_additional_fields'),
                'placeholder' => '',
                'description' => __('Enter any notes about this product.', 'wapf_woo_additional_fields'),
            )
        );

        echo '</div>';
    }

    /**
     * Save new fields for simple products
     *
     */
    public static function wapf_save_custom_general_fields($post_id)
    {

        $woocommerce_brand = $_POST['_wapf_brand'];
        $woocommerce_upc = $_POST['_wapf_upc'];
        $woocommerce_mpn = $_POST['_wapf_mpn'];
        $woocommerce_ean = $_POST['_wapf_ean'];
        $woocommerce_shipping_cost = $_POST['_wapf_shipping_cost'];

        $woocommerce_product_note = $_POST['_wapf_notes'];

        if (isset($woocommerce_brand))
            update_post_meta($post_id, '_wapf_brand', esc_attr($woocommerce_brand));

        if (isset($woocommerce_mpn))
            update_post_meta($post_id, '_wapf_mpn', esc_attr($woocommerce_mpn));

        if (isset($woocommerce_upc))
            update_post_meta($post_id, '_wapf_upc', esc_attr($woocommerce_upc));

        if (isset($woocommerce_ean))
            update_post_meta($post_id, '_wapf_ean', esc_attr($woocommerce_ean));

        if (isset($woocommerce_shipping_cost))
            update_post_meta($post_id, '_wapf_shipping_cost', esc_attr($woocommerce_shipping_cost));

        if (isset($woocommerce_product_note))
            update_post_meta($post_id, '_wapf_notes', esc_attr($woocommerce_product_note));
    }

    /**
     * Create new fields for variations
     *
     */
    public static function wapf_custom_variable_fields($loop, $variation_id, $variation)
    {

//Added <br>s to the labels to correct a spacing issue that put the labels on the wrong input boxes -2015-05:KH

// Variation Brand field
        woocommerce_wp_text_input(
            array(
                'id' => '_wapf_variable_brand[' . $loop . ']',
                'label' => __('<br>Brand', 'wapf_woo_additional_fields'),
                'placeholder' => 'Parent Brand',
//'desc_tip'    => 'true',
//'description' => __( 'Enter the product Brand here.', 'woocommerce' ),
                'value' => get_post_meta($variation->ID, '_wapf_brand', true),
                'wrapper_class' => 'form-row-first',
            )
        );

// Variation MPN field
        woocommerce_wp_text_input(
            array(
                'id' => '_wapf_variable_mpn[' . $loop . ']',
                'label' => __('<br>MPN', 'wapf_woo_additional_fields'),
                'placeholder' => 'Manufacturer Product Number',
//'desc_tip'    => 'true',
//'description' => __( 'Enter the product UPC here.', 'woocommerce' ),
                'value' => get_post_meta($variation->ID, '_wapf_mpn', true),
                'wrapper_class' => 'form-row-last',
            )
        );
// Variation UPC field
        woocommerce_wp_text_input(
            array(
                'id' => '_wapf_variable_upc[' . $loop . ']',
                'label' => __('<br>UPC', 'wapf_woo_additional_fields'),
                'placeholder' => 'UPC',
//'desc_tip'    => 'true',
//'description' => __( 'Enter the product UPC here.', 'woocommerce' ),
                'value' => get_post_meta($variation->ID, '_wapf_upc', true),
                'wrapper_class' => 'form-row-first',
            )
        );

// Variation EAN field
        woocommerce_wp_text_input(
            array(
                'id' => '_wapf_variable_ean[' . $loop . ']',
                'label' => __('<br>EAN', 'wapf_woo_additional_fields'),
                'placeholder' => 'EAN',
//'desc_tip'    => 'true',
//'description' => __( 'Enter the product EAN here.', 'woocommerce' ),
                'value' => get_post_meta($variation->ID, '_wapf_ean', true),
                'wrapper_class' => 'form-row-last',
            )
        );

//  Variation Valid field
        woocommerce_wp_select(
            array(
                'id' => '_wapf_variable_valid[' . $loop . ']',
                'label' => __('Valid<br>', 'wapf_woo_additional_fields'),
                'desc_tip' => 'true',
                'description' => __('Select False to exclude this variation from the feed', 'wapf_woo_additional_fields'),
                'value' => get_post_meta($variation->ID, '_wapf_valid', true),
                'wrapper_class' => 'form-row-first',
                'options' => array(
                    '' => __('', 'wapf_woo_additional_fields'),
                    'true' => __('True', 'wapf_woo_additional_fields'),
                    'false' => __('False', 'wapf_woo_additional_fields'),
                )
            )
        );

//  Variation: Notes about this product
        woocommerce_wp_textarea_input(
            array(
                'id' => '_wapf_variable_description[' . $loop . ']',
                'label' => __('<br>Description', 'wapf_woo_additional_fields'),
//'placeholder' => '',
                'desc_tip' => 'true',
                'wrapper_class' => 'form-row-full',
                'description' => __('Enter variant description (will override post-content)', 'wapf_woo_additional_fields'),
                'value' => get_post_meta($variation->ID, '_wapf_description', true),
            )
        );


    }

    /**
     * Save new fields for variations
     *
     */
    public static function wapf_save_custom_variable_fields($post_id)
    {

        if (isset($_POST['variable_sku'])) {

            $variable_sku = $_POST['variable_sku'];
            $variable_post_id = $_POST['variable_post_id'];

            $max_loop = max(array_keys($_POST['variable_post_id']));

            for ($i = 0; $i <= $max_loop; $i++) {

                if (!isset($variable_post_id[$i])) {
                    continue;
                }

// Brand Field
                $_brand = $_POST['_wapf_variable_brand'];
//for ( $i = 0; $i < sizeof( $variable_sku ); $i++ ) :
                $variation_id = (int)$variable_post_id[$i];
                if (isset($_brand[$i])) {
                    update_post_meta($variation_id, '_wapf_brand', stripslashes($_brand[$i]));
                }
//endfor;

// MPN Field
                $_mpn = $_POST['_wapf_variable_mpn'];
//for ( $i = 0; $i < sizeof( $variable_sku ); $i++ ) :
                $variation_id = (int)$variable_post_id[$i];
                if (isset($_mpn[$i])) {
                    update_post_meta($variation_id, '_wapf_mpn', stripslashes($_mpn[$i]));
                }
//endfor;

// UPC Field
                $_upc = $_POST['_wapf_variable_upc'];
//for ( $i = 0; $i < sizeof( $variable_sku ); $i++ ) :
                $variation_id = (int)$variable_post_id[$i];
                if (isset($_upc[$i])) {
                    update_post_meta($variation_id, '_wapf_upc', stripslashes($_upc[$i]));
                }
//endfor;

// EAN Field
                $_ean = $_POST['_wapf_variable_ean'];
//for ( $i = 0; $i < sizeof( $variable_sku ); $i++ ) :
                $variation_id = (int)$variable_post_id[$i];
                if (isset($_ean[$i])) {
                    update_post_meta($variation_id, '_wapf_ean', stripslashes($_ean[$i]));
                }

// description Field
                $_descr = $_POST['_wapf_variable_description'];
//for ( $i = 0; $i < sizeof( $variable_sku ); $i++ ) :
                $variation_id = (int)$variable_post_id[$i];
                if (isset($_descr[$i])) {
                    update_post_meta($variation_id, '_wapf_description', stripslashes($_descr[$i]));
                }

// Valid Field
                $_valid = $_POST['_wapf_variable_valid'];
//for ( $i = 0; $i < sizeof( $variable_sku ); $i++ ) :
                $variation_id = (int)$variable_post_id[$i];
                if (isset($_valid[$i])) {
                    update_post_meta($variation_id, '_wapf_valid', stripslashes($_valid[$i]));
//update_post_meta( $variation_id, '_wapf_valid', "aha");
                }

            }

        }
    }

    //additional fields shortcodes
    public static function wapf_woo_additional_fields($atts)
    {
        $a = shortcode_atts(array(
            'name' => 'after_add_to_cart_button'
        ), $atts);
        add_action('woocommerce_' . $a['name'], array('WAPF_AdditionalFields', 'cart_product_feed_additional_fields'), 5);
    }

    //Display additional fields on product page
    public static function cart_product_feed_additional_fields()
    {
        global $post;
        echo '<div class="cpf_additional_product_fields">
        <ul>';
        if (strlen(get_post_meta($post->ID, "_wapf_brand", true)) > 0)
            echo '<li>' . __('Brand: ', 'wapf_woo_additional_fields') . get_post_meta($post->ID, "_wapf_brand", true) . '</li>';
        if (strlen(get_post_meta($post->ID, "_wapf_shipping_cost", true)) > 0)
            echo '<li>' . __('Shipping Cost: ', 'wapf_woo_additional_fields') . get_post_meta($post->ID, "_wapf_shipping_cost", true) . '</li>';
        if (strlen(get_post_meta($post->ID, "_wapf_notes", true)) > 0)
            echo '<li>' . __('Note: ', 'wapf_woo_additional_fields') . get_post_meta($post->ID, "_wapf_notes", true) . '</li>';
        echo '</ul></div>';
    }


    /**
     * Attached to activate_{ plugin_basename( __FILES__ ) } by register_activation_hook()
     * @static
     */
    public static function wapf_plugin_activation()
    {
        if (version_compare($GLOBALS['wp_version'], WAPF_ADDITIONAL_MINIMUM_WP_VERSION, '<')) {
            load_plugin_textdomain('wapf_woo_additional_fields');

            $message = '<strong>' . sprintf(esc_html__('Cart product feed additional plugin %s requires WordPress %s or higher.', 'wapf_woo_additional_fields'), WAPF_ADDITIONAL_FIELDS_VERSION, WAPF_ADDITIONAL_MINIMUM_WP_VERSION) . '</strong> ' . sprintf(__('Please <a href="%1$s">upgrade WordPress</a> to a current version', 'wapf_woo_additional_fields'));

            WAPF_AdditionalFields::wapf_bail_on_activation($message);
        }
    }

    private static function wapf_bail_on_activation($message, $deactivate = true)
    {
        ?>
        <!doctype html>
        <html>
        <head>
            <meta charset="<?php bloginfo('charset'); ?>"/>
            <style>
                * {
                    text-align: center;
                    margin: 0;
                    padding: 0;
                    font-family: "Lucida Grande", Verdana, Arial, "Bitstream Vera Sans", sans-serif;
                }

                p {
                    margin-top: 1em;
                    font-size: 18px;
                }
            </style>
        </head>
        <body>
        <p><?php echo esc_html($message); ?></p>
        </body>
        </html>
        <?php
        if ($deactivate) {
            $plugins = get_option('active_plugins');
            $wapf_additional_plugin = plugin_basename(WAPF_ADDITIONAL_PLUGIN_DIR . 'exportfeed-additional-plugin.php');
            $update = false;
            foreach ($plugins as $i => $plugin) {
                if ($plugin === $wapf_additional_plugin) {
                    $plugins[$i] = false;
                    $update = true;
                }
            }

            if ($update) {
                update_option('active_plugins', array_filter($plugins));
            }
        }
        exit;
    }

    /**
     * Removes all connection options
     * @static
     */
    public static function wapf_plugin_deactivation()
    {
        global $wpdb;
        $table = $wpdb->prefix . 'postmeta';
        $wpdb->delete($table, array('meta_key' => '_wapf_brand'));
        $wpdb->delete($table, array('meta_key' => '_wapf_mpn'));
        $wpdb->delete($table, array('meta_key' => '_wapf_upc'));
        $wpdb->delete($table, array('meta_key' => '_wapf_ean'));
        $wpdb->delete($table, array('meta_key' => '_wapf_shipping_cost'));
        $wpdb->delete($table, array('meta_key' => '_wapf_notes'));
    }
}


