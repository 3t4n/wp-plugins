<?php

namespace Awesomesauce\Blocks\Particles\SpaceTravel;

use Awesomesauce\Admin\BlockSettings;

if (!defined('ABSPATH')) {
    exit;
}

class Html extends BlockSettings {

    public $text;

    public function init() {
        $this->text = $this->text_setting('The stars will be our destination.');
    }

    public function getHtml() {
        $html = '<canvas class="awesomesauce_canvas"></canvas>';
        $html .= $this->text();

        return $html;
    }
}