<?php

namespace Awesomesauce\Blocks\JsTextEffects\Matrix;

use Awesomesauce\Admin\BlockSettings;
use Awesomesauce\Admin\CssProcessor;

if (!defined('ABSPATH')) {
    exit;
}

class Css extends BlockSettings {

    public $font;

    public function init() {
        self::$bg_color = false;

        $this->font = $this->common_setting('font', array(
            'desktop'     => array(
                '30',
                'px'
            ),
            'tablet'      => array(
                '30',
                'px'
            ),
            'mobile'      => array(
                '20',
                'px'
            ),
            'font-family' => 'Roboto Mono',
            'color'       => 'rgb(250,250,250)',
            'font-weight' => '200',
            'line-height' => 'normal'
        ), '', array(), 'Center text');
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
                        'line-height'    => $this->font['line-height'],
                        'color'          => $this->font['color'],
                        'z-index'        => '2'
                    ),
                    'canvas'             => array(
                        'position'   => 'absolute',
                        'top'        => '0',
                        'left'       => '0',
                        'width'      => '100%',
                        'height'     => '100%',
                        'object-fit' => 'cover',
                    ),
                )
            )
        );

        return $css;
    }
}

//https://codepen.io/gnsp/pen/vYBQZJm