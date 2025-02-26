<?php
namespace PDP\Model;
use PDP\Helper\DefaultArgs;
use PDP\Services\TemplateWave;
use PDP\Services\PodcastTemplate;

class AnalogSystem{

    public static function html($id){
        $data  = DefaultArgs::parseArgs(self::getData($id));
        if($data['template']['skin'] == 'wave'){
            return TemplateWave::html($data);
        }else {
            return PodcastTemplate::html($data);
        }
    }

    public static function parseArgs($data){
        $default = DefaultArgs::get();
        $data['options'] = wp_parse_args( $data['options'], $default['options'] );
        $data['infos'] = wp_parse_args( $data['infos'], $default['infos'] );
        $data['template'] = wp_parse_args( $data['template'], $default['template'] );

        return wp_parse_args( $data, $default );
    }

    public static function getData($id){
        $data = get_post_meta($id, 'pdp', true);
        // return [];
        $options = [
            'controls' => self::i($data, 'controls'),
            'tooltips' => [
                'controls' => true,
                'seek' => true
            ],
            'loop' => [
                'active' => self::i($data, 'loop') 
            ]

        ];

        $infos = [
            'share' => (boolean)self::i($data, 'share', '', true),
            'shares' => self::i($data, 'shares', '', ['facebook', 'twitter', 'linkedin', 'pinterest', 'stumbleupon', 'whatsapp', 'email']),
            'showCount' => (boolean)self::i($data, 'showCount', '', false),
            'showLabel' => (boolean)self::i($data, 'showLabel', '', false),
            'skin' => self::i($data, 'skin', '', 'default'),
            'podcast' => self::i($data, 'items', '0', ['audio' => '', 'poster' => '', 'title' => '']),
            'waveColor' => self::i($data, 'waveColor', '', '#777'),
            'progressColor' => self::i($data, 'progressColor', '', '#4527A4'),
        ];

        $infos['podcast']['podcastName'] = self::i($data, 'podcastName', '', false);

        $template = array(
            'theme' => self::i($data, 'theme', '', 'light'),
            'podcasts' => self::i($data, 'items', '', []),
            'classes' => 'pdp_initializer',
            'featureImage' => (boolean)self::i($data, 'featureImage', '', true),
            'skin' => self::i($data, 'skin', '', 'default'),
            'theme' => self::i($data, 'theme', '', 'light'),
            'width' => self::i($data, 'width', '', false) == false ? '100%' : self::i($data, 'width', '', false).'px',
        );

        $result = [
            'options' => $options,
            'infos' => $infos,
            'template' => $template
        ];

        return $result;
    }

    public static function get_post_meta($id, $key, $default = false){
        if (metadata_exists('post', $id, $key)) {
            $value = get_post_meta($id, $key, true);
            if ($value != '') {
                return $value;
            } else {
                return $default;
            }
        } else {
            return $default;
        }
    }

    public static function GPM($id, $key, $default = false, $true = false){
        $meta = metadata_exists( 'post', $id, 'h5vp_playlist_options' ) ? get_post_meta($id, 'h5vp_playlist_options', true) : '';
        if(isset($meta[$key]) && $meta != ''){
            if($true == true){
                if($meta[$key] == '1'){
                    return true;
                }else if($meta[$key] == '0'){
                    return false;
                }
            }else {
                return $meta[$key];
            }
            
        }

        return $default;
    }

    private static function get_videos($id, $key, $default = null, $true = false){
        $meta = metadata_exists( 'post', $id, 'h5vp_playlist' ) ? get_post_meta( $id, 'h5vp_playlist', true ) : '';
        if(isset($meta[$key]) && $meta[$key] != '' && $true == true){
            return true;
        }elseif(isset($meta[$key]) && $meta[$key] != '') {
            return $meta[$key];
        }else {
            return $default;
        }
    }

    public static function getQuickPlayerData(){
        
    }

    public static function i($array, $key1, $key2 = '', $default = false){
        if(isset($array[$key1][$key2])){
            return $array[$key1][$key2];
        }else if (isset($array[$key1])){
            return $array[$key1];
        }
        return $default;
    }
}