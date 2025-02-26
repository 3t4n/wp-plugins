<?php

namespace Awesomesauce\Blocks\CssTextEffects\Sliced;

use Awesomesauce\Admin\BlockSettings;

if (!defined('ABSPATH')) {
    exit;
}

class Css extends BlockSettings {

    public $height;
    public $font;

    public function init() {
        self::$bg_color = 'rgba(0,0,0,1)';

        $this->font = $this->common_setting('font', array(
            'desktop'     => array(
                '200',
                'px'
            ),
            'tablet'      => array(
                '100',
                'px'
            ),
            'mobile'      => array(
                '70',
                'px'
            ),
            'font-family' => 'Oswald',
            'color'       => array(
                'rgba(255,255,255,1)',
                'rgba(0,0,0,1)'
            ),
            'font-weight' => '700',
        ), '', array('color'));

        $this->admin_preview_manager('style', '#awesomesauce_font_color0', '.sliced_top', 'color');
        $this->admin_preview_manager('combined_style', array(
            '#awesomesauce_font_color1',
            '#awesomesauce_font_color0'
        ), '.sliced_bottom', array(
            'background',
            'linear-gradient(177deg, ',
            ' 53%, ',
            ' 65%)'
        ), '-webkit-background-clip: text; background-clip: text;');
    }

    public function getCss() {
        $css['desktop'] = array(
            '.awesomesauce_wrapper' => array(
                array(
                    '.awesomesauce_text' => array(
                        'font-family'    => $this->font['font-family'],
                        'font-weight'    => $this->font['font-weight'],
                        'font-style'     => $this->font['font-style'],
                        'letter-spacing' => $this->font['letter-spacing'],
                        'text-indent'    => $this->font['letter-spacing'] == 'normal' ? 0 : $this->font['letter-spacing'],
                        'text-wrap'      => 'nowrap',
                        'grid-area'      => '1/1/-1/-1'
                    ),
                    '.sliced_top'        => array(
                        'clip-path'   => 'polygon(0% 0%, 100% 0%, 100% 48%, 0% 58%)',
                        'color'       => $this->font['color'][0],
                        'line-height' => 'normal'
                    ),
                    '.sliced_bottom'     => array(
                        'clip-path'               => 'polygon(0% 60%, 100% 50%, 100% 100%, 0% 100%)',
                        'color'                   => 'transparent',
                        'background'              => 'linear-gradient(177deg, ' . $this->font['color'][1] . ' 53%, ' . $this->font['color'][0] . ' 65%)',
                        'background-clip'         => 'text',
                        '-webkit-background-clip' => 'text',
                        'transform'               => 'translateX(-0.02em)',
                        'line-height'             => 'normal'
                    )
                )
            )
        );

        return $css;
    }
}

//https://codepen.io/TajShireen/pen/ExLWgGb