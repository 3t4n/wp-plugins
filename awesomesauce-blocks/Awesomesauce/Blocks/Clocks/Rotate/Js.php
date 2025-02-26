<?php

namespace Awesomesauce\Blocks\Clocks\Rotate;

use Awesomesauce\Functions;

if (!defined('ABSPATH')) {
    exit;
}

class Js extends Functions {

    public function getJs() {
        $common = '
        class AwesomesauceClocksRotate {
            constructor(block_id) {
                this.parent_element = "#awesomesauce_block_" + block_id;
                this.draw();
                this.place();
                this.clock();
            }
        
            draw() {
                for (let i = 0; i < 60; i++) {
                    let D = (i < 10) ? "0" + i : i;
                    document.querySelector(this.parent_element + " .s").innerHTML += "<div class=\"item\" data-item=" + D + ">" + D + "</div>";
                }
                for (let i = 0; i < 60; i++) {
                    let D = (i < 10) ? "0" + i : i;
                    document.querySelector(this.parent_element + " .m").innerHTML += "<div class=\"item\" data-item=" + D + ">" + D + "</div>";
                }
                for (let i = 0; i < 24; i++) {
                    let D = (i < 10) ? "0" + i : i;
                    document.querySelector(this.parent_element + " .h").innerHTML += "<div class=\"item\" data-item=" + D + ">" + D + "</div>";
                }
            }
        
            place() {
                const hdeg = 15;
                const msdeg = 6;
                document.querySelectorAll(this.parent_element + " .s .item").forEach((element, index) => {
                    element.style.transform = "rotateZ(" + (msdeg * index) + "deg) translateX(" + parseInt(200) + "px)";
                });
                document.querySelectorAll(this.parent_element + " .m .item").forEach((element, index) => {
                    element.style.transform = "rotateZ(" + (msdeg * index) + "deg) translateX(" + parseInt(170) + "px)";
                });
                document.querySelectorAll(this.parent_element + " .h .item").forEach((element, index) => {
                    element.style.transform = "rotateZ(" + (hdeg * index) + "deg) translateX(" + parseInt(140) + "px)";
                });
            }
        
            sec(ts, timer) {
                let TS = ts % 60;
                if (ts == 0 && timer) min(0, timer);
                const deg = 360 / 60 * ts;
                document.querySelectorAll(this.parent_element + " .s .item").forEach(element => {
                    element.classList.remove("active");
                });
                document.querySelector(this.parent_element + " .s .item:nth-child(" + (TS + 1) + ")").classList.add("active");
                document.querySelector(this.parent_element + " .s").style.transform = "rotateZ(-" + deg + "deg)";
                ts++;
                
                if (timer) {
                    setTimeout((function () {
                        this.sec(ts, timer)
                    }).bind(this), TIME * 1000);
                }
            }
        
            min(tm, timer) {
                let TM = tm % 60;
                if (tm == 0 && timer) hour(0, timer);
                const deg = 360 / 60 * tm;
                document.querySelectorAll(this.parent_element + " .m .item").forEach(element => {
                    element.classList.remove("active");
                });
                document.querySelector(this.parent_element + " .m .item:nth-child(" + (TM + 1) + ")").classList.add("active");
                document.querySelector(this.parent_element + " .m").style.transform = "rotateZ(-" + deg + "deg)";
                tm++;
                
                if (timer) {
                    setTimeout((function () {
                        this.min(tm, timer)
                    }).bind(this), TIME * 60000);
                }
            }
        
            hour(th, timer) {
                let TH = th % 24;
                const deg = 360 / 24 * th;
                document.querySelectorAll(this.parent_element + " .h .item").forEach(element => {
                    element.classList.remove("active");
                });
                document.querySelector(this.parent_element + " .h .item:nth-child(" + (TH + 1) + ")").classList.add("active");
                document.querySelector(this.parent_element + " .h").style.transform = "rotateZ(-" + deg + "deg)";
                th++;
                
                if (timer) {
                    setTimeout((function () {
                        this.hour(th, timer)
                    }).bind(this), TIME * 3600000);
                }
            }
        
            clock() {
                const d = new Date();
                const H = d.getHours();
                const M = d.getMinutes();
                const S = d.getSeconds();
                this.hour(H, 0);
                this.min(M, 0);
                this.sec(S, 0);
                setTimeout((function () {
                    this.clock();
                }).bind(this), 1000);
            }
        }';

        return array(
            'common' => $common
        );
    }
}