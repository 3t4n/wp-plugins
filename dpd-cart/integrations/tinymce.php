<?php

class DPDCart_Tinymce_Integrations
{
    public function __construct()
    {
        //if the user is using a version with no  guttenberg only then
        if (!function_exists('register_block_type')) {
            add_action('init', array($this, 'init'));
            add_action('admin_print_scripts', array($this, 'scripts'), 100);
        }

    }

    public function init()
    {
        //Abort early if the user will never see TinyMCE
        if (!current_user_can('edit_posts') && !current_user_can('edit_pages') && get_user_option('rich_editing') == 'true') {
            return;
        }

        //Add a callback to regiser our tinymce plugin
        add_filter("mce_external_plugins", array($this, 'register_plugin'));

        // Add a callback to add our button to the TinyMCE toolbar
        add_filter('mce_buttons', array($this, 'add_button'));
    }


    //This callback registers our plug-in
    public function register_plugin($plugin_array)
    {
        $plugin_array['dpdcart_add_button'] = plugins_url('dpd-cart/js/integrations/tinymce.js');
        return $plugin_array;
    }

    //This callback adds our button to the toolbar
    public function add_button($buttons)
    {
        //Add the button ID to the $button array
        $buttons[] = "dpdcart_add_button";
        return $buttons;
    }

    public function scripts()
    {
        $options = get_option('dpdcart-settings', true);
        if (!isset($options['ready']) | !$options['ready']) {
            $js_obj = array();
        } else {
            $js_obj = array();
            $dpd = new DPD_Cart_API();
            $products = $dpd->products();
            $i = 0;
            if ($products) {

                foreach ($products as $product) {
                    $shortcode = sprintf("[dpdcart-button id='%s' text='%s' size='%s' color='%s' hover_color='%s' text_color='%s' lightbox='%s' price_position='%s' price_color='%s' price_bg_color='%s' ]",
                        $product['id'],
                        $options['button_text'],
                        $options['button_size'],
                        $options['button_color'],
                        $options['button_hover_color'],
                        $options['button_text_color'],
                        $options['use_lightbox'],
                        $options['price_position'],
                        $options['price_color'],
                        $options['price_bg_color']
                    );

                    $js_obj[$i]['text'] = $product['name'];
                    $js_obj[$i]['shortcode'] = $shortcode;
                    $i++;
                }
            }
        }
        printf("<script>var DPDProducts=%s;</script>", json_encode($js_obj));
    }

}

new DPDCart_Tinymce_Integrations();