<?php

namespace Awesomesauce\Blocks\Data\MorseCode;

use Awesomesauce\Admin\BlockSettings;

if (!defined('ABSPATH')) {
    exit;
}

class Css extends BlockSettings {

    public $font;

    public function init() {
        $this->font = $this->common_setting('font', array(
            'desktop'     => array(
                '80',
                'px'
            ),
            'tablet'      => array(
                '60',
                'px'
            ),
            'mobile'      => array(
                '30',
                'px'
            ),
            'font-family' => 'Linden Hill',
            'color'       => '#000000',
            'font-weight' => '700',
        ));
    }

    public function getCss() {
        $css['desktop'] = array(
            '.awesomesauce_wrapper' => array(
                array(
                    '.awesomesauce_text' => array(
                        'font-family'    => $this->font['font-family'],
                        'font-weight'    => $this->font['font-weight'],
                        'font-style'     => $this->font['font-style'],
                        'letter-spacing' => $this->font['letter-spacing'],
                        'text-indent'    => $this->font['letter-spacing'] == 'normal' ? 0 : $this->font['letter-spacing'],
                        'color'          => $this->font['color'],
                        'line-height'    => '1',
                    )
                )
            )
        );

        return $css;
    }
}