<?php
/*
  Plugin Name: Arrueba
  Description: Plugin que converte @name em links para o Twitter.
  Author: Lenon Marcel
  Version: 0.3
  Author URI: http://lenonmarcel.com.br/
*/

class Arrueba{
    static function Add_actions(){
        $callback = array('Arrueba', 'Content_search_and_replace');

        $in = get_option('arrueba_replace_in');

        if($in == 0 OR $in == 1) add_action('the_content', $callback);
        if($in == 0 OR $in == 2) add_action('comment_text', $callback);

        add_action('admin_menu', array('Arrueba', 'Menu'));
    }
    static function Content_search_and_replace($content){
        $target = get_option('arrueba_target');
        $pattern = '/(?!(?:[^<\[]+[>\]]|[^>\]]+<\/a>))(^|[^a-z0-9_])@([a-z0-9_]+)/i';
        $replace = ($target == 0) ? '$1<a href="http://twitter.com/$2" target="_blank">@$2</a>' : '$1<a href="http://twitter.com/$2">@$2</a>';
        $content = preg_replace($pattern,$replace,$content);
        return $content;
    }
    static function Menu(){
        add_options_page('Arrueba', 'Opções do Arrueba', 10, 'arrueba-page-options', array('Arrueba','Options_page'));
    }
    static function Options_page(){
        include 'admin.tpl.php';
    }
    static function Activation(){
        add_option('arrueba_replace_in',0);
        add_option('arrueba_target',0);
    }
}
register_activation_hook(__FILE__,array('Arrueba','Activation'));
Arrueba::Add_actions();
?>