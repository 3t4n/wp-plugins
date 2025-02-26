<?php

namespace Awesomesauce\Blocks\Particles\ProjectQuantum;

use Awesomesauce\Admin\BlockSettings;

if (!defined('ABSPATH')) {
    exit;
}

class Html extends BlockSettings {

    public $text;

    public function init() {
        $this->text = $this->text_setting('project-<br>-quantum');
    }

    public function getHtml() {
        $html = '<div class="cube">';
        for ($i = 1; $i < 12; $i++) {
            $html .= '<div class="faces f' . $i . '">';
            if ($i % 2 == 1) {
                for ($j = 1; $j < 10; $j++) {
                    $html .= ' <div class="dot p' . $j . '"></div>';
                }
            } else {
                for ($j = 10; $j < 14; $j++) {
                    $html .= ' <div class="dot p' . $j . '"></div>';
                }
            }
            $html .= '</div>';
        }
        $html .= '</div>';
        $html .= '<div class="project-name">';
        $html .= $this->text();
        $html .= '</div>';

        return $html;
    }
}