<!-- color picker thanks to http://www.virtuosoft.eu/code/jquery-colorpickersliders/ -->
<div class="wrap">
<h2>3D Roll Over Links Plugin - <a target='blank_' href="http://www.richzendy.org/wordpress-plugins/3d-roll-over-links">Website</a> </h2>
<h3>3D Roll Over Links Options</h3>
<form method="post" action="options.php">

<?php settings_fields( '3d-roll-over-links-settings-group' ); ?>

<?php do_settings_sections( '3d-roll-over-links-settings-group' ); ?>

<table class="form-table">
	<tr valign="top">
		<th scope="row">Background Color (hsl format):</th>
	<td><input id="color" type="text" class="3d_rollover_background_color"  data-color-format="hsl" name="3d_rollover_background_color" value="<?php echo get_option('3d_rollover_background_color'); ?>" /></td>
	</tr>
</table>

<script>
jQuery('.3d_rollover_background_color').ColorPickerSliders({
    previewontriggerelement: true,
    flat: false,
    color: '#1651dd',
    order: {
        rgb: 1,
        preview: 2
    }
});
</script>

<?php submit_button(); ?>

</form>
<h3>This plugin is very simple, but spend a bit of my time doing it, if works for you please consider make me a donation: <a target='blank_' href="http://www.richzendy.org/donaciones">http://www.richzendy.org/donaciones</a></h3> 
Share some love ->
<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://www.richzendy.org/wordpress-plugins/3d-roll-over-links" data-text="3D Roll Over Links WordPress plugin" data-via="Richzendy" data-related="Richzendy" data-hashtags="wordpress">Tweet</a> 
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
</div>
