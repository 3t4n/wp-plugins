<?php
namespace PDP\Helper;

class DefaultArgs{

    public static function parseArgs($data){
        $default = self::get();
        $data = wp_parse_args( $data, $default );
        $data['options'] = wp_parse_args( $data['options'], $default['options'] );
        $data['infos'] = wp_parse_args( $data['infos'], $default['infos'] );
        $data['template'] = wp_parse_args( $data['template'], $default['template'] );

		return $data;
    }

    public static function get(){
        $options = [
            'controls' => ['play', 'progress', 'current-time', 'mute', 'volume', 'download', 'settings'],
            'tooltips' => [
                'controls' => true,
                'seek' => true
            ],
            'loop' => [
                'active' => false 
            ]

        ];

        $infos = [
            'share' => true,
            'shares' => ['facebook', 'twitter', 'linkedin', 'pinterest', 'stumbleupon', 'whatsapp', 'email'],
            'showCount' => false,
            'showLabel' => false,
            'skin' => 'default'
        ];

        $template = array(
            'theme' => 'light',
            'podcasts' => [],
            'classes' => 'pdp_initializer',
            'featureImage' => '',
            'skin' => 'default',
            'theme' => 'light',
            'width' => '100%'
        );

        $default = [
            'options' => $options,
            'infos' => $infos,
            'template' => $template,
        ];
        return $default;
    }

    public static function brandColor(){
        $brandColor = get_option('h5vp_option', ['h5vp_player_primary_color' => '#1ABAFF' ]);
        if(isset($brandColor['h5vp_player_primary_color']) && !empty($brandColor['h5vp_player_primary_color'])){
            return $brandColor['h5vp_player_primary_color'];
        }else {
            return '#1ABAFF';
        }
    }
}