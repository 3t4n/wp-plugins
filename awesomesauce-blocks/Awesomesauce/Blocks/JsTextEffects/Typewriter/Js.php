<?php

namespace Awesomesauce\Blocks\JsTextEffects\Typewriter;

use Awesomesauce\Admin\BlockSettings;

if (!defined('ABSPATH')) {
    exit;
}

class Js extends BlockSettings {

    private $texts;
    private $speed = array();

    public function init() {

        $this->texts = $this->script_setting('texts', 'Texts', 'textarea', implode(PHP_EOL, array(
            'beyond',
            'out there',
            'ahead',
            'in the unknown'
        )), array(), 1);

        $this->admin_preview_manager('js_variable_textarea', '#awesomesauce_texts', 'awesomesauce_phrases[' . self::$post_id . ']');

        $this->speed['text_speed']    = $this->script_setting('text_speed', 'Text replacement speed', 'ms_input', '2000');
        $this->speed['typing_speed']  = $this->script_setting('typing_speed', 'Character typing speed', 'ms_input', '200');
        $this->speed['erasing_speed'] = $this->script_setting('erasing_speed', 'Character erasing speed', 'ms_input', '100');

        $this->admin_preview_manager('js_variable_input', 'text_speed', 0, false);
        $this->admin_preview_manager('js_variable_input', 'typing_speed', 0, false);
        $this->admin_preview_manager('js_variable_input', 'erasing_speed', 0, false);
    }

    public function getJs() {

        $common = '
            class AwesomesauceJsTextEffectsTypewriter {
                constructor(block_id) {
                    this.block_id = block_id;
                    this.el = document.querySelector("#awesomesauce_block_" + block_id + " .typed");
                    
                    this.totypeIndex = 0;
                    this.charIndex = 0;
                    
                    document.querySelector("#awesomesauce_block_" + block_id).addEventListener("in_view", () => {
                        if (window.awesomesauce_phrases[this.block_id][this.totypeIndex].length){
                            setTimeout((this.typeText).bind(this), window.awesomesauce_settings[this.block_id].text_speed);
                        }
                    });
                }
            
                typeText() {
                    if (window.awesomesauce_phrases[this.block_id][this.totypeIndex].length && this.charIndex < window.awesomesauce_phrases[this.block_id][this.totypeIndex].length) {
                        this.el.textContent += window.awesomesauce_phrases[this.block_id][this.totypeIndex].charAt(this.charIndex);
                        this.charIndex++;
                        setTimeout((this.typeText).bind(this), window.awesomesauce_settings[this.block_id].typing_speed);
                    } else {
                        setTimeout((this.eraseText).bind(this), window.awesomesauce_settings[this.block_id].text_speed);
                    }
                }
            
                eraseText() {
                    if (this.charIndex > 0) {
                        this.el.textContent = window.awesomesauce_phrases[this.block_id][this.totypeIndex].substring(0, this.charIndex - 1);
                        this.charIndex = this.charIndex - 1;
                        setTimeout((this.eraseText).bind(this), window.awesomesauce_settings[this.block_id].erasing_speed);
                    } else {
                        this.totypeIndex++;
            
                        if (this.totypeIndex >= window.awesomesauce_phrases[this.block_id].length)
                            this.totypeIndex = 0;
                        setTimeout((this.typeText).bind(this), window.awesomesauce_settings[this.block_id].text_speed);
                    }
                }
            }
        ';

        $unique = '
        window.awesomesauce_phrases[' . self::$post_id . '] = ' . $this->textarea_value_to_js_array($this->texts) . ';
        window.awesomesauce_settings[' . self::$post_id . '] = {text_speed: ' . intval($this->speed['text_speed']) . ', typing_speed: ' . intval($this->speed['typing_speed']) . ', erasing_speed: ' . intval($this->speed['erasing_speed']) . ' };';

        return array(
            'common' => $common,
            'unique' => $unique
        );
    }
}