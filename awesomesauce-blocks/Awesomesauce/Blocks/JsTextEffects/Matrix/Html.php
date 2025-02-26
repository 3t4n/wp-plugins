<?php

namespace Awesomesauce\Blocks\JsTextEffects\Matrix;

use Awesomesauce\Admin\BlockSettings;

if (!defined('ABSPATH')) {
    exit;
}

class Html extends BlockSettings {

    public $text;

    public function init() {
        $this->text = $this->text_setting('');
    }

    public function getHtml() {
        $html = '<canvas class="awesomesauce_canvas" width="500" height="200"></canvas>';
        $html .= $this->text();

        return $html;
    }
}