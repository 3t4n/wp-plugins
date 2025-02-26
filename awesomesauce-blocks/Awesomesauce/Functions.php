<?php

namespace Awesomesauce;

use Awesomesauce\GoogleFonts\GoogleFontsList;
use Awesomesauce\GoogleFonts\GoogleFonts;
use Awesomesauce\Admin\Actions;
use Awesomesauce\Admin\AdminFields;
use Awesomesauce\Admin\BlockSettings;
use Awesomesauce\Admin\CssProcessor;
use WC_Product_Factory;

if (!defined('ABSPATH')) {
    exit;
}

class Functions {

    static $post_meta;
    static $post_id = 0;
    var $block = array(
        'category' => 'error',
        'type'     => 'error'
    );
    static $awesomesauce_block_settings = array();
    static $awesomesauce_block_script_settings = array();
    static $awesomesauce_block_settings_order = array();
    static $overwritten_values = array();
    static $extra_or_base_plugin_url;

    public function __construct($post_id = 0) {
        $this->init();

        if (!empty($post_id)) {

            self::$post_id = $post_id;
            $this->get_current_post_meta();

            $this->call_in_setting_files();
            if (Awesomesauce::$is_admin) {
                //This initiates a code, not processes it, so we don't need nonce verification
                $this->block['category'] = $this->get_value('category', isset($_GET['category']) ? sanitize_text_field(wp_unslash($_GET['category'])) : 'error'); //phpcs:ignore WordPress.Security.NonceVerification.Recommended
                $this->block['type']     = $this->get_value('type', isset($_GET['type']) ? sanitize_text_field(wp_unslash($_GET['type'])) : 'error'); //phpcs:ignore WordPress.Security.NonceVerification.Recommended

                self::call_in_file('GoogleFonts/GoogleFontsList.php');
                $this->call_script('awesomesauce_all_google_fonts', 'window.awesomesauce_all_google_fonts = ' . wp_json_encode(GoogleFontsList::$fonts) . ';', '', 'js');

                $custom_css = self::get_option('custom_css', '');
                if (!empty($custom_css)) {
                    $this->call_script('global_custom_css', $this->process_variables($custom_css));
                }

                $this->call_all_script_manager();
            } else {
                $this->block['category'] = $this->get_value('category', 'error');
                $this->block['type']     = $this->get_value('type', 'error');
            }

        } else {
            $this->call_in_setting_files();
        }
    }

    private function call_in_setting_files() {
        self::call_in_file('Admin/AdminFields.php');
        self::call_in_file('Admin/PreviewManager.php');
        self::call_in_file('Admin/BlockSettings.php');
        self::call_in_file('Admin/CssProcessor.php');
    }

    public function init() {
        //constructor call for blocks, which are extending the Functions class
    }

    private function get_current_post_meta() {
        self::$post_meta = null;

        if (Awesomesauce::$is_admin || get_post_status(self::$post_id) == 'publish') {
            $post_meta = json_decode(get_post_meta(self::$post_id, 'awesomesauce_block_data', true));

            if (is_object($post_meta)) {
                self::$post_meta                      = $post_meta;
                self::$post_meta->awesomesauce_action = get_post_meta(self::$post_id, 'awesomesauce_action', true);
                self::$post_meta->post_id             = self::$post_id;
            }
        }
    }

    public function html($inner, $tag, $attributes = array(), $echo = true, $skip_empty = false) {
        if (!Awesomesauce::$is_admin && $skip_empty && empty($inner)) {
            return '';
        }

        $attributes_html = '';
        foreach ($attributes as $attribute => $value) {
            $attributes_html .= ' ' . $attribute . '=\'' . $value . '\'';
        }

        if ($echo) {
            echo wp_kses('<' . $tag . $attributes_html . '>' . $inner . '</' . $tag . '>' . PHP_EOL, Sanitization::allowed_html());
        }

        return '<' . $tag . $attributes_html . '>' . $inner . '</' . $tag . '>' . PHP_EOL;
    }

    static function string_contains($haystack, $needle) {
        if (function_exists('str_contains')) {
            return str_contains($haystack, $needle);
        } else {
            return strpos($haystack, $needle) !== false;
        }
    }

    static function call_in_file($file) {
        if (file_exists(Awesomesauce::$inner_plugin_dir . '/' . $file)) {
            require_once(Awesomesauce::$inner_plugin_dir . '/' . $file);

            return true;
        } else {
            if (Functions::get_option('debug', '0')) {
                echo '<!-- Missing Awesomesauce file: ' . esc_html($file) . ' -->';
            }

            return false;
        }
    }

    static function call_in_block_file($file) {
        if (file_exists(Awesomesauce::$inner_plugin_dir . '/Blocks/' . $file)) {
            self::$extra_or_base_plugin_url = Awesomesauce::$plugin_url . '/Awesomesauce/Blocks';
            require_once(Awesomesauce::$inner_plugin_dir . '/Blocks/' . $file);

            return true;
        } else if (file_exists(Awesomesauce::$plugin_extra_dir . '/' . $file)) {
            self::$extra_or_base_plugin_url = Awesomesauce::$plugin_extra_url;
            require_once(Awesomesauce::$plugin_extra_dir . '/' . $file);

            return true;
        } else {
            if (Functions::get_option('debug', '0')) {
                echo '<!-- Missing Awesomesauce file: ' . esc_html($file) . ' -->';
            }

            return false;
        }
    }

    public function display_block() {
        self::call_in_file('Sanitization.php');

        if (Awesomesauce::$is_admin) {
            $fields = new AdminFields();
            $fields->input($this->block['category'], 'category', 'hidden', array(), true);
            $fields->input($this->block['type'], 'type', 'hidden', array(), true);
        }

        $html = '';
        if (file_exists(Awesomesauce::$inner_plugin_dir . '/Blocks/' . $this->block['category'] . '/' . $this->block['type']) || file_exists(Awesomesauce::$plugin_extra_dir . '/' . $this->block['category'] . '/' . $this->block['type'])) {
            if (self::call_in_block_file($this->block['category'] . '/' . $this->block['type'] . '/Html.php')) {
                $block_class_name = 'Awesomesauce\Blocks\\' . $this->block['category'] . '\\' . $this->block['type'] . '\\Html';
                $block            = new $block_class_name();

                if (Awesomesauce::$is_admin) {
                    $html .= wp_nonce_field('awesomesauce_save_block_settings', 'awesomesauce_block_nonce', true, false);
                    $html .= '<div id="awesomesauce_preview_container">';
                }

                $settings = new BlockSettings();
                $settings->display_common_settings();

                $force_fullwidth = false;
                $has_link        = false;
                foreach (self::$awesomesauce_block_settings as $name => $settings) {
                    switch ($name) {
                        case 'force_fullwidth':
                            if ($this->get_value($name)) {
                                $force_fullwidth = true;
                            }
                            break;

                        case 'block_link':
                            $link = $this->process_variables(trim($this->get_value($name)));
                            if (!empty($link)) {
                                $has_link    = true;
                                $link_target = $this->get_value($name . '_target', 'self');
                                $link_rel    = $this->get_value($name . '_rel');
                                $link_class  = $this->get_value($name . '_class');
                            }
                            break;

                        case 'custom_attributes':
                            $attributes = $this->process_attributes($this->get_value($name, ''));
                            break;
                    }
                }

                if ($has_link) {
                    $html .= '<a href="' . esc_url($link) . '" target="_' . esc_attr($link_target) . '"' . (!empty($link_rel) ? ' rel="' . esc_attr($link_rel) . '"' : '') . ' class="' . (!empty($link_class) ? 'awesomesauce_link ' . esc_attr($link_class) : 'awesomesauce_link') . '">';
                }

                $html .= '<div id="awesomesauce_block_' . self::$post_id . '" class="awesomesauce_block"' . $attributes . '><section class="' . strtolower(preg_replace('/\B([A-Z])/', '_$1', $this->block['category'] . $this->block['type'])) . ' awesomesauce_wrapper">' . $this->process_variables(self::get_option('debug', '0') ? $block->background_image() . $block->getHtml() : $this->minifyHTML($block->background_image() . $block->getHtml())) . '</section></div>';

                if ($has_link) {
                    $html .= '</a>';
                }

                if (Awesomesauce::$is_admin) {
                    //awesomesauce_preview_container
                    $html .= '</div>';
                }

                if ($force_fullwidth) {
                    $html = '<div class="awesomesauce_force_fullwidth_origin"></div><div class="awesomesauce_force_fullwidth">' . $html . '</div>';
                }
            } else {
                $html .= 'Awesomesauce block file missing:/' . $this->block['category'] . '/' . $this->block['type'] . '/Html.php';
            }
        } else {
            if (!file_exists(Awesomesauce::$inner_plugin_dir . '/Blocks/' . $this->block['category']) && !file_exists(Awesomesauce::$plugin_extra_dir . '/' . $this->block['category'])) {
                if (!$this->block['category'] == 'error') {
                    $html = 'Awesomesauce block category folder missing: ' . esc_html($this->block['category']);
                } else {
                    switch (get_post_status(self::$post_id)) {
                        case NULL:
                            $html = '<!-- Awesomesauce block does not exist: ' . self::$post_id . '  -->';
                            break;

                        default:
                            $html = '<!-- Awesomesauce block is not published: ' . self::$post_id . '  -->';
                            break;
                    }
                }
            } else {
                $html = 'Awesomesauce block type folder missing: ' . esc_html($this->block['type']);
            }
        }

        Sanitization::allowed_css();

        if (Awesomesauce::$is_admin) {
            echo wp_kses($html, Sanitization::allowed_html());
        }

        return wp_kses($html, Sanitization::allowed_html());
    }

    private function process_attributes($attributes) {
        $result = '';

        if (!empty($attributes)) {
            $parts = explode(PHP_EOL, $attributes);

            foreach ($parts as $part) {
                $attr = explode('=', $part);

                if (!in_array($attr[0], array(
                    'id',
                    'class'
                ))) {
                    $result .= ' ' . $attr[0];

                    if (isset($attr[1])) {
                        $attr[1] = str_replace(array(
                            '"',
                            '\''
                        ), '', $attr[1]);
                        $result  .= '=' . $attr[1];
                    }
                }
            }
        }

        return $this->sanitize_attributes($result);
    }

    private function sanitize_attributes($attributes) {

        return str_replace(array(
            '<div',
            '></div>'
        ), '', wp_kses('<div' . $attributes . '></div>', Sanitization::allowed_html()));
    }

    //example: {post_title}, {post_excerpt, 100, (etc.)}
    public function process_variables($html, $fallback = '') {

        preg_match_all('/\{(.*?)}/', $html, $variables);
        if (count($variables[1]) > 0) {
            $is_variable = true;
        } else {
            $is_variable = false;
        }
        if (!Awesomesauce::$is_admin) {
            for ($i = 0; $i < count($variables[1]); $i++) {
                $data_parts    = explode(',', $variables[1][$i]);
                $data_parts[0] = trim($data_parts[0], ' ');

                if (self::string_contains($data_parts[0], 'post_')) {
                    //WP Posts

                    $variable = substr($data_parts[0], 5);
                    switch ($variable) {
                        case 'title':
                            $value = get_the_title();
                            break;

                        case 'content':
                            $value = strip_shortcodes(get_the_content());
                            break;

                        case 'excerpt':
                            $value = strip_shortcodes(get_the_excerpt());
                            break;

                        case 'url':
                            $value = get_permalink();
                            break;

                        case 'image':
                            $value = wp_get_attachment_image_url(get_post_thumbnail_id(), 'full');
                            break;

                        case 'image_alt':
                            $value = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
                            break;

                        case 'thumbnail':
                            $value = wp_get_attachment_image_url(get_post_thumbnail_id());
                            break;

                        case 'author':
                            $value = get_the_author();
                            break;

                        case 'author_url':
                            $value = get_author_posts_url(get_the_author_meta('ID'));
                            break;

                        case 'author_avatar':
                            $value = get_avatar_url(get_the_author_meta('ID'));
                            break;

                        case 'id':
                            $value = get_the_ID();
                            break;
                    }

                } else if (self::string_contains($data_parts[0], 'meta_')) {
                    //Simple post meta data

                    $variable = substr($data_parts[0], 5);
                    $value    = get_post_meta(get_the_ID(), $variable, true);

                } else if (self::string_contains($data_parts[0], 'acf_')) {
                    //Advanced Custom Fields

                    //{acf_[name]}
                    //example: {acf_my_text}

                    $variable = substr($data_parts[0], 4);

                    //most values are simple fields
                    $value = get_field($variable);

                    //image field can also be array or ID
                    $field_object = get_field_object($variable);
                    if ($field_object['type'] == 'image') {
                        if (is_array($value)) {
                            $value = $value['url'];

                        } else if (is_numeric($value)) {
                            $image_src = wp_get_attachment_image_src($value, 'full');
                            $value     = $image_src[0];
                        }
                    }

                } else if (self::string_contains($data_parts[0], 'woo_') && class_exists('WC_Product_Factory', false)) {
                    //WooCommerce

                    $variable = substr($data_parts[0], 4);
                    switch ($variable) {
                        case 'price':
                            $woo   = new WC_Product_Factory();
                            $value = wc_price(wc_get_price_including_tax($woo->get_product()));
                            break;

                        case 'price_without_tax':
                            $woo   = new WC_Product_Factory();
                            $value = wc_price(wc_get_price_excluding_tax($woo->get_product()));
                            break;

                        case 'id':
                            $woo   = new WC_Product_Factory();
                            $value = $woo->get_product()
                                         ->get_id();
                            break;

                        case 'add_to_cart_url':
                            $woo = new WC_Product_Factory();
                            global $wp;
                            $value = home_url(add_query_arg(array(
                                'add-to-cart' => $woo->get_product()
                                                     ->get_id()
                            ), $wp->request));
                            break;
                    }

                } else if (self::string_contains($data_parts[0], 'tec_') && class_exists('Tribe__Events__Main', false)) {
                    //The Events Calendar

                    $variable = substr($data_parts[0], 4);
                    switch ($variable) {
                        case 'price':
                            $value = get_post_meta(get_the_ID(), '_EventCost', true);
                            break;

                        case 'currency':
                            $value = get_post_meta(get_the_ID(), '_EventCurrencySymbol', true);
                            break;

                        case 'url':
                            $value = get_post_meta(get_the_ID(), '_EventURL', true);
                            break;

                        case 'start_date':
                            $value = date_i18n(get_option('date_format'), get_post_meta(get_the_ID(), '_EventStartDate', true));
                            break;

                        case 'start_time':
                            $value = date_i18n(get_option('time_format'), get_post_meta(get_the_ID(), '_EventStartDate', true));
                            break;

                        case 'end_date':
                            $value = date_i18n(get_option('date_format'), get_post_meta(get_the_ID(), '_EventEndDate', true));
                            break;

                        case 'end_time':
                            $value = date_i18n(get_option('time_format'), get_post_meta(get_the_ID(), '_EventEndDate', true));
                            break;
                    }

                } else if (self::string_contains($data_parts[0], 'lang_')) {
                    //Languages

                    //example: {lang_en-GB:This is my text}
                    //for debugging: {lang_display}
                    if ($data_parts[0] == 'lang_display') {
                        $value = get_locale();
                    } else {
                        $variable       = substr($data_parts[0], 5);
                        $variable_parts = explode(':', $variable);
                        if (get_locale() != $variable_parts[0]) {
                            $value = '';
                        } else {
                            $value = $variable_parts[1];
                        }
                    }
                }

                if (isset($value)) {
                    if (isset($data_parts[1])) {
                        $data_parts[1] = intval($data_parts[1]);
                        if (strlen($value) > $data_parts[1]) {
                            $value = substr($value, 0, $data_parts[1]);
                            if (isset($data_parts[2])) {
                                $value .= wp_strip_all_tags($data_parts[2]);
                            } else {
                                $value .= '...';
                            }
                        }
                    }

                    $html = str_replace($variables[0][$i], wp_kses($value, Sanitization::allowed_html()), $html);
                }
            }
        } else {
            if (!empty($fallback) && $is_variable) {
                return $fallback;
            }

            //handling translations for admin preview
            if (preg_match('/{lang_[^}]+:([^}]+)}/', $html, $match)) {
                $firstTranslation = trim($match[1]);

                $html = str_replace($match[0], $firstTranslation, $html);
                $html = preg_replace('/{lang_[^}]+:[^}]+}/', '', $html);
            }
        }

        return $html;
    }

    public function display_preview() {
        $fields = new AdminFields();
        $fields->html($fields->input('Desktop', 'desktop_preview', 'button', array('class' => 'active'), false) . $fields->input('Tablet', 'tablet_preview', 'button', array(), false) . $fields->input('Mobile', 'mobile_preview', 'button', array(), false), 'div', array('class' => 'awesomesauce_setting_flex_container awesomesauce_preview_buttons'));

        $this->display_block();
    }


    public function call_all_script_manager($block_ids = array(), $skip_hook = false) {
        if (empty($block_ids)) {
            $this->call_all_script();
        } else {
            foreach ($block_ids as $block_id) {
                self::$post_id = $block_id;
                $this->get_current_post_meta();
                $this->block['category'] = $this->get_value('category', 'error');
                $this->block['type']     = $this->get_value('type', 'error');

                if ($this->block['category'] != 'error' && $this->block['type'] != 'error') {
                    $this->call_all_script($skip_hook);
                }
            }
        }
    }

    public function call_all_script($skip_hook = false) {
        if (self::call_in_block_file($this->block['category'] . '/' . $this->block['type'] . '/Css.php')) {
            $css_class_name = 'Awesomesauce\Blocks\\' . $this->block['category'] . '\\' . $this->block['type'] . '\\Css';
            $css            = new $css_class_name();
            $processor      = new CssProcessor();

            $processor->set_size_values(isset($css->height) ? $css->height : $css->common_setting('height', array(), '', array(), '', '', array(), 0), isset($css->font) ? $css->font : null);
            $this->call_script(self::$post_id, $processor->process_device_specific_css($css->getCss()), '', 'css', '', 10, 1, $skip_hook);

            $settings = new BlockSettings();
            $settings->display_common_script_settings();
        }

        if (self::call_in_block_file($this->block['category'] . '/' . $this->block['type'] . '/Js.php')) {
            $js_class_name      = 'Awesomesauce\Blocks\\' . $this->block['category'] . '\\' . $this->block['type'] . '\\Js';
            $js                 = new $js_class_name();
            $parts              = $js->getJs();
            $category_type_name = strtolower($this->block['category'] . '_' . $this->block['type']);

            if (isset($parts['library'])) {
                //unique library gets automatically generated id and folder
                $library_id     = $category_type_name . '_library';
                $library_folder = $this->block['type'];
                $source_folder  = Awesomesauce::$plugin_url . '/Awesomesauce/Blocks/';

                //commonly used library needs manually written id and folder
                if (is_array($parts['library'])) {
                    $library_id     = $parts['library'][0];
                    $library_folder = $parts['library'][1];
                    //3rd optional parameter to define if library should come from extra folder
                    if (isset($parts['library'][2]) && $parts['library'][2]) {
                        $source_folder = Awesomesauce::$plugin_extra_url . '/';
                    }
                }

                $this->call_script($library_id, '', $source_folder . $this->block['category'] . '/' . $library_folder . '/library.js', 'js', array('jquery'), 7, 1, $skip_hook);
            }

            if (isset($parts['common'])) {
                $common_scripts = '
                    function awesomesauce_debounce(func, delay) {
                        let debounceTimer;
                        return function () {
                            const context = this;
                            const args = arguments;
                            clearTimeout(debounceTimer);
                            debounceTimer = setTimeout(() => func.apply(context, args), delay);
                        };
                    }
                    
                    function awesomesauce_decode_html_entities(text) {
                        var helper_element = document.createElement("textarea");
                        helper_element.innerHTML = text;
                        return helper_element.value;
                    }';

                $this->call_script('awesomesauce_common_scripts', $common_scripts, '', 'js', array('jquery'), 8, 1, $skip_hook);

                $this->call_script($category_type_name, $parts['common'], '', 'js', array(
                    'jquery'
                ), 9, 1, $skip_hook);

                $unique = 'document.addEventListener("DOMContentLoaded", function() {';

                if (is_admin()) {
                    $unique .= '
                        window.awesomesauce_settings = {};
                        window.awesomesauce_phrases = {};
                        window.awesomesauce = {};';
                }

                if (isset($parts['unique'])) {
                    $unique .= $parts['unique'];
                }

                $unique .= 'window.awesomesauce[' . self::$post_id . '] = new Awesomesauce' . $this->block['category'] . $this->block['type'] . '("' . self::$post_id . '");' . PHP_EOL;

                if (Awesomesauce::$is_admin) {
                    $unique .= 'let event = new CustomEvent("in_view");
                        document.querySelector("#awesomesauce_block_' . self::$post_id . '").dispatchEvent(event);' . PHP_EOL;
                }

                if (isset($parts['reset']) && $parts['reset']) {
                    $unique .= 'if (typeof window.awesomesauce[' . self::$post_id . '].reset === "function") {
                        var block = document.querySelector("#awesomesauce_block_' . self::$post_id . '");
                        
                        let previousWidth = block.offsetWidth;
                        let previousHeight = block.offsetHeight;
                        
                        let debouncedReset = awesomesauce_debounce(() => {
                            window.awesomesauce[' . self::$post_id . '].reset();
                        }, ' . self::get_option('resize_observer_delay', '200') . ');
                        
                        let resizeObserver = new ResizeObserver(entries => {
                            let entry = entries[0];
                            let newWidth = entry.contentRect.width;
                            let newHeight = entry.contentRect.height;
                        
                            if (newWidth !== previousWidth || newHeight !== previousHeight) {
                                debouncedReset();
                            }
                        
                            previousWidth = newWidth;
                            previousHeight = newHeight;
                        });
                        
                        setTimeout(function() {
                            resizeObserver.observe(block);
                        }, 500);
                    }';
                }

                $unique .= '});';

            } else {
                $unique = '';
            }

            $this->call_script(self::$post_id, $unique, '', 'js', array('jquery'), 10, 1, $skip_hook);
        }

        self::call_in_file('GoogleFonts/GoogleFonts.php');
        $google_fonts_manager = new GoogleFonts();
        foreach (self::$awesomesauce_block_script_settings as $name => $settings) {
            //$settings[1] is the type, $name is the unique name for identification
            if ($settings[1] == 'font_settings') {
                $google_fonts_manager->store_font($this->get_value($name . '_font_family'));
                $google_fonts_manager->store_font_weight($this->get_value($name . '_font_weight'));
            } else if ($name == 'custom_css') {
                $custom_css = $this->get_value($name);
                if (!empty($custom_css)) {
                    $this->call_script(self::$post_id . '_custom', $this->process_variables($custom_css));
                }
            }
        }

        if ($google_fonts_manager->google_font_found()) {
            $google_fonts_manager->store_all_fonts();
        }
    }

    public function call_script($id, $inline_code, $file = '', $type = 'css', $dependency = array('jquery'), $priority = 10, $add_version = 1, $skip_hook = false, $call_to_footer = false) {
        if ($add_version) {
            $version = Awesomesauce::$version;
        } else {
            $version = null;
        }

        if ($call_to_footer) {
            if (Awesomesauce::$is_admin) {
                $action = 'admin_footer';
            } else {
                $action = 'wp_footer';
            }
        } else {
            if (Awesomesauce::$is_admin) {
                $action = 'admin_enqueue_scripts';
            } else {
                $action = 'wp_enqueue_scripts';
            }
        }

        if ($type == 'css') {
            if (!empty($inline_code)) {
                if (!self::get_option('debug', '0')) {
                    $inline_code = $this->minifyCSS($inline_code);
                }

                $inline_code = wp_strip_all_tags($inline_code);

                if ($skip_hook) {
                    wp_deregister_style('awesomesauce_block_css_' . $id);
                    wp_register_style('awesomesauce_block_css_' . $id, '', false, $version);
                    wp_enqueue_style('awesomesauce_block_css_' . $id);
                    wp_add_inline_style('awesomesauce_block_css_' . $id, $inline_code);
                } else {
                    add_action($action, function () use ($id, $version, $inline_code) {
                        wp_deregister_style('awesomesauce_block_css_' . $id);
                        wp_register_style('awesomesauce_block_css_' . $id, '', false, $version);
                        wp_enqueue_style('awesomesauce_block_css_' . $id);
                        wp_add_inline_style('awesomesauce_block_css_' . $id, $inline_code);
                    }, $priority);
                }

            } else if (!empty($file)) {

                if ($skip_hook) {
                    wp_deregister_style('awesomesauce_block_css_file_' . $id);
                    wp_enqueue_style('awesomesauce_block_css_file_' . $id, $file, array(), $version);

                } else {
                    add_action($action, function () use ($id, $file, $version) {
                        wp_enqueue_style('awesomesauce_block_css_file_' . $id, $file, array(), $version);
                    }, $priority);
                }
            }

        } else if ($type == 'js') {

            if (!empty($inline_code)) {

                if (!self::get_option('debug', '0')) {
                    $inline_code = $this->minifyJS($inline_code);
                }

                if ($skip_hook) {
                    wp_deregister_script('awesomesauce_block_js_' . $id);
                    wp_register_script('awesomesauce_block_js_' . $id, '', $dependency, $version, true);
                    wp_enqueue_script('awesomesauce_block_js_' . $id);
                    wp_add_inline_script('awesomesauce_block_js_' . $id, $inline_code);

                } else {
                    add_action($action, function () use ($id, $dependency, $version, $file, $inline_code) {
                        wp_deregister_script('awesomesauce_block_js_' . $id);
                        wp_register_script('awesomesauce_block_js_' . $id, '', $dependency, $version, true);
                        wp_enqueue_script('awesomesauce_block_js_' . $id);
                        wp_add_inline_script('awesomesauce_block_js_' . $id, $inline_code);
                    }, $priority);
                }
            } else if (!empty($file)) {

                if ($skip_hook) {
                    wp_enqueue_script('awesomesauce_block_js_file_' . $id, $file, $dependency, $version, true);

                } else {
                    add_action($action, function () use ($id, $file, $dependency, $version) {
                        wp_enqueue_script('awesomesauce_block_js_file_' . $id, $file, $dependency, $version, true);
                    }, $priority);
                }
            }
        }
    }

    public function display_settings() {
        echo '<div id="awesomesauce_admin_page" class="awesomesauce_block_settings">';
        echo '<div class="awesomesauce_block_setting_html">';
        $this->process_settings(self::$awesomesauce_block_settings);
        echo '</div>';
        echo '<div class="awesomesauce_block_setting_css">';
        $this->process_settings(self::$awesomesauce_block_script_settings);
        echo '</div>';
        echo '</div>';
    }

    private function process_settings($settings) {
        $fields = new AdminFields();
        if (!empty(self::$awesomesauce_block_settings_order)) {
            for ($i = 0; $i <= max(array_keys(self::$awesomesauce_block_settings_order)); $i++) {
                if (isset(self::$awesomesauce_block_settings_order[$i])) {
                    foreach (self::$awesomesauce_block_settings_order[$i] as $name) {
                        if (isset($settings[$name])) {
                            $data = $settings[$name];
                            echo '<div class="awesomesauce_block_setting">';
                            if (is_array($data[0])) {
                                if (!empty($data[0][0])) {
                                    $fields->title($data[0][0], 'h4', $data[0][1]);
                                }
                            } else if (!empty($data[0])) {
                                $fields->title($data[0]);
                            }
                            $function = $data[1];
                            $fields->$function($data[2], $name, ...$data[3]);
                            if (!empty($data[0])) {
                                $fields->html('', 'div', array('class' => 'awesomesauce_settings_divider'));
                            }
                            echo '</div>';
                        }
                    }
                }
            }
        }
    }

    public function display_logo() {
        echo '<img src="' . esc_url(Awesomesauce::$plugin_url) . '/Awesomesauce/Admin/Pages/big_logo.webp" alt="Logo" class="awesomesauce_big_logo_img hndle ui-sortable-handle">';
    }

    public function display_shortcode() {
        $fields = new AdminFields();
        $fields->html($this->html('[awesomesauce id="' . get_the_ID() . '"]', 'div', array('class' => 'awesomesauce_title'), false), 'div', array(
            'class'           => 'awesomesauce_title_container',
            'contenteditable' => 'true',
        ));
        $fields->description('Use this shortcode to publish your block anywhere!');
    }

    public function display_action() {
        $fields = new AdminFields();
        $fields->input('', 'action', 'text', array(
            'list'        => 'awesomesauce_theme_actions',
            'placeholder' => 'Action'
        ), true);
        $fields->description('Enter the hook name of a <a href="https://developer.wordpress.org/reference/functions/add_action/" target="_blank">WordPress action</a> to trigger your block\'s appearance.');

        self::call_in_file('Admin/Actions.php');
        $actions = Actions::get_actions();
        if (!empty($actions)) {
            $actions_html = '';
            foreach ($actions as $action) {
                $actions_html .= $fields->html('', 'option', array('value' => $action), false);
            }
            $fields->html($actions_html, 'datalist', array('id' => 'awesomesauce_theme_actions'));
        }
    }

    public function display_documentation() {
        $fields = new AdminFields();
        $fields->description('Feeling stuck? Dive into the docs or reach out for some help!');
        $fields->html('Documentation', 'a', array(
            'href'   => 'http://awesomesauce.great-site.net/docs/awesomesauce-blocks-documentation/configuration/getting-started',
            'target' => 'blank',
            'class'  => 'button-primary'
        ));
        $fields->html('Support', 'a', array(
            'href'   => 'https://wordpress.org/support/plugin/awesomesauce-blocks',
            'target' => 'blank',
            'class'  => 'button-secondary'
        ));
    }

    public function display_rating() {
        $fields = new AdminFields();
        $fields->description('Is everything fantabulous, or something doesn\'t want to work out? Let me know!');
        $fields->html($fields->html(' &#10025;', 'div', array(
                'class'       => 'awesomesauce_star',
                'data-rating' => '1'
            ), false) . $fields->html('&#10025;', 'div', array(
                'class'       => 'awesomesauce_star',
                'data-rating' => '2'
            ), false) . $fields->html('&#10025;', 'div', array(
                'class'       => 'awesomesauce_star',
                'data-rating' => '3'
            ), false) . $fields->html('&#10025;', 'div', array(
                'class'       => 'awesomesauce_star',
                'data-rating' => '4'
            ), false) . $fields->html('&#10025;', 'div', array(
                'class'       => 'awesomesauce_star',
                'data-rating' => '5'
            ), false), 'div', array(
            'class' => 'awesomesauce_star_container'
        ));
        wp_nonce_field('awesomesauce_save_global_settings', 'awesomesauce_global_settings_nonce');
    }

    //get post meta value in admin area post edit
    public function get_value($key, $default = '', $array = false) {
        if (!empty(self::$overwritten_values[self::$post_id][$key])) {
            if (array_key_exists($key, self::$awesomesauce_block_settings) || empty(self::$awesomesauce_block_settings)) {
                if ($array) {
                    return explode(PHP_EOL, self::$overwritten_values[self::$post_id][$key]);
                } else {
                    return self::$overwritten_values[self::$post_id][$key];
                }
            }
        } else {
            if ($key != 'post_id') {
                $key = 'awesomesauce_' . $key;
            }

            if (isset(self::$post_meta->$key)) {
                if ($array) {
                    return explode(PHP_EOL, stripslashes(self::$post_meta->$key));
                } else {
                    return stripslashes(self::$post_meta->$key);
                }
            }
        }

        return $default;
    }

    public function overwrite_value($id, $key, $value) {
        self::$overwritten_values[$id][$key] = $value;

        return null;
    }


    public function fix_image_url($url) {
        if (!empty($url) && !$this->string_contains($url, '//') && ($this->string_contains($url, '/') || $this->string_contains($url, '\\'))) {
            return Awesomesauce::$base_url . $url;
        } else {
            return $url;
        }
    }

    public function rgba_to_hex($color) {
        preg_match_all("/rgba\(.*?\)/", $color, $matches);
        foreach ($matches[0] as $match) {
            $color = str_replace($match, $this->single_rgba_to_hex($match), $color);
        }

        return $color;
    }

    public function single_rgba_to_hex($color) {
        preg_match_all("/([\\d.]+)/", $color, $matches);

        return sprintf("#%02X%02X%02X%02X", $matches[1][0], // red
            $matches[1][1], // green
            $matches[1][2], // blue
            $matches[1][3] * 255 // adjusted opacity
        );
    }

    public function hex_to_rgba($color) {
        preg_match_all("/#....../", $color, $matches);
        foreach ($matches[0] as $match) {
            $color = str_replace($match, $this->single_hex_to_rgba($match), $color);
        }

        return $color;
    }

    public function single_hex_to_rgba($color, $opacity = 1) {
        if (!self::string_contains($color, 'rgb')) {
            list($r, $g, $b) = sscanf($color, "#%02x%02x%02x");

            return 'rgba(' . $r . ',' . $g . ',' . $b . ',' . $opacity . ')';
        } else {
            return $color;
        }
    }

    public function single_rgb_to_rgba($color, $opacity = 1) {
        if (self::string_contains($color, 'rgb(')) {
            $color = str_replace(array(
                'rgb(',
                ')'
            ), array(
                'rgba(',
                ',' . $opacity . ')'
            ), $color);

        } else if (self::string_contains($color, 'rgba(')) {
            $parts = explode(',', $color);
            $color = $parts[0] . ',' . $parts[1] . ',' . $parts[2] . ',' . $opacity . ')';
        }

        return $color;
    }

    public function single_color_to_rgba($color, $opacity = 1) {
        if (empty($color)) {
            return 'rgba(255,255,255,0)';
        } else {
            return $this->single_rgb_to_rgba($this->single_hex_to_rgba($color, $opacity), $opacity);
        }
    }

    public function modify_color_opacity($color, $opacity) {
        if (!self::string_contains($color, 'rgba')) {
            $color = $this->single_color_to_rgba($color);
        }

        preg_match_all("/([\\d.]+)/", $color, $matches);

        $red   = intval($matches[1][0]);
        $green = intval($matches[1][1]);
        $blue  = intval($matches[1][2]);

        return 'rgba(' . $red . ',' . $green . ',' . $blue . ',' . $opacity . ')';
    }

    public function get_color_opacity($color) {
        if (strlen($color) < 7 || self::string_contains($color, 'gradient')) {
            return '1';
        }

        if (!self::string_contains($color, 'rgba')) {
            $color = $this->single_color_to_rgba($color);
        }

        preg_match_all("/([\\d.]+)/", $color, $matches);

        return $matches[1][3];
    }

    public function modify_color_percentage($color, $percentage, $opacity = false) {
        if (!self::string_contains($color, 'rgba')) {
            $color = $this->single_color_to_rgba($color);
        }

        preg_match_all("/([\\d.]+)/", $color, $matches);

        $red   = intval($matches[1][0]);
        $green = intval($matches[1][1]);
        $blue  = intval($matches[1][2]);

        if ($opacity === false) {
            $opacity = 1;
        } else {
            $opacity = boolval($matches[1][3]);
        }

        $red   = $this->modify_single_color_percentage($red, $percentage);
        $green = $this->modify_single_color_percentage($green, $percentage);
        $blue  = $this->modify_single_color_percentage($blue, $percentage);

        return 'rgba(' . $red . ',' . $green . ',' . $blue . ',' . $opacity . ')';
    }

    public function modify_single_color_percentage($color, $modifier) {
        $color = $color * $modifier / 100;

        if ($color > 255) {
            $color = 255;
        }

        if ($color < 0) {
            $color = 0;
        }

        return intval($color);
    }

    public function modify_color($color, $r, $g, $b, $opacity = false) {
        if (!self::string_contains($color, 'rgba')) {
            $color = $this->single_color_to_rgba($color);
        }

        preg_match_all("/([\\d.]+)/", $color, $matches);

        $red   = intval($matches[1][0]);
        $green = intval($matches[1][1]);
        $blue  = intval($matches[1][2]);

        if ($opacity === false) {
            $opacity = 1;
        } else {
            $opacity = boolval($matches[1][3]);
        }

        $red   = $this->modify_single_color($red, $r);
        $green = $this->modify_single_color($green, $g);
        $blue  = $this->modify_single_color($blue, $b);

        return 'rgba(' . $red . ',' . $green . ',' . $blue . ',' . $opacity . ')';
    }

    public function modify_single_color($color, $modifier) {
        $color = $color + $modifier;

        if ($color > 255) {
            $color = 255;
        }

        if ($color < 0) {
            $color = 0;
        }

        return $color;
    }

    public function divide_size_input_result($size_input, $divide_with, $return = '') {
        if ((!empty($return) && $return == 'desktop') || empty($return)) {
            $size_input['desktop'] = str_replace($size_input['desktop_value'], round($size_input['desktop_value'] / $divide_with), $size_input['desktop']);
        }
        if ((!empty($return) && $return == 'tablet') || empty($return)) {
            $size_input['tablet'] = str_replace($size_input['tablet_value'], round($size_input['tablet_value'] / $divide_with), $size_input['tablet']);
        }
        if ((!empty($return) && $return == 'mobile') || empty($return)) {
            $size_input['mobile'] = str_replace($size_input['mobile_value'], round($size_input['mobile_value'] / $divide_with), $size_input['mobile']);
        }

        if (isset($return)) {
            return $size_input[$return];
        } else {
            return $size_input;
        }
    }

    static function save_option($name, $value = false) {
        if (Awesomesauce::$is_admin && isset($_POST['awesomesauce_global_settings_nonce']) && wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['awesomesauce_global_settings_nonce'])), 'awesomesauce_save_global_settings')) {
            $name = 'awesomesauce_' . $name;
            if ($value === false && isset($_POST[$name])) {
                if (!is_array($_POST[$name])) {
                    $value = wp_strip_all_tags(wp_unslash($_POST[$name]));
                } else {
                    $value = array();
                    //$_POST[$name] is an array and cannot get sanitized here. Next line sanitizes it.
                    foreach ($_POST[$name] as $key => $item) { //phpcs:ignore WordPress.Security.ValidatedSanitizedInput.MissingUnslash, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
                        $value[wp_strip_all_tags(wp_unslash($key))] = wp_strip_all_tags(wp_unslash($item));
                    }
                }
            }

            if ($value !== false) {
                if (is_array($value)) {
                    foreach ($value as $k => $v) {
                        $value[$k] = wp_strip_all_tags($v);
                    }
                } else {
                    $value = wp_strip_all_tags($value);
                }

                if (get_option($name) !== false) {
                    update_option($name, $value);
                } else {
                    add_option($name, $value);
                }
            }
        }
    }

    static function get_option($name, $default = '', $intval = false) {
        if (!is_array(get_option('awesomesauce_' . $name, $default))) {
            if ($intval) {
                return intval(get_option('awesomesauce_' . $name, $default));
            } else {
                $value = wp_strip_all_tags(stripslashes(get_option('awesomesauce_' . $name, $default)));
            }
        } else {
            $value = get_option('awesomesauce_' . $name, $default);
        }

        if ($value === '') {
            return $default;
        } else {
            return $value;
        }
    }

    private function minifyJS($code) {
        $code = preg_replace('/\s+/', ' ', $code);

        return $code;
    }

    private function minifyCSS($code) {
        $code               = preg_replace('/\s+/', ' ', $code);
        $remove_space_after = array(
            '}',
            '{',
            ':',
            ';',
            ','
        );
        foreach ($remove_space_after as $char) {
            $code = str_replace($char . ' ', $char, $code);
        }

        $remove_space_before = array(
            '}',
            '{',
            ';',
            ','
        );
        foreach ($remove_space_before as $char) {
            $code = str_replace(' ' . $char, $char, $code);
        }

        $code = str_replace(';}', '}', $code);

        return $code;
    }

    private function minifyHTML($code) {
        //$code = preg_replace('/\s+/', ' ', $code);

        return $code;
    }
}