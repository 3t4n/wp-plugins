<?php

namespace Awesomesauce\Blocks\Particles\Crystals;

use Awesomesauce\Admin\BlockSettings;

if (!defined('ABSPATH')) {
    exit;
}

class Css extends BlockSettings {

    public $font;

    public function init() {
        self::$bg_color = '#000000';

        $this->font = $this->common_setting('font', array(
            'desktop'              => array(
                '50',
                'px'
            ),
            'tablet'               => array(
                '40',
                'px'
            ),
            'mobile'               => array(
                '30',
                'px'
            ),
            'font-family'          => 'Oooh Baby',
            'color'                => 'rgba(255,255,255,0.9)',
            'font-weight'          => '400',
            'line-height'          => 'normal',
            'text-shadow'          => '#000000',
            'text-shadow-strength' => '3',
        ));

        $this->font['z-index'] = $this->script_setting('z_index', 'Text z-index', 'input_with_hover_title', '5', array(
            'number',
            array(
                'step' => '2',
                'min'  => 1,
                'max'  => 5
            ),
            'Z-index position of the text (1,3,5), compared to crystals and glow.'
        ));

        $this->admin_preview_manager('style', '#awesomesauce_z_index', '.awesomesauce_text', 'z-index');

        $this->font['opacity'] = $this->script_setting('opacity', 'Opacity of the crystals', 'input', '1', array(
            'number',
            array(
                'step' => '0.1',
                'min'  => 0,
                'max'  => 1
            ),
            true,
        ));

        $this->admin_preview_manager('style', '#awesomesauce_opacity', '.awesomesauce_canvas', 'opacity');
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
                            'z-index'        => $this->font['z-index'],
                        ) + $this->font['text-shadow-css'],
                    '.awesomesauce_canvas' => array(
                        'position'   => 'absolute',
                        'top'        => '0',
                        'left'       => '0',
                        'z-index'    => '4',
                        'width'      => '100%',
                        'height'     => '100%',
                        'object-fit' => 'cover',
                        'opacity'    => $this->font['opacity']
                    ),
                    '.bg_glow'             => array(
                        'position' => 'absolute',
                        'top'      => '0',
                        'left'     => '0',
                        'z-index'  => '2',
                        'height'   => '100%',
                        'width'    => '100%',
                    ),
                )
            )
        );

        return $css;
    }
}

//https://codepen.io/Tibixx/pen/xmOaWe