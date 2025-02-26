<?php

namespace Awesomesauce\Admin;

use Awesomesauce\Awesomesauce;

if (!defined('ABSPATH')) {
    exit;
}

class BlockSettings extends PreviewManager {

    //$bg_color can be: array with modified $params values; string with the color; false, to not have a background at all
    static $bg_color = '#FFFFFF';

    public function display_common_settings() {

        $this->setting('block_link', array(
            'Link',
            'Link on entire block'
        ), 'link');
        $this->setting('force_fullwidth', 'Force fullwidth', 'yes_no', 0);

        $this->admin_preview_manager('add_link_to_block', '#awesomesauce_block_link');
        $this->admin_preview_manager('add_link_to_block', '#awesomesauce_block_link_target');
        $this->admin_preview_manager('add_link_to_block', '#awesomesauce_block_link_rel');
        $this->admin_preview_manager('add_link_to_block', '#awesomesauce_block_link_class');

        $this->setting('custom_attributes', array(
            'Custom attributes',
            'Additional attributes for the entire block. Write one per line, as seen in the placeholder example.'
        ), 'textarea', '', array(
            'role="region"' . PHP_EOL . 'aria-label="header"' . PHP_EOL . 'tabindex="0"',
        ), 100);

        $this->admin_preview_manager('add_attr_to_block', '#awesomesauce_custom_attributes');
    }

    public function display_common_script_settings() {
        $this->script_setting('custom_css', 'Custom CSS', 'textarea', '', array('.example {' . PHP_EOL . '&nbsp;&nbsp;color: red;' . PHP_EOL . '}'), 100);

        $this->admin_preview_manager('full_style', '#awesomesauce_custom_css', 'awesomesauce_block_css_' . self::$post_id . '_custom-inline-css');
    }

    //$default_tag should be 'false', if you don't want tag setting
    public function text_setting($default_text, $class = '.awesomesauce_text', $label = 'Text', $name = 'text', $default_tag = 'h2', $tag_class = '', $separate_tag_field = false, $skip_tag_admin_preview = false, $skip_tag_admin_text_preview = false) {
        if (!$skip_tag_admin_text_preview) {
            $this->admin_preview_manager('text', '#awesomesauce_' . $name, $class);
        }

        if (empty($tag_class)) {
            $tag_class = $class;
        }

        if ($default_tag !== false || $skip_tag_admin_preview || $separate_tag_field) {
            $this->admin_preview_manager('tag', '#awesomesauce_' . $name . '_tag', $tag_class);
        }

        return $this->setting($name, $label, 'text_input_with_tag', $default_text, array(
            $default_tag,
            'HTML tag',
            $separate_tag_field
        ));
    }

    //$parameters: admin field function values from 3rd parameter: ($default, $name, >>> $parameters one by one <<<)
    public function setting($name, $label, $type, $default = '', $parameters = array(), $order = 10) {
        return $this->setting_manager('setting', $name, $label, $type, $default, $parameters, $order);
    }

    public function script_setting($name, $label, $type, $default = '', $parameters = array(), $order = 10) {
        return $this->setting_manager('script_setting', $name, $label, $type, $default, $parameters, $order);
    }

    public function common_setting($name, $value = array(), $selector = '', $skip_admin_preview = array(), $label = '', $storage_name = '', $additional_settings = array(), $order = 5) {
        switch ($name) {
            case 'height':
                if ($label == '') {
                    $label = 'block\'s height';
                }

                if (empty($value['desktop'])) {
                    $value += array(
                        'desktop' => array(
                            '500',
                            'px'
                        ),
                        'tablet'  => array(
                            '400',
                            'px'
                        ),
                        'mobile'  => array(
                            '200',
                            'px'
                        ),
                    );
                }

                if ($selector === '') {
                    $selector = '.awesomesauce_wrapper';
                }

                if ($selector !== false) {
                    $this->admin_preview_manager('device_style', 'height', $selector, 'height', isset($value['display']) ? $value['display'] : 'grid');
                }

                if (empty($storage_name)) {
                    $storage_name = 'height';
                }

                return $this->script_setting($storage_name, array(
                    $label,
                    'Enter 0px to hide the block on the given device.'
                ), 'size_inputs', $value, array(), $order);

            case 'font':
                if ($selector === '') {
                    $selector = '.awesomesauce_text';
                }

                if (!isset($value['font-weight'])) {
                    $value['font-weight'] = '400';
                }

                if (!isset($value['letter-spacing'])) {
                    $value['letter-spacing'] = 'normal';
                }

                if (!isset($value['italic-off'])) {
                    $value['italic-off'] = 0;
                }

                if (empty($storage_name)) {
                    $storage_name = 'font';
                }

                if (is_array($label)) {
                    $font = $this->script_setting($storage_name, array(
                        $label[0],
                        $label[1]
                    ), 'font_settings', $value, array(
                        $label[2],
                        $additional_settings
                    ));

                } else {
                    $font = $this->script_setting($storage_name, array(
                        $label == '' ? 'font size' : $label . ' font size',
                        'Enter 0px to hide the text on the given device.'
                    ), 'font_settings', $value, array(
                        $label,
                        $additional_settings
                    ));
                }

                if ($this->string_contains($font['font-weight'], 'italic')) {
                    $font['font-weight'] = str_replace('italic', '', $font['font-weight']);
                    $font['font-style']  = 'italic';
                } else {
                    $font['font-style'] = 'normal';
                }

                if (!empty($font['font-family']) && $this->string_contains($font['font-family'], ' ') && !$this->string_contains($font['font-family'], ',') && !$this->string_contains($font['font-family'], '"') && !$this->string_contains($font['font-family'], '\'')) {
                    $font['font-family'] = "'" . $font['font-family'] . "'";
                }

                if ($selector !== false) {
                    if (!in_array('font-size', $skip_admin_preview)) {
                        if (isset($value['desktop_only']) && $value['desktop_only']) {
                            $this->admin_preview_manager('style', $storage_name . '_desktop', $selector, 'font-size', '', '', '', '#awesomesauce_' . $storage_name . '_desktop_unit');
                        } else {
                            $this->admin_preview_manager('device_style', $storage_name, $selector, 'font-size', isset($value['display']) ? $value['display'] : 'block');
                        }
                    }

                    if (!in_array('color', $skip_admin_preview)) {
                        $this->admin_preview_manager('style', is_array($value['color']) ? '#awesomesauce_' . $storage_name . '_color0' : '#awesomesauce_' . $storage_name . '_color', $selector, 'color');
                    }

                    if ($value['letter-spacing'] !== false) {
                        $this->admin_preview_manager('style', '#awesomesauce_' . $storage_name . '_letter_spacing', $selector, 'letter-spacing', '', '', '', 'em', 'normal');
                        $this->admin_preview_manager('style', '#awesomesauce_' . $storage_name . '_letter_spacing', $selector, 'text-indent', '', '', '', 'em', '0');
                    }

                    $this->admin_preview_manager('font_weight', '#awesomesauce_' . $storage_name . '_font_weight', $selector);

                    if (isset($value['line-height'])) {
                        $this->admin_preview_manager('style', '#awesomesauce_' . $storage_name . '_line_height', $selector, 'line-height');
                    }

                    if (isset($value['text-shadow']) && !is_array($value['text-shadow'])) {
                        $this->admin_preview_manager('text_shadow', $storage_name, isset($value['text-shadow-selector']) ? $value['text-shadow-selector'] : $selector);
                    }
                }

                if (!empty($font['font-family'])) {
                    $this->admin_preview_manager('google_font', '#awesomesauce_' . $storage_name . '_font_family', $selector, 'font-family');
                }

                return $font;

            default:
                return null;
        }
    }

    private function setting_manager($setting, $name, $label, $type, $default, $parameters, $order) {
        self::$awesomesauce_block_settings_order[$order][] = $name;
        switch ($setting) {
            case 'setting':
                self::$awesomesauce_block_settings[$name] = array(
                    $label,
                    $type,
                    $default,
                    $parameters,
                    $order
                );
                break;

            case 'script_setting':
                self::$awesomesauce_block_script_settings[$name] = array(
                    $label,
                    $type,
                    $default,
                    $parameters,
                    $order
                );
                break;

            default:
                break;
        }

        switch ($type) {
            case 'text_input_with_tag':
                $return = array(
                    'text' => $this->get_value($name, $default),
                    'tag'  => $this->get_value($name . '_tag', $parameters[0])
                );
                break;

            case 'image_selectors':
                $return = array(
                    'desktop' => $this->get_value($name . '_desktop', $default),
                    'tablet'  => $this->get_value($name . '_tablet', ''),
                    'mobile'  => $this->get_value($name . '_mobile', ''),
                    'focus'   => $this->get_value($name . '_focus', 'center'),
                    'alt'     => $this->get_value($name . '_alt', ''),
                    'title'   => $this->get_value($name . '_title', ''),
                    'loading' => $this->get_value($name . '_loading', 'lazy')
                );
                break;

            case 'yes_no':
                $return = boolval($this->get_value($name, $default));
                break;

            case 'size_inputs':
                $return = array(
                    'desktop_value' => $this->get_value($name . '_desktop', $default['desktop'][0]),
                    'tablet_value'  => $this->get_value($name . '_tablet', $default['tablet'][0]),
                    'mobile_value'  => $this->get_value($name . '_mobile', $default['mobile'][0])
                );

                //% values shouldn't be based on parents, but rather on desktop value. Unless desktop is % value too.
                $desktop_unit = $this->get_value($name . '_desktop_unit', $default['desktop'][1]);
                $tablet_unit  = $this->get_value($name . '_tablet_unit', $default['tablet'][1]);
                $mobile_unit  = $this->get_value($name . '_mobile_unit', $default['mobile'][1]);

                if ($tablet_unit == '%' && $desktop_unit != '%') {
                    $return['tablet_value'] = $return['desktop_value'] * $return['tablet_value'] / 100;
                    $tablet_unit            = $desktop_unit;
                }

                if ($mobile_unit == '%' && $desktop_unit != '%') {
                    $return['mobile_value'] = $return['desktop_value'] * $return['mobile_value'] / 100;
                    $mobile_unit            = $desktop_unit;
                }

                $return += array(
                    'desktop' => $return['desktop_value'] . $desktop_unit,
                    'tablet'  => $return['tablet_value'] . $tablet_unit,
                    'mobile'  => $return['mobile_value'] . $mobile_unit
                );

                break;

            case 'size_input':
                if (is_array($default)) {
                    $return = $this->get_value($name, $default[0]) . $this->get_value($name . '_unit', $default[1]);
                } else {
                    $return = $this->get_value($name, $default);
                }
                break;

            case 'link':
                $return = array(
                    'link'   => $this->get_value($name),
                    'target' => $this->get_value($name . '_target'),
                    'rel'    => $this->get_value($name . '_rel'),
                    'class'  => $this->get_value($name . '_class')
                );
                break;

            case 'font_settings':
                $return = array();

                if (isset($default['desktop_only']) && $default['desktop_only']) {
                    $return       += array(
                        'desktop_value' => $this->get_value($name . '_desktop', $default['desktop'][0])
                    );
                    $desktop_unit = $this->get_value($name . '_unit', $default['desktop'][1]);

                    $return += array(
                        'desktop' => $return['desktop_value'] . $desktop_unit
                    );

                } else if (isset($default['desktop'])) {
                    $return += array(
                        'desktop_value' => $this->get_value($name . '_desktop', $default['desktop'][0]),
                        'tablet_value'  => $this->get_value($name . '_tablet', $default['tablet'][0]),
                        'mobile_value'  => $this->get_value($name . '_mobile', $default['mobile'][0])
                    );
                    //% values shouldn't be based on parents, but rather on desktop value. Unless desktop is % value too.
                    $desktop_unit = $this->get_value($name . '_desktop_unit', $default['desktop'][1]);
                    $tablet_unit  = $this->get_value($name . '_tablet_unit', $default['tablet'][1]);
                    $mobile_unit  = $this->get_value($name . '_mobile_unit', $default['mobile'][1]);

                    if ($tablet_unit == '%' && $desktop_unit != '%') {
                        $return['tablet_value'] = $return['desktop_value'] * $return['tablet_value'] / 100;
                        $tablet_unit            = $desktop_unit;
                    }

                    if ($mobile_unit == '%' && $desktop_unit != '%') {
                        $return['mobile_value'] = $return['desktop_value'] * $return['mobile_value'] / 100;
                        $mobile_unit            = $desktop_unit;
                    }

                    $return += array(
                        'desktop' => $return['desktop_value'] . $desktop_unit,
                        'tablet'  => $return['tablet_value'] . $tablet_unit,
                        'mobile'  => $return['mobile_value'] . $mobile_unit
                    );
                }

                $letter_spacing = $this->get_value($name . '_letter_spacing', $default['letter-spacing']);
                if ($letter_spacing != 'normal') {
                    $letter_spacing .= 'em';
                }

                if ($default['font-family'] !== false) {
                    $return += array(
                        'font-family' => esc_attr($this->get_value($name . '_font_family', $default['font-family']))
                    );
                }

                $return += array(
                    'font-weight'    => $this->get_value($name . '_font_weight', $default['font-weight']),
                    'letter-spacing' => $letter_spacing,
                    'line-height'    => $this->get_value($name . '_line_height', isset($default['line-height']) ? $default['line-height'] : 'normal')
                );

                if (is_array($default['color'])) {
                    $color = array();
                    for ($i = 0; $i < count($default['color']); $i++) {
                        if (is_array($default['color'][$i])) {
                            $color[] = $this->get_value($name . '_color' . $i, $default['color'][$i][0]);
                        } else {
                            $color[] = $this->get_value($name . '_color' . $i, $default['color'][$i]);
                        }
                    }

                    $return += array(
                        'color' => $color
                    );
                } else {
                    $return += array(
                        'color' => $this->get_value($name . '_color', isset($default['color']) ? $default['color'] : 'rgba(255,255,255,1)')
                    );
                }

                if (isset($default['line-height'])) {
                    $return += array(
                        'line-height' => $this->get_value($name . '_line_height', $default['line-height'])
                    );
                }

                if (isset($default['text-shadow'])) {
                    if (is_array($default['text-shadow'])) {
                        $shadow = array();
                        for ($i = 0; $i < count($default['text-shadow']); $i++) {
                            if (is_array($default['text-shadow'][$i])) {
                                $shadow[] = $this->get_value($name . '_text_shadow' . $i, $default['text-shadow'][$i][0]);
                            } else {
                                $shadow[] = $this->get_value($name . '_text_shadow' . $i, $default['text-shadow'][$i]);
                            }
                        }

                        $return += array(
                            'text-shadow' => $shadow
                        );
                    } else {
                        $shadow_color    = $this->get_value($name . '_text_shadow', $default['text-shadow']);
                        $shadow_strength = $this->get_value($name . '_text_shadow_strength', isset($default['text-shadow-strength']) ? $default['text-shadow-strength'] : 0);

                        $shadow    = '';
                        $shadowCSS = array();
                        if ($shadow_strength > 0) {
                            for ($i = 0; $i < $shadow_strength; $i++) {
                                $shadow .= "0 0 0." . ($i + 1) . "em " . $shadow_color . ",";
                            }
                            $shadow    = substr($shadow, 0, -1);
                            $shadowCSS = array('text-shadow' => $shadow);
                        }

                        $return += array(
                            'text-shadow'     => $shadow,
                            'text-shadow-css' => $shadowCSS
                        );
                    }
                }

                break;

            case 'device_specific':
                if (!is_array($default['desktop'])) {
                    $return = array(
                        'desktop' => $this->get_value($name . '_desktop', $default['desktop']),
                        'tablet'  => $this->get_value($name . '_tablet', $default['tablet']),
                        'mobile'  => $this->get_value($name . '_mobile', $default['mobile'])
                    );
                } else {
                    $return = array(
                        'desktop_value' => $this->get_value($name . '_desktop', $default['desktop'][0]),
                        'tablet_value'  => $this->get_value($name . '_tablet', $default['tablet'][0]),
                        'mobile_value'  => $this->get_value($name . '_mobile', $default['mobile'][0])
                    );
                    $return += array(
                        'desktop' => $return['desktop_value'] . $this->get_value($name . '_desktop_unit', $default['desktop'][1]),
                        'tablet'  => $return['tablet_value'] . $this->get_value($name . '_tablet_unit', $default['tablet'][1]),
                        'mobile'  => $return['mobile_value'] . $this->get_value($name . '_mobile_unit', $default['mobile'][1])
                    );
                }
                break;

            case 'multi_color_picker':
                $return = array();
                for ($i = 0; $i < count($default); $i++) {
                    $return[$i] = $this->get_value($name . $i, $default[$i]);
                }
                break;

            default:
                $return = $this->get_value($name, $default);
                break;
        }

        return $return;
    }

    public function background_image() {
        if (self::$bg_color === false) {
            return '';
        }

        $params = array(
            'default_color'    => 'rgba(0,0,0,0)',
            'fix_color'        => '',
            'solid_color_only' => false,
            'opacity'          => true,
        );

        if (is_array(self::$bg_color)) {
            $custom_values = array_intersect_key(self::$bg_color, $params);

            $params = array_merge($params, $custom_values);
        } else {
            $params['default_color'] = self::$bg_color;
        }

        if (!empty($params['fix_color'])) {
            $params['solid_color_only'] = true;
        }

        $html   = '';
        $images = $this->setting('background_image', 'background image', 'image_selectors');
        $this->admin_preview_manager('img_attr', '#awesomesauce_background_image_desktop', '.awesomesauce_background_image', 'data-desktop');
        $this->admin_preview_manager('img_attr', '#awesomesauce_background_image_tablet', '.awesomesauce_background_image', 'data-tablet');
        $this->admin_preview_manager('img_attr', '#awesomesauce_background_image_mobile', '.awesomesauce_background_image', 'data-mobile');

        $this->admin_preview_manager('attr', '#awesomesauce_background_image_alt', '.awesomesauce_background_image', 'alt');
        $this->admin_preview_manager('attr', '#awesomesauce_background_image_title', '.awesomesauce_background_image', 'title');

        if (!is_array($params['default_color'])) {
            $color_overlay = $this->setting('background_color', 'background color', 'color_picker', $params['default_color'], array(
                'Adjust the opacity to have an overlay color over the background image.',
                $params['solid_color_only'],
                $params['opacity']
            ));

            if (empty($params['fix_color'])) {
                $this->admin_preview_manager('inline_style', '#awesomesauce_background_color', '.awesomesauce_background_image_color_overlay', 'background');
            } else {
                $color_overlay = $params['fix_color'];
            }
        } else {
            $color_overlay = $this->setting('background_color', 'background colors', 'multi_color_picker', $params['default_color'], array(
                array(),
                $params['solid_color_only'],
                $params['opacity']
            ));

            if (empty($params['fix_color'])) {
                $color_fields   = array();
                $preview_helper = array(
                    'background',
                    ''
                );
                for ($i = 0; $i < count($params['default_color']); $i++) {
                    $color_fields[]   = '#awesomesauce_background_color' . $i;
                    $preview_helper[] = ',';
                }
                array_pop($preview_helper);
                $preview_helper[] = '!important';

                $this->admin_preview_manager('combined_style', $color_fields, '.awesomesauce_background_image_color_overlay', $preview_helper);
            } else {
                $color_overlay = $params['fix_color'];
            }
        }

        foreach ($images as $key => $value) {
            $images[$key] = $this->fix_image_url($this->process_variables($value, Awesomesauce::$plugin_url . '/Awesomesauce/Admin/fallback.png'));

            if (Awesomesauce::$is_admin && empty($value) && in_array($key, array(
                    'desktop',
                    'tablet',
                    'mobile'
                ))) {
                $images[$key] = Awesomesauce::$plugin_url . '/Awesomesauce/Admin/fallback.png';
            }
        }

        if (!empty($images['desktop'])) {
            $breakpoints = array(
                'tablet' => self::get_option('tablet_breakpoint', '1200'),
                'mobile' => self::get_option('mobile_breakpoint', '600'),
            );

            $html .= '<picture class="awesomesauce_background_picture">';

            if (!Awesomesauce::$is_admin) {
                if (!empty($images['mobile'])) {
                    $html .= '<source srcset="' . esc_url($images['mobile']) . '" media="(max-width: ' . intval($breakpoints['mobile']) . 'px)" class="awesomesauce_background_mobile">';
                }
                if (!empty($images['tablet'])) {
                    $html .= '<source srcset="' . esc_url($images['tablet']) . '" media="(max-width: ' . intval($breakpoints['tablet']) . 'px)" class="awesomesauce_background_tablet">';
                }
                $html .= '<source srcset="' . esc_url($images['desktop']) . '"  class="awesomesauce_background_desktop">';
            }

            $html .= '<img src="' . esc_url($images['desktop']) . '" style="object-position: ' . esc_attr($images['focus']) . ';" class="awesomesauce_background_image" loading="' . esc_attr($images['loading']) . '"';

            $this->admin_preview_manager('inline_style', '#awesomesauce_background_image_focus', '.awesomesauce_background_image', 'object-position');

            if (Awesomesauce::$is_admin) {
                $html .= ' data-desktop="' . esc_attr($images['desktop']) . '"';
                $html .= ' data-tablet="' . esc_attr($images['tablet']) . '"';
                $html .= ' data-mobile="' . esc_attr($images['mobile']) . '"';
            }

            if (!empty($images['alt'])) {
                $html .= ' alt="' . esc_attr($images['alt']) . '"';
            }
            if (!empty($images['title'])) {
                $html .= ' title="' . esc_attr($images['title']) . '"';
            }

            $html .= '>
            </picture>';
        }

        //don't create element, when simple, transparent color is used. Only in admin page, to be able to change it with js.
        if (!is_array($color_overlay)) {
            if (!empty($color_overlay)) {
                $opacity = $this->get_color_opacity($color_overlay);
            } else {
                $opacity = '0';
            }
        } else {
            $opacity = '';
        }

        if ($opacity != '0' || Awesomesauce::$is_admin) {
            $html .= '<div class="awesomesauce_background_image_color_overlay"></div>';
        }

        return $html;
    }

    public function text($class = 'awesomesauce_text') {
        return $this->html($this->text['text'], $this->text['tag'], array('class' => $class), false, true);
    }

    public function animation_css($css, $animate = '') {
        $css = 'awesomesauce_' . self::$post_id . '_' . $css;

        if ($animate === '') {
            if (!isset($this->animate)) {
                $animate = true;
            } else {
                $animate = $this->animate;
            }
        }

        return array(
            'animation'         => $animate ? $css : 'none',
            '-moz-animation'    => $animate ? $css : 'none',
            '-webkit-animation' => $animate ? $css : 'none'
        );
    }

    //linebreak separated elements
    public function textarea_value_to_js_array($array) {
        return $this->php_array_to_js_array(explode(PHP_EOL, $array));
    }

    private function php_array_to_js_array($array) {
        $js_array = "[";
        foreach ($array as $value) {
            $js_array .= "awesomesauce_decode_html_entities('" . esc_attr($value) . "'),";
        }
        $js_array = substr($js_array, 0, -1);
        $js_array .= "]";

        return $js_array;
    }
}