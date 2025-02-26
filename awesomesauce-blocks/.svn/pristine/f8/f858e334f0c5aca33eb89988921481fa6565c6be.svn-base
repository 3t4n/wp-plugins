<?php

namespace Awesomesauce\Admin;

if (!defined('ABSPATH')) {
    exit;
}

class Actions {

    static function get_actions() {
        return array_merge(self::get_theme_actions(), self::get_plugin_actions());
    }

    static function get_theme_actions() {

        $theme = get_template();

        switch ($theme) {
            case 'astra':
                $theme_actions = array(
                    'astra_header',
                    'astra_header_before',
                    'astra_body_top',
                    'astra_body_bottom',
                    'astra_content_before',
                    'astra_content_after',
                    'astra_footer',
                    'astra_footer_before'
                );
                break;

            case 'Avada':
                $theme_actions = array(
                    'avada_before_main_container',
                    'avada_after_main_container',
                    'avada_header',
                    'avada_after_header_wrapper',
                    'avada_before_body_content',
                    'avada_render_footer',
                    'avada_before_wrapper_container_close'
                );
                break;

            case 'bb-theme':
                $theme_actions = array(
                    'fl_after_header',
                    'fl_before_header',
                    'fl_before_post',
                    'fl_after_post',
                    'fl_body_close'
                );
                break;

            case 'blocksy':
                $theme_actions = array(
                    'blocksy:header:after',
                    'blocksy:header:before',
                    'wp_body_open',
                    'blocksy:hero:after',
                    'blocksy:single:content:bottom',
                    'blocksy:footer:before',
                    'blocksy:footer:after'
                );
                break;

            case 'customizr':
                $theme_actions = array(
                    '__after_header',
                    'wp_body_open',
                    '__before_footer',
                    '__before_inner_footer',
                    '__after_wp_footer'
                );
                break;

            case 'Divi':
                $theme_actions = array(
                    'et_before_main_content',
                    'wp_body_open',
                    'get_footer',
                    'wp_footer'
                );
                break;

            case 'flatsome':
                $theme_actions = array(
                    'flatsome_after_header',
                    'flatsome_after_body_open',
                    'flatsome_before_page_content',
                    'flatsome_after_page',
                    'flatsome_footer',
                    'wp_footer'
                );
                break;

            case 'generatepress':
                $theme_actions = array(
                    'generate_after_header',
                    'generate_before_header',
                    'generate_before_content',
                    'generate_before_footer',
                    'generate_after_footer'
                );
                break;

            case 'go':
                $theme_actions = array(
                    'get_template_part_partials/content',
                    'wp_body_open',
                    'get_footer',
                    'wp_footer'
                );
                break;

            case 'kadence':
                $theme_actions = array(
                    'kadence_after_header',
                    'kadence_before_wrapper',
                    'kadence_after_wrapper',
                    'kadence_before_header',
                    'kadence_before_main_content',
                    'kadence_after_main_content',
                    'kadence_single_before_inner_content',
                    'kadence_single_after_inner_content',
                    'kadence_before_footer',
                    'kadence_after_footer'
                );
                break;

            case 'hello-elementor':
                $theme_actions = array(
                    'get_template_part_template-parts/single',
                    'get_template_part_template-parts/dynamic-footer',
                    'wp_footer',
                    'kadence_before_header',
                    'kadence_before_main_content',
                    'kadence_after_main_content',
                    'kadence_single_before_inner_content',
                    'kadence_single_after_inner_content',
                    'kadence_before_footer',
                    'kadence_after_footer'
                );
                break;

            case 'hestia':
                $theme_actions = array(
                    'hestia_do_page_header',
                    'wp_body_open',
                    'hestia_before_page_content',
                    'hestia_before_footer_hook',
                    'hestia_before_footer_content_hook',
                    'hestia_after_footer_hook'
                );
                break;

            case 'inspiro':
                $theme_actions = array(
                    'get_template_part_template-parts/header/header',
                    'wp_body_open',
                    'get_template_part_template-parts/page/content',
                    'get_template_part_template-parts/footer/footer',
                    'wp_footer'
                );
                break;

            case 'neve':
                $theme_actions = array(
                    'neve_after_header_wrapper_hook',
                    'neve_body_start_after',
                    'neve_before_content',
                    'neve_before_footer_hook',
                    'neve_after_footer_hook',
                    'neve_body_end_before'
                );
                break;

            case 'oceanwp':
                $theme_actions = array(
                    'ocean_after_page_header',
                    'wp_body_open',
                    'ocean_before_main',
                    'ocean_before_page_header_inner',
                    'ocean_after_page_header_inner',
                    'ocean_before_content',
                    'ocean_after_page_entry',
                    'ocean_after_content_wrap',
                    'ocean_before_footer_widgets_inner',
                    'ocean_after_footer_widgets',
                    'ocean_before_footer_bottom_inner',
                    'ocean_after_footer_inner'
                );
                break;

            case 'storefront':
                $theme_actions = array(
                    'storefront_before_header',
                    'storefront_header',
                    'storefront_before_content',
                    'storefront_content_top',
                    'storefront_before_footer',
                    'storefront_footer',
                    'storefront_after_footer'
                );
                break;

            case 'twentyseventeen':
                $theme_actions = array(
                    'get_template_part_template-parts/page/content',
                    'get_footer',
                    'get_template_part_template-parts/footer/footer',
                    'wp_footer'
                );
                break;

            case 'twentynineteen':
                $theme_actions = array(
                    'get_template_part_template-parts/content/content',
                    'get_template_part_template-parts/header/entry',
                    'wp_body_open',
                    'get_template_part_template-parts/footer/footer',
                    'wp_footer'
                );
                break;

            case 'twentytwentyone':
                $theme_actions = array(
                    'get_template_part_template-parts/content/content-page',
                    'get_footer',
                    'wp_footer'
                );
                break;

            case 'twentytwentytwo':
                $theme_actions = array(
                    'get_template_part_template-parts/content',
                    'wp_body_open',
                    'get_template_part_template-parts/featured-image',
                    'get_template_part_template-parts/footer-menus-widgets',
                    'get_footer',
                    'wp_footer'
                );
                break;

            default:
                $theme_actions = array();
                break;
        }

        return $theme_actions;
    }

    static function get_plugin_actions() {
        $plugin_actions = array();

        if (class_exists('WooCommerce', false)) {
            $plugin_actions = array_merge($plugin_actions, array(
                'woocommerce_before_single_product',
                'woocommerce_single_product_summary',
                'woocommerce_product_thumbnails',
                'woocommerce_after_single_product_summary',
                'woocommerce_product_after_tabs',
                'woocommerce_after_single_product'
            ));
        }

        if (class_exists('Tribe__Events__Main', false)) {
            $plugin_actions = array_merge($plugin_actions, array(
                'tribe_events_before_view',
                'tribe_events_single_event_before_the_content',
                'tribe_events_single_event_meta_primary_section_start',
                'tribe_events_single_meta_details_section_start',
                'tribe_events_single_event_meta_primary_section_end'
            ));
        }

        return $plugin_actions;
    }
}