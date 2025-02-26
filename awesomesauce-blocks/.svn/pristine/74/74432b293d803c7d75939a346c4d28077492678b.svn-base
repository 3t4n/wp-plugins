<?php

namespace Awesomesauce\Blocks\Particles\Bokeh;

use Awesomesauce\Admin\BlockSettings;

if (!defined('ABSPATH')) {
    exit;
}

class Js extends BlockSettings {

    private $particle_colors;

    public function init() {

        $this->particle_colors = $this->script_setting('particle_colors', 'Particle base colors', 'multi_color_picker', array(
            '#0026FF',
            '#FFFFFF'
        ), array(
            array(
                'Base color for most particles.',
                'Base color for highlighted particles.'
            ),
            true,
            false
        ), 1);

        $this->admin_preview_manager('js_variable_input', 'particle_colors', 1);
    }

    public function getJs() {

        $common = '
            class AwesomesauceParticlesBokeh {
                constructor(block_id) {
                    this.block_id = block_id;
                    this.block_element = "#awesomesauce_block_" + this.block_id;
                    this.container = document.querySelector(this.block_element);
        
                    this.c1 = document.querySelector(this.block_element + " .awesomesauce_canvas1");
                    this.ctx1 = this.c1.getContext("2d");
                    this.c2 = document.querySelector(this.block_element + " .awesomesauce_canvas2");
                    this.ctx2 = this.c2.getContext("2d");
                    this.twopi = Math.PI * 2;
                    this.parts = [];
                    this.sizeBase;
                    this.cw;
                    this.ch;
                    this.opt;
                    this.hue;
                    this.count;
        
                    this.init();
                }
        
                rand(min, max) {
                    return Math.random() * (max - min) + min;
                }
        
                hsla(h, s, l, a) {
                    return `hsla(${h},${s}%,${l}%,${a})`;
                }
        
                rgbToHsl(r, g, b) {
                    r /= 255;
                    g /= 255;
                    b /= 255;
                    let max = Math.max(r, g, b), min = Math.min(r, g, b);
                    let h, s, l = (max + min) / 2;
        
                    if (max === min) {
                        h = s = 0;
                    } else {
                        let d = max - min;
                        s = l > 0.5 ? d / (2 - max - min) : d / (max + min);
                        switch (max) {
                            case r: h = (g - b) / d + (g < b ? 6 : 0); break;
                            case g: h = (b - r) / d + 2; break;
                            case b: h = (r - g) / d + 4; break;
                        }
                        h /= 6;
                    }
                    return [h * 360, s, l];
                }
        
                create(hueBase) {
                    this.sizeBase = this.cw + this.ch;                    
                    this.count = Math.floor(this.sizeBase * (0.01 + (100/this.sizeBase)));
                    this.opt = {
                        radiusMin: 1,
                        radiusMax: this.sizeBase * 0.04,
                        blurMin: 10,
                        blurMax: this.sizeBase * 0.04,
                        hueMin: hueBase,
                        hueMax: hueBase + 100,
                        saturationMin: 70,
                        saturationMax: 100,
                        lightnessMin: 50,
                        lightnessMax: 70,
                        alphaMin: 0.3,
                        alphaMax: 0.8
                    };
                    this.ctx1.clearRect(0, 0, this.cw, this.ch);
                    this.ctx1.globalCompositeOperation = "lighter";
                    while (this.count--) {
                        let radius = this.rand(this.opt.radiusMin, this.opt.radiusMax),
                            blur = this.rand(this.opt.blurMin, this.opt.blurMax),
                            x = this.rand(0, this.cw),
                            y = this.rand(0, this.ch),
                            hue = this.rand(this.opt.hueMin, this.opt.hueMax),
                            saturation = this.rand(this.opt.saturationMin, this.opt.saturationMax),
                            lightness = this.rand(this.opt.lightnessMin, this.opt.lightnessMax),
                            alpha = this.rand(this.opt.alphaMin, this.opt.alphaMax);
        
                        this.ctx1.shadowColor = this.hsla(hue, saturation, lightness, alpha);
                        this.ctx1.shadowBlur = blur;
                        this.ctx1.beginPath();
                        this.ctx1.arc(x, y, radius, 0, this.twopi);
                        this.ctx1.closePath();
                        this.ctx1.fill();
                    }
        
                    this.parts.length = 0;
                    for (let i = 0; i < Math.floor((this.cw + this.ch) * 0.007); i++) {
                        this.parts.push({
                            radius: this.rand(1, this.sizeBase * 0.03),
                            x: this.rand(0, this.cw),
                            y: this.rand(0, this.ch),
                            angle: this.rand(0, this.twopi),
                            vel: this.rand(0.1, 0.5),
                            tick: this.rand(0, 10000)
                        });
                    }
                }
        
                init() {
                    this.reset();
                    this.loop();
                }
        
                loop() {
                    requestAnimationFrame(this.loop.bind(this));
                    if(this.ch > 0 && this.cw > 0){
                        this.ctx2.clearRect(0, 0, this.cw, this.ch);
                        this.ctx2.globalCompositeOperation = "source-over";
                        this.ctx2.shadowBlur = 0;
                        this.ctx2.drawImage(this.c1, 0, 0);
                        this.ctx2.globalCompositeOperation = "lighter";
            
                        let i = this.parts.length;
                        this.ctx2.shadowBlur = 15;
                        this.ctx2.shadowColor = window.awesomesauce_settings[this.block_id].particle_colors[1];
                        let time = Date.now() * 0.0001;
                        while (i--) {
                            let part = this.parts[i];
            
                            part.x += Math.cos(part.angle) * part.vel;
                            part.y += Math.sin(part.angle) * part.vel;
                            part.angle += this.rand(-0.05, 0.05);
            
                            this.ctx2.beginPath();
                            this.ctx2.arc(part.x, part.y, part.radius, 0, this.twopi);
                            this.ctx2.fillStyle = this.hsla((time * 360) % 360, 100, 60, 0.5 + Math.cos(part.tick * 0.02) * 0.3);
                            this.ctx2.fill();
            
                            if (part.x - part.radius > this.cw) { part.x = -part.radius; }
                            if (part.x + part.radius < 0) { part.x = this.cw + part.radius; }
                            if (part.y - part.radius > this.ch) { part.y = -part.radius; }
                            if (part.y + part.radius < 0) { part.y = this.ch + part.radius; }
            
                            part.tick++;
                        }
                    }
                }
        
                reset() {
                    this.cw = this.c1.width = this.c2.width = this.container.offsetWidth;
                    this.ch = this.c1.height = this.c2.height = this.container.offsetHeight;
                    
                    this.ctx1.fillStyle = this.ctx2.fillStyle = "#000000";
                    this.ctx1.fillRect(0, 0, this.cw, this.ch);
                    this.ctx2.fillRect(0, 0, this.cw, this.ch);
                    
                    var particle_color = awesomesauce_color_to_rgba_array(window.awesomesauce_settings[this.block_id].particle_colors[0]);
                    
                    this.hsl = this.rgbToHsl(particle_color[0], particle_color[1], particle_color[2]);
                    this.create(this.hsl[0]);
                }
            }
        ';

        $unique = 'window.awesomesauce_settings[' . self::$post_id . '] = {
            particle_colors: ["' . esc_attr($this->particle_colors[0]) . '", "' . esc_attr($this->particle_colors[1]) . '"],
        };';

        return array(
            'common' => $common,
            'unique' => $unique,
            'reset'  => 1,
        );
    }
}