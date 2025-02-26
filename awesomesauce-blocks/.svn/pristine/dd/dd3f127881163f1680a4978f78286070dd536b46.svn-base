<?php

namespace Awesomesauce\Blocks\JsTextEffects\Patch;

use Awesomesauce\Admin\BlockSettings;

if (!defined('ABSPATH')) {
    exit;
}

class Js extends BlockSettings {

    private $texts;
    private $animation_time;

    public function init() {

        $this->texts = $this->script_setting('texts', 'Texts', 'textarea', implode(PHP_EOL, array(
            'Even the smallest person',
            'can change the course of the future',
            'The road goes ever on and on',
            'down from the door where it began',
            'Now far ahead the road has gone',
            'and I must follow if I can'
        )), array(), 1);

        $this->admin_preview_manager('js_variable_textarea', '#awesomesauce_texts', 'awesomesauce_phrases[' . self::$post_id . ']', '', 'window.awesomesauce[' . self::$post_id . '].reset();');

        $this->animation_time = $this->script_setting('animation_time', 'Animation time', 'ms_input', '800');
        $this->admin_preview_manager('js_variable_input', 'animation_time', 0, false);
    }

    public function getJs() {
        $common = '
            class AwesomesauceJsTextEffectsPatch {
                constructor(block_id) {
                    this.block_id = block_id;
                    this.el = document.querySelector("#awesomesauce_block_" + block_id + " .awesomesauce_text");
                    
                    document.querySelector("#awesomesauce_block_" + block_id).addEventListener("in_view", () => {
                        this.reset();
                        this.next();
                    });
                }
                
                reset() {
                    this.dmp = new awesomesauce_diff_match_patch();
                    this.counter = 0;
                }
            
                next() {
                    this.scramble(window.awesomesauce_phrases[this.block_id][this.counter]).then(() => {
                        setTimeout(() => {
                            this.next();
                        }, window.awesomesauce_settings[this.block_id].animation_time);
                    });
                    this.counter = (this.counter + 1) % window.awesomesauce_phrases[this.block_id].length;
                }
            
                async scramble(newText) {
                    let text = this.el.textContent;
                    let diff = this.dmp.diff_main(text, newText);
            
                    let rems = [];
                    let adds = [];
            
                    this.el.innerHTML = "";
                    for (let str of diff) {
                        let substr = document.createElement("div");
                        substr.textContent = str[1];
                        if (str[0] == -1) {
                            substr.className = "awesomesauce_remove";
                            rems.push(substr);
                            this.el.appendChild(substr);
                        } else if (str[0] == 1) {
                            substr.className = "awesomesauce_add";
                            adds.push(substr);
                            this.el.appendChild(substr);
                        } else if (str[0] == 0) {
                            this.el.appendChild(substr);
                        }
                    }
            
                    return awesomesauce_anime.timeline({duration: 2000, easing: "easeInOutCubic"})
                        .add({targets: rems, width: 0})
                        .add({targets: adds, opacity: [0, 1], width: [0, el => el.offsetWidth]}, 0)
                        .add({targets: adds, duration: 300})
                        .finished.then(() => this.el.textContent = newText);
                }
            }
        ';

        $unique = '
        window.awesomesauce_phrases[' . self::$post_id . '] = ' . $this->textarea_value_to_js_array($this->texts) . ';
        window.awesomesauce_settings[' . self::$post_id . '] = {animation_time: ' . intval($this->animation_time) . '};';

        return array(
            'common'  => $common,
            'unique'  => $unique,
            'library' => 1
        );
    }
}