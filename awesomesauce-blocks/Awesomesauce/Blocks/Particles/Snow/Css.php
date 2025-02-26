<?php

namespace Awesomesauce\Blocks\Particles\Snow;

use Awesomesauce\Admin\BlockSettings;

if (!defined('ABSPATH')) {
    exit;
}

class Css extends BlockSettings {

    public $font;
    private $snow_color;

    public function init() {
        self::$bg_color = 'radial-gradient(ellipse, rgba(92,92,92,1) 0%, #000000 100%)';

        $this->font = $this->common_setting('font', array(
            'desktop'     => array(
                '40',
                'px'
            ),
            'tablet'      => array(
                '30',
                'px'
            ),
            'mobile'      => array(
                '20',
                'px'
            ),
            'font-family' => 'Cedarville Cursive',
            'color'       => 'rgba(255,255,255,1)',
            'font-weight' => '400',
            'line-height' => 'normal',
            'text-shadow' => 'rgba(0,0,0,1)',
        ));

        $this->snow_color = $this->script_setting('snow_color', 'Snow color', 'color_picker', '#FFFFFF', array(
            '',
            true
        ));
        $this->admin_preview_manager('style', '#awesomesauce_snow_color', '.snow', 'background');

        $this->admin_preview_manager('combined_style', array(
            '#awesomesauce_snow_color',
            '#awesomesauce_snow_color'
        ), '.snow', array(
            'box-shadow',
            '0 0 10px ',
            ', 0 0 10px ',
        ));
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
                        ) + $this->font['text-shadow-css'],
                    '.snow'              => array(
                        'position'      => 'absolute',
                        'width'         => '10px',
                        'height'        => '10px',
                        'background'    => $this->snow_color,
                        'border-radius' => '50%',
                        'box-shadow'    => '0 0 10px ' . $this->snow_color . ', 0 0 10px ' . $this->snow_color,
                    ),
                )
            ),
            'animations'            => array()
        );

        //200 = number of snowflakes
        for ($i = 1; $i <= 200; $i++) {
            $random_x          = wp_rand(0, 1000000) * 0.0001;
            $random_offset     = $this->random_range(-100000, 100000) * 0.0001;
            $random_x_end      = $random_x + $random_offset;
            $random_x_end_yoyo = $random_x + ($random_offset / 2);
            $random_yoyo_time  = $this->random_range(30000, 80000) / 100000;
            $random_yoyo_y     = $random_yoyo_time * 100;
            $random_scale      = wp_rand(0, 10000) * 0.0001;
            $fall_duration     = $this->random_range(10, 30) . 's';
            $fall_delay        = '-' . wp_rand(0, 30) . 's';

            $css['desktop']['.awesomesauce_wrapper'][] = array(
                '.snow:nth-child(' . $i . ')' => array(
                        'opacity'   => wp_rand(0, 10000) * 0.0001,
                        'transform' => 'scale(' . $random_scale . ')',
                        'left'      => $random_x . '%',
                        'top'       => '-10px'
                    ) + $this->animation_css('fall-' . $i . ' ' . $fall_duration . ' ' . $fall_delay . ' linear infinite')
            );

            $css['animations']['fall-' . $i] = array(
                $this->percentage($random_yoyo_time) => array(
                    'transform' => 'scale(' . $random_scale . ')',
                    'left'      => $random_x_end . '%',
                    'top'       => $random_yoyo_y . '%',
                ),
                'to'                                 => array(
                    'transform' => 'scale(' . $random_scale . ')',
                    'left'      => $random_x_end_yoyo . '%',
                    'top'       => '100%'
                )
            );
        }

        return $css;
    }

    private function random_range($min, $max) {
        return $min + wp_rand(0, $max - $min);
    }

    private function percentage($value) {
        return round($value * 100, 3) . '%';
    }
}

//https://codepen.io/alphardex/pen/dyPorwJ