<?php

namespace Awesomesauce\Blocks\Data\QrCode;

use Awesomesauce\Admin\BlockSettings;

if (!defined('ABSPATH')) {
    exit;
}

class Html extends BlockSettings {

    public function init() {
        $this->text_setting('https://cat-bounce.com/', '.awesomesauce_code', 'Text to encode', 'text', false, '', false, false, true);
    }

    public function getHtml() {
        $html = $this->html('', 'div', array('class' => 'awesomesauce_code'), false);

        return $html;
    }
}