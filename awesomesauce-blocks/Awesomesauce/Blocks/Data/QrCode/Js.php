<?php

namespace Awesomesauce\Blocks\Data\QrCode;

use Awesomesauce\Admin\BlockSettings;

if (!defined('ABSPATH')) {
    exit;
}

class Js extends BlockSettings {

    private $color;

    public function init() {
        $this->admin_preview_manager('js_variable_input', 'text');
        $this->admin_preview_manager('js_variable_input', 'code_size_desktop');

        $this->color = $this->script_setting('color', 'QR code color', 'color_picker', '#000000', array(
            '',
            true
        ), 2);

        $this->admin_preview_manager('js_variable_input', 'color');
    }

    public function getJs() {

        $common = '
                class AwesomesauceDataQrCode {
                    constructor(block_id) {
                        this.block_id = block_id;                        
                        this.text_element = document.querySelector("#awesomesauce_block_" + block_id + " .awesomesauce_code");
                        
                        this.reset();
                    }
                    
                    reset(){
                        this.text_element.innerHTML = "";
                        this.text_element.setAttribute("aria-label", window.awesomesauce_settings[this.block_id].text);
                        new AwesomesauceQRCode(
                                this.text_element, {
                                    text: window.awesomesauce_settings[this.block_id].text,
                                    colorLight : "rgba(0,0,0,0)",
	                                colorDark : window.awesomesauce_settings[this.block_id].color,
                                    width: window.awesomesauce_settings[this.block_id].code_size_desktop,
                                    height: window.awesomesauce_settings[this.block_id].code_size_desktop
                                }
                            );
                    }
                }
            ';

        $unique = 'window.awesomesauce_settings[' . self::$post_id . '] = {
                text: "' . esc_attr($this->get_value('text', 'https://cat-bounce.com/')) . '",
                color: "' . esc_attr($this->color) . '",
                code_size_desktop: "' . intval($this->get_value('awesomesauce_code_size_desktop', '300')) . '"
            };';

        return array(
            'common'  => $common,
            'unique'  => $unique,
            'library' => 1
        );
    }
}