<?php
/*
Plugin Name: Fm latest tweets widget
Plugin URI: http://www.freewebmentor.com
Description: This plugin is used for showing latest tweets in widget's sidebar.
Version: 1.1
Author: Prem Chandra Tiwari
Author URI: http://www.freewebmentor.com
License: GPL2
*/

$theme->options['widgets_options']['fmtweets'] =  isset($theme->options['widgets_options']['fmtweets'])
    ? array_merge($Fm_tweets_defaults, $theme->options['widgets_options']['fmtweets'])
    : $Fm_tweets_defaults;
        
add_action('widgets_init', create_function('', 'return register_widget("FmLatesttweets");'));

class FmLatesttweets extends WP_Widget 
{
    function __construct() 
    {
        $widget_options = array('description' => __('A widget for showing latest tweets in sidebar.', 'themater') );
        $control_options = array( 'width' => 440);
		$this->WP_Widget('themater_tweets', '&raquo; Fm latest tweets', $widget_options, $control_options);
    }

    function widget($args, $instance)
    {
        global $wpdb, $theme;
        extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
        $username = $instance['username'];
        $widgetId = $instance['widgetId'];
        $width = $instance['width'];
        $height = $instance['height'];                
        ?>
        <ul class="widget-container">
            <li class="fmtweets-widget">
        <?php if ( $title ) { ?> 
        <h3 class="widgettitle"><?php echo $title; ?></h3> <?php }  ?>
        <a class="twitter-timeline"  width="<?php echo $width; ?>" height="<?php echo $height; ?>" data-dnt="true" href="https://twitter.com/<?php echo $username; ?>" data-widget-id="<?php echo $widgetId; ?>">Tweets by @<?php echo $username; ?></a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                     
            </li>
        </ul>
     <?php
    }
 function update($new_instance, $old_instance) 
    {		
    	$instance = $old_instance;
    	$instance['title'] = strip_tags($new_instance['title']);
        $instance['username'] = strip_tags($new_instance['username']);
        $instance['widgetId'] = strip_tags($new_instance['widgetId']);
        $instance['width'] = strip_tags($new_instance['width']);
        $instance['height'] = strip_tags($new_instance['height']);        
        return $instance;
    }
    
    function form($instance) 
    {	
        global $theme;
		$instance = wp_parse_args( (array) $instance, $theme->options['widgets_options']['fmtweets'] );        
        ?>
        
            <div class="fm-widget">
                <table width="100%">
                    <tr>
                        <td class="fm-widget-label" width="30%"><label for="<?php echo $this->get_field_id('title'); ?>">Title:</label></td>
                        <td class="fm-widget-content" width="70%"><input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" /></td>
                    </tr>
                    
                    <tr>
                        <td class="fm-widget-label"><label for="<?php echo $this->get_field_id('username'); ?>">Twiter username:</label></td>
                        <td class="fm-widget-content"><input class="widefat" id="<?php echo $this->get_field_id('username'); ?>" name="<?php echo $this->get_field_name('username'); ?>" type="text" value="<?php echo esc_attr($instance['username']); ?>" /></td>
                    </tr>

                    <tr>
                        <td class="fm-widget-label">&nbsp;</td>
                        <td class="fm-widget-content">
                            <a href="https://twitter.com/settings/widgets/new" target="_blank">Create Widget Id</a>
                        </td>
                    </tr>

                    <tr>
                        <td class="fm-widget-label"><label for="<?php echo $this->get_field_id('widgetId'); ?>">Your Widget Id:</label></td>
                        <td class="fm-widget-content"><input class="widefat" id="<?php echo $this->get_field_id('widgetId'); ?>" name="<?php echo $this->get_field_name('widgetId'); ?>" type="text" value="<?php echo esc_attr($instance['widgetId']); ?>" /></td>
                    </tr>
                    
                    <tr>
                        <td class="fm-widget-label">Sizes:</td>
                        <td class="fm-widget-content">
                            Width: <input type="text" style="width: 50px;" name="<?php echo $this->get_field_name('width'); ?>" value="<?php echo esc_attr($instance['width']); ?>" /> px. &nbsp; &nbsp;
                            Height: <input type="text" style="width: 50px;" name="<?php echo $this->get_field_name('height'); ?>" value="<?php echo esc_attr($instance['height']); ?>" /> px.
                        </td>
                    </tr>   
                    <tr>
                        <td class="fm-widget-content">
                            <br/>
                        </td>
                </tr>                
                </table>
            </div>
            
        <?php 
    }
} 
?>