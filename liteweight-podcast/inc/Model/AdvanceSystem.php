<?php
namespace PDP\Model;
use PDP\Model\Block;
use PDP\Helper\DefaultArgs;
use PDP\Services\PodcastTemplate;

class AdvanceSystem{

    public static function html($id){
        $blocks =  Block::getBlock($id);
        $output = '';
        if(is_array($blocks)){
            foreach($blocks as $block){
                if(isset($block['attrs'])){
                    $output .= render_block($block);
                }else {
                    $data = DefaultArgs::parseArgs(self::getData($block));
                    $output .= PodcastTemplate::html($data);
                }
            }
        }
        return $output;
    }

    public static function getData($block){
        
        $options = [
            'controls' => self::parseControls(self::i($block, 'controls')),
            'tooltips' => [
                'controls' => true,
                'seek' => true
            ],
            'loop' => [
                'active' => self::i($block, 'loop') 
            ]

        ];

        $infos = [
            'share' => self::i($block, 'share', '', true),
            'shares' => self::i($block, 'shares', '', ['facebook', 'twitter', 'linkedin', 'pinterest', 'stumbleupon', 'whatsapp', 'email']),
            'showCount' => self::i($block, 'showCount', '', false),
            'showLabel' => self::i($block, 'showLabel', '', false)
        ];

        $template = array(
            'theme' => self::i($block, 'theme', '', 'light'),
            'podcasts' => self::i($block, 'podcasts', '', []),
            'classes' => 'pdp_initializer',
            'featureImage' => self::i($block, 'featureImage', '', true)
        );

        $result = [
            'options' => $options,
            'infos' => $infos,
            'template' => $template
        ];

        return $result;
    }

    public static function i($array, $key1, $key2 = '', $default = false){
        if(isset($array[$key1][$key2])){
            return $array[$key1][$key2];
        }else if (isset($array[$key1])){
            return $array[$key1];
        }
        return $default;
    }



    public static function parseControls($controls){
        $newControls = [];
        if(!is_array($controls)){
            return ['play','progress', 'current-time', 'mute', 'volume', 'settings', 'download'];
        }
        foreach($controls as $key => $value){
            if($value == 1){
                array_push($newControls, $key);
            }
        }
        return $newControls;
    }
}