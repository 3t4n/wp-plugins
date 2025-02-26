<?php

namespace Awesomesauce\Blocks\Data\BarCode;

use Awesomesauce\Admin\BlockSettings;

if (!defined('ABSPATH')) {
    exit;
}

class Js extends BlockSettings {

    private $color;
    private $code_type;
    private $display_text;

    public function init() {
        $this->display_text = $this->script_setting('display_text', 'Display text', 'yes_no', 1);
        $this->admin_preview_manager('js_variable_input', 'display_text');

        $this->admin_preview_manager('js_variable_input', 'text');
        $this->admin_preview_manager('js_variable_input', 'code_size_desktop');
        $this->admin_preview_manager('reset', 'code_size_tablet');
        $this->admin_preview_manager('reset', 'code_size_mobile');

        $this->color = $this->script_setting('color', 'Barcode color', 'color_picker', '#000000', array(
            '',
            true,
            false
        ), 2);

        $this->admin_preview_manager('js_variable_input', 'color');

        $this->code_type = $this->script_setting('code_type', 'Barcode type', 'select', 'code128', array(
            array(
                'code128'   => 'Code 128',
                'code39ext' => 'Code 39 Extended',
                'code93ext' => 'Code 93 Extended'
            ),
            true
        ));

        $this->admin_preview_manager('js_variable_input', 'code_type');
    }

    public function getJs() {

        $common = '
                class AwesomesauceDataBarCode {
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
                            bcid: window.awesomesauce_settings[this.block_id].code_type,      
                            text: window.awesomesauce_settings[this.block_id].text,
                            includetext: (window.awesomesauce_settings[this.block_id].display_text == 1),
                            scale: this.canvas.offsetWidth/100,
                            barcolor: awesomesauce_color_to_hex(window.awesomesauce_settings[this.block_id].color)
                        });
                    }
                }
            ';

        $unique = 'window.awesomesauce_settings[' . self::$post_id . '] = {
                text: "' . esc_attr($this->get_value('text', '3141592653589793238')) . '",
                color: "' . esc_attr($this->color) . '",
                code_type: "' . esc_attr($this->code_type) . '",
                display_text: ' . intval($this->display_text) . ',
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