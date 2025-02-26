<?php

namespace Awesomesauce\Blocks\Particles\Snow;

use Awesomesauce\Admin\BlockSettings;

if (!defined('ABSPATH')) {
    exit;
}

class Html extends BlockSettings {

    public $text;

    public function init() {
        $this->text = $this->text_setting('Snow whispers secrets that only silence can hear.');
    }

    public function getHtml() {
        $html = '';
        for ($i = 0; $i < 100; $i++) {
            $html .= '<div class="snow"></div>';
        }
        $html .= $this->text();

        return $html;
    }
}