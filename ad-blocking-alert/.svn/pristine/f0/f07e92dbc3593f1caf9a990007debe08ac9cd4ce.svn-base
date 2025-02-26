<?php
	wp_enqueue_script('jquery');
	wp_enqueue_script('init', plugins_url("../js/init.js", __FILE__), __FILE__);
	wp_enqueue_style('settings', plugins_url("../css/settings.css", __FILE__), __FILE__);
	
	//scripts and styles for upload/media
	wp_enqueue_script('thickbox');
	wp_enqueue_style('thickbox');
	wp_enqueue_script('media-upload');
	wp_enqueue_script('uploader', plugins_url("../js/upload.js", __FILE__), __FILE__);
	
	$settings = array(
		'teeny' => false,
		'textarea_rows' => 20,
		'tabindex' => 1
	);
	
?>
<div id="adb_settings">
<div class="adb_content">
	<form method="POST" action="options.php">
    	<?php
        	settings_fields( 'adb_settings' );
			do_settings_sections( 'adb_settings' );
		?>
        <h1>Ad Blocking Alert Settings</h1>
        
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
                        <label><input type="radio" name="adb_display_status" value="0" id="adb_display_status_msg" <?php if(get_option("adb_display_status") == "0" || !get_option("adb_display_status")) echo "checked"; ?> onclick="window.location = window.location"> Message</label>
                        <label><input type="radio" name="adb_display_status" value="1" id="adb_display_status_img" <?php if(get_option("adb_display_status") == "1") echo "checked"; ?> data-il="<?php echo get_option("adb_display_image").""; ?>"> Image</label>
                    </td>
                </tr>
                <?php if(get_option("adb_display_status") == "0" || !get_option("adb_display_status")) { ?>
                <tr>
                    <td id="adb_title">Message</td>
                    <td id="adb_content"> <? /*<textarea cols="34" rows="4" name="adb_display_message" id="adb_display_message"><?php echo stripslashes(get_option("adb_display_message")); if(!get_option("adb_display_message")) { echo 'Uh oh, it looks like you have adBlock or an ad blocking application enabled. Please disable it or add us your whitelist then refresh the page to close this message.';} ?></textarea>*/ 
						if(!get_option("adb_display_message")) {
							$message = '<p style="text-align: center;"><strong><span style="color: #ff0000;">ADBLOCK DETECTED!</span></strong></p>It looks like you have adBlock or an ad blocking application enabled. Please disable it or add us your whitelist then refresh the page to close this message.';
						} else {
							$message = get_option("adb_display_message");
						}
					?>
					<?php wp_editor( __($message), 'adb_display_message', $settings); ?>
					</td>
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
</div>

<div class="side">
    <div class="inner_side">
        <p>If you like our plugin, please <strong>donate</strong> to help us keep it <strong>constantly updated</strong>, with <strong>new features</strong> and <strong>FREE</strong>.</p>

		<form name="_xclick" action="https://www.paypal.com/uk/cgi-bin/webscr" method="post">
			<input type="hidden" name="cmd" value="_xclick">
			<input type="hidden" name="business" value="dt_8792@yahoo.co.uk">
			<input type="hidden" name="item_name" value="Donation For Ad Blocking Alert">
			<input type="hidden" name="currency_code" value="GBP">
			<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
		</form>
    </div>
    
</div>