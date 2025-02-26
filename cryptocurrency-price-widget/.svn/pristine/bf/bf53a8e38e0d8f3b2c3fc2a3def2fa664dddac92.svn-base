<?php

/**
 * @version 1.2.4
 */

/*
Plugin Name: Cryptocurrency Price Widget
Plugin URI: https://co-in.io/crypto-price-widget/
Description: Gives you a customizable Cryptocurrency Price Widget for website with ⚡live real-time price update and flexible settings.
Version: 1.2.4
Author: CurrencyRate.today
Author URI: https://currencyrate.today/
License: GPLv2 or later
Text Domain: cryptocurrency-price-widget
Domain Path: /languages
*/

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

define('CRCPW_PATH', plugin_dir_path(__FILE__));
define('CRCPW_URL', plugin_dir_url(__FILE__));
define('CRCPW_PLUGIN_SLUG', 'cryptocurrency-price-widget');

class CRCPW_cryptocurrency_price_widget
{
    protected static $_instance = null;

    private $_flags;
    private $_coins;

    public static function get_instance()
    {
        if (!self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function __construct()
    {
        require_once CRCPW_PATH.'data/coins.php';
        require_once CRCPW_PATH.'data/flags.php';

        $this->_flags = $flags;
        $this->_coins = $coins;

        add_shortcode(CRCPW_PLUGIN_SLUG, [$this, 'CRCPW_shortcode']);
        add_action('admin_menu', [$this, 'CRCPW_add_plugin_page']);
        add_action('admin_enqueue_scripts', [$this, 'CRCPW_admin_settins_scripts']);
        add_action('admin_enqueue_scripts', [$this, 'CRCPW_admin_settins_styles']);
        add_action('wp_ajax_CRCPW_assets_data', [$this, 'CRCPW_assets_data_callback']);
        add_filter('plugin_action_links', [$this, 'CRCPW_plugin_action_links'], 10, 2);
    }

    public function CRCPW_shortcode($attr)
    {
        $js_object = '';
        $output = '';
        $signature = (1 == $attr['signature']) ? true : false;
        unset($attr['signature']);

        foreach ($attr as $key => $value) {
            if ('boxshadow' == $key) {
                $key = 'boxShadow';
            } elseif ('backgroundcolor' == $key) {
                $key = 'backgroundColor';
            }
            $js_object .= '"'.$key.'":"'.esc_js($value).'",';
        }

        $js_object = substr($js_object, 0, -1);

        $output .= '<script>!function(){var e=document.getElementsByTagName("script"),t=e[e.length-1],n=document.createElement("script");function r(){var e=crCryptocoinPriceWidget.init({'.$js_object.'});t.parentNode.insertBefore(e,t)}n.src="https://co-in.io/'.('en' != $this->CRCPW_get_lang() ? $this->CRCPW_get_lang().'/' : '').'widget/pricelist.js?items='.urlencode($attr['items']).'",n.async=!0,n.readyState?n.onreadystatechange=function(){"loaded"!=n.readyState&&"complete"!=n.readyState||(n.onreadystatechange=null,r())}:n.onload=function(){r()},t.parentNode.insertBefore(n,null)}();</script>'.(($signature) ? 'by <a href="https://currencyrate.today" target="_blank" rel="noopener">CurrencyRate.Today</a>' : '');

        return $output;
    }

    public function CRCPW_plugin_action_links($links, $file)
    {
        if ($file == plugin_basename(CRCPW_PATH.'/widget_init.php')) {
            $links[] = '<a href="'.admin_url('admin.php?page='.CRCPW_PLUGIN_SLUG).'">'.__('Settings', 'cryptocurrency-price-widget').'</a>';
        }

        return $links;
    }

    /**
     * Add options page.
     */
    public function CRCPW_add_plugin_page()
    {
        add_menu_page(
            'Settings Admin',
            'CR Crypto Price',
            'manage_options',
            CRCPW_PLUGIN_SLUG,
            [$this, 'CRCPW_admin_settins_page'],
            'data:image/svg+xml;base64,'.base64_encode('<svg height="512" width="512" xmlns="http://www.w3.org/2000/svg"><path d="m407.55338 3.81206c-47.16019 8.43203-78.32965 43.80881-78.58404 89.19436-.11049 19.64007 8.69559 70.63414 13.10248 75.86644 7.01634 8.33316 18.70681 7.67447 24.39209-1.37516 2.52079-4.01378 2.29595-8.5386-1.38245-27.84611-8.40265-44.10541-7.39921-62.03262 4.46471-79.75825 25.04092-37.41705 82.16352-34.8696 101.4395 4.52353 15.63098 31.94721 6.58336 100.50897-19.83745 150.33204-7.65104 14.42703-4.86557 25.03544 7.26174 27.65993 9.15041 1.97864 14.0391-2.36513 22.50085-19.99959 27.49362-57.29209 35.665-125.82176 19.55479-163.99765-15.55646-36.86365-56.74229-61.06577-92.91223-54.59954m-162.10688 80.57872c-6.07329.38263-11.94487 1.20568-13.04852 1.83098-6.67715 3.77624-224.13873 223.71779-226.39614 228.97705-3.56663 8.30877-3.41245 20.4156.3636 28.58827 3.67455 7.95438 153.4537 158.17471 161.42594 161.90345 10.21937 4.77905 22.5985 4.56847 32.04827-.54442 3.10153-1.67819 40.75285-38.65996 116.59511-114.51999l112.01476-112.04186 1.2347-7.52296c4.10625-24.9982-6.28014-159.08764-13.20398-170.46516-3.04371-5.00118-26.21267-11.10018-42.16742-11.10018-1.37603 0-1.05097 10.67389.71564 23.51647l1.60473 11.65744 5.46301 5.46085c26.87049 26.8523 7.20135 71.3352-30.74033 69.5222-29.22683-1.39571-47.11394-31.55431-34.73866-58.56967l2.50666-5.46984-2.06597-13.77989c-1.13577-7.57945-2.13021-18.83628-2.20859-25.01618l-.1439-11.23757-3.51267-.5059c-6.23389-.90008-54.35897-1.39956-65.74623-.68309m54.49002 92.65988 4.21803 4.29498-7.02919 6.97212-7.02919 6.97084 18.80703 18.81446 18.80703 18.81446-5.47714 5.54175-5.47585 5.54175-18.83401-18.80162-18.83401-18.8029-6.81719 6.76026-6.81848 6.76155-4.457-4.53894-4.457-4.53766 19.03573-19.04429c10.46991-10.47359 19.28498-19.04301 19.58948-19.04301s2.45142 1.9337 4.77178 4.29626m-44.45438 50.97995c18.23144 4.58773 20.95523 23.02341 5.88828 39.84766l-5.68399 6.3481 7.68444 7.72455 7.68316 7.72455-5.30754 5.23744c-2.91909 2.8813-5.74053 5.23872-6.27115 5.23872-1.34905 0-45.64668-44.37377-45.64668-45.72582 0-1.70258 21.22632-21.99107 25.13728-24.02621 3.27755-1.70644 7.88744-3.1458 10.80396-3.37307.72206-.0565 3.29168.39547 5.71226 1.00409m-16.88624 18.90819-5.19448 4.96908 6.52426 6.60747 6.52426 6.60747 5.27029-5.46984c6.59749-6.84757 6.96623-9.96769 1.72164-14.56955-5.27671-4.62882-8.48488-4.22821-14.84596 1.85538m-24.12357 37.65074 7.26431 21.91917 8.09815 8.13414 8.09686 8.13414-5.53367 5.46214-5.53367 5.46085-8.29729-8.2497-8.29729-8.2497-21.55781-7.14675c-25.94029-8.60023-24.29702-7.24176-17.22029-14.23956l5.82661-5.76131 13.4558 5.56101c7.40178 3.05849 13.77572 5.44416 14.16502 5.30035s-1.82186-6.48677-4.91182-14.09704l-5.61975-13.8351 5.41804-5.48268c7.08572-7.16986 6.30456-8.0815 14.64682 17.09004m-47.13321 31.67244c7.97995 3.00071 13.6755 11.73063 13.20012 20.23199l-.33662 6.01811 13.80142 4.43622c15.95218 5.1283 15.39586 4.36303 8.27931 11.38523l-5.52211 5.45058-11.33587-3.72874c-13.28621-4.37074-13.43011-4.38358-16.45069-1.54722-3.31352 3.10985-3.04243 3.83146 3.95079 10.54421 10.19239 9.78408 9.90844 8.64132 3.69896 14.92522l-5.41418 5.47883-22.85675-22.82696c-12.57057-12.55367-22.85546-23.32258-22.85546-23.92863 0-.60733 4.9478-5.92566 10.99668-11.82051 14.51191-14.14326 22.29786-17.83348 30.8444-14.61834m-17.3038 19.13931-5.4553 5.15655 5.72896 5.87815c6.84289 7.02091 6.77994 7.01193 12.09647 1.59986 5.99877-6.10927 6.49471-9.72502 1.95805-14.25882-5.00305-4.9999-7.63562-4.70201-14.32819 1.62426m-25.25805 27.33893c7.75254 3.35381 7.85018 3.88282 1.85912 9.9754l-5.38592 5.47498-3.37262-1.98892c-8.13412-4.79574-18.72095 4.90103-15.01813 13.75678 3.47284 8.30748 17.28196 21.12309 23.92057 22.20036 7.63305 1.23778 14.88965-9.44382 10.94914-16.11677l-1.99017-3.37178 5.19962-5.13087c6.3007-6.2197 5.93068-6.19915 9.26861-.5059 9.20052 15.6892-5.78678 38.7614-25.17583 38.75883-16.3826-.00385-36.67358-20.37965-36.67358-36.8277 0-18.22767 20.60705-33.06686 36.41919-26.22442" fill="#000000" fill-rule="evenodd"/></svg>')
        );
    }

    public function CRCPW_admin_settins_scripts()
    {
        wp_register_script('CRCPW-select2', CRCPW_URL.'assets/select2/js/select2.min.js', ['jquery-core'], '4.0.5', true);
        // wp_register_script('CRCPW-select2-lang', CRCPW_URL.'assets/select2/js/i18n/'.$this->CRCPW_get_lang().'.js', ['jquery-core', 'CRCPW-select2'], '4.0.5', true);

        wp_enqueue_script('CRCPW-select2');
        // wp_enqueue_script('CRCPW-select2-lang');
        wp_enqueue_script('wp-color-picker');
    }

    public function CRCPW_admin_settins_styles()
    {
        wp_register_style('CRCPW-select2', CRCPW_URL.'assets/select2/css/select2.min.css', null, '4.0.5', 'all');
        wp_register_style('CRCPW-admin-style', CRCPW_URL.'assets/admin/css/style.css', null, '1.0.0', 'all');
        wp_enqueue_style('CRCPW-select2');
        wp_enqueue_style('CRCPW-admin-style');
        wp_enqueue_style('wp-color-picker');
    }

    public function CRCPW_admin_settins_page()
    {
        require_once CRCPW_PATH.'includes/crcpw-admin-settings.php';
    }

    public function CRCPW_get_lang()
    {
        $sl = trim(substr(get_bloginfo('language'), 0, 2));

        return (in_array($sl, ['en', 'es', 'ru', 'de', 'fr', 'pt'])) ? $sl : 'en';
    }

    /*
    * Callback functions
    */
    public function CRCPW_assets_data_callback()
    {
        if (!isset($_GET['nonce']) || !check_ajax_referer('crcpw_nonce', 'nonce', false)) {
            wp_send_json_error(['message' => __('Invalid nonce.', 'cryptocurrency-price-widget')], 400);
            wp_die();
        }
    
        $page = isset($_GET['page']) ? (int) sanitize_text_field(wp_unslash($_GET['page'])) : 0;
        $type = isset($_GET['type']) ? sanitize_text_field(wp_unslash($_GET['type'])) : '';
        $q = isset($_GET['q']) ? sanitize_text_field(wp_unslash($_GET['q'])) : null;
    
        if (empty($type)) {
            wp_send_json_error(['message' => __('Missing type parameter.', 'cryptocurrency-price-widget')], 400);
            wp_die();
        }
    
        $icons = ('flags' === $type) ? ($this->_flags + $this->_coins) : ($this->_coins + $this->_flags);
        $results = [];
    
        foreach ($icons as $key => $value) {
            $tmpl = [
                'id' => $key,
                'text' => $value,
                'fiat' => isset($this->_flags[$key]) ? 1 : 0,
            ];
            if (empty($q) || false !== stripos($key, $q)) {
                $results[] = $tmpl;
            }
        }
    
        wp_send_json($this->_CRCPW_result_assets_data_callback($results, $page), 200);
    }

    private function _CRCPW_result_assets_data_callback($results, $page)
    {
        $page = $page > 1 ? ($page - 1) : 0;
        $i = 0;
        $limit = 100;
        $count = count($results);
        $results = array_slice($results, $page * $limit, $limit);

        $more = ($count > (($page + 1) * $limit));

        return [
            'results' => $results,
            'pagination' => [
                'more' => $more,
            ],
        ];
    }
}

function CRCPW_load_plugin_textdomain()
{
    load_plugin_textdomain('cryptocurrency-price-widget', false, basename(dirname(__FILE__)).'/languages/');
}
add_action('plugins_loaded', 'CRCPW_load_plugin_textdomain');

$GLOBALS['CRCPW_cryptocurrency_price_widget'] = CRCPW_cryptocurrency_price_widget::get_instance();
