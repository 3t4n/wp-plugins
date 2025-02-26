<?php

namespace Awesomesauce\Blocks\CssTextEffects\Retro;

use Awesomesauce\Admin\BlockSettings;

if (!defined('ABSPATH')) {
    exit;
}

class Html extends BlockSettings {

    public $text = array();

    public function init() {
        $this->text[0] = $this->text_setting('RETRO', '.awesomesauce_text', 'Main text', 'text', 'h1', '.retro_text');
        $this->text[1] = $this->text_setting('Text Effect', '.retro_text_sub', 'Subtext', 'subtext');
    }

    public function getHtml() {
        $html = '<div class="retro_grid"></div>';
        $html .= '<div class="retro_lines"></div>';
        $html .= $this->html('<span class="awesomesauce_text first">' . $this->text[0]['text'] . '</span><span class="awesomesauce_text second">' . $this->text[0]['text'] . '</span>', $this->text[0]['tag'], array('class' => 'retro_text'), false);
        $html .= $this->html($this->text[1]['text'], $this->text[1]['tag'], array('class' => 'retro_text_sub'), false, true);

        return $html;
    }
}