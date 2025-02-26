<?php

namespace Awesomesauce\Blocks\JsTextEffects\Coordinate;

use Awesomesauce\Admin\BlockSettings;

if (!defined('ABSPATH')) {
    exit;
}

class Css extends BlockSettings {

    public $font;

    public function init() {
        self::$bg_color = '#181818';

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
            'color'       => 'rgba(250,250,250,0.5)',
            'font-weight' => '200',
            'line-height' => 'normal'
        ), '', array(), 'Center text');
    }

    public function getCss() {
        $css['desktop'] = array(
            '.awesomesauce_wrapper' => array(
                array(
                    '.awesomesauce_text'             => array(
                        'font-family'    => $this->font['font-family'],
                        'font-weight'    => $this->font['font-weight'],
                        'font-style'     => $this->font['font-style'],
                        'letter-spacing' => $this->font['letter-spacing'],
                        'text-indent'    => $this->font['letter-spacing'] == 'normal' ? 0 : $this->font['letter-spacing'],
                        'line-height'    => $this->font['line-height'],
                        'color'          => $this->font['color'],
                        'opacity'        => '1',
                        'transition'     => 'opacity 0.7s',
                        'z-index'        => '2'
                    ),
                    '.awesomesauce_text.hidden_text' => array(
                        'opacity' => '0',
                    ),
                    'main'                           => array(
                        'position' => 'absolute',
                        'top'      => '0',
                        'left'     => '0',
                        'bottom'   => '0',
                        'right'    => '0',
                        'z-index'  => '1'
                    ),
                    'canvas'                         => array(
                        'position'   => 'absolute',
                        'top'        => '0',
                        'left'       => '0',
                        'width'      => '100%',
                        'height'     => '100%',
                        'object-fit' => 'cover',
                    ),
                    '.plate'                         => array(
                        'position'       => 'absolute',
                        'bottom'         => '0',
                        'left'           => '0',
                        'width'          => '100%',
                        'padding'        => '1rem 0',
                        'text-align'     => 'center',
                        'color'          => 'white',
                        'letter-spacing' => '4px',
                        'font-size'      => '0.6em',
                        'line-height'    => '2.5',
                    )
                )
            )
        );

        return $css;
    }
}

//https://codepen.io/fajjet/pen/WYRELm
