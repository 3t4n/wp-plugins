<?php

namespace Awesomesauce\Blocks\CssTextEffects\DareToDream;

use Awesomesauce\Admin\BlockSettings;
use Awesomesauce\Awesomesauce;

if (!defined('ABSPATH')) {
    exit;
}

class Css extends BlockSettings {

    public $font;
    public $height;

    public $animate;

    public function init() {
        self::$bg_color = array(
            'default_color' => array(
                'rgba(34, 34, 34, 1)',
                'rgba(0, 0, 0, 0.8)'
            ),
            'fix_color'     => 'repeating-linear-gradient(to bottom, transparent 7px, ' . $this->get_value('background_color1', 'rgba(0, 0, 0, 0.8)') . ' 9px, ' . $this->get_value('background_color1', 'rgba(0, 0, 0, 0.8)') . ' 13px, transparent 13px)'
        );

        $this->font = $this->common_setting('font', array(
            'desktop'     => array(
                '170',
                'px'
            ),
            'tablet'      => array(
                '100',
                'px'
            ),
            'mobile'      => array(
                '50',
                'px'
            ),
            'font-family' => 'Clicker Script',
            'color'       => '#fff6a9',
            'font-weight' => '400',
            'text-shadow' => array(
                '#ffa500',
                '#ff0000'
            ),
            'line-height' => 'normal'
        ));

        $this->admin_preview_manager('combined_style', array(
            '#awesomesauce_font_text_shadow0',
            '#awesomesauce_font_text_shadow0',
            '#awesomesauce_font_text_shadow0',
            '#awesomesauce_font_text_shadow0',
            '#awesomesauce_font_text_shadow1',
            '#awesomesauce_font_text_shadow1',
            '#awesomesauce_font_text_shadow1',
        ), '.awesomesauce_text', array(
            'text-shadow',
            '0 0 5px ',
            ', 0 0 15px ',
            ', 0 0 20px ',
            ', 0 0 40px ',
            ', 0 0 60px ',
            ', 0 0 10px ',
            ', 0 0 98px '
        ));

        $this->animate = $this->script_setting('animation', 'Animate text', 'yes_no', 1);

        $this->admin_preview_manager('yes_no', '#awesomesauce_animation', '.awesomesauce_text', array(
            'animation',
            'blink 12s ease infinite'
        ));
    }

    public function getCss() {
        $css['desktop'] = array(
            '.awesomesauce_wrapper' => array(
                'background-color' => $this->get_value('background_color0', 'rgb(34, 34, 34)'),
                array(
                    '.awesomesauce_text' => array(
                            'font-family'    => $this->font['font-family'],
                            'font-weight'    => $this->font['font-weight'],
                            'font-style'     => $this->font['font-style'],
                            'letter-spacing' => $this->font['letter-spacing'],
                            'text-indent'    => $this->font['letter-spacing'] == 'normal' ? 0 : $this->font['letter-spacing'],
                            'line-height'    => $this->font['line-height'],
                            'color'          => $this->font['color'],
                            'text-shadow'    => '0 0 5px ' . $this->font['text-shadow'][0] . ', 0 0 15px ' . $this->font['text-shadow'][0] . ', 0 0 20px ' . $this->font['text-shadow'][0] . ', 0 0 40px ' . $this->font['text-shadow'][0] . ', 0 0 60px ' . $this->font['text-shadow'][1] . ', 0 0 10px ' . $this->font['text-shadow'][1] . ', 0 0 98px ' . $this->font['text-shadow'][1]
                        ) + $this->animation_css('blink 12s ease infinite'),
                )
            )
        );

        if ($this->animate || Awesomesauce::$is_admin) {
            $css['animations'] = array(
                'blink' => array(
                    '0%'   => array(
                        'filter' => 'grayscale(0%)',
                    ),
                    '89%'  => array(
                        'filter' => 'grayscale(0%)',
                    ),
                    '90%'  => array(
                        'filter' => 'grayscale(100%)',
                    ),
                    '93%'  => array(
                        'filter' => 'grayscale(0%)',
                    ),
                    '97%'  => array(
                        'filter' => 'grayscale(100%)',
                    ),
                    '100%' => array(
                        'filter' => 'grayscale(0%)',
                    )
                ),
            );
        }

        return $css;
    }
}

//https://codepen.io/ananyaneogi/pen/Bgozrz