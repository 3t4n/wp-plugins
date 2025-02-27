<?php

namespace managerForIcomoon ;

use Exception;

class Options {
    static public $plugin_options = false ;
    static public $plugin_options_default = array(
        'shortcode' => 'icomoon',
        'minify_css' => 'no',
        'class_prefix' => 'icon-',
        'class_postfix' => '',
        'css_selector' => 'span',
        'css_class' => 'icon',
        'gutenberg_button_html' => 'yes',
        'gutenberg_button_shortcode' => 'yes'
    );

    static public function init(){
        self::$plugin_options = get_option('managerforicomoon_options');
        if(is_string(self::$plugin_options)) {
            self::$plugin_options = unserialize(self::$plugin_options);
        }
    }

    static public function get($option){
        if(isset(self::$plugin_options[$option])){
            return self::$plugin_options[$option] ;
        } elseif(isset(self::$plugin_options_default[$option])){
            return self::$plugin_options_default[$option] ;
        }
        return false ;
    }

    static public function set($option, $value, $check=false){
        if($check==false){
            self::$plugin_options[$option] = $value ;
        }
        if($check=='integer'){
            self::$plugin_options[$option] = intval($value) ;
        }    
    }

    static public function list(){
        echo '<pre>';
        var_dump(self::$plugin_options);
        echo '</pre>';
    }

    static public function update(){
        update_option('managerforicomoon_options', self::$plugin_options);
    }

    static public function updateFromSelectionJson(){
        $json_file = file_get_contents(Core::getIcomoonPath().'selection.json');
        $json_content = json_decode($json_file, true);
        $pref = $json_content['preferences']['fontPref'];

        ob_start();

        if(isset($pref['prefix'])){
            self::set('class_prefix',$pref['prefix']);
        } else {
            self::set('class_prefix',false);
        }

        if(isset($pref['postfix'])){
            self::set('class_postfix',$pref['postfix']);
        } else {
            self::set('class_postfix',false);
        }

        if(isset($pref['selector'])){
            if($pref['selector'] == 'class'){
                self::set('css_selector','class');
                self::set('css_class', str_replace('.','',$pref['classSelector']));
            } else {
                self::set('css_selector',$pref['selector']); 
            }
        } else {
            self::set('css_selector','span');
        }

        self::update();
    }
}