<?php

namespace Awesomesauce\Blocks\JsTextEffects\Typewriter;

use Awesomesauce\Admin\BlockSettings;

if (!defined('ABSPATH')) {
    exit;
}

class Css extends BlockSettings {

    public $height;
    public $font;
    public $typed_color;
    public $cursor_color;

    public function init() {
        self::$bg_color = '#111111';

        $this->font = $this->common_setting('font', array(
            'desktop'     => array(
                '50',
                'px'
            ),
            'tablet'      => array(
                '50',
                'px'
            ),
            'mobile'      => array(
                '25',
                'px'
            ),
            'font-family' => 'Bellefair',
            'color'       => '#fafafa',
            'line-height' => 'normal'
        ));

        $this->typed_color = $this->script_setting('typed_color', 'Color of the typed words', 'color_picker', '#7E6FEB', array(
            '',
            true
        ));
        $this->admin_preview_manager('style', '#awesomesauce_typed_color', '.typed', 'color');

        $this->cursor_color = $this->script_setting('cursor_color', 'Color of the cursor', 'color_picker', '#ccc');
        $this->admin_preview_manager('style', '#awesomesauce_cursor_color', '.awesomesauce_cursor', 'background-color');
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
                        'line-height'    => $this->font['line-height'],
                        'color'          => $this->font['color'],
                        array(
                            '.typed'               => array(
                                'color' => $this->typed_color,
                            ),
                            '.awesomesauce_cursor' => array(
                                    'display'          => 'inline-block',
                                    'margin-left'      => '0.1rem',
                                    'width'            => '0.06em',
                                    'background-color' => $this->cursor_color,
                                ) + $this->animation_css('typewriter_blink 1s infinite')
                        )
                    ),
                )
            )
        );

        $css['animations'] = array(
            'typewriter_blink' => array(
                '0%'   => array(
                    'opacity' => '1',
                ),
                '49%'  => array(
                    'opacity' => '1',
                ),
                '50%'  => array(
                    'opacity' => '0',
                ),
                '99%'  => array(
                    'opacity' => '0',
                ),
                '100%' => array(
                    'opacity' => '1',
                )
            ),
        );

        return $css;
    }
}

//https://codepen.io/Coding_Journey/pen/BEMgbX