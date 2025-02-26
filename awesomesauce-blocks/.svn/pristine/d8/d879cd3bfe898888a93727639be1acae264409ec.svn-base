<?php

namespace Awesomesauce\Blocks\CssTextEffects\Retro;

use Awesomesauce\Admin\BlockSettings;
use Awesomesauce\Admin\CssProcessor;

if (!defined('ABSPATH')) {
    exit;
}

class Css extends BlockSettings {

    public $height;
    public $font;

    private $sub_font;
    private $lines;
    private $lines_color;
    private $grid_colors;

    public function init() {
        self::$bg_color = array(
            'default_color' => array(
                'radial-gradient(ellipse, rgba(118, 0, 191, .5) 0%, rgba(0, 0, 0, 0) 70%)',
                'linear-gradient(0deg, rgb(11, 22, 30) 40%, rgb(32, 32, 118) 70%)'
            )
        );

        $this->font = $this->common_setting('font', array(
            'desktop'        => array(
                '250',
                'px'
            ),
            'tablet'         => array(
                '62',
                '%'
            ),
            'mobile'         => array(
                '30',
                '%'
            ),
            'font-family'    => 'Exo',
            'color'          => 'linear-gradient(180deg, rgb(0,45,80) 25%, rgba(0,160,240,1) 35%, rgba(255,255,255,1) 50%, rgba(32,18,95,1) 50%, rgba(131,19,231,1) 55%, rgba(255,97,175,1) 75%)',
            'font-weight'    => '900',
            'italic-off'     => 1,
            'text-shadow'    => array(
                array(
                    'rgba(148,160,185,1)',
                    'Text border'
                ),
                'rgba(0,0,0,1)',
                'rgba(22,95,243,1)'
            ),
            'line-height'    => '1.2',
            'letter-spacing' => '0.05'
        ), '', array('color'), 'Main');

        $this->admin_preview_manager('style', '#awesomesauce_font_color', '.awesomesauce_text.second', 'background', '-webkit-background-clip: text; background-clip: text;');

        $this->admin_preview_manager('combined_style', array(
            '#awesomesauce_font_text_shadow0',
            '#awesomesauce_font_text_shadow1',
            '#awesomesauce_font_text_shadow2',
        ), '.awesomesauce_text.first', array(
            'text-shadow',
            '0 0 0.1em ',
            ', 0 0 0.2em ',
            ', 0 0 5em '
        ));

        $this->admin_preview_manager('combined_style', array(
            '#awesomesauce_font_text_shadow0'
        ), '.awesomesauce_text.second', array(
            '-webkit-text-stroke',
            '0.01em '
        ));

        $this->sub_font = $this->common_setting('font', array(
            'desktop'     => array(
                '90',
                'px'
            ),
            'tablet'      => array(
                '65',
                '%'
            ),
            'mobile'      => array(
                '30',
                '%'
            ),
            'font-family' => 'Mr Dafoe',
            'color'       => 'rgba(255,255,255,1)',
            'text-shadow' => array(
                'rgba(255,255,255,1)',
                'rgba(254,5,225,1)'
            )
        ), '.retro_text_sub', array(), 'Sub', 'sub_font');

        $this->font['space_between_texts'] = $this->script_setting('space_between_texts', 'Space between texts', 'size_input', '0', array(
            '',
            '%',
            array(
                'step' => '0.5',
                'min'  => '-50',
                'max'  => '50'
            )
        ));

        $this->admin_preview_manager('style', '#awesomesauce_space_between_texts', '.retro_text', 'margin-bottom', '', '', '', '%');

        $this->admin_preview_manager('combined_style', array(
            '#awesomesauce_sub_font_text_shadow0',
            '#awesomesauce_sub_font_text_shadow1',
            '#awesomesauce_sub_font_text_shadow1',
        ), '.retro_text_sub', array(
            'text-shadow',
            '0 0 0.05em ',
            ', 0 0 0.2em ',
            ', 0 0 0.3em '
        ));

        $this->lines = $this->script_setting('lines_number', 'Number of lines behind main text.', 'device_specific', array(
            'desktop' => '8',
            'tablet'  => '6',
            'mobile'  => '3'
        ), array(
            'input',
            array('number')
        ));

        $this->admin_preview_manager('combined_style', array(
            'parseInt(document.querySelector(\'#awesomesauce_lines_number_desktop\').value) * 10',
            'parseInt(document.querySelector(\'#awesomesauce_lines_number_desktop\').value) * 10 / 2',
        ), '.retro_lines', array(
            'height',
            '',
            'px;margin-top:-',
            'px'
        ), '', '#awesomesauce_lines_number_desktop', 'desktop');

        $this->admin_preview_manager('combined_style', array(
            'parseInt(document.querySelector(\'#awesomesauce_lines_number_tablet\').value) * 10',
            'parseInt(document.querySelector(\'#awesomesauce_lines_number_tablet\').value) * 10 / 2',
        ), '.retro_lines', array(
            'height',
            '',
            'px;margin-top:-',
            'px'
        ), '', '#awesomesauce_lines_number_tablet', 'tablet');

        $this->admin_preview_manager('combined_style', array(
            'parseInt(document.querySelector(\'#awesomesauce_lines_number_mobile\').value) * 10',
            'parseInt(document.querySelector(\'#awesomesauce_lines_number_mobile\').value) * 10 / 2',
        ), '.retro_lines', array(
            'height',
            '',
            'px;margin-top:-',
            'px'
        ), '', '#awesomesauce_lines_number_mobile', 'mobile');

        $this->lines_color = $this->script_setting('lines_color', 'Color of lines behind main text.', 'color_picker', 'rgba(89,193,254,1)', array(
            '',
            true
        ));

        $this->admin_preview_manager('combined_style', array(
            'awesomesauce_color_to_rgba(document.querySelector(\'#awesomesauce_lines_color\').value, 0.2)',
            'awesomesauce_color_to_rgba(document.querySelector(\'#awesomesauce_lines_color\').value)',
            'awesomesauce_color_to_rgba(document.querySelector(\'#awesomesauce_lines_color\').value)',
            'awesomesauce_color_to_rgba(document.querySelector(\'#awesomesauce_lines_color\').value, 0.2)',
            '',
            '',
            'awesomesauce_color_to_rgba(document.querySelector(\'#awesomesauce_lines_color\').value, 0.4)'
        ), '.retro_lines', array(
            'background',
            'linear-gradient(',
            ' 20%, ',
            ' 40%, ',
            ' 60%, ',
            ' 80%);',
            'box-shadow:',
            '0 0 1em '
        ), 'background-size:auto 10px;', '#awesomesauce_lines_color');

        $this->grid_colors = $this->script_setting('grid_color', 'Bottom grid color ', 'multi_color_picker', array(
            'rgba(46,38,255, 0.4)',
            'rgba(125,65,230,1)'
        ));

        $this->admin_preview_manager('combined_style', array(
            '#awesomesauce_grid_color0',
            '#awesomesauce_grid_color1',
            '#awesomesauce_grid_color0',
            '#awesomesauce_grid_color0',
            '#awesomesauce_grid_color1',
            '#awesomesauce_grid_color0'
        ), '.retro_grid', array(
            'background',
            'linear-gradient(transparent 65%, ',
            ' 75%, ',
            ' 80%, ',
            ' 85%, transparent 95%), linear-gradient(90deg, transparent 65%, ',
            ' 75%, ',
            ' 80%, ',
            ' 85%, transparent 95%)'
        ), 'background-size: 30px 30px;');
    }

    public function getCss() {

        $css['desktop'] = array(
            '.awesomesauce_wrapper' => array(
                'perspective' => '700px',
                'position'    => 'relative',
                array(
                    '.retro_lines' => array(
                        'position'        => 'absolute',
                        'width'           => '100%',
                        'top'             => '50%',
                        'height'          => ($this->lines['desktop'] * 10) . 'px',
                        'margin-top'      => '-' . ($this->lines['desktop'] * 10 / 2) . 'px',
                        'background'      => 'linear-gradient(' . $this->single_color_to_rgba($this->lines_color, 0.2) . ' 20%, ' . $this->single_color_to_rgba($this->lines_color) . ' 40%, ' . $this->single_color_to_rgba($this->lines_color) . ' 60%, ' . $this->single_color_to_rgba($this->lines_color, 0.2) . ' 80%)',
                        'background-size' => 'auto 10px',
                        'box-shadow'      => '0 0 1em ' . $this->single_color_to_rgba($this->lines_color, 0.4)
                    )
                ),
                array(
                    '.retro_text' => array(
                        'position'      => 'relative',
                        'transform'     => 'skew(-15deg)',
                        'margin-bottom' => $this->font['space_between_texts'] . '%',
                        array(
                            '.awesomesauce_text' => array(
                                'font-family'    => $this->font['font-family'],
                                'font-weight'    => $this->font['font-weight'],
                                'font-style'     => $this->font['font-style'],
                                'letter-spacing' => $this->font['letter-spacing'],
                                'text-indent'    => $this->font['letter-spacing'] == 'normal' ? 0 : $this->font['letter-spacing'],
                                'line-height'    => $this->font['line-height'],
                            )
                        )
                    )
                ),
                array(
                    '.awesomesauce_text.first' => array(
                        'display'             => 'block',
                        'text-shadow'         => '0 0 0.1em ' . $this->font['text-shadow'][0] . ', 0 0 0.2em ' . $this->font['text-shadow'][1] . ',  0 0 5em ' . $this->font['text-shadow'][2],
                        '-webkit-text-stroke' => '0.06em rgba(0,0,0,0.5)',
                    )
                ),
                array(
                    '.awesomesauce_text.second' => array(
                        'position'                => 'absolute',
                        'left'                    => '0',
                        'top'                     => '0',
                        'background'              => $this->font['color'],
                        '-webkit-text-stroke'     => '0.01em ' . $this->font['text-shadow'][0],
                        '-webkit-background-clip' => 'text',
                        '-webkit-text-fill-color' => 'transparent',
                    )
                ),
                array(
                    '.retro_text_sub' => array(
                        'font-family'    => $this->sub_font['font-family'],
                        'font-weight'    => $this->sub_font['font-weight'],
                        'font-style'     => $this->sub_font['font-style'],
                        'letter-spacing' => $this->sub_font['letter-spacing'],
                        'text-indent'    => $this->font['letter-spacing'] == 'normal' ? 0 : $this->font['letter-spacing'],
                        'line-height'    => 1,
                        'color'          => $this->sub_font['color'],
                        'margin-top'     => '-1.4em',
                        'margin-bottom'  => '-0.3em',
                        'text-shadow'    => '0 0 0.05em ' . $this->sub_font['text-shadow'][0] . ', 0 0 0.2em ' . $this->sub_font['text-shadow'][1] . ', 0 0 0.3em ' . $this->sub_font['text-shadow'][1],
                        'transform'      => 'rotate(-7deg)',
                    )
                ),
                array(
                    '.retro_grid' => array(
                        'background'         => 'linear-gradient(transparent 65%, ' . $this->grid_colors[0] . ' 75%, ' . $this->grid_colors[1] . ' 80%, ' . $this->grid_colors[0] . ' 85%, transparent 95%),
    linear-gradient(90deg, transparent 65%, ' . $this->grid_colors[0] . ' 75%, ' . $this->grid_colors[1] . ' 80%, ' . $this->grid_colors[0] . ' 85%, transparent 95%)',
                        'background-size'    => '30px 30px',
                        'width'              => '200%',
                        'height'             => '225%',
                        'position'           => 'absolute',
                        'bottom'             => '-100%',
                        'left'               => '-50%',
                        'transform'          => 'rotateX(-100deg)',
                        '-webkit-mask-image' => 'linear-gradient(rgba(0,0,0,1), rgba(0,0,0,0) 80%)'
                    )
                ),

            )
        );

        $css['tablet'] = array(
            '.awesomesauce_wrapper' => array(
                array(
                    '.retro_lines' => array(
                        'height'     => ($this->lines['tablet'] * 10) . 'px',
                        'margin-top' => '-' . ($this->lines['tablet'] * 10 / 2) . 'px',
                    )
                )
            )
        );

        $css['mobile'] = array(
            '.awesomesauce_wrapper' => array(
                array(
                    '.retro_lines' => array(
                        'height'     => ($this->lines['mobile'] * 10) . 'px',
                        'margin-top' => '-' . ($this->lines['mobile'] * 10 / 2) . 'px',
                    )
                )
            )
        );

        CssProcessor::add_common_element('.retro_text_sub', $this->sub_font);

        $css = CssProcessor::manage_element_hiding($css, array(
            '.retro_lines' => $this->lines
        ));

        return $css;
    }
}

//https://codepen.io/ykadosh/pen/zYNxVKr