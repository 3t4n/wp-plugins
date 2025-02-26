<?php


add_action('admin_init', 'dh_free_whatsapp_share_button_init' );
function dh_free_whatsapp_share_button_init( ){
  register_setting( 'dh_free_whatsapp_share_button_options', 'dh_free_whatsapp_share_button' );
  $new_options = array(
    'top' => 'on',
    'btm' => 'on',
    'posts' => 'on',
    'pages' => 'off',
    'homepage' => 'off',
    'tracking' => 'off',
	'style' => 'style3'
  );
  add_option( 'dh_free_whatsapp_share_button', $new_options );
}


add_action('admin_menu', 'show_dh_free_whatsapp_share_button_options');
function show_dh_free_whatsapp_share_button_options() {
  add_options_page('Free WhatsApp Share Button Options', 'Free WhatsApp Share Button', 'manage_options', 'dh_free_whatsapp_share_button', 'dh_free_whatsapp_share_button_options');
}




// ADMIN PAGE
function dh_free_whatsapp_share_button_options() {
?>
    <link href="<?php echo plugins_url( 'admin.css' , __FILE__ ); ?>" rel="stylesheet" type="text/css">
    <div class="dh_admin_wrap" style="background:#FFF;">
        <div class="dh_admin_top">
            
        </div>

        <div class="dh_admin_main_wrap">
            <div class="dh_admin_main_left">
                <div class="dh_admin_box">

    <form method="post" action="options.php" id="options">
      <?php settings_fields('dh_free_whatsapp_share_button_options'); ?>
      <?php $options = get_option('dh_free_whatsapp_share_button'); 
        if (!isset($options['posts'])) {$options['posts'] = "";}
        if (!isset($options['pages'])) {$options['pages'] = "";}
        if (!isset($options['homepage'])) {$options['homepage'] = "";}
        if (!isset($options['top'])) {$options['top'] = "";}
        if (!isset($options['btm'])) {$options['btm'] = "";}
        if (!isset($options['tracking'])) {$options['tracking'] = "";}
		if (!isset($options['style'])) {$options['style'] = "";}
		
		
      ?>
      <h1><?php echo WABTN_NAME?><br /> <small> <?php echo WABTN_TAGLINE?></small></h1>
      <table class="form-table">
        <tr valign="top"><th scope="row"><label for="posts">Singular Posts</label></th>
          <td><input id="posts" name="dh_free_whatsapp_share_button[posts]" type="checkbox" value="on" <?php checked('on', $options['posts']); ?> /> <small>This includes all posts, custom post types and attacments.</small></td>
        </tr>
        <tr valign="top"><th scope="row"><label for="pages">Pages</label></th>
          <td><input id="pages" name="dh_free_whatsapp_share_button[pages]" type="checkbox" value="on" <?php checked('on', $options['pages']); ?> /></td>
        </tr>
        <tr valign="top"><th scope="row"><label for="homepage">Homepage</label></th>
          <td><input id="home" name="dh_free_whatsapp_share_button[homepage]" type="checkbox" value="on" <?php checked('on', $options['homepage']); ?> /></td>
        </tr>
        <tr valign="top"><th scope="row"><label for="top">Above Content</label></th>
          <td><input id="top" name="dh_free_whatsapp_share_button[top]" type="checkbox" value="on" <?php checked('on', $options['top']); ?> /></td>
        </tr>
        <tr valign="top"><th scope="row"><label for="btm">Below Content</label></th>
          <td><input id="btm" name="dh_free_whatsapp_share_button[btm]" type="checkbox" value="on" <?php checked('on', $options['btm']); ?> /></td>
        </tr>
        <tr valign="top"><th scope="row"><label for="btm">Style</label></th>
          <td><!--<input id="style" name="dh_free_whatsapp_share_button[style]" type="text" value=" <?php echo $options['style']; ?>" />-->
          <select id="style" name="dh_free_whatsapp_share_button[style]">
          <option value="style1" <?php if ( $options['style'] == 'style1' ) echo 'selected="selected"'; ?>>style1</option>
          <option value="style2" <?php if ( $options['style'] == 'style2' ) echo 'selected="selected"'; ?>>style2</option>
          <option value="style3" <?php if ( $options['style'] == 'style3' ) echo 'selected="selected"'; ?>>style3</option>
           <option value="style4" <?php if ( $options['style'] == 'style4' ) echo 'selected="selected"'; ?>>style4</option>
          
          </select>
          
          
          
          </td>
        </tr>
        
        
        
        <tr valign="top"><th scope="row"><label for="tracking">Add Tracking</label></th>
          <td><input id="tracking" name="dh_free_whatsapp_share_button[tracking]" type="checkbox" value="on" <?php checked('on', $options['tracking']); ?> /> <small>Enable this to add UTM data onto the shared URL. It doesn't look as pretty but lets you track visits within Google Analytics. Source: WhatsApp. Medium: IM. Name: share button</small></td>
        </tr>
      </table>

      <p class="submit">
      <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
      </p>
    </form>
</div>
         <div class="dh_admin_box">
      <h3 class="title">Using the Shortcode</h3>
     
<p>The settings above are for automatic insertion of the Free WhatsApp Share Button.</p>
<p>You can insert the button manually in any page or post or template by simply using the shortcode <strong>[whatsapp]</strong>. To enter the shortcode directly into templates using PHP, enter <strong>echo do_shortcode('[whatsapp]');</strong></p>
<p>You can also use the options below to override the the settings above.</p>
<ul>
<li><strong>url</strong> - leave blank for current URL</li>
<li><strong>title</strong> - leave blank to display current title</li>
</ul>
<p>Here's an example of using the shortcode:<br><code>[whatsapp url="http://dhirajsharma.com/wp/plugins/whatsapp-share-button" title="Check this out!"]</code></p>
<p>You can also insert the shortcode directly into your theme with PHP:<br><code>&lt;?php echo do_shortcode('[whatsapp]'); ?&gt;</code>

         
</div>      

</div>
           
        </div>
    </div>



<?php
}

?>