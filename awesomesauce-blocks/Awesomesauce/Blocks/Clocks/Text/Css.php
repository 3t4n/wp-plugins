<?php

namespace Awesomesauce\Blocks\Clocks\Text;

use Awesomesauce\Admin\BlockSettings;
use Awesomesauce\Admin\CssProcessor;

if (!defined('ABSPATH')) {
    exit;
}

class Css extends BlockSettings {

    public $height;
    public $font;

    public function init() {
        self::$bg_color = '#000000';

        $this->height = $this->common_setting('height', array(
            'desktop' => array(
                '600',
                'px'
            ),
            'tablet'  => array(
                '400',
                'px'
            ),
            'mobile'  => array(
                '300',
                'px'
            )
        ));

        $this->font = $this->common_setting('font', array(
            'desktop'        => array(
                '30',
                'px'
            ),
            'tablet'         => array(
                '20',
                'px'
            ),
            'mobile'         => array(
                '15',
                'px'
            ),
            'font-family'    => 'Roboto Mono',
            'color'          => array(
                '#333333',
                '#FFFFFF',
                '#000000'
            ),
            'font-weight'    => '100',
            'letter-spacing' => false,
            'display'        => 'inline-block'
        ), '.awesomesauce_text span span', array('color'));

        $this->admin_preview_manager('style', '#awesomesauce_font_color0', '.awesomesauce_text span:not(.midnight, .it, .is, .active) span', 'color');
        $this->admin_preview_manager('style', '#awesomesauce_font_color1', '.awesomesauce_text .it span', 'color');
        $this->admin_preview_manager('style', '#awesomesauce_font_color1', '.awesomesauce_text .is span', 'color');
        $this->admin_preview_manager('style', '#awesomesauce_font_color1', '.awesomesauce_text span.active span', 'color');
        $this->admin_preview_manager('style', '#awesomesauce_font_color2', '.awesomesauce_text .midnight span', 'color');

    }

    public function getCss() {
        $css['desktop'] = array(
            '.awesomesauce_wrapper' => array(
                array(
                    '.awesomesauce_text' => array(
                        'display' => 'block',
                        array(
                            'span span'        => array(
                                'font-family' => $this->font['font-family'],
                                'font-weight' => $this->font['font-weight'],
                                'font-style'  => $this->font['font-style'],
                                'color'       => $this->font['color'][0],
                                'display'     => 'inline-block',
                                'width'       => '1em',
                                'text-align'  => 'center',
                                'transition'  => 'color 0.4s ease-out',
                            ),
                            '.midnight span'   => array(
                                'color' => $this->font['color'][2],
                            ),
                            '.it span'         => array(
                                'color' => $this->font['color'][1],
                            ),
                            '.is span'         => array(
                                'color' => $this->font['color'][1],
                            ),
                            'span.active span' => array(
                                'color' => $this->font['color'][1],
                            ),
                        )
                    ),
                )
            ),
        );

        CssProcessor::add_common_element('.awesomesauce_text .line span span', $this->font, true);
        CssProcessor::add_element_default_display('.awesomesauce_text .line span span', 'inline-block');

        return $css;
    }
}

//https://codepen.io/searleb/pen/pvQaJB