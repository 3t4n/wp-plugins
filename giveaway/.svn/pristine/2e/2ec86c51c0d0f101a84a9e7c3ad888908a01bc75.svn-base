<?php

/*
  Plugin Name: Giveaway
  Plugin URI: http://www.satollo.net/plugins/giveaway
  Description: Build simple giveaways using comments to a post and extracting the winner from them
  Version: 1.2.2
  Author: Stefano Lissa
  Author URI: http://www.satollo.net
 */

class Giveaway {

    static $instance;
    var $options = null;

    function __construct() {
        Giveaway::$instance = $this;

        add_action('comment_post', array($this, 'hook_comment_post'), 10, 2);
    }

    function log($text, $level) {
        if ($this->get_option('log') < $level) {
            return;
        }

        $time = date('d-m-Y H:i:s ');
        switch ($level) {
            case 1: $time .= '- ERROR - ';
                break;
            case 2: $time .= '- INFO  - ';
                break;
            case 3: $time .= '- DEBUG - ';
                break;
        }
        if (is_array($text) || is_object($text)) {
            $text = print_r($text, true);
        }
        @file_put_contents(WP_CONTENT_DIR . '/logs/giweaway.txt', $time . ' - ' . $text . "\n", FILE_APPEND | FILE_TEXT);
    }

    function log_error($text) {
        $this->log($text, 1);
    }

    function log_info($text) {
        $this->log($text, 2);
    }

    function log_debug($text) {
        $this->log($text, 3);
    }

    function get_default_options() {
        $sitename = strtolower($_SERVER['SERVER_NAME']);
        if (substr($sitename, 0, 4) == 'www.') {
            $sitename = substr($sitename, 4);
        }
        return array('log' => 0, 'tag' => 'giveaway', 'sender_name' => get_option('blogname'), 'sender_email' => 'giveaway@' . $sitename);
    }

    function get_options() {
        if ($this->options == null) {
            $this->options = get_option('giveaway', array());
        }
        return $this->options;
    }

    function set_options($options) {
        update_option('giveaway', $options);
        $this->options = $options;
    }

    function get_option($name, $default = null) {
        if ($this->options == null) {
            $this->options = get_option('giveaway', array());
        }
        if (isset($this->options[$name])) {
            return $this->options[$name];
        }
        return $default;
    }

    function hook_comment_post($comment_id, $status) {
        if ($status === 1) {
            $comment = get_comment($comment_id);
            if ($comment->comment_parent != 0) {
                return;
            }
            if (!has_tag($this->get_option('tag'), $comment->comment_post_ID)) {
                return;
            }
            $this->mail($comment->comment_author_email, $this->replace($this->get_option('thankyou_email_subject'), $comment), $this->replace($this->get_option('thankyou_email_body'), $comment));
        }
    }

    function replace($text, $comment) {
        $text = str_replace('{post_link}', get_permalink($comment->comment_post_ID), $text);
        $text = str_replace('{comment_link}', get_comment_link($comment->comment_ID), $text);
        $text = str_replace('{name}', $comment->comment_author, $text);
        $text = str_replace('{email}', $comment->comment_author_email, $text);
        return $text;
    }

    function mail($to, $subject, $body, $headers = '') {
        if (empty($subject)) {
            return;
        }
        $headers .= "MIME-Version: 1.0\n";
        $headers .= "Content-Type: text/plain;charset=UTF-8\n";
        $headers .= "From: " . $this->get_option('sender_name') . " <" . $this->get_option('sender_email') . ">\n";

        wp_mail($to, $subject, $body, $headers);
    }

}

new Giveaway();

if (is_admin()) {
    include dirname(__FILE__) . '/admin.php';
}
