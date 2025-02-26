<?php

namespace Awesomesauce\Blocks\Clocks\Watch;

use Awesomesauce\Admin\BlockSettings;

if (!defined('ABSPATH')) {
    exit;
}

class Js extends BlockSettings {

    public function getJs() {
        $common = '
        class AwesomesauceClocksWatch {
            constructor(block_id) {
                this.parent_element = "#awesomesauce_block_" + block_id;
                requestAnimationFrame(this.updateTime.bind(this));
            }
            
            updateTime() {
              var now     = new Date();
              var hours = now.getHours(); 
              var minutes = now.getMinutes();
              var seconds = now.getSeconds();
              
              document.querySelector(this.parent_element + " .hour-hand").style.setProperty("--hour-rotation", (hours * 30) + ((minutes * 6) / 12) + "deg");
              document.querySelector(this.parent_element + " .minute-hand").style.setProperty("--minute-rotation", minutes * 6 + "deg");
              document.querySelector(this.parent_element + " .second-hand").style.setProperty("--second-rotation", seconds * 6 + "deg");
              
              setTimeout((function(){
                requestAnimationFrame(this.updateTime.bind(this));
              }).bind(this), 1000);
            }
        }';

        return array(
            'common' => $common
        );
    }
}