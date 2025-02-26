<?php

namespace Awesomesauce\Blocks\JsTextEffects\Shuffle;

use Awesomesauce\Admin\BlockSettings;

if (!defined('ABSPATH')) {
    exit;
}

class Html extends BlockSettings {

    public function getHtml() {
        $texts = $this->get_value('texts', array('I will face my fear.'), true);
        $html  = '<div class="awesomesauce_text">' . $texts[0] . '</div>';

        return $html;
    }
}