<?php
// Send Header Mime type
Header ('Content-Type: text/javascript');

// Load WordPress
While (!Is_File ('wp-load.php')){
  If (Is_Dir('../')) ChDir('../');
  Else Die('Could not find WordPress.');
}
Include_Once 'wp-load.php';


// Is the Plugin ready?
If (!Is_Object($GLOBALS['wp_plugin_audio_link_player'])) Die ('/* Could not find the Audio Link Player Plugin. */');
Global $wp_plugin_audio_link_player;

// Check Referer
If (!$wp_plugin_audio_link_player->get_option('disable_referer_check') && IsSet($_SERVER['HTTP_REFERER'])){
  $referer = Parse_URL($_SERVER['HTTP_REFERER'], PHP_URL_HOST);
  If (!Empty($referer) && !Empty($_SERVER['SERVER_NAME'])){
    If (StrIPos($referer, $_SERVER['SERVER_NAME']) === False) : ?>
    alert("Wrong Referer for <?php Echo BaseName(__FILE__) ?>!\n\nHost: <?php Echo $_SERVER['SERVER_NAME'] ?>\nReferer: <?php Echo $referer ?>");
    window.location.href = "http://<?php Echo $_SERVER['SERVER_NAME'] ?>/";
    <?php Exit; Endif;
  }
}

/*
 * I use anonymous functions only because we are in the global NameSpace!
 * You can access the "Get_Option" function of the the plugin class via:
 * 
 * $setting = $get_option($key, $default)
 *    
*/
$get_option = Create_Function(
  '$key, $default = False',
  'return $GLOBALS[\'wp_plugin_audio_link_player\']->Get_Option($key, $default);'
);

$get_base_url = Create_Function(
  '', 'return $GLOBALS[\'wp_plugin_audio_link_player\']->base_url;'
);

?>jQuery(window).load(function(){
var element_counter = 0;
var general_class = 'audio-link-player';

// Add an mp3 player
jQuery('a').each(function(){
  
  // Selection:
  if ( this.href.substr(-4).toLowerCase().indexOf('.mp3') < 0 ) return;

  // Definitions:
  var $this = jQuery(this);
  var flash_container_id;
  var flash_container;
  var player_swf;
  var flash_vars = {};
  var flash_param = { 'wmode' : '<?php Echo $get_option('flash_wmode', 'transparent') ?>' };
  var width = 0;
  var height = 0;
  element_counter++;
  
  // Set title & href
  if ($this.attr('href') == undefined || $this.attr('href') == null) $this.attr('href', '');
  if ($this.attr('title') == undefined || $this.attr('title') == null) $this.attr('title', '');
  
  // create a new object
  // find a unique object name
  flash_container_id = 'flash_container_audio_link_player_' + element_counter;
  
  // generate an object code
  flash_container = '<span id="' + flash_container_id + '"></span>';
  
  // decide which player
  <?php If (!$get_option('ft_disable')) : ?>if( $this.text() != $this.parent().text() && $this.find('img').length == 0 ) {
    // the link is an inline element in a floating text
    var attributes = { 'class' : general_class + ' inline-player' };    
    
    // position
    <?php If ($get_option('ft_position') == 'after') : ?>
    $this.after('&nbsp;' + flash_container);
    <?php ElseIf ($get_option('ft_position') == 'replace') : ?>
    $this.replaceWith(flash_container);
    <?php Else : ?>
    $this.before(flash_container + '&nbsp;');
    <?php EndIf ?>
    
    // Build a flash app
    player_swf = '<?php Echo HTMLSpecialChars($get_base_url())?>/xspf/player.swf'; 
    flash_vars.song_url = encodeURIComponent(this.href);
    flash_vars.b_bgcolor = '<?php Echo SubStr($get_option('ft_button_bg_color'), 1) ?>';
    flash_vars.b_fgcolor = '<?php Echo SubStr($get_option('ft_button_fg_color'), 1) ?>';
    flash_vars.b_colors = '<?php Echo SubStr($get_option('ft_button_load_color'), 1) ?>,<?php Echo SubStr($get_option('ft_button_play_color'), 1) ?>,<?php Echo SubStr($get_option('ft_button_stop_color'), 1) ?>,<?php Echo SubStr($get_option('ft_button_error_color'), 1) ?>';
    flash_vars.autoplay = <?php Echo $get_option('ft_autoplay') ? 'true' : 'false'; ?>;
    
    // in the xspf player these values are not variable
    width = 17;
    height = 17;
    
    // Add the player
    swfobject.embedSWF(player_swf, flash_container_id, width, height, "9.0.0", null, flash_vars, flash_param, attributes);
    
    <?php If ($get_option('ft_disable_link')) : ?>
    // Disable clickable link
    $this.replaceWith($this.text());
    <?php EndIf ?>
  }
  <?php EndIf ?>


  <?php If (!$get_option('sl_disable')) : ?>if ( $this.text() == $this.parent().text() && $this.find('img').length == 0){
    // the link is the only element in the paragraph / list item
    var attributes = { 'class' : general_class + ' single-line-player' };
    
    // Read the configuration
    height = <?php Echo IntVal($get_option('sl_height', 24)) ?>;
    <?php If ($get_option('sl_use_classic')) : ?>
    player_swf = '<?php Echo HTMLSpecialChars($get_base_url())?>/1pixelout/player-classic.swf';
    width = Math.round(height * 290 / 24);
    <?php Else : ?>
    player_swf = '<?php Echo HTMLSpecialChars($get_base_url())?>/1pixelout/player.swf'; 
    width = <?php Echo IntVal($get_option('sl_width', 290)) ?>;
    <?php EndIf ?>
    
    // Read the title of the mp3 link
    if ($this.attr('title') == '') $this.attr('title', $this.text());
    var caption = $this.attr('title');
    
    // Collect flash vars and parameters
    flash_vars.soundFile = escape(this.href.replace(/,/g, '%2C'));
    flash_vars.titles = ' ';
    flash_vars.artists = caption.replace(/,/g, ' ');
    flash_vars.autostart = '<?php Echo $get_option('sl_autoplay') ? 'yes' : 'no'; ?>';
    flash_vars.width = width;
    flash_vars.height = height;
    flash_vars.bg = '0x<?php Echo SubStr($get_option('sl_bg_color', '#E5E5E5'), 1) ?>';
    flash_vars.leftbg = '0x<?php Echo SubStr($get_option('sl_bg_left_color', '#CCCCCC'), 1) ?>';
    flash_vars.lefticon = '0x<?php Echo SubStr($get_option('sl_icon_left_color', '#333333'), 1) ?>';
    flash_vars.voltrack = '0x<?php Echo SubStr($get_option('sl_voltrack_color', '#F2F2F2'), 1) ?>';
    flash_vars.volslider = '0x<?php Echo SubStr($get_option('sl_volslider_color', '#666666'), 1) ?>';
    flash_vars.rightbg = '0x<?php Echo SubStr($get_option('sl_bg_right_color', '#B4B4B4'), 1) ?>';
    flash_vars.rightbghover = '0x<?php Echo SubStr($get_option('sl_bg_right_hover_color', '#999999'), 1) ?>';
    flash_vars.righticon = '0x<?php Echo SubStr($get_option('sl_icon_right_color', '#333333'), 1) ?>';
    flash_vars.righticonhover = '0x<?php Echo SubStr($get_option('sl_icon_right_hover_color', '#FFFFFF'), 1) ?>';
    flash_vars.loader = '0x<?php Echo SubStr($get_option('sl_loader_color', '#009900'), 1) ?>';
    flash_vars.track = '0x<?php Echo SubStr($get_option('sl_track_color', '#FFFFFF'), 1) ?>';
    flash_vars.tracker = '0x<?php Echo SubStr($get_option('sl_tracker_color', '#DDDDDD'), 1) ?>';
    flash_vars.border = '0x<?php Echo SubStr($get_option('sl_border_color', '#CCCCCC'), 1) ?>';
    flash_vars.text = '0x<?php Echo SubStr($get_option('sl_text_color', '#333333'), 1) ?>';
    flash_vars.initialvolume = <?php Echo IntVal($get_option('sl_volume', 60)) ?>;

    // Prepare the Flash Container for the player
    <?php If ($get_option('sl_replace_link')) : ?>
    $this.replaceWith(flash_container);
    <?php Else: ?>
    $this.after('&nbsp;' + flash_container);
    <?php EndIf ?>

    // Add the player:
    swfobject.embedSWF(player_swf, flash_container_id, width, height, "9.0.0", null, flash_vars, flash_param, attributes);
  }
  <?php EndIf ?>
  

  <?php If (!$get_option('li_disable')) : ?>if ($this.text() == '' && $this.find('img').length == 1){
    // A linked image
    var attributes = { 'class' : general_class + ' image-link-player' };

    flash_vars.file = flash_vars.link = encodeURIComponent(this.href);
    flash_vars.image = $this.find('img:eq(0)').attr('src');
    flash_vars.autostart = <?php Echo $get_option('li_autoplay') ? 'true' : 'false'; ?>;
    flash_vars.skin = '<?php Echo HTMLSpecialChars($get_base_url())?>/jw_player/skin.swf';
    flash_vars.volume = <?php Echo IntVal($get_option('li_volume', 60)) ?>;
    
    player_swf = '<?php Echo HTMLSpecialChars($get_base_url())?>/jw_player/player.swf';
    attributes.styleclass = $this.find('img').attr('class');
    
    var attribute_height = parseInt($this.find('img').attr('height'));
    var real_height = $this.find('img').height();
    if (isNaN(attribute_height)) height = real_height + 20;
    else height = Math.max(real_height, attribute_height);
    width = $this.find('img').width();

    $this.replaceWith(flash_container);

    // Add the player:
    swfobject.embedSWF(player_swf, flash_container_id, width, height, "9.0.0", null, flash_vars, flash_param, attributes);
  }
  <?php EndIf ?>

}); // End of Each loop 
}); // End of DOM Ready Sequence
/* End of File */