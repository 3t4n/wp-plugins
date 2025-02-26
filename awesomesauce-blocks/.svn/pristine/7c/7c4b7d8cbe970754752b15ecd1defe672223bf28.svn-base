<?php

namespace Awesomesauce\Blocks\Particles\SpaceTravel;

use Awesomesauce\Admin\BlockSettings;

if (!defined('ABSPATH')) {
    exit;
}

class Js extends BlockSettings {

    private $hover;
    private $star_color;

    public function init() {
        $this->hover = $this->script_setting('hover', 'Hover effect', 'yes_no', 1);
        $this->admin_preview_manager('js_variable_input', 'hover', 0, false);

        $this->star_color = $this->script_setting('star_color', 'Color of stars', 'color_picker', '#ffffff', array(
            '',
            true,
            false
        ));
        $this->admin_preview_manager('js_variable_input', 'star_color');
    }

    public function getJs() {
        $common = '
            class AwesomesauceParticlesSpaceTravel {
                constructor(block_id) {
                    this.block_id = block_id;
                    this.block_element = "#awesomesauce_block_" + block_id;
                    this.block_element_selector = document.querySelector(this.block_element);
                    this.canvas = this.block_element_selector.querySelector(".awesomesauce_canvas");
                    this.context = this.canvas.getContext("2d");
                    
                    this.init();
                    this.initEvents();
                    this.step();
                }
            
                init() {
                    this.scale = window.devicePixelRatio || 1;
                    this.width = this.block_element_selector.offsetWidth * this.scale;
                    this.height = this.block_element_selector.offsetHeight * this.scale;
                    this.stars = [];
                    this.pointerX = null;
                    this.pointerY = null;
                    this.velocity = { x: 0, y: 0, tx: 0, ty: 0, z: 0.0005 };
                    this.touchInput = false;
                    this.STAR_COLOR = window.awesomesauce_settings[this.block_id].star_color;
                    this.STAR_SIZE = 3;
                    this.STAR_MIN_SCALE = 0.2;
                    this.OVERFLOW_THRESHOLD = 50;
                    this.STAR_COUNT = (this.block_element_selector.offsetWidth + this.block_element_selector.offsetHeight) / 8;
            
                    this.canvas.width = this.width;
                    this.canvas.height = this.height;
                    
                    this.generateStars();
                    this.resize();
                }
            
                reset() {
                    this.context.clearRect(0, 0, this.width, this.height);
                    this.init();
                }
            
                initEvents() {
                    this.block_element_selector.onmousemove = this.onMouseMove.bind(this);
                    this.block_element_selector.ontouchmove = this.onTouchMove.bind(this);
                    this.block_element_selector.ontouchend = this.onMouseLeave.bind(this);
                    document.onmouseleave = this.onMouseLeave.bind(this);
                }
            
                generateStars() {
                    for (let i = 0; i < this.STAR_COUNT; i++) {
                        this.stars.push({
                            x: 0,
                            y: 0,
                            z: this.STAR_MIN_SCALE + Math.random() * (1 - this.STAR_MIN_SCALE)
                        });
                    }
                }
            
                placeStar(star) {
                    star.x = Math.random() * this.width;
                    star.y = Math.random() * this.height;
                }
            
                recycleStar(star) {
                    let direction = "z";
                    let vx = Math.abs(this.velocity.x), vy = Math.abs(this.velocity.y);
            
                    if (vx > 1 || vy > 1) {
                        let axis;
                        if (vx > vy) {
                            axis = Math.random() < vx / (vx + vy) ? "h" : "v";
                        } else {
                            axis = Math.random() < vy / (vx + vy) ? "v" : "h";
                        }
                        if (axis === "h") {
                            direction = this.velocity.x > 0 ? "l" : "r";
                        } else {
                            direction = this.velocity.y > 0 ? "t" : "b";
                        }
                    }
            
                    star.z = this.STAR_MIN_SCALE + Math.random() * (1 - this.STAR_MIN_SCALE);
            
                    if (direction === "z") {
                        star.z = 0.1;
                        star.x = Math.random() * this.width;
                        star.y = Math.random() * this.height;
                    } else if (direction === "l") {
                        star.x = -this.OVERFLOW_THRESHOLD;
                        star.y = this.height * Math.random();
                    } else if (direction === "r") {
                        star.x = this.width + this.OVERFLOW_THRESHOLD;
                        star.y = this.height * Math.random();
                    } else if (direction === "t") {
                        star.x = this.width * Math.random();
                        star.y = -this.OVERFLOW_THRESHOLD;
                    } else if (direction === "b") {
                        star.x = this.width * Math.random();
                        star.y = this.height + this.OVERFLOW_THRESHOLD;
                    }
                }
            
                resize() {
                    this.scale = window.devicePixelRatio || 1;
                    this.width = this.block_element_selector.offsetWidth * this.scale;
                    this.height = this.block_element_selector.offsetHeight * this.scale;
                    this.canvas.width = this.width;
                    this.canvas.height = this.height;
                    this.stars.forEach(this.placeStar.bind(this));
                }
            
                step() {
                    this.context.clearRect(0, 0, this.width, this.height);
                    this.update();
                    this.render();
                    requestAnimationFrame(this.step.bind(this));
                }
            
                update() {
                    this.velocity.tx *= 0.96;
                    this.velocity.ty *= 0.96;
                    this.velocity.x += (this.velocity.tx - this.velocity.x) * 0.8;
                    this.velocity.y += (this.velocity.ty - this.velocity.y) * 0.8;
            
                    this.stars.forEach(star => {
                        star.x += this.velocity.x * star.z;
                        star.y += this.velocity.y * star.z;
                        star.x += (star.x - this.width / 2) * this.velocity.z * star.z;
                        star.y += (star.y - this.height / 2) * this.velocity.z * star.z;
                        star.z += this.velocity.z;
            
                        if (star.x < -this.OVERFLOW_THRESHOLD || star.x > this.width + this.OVERFLOW_THRESHOLD || star.y < -this.OVERFLOW_THRESHOLD || star.y > this.height + this.OVERFLOW_THRESHOLD) {
                            this.recycleStar(star);
                        }
                    });
                }
            
                render() {
                    this.stars.forEach(star => {
                        this.context.beginPath();
                        this.context.lineCap = "round";
                        this.context.lineWidth = this.STAR_SIZE * star.z * this.scale;
                        this.context.globalAlpha = 0.5 + 0.5 * Math.random();
                        this.context.strokeStyle = this.STAR_COLOR;
                        this.context.beginPath();
                        this.context.moveTo(star.x, star.y);
                        var tailX = this.velocity.x * 2,
                            tailY = this.velocity.y * 2;
                        if (Math.abs(tailX) < 0.1) tailX = 0.5;
                        if (Math.abs(tailY) < 0.1) tailY = 0.5;
                        this.context.lineTo(star.x + tailX, star.y + tailY);
                        this.context.stroke();
                    });
                }
            
                movePointer(x, y) {
                    if (typeof this.pointerX === "number" && typeof this.pointerY === "number") {
                        let ox = x - this.pointerX,
                            oy = y - this.pointerY;
                        this.velocity.tx = this.velocity.tx + ox / 8 * this.scale * (this.touchInput ? 1 : -1);
                        this.velocity.ty = this.velocity.ty + oy / 8 * this.scale * (this.touchInput ? 1 : -1);
                    }
                    this.pointerX = x;
                    this.pointerY = y;
                }
            
                onMouseMove(event) {
                    if(window.awesomesauce_settings[this.block_id].hover == "1"){
                        this.touchInput = false;
                        this.movePointer(event.clientX, event.clientY);
                    }
                }
            
                onTouchMove(event) {
                    if(window.awesomesauce_settings[this.block_id].hover == "1"){
                        this.touchInput = true;
                        this.movePointer(event.touches[0].clientX, event.touches[0].clientY, true);
                        event.preventDefault();
                    }
                }
            
                onMouseLeave() {
                    if(window.awesomesauce_settings[this.block_id].hover == "1"){
                        this.pointerX = null;
                        this.pointerY = null;
                    }
                }
            }
        ';

        $unique = 'window.awesomesauce_settings[' . self::$post_id . '] = {
            hover: ' . intval($this->hover) . ',
            star_color: "' . esc_attr($this->star_color) . '",
        };';

        return array(
            'common' => $common,
            'unique' => $unique,
            'reset'  => 1,
        );
    }
}