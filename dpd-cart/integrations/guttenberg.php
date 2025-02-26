<?php
/**
 * Created by PhpStorm.
 * User: rakib
 * Date: 17-Feb-19
 * Time: 11:18 PM
 */
class DPDCart_Gutenberg_Integration
{
    /**
     * DPDCart_Gutenberg_Integration constructor.
     */
    public function __construct()
    {
        add_action('init', array($this, 'register_block'));
    }

    /**register script, localize with data, register new editor block
     * @return bool|null
     */
    public function register_block()
    {
        //if the user is using a version with no guttenberg
        if (!function_exists('register_block_type')) {
            return false;
        }
        $options = get_option('dpdcart-settings');
        if (!isset($options['ready']) | !$options['ready']) {
            //if the API credentials settings are not ready to use then no need to proceed further.
            return false;
        }
        // this will hold the array to pass to the JS
        $js_object = $this->extract_options($options);
        $js_object['products'] = $this->products($options);

        wp_register_script(
            'dpdcart-guttenberg-blocks',
            plugins_url('../js/integrations/guttenberg_blocks.js', __FILE__),
            array('wp-blocks', 'wp-element', 'wp-editor')
        );
        wp_localize_script('dpdcart-guttenberg-blocks', 'DPD', $js_object);

        register_block_type('dpd-cart/block', array(
            'editor_script' => 'dpdcart-guttenberg-blocks'));
    }

    /**
     * extract array with proper key from options
     * @param $options array
     * @return array
     */
    private function extract_options($options)
    {
        $js_object = array();
        // they array format: new_key=> existing_key or, new_key => ['existing_key','prefix']
        $keys = [
            'data-bg-color' => 'button_color',
            'data-bg-color-hover' => 'button_hover_color',
            'data-button-size' => ['button_size', 'dpd-'],
            'data-text' => 'button_text',
            'data-text-color' => 'button_text_color',
            'data-pr-bg-color' => 'price_bg_color',
            'data-pr-color' => 'price_color',
            'data-variant' => ['price_position', 'price-'],
            'data-lightbox' => 'use_lightbox'
        ];
        foreach ($keys as $newKey => $key) {
            if (is_array($key)) {
                $js_object[$newKey] = $key[1] . $options[$key[0]];
            } else {
                $js_object[$newKey] = $options[$key];
            }
        }
        return $js_object;
    }

    /**
     * get an array containing ["product url" => "product name"]
     * @param $options array
     * @return array
     */
    private function products($options)
    {
        $product_array = array();
        $dpd = new DPD_Cart_API();
        $products = $dpd->products();
        foreach ($products as $product) {
            $p = new stdClass();
            $p->value = sprintf("https://%s.dpdcart.com/cart/%s?product_id=%s&amp;method_id=%s",
                $options['subdomain'],
                $options['use_buy'] == 1 ? 'buy' : 'add',
                $product['id'],
                $product['prices'][0]['id']
            );
            $p->label = $product['name'];
            $product_array[] = $p;
        }
        return $product_array;
    }

}

new DPDCart_Gutenberg_Integration();