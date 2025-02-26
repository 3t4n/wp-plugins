<h3><?php _e('General') ?></h3>
<table class="form-table">
<tr valign="top">
  <th scope="row"><?php Echo $this->t('Script Position') ?></th>
  <td>
    <select name="script_position">
      <option value="footer" <?php Selected ($this->Get_Option('script_position'), 'footer') ?> ><?php Echo $this->t('Footer of the website') ?></option>
      <option value="header" <?php Selected ($this->Get_Option('script_position'), 'header') ?> ><?php Echo $this->t('Header of the website') ?></option>
    </select><br />            
    <small><?php Echo $this->t('Please choose the position of the javascript. Footer is recommended. Use "Header" if you have trouble to make the player work.') ?></small>
  </td>
</tr>
<tr valign="top">
  <th scope="row"><?php Echo $this->t('Flash Window Mode') ?></th>
  <td>
    <select name="flash_wmode">
      <option value="transparent" <?php Selected ($this->Get_Option('flash_wmode'), 'transparent') ?> >Transparent</option>
      <option value="opaque" <?php Selected ($this->Get_Option('flash_wmode'), 'opaque') ?> >Opaque</option>
      <option value="window" <?php Selected ($this->Get_Option('flash_wmode'), 'window') ?> >Window</option>
    </select><br />            
    <small><?php Echo $this->t('Sets the Window Mode property of the Flash movie for transparency, layering, and positioning in the browser.') ?></small>
  </td>
</tr>
<tr valign="top">
  <th scope="row"><?php Echo $this->t('Referer Check') ?></th>
  <td>
    <input type="checkbox" name="disable_referer_check" value="yes" <?php Checked ($this->get_option('disable_referer_check'), 'yes') ?> />            
    <?php Echo $this->t('Disable the referer check in the dynamically JavaScript and CSS files.') ?><br />            
    <small><?php Echo $this->t('Tick this is box if see a "Wrong Referer" message on your own website!') ?></small>
  </td>
</tr>
</table>

<h3><?php Echo $this->t('Inline Player in floating texts') ?></h3>
<table class="form-table">
<tr valign="top">
  <th scope="row"><?php Echo $this->t('Example') ?></th>
  <td>
    <img src="<?php Echo $this->base_url?>/xspf/example.png"
         alt="<?php Echo $this->t('Example of an inline player.') ?>"
         title="<?php Echo $this->t('Example of an inline player.') ?>"
         style="border: 1px solid #ddd" />
  </td>
</tr>
<tr valign="top">
  <th scope="row"><?php Echo $this->t('Disable') ?></th>
  <td>
    <input type="checkbox" name="ft_disable" value="yes" <?php Checked ($this->Get_Option('ft_disable'), 'yes') ?>/>            
    <?php Echo $this->t('Disable the inline flash player for mp3 links in floating text paragraphs. (Of course not recommended.)') ?>
  </td>
</tr>
<tr valign="top">
  <th scope="row"><?php Echo $this->t('Position') ?></th>
  <td>
    <select name="ft_position">
      <option value="before" <?php Selected ($this->Get_Option('ft_position'), 'before') ?> ><?php Echo $this->t('before the link') ?></option>
      <option value="after" <?php Selected ($this->Get_Option('ft_position'), 'after') ?> ><?php Echo $this->t('after the link') ?></option>
      <option value="replace" <?php Selected ($this->Get_Option('ft_position'), 'replace') ?> ><?php Echo $this->t('player replaces the link') ?></option>
    </select><br />            
    <small><?php Echo $this->t('Please choose the position of the flash player.') ?></small>
  </td>
</tr>
<tr valign="top">
  <th scope="row"><?php Echo $this->t('Disable Link') ?></th>
  <td>
    <input type="checkbox" name="ft_disable_link" value="yes" <?php Checked ($this->Get_Option('ft_disable_link'), 'yes') ?>/>            
    <?php Echo $this->t('Tick this box to deactivate the clickable link of the MP3 link.') ?>
  </td>
</tr>
<?php ForEach (Array(
        Array( 'title' => $this->t('Background color'),
               'name' => 'ft_button_bg_color',
               'default' => '#cccccc',
               'desc' => $this->t('Background color inside the player. The environment of the player is always transparent.') ),

        Array( 'title' => $this->t('Foreground color'),
               'name' => 'ft_button_fg_color',
               'default' => '#666666',
               'desc' => $this->t('Default foreground color.') ),

        Array( 'title' => $this->t('Load color'),
               'name' => 'ft_button_load_color',
               'default' => '#ff0000',
               'desc' => $this->t('Foreground color of the loading animation.') ),

        Array( 'title' => $this->t('Play color'),
               'name' => 'ft_button_play_color',
               'default' => '#0000ff',
               'desc' => $this->t('Foreground color of the play icon.') ),

        Array( 'title' => $this->t('Stop color'),
               'name' => 'ft_button_stop_color',
               'default' => '#00ff00',
               'desc' => $this->t('Foreground color of the stop icon.') ),

        Array( 'title' => $this->t('Error color'),
               'name' => 'ft_button_error_color',
               'default' => '#000000',
               'desc' => $this->t('Foreground color of the error icon.') )        
        
      ) AS $choose_color) : ?>
<tr valign="top">
  <th scope="row"><?php Echo $choose_color['title'] ?></th>
  <td>
    <input type="text" name="<?php Echo $choose_color['name'] ?>" value="<?php Echo $this->Get_Option($choose_color['name'], $choose_color['default']) ?>" class="color" /><br />            
    <div class="colorpicker"></div>
    <small><?php Echo $choose_color['desc'] ?></small>
  </td>
</tr>
<?php EndForEach ?>
<tr valign="top">
  <th scope="row"><?php Echo $this->t('Autoplay') ?></th>
  <td>
    <input type="checkbox" name="ft_autoplay" value="yes" <?php Checked ($this->Get_Option('ft_autoplay'), 'yes') ?>/>            
    <?php Echo $this->t('Autoplay mode makes the music start without the initial user click.') ?>
  </td>
</tr>
</table>



<h3><?php Echo $this->t('Inline Player in single lines and lists') ?></h3>
<table class="form-table">
<tr valign="top">
  <th scope="row"><?php Echo $this->t('Example') ?></th>
  <td>
    <img src="<?php Echo $this->base_url?>/1pixelout/example.png"
         alt="<?php Echo $this->t('Example of an single line player.') ?>"
         title="<?php Echo $this->t('Example of an single line player.') ?>"
         style="border: 1px solid #ddd" />
  </td>
</tr>
<tr valign="top">
  <th scope="row"><?php Echo $this->t('Disable') ?></th>
  <td>
    <input type="checkbox" name="sl_disable" value="yes" <?php Checked ($this->Get_Option('sl_disable'), 'yes') ?>/>            
    <?php Echo $this->t('Disable the inline flash player for mp3 links in single lines. (Of course not recommended.)') ?>
  </td>
</tr>
<tr valign="top">
  <th scope="row"><?php Echo $this->t('Classic version') ?></th>
  <td>
    <input type="checkbox" name="sl_use_classic" value="yes" <?php Checked ($this->Get_Option('sl_use_classic'), 'yes') ?>/>            
    <?php Echo $this->t('Use the <i>classic</i> <small>(old)</small> inline flash player for mp3 links in single lines. Some options you can set below are not available in the classic version. (Not recommended.)') ?>
  </td>
</tr>
<tr valign="top">
  <th scope="row"><?php Echo $this->t('Autoplay') ?></th>
  <td>
    <input type="checkbox" name="sl_autoplay" value="yes" <?php Checked ($this->Get_Option('sl_autoplay'), 'yes') ?>/>            
    <?php Echo $this->t('Autoplay mode makes the music start without the initial user click.') ?>
  </td>
</tr>
<tr valign="top">
  <th scope="row"><?php Echo $this->t('Width') ?></th>
  <td>
    <input type="text" name="sl_width" value="<?php Echo IntVal($this->Get_Option('sl_width', 200)) ?>" size="4" /> <?php Echo $this->t('px') ?><br />            
    <small><?php Echo $this->t('Please choose the width of the player. (In pixels)') ?></small>
  </td>
</tr>
<tr valign="top">
  <th scope="row"><?php Echo $this->t('Height') ?></th>
  <td>
    <input type="text" name="sl_height" value="<?php Echo IntVal($this->Get_Option('sl_height', 24)) ?>" size="4" /> <?php Echo $this->t('px') ?><br />            
    <small><?php Echo $this->t('Please choose the height of the player. Maximum is 24. (In pixels)') ?></small>
  </td>
</tr>
<tr valign="top">
  <th scope="row"><?php Echo $this->t('Hide link') ?></th>
  <td>
    <input type="checkbox" name="sl_replace_link" value="yes" <?php Checked ($this->Get_Option('sl_replace_link'), 'yes') ?>/>            
    <?php Echo $this->t('Tick this box if the player should replace the original html link.') ?>
  </td>
</tr>
<tr valign="top">
  <th scope="row"><?php Echo $this->t('Volume') ?></th>
  <td>
    <input type="text" name="sl_volume" value="<?php Echo IntVal($this->Get_Option('sl_volume', 60)) ?>" size="4" />%<br />            
    <small><?php Echo $this->t('The initial volume of the player. Should be a value from 0 (mute) to 100 (max volume).') ?></small>
  </td>
</tr>
<tr valign="top">
  <th scope="row"><?php Echo $this->t('Anatomy') ?></th>
  <td>
    <?php
    ?>
    <img src="<?php Echo $this->get_single_line_player_diagram_file() ?>"
         alt="<?php Echo $this->t('Anatomy of an single line player.') ?>"
         title="<?php Echo $this->t('Anatomy of an single line player.') ?>" /><br />
    <small><?php Echo $this->t('This diagram should help you choosing the right colors below.') ?></small>
  </td>
</tr>
<?php ForEach (Array(
        Array( 'title' => $this->t('Background'),
               'name' => 'sl_bg_color',
               'default' => '#E5E5E5',
               'desc' => $this->t('Background color inside the player. The environment of the player is always transparent.') ),

        Array( 'title' => $this->t('Background left'),
               'name' => 'sl_bg_left_color',
               'default' => '#CCCCCC',
               'desc' => $this->t('Background color of the speaker icon background/volume control.') ),

        Array( 'title' => $this->t('Icon left'),
               'name' => 'sl_icon_left_color',
               'default' => '#333333',
               'desc' => $this->t('Color of the speaker icon on the left hand.') ),

        Array( 'title' => $this->t('Volume track'),
               'name' => 'sl_voltrack_color',
               'default' => '#F2F2F2',
               'desc' => $this->t('Color of the volume track on the left hand.') ),

        Array( 'title' => $this->t('Volume slider'),
               'name' => 'sl_volslider_color',
               'default' => '#666666',
               'desc' => $this->t('Color of the volume slider on the left hand.') ),

        Array( 'title' => $this->t('Background right'),
               'name' => 'sl_bg_right_color',
               'default' => '#B4B4B4',
               'desc' => $this->t('Background color of the play/pause button.') ),

        Array( 'title' => $this->t('Background right (hover)'),
               'name' => 'sl_bg_right_hover_color',
               'default' => '#999999',
               'desc' => $this->t('Color of the right background while hovering it with the mouse.') ),

        Array( 'title' => $this->t('Icon right'),
               'name' => 'sl_icon_right_color',
               'default' => '#333333',
               'desc' => $this->t('Color of the play/pause icon.') ),

        Array( 'title' => $this->t('Icon right (hover)'),
               'name' => 'sl_icon_right_hover_color',
               'default' => '#FFFFFF',
               'desc' => $this->t('Color of the right icon while hovering it with the mouse.') ),

        Array( 'title' => $this->t('Loading bar'),
               'name' => 'sl_loader_color',
               'default' => '#009900',
               'desc' => $this->t('Color of the loading bar.') ),

        Array( 'title' => $this->t('Track bar'),
               'name' => 'sl_track_color',
               'default' => '#FFFFFF',
               'desc' => $this->t('Color of the track bar.') ),

        Array( 'title' => $this->t('Tracker'),
               'name' => 'sl_tracker_color',
               'default' => '#DDDDDD',
               'desc' => $this->t('Color of the progress track (tracker).') ),

        Array( 'title' => $this->t('Track bar border'),
               'name' => 'sl_border_color',
               'default' => '#CCCCCC',
               'desc' => $this->t('Color of the border surrounding the track bar.') ),

        Array( 'title' => $this->t('Text'),
               'name' => 'sl_text_color',
               'default' => '#333333',
               'desc' => $this->t('Color of the text in the middle area.') )               
        
      ) AS $choose_color) : ?>
<tr valign="top">
  <th scope="row"><?php Echo $choose_color['title'] ?></th>
  <td>
    <input type="text" name="<?php Echo $choose_color['name'] ?>" value="<?php Echo $this->Get_Option($choose_color['name'], $choose_color['default']) ?>" class="color" /><br />            
    <div class="colorpicker"></div>
    <small><?php Echo $choose_color['desc'] ?></small>
  </td>
</tr>
<?php EndForEach ?>
</table>


<h3><?php Echo $this->t('Player for linked images') ?></h3>
<table class="form-table">
<tr valign="top">
  <th scope="row"><?php Echo $this->t('Example') ?></th>
  <td>
    <img src="<?php Echo $this->base_url?>/jw_player/example.png"
         alt="<?php Echo $this->t('Example of a linked image player.') ?>"
         title="<?php Echo $this->t('Example of a linked image player.') ?>"
         style="border: 1px solid #ddd" />
  </td>
</tr>
<tr valign="top">
  <th scope="row"><?php Echo $this->t('Disable') ?></th>
  <td>
    <input type="checkbox" name="li_disable" value="yes" <?php Checked ($this->Get_Option('li_disable'), 'yes') ?>/>            
    <?php Echo $this->t('Disable the flash player for mp3 links from images. (Of course not recommended.)') ?>
  </td>
</tr>
<tr valign="top">
  <th scope="row"><?php Echo $this->t('Autoplay') ?></th>
  <td>
    <input type="checkbox" name="li_autoplay" value="yes" <?php Checked ($this->Get_Option('li_autoplay'), 'yes') ?>/>            
    <?php Echo $this->t('Autoplay mode makes the music start without the initial user click.') ?>
  </td>
</tr>
<tr valign="top">
  <th scope="row"><?php Echo $this->t('Volume') ?></th>
  <td>
    <input type="text" name="li_volume" value="<?php Echo IntVal($this->Get_Option('li_volume', 60)) ?>" size="4" />%<br />            
    <small><?php Echo $this->t('The initial volume of the player. Should be a value from 0 (mute) to 100 (max volume).') ?></small>
  </td>
</tr>
</table>