<?php

namespace Awesomesauce\Frontend;

use Awesomesauce\Functions;
use Awesomesauce\Awesomesauce;
use Awesomesauce\GoogleFonts\GoogleFonts;

if (!defined('ABSPATH')) {
    exit;
}

class Frontend {

    private $count = 1000;
    static $block_ids = array();
    static $loaded_fonts = array();

    public function __construct() {
        add_action('wp', array(
            $this,
            'process_actions'
        ));

        add_action('wp', array(
            $this,
            'pre_process_shortcode'
        ));

        add_shortcode('awesomesauce', array(
            $this,
            'process_shortcode'
        ));
    }

    public function process_actions() {
        global $wpdb;

        $results = wp_cache_get('awesomesauce_action_results');

        if (false === $results) {
            //Using WP native database functions would take a lot more processing
            $results = $wpdb->get_results("SELECT post_id, meta_value FROM " . $wpdb->base_prefix . "postmeta WHERE meta_key='awesomesauce_action'"); //phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery
            wp_cache_set('awesomesauce_action_results', $results, '', 3600);
        }

        foreach ($results as $result) {
            $result->post_id = intval($result->post_id);

            //action||priority||page_id, example: astra_header||11||360, astra_footer||2
            if (Functions::string_contains($result->meta_value, ',')) {
                $action_parts = explode(',', $result->meta_value);
            } else {
                $action_parts = array($result->meta_value);
            }

            foreach ($action_parts as $action_part) {
                if (Functions::string_contains($action_part, '||')) {
                    $helper   = explode('||', $action_part);
                    $action   = $helper[0];
                    $priority = $helper[1];
                    if (isset($helper[2])) {
                        $page_id = $helper[2];
                    }
                } else {
                    $action   = $action_part;
                    $priority = 10;
                }

                if (!isset($page_id) || ($page_id == get_the_ID())) {
                    //for pre-processing
                    if (!in_array($result->post_id, self::$block_ids)) {
                        self::$block_ids[] = $result->post_id;
                    }
                    add_action($action, function () use ($result) {
                        echo do_shortcode('[awesomesauce id="' . $result->post_id . '"]');

                    }, $priority);
                }
            }
        }
    }

    private function call_in_common_scripts($call_to_footer = false) {
        $functions = new Functions();

        $configuration_scripts = 'window.awesomesauce_configuration = {in_view_delay:' . $functions::get_option('in_view_delay', '500') . ', resize_observer_delay:' . $functions::get_option('resize_observer_delay', '200');

        $force_fullwidth_delay = $functions::get_option('force_fullwidth_delay');
        if ($force_fullwidth_delay > 0) {
            $configuration_scripts .= ', force_fullwidth_delay:' . $force_fullwidth_delay;
        }

        $configuration_scripts .= '};';

        $functions->call_script('configuration_scripts', $configuration_scripts, '', 'js', array('jquery'), 10, 0, false, $call_to_footer);

        $functions->call_script('common_js', '', Awesomesauce::$plugin_url . '/Awesomesauce/Frontend/frontend.js', 'js', array(
            'jquery',
            'awesomesauce_block_js_configuration_scripts'
        ), 10, 1, false, $call_to_footer);
        $functions->call_script('common_css', '', Awesomesauce::$plugin_url . '/Awesomesauce/Frontend/frontend.css', 'css', '', 10, 1, false, $call_to_footer);

        $custom_css = $functions::get_option('custom_css', '');
        if (!empty($custom_css)) {
            $functions->call_script('global_custom_css', $functions->process_variables($custom_css), '', 'css', '', 10, 0, false, $call_to_footer);
        }

        $this->count--;
        switch (Functions::get_option('load_google_fonts', 1, true)) {
            case 0:
                break;

            case 1:
                Functions::call_in_file('GoogleFonts/GoogleFonts.php');
                $functions->call_script('google_fonts' . ($call_to_footer ? '_footer' : ''), '', GoogleFonts::get_url(!$call_to_footer), 'css', '', $this->count, 0, $call_to_footer, $call_to_footer);
                break;

            case 2:
                Functions::call_in_file('GoogleFonts/GoogleFonts.php');
                $google_fonts = new GoogleFonts();
                $google_fonts->store_fonts_locally();

                $functions->call_script('local_google_fonts' . ($call_to_footer ? '_footer' : ''), GoogleFonts::$local_fonts_css, '', 'css', '', 10, 0, $call_to_footer, $call_to_footer);
                if (!$call_to_footer) {
                    GoogleFonts::$local_fonts_css = '';
                }
                break;
        };
    }

    public function pre_process_shortcode() {
        $functions = new Functions();

        global $post;
        if (isset($post)) {
            //handling shortcodes
            if (is_singular() && preg_match_all('/' . get_shortcode_regex(array('awesomesauce')) . '/s', $post->post_content, $matches) && array_key_exists(2, $matches) && in_array('awesomesauce', $matches[2])) {
                if (!empty($matches[3][0])) {
                    foreach ($matches[3] as $match) {
                        preg_match_all('/(\w+)=["\']([^"\']*)["\']/', $match, $parameters, PREG_SET_ORDER);

                        foreach ($parameters as $parameter) {
                            $parameter[2] = trim($parameter[2], '\'"');
                            if ($parameter[1] == 'id') {
                                $id = intval($parameter[2]);
                                if (!in_array($id, self::$block_ids)) {
                                    if (get_post_status($id) == 'publish') {
                                        self::$block_ids[] = $id;
                                    }
                                }
                            }
                        }
                    }
                }
            }

            //handling wp blocks
            if (is_singular() && has_blocks($post)) {
                $blocks = parse_blocks($post->post_content);

                foreach ($blocks as $block) {
                    if ($block['blockName'] === 'awesomesauce/block') {
                        if (!empty($block['attrs']['awesomesauceID'])) {
                            $id = intval($block['attrs']['awesomesauceID']);
                            if (!in_array($id, self::$block_ids)) {
                                if (get_post_status($id) === 'publish') {
                                    self::$block_ids[] = $id;
                                }
                            }
                        }
                    }
                }
            }

            if (!empty(self::$block_ids)) {
                $functions->call_all_script_manager(self::$block_ids);

                $this->call_in_common_scripts();
            }
        }
    }

    private function remove_shortcode_quotes($value) {
        //WordPress returns HTML encoded starting and ending quotes, when multiple parameters are being used in shortcodes
        return preg_replace('/^&#[0-9]+;|&#[0-9]+;$/', '', $value);
    }

    public function process_shortcode($parameters) {
        $parameters['id'] = $this->remove_shortcode_quotes($parameters['id']);

        $functions = new Functions($parameters['id']);

        //handle shortcodes outside WP content, for example do_shortcode function in theme files (CSS and JS is called in to footer)
        if (!in_array(intval($parameters['id']), self::$block_ids) && get_post_status($parameters['id']) == 'publish') {
            $functions->call_all_script_manager(array($parameters['id']), true);

            $this->call_in_common_scripts(true);
        }

        foreach ($parameters as $parameter => $value) {
            $value = $this->remove_shortcode_quotes($value);

            switch ($parameter) {
                case 'id':
                    break;

                case 'language':
                    if (get_locale() != $value) {
                        return '';
                    }
                    break;

                case 'login_state':
                    $value = boolval($value);
                    if (is_user_logged_in()) {
                        if (!$value) {
                            return '';
                        }
                    } else {
                        if ($value) {
                            return '';
                        }
                    }
                    break;

                case 'page_id':
                    if (get_the_ID() != intval($value)) {
                        return '';
                    }
                    break;

                case 'home':
                    $value = boolval($value);
                    $home  = (is_home() || is_front_page());
                    if (($value && !$home) || (!$value && $home)) {
                        return '';
                    }
                    break;

                case 'role':
                    $current_user = wp_get_current_user();
                    if (!in_array($value, $current_user->roles)) {
                        return '';
                    }
                    break;

                case 'cap':
                    $current_user = wp_get_current_user();
                    if (!isset($current_user->allcaps[$value]) || !$current_user->allcaps[$value]) {
                        return '';
                    }
                    break;

                default:
                    //$value is already html escaped, so no need for further sanitization
                    $functions->overwrite_value($parameters['id'], $parameter, $value);
                    break;
            }
        }

        return $functions->display_block();
    }
}