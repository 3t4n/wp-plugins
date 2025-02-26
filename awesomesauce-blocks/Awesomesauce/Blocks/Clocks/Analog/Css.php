<?php

namespace Awesomesauce\Blocks\Clocks\Analog;

use Awesomesauce\Admin\BlockSettings;

if (!defined('ABSPATH')) {
    exit;
}

class Css extends BlockSettings {

    public $font;
    private $clock;
    private $colors;

    public function init() {
        self::$bg_color = '#a2bdd9';

        $this->clock = $this->script_setting('clock_size', 'Clock size', 'size_inputs', array(
            'desktop' => array(
                '300',
                'px'
            ),
            'tablet'  => array(
                '250',
                'px'
            ),
            'mobile'  => array(
                '150',
                'px'
            )
        ));

        $this->admin_preview_manager('device_style', 'clock_size', '.clock', 'height', 'block');
        $this->admin_preview_manager('device_style', 'clock_size', '.clock', 'width', 'block');

        $this->colors = $this->script_setting('colors', 'Clock colors', 'multi_color_picker', array(
            '#ececec',
            '#cccccc',
            '#333333',
            '#666666',
            '#BD3532'
        ));

        $this->admin_preview_manager('style', '#awesomesauce_colors0', '.clock', 'background');
        $this->admin_preview_manager('style', '#awesomesauce_colors1', '.dot', 'background');
        $this->admin_preview_manager('style', '#awesomesauce_colors2', '.clock_border', 'background');
        $this->admin_preview_manager('style', '#awesomesauce_colors2', '.dot-border', 'background');
        $this->admin_preview_manager('style', '#awesomesauce_colors2', '.hour-hand', 'background');
        $this->admin_preview_manager('style', '#awesomesauce_colors3', '.minute-hand', 'background');
        $this->admin_preview_manager('style', '#awesomesauce_colors3', '.diallines-color', 'background');

        $this->admin_preview_manager('style', '#awesomesauce_colors4', '.second-hand', 'background');
        $this->font = $this->common_setting('font', array(
            'desktop'        => array(
                '30',
                'px'
            ),
            'tablet'         => array(
                '24',
                'px'
            ),
            'mobile'         => array(
                '17',
                'px'
            ),
            'font-family'    => 'Abel',
            'color'          => '#3B3B3B',
            'font-weight'    => '700',
            'display'        => 'flex',
            'letter-spacing' => false
        ), '.number');
    }

    public function getCss() {
        $css['desktop'] = array(
            '.awesomesauce_wrapper' => array(
                array(
                    '.clock'                     => array(
                        'background'    => $this->colors[0],
                        'width'         => $this->clock['desktop'],
                        'height'        => $this->clock['desktop'],
                        'border-radius' => '50%',
                        'position'      => 'relative',
                        'transform'     => 'scale(0.9)',
                    ),
                    '.clock_border'              => array(
                        'background'    => $this->colors[2],
                        'width'         => '100%',
                        'height'        => '100%',
                        'transform'     => 'scale(1.1)',
                        'border-radius' => '50%',
                        'display'       => 'grid',
                        'place-content' => 'center',
                        'box-shadow'    => '0 4px 8px -2px rgba(0,0,0,0.8)',
                    ),
                    '.dot'                       => array(
                        'width'         => '3%',
                        'height'        => '3%',
                        'border-radius' => '50%',
                        'background'    => $this->colors[1],
                        'top'           => '0',
                        'left'          => '0',
                        'right'         => '0',
                        'bottom'        => '0',
                        'margin'        => 'auto',
                        'position'      => 'absolute',
                        'z-index'       => '11'
                    ),
                    '.dot-border'                => array(
                        'width'         => '5%',
                        'height'        => '5%',
                        'border-radius' => '50%',
                        'background'    => $this->colors[2],
                        'top'           => '0',
                        'left'          => '0',
                        'right'         => '0',
                        'bottom'        => '0',
                        'margin'        => 'auto',
                        'position'      => 'absolute',
                        'z-index'       => '10'
                    ),
                    '.hour-hand'                 => array(
                        'position'         => 'absolute',
                        'z-index'          => '5',
                        'width'            => '1.5%',
                        'height'           => '30%',
                        'background'       => $this->colors[2],
                        'transform-origin' => 'bottom center',
                        'top'              => '20%',
                        //top = 50% - height
                        'left'             => '49.25%',
                        //left = 50% - width/2
                    ),
                    '.minute-hand'               => array(
                        'position'         => 'absolute',
                        'z-index'          => '6',
                        'width'            => '1%',
                        'height'           => '42%',
                        'background'       => $this->colors[3],
                        'transform-origin' => 'bottom center',
                        'top'              => '8%',
                        'left'             => '49.5%',
                    ),
                    '.second-hand'               => array(
                        'position'         => 'absolute',
                        'z-index'          => '7',
                        'width'            => '0.5%',
                        'height'           => '42%',
                        'background'       => $this->colors[4],
                        'transform-origin' => 'bottom center',
                        'top'              => '8%',
                        'left'             => '49.75%',
                    ),
                    '.number'                    => array(
                        'position'        => 'absolute',
                        'width'           => '100%',
                        'display'         => 'flex',
                        'justify-content' => 'center',
                        'align-items'     => 'center',
                        'z-index'         => '4',
                        'line-height'     => '1',
                        'font-family'     => $this->font['font-family'],
                        'font-weight'     => $this->font['font-weight'],
                        'font-style'      => $this->font['font-style'],
                        'color'           => $this->font['color'],
                        'font-size'       => $this->font['desktop']
                    ),
                    '.h12'                       => array(
                        'top'         => '8%',
                        'margin-left' => '0',
                    ),
                    '.number.h3'                 => array(
                        'justify-content' => 'flex-end',
                        'right'           => '8%',
                        'height'          => '100%',
                    ),
                    '.h6'                        => array(
                        'bottom'      => '8%',
                        'margin-left' => '0',
                    ),
                    '.number.h9'                 => array(
                        'justify-content' => 'flex-start',
                        'left'            => '8%',
                        'height'          => '100%',
                    ),
                    '.diallines'                 => array(
                        'position'    => 'absolute',
                        'z-index'     => '2',
                        'width'       => '0.5%',
                        'height'      => '100%',
                        'left'        => '50%',
                        'margin-left' => '-0.25%',
                        array(
                            '.diallines-color' => array(
                                'height' => '3.5%',
                            )
                        ),
                    ),
                    '.diallines:nth-child(5n+5)' => array(
                        'width'       => '1%',
                        'margin-left' => '-0.5%',
                        array(
                            '.diallines-color' => array(
                                'height' => '6%',
                            )
                        ),
                    ),
                    '.diallines-color'           => array(
                        'width'      => '100%',
                        'height'     => '3.5%',
                        'background' => $this->colors[3],
                    ),
                )
            )
        );

        $css['tablet'] = array(
            '.awesomesauce_wrapper' => array(
                array(
                    '.clock'  => array(
                        'height' => $this->clock['tablet'],
                        'width'  => $this->clock['tablet']
                    ),
                    '.number' => array(
                        'font-size' => $this->font['tablet']
                    ),
                )
            )
        );

        $css['mobile'] = array(
            '.awesomesauce_wrapper' => array(
                array(
                    '.clock'  => array(
                        'height' => $this->clock['mobile'],
                        'width'  => $this->clock['mobile']
                    ),
                    '.number' => array(
                        'font-size' => $this->font['mobile']
                    )
                )
            )
        );

        return $css;
    }
}

//https://codepen.io/vaskopetrov/pen/yVEXjz