<?php

namespace Awesomesauce\Blocks\CssTextEffects\Lightness;

use Awesomesauce\Admin\BlockSettings;

if (!defined('ABSPATH')) {
    exit;
}

class Html extends BlockSettings {

    public $text;

    public function init() {
        $this->text = $this->text_setting('LIGHTNESS');
    }

    public function getHtml() {
        $html = $this->text('lightness_main awesomesauce_text');
        $html .= '<div class="lightness_shadow awesomesauce_text" aria-hidden="true">' . $this->text['text'] . '</div>';

        return $html;
    }
}