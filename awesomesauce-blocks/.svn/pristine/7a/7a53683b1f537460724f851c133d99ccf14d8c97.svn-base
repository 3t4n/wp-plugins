<?php

namespace Awesomesauce\Blocks\CssTextEffects\SweetStuff;

use Awesomesauce\Admin\BlockSettings;

if (!defined('ABSPATH')) {
    exit;
}

class Html extends BlockSettings {

    public $text = array();

    public function init() {
        $this->text[0] = $this->text_setting('Sweet', '.sweet_title_text.first', 'First line text', 'first_text', false);
        $this->text[1] = $this->text_setting('Stuff', '.sweet_title_text.second', 'Second line text', 'second_text', 'h1', '.sweet_title', true);

        $this->admin_preview_manager('attr', '#awesomesauce_first_text', '.sweet_title_text.first', 'data-text');
        $this->admin_preview_manager('attr', '#awesomesauce_second_text', '.sweet_title_text.second', 'data-text');
    }

    public function getHtml() {
        $html = $this->html('<span class="sweet_title_text first" data-text="' . $this->text[0]['text'] . '">' . $this->text[0]['text'] . '</span><span class="sweet_title_text second" data-text="' . $this->text[1]['text'] . '">' . $this->text[1]['text'] . '</span>', $this->text[1]['tag'], array('class' => 'awesomesauce_text'), false);

        return $html;
    }
}