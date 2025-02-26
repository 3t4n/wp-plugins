<?php

namespace Awesomesauce\Blocks\JsTextEffects\Matrix;

use Awesomesauce\Admin\BlockSettings;

if (!defined('ABSPATH')) {
    exit;
}

class Js extends BlockSettings {

    private $matrix_font;
    private $bg;

    public function init() {

        $this->matrix_font = $this->common_setting('font', array(
            'desktop'        => array(
                '15',
                'px'
            ),
            'tablet'         => array(
                '12',
                'px'
            ),
            'mobile'         => array(
                '10',
                'px'
            ),
            'only_unit'      => 'px',
            'font-family'    => 'Raleway',
            'color'          => '#00ff00',
            'letter-spacing' => false
        ), false, array(), 'Matrix characters', 'matrix_font');

        $this->admin_preview_manager('js_variable_input', 'matrix_font_desktop');
        $this->admin_preview_manager('js_variable_input', 'matrix_font_tablet');
        $this->admin_preview_manager('js_variable_input', 'matrix_font_mobile');

        $this->admin_preview_manager('js_variable_input', 'matrix_font_font_family');
        $this->admin_preview_manager('js_variable_input', 'matrix_font_font_weight');
        $this->admin_preview_manager('js_variable_input', 'matrix_font_color');

        $this->bg = $this->script_setting('bg_color', 'Background color', 'color_picker', '#000000', array(
            '',
            true,
            false
        ));

        $this->admin_preview_manager('js_variable_input', 'bg_color');
    }

    public function getJs() {

        $common = '
            class AwesomesauceJsTextEffectsMatrix {
                constructor(block_id) {
                    this.block_id = block_id;
                    
                    this.tablet_breakpoint = ' . self::get_option('tablet_breakpoint', '1200') . ';
                    this.mobile_breakpoint = ' . self::get_option('mobile_breakpoint', '600') . ';
                    
                    this.characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()-_=+[{]}\\|;:\'\",<.>/?手田水廿卜山戈人心日尸木火土竹十大中難金女月弓";

                    this.setup();
                    
                    document.querySelector("#awesomesauce_block_" + block_id).addEventListener("in_view", () => {
                        setInterval((function () {
                            this.matrix();
                        }).bind(this), 50);
                    });
                }
            
                matrix () {
                      this.ctx.fillStyle = awesomesauce_modify_color_opacity(window.awesomesauce_settings[this.block_id].bg_color, "0.07");
                      this.ctx.fillRect(0, 0, this.w, this.h);
                      
                      this.ctx.fillStyle = window.awesomesauce_settings[this.block_id].matrix_font_color;
                      
                      this.ypos.forEach((function(y, ind){
                                var randomIndex = Math.floor(Math.random() * this.characters.length);
                                var text = this.characters.charAt(randomIndex);
                                const x = ind * window.awesomesauce_settings[this.block_id]["matrix_font_" + this.current_breakpoint];
                                this.ctx.fillText(text, x, y);
                                if (y > 100 + Math.random() * 10000) this.ypos[ind] = 0;
                                else this.ypos[ind] = y + window.awesomesauce_settings[this.block_id]["matrix_font_" + this.current_breakpoint];
                            }).bind(this));
                }
                
                reset(){
                    this.clear();
                       
                    setTimeout((function () {
                       this.setup();
                    }).bind(this), 500);
                }
                
                clear() {
                    this.ctx.clearRect(0, 0, this.w, this.h);
                    this.check_breakpoint(document.querySelector("#awesomesauce_block_" + this.block_id).offsetWidth);
                }
                
                setup() {
                    this.canvas = document.querySelector("#awesomesauce_block_" + this.block_id + " .awesomesauce_canvas");
                    this.ctx = this.canvas.getContext("2d");
                    
                    this.w = this.canvas.width = document.querySelector("#awesomesauce_block_" + this.block_id).offsetWidth;
                    this.h = this.canvas.height = document.querySelector("#awesomesauce_block_" + this.block_id).offsetHeight;
                    this.check_breakpoint(this.w);
                                        
                    this.ctx.font = window.awesomesauce_settings[this.block_id].matrix_font_font_weight + " " + window.awesomesauce_settings[this.block_id]["matrix_font_" + this.current_breakpoint] + "px " + window.awesomesauce_settings[this.block_id].matrix_font_font_family;
                    const cols = Math.floor(this.w / window.awesomesauce_settings[this.block_id]["matrix_font_" + this.current_breakpoint]) + 1;
                    this.ypos = Array(cols).fill(0);
                    
                    this.ctx.fillStyle = window.awesomesauce_settings[this.block_id].bg_color;
                    document.querySelector("#awesomesauce_block_" + this.block_id).style.background = window.awesomesauce_settings[this.block_id].bg_color;
                    this.ctx.fillRect(0, 0, this.w, this.h);
                }
                
                check_breakpoint(block_width){
                        if(block_width > this.tablet_breakpoint){
                            this.current_breakpoint = "desktop";
                        } else if(block_width > this.mobile_breakpoint){
                            this.current_breakpoint = "tablet";
                        } else {
                            this.current_breakpoint = "mobile";
                        }
                }
            }
        ';

        $this->matrix_font['font-family'] = str_replace(array(
            "'",
            '"'
        ), '', $this->matrix_font['font-family']);

        $unique = 'window.awesomesauce_settings[' . self::$post_id . '] = {
            matrix_font_desktop: ' . intval($this->matrix_font['desktop_value']) . ',
            matrix_font_tablet: ' . intval($this->matrix_font['tablet_value']) . ',
            matrix_font_mobile: ' . intval($this->matrix_font['mobile_value']) . ',
            matrix_font_font_family: "' . esc_attr($this->matrix_font['font-family']) . '",
            matrix_font_font_weight: ' . intval($this->matrix_font['font-weight']) . ',
            matrix_font_color: "' . esc_attr($this->matrix_font['color']) . '",
            bg_color: "' . esc_attr($this->bg) . '",
        };';

        return array(
            'common' => $common,
            'unique' => $unique,
            'reset'  => 1
        );
    }
}