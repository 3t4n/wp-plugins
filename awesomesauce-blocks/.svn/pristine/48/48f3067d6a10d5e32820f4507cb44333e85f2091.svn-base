<?php

namespace Awesomesauce\Blocks\Clocks\Neon;

use Awesomesauce\Admin\BlockSettings;
use Awesomesauce\Awesomesauce;

if (!defined('ABSPATH')) {
    exit;
}

class Css extends BlockSettings {

    public $number_size;
    public $color;
    public $animate;

    public function init() {
        self::$bg_color = '#131313';

        $this->number_size = $this->script_setting('number_size', 'Size of the numbers', 'size_inputs', array(
            'desktop' => array(
                '60',
                'px'
            ),
            'tablet'  => array(
                '60',
                'px'
            ),
            'mobile'  => array(
                '40',
                'px'
            )
        ));

        $this->admin_preview_manager('device_style', 'number_size', '.group', 'gap', '', 8);
        $this->admin_preview_manager('device_style', 'number_size', '.digit', 'height');
        $this->admin_preview_manager('device_style', 'number_size', '.colon span', 'height');
        $this->admin_preview_manager('device_style', 'number_size', '.colon span', 'width', '', 3);
        $this->admin_preview_manager('device_style', 'number_size', '.colon span::before', 'width', '', 10);
        $this->admin_preview_manager('device_style', 'number_size', '.colon span::after', 'width', '', 10);

        $this->color = $this->script_setting('color', 'Color', 'color_picker', '#0080FF', array(
            '',
            true
        ));

        $this->admin_preview_manager('style', '#awesomesauce_color', '.awesomesauce_main', 'color');

        $this->animate = $this->script_setting('animation', 'Swing animation', 'yes_no', 1);

        $this->admin_preview_manager('yes_no', '#awesomesauce_animation', '.awesomesauce_main', array(
            'animation',
            'camera-rotate 30s ease-in-out forwards infinite'
        ));
    }

    public function getCss() {
        $css['desktop'] = array(
            '.awesomesauce_wrapper' => array(
                'perspective' => '100px',
                'width'       => '100%',
                'height'      => '100%',
                'text-align'  => 'start',
                array(
                    '.awesomesauce_main' => array(
                        '--s'                   => '100%',
                        '--l'                   => '50%',
                        'display'               => 'flex',
                        'color'                 => $this->color,
                        'gap'                   => '1px',
                        'width'                 => '100%',
                        'height'                => '100%',
                        'position'              => 'relative',
                        'z-index'               => '100',
                        'align-items'           => 'center',
                        'justify-content'       => 'center',
                        'animation-composition' => 'add',
                        'translate'             => '0px 1px 10px',
                        'transform-style'       => 'preserve-3d',
                        array(
                            '.digits'                                        => array(
                                'transform-style' => 'preserve-3d',
                                array(
                                    '.group' => array(
                                        'display' => 'flex',
                                        'gap'     => $this->divide_size_input_result($this->number_size, 8, 'desktop'),
                                        array(
                                            '.digit'                                                => array(
                                                'position'     => 'relative',
                                                'height'       => $this->number_size['desktop'],
                                                'aspect-ratio' => '1/2',
                                                'filter'       => 'drop-shadow(0px 0px 4px currentColor) drop-shadow(0px 0px 10px currentColor)',
                                                array(
                                                    'span'                   => array(
                                                        '--act'                 => '0',
                                                        '--signX'               => '1',
                                                        '--signY'               => '1',
                                                        'position'              => 'absolute',
                                                        'background-color'      => 'white',
                                                        'transition'            => 'all 0.3s cubic-bezier(0.17, 0.67, 0.5, 1.15)',
                                                        'opacity'               => 'calc(0.03 + 0.97 * var(--act))',
                                                        'animation-composition' => 'add',
                                                        'transform'             => 'scale(var(--signX), var(--signY))',
                                                    ),
                                                    'span.end'               => array(
                                                        '-webkit-clip-path' => 'polygon(15% 0%, 7.5% 20%, 25% 100%, 75% 100%, 92.5% 20%, 85% 0%)',
                                                        'clip-path'         => 'polygon(15% 0%, 7.5% 20%, 25% 100%, 75% 100%, 92.5% 20%, 85% 0%)',
                                                        'width'             => '100%',
                                                        'height'            => '10%',
                                                    ),
                                                    'span.end.top'           => array(
                                                        'top' => '0',
                                                    ),
                                                    'span.end.bottom'        => array(
                                                        'top'     => 'initial',
                                                        'bottom'  => '0',
                                                        '--signY' => '-1',
                                                    ),
                                                    'span.side'              => array(
                                                        '-webkit-clip-path' => 'polygon(0% 15%, 20% 7.5%, 100% 22.5%, 100% 85%, 20% 95%, 0% 90%)',
                                                        'clip-path'         => 'polygon(0% 15%, 20% 7.5%, 100% 22.5%, 100% 85%, 20% 95%, 0% 90%)',
                                                        'height'            => '50%',
                                                        'width'             => '20%',
                                                    ),
                                                    'span.side.left'         => array(
                                                        'top'  => '0',
                                                        'left' => '0',
                                                    ),
                                                    'span.side.left.bottom'  => array(
                                                        'top'     => 'initial',
                                                        'bottom'  => '0',
                                                        '--signY' => '-1',
                                                    ),
                                                    'span.side.right'        => array(
                                                        'top'     => '0',
                                                        'left'    => 'initial',
                                                        'right'   => '0',
                                                        '--signX' => '-1',
                                                    ),
                                                    'span.side.right.bottom' => array(
                                                        'top'     => 'initial',
                                                        '--signY' => '-1',
                                                        'bottom'  => '0',
                                                    ),
                                                    'span.middle'            => array(
                                                        '-webkit-clip-path' => 'polygon(22.5% 0%, 6.5% 50%, 22.5% 100%, 77.5% 100%, 93.5% 50%, 77.5% 0%)',
                                                        'clip-path'         => 'polygon(22.5% 0%, 6.5% 50%, 22.5% 100%, 77.5% 100%, 93.5% 50%, 77.5% 0%)',
                                                        'top'               => '45%',
                                                        'height'            => '10%',
                                                        'width'             => '100%',
                                                    )
                                                )
                                            ),
                                            '.digit[data-digit="0"] :not(.middle)'                  => array(
                                                '--act' => '1',
                                            ),
                                            '.digit[data-digit="1"] .right'                         => array(
                                                '--act' => '1',
                                            ),
                                            '.digit[data-digit="2"] :not(.top.left, .bottom.right)' => array(
                                                '--act' => '1',
                                            ),
                                            '.digit[data-digit="3"] :not(.left)'                    => array(
                                                '--act' => '1',
                                            ),
                                            '.digit[data-digit="4"] :not(.end, .bottom.left)'       => array(
                                                '--act' => '1',
                                            ),
                                            '.digit[data-digit="5"] :not(.top.right, .bottom.left)' => array(
                                                '--act' => '1',
                                            ),
                                            '.digit[data-digit="6"] :not(.top.right)'               => array(
                                                '--act' => '1',
                                            ),
                                            '.digit[data-digit="7"] .top'                           => array(
                                                '--act' => '1',
                                            ),
                                            '.digit[data-digit="7"] .right'                         => array(
                                                '--act' => '1',
                                            ),
                                            '.digit[data-digit="8"] > *'                            => array(
                                                '--act' => '1',
                                            ),
                                            '.digit[data-digit="9"] :not(.bottom.left)'             => array(
                                                '--act' => '1',
                                            )
                                        )
                                    )
                                )
                            ),
                            '.colon-group'                                   => array(
                                'transform-style' => 'preserve-3d',
                                array(
                                    '.colon span'         => array(
                                        'display'         => 'flex',
                                        'height'          => $this->number_size['desktop'],
                                        'flex-direction'  => 'column',
                                        'justify-content' => 'space-evenly',
                                        'width'           => $this->divide_size_input_result($this->number_size, 3, 'desktop'),
                                        'align-items'     => 'center',
                                        'filter'          => 'drop-shadow(0px 0px 4px currentColor) drop-shadow(0px 0px 10px currentColor)',
                                    ),
                                    '.colon span::before' => array(
                                        'content'          => '""',
                                        'display'          => 'block',
                                        'width'            => $this->divide_size_input_result($this->number_size, 10, 'desktop'),
                                        'aspect-ratio'     => '1/1',
                                        'background-color' => 'white',
                                        'border-radius'    => '2px',
                                    ),
                                    '.colon span::after'  => array(
                                        'content'          => '""',
                                        'display'          => 'block',
                                        'width'            => $this->divide_size_input_result($this->number_size, 10, 'desktop'),
                                        'aspect-ratio'     => '1/1',
                                        'background-color' => 'white',
                                        'border-radius'    => '2px',
                                    )
                                )
                            ),
                            '.shadow'                                        => array(
                                'top'              => '0',
                                'position'         => 'absolute',
                                'transform-origin' => 'bottom center',
                                'transform'        => 'translateY(1px) translateZ(2px) rotateX(-90.1deg)',
                                array(
                                    '.digit span' => array(
                                        'opacity' => 'var(--act)',
                                    )
                                )
                            ),
                            '.shadow.shadow1'                                => array(
                                'opacity' => '0.5',
                                'filter'  => 'drop-shadow(0px 0px 4px currentColor) drop-shadow(0px 0px 10px currentColor) blur(5px)',
                            ),
                            '.shadow.shadow1 > span, .shadow.shadow1 .digit' => array(
                                '-webkit-mask-image' => 'linear-gradient(to bottom, white, rgba(0, 0, 0, 0.5))',
                                'mask-image'         => 'linear-gradient(to bottom, white, rgba(0, 0, 0, 0.5))',
                            ),
                            '.shadow.shadow2'                                => array(
                                'opacity' => '0.4',
                                'filter'  => 'drop-shadow(0px 0px 4px currentColor) drop-shadow(0px 0px 10px currentColor) blur(5px)',
                            ),
                            '.shadow.shadow2 > span, .shadow.shadow2 .digit' => array(
                                'opacity'            => 'var(--act)',
                                '-webkit-mask-image' => 'linear-gradient(to top, black, rgba(0, 0, 0, 0.1) 60%, rgba(0, 0, 0, 0))',
                                'mask-image'         => 'linear-gradient(to top, black, rgba(0, 0, 0, 0.1) 60%, rgba(0, 0, 0, 0))',
                            )
                        )
                    )
                ),
                array(
                    '.safari .digit span'         => array(
                        'transition' => 'none !important',
                    ),
                    '.safari .digit span::before' => array(
                        'content'   => '""',
                        'position'  => 'absolute',
                        'display'   => 'block',
                        'width'     => '400%',
                        'height'    => '400%',
                        'top'       => '0',
                        'left'      => '0',
                        'transform' => 'translate(-50%, -50%)',
                    )
                )
            )
        );

        $css['desktop']['.awesomesauce_wrapper'][0]['.awesomesauce_main'] = $this->animation_css('camera-rotate 15s ease-in-out forwards infinite') + $css['desktop']['.awesomesauce_wrapper'][0]['.awesomesauce_main'];

        $css['tablet'] = array(
            '.awesomesauce_wrapper' => array(
                array(
                    '.awesomesauce_main' => array(
                        '.digits'      => array(
                            '.group' => array(
                                'gap' => $this->divide_size_input_result($this->number_size, 8, 'tablet'),
                                array(
                                    '.digit' => array(
                                        'height' => $this->number_size['tablet'],
                                    ),
                                )
                            ),
                        ),
                        '.colon-group' => array(
                            '.colon span'         => array(
                                'height' => $this->number_size['tablet'],
                                'width'  => $this->divide_size_input_result($this->number_size, 3, 'tablet'),
                            ),
                            '.colon span::before' => array(
                                'width' => $this->divide_size_input_result($this->number_size, 10, 'tablet')
                            ),
                            '.colon span::after'  => array(
                                'width' => $this->divide_size_input_result($this->number_size, 10, 'tablet')
                            )
                        )
                    ),
                )
            )
        );

        $css['mobile'] = array(
            '.awesomesauce_wrapper' => array(
                array(
                    '.awesomesauce_main' => array(
                        '.digits'      => array(
                            '.group' => array(
                                'gap' => $this->divide_size_input_result($this->number_size, 8, 'mobile'),
                                array(
                                    '.digit' => array(
                                        'height' => $this->number_size['mobile'],
                                    ),
                                )
                            ),
                        ),
                        '.colon-group' => array(
                            '.colon span'         => array(
                                'height' => $this->number_size['mobile'],
                                'width'  => $this->divide_size_input_result($this->number_size, 3, 'mobile'),
                            ),
                            '.colon span::before' => array(
                                'width' => $this->divide_size_input_result($this->number_size, 10, 'mobile')
                            ),
                            '.colon span::after'  => array(
                                'width' => $this->divide_size_input_result($this->number_size, 10, 'mobile')
                            )
                        )
                    ),
                )
            )
        );

        if ($this->animate || Awesomesauce::$is_admin) {
            $css['animations'] = array(
                'camera-rotate' => array(
                    '0%'   => array(
                        'transform' => 'rotateY(-10deg)'
                    ),
                    '50%'  => array(
                        'transform' => 'rotateY(10deg)'
                    ),
                    '100%' => array(
                        'transform' => 'rotateY(-10deg)'
                    )
                )
            );
        }

        return $css;
    }
}

//https://codepen.io/wheatup/pen/JjzdMbK