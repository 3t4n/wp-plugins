<?php

namespace Awesomesauce\Admin;

use Awesomesauce\Functions;
use Awesomesauce\Awesomesauce;
use Awesomesauce\GoogleFonts\GoogleFontsList;
use Awesomesauce\Sanitization;

if (!defined('ABSPATH')) {
    exit;
}

class AdminFields extends Functions {

    public function __construct($post_id = 0) {
        parent::__construct($post_id);

        Functions::call_in_file('Sanitization.php');
    }

    public function title($title, $tag = 'h4', $tooltip = '', $extra_attributes = array()) {

        $this->html($this->html(ucfirst($title), $tag, array('class' => 'awesomesauce_title') + $extra_attributes, false) . (!empty($tooltip) ? $this->hover_title('- ' . $tooltip) : ''), 'div', !empty($tooltip) ? array(
            'class' => 'awesomesauce_setting_container awesomesauce_flex_container awesomesauce_flex_title awesomesauce_title_container',
        ) : array(
            'class' => 'awesomesauce_title_container',
        ));
    }

    public function description($text, $tag = 'p') {
        $this->html($text, $tag, array('class' => 'awesomesauce_description'));
    }

    public function divider() {
        $this->html('', 'div', array('class' => 'awesomesauce_settings_divider'));
    }

    public function text_input($value, $name, $extra_attributes = array()) {
        $this->input($value, $name, 'text', $extra_attributes, true);
    }

    public function text_input_with_tag($value, $name, $tag, $tag_hover_title = '', $separate_tag_field = false) {
        $this->html($this->input($value, $name), 'div', array('class' => 'awesomesauce_setting_container'), true);

        if ($tag !== false) {
            if ($separate_tag_field) {
                $this->html('', 'div', array('class' => 'awesomesauce_settings_divider'));
                $this->title($tag_hover_title, 'h4', 'HTML tag for text');
                $tag_hover_title = '';
            }
            $this->tags($tag, $name . '_tag', $tag_hover_title);
        }
    }

    //$hover can be string or array to give link too
    public function input_with_hover_title($value, $name, $type = 'text', $extra_attributes = array(), $hover = '', $echo = true) {
        $this->html($this->input($value, $name, $type, $extra_attributes) . (is_array($hover) ? $this->hover_title($hover[0], $hover[1], $hover[2]) : $this->hover_title($hover)), 'div', array('class' => 'awesomesauce_setting_container'), $echo);
    }

    public function input($value, $name, $type = 'text', $extra_attributes = array(), $echo = false) {
        $attributes_html = '';
        if (!empty($extra_attributes)) {
            foreach ($extra_attributes as $attr => $val) {
                if ($attr == 'class') {
                    $extra_class = ' ' . $val;
                } else {
                    $attributes_html .= ' ' . $attr . '=\'' . $val . '\'';
                }
            }
        }

        if ($echo) {
            echo wp_kses('<input class="awesomesauce_input' . (isset($extra_class) ? $extra_class : '') . '" type="' . $type . '" name="awesomesauce_' . $name . '" id="awesomesauce_' . $name . '" value="' . esc_attr($this->get_value($name, $value)) . '"' . $attributes_html . '>', Sanitization::allowed_html());
        }

        return '<input class="awesomesauce_input' . (isset($extra_class) ? $extra_class : '') . '" type="' . $type . '" name="awesomesauce_' . $name . '" id="awesomesauce_' . $name . '" value="' . esc_attr($this->get_value($name, $value)) . '"' . $attributes_html . '>';
    }

    public function textarea($default, $name, $placeholder = '', $attributes = array()) {
        if ($placeholder !== '') {
            $attributes += array(
                'placeholder' => $placeholder
            );
        }
        $attributes += array(
            'name'  => 'awesomesauce_' . $name,
            'id'    => 'awesomesauce_' . $name,
            'class' => 'awesomesauce_textarea'
        );
        $this->html($this->html($this->get_value($name, $default), 'textarea', $attributes, false), 'div', array('class' => 'awesomesauce_setting_container'));
    }

    public function image_selectors($default, $name) {
        $this->image_selector($default, $name . '_desktop', 'Desktop image');
        $this->image_selector('', $name . '_tablet', 'Tablet image', 'awesomesauce_hidden_background_image_container');
        $this->image_selector('', $name . '_mobile', 'Mobile image', 'awesomesauce_hidden_background_image_container');

        $this->positions('center', $name . '_focus', 'Image focus');

        $this->html($this->input($default, $name . '_alt', 'text', array(
                'placeholder' => 'Alt tag'
            )) . $this->hover_title('alt tag', 'https://www.w3schools.com/tags/att_img_alt.asp'), 'div', array('class' => 'awesomesauce_setting_container'));
        $this->html($this->input($default, $name . '_title', 'text', array(
                'placeholder' => 'Title tag'
            )) . $this->hover_title('title tag', 'https://www.w3schools.com/tags/att_title.asp'), 'div', array('class' => 'awesomesauce_setting_container'));
        $this->html($this->select('lazy', $name . '_loading', array(
                'eager',
                'lazy'
            ), false, array(), false) . $this->hover_title('Loading', 'https://www.w3schools.com/tags/att_img_loading.asp'), 'div', array('class' => 'awesomesauce_setting_container'));
    }

    public function image_selector($default, $name, $placeholder = '', $additional_class = '') {
        $this->html($this->input($default, $name, 'text', array(
                'placeholder' => $placeholder
            )) . $this->input('select', $name . '_image_select', 'button') . $this->hover_title($placeholder), 'div', array(
            'class' => 'awesomesauce_setting_container' . (empty($additional_class) ? '' : ' ' . $additional_class),
        ));

        $script = "
                document.addEventListener('DOMContentLoaded', function () {
                    var awesomesauce_wpmedia;
                    document.querySelector('input[name=\'awesomesauce_" . $name . '_image_select' . "\']').addEventListener('click', function(e) {
                        e.preventDefault();
                        if (awesomesauce_wpmedia) {
                            awesomesauce_wpmedia.open();
                            return;
                        }
                        awesomesauce_wpmedia = wp.media({
                            multiple: false
                        }).open();
        
                        awesomesauce_wpmedia.on('select', function() {
                            var attachment = awesomesauce_wpmedia.state().get('selection').first().toJSON();
                            document.querySelector('input[name=\'awesomesauce_" . $name . "\']').value = attachment.url.replace('" . Awesomesauce::$base_url . "', '');
                            
                            var change = new Event('change', {bubbles: true});
                            document.querySelector('input[name=\'awesomesauce_" . $name . "\']').dispatchEvent(change);
        
                            awesomesauce_wpmedia.close();
                        });
                    });
                });
		    ";

        $this->call_script('awesomesauce_block_js_image_selector_' . $name, $script, '', 'js', array('jquery'), 10, 0, true);
    }

    public function hover_title($title, $link = '', $add_em = false) {
        if (empty($title)) {
            return '';

        } else {
            $title = ucfirst($title);
            if ($link !== '') {
                $title = $this->html($title, 'a', array(
                    'href'   => $link,
                    'target' => '_blank',
                    'class'  => 'awesomesauce_hover_title_link'
                ), false);
            }

            return $this->html($title . ($add_em ? $this->em() : ''), 'span', array('class' => 'awesomesauce_hover_title'), false);
        }
    }

    public function em() {
        return $this->html(' (EM)', 'a', array(
            'href'   => 'https://www.w3schools.com/cssref/css_units.php#:~:text=Description-,em,element%20(2em%20means%202%20times%20the%20size%20of%20the%20current%20font),-Try%20it',
            'target' => '_blank',
            'class'  => 'awesomesauce_hover_title_link'
        ), false);
    }

    public function color_picker($default, $name, $hover_title = '', $solid_color_only = false, $opacity = true, $echo = true) {
        $options = "modes : ['solid', 'linear-gradient', 'radial-gradient'],";
        if ($solid_color_only) {
            $options = "modes : ['solid'],";
        }

        if (!$opacity) {
            $options .= "transparency: false,";
        } else {
            $default = $this->hex_to_rgba($default);
        }

        $script = "
        document.addEventListener('DOMContentLoaded', function () {
            new lc_color_picker('input[name=\'awesomesauce_" . $name . "\']',
                {" . $options . "
                preview_style:{side: 'right'}, 
                fallback_colors : ['rgba(255,255,255,1)', 'linear-gradient(90deg, rgba(255,255,255,0) 0%, rgba(0,0,0,0) 100%)'], 
                on_change:function(new_value, target_field){ 
                    var change = new Event('change', { bubbles: true });
                    document.querySelector('#' + target_field.id).dispatchEvent(change);
                }
            });
        });";

        $this->call_script('awesomesauce_block_js_color_picker_' . $name, $script, '', 'js', array('jquery'), 10, 0, true);

        return $this->html($this->input($default, $name) . (!empty($hover_title) ? $this->hover_title($hover_title) : ''), 'div', array('class' => 'awesomesauce_setting_container'), $echo);
    }

    public function multi_color_picker($default, $name, $hover_title = array(), $solid_color_only = false, $opacity = true) {
        $return = array();
        for ($i = 0; $i < count($default); $i++) {
            $return[] = $this->color_picker($default[$i], $name . $i, isset($hover_title[$i]) ? $hover_title[$i] : '', $solid_color_only, $opacity);
        }

        return $return;
    }

    public function select($default, $name, $options, $multi = false, $bold = array(), $echo = true, $hover_title = '', $hover_link = '') {
        $inner          = '';
        $selected_value = $this->get_value($name, $default);
        foreach ($options as $option_value => $option_name) {
            if ($multi) {
                $value  = $option_value;
                $option = $option_name;
            } else {
                $value = $option = $option_name;
            }
            $value = strval($value);
            if (in_array($value, $bold, true)) {
                $attributes = array(
                    'value' => $value
                );
                $attributes += array(
                    'style' => 'font-weight:700;'
                );
            } else {
                $attributes = array(
                    'value' => $value
                );
            }

            if ($value == $selected_value) {
                $attributes += array(
                    'selected' => 'selected'
                );
            }

            $inner .= $this->html($option, 'option', $attributes, false);
        }

        return $this->html($this->html($inner, 'select', array(
                'name'  => 'awesomesauce_' . $name,
                'id'    => 'awesomesauce_' . $name,
                'class' => 'awesomesauce_select' . (count($options) <= 1 ? ' single' : '')
            ), false) . $this->hover_title($hover_title, $hover_link), 'div', array('class' => 'awesomesauce_setting_container'), $echo);
    }

    public function multiselect($default, $name, $options, $disabled = array(), $size = 4, $echo = true) {
        $inner = '';
        foreach ($options as $option) {
            $attributes = array(
                'value' => $option
            );

            if (in_array($option, $default)) {
                $attributes += array(
                    'selected' => 'selected'
                );
            }

            if (in_array($option, $disabled)) {
                $attributes += array(
                    'disabled' => 'disabled'
                );
            }

            $inner .= $this->html($option, 'option', $attributes, false);
        }

        return $this->html($inner, 'select', array(
            'name'     => 'awesomesauce_' . $name . '[]',
            'class'    => 'awesomesauce_select',
            'multiple' => 'multiple',
            'size'     => $size
        ), $echo);
    }

    public function positions($default, $name, $hover_title = '', $hover_link = '', $echo = true) {
        $this->select($default, $name, array(
            'center',
            'top',
            'bottom',
            'left',
            'right',
            'top left',
            'top right',
            'bottom left',
            'bottom right'
        ), false, array(), $echo, $hover_title, $hover_link);
    }

    public function tags($default, $name, $hover_title = '', $hover_link = '', $echo = true) {
        $this->select($default, $name, array(
            'h1',
            'h2',
            'h3',
            'h4',
            'h5',
            'h6',
            'p',
            'div'
        ), false, array(), $echo, $hover_title, $hover_link);
    }

    public function font_weights($default, $name, $italic_off = 0, $echo = false) {
        $font_weights = array();
        for ($i = 1; $i < 10; $i++) {
            $font_weights[100 * $i] = 100 * $i;
        }
        if (!$italic_off) {
            for ($i = 1; $i < 10; $i++) {
                $font_weights[(100 * $i) . 'italic'] = (100 * $i) . ' italic';
            }
        }
        $font_weights[400] .= '/normal';
        $font_weights[700] .= '/bold';

        return $this->select($default, $name, $font_weights, true, array(
            '400',
            '700'
        ), $echo);
    }

    public function yes_no($default, $name, $hover_title = '') {
        $this->html($this->select($default, $name, array(
                1 => 'yes',
                0 => 'no'
            ), true, array(), false) . $this->hover_title($hover_title), 'div', array('class' => 'awesomesauce_setting_container'));
    }

    public function link($default, $name) {
        $this->html($this->input($default, $name . '', 'text', array(
                'placeholder' => 'Link'
            )) . $this->hover_title('Link', 'https://www.w3schools.com/tags/att_a_href.asp'), 'div', array('class' => 'awesomesauce_setting_container'));

        $this->html($this->select('self', $name . '_target', array(
                'self',
                'blank'
            ), false, array(), false) . $this->hover_title('Target', 'https://www.w3schools.com/tags/att_a_target.asp'), 'div', array('class' => 'awesomesauce_setting_container'));

        $this->html($this->select('', $name . '_rel', array(
                '',
                'alternate',
                'author',
                'bookmark',
                'external',
                'help',
                'license',
                'next',
                'nofollow',
                'noopener',
                'noreferrer',
                'prev',
                'search',
                'tag'
            ), false, array(), false) . $this->hover_title('Rel', 'https://www.w3schools.com/tags/att_a_rel.asp'), 'div', array('class' => 'awesomesauce_setting_container'));

        $this->html($this->input('', $name . '_class', 'text', array(
                'placeholder' => 'CSS class'
            ), false) . $this->hover_title('CSS class'), 'div', array('class' => 'awesomesauce_setting_container'));

    }

    public function success($text = 'Settings saved!') {
        $this->html($this->html($text, 'p', array(), false), 'div', array('class' => 'notice notice-success is-dismissible awesomesauce_admin_notice'));
    }

    public function font_family($default_font, $name, $echo = true) {
        $font_family_html = $this->html($this->input($default_font, $name, 'text', array(
            'list'        => 'awesomesauce_google_fonts',
            'placeholder' => 'Font family'
        )), 'div', array('class' => 'awesomesauce_setting_container'), $echo);

        $font_incalling_script = "
        document.addEventListener('DOMContentLoaded', function () {
            awesomesauce_call_in_google_font(document.querySelector('#awesomesauce_" . esc_attr($name) . "').value);
        });";

        $this->call_script('awesomesauce_block_js_google_font_input_' . $name, $font_incalling_script, '', 'js', array('jquery'), 10, 0, true);

        $google_fonts_html = '';
        foreach (GoogleFontsList::$fonts as $google_font) {
            $google_fonts_html .= $this->html('', 'option', array('value' => $google_font), false);
        }
        $font_family_html .= $this->html($google_fonts_html, 'datalist', array('id' => 'awesomesauce_google_fonts'), $echo);

        return $font_family_html;
    }

    public function size_inputs($default, $name, $only_unit = '') {
        $this->size_input($default['desktop'], $name . '_desktop', 'desktop', $only_unit);
        $this->size_input($default['tablet'], $name . '_tablet', 'tablet', $only_unit);
        $this->size_input($default['mobile'], $name . '_mobile', 'mobile', $only_unit);
    }

    public function size_input($default, $name, $hover_title = '', $only_unit = '', $extra_attributes = array()) {
        $this->html($this->input(is_array($default) ? $default[0] : $default, $name, 'number', $extra_attributes) . $this->select(!empty($only_unit) ? $only_unit : $default[1], $name . '_unit', !empty($only_unit) ? array(
                $only_unit
            ) : array(
                'px',
                '%',
                'vh',
                'vw'
            ), false, array(), false) . (!empty($hover_title) ? $this->hover_title($hover_title) : ''), 'div', array('class' => 'awesomesauce_setting_container awesomesauce_flex_container'));
    }

    public function ms_input($default, $name, $hover_title = '', $extra_attributes = array()) {
        $this->size_input($default, $name, $hover_title, 'ms', $extra_attributes);
    }

    public function percentage_input($default, $name, $hover_title = '', $extra_attributes = array()) {
        if (!isset($extra_attributes['min'])) {
            $extra_attributes['min'] = 0;
        }
        if (!isset($extra_attributes['max'])) {
            $extra_attributes['max'] = 100;
        }
        $this->size_input($default, $name, $hover_title, '%', $extra_attributes);
    }

    public function font_settings($default, $name, $label = '', $additional_settings = array()) {
        if (isset($default['desktop_only']) && $default['desktop_only']) {
            $this->size_input($default['desktop'], $name . '_desktop', '', isset($default['only_unit']) ? $default['only_unit'] : '');
            $this->html('', 'div', array('class' => 'awesomesauce_settings_divider'));
        } else if (isset($default['desktop'])) {
            $this->size_inputs($default, $name, isset($default['only_unit']) ? $default['only_unit'] : '');
            $this->html('', 'div', array('class' => 'awesomesauce_settings_divider'));
        }

        if ($label != '') {
            $label .= ' ';
        }

        $this->title($label . 'font settings');
        if ($default['font-family'] !== false) {
            $this->html($this->font_family($default['font-family'], $name . '_font_family', false) . $this->hover_title('font family'), 'div', array('class' => 'awesomesauce_setting_container awesomesauce_flex_container_fullwidth'));
        }

        if (isset($default['solid_color_only']) && $default['solid_color_only']) {
            $solid_color_only = $default['solid_color_only'];
        }

        if (isset($default['color_opacity_off']) && $default['color_opacity_off']) {
            $color_opacity = false;
        } else {
            $color_opacity = true;
        }

        if (is_array($default['color'])) {
            for ($i = 0; $i < count($default['color']); $i++) {
                if (empty($solid_color_only)) {
                    $solid_color_only = !Functions::string_contains($default['color'][$i], 'gradient');
                }
                $this->color_picker($default['color'][$i], $name . '_color' . $i, 'font color ' . ($i + 1), $solid_color_only, $color_opacity);
            }
        } else {
            if (empty($solid_color_only)) {
                $solid_color_only = !Functions::string_contains($default['color'], 'gradient');
            }
            $this->color_picker($default['color'], $name . '_color', 'font color', $solid_color_only, $color_opacity);
        }

        $this->html($this->font_weights($default['font-weight'], $name . '_font_weight', $default['italic-off']) . $this->hover_title('font weight'), 'div', array('class' => 'awesomesauce_setting_container'));

        $options = array('normal');
        for ($i = -20; $i <= 100; $i = $i + 2.5) {
            $options[] = $i / 100;
        }

        if ($default['letter-spacing'] !== false) {
            $this->html($this->select($default['letter-spacing'], $name . '_letter_spacing', $options, false, array('normal'), false) . $this->hover_title('letter spacing', 'https://www.w3schools.com/cssref/pr_text_letter-spacing.php', true), 'div', array('class' => 'awesomesauce_setting_container'));
        }

        if (isset($default['line-height'])) {
            $options = array('normal');
            for ($i = 50; $i <= 200; $i = $i + 2.5) {
                $options[] = $i / 100;
            }
            $this->html($this->select($default['line-height'], $name . '_line_height', $options, false, array('normal'), false) . $this->hover_title('line height', 'https://www.w3schools.com/cssref/pr_dim_line-height.php', true), 'div', array('class' => 'awesomesauce_setting_container'));
        }

        if (isset($default['text-shadow'])) {
            if (is_array($default['text-shadow'])) {
                $j = 1;
                for ($i = 0; $i < count($default['text-shadow']); $i++) {
                    if (is_array($default['text-shadow'][$i])) {
                        $this->color_picker($default['text-shadow'][$i][0], $name . '_text_shadow' . $i, $default['text-shadow'][$i][1], true);
                    } else {
                        $this->color_picker($default['text-shadow'][$i], $name . '_text_shadow' . $i, 'text shadow ' . $j, true);
                        $j++;
                    }
                }
            } else {
                $this->color_picker($default['text-shadow'], $name . '_text_shadow', 'text shadow', true);

                $options = array();
                for ($i = 0; $i <= 20; $i++) {
                    $options[] = $i;
                }
                $this->html($this->select(isset($default['text-shadow-strength']) ? $default['text-shadow-strength'] : 0, $name . '_text_shadow_strength', $options, false, array(), false) . $this->hover_title('Text shadow strength'), 'div', array('class' => 'awesomesauce_setting_container'));
            }
        }

        foreach ($additional_settings as $function => $settings) {
            /*
             * $settings[0]: function
             * $settings[1]: hover title
             * $settings[2]: storage name
             * $settings[3]: default
             */
            $this->$function(...$settings);
        }
    }

    public function device_specific($default, $name, $type = 'input', $attributes = array()) {
        $this->html($this->$type($default['desktop'], $name . '_desktop', ...$attributes) . $this->hover_title('Desktop'), 'div', array('class' => 'awesomesauce_setting_container'));
        $this->html($this->$type($default['tablet'], $name . '_tablet', ...$attributes) . $this->hover_title('Tablet'), 'div', array('class' => 'awesomesauce_setting_container'));
        $this->html($this->$type($default['mobile'], $name . '_mobile', ...$attributes) . $this->hover_title('Mobile'), 'div', array('class' => 'awesomesauce_setting_container'));
    }
}