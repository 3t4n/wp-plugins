<?php
/*
Plugin Name:1g-music-fav
Plugin URI: http://blog.1g1g.info/wp-plugin/
Description: This plugin gives you a widget that you can share your 1g1g.com music fav data to your visitor. 这个插件提供了一个小工具，您可以用它来向您的访客展现您在亦歌的音乐收藏数据。
Version: 1.1
Author: Ye Xiaoxing
Author URI: http://blog.1g1g.info/
*/
class Fav1g_Widget extends WP_Widget {
    /** 构造函数 */
    function Fav1g_Widget() {        
  $widget_ops = array(   
   'description' => '显示您的亦歌收藏数据的Widget,拖动到右侧侧边栏即可使用'
  );
        parent::WP_Widget('Fav1g', $name = '亦歌收藏栏',$widget_ops); 
    }
    function widget($args, $instance) {
    extract($args);   
          	if (function_exists('curl_init')){
            $ch=curl_init();
            curl_setopt($ch, CURLOPT_URL, "http://1gwp.sinaapp.com/widget.php?user=".$instance['user']);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_USERAGENT, '1gmusicfav-widget');
            $content=curl_exec($ch);
            curl_close($ch);
        } 
    $my_Weather_content = $content;
    echo $before_widget.$before_title.$after_title.$my_Weather_content.$after_widget;
}
    function update($new_instance, $old_instance) {    
        return $new_instance;
    }
    function form($instance) {
        $user = esc_attr($instance['user']);
        $show = esc_attr($instance['show']);
        ?>
            <p><label for="<?php echo $this->get_field_id('user'); ?>">亦歌用户名<input class="widefat" id="<?php echo $this->get_field_id('user'); ?>" name="<?php echo $this->get_field_name('user'); ?>" type="text" value="<?php echo $user; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('show'); ?>">收藏显示条数<input class="widefat" id="<?php echo $this->get_field_id('show'); ?>" name="<?php echo $this->get_field_name('show'); ?>" type="text" value="<?php echo $show; ?>" /></label></p>
        <?php 
    }
 
}
add_action('widgets_init', create_function('', 'return register_widget("Fav1g_Widget");'));
