<?php

namespace Awesomesauce\Blocks\CssTextEffects\SweetStuff;

use Awesomesauce\Admin\BlockSettings;
use Awesomesauce\Admin\CssProcessor;

if (!defined('ABSPATH')) {
    exit;
}

class Css extends BlockSettings {

    public $height;
    public $font;

    public function init() {
        self::$bg_color = 'rgba(0,153,255,1)';

        $this->font = $this->common_setting('font', array(
            'desktop'     => array(
                '100',
                'px'
            ),
            'tablet'      => array(
                '100',
                '%'
            ),
            'mobile'      => array(
                '50',
                '%'
            ),
            'font-family' => 'Exo 2',
            'color'       => 'rgba(253,233,255,1)',
            'font-weight' => '900',
            'text-shadow' => array(
                'rgba(74,247,255,1)',
                'rgba(22,91,251,1)',
                'rgba(233,74,161,1)',
                'rgba(199,54,249,1)'
            ),
            'line-height' => '0.75'
        ));

        $this->admin_preview_manager('combined_style', array(
            '#awesomesauce_font_text_shadow0',
            '#awesomesauce_font_text_shadow1',
            '#awesomesauce_font_text_shadow0',
            '#awesomesauce_font_text_shadow1',
            '#awesomesauce_font_text_shadow0',
            '#awesomesauce_font_text_shadow1',
            '#awesomesauce_font_text_shadow0',
            '#awesomesauce_font_text_shadow1',
            '#awesomesauce_font_text_shadow0',
            '#awesomesauce_font_text_shadow1',
            '#awesomesauce_font_text_shadow0',
            '#awesomesauce_font_text_shadow1',
            '#awesomesauce_font_text_shadow0',
        ), '.awesomesauce_text', array(
            'text-shadow',
            '0.03em 0.01em 0.01em ',
            ',0.02em 0.02em 0.01em ',
            ',0.04em 0.02em 0.01em ',
            ',0.03em 0.03em 0.01em ',
            ',0.05em 0.03em 0.01em ',
            ',0.04em 0.04em 0.01em ',
            ',0.06em 0.04em 0.01em ',
            ',0.05em 0.05em 0.01em ',
            ',0.07em 0.05em 0.01em ',
            ',0.06em 0.06em 0.01em ',
            ',0.08em 0.06em 0.01em ',
            ',0.07em 0.07em 0.01em ',
            ',0.09em 0.07em 0.01em ',
        ));

        $this->admin_preview_manager('combined_style', array(
            '#awesomesauce_font_text_shadow2',
            '#awesomesauce_font_text_shadow3',
            '#awesomesauce_font_text_shadow3',
            '#awesomesauce_font_text_shadow2'
        ), '.sweet_title_text:before', array(
            'text-shadow',
            '0.02em 0.02em 0.01em ',
            ',-0.01em -0.01em 0.01em ',
            ',-0.02em 0.02em 0.01em ',
            ',0.01em -0.01em 0.01em '
        ));
    }

    public function getCss() {
        $css['desktop'] = array(
            '.awesomesauce_wrapper' => array(
                array(
                    '.awesomesauce_text' => array(
                        'transform'      => 'skew(0, -10deg)',
                        'font-family'    => $this->font['font-family'],
                        'font-weight'    => $this->font['font-weight'],
                        'font-style'     => $this->font['font-style'],
                        'letter-spacing' => $this->font['letter-spacing'],
                        'text-indent'    => $this->font['letter-spacing'] == 'normal' ? 0 : $this->font['letter-spacing'],
                        'color'          => $this->font['color'],
                        'text-transform' => 'uppercase',
                        'line-height'    => $this->font['line-height'],
                        'text-wrap'      => 'nowrap',
                        'text-shadow'    => '0.03em 0.01em 0.01em ' . $this->font['text-shadow'][0] . ',0.02em 0.02em 0.01em ' . $this->font['text-shadow'][1] . ',0.04em 0.02em 0.01em ' . $this->font['text-shadow'][0] . ',
                        0.03em 0.03em 0.01em ' . $this->font['text-shadow'][1] . ',0.05em 0.03em 0.01em ' . $this->font['text-shadow'][0] . ',0.04em 0.04em 0.01em ' . $this->font['text-shadow'][1] . ',
                        0.06em 0.04em 0.01em ' . $this->font['text-shadow'][0] . ',0.05em 0.05em 0.01em ' . $this->font['text-shadow'][1] . ',0.07em 0.05em 0.01em ' . $this->font['text-shadow'][0] . ',
                        0.06em 0.06em 0.01em ' . $this->font['text-shadow'][1] . ',0.08em 0.06em 0.01em ' . $this->font['text-shadow'][0] . ',0.07em 0.07em 0.01em ' . $this->font['text-shadow'][1] . ',
                        0.09em 0.07em 0.01em ' . $this->font['text-shadow'][0],

                        array(
                            '.sweet_title_text'        => array(
                                'display'     => 'block',
                                'position'    => 'relative',
                                'line-height' => 'inherit',
                            ),
                            '.sweet_title_text:before' => array(
                                'content'     => 'attr(data-text)',
                                'position'    => 'absolute',
                                'text-shadow' => '0.02em 0.02em 0.01em ' . $this->font['text-shadow'][2] . ',-0.01em -0.01em 0.01em ' . $this->font['text-shadow'][3] . ',
                                -0.02em 0.02em 0.01em ' . $this->font['text-shadow'][3] . ',0.01em -0.01em 0.01em ' . $this->font['text-shadow'][2],
                                'z-index'     => '1'
                            ),
                            '.sweet_title_text.first'  => array(
                                'padding-right' => '0.35em'
                            ),
                            '.sweet_title_text.second' => array(
                                'padding-left' => '0.35em'
                            )
                        )
                    )
                )
            )
        );

        CssProcessor::dont_skip_text();

        return $css;
    }
}

//https://codepen.io/mireille1306/pen/BawdXzY