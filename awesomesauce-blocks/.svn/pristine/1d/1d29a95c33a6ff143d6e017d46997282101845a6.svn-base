<?php

namespace Awesomesauce\Blocks\Particles\Crystals;

use Awesomesauce\Admin\BlockSettings;

if (!defined('ABSPATH')) {
    exit;
}

class Js extends BlockSettings {

    private $shadow_color;
    private $crystal_color;
    private $crystal_size;

    public function init() {

        $this->crystal_color = $this->script_setting('crystal_color', 'Crystal base color', 'color_picker', '#0026FF', array(
            'Crystal colors are generated based on this color.',
            true,
            false
        ), 1);

        $this->admin_preview_manager('js_variable_input', 'crystal_color');

        $this->shadow_color = $this->script_setting('shadow_color', 'Shadow color', 'color_picker', '#4055bf', array(
            'Shadow of the crystals.',
            true,
            false
        ), 2);

        $this->admin_preview_manager('js_variable_input', 'shadow_color');

        $this->crystal_size = $this->script_setting('crystal_size', 'Maximum crystal width', 'percentage_input', '100');
        $this->admin_preview_manager('js_variable_input', 'crystal_size');
    }

    public function getJs() {

        $common = '
            class AwesomesauceParticlesCrystals {
                constructor(block_id) {
                    this.block_id = block_id;
                    this.block_element = "#awesomesauce_block_" + block_id;
            
                    this.canvas = document.querySelector(this.block_element + " .awesomesauce_canvas");
                    this.ctx = this.canvas.getContext("2d");
                    this.bgg = document.querySelector(this.block_element + " .bg_glow");
            
                    this.init();
            
                    this.render();
                }
            
                init() {
                    this.w = this.ctx.canvas.width = document.querySelector(this.block_element).offsetWidth;
                    this.h = this.ctx.canvas.height = document.querySelector(this.block_element).offsetHeight;
            
                    this.dots = [{}];
                    this.mx = 0;
                    this.my = 0;
                    this.md = 40 + (this.w / 30);
            
                    this.maxWidth = this.w / 92 / (100 / parseInt(window.awesomesauce_settings[this.block_id].crystal_size));
                    this.minWidth = this.w / 690;
                    this.maxHeight = this.h * 0.8;
                    this.minHeight = this.h * 0.5;
                    this.maxSpeed = this.w / 40;
                    this.minSpeed = this.w / 230;
                    this.hue = this.getHueFromColor(window.awesomesauce_settings[this.block_id].crystal_color);
                    this.hueDif = 50;
                    this.glow = 10;
                    this.ctx.globalCompositeOperation = "lighter";
            
                    this.pushDots();
            
                    this.bgg.style.background = "radial-gradient(ellipse at center, " + window.awesomesauce_settings[this.block_id].shadow_color + " 0%,rgba(0,0,0,0) 100%)";
                }
            
                reset() {
                    this.ctx.clearRect(0, 0, this.w, this.h);
                    this.init();
                }
                
                rgbToHsl(r, g, b) {
                    r /= 255;
                    g /= 255;
                    b /= 255;
                    const max = Math.max(r, g, b);
                    const min = Math.min(r, g, b);
                    let h, s, l = (max + min) / 2;
                
                    if (max === min) {
                        h = s = 0;
                    } else {
                        const d = max - min;
                        s = l > 0.5 ? d / (2 - max - min) : d / (max + min);
                        switch (max) {
                            case r: h = (g - b) / d + (g < b ? 6 : 0); break;
                            case g: h = (b - r) / d + 2; break;
                            case b: h = (r - g) / d + 4; break;
                        }
                        h /= 6;
                    }
                
                    return { h, s, l };
                }
                
                getHueFromColor(color) {
                    const rgba = awesomesauce_color_to_rgba(color, 1);
                    const matches = rgba.match(/rgba?\((\d+),(\d+),(\d+),[\d.]+\)/);
                    
                    if (matches) {
                        const r = parseInt(matches[1]);
                        const g = parseInt(matches[2]);
                        const b = parseInt(matches[3]);
                        const { h } = this.rgbToHsl(r, g, b);
                        return Math.round(h * 360);
                    } else {
                        return 230;
                    }
                }
            
                pushDots(num) {
                    for (var i = 1; i < this.md; i++) {
                        this.dots.push({
                            x: Math.random() * this.w,
                            y: Math.random() * this.h / 4,
                            h: Math.random() * (this.maxHeight - this.minHeight) + this.minHeight,                            
                            w: Math.random() * (this.maxWidth - this.minWidth) + this.minWidth,
                            c: Math.random() * ((this.hue + this.hueDif) - (this.hue - this.hueDif)) + (this.hue - this.hueDif),
                            m: Math.random() * (this.maxSpeed - this.minSpeed) + this.minSpeed
                        });
                    }
                }
            
                render() {
                    this.ctx.clearRect(0, 0, this.w, this.h);
                    for (var i = 1; i < this.dots.length; i++) {
                        this.ctx.beginPath();
                        var grd = this.ctx.createLinearGradient(this.dots[i].x, this.dots[i].y, this.dots[i].x + this.dots[i].w, this.dots[i].y + this.dots[i].h);
                        grd.addColorStop(0.0, "hsla(" + this.dots[i].c + ",50%,50%,0)");
                        grd.addColorStop(0.2, "hsla(" + (this.dots[i].c + 20) + ",50%,50%,0.5)");
                        grd.addColorStop(0.5, "hsla(" + (this.dots[i].c + 50) + ",70%,60%,0.8)");
                        grd.addColorStop(0.8, "hsla(" + (this.dots[i].c + 80) + ",50%,50%,0.5)");
                        grd.addColorStop(1.0, "hsla(" + (this.dots[i].c + 100) + ",50%,50%,0)");
                        this.ctx.shadowBlur = this.glow;
                        this.ctx.shadowColor = "hsla(" + (this.dots[i].c) + ",50%,50%,1)";
                        this.ctx.fillStyle = grd;
                        this.ctx.fillRect(this.dots[i].x, this.dots[i].y, this.dots[i].w, this.dots[i].h);
                        this.ctx.closePath();
                        this.dots[i].x += this.dots[i].m / 100;
                        if (this.dots[i].x > this.w + this.maxWidth) {
                            this.dots[i].x = -this.maxWidth;
                        }
                    }
                    window.requestAnimationFrame(this.render.bind(this));
                }
            }
        ';

        $unique = 'window.awesomesauce_settings[' . self::$post_id . '] = {
            shadow_color: "' . esc_attr($this->shadow_color) . '",
            crystal_color: "' . esc_attr($this->crystal_color) . '",
            crystal_size: "' . intval($this->crystal_size) . '",
        };';

        return array(
            'common' => $common,
            'unique' => $unique,
            'reset'  => 1,
        );
    }
}