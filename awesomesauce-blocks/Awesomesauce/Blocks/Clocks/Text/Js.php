<?php

namespace Awesomesauce\Blocks\Clocks\Text;

use Awesomesauce\Admin\BlockSettings;

if (!defined('ABSPATH')) {
    exit;
}

class Js extends BlockSettings {

    public function getJs() {
        $common = '
            class AwesomesauceClocksText {
                constructor(block_id) {
                    this.parent_element = "#awesomesauce_block_" + block_id;
                    this.textClock();
            
                    setInterval((function () {
                        this.textClock();
                    }).bind(this), 1000);
                }
            
                textClock() {
                    var newDate = new Date(),
                        day = newDate.getDay(),
                        hours = newDate.getHours(),
                        minutes = newDate.getMinutes().toString(),
                        seconds = newDate.getSeconds().toString();
            
                    if (hours > 12 && hours !== 0 && hours !== 23) {
                        hours = hours - 12;
                    }
                    if (minutes < 10) {
                        minutes = 0 + minutes;
                    }
                    if (seconds < 10) {
                        seconds = 0 + seconds;
                    }
            
                    var minsSecs = minutes + seconds;
                    if (minsSecs > 3230) {
                        hours++;
                    }
                    if (day == 5) {
                        document.querySelector(this.parent_element + " .tgif").innerHTML = "<span>T</span><span>G</span><span>I</span><span>F</span>";
                    }
            
                    var hoursObj = {
                        1: ".one",
                        2: ".two",
                        3: ".three",
                        4: ".four",
                        5: ".five-hr",
                        6: ".six",
                        7: ".seven",
                        8: ".eight",
                        9: ".nine",
                        10: ".ten-hr",
                        11: ".eleven",
                        12: ".twelve",
                        23: ".eleven",
                        24: ".midnight",
                        0: ".midnight"
                    };
            
                    this.updateHour(hoursObj[hours]);
                    if ((minsSecs >= 5730 && minsSecs < 6000) || (minsSecs >= 0 && minsSecs < 230)) {
                        if (hours !== 24 && hours !== 0) {
                            this.updateDesc([".oclock"]);
                        }
                    } else if (minsSecs >= 230 && minsSecs < 730) {
                        this.updateDesc([".five", ".past"]);
                    } else if (minsSecs >= 730 && minsSecs < 1230) {
                        this.updateDesc([".ten", ".past"]);
                    } else if (minsSecs >= 1230 && minsSecs < 1730) {
                        this.updateDesc([".quarter", ".past"]);
                    } else if (minsSecs >= 1730 && minsSecs < 2230) {
                        this.updateDesc([".twenty", ".past"]);
                    } else if (minsSecs >= 2230 && minsSecs < 2730) {
                        this.updateDesc([".twenty", ".five", ".past"]);
                    } else if (minsSecs >= 2730 && minsSecs < 3230) {
                        this.updateDesc([".half", ".past"]);
                    } else if (minsSecs >= 3230 && minsSecs < 3730) {
                        this.updateDesc([".twenty", ".five", ".to"]);
                    } else if (minsSecs >= 3730 && minsSecs < 4230) {
                        this.updateDesc([".twenty", ".to"]);
                    } else if (minsSecs >= 4230 && minsSecs < 4730) {
                        this.updateDesc([".quarter", ".to"]);
                    } else if (minsSecs >= 4730 && minsSecs < 5230) {
                        this.updateDesc([".ten", ".to"]);
                    } else if (minsSecs >= 5230 && minsSecs < 5730) {
                        this.updateDesc([".five", ".to"]);
                    } else {
                        this.updateDesc();
                    }
                }
            
                updateDesc(classes) {
                    document.querySelector(this.parent_element + " .desc").classList.remove("active");
                    classes.forEach((function(selector){
                        document.querySelector(this.parent_element + " " + selector).classList.add("active");
                    }).bind(this));
                }
            
                updateHour(classes) {
                    document.querySelector(this.parent_element + " .hr").classList.remove("active");
                    document.querySelector(this.parent_element + " " + classes).classList.add("active");
                }
            }
        ';

        return array(
            'common' => $common
        );
    }
}