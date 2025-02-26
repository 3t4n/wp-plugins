<?php

namespace Awesomesauce\Admin;

use Awesomesauce\Functions;
use Awesomesauce\Awesomesauce;

if (!defined('ABSPATH')) {
    exit;
}

class PreviewManager extends Functions {

    private $admin_preview_js_counter = 0;

    public function admin_preview_manager($type, $source_element, $target_element = '', $property = '', $additional_css_or_js = '', $changing_elements = '', $device = '', $additional_unit = '', $default = '') {
        if (Awesomesauce::$is_admin) {
            $js = "document.addEventListener('DOMContentLoaded', function() {" . PHP_EOL;
            $js .= "var change = new Event('change', { bubbles: true });";

            $skip = array(
                'device_style',
                'combined_style',
                'animation',
                'js_variable_input',
                'text_shadow'
            );

            if (!in_array($type, $skip)) {
                if (!self::string_contains($source_element, 'awesomesauce')) {
                    $source_element = '#awesomesauce_' . $source_element;
                }

                $js .= "document.querySelector('" . $source_element . "').addEventListener('change', function() {" . PHP_EOL . "var value = awesomesauce_process_translation_variables(document.querySelector('" . $source_element . "').value);" . PHP_EOL;
            }

            switch ($type) {
                case 'attr':
                    $js .= $this->admin_preview_attr($target_element, $property);
                    break;
                case 'img_attr':
                    $js .= $this->admin_preview_img_attr($target_element, $property);
                    break;
                case 'tag':
                    $js .= $this->admin_preview_tag($target_element);
                    break;
                case 'inline_style':
                    $js .= $this->admin_preview_inline_style($target_element, $property, $additional_css_or_js);
                    break;
                case 'text':
                    $js .= $this->admin_preview_text($target_element);
                    break;
                case 'yes_no':
                    $js .= $this->admin_preview_yes_no($source_element, $target_element, $property, $additional_css_or_js);
                    break;
                case 'device_style':
                    $js .= $this->admin_preview_device_style($source_element, $target_element, $property, $additional_css_or_js, $changing_elements);
                    break;
                case 'style':
                    $js .= $this->admin_preview_style($source_element, $target_element, $property, $additional_css_or_js, $additional_unit, $default);
                    break;
                case 'full_style':
                    $js .= $this->admin_preview_full_style($source_element, $target_element);
                    break;
                case 'combined_style':
                    //$source_element has to be an array with 2 source elements
                    //$property has to be an array with 4 values
                    //this results the css code:
                    //$property[0] : $property[1] . $source_element[0] . $property[2] . $source_element[1] . $property[3];
                    $js .= $this->admin_preview_combined_style($source_element, $target_element, $property, $additional_css_or_js, $changing_elements, $device);
                    break;
                case 'animation':
                    $js .= $this->admin_preview_animation($source_element, $target_element, $property, $additional_css_or_js, $changing_elements);
                    break;
                case 'google_font':
                    $js .= $this->admin_preview_google_font($source_element, $target_element);
                    break;
                case 'font_weight':
                    $js .= $this->admin_preview_font_weight($source_element, $target_element);
                    break;
                case 'text_shadow':
                    $js .= $this->admin_preview_text_shadow($source_element, $target_element);
                    break;

                case 'js_variable_textarea':
                    $js .= $this->admin_preview_js_variable_textarea($target_element, $additional_css_or_js);
                    break;
                case 'js_variable_input':
                    //$target_element: if not array = 0, if array = number of elements; $property: trigger reset or not; $additional_css_or_js = additional js codes
                    if ($target_element === '') {
                        $target_element = 0;
                    }
                    if ($property === '') {
                        $property = true;
                    }
                    $js .= $this->admin_preview_js_variable_input($source_element, $target_element, $property, $additional_css_or_js);
                    break;
                case 'reset':
                    $js .= $this->admin_preview_reset();
                    break;

                case 'add_link_to_block':
                    $js .= $this->admin_preview_add_link_to_block();
                    break;
                case 'add_attr_to_block':
                    $js .= $this->admin_preview_add_attr_to_block();
                    break;
            }

            if (!in_array($type, $skip)) {
                $js .= PHP_EOL . "});";
            }

            $js .= PHP_EOL . "});";

            $this->admin_preview_js_counter++;

            if ($changing_elements == '') {
                if (!is_array($source_element) && self::string_contains($source_element, 'awesomesauce')) {
                    $source_element = 'awesomesauce_' . $source_element;
                }

                $id = str_replace(array(
                    '.',
                    '#'
                ), '', is_array($source_element) ? $source_element[0] : $source_element);

            } else {
                $id = str_replace(array(
                    '.',
                    '#'
                ), '', $changing_elements);
            }

            $this->call_script($id . '_updater-' . $this->admin_preview_js_counter, $js, '', 'js', array('jquery'), 10, 1, true);
        }
    }

    private function admin_preview_img_attr($target_element, $property) {
        $js = "if(!value.includes('//') && value != ''){
                        value = '" . Awesomesauce::$base_url . "' + value;
                    }" . PHP_EOL;

        $js .= "if(value == '' || value.includes('{')){
                    value='" . Awesomesauce::$plugin_url . "/Awesomesauce/Admin/fallback.png';
                }" . PHP_EOL;

        $js .= "document.querySelector('" . $target_element . "').setAttribute('" . $property . "', value);" . PHP_EOL;
        $js .= "document.querySelector('" . $target_element . "').dispatchEvent(change);";

        return $js;
    }

    private function admin_preview_attr($target_element, $property) {
        return "document.querySelectorAll('" . $target_element . "').forEach(function(element) {
                    element.setAttribute('" . $property . "', value);" . PHP_EOL . "
                    element.dispatchEvent(change);
                })";
    }

    private function admin_preview_tag($target_element) {
        return "var element = document.querySelector('" . $target_element . "');" . PHP_EOL . "
                var newElement = document.createElement(value);" . PHP_EOL . "
                newElement.className = element.className;" . PHP_EOL . "
                newElement.innerHTML = element.innerHTML;" . PHP_EOL . "
                element.parentNode.replaceChild(newElement, element);" . PHP_EOL . "
                document.querySelector('" . $target_element . "').dispatchEvent(change);";
    }

    private function admin_preview_text($target_element) {
        return "document.querySelectorAll('" . $target_element . "').forEach(function(text_element) {
                    text_element.innerHTML = value;
                })";
    }

    private function admin_preview_inline_style($target_element, $property, $additional_js) {
        $js = '';
        if (isset($additional_js['before'])) {
            $js .= $additional_js['before'];
        }
        $js .= "document.querySelector('" . $target_element . "').style.setProperty('" . $property . "', value);";
        if (is_string($additional_js)) {
            $js .= $additional_js;
        }
        if (isset($additional_js['after'])) {
            $js .= $additional_js['after'];
        }

        return $js;
    }

    private function admin_preview_yes_no($source_element, $target_element, $property, $additional_css = array()) {
        $id = 'awesomesauce_admin_preview_' . str_replace(array(
                '.',
                '#'
            ), '', $source_element) . '-' . $this->admin_preview_js_counter;

        $js = "if(parseInt(value)){" . PHP_EOL;

        if ($property[0] == 'animation') {
            $property[1] = 'awesomesauce_' . self::$post_id . '_' . $property[1];
            if (!isset($property[2])) {
                $property[2] = 'none';
            }
        }

        $css = $property[0] . ":" . $property[1] . ";";
        if ($property[0] == 'animation') {
            $css .= "-moz-animation:" . $property[1] . ";";
            $css .= "-webkit-animation:" . $property[1] . ";";
        }

        if (isset($additional_css[0])) {
            $css .= $additional_css[0];
        }

        $js .= "var css = '#awesomesauce_preview #awesomesauce_preview_container .awesomesauce_block " . $target_element . "{" . $css . "}';" . PHP_EOL;
        $js .= "} else {" . PHP_EOL;

        $css = $property[0] . ":" . $property[2] . ";";
        if ($property[0] == 'animation') {
            $css .= "-moz-animation:" . $property[2] . ";";
            $css .= "-webkit-animation:" . $property[2] . ";";
        }

        if (isset($additional_css[1])) {
            $css .= $additional_css[1];
        }

        $js .= "var css = '#awesomesauce_preview #awesomesauce_preview_container .awesomesauce_block " . $target_element . "{" . $css . "}';" . PHP_EOL;
        $js .= "}" . PHP_EOL;

        $js .= "var existingStyle = document.getElementById('" . $id . "');" . PHP_EOL . "
                if (existingStyle) existingStyle.parentNode.removeChild(existingStyle);" . PHP_EOL . "
                
                var style = document.createElement('style');" . PHP_EOL . "
                style.id = '" . $id . "';" . PHP_EOL . "
                style.textContent = css;" . PHP_EOL . "
                document.head.appendChild(style);";

        return $js;
    }

    private function admin_preview_device_style($source, $target_element, $property, $display, $divide) {
        $devices = array(
            'desktop',
            'tablet',
            'mobile'
        );
        $js      = '';

        $desktop_source_element = '#awesomesauce_' . $source . '_desktop';
        $desktop_unit_element   = $desktop_source_element . '_unit';

        if (!empty($divide)) {
            $divide = '/' . $divide;
        }

        if (!empty($display)) {
            $display = "' + (value==0 ? 'display:none' : 'display:" . $display . "') + ';";
        }

        foreach ($devices as $device) {
            $source_element = '#awesomesauce_' . $source . '_' . $device;
            $unit_element   = $source_element . '_unit';

            $id = 'awesomesauce_admin_preview_' . str_replace(array(
                    '.',
                    '#'
                ), '', $source_element) . '-' . $this->admin_preview_js_counter;

            $js .= "document.querySelectorAll('" . $source_element . ", " . $unit_element . ", " . $desktop_source_element . ", " . $desktop_unit_element . "').forEach(function(element) {" . PHP_EOL;
            $js .= "element.addEventListener('change', function() {" . PHP_EOL;

            $js .= "var sourceElement = document.querySelector('" . $source_element . "');" . PHP_EOL . "
                    var unitElement = document.querySelector('" . $unit_element . "');" . PHP_EOL . "
                    
                    var value = Math.round(parseInt(sourceElement.value)" . $divide . ");" . PHP_EOL . "
                    var unit = unitElement.value;" . PHP_EOL;

            $css_target = "#awesomesauce_preview." . $device . " #awesomesauce_preview_container .awesomesauce_block " . $target_element;
            if ($device == 'tablet' || $device == 'mobile') {
                $js .= "if(document.querySelector('" . $unit_element . "').value=='%' && document.querySelector('" . $desktop_unit_element . "').value!='%'){" . PHP_EOL;
                $js .= "value = parseInt(value) * parseInt(document.querySelector('" . $desktop_source_element . "').value)" . $divide . " / 100;" . PHP_EOL;
                $js .= "unit = document.querySelector('" . $desktop_unit_element . "').value;" . PHP_EOL;
                $js .= "}" . PHP_EOL;
            }
            $js .= "var css = '" . $css_target . "{" . $property . ":' + value + unit + ';" . $display . "}';" . PHP_EOL;

            $js .= "var existingStyle = document.getElementById('" . $id . "');" . PHP_EOL . "
                    if (existingStyle) existingStyle.parentNode.removeChild(existingStyle);" . PHP_EOL . "
                    
                    var style = document.createElement('style');" . PHP_EOL . "
                    style.id = '" . $id . "';" . PHP_EOL . "
                    style.textContent = css;" . PHP_EOL . "
                    document.head.appendChild(style);" . PHP_EOL;

            $js .= "});});" . PHP_EOL;
        }

        return $js;
    }

    private function admin_preview_combined_style($source_elements, $target_element, $property, $additional_css = '', $changing_elements = '', $device = '') {
        if ($changing_elements == '') {
            $id = 'awesomesauce_admin_preview_' . str_replace(array(
                    '.',
                    '#'
                ), '', $source_elements[0]) . '-' . $this->admin_preview_js_counter;


            $js = "document.querySelectorAll('" . implode(', ', array_unique($source_elements)) . "').forEach(function(element) {" . PHP_EOL;
            $js .= "element.addEventListener('change', function() {" . PHP_EOL;

        } else {
            $id = 'awesomesauce_admin_preview_' . str_replace(array(
                    '.',
                    '#'
                ), '', $changing_elements) . '-' . $this->admin_preview_js_counter;

            $js = "document.querySelectorAll('" . $changing_elements . "').forEach(function(element) {" . PHP_EOL;
            $js .= "element.addEventListener('change', function() {" . PHP_EOL;
        }

        if ($device != '') {
            $device = '.' . $device;
        }
        $css = "#awesomesauce_preview" . $device . " #awesomesauce_preview_container .awesomesauce_block " . $target_element . "{" . $property[0] . ":";
        array_shift($property);
        for ($i = 0; $i < count($property); $i++) {
            $css .= $property[$i];
            if (isset($source_elements[$i])) {
                if ($changing_elements == '') {
                    $css .= "' + document.querySelector('" . $source_elements[$i] . "').value + '";
                } else {
                    if (!empty($source_elements[$i])) {
                        if (!self::string_contains($source_elements[$i], 'document.')) {
                            $css .= "' + document.querySelector('" . $source_elements[$i] . "').value + '";
                        } else {
                            $css .= "' + " . $source_elements[$i] . " + '";
                        }
                    }
                }
            }
        }
        $css .= ";";
        $css .= $additional_css;
        $css .= "}";

        $js .= "var existingStyle = document.getElementById('" . $id . "');" . PHP_EOL . "
                if (existingStyle) existingStyle.parentNode.removeChild(existingStyle);" . PHP_EOL . "
                
                var style = document.createElement('style');" . PHP_EOL . "
                style.id = '" . $id . "';" . PHP_EOL . "
                style.textContent = '" . $css . "';" . PHP_EOL . "
                document.head.appendChild(style);" . PHP_EOL;

        $js .= "});" . PHP_EOL . "});" . PHP_EOL;

        return $js;
    }

    private function admin_preview_animation($source_elements, $target_element, $property, $easing = '1s ease infinite', $changing_elements = '') {
        if ($easing == '') {
            $easing = '1s ease infinite';
        }

        if ($changing_elements == '') {
            $id = 'awesomesauce_admin_preview_' . str_replace(array(
                    '.',
                    '#'
                ), '', $source_elements[0]) . '-' . $this->admin_preview_js_counter;

            $js = "document.querySelectorAll('" . implode(', ', array_unique($source_elements)) . "').forEach(function(element) {" . PHP_EOL;
            $js .= "element.addEventListener('change', function() {" . PHP_EOL;
        } else {
            $id = 'awesomesauce_admin_preview_' . str_replace(array(
                    '.',
                    '#'
                ), '', $changing_elements) . '-' . $this->admin_preview_js_counter;

            $js = "document.querySelectorAll('" . $changing_elements . "').forEach(function(element) {" . PHP_EOL;
            $js .= "element.addEventListener('change', function() {" . PHP_EOL;
        }

        $css = "#awesomesauce_preview #awesomesauce_preview_container .awesomesauce_block " . $target_element . "{ animation:" . $property[0] . "_admin " . $easing . ";}";

        $css .= "@keyframes " . $property[0] . "_admin {";
        array_shift($property);
        for ($i = 0; $i < count($property); $i++) {
            $css .= $property[$i];
            if (isset($source_elements[$i])) {
                if ($changing_elements == '') {
                    $css .= "' + document.querySelector('" . $source_elements[$i] . "').value + '";
                } else {
                    if (!empty($source_elements[$i])) {
                        if (!self::string_contains($source_elements[$i], 'document.')) {
                            $css .= "' + document.querySelector('" . $source_elements[$i] . "').value + '";
                        } else {
                            $css .= "' + " . $source_elements[$i] . " + '";
                        }
                    }
                }
            }
        }
        $css .= "}";

        $js .= "var existingStyle = document.getElementById('" . $id . "');" . PHP_EOL . "
                if (existingStyle) existingStyle.parentNode.removeChild(existingStyle);" . PHP_EOL . "
                
                var style = document.createElement('style');" . PHP_EOL . "
                style.id = '" . $id . "';" . PHP_EOL . "
                style.textContent = '" . $css . "';" . PHP_EOL . "
                document.head.appendChild(style);" . PHP_EOL;

        $js .= "});" . PHP_EOL . "});" . PHP_EOL;

        return $js;
    }

    private function admin_preview_style($source_element, $target_element, $property, $additional_css = '', $additional_unit = '', $default = '') {
        $id = 'awesomesauce_admin_preview_' . str_replace(array(
                '.',
                '#'
            ), '', $source_element) . '-' . $this->admin_preview_js_counter;

        if (!$this::string_contains($property, ':')) {
            $property .= ':';
        }

        if ($this::string_contains($additional_unit, '#awesomesauce')) {
            $additional_unit = 'document.querySelector("' . $additional_unit . '").value';
        } else {
            $additional_unit = "'" . $additional_unit . "'";
        }

        $js = "if(value=='normal'){var css = '" . $default . "';} else {var css = value + " . $additional_unit . ";}" . PHP_EOL;

        $css = "#awesomesauce_preview #awesomesauce_preview_container .awesomesauce_block " . $target_element . "{" . $property . "' + css + ';" . $additional_css . "}";

        $js .= "var existingStyle = document.getElementById('" . $id . "');" . PHP_EOL . "
                if (existingStyle) existingStyle.parentNode.removeChild(existingStyle);" . PHP_EOL . "
                
                var style = document.createElement('style');" . PHP_EOL . "
                style.id = '" . $id . "';" . PHP_EOL . "
                style.textContent = '" . $css . "';" . PHP_EOL . "
                document.head.appendChild(style);";

        return $js;
    }

    private function admin_preview_full_style($source_element, $id) {
        return "var existingStyle = document.getElementById('" . $id . "');" . PHP_EOL . "
                if (existingStyle) existingStyle.parentNode.removeChild(existingStyle);" . PHP_EOL . "
                
                var style = document.createElement('style');" . PHP_EOL . "
                style.id = '" . $id . "';" . PHP_EOL . "
                style.textContent = document.querySelector('" . $source_element . "').value;" . PHP_EOL . "
                document.head.appendChild(style);";
    }

    private function admin_preview_google_font($source_element, $target_element) {
        $js = "awesomesauce_call_in_google_font(value);" . PHP_EOL;
        $js .= "if(value.includes(' ') && !value.includes(',') && !value.includes('\'') && !value.includes('\"')) { value = '\'' + value + '\'' };" . PHP_EOL;
        $js .= $this->admin_preview_style($source_element, $target_element, 'font-family');

        return $js;
    }

    private function admin_preview_font_weight($source_element, $target_element) {
        $id = 'awesomesauce_admin_preview_' . str_replace(array(
                '.',
                '#'
            ), '', $source_element) . '-' . $this->admin_preview_js_counter;

        $js = "var css='#awesomesauce_preview #awesomesauce_preview_container .awesomesauce_block " . $target_element . "{';" . PHP_EOL;
        $js .= "if(value.includes('italic')){" . PHP_EOL;
        $js .= "value = value.replace('italic', '');" . PHP_EOL;

        $js .= "css += 'font-style:italic;';" . PHP_EOL;

        $js .= "} else {" . PHP_EOL;
        $js .= "css += 'font-style:normal;';" . PHP_EOL;

        $js .= "}" . PHP_EOL;

        $js .= "css += 'font-weight:' + value + ';}';" . PHP_EOL;

        $js .= "var existingStyle = document.getElementById('" . $id . "');" . PHP_EOL . "
                if (existingStyle) existingStyle.parentNode.removeChild(existingStyle);" . PHP_EOL . "
                
                var style = document.createElement('style');" . PHP_EOL . "
                style.id = '" . $id . "';" . PHP_EOL . "
                style.textContent = css;" . PHP_EOL . "
                document.head.appendChild(style);";

        return $js;
    }

    private function admin_preview_text_shadow($id, $target_element) {
        $js = "document.querySelectorAll('#awesomesauce_" . $id . "_text_shadow, #awesomesauce_" . $id . "_text_shadow_strength').forEach(function(element) {" . PHP_EOL;

        $js .= "element.addEventListener('change', function() {" . PHP_EOL . "
                   var color = document.querySelector('#awesomesauce_" . $id . "_text_shadow').value;" . PHP_EOL . "
                   var strength = parseInt(document.querySelector('#awesomesauce_" . $id . "_text_shadow_strength').value);" . PHP_EOL . "
                   var shadow = '';
                   if(strength > 0) {
                       for (var i = 0; i < strength; i++) {
                          shadow += '0 0 0.' + (i + 1) + 'em ' + color + ',';
                       }
                       shadow = shadow.slice(0, -1);
                   } else {
                       shadow = 'none';
                   }" . PHP_EOL;

        $css = "#awesomesauce_preview #awesomesauce_preview_container .awesomesauce_block " . $target_element . "{text-shadow: ' + shadow + ';}";

        $id = $id . '_text_shadow';
        $js .= "var existingStyle = document.getElementById('" . $id . "');" . PHP_EOL . "
                if (existingStyle) existingStyle.parentNode.removeChild(existingStyle);" . PHP_EOL . "
                
                var style = document.createElement('style');" . PHP_EOL . "
                style.id = '" . $id . "';" . PHP_EOL . "
                style.textContent = '" . $css . "';" . PHP_EOL . "
                document.head.appendChild(style);";
        $js .= "});";

        $js .= "});";

        return $js;
    }

    private function admin_preview_js_variable_textarea($target_element, $additional_js) {
        return "var textarea_values = value.split('\\n');" . PHP_EOL . "
        textarea_values.forEach(function(item, i){" . PHP_EOL . "
            if(item==''){" . PHP_EOL . "
                textarea_values.splice(i, 1);" . PHP_EOL . "
            }" . PHP_EOL . "
        });" . PHP_EOL . "
        if(textarea_values.length < 1){" . PHP_EOL . "
           textarea_values.push('empty');" . PHP_EOL . "
        }" . PHP_EOL . "
        if(textarea_values.length < 2){" . PHP_EOL . "
           textarea_values.push(textarea_values[0]);" . PHP_EOL . "
        }" . PHP_EOL . "
        window." . $target_element . " = textarea_values;" . $additional_js;
    }

    private function admin_preview_js_variable_input($source_element, $array_max = 0, $trigger_reset = true, $additional_js = '') {
        $js = '';
        if ($array_max == 0) {
            $js .= "var element = document.querySelector('#awesomesauce_" . $source_element . "');
                   element.addEventListener('change', function() {" . PHP_EOL . "
                   var value = element.value;" . PHP_EOL . "
                   
                   if(element.getAttribute('type') == 'number'){" . PHP_EOL . "
                      if(value.includes('.') || value.includes(',')){
                        var value = parseFloat(element.value);" . PHP_EOL . "                     
                      } else {
                        var value = parseInt(element.value);" . PHP_EOL . "   
                      }
                   }" . PHP_EOL;
            $js .= "window.awesomesauce_settings[" . self::$post_id . "]." . $source_element . " = value;";
            if ($trigger_reset) {
                $js .= "window.awesomesauce[" . self::$post_id . "].reset();";
            }
            $js .= $additional_js;
            $js .= "});";

        } else {
            for ($i = 0; $i <= $array_max; $i++) {
                $js .= "document.querySelector('#awesomesauce_" . $source_element . $i . "').addEventListener('change', function() {" . PHP_EOL . "var value = document.querySelector('#awesomesauce_" . $source_element . $i . "').value;" . PHP_EOL;
                $js .= "window.awesomesauce_settings[" . self::$post_id . "]." . $source_element . "[" . $i . "] = value;";
                if ($trigger_reset) {
                    $js .= "window.awesomesauce[" . self::$post_id . "].reset();";
                }
                $js .= $additional_js;
                $js .= "});";
            }
        }

        return $js;
    }

    private function admin_preview_reset() {
        return "window.awesomesauce[" . self::$post_id . "].reset();";
    }

    private function admin_preview_add_link_to_block() {
        return "var selector = '#awesomesauce_block_" . self::$post_id . "';" . PHP_EOL . "
        
                var link = document.getElementById('awesomesauce_block_link').value.trim();" . PHP_EOL . "
                var target = document.getElementById('awesomesauce_block_link_target').value;" . PHP_EOL . "
                var rel = document.getElementById('awesomesauce_block_link_rel').value;" . PHP_EOL . "
                var linkClass = document.getElementById('awesomesauce_block_link_class').value;" . PHP_EOL . "
                
                var selectedElement = document.querySelector(selector);" . PHP_EOL . "
                
                if(selectedElement.parentElement.tagName === 'A'){" . PHP_EOL . "
                    var parentLink = selectedElement.parentElement;" . PHP_EOL . "
                }" . PHP_EOL . "
                
                if (!link) {" . PHP_EOL . "
                    if (parentLink) {" . PHP_EOL . "
                        parentLink.replaceWith(...parentLink.childNodes);" . PHP_EOL . "
                    }" . PHP_EOL . "
                } else {" . PHP_EOL . "
                    var attributes = '';" . PHP_EOL . "
                    if (target) attributes += ' target=\"' + target + '\"';" . PHP_EOL . "
                    if (rel) attributes += ' rel=\"' + rel + '\"';" . PHP_EOL . "
                    if (linkClass) attributes += ' class=\"' + linkClass + '\"';" . PHP_EOL . "
                
                    if (parentLink) {" . PHP_EOL . "
                        parentLink.href = link;" . PHP_EOL . "
                        parentLink.target = target || '';" . PHP_EOL . "
                        parentLink.rel = rel || '';" . PHP_EOL . "
                        parentLink.className = linkClass + ' awesomesauce_link';" . PHP_EOL . "
                    } else {" . PHP_EOL . "
                        var wrapper = document.createElement('a');" . PHP_EOL . "
                        wrapper.href = link;" . PHP_EOL . "
                        wrapper.target = target || '';" . PHP_EOL . "
                        wrapper.rel = rel || '';" . PHP_EOL . "
                        wrapper.className = linkClass + ' awesomesauce_link';" . PHP_EOL . "
                        
                        selectedElement.parentNode.insertBefore(wrapper, selectedElement);" . PHP_EOL . "
                        wrapper.appendChild(selectedElement);" . PHP_EOL . "
                    }" . PHP_EOL . "
                }";
    }

    private function admin_preview_add_attr_to_block() {
        return "var element = document.getElementById('awesomesauce_block_" . self::$post_id . "');" . PHP_EOL . "
                var customAttributes = document.getElementById('awesomesauce_custom_attributes').value.trim();" . PHP_EOL . "
                var currentAttributes = Array.from(element.attributes);" . PHP_EOL . "
                var disallowedAttributes = ['id', 'class', 'style'];" . PHP_EOL . "
                currentAttributes.forEach(function(attr) {" . PHP_EOL . "
                    if (!disallowedAttributes.includes(attr.name) && !attr.name.startsWith('on')) {" . PHP_EOL . "
                        element.removeAttribute(attr.name);" . PHP_EOL . "
                    }" . PHP_EOL . "
                });" . PHP_EOL . "
                
                var attributeLines = customAttributes.split('\\n');" . PHP_EOL . "
                attributeLines.forEach(function(line) {" . PHP_EOL . "
                    var parts = line.split('=');" . PHP_EOL . "
                    if (parts.length > 1) {" . PHP_EOL . "
                        var attrName = parts[0].trim();" . PHP_EOL . "
                        var attrValue = parts[1].trim();" . PHP_EOL . "
            
                        attrValue = attrValue.replace(/^['\"]|['\"]$/g, '');" . PHP_EOL . "
                        attrValue = attrValue.replace(/[\\\"\'<>\//\\\]/g, '');" . PHP_EOL . "
            
                        if (!disallowedAttributes.includes(attrName) && !attrName.startsWith('on')) {" . PHP_EOL . "
                            element.setAttribute(attrName, attrValue);" . PHP_EOL . "
                        }" . PHP_EOL . "
                    }" . PHP_EOL . "
                });";
    }

}