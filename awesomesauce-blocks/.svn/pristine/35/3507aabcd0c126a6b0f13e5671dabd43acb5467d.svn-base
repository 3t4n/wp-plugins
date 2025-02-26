<?php

namespace Awesomesauce\Blocks\Particles\Bokeh;

use Awesomesauce\Admin\BlockSettings;

if (!defined('ABSPATH')) {
    exit;
}

class Css extends BlockSettings {

    public $font;

    public function init() {
        self::$bg_color = false;

        $this->font = $this->common_setting('font', array(
            'desktop'     => array(
                '40',
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
            'font-family' => 'Nova Mono',
            'color'       => 'rgba(255,255,255,1)',
            'font-weight' => '400',
            'line-height' => 'normal',
            'text-shadow' => 'rgba(0,0,0,1)',
        ));
    }

    public function getCss() {
        $css['desktop'] = array(
            '.awesomesauce_wrapper' => array(
                'background' => '#000000',
                array(
                    '.awesomesauce_text'    => array(
                            'font-family'    => $this->font['font-family'],
                            'font-weight'    => $this->font['font-weight'],
                            'font-style'     => $this->font['font-style'],
                            'letter-spacing' => $this->font['letter-spacing'],
                            'text-indent'    => $this->font['letter-spacing'] == 'normal' ? 0 : $this->font['letter-spacing'],
                            'line-height'    => $this->font['line-height'],
                            'color'          => $this->font['color'],
                            'z-index'        => '2',
                        ) + $this->font['text-shadow-css'],
                    '.awesomesauce_canvas1' => array(
                        'position'   => 'absolute',
                        'top'        => '0',
                        'left'       => '0',
                        'z-index'    => '1',
                        'width'      => '100%',
                        'height'     => '100%',
                        'object-fit' => 'cover',
                        'opacity'    => '0',
                    ),
                    '.awesomesauce_canvas2' => array(
                        'position'   => 'absolute',
                        'top'        => '0',
                        'left'       => '0',
                        'z-index'    => '1',
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

//Based on this, but modified heavily: https://codepen.io/jackrugile/pen/nYzapO