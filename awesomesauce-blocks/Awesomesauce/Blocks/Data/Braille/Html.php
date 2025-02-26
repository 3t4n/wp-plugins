<?php

namespace Awesomesauce\Blocks\Data\Braille;

use Awesomesauce\Admin\BlockSettings;

if (!defined('ABSPATH')) {
    exit;
}

class Html extends BlockSettings {

    public function init() {
        $this->text_setting('Louis Braille', '.awesomesauce_text', 'Text to encode', 'text', false, '', false, false, true);
    }

    public function getHtml() {
        $html = $this->html('', 'div', array('class' => 'awesomesauce_text'), false);

        return $html;
    }
}