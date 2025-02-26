<?php

namespace Awesomesauce\Blocks\Data\BarCode;

use Awesomesauce\Admin\BlockSettings;

if (!defined('ABSPATH')) {
    exit;
}

class Html extends BlockSettings {

    public function init() {
        $this->text_setting('3141592653589793238', '', 'Text to encode', 'text', false, '', false, false, true);
    }

    public function getHtml() {
        $html = $this->html('', 'canvas', array('class' => 'awesomesauce_canvas'), false);

        return $html;
    }
}