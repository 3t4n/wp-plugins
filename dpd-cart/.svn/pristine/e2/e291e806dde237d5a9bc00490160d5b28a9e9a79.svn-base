<?php

class DPDCart_Setting_Page
{
    public $page_slug;
    public $options;
    private $fields;

    public function __construct()
    {
        session_start();
        $this->page_slug = 'dpd_cart_settings';
        $this->options = get_option('dpdcart-settings');
        add_action('admin_menu', array($this, 'add_admin_menu'));
        add_action('admin_init', array($this, 'settings_init'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_js'));

        $this->fields = [
            [
                'name' => 'button_color',
                'label' => __('Button Color', 'dpd-cart-plugin'),
                'type' => 'text',
                'class' => 'jscolor',
                'default' => '5ab84d',
            ],
            [
                'name' => 'button_hover_color',
                'label' => __('Button Hover Color', 'dpd-cart-plugin'),
                'type' => 'text',
                'class' => 'jscolor',
                'default' => '43de2d',
            ],
            [
                'name' => 'button_text_color',
                'label' => __('Button Text Color', 'dpd-cart-plugin'),
                'type' => 'text',
                'class' => 'jscolor',
                'default' => 'ffffff',
            ],
            [
                'name' => 'button_size',
                'label' => __('Store Button Size', 'dpd-cart-plugin'),
                'type' => 'select',
                'options' => ['small' => 'Small', 'medium' => 'Medium', 'large' => 'Large'],
                'default' => 'small',
            ],
            [
                'name' => 'button_size_product',
                'label' => __('Product Page Button Size', 'dpd-cart-plugin'),
                'type' => 'select',
                'options' => ['small' => 'Small', 'medium' => 'Medium', 'large' => 'Large'],
                'default' => 'small',
            ],
            [
                'name' => 'button_text',
                'label' => __('Button Text', 'dpd-cart-plugin'),
                'type' => 'text',
                'default' => 'Add to Cart',
            ],
            [
                'name' => 'price_position',
                'label' => __('Price Position', 'dpd-cart-plugin'),
                'type' => 'select',
                'options' => ['none' => 'Disabled', 'top' => 'Top', 'left' => 'Left', 'right' => 'Right'],
                'default' => 'top',
            ],
            [
                'name' => 'price_position_product',
                'label' => __('Price Position', 'dpd-cart-plugin'),
                'type' => 'select',
                'options' => ['none' => 'Disabled', 'top' => 'Top', 'left' => 'Left', 'right' => 'Right'],
                'default' => 'none',
            ],
            [
                'name' => 'price_color',
                'label' => __('Price Color', 'dpd-cart-plugin'),
                'type' => 'text',
                'class' => 'jscolor',
                'default' => '000000',
            ],
            [
                'name' => 'price_bg_color',
                'label' => __('Price Background Color', 'dpd-cart-plugin'),
                'type' => 'text',
                'class' => 'jscolor',
                'default' => 'ffffff',
            ],
            [
                'name' => 'store_short_description',
                'label' => __('Show Short Description on Store Page', 'dpd-cart-plugin'),
                'type' => 'select',
                'options' => ['1' => 'Show', '0' => 'Hide'],
                'default' => '1',
            ],
            [
                'name' => 'product_short_description',
                'label' => __('Show Short Description on Product Page', 'dpd-cart-plugin'),
                'type' => 'select',
                'options' => ['1' => 'Show', '0' => 'Hide'],
                'default' => '1',
            ],
            [
                'name' => 'use_lightbox',
                'label' => __('Use lightbox?', 'dpd-cart-plugin'),
                'type' => 'select',
                'options' => ['1' => 'Yes', '0' => 'No'],
                'default' => '1',
            ],
            [
                'name' => 'use_buy',
                'label' => __('Use buy now?', 'dpd-cart-plugin'),
                'type' => 'select',
                'options' => ['1' => 'Yes', '0' => 'No'],
                'default' => '0',
            ],[
                'name' => 'show_price',
                'label' => __('Show Price on Store Page?', 'dpd-cart-plugin'),
                'type' => 'select',
                'options' => ['1' => 'Yes', '0' => 'No'],
                'default' => '0',
            ],[
                'name' => 'show_price_product',
                'label' => __('Show Price on Product Page?', 'dpd-cart-plugin'),
                'type' => 'select',
                'options' => ['1' => 'Yes', '0' => 'No'],
                'default' => '0',
            ],

        ];

    }

    public function add_admin_menu()
    {
        add_submenu_page('options-general.php', 'DPD Cart Plugin', 'DPD Cart Plugin', 'manage_options', 'dpd_cart_plugin', array($this, 'option_page_render'));
    }

    public function option_page_render()
    {
        ?>
        <form action='options.php' method='post'>
            <?php
            settings_fields($this->page_slug);
            do_settings_sections($this->page_slug);
            submit_button();
            ?>
        </form>
        <?php

    }

    public function enqueue_js()
    {
        wp_enqueue_script('jscolor', plugin_dir_url(__FILE__) . 'js/jscolor.js', array('jquery'));
    }

    public function settings_init()
    {
        register_setting($this->page_slug, 'dpdcart-settings', array('sanitize_callback' => array($this, 'sanitize')));

        add_settings_section(
            'DPDCart_pluginPage_section',
            __('DPD Cart Settings', 'dpd-cart-plugin'),
            function () {
                echo __('DPD Cart Plugin Settings', 'dpd-cart-plugin');
            },
            $this->page_slug
        );

        add_settings_field(
            'user-name',
            __('API Username ', 'dpd-cart-plugin'),
            function () {
                $this->generate_singular_field('user-name');
            },
            $this->page_slug,
            'DPDCart_pluginPage_section'
        );

        add_settings_field(
            'api-key',
            __('API Key ', 'dpd-cart-plugin'),
            function () {
                $this->generate_singular_field('api-key');
            },
            $this->page_slug,
            'DPDCart_pluginPage_section'
        );
        if (isset($this->options['valid']) && $this->options['valid']) {
            add_settings_field(
                'store',
                __('Select Store', 'dpd-cart-plugin'),
                array($this, 'store_render'),
                $this->page_slug,
                'DPDCart_pluginPage_section'
            );

            add_settings_field(
                'product_page',
                __('Product Page', 'dpd-cart-plugin'),
                array($this, 'product_page_render'),
                $this->page_slug,
                'DPDCart_pluginPage_section'
            );

            foreach ($this->fields as $field) {

                add_settings_field(
                    $field['name'],
                    $field['label'],
                    function () use ($field) {

                        if (!isset($field['class'])) {
                            $class = '';
                        } else {
                            $class = $field['class'];
                        }
                        if ($field['type'] == 'text') {
                            $this->generate_singular_field($field['name'], $field['type'], $field['default'], $class);
                        } else if ($field['type'] == 'select') {
                            $this->generate_select_field($field['name'], $field['options'], $field['default']);
                        }
                    },
                    $this->page_slug,
                    'DPDCart_pluginPage_section'
                );
            }

        }
    }


    public function sanitize($inputs)
    {
        /*
         * Check Auth
         */
        $dpd = new DPD_Cart_API();
        $inputs['valid'] = $dpd->check_auth($inputs['user-name'], $inputs['api-key']);
        /*
         * Get Store URL
         */
        $store = $dpd->store($inputs['store'], $inputs['user-name'], $inputs['api-key']);
        if ($store) {
            $inputs['subdomain'] = $store['subdomain'];
            $inputs['ready'] = true;
        } else {
            $inputs['ready'] = false;
        }

        return $inputs;
    }

    private function generate_singular_field($name, $type = 'text', $default = "", $class = "")
    {
        $old = $default;
        if (isset($this->options[$name])) {
            $old = $this->options[$name];
        }
        $output = sprintf("<input type='%s' name='dpdcart-settings[%s]' class='%s' 
               value='%s'>", $type, $name, $class, $old);
        echo $output;
    }

    private function generate_select_field($name, $options, $default)
    {
        $old = $default;
        if (isset($this->options[$name])) {
            $old = $this->options[$name];
        }
        echo "<select name='dpdcart-settings[" . $name . "]'>";
        foreach ($options as $vale => $key) {
            printf("<option value='%s' %s >%s</option>", $vale, selected($old, $vale), $key);
        }
        echo '</select>';
    }

    public function store_render()
    {
        $dpd = new DPD_Cart_API();
        $stores = $dpd->stores();
        $options = array();
        foreach ($stores as $store) {
            $_SESSION['dpdcart_stores'][$store['id']] = $store['subdomain'];
            $options[$store['id']] = $store['name'];
        }
        $this->generate_select_field('store', $options, '');
    }

    public function product_page_render()
    {
        $options = array(0 => '-- Don\'t use product page --');
        $pages = get_pages();
        foreach ($pages as $page) {
            $options[$page->ID] = $page->post_title;
        }
        $this->generate_select_field('product_page', $options, 0);
        echo "<label>The Page Must Contain shortcode [dpdcart-product-page]</label>";
    }

}

new DPDCart_Setting_Page();
