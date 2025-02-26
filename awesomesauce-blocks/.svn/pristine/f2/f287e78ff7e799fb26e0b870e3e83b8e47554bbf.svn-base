<?php

namespace Awesomesauce\Blocks\CssTextEffects\Lightness;

use Awesomesauce\Admin\BlockSettings;

if (!defined('ABSPATH')) {
    exit;
}

class Css extends BlockSettings {

    public $height;
    public $font;

    public function init() {
        $this->font = $this->common_setting('font', array(
            'desktop'        => array(
                '170',
                'px'
            ),
            'tablet'         => array(
                '80',
                'px'
            ),
            'mobile'         => array(
                '40',
                'px'
            ),
            'font-family'    => 'Yanone Kaffeesatz',
            'font-weight'    => '200',
            'color'          => 'rgba(0,0,0,1)',
            'letter-spacing' => '0.4',
            'line-height'    => '0.75'
        ), '', array('color'));

        $this->admin_preview_manager('style', '#awesomesauce_font_color', '.lightness_main', 'color');
        $this->admin_preview_manager('combined_style', array(
            '#awesomesauce_font_color'
        ), '.lightness_shadow', array(
            'background',
            'linear-gradient(0deg, ',
            ' 0%, transparent 100%)'
        ), '-webkit-background-clip: text; background-clip: text;');
    }

    public function getCss() {
        $css['desktop'] = array(
            '.awesomesauce_wrapper' => array(
                array(
                    '.awesomesauce_text' => array(
                        'font-family'    => $this->font['font-family'],
                        'font-size'      => $this->font['desktop'],
                        'font-weight'    => $this->font['font-weight'],
                        'font-style'     => $this->font['font-style'],
                        'letter-spacing' => $this->font['letter-spacing'],
                        'text-indent'    => $this->font['letter-spacing'] == 'normal' ? 0 : $this->font['letter-spacing'],
                        'line-height'    => $this->font['line-height'],
                        'color'          => $this->font['color'],
                        'text-wrap'      => 'nowrap'
                    ),
                    '.lightness_main'    => array(
                        'transform' => 'translateY(20%)'
                    ),
                    '.lightness_shadow'  => array(
                        'color'                   => 'transparent',
                        'transform'               => 'scale(1, -1)',
                        'background'              => 'linear-gradient(0deg, ' . $this->font['color'] . ' 0%, transparent 100%)',
                        'background-clip'         => 'text',
                        '-webkit-background-clip' => 'text'
                    )
                )
            )
        );

        return $css;
    }
}

//https://codepen.io/kajetan-orski/pen/YzQObKg