<?php

namespace Awesomesauce\Blocks\Clocks\Analog;

use Awesomesauce\Admin\BlockSettings;

if (!defined('ABSPATH')) {
    exit;
}

class Html extends BlockSettings {

    public function getHtml() {
        $html = '<div class="clock_border">';
        $html .= '<div class="clock">';

        $html .= '<div class="dot"></div>';
        $html .= '<div class="dot-border"></div>';

        $html .= '<div class="hour-hand"></div>';
        $html .= '<div class="minute-hand"></div>';
        $html .= '<div class="second-hand"></div>';

        $html .= '<span class="h3 number">3</span>';
        $html .= '<span class="h6 number">6</span>';
        $html .= '<span class="h9 number">9</span>';
        $html .= '<span class="h12 number">12</span>';

        for ($i = 1; $i <= 60; $i++) {
            $html .= '<div class="diallines"><div class="diallines-color"></div></div>';
        }
        $html .= '</div>';
        $html .= '</div>';

        return $html;
    }
}