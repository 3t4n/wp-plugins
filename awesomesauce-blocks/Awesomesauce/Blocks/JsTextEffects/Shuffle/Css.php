<?php

namespace Awesomesauce\Blocks\JsTextEffects\Shuffle;

use Awesomesauce\Admin\BlockSettings;
use Awesomesauce\Admin\CssProcessor;

if (!defined('ABSPATH')) {
    exit;
}

class Css extends BlockSettings {

    public $height;
    public $font;
    public $dud_color;

    public function init() {
        self::$bg_color = '#000000';

        $this->font = $this->common_setting('font', array(
            'desktop'              => array(
                '30',
                'px'
            ),
            'tablet'               => array(
                '30',
                'px'
            ),
            'mobile'               => array(
                '20',
                'px'
            ),
            'font-family'          => 'Share Tech Mono',
            'color'                => '#EEEEEE',
            'font-weight'          => '700',
            'line-height'          => 'normal',
            'letter-spacing'       => '0.125',
            'text-shadow'          => '#008f11',
            'text-shadow-strength' => '2'
        ));

        $this->dud_color = $this->script_setting('dud_color', 'Color of the changing characters', 'color_picker', '#eeeeee', array(
            '',
            true
        ));

        $this->admin_preview_manager('style', '#awesomesauce_dud_color', '.el-sp:after', 'color');
    }

    public function getCss() {
        $css['desktop'] = array(
            '.awesomesauce_wrapper' => array(
                array(
                    '.awesomesauce_text'       => array(
                            'font-family'    => $this->font['font-family'],
                            'font-weight'    => $this->font['font-weight'],
                            'font-style'     => $this->font['font-style'],
                            'letter-spacing' => $this->font['letter-spacing'],
                            'text-indent'    => $this->font['letter-spacing'] == 'normal' ? 0 : $this->font['letter-spacing'],
                            'line-height'    => $this->font['line-height'],
                            'color'          => $this->font['color'],
                            'padding'        => '10px',
                            'margin'         => '0',
                        ) + $this->font['text-shadow-css'],
                    '.el-sp.is-changing'       => $this->animation_css('changing 0.1s infinite'),
                    '.el-sp'                   => array(
                        'transition'  => 'all 0.1s',
                        'position'    => 'relative',
                        'will-change' => 'transform, opacity',
                    ),
                    '.el-sp:after'             => array(
                        'content'     => 'attr(data-txt)',
                        'color'       => $this->dud_color,
                        'position'    => 'absolute',
                        'top'         => '0',
                        'left'        => '0',
                        'opacity'     => '0',
                        'will-change' => 'transform, opacity',
                    ),
                    '.el-sp.is-changing:after' => $this->animation_css('changingAfter 0.4s infinite alternate'),
                )
            )
        );

        $css['animations'] = array(
            'changing'      => array(
                '0%'   => array(
                    'opacity' => '1',
                ),
                '50%'  => array(
                    'opacity' => '0.5',
                ),
                '100%' => array(
                    'opacity' => '1',
                )
            ),
            'changingAfter' => array(
                '0%'   => array(
                    'opacity'   => '0.3',
                    'transform' => 'translateX(10px) scaleX(2)'
                ),
                '50%'  => array(
                    'opacity'   => '0',
                    'transform' => 'translateX(0) scaleX(2)'
                ),
                '100%' => array(
                    'opacity'   => '0.3',
                    'transform' => 'translateX(-10px) scaleX(2)'
                )
            ),
        );

        CssProcessor::dont_skip_text();

        return $css;
    }
}

//https://codepen.io/blazicke/pen/dQjxMr