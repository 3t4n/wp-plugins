<?php

/**
 * @version 1.4.0
 */
/*
    Plugin Name: Currency Converter Calculator
    Plugin URI: http://currencyrate.today/converter-widget
    Description: Simple and powerful real-time Currency Converter widget for your website or blog. Included <strong>195+ world currencies</strong> with <strong>popular cryptocurrencies</strong>. Automatically update exchange rates. Multi Language support: English, Русский, Italiano, Français, Español, Deutsch, 中国, Português, 日本語, Bahasa Indonesia, हिन्दी.
    Version: 1.4.0
    Author: CurrencyRate.today
    Author URI: https://currencyrate.today
    License: GPLv2 or later
    Text Domain: currency-converter-calculator
    Domain Path: /languages
*/

/*
    Load functions
*/
require_once 'functions.php';
require_once 'languages.php';
$plugin_version = '1.4.0';

/*
    Init widget
*/
add_action('widgets_init', function () {
    register_widget('ccc_currency_converter_calculator');
});

/*
    Admin enqueue scripts
*/
add_action('admin_enqueue_scripts', function ($hook) {
    global $plugin_version;
    if ('widgets.php' != $hook) {
        return;
    }
    wp_enqueue_script(
        'ccc_jscolor',
        plugin_dir_url(__FILE__) . 'assets/jscolor.min.js',
        array(),
        $plugin_version,
        true
    );
});

/*
    Shortcode
*/
function callback_ccc_currency_converter_calculator($atts, $content = null)
{
    $_lg = ccc_return_language_detected();
    extract(shortcode_atts(array(
        'size_width' => '100%',
        'fm' => 'EUR',
        'to' => 'USD',
        'st' => 'info',
        'bg' => 'FFFFFF',
        'lg' => $_lg,
        'tz' => 0,
        'lr' => 0,
        'rd' => 0,
    ), $atts, 'ccc_currency_converter_calculator'));

    $lg = (empty($lg)) ? $_lg : ((in_array($lg, array_keys(ccc_return_list_languages()))) ? $lg : 'en');
    $fm = (empty($fm)) ? 'USD' : $fm;
    $to = (empty($to)) ? 'EUR' : $to;

    $height = (1 == $lr) ? 306 : 289;
    $params_build = array(
      'fm' => esc_attr($fm),
      'to' => esc_attr($to),
      'st' => esc_attr($st),
      'bg' => esc_attr($bg),
      'lg' => esc_attr($lg),
      'tz' => esc_attr($tz),
      'lr' => esc_attr($lr),
      'rd' => esc_attr($rd),
      'wp' => 'ccc_sc',
    );

    $size_width = isset($atts['size_width']) ? $atts['size_width'] : '100%';
    $language = ccc_widget_language(esc_attr($lg));

    $output = ccc_return_iframe($params_build, esc_attr($size_width), esc_attr($height), 1, esc_html($language['title']));

    return $output;
}

add_shortcode('ccc_currency_converter_calculator', 'callback_ccc_currency_converter_calculator');

/*
    Class of widget
*/
class ccc_currency_converter_calculator extends WP_Widget
{
    /*
        Register widget with WordPress.
    */
    public function __construct()
    {
        parent::__construct(
            'ccc_currency_converter_calculator',
            esc_html__('Currency Converter Calculator', 'currency-converter-calculator'),
            array(
                'description' => esc_html__('Real-time currency calculator with 190+ currencies, cryptocurrencies and custom design.', 'currency-converter-calculator'),
            )
        );

        $this->allowed_tags = array(
            'section' => array(
                'id' => array(),
                'class' => array(),
            ),
            'h2' => array(
                'class' => array(),
            ),
            'h3' => array(
                'class' => array(),
            ),
            'div' => array(
                'id' => array(),
                'class' => array(),
                'style' => array(),
            ),
            'iframe' => array(
                'title' => array(),
                'src' => array(),
                'height' => array(),
                'width' => array(),
                'frameborder' => array(),
                'scrolling' => array(),
                'class' => array(),
                'name' => array(),
                'style' => array(),
                'allow' => array(),
                'allowfullscreen' => array(),
                'referrerpolicy' => array(),
                'sandbox' => array(),
                'loading' => array(),
                'srcdoc' => array(),
                'importance' => array(),
                'aria-label' => array(),
                'aria-hidden' => array(),
                'csp' => array(),
            ),
            'p' => array(),
            'a' => array(
                'href' => array(),
                'class' => array(),
            ),
            'strong' => array(),
            'em' => array(),
            'br' => array(),
        );
    }

    /*
        Update the widget settings.
    */
    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance;

        $instance['fm'] = ccc_wrap_sanitize_text_field($new_instance['fm']);
        $instance['to'] = ccc_wrap_sanitize_text_field($new_instance['to']);
        $instance['lg'] = ccc_wrap_sanitize_text_field($new_instance['lg']);
        $instance['tz'] = ccc_wrap_sanitize_text_field($new_instance['tz']);
        $instance['st'] = ccc_wrap_sanitize_text_field($new_instance['st']);
        $instance['bg'] = ccc_wrap_sanitize_text_field($new_instance['bg']);
        $instance['lr'] = ccc_wrap_sanitize_text_field($new_instance['lr']);
        $instance['rd'] = ccc_wrap_sanitize_text_field($new_instance['rd']);
        $instance['title'] = ccc_wrap_sanitize_text_field($new_instance['title']);
        $instance['signature'] = ccc_wrap_sanitize_text_field($new_instance['signature']);
        $instance['size_width'] = ccc_wrap_sanitize_text_field($new_instance['size_width']);

        return $instance;
    }

    /*
        Update the widget settings.
        Make use of the get_field_id() and get_field_name() function when creating your form elements. This handles the confusing stuff.
    */
    public function form($instance)
    {
        /*
            Default widget settings
        */

        // Register script
        // admin_enqueue_scripts('ccc-jscolor', plugin_dir_url(__FILE__).'assets/jscolor.min.js');

        $defaults = array(
            'currency_name' => 'Euro',
            'title' => $this->_lang('title'),
            'size_width' => '100%',
            'signature' => 1,
            'fm' => 'EUR',
            'to' => 'USD',
            'lg' => ccc_return_language_detected(),
            'st' => 'info',
            'bg' => 'FFFFFF',
            'tz' => 0,
            'lr' => 0,
            'rd' => 0,
        );

        if (empty($instance)) {
            $instance = $defaults;
        }

        $currency_list = ccc_return_currency_list();

        $fm = ccc_wrap_sanitize_text_field($instance['fm']);
        $to = ccc_wrap_sanitize_text_field($instance['to']);
        $lg = ccc_wrap_sanitize_text_field($instance['lg']);
        $tz = ccc_wrap_sanitize_text_field($instance['tz']);
        $st = ccc_wrap_sanitize_text_field($instance['st']);
        $bg = ccc_wrap_sanitize_text_field($instance['bg']);
        $lr = ccc_wrap_sanitize_text_field($instance['lr']);
        $rd = ccc_wrap_sanitize_text_field($instance['rd']);
        $title = ccc_wrap_sanitize_text_field($instance['title']);
        $signature = ccc_wrap_sanitize_text_field($instance['signature']);
        $size_width = ccc_wrap_sanitize_text_field($instance['size_width']);

        echo '<p><label for="',esc_attr($this->get_field_id('title')),'">',esc_html($this->_lang('heading')),':',
        '<input id="',esc_attr($this->get_field_id('title')),'" type="text" name="',esc_attr($this->get_field_name('title')),'" value="',esc_attr($title),'" style="width:100%"></label></p>';

        echo '<p><label for="' . esc_attr($this->get_field_id('fm')) . '">' . esc_html($this->_lang('from_currency')) . ':',
        '<select id="' . esc_attr($this->get_field_id('fm')) . '" name="' . esc_attr($this->get_field_name('fm')) . '" style="width:100%">',
        wp_kses(
            ccc_print_select_options($fm, $currency_list, true),
            array(
                'option' => array(
                    'value'    => array(),
                    'selected' => array(),
                ),
            )
        ),
        '</select></label></p>';

        echo '<p><label for="' . esc_attr($this->get_field_id('to')) . '">' . esc_html($this->_lang('to_currency')) . ':',
        '<select id="' . esc_attr($this->get_field_id('to')) . '" name="' . esc_attr($this->get_field_name('to')) . '" style="width:100%">',
        wp_kses(
            ccc_print_select_options($to, $currency_list, true),
            array(
                'option' => array(
                    'value'    => array(),
                    'selected' => array(),
                ),
            )
        ),
        '</select></label></p>';

        echo '<p><label for="' . esc_attr($this->get_field_id('lg')) . '">' . esc_html($this->_lang('language')) . ':',
        '<select id="' . esc_attr($this->get_field_id('lg')) . '" name="' . esc_attr($this->get_field_name('lg')) . '" style="width:100%">',
        wp_kses(
            ccc_print_select_options($lg, ccc_return_list_languages()),
            array(
                'option' => array(
                    'value'    => array(),
                    'selected' => array(),
                ),
            )
        ),
        '</select></label></p>';

        echo '<p><label for="' . esc_attr($this->get_field_id('tz')) . '">' . esc_html($this->_lang('timezone')) . ':',
        '<select id="' . esc_attr($this->get_field_id('tz')) . '" name="' . esc_attr($this->get_field_name('tz')) . '" style="width:100%">',
        wp_kses(
            ccc_print_timezone_list($tz, $this->_timezones),
            array(
                'option' => array(
                    'value'    => array(),
                    'selected' => array(),
                ),
            )
        ),
        '</select></label></p>';

        echo '<p><label for="' . esc_attr($this->get_field_id('st')) . '">' . esc_html($this->_lang('theme')) . ':',
        '<select id="' . esc_attr($this->get_field_id('st')) . '" name="' . esc_attr($this->get_field_name('st')) . '" style="width:100%">',
        wp_kses(
            ccc_print_select_options($st, $this->_lang('themes')),
            array(
                'option' => array(
                    'value'    => array(),
                    'selected' => array(),
                ),
            )
        ),
        '</select></label></p>';

        echo '<script>jQuery(document).ready(function() {jscolor.installByClassName("jscolor");});</script>';

        echo '<p><label for="',esc_attr($this->get_field_id('bg')),'">',esc_html($this->_lang('background')),':',
        '<input class="jscolor" id="',esc_attr($this->get_field_id('bg')),'" name="',esc_attr($this->get_field_name('bg')),'" value="',esc_attr($bg),'" style="width:100%">',
        '</label></p>';

        echo '<p><label for="' . esc_attr($this->get_field_id('size_width')) . '">' . esc_html($this->_lang('size_width')) . ':',
        '<select id="' . esc_attr($this->get_field_id('size_width')) . '" name="' . esc_attr($this->get_field_name('size_width')) . '" style="width:100%">',
        wp_kses(
            ccc_print_select_options($size_width, $this->_lang('sizes')),
            array(
                'option' => array(
                    'value'    => array(),
                    'selected' => array(),
                ),
            )
        ),
        '</select></label></p>';

        echo '<p><label for="',esc_attr($this->get_field_id('lr')),'">',
        '<input type="checkbox" ',checked($lr, 1),' id="',esc_attr($this->get_field_id('lr')),'" name="',esc_attr($this->get_field_name('lr')),'" value="1">',
        esc_html($this->_lang('large')),
        '</label></p>';

        echo '<p><label for="',esc_attr($this->get_field_id('rd')),'">',
        '<input type="checkbox" ',checked($rd, 1),' id="',esc_attr($this->get_field_id('rd')),'" name="',esc_attr($this->get_field_name('rd')),'" value="1">',
        esc_html($this->_lang('straight_corners')),
        '</label></p>';

        echo '<p><label for="',esc_attr($this->get_field_id('signature')),'">',
        '<input type="checkbox" ',checked($signature, 1),' id="',esc_attr($this->get_field_id('signature')),'" name="',esc_attr($this->get_field_name('signature')),'" value="1">',
        esc_html($this->_lang('signature')),
        '</label></p>';

        $widget_params = array(
            'lg' => esc_attr($lg),
            'tz' => esc_attr($tz),
            'fm' => esc_attr($fm),
            'to' => esc_attr($to),
            'st' => esc_attr($st),
            'bg' => esc_attr(str_replace('#', '', $bg)),
            'lr' => esc_attr($lr),
            'rd' => esc_attr($rd),
            'size_width' => esc_attr($size_width),
            'signature' => esc_attr($signature),
            'wp' => 'ccc',
        );

        echo '<hr><div><h3>',esc_html($this->_lang('preview')),'</h3>', wp_kses($this->_output_widget(($widget_params), esc_attr($size_width)), $this->allowed_tags), '</div>';

        $short_attrs = '';
        unset($widget_params['wp']);
        foreach ($widget_params as $key => $value) {
            $short_attrs .= $key.'="'.$value.'" ';
        }

        echo '<hr>',
        '<div><h3>',esc_html($this->_lang('generated_shortcode')),'</h3>',
        '<textarea onclick="this.select()" style="width:100%;height:80px;">[ccc_currency_converter_calculator ',esc_html(trim($short_attrs)),'][/ccc_currency_converter_calculator]</textarea></div>',
        '<hr>';
    }

    /*
        Output widget
    */
    public function widget($args, $instance)
    {
        global $plugin_version;
        wp_register_style(
            'ccc-currency-converter-calculator',
            plugin_dir_url(__FILE__) . 'assets/frontend.css',
            array(),
            $plugin_version
        );
        wp_enqueue_style('ccc-currency-converter-calculator');

        extract($args);

        $lg = ccc_wrap_sanitize_text_field($instance['lg']);
        $tz = ccc_wrap_sanitize_text_field($instance['tz']);
        $fm = ccc_wrap_sanitize_text_field($instance['fm']);
        $to = ccc_wrap_sanitize_text_field($instance['to']);
        $st = ccc_wrap_sanitize_text_field($instance['st']);
        $bg = ccc_wrap_sanitize_text_field($instance['bg']);
        $lr = ccc_wrap_sanitize_text_field($instance['lr']);
        $rd = ccc_wrap_sanitize_text_field($instance['rd']);
        $title = ccc_wrap_sanitize_text_field($instance['title']);
        $signature = ccc_wrap_sanitize_text_field($instance['signature']);
        $size_width = ccc_wrap_sanitize_text_field($instance['size_width']);

        echo wp_kses_post($args['before_widget']);

        if (!empty($title)) {
            echo wp_kses_post($args['before_title']) . esc_html($title) . wp_kses_post($args['after_title']);
        }

        $_langs = [
            'en' => 'en', 'fr' => 'fr', 'ru' => 'ru', 'id' => 'id',
            'it' => 'it', 'de' => 'de', 'hi' => 'hi', 'pt' => 'pt',
            'ja' => 'ja', 'es' => 'es', 'zh' => 'cn'
        ];
        $_lg = strstr(get_locale(), '_', true);
        $_lg = isset($_langs[$_lg]) ? $_langs[$_lg] : 'en';
        $language = ccc_widget_language($_lg);

        $output = $this->_output_widget(
            array(
                'lg' => esc_attr($lg),
                'tz' => esc_attr($tz),
                'fm' => esc_attr($fm),
                'to' => esc_attr($to),
                'st' => esc_attr($st),
                'bg' => esc_attr(str_replace('#', '', $bg)),
                'lr' => esc_attr($lr),
                'rd' => esc_attr($rd),
                'wp' => esc_attr('ccc'),
            ),
            esc_attr($size_width),
            esc_attr($signature),
            esc_html($language['title'])
        );

        echo wp_kses($output, $this->allowed_tags);

        echo wp_kses_post($args['after_widget']);
    }

    // Private

    /*
        Timezone list
    */
    private $_timezones = array(
      array('-12', '(GMT -12:00) Eniwetok, Kwajalein'),
      array('-11', '(GMT -11:00) Midway Island, Samoa'),
      array('-10', '(GMT -10:00) Hawaii'),
      array('-9', '(GMT -9:00) Alaska'),
      array('-8', '(GMT -8:00) Pacific Time (US &amp; Canada)'),
      array('-7', '(GMT -7:00) Mountain Time (US &amp; Canada)'),
      array('-6', '(GMT -6:00) Central Time (US &amp; Canada), Mexico City'),
      array('-5', '(GMT -5:00) Eastern Time (US &amp; Canada), Bogota, Lima'),
      array('-4', '(GMT -4:00) Atlantic Time (Canada), Caracas, La Paz'),
      array('-3.5', '(GMT -3:30) Newfoundland'),
      array('-3', '(GMT -3:00) Brazil, Buenos Aires, Georgetown'),
      array('-2', '(GMT -2:00) Mid-Atlantic'),
      array('-1', '(GMT -1:00 hour) Azores, Cape Verde Islands'),
      array('0', '(GMT) Western Europe Time, London, Lisbon, Casablanca'),
      array('1', '(GMT +1:00 hour) Brussels, Copenhagen, Madrid, Paris'),
      array('2', '(GMT +2:00) Kaliningrad, South Africa'),
      array('3', '(GMT +3:00) Baghdad, Riyadh, Moscow, St. Petersburg'),
      array('3.5', '(GMT +3:30) Tehran'),
      array('4', '(GMT +4:00) Abu Dhabi, Muscat, Baku, Tbilisi'),
      array('4.5', '(GMT +4:30) Kabul'),
      array('5', '(GMT +5:00) Ekaterinburg, Islamabad, Karachi, Tashkent'),
      array('5.5', '(GMT +5:30) Bombay, Calcutta, Madras, New Delhi'),
      array('6', '(GMT +6:00) Almaty, Dhaka, Colombo'),
      array('7', '(GMT +7:00) Bangkok, Hanoi, Jakarta'),
      array('8', '(GMT +8:00) Beijing, Perth, Singapore, Hong Kong'),
      array('9', '(GMT +9:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk'),
      array('9.5', '(GMT +9:30) Adelaide, Darwin'),
      array('10', '(GMT +10:00) Eastern Australia, Guam, Vladivostok'),
      array('11', '(GMT +11:00) Magadan, Solomon Islands, New Caledonia'),
      array('12', '(GMT +12:00) Wellington, Auckland, New Zealand'),
    );

    /*
        Output widget
    */
    private function _output_widget($params, $width, $signature = null, $text = null)
    {
        $height = (1 == $params['lr']) ? 306 : 289;
        $output = ccc_return_iframe($params, $width, $height, $signature, $text);

        return $output;
    }

    /*
        Load languages text
    */
    private function _lang($value)
    {
        $_ccc_widget_language = ccc_widget_language(ccc_return_language_detected());

        return $_ccc_widget_language[$value];
    }
}
