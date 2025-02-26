<?php
	wp_enqueue_script('jquery');
	wp_enqueue_script('init', plugins_url("../js/init.js", __FILE__), __FILE__);
	wp_enqueue_style('settings', plugins_url("../css/settings.css", __FILE__), __FILE__);
	
	//scripts and styles for upload/media
	wp_enqueue_script('thickbox');
	wp_enqueue_style('thickbox');
	wp_enqueue_script('media-upload');
	wp_enqueue_script('uploader', plugins_url("../js/upload.js", __FILE__), __FILE__);
?>
<div id="adb_settings">
	<form method="POST" action="options.php">
    	<?php
        	settings_fields( 'adb_settings' );
			do_settings_sections( 'adb_settings' );
		?>
        <h1>adBlock Alerter Settings</h1>
        
        <table>
            <tbody>
                <tr>
                    <td>Status</td>
                    <td>
                        <label><input type="radio" name="adb_status" value="1" id="adb_status_enable" <?php if(get_option("adb_status") == "1") echo "checked"; ?>> Enable</label> 
                        <label><input type="radio" name="adb_status" value="0" id="adb_status_disable" <?php if(get_option("adb_status") == "0" || !get_option("adb_status")) echo "checked"; ?>> Disable</label>
                    </td>
                </tr>
                
                <tr>
                    <td>Display</td>
                    <td>
                        <label><input type="radio" name="adb_display_status" value="0" id="adb_display_status_msg" <?php if(get_option("adb_display_status") == "0" || !get_option("adb_display_status")) echo "checked"; ?>> Message</label>
                        <label><input type="radio" name="adb_display_status" value="1" id="adb_display_status_img" <?php if(get_option("adb_display_status") == "1") echo "checked"; ?> data-il="<?php echo get_option("adb_display_image").""; ?>"> Image</label>
                    </td>
                </tr>
                <?php if(get_option("adb_display_status") == "0" || !get_option("adb_display_status")) { ?>
                <tr>
                    <td id="adb_title">Message</td>
                    <td id="adb_content"> <textarea cols="34" rows="4" name="adb_display_message" id="adb_display_message"><?php echo stripslashes(get_option("adb_display_message")); if(!get_option("adb_display_message")) { echo 'Uh oh, it looks like you have adBlock or an ad blocking application enabled. Please disable it or add us your whitelist then refresh the page to close this message.';} ?></textarea></td>
                </tr>
                <?php } if(get_option("adb_display_status") == "1") { ?>
                 <tr>
                    <td id="adb_title">Image</td>
                    <td id="adb_content">
                    	 <input class="image_location" type="hidden" name="adb_display_image" value="<?php echo get_option("adb_display_image"); ?>"/>
                         <input class="image_location il" type="text" value="<?php echo get_option("adb_display_image"); ?>" disabled/>
                         <input type="button" value="Browse" class="browse_button">
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        
        <input type="submit" name="save_settings" class="button button-primary" value="Save">
        <input type="button" name="preview_it" class="button" onclick="preview('<?php echo plugins_url("preview.php", __FILE__); ?>')" value="preview">
        <input type="hidden" value="<?php echo $_SERVER['REQUEST_URI']; ?>" name="return_to" />
	</form>
    
    <br />
    <br />
</div>

<div class="side">
    <div class="inner_side">
        <p>If you like our plugin, please <strong>donate</strong> to help us keep it <strong>constantly updated</strong>, with <strong>new features</strong> and <strong>FREE</strong>.</p>
        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
            <input type="hidden" name="cmd" value="_s-xclick">
            <input type="hidden" name="hosted_button_id" value="7X26NTD3LNQEQ">
            <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
            <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
        </form>
    </div>
    
    <div class="inner_side">
        <p>Rate our plugin and send us your feedback on how we can make the plugin even better and features you think we should add.</p>
        
        <h3>
        	<a href="http://wordpress.org/support/view/plugin-reviews/adblock-alerter" title="http://wordpress.org/support/view/plugin-reviews/adblock-alerter">Feedback here</a>
        </h3>
    </div>
    
    <div class="inner_side">
        <p>If you are experiencing any technical difficulties or issues simply visit the plugin support page via the link below.</p>
        <h3>
        	<a href="http://wordpress.org/support/plugin/adblock-alerter" title="http://wordpress.org/support/plugin/adblock-alerter">Support</a>
        </h3>
  	</div>
</div>