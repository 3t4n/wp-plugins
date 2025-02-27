<?php
/**
 * Class DV_WooCommerce
 *
 * This class add some fields to WooCommerce product and add some short codes
 */
class DV_WooCommerce
{
    public function initialize()
    {
        add_action( 'pre_get_posts', 'DV_WooCommerce::search_product_by_sku' );
        add_shortcode( 'display_attribute', array($this,'display_product_attribute'));
        add_action( 'init', 'DV_WooCommerce::add_fields' );
        add_action( 'init', 'DV_WooCommerce::add_taxonomy_fields' );
    }

    public static function add_fields()
    {

        if( function_exists('acf_add_local_field_group') ):

            acf_add_local_field_group(array(
                'key' => 'group_59c8b21ff3927',
                'title' => __('Products', 'dadevarzan-wp-common'),
                'fields' => array(
                    array(
                        'key' => 'field_59c8b3ae3ef8c',
                        'label' => __('International title', 'dadevarzan-wp-common'),
                        'name' => 'en_title',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_5a521482ea621',
                        'label' => __('Banner image', 'dadevarzan-wp-common'),
                        'name' => 'prd_banner',
                        'type' => 'image',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'return_format' => 'array',
                        'preview_size' => 'full',
                        'library' => 'all',
                        'min_width' => '',
                        'min_height' => '',
                        'min_size' => '',
                        'max_width' => '',
                        'max_height' => '',
                        'max_size' => '',
                        'mime_types' => 'jpg,jpeg,png,gif',
                    ),
                    array(
                        'key' => 'field_59c8b40e3ef8d',
                        'label' => __('Catalog file', 'dadevarzan-wp-common'),
                        'name' => 'catalog',
                        'type' => 'file',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'return_format' => 'array',
                        'library' => 'all',
                        'min_size' => '',
                        'max_size' => '',
                        'mime_types' => 'zip,pdf,rar,doc,docx,jpg,jpeg,png,gif',
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'product',
                        ),
                    ),
                ),
                'menu_order' => 0,
                'position' => 'acf_after_title',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => '',
                'active' => 1,
                'description' => '',
            ));

        endif;

    }

    public static function add_taxonomy_fields()
    {

        if( function_exists('acf_add_local_field_group') ):

            acf_add_local_field_group(array(
                'key' => 'group_5a521cc09d371',
                'title' => __('Additional Info', 'dadevarzan-wp-common'),
                'fields' => array(
                    array(
                        'key' => 'field_5a521ccdfbda5',
                        'label' => __('Banner image', 'dadevarzan-wp-common'),
                        'name' => 'prd_arch_banner',
                        'type' => 'image',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'return_format' => 'array',
                        'preview_size' => 'full',
                        'library' => 'all',
                        'min_width' => '',
                        'min_height' => '',
                        'min_size' => '',
                        'max_width' => '',
                        'max_height' => '',
                        'max_size' => '',
                        'mime_types' => 'jpeg,jpg,png,gif',
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'taxonomy',
                            'operator' => '==',
                            'value' => 'product_cat',
                        ),
                    ),
                    array(
                        array(
                            'param' => 'taxonomy',
                            'operator' => '==',
                            'value' => 'product_tag',
                        ),
                    ),
                ),
                'menu_order' => 0,
                'position' => 'acf_after_title',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => '',
                'active' => 1,
                'description' => '',
            ));

        endif;
    }

    public static function search_product_by_sku( $query ) {

        if ( is_admin() || !$query->is_main_query() )
            return;

        if (!empty($_GET['search'])) {
            $query->set( 's',esc_sql($_GET['search']) );
        }

    }

    /**
     * Attribute shortcode callback.
     */
    public function display_product_attribute( $atts ) {

        global $product;

        if( ! is_object( $product ) || ! $product->has_attributes() ){
            return null;
        }

        // parse the shortcode attributes
        $args = shortcode_atts( array(
            'attribute' => ''
        ), $atts );

        if( empty($args['attribute']) ) {
            return null;
        }

        // get the WC-standard attribute taxonomy name
        $taxonomy = strpos( $args['attribute'], 'pa_' ) === false ? wc_attribute_taxonomy_name( $args['attribute'] ) : $args['attribute'];

        if( !taxonomy_is_product_attribute( $taxonomy ) ){
            return null;
        }

        return strip_tags( get_the_term_list( $product->id, $taxonomy, '' , ', ', '' ) );
    }
}
