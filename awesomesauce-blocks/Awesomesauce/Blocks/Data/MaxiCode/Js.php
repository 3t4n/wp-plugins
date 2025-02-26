<?php

namespace Awesomesauce\Blocks\Data\MaxiCode;

use Awesomesauce\Admin\BlockSettings;

if (!defined('ABSPATH')) {
    exit;
}

class Js extends BlockSettings {

    private $color;

    public function init() {
        $this->admin_preview_manager('js_variable_input', 'text');
        $this->admin_preview_manager('js_variable_input', 'code_size_desktop');
        $this->admin_preview_manager('reset', 'code_size_tablet');
        $this->admin_preview_manager('reset', 'code_size_mobile');

        $this->color = $this->script_setting('color', 'MaxiCode color', 'color_picker', '#000000', array(
            '',
            true,
            false
        ), 2);

        $this->admin_preview_manager('js_variable_input', 'color');
    }

    public function getJs() {
        $common = '
                class AwesomesauceDataMaxiCode {
                    constructor(block_id) {
                        this.block_id = block_id;
                        this.block_element = "#awesomesauce_block_" + block_id;
                        this.block_element_selector = document.querySelector(this.block_element);
                        this.canvas = this.block_element_selector.querySelector(".awesomesauce_canvas");
                        this.ctx = this.canvas.getContext("2d");
                        
                        
                        this.reset();
                    }
            
                    reset() {
                        awesomesauce_bwipjs.toCanvas(this.canvas, {
                            bcid: "maxicode",      
                            text: window.awesomesauce_settings[this.block_id].text,
                            scale: this.canvas.offsetWidth/50,
                            padding: 1,
                            barcolor: awesomesauce_color_to_hex(window.awesomesauce_settings[this.block_id].color)
                        });
                    }
                }
            ';

        $unique = 'window.awesomesauce_settings[' . self::$post_id . '] = {
                text: "' . esc_attr($this->get_value('text', 'Our world is only as big as our imagination allows.')) . '",
                color: "' . esc_attr($this->color) . '",
            };';

        return array(
            'common'  => $common,
            'unique'  => $unique,
            'library' => array(
                'bwip_js',
                'MaxiCode'
            ),
            'reset'   => 1
        );
    }
}