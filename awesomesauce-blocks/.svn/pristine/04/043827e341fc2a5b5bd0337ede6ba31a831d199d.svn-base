<?php

namespace Awesomesauce\Blocks\Clocks\Rotate;

use Awesomesauce\Admin\BlockSettings;

if (!defined('ABSPATH')) {
    exit;
}

class Html extends BlockSettings {

    public $text = array();

    public function init() {
        $this->text = $this->text_setting('CLOCK');
    }

    public function getHtml() {
        $html = '<div class="clock">';
        $html .= $this->text();
        $html .= '<div class="s items"></div>';
        $html .= '<div class="m items"></div>';
        $html .= '<div class="h items"></div>';
        $html .= '</div>';

        return $html;
    }
}