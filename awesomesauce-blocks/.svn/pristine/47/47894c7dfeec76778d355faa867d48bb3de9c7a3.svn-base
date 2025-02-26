<?php

namespace Awesomesauce\Blocks\Particles\ProjectQuantum;

use Awesomesauce\Admin\BlockSettings;
use Awesomesauce\Admin\CssProcessor;

if (!defined('ABSPATH')) {
    exit;
}

class Css extends BlockSettings {

    public $font;
    private $dots_color;

    public function init() {
        self::$bg_color = 'linear-gradient(165deg, #0400FF 0%, #1A90FF 100%)';

        $this->font = $this->common_setting('font', array(
            'desktop'        => array(
                '50',
                'px'
            ),
            'tablet'         => array(
                '50',
                'px'
            ),
            'mobile'         => array(
                '30',
                'px'
            ),
            'font-family'    => 'Turret Road',
            'color'          => 'rgba(255,255,255,1)',
            'font-weight'    => '200',
            'letter-spacing' => '0.4',
            'line-height'    => 'normal',
            'text-shadow'    => '#000000',
        ));

        $this->dots_color = $this->script_setting('dots_color', 'Color of dots', 'color_picker', '#ffffff');
        $this->admin_preview_manager('style', '#awesomesauce_dots_color', '.cube .faces .dot', 'background');
    }

    public function getCss() {
        $css['desktop'] = array(
            '.awesomesauce_wrapper' => array(
                'perspective' => '330px',
                array(
                    '.awesomesauce_text' => array(
                            'font-family'    => $this->font['font-family'],
                            'font-weight'    => $this->font['font-weight'],
                            'font-style'     => $this->font['font-style'],
                            'letter-spacing' => $this->font['letter-spacing'],
                            'text-indent'    => $this->font['letter-spacing'] == 'normal' ? 0 : $this->font['letter-spacing'],
                            'line-height'    => $this->font['line-height'],
                            'color'          => $this->font['color'],
                        ) + $this->font['text-shadow-css'],
                    '.cube'              => array(
                            'position'                 => 'absolute',
                            'top'                      => '50%',
                            'left'                     => '50%',
                            'margin-top'               => '-105px',
                            'margin-left'              => '-105px',
                            'width'                    => '210px',
                            'height'                   => '210px',
                            '-webkit-transform-style'  => 'preserve-3d',
                            '-webkit-transform-origin' => '105px 105px',
                            'transform'                => 'rotateY(30deg) rotateX(30deg) rotate(30deg)'
                        ) + $this->animation_css('spinCube 9000ms linear infinite'),
                    '.cube .faces'       => array(
                        'position' => 'absolute',
                        'top'      => '0px',
                        'left'     => '0px',
                        'width'    => '210px',
                        'height'   => '210px',
                    ),
                    '.cube .faces .dot'  => array(
                        'position'      => 'absolute',
                        'background'    => $this->dots_color,
                        'width'         => '2px',
                        'height'        => '2px',
                        'border-radius' => '50%',
                    ),
                    '.cube .faces .p1'   => array(
                        'top'         => '-1px',
                        'margin-left' => '-1px',
                    ),
                    '.cube .faces .p2'   => array(
                        'top'         => '-1px',
                        'left'        => '50%',
                        'margin-left' => '- 1px',
                    ),
                    '.cube .faces .p3'   => array(
                        'top'         => '-1px',
                        'left'        => '100%',
                        'margin-left' => '-1px',
                    ),
                    '.cube .faces .p4'   => array(
                        'top'        => '50%',
                        'left'       => '-1px',
                        'margin-top' => '-1px',
                    ),
                    '.cube .faces .p5'   => array(
                        'top'         => '50%',
                        'left'        => '50%',
                        'margin-top'  => '-1px',
                        'margin-left' => '-1px',
                    ),
                    '.cube .faces .p6'   => array(
                        'top'         => '50%',
                        'left'        => '100%',
                        'margin-top'  => '-1px',
                        'margin-left' => '-1px',
                    ),
                    '.cube .faces .p7'   => array(
                        'top'         => '100%',
                        'left'        => '0%',
                        'margin-top'  => '-1px',
                        'margin-left' => '-1px',
                    ),
                    '.cube .faces .p8'   => array(
                        'top'         => '100%',
                        'left'        => '50%',
                        'margin-top'  => '-1px',
                        'margin-left' => '-1px',
                    ),
                    '.cube .faces .p9'   => array(
                        'top'         => '100%',
                        'left'        => '100%',
                        'margin-top'  => '-1px',
                        'margin-left' => '-1px',
                    ),
                    '.cube .faces .p10'  => array(
                        'top'         => '25%',
                        'left'        => '25%',
                        'margin-top'  => '-1px',
                        'margin-left' => '-1px',
                    ),
                    '.cube .faces .p11'  => array(
                        'top'         => '25%',
                        'left'        => '75%',
                        'margin-top'  => '-1px',
                        'margin-left' => '-1px',
                    ),
                    '.cube .faces .p12'  => array(
                        'top'         => '75%',
                        'left'        => '25%',
                        'margin-top'  => '-1px',
                        'margin-left' => '-1px',
                    ),
                    '.cube .faces .p13'  => array(
                        'top'         => '75%',
                        'left'        => '75%',
                        'margin-top'  => '-1px',
                        'margin-left' => '-1px',
                    ),
                    '.cube .f1'          => array(
                        '-webkit-transform' => 'translateZ(-105px)',
                        'animation-delay'   => '0.3s',
                    ),
                    '.cube .f2'          => array(
                        '-webkit-transform' => 'translateZ(-84px)',
                        'animation-delay'   => '0.6s',
                    ),
                    '.cube .f3'          => array(
                        '-webkit-transform' => 'translateZ(-63px)',
                        'animation-delay'   => '0.9s',
                    ),
                    '.cube .f4'          => array(
                        '-webkit-transform' => 'translateZ(-42px)',
                        'animation-delay'   => '1.2s',
                    ),
                    '.cube .f5'          => array(
                        '-webkit-transform' => 'translateZ(-21px)',
                        'animation-delay'   => '1.5s',
                    ),
                    '.cube .f6'          => array(
                        '-webkit-transform' => 'translateZ(0px)',
                        'animation-delay'   => '1.8s',
                    ),
                    '.cube .f7'          => array(
                        '-webkit-transform' => 'translateZ(21px)',
                        'animation-delay'   => '2.1s',
                    ),
                    '.cube .f8'          => array(
                        '-webkit-transform' => 'translateZ(42px)',
                        'animation-delay'   => '2.4s',
                    ),
                    '.cube .f9'          => array(
                        '-webkit-transform' => 'translateZ(63px)',
                        'animation-delay'   => '2.7s',
                    ),
                    '.cube .f10'         => array(
                        '-webkit-transform' => 'translateZ(84px)',
                        'animation-delay'   => '3s',
                    ),
                    '.cube .f11'         => array(
                        '-webkit-transform' => 'translateZ(105px)',
                        'animation-delay'   => '3.3s',
                    ),
                )
            )
        );

        $css['animations'] = array(
            'spinCube' => array(
                '0%'   => array(
                    'transform' => 'rotateY(0deg) rotateX(-45deg) rotate(0deg)'
                ),
                '50%'  => array(
                    'transform' => 'rotateY(180deg) rotateX(135deg) rotate(180deg)'
                ),
                '100%' => array(
                    'transform' => 'rotateY(360deg) rotateX(315deg) rotate(360deg)'
                )
            )
        );

        CssProcessor::dont_skip_text();

        return $css;
    }
}

//https://codepen.io/Lov/pen/pbJEZo