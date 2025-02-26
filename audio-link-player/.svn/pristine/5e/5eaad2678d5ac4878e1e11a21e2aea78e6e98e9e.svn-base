<?php

/*
Plugin Name: Audio Link Player
Plugin URI: http://dennishoppe.de/wordpress-plugins/audio-link-player
Description: This plugin adds flash players to all your mp3 links.
Version: 1.3.12
Author: Dennis Hoppe
Author URI: http://DennisHoppe.de
*/


If (!Class_Exists('wp_plugin_audio_link_player')){
Class wp_plugin_audio_link_player {
  var $base_url;
  var $version = '1.3.12';

  Function __construct(){
    // Read base
    $this->base_url = get_bloginfo('wpurl').'/'.Str_Replace("\\", '/', SubStr(RealPath(DirName(__FILE__)), Strlen(ABSPATH)));
    
    // Hooks
    Add_Action ('init', Array($this, 'Load_TextDomain'));    
    If (Is_Admin()){
      Add_Action ('admin_menu', Array($this, 'Register_Options_Page'));
    }
    Else {
      WP_Enqueue_Script('audio-link-player', $this->base_url . '/player-js.php', Array('jquery', 'swfobject'), $this->version, ($this->Get_Option('script_position') != 'header'));
    }

    // Add this to GLOBALS
    $GLOBALS[__CLASS__] = $this;
  }
  
  Function Load_TextDomain(){
    $locale = Apply_Filters( 'plugin_locale', get_locale(), __CLASS__ );
    Load_TextDomain (__CLASS__, DirName(__FILE__).'/language/' . $locale . '.mo');
  }
  
  Function t ($text, $context = ''){
    // Translates the string $text with context $context
    If ($context == '')
      return Translate ($text, __CLASS__);
    Else
      return Translate_With_GetText_Context ($text, $context, __CLASS__);
  }
  
  Function Register_Options_Page(){
    $handle = Add_Options_Page(
      $this->t('Audio Link Player Settings'),
      $this->t('Audio Link Player'),
      'manage_options',
      __CLASS__,
      Array($this, 'Print_Options_Page')
    );
    
    Add_Action ('load-' . $handle, Array($this, 'Load_Options_Page'));
  }
  
  Function Load_Options_Page(){
    WP_Enqueue_Script('farbtastic');
    WP_Enqueue_Style('farbtastic');
    WP_Enqueue_Script('audio-link-player-options', $this->base_url . '/options-page.js');
  }
  
  Function Print_Options_Page(){
    ?>
    <div class="wrap">
      <?php screen_icon(); ?>
      <h2><?php Echo $this->t('Audio Link Player Settings') ?></h2>
      
      <form method="post" action="">
        
        <?php If ($this->Save_Options()) : ?>
          <div id="message" class="updated fade"><p><strong><?php _e('Settings saved.') ?></strong></p></div>
        <?php EndIf; ?>
        
        <?php Include DirName(__FILE__).'/options-page.php' ?>

        <div style="max-width:600px"><?php do_action('dh_contribution_message') ?></div>
        
        <p class="submit">
          <input type="submit" name="Submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
        </p>
        
      </form>
    </div>
    <?php
  }  

  Function Save_Options(){
    // If there is no post data we bail out
    If (Empty($_POST)) return False;
    
    // Save options
    Update_Option (__CLASS__, StripSlashes_Deep($_POST));
    
    // Everything is ok =)
    return True;
  }

  Function Get_Option ($key = Null, $default = False){
    Static $settings;
    If (!IsSet($settings)) $settings = (Array) get_option(__CLASS__);
    
    If ( IsSet($settings[$key]) && $settings[$key] != '' )
      // the setting were saved and there is a value
      return $settings[$key];
    Else
      return $default;

  }
  
  Function get_single_line_player_diagram_file(){
    $dir = '/1pixelout';
    $file = '/anatomy-single-line-player-'.StrToLower(get_locale()).'.png';
    
    If (Is_File(DirName(__FILE__) . $dir . $file))
      $diagram_file = $this->base_url . $dir . $file;
    Else
      $diagram_file = $this->base_url . $dir . '/anatomy-single-line-player.png';
      
    return $diagram_file;
 }

} /* End of the Class */
New wp_plugin_audio_link_player();
Require_Once DirName(__FILE__).'/contribution.php';
} /* End of the If-Class-Exists-Condition */
/* End of File */