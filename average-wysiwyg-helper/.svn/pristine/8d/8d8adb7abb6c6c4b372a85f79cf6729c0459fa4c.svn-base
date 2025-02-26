<?php
/*
    Plugin Name: Average WYSIWYG Helper
    Plugin URI:
    Description: Reveals the prominent HTML elements in the default WYSIWYG editor (TinyMCE) comprehensively, while maintaining edibility as well as any theme styles (in most cases). In effect, you have a WYSIWYG and a WYSIWYM (What You See Is What You Mean) combined. Can also cancel out certain default WordPress styling in the WYSIWYG such as the captions box/border.
    Version: 2.2.1
    Author: Average
    Author URI: http://profiles.wordpress.org/averagetechnology/
    @since 3.8
        ___
       /   |_   _____  _________ _____ ____
      / /| | | / / _ \/ ___/ __ `/ __ `/ _ \
     / ___ | |/ /  __/ /  / /_/ / /_/ /  __/
    /_/  |_|___/\___/_/   \__,_/\__, /\___/
                               /____/     ™
                               by Joe Rhoney
*/



/*
    W Y S I W Y G   H E L P E R   C L A S S
    =======================================
*/

if(!class_exists('avrgwysiwyg_class')) :
  define('avrgwysiwyg_ID', 'avrgwysiwyg');
  define('avrgwysiwyg_NICK', 'WYSIWYG Helper');
  class avrgwysiwyg_class
  {
    const VERSION = '2.2.1';
    public static function file_path($file)
    {
      return ABSPATH.'wp-content/plugins/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__)).$file;
    }
    public static function register()
    {
      register_setting(avrgwysiwyg_ID.'_options', 'wysiwym_display');
      register_setting(avrgwysiwyg_ID.'_options', 'cancel_mce_defaults');
    }
    public static function menu()
    {
      add_options_page(avrgwysiwyg_NICK.' Plugin Options', avrgwysiwyg_NICK, 'manage_options', avrgwysiwyg_ID.'_options', array('avrgwysiwyg_class', 'options_page'));
    }
    public static function options_page()
    {
      if (!current_user_can('manage_options'))
      {
        wp_die(__('You do not have sufficient permissions to access this page.'));
      }
      $avrgwysiwygID = avrgwysiwyg_ID;
      include(self::file_path('options.php'));
    }
    public static function css( $mce_css ) {
      $wysiwym_display = get_option('wysiwym_display');
      if ($wysiwym_display == 1) {
        if (!empty($mce_css)) $mce_css .= ',';
        $mce_css .= plugins_url( 'wysiwym.css', __FILE__ );
      }
      $cancel_mce_defaults = get_option('cancel_mce_defaults');
      if ($cancel_mce_defaults == 1) {
        if (!empty($mce_css)) $mce_css .= ',';
        $mce_css .= plugins_url( 'overrides.css', __FILE__ );
      }
      return $mce_css;
    }
    public function post_upgrade_nag() {
      if ( !current_user_can('install_plugins') ) return;
      $avrgwysiwyg_v = 'avrgwysiwyg_version';
      if(get_bloginfo('version') >= "4.0"){
        $avrg2aF = network_admin_url('plugin-install.php?tab=search&s=AddFunc+WYSIWYG+Helper');
        $avrgFavs = network_admin_url('plugin-install.php?tab=favorites&user=AddFunc');
        $avrgFavsTarg = '';
      }
      else {
        $avrg2aF = 'https://wordpress.org/plugins/addfunc-wysiwyg-helper/';
        $avrgFavs = 'http://profiles.wordpress.org/addfunc';
        $avrgFavsTarg = ' target="_blank"';
      }
      if ( get_site_option( $avrgwysiwyg_v ) == self::VERSION ) return;
      $msg = sprintf(__('AddFunc is the new Average. Switch to  <a href="%s"'.$avrgFavsTarg.'>AddFunc WYSIWYG Helper</a> to make your WYSIWYG Helper settings based on User preference rather than Administrator dictation. Also, try out <a href="%s"'.$avrgFavsTarg.'>our other plugins</a>!'),$avrg2aF,$avrgFavs);
      echo "<div class='update-nag'>$msg</div>";
      update_site_option( $avrgwysiwyg_v, self::VERSION );
    }
  }
  if (is_admin())
  {
    add_action('admin_init', array('avrgwysiwyg_class', 'register'));
    add_action('admin_menu', array('avrgwysiwyg_class', 'menu'));
    add_action('admin_notices', array('avrgwysiwyg_class', 'post_upgrade_nag'));
  }
  add_filter( 'mce_css', array('avrgwysiwyg_class', 'css'));
endif;



/*
    H E L P   T A B
    ===============
*/

function avrgwysiwyg_help_tab() {
    $screen = get_current_screen();
    $screen->add_help_tab( array(
        'id'      => 'avrgwysiwyg_help_tab',
        'title'   => __('Highlighted Content'),
        'content' => '
        <p>'.__( 'The colored borders and highlighting you see in Visual editing mode are there to reveal for you what and where some of the various HTML elements are that comprise the content you are editing.' ).'</p>
        <p><strong>'.__( 'Legend' ).'</strong></p>
        <ul>
          <li style="border-radius:3px;box-sizing:border-box;border:1px solid rgba(255,0,105,0.15);">
            <strong>P:</strong> '.__('paragraph').'</li>
          <li style="border-radius:3px;box-sizing:border-box;border:1px solid rgba(255,150,0,0.35);">
            <strong>L:</strong> '.__('unordered list').'</li>
          <li style="border-radius:3px;box-sizing:border-box;border:1px solid rgba(255,215,0,0.3);">
            <strong>#:</strong> '.__('ordered list').'</li>
          <li style="border-radius:3px;box-sizing:border-box;border:1px solid rgba(205,255,0,0.4);">
            <strong>('.__('within').' L '.__('or').' #):</strong> '.__('individual list item').'</li>
          <li style="border-radius:3px;box-sizing:border-box;border:1px solid rgba(180,235,0,0.4);">
            <strong>V:</strong> '.__('div (a box, basically)').'</li>
          <li style="border-radius:3px;box-sizing:border-box;border:1px solid rgba(0,180,235,0.3);">
            <strong>1-6:</strong> '.__('heading 1, heading 2, etc.').'</li>
          <li style="background:rgba(150,0,255,0.1);outline:5px solid rgba(150,0,255,0.1);">
            <strong>('.__('highlights').'):</strong> '.__('span (text with added formatting)').'</li>
        </ul>',
    ));
}

if(get_option('wysiwym_display') == 1) {
  add_action('load-post.php', 'avrgwysiwyg_help_tab');
}