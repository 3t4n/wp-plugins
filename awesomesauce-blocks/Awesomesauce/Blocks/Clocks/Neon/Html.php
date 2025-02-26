<?php

namespace Awesomesauce\Blocks\Clocks\Neon;

use Awesomesauce\Admin\BlockSettings;

if (!defined('ABSPATH')) {
    exit;
}

class Html extends BlockSettings {

    public function getHtml() {
        $html = '<div class="awesomesauce_main"></div>';

        return $html;
    }
}