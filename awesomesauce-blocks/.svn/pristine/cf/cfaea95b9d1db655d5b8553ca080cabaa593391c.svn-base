<?php

namespace Awesomesauce\Blocks\Data\Braille;

use Awesomesauce\Admin\BlockSettings;

if (!defined('ABSPATH')) {
    exit;
}

class Css extends BlockSettings {

    public $font;

    public function init() {
        $this->font = $this->common_setting('font', array(
            'desktop'     => array(
                '60',
                'px'
            ),
            'tablet'      => array(
                '40',
                'px'
            ),
            'mobile'      => array(
                '20',
                'px'
            ),
            'font-family' => false,
            'color'       => '#000000',
            'font-weight' => '700',
            'line-height' => 'normal'
        ));
    }

    public function getCss() {
        $css['desktop'] = array(
            '.awesomesauce_wrapper' => array(
                array(
                    '.awesomesauce_text' => array(
                        'font-family'    => 'initial',
                        'font-weight'    => $this->font['font-weight'],
                        'font-style'     => $this->font['font-style'],
                        'letter-spacing' => $this->font['letter-spacing'],
                        'text-indent'    => $this->font['letter-spacing'] == 'normal' ? 0 : $this->font['letter-spacing'],
                        'color'          => $this->font['color'],
                        'word-break'     => 'break-word',
                    )
                )
            )
        );

        return $css;
    }
}