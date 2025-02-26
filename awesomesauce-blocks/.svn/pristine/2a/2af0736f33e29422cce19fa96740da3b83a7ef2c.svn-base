<?php

namespace Awesomesauce\Blocks\Clocks\Watch;

use Awesomesauce\Admin\BlockSettings;
use Awesomesauce\Admin\CssProcessor;

if (!defined('ABSPATH')) {
    exit;
}

class Css extends BlockSettings {

    public $height;
    public $font;

    public function init() {
        self::$bg_color = '#a2d8db';

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
                '300',
                'px'
            )
        ));

        $this->admin_preview_manager('device_style', 'height', '.watch_svg', 'height', 'block');

        $this->font = $this->common_setting('font', array(
            'desktop'     => array(
                '20',
                'px'
            ),
            'tablet'      => array(
                '20',
                'px'
            ),
            'mobile'      => array(
                '20',
                'px'
            ),
            'font-family' => 'Orbitron',
            'color'       => '#000000',
            'font-weight' => '700',
        ), '.watch_svg');

        $this->admin_preview_manager('style', '#awesomesauce_font_color', '.awesomesauce_text', 'fill');
    }

    public function getCss() {
        $css['desktop'] = array(
            '.awesomesauce_wrapper' => array(
                'padding' => '0',
                array(
                    '.watch_svg'         => array(
                        'height'         => $this->height['desktop'],
                        'width'          => 'auto',
                        'font-family'    => $this->font['font-family'],
                        'font-weight'    => $this->font['font-weight'],
                        'font-style'     => $this->font['font-style'],
                        'letter-spacing' => $this->font['letter-spacing'],
                        'text-indent'    => $this->font['letter-spacing'] == 'normal' ? 0 : $this->font['letter-spacing']
                    ),
                    '.hour-hand'         => array(
                        'transform-origin' => '50% 50%',
                        'transform'        => 'rotate(var(--hour-rotation))'
                    ),
                    '.minute-hand'       => array(
                        'transform-origin' => '50% 50%',
                        'transform'        => 'rotate(var(--minute-rotation))'
                    ),
                    '.second-hand'       => array(
                        'transform-origin' => '50% 50%',
                        'transform'        => 'rotate(var(--second-rotation))'
                    ),
                    '.awesomesauce_text' => array(
                        'fill' => $this->font['color']
                    )
                )
            )
        );

        $css['tablet'] = array(
            '.awesomesauce_wrapper' => array(
                array(
                    '.watch_svg' => array(
                        'height' => $this->height['tablet'],
                        'width'  => 'auto',
                    ),
                )
            )
        );

        $css['mobile'] = array(
            '.awesomesauce_wrapper' => array(
                array(
                    '.watch_svg' => array(
                        'height' => $this->height['mobile'],
                        'width'  => 'auto',
                    ),
                )
            )
        );

        CssProcessor::add_common_element('.watch_svg', $this->font, true);

        return $css;
    }
}

//https://codepen.io/johndownie/pen/JNrVGB