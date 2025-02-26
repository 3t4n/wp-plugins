<?php
/*
Plugin Name: Follow us on widget
Plugin URI: http://vijayakumar.org/web-development/easy-follow-us-on-wordpress-widget-plugin/
Description: Follow us on widget helps to share the Social Media buttons as widget
Author: Vijayakumar S
Version: 1.3
Author URI: http://vijayakumar.org/
*/

class FollowusonWidget extends WP_Widget
{
    function FollowusonWidget()
    {
        $widget_ops = array('classname' => 'FollowusonWidget', 'description' => 'Displays a Follow us on buttons' );
        $this->WP_Widget('FollowusonWidget', 'Follow us on Widget', $widget_ops);
    }

    function form($instance)
    {
        $instance = wp_parse_args( (array) $instance, array( 'title' => 'Follow us on' ) );
        $title = $instance['title'];
        $fbwidget = $instance['fbwidget'];
        $twitterwidget = $instance['twitterwidget'];
        $flickrwidget = $instance['flickrwidget'];
        $linkedinwidget = $instance['linkedinwidget'];
        $youtubewidget = $instance['youtubewidget'];
        $GooglePluswidget = $instance['GooglePluswidget'];
        $Pinterestwidget = $instance['Pinterestwidget'];
        $Rsswidget = $instance['Rsswidget'];
        $xingwidget = $instance['xingwidget'];
        $instagram = $instance['instagram'];
        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Title:
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('fbwidget'); ?>">Facebook URL:
                <input class="widefat" id="<?php echo $this->get_field_id('fbwidget'); ?>" name="<?php echo $this->get_field_name('fbwidget'); ?>" type="text" value="<?php echo attribute_escape($fbwidget); ?>" />
            </label>
        <p>
            <label for="<?php echo $this->get_field_id('twitterwidget'); ?>">Twitter URL:
                <input class="widefat" id="<?php echo $this->get_field_id('twitterwidget'); ?>" name="<?php echo $this->get_field_name('twitterwidget'); ?>" type="text" value="<?php echo attribute_escape($twitterwidget); ?>" />
            </label>
        <p>
            <label for="<?php echo $this->get_field_id('flickrwidget'); ?>">Flickr URL:
                <input class="widefat" id="<?php echo $this->get_field_id('flickrwidget'); ?>" name="<?php echo $this->get_field_name('flickrwidget'); ?>" type="text" value="<?php echo attribute_escape($flickrwidget); ?>" />
            </label>
        <p>
            <label for="<?php echo $this->get_field_id('linkedinwidget'); ?>">Linkedin URL:
                <input class="widefat" id="<?php echo $this->get_field_id('linkedinwidget'); ?>" name="<?php echo $this->get_field_name('linkedinwidget'); ?>" type="text" value="<?php echo attribute_escape($linkedinwidget); ?>" />
            </label>
        <p>
        <p>
            <label for="<?php echo $this->get_field_id('youtubewidget'); ?>">Youtube URL:
                <input class="widefat" id="<?php echo $this->get_field_id('youtubewidget'); ?>" name="<?php echo $this->get_field_name('youtubewidget'); ?>" type="text" value="<?php echo attribute_escape($youtubewidget); ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('GooglePluswidget'); ?>">Google+ URL:
                <input class="widefat" id="<?php echo $this->get_field_id('GooglePluswidget'); ?>" name="<?php echo $this->get_field_name('GooglePluswidget'); ?>" type="text" value="<?php echo attribute_escape($GooglePluswidget); ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('Pinterestwidget'); ?>">Pinterest URL:
                <input class="widefat" id="<?php echo $this->get_field_id('Pinterestwidget'); ?>" name="<?php echo $this->get_field_name('Pinterestwidget'); ?>" type="text" value="<?php echo attribute_escape($Pinterestwidget); ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('Rsswidget'); ?>">Rss URL:
                <input class="widefat" id="<?php echo $this->get_field_id('Rsswidget'); ?>" name="<?php echo $this->get_field_name('Rsswidget'); ?>" type="text" value="<?php echo attribute_escape($Rsswidget); ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('xingwidget'); ?>">Xing URL:
                <input class="widefat" id="<?php echo $this->get_field_id('xingwidget'); ?>" name="<?php echo $this->get_field_name('xingwidget'); ?>" type="text" value="<?php echo attribute_escape($xingwidget); ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('instagram'); ?>">Instagram:
                <input class="widefat" id="<?php echo $this->get_field_id('instagram'); ?>" name="<?php echo $this->get_field_name('instagram'); ?>" type="text" value="<?php echo attribute_escape($instagram); ?>" />
            </label>
        </p>
        <small>Plugin by <a href="http://vijayakumar.org/" target="_blank">Vijayakumar S, Wordpress Developer</a></small>
        <?php
    }

    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];
        $instance['fbwidget'] = $new_instance['fbwidget'];
        $instance['twitterwidget'] = $new_instance['twitterwidget'];
        $instance['flickrwidget'] = $new_instance['flickrwidget'];
        $instance['linkedinwidget'] = $new_instance['linkedinwidget'];
        $instance['youtubewidget'] = $new_instance['youtubewidget'];
        $instance['GooglePluswidget'] = $new_instance['GooglePluswidget'];
        $instance['Pinterestwidget'] = $new_instance['Pinterestwidget'];
        $instance['Rsswidget'] = $new_instance['Rsswidget'];
        $instance['xingwidget'] = $new_instance['xingwidget'];
        $instance['instagram'] = $new_instance['instagram'];
        return $instance;
    }

    function widget($args, $instance)
    {
        extract($args, EXTR_SKIP);

        echo $before_widget;
        $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
        if (!empty($title))
            echo $before_title . $title . $after_title;
        $arraysplit = explode("/",plugin_basename(__FILE__));
        echo "<ul class='wpFUP'>";
        if($instance['fbwidget'] != '') echo "<li><a href='$instance[fbwidget]' target='_blank'><img alt='Facebook' src='".plugins_url()."/".$arraysplit[0]."/images/facebook.png' /></a></li>";
        if($instance['twitterwidget'] != '') echo "<li><a href='$instance[twitterwidget]' target='_blank'><img alt='Twitter' src='".plugins_url()."/".$arraysplit[0]."/images/twitter.png' /></a></li>";
        if($instance['flickrwidget'] != '') echo "<li><a href='$instance[flickrwidget]' target='_blank'><img alt='Flickr' src='".plugins_url()."/".$arraysplit[0]."/images/flickr.png' /></a></li>";
        if($instance['linkedinwidget'] != '') echo "<li><a href='$instance[linkedinwidget]' target='_blank'><img alt='Linkedin' src='".plugins_url()."/".$arraysplit[0]."/images/linkedin.png' /></a></li>";
        if($instance['youtubewidget'] != '') echo "<li><a href='$instance[youtubewidget]' target='_blank'><img alt='Youtube' src='".plugins_url()."/".$arraysplit[0]."/images/youtube.png' /></a></li>";
        if($instance['GooglePluswidget'] != '') echo "<li><a href='$instance[GooglePluswidget]' target='_blank'><img alt='Youtube' src='".plugins_url()."/".$arraysplit[0]."/images/google_plus.png' /></a></li>";
        if($instance['Pinterestwidget'] != '') echo "<li><a href='$instance[Pinterestwidget]' target='_blank'><img alt='Youtube' src='".plugins_url()."/".$arraysplit[0]."/images/pinterest.png' /></a></li>";
        if($instance['Rsswidget'] != '') echo "<li><a href='$instance[Rsswidget]' target='_blank'><img alt='RSS' src='".plugins_url()."/".$arraysplit[0]."/images/rss.png' /></a></li>";
        if($instance['xingwidget'] != '') echo "<li><a href='$instance[xingwidget]' target='_blank'><img alt='RSS' src='".plugins_url()."/".$arraysplit[0]."/images/xing.png' /></a></li>";
        if($instance['instagram'] != '') echo "<li><a href='$instance[instagram]' target='_blank'><img alt='RSS' src='".plugins_url()."/".$arraysplit[0]."/images/instagram.png' /></a></li>";
        echo "</ul>";
        echo $after_widget;
    }
}
add_action( 'widgets_init', create_function('', 'return register_widget("FollowusonWidget");') );
add_action( 'wp_enqueue_scripts', 'Follow_us_stylesheet' );
function Follow_us_stylesheet() {
    wp_register_style( 'prefix-style', plugins_url('css/FollowusWidget.css', __FILE__) );
    wp_enqueue_style( 'prefix-style' );
}
?>
