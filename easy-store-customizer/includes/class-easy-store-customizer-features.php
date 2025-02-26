<?php

/**
 * This class is used to define the features of the plugin.
 *
 * @link       https://100xwpdev.com
 *
 * @package    Easy_Store_Customizer
 * @subpackage Easy_Store_Customizer/includes
 */

/**
 * This class is used to define the features of the plugin.
 *
 *
 * @package    Easy_Store_Customizer
 * @subpackage Easy_Store_Customizer/includes
 * @author     Bheru Lal Gameti  <bherulalgameti24@gmail.com>
 */
class Easy_Store_Customizer_Features
{
    /**
     * The unique identifier of this plugin.
     *
     
     * @access   protected
     * @var      string    $plugin_name    The string used to uniquely identify this plugin.
     */
    protected $plugin_name;

    /**
     * Settings class instance.
     *
     
     * @access   protected
     * @var      object    $settings    The settings class instance.
     */
    protected $settings;


    public function __construct($plugin_name, $settings)
    {
        $this->plugin_name = $plugin_name;
        $this->settings = $settings;
    }


    public function esc_rename_add_to_cart_button_label($label, $product)
    {
        if (!$this->settings->is_enabled('shop_add_to_cart')) {
            return $label;
        }

        $product_type = $product->get_type();

        $custom_label = $this->settings->get('shop_add_to_cart', $product_type) ?? null;

        return $custom_label ?: $label;
    }

    public function esc_product_qty_input_display_plus_button()
    {
        if (! is_product() && !$this->settings->is_enabled('product_qty_input_plus_minus')) return;
        echo '<button type="button" class="plus" >+</button>';
    }
    public function esc_product_qty_input_display_minus_button()
    {
        if (! is_product() && !$this->settings->is_enabled('product_qty_input_plus_minus')) return;
        echo '<button type="button" class="minus" >-</button>';
    }

    public function esc_product_qty_input_button_script()
    {
        if (!$this->settings->is_enabled('product_qty_input_plus_minus')) return;
        wc_enqueue_js("
          $('form.cart').on( 'click', 'button.plus, button.minus', function() {
                var qty = $( this ).closest( 'form.cart' ).find( '.qty' );
                var val   = parseFloat(qty.val());
                var max = parseFloat(qty.attr( 'max' ));
                var min = parseFloat(qty.attr( 'min' ));
                var step = parseFloat(qty.attr( 'step' ));
                if ( $( this ).is( '.plus' ) ) {
                   if ( max && ( max <= val ) ) {
                      qty.val( max );
                   } else {
                      qty.val( val + step );
                   }
                } else {
                   if ( min && ( min >= val ) ) {
                      qty.val( min );
                   } else if ( val > 1 ) {
                      qty.val( val - step );
                   }
                }
             });
       ");
    }
    public function esc_shop_product_per_page($per_page)
    {
        if (!$this->settings->is_enabled('shop_product_per_page')) return $per_page;

        $product_count = $this->settings->get('shop_product_per_page', 'count') ?? $per_page;

        return $product_count;
    }

    public function esc_product_input_hide_number_arrows()
    {
        $custom_css = '
        /* Firefox */
        .single-product form.cart input[type=number] {
            -moz-appearance: textfield;
        }

        /* Chrome, Safari, Edge, Opera */
        .single-product form.cart input::-webkit-outer-spin-button,
        .single-product form.cart input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    ';
        wp_add_inline_style($this->plugin_name, $custom_css);
    }
    public function esc_product_show_number_sold()
    {
        global $product;
        if (!$this->settings->is_enabled('product_show_number_sold')) {
            return;
        }
        $units_sold = $product->get_total_sales();
        $label = $this->settings->get('product_show_number_sold', 'label') ?? __('Item sold', 'easy-store-customizer');
        if ($units_sold > 0) {
            echo wp_kses(
                sprintf(
                    '<p class="product-number-sold">%s: %s</p>',
                    esc_html($label),
                    esc_html($units_sold)
                ),
                array(
                    'p' => array(
                        'class' => array()
                    )
                )
            );
        }
    }
}
