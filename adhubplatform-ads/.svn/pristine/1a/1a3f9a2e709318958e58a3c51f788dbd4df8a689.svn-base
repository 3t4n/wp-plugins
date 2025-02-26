<?php
/**
 * Class AdhubPlatform_Shortcodes
 * 
 * Gestisce gli shortcode e le funzioni PHP per l'inserimento manuale degli annunci
 * 
 * @package AdhubPlatform
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

class AdhubPlatform_Shortcodes {
    private $options;

    public function __construct($options) {
        $this->options = $options;
        $this->init();
    }

    public function init() {
        add_shortcode('adhub_ad', array($this, 'ad_shortcode'));
        $this->register_specific_shortcodes();
    }

    private function register_specific_shortcodes() {
        // Desktop
        add_shortcode('adhub_970x250', array($this, 'shortcode_970x250'));
        add_shortcode('adhub_300x600', array($this, 'shortcode_300x600'));
        add_shortcode('adhub_300x250', array($this, 'shortcode_300x250'));
        add_shortcode('adhub_300x250_2', array($this, 'shortcode_300x250_2'));
        add_shortcode('adhub_728x90', array($this, 'shortcode_728x90'));
        add_shortcode('adhub_sticky_video', array($this, 'shortcode_sticky_video'));
        add_shortcode('adhub_skin', array($this, 'shortcode_skin'));
        add_shortcode('adhub_native_single', array($this, 'shortcode_native_single'));
        add_shortcode('adhub_native_extended', array($this, 'shortcode_native_extended'));

        // Mobile
        add_shortcode('adhub_320x100', array($this, 'shortcode_320x100'));
        add_shortcode('adhub_320x50', array($this, 'shortcode_320x50'));
    }

    public function ad_shortcode($atts) {
        $atts = shortcode_atts(array(
            'position' => '',
            'class' => '',
        ), $atts, 'adhub_ad');

        if (empty($atts['position']) || !$this->options->should_display_ad($atts['position'])) {
            return '';
        }

        return $this->get_ad_html($atts['position'], $atts['class']);
    }

    private function get_ad_html($position, $additional_class = '') {
        if (!$this->options->should_display_ads()) {
            return '';
        }
    
        $tag = $this->options->get_ad_tag($position);
        if (empty($tag)) {
            return '';
        }
    
        $classes = array('adhub-ad', 'adhub-' . $position);
        if (!empty($additional_class)) {
            $classes[] = sanitize_html_class($additional_class);
        }
    
        // Consenti i tag <script> e altro HTML necessario
        $allowed_html = array_merge(wp_kses_allowed_html('post'), array(
            'script' => array(
                'type' => true,
                'src' => true,
                'async' => true,
                'defer' => true,
            ),
        ));
    
        return sprintf(
            '<div class="%s">%s</div>',
            esc_attr(implode(' ', $classes)),
            wp_kses($tag, $allowed_html) // Usa wp_kses con whitelist personalizzata
        );
    }
    
    
    

    // Desktop shortcodes
    public function shortcode_970x250($atts) {
        return $this->ad_shortcode(array_merge((array)$atts, array('position' => 'desktop_970x250')));
    }

    public function shortcode_300x600($atts) {
        return $this->ad_shortcode(array_merge((array)$atts, array('position' => 'desktop_300x600')));
    }

    public function shortcode_300x250($atts) {
        return $this->ad_shortcode(array_merge((array)$atts, array('position' => 'desktop_300x250')));
    }

    public function shortcode_300x250_2($atts) {
        return $this->ad_shortcode(array_merge((array)$atts, array('position' => 'desktop_300x250_2')));
    }

    public function shortcode_728x90($atts) {
        return $this->ad_shortcode(array_merge((array)$atts, array('position' => 'desktop_728x90')));
    }

    public function shortcode_sticky_video($atts) {
        return $this->ad_shortcode(array_merge((array)$atts, array('position' => 'desktop_sticky_video')));
    }

    public function shortcode_skin($atts) {
        return $this->ad_shortcode(array_merge((array)$atts, array('position' => 'desktop_skin')));
    }

    public function shortcode_native_single($atts) {
        return $this->ad_shortcode(array_merge((array)$atts, array('position' => 'desktop_native_single')));
    }

    public function shortcode_native_extended($atts) {
        return $this->ad_shortcode(array_merge((array)$atts, array('position' => 'desktop_native_extended')));
    }

    // Mobile shortcodes
    public function shortcode_320x100($atts) {
        return $this->ad_shortcode(array_merge((array)$atts, array('position' => 'mobile_320x100')));
    }

    public function shortcode_320x50($atts) {
        return $this->ad_shortcode(array_merge((array)$atts, array('position' => 'mobile_320x50')));
    }
}