<?php
/*  Copyright 2012  Mark Zamoyta  (email : mark@animatedchat.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
/*
Plugin Name: Animated Chat
Plugin URI: http://www.animatedchat.com/wordpressplugin.aspx
Description:  Animated Chat Rooms for your site!
Author: Mark Zamoyta
Version: 1.0
Author URI: http://www.animatedchat.com
*/

class AnimatedChatWidget extends WP_Widget
{
    function AnimatedChatWidget()
    {
        $widget_options = array(
            'classname'     =>      'animated-chat-widget',
            'description'   =>      'Animated Chat widget' );
        
        parent::WP_Widget('animated_chat_widget', 'Animated Chat Widget', $widget_options);
    }

    function widget($args, $instance)
    {
        extract($args, EXTR_SKIP);
        $title = ( $instance['title']) ? $instance['title'] : ' ';
        $body = ( $insance['body']) ? $instance['body'] : ' ';
        $roomID = ( $instance['roomID']) ? $instance['roomID'] : ' ';
        $showLink = ( $instance['showLink']) ? $instance['showLink'] : 0;

        ?>
        <?php echo $before_widget; ?>
        <?php echo $before_title . $title . $after_title ?>
        <p><?php echo $body ?></p>

        <iframe width="750" height="750" frameborder="0" scrolling="no" marginheight="0"
             marginwidth="0" allowtransparency="true" 
             src="http://animatedchat.com/chatroom.aspx?id=<?php echo $roomID ?>&showLink=<?php echo $showLink ?>">
        </iframe>

        <?php

        
    }


    function form($instance)
    {
        ?>

        <p>
            Please sign in at <a href="http://www.animatedchat.com">www.animatedchat.com</a> to create your chat room and 
            generate your Chat Room ID!
        </p>

        <label for="<?php echo $this->get_field_id('roomID');?>">
        Chat Room ID:
        
            <input id="<?php echo $this->get_field_id('roomID');?>"
                name="<?php echo $this->get_field_name('roomID');?>"
                value="<?php echo esc_attr($instance['roomID']); ?>" />
        </label>
        <br/>
        <br />
        <p>Check this box to include a link to www.animatedchat.com on 
            this widget so your users can sign up and get support.</p>
        <p>
		    <input id="<?php echo $this->get_field_id('showLink'); ?>" 
                   name="<?php echo $this->get_field_name('showLink'); ?>" 
                   type="checkbox" <?php if( $instance['showLink'] ) { echo "checked='checked'"; } ?> />
		    <label for="<?php echo $this->get_field_id('showLink'); ?>">Show link
            </label>
		</p>

        <?php
    
    }
}


function animatedChat_widget_init()
{
    register_widget("AnimatedChatWidget");
}

add_action('widgets_init', 'animatedChat_widget_init');

