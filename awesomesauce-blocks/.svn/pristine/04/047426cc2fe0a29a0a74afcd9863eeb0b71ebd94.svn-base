<?php

namespace Awesomesauce\Blocks\Data\MaxiCode;

use Awesomesauce\Admin\BlockSettings;

if (!defined('ABSPATH')) {
    exit;
}

class Html extends BlockSettings {

    public function init() {
        $this->text_setting('Our world is only as big as our imagination allows.', '', 'Text to encode', 'text', false, '', false, false, true);
    }

    public function getHtml() {
        $html = $this->html('', 'canvas', array('class' => 'awesomesauce_canvas'), false);

        return $html;
    }
}