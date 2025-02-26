<?php

namespace Awesomesauce\Blocks\JsTextEffects\Typewriter;

use Awesomesauce\Admin\BlockSettings;

if (!defined('ABSPATH')) {
    exit;
}

class Html extends BlockSettings {

    public $text;

    public function init() {
        $this->text = $this->text_setting('Adventure awaits ', '.sentence', 'Text', 'text', 'h2', '', false, true);
    }

    public function getHtml() {
        $html = $this->html('<span class="sentence">' . $this->text['text'] . '</span><span class="typed"></span><span class="awesomesauce_cursor">&nbsp;</span>', $this->text['tag'], array('class' => 'awesomesauce_text'), false);

        return $html;
    }
}