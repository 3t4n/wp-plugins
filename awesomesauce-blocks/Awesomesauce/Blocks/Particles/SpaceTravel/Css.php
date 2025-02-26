<?php

namespace Awesomesauce\Blocks\Particles\SpaceTravel;

use Awesomesauce\Admin\BlockSettings;

if (!defined('ABSPATH')) {
    exit;
}

class Css extends BlockSettings {

    public $font;

    public function init() {
        self::$bg_color = '#0B101B';

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
            'color'       => '#FFFFFF',
            'font-weight' => '200',
            'line-height' => 'normal',
            'text-shadow' => 'rgba(0,0,0,1)',
        ));
    }

    public function getCss() {

        $css['desktop'] = array(
            '.awesomesauce_wrapper' => array(
                array(
                    '.awesomesauce_text'   => array(
                            'font-family'    => $this->font['font-family'],
                            'font-weight'    => $this->font['font-weight'],
                            'font-style'     => $this->font['font-style'],
                            'letter-spacing' => $this->font['letter-spacing'],
                            'text-indent'    => $this->font['letter-spacing'] == 'normal' ? 0 : $this->font['letter-spacing'],
                            'line-height'    => $this->font['line-height'],
                            'color'          => $this->font['color'],
                        ) + $this->font['text-shadow-css'],
                    '.awesomesauce_canvas' => array(
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

//https://codepen.io/hakimel/pen/bzrZGo