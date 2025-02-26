<?php

namespace Awesomesauce\Blocks\JsTextEffects\Shuffle;

use Awesomesauce\Admin\BlockSettings;

if (!defined('ABSPATH')) {
    exit;
}

class Js extends BlockSettings {

    private $texts;
    private $animation_time;

    public function init() {
        $this->texts = $this->script_setting('texts', 'Texts', 'textarea', implode(PHP_EOL, array(
            'I will face my fear.',
            'I will permit it to pass over me',
            'and through me.',
            'And when it has gone past,',
            'I will turn the inner eye',
            'to see its path.',
            'Where the fear has gone',
            'there will be nothing.',
            'Only I will remain.'
        )), array(), 1);

        $this->admin_preview_manager('js_variable_textarea', '#awesomesauce_texts', 'awesomesauce_phrases[' . self::$post_id . ']');

        $this->animation_time = $this->script_setting('animation_time', 'Animation time', 'ms_input', '2000');
        $this->admin_preview_manager('js_variable_input', 'animation_time', 0, false);
    }

    public function getJs() {
        $common = '
            class AwesomesauceJsTextEffectsShuffle {
                constructor(block_id) {
                    this.block_id = block_id;
                    this.element = document.querySelector("#awesomesauce_block_" + block_id + " .awesomesauce_text");
            
                    this.data = {
                        isShuffling: false,
                        repeat: 0,
                        target: [],
                        letters: "*+-/@_$[%£!XO1&>",
                        originalStrings: "",
                        singleLetters: []
                    };
            
                    document.querySelector("#awesomesauce_block_" + block_id).addEventListener("in_view", () => {
                        this.changeLetters();
                
                        this.element.innerHTML = window.awesomesauce_phrases[this.block_id][0];
                
                        setTimeout((function(){
                            this.startShuffle(1);
                        }).bind(this), window.awesomesauce_settings[this.block_id].animation_time);                        
                    });
                }
                
                startShuffle(i) {
                    const shuffleLoop = () => {
                        this.updateShuffleState();
                        this.element.innerHTML = window.awesomesauce_phrases[this.block_id][i];
                        i++;
                        if (i >= window.awesomesauce_phrases[this.block_id].length) {
                            i = 0;
                        }
                        this.divideLetters();
                
                        setTimeout(shuffleLoop, window.awesomesauce_settings[this.block_id].animation_time);
                    };
                
                    shuffleLoop();
                }
            
                shuffle(characters) {
                    for (var i = characters.length - 1; i >= 0; i--) {
            
                        var randomIndex = Math.floor(Math.random() * (i + 1));
                        var itemAtIndex = characters[randomIndex];
            
                        characters[randomIndex] = characters[i];
                        characters[i] = itemAtIndex;
                    }
                    return characters;
                }
            
                changeLetter(letter) {
                    if (letter.textContent != " ") {
                        letter.classList.add("is-changing");
                        letter.style.animationDuration = Math.random().toFixed(2) + "s";
            
                        var newChar = this.data.letters.substr(Math.random() * this.data.letters.length, 1);
            
                        letter.textContent = newChar;
                        letter.setAttribute("data-txt", newChar);
                    }
                }
            
                resetLetter(letter, value) {
                    if (letter && letter.classList.contains("is-changing")) {
                        letter.classList.remove("is-changing");
                        letter.textContent = value;
                        letter.setAttribute("data-txt", value);
                    }
                }
            
            
                divideLetters() {                
                    var text = this.element.textContent;
                    var textDivided = "";
        
                    this.data.originalStrings = text;
        
                    for (var i = 0; i < text.length; i++) {
                        textDivided += `<span class="el-sp el-st-span-${i}" data-txt="${text.substr(i, 1)}">${text.substr(i, 1)}</span>`;
                    }
        
                    this.element.innerHTML = textDivided;
                    this.data.singleLetters = this.element.querySelectorAll(".el-sp");
                }
            
                changeLetters() {
                    if (this.data.isShuffling) {
                        this.data.singleLetters.forEach((function (element, index) {
                            this.changeLetter(element);
                        }).bind(this));
                    }
            
                    setTimeout((this.changeLetters).bind(this), 10);
                }
            
                resetLetters() {
                    var randomArray = [];
                    for (var i = 0; i < this.data.singleLetters.length; i++) {
                        randomArray.push(i);
                    }
            
                    this.shuffle(randomArray);
            
                    randomArray.forEach((function (el, index) {
                        setTimeout((function () {
                            this.resetLetter(this.data.singleLetters[el], this.data.originalStrings.substring(el, el + 1));
                        }).bind(this), (Math.random() * 400)).toFixed(2);
                    }).bind(this));
                }
            
                updateShuffleState() {
                    clearTimeout(this.delay);
                    this.data.isShuffling = true;
            
                    this.delay = setTimeout((function () {
                        this.data.isShuffling = false;
                        this.resetLetters();
                    }).bind(this), 300);
                };
            }
        ';

        $unique = '
        window.awesomesauce_phrases[' . self::$post_id . '] = ' . $this->textarea_value_to_js_array($this->texts) . ';
        window.awesomesauce_settings[' . self::$post_id . '] = {animation_time: ' . intval($this->animation_time) . '};';

        return array(
            'common' => $common,
            'unique' => $unique
        );
    }
}