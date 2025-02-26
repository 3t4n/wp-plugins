<?php

/*
Plugin Name: AntiSpam Simple
Plugin URI: http://www.sooource.net/wordpress-antispam-simple
Description: Добавляет простой антиспам-фильтр в виде галочки "Я не спамер"./Adds a simple anti-spam filter in the form of a tick "I'm not a spammer"
Version: 1.0.0
Author: Alexei91
Author URI: http://www.wordpreso.ru
*/ 

function antispam1_checkbox($id) {
  if (!is_user_logged_in()) :
    print '<input style="width:auto;" type="checkbox" name="nospam" value="1">' . __("I'm not a spammer", 'antispam-simple') . "\n" . '<span style="border:0;color:#f00;float:left;width:50% !important;margin:-100% 0 0 0;overflow:hidden;line-height:0;padding:0;font-size:11px;">This plugin created by <a href="http://www.wordpreso.ru" title="Темы для WordPress">Alexei91</a></span>';
  endif;
}

function antispam1_result($id) {
  if (!is_user_logged_in()) :
    if (!$_POST['nospam']) :
      $updated_status = 'trash';
      wp_set_comment_status($id, $updated_status);
      wp_die( __('You are trying to leave the spam message!', 'antispam-simple') );
    endif;
  endif;
}

add_action('comment_form', 'antispam1_checkbox');
add_action('comment_post', 'antispam1_result');

//localization
load_plugin_textdomain( 'antispam-simple', false, '/'.basename(dirname(__FILE__)).'/languages' );

?>
