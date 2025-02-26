<?php

namespace Awesomesauce\Blocks\Data\MorseCode;

use Awesomesauce\Admin\BlockSettings;

if (!defined('ABSPATH')) {
    exit;
}

class Js extends BlockSettings {

    public function init() {
        $this->admin_preview_manager('js_variable_input', 'text');
    }

    public function getJs() {
        $common = '
                class AwesomesauceDataMorseCode {
                    constructor(block_id) {
                        this.block_id = block_id;                        
                        this.text_element = document.querySelector("#awesomesauce_block_" + block_id + " .awesomesauce_text");
                        
                        this.reset();
                    }
                    
                    reset(){
                        var text = window.awesomesauce_settings[this.block_id].text;
                        this.text_element.innerHTML = window["awesomesauce-morse-decoder"].encode(text);
                        this.text_element.setAttribute("aria-label", text);
                        this.text_element.setAttribute("title", text);
                    }
                }
            ';

        $unique = 'window.awesomesauce_settings[' . self::$post_id . '] = {
                text: "' . esc_attr($this->get_value('text', 'Samuel Morse')) . '",
            };';

        return array(
            'common'  => $common,
            'unique'  => $unique,
            'library' => 1
        );
    }
}