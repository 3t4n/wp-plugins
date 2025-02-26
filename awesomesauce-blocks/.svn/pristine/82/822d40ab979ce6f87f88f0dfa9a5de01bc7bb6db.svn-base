<?php

namespace Awesomesauce\Blocks\Particles\Crystals;

use Awesomesauce\Admin\BlockSettings;

if (!defined('ABSPATH')) {
    exit;
}

class Html extends BlockSettings {

    public $text;

    public function init() {
        $this->text = $this->text_setting('In the shade of the crystal, the past is left behind.');
    }

    public function getHtml() {
        $html = $this->text();
        $html .= '<div class="bg_glow"></div>';
        $html .= '<canvas class="awesomesauce_canvas"></canvas>';

        return $html;
    }
}