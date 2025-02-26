<?php

/**
 * Elementor compatibility layer.
 * php version 7.4.33
 *
 * @category Woocommerce-plugin
 * @package  instacashBnpl
 * @author   Fintrous Group Kft. <fintrous.com>
 * @license  GNU General Public License v3.0
 * @link     https://instacash.hu/
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

use Elementor\Widget_Base;

/**
 * Elementor product page widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class InstaCashElementorProductPrescore extends Widget_Base {

    /**
    * Get widget name.
    *
    * Retrieve oEmbed widget name.
    *
    * @since 1.0.0
    * @access public
    * @return string Widget name.
    */
    public function get_name() {
        return 'InstaCashBNPLProductPrescore';
    }

    /**
    * Get widget title.
    *
    * Retrieve oEmbed widget title.
    *
    * @since 1.0.0
    * @access public
    * @return string Widget title.
    */
    public function get_title() {
        return esc_html__( 'Product prescore', 'instacash-bnpl' );
    }

    /**
    * Get widget icon.
    *
    * Retrieve oEmbed widget icon.
    *
    * @since 1.0.0
    * @access public
    * @return string Widget icon.
    */
    public function get_icon() {
        return 'eicon-call-to-action';
    }

    /**
    * Get widget categories.
    *
    * Retrieve the list of categories the oEmbed widget belongs to.
    *
    * @since 1.0.0
    * @access public
    * @return array Widget categories.
    */
    public function get_categories() {
        return [ 'basic' ];
    }

    /**
    * Get widget keywords.
    *
    * Retrieve the list of keywords the oEmbed widget belongs to.
    *
    * @since 1.0.0
    * @access public
    * @return array Widget keywords.
    */
    public function get_keywords() {
        return [ 'bnpl', 'product', 'prescore' ];
    }

    /**
    * Get custom help URL.
    *
    * Retrieve a URL where the user can get more information about the widget.
    *
    * @since 1.0.0
    * @access public
    * @return string Widget help URL.
    */
    public function get_custom_help_url() {
        return 'https://instacash.hu/';
    }

    /**
    * Register oEmbed widget controls.
    *
    * Add input fields to allow the user to customize the widget settings.
    *
    * @since 1.0.0
    * @access protected
    */
    protected function register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Content', 'instacash-bnpl' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->end_controls_section();

    }

    /**
    * Render oEmbed widget output on the frontend.
    *
    * Written in PHP and used to generate the final HTML.
    *
    * @since 1.0.0
    * @access protected
    */
    protected function render() {

        $bnplApp      = new InstaCashBNPLApplication();
        $baseElements = $bnplApp->get_base_elements();

        if(!$baseElements) {

            return;
        }

        $bnplApp->get_info();
        $bnplApp->load_styles();
        $bnplApp->load_prescore($baseElements['offer'], $baseElements['product']);

        if ($bnplApp->have_info('prescore')) {
            $bnplApp->print_prescore_box();
        }
    }

}

