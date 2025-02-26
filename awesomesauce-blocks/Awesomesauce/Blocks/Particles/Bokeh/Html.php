<?php

namespace Awesomesauce\Blocks\Particles\Bokeh;

use Awesomesauce\Admin\BlockSettings;

if (!defined('ABSPATH')) {
    exit;
}

class Html extends BlockSettings {

    public $text;

    public function init() {
        $this->text = $this->text_setting('Within every particle lies a spark of life.');
    }

    public function getHtml() {
        $html = $this->text();
        $html .= '<canvas class="awesomesauce_canvas1"></canvas>';
        $html .= '<canvas class="awesomesauce_canvas2"></canvas>';

        return $html;
    }
}