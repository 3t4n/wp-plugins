<?php

namespace Awesomesauce\Blocks\Clocks\Rotate;

use Awesomesauce\Admin\BlockSettings;
use Awesomesauce\Admin\CssProcessor;

if (!defined('ABSPATH')) {
    exit;
}

class Css extends BlockSettings {

    public $font;
    public $height;
    private $number;
    private $clock;
    private $colors;

    public function init() {
        self::$bg_color = 'radial-gradient(ellipse, #DEDEDE 0%, #6B6B6B 100%)';

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

        $this->clock = $this->script_setting('clock_size', 'Clock size', 'size_inputs', array(
            'desktop' => array(
                '360',
                'px'
            ),
            'tablet'  => array(
                '260',
                'px'
            ),
            'mobile'  => array(
                '220',
                'px'
            )
        ));

        $this->clock['desktop_scale'] = $this->clock['desktop_value'] / 460;
        $this->clock['tablet_scale']  = $this->clock['tablet_value'] / 460;
        $this->clock['mobile_scale']  = $this->clock['mobile_value'] / 460;

        $devices = array(
            'desktop',
            'tablet',
            'mobile'
        );

        foreach ($devices as $device) {
            $this->admin_preview_manager('combined_style', array(
                'document.querySelector("#awesomesauce_clock_size_' . $device . '").value / 460',
            ), '.clock', array(
                'scale',
                ''
            ), '', '#awesomesauce_clock_size_' . $device, $device);
        }

        $this->colors = $this->script_setting('colors', 'Clock colors', 'multi_color_picker', array(
            'linear-gradient(60deg, rgba(255,255,255,0.05) 0%, rgba(255,255,255,0.7) 50%, rgba(255,255,255,0.5) 60%, rgba(255,255,255,0) 100%)',
            'rgba(222,98,0,0.3)',
            'rgba(222,220,210,1)'
        ));

        $this->admin_preview_manager('style', '#awesomesauce_colors0', '.clock', 'background');

        $this->admin_preview_manager('combined_style', array(
            '#awesomesauce_colors2',
            '#awesomesauce_colors1'
        ), '.clock', array(
            'box-shadow',
            'inset 0 10px 10px 0px rgba(0,0,0,0.35), inset 0 -3px 1px ',
            ', 0 1px 0 1px rgba(255,255,255,0.5), 0 0 0px 10px ',
            ', 0 0 0 11px rgba(255,255,255,0.5), 0 30px 50px 20px rgba(0,0,0,0.5)'
        ));

        $this->font = $this->common_setting('font', array(
            'desktop'      => array(
                '30',
                'px'
            ),
            'desktop_only' => 'true',
            'font-family'  => 'Montserrat',
            'color'        => '#DEDEDE',
            'font-weight'  => '400'
        ), '', array(), array(
            'Center text font size',
            'This is a base font size, which is affected by the clock size scaling.',
            'Center text'
        ));

        $this->font['first_character_font_size'] = $this->script_setting('first_character_font_size', 'First character font size', 'size_input', '7', array(
            '',
            'em',
            array(
                'step' => '0.5'
            )
        ));

        $this->admin_preview_manager('style', '#awesomesauce_first_character_font_size', '.awesomesauce_text::first-letter', 'font-size', '', '', '', 'em');

        $this->font['space_after_first_character'] = $this->script_setting('space_after_first_character', 'Space after first character', 'size_input', '-0.25', array(
            '',
            'em',
            array(
                'step' => '0.05'
            )
        ));

        $this->admin_preview_manager('style', '#awesomesauce_space_after_first_character', '.awesomesauce_text::first-letter', 'margin-right', '', '', '', 'em');

        $this->number = $this->common_setting('font', array(
            'desktop'        => array(
                '16',
                'px'
            ),
            'desktop_only'   => 'true',
            'font-family'    => 'Montserrat',
            'color'          => '#424242',
            'font-weight'    => '400',
            'letter-spacing' => false
        ), '.items', array(), array(
            'Number font size',
            'This is a base font size, which is affected by the clock size scaling.',
            'Number'
        ), 'number');

        $this->admin_preview_manager('combined_style', array(
            '#awesomesauce_number_color'
        ), '.clock::before', array(
            'border-color',
            ''
        ));
    }

    public function getCss() {
        $css['desktop'] = array(
            '.awesomesauce_wrapper' => array(
                array(
                    '*'                                => array(
                        'box-sizing' => 'border-box',
                    ),
                    '*::after'                         => array(
                        'box-sizing' => 'border-box',
                    ),
                    '*::before'                        => array(
                        'box-sizing' => 'border-box',
                    ),
                    '.awesomesauce_text'               => array(
                        'font-size'        => $this->font['desktop'],
                        'font-family'      => $this->font['font-family'],
                        'font-weight'      => $this->font['font-weight'],
                        'font-style'       => $this->font['font-style'],
                        'color'            => $this->font['color'],
                        'margin'           => '0 0 0 0.6em',
                        'position'         => 'absolute',
                        'top'              => '50%',
                        'left'             => '50%',
                        'height'           => '200px',
                        'line-height'      => '200px',
                        'width'            => '200px',
                        'text-align'       => 'center',
                        'transform'        => 'translate(-55%, -50%) rotate(0.1deg)',
                        'transform-origin' => '50%',
                        'cursor'           => 'pointer',
                        'z-index'          => '100',
                        'transition'       => 'all .25s',
                        'text-shadow'      => '0 1px 1px rgba(255,255,255,0.35), 0 -1px 1px rgba(0,0,0,0.15)',
                        'overflow'         => 'hidden',
                        'white-space'      => 'nowrap'
                    ),
                    '.awesomesauce_text::first-letter' => array(
                        'font-size'      => $this->font['first_character_font_size'] . 'em',
                        'vertical-align' => 'middle',
                        'margin-right'   => $this->font['space_after_first_character'] . 'em',
                    ),
                    '.awesomesauce_text span'          => array(
                        'font-size' => '30px',
                        'display'   => 'block',
                        'position'  => 'absolute',
                        'top'       => '0',
                        'left'      => '120px',
                    ),
                    '.clock'                           => array(
                        'position'         => 'absolute',
                        'top'              => '50%',
                        'left'             => '50%',
                        'width'            => '460px',
                        'height'           => '460px',
                        'border-radius'    => '50%',
                        'transform'        => 'translate(-50%, -50%)',
                        'z-index'          => '1',
                        'background'       => $this->colors[0],
                        'box-shadow'       => 'inset 0 10px 10px 0px rgba(0,0,0,0.35), inset 0 -3px 1px ' . $this->colors[2] . ', 0 1px 0 1px rgba(255,255,255,0.5), 0 0 0px 10px ' . $this->colors[1] . ', 0 0 0 11px rgba(255,255,255,0.5), 0 30px 50px 20px rgba(0,0,0,0.5)',
                        'scale'            => $this->clock['desktop_scale'],
                        'transform-origin' => 'top left'
                    ),
                    '.clock::after'                    => array(
                        'content'           => '""',
                        'position'          => 'absolute',
                        'width'             => '100px',
                        'height'            => '30px',
                        'transition-origin' => '50%',
                        'top'               => '50%',
                        'left'              => '50%',
                        'transition'        => 'all .5s',
                        'transform'         => 'translate(120px, -50%)',
                        'box-shadow'        => '0 0 100px 1000px rgba(0,0,0,0), 0 0px 1px rgba(0,0,0,0.25)',
                        'background'        => 'linear-gradient(to bottom, rgba(255,255,255,0.65) 0%, rgba(255,255,255,0) 40%, rgba(255,255,255,0) 60%, rgba(255,255,255,.15) 100%)',
                        'border'            => '1px solid rgba(0,0,0,0)',
                        'border-bottom'     => '1px solid rgba(0,0,0,0.15)',
                        'border-radius'     => '4px',
                    ),
                    '.clock::before'                   => array(
                        'content'       => '""',
                        'position'      => 'absolute',
                        'width'         => '30px',
                        'height'        => '10px',
                        'right'         => '0',
                        'top'           => '50%',
                        'margin'        => '-5px 44px 0 0',
                        'border'        => '1px dashed ' . $this->number['color'],
                        'border-top'    => '0',
                        'border-bottom' => '0',
                        'opacity'       => '1',
                        'animation'     => 'none',
                    ),
                    '.clock > .items'                  => array(
                        'position'   => 'absolute',
                        'padding'    => '0',
                        'top'        => '50%',
                        'left'       => '50%',
                        'width'      => '20px',
                        'height'     => '20px',
                        'list-style' => 'none',
                        'margin'     => '-10px 0 0 -10px',
                    ),
                    '.s'                               => array(
                        'transform'  => 'rotateZ(0deg)',
                        'transition' => 'all .5s cubic-bezier(0.5, -0.5, 0.500, 1.5)',
                    ),
                    '.m'                               => array(
                        'transform'  => 'rotateZ(0deg)',
                        'transition' => 'all .5s cubic-bezier(0.5, -0.5, 0.500, 1.5)',
                    ),
                    '.h'                               => array(
                        'transform'  => 'rotateZ(0deg)',
                        'transition' => 'all .5s cubic-bezier(0.5, -0.5, 0.500, 1.5)',
                    ),
                    '.item'                            => array(
                        'position'         => 'absolute',
                        'width'            => '20px',
                        'height'           => '20px',
                        'line-height'      => '20px',
                        'text-align'       => 'right',
                        'opacity'          => '0.2',
                        'transform-origin' => '50%',
                        'transition'       => 'all .25s linear .25s',
                        'font-size'        => 'inherit',
                        'font-family'      => 'inherit',
                        'font-weight'      => 'inherit',
                        'font-style'       => 'inherit',
                        'letter-spacing'   => 'inherit',
                        'text-indent'      => 'inherit',
                        'color'            => 'inherit',
                        'white-space'      => 'nowrap'
                    ),
                    '.items'                           => array(
                        'font-size'      => $this->number['desktop'],
                        'font-family'    => $this->number['font-family'],
                        'font-weight'    => $this->number['font-weight'],
                        'font-style'     => $this->number['font-style'],
                        'letter-spacing' => $this->number['letter-spacing'],
                        'text-indent'    => $this->number['letter-spacing'] == 'normal' ? 0 : $this->number['letter-spacing'],
                        'color'          => $this->number['color'],
                    ),
                    '.item.active'                     => array(
                        'opacity'     => '1',
                        'font-weight' => '700',
                        'font-size'   => '1.125em'
                    ),
                ),
            ),
        );

        $css['tablet'] = array(
            '.awesomesauce_wrapper' => array(
                array(
                    '.clock' => array(
                        'scale' => $this->clock['tablet_scale'],
                    ),
                )
            )
        );

        $css['mobile'] = array(
            '.awesomesauce_wrapper' => array(
                array(
                    '.clock' => array(
                        'scale' => $this->clock['mobile_scale'],
                    ),
                )
            )
        );

        CssProcessor::clear_common_elements();

        return $css;
    }
}

//https://codepen.io/V17h3m/pen/XdYEjR/