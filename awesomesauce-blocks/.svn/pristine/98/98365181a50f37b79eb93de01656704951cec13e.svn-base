<?php

namespace Awesomesauce\Admin;

use Awesomesauce\Admin\BlockSettings;
use Awesomesauce\Functions;
use Awesomesauce\Awesomesauce;

if (!defined('ABSPATH')) {
    exit;
}

class CssProcessor extends Functions {

    static $common_elements = array('.awesomesauce_text');
    static $common_elements_fonts = array();
    static $common_elements_displays = array();
    static $skip_text = false;

    private $height;
    private $font = array();

    function __construct() {
        self::$skip_text = false;
        if (!Awesomesauce::$is_admin && empty($this->get_value('text'))) {
            self::$skip_text = true;
        }
    }

    public function set_size_values($height, $font) {
        $this->height = $height;
        $this->font[] = $font;
    }

    static function clear_common_elements() {
        self::$common_elements = array();
        self::$skip_text       = false;
    }

    static function dont_skip_text() {
        self::$skip_text = false;
    }

    private function reset_common_elements() {
        self::$common_elements          = array('.awesomesauce_text');
        self::$common_elements_fonts    = array();
        self::$common_elements_displays = array();
    }

    // Text elements with their font settings, to handle their sizes (and display) device specifically
    // $clear should be true, when not an additional text is being added, but the main text is changed to a different selector
    static function add_common_element($element, $font, $clear = false) {
        if ($clear) {
            self::clear_common_elements();
        }

        self::$common_elements[]       = $element;
        self::$common_elements_fonts[] = $font;
    }

    static function add_element_default_display($element, $display) {
        self::$common_elements_displays[$element] = $display;
    }

    private function manage_common_css($css) {
        $css['desktop']['.awesomesauce_wrapper']['height'] = $this->height['desktop'];
        $css['tablet']['.awesomesauce_wrapper']['height']  = $this->height['tablet'];
        $css['mobile']['.awesomesauce_wrapper']['height']  = $this->height['mobile'];

        $text_selectors = self::$common_elements;

        if (!empty(self::$common_elements_fonts)) {
            $this->font = array_merge($this->font, self::$common_elements_fonts);
        }

        if (isset($this->font[0])) {
            $block_elements = array();
            for ($i = 0; $i < count($text_selectors); $i++) {
                if (!self::$skip_text || $text_selectors[$i] != '.awesomesauce_text') {
                    $css['desktop']['.awesomesauce_wrapper'][] = array($text_selectors[$i] => array('font-size' => $this->font[$i]['desktop']));
                    $css['tablet']['.awesomesauce_wrapper'][]  = array($text_selectors[$i] => array('font-size' => $this->font[$i]['tablet']));
                    $css['mobile']['.awesomesauce_wrapper'][]  = array($text_selectors[$i] => array('font-size' => $this->font[$i]['mobile']));

                    $block_elements += array(
                        $text_selectors[$i] => $this->font[$i]
                    );
                }
            }

            $css = self::manage_element_hiding($css, $block_elements, array(), $this->height);
        } else {
            $css = self::manage_element_hiding($css, array(), array(), $this->height);
        }

        asort($css['desktop']['.awesomesauce_wrapper']);
        asort($css['tablet']['.awesomesauce_wrapper']);
        asort($css['mobile']['.awesomesauce_wrapper']);

        $this->reset_common_elements();

        return $css;
    }

    static function manage_element_hiding($css, $block_elements = array(), $elements = array(), $wrapper_height = '') {
        if ($wrapper_height !== '') {
            $elements[] = array(
                'size'    => $wrapper_height,
                'element' => '.awesomesauce_wrapper',
                'default' => isset(self::$common_elements_displays['.awesomesauce_wrapper']) ? self::$common_elements_displays['.awesomesauce_wrapper'] : 'grid'
            );
        }

        foreach ($block_elements as $element => $value) {
            $elements[] = array(
                'size'    => $value,
                'element' => $element,
                'default' => isset(self::$common_elements_displays[$element]) ? self::$common_elements_displays[$element] : 'block'
            );
        }

        foreach ($elements as $element) {
            if ($element['size']['desktop'] == 0 || (isset($element['size']['desktop_value']) && $element['size']['desktop_value'] == 0)) {
                $css['desktop'][$element['element']] = array('display' => 'none') + (isset($css['desktop'][$element['element']]) ? $css['desktop'][$element['element']] : array());
                $css['tablet'][$element['element']]  = array('display' => $element['default']) + (isset($css['tablet'][$element['element']]) ? $css['tablet'][$element['element']] : array());
            } else {
                $css['desktop'][$element['element']] = array('display' => $element['default']) + (isset($css['desktop'][$element['element']]) ? $css['desktop'][$element['element']] : array());
            }

            if ($element['size']['tablet'] == 0 || (isset($element['size']['tablet_value']) && $element['size']['tablet_value'] == 0)) {
                $css['tablet'][$element['element']] = array('display' => 'none') + (isset($css['tablet'][$element['element']]) ? $css['tablet'][$element['element']] : array());
                $css['mobile'][$element['element']] = array('display' => $element['default']) + (isset($css['mobile'][$element['element']]) ? $css['mobile'][$element['element']] : array());
            }

            if ($element['size']['mobile'] == 0 || (isset($element['size']['mobile_value']) && $element['size']['mobile_value'] == 0)) {
                $css['mobile'][$element['element']] = array('display' => 'none') + (isset($css['mobile'][$element['element']]) ? $css['mobile'][$element['element']] : array());
            }
        }

        return $css;
    }

    private function common_css() {
        $tags = array(
            'p',
            'span',
            'div',
            'section'
        );

        for ($i = 1; $i <= 6; $i++) {
            $tags[] = 'h' . $i;
        }

        $css = array();
        foreach ($tags as $tag) {
            $css[' ' . $tag] = array(
                'padding'     => '0',
                'margin'      => '0',
                'line-height' => 'normal'
            );
        }


        return array('.awesomesauce_wrapper' => $css);
    }

    private function common_wrapper_css() {
        $background_css = array();

        if (BlockSettings::$bg_color !== false) {
            $color_overlay = BlockSettings::$bg_color;

            if (!is_array($color_overlay)) {
                $color_overlay = $this->get_value('background_color', BlockSettings::$bg_color);
                if (!empty($color_overlay)) {
                    $opacity    = $this->get_color_opacity($color_overlay);
                    $background = $color_overlay;
                } else {
                    $opacity    = '0';
                    $background = '#FFFFFF00';
                }
            } else {
                $opacity    = '';
                $background = '';

                if (empty($color_overlay['fix_color'])) {
                    for ($i = 0; $i < count($color_overlay['default_color']); $i++) {
                        $background .= $this->get_value('background_color' . $i, $color_overlay['default_color'][$i]) . ',';
                    }
                    $background = substr($background, 0, -1);
                } else {
                    $background = $color_overlay['fix_color'];
                }
            }


            if ($opacity != '0') {
                $background_css = array(
                    array(
                        '.awesomesauce_background_image_color_overlay' => array(
                            'background' => $background
                        )
                    )
                );
            }
        }

        //reset color
        if (!Awesomesauce::$is_admin) {
            BlockSettings::$bg_color = '#FFFFFF';
        }

        return array(
            '.awesomesauce_wrapper' => array(
                    'place-content' => 'center',
                    'text-align'    => 'center',
                    'padding'       => '10px',
                    'box-sizing'    => 'border-box',
                ) + $background_css
        );
    }

    public function process_device_specific_css($css) {
        $css = $this->manage_common_css($css);

        $combined_css = $this->process_css($this->common_css());
        $combined_css .= $this->process_css($this->common_wrapper_css());
        $combined_css .= $this->process_css($css['desktop']);

        if (isset($css['tablet'])) {
            $combined_css .= PHP_EOL;
            if (!Awesomesauce::$is_admin) {
                $combined_css .= '@media (max-width: ' . self::get_option('tablet_breakpoint', '1200') . 'px){';
                $combined_css .= PHP_EOL;
            }
            $combined_css .= $this->process_css($css['tablet'], '', Awesomesauce::$is_admin ? 'tablet' : '');
            $combined_css .= PHP_EOL;
            if (!Awesomesauce::$is_admin) {
                $combined_css .= '}';
            }
        }

        if (isset($css['mobile'])) {
            $combined_css .= PHP_EOL;
            if (!Awesomesauce::$is_admin) {
                $combined_css .= '@media (max-width: ' . self::get_option('mobile_breakpoint', '600') . 'px){';
                $combined_css .= PHP_EOL;
            }
            $combined_css .= $this->process_css($css['mobile'], '', Awesomesauce::$is_admin ? 'mobile' : '');
            $combined_css .= PHP_EOL;
            if (!Awesomesauce::$is_admin) {
                $combined_css .= '}';
            }
        }

        if (isset($css['animations'])) {
            $combined_css .= PHP_EOL . $this->process_animations_css($css['animations']);
        }

        return $combined_css;
    }

    private function process_animations_css($css) {
        $final = '';
        foreach ($css as $name => $animation) {
            $final .= '@keyframes awesomesauce_' . self::$post_id . '_' . $name . '{' . PHP_EOL;

            foreach ($animation as $step => $code) {
                $final .= $step . '{' . PHP_EOL;

                foreach ($code as $property => $value) {
                    $final .= $property . ':' . $value . ';' . PHP_EOL;
                }

                $final .= '}' . PHP_EOL;
            }

            $final .= '}' . PHP_EOL;
        }

        return $final;
    }

    private function process_css($css_or_new_selector, $selector = '', $admin_device_specific = '') {
        if (empty($selector)) {
            $keys                = array_keys($css_or_new_selector);
            $selector            = $keys[0];
            $css_or_new_selector = $css_or_new_selector[$selector];
        }

        $final = '';

        $processed = false;
        foreach ($css_or_new_selector as $key => $value) {
            if (!is_array($value)) {
                if (!self::$skip_text || !self::string_contains($selector, '.awesomesauce_text')) {
                    if (!$processed) {
                        if (!empty($admin_device_specific)) {
                            $final .= '#awesomesauce_preview.' . $admin_device_specific . ' ' . $selector . '{' . PHP_EOL;
                        } else {
                            $final .= '#awesomesauce_block_' . self::$post_id . ' ' . $selector . '{' . PHP_EOL;
                        }
                        $processed = true;
                    }
                    $final .= $key . ':' . $value . ';' . PHP_EOL;
                } else {
                    $processed = true;
                }

            } else {

                $last_char = substr(trim($final), -1);
                if ($last_char != '}' && !empty($last_char)) {
                    $final .= '}' . PHP_EOL;
                }

                foreach ($value as $new_selector => $new_css_or_new_selector) {
                    if ($processed && is_array($new_css_or_new_selector) && !is_numeric($new_selector)) {
                        $final .= $this->process_css($new_css_or_new_selector, $selector . ' ' . $new_selector, $admin_device_specific);
                    }
                }

            }
        }

        if (!$processed) {
            foreach ($css_or_new_selector as $new_selector => $new_css_or_new_selector) {
                $final .= $this->process_css($new_css_or_new_selector, $selector . ' ' . $new_selector, $admin_device_specific);
            }
        }

        $last_char = substr(trim($final), -1);
        if ($last_char != '}' && !empty($last_char)) {
            $final .= '}' . PHP_EOL;
        }

        return $final;
    }
}