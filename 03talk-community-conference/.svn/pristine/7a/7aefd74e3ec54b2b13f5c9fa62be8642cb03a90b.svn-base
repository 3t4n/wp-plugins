<div class="wrap"  id="wrap">
<h2>03TALK</h2>
<h3>Setup Instructions</h3>
<ol>
	<li>Edit your text below</li>
	<li>Click <a href="/wp-admin/widgets.php">here</a> and enable the 03TALK Widget</li>
	<li>Show your friends.</li>
</ol>
<h3>Conference Settings</h3>
 <?php echo $_SESSION['message']; $_SESSION['message'] =""; ?>
<form method="post" action="<?php __FILE__ ?>">
<?php wp_nonce_field('update-options'); ?>

<?php settings_fields( '03talk-settings-group' ); ?>
   <table class="form-table">
        <tr valign="top">
        <th scope="row">Conference Room</th>
        <td><input type="text" name="conference_number" value="<?php echo get_option('conference_number'); ?>" READONLY /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">Access PIN</th>
        <td><input type="text" name="conference_pin" value="<?php echo get_option('conference_pin'); ?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Quick Access Password </th>
        <td><input type="password" name="conference_admin_pin" value="<?php echo get_option('conference_admin_pin'); ?>" /></td>
        </tr>
        
        
        <tr valign="top">
        <th scope="row">Conference Active</th>
        <td>
        <input type="radio" name="conference_active" value="yes" <?php if (get_option('conference_active') == "yes") echo" checked=\"true\""; ?>/>&nbsp; Yes 
        <input type="radio" name="conference_active" value="no" <?php if (get_option('conference_active') == "no") echo" checked=\"true\"";  ?> />&nbsp; No</td>
        </tr>
   </table>
<p>&nbsp;</p>
   <h3>Widget Settings</h3>
   <table class="form-table">     
        <tr valign="top">
        <th scope="row">Online Background Color</th>
        <td><input type="textbox" class="color" name="conference_widget_color_online"value="<?php echo stripslashes(get_option('conference_widget_color_online')); ?>"/></td>
        </tr>
        <tr valign="top">
        <th scope="row">Online Box Color</th>
        <td><input type="textbox" class="color" name="conference_widget_box_online"value="<?php echo stripslashes(get_option('conference_widget_box_online')); ?>"/></td>
        </tr>
        <tr valign="top">
        <th scope="row">Offline Background Color</th>
        <td><input type="textbox" class="color" name="conference_widget_color_offline"value="<?php echo stripslashes(get_option('conference_widget_color_offline')); ?>"/></td>
        </tr>
        <th scope="row">Offline Box Color</th>
        <td><input type="textbox" class="color" name="conference_widget_box_offline"value="<?php echo stripslashes(get_option('conference_widget_box_offline')); ?>"/></td>
        </tr>
        <tr valign="top">
        <th scope="row">Widget Header</th>
        <td><input type="text" name="conference_widget_header" value="<?php echo get_option('conference_widget_header'); ?>" /></td>
        </tr>
        <tr valign="top">
        <th scope="row">Offline Message</th>
        <td><textarea cols="60" rows="5" limit="110" name="conference_widget_content_offline"><?php echo stripslashes(get_option('conference_widget_content_offline')); ?></textarea></td>
        </tr>
    </table>
    <input type="hidden" name="action" value="update" />
    <input type="hidden" name="page_options" value="conference_number,conference_pin,conference_active,conference_widget_header, conference_widget_content_online, conference_widget_content_offline" />
    <p class="submit">
    <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    </p>
</form>

<form name="rehash" method="post" action="<?php __FILE__ ?>">
<?php wp_nonce_field('update-options'); ?>
<?php settings_fields( '03talk-settings-group' ); ?>
    <input type="hidden" name="action" value="rehash" />
    <p>For a new random conference room number, click <a href="#" onclick ="document.rehash.submit();">here</a></p>
</form>

</div>