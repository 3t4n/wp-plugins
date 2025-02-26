<?php

namespace Awesomesauce\Blocks\JsTextEffects\Patch;

use Awesomesauce\Admin\BlockSettings;

if (!defined('ABSPATH')) {
    exit;
}

class Html extends BlockSettings {

    public function getHtml() {
        $texts = $this->get_value('texts', array('Even the smallest person'), true);
        $html  = '<div class="awesomesauce_text">' . $texts[0] . '</div>';

        return $html;
    }
}