<?php

namespace Awesomesauce\Blocks\CssTextEffects\Sliced;

use Awesomesauce\Admin\BlockSettings;

if (!defined('ABSPATH')) {
    exit;
}

class Html extends BlockSettings {

    public $text;

    public function init() {
        $this->text = $this->text_setting('SLICED');
    }

    public function getHtml() {
        $html = $this->text('sliced_top awesomesauce_text');
        $html .= '<div class="sliced_bottom awesomesauce_text" aria-hidden="true">' . $this->text['text'] . '</div>';

        return $html;
    }
}