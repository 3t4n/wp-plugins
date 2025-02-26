<?php

namespace Awesomesauce\Blocks\Clocks\Analog;

use Awesomesauce\Admin\BlockSettings;

if (!defined('ABSPATH')) {
    exit;
}

class Js extends BlockSettings {

    public function getJs() {
        $common = '
        class AwesomesauceClocksAnalog {
            constructor(block_id) {
                var parent_element = "#awesomesauce_block_" + block_id;
                var dialLines = document.querySelectorAll(parent_element + " .diallines");
                this.clockEl = document.querySelector(parent_element + " .clock");
                
                for (var i = 1; i < 60; i++) {
                  dialLines[i].style.transform = "rotate(" + 6 * i + "deg)";
                }
                
                this.clock();
                
                setInterval((function(){
                    this.clock();
                }).bind(this), 1000);
            }

            clock() {
                 var d = new Date(),
                  h = d.getHours(),
                  m = d.getMinutes(),
                  s = d.getSeconds(),
            
                  hDeg = h * 30 + m * (360/720),
                  mDeg = m * 6 + s * (360/3600),
                  sDeg = s * 6,
            
                  hEl = this.clockEl.querySelector(".hour-hand"),
                  mEl = this.clockEl.querySelector(".minute-hand"),
                  sEl = this.clockEl.querySelector(".second-hand");
                
                  hEl.style.transform = "rotate("+hDeg+"deg)";
                  mEl.style.transform = "rotate("+mDeg+"deg)";
                  sEl.style.transform = "rotate("+sDeg+"deg)";
            }
        };';

        return array(
            'common' => $common
        );
    }
}