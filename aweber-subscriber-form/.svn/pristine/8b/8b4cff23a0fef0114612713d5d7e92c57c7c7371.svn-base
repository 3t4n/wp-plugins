<?php
/*
Plugin Name: Aweber Subscriber Form
Plugin URI: https://wordpress.org/plugins/aweber-subscriber-form/
Description: This plugin allows you to add a aweber Email Subscription form widget on your sidebars of wordpress websites and blogs.
Version: 1.0.0
Author: Prem Chandra Tiwari
Author URI: http://www.freewebmentor.com
License: GPL2
*/

$theme->options['widgets_options']['aweberForm'] =  isset($theme->options['widgets_options']['aweberForm'])
    ? array_merge($Fm_tweets_defaults, $theme->options['widgets_options']['aweberForm'])
    : $Fm_tweets_defaults;
        
add_action('widgets_init', create_function('', 'return register_widget("AweberSubscriberForm");'));

class AweberSubscriberForm extends WP_Widget 
{
    function __construct() 
    {
        $widget_options = array('description' => __('A widget for display aweber email subscribe form in sidebar.', 'themater') );
        $control_options = array( 'width' => 440);
        $this->WP_Widget('themater_aweber', '&raquo; Aweber Subscriber Form', $widget_options, $control_options);
    }

    function widget($args, $instance)
    {
        global $wpdb, $theme;
        extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
        $unique_id = apply_filters('widget_unique_id', $instance['unique_id']);
        ?>
        <ul class="widget-container">
            <li class="aweber-widget">
        <?php if ( $title ) { ?> 
        <h3 class="widgettitle"><?php echo $title; ?></h3> <?php }  ?>
        <link rel='stylesheet' id='aweber'  href='<?php echo plugins_url("aweber-subscriber-form/awe-style.css"); ?>' type='text/css' media='all' />    
    <form action="http://www.aweber.com/scripts/addlead.pl" method="post"> 
        <input type="hidden" name="listname" value="<?php echo $unique_id; ?>"> 
        <input type="hidden" name="meta_adtracking" value=""> 
        <input type="hidden" name="meta_message" value="1"> 
        <input type="hidden" name="meta_required" value="from"> 
        <input type="hidden" name="meta_forward_vars" value="0"> 
        <table> 
        <tr> 
        <td><input class="name" type="text" name="name" value="Enter Your Name" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"></td> 
        </tr> 
        <tr> 
        <td><input class="email" type="email" name="from" value="Enter Your Email" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" required></td> 
        </tr> 
        <tr> 
        <td align="center" colspan="2"><input name="submit" value="Subscribe" type="submit" /></td> 
        </tr> 
        </table> 
    </form> 
            </li>
        </ul>
     <?php
    }
 function update($new_instance, $old_instance) 
    {       
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);       
        $instance['unique_id'] = strip_tags($new_instance['unique_id']);        
        return $instance;
    }
    
    function form($instance) 
    {   
        global $theme;
        $instance = wp_parse_args( (array) $instance, $theme->options['widgets_options']['aweberForm'] );        
        ?>
        
            <div class="widget">
                <table width="100%">
                    <tr><td class="widget-content"><br/></td></tr>
                    <tr>
                        <td class="widget-label" width="30%"><label for="<?php echo $this->get_field_id('title'); ?>">Widget Title</label></td>
                        <td class="widget-content" width="70%">
                            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
                        </td>
                    </tr>
                        <tr><td class="widget-content"><br/></td></tr>              
                    <tr>
                        <td class="widget-label"><label for="<?php echo $this->get_field_id('unique_id'); ?>">Your Unique List Id:</label></td>
                        <td class="widget-content">
                            <input class="widefat" id="<?php echo $this->get_field_id('unique_id'); ?>" name="<?php echo $this->get_field_name('unique_id'); ?>" type="text" value="<?php echo esc_attr($instance['unique_id']); ?>" />
                        </td>                        
                    </tr>

                    <tr>
                        <td class="widget-label">&nbsp;</td>
                        <td class="widget-content">
                            <a href="http://www.aweber.com/" target="_blank">Create Your Unique List Id</a>
                        </td>
                    </tr>
                    <tr><td class="widget-content"><br/></td></tr>               
                </table>
            </div>
            
        <?php 
    }
} 
?>