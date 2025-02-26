<?php

namespace Awesomesauce\Blocks\Clocks\Neon;

use Awesomesauce\Admin\BlockSettings;

if (!defined('ABSPATH')) {
    exit;
}

class Js extends BlockSettings {

    public function getJs() {
        $common = '
            class AwesomesauceClocksNeon {
                constructor(block_id) {
                    this.bars = [
                        ["end", "top"],
                        ["side", "top", "left"],
                        ["side", "top", "right"],
                        ["middle"],
                        ["side", "bottom", "left"],
                        ["side", "bottom", "right"],
                        ["end", "bottom"]
                    ];
            
                    this.main = document.querySelector("#awesomesauce_block_" + block_id + " .awesomesauce_main");
            
                    this.init();
                }
            
                initGroup(number, padding = 2) {
                    var group = document.createElement("div");
                    group.classList.add("group");
            
                    var digits = number.toString().split("").map(digit => {
                        var digit = document.createElement("div");
                        digit.classList.add("digit");
                        digit.setAttribute("data-digit", digit);
                        this.bars.forEach(classes => {
                            var span = document.createElement("span");
                            span.classList.add(...classes);
                            digit.append(span);
                        });
            
                        return digit;
                    });
            
                    digits.forEach(digit => {
                        group.append(digit);
                    });
            
                    return {
                        element: group,
                        set number(val) {
                            number = val;
                            number.toString().split("").forEach((digit, i) => {
                                digits[i].setAttribute("data-digit", digit);
                            });
                        },
            
                        get number() {
                            return number;
                        }
                    }
                }
            
                addDigits(number) {
                    var digits = document.createElement("div");
                    digits.classList.add("digits");
                    var group = this.initGroup(number);
                    var groupShadow1 = this.initGroup(number);
                    var groupShadow2 = this.initGroup(number);
                    groupShadow1.element.classList.add("shadow");
                    groupShadow1.element.classList.add("shadow1");
                    groupShadow2.element.classList.add("shadow");
                    groupShadow2.element.classList.add("shadow2");
                    digits.append(group.element);
                    digits.append(groupShadow1.element);
                    digits.append(groupShadow2.element);
                    this.main.append(digits);
            
                    return {
                        set number(val) {
                            number = val;
                            group.number = val;
                            groupShadow1.number = val;
                            groupShadow2.number = val;
                        },
                        get number() {
                            return number;
                        }
                    }
                }
            
                addColon() {
                    var colonGroup = document.createElement("div");
                    colonGroup.classList.add("colon-group");
                    var colon = document.createElement("div");
                    colon.append(document.createElement("span"));
                    var colonShadow1 = document.createElement("div");
                    colonShadow1.append(document.createElement("span"));
                    var colonShadow2 = document.createElement("div");
                    colonShadow2.append(document.createElement("span"));
                    colon.classList.add("colon");
                    colonShadow1.classList.add("colon", "shadow", "shadow1");
                    colonShadow2.classList.add("colon", "shadow", "shadow2");
                    colonGroup.append(colon);
                    colonGroup.append(colonShadow1);
                    colonGroup.append(colonShadow2);
                    this.main.append(colonGroup);
                }
            
                init() {
                    let now = new Date();
                    let hours = String(now.getHours()).padStart(2, "0");
                    let minutes = String(now.getMinutes()).padStart(2, "0");
                    let seconds = String(now.getSeconds()).padStart(2, "0");
            
                    this.numberHour = this.addDigits(hours);
                    this.addColon();
                    this.numberMinute = this.addDigits(minutes);
                    this.addColon();
                    this.numberSecond = this.addDigits(seconds);
            
                    this.update(now, hours, minutes, seconds);
                }
            
                update(now, hours, minutes, seconds) {
                    now = new Date();
                    let newSeconds = String(now.getSeconds()).padStart(2, "0");
                    if (seconds !== newSeconds) {
                        hours = String(now.getHours()).padStart(2, "0");
                        minutes = String(now.getMinutes()).padStart(2, "0");
                        seconds = newSeconds;
                        this.numberHour.number = hours;
                        this.numberMinute.number = minutes;
                        this.numberSecond.number = seconds;
                    }
            
                    requestAnimationFrame(() => this.update(now, hours, minutes, seconds));
                }
            }';

        $unique = '
        document.addEventListener("DOMContentLoaded", function() {
            if (/^(?:(?!chrome|android)[\s\S])*(?:safari|iPad|iPhone|iPod)/i.test(navigator.userAgent)) {
                document.querySelector("#awesomesauce_block_' . self::$post_id . ' .awesomesauce_main").classList.add("safari");
            }
        });';

        return array(
            'common' => $common,
            'unique' => $unique
        );
    }
}