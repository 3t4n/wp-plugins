<?php
/**
* General Options Page
*
* Screen for specifying general options for the plugin
*
* @package	Artiss-Vine-Embed
* @since	1.1
*/
?>
<div class="wrap">

<div class="icon32"><img src="<?php echo plugins_url(); ?>/artiss-vine-embed/images/screen_icon.png" alt="" title="" height="32px" width="32px"/><br /></div>

<h2><?php _e( 'Artiss Vine Embed Options', 'artiss-vine-embed' ); ?></h2>

<?php
if ( ( !empty( $_POST[ 'Submit' ] ) ) && ( check_admin_referer( 'vine-embed-options' , 'vine_embed_options_nonce' ) ) ) {

	// Assign variable contents to options array

	$options[ 'type' ] = $_POST[ 'vine_embed_type' ];
	$options[ 'size' ] = $_POST[ 'vine_embed_size' ];

	// Update the options

	update_option( 'ave_options', $options );

	echo '<div class="updated fade"><p><strong>' . __( 'Options Saved.', 'artiss-vine-embed' ) . '</strong></p></div>' . "\n";

}

$options = ave_get_options();
?>

<form method="post" action="<?php echo get_bloginfo( 'wpurl' ) . '/wp-admin/admin.php?page=ave-options' ?>">

<p>These are the default video settings.</p>

<table class="form-table">

<tr>
<th scope="row"><?php _e( 'Video Type', 'artiss-vine-embed' ); ?></th>
<td><select name="vine_embed_type">
<option value="simple"<?php if ( $options[ 'type' ] == 'simple' ) { echo " selected='selected'"; } ?>><?php _e( 'Simple', 'artiss-vine-embed' ); ?></option>
<option value="postcard"<?php if ( $options[ 'type' ] == 'postcard' ) { echo " selected='selected'"; } ?>><?php _e( 'Postcard', 'artiss-vine-embed' ); ?></option>
</select><span class="description"><?php _e( 'The format of the video', 'artiss-vine-embed' ); ?></span></td>
</tr>

<tr>
<th scope="row"><?php _e( 'Video Size', 'artiss-vine-embed' ); ?></th>
<td><input type="text" size="3" maxlength="3" name="vine_embed_size" value="<?php echo $options[ 'size' ]; ?>"/><span class="description"><?php _e( 'The size of the video player, in pixels.', 'artiss-vine-embed' ); ?></span></td>
</tr>

</table>

<?php wp_nonce_field( 'vine-embed-options', 'vine_embed_options_nonce', true, true ); ?>

<p class="submit"><input type="submit" name="Submit" class="button-primary" value="<?php _e( 'Save Settings', 'artiss-vine-embed' ); ?>"/></p>

</form>

</div>