<?php

namespace Awesomesauce\Blocks\CssTextEffects\DareToDream;

use Awesomesauce\Admin\BlockSettings;

if (!defined('ABSPATH')) {
    exit;
}

class Html extends BlockSettings {

    public $text;

    public function init() {
        $this->text = $this->text_setting('Dare to dream');

        $this->admin_preview_manager('inline_style', '#awesomesauce_background_color0', '.awesomesauce_wrapper', 'background');

        $this->admin_preview_manager('combined_style', array(
            '#awesomesauce_background_color1',
            '#awesomesauce_background_color1'
        ), '.awesomesauce_background_image_color_overlay', array(
            'background',
            'repeating-linear-gradient(to bottom, transparent 7px, ',
            ' 9px, ',
            ' 13px, transparent 13px)!important'
        ));
    }

    public function getHtml() {
        $html = $this->text();

        return $html;
    }
}