<?php

namespace Awesomesauce\Blocks\Data\Braille;

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
                class AwesomesauceDataBraille {
                    constructor(block_id) {
                        this.block_id = block_id;                        
                        this.text_element = document.querySelector("#awesomesauce_block_" + block_id + " .awesomesauce_text");
                        
                        this.reset();
                    }
                    
                    reset(){
                        var text = window.awesomesauce_settings[this.block_id].text;
                        this.text_element.innerHTML = this.encodeTextToBraille(text);
                        this.text_element.setAttribute("aria-label", text);
                        this.text_element.setAttribute("title", text);
                    }
                    
                    encodeTextToBraille(text) {
                        const brailleMap = {
                            "a": "⠁", "b": "⠃", "c": "⠉", "d": "⠙", "e": "⠑",
                            "f": "⠋", "g": "⠛", "h": "⠓", "i": "⠊", "j": "⠚",
                            "k": "⠅", "l": "⠇", "m": "⠍", "n": "⠝", "o": "⠕",
                            "p": "⠏", "q": "⠟", "r": "⠗", "s": "⠎", "t": "⠞",
                            "u": "⠥", "v": "⠧", "w": "⠺", "x": "⠭", "y": "⠽",
                            "z": "⠵", " ": "⠀"
                        };
            
                        const normalizedText = text.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
            
                        return normalizedText.toLowerCase().split("").map(char => {
                            return brailleMap[char] || "";
                        }).join("");
                    }
                }
            ';

        $unique = 'window.awesomesauce_settings[' . self::$post_id . '] = {
                text: "' . esc_attr($this->get_value('text', 'Louis Braille')) . '",
            };';

        return array(
            'common' => $common,
            'unique' => $unique
        );
    }
}