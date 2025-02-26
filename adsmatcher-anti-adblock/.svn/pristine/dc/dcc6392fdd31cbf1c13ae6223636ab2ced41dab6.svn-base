<?php
$websiteurl = str_replace("http://","",str_replace("https://","",network_site_url( '/' )));
$urladsmatcher = "https://www.adsmatcher.com/api/antiadblock.php?website=".$websiteurl;
$response = wp_remote_get($urladsmatcher);
$adsmatcher_response = sanitize_text_field($response['body']);
$parseresponse = explode("||", $adsmatcher_response);

if(empty($parseresponse[0])){
	$randomid = generaterand();
}else{
	$randomid = $parseresponse[0];
}

if(empty($parseresponse[1])){
	$adblock_dissimulation = generaterand();
}else{
	$adblock_dissimulation = $parseresponse[1];
}

update_option('adsmatcher_uniqueid', $randomid);
update_option('adsmatcher_adblocker_dissimulation', $adblock_dissimulation);

function generaterand($length = 8) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>
<div class="wrap">
<h2>AdsMatcher</h2>
<form method="post" action="options.php">
    <?php settings_fields( 'adsmatcher' ); ?>
    <?php do_settings_sections( 'adsmatcher' ); ?>
	
	<table class="form-table">
		<tr valign="top">
			<th scope="row"><?php _e( "Public ID", "adsmatcher" ) ?></th>
			<td>
				<input id="adsmatcher_settings_publicid" type="text" value="<?php echo esc_attr(get_option('adsmatcher_uniqueid')); ?>" name="adsmatcher_settings_publicid">
				<br><span><?php _e( "Each time you will have a new Public ID to exceed the new updates of all Ad Blockers", "adsmatcher" ) ?></span>
			</td>
		</tr>
	</table>
	
    <h2><?php _e( "Anti AdBlock Settings", "adsmatcher" ) ?></h2>
    <table class="form-table">
        
        <tr valign="top">
            <th scope="row"><?php _e( "Title", "adsmatcher" ) ?></th>
            <td>
                <input id="adsmatcher_title" type="text" name="adsmatcher_title" value="<?php echo esc_attr(get_option('adsmatcher_title', 'Adblock Detected')); ?>" class="large-text code">
                <br><span><?php _e( "Title of the Anti AdBlocker", "adsmatcher" ) ?></span>
            </td>
        </tr>
		
        <tr valign="top">
            <th scope="row"><?php _e( "Message", "adsmatcher" ) ?></th>
            <td>
                <textarea name="adsmatcher_message" id="adsmatcher_message" class="large-text code" rows="3"><?php echo esc_attr(get_option('adsmatcher_message', 'Please consider supporting us by disabling your ad blocker')); ?></textarea>
                <br><span><?php _e( "The message that will be displayed to visitors who use ad blockers", "adsmatcher" ) ?></span>
            </td>
        </tr>
		
		<tr valign="top">
            <th scope="row"><?php _e( "Optimize Ad-Placements Automatically", "adsmatcher" ) ?></th>
            <td>
                <fieldset><legend class="screen-reader-text"><span><?php _e( "Optimize Ad-Placements", "adsmatcher" ) ?></span></legend>
                <label title="<?php _e( "Enable", "adsmatcher" ) ?>"><input type="radio" name="adsmatcher_optimization" value="1" <?php if(esc_attr( get_option('adsmatcher_optimization') ) == 1 ){ ?> checked="checked"<?php }?>> <?php _e( "Enable", "adsmatcher" ) ?></label><br>
                <label title="<?php _e( "Disable", "adsmatcher" ) ?>"><input type="radio" name="adsmatcher_optimization" value="0" <?php if(esc_attr( get_option('adsmatcher_optimization') ) == 0 ){ ?> checked="checked"<?php }?>> <?php _e( "Disable", "adsmatcher" ) ?></label><br>
                </fieldset>
            </td>
        </tr>
		
        <tr valign="top">
            <th scope="row"><?php _e( "Display Close Button", "adsmatcher" ) ?></th>
            <td>
                <fieldset><legend class="screen-reader-text"><span><?php _e( "Display Close Button", "adsmatcher" ) ?></span></legend>
                <label title="<?php _e( "Yes", "adsmatcher" ) ?>"><input type="radio" name="adsmatcher_display_clostebtn" value="1" <?php if(esc_attr( get_option('adsmatcher_display_clostebtn') ) == 1 ){ ?> checked="checked"<?php }?>> <?php _e( "Yes", "adsmatcher" ) ?></label><br>
                <label title="<?php _e( "No", "adsmatcher" ) ?>"><input type="radio" name="adsmatcher_display_clostebtn" value="0" <?php if(esc_attr( get_option('adsmatcher_display_clostebtn') ) == 0 ){ ?> checked="checked"<?php }?>> <?php _e( "No", "adsmatcher" ) ?></label><br>
                </fieldset>
            </td>
        </tr>

    </table>
    
    <?php submit_button(); ?>

</form>
</div>