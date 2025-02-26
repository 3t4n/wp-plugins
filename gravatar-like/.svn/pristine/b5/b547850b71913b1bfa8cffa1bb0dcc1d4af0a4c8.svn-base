<?php

/*
  Plugin Name: Gravatar Like
  Plugin URI: http://www.moallemi.ir
  Description: Wordpress.com Like for self hosted wordpress sites
  Author: Reza Mooalemi
  Version: 0.1.0.1
  Author URI: http://www.moallemi.ir
 */

load_plugin_textdomain('gravatar-like', NULL, dirname(plugin_basename(__FILE__)) . "/languages");

function gravatar_like_get_options() {
    $options = array(
        'plugin_version' => '0.5',
        'avatar_size' => '32',
    );
    $save_options = get_option('gravatar_like_options');
    if (!empty($save_options)) {
        foreach ($save_options as $key => $option)
            $options[$key] = $option;
    }
    update_option('gravatar_like_options', $options);
    return $options;
}

add_filter('the_content', 'gravatar_like_post_form', 12);
wp_enqueue_script('jquery');
add_action('wp_ajax_gravatar_like_send', 'gravatar_like_send');
add_action('wp_ajax_nopriv_gravatar_like_send', 'gravatar_like_send');

function gravatar_like_post_form($content) {
    if (!is_single())
        return $content;

    $loading_img = plugins_url('loading.gif', __FILE__);
    $like_img = plugins_url('like.png', __FILE__);
    $style_file = plugins_url('style.css', __FILE__);


    $comment_author_email = (isset($_COOKIE['comment_author_email_' . COOKIEHASH])) ? trim($_COOKIE['comment_author_email_' . COOKIEHASH]) : __('Enter your email address', 'gravatar-like');

    $options = gravatar_like_get_options();

    global $post;
    $list = get_post_meta($post->ID, 'gravatar_likes_list', true);

    $count = 0;
    foreach ((array) $list as $email)
        if (is_email($email)) {
            $likes_list .= get_avatar($email, $options['avatar_size'], '', 'avatar');
            $count++;
        }

    $like_count = $count > 0 ? $count . __(' People Liked this', 'gravatar-like') : __('Be the first one who likes this post!', 'gravatar-like');

    $gravatar_like = "
        <style>
        @import '$style_file';    
        </style>
        ";
    $posts = $_COOKIE['gravatar_like'];
    $posts =  preg_split('/;/', $posts, -1, PREG_SPLIT_NO_EMPTY);
    if(!in_array($post->ID, $posts))
        $gravatar_like .= "
        <div id='gravatar-like-button-div' class='gravatar-like-clearfix'>
            <a id='gravatar-like-button'><span>" . __('Like', 'gravatar-like') . "</span></a> <span id='gllikeCount'>{$like_count}</span>
        <div id='gravatar-like-form' style='display: none;'>
            <input type='text' style='direction:ltr;' id='glMail' value='{$comment_author_email}'/>  
            <input type='button' name='glSend' id='glSend' value='" . __('Send', 'gravatar-like') . "'/> 
            <img src='{$loading_img}' alt='loading' style='display:none'/>
         </div> 
        </div>";
     else
         $gravatar_like .= "
        <div id='gravatar-like-button-div' class='gravatar-like-clearfix'>
            <img src='{$like_img}' /> <span>{$like_count}</span>
        </div>";
         
    $gravatar_like .= "
        <div id='gravatar-like-list'>
            {$likes_list}
         </div>
        <script type='text/javascript' language='javascript'>
            jQuery(function(){
                jQuery('#glSend').click(function(){
                    jQuery('#gravatar-like-error').remove();
                    jQuery('#gravatar-like-form').animate({width:280},'fast',function(){jQuery('#gravatar-like-form img').show();});

                    jQuery.ajax({
                        url:'" . get_bloginfo('wpurl') . "/wp-admin/admin-ajax.php',
                        type:'POST',
                        data:'action=gravatar_like_send&post_id={$post->ID}&email=' + jQuery('#glMail').val(),
                        success:function(results) {
                            jQuery('#gravatar-like-form img').hide();
                            jQuery('#gravatar-like-form').animate({width:280},'normal');

                            if(results.indexOf('<img') != -1)
                                jQuery('#gravatar-like-form').fadeOut();
                            jQuery('#gravatar-like-list').append(results);
                            jQuery('#gllikeCount').text(jQuery('#gravatar-like-list img').length + '".__(' People Liked this', 'gravatar-like')."' );
                           jQuery('#gravatar-like-button').unbind();    
                        }
                    });
                });

                jQuery('#gravatar-like-button').click(function(){
                    jQuery('#gravatar-like-form').toggle('fast');
                });

                jQuery('#glMail').focus(function(){
                   jQuery('#glMail').val('');
                });

                jQuery('#glMail').blur(function(){
                   if(jQuery('#glMail').val() == '')
                      jQuery('#glMail').val('" . __('Enter your email address', 'gravatar-like') . "');
                });
            });
       </script>";

    return $content . $gravatar_like;
}

function gravatar_like_send() {

    if (isset($_POST['post_id']) and isset($_POST['email'])) {

        $post_id = intval($_POST['post_id']);
        $email = strtolower($_POST['email']);

        if (is_email($email)) {
            $old_list = get_post_meta($post_id, 'gravatar_likes_list', true);
            if (!in_array($email, (array) $old_list)) {
						
							  $posts = $_COOKIE['gravatar_like'];
                $posts =  preg_split('/;/', $posts, -1, PREG_SPLIT_NO_EMPTY);
                $posts[] = $post_id;
                $posts = @implode(';', $posts);
                setcookie("gravatar_like", $posts, time()+ 3600 , COOKIEPATH, COOKIE_DOMAIN, false);
								
                $old_list[] = $email;
                update_post_meta($post_id, 'gravatar_likes_list', $old_list);
                echo get_avatar($email, 32, '', 'avatar');
                
            }
            else
                echo "<div id='gravatar-like-error'>" . __('You have liked this post before.', 'gravatar-like') . "</div>";
        }
        else
            echo "<div id='gravatar-like-error'>" . __('Invalid email address.', 'gravatar-like') . "</div>";
    }
    die();
}