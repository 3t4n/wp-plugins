<?php

namespace Awesomesauce\Blocks\JsTextEffects\Patch;

use Awesomesauce\Admin\BlockSettings;
use Awesomesauce\Admin\CssProcessor;

if (!defined('ABSPATH')) {
    exit;
}

class Css extends BlockSettings {

    public $height;
    public $font;
    public $remove_color;

    public function init() {
        self::$bg_color = '#212121';

        $this->height = $this->common_setting('height', array(
            'desktop' => array(
                '500',
                'px'
            ),
            'tablet'  => array(
                '400',
                'px'
            ),
            'mobile'  => array(
                '170',
                'px'
            )
        ));

        $this->font = $this->common_setting('font', array(
            'desktop'        => array(
                '30',
                'px'
            ),
            'tablet'         => array(
                '30',
                'px'
            ),
            'mobile'         => array(
                '14',
                'px'
            ),
            'font-family'    => 'Source Code Pro',
            'color'          => '#fafafa',
            'letter-spacing' => false,
            'font-weight'    => '100',
            'display'        => 'flex',
        ));

        $this->remove_color = $this->script_setting('remove_color', 'Color of the removed characters', 'color_picker', '#0000ff', array(
            '',
            true
        ));
        $this->admin_preview_manager('animation', array(
            '#awesomesauce_remove_color',
        ), '.awesomesauce_remove', array(
            'animateRemove',
            'to {opacity: 0; color: ',
            ';}',
        ), '1s both', '#awesomesauce_remove_color');
    }

    public function getCss() {
        $css['desktop'] = array(
            '.awesomesauce_wrapper' => array(
                array(
                    '.awesomesauce_text'   => array(
                        'font-family' => $this->font['font-family'],
                        'font-weight' => $this->font['font-weight'],
                        'font-style'  => $this->font['font-style'],
                        'line-height' => $this->font['line-height'],
                        'color'       => $this->font['color'],
                        'display'     => 'flex',
                        'text-wrap'   => 'nowrap',
                        array(
                            'div' => array(
                                'white-space' => 'pre',
                                'overflow'    => 'hidden',
                            ),
                        )
                    ),
                    '.awesomesauce_remove' => $this->animation_css('animateRemove 1s both')
                )
            )
        );

        $css['animations'] = array(
            'animateRemove' => array(
                'to' => array(
                    'opacity' => '0',
                    'color'   => $this->remove_color,
                ),
            )
        );

        CssProcessor::dont_skip_text();

        return $css;
    }
}

//https://codepen.io/mytecor/pen/GRKqPrX